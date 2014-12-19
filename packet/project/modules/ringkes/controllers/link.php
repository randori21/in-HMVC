<?php

	if (!defined("BASEPATH")) exit("No direct script access allowed"); 

	class link extends CI_Controller{ 

	public function __construct()	

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper(array("url","string","form"));
   
		$this->data = null; 
  
	}
	function link_read(){
  		
		$dt = $this->db->get("link");

        echo json_encode($dt->result());
	}	
	function link_id_search(){
		
		$id = trim($this->input->post("link_id"));

		$this->db->where("link_id",$id);

		$dt = $this->db->get("link");

        echo json_encode($dt->result());
	}	
	function link_nama_search($nama){
  
		$this->db->where("link_nama",$nama);

		$dt = $this->db->get("link");

        echo json_encode($dt->result());
	}	
	function link_add(){ 
  
		$data_add = array(
		"link_address" =>trim($this->input->post("link_address")),
		"link_nama" =>trim($this->input->post("link_nama")),
		"link_keterangan" =>trim($this->input->post("link_keterangan")),
		"jnsusr_jnsusr_id" =>trim($this->input->post("jnsusr_jnsusr_id"))
		);

		$query = $this->db->insert("link",$data_add);
  
		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function link_update(){ 
  
		$data_update = array(
		"link_address" =>trim($this->input->post("link_address")),
		"link_nama" =>trim($this->input->post("link_nama")),
		"link_keterangan" =>trim($this->input->post("link_keterangan")),
		"jnsusr_jnsusr_id" =>trim($this->input->post("jnsusr_jnsusr_id"))
		);

		$link_id = trim($this->input->post("link_id"));

		$this->db->where("link_id",$link_id);

		$query = $this->db->update("link",$data_update);

		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function link_del()

		{	

			$post_id = trim($this->input->post("link_id"));

			$this->db->where("link_id",$post_id);

			$query = $this->db->delete("link");

			if($query){

				$nam = array("result"=>"success");

			}

			echo $x = json_encode($nam);

		}
}
?>