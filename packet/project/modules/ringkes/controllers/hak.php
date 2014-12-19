<?php

	if (!defined("BASEPATH")) exit("No direct script access allowed"); 

	class hak extends CI_Controller{ 

	public function __construct()	

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper(array("url","string","form"));
   
		$this->data = null; 
  
	}
	function hak_read(){
  		
		$dt = $this->db->get("hak");

        echo json_encode($dt->result());
	}	
	function hak_id_search(){
		
		$id = trim($this->input->post("hak_id"));

		$this->db->where("hak_id",$id);

		$dt = $this->db->get("hak");

        echo json_encode($dt->result());
	}	
	function hak_add(){ 
  
		$data_add = array(
		"hak_status" =>trim($this->input->post("hak_status")),
		"jnsusr_jnsusr_id" =>trim($this->input->post("jnsusr_jnsusr_id"))
		);

		$query = $this->db->insert("hak",$data_add);
  
		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function hak_update(){ 
  
		$data_update = array(
		"hak_status" =>trim($this->input->post("hak_status")),
		"jnsusr_jnsusr_id" =>trim($this->input->post("jnsusr_jnsusr_id"))
		);

		$hak_id = trim($this->input->post("hak_id"));

		$this->db->where("hak_id",$hak_id);

		$query = $this->db->update("hak",$data_update);

		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function hak_del()

		{	

			$post_id = trim($this->input->post("hak_id"));

			$this->db->where("hak_id",$post_id);

			$query = $this->db->delete("hak");

			if($query){

				$nam = array("result"=>"success");

			}

			echo $x = json_encode($nam);

		}
}
?>