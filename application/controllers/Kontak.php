<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Mdl_kontak');
		$this->auth->restrict();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library("session");
	}
	
	function index(){
       // $this->mdl_home->getsqurity();
        $data['view_file']    = "admin/moduls/kontak";
        $data['data_get'] = $this->Mdl_kontak->view();
        $this->load->view('admin/admin_view',$data);
    }
	
	public function ajax_edit() {
		$data = $this->Mdl_kontak->view();
		echo json_encode($data);
	}
	
	public function ajax_update() {
		$data = array(
		// $style = "height: 1000px; width: 100%",

				'deskripsi_kontak'  => $this->input->post('deskripsi_kontak'),
				'script_embed_code' => $this->input->post('script_embed_code'),
				'akun_ig'           => $this->input->post('akun_ig'),
				'akun_fb'     		=> $this->input->post('akun_fb'),
				'nomor_wa'         	=> $this->input->post('nomor_wa')
				
			);
		$this->Mdl_kontak->update(array('id_kontak' => $this->input->post('id_kontak')), $data);
		//print_r($this->db->last_query());
		echo json_encode(array("status" => TRUE));
    }
	
}