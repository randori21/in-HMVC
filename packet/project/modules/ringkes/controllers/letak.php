<?php

	if (!defined("BASEPATH")) exit("No direct script access allowed"); 

	class letak extends CI_Controller{ 

	public function __construct()	

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper(array("url","string","form"));
   
		$this->data = null; 
  
	}
	function letak_read(){
  		
		$dt = $this->db->get("letak");

        echo json_encode($dt->result());
	}	
	function letak_id_search(){
		
		$id = trim($this->input->post("letak_id"));

		$this->db->where("letak_id",$id);

		$dt = $this->db->get("letak");

        echo json_encode($dt->result());
	}	
	function letak_nama_search($nama){
  
		$this->db->where("letak_nama",$nama);

		$dt = $this->db->get("letak");

        echo json_encode($dt->result());
	}	
	function letak_add(){ 
  
		$data_add = array(
		"letak_nama" =>trim($this->input->post("letak_nama")),
		"letak_keterangan" =>trim($this->input->post("letak_keterangan")),
		"jnsmenu_jnsmenu_id" =>trim($this->input->post("jnsmenu_jnsmenu_id"))
		);

		$query = $this->db->insert("letak",$data_add);
  
		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function letak_update(){ 
  
		$data_update = array(
		"letak_nama" =>trim($this->input->post("letak_nama")),
		"letak_keterangan" =>trim($this->input->post("letak_keterangan")),
		"jnsmenu_jnsmenu_id" =>trim($this->input->post("jnsmenu_jnsmenu_id"))
		);

		$letak_id = trim($this->input->post("letak_id"));

		$this->db->where("letak_id",$letak_id);

		$query = $this->db->update("letak",$data_update);

		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function letak_del()

		{	

			$post_id = trim($this->input->post("letak_id"));

			$this->db->where("letak_id",$post_id);

			$query = $this->db->delete("letak");

			if($query){

				$nam = array("result"=>"success");

			}

			echo $x = json_encode($nam);

		}
}
?>