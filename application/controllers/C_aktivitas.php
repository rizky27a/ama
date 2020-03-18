<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_aktivitas extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('M_aktivitas');
		//$this->auth->restrict();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library("session");
	}
	
	function index(){
       // $this->mdl_home->getsqurity();
		$data['data_ukuran']  = $this->M_aktivitas->set_ukuran();
        $data['view_file']    = "admin/moduls/V_aktivitas";
        $data['data_get'] = $this->M_aktivitas->view();
        
        $this->load->view('admin/admin_view',$data);
    }

    public function ajax_list() {
		$list = $this->M_aktivitas->get_datatables();
		$data = array();
		$no = $_REQUEST['start'];
		foreach ($list as $produk) {
			if($produk->file_foto_aktivitas==''){ $cover = 'no_image.jpg'; }else{ $cover = $produk->file_foto_aktivitas; }
			$row3 = '<img src="'.base_url().'assets/images/'.$cover.'" style="height: 500px; width: 600px;">';
			$no++;
			$row = array();
			$row[] = "";
			$row[] = $no;
			$row[] = $produk->nama_aktivitas;
			$row[] = substr($produk->deskripsi_aktivitas, 0, 100) ;
			$row[] = '	
					  <a href="#modal-table'.$produk->id_aktivitas.'" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
						<span class="green">
							<img src="'.base_url().'assets/images/'.$produk->file_foto_aktivitas.'" width="150px" height="100px">
						</span>
					  </a>
					  <div id="modal-table'.$produk->id_aktivitas.'" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header no-padding">
									<div class="table-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										<span class="white">&times;</span>
									</button>
									Gambar
									</div>
								</div>

								<div class="modal-body no-padding">
								<div align="center">
									'.$row3.'
								</div>		
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
						</div>
					';
			$row[] = '
			<div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Aksi <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="javascript:void(0)" onclick="edit('."'".$produk->id_aktivitas."'".')">Edit</a></li>
                            <li><a href="javascript:void(0)" onclick="hapus('."'".$produk->id_aktivitas."'".')">Delete</a></li>
							
						</ul>
            </div>';
			$data[] = $row;
			//<li><a href="produk/'.$produk->id_produk.'/detail">Detail</a></li>
		}

		$output = array(
						"draw" => $_REQUEST['draw'],
						"recordsTotal" => $this->M_aktivitas->count_all(),
						"recordsFiltered" => $this->M_aktivitas->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}

	function ajax_add(){
		$res = $this->M_aktivitas->view();
		// $olah = explode('.', $_FILES['userfile']['name']);
		// $nama_file = $this->input->post('slider_judul').'.'.$olah[1];
		// echo var_dump($this->input->post());
		$nama = $this->input->post('nama_aktivitas');
		$deskripsi = $this->input->post('deskripsi_aktivitas');
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
			'nama_aktivitas' => $nama,
			'deskripsi_aktivitas' => $deskripsi,
			);
 		}else{
 			//unlink('../assets/galeri/'.$this->input->post('terserah'));
 			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data = array(
			'nama_aktivitas' => $nama,
			'deskripsi_aktivitas' => $deskripsi,
			'file_foto_aktivitas' => $gambar1,
			); 			
 		}	
 		
 		// print_r($data);
		$this->M_aktivitas->add($data);
		echo json_encode(array('status' => TRUE));

	}
	
	public function ajax_edit($id) {
		$data = $this->M_aktivitas->get_by_id($id);
		echo json_encode($data);
	}
	
	public function update() {
		$data = array(

				'nama_aktivitas'		=> $this->input->post('nama_aktivitas'),
				'deskripsi_aktivitas'  => $this->input->post('deskripsi_aktivitas'),
				
			);
		$this->M_aktivitas->update(array('id_aktivitas' => $this->input->post('id_aktivitas')), $data);
		//print_r($this->db->last_query());
		echo json_encode(array("status" => TRUE));
    }

    	public function upload() {
    	$id_aktivitas = $this->input->post('id_aktivitas');	
    	$res = $this->M_aktivitas->view_id($id_aktivitas);

		$config['upload_path'] = realpath('assets/images/');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';	
		
		$new_name = str_replace(" ", "-", $res->nama_aktivitas);
		$config['file_name']= $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
		if($this->upload->do_upload('file-upload')){	
			$id_img1 = $this->input->post('id_aktivitas');
			$oldImage1 = $this->M_aktivitas->get_by_id($id_img1);
			if ($oldImage1->file_foto_aktivitas != "") {
			@unlink('assets/images/'.$oldImage1->file_foto_aktivitas);
			}
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data['file_foto_aktivitas'] = $gambar1;
		}
		//$data['id_admin'] = $this->session->userdata('id_admin');
 		
		$where = array('id_aktivitas' => $this->input->post('id_aktivitas'));			 
		$this->M_aktivitas->update_data($where,$data,'tb_aktivitas');	
		
		echo json_encode(array('status' => TRUE));
    }
	

	public function ajax_delete($id) {
		// // Remove Image
		// $oldImage = $this->Mdl_slide->get_by_id($id);
		// unlink('assets/images/Slider/'.$oldImage->slider_gambar);

		$id_img1 = $id;
			$oldImage1 = $this->M_aktivitas->get_by_id($id_img1);
			if ($oldImage1->file_foto_aktivitas != "") {
			@unlink('assets/images/'.$oldImage1->file_foto_aktivitas);
			}

      	$this->M_aktivitas->delete_by_id($id);
      	echo json_encode(array("status" => TRUE));
    }
}
