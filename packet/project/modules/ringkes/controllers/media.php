<?php

	if (!defined("BASEPATH")) exit("No direct script access allowed"); 

	class media extends CI_Controller{ 

	public function __construct()	

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper(array("url","string","form"));
   
		$this->data = null; 
  
	}
	function media_read(){
  		
		$dt = $this->db->get("media");

        echo json_encode($dt->result());
	}	
	function media_id_search(){
		
		$id = trim($this->input->post("media_id"));

		$this->db->where("media_id",$id);

		$dt = $this->db->get("media");

        echo json_encode($dt->result());
	}	
	function media_nama_search($nama){
  
		$this->db->where("media_nama",$nama);

		$dt = $this->db->get("media");

        echo json_encode($dt->result());
	}	
	function media_add(){ 
  
		$data_add = array(
		"media_nama" =>trim($this->input->post("media_nama")),
		"media_file" =>trim($this->input->post("media_file")),
		"media_alt" =>trim($this->input->post("media_alt")),
		"media_post" =>trim($this->input->post("media_post")),
		"post_post_id" =>trim($this->input->post("post_post_id"))
		);

		$query = $this->db->insert("media",$data_add);
  
		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function media_update(){ 
  
		$data_update = array(
		"media_nama" =>trim($this->input->post("media_nama")),
		"media_file" =>trim($this->input->post("media_file")),
		"media_alt" =>trim($this->input->post("media_alt")),
		"media_post" =>trim($this->input->post("media_post")),
		"post_post_id" =>trim($this->input->post("post_post_id"))
		);

		$media_id = trim($this->input->post("media_id"));

		$this->db->where("media_id",$media_id);

		$query = $this->db->update("media",$data_update);

		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function media_del()

		{	

			$post_id = trim($this->input->post("media_id"));

			$this->db->where("media_id",$post_id);

			$query = $this->db->delete("media");

			if($query){

				$nam = array("result"=>"success");

			}

			echo $x = json_encode($nam);

		}
}
?>