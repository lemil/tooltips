<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Browse_model extends CI_BasicModel {

        private $table = 'browse';

        //
        public function __construct()
        {
                parent::__construct();
                $this->load->library('queries');
        }

        public function getAll($table) 
        {
                $sql = $this->queries->getGenericAll($table);
                $query = $this->query($sql);
                return $query->result_array();
        }

}
