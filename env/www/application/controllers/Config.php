<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends PrivateWebController {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->model('ttip_model');
		$this->load->model('menu_model');
	}

	public function index()
	{
		$this->include_crudtheme = FALSE;
		$this->include_theme = TRUE;
		$data = array();
		$this->view('config/main.php',$data);
	}

}
