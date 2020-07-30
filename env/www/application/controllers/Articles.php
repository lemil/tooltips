<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends PrivateWebController {

	private $defaultImage = 'https://help.embluemail.com/wp-content/uploads/2017/07/Logos-emblue-blanco-03.png';
	private $defaultTitle = 'Default title';
	private $defaultText = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

	//
	private $postWsUrl = 'https://help.embluemail.com/wp-json/wp/v2/posts/';
	private $postUrl = 'http://help.embluemail.com/?p=';

	private $user_names = array();

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->model('article_model');
		$this->load->model('menu_model');
		$this->load->model('user_model');
		$this->load->library('grocery_CRUD');
	}


	public function _crud_output($output = null)
	{
		$title = 'Articles';
		$output->title = $title;
		$output->bc = $this->menu_model->getBreadcrumb($title);
		$this->view('articles/crud.php',(array)$output);
	}

	public function index()
	{
		$data = array();
		$this->view('articles/main.php',$data);
	}


	public function manager()
	{
		return $this->article();
	}

	public function article()
	{
		$this->include_crudtheme = TRUE;

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('article');
		$crud->set_subject('Article');

		$crud->columns('preview','userId','postId','active','url','title','image','text');

		$crud->display_as('ts','Updated');
		$crud->display_as('postId','Post ID');
		$crud->display_as('userId','User ID');
		$crud->display_as('preview','Article Id');

		$crud->callback_column('postId',array($this,'_callback_postId'));

		$crud->callback_column('url',array($this,'_callback_url'));

		$crud->callback_column('preview',array($this,'_callback_id'));
		$crud->callback_column('image',array($this,'_callback_short_ulr'));
		$crud->callback_column('title',array($this,'_callback_short'));
		$crud->callback_column('text',array($this,'_callback_short'));


 	    $crud->callback_before_insert( function($post_array) { 
					//log_message('ERROR','-------------------->>>>>callback_before_insert:');
					return $this->article_completerecord($post_array); } );

 	    $crud->callback_before_update( function($post_array,$primary_key) { 
					//log_message('ERROR','-------------------->>>>>callback_before_update:');
					return $this->article_completerecord($post_array); } );

		$crud->fields('active','postId');

		$crud->add_fields('userId','postId','active','url','title','image','text');
		$crud->edit_fields('id','userId','postId','active','url','title','image','text');

		$crud->required_fields('userId','active','postId');


		$crud->change_field_type('postId', 'integer');

		$crud->callback_add_field('active',function () {
	        return "<div class='form-input-box' id='active_input_box'>
					<select id='field-active' name='active' class='chosen-select' 
							data-placeholder='Select Status' 
							style='width: 300px;'>
							<option value='1' selected>Active</option>
							<option value='0'>Inactive</option>
					</select>
					</div>";
	    });

		$crud->callback_column('active',function ($value,$row) {
	        $s = '';
	        $s .= '<a href="/articles/toggleactive/'.$row->id.'" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">';
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

//		$crud->unset_add();
//		$crud->unset_edit();
		$crud->unset_clone();
		$crud->unset_delete();		
		$crud->unset_read();
		$crud->unset_print();
		$crud->unset_export();

		$crud->set_rules('postId','Post ID ', 'required');

		$crud->add_action('Refresh', '', 'articles/refresh','ui-icon-refresh');
		$crud->add_action('Delete', '', 'articles/del','ui-icon-circle-minus');

		$output = $crud->render();

		$this->_crud_output($output);
	}


	public function _callback_active($value, $row)
	{
		$s = "";
		$s .= "<a href='#' onmouseover='ttip(true)' title='$value' target='_blank'><img style='float:left' src='/assets/icon/loading_ball.gif' width='16' height='16'/></a> ";
		return $s;
	}


	public function _callback_short($value, $row)
	{
		$i = 10;
	  return substr($value,0,$i).(strlen($value) > $i?'...':'');
	}


	public function _callback_short_ulr($value, $row)
	{
		$i = 12;
	  return "<a href='".$this->postWsUrl.$value."' target='_blank' title='$value' >".substr($value,0,$i).(strlen($value) > $i?'...':'')."</a>";
	}

 
	public function _callback_postId($value, $row)
	{
		if(!isset($value) || strlen($value) < 1) {
			return '';
		}
		$s = "$value";
		$s .= "<a href='".$this->postUrl.$value."' title='".$this->postUrl.$value."' target='_blank'><img style='float:right' src='/assets/icon/popup.png' width='16' height='16'/></a>";
		return $s;
	}
 
 
	public function _callback_id($value, $row)
	{
		$s = "";
		$s .= "<image src='/assets/icon/help.png' height='14px' width='14px' data-articleid='$row->id' data-type='tooltip' />&nbsp;&nbsp;";
		$s .= $row->id;
		return $s;
	}
 


	public function _callback_url($value, $row)
	{	
		if(!isset($value) || strlen($value) < 1) {
			return '';
		}
		$i = 10;
		return substr($value,0,$i).(strlen($value) > $i?'...':'')."<a href='".$value."' title='$value' target='_blank'><img style='float:right' src='/assets/icon/popup.png' width='16' height='16'/></a>";
	}
 
	public function refresh($articleId) {
		$row = $this->article_model->getById($articleId)[0];
		if(isset($row)) {
			$postId = $row['postId'];
			if(strlen($postId) > 0) {
				$image = ''; 
				$title = ''; 
				$text = '';
				$url = '';
				$data = $this->article_refreshurl($postId);

				//Update Record
				$this->article_model->update($articleId,$data['url'],$data['title'],$data['image'],$data['text']);
			}
		}
		//return $this->article();
		return redirect('articles/manager');
	}

	public function lookupHelp($postId = 0) {
		$data = array(); 
		if($postId != 0) {
			$data['row'] = $this->article_refreshurl($postId);
		}
		$this->include_theme = FALSE;
		$this->include_crudtheme = FALSE;
		$this->view('api/json.php',$data);
	}


	public function del($articleId) {
		$this->article_model->delete($articleId);
		return redirect('articles/manager'); 
	}

	
	private function article_refreshurl($postId) {
		$image = $this->defaultImage; 
		$title = $this->defaultTitle; 
		$text = $this->defaultText;
		$postId = empty($postId)?'-1':$postId;
		$url = $this->postWsUrl.$postId;
        $json = $this-> getJsonAsArray($url);

        if($json == NULL){
        	//Not found
        } else {
	        if(isset($json) 
	        	&& property_exists($json,'title') 
	        	&& isset($json->title) 
	        	&& property_exists($json->title,'rendered') ) {
		        $title = $json->title->rendered;
	        }

	        if(isset($json) 
	        	&& property_exists($json,'content') 
	        	&& isset($json->content) 
	        	&& property_exists($json->content,'rendered') ) {
		        $content = $json->content->rendered;
		    	$text = $this->getText($content);
		    	$image = $this->getImageSrc($content);
	        }
    	}

		$data = array(	'url'=>$url,
						'title'=>$title,
						'image'=>$image,
						'text'=>$text);
	    return $data;
	}


	private function article_completerecord($post_array)
	{	
		$image = ''; 
		$title = ''; 
		$text = '';
		$url = '';

//log_message('ERROR', 'POSTID :'.$post_array['postId'] );

		if(	!empty($post_array['postId']) 
			|| $post_array['postId'] != "0" )
	    {
	    	$postId = $post_array['postId'];
	    	$data = $this->article_refreshurl($postId);

	    	$url = $data['url'];
	    	$title = $data['title'];
	    	$image = $data['image'];
	    	$text = $data['text'];

			$post_array['text'] = $text;
			$post_array['image'] = $image;
			$post_array['title'] = $title;   
			$post_array['url'] = $url;   

//log_message('ERROR', 'article_completerecord COMPLETED!!'.$postId.','.$url.','.$title.','.$image.','.$text );

	    }
	    else
	    {
//log_message('ERROR', 'article_completerecord UNSET' );
	        unset($post_array['postId']);
	    }

	 	return $post_array;
	}

	private function getJsonAsArray($url) {
		@$json = file_get_contents($url);
		if($json == FALSE){
			return null;
		} else {
			return json_decode($json);
		}
	}

	private function getText($content){
		$s = $content;
		@$s = strip_tags($s);
		@$s = substr($s,0,100);
		return $s;
	}

	private function getImageSrc($content){
		$images = array();
		preg_match_all('/<img[^>]+>/i',$content, $images);
		if(is_array($images)
			&& is_array($images[0])
			&& sizeof($images[0])>0) {
			$srcs = array();
			$allimgs = $images[0][0];
			preg_match( '/src="([^"]*)"/i', $allimgs, $srcs ) ;

			if(is_array($srcs) 
				&& strlen($srcs[0]) > 5) {
				$s =  substr($srcs[0],5,-1);
    			return $s;
    		} 
		}
		return $this->defaultImage;			
	}

	public function toggleactive($id) {
		$this->article_model->toggleactive($id);
		return redirect('articles/manager'); 
	}

}
