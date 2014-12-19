<?php

	if (!defined("BASEPATH")) exit("No direct script access allowed"); 

	class gambar extends CI_Controller{ 

	public function __construct()	

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper(array("url","string","form"));
   
		$this->data = null; 
  
	}
	function gambar_read(){
  		
		$dt = $this->db->get("gambar");

        echo json_encode($dt->result());
	}	
	function gambar_id_search(){
		
		$id = trim($this->input->post("gambar_id"));

		$this->db->where("gambar_id",$id);

		$dt = $this->db->get("gambar");

        echo json_encode($dt->result());
	}	
	function gambar_nama_search($nama){
  
		$this->db->where("gambar_nama",$nama);

		$dt = $this->db->get("gambar");

        echo json_encode($dt->result());
	}	
	function gambar_add(){ 
  
		$data_add = array(
		"gambar_nama" =>trim($this->input->post("gambar_nama")),
		"gambar_file" =>trim($this->input->post("gambar_file")),
		"gambar_alt" =>trim($this->input->post("gambar_alt")),
		"gambar_post" =>trim($this->input->post("gambar_post")),
		"post_post_id" =>trim($this->input->post("post_post_id"))
		);

		$query = $this->db->insert("gambar",$data_add);
  
		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function gambar_update(){ 
  
		$data_update = array(
		"gambar_nama" =>trim($this->input->post("gambar_nama")),
		"gambar_file" =>trim($this->input->post("gambar_file")),
		"gambar_alt" =>trim($this->input->post("gambar_alt")),
		"gambar_post" =>trim($this->input->post("gambar_post")),
		"post_post_id" =>trim($this->input->post("post_post_id"))
		);

		$gambar_id = trim($this->input->post("gambar_id"));

		$this->db->where("gambar_id",$gambar_id);

		$query = $this->db->update("gambar",$data_update);

		if($query){

				$nam = array("result"=>"success");

			}
		echo $x = json_encode($nam);
	}
	function gambar_del()

		{	

			$post_id = trim($this->input->post("gambar_id"));

			$this->db->where("gambar_id",$post_id);

			$query = $this->db->delete("gambar");

			if($query){

				$nam = array("result"=>"success");

			}

			echo $x = json_encode($nam);

		}
}
?>