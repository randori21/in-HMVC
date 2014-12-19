<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
                
		$this->load->library('tank_auth');                
		$this->load->library('grocery_CRUD');
                
                $this->load->model('site/ModelPetugas');
                $this->output->set_output_data('jenis_user', $this->ModelPetugas->jenis_petugas($this->tank_auth->get_user_id()));
                $this->_init();
	}
        
        private function _init()
	{
		$this->output->set_template_boss($this->config->item('admin_template'));
                $this->output->set_title($this->config->item('admin_page'));

		
	}

	public function _example_output($output = null)
	{
		$this->load->view('output.php',$output);
	}
        
	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
                        $crud = new grocery_CRUD();
                        $crud->set_theme($this->config->item('crud_template'));
                        $crud->set_table('generalsettings');
                        $crud->required_fields('BLOGName', 'BLOGTitle', 'BLOGMaintainedBy','ThemeName');
                        $crud->columns('BLOGName','BLOGTitle','BLOGMaintainedBy','ThemeName');
                        $crud->display_as('BLOGName','Nama Website');
                        $crud->display_as('BLOGTitle','Judul');
                        $crud->display_as('BLOGMaintainedBy','Copyrights');
                        $crud->display_as('GuestView','Tampilan Pengunjung');
                        $crud->display_as('EnableMORE','Pengaturan Custom');
                        $crud->display_as('ShowRecentComments','Tampilkan Komentar');
                        $crud->display_as('ShowRecentPosts','Tampilan Posting');
                        $crud->display_as('ShowCalendar','Tampilkan Kalender');
                        $crud->display_as('ShowOnlineMembers','Tampilkan Member');
                        $crud->display_as('ShowOnlineGuests','Tampilkan Pengunjung');
                        $crud->display_as('ShowOnlineMemberNames','Tampilkan Member');
                        $crud->display_as('EnableCommentNotification','Pemberitahuan Komentar');
                        $crud->display_as('EnablePostScheduling','Jadwal Posting');
                        $crud->display_as('EnableUploadingFiles','Upload File');
                        $crud->display_as('UploadFileSize','Ukuran Upload');
                        $crud->display_as('EnableComments','Komentar Aktiv');
                        $crud->display_as('EnablePlugins','Plugin Aktiv');
                        $crud->display_as('EnableRegistration','Pendaftaran User');
                        $crud->display_as('EnableGuestComment','Komentar Pengunjung');
                        $crud->display_as('SendRegistrationMessage','Notifikasi Pendaftaran');
                        $crud->display_as('ThemeName','Theme');
                        $crud->display_as('ThemeAdmin','Admin Theme');
						$crud->callback_edit_field('ThemeName',array($this,'findTheme'));
						$crud->callback_edit_field('ThemeAdmin',array($this,'findTemplate'));
                        $crud->change_field_type('GuestView', 'true_false');
                        $crud->change_field_type('EnableMORE', 'true_false');
                        $crud->change_field_type('ShowRecentComments', 'true_false');
                        $crud->change_field_type('ShowRecentPosts', 'true_false');
                        $crud->change_field_type('ShowCalendar', 'true_false');
                        $crud->change_field_type('ShowOnlineMembers', 'true_false');
                        $crud->change_field_type('ShowOnlineGuests', 'true_false');
                        $crud->change_field_type('ShowOnlineMemberNames', 'true_false');
                        $crud->change_field_type('EnableCommentNotification', 'true_false');
                        $crud->change_field_type('EnablePostScheduling', 'true_false');
                        $crud->change_field_type('EnableUploadingFiles', 'true_false');
                        $crud->change_field_type('UploadFileSize', 'true_false');
                        $crud->change_field_type('EnableComments', 'true_false');
                        $crud->change_field_type('EnablePlugins', 'true_false');
                        $crud->change_field_type('EnableRegistration', 'true_false');
                        $crud->change_field_type('EnableGuestComment', 'true_false');
                        $crud->change_field_type('SendRegistrationMessage', 'true_false');
                        //$crud->unset_add();
                        //$crud->unset_delete();
                        $output = $crud->render();

			$this->_example_output($output);
		}
	}
	function findTheme($post_array)
        {
			$this->load->helper('file');
			$this->load->helper('directory');
            $dir = './assets/themes/';
            $isi =  "<select name='ThemeName'>";
			$a = 0;
			$map =  directory_map($dir,1);
			$isi .= "<option value='".$post_array."'>".$post_array."</option>";;
			while($a < count($map)){
					$isi .= "<option>".$map[$a]."</option>";
					$a++;
			}
			$isi .= "</select>";
			return $isi;
        }
	function findTemplate($post_array)
        {
			$this->load->helper('file');
			$this->load->helper('directory');
            $dir = './assets/templates/';
            $isi =  "<select name='ThemeAdmin'>";
			$a = 0;
			$map =  directory_map($dir,1);
			$isi .= "<option value='".$post_array."'>".$post_array."</option>";;
			while($a < count($map)){
					$isi .= "<option>".$map[$a]."</option>";
					$a++;
			}
			$isi .= "</select>";
			return $isi;
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */