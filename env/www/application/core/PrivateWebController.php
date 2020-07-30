<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PrivateWebController extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('auth');
		$this->load->driver('cache', array('adapter' => 'file'));
		
		// Check if the user is logged in
		$this->validate_logged_in();
	}

	private function validate_logged_in() {
		if (!$this->isLogged()) {
			header('Location: login/logout');
			return;
		}
	}


}
