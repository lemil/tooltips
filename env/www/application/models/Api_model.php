<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_BasicModel {

        private $table = 'role';

        //
        public function __construct(){
                parent::__construct();
        }

        public function getActiveLocationsByUserHostPattern($userId,$host,$pattern)
        {
                $sql = $this->queries->getActiveLocationsByUserHostPattern();
                $query = $this->db->query($sql,array($userId,$host,$pattern));
                return $query->result_array();                
        }

        public function getActiveAnchorsByLocation($locationId)
        {
                $sql = $this->queries->getActiveAnchorsByLocation();
                $query = $this->db->query($sql,$locationId);
                return $query->result_array();
        }


        public function isValidUserId($userId) {
                if(!is_numeric($userId)) { return false; }
                if($userId < 1) { return false; }
                return true;
        }

        public function isValidReferer($url) {

                //Is an URL
                if(!filter_var($url, FILTER_VALIDATE_URL)) { 
                        return false; 
                } else {
                        return true;
                }
        }    
}
