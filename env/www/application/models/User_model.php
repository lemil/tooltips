<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_BasicModel {

        private $table = 'user';

        //
        public function __construct(){
                parent::__construct();
        }

        public function getAll() {
                return $this->getGenericAll($this->table);
        }

        public function getById($id)
        {
               return $this->getGenericById($this->table,$id);
        }

        public function getByUsername($username)
        {
                $sql = $this->queries->getGenericByFieldLike($this->table,'username',1) ;
                $query = $this->query($sql,$username);
                return $query->result_array();
        }


        public function updatePassword($id,$pwd) {
                $sql = $this->queries->updatePassword();
                $passHash = hash('sha256', $pwd); 
                $query = $this->query($sql,array($passHash,$id));
                return $query->affected_rows;            
        }

        public function getUsername($id)
        {
                $rows = $this->getById($id);
                if(isset($rows)) {
                    foreach ($rows as $r) {
                        return $r['username'];
                    }
                } else {
                    return '';
                }
        }


        public function delete($id) {
                $sql = $this->queries->deleteGenericById($this->table);
                $query = $this->query($sql,$id);
                return;                 
        }

        public function toggleactive($id) {
                $sql = $this->queries->toggleactiveGenericById($this->table);
                $query = $this->query($sql,$id);
                return;                 
        }

        public function isValidTokenFormat($token){
                return !is_null($token) &&
                        is_string($token) &&
                        strlen($token) > 20 &&
                        strlen($token) < 50 &&
                        true ; 

        }
        public function isTokenValid($userName,$token)
        {
            //ValidateFormat
            if(!$this->isValidTokenFormat($token)){
                    return false;
            }
            return false; //TODO Change this
            //Check Cache
        }

        public function checkUserPass($username,$password) {
            $this->db->cache_on();
            $sql = $this->queries->checkUserPass();
            $passHash = hash('sha256', $password); 
            //echo $passHash; die();
            $rows = $this->first($sql,array($username,$passHash));
            $this->db->cache_off();
            if(is_array($rows)){
                $cant = intval( $rows['cant'] );
                if($cant == 1) {
                    return true;
                }
            }
            return false;
        }

        private function checkTokenInDB($username,$token){
                $this->db->cache_on();
                $sql = $this->queries->isTokenValid();
                $rows = $this->db->query($sql,array($username,$token));
                $this->db->cache_off();
                if(is_array($rows)){
                        $cant = $rows[0]->cant;
                        if($cant == 1) {
                                return true;
                        }
                }
                return false;
        }

        public function updateToken($username,$token)
        {
                $sql = $this->queries->setToken();
                $query = $this->db->query($sql,array($username,$token));
                return ;
        }

}
