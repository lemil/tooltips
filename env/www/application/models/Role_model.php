<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model {

        private $table = 'role';

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
                $query = $this->db->query($sql,$username);
                return $query->result_array();
        }

        public function delete($id) {
                $sql = $this->queries->deleteGenericById($this->table);
                $query = $this->db->query($sql,$id);
                return;                 
        }

        public function deleteByPk($userId, $role) {
                $sql = $this->queries->deleteRoleByPk();
                $query = $this->db->query($sql,array($userId, $role));
                return;                 
        }   
}
