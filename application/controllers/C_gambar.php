<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_gambar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('M_home');
		// $this->load->model('');
	}

	

	public function gallery()
	{
		$this->load->helper('url');
		$data_header['active'] = 'gallery';
		$this->load->view('header', $data_header);
		$data['galeri'] = $this->M_home->view('tb_galeri');
		$total_gambar = $this->M_home->get_all1()->num_rows();
        $data['total_gambar'] = ceil($total_gambar/4);
        $data['jenis'] = null;
		$this->load->view('v_gallery',$data);
		$this->load->view('footer');
	}




	public function load_gambar($jenis=null){
		$offset1 = ceil($this->input->post('offset1')*4);
		echo "off".$offset1;
		$data['gambar'] = $this->M_home->get_limited3($offset1,4);
		print_r($this->db->last_query());
		echo $this->load->view('view_gambar', $data);
	}
}
