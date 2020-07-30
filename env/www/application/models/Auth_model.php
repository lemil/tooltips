<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

        //private $table = 'menu';

        //
        public function __construct(){
                parent::__construct();
        }

        public function getAuth(){
                $username = '';
                $avatar = '/assets/icon/user.png';
                $http = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ) ? 'https': 'http';
                if( $this->session->userdata('islogged')) {
                        $username = $this->session->userdata('username');
                        $avatar = $http.'://api.adorable.io/avatars/40/'.$username.'.png';
                }

                if($this->session->userdata('islogged')==1){
                        $user = '';
                }
                $json = '{"username":"'.$username.'","avatar":"'.$avatar.'"}';
                $data = json_decode($json);
                return $data;
        }

}
