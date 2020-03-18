<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Mdl_gallery');
		$this->auth->restrict();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library("session");
	}
	
	function index(){
       // $this->mdl_home->getsqurity();
        $data['view_file']    = "admin/moduls/gallery";
        $this->load->view('admin/admin_view',$data);
    }
	
	public function ajax_list() {
		$list = $this->Mdl_gallery->get_datatables();
		$data = array();
		$no = $_REQUEST['start'];
		foreach ($list as $album) {
			if($album->album_gambar==''){ $cover = 'no_image.jpg'; }else{ $cover = $album->album_gambar; }
			$row2 = '<img src="'.base_url().'assets/images/'.$cover.'" style="height: 500px; width: 600px;">';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $album->album_nama;
			$row[] = '
					  <a href="#modal-table'.$album->id_album.'" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
						<span class="green">
							<i class="ace-icon fa fa-eye bigger-120"></i>
						</span>
					  </a>
					  <div id="modal-table'.$album->id_album.'" class="modal fade" tabindex="-1">
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
									'.$row2.'
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
                            <li><a href="javascript:void(0)" onclick="edit('."'".$album->id_album."'".')">Edit</a></li>
                            <li><a href="javascript:void(0)" onclick="hapus('."'".$album->id_album."'".')">Delete</a></li>
							<li class="divider"></li>
							<li><a href="gallery/'.$album->id_album.'/detail">Detail</a></li>
                        </ul>
            </div>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_REQUEST['draw'],
						"recordsTotal" => $this->Mdl_gallery->count_all(),
						"recordsFiltered" => $this->Mdl_gallery->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}
	
	// public function ajax_add() {
	// 	// $olah = explode('.', $_FILES['userfile']['name']);
	// 	$nama_file = $this->input->post('album_nama').'.'.$olah[1];
		
	// 	// $gambar = str_replace(' ', '_', $nama_file);

	// 	$config['upload_path'] = realpath('assets/images');
	// 	$config['allowed_types']        = 'gif|jpg|png';
	// 	$config['max_size'] = '2000000';
 //        $config['max_width'] = '2024';
 //        $config['max_height']= '1468';
	// 	$config['file_name'] = $nama_file;	
		
	// 	$this->load->library('upload', $config);
 // 		$this->upload->initialize($config);
	// 	$this->upload->do_upload('userfile');

	// 	if(empty($gambar)){
 // 			$data = array(
	// 			'album_nama'           => $this->input->post('album_nama'),
	// 			'album_title_meta'     => $this->input->post('album_title_meta'),
	// 			'album_deskripsi_meta' => $this->input->post('album_deskripsi_meta'),
	// 			'album_keyword_meta'   => $this->input->post('album_keyword_meta'),
	// 			'id_admin' => $this->session->userdata('id_admin')
	// 		);
 // 		}else{
 			
	// 		$data = array(
	// 			'album_nama'           => $this->input->post('album_nama'),
	// 			'album_title_meta'     => $this->input->post('album_title_meta'),
	// 			'album_deskripsi_meta' => $this->input->post('album_deskripsi_meta'),
	// 			'album_keyword_meta'   => $this->input->post('album_keyword_meta'),
	// 			'album_gambar' => $gambar,
	// 			'id_admin' => $this->session->userdata('id_admin')
	// 		); 			
 // 		}	
		
	// 	$insert = $this->Mdl_gallery->add($data);
	// 	//print_r($this->db->last_query());
	// 	echo json_encode(array('status' => TRUE));
	// }

	public function ajax_add(){
		// $olah = explode('.', $_FILES['userfile']['name']);
		// $nama_file = $this->input->post('produk_utama').'.'.$olah[1];
		
		// $gambar = str_replace(' ', '_', $nama_file);

		$judul = $this->input->post('album_nama');
		$title_meta = $this->input->post('album_title_meta');
		$deskripsi_meta = $this->input->post('album_deskripsi_meta');
		$keyword_meta = $this->input->post('album_keyword_meta');
		//$gambar = str_replace(' ', '_', $nama_file);

		$config['upload_path'] = realpath('assets/images');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';
		// $config['file_name'] = $nama_file;	
		
		$new_name = 'fotokategori_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
		

		if(!$this->upload->do_upload('userfile')){
 			$data = array(
			'album_nama' => $judul,
			'album_title_meta' => $title_meta,
			'album_deskripsi_meta' => $deskripsi_meta,
			'album_keyword_meta' => $keyword_meta,
			'id_admin' => $this->session->userdata('id_admin')
			);
 		}else{
 			//unlink('../assets/galeri/'.$this->input->post('terserah'));
 			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data = array(
			'album_nama' => $judul,
			'album_title_meta' => $title_meta,
			'album_deskripsi_meta' => $deskripsi_meta,
			'album_keyword_meta' => $keyword_meta,
			'album_gambar' => $gambar1,
			'id_admin' => $this->session->userdata('id_admin')
			); 			
 		}	
 		

		$this->Mdl_gallery->add($data);
		echo json_encode(array('status' => TRUE));
	}
	
	public function ajax_edit($id) {
		$data = $this->Mdl_gallery->get_by_id($id);
		echo json_encode($data);
	}
	
	public function ajax_update() {
		$data = array(
				'album_nama'         	=> $this->input->post('album_nama'),
				'album_title_meta'     => $this->input->post('album_title_meta'),
				'album_deskripsi_meta' => $this->input->post('album_deskripsi_meta'),
				'album_keyword_meta'   => $this->input->post('album_keyword_meta'),
				'album_deskripsi_meta'   => $this->input->post('album_deskripsi_meta'),
				'id_admin' => $this->session->userdata('id_admin')
			);
		$this->Mdl_gallery->update(array('id_album' => $this->input->post('id_album')), $data);
		echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_delete($id) {
		// Remove Image
		$oldImage = $this->Mdl_gallery->get_by_id($id);
		unlink('assets/images/'.$oldImage->album_gambar);

      	$this->Mdl_gallery->delete_by_id($id);
      	echo json_encode(array("status" => TRUE));
    }
	
	public function create_load(){
		$this->load->view('moduls/load_foto');
	}
	
	function foto(){
       // $this->mdl_home->getsqurity();
	    $data['album']       = $this->Mdl_gallery->get_album();
        $data['view_file']    = "admin/moduls/detail_gallery";
        $this->load->view('admin/admin_view',$data);
    }
	
	public function ajax_listid() {
		$kdAlbum = $this->uri->segment(3);
		$list = $this->Mdl_gallery->get_datatablesid($kdAlbum);
		//print_r($this->db->last_query());
		$data = array();
		$no = $_REQUEST['start'];
		foreach ($list as $foto) {
			if($foto->gallery_gambar==''){ $cover = 'no_image.jpg'; }else{ $cover = $foto->gallery_gambar; }
			$row3 = '<img src="'.base_url().'assets/images/'.$cover.'" style="height: 500px; width: 600px;">';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $foto->gallery_nama;
			$row[] = '
					  <a href="#modal-table'.$foto->id_gallery.'" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
						<span class="green">
							<i class="ace-icon fa fa-eye bigger-120"></i>
						</span>
					  </a>
					  <div id="modal-table'.$foto->id_gallery.'" class="modal fade" tabindex="-1">
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
                            <li><a href="javascript:void(0)" onclick="edite('."'".$foto->id_gallery."'".')">Edit</a></li>
                            <li><a href="javascript:void(0)" onclick="hapuse('."'".$foto->id_gallery."'".')">Delete</a></li>
                        </ul>
            </div>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_REQUEST['draw'],
						"recordsTotal" => $this->Mdl_gallery->count_allid($kdAlbum),
						"recordsFiltered" => $this->Mdl_gallery->count_filteredid($kdAlbum),
						"data" => $data,
				);
		echo json_encode($output);
	}
	
	public function ajax_addfoto() {
		// $gambar = $_FILES['userfile']['name'];
		//$nama_file = $this->input->post('slider_judul').'.'.$olah[1];

		$id_album = $this->input->post('id_album');
		$nama = $this->input->post('gallery_nama');
		$title_meta = $this->input->post('gallery_title_meta');
		$deskripsi_meta = $this->input->post('gallery_deskripsi_meta');
		$keyword_meta = $this->input->post('gallery_keyword_meta');
		//$gambar = str_replace(' ', '_', $nama_file);

		$config['upload_path'] = realpath('assets/images');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';

		$new_name = 'fotodetail_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
		// $this->upload->do_upload('userfile');

		if(!$this->upload->do_upload('userfile')){
 			$data = array(
			'id_album' => $id_album,
			'gallery_nama' => $nama,
			'gallery_title_meta' => $title_meta,
			'gallery_deskripsi_meta' => $deskripsi_meta,
			'gallery_keyword_meta' => $keyword_meta,
			'id_admin' => $this->session->userdata('id_admin')
			);
 		}else{
 			//unlink('../assets/galeri/'.$this->input->post('terserah'));
 			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data = array(
			'id_album' => $id_album,
			'gallery_nama' => $nama,
			'gallery_title_meta' => $title_meta,
			'gallery_deskripsi_meta' => $deskripsi_meta,
			'gallery_keyword_meta' => $keyword_meta,
			'gallery_gambar' => $gambar1,
			'id_admin' => $this->session->userdata('id_admin')
			); 			
 		}	
 		

		$this->Mdl_gallery->addfoto($data);
		echo json_encode(array('status' => TRUE));
	}
	
	public function ajax_editfoto($id) {
		$data = $this->Mdl_gallery->get_by_foto($id);
		echo json_encode($data);
	}
	
	public function update_foto() {
		
		// 'slider_judul'           => $this->input->post('a1'),
		
		$data = array(
				'nama' => $this->input->post('gallery_nama'),
				'title_meta' => $this->input->post('gallery_title_meta'),
				'deskripsi_meta' => $this->input->post('gallery_deskripsi_meta'),
				'keyword_meta' => $this->input->post('gallery_keyword_meta'),
				'id_admin' => $this->session->userdata('id_admin')
			);
		$this->Mdl_gallery->update_foto(array('id_gallery' => $this->input->post('id_gallery')), $data);
		echo json_encode(array("status" => TRUE));
    }
	

    //ke table album nya ->untuk bagian kat.foto
//     public function upload() {
    	
// 		// Remove Image
// 		$id_img = $this->input->post('id_album');
// 		$oldImage = $this->Mdl_gallery->get_by_id($id_img);
// 		//fungsi @ untuk apabila gambar kosong yang telah diinputkan di tampilan awala maka dapat diambil dri data gmambar
// 		if(@$oldImage->album_gambar!=""){
// 			@unlink('assets/images/'.@$oldImage->album_gambar);
// 		}
//   //       //if(!$modul){$this->session->set_userdata('err_msg', 'Anda Harus pilih salah satu Modul.'); redirect('admin');}
// 		$gambar = $_FILES['file-upload']['name'];
// 		// //$nama_file = $this->input->post('slider_judul').'.'.$olah[1];

// 		$olah = explode('.', $_FILES['file-upload']['name']);
// 		$nama = $this->input->post('album_nama').'.'.$olah[1];

// 		$deskripsi = $this->input->post('album_deskripsi_meta');
// 		// $nama = $this->input->post('nama_kantorpemerintahan');
// 		// $deskripsi = $this->input->post('deskripsi_kantorpemerintahan');
// 		// //$gambar = str_replace(' ', '_', $nama_file);

// 		$gambar = str_replace('', '_', $nama);
// // // untuk menamilkan id_upload gambar biar  muncul di bagian update kategori
// 		$new_name = 'gallerykat_'.$id_img.time();
// 		$config['file_name'] = $new_name;
		
// 		$config['upload_path'] = realpath('assets/images');
// 		$config['allowed_types']        = 'gif|jpg|png';
// 		$config['max_size'] = '2000000';
//         $config['max_width'] = '2024';
//         $config['max_height']= '1468';
// 		// $config['file_name'] = $gambar2;	
		
// 		$this->load->library('upload', $config);
//  		$this->upload->initialize($config);
// 		$this->upload->do_upload('file-upload');
// 		//untuk fungsi upload file gambarnya biar keluar di halaman
// 			$get_name = $this->upload->data();
// 	   		$nama_foto = $get_name['file_name'];
//  		//
// 			$data = array(
// 			'album_gambar' => $nama_foto,
// 			'id_admin' => $this->session->userdata('id_admin')
// 			); 			
 	

// 		$where = array('id_album' => $this->input->post('id_album'));			 
// 		$this->Mdl_gallery->update_data($where,$data,'tb_album');	
		
// 		echo json_encode(array('status' => TRUE));
//     }
    public function upload() {


		$config['upload_path'] = realpath('assets/images/');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';	
		
		$new_name = 'fotokategori_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
		if($this->upload->do_upload('file-upload')){	
			$id_img1 = $this->input->post('id_album');
			$oldImage1 = $this->Mdl_gallery->get_by_id($id_img1);
			if ($oldImage1->album_gambar != "") {
			unlink('assets/images/'.$oldImage1->album_gambar);
			}
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data['album_gambar'] = $gambar1;
		}
		$data['id_admin'] = $this->session->userdata('id_admin');
 		
		$where = array('id_album' => $this->input->post('id_album'));			 
		$this->Mdl_gallery->update_data($where,$data,'tb_album');	
		
		echo json_encode(array('status' => TRUE));
    }
	
	// public function ajax_delfoto($id) {
 //      $this->Mdl_gallery->delete_by($id);
 //      echo json_encode(array("status" => TRUE));
 //    }
    public function ajax_delfoto($id) {
		// // Remove Image
		// $oldImage = $this->Mdl_slide->get_by_id($id);
		// unlink('assets/images/Slider/'.$oldImage->slider_gambar);

		$id_img1 = $id;
			$oldImage1 = $this->Mdl_gallery->get_by_id2($id_img1);
			if ($oldImage1->gallery_gambar != "") {
			unlink('assets/images/'.$oldImage1->gallery_gambar);
			}

      	$this->Mdl_gallery->delete_by_id2($id);
      	echo json_encode(array("status" => TRUE));
    }
    
	
	function gallery_detail($key){
    	$row = $this->Mdl_gallery->get_by($key);

    	if (!empty($row)) {
            $data = array(
            	'id_album' => $row->id_album,
				'id_gallery' => $row->id_gallery
            );
		$data['view_file']  = "admin/moduls/detail_foto";
        $this->load->view('admin/admin_view',$data);
        } else {
            $data['view_file']  = "admin/moduls/detail_foto";
        	$this->load->view('admin/admin_view',$data);
        } 	
    }

//     public function upload_det() {
    	
// 		// Remove Image
// 		$id_img = $this->input->post('id_gallery');
// 		$oldImage = $this->Mdl_gallery->get_by_id2($id_img);
// 		//fungsi @ untuk apabila gambar kosong yang telah diinputkan di tampilan awala maka dapat diambil dri data gmambar
// 		if(@$oldImage->gallery_gambar!=""){
// 			@unlink('assets/images/'.@$oldImage->gallery_gambar);
// 		}
//   //       //if(!$modul){$this->session->set_userdata('err_msg', 'Anda Harus pilih salah satu Modul.'); redirect('admin');}
// 		$gambar = $_FILES['file-upload']['name'];
// 		// //$nama_file = $this->input->post('slider_judul').'.'.$olah[1];

// 		$olah = explode('.', $_FILES['file-upload']['name']);
// 		$nama = $this->input->post('gallery_nama').'.'.$olah[1];

// 		$deskripsi = $this->input->post('gallery_deskripsi_meta');
// 		// $nama = $this->input->post('nama_kantorpemerintahan');
// 		// $deskripsi = $this->input->post('deskripsi_kantorpemerintahan');
// 		// //$gambar = str_replace(' ', '_', $nama_file);

// 		$gambar = str_replace('', '_', $nama);
// // // untuk menamilkan id_upload gambar biar  muncul di bagian update kategori
// 		$new_name = 'galerydetail_'.$id_img.time();
// 		$config['file_name'] = $new_name;
		
// 		$config['upload_path'] = realpath('assets/images');
// 		$config['allowed_types']        = 'gif|jpg|png';
// 		$config['max_size'] = '2000000';
//         $config['max_width'] = '2024';
//         $config['max_height']= '1468';
// 		// $config['file_name'] = $gambar2;	
		
// 		$this->load->library('upload', $config);
//  		$this->upload->initialize($config);
// 		$this->upload->do_upload('file-upload');
// 		//untuk fungsi upload file gambarnya biar keluar di halaman
// 			$get_name = $this->upload->data();
// 	   		$nama_foto = $get_name['file_name'];
//  		//
// 			$data = array(
// 			'gallery_gambar' => $nama_foto,
// 			'id_admin' => $this->session->userdata('id_admin')
// 			); 			
 	

// 		$where = array('id_gallery' => $this->input->post('id_gallery'));			 
// 		$this->Mdl_gallery->update_foto($where,$data,'tb_foto');	
		
// 		echo json_encode(array('status' => TRUE));
//     }
    public function upload_det() {


		$config['upload_path'] = realpath('assets/images/');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';	
		
		$new_name = 'fotodetail_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
		if($this->upload->do_upload('file-upload')){	
			$id_img1 = $this->input->post('id_gallery');
			$oldImage1 = $this->Mdl_gallery->get_by_id2($id_img1);
			if ($oldImage1->gallery_gambar != "") {
			unlink('assets/images/'.$oldImage1->gallery_gambar);
			}
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data['gallery_gambar'] = $gambar1;
		}
		$data['id_admin'] = $this->session->userdata('id_admin');
 		
		$where = array('id_gallery' => $this->input->post('id_gallery'));			 
		$this->Mdl_gallery->update_data($where,$data,'tb_foto');	
		
		echo json_encode(array('status' => TRUE));
    }

}