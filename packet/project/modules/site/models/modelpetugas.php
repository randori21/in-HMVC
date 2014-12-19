<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ModelPetugas extends CI_Model{
    var $idpetugas='';
    var $nama='';
    var $pass='';
    var $alamat='';
    var $daftar='';

    function  __construct() {
        parent::__construct();
    }
    
    function cek($idpetugas){
        if(empty($idpetugas)==True){
            return FALSE;
        }else{
            $this->db->where('ID',$idpetugas);
            $this->db->get('users');
            if ($this->db->count_all_results()>0){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }
    
    function jenis_petugas($idpetugas){
        if(empty($idpetugas)==True){
            return FALSE;
        }else{
            $this->db->where('jnsusr_id',$idpetugas);
            $query = $this->db->get('jnsusr');
            if ($this->db->count_all_results()>0){
                foreach ($query->result() as $row)
                return $row->jnsusr_id;
            }else{
                return;
            }
        }
    }
	function cari($idpetugas){
        if(empty($idpetugas)==FALSE){
            $this->db->where('id',$idpetugas);
            $query = $this->db->get('users');
            return $query->result();
        }
    }
}
?>
