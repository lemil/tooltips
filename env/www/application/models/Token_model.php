<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Token_model extends CI_Model {

        //
        public function __construct(){
                parent::__construct();
                $this->load->library('queries');
        }

        public function newToken($salt = 'token')
        {
                $tokensalt = substr(trim($salt)+'daskjdhsadk'. microtime(true) ,0, 16);
                $hash = hash('sha256', $tokensalt); //32 chars
                return $hash;
        }

}
