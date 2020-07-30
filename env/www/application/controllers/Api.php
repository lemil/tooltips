<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('menu_model');
		$this->load->model('api_model');
	}

	public function index()
	{
		$this->include_crudtheme = FALSE;
		$this->include_theme = TRUE;
		$data = array();
		$title = 'V1.0';
		$data['title'] = $title;
		$data['bc'] = $this->menu_model->getBreadcrumb($title);
		$this->view('api/main.php',$data);
	}


	public function js($userId = 0,$token = 0)
	{
		try {

			$referer = $this->input->server('HTTP_REFERER');

			$isauthorized = isset($userId) && isset($referer);

			if($isauthorized) {
				$method = $this->input->method();
				$isauthorized = ( $method == 'get');
			}
			
			$validUserId = 0;
			$validLocationId = 0;
			if($isauthorized) { //Check Por Valid Token
				$validUserId = $this->api_model->isValidUserId($userId) ? intval($userId) : null ;
				$validReferer =  $this->api_model->isValidReferer($referer) ? $referer : null ;
				$isauthorized = isset($validUserId) && isset($validReferer); 
			}

			if($isauthorized) {
				$this->prepareJs($validUserId,$validReferer);
			} else {
				$this->prepareEmptyJs();
			}

		} catch(Exception $e) {
			$this->prepareEmptyJs();	
		}
	}

	private function prepareEmptyJs() {
		$data = array();
		$data['anchors'] = array();
		$data['consolelog'] = 'invalid user or token';
		$this->load->view('api/js',$data);	
	}


	private function prepareJs($userId,$referer) {
		$data = array();
		
    	$scheme = parse_url($referer,PHP_URL_SCHEME);
    	$host = parse_url($referer,PHP_URL_HOST);
    	$port = parse_url($referer,PHP_URL_PORT);
    	$path = parse_url($referer,PHP_URL_PATH);
    	$query = parse_url($referer,PHP_URL_QUERY);
    	$fragment = parse_url($referer,PHP_URL_FRAGMENT);

//    	$hosturl = $scheme.'://'.$host.($port==80?'':':'.$port);
    	$hosturl = $host.($port==80?'':':'.$port);
    	$pattern = $path.(!isset($query)?'':'?'.$query).(!isset($fragment)?'':'#'.$fragment);

		$anchors = $this->api_model->getActiveLocationsByUserHostPattern($userId,$hosturl,$pattern);

		//Incluir script de init
		$data['anchors'] = $anchors;
		$this->load->view('api/js',$data);

	}

	public function article($id = 0)
	{

		//TODO
		// - Validar que tenga permisos de Backoffice para ver los de su usuario
		// - Validar que tenga permisos de Admin para ver todos los Ids

		$this->load->model('article_model');

		$data = array();
		if($id > 1) {
			$rows = $this->article_model->getById($id);
			if(sizeof($rows)>0) {
				$data['row'] = $rows[0];
			} else {
				$data['row'] = false;
			}
		} else {
			$data['row'] = false;			
		}
		$this->load->view('api/json.php',$data);
	}

	public function generateUserToken($username = FALSE)
	{
		$this->load->model('token_model');
		$this->load->model('user_model');

		$data = array();
		$data['row'] = '';
		if(	!isset($username) 	||
			!$username			||
			$username == ''){
			//Nada			
		} else {
			$token = $this->token_model->newToken(); 
			$data['row'] = $token;
			//Update Token
			$this->user_model->updateToken($username,$token);
		}
		$this->load->view('api/json.php',$data);
	}



}
