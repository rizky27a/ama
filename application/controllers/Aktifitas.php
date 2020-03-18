<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktifitas extends CI_Controller {

	private $_modul_name = "Dr. NURUDDIN HADY, SH., MH.";

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
        $data['aktivitas'] = $this->M_home->view('tb_aktivitas');
      //  $data['produk'] = $this->M_home->view_produk('tb_produk');
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
        $this->template->set_content('pages/aktivitas/index', $data);
        $this->template->render();
	}

	protected function _loadpart() {
        $data_header['active'] = 'aktifitas';
        $this->template->set_part('navbar', 'parts/navbar', $data_header);
        $data_footer['footer'] = $this->M_home->view('setting_ukuran');        
        $this->template->set_part('footer', 'parts/footer', $data_footer);
    }


    protected function _loadcss() {
        $this->template->set_css('style.css"');        
        $this->template->set_css('https://fonts.googleapis.com/css?family=PT+Serif', 'remote');        
        $this->template->set_css('https://fonts.googleapis.com/css?family=Open+Sans', 'remote');        
        $this->template->set_css('responsive.css');
        //$this->template->set_css('skin-blue.min.css');    
    }

    protected function _loadjs() {    
        $this->template->set_js('axios.min.js','header');  
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/jquery/jquery.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/bootstrap/js/bootstrap.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/jquery-ui-1.11.4/jquery-ui.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/owl.carousel-2/owl.carousel.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/jquery.bxslider/jquery.bxslider.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/jquery-validation/dist/jquery.validate.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/gmap.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/jquery.mixitup.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/jquery.fitvids.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/revolution/js/jquery.themepunch.tools.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/revolution/js/jquery.themepunch.revolution.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/revolution/js/extensions/revolution.extension.actions.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/revolution/js/extensions/revolution.extension.kenburn.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/revolution/js/extensions/revolution.extension.migration.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/revolution/js/extensions/revolution.extension.navigation.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/revolution/js/extensions/revolution.extension.parallax.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/revolution/js/extensions/revolution.extension.slideanims.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/revolution/js/extensions/revolution.extension.video.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/fancyapps-fancyBox/source/jquery.fancybox.pack.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/Polyglot-Language-Switcher-master/js/jquery.polyglot.language.switcher.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/nouislider/nouislider.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/bootstrap-touch-spin/jquery.bootstrap-touchspin.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/jquery-appear/jquery.appear.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/assets/jquery.countTo.js','footer', 'remote');
        $this->template->set_js('jquery.counterup.min.js','footer');
        $this->template->set_js('custom.js','footer');
        $this->template->set_js(base_url().'build/vue.js','footer', 'remote');  
        $this->template->set_js(base_url().'build/vue-router.js','footer', 'remote'); 
        $this->template->set_js(base_url().'build/vue-animated-list.js','footer', 'remote'); 
        $this->template->set_js(base_url().'build/vue-validator.js','footer', 'remote');       
    }

      public function detail_aktivitas($id)
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

        $data['detail'] = $this->M_home->edit_aktivitas($id);
        $data['detail_lain'] = $this->M_home->get_aktivitas()->result_array();
        $meta = $this->M_home->meta_detail_2();
        $this->template->set_title($this->_modul_name);
        $this->template->set_meta('author',$meta->nama_aktivitas);
        $this->template->set_meta('keyword','');
        $this->template->set_meta('description',$meta->deskripsi_aktivitas);
            
        $this->_loadcss();
        $this->_loadjs();
        $this->_loadpart();
        //$this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
        $this->template->set_layout('layouts/main');
        $this->template->set_content('pages/aktivitas/detail', $data);
        $this->template->render();
    }
}
