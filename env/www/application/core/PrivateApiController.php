<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PrivateApiController extends MY_Controller {

	function __construct() {
        parent::__construct();

        $this->load->library('auth');
		$this->load->driver('cache', array('adapter' => 'file'));
		
		// Check if the user is logged in
		$this->validate_logged_in();
	}


	private function validate_logged_in() {
		// get auth token from headers
		$auth_token = $this->input->get_request_header('Authorization', TRUE);

		// get passport from params
		$body = json_decode(file_get_contents("php://input"));
		if(!is_object($body) || !property_exists($body,'passport')) { header_status(500); die(); }
        $passport = $body->passport;

		$is_logged = $this->auth->logged_in($this->cache, $auth_token, $passport);

		// if the user is not logged in return error
		if (!$is_logged) {
			$data = array();
			$data['r'] = 1;
			$data['d'] = Cons::ERR_AUTH_TOKEN;
			echo $this->load->view('json', $data, TRUE);
			exit();
		}
	}

	public function get_token($passport) {
		return $this->auth->get_token($this->cache, $passport);
	}
}