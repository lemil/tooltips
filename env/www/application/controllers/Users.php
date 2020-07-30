<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends PrivateWebController {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('user_model');
		$this->load->model('menu_model');
		$this->load->library('grocery_CRUD');
	}


	public function _crud_output($output = null)
	{
		$title = 'Users';
		$output->title = $title;
		$output->bc = $this->menu_model->getBreadcrumb($title);
		$this->view('users/crud.php',(array)$output);
	}

	public function index()
	{
		redirect('users/manager');
	}


	public function manager()
	{
		$this->include_crudtheme = TRUE;

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('user');
		$crud->set_subject('User');

		$crud->columns('username','passHash','token','active','ts');

		$crud->display_as('username','User');
		$crud->display_as('passHash','Password');
		$crud->display_as('ts','Updated');
		$crud->display_as('id','User ID');

		$crud->callback_column('token'	,array($this,'_callback_short'));

		$crud->fields('id','username','token','active','ts');

		$crud->add_fields('username','token','active');
		$crud->edit_fields('token','active');

		$crud->required_fields('username','token','active');

		$crud->callback_column('active',function ($value) {
			return ($value == "1")?"Yes":"No";
	    });

		$crud->callback_column('username',function ($value,$row) {
			return $value .' ('.$row->id.')';
		});

		$crud->callback_column('passHash',function ($value,$row) {
			$s = '';
			$s .='<a href="/users/resetpass/'.$row->id.'" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">';
			$s .='<span class="ui-button-icon-primary ui-icon  ui-icon-key"></span><span class="ui-button-text">&nbsp;Reset</span></a>';
			return $s;
		});

		$crud->callback_add_field('active',function () {
	        return "<div class='form-input-box' id='active_input_box'>
					<select id='field-active' name='active' class='chosen-select' 
							data-placeholder='Select active' 
							style='width: 300px;'>
							<option value='1' selected>Yes</option>
							<option value='0'>No</option></select>
					</select>
					</div>";
	    });

		$crud->callback_edit_field('active',function () {
	        return "<div class='form-input-box' id='active_input_box'>
					<select id='field-active' name='active' class='chosen-select' 
							data-placeholder='Select active' 
							style='width: 300px;'>
							<option value='1' selected>Yes</option>
							<option value='0'>No</option></select>
					</select>
					</div>";
	    });

		$crud->unset_clone();
		$crud->unset_delete();		
		$crud->unset_read();
		$crud->unset_print();
		$crud->unset_export();

		$crud->add_action('Toggle Active', '', 'users/toggleactive','ui-icon-refresh');
		$crud->add_action('Delete', '', 'users/del','ui-icon-circle-minus');
		
		$output = $crud->render();

		$this->_crud_output($output);
	}

	public function _callback_short($value, $row)
	{
		$i = 15;
	  return substr($value,0,$i).(strlen($value) > $i?'...':'');
	}

	public function resetpass($id){
		$data = array();
		$data['message']  = array();
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			//Postback

			//TODO Check equals
			$pwd = $this->input->post('pwd',null);
			$pwd2 = $this->input->post('pwd2',null);

			//Validations
			$passed = true;

			//TODO Checkfor Admin Permissions
			$role = 'admin'; //$this->getRoles();
			if($role == 'admin' && $passed) {
				//Nada
			} else {
				$passed = false;
				$data['message']['Check Permissions'] = 'You do not have permission to do this';
			}

			//
			if($pwd == $pwd2 && $passed) {
				//Nada
			} else {
				$passed = false;
				$data['message']['Password Match'] = 'Passwords do not match';
			}

			if($passed) {
				$this->user_model->updatePassword($id,$pwd);
		 		return redirect('users/manager'); 
			}
		} 

		//Show Form
		$title = 'Users';
		$data['title'] = $title;
		$data['bc'] = $this->menu_model->getBreadcrumb($title);
        $json = '{"title":"Reset Password","type":"item","href":"/users/resetpass/'.$id.'","icon":"/assets/icon/page.png","target":"_self"}';
        $nbc = json_decode($json);
        $data['bc'][2] = $nbc;
        $data['userId'] = $id;
        $data['username'] = $this->user_model->getUsername($id);

		$this->view('users/resetpass',$data);
		
	}

	public function del($id) {
		$this->user_model->delete($id);
		return redirect('users/manager'); 
	}

	public function toggleactive($id) {
		$this->user_model->toggleactive($id);
		return redirect('users/manager'); 
	}

}
