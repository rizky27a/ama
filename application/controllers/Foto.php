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
}
