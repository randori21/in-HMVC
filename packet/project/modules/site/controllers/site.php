<?php
/* 
 * Class yang tampil untuk user
 * Copyright in wahyu @ 2011
 */
class Site extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        /* Standard Libraries */
        $this->load->database();
        $this->load->helper('url');        
        /* ------------------ */
        
        $this->load->add_package_path(APPPATH.'third_party/grocery_crud/');
		$this->load->helper('file');
        $this->load->library('javascript');
        $this->load->library('javascript/jquery');
        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('datatables');
        $this->output->set_output_data('head',  @$this->uri->segment(2));
		$this->load->model('modelmenu');
        $this->load->model('modelpetugas');
                
		$this->_init();
//        test profiler
        /*
        $this->output->enable_profiler(TRUE);
        $sections = array(
            'config'  => TRUE,
            'queries' => TRUE,
            'memory_usage' => TRUE
            );

        $this->output->set_profiler_sections($sections);
        */
	}
	private function _init()
	{
		$this->output->set_template($this->config->item('user_template'));
        $this->output->set_title($this->config->item('title'));

		//$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
		//$this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		//$this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
	}

    function index()
    {
        $query= $this->db->get('generalsettings');
        foreach ($query->result() as $row)
        {
            $nama = $row->BLOGName;
            $slogan = $row->BLOGTitle;
            $kontak = $row->Kontak;
			$theme = $row->ThemeName;
			$copy = $row->BLOGMaintainedBy;
        }
		$this->output->set_template($theme);
        $this->output->set_output_data('nama',  $nama);
        $this->output->set_output_data('kontak',  $kontak);
        $this->output->set_output_data('slogan',  $slogan);	
		$this->output->set_output_data('copy',  $copy);
        $this->menu();$this->menu_link();
		$data->kontak = $kontak;
        $data->block = $this->tampil_block();		
        $data->artikel = $this->tampil_home();
        $data->pengumuman = $this->sub_artikel('pengumuman','#FFF');
        $data->menu_artikel = $this->sub_artikel('kegiatan','#FFF');
        $data->link = $this->link();
        $data->link_bawah = $this->link_bawah();
        $data->thumb = $this->thumb_galery();
		$data->calendar = read_file('assets/wingets/calendar.inw');
		$data->thumbnail = read_file('assets/wingets/thumb.inw');
		$data->facebook = read_file('assets/wingets/facebook.php');
		$data->sidebar = $this->load_winget();
		$this->load->section('sidebar', 'tampilan_sidebar',$data);
		$this->load->section('block', 'tampilan_block',$data);
		$this->load->section('home', 'home');
    }

    function artikel($jnsmenu_id)
    {
        $query= $this->db->get('generalsettings');
        foreach ($query->result() as $row)
        {
            $nama = $row->BLOGName;
            $slogan = $row->BLOGTitle;
            $kontak = $row->Kontak;
			$theme = $row->ThemeName;
			$copy = $row->BLOGMaintainedBy;
        }
        $this->output->set_template($theme);
        $this->output->set_output_data('nama',  $nama);
        $this->output->set_output_data('kontak',  $kontak);
        $this->output->set_output_data('slogan',  $slogan);
		$this->output->set_output_data('copy',  $copy);
        $this->menu();$this->menu_link();
        $data = $this->isi_artikel($jnsmenu_id);
        //aturan validasi
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[5]|mlength[3]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $data->sidebar = $this->load_winget();
        $data->validasi = validation_errors();
        if ($this->form_validation->run()==TRUE){
            $this->simpan_komentar($jnsmenu_id);
        }
        
        $data->pengumuman = $this->sub_artikel('pengumuman','#FFF');
        $data->menu_artikel = $this->sub_artikel('kegiatan','#FFF');
        $data->sub_menu ='';
        $data->link = $this->link();
        $data->link_bawah = $this->link_bawah();
        $data->thumb = $this->thumb_galery();
		$data->sidebar = $this->load_winget();
		$this->load->section('sidebar', 'tampilan_sidebar',$data);
        $this->load->view('artikel',$data);
    }
    function gallery($jnsmenu_id)
    {
        $query= $this->db->get('generalsettings');
        foreach ($query->result() as $row)
        {
            $nama = $row->BLOGName;
            $slogan = $row->BLOGTitle;
            $kontak = $row->Kontak;
			$theme = $row->ThemeName;
			$copy = $row->BLOGMaintainedBy;
        }
        $this->output->set_template($theme);
        $this->output->set_output_data('nama',  $nama);
        $this->output->set_output_data('kontak',  $kontak);
        $this->output->set_output_data('slogan',  $slogan);
		$this->output->set_output_data('copy',  $copy);
        $this->menu();$this->menu_link();        
        $data->pengumuman = $this->sub_artikel('pengumuman','#FFF');
        $data->menu_artikel = $this->sub_artikel('kegiatan','#FFF');
        $data->link = $this->link();
		$data->sidebar = $this->load_winget();
        $data->link_bawah = $this->link_bawah();
        $data->thumb = $this->thumb_galery();
		$data->sidebar = $this->load_winget();
		$this->load->section('sidebar', 'tampilan_sidebar',$data);
        $this->load->view('tampil_gallery/tampil',$data);
    }

    function menu_artikel($jnsmenu_id)
    {
        $query= $this->db->get('generalsettings');
        foreach ($query->result() as $row)
        {
            $nama = $row->BLOGName;
            $slogan = $row->BLOGTitle;
            $kontak = $row->Kontak;
			$theme = $row->ThemeName;
			$copy = $row->BLOGMaintainedBy;
        }
		$this->output->set_template($theme);
        $this->output->set_output_data('nama',  $nama);
        $this->output->set_output_data('kontak',  $kontak);
        $this->output->set_output_data('slogan',  $slogan);
        $this->output->set_output_data('copy',  $copy);
        $this->menu();$this->menu_link();
        $data = $this->isi_menu($jnsmenu_id);
        $data->pengumuman = $this->sub_artikel($jnsmenu_id,'#FFF');//$this->sub_artikel('pengumuman','#FFF');
        $data->menu_artikel = $this->sub_artikel('kegiatan','#fff');
        $data->sub_menu =$this->sub_menu($jnsmenu_id);
	
        //bila pengumuman atau kegiatan hendaknya di beri submenu
        
        
        $data->link = $this->link();
        $data->link_bawah = $this->link_bawah();
        $data->thumb = $this->thumb_galery();
		$data->sidebar = $this->load_winget();
		$this->load->section('sidebar', 'tampilan_sidebar',$data);
        $this->load->view('artikel',$data);
    }

	function load_winget()
	{
		$this->load->library('flib');
		$this->db->order_by('winget_posisi');
		$this->db->where('winget_status','1');
		$x = $this->db->get('winget');
		$data = '';
		foreach($x->result() as $y){
			if($this->flib->fada('assets/wingets/'.$y->name.'.php')==TRUE){
				$data .= read_file('assets/wingets/'.$y->name.'.php');				
			}else if($this->flib->fada('assets/wingets/'.$y->name.'.inw')==TRUE){
				$data .= read_file('assets/wingets/'.$y->name.'.inw');	
			}else{
				$data .= $this->sub_artikel($y->name,'#fff');
			}
		}
		return $data;
	}
    function menu(){
        $this->load->model('modelmenu');
        $this->load->helper('url');
        $aktif = $this->uri->segment(3);
        $query = $this->modelmenu->tampil_awal();
        if(empty($aktif)==TRUE){$current='current';}else{$current ='';}
        $menu = "<ul class='sf-menu'><li id='".$current."'><a href='".base_url()."index.php/site'>Beranda</a></li>";
        foreach($query as $row){
            if($row->jnsmenu_id==$aktif){$current='current';}else{$current ='';}
            $menu .= "<li id='".$current."'><a href='".base_url().'index.php/site/menu_artikel/'.$row->jnsmenu_id."'>".$row->jnsmenu_nama."</a>".
                    $this->ekor_menu($row->jnsmenu_id)
                    ."</li>";            
        }
		$menu .= "</ul>";
        $this->output->set_output_data('menu',$menu);
    }

    function menu_link(){
        $this->load->model('modelmenu');
        $this->load->helper('url');
        $query = $this->modelmenu->tampil_awal();
        
        $menu = "<li ><a href='".base_url()."index.php/site'>Beranda</a></li>";
        foreach($query as $row){
            $menu .= "<li><a href='".base_url().'index.php/site/menu_artikel/'.$row->jnsmenu_id."'>".$row->jnsmenu_nama."</a></li>";            
        }
        $this->output->set_output_data('menu_link',$menu);
    }
    function ekor_menu($jnsmenu_id)
    {
        $this->load->model('modelmenu');
        $inquery = $this->modelmenu->tampil_ekor_menu($jnsmenu_id);
        $sub_menu = '';
        if($inquery->num_rows > 0)
        {
            $sub_menu = "<ul>";
        }
        foreach($inquery->result() as $row){
            $sub_menu .= "<li><a href='".base_url().'index.php/site/menu_artikel/'.$row->jnsmenu_id."'>".$row->jnsmenu_nama."</a>";
            $sub_menu .= $this->ekor_menu($row->jnsmenu_id);
            $sub_menu .= "</li>";
        }
        if($inquery->num_rows > 0)
        {
            $sub_menu .= "</ul>";
        }
        return $sub_menu;
    }

    function isi_artikel($post_id)
    {
        $this->load->model('modelpetugas');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        //komentar
        $data->nama ='';
        $data->email='';
        $data->website='';
        $data->komentar='';

        $data->topik = '';
        $data->isi = '';
        $data->tanggal = '';
        $data->gambar = '';
        $data->tag = '';

        
        $this->db->where('post_id',$post_id);        
        $query = $this->db->get('post');
        
        foreach($query->result() as $row)
        {
            $data->topik = $row->post_nama;
            $data->isi = $row->post_content;            
            $unik = strtotime($row->post_date_edit." 1:0:0");
            $data->tanggal = date('d F Y',$unik);
            if(isset ($row->post_author))
            {
                $data->penulis= $row->post_author;
            }else
            {
                $data->penulis= '';
            }
            $data->tag = "<p class='tags'>
                                <strong>Tagged : </strong>
                                <a href='#'>".$row->post_tag."</a>
                          </p>";
            
            if(empty($row->post_picture)==FALSE)
            {
                $part = explode('.',$row->post_picture);
                $gambar = $part[0].'_thumb.'.@$part[1];
                $data->gambar = "<div class='image-section'>
                <img src='".base_url()."public/uploads/files/".$gambar."' alt='image post' /></div>";
            }
            

        }        
        $data->jumlah_komentar = $this->jumlah_komentar($post_id);
        $data->tampil_komentar = $this->tampil_komentar($post_id);
        $data->komentar .= $this->form_komentar($post_id);
        return $data;
    }
    
    function isi_menu($jnsmenu_id)
    {
        $this->load->model('modelpetugas');
        $data->topik = '';
        $data->isi = '';
        $data->tanggal = '';
        $data->gambar = '';
        $data->tag = '';
        $data->validasi = '';
        $data->jumlah_komentar = '';
        $data->komentar = '';
        $data->tampil_komentar = '';
        $this->db->where('jnsmenu_id',$jnsmenu_id);
        $query = $this->db->get('jnsmenu');
        foreach($query->result() as $row)
        {
            $data->topik = $row->jnsmenu_nama;
            $data->isi = $row->jnsmenu_keterangan;
            $unik = strtotime(@$row->post." 1:0:0");
            $data->tanggal = date('d F Y',$unik);
            $this->load->helper('file');
			if(empty($row->users_id)==TRUE){$row->users_id=1;}
            $hasil = $this->modelpetugas->cari($row->users_id);
            foreach ($hasil as $isi)
            {
                if (empty($isi->nama)==FALSE)
                {                
                    $data->penulis = $isi->nama;
                }
                else
                {
                    $data->penulis = 'admin';
                }
            }
            /*
            if((empty($row->GAMBAR)==FALSE)||(read_file(base_url()."public/uploads/files/".$row->GAMBAR)==TRUE))
            {
                $part = explode('.',$row->GAMBAR);
                $gambar = $part[0].'_thumb.'.$part[1];
                $data->gambar = "<div class='image-section'>
                <img src='".base_url()."public/uploads/files/".$gambar."' alt='image post' /></div>";
            }
            else
            {
                $data->gambar =" ";
            }*/

        }
        return $data;
    }

    function sub_artikel($sub,$color)
    {
        $this->load->model('modelmenu');
        //$jnsmenu_id = $this->cari($sub);
		$query = $this->modelmenu->tampil_ekor_artikel($sub);
        //$query = $this->modelmenu->tampil_ekor_artikel($jnsmenu_id);
        $sub_artikel = '';
        if ($query){
            if($query->num_rows > 0)//#E7871C;
            {
                $sub_artikel = "<div class='sidemenu' style='            
            margin-bottom:10px;            
            border-radius: 0px;
            -moz-border-radius: 0px;'><h3 style='text-transform: capitalize'>
            ".$sub."</h3><ul>";

            foreach($query->result() as $row){
		$unik = strtotime($row->post_date_edit." 1:0:0");
            	$tanggal = date('d F Y',$unik);
                $sub_artikel = $sub_artikel."<li style='border:0px;'><small>".$tanggal."</small><br/><a href='".base_url().'index.php/site/artikel/'.$row->post_id."'>".$row->post_nama."</a></li>";
            }
                $sub_artikel = $sub_artikel."</ul><div class='lainya'><a href='".base_url().'index.php/site/menu_artikel/'.@$row->jnsmenu_id."'>Lainnya...</a></div></div>";
            }
        }
        return $sub_artikel;
    }

    function sub_menu($jnsmenu_id)
    {
        $this->load->model('modelmenu');
        $query = $this->modelmenu->tampil_ekor_menu($jnsmenu_id);
        $query1 = $this->modelmenu->tampil_ekor_artikel_total($jnsmenu_id);
        $sub_menu = '';
        if($query->num_rows > 0)
        {
            $sub_menu = "<div class='submenu'><h3 style='margin-top:10px;'>Sub Menu</h3><ul>";
            foreach($query->result() as $row){
                $sub_menu = $sub_menu."<li><a href='".base_url().'index.php/site/menu_artikel/'.$row->jnsmenu_id."'>".$row->jnsmenu_nama."</a></li>";
            }
        }elseif($query1->num_rows > 0){
            $sub_menu = "<div class='submenu'><h3 style='margin-top:-1px;'>Sub ".$this->cari_nama($jnsmenu_id)."</h3><ul>";            
            foreach($query1->result() as $row){
                $unik = strtotime($row->post_date_edit." 1:0:0");
            	$tanggal = date('d F Y',$unik);
                $sub_menu = $sub_menu."<li><a href='".base_url().'index.php/site/artikel/'.$row->post_id."'>".$row->post_nama.'<br/><small>::'.$tanggal."::</small></a></li>";
            }
        }
        if(($query->num_rows > 0)||($query1->num_rows > 0))
        {
            $sub_menu = $sub_menu."</ul></div>";
        }
        return $sub_menu;
    }
    function sub_menu_nama($jnsmenu_id)
    {
        $this->load->model('modelmenu');
        $query = $this->modelmenu->tampil_ekor_menu($jnsmenu_id);
        $sub_menu = '';
        if($query->num_rows > 0)
        {
            $sub_menu = "<div><h3>".$this->cari_nama($jnsmenu_id)."</h3><ul>";
        }
        foreach($query->result() as $row){
            $sub_menu = $sub_menu."<li><a href='".base_url().'index.php/site/menu_artikel/'.$row->jnsmenu_id."'>".$row->jnsmenu_nama."</a></li>";
        }
        if($query->num_rows > 0)
        {
            $sub_menu = $sub_menu."</ul></div>";
        }
        return $sub_menu;
    }

    function cari($nama)
    {
        if(empty($nama)==FALSE)
        {
            $this->db->where('jnsmenu_nama',$nama);
            $query = $this->db->get('jnsmenu');
            foreach ($query->result() as $row)
            {
                return $row->jnsmenu_id;
            }
        }
    }
    
    function cari_nama($jnsmenu_id)
    {
        if(empty($jnsmenu_id)==FALSE)
        {
            $this->db->where('jnsmenu_id',$jnsmenu_id);
            $query = $this->db->get('jnsmenu');
            foreach ($query->result() as $row)
            {
                return $row->jnsmenu_nama;
            }
        }
    }

    function link()
    {
        $query = $this->db->get('link');
        $link = '';
        if($query->num_rows > 0)
        {
            $link = "<div class='sidemenu' style='margin-top:10px;'>		
        <h3>Website Terkait</h3>		
		<ul>";
        }
        foreach($query->result() as $row){
            $link = $link."<li><a href='".prep_url($row->link_address)."'title='".$row->link_nama."'>".$row->link_nama."</a><span>".$row->link_keterangan."</span></li>";
        }
        if($query->num_rows > 0)
        {
            $link = $link."</ul></div>";
        }
        return $link;
    }
    function link_bawah()
    {
        $query = $this->db->get('link');
        $link = '';
        foreach($query->result() as $row){
            $link = $link."<li><a href='".prep_url($row->link_address)."'title='".$row->link_nama."'>".$row->link_nama."</a></li>";
        }
        return $link;
    }
    function form_komentar($post_id){
        
        
        $form = "<div id='respond'>

        <h3>Tinggalkan Pesan</h3>";
        
        $form = $form.form_open(base_url().'index.php/site/simpan_komentar/'.$post_id,"id='commentform'",'');

        $form .= "<p>
                        <label for='name'>Nama (harus diisi)</label><br />
                        <input id='name' name='nama' value='' type='text' tabindex='1' />
                </p>

                <p>
                        <label for='email'>Email (harus diisi)</label><br />
                        <input id='email' name='email' value='' type='text' tabindex='2' />
                </p>

                <p>
                        <label for='website'>Website</label><br />
                        <input id='website' name='website' value='' type='text' tabindex='3' />
                </p>

                <p>
                        <label for='message'>Komentar (harus diisi)</label><br />
                        <textarea id='message' name='komentar' rows='10' cols='20' tabindex='4'></textarea>
                </p>

                <p class='no-border'>
                        <input class='button' type='submit' value='Kirim' tabindex='5' />
                </p>";

        $form .= form_close()."</div>";
        return $form;
    }
    function simpan_komentar($post_id)
    {
        $this->load->model('Modeluser');
        $this->Modeluser->insert_komentar($post_id);
        redirect(base_url().'index.php/site/artikel/'.$post_id);
        
    }
    function tampil_komentar($post_id)
    {
     /*   $this->db->where('post_id',$post_id);
        $this->db->order_by('post','asc');
        $query = $this->db->get('komentar');
        $komen = "<ol class='commentlist'>";
        foreach($query->result() as $row){
        $komen = $komen."<li class='depth-1'>
                    <div class='comment-info'>
                            <img alt='' src='".base_url()."templates/blue/images/gravatar.jpg' class='avatar' height='40' width='40' style='background-color: #ccc;'/>
                            <cite>
                                    <a href='".base_url()."'>".$row->nama."</a> Komentar: <br />
                                    <span class='comment-data'><a href='#comment-63' title=''>".$row->post."</a></span>
                            </cite>
                    </div>
                    <div class='comment-text'>
                            <p>".$row->komentar."</p>
                    </div>
                  </li>";
        }
        $komen = $komen."</ol>";*/
        return $post_id;        
    }
    function jumlah_komentar($post_id)
    {
        /*$this->db->where('post_id',$post_id);
        $this->db->from('komentar');
        return "<p id='comments'>".$this->db->count_all_results()." Respon</p>";*/
    }
    function tampil_block()
    {
        
        $this->load->helper('text');
        $this->db->limit(1);
        $this->db->order_by('jnsmenu_id','asc');
        $query = $this->db->get('jnsmenu');
        
        $block = "
        <div id='featured-block' class='clear'>

			<div id='featured-ribbon'></div>

			<a name='TemplateInfo'></a>";

			
        foreach($query->result() as $row)
        {
/*            $hasil = $this->modelpetugas->cari($row->user_id);
            foreach ($hasil as $isi)
            {
                if (empty($isi->username)==FALSE)
                {
                    $penulis = $isi->username;
                }
                else
                {
                    $penulis = 'admin';
                }
            }
  */           $penulis = 'admin';
            $isi = word_limiter($row->jnsmenu_keterangan,15);
            $block .="<div class='image-block'>
                        <div class='menu'>".$this->sub_menu_nama(6)."</div>
                        <div class='menu'>".$this->sub_menu_nama(7)."</div>
                        <div class='menu'>".$this->sub_menu_nama(8)."</div>
                        <div class='clear'></div>
                      </div>";           
            
            $block .=" <div class='text-block'>

				<h2><a href='".base_url()."index.php/site/menu_artikel/".$row->jnsmenu_id."'>".$row->jnsmenu_nama."</a></h2>

				<p class='post-info'>Diposting Oleh : <a href='".base_url()."'>".$penulis."</a></p>

				".$isi."

				<br/><a href='".base_url()."index.php/site/menu_artikel/".$row->jnsmenu_id."' class='more-link'>Selanjutnya &raquo;</a>
			</div>";
            $block .= "<div class='kata'>Sekolah Tinggi Manajemen Informatika Kadiri Kediri</div>";
        
          
        }
        $block .= "</div>";
        return $block;
    }
    function tampil_home()
    {
        $this->load->helper('text');
        $this->db->limit(4);
        $this->db->where('post_status',1);
        $this->db->order_by('post_date_edit','desc');
        $query = $this->db->get('post');
        $no= 0;
        $artikel = '';
        
        foreach($query->result() as $row)
        {
          if($no%2==0){$gg = 'even';}else{$gg='odd';}
          $isi = word_limiter($row->post_content,35);
          $artikel =$artikel."<div class='block ".$gg."'>";
          if (empty($row->post_picture)==FALSE){
          //$part = explode('.',$row->post_picture);
          $gambar = $row->post_picture;//$part[0].'_thumb.'.$part[1];
          //$artikel = $artikel."<a title='' href='".base_url()."index.php/site/artikel/".$row->post_id."'><img src='".base_url()."public/uploads/files/".$gambar."' class='thumbnail' alt='img' width='240px' height='100px'/></a>";
          }
          $unik = strtotime($row->post_date_edit." 1:0:0");
          $tanggal = date('d F Y',$unik);
          $artikel = $artikel."<div class='blk-top'>

                        <h4><a href='".base_url()."index.php/site/artikel/".$row->post_id."'>".$row->post_nama."</a></h4>
                        <p><span class='datetime'>".$tanggal."</span> <a href='".base_url()."index.php/site/artikel/".$row->post_id."' class='comment'>Comments</a></p>

                </div>

                <div class='blk-content'>

                        <p>
                        ".$isi."
                        <a class='more' href='".base_url()."index.php/site/artikel/".$row->post_id."'>selanjutnya &raquo;</a>
                        </p>

                        <p></p>

                </div>

            </div>";
          if($gg=='odd'){$artikel=$artikel."<div class='fix'></div>";}
          $no++;
        }
        return $artikel;
    }
    function thumb_galery(){
        $query = $this->db->get('gallery');
        $thumb = '';
        foreach($query->result() as $row)
        {
            $part = explode('.',$row->thumb);
            $gambar = $row->thumb;//$part[0].'_thumb.'.$part[1];
            $thumb = $thumb."<a href='".base_url()."index.php/site/gallery/".$row->id."'><img src='".base_url()."public/uploads/files/".$gambar."' width='40' height='40' alt='".$row->keterangan."' /></a>";
        }
        return $thumb;
    }    
}
?>
