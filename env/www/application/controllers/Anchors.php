<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anchors extends PrivateWebController {

	private $location_names = array();
	private $article_names = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('anchor_model');
		$this->load->model('menu_model');
		$this->load->model('user_model');
        $this->load->model('location_model');
        $this->load->model('article_model');
		$this->load->library('grocery_CRUD');
	}


	public function _crud_output($output = null)
	{
		$title = 'Anchors';
		$output->title = $title;
		$output->bc = $this->menu_model->getBreadcrumb($title);
		$this->view('anchors/crud.php',(array)$output);
	}

	public function index()
	{
		return $this->manager();
	}


	public function manager()
	{
		$this->include_crudtheme = TRUE;

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('anchor');
		$crud->set_subject('Anchors');

		$crud->columns('id','locationId','active','articleId','selector','layout','cssclass','ts');

		$crud->display_as('ts','Updated');
		$crud->display_as('id','Anchor ID');
		$crud->display_as('articleId','Article');
		$crud->display_as('locationId','Location');
		$crud->display_as('cssclass','Css');



		$crud->callback_column('cssstyle',array($this,'_callback_short'));
		$crud->callback_column('cssclass',array($this,'_callback_short'));

		$crud->callback_column('selector'	,array($this,'_callback_short'));

		$crud->fields('id','locationId','articleId','selector','layout','cssclass','cssstyle','ts');

		$crud->add_fields('locationId','articleId','selector','layout','cssclass','cssstyle','active');
		$crud->edit_fields('locationId','articleId','selector','layout','cssclass','cssstyle','active');

		$crud->required_fields('locationId','articleId','selector','layout');

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

	    $crud->callback_column('cssclass',function ($value,$row) {
	    	$s = '<div style=" display:block; width: 120px">';
	    	$s .= '<div style=" display: inline-block; width: 120px" title="'.(isset($row->cssclass)?substr($row->cssclass):'').'" >class: '. (isset($row->cssclass)?substr($row->cssclass):'').'</div>' ;
	    	$s .= '<div style=" display: inline-block; width: 120px" title="'.(isset($row->cssstyle)?substr($row->cssclass):'').'" >style: '.(isset($row->cssstyle)?substr($row->cssclass):'').'</div>' ;
	    	$s .='</div>';
	    	return $s;
	    	
	    });

	    $crud->callback_column('active',function ($value,$row) {
	        $s = '';
	        $s .= '<a href="/locations/toggleactive/'.$row->id.'" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">';
			$s .= '<span class="ui-button-icon-primary ui-icon ui-icon-refresh"></span></a>';
	        $v = $value==1?'Active':'Inactive';
	        return $v.' '.$s;
	    });


		$crud->callback_add_field('layout',function () {
	        return "<div class='form-input-box' id='layout_input_box'>
					<select id='field-layout' name='layout' class='chosen-select' 
							data-placeholder='Select Layout' 
							style='width: 300px;'>
							<option value='bottom' selected>bottom</option>
							<option value='left'>left</option>
							<option value='right'>right</option>
							<option value='top'>top</option></select>
					</select>
					</div>";
	    });

		$crud->callback_column('locationId'	,function ($value) {
			$v = $value;
			if (sizeof($this->location_names) == 0) {
				$rows = $this->location_model->getAll();
				if(isset($rows) && sizeof($rows) > 0){
					foreach ($rows as $row) {
						$this->location_names[$row['id']] = $row['host']; 	
					} 
				}
			} 
			if(sizeof($this->location_names) > 0) {
				if(array_key_exists($v, $this->location_names)){
					$v = 'id:'.$v. ', host:'.$this->location_names[$v];
				} else {
					$v = 'id:'.$v. ', Unknown record';
				}
			}
			return $v;
	    });

		$crud->callback_column('articleId'	,function ($value) {
			$v = $value;
			if (sizeof($this->article_names) == 0) {
				$rows = $this->article_model->getAll();
				if(isset($rows) && sizeof($rows) > 0){
					foreach ($rows as $row) {
						$this->article_names[$row['id']] = $row['postId']; 	
					} 
				}
			} 
			if(sizeof($this->article_names) > 0) {
				if(array_key_exists($v, $this->article_names)){
					$v = 'id:'.$v.', postId:'.$this->article_names[$v];
				} else {
					$v = 'id:'.$v.', postId:Unknown';
				}
			}
			return $v;
	    });

		$crud->unset_clone();
		$crud->unset_delete();		
		$crud->unset_read();
		$crud->unset_print();
		$crud->unset_export();

		$crud->add_action('Delete', '', 'anchors/del','ui-icon-circle-minus');
		
		$output = $crud->render();

		$this->_crud_output($output);
	}

	public function _callback_short($value, $row)
	{
	  $i = 15;
	  $s = substr($value,0,$i).(strlen($value) > $i?'...':'');
	  $d = '<span title="'.$value.'" >'.$s.'</span>';
	  return $d;
	}

	public function del($id) {
		$this->anchor_model->delete($id);
		return redirect('anchors/manager'); 
	}

	public function toggleactive($id) {
		$this->anchor_model->toggleactive($id);
		return redirect('anchors/manager'); 
	}

}
