<?php

	if (!defined("BASEPATH")) exit("No direct script access allowed"); 

	class jnsmenu extends CI_Controller{ 

	public function __construct()	

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper(array("url","string","form"));
   
		$this->data = null; 
  
	}
	function jnsmenu_read(){
  		
		$dt = $this->db->get("jnsmenu");

        echo json_encode($dt->result());
	}	
	function jnsmenu_id_search(){
		
		$id = trim($this->input->post("jnsmenu_id"));

		$this->db->where("jnsmenu_id",$id);

		$dt = $this->db->get("jnsmenu");

        echo json_encode($dt->result());
	}	
	function jnsmenu_nama_search($nama){
  
		$this->db->where("jnsmenu_nama",$nama);

		$dt = $this->db->get("jnsmenu");

        echo json_encode($dt->result());
	}	
	function jnsmenu_id_search(){
		
		$id = trim($this->input->post("users_id"));

		$this->db->where("users_id",$id);

		$dt = $this->db->get("jnsmenu");

        echo json_encode($dt->result());
	}	
	function jnsmenu_add(){ 
  
		$data_add = array(
		"jnsmenu_head" =>trim($this->input->post("jnsmenu_head")),
		"jnsmenu_nama" =>trim($this->input->post("jnsmenu_nama")),
		"jnsmenu_keterangan" =>trim($this->input->post("jnsmenu_keterangan")),
		"jnsmenu_post" =>trim($this->input->post("jnsmenu_post")),
		"jnsmenu_file" =>trim($this->input->post("jnsmenu_file")),
		);

		$query = $this->db->insert("jnsmenu",$data_add);
  
		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function jnsmenu_update(){ 
  
		$data_update = array(
		"jnsmenu_head" =>trim($this->input->post("jnsmenu_head")),
		"jnsmenu_nama" =>trim($this->input->post("jnsmenu_nama")),
		"jnsmenu_keterangan" =>trim($this->input->post("jnsmenu_keterangan")),
		"jnsmenu_post" =>trim($this->input->post("jnsmenu_post")),
		"jnsmenu_file" =>trim($this->input->post("jnsmenu_file")),
		);

		$users_id = trim($this->input->post("users_id"));

		$this->db->where("users_id",$users_id);

		$query = $this->db->update("jnsmenu",$data_update);

		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function jnsmenu_del()

		{	

			$post_id = trim($this->input->post("users_id"));

			$this->db->where("users_id",$post_id);

			$query = $this->db->delete("jnsmenu");

			if($query){

				$nam = array("result"=>"success");

			}

			echo $x = json_encode($nam);

		}
}
?>