<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locations extends PrivateWebController {

	private $user_names = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('location_model');
		$this->load->model('user_model');
		$this->load->model('menu_model');
		$this->load->library('grocery_CRUD');
	}

	public function _crud_output($output = null)
	{
		$title = 'Locations';
		$output->title = $title;
		$output->bc = $this->menu_model->getBreadcrumb($title);
		$this->view('locations/crud.php',(array)$output);
	}

	public function index()
	{
		$data = array();
		$this->view('locations/main.php',$data);
	}


	public function manager()
	{
		$this->include_crudtheme = TRUE;

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('location');
		$crud->set_subject('Location');

		$crud->columns('id','userId','host','pattern','active','ts');

		$crud->display_as('ts','Updated');
		$crud->display_as('id','Location ID');
		$crud->display_as('userId','User ID');

		$crud->callback_column('pattern'	,array($this,'_callback_short'));

		$crud->fields('status','postId', 'layout', 'class', 'style');

		$crud->add_fields('userId','host','pattern','active');
		$crud->edit_fields('host','pattern','active');

		$crud->required_fields('userId','host','pattern','active');

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


		$crud->callback_column('active',function ($value,$row) {
	        $s = '';
	        $s .= '<a href="/locations/toggleactive/'.$row->id.'" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">';
			$s .= '<span class="ui-button-icon-primary ui-icon ui-icon-refresh"></span></a>';
	        $v = $value==1?'Active':'Inactive';
	        return $v.' '.$s;
	    });



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



		$crud->unset_clone();
		$crud->unset_delete();		
		$crud->unset_read();
		$crud->unset_print();
		$crud->unset_export();

//		$crud->add_action('Toggle Active', '', 'locations/toggleactive','ui-icon-refresh');
		$crud->add_action('Delete', '', 'locations/del','ui-icon-circle-minus');
		
		$output = $crud->render();

		$this->_crud_output($output);
	}

	public function _callback_short($value, $row)
	{
		$i = 15;
	  return substr($value,0,$i).(strlen($value) > $i?'...':'');
	}

	public function del($id) {
		$this->location_model->delete($id);
		return redirect('locations/manager'); 
	}


	public function toggleactive($id) {
		$this->location_model->toggleactive($id);
		return redirect('locations/manager'); 
	}


}
