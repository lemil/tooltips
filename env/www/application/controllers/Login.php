<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.comwelcome
	 *	- or -
	 * 		http://example.comwelcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	//
	public function __construct(){
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('user_model');
	}

	public function index() {
		$data = array();
		$this->include_menu = false;
		$this->view('login/form', $data );
	}

	public function login(){
		$username = $this->input->post('uname',NULL);
		$password = $this->input->post('psw',NULL);
		$ispostback = isset($username) && isset($username);

		//Check Password and Role (Only Admin and Backend roles may access)
		$logged = $this->user_model->checkUserPass($username,$password);
		
		$data = array();
		if($logged && $ispostback){
			$this->setLogged(true,$username);
			return redirect('/menu'); 
		} else {
			$this->setLogged(false,$username);
			$data['ispostback'] = true;
			$data['msg'] = 'Invalid Username or Password';
			$this->include_menu = false;
			$this->view('login/form', $data );
		}
	}

	public function logout(){
		$this->setLogged(false);
		redirect('/login'); 
	}

	private function setLogged($isLogged,$username = null){

		if($isLogged){
			parent::doLogin($username);
		} else {
			parent::doLogout();
		}
	} 



}
