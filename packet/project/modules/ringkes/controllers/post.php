<?php

	if (!defined("BASEPATH")) exit("No direct script access allowed"); 

	class post extends CI_Controller{ 

	public function __construct()	

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper(array("url","string","form"));
   
		$this->data = null; 
  
	}
	function post_read(){
  		
		$dt = $this->db->get("post");

        echo json_encode($dt->result());
	}	
	function post_id_search(){
		
		$id = trim($this->input->post("post_id"));

		$this->db->where("post_id",$id);

		$dt = $this->db->get("post");

        echo json_encode($dt->result());
	}	
	function post_nama_search($nama){
  
		$this->db->where("post_nama",$nama);

		$dt = $this->db->get("post");

        echo json_encode($dt->result());
	}	
	function post_add(){ 
  
		$data_add = array(
		"post_author" =>trim($this->input->post("post_author")),
		"post_date" =>trim($this->input->post("post_date")),
		"post_date_edit" =>trim($this->input->post("post_date_edit")),
		"post_nama" =>trim($this->input->post("post_nama")),
		"post_content" =>trim($this->input->post("post_content")),
		"post_keywords" =>trim($this->input->post("post_keywords")),
		"post_status" =>trim($this->input->post("post_status")),
		"post_tag" =>trim($this->input->post("post_tag")),
		"post_picture" =>trim($this->input->post("post_picture"))
		);

		$query = $this->db->insert("post",$data_add);
  
		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function post_update(){ 
  
		$data_update = array(
		"post_author" =>trim($this->input->post("post_author")),
		"post_date" =>trim($this->input->post("post_date")),
		"post_date_edit" =>trim($this->input->post("post_date_edit")),
		"post_nama" =>trim($this->input->post("post_nama")),
		"post_content" =>trim($this->input->post("post_content")),
		"post_keywords" =>trim($this->input->post("post_keywords")),
		"post_status" =>trim($this->input->post("post_status")),
		"post_tag" =>trim($this->input->post("post_tag")),
		"post_picture" =>trim($this->input->post("post_picture"))
		);

		$post_id = trim($this->input->post("post_id"));

		$this->db->where("post_id",$post_id);

		$query = $this->db->update("post",$data_update);

		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function post_del()

		{	

			$post_id = trim($this->input->post("post_id"));

			$this->db->where("post_id",$post_id);

			$query = $this->db->delete("post");

			if($query){

				$nam = array("result"=>"success");

			}

			echo $x = json_encode($nam);

		}
}
?>