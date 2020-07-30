<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once('PrivateWebController.php');
include_once('PrivateApiController.php');

/**
 * Application Base Controller Class
 */
class MY_Controller extends CI_Controller {

	public $include_theme = TRUE;
	public $include_crudtheme = FALSE;
	public $include_menu = TRUE;
	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function view($view,$data = null) {

		if($data == null) { $data = array(); }

		$data['include_menu'] = $this->include_menu;

		if($this->include_crudtheme) {
			$this->load->view('theme/header_crud',$data);
			$this->load->view($view,$data);
			$this->load->view('theme/footer_crud',$data);
		} else {
			if($this->include_theme) {
				$this->load->view('theme/header',$data);
			}
			$this->load->view($view,$data);
			if($this->include_theme) {
				$this->load->view('theme/footer',$data);
			}
		}
	}

	public function isLogged(){
		$a = $this->session->userdata('islogged');
		return !isset($a)?false:$a;
	}

	public function doLogin($username){
		$this->session->set_userdata('islogged', true);
		$this->session->set_userdata('startdate',date('Y-m-d H:i:s'));
		$this->session->set_userdata('username', $username);
	}

	public function doLogout($username = null){
		$this->session->unset_userdata('islogged');
		$this->session->unset_userdata('startdate');
		$this->session->unset_userdata('username');
	}

}
