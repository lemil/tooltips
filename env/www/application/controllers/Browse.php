<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."/third_party/PHPExcel.php"; 

class Browse extends PrivateWebController {

	//
	public function __construct(){
		parent::__construct();
        $this->load->database();
  		$this->load->model('browse_model');
		$this->load->model('menu_model');
	}

	//
	public function index() {
		$data = array();
		$title = 'Browse';
		$data['title'] = $title;
		$data['bc'] = $this->menu_model->getBreadcrumb($title);
		$data['tables'] = array(	
									'article','user','status','location','layout','anchor'
								);

		$this->view('browse/main', $data);
	}


	public function table($table) 
	{
		$rows = $this->getAll($table);
		$data = array();
		$data['table'] = $table;
		$data['rows'] = $rows;

		$this->load->view('browse/table', $data);
	}

	public function getAll($table) {
		$rows = $this->browse_model->getAll($table);
		if(!isset($rows) || !is_array($rows)) {
			return array();
		} else {
			return $rows;
		}
	}





}
