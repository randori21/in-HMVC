<?php

	if (!defined("BASEPATH")) exit("No direct script access allowed"); 

	class crud extends CI_Controller{ 

	public function __construct()	

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper("url");

                
		$this->load->library("tank_auth");   
             
		$this->load->library("grocery_CRUD"); 
  
        $this->_init();
  
	}
  
    private function _init()
  
	{
  
		$this->output->set_template_boss($this->config->item("admin_template"));
  
        $this->output->set_title($this->config->item("admin_page"));
  

		$this->load->js("assets/templates/adminProject/js/jquery-1.9.1.min.js");
  
	}

	public function _example_output($output = null)
  
	{
  
		$this->load->view("output.php",$output);
  
	}
        
	function index($output = null)
  
	{
  
		$this->load->view("pertama.php",$output);	
  	
	}
	function gallery(){ 
  
		$crud = new grocery_CRUD();
  
		$crud->set_theme($this->config->item("crud_template"));
  
		$crud->set_table("gallery");
		$crud->display_as("gallery_id","id");
		$crud->display_as("gallery_nama","nama");
		$crud->display_as("gallery_thumb","thumb");
		$crud->display_as("gallery_keterangan","keterangan");
		$crud->set_relation("jnsusr_jnsusr_id","jnsusr","jnsusr_nama");
		$crud->display_as("jnsusr_jnsusr_id","jnsusr_id");
  
		$output = $crud->render();
  
		$this->_example_output($output);
  
	}
	function gambar(){ 
  
		$crud = new grocery_CRUD();
  
		$crud->set_theme($this->config->item("crud_template"));
  
		$crud->set_table("gambar");
		$crud->display_as("gambar_id","id");
		$crud->display_as("gambar_nama","nama");
		$crud->set_field_upload("gambar_file", "assets/uploads/files");
		$crud->display_as("gambar_file","file");
		$crud->display_as("gambar_alt","alt");
		$crud->display_as("gambar_post","post");
		$crud->set_relation("post_post_id","post","post_nama");
		$crud->display_as("post_post_id","post_id");
  
		$output = $crud->render();
  
		$this->_example_output($output);
  
	}
	function hak(){ 
  
		$crud = new grocery_CRUD();
  
		$crud->set_theme($this->config->item("crud_template"));
  
		$crud->set_table("hak");
		$crud->display_as("hak_id","id");
		$crud->display_as("hak_status","status");
		$crud->set_relation("jnsusr_jnsusr_id","jnsusr","jnsusr_nama");
		$crud->display_as("jnsusr_jnsusr_id","jnsusr_id");
  
		$output = $crud->render();
  
		$this->_example_output($output);
  
	}
	function jnsmenu(){ 
  
		$crud = new grocery_CRUD();
  
		$crud->set_theme($this->config->item("crud_template"));
  
		$crud->set_table("jnsmenu");
		$crud->display_as("jnsmenu_id","id");
		$crud->set_relation("jnsmenu_head","jnsmenu","jnsmenu_nama");
		$crud->display_as("jnsmenu_head","head");
		$crud->display_as("jnsmenu_nama","nama");
		$crud->display_as("jnsmenu_keterangan","keterangan");
		$crud->display_as("jnsmenu_post","post");
		$crud->set_field_upload("jnsmenu_file", "assets/uploads/files");
		$crud->display_as("jnsmenu_file","file");
		$crud->display_as("users_id","id");
  
		$output = $crud->render();
  
		$this->_example_output($output);
  
	}
	function jnsusr(){ 
  
		$crud = new grocery_CRUD();
  
		$crud->set_theme($this->config->item("crud_template"));
  
		$crud->set_table("jnsusr");
		$crud->display_as("jnsusr_id","id");
		$crud->display_as("jnsusr_nama","nama");
		$crud->display_as("jnsusr_keterangan","keterangan");
  
		$output = $crud->render();
  
		$this->_example_output($output);
  
	}
	function letak(){ 
  
		$crud = new grocery_CRUD();
  
		$crud->set_theme($this->config->item("crud_template"));
  
		$crud->set_table("letak");
		$crud->display_as("letak_id","id");
		$crud->display_as("letak_nama","nama");
		$crud->display_as("letak_keterangan","keterangan");
		$crud->set_relation("jnsmenu_jnsmenu_id","jnsmenu","jnsmenu_nama");
		$crud->display_as("jnsmenu_jnsmenu_id","jnsmenu_id");
  
		$output = $crud->render();
  
		$this->_example_output($output);
  
	}
	function link(){ 
  
		$crud = new grocery_CRUD();
  
		$crud->set_theme($this->config->item("crud_template"));
  
		$crud->set_table("link");
		$crud->display_as("link_id","id");
		$crud->display_as("link_address","address");
		$crud->display_as("link_nama","nama");
		$crud->display_as("link_keterangan","keterangan");
		$crud->set_relation("jnsusr_jnsusr_id","jnsusr","jnsusr_nama");
		$crud->display_as("jnsusr_jnsusr_id","jnsusr_id");
  
		$output = $crud->render();
  
		$this->_example_output($output);
  
	}
	function media(){ 
  
		$crud = new grocery_CRUD();
  
		$crud->set_theme($this->config->item("crud_template"));
  
		$crud->set_table("media");
		$crud->display_as("media_id","id");
		$crud->display_as("media_nama","nama");
		$crud->set_field_upload("media_file", "assets/uploads/files");
		$crud->display_as("media_file","file");
		$crud->display_as("media_alt","alt");
		$crud->display_as("media_post","post");
		$crud->set_relation("post_post_id","post","post_nama");
		$crud->display_as("post_post_id","post_id");
  
		$output = $crud->render();
  
		$this->_example_output($output);
  
	}
	function post(){ 
  
		$crud = new grocery_CRUD();
  
		$crud->set_theme($this->config->item("crud_template"));
  
		$crud->set_table("post");
		$crud->display_as("post_id","id");
		$crud->display_as("post_author","author");
		$crud->display_as("post_date","date");
		$crud->display_as("post_date_edit","date_edit");
		$crud->display_as("post_nama","nama");
		$crud->display_as("post_content","content");
		$crud->display_as("post_keywords","keywords");
		$crud->display_as("post_status","status");
		$crud->display_as("post_tag","tag");
		$crud->display_as("post_picture","picture");
		$crud->set_relation_n_n("detil_post", "relpost", "jnsmenu", "post_post_id", "jnsmenu_jnsmenu_id", "jnsmenu_nama","");
  
		$output = $crud->render();
  
		$this->_example_output($output);
  
	}
	function winget(){ 
  
		$crud = new grocery_CRUD();
  
		$crud->set_theme($this->config->item("crud_template"));
  
		$crud->set_table("winget");
		$crud->display_as("winget_id","id");
		$crud->display_as("winget_nama","nama");
		$crud->set_field_upload("winget_file", "assets/uploads/files");
		$crud->display_as("winget_file","file");
		$crud->display_as("winget_status","status");
		$crud->display_as("winget_posisi","posisi");
		$crud->display_as("winget_keterangan","keterangan");
		$crud->set_relation("jnsusr_jnsusr_id","jnsusr","jnsusr_nama");
		$crud->display_as("jnsusr_jnsusr_id","jnsusr_id");
  
		$output = $crud->render();
  
		$this->_example_output($output);
  
	}
}
?>