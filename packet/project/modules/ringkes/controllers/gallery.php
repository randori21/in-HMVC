<?php

	if (!defined("BASEPATH")) exit("No direct script access allowed"); 

	class gallery extends CI_Controller{ 

	public function __construct()	

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper(array("url","string","form"));
   
		$this->data = null; 
  
	}
	function gallery_read(){
  		
		$dt = $this->db->get("gallery");

        echo json_encode($dt->result());
	}	
	function gallery_id_search(){
		
		$id = trim($this->input->post("gallery_id"));

		$this->db->where("gallery_id",$id);

		$dt = $this->db->get("gallery");

        echo json_encode($dt->result());
	}	
	function gallery_nama_search($nama){
  
		$this->db->where("gallery_nama",$nama);

		$dt = $this->db->get("gallery");

        echo json_encode($dt->result());
	}	
	function gallery_add(){ 
  
		$data_add = array(
		"gallery_nama" =>trim($this->input->post("gallery_nama")),
		"gallery_thumb" =>trim($this->input->post("gallery_thumb")),
		"gallery_keterangan" =>trim($this->input->post("gallery_keterangan")),
		"jnsusr_jnsusr_id" =>trim($this->input->post("jnsusr_jnsusr_id"))
		);

		$query = $this->db->insert("gallery",$data_add);
  
		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function gallery_update(){ 
  
		$data_update = array(
		"gallery_nama" =>trim($this->input->post("gallery_nama")),
		"gallery_thumb" =>trim($this->input->post("gallery_thumb")),
		"gallery_keterangan" =>trim($this->input->post("gallery_keterangan")),
		"jnsusr_jnsusr_id" =>trim($this->input->post("jnsusr_jnsusr_id"))
		);

		$gallery_id = trim($this->input->post("gallery_id"));

		$this->db->where("gallery_id",$gallery_id);

		$query = $this->db->update("gallery",$data_update);

		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function gallery_del()

		{	

			$post_id = trim($this->input->post("gallery_id"));

			$this->db->where("gallery_id",$post_id);

			$query = $this->db->delete("gallery");

			if($query){

				$nam = array("result"=>"success");

			}

			echo $x = json_encode($nam);

		}
}
?>