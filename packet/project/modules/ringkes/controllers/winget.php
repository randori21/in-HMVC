<?php

	if (!defined("BASEPATH")) exit("No direct script access allowed"); 

	class winget extends CI_Controller{ 

	public function __construct()	

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper(array("url","string","form"));
   
		$this->data = null; 
  
	}
	function winget_read(){
  		
		$dt = $this->db->get("winget");

        echo json_encode($dt->result());
	}	
	function winget_id_search(){
		
		$id = trim($this->input->post("winget_id"));

		$this->db->where("winget_id",$id);

		$dt = $this->db->get("winget");

        echo json_encode($dt->result());
	}	
	function winget_nama_search($nama){
  
		$this->db->where("winget_nama",$nama);

		$dt = $this->db->get("winget");

        echo json_encode($dt->result());
	}	
	function winget_add(){ 
  
		$data_add = array(
		"winget_nama" =>trim($this->input->post("winget_nama")),
		"winget_file" =>trim($this->input->post("winget_file")),
		"winget_status" =>trim($this->input->post("winget_status")),
		"winget_posisi" =>trim($this->input->post("winget_posisi")),
		"winget_keterangan" =>trim($this->input->post("winget_keterangan")),
		"jnsusr_jnsusr_id" =>trim($this->input->post("jnsusr_jnsusr_id"))
		);

		$query = $this->db->insert("winget",$data_add);
  
		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function winget_update(){ 
  
		$data_update = array(
		"winget_nama" =>trim($this->input->post("winget_nama")),
		"winget_file" =>trim($this->input->post("winget_file")),
		"winget_status" =>trim($this->input->post("winget_status")),
		"winget_posisi" =>trim($this->input->post("winget_posisi")),
		"winget_keterangan" =>trim($this->input->post("winget_keterangan")),
		"jnsusr_jnsusr_id" =>trim($this->input->post("jnsusr_jnsusr_id"))
		);

		$winget_id = trim($this->input->post("winget_id"));

		$this->db->where("winget_id",$winget_id);

		$query = $this->db->update("winget",$data_update);

		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function winget_del()

		{	

			$post_id = trim($this->input->post("winget_id"));

			$this->db->where("winget_id",$post_id);

			$query = $this->db->delete("winget");

			if($query){

				$nam = array("result"=>"success");

			}

			echo $x = json_encode($nam);

		}
}
?>