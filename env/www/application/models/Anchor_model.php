<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Anchor_model extends CI_BasicModel {

        private $table = 'anchor';

        //
        public function __construct(){
                parent::__construct();
        }

        public function getById($ttipId)
        {
                $sql = $this->queries->getGenericById($this->table);
                $query = $this->db->query($sql,$id);
                return $query->result_array();
        }

        public function getByUsername($username)
        {
                $sql = $this->queries->getGenericByFieldLike($this->table,'username',1) ;
                $query = $this->query($sql,$username);
                return $query->result_array();
        }

        public function delete($id) {
                $sql = $this->queries->deleteGenericById($this->table);
                $query = $this->db->query($sql,$id);
                return;                 
        }
        
        public function update($id,$username,$token,$active) {
                $sql = $this->queries->updateAnchor();
                $query = $this->db->query($sql, array($locationId,$ttipId,$selector,$id));
                return;                 
        }
               
        public function toggleactive($id) {
                $sql = $this->queries->toggleactiveGenericById($this->table);
                $query = $this->query($sql,$id);
                return;                 
        }

}
