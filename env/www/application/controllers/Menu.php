<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends PrivateWebController {

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
		$this->load->model('menu_model');
		$this->load->model('auth_model');
	}

	public function json(){
		$data  = array();
		$data['r'] = 1;
		$d = array(	'menu'=> $this->menu_model->getMenu(),
					'auth'=>$this->auth_model->getAuth());
		$data['d'] = $d;  
		$this->load->view('general/json', $data);
	}	

	public function index() {
		$data = array();
		$data['tables'] = $this->menu_model->getMenu()->items;
		$this->view('menu/menu', $data );

	}

	public function sub($item = 'full'){
		$data = array();
		$data['tables'] = $this->menu_model->getMenu($item)->items;
		$this->view('menu/menu', $data );
	}

	public function breadcrumbs($title = ''){		
		$data = array();
		$data['r'] = 1;
		$data['d'] = array(); 

		if($title == '') {
			//
		} else {
			$bc = $this->menu_model->getBreadcrumb($title);
			$items = array('items' => $bc);
			$data['d'] = $items;
		}	
		$this->load->view('general/json', $data);
	}


}
