<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location_model extends CI_BasicModel {

        private $table = 'location';

        //
        public function __construct(){
                parent::__construct();
                $this->load->library('queries');
                $this->load->model('menu_model');
        }

        public function getAll() {
                return $this->getGenericAll($this->table);
        }

        public function getById($ttipId)
        {
                $sql = $this->queries->getGenericById($this->table);
                $query = $this->db->query($sql,$id);
                return $query->result_array();
        }

        public function getByUsername($username)
        {
                $sql = $this->queries->getLocationByUsername(); 
                $query = $this->db->query($sql,$username);
                return $query->result_array();
        }

        public function update($id,$userId,$host,$pattern) {
                $sql = $this->queries->updateLocation($userId,$host,$pattern,$id);
                $query = $this->db->query($sql);
                return ;                 
        }

        public function delete($id) {
                $sql = $this->queries->deleteGenericById($this->table);
                $query = $this->db->query($sql, $id);
                return;                 
        }
                
        public function toggleactive($id) {
                $sql = $this->queries->toggleactiveGenericById($this->table);
                $query = $this->query($sql,$id);
                return;                 
        }


}
