<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends MY_Controller {

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
	}

	public function index()
	{
		$this->view('errors/error_general');
	}

	public function 404()
	{
		$this->view('errors/error_404');
	}


}
