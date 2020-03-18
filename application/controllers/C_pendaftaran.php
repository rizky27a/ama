<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pendaftaran extends CI_Controller {

	private $_modul_name = "AMA";

	function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->template->set_platform('public');
        $this->template->set_theme('admin-lte');      
        $this->load->model('Mdl_pendaftaran'); 
        $this->load->model('M_home'); 
    }

    


	public function index()
	{
		$data['data_ukuran']  = $this->Mdl_pendaftaran->set_ukuran();
        $data['view_file']    = "admin/moduls/v_pendaftaran";
        $data['data_get'] = $this->Mdl_pendaftaran->view();
        $meta = $this->M_home->meta_produk();
		$this->template->set_title($this->_modul_name);
        $this->template->set_meta('author',$meta->title);
        $this->template->set_meta('keyword',$meta->meta_keyword);
        $this->template->set_meta('description',$meta->meta_description);
            
        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        //$this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
        $this->template->set_layout('layouts/main');
        $this->template->set_content('pages/pendaftaran/index', $data);
        $this->template->render();
	}

	protected function _loadpart() {
        $data_header['active'] = 'pendaftaran';
        $this->template->set_part('navbar', 'parts/navbar', $data_header);
        $data_footer['footer'] = $this->M_home->view('setting_ukuran');        
        $this->template->set_part('footer', 'parts/footer', $data_footer);
    }


   protected function _loadcss() {
        $this->template->set_css('bootstrap.css');           
        $this->template->set_css('main.css');
        $this->template->set_css('custom.css');
        $this->template->set_css('http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800', 'remote');
        $this->template->set_css('icomoon-social.css');
        $this->template->set_css('font-awesome.min.css');     
    }

    protected function _loadjs() {   
        $this->template->set_js('modernizr-2.6.2-respond-1.1.0.min.js');
        $this->template->set_js('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js','footer', 'remote'); 
        $this->template->set_js('jquery-1.9.1.min.js','footer');
        $this->template->set_js('bootstrap.min.js','footer');
        $this->template->set_js('jquery.easing.min.js','footer');
        $this->template->set_js('scrolling-nav.js','footer'); 
    }


   
    function ajax_add(){
		$res = $this->Mdl_pendaftaran->view();
		// $olah = explode('.', $_FILES['userfile']['name']);
		// $nama_file = $this->input->post('slider_judul').'.'.$olah[1];
		// echo var_dump($this->input->post());
		$nama = $this->input->post('nama_lengkap');
		$tempat = $this->input->post('tempat');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jenis_kel = $this->input->post('jenis_kel');
		$alamat = $this->input->post('alamat');
		$alamat_email = $this->input->post('alamat_email');
		$telepon = $this->input->post('telepon');
		$no_hp = $this->input->post('no_hp');
		$pend_terakhir = $this->input->post('pend_terakhir');
		$pekerjaan = $this->input->post('pekerjaan');
		$perusahaan = $this->input->post('perusahaan');
		$alamat_kantor = $this->input->post('alamat_kantor');
		$telepon_kantor = $this->input->post('telepon_kantor');
		$bidang_usaha = $this->input->post('bidang_usaha');
		$jabatan = $this->input->post('jabatan');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// $gambar = str_replace(' ', '_', $nama_file);

		$config['upload_path'] = realpath('assets/images');
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';
		// $config['file_name'] = $nama_file;	
		$new_name = str_replace(" ", "-", $nama);
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);

		if(!$this->upload->do_upload('userfile')){
 			$data = array(
			'nama_lengkap' => $nama,
			'tempat' => $tempat,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kel' => $jenis_kel,
			'alamat' => $alamat,
			'alamat_email' => $alamat_email,
			'telepon' => $telepon,
			'no_hp' => $no_hp,
			'pend_terakhir' => $pend_terakhir,
			'pekerjaan' => $pekerjaan,
			'perusahaan' => $perusahaan,
			'alamat_kantor' => $alamat_kantor,
			'telepon_kantor' => $telepon_kantor,
			'bidang_usaha' => $bidang_usaha,
			'jabatan' => $jabatan,
			'username' => $username,
			'password' => $password,
			);
 		}else{
 			//unlink('../assets/galeri/'.$this->input->post('terserah'));
 			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data = array(
			'nama_lengkap' => $nama,
			'tempat' => $tempat,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kel' => $jenis_kel,
			'alamat' => $alamat,
			'alamat_email' => $alamat_email,
			'telepon' => $telepon,
			'no_hp' => $no_hp,
			'pend_terakhir' => $pend_terakhir,
			'pekerjaan' => $pekerjaan,
			'perusahaan' => $perusahaan,
			'alamat_kantor' => $alamat_kantor,
			'telepon_kantor' => $telepon_kantor,
			'bidang_usaha' => $bidang_usaha,
			'jabatan' => $jabatan,
			'foto' => $gambar1,
			'username' => $username,
			'password' => $password,
			); 			
 		}	
 		
 		// print_r($data);
		$this->Mdl_pendaftaran->add($data);
		echo '<script>alert("Pendaftaran telah terkirim, mohon tunggu konfirmasi dari admin");</script>';
		redirect(base_url("c_pendaftaran"), 'refresh');

	}
}
