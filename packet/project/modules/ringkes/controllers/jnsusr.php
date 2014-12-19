<?php

	if (!defined("BASEPATH")) exit("No direct script access allowed"); 

	class jnsusr extends CI_Controller{ 

	public function __construct()	

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper(array("url","string","form"));
   
		$this->data = null; 
  
	}
	function jnsusr_read(){
  		
		$dt = $this->db->get("jnsusr");

        echo json_encode($dt->result());
	}	
	function jnsusr_id_search(){
		
		$id = trim($this->input->post("jnsusr_id"));

		$this->db->where("jnsusr_id",$id);

		$dt = $this->db->get("jnsusr");

        echo json_encode($dt->result());
	}	
	function jnsusr_nama_search($nama){
  
		$this->db->where("jnsusr_nama",$nama);

		$dt = $this->db->get("jnsusr");

        echo json_encode($dt->result());
	}	
	function jnsusr_add(){ 
  
		$data_add = array(
		"jnsusr_nama" =>trim($this->input->post("jnsusr_nama")),
		"jnsusr_keterangan" =>trim($this->input->post("jnsusr_keterangan"))
		);

		$query = $this->db->insert("jnsusr",$data_add);
  
		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function jnsusr_update(){ 
  
		$data_update = array(
		"jnsusr_nama" =>trim($this->input->post("jnsusr_nama")),
		"jnsusr_keterangan" =>trim($this->input->post("jnsusr_keterangan"))
		);

		$jnsusr_id = trim($this->input->post("jnsusr_id"));

		$this->db->where("jnsusr_id",$jnsusr_id);

		$query = $this->db->update("jnsusr",$data_update);

		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function jnsusr_del()

		{	

			$post_id = trim($this->input->post("jnsusr_id"));

			$this->db->where("jnsusr_id",$post_id);

			$query = $this->db->delete("jnsusr");

			if($query){

				$nam = array("result"=>"success");

			}

			echo $x = json_encode($nam);

		}
}
?>