<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends CI_Controller {

	private $_modul_name = "Web Tour";

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
        // $data['karya'] = $this->M_home->view('tb_produk');
        $data['galeri'] = $this->M_home->view('tb_galeri');
        $meta = $this->M_home->meta_galeri();
		$this->template->set_title($this->_modul_name);
        $this->template->set_meta('author',$meta->title);
        $this->template->set_meta('keyword',$meta->meta_keyword);
        $this->template->set_meta('description',$meta->meta_description);
            
        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        //$this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
        $this->template->set_layout('layouts/main');
        $this->template->set_content('pages/foto/index', $data);
        $this->template->render();
	}

	protected function _loadpart() {
        $data_header['active'] = 'foto';
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
}
