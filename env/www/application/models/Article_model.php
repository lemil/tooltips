<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_BasicModel {

        private $table = 'article';

        //
        public function __construct(){
                parent::__construct();
                $this->load->library('queries');
                $this->load->model('menu_model');
        }

        public function getAll() {
                return $this->getGenericAll($this->table);
        }

        public function getById($id)
        {
                $sql = $this->queries->getGenericById($this->table);
                $query = $this->db->query($sql,$id);
                //var_dump($query->result_array());

                return $query->result_array();
        }

        public function getByPostId($postId)
        {
                $sql = $this->queries->getGenericByFieldEquals($this->table,'postId',1); 
                $query = $this->db->query($sql,$postId);
                return $query->result_array();
        }

        public function delete($id) {
                $sql = $this->queries->deleteGenericById($this->table);
                $query = $this->db->query($sql,$id);
                return;                 
        }
        
        public function update($id,$url,$title,$image,$text) {
                $sql = $this->queries->updateTtip();
                $query = $this->db->query($sql,array($url,$title,$image,$text,$id));
                return;                 
        }
                
        public function toggleactive($id) {
                $sql = $this->queries->toggleactiveGenericById($this->table);
                $query = $this->query($sql,$id);
                return;                 
        }

}
