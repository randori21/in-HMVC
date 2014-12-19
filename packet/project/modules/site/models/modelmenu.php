<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ModelMenu extends CI_Model{
    var $jnsmenu_id='';
   
    function  __construct() {
        parent::__construct();
    }

    function tampil_awal(){
       $hasil = $this->db->query(
                "select * from jnsmenu where jnsmenu_id not in(select jnsmenu_head from relmenu where jnsmenu_jnsmenu_id = jnsmenu_id)");
       return $hasil->result();
    }
    function tampil_ekor_menu($jnsmenu_id=null){
        if(empty($jnsmenu_id)==FALSE){
            $hasil = $this->db->query(
                "select j.jnsmenu_id,j.jnsmenu_nama from jnsmenu j inner join relmenu r on j.jnsmenu_head=r.jnsmenu_jnsmenu_id where j.jnsmenu_id in(select relmenu_head from relmenu where jnsmenu_id='".$jnsmenu_id."')");
            return $hasil;
        }
    }
    function tampil_ekor_artikel($jnsmenu_id=null){
        if(empty($jnsmenu_id)==FALSE){
            $query = $this->db->query(
                "select * from post a,relpost where jnsmenu_jnsmenu_id='".$jnsmenu_id."' and a.post_status='1' order by a.post_date_edit desc limit 3");	
			return $query;
        }
    }
    function tampil_ekor_artikel_total($jnsmenu_id=null){
        if(empty($jnsmenu_id)==FALSE){
            $query = $this->db->query(
                "select * from post a,relpost where jnsmenu_jnsmenu_id='".$jnsmenu_id."' and a.post_status='1' order by a.POST_DATE_EDIT desc");
            return $query;
        }
    }
    function coba(){
        $query = $this->db->query(
          "select * from jnsmenu where not jnsmenu_id in (select EKOR from in_relasi_menu) group by jnsmenu_NAMA order by jnsmenu_id"  
        );
		return $query->result();
    }

}

//"select * from jnsmenu j left join in_relasi_menu r on(j.jnsmenu_id=j.jnsmenu_id)
//where not j.jnsmenu_id in (select r.EKOR from in_relasi_menu ) group by j.jnsmenu_NAMA");

//"select * from jnsmenu inner join in_relasi_menu using(jnsmenu_id) where
//jnsmenu_id='".$jnsmenu_id."'");
?>
