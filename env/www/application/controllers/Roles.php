<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles extends PrivateWebController {

	private $user_names = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('role_model');
		$this->load->model('user_model');
		$this->load->model('menu_model');
		$this->load->library('grocery_CRUD');
	}

	public function _crud_output($output = null)
	{
		$title = 'Roles';
		$output->title = $title;
		$output->bc = $this->menu_model->getBreadcrumb($title);
		$this->view('roles/crud.php',(array)$output);
	}

	public function index()
	{
		redirect('/roles/manager');
	}


	public function manager()
	{
		$this->include_crudtheme = TRUE;

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('role');
		$crud->set_subject('Roles');

		$crud->set_primary_key('userId','role');
		$crud->columns('userId','role','ts');

		$crud->display_as('ts','Updated');
		$crud->display_as('userId','User ID');

		$crud->fields('userId','role','ts');

		$crud->add_fields('userId','role');
		$crud->edit_fields('role');

		$crud->required_fields('userId','role');


		$crud->callback_column('userId'	,function ($value) {
			$v = $value;
			if (sizeof($this->user_names) == 0) {
				$rows = $this->user_model->getAll();
				if(isset($rows) && sizeof($rows) > 0){
					foreach ($rows as $row) {
						$this->user_names[$row['id']] = $row['username']; 	
					} 
				}
			} 
			if(sizeof($this->user_names) > 0) {
				if(array_key_exists($v, $this->user_names)){
					$v =  $v.' - '.$this->user_names[$userId];
				}	
			}
			return $v;
	    });

		$crud->callback_add_field('role',function () {
	        return "<div class='form-input-box' id='role_input_box'>
					<select id='field-role' name='role' class='chosen-select' 
							data-placeholder='Select role' 
							style='width: 300px;'>
							<option value='backend'>Backend</option>
							<option value='api'>Api</option>
							<option value='admin' selected>Admin</option>
					</select>
					</div>";
	    });

		$crud->callback_add_field('role',function () {
	        return "<div class='form-input-box' id='role_input_box'>
					<select id='field-role' name='role' class='chosen-select' 
							data-placeholder='Select role' 
							style='width: 300px;'>
							<option value='backend'>Backend</option>
							<option value='api'>Api</option>
							<option value='admin' selected>Admin</option>
					</select>
					</div>";
	    });

		$crud->unset_clone();
		$crud->unset_delete();		
		$crud->unset_read();
		$crud->unset_print();
		$crud->unset_export();



		$crud->callback_column('userId'	,function ($value) {
			$v = $value;
			if (sizeof($this->user_names) == 0) {
				$rows = $this->user_model->getAll();
				if(isset($rows) && sizeof($rows) > 0){
					foreach ($rows as $row) {
						$this->user_names[$row['id']] = $row['username']; 	
					} 
				}
			} 
			if(sizeof($this->user_names) > 0) {
				if(array_key_exists($v, $this->user_names)){
					$v =  $v.' - '.$this->user_names[$v];
				} else {
					$v =  $v.' - Unknown';
				}
			}
			return $v;
	    });



		$crud->callback_before_insert(function($post_array){
			$userId = $post_array['userId'];
			$role = $post_array['role'];
			$this->role_model->deleteByPK($userId, $role);
			return $post_array;
		}); 

		$crud->add_action('Delete', '', 'roles/del','ui-icon-circle-minus',array($this,'add_action_delete'));
		
		$output = $crud->render();

		$this->_crud_output($output);
	}

	public function add_action_delete($pk,$row){
		return site_url('roles/del/').$row->userId.'/'.$row->role;
	}

	public function del($userId, $role) {
		$this->role_model->deleteByPK($userId, $role);
		return redirect('roles/manager'); 
	}


}
