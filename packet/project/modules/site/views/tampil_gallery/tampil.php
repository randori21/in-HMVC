<?php
/*
 * Description of tampil bursa kerja
 *
 * @author in
 */
?>
<!-- tempat untuk menampung foto yang besar -->
      <div id="image_wrap" style="clear: both;margin: 0 auto 0 auto;">

	     <!-- background untuk foto berupa gambar blank.gif -->
             <img src="<?=base_url();?>templates/blue/images/logo_small.png" alt="nothing"/>
      </div>
      <!-- aksi untuk halaman sebelumnya -->
      <a class="prevPage browse left"></a>

      <!-- elemen untuk scrollable -->
      <div class="scrollable">

	     <!-- elemen untuk items -->
	     <div class="items">
  	    <!-- foto ke 1-5 -->
<?
    $this->load->database();
    $this->load->helper('url');
    $this->db->where('id_gallery',  $this->uri->segment(3));
    $query = $this->db->get('in_gambar');
    foreach ($query->result() as $row)
    {
     $part = explode('.',$row->GAMBAR_FILE);
     $gambar = $row->GAMBAR_FILE;//$part[0].'_thumb.'.$part[1];
     $unik = strtotime($row->GAMBAR_POST." 1:0:0");
     $tanggal = date('d F Y',$unik);
    ?>
        <div style="float: left;margin: 3px;padding: 3px;">
        <?="<img src='".base_url()."public/uploads/files/".$gambar."' alt='".$row->GAMBAR_ALT."'/>";?>
        <div style="width:auto; font-size: 9px;text-align: center; display: block;"><?=$row->GAMBAR_NAMA."<br/>".$tanggal;?></div>
        </div>
    <?php
    }
    ?>
      </div>
    </div>

    <!-- aksi untuk halaman selanjutnya -->
    <a class="nextPage browse right"></a>

    <br clear="all">    
