<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pendaftaran');
		//$this->auth->restrict();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library("session");
	}
	
	function index(){
       // $this->mdl_home->getsqurity();
		$data['data_ukuran']  = $this->M_pendaftaran->set_ukuran();
        $data['view_file']    = "admin/moduls/v_pendaftaran";
        $data['data_get'] = $this->M_pendaftaran->view();
        
        $this->load->view('admin/admin_view',$data);
    }

    public function ajax_list() {
		$list = $this->M_pendaftaran->get_datatables();
		$data = array();
		$no = $_REQUEST['start'];
		foreach ($list as $pendaftar) {
			if($pendaftar->foto==''){ $cover = 'no_image.jpg'; }else{ $cover = $pendaftar->foto; }
			$row3 = '<img src="'.base_url().'assets/images/'.$cover.'" style="height: 500px; width: 600px;">';
			$no++;
			$row = array();
			$row[] = "";
			$row[] = $no;
			$row[] = $pendaftar->nama_lengkap;
			$row[] = substr($pendaftar->alamat, 0, 100) ;
			$row[] = $pendaftar->alamat_email;
			$row[] = $pendaftar->no_hp;
			$row[] = $pendaftar->pekerjaan;
			$row[] = $pendaftar->perusahaan;
			$row[] = $pendaftar->telepon_kantor;
			$row[] = $pendaftar->bidang_usaha;
			$row[] = $pendaftar->jabatan;
			$row[] = '	
					  <a href="#modal-table'.$pendaftar->id_user.'" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
						<span class="green">
							<img src="'.base_url().'assets/images/'.$pendaftar->foto.'" width="150px" height="100px">
						</span>
					  </a>
					  <div id="modal-table'.$pendaftar->id_user.'" class="modal fade" tabindex="-1">
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
                            <li><a href="javascript:void(0)" onclick="edit('."'".$pendaftar->id_user."'".')">Edit</a></li>
                            <li><a href="javascript:void(0)" onclick="hapus('."'".$pendaftar->id_user."'".')">Delete</a></li>
							
						</ul>
            </div>';
			$data[] = $row;
			//<li><a href="produk/'.$pendaftar->id_produk.'/detail">Detail</a></li>
		}

		$output = array(
						"draw" => $_REQUEST['draw'],
						"recordsTotal" => $this->M_pendaftaran->count_all(),
						"recordsFiltered" => $this->M_pendaftaran->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}

	function ajax_add(){
		$res = $this->M_pendaftaran->view();
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
			); 			
 		}	
 		
 		// print_r($data);
		$this->M_pendaftaran->add($data);
		echo json_encode(array('status' => TRUE));

	}
	
	public function ajax_edit($id) {
		$data = $this->M_pendaftaran->get_by_id($id);
		echo json_encode($data);
	}
	
	public function update() {
		$data = array(

				'nama_lengkap'	=> $this->input->post('nama_lengkap'),
				'tempat' => $this->input->post('tempat'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kel' => $this->input->post('jenis_kel'),
				'alamat'  => $this->input->post('alamat'),
				'alamat_email'		=> $this->input->post('alamat_email'),
				'telepon' => $this->input->post('telepon'),
				'no_hp' => $this->input->post('no_hp'),
				'pend_terakhir' => $this->input->post('pend_terakhir'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'perusahaan' => $this->input->post('perusahaan'),
				'alamat_kantor' => $this->input->post('alamat_kantor'),
				'telepon_kantor' => $this->input->post('telepon_kantor'),
				'bidang_usaha' => $this->input->post('bidang_usaha'),
				'jabatan' => $this->input->post('jabatan'),
				
				
			);
		$this->M_pendaftaran->update(array('id_user' => $this->input->post('id_user')), $data);
		//print_r($this->db->last_query());
		echo json_encode(array("status" => TRUE));
    }

    	public function upload() {
    	$res = $this->M_pendaftaran->view();

		$config['upload_path'] = realpath('assets/images/');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';	
		
		$new_name = str_replace(" ", "-", $res->nama_lengkap);
		$config['file_name']= $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
		if($this->upload->do_upload('file-upload')){	
			$id_img1 = $this->input->post('id_user');
			$oldImage1 = $this->M_pendaftaran->get_by_id($id_img1);
			if ($oldImage1->foto != "") {
			@unlink('assets/images/'.$oldImage1->foto);
			}
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data['foto'] = $gambar1;
		}
		//$data['id_admin'] = $this->session->userdata('id_admin');
 		
		$where = array('id_user' => $this->input->post('id_user'));			 
		$this->M_pendaftaran->update_data($where,$data,'tb_pendaftaran');	
		
		echo json_encode(array('status' => TRUE));
    }
	

	public function ajax_delete($id) {
		// // Remove Image
		// $oldImage = $this->Mdl_slide->get_by_id($id);
		// unlink('assets/images/Slider/'.$oldImage->slider_gambar);

		$id_img1 = $id;
			$oldImage1 = $this->M_pendaftaran->get_by_id($id_img1);
			if ($oldImage1->foto != "") {
			@unlink('assets/images/'.$oldImage1->foto);
			}

      	$this->M_pendaftaran->delete_by_id($id);
      	echo json_encode(array("status" => TRUE));
    }
}
