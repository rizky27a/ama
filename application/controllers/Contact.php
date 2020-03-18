<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	private $_modul_name = "AMA Malang | Asosiasi Manajemen Indonesia Cabang Malang Raya";

	function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->template->set_platform('public');
        $this->template->set_theme('admin-lte');      
        $this->load->model('M_home');  
    }

    


	public function index()
	{
        $data['kontak'] = $this->M_home->view('tb_kontak');
        $meta = $this->M_home->meta_kontak();
		$this->template->set_title($this->_modul_name);
        $this->template->set_meta('author',$meta->title);
        $this->template->set_meta('keyword',$meta->meta_keyword);
        $this->template->set_meta('description',$meta->meta_description);
            
        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        //$this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
        $this->template->set_layout('layouts/main');
        $this->template->set_content('pages/kontak/index', $data);
        $this->template->render();
	}

	protected function _loadpart() {
        $data_header['active'] = 'kontak';
        $this->template->set_part('navbar', 'parts/navbar', $data_header);
        $data_footer['footer'] = $this->M_home->view('setting_ukuran');        
        $this->template->set_part('footer', 'parts/footer', $data_footer);
    }


  protected function _loadcss() {
        $this->template->set_css('bootstrap.min.css');        
        $this->template->set_css('https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i', 'remote');        
        // $this->template->set_css('https://fonts.googleapis.com/css?family=Open+Sans', 'remote');        
        $this->template->set_css('font-awesome.min.css');
        $this->template->set_css('orange.css');
        $this->template->set_css('style.css');
        $this->template->set_css('responsive.css'); 
        $this->template->set_css('owl.carousel.css');
        $this->template->set_css('owl.theme.css');
        $this->template->set_css('flexslider.css'); 
        $this->template->set_css('datepicker.css'); 
        $this->template->set_css('magnific-popup.css');
        $this->template->set_css('jquery.colorpanel.css');    
    }

    protected function _loadjs() {   
        $this->template->set_js('jquery.min.js','footer');
        $this->template->set_js('jquery.colorpanel.js','footer'); 
        $this->template->set_js('jquery.magnific-popup.min.js','footer');
        $this->template->set_js('bootstrap.min.js','footer');
        $this->template->set_js('custom-navigation.js','footer');
        $this->template->set_js('custom-gallery.js','footer'); 
    }


    public function detail($id)
    {
        $this->load->helper('url');
       // $data_header['active'] = 'produk';
        // $data_header['meta'] = $this->M_home->meta_detail($id);
        // $desc['M_desc'] = $this->M_home->meta_detail_1();
        // $data['detail'] = $this->M_home->edit($id);
        // $this->load->view('header_1',$data_header);
        // $this->load->view('V_detail', $data);
        // $data_footer['footer'] = $this->M_home->view('setting_ukuran');
        // $this->load->view('footer', $data_footer);

        $data['detail'] = $this->M_home->edit($id);
        $meta = $this->M_home->meta_detail_1();
        $this->template->set_title($this->_modul_name);
        $this->template->set_meta('author',$meta->nama_produk);
        $this->template->set_meta('keyword','');
        $this->template->set_meta('description',$meta->deskripsi_produk);
            
        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        //$this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
        $this->template->set_layout('layouts/main');
        $this->template->set_content('pages/home/detail', $data);
        $this->template->render();
    }

}
