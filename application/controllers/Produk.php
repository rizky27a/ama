<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Mdl_produk');
		//$this->auth->restrict();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library("session");
	}
	
	function index(){
       // $this->mdl_home->getsqurity();
        $data['view_file']    = "admin/moduls/produk";
        $this->load->view('admin/admin_view',$data);
    }
	
	public function ajax_list() {
		$list = $this->Mdl_produk->get_datatables();
		$data = array();
		$no = $_REQUEST['start'];
		foreach ($list as $produk) {
			if($produk->produk_gambar==''){ $cover = 'no_image.jpg'; }else{ $cover = $produk->produk_gambar; }
			$row3 = '<img src="'.base_url().'assets/images/'.$cover.'" style="height: 500px; width: 600px;">';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $produk->produk_utama;
			$row[] = '
					  <a href="#modal-table'.$produk->id_produk.'" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
						<span class="green">
							<i class="ace-icon fa fa-eye bigger-120"></i>
						</span>
					  </a>
					  <div id="modal-table'.$produk->id_produk.'" class="modal fade" tabindex="-1">
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
                            <li><a href="javascript:void(0)" onclick="edit('."'".$produk->id_produk."'".')">Edit</a></li>
                            <li><a href="javascript:void(0)" onclick="hapus('."'".$produk->id_produk."'".')">Delete</a></li>
							<li class="divider"></li>
							<li><a href="'.base_url().'produk/produk_detail/'.$produk->id_produk.'">Detail</a></li>
						</ul>
            </div>';
			$data[] = $row;
			//<li><a href="produk/'.$produk->id_produk.'/detail">Detail</a></li>
		}

		$output = array(
						"draw" => $_REQUEST['draw'],
						"recordsTotal" => $this->Mdl_produk->count_all(),
						"recordsFiltered" => $this->Mdl_produk->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}
	
	function produk_detail($key){
    	$row = $this->Mdl_produk->get_by($key);

    	if (!empty($row)) {
            $data = array(
            	'id_produk' => $row->id_produk,
				'id_detail' => $row->id_detail
            );
		$data['view_file']  = "admin/moduls/detail_produk";
        $this->load->view('admin/admin_view',$data);
        } else {
            $data['view_file']  = "admin/moduls/detail_produk";
        	$this->load->view('admin/admin_view',$data);
        } 	
    }
	
	public function ajax_add(){
		// $olah = explode('.', $_FILES['userfile']['name']);
		// $nama_file = $this->input->post('produk_utama').'.'.$olah[1];
		
		// $gambar = str_replace(' ', '_', $nama_file);

		$judul = $this->input->post('produk_utama');
		$title_meta = $this->input->post('produk_title_meta');
		$deskripsi_meta = $this->input->post('produk_deskripsi_meta');
		$keyword_meta = $this->input->post('produk_keyword_meta');
		//$gambar = str_replace(' ', '_', $nama_file);

		$config['upload_path'] = realpath('assets/images');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';
		// $config['file_name'] = $nama_file;	
		
		$new_name = 'produkkategori_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
		

		if(!$this->upload->do_upload('userfile')){
 			$data = array(
			'produk_utama' => $judul,
			'produk_title_meta' => $title_meta,
			'produk_deskripsi_meta' => $deskripsi_meta,
			'produk_keyword_meta' => $keyword_meta,
			'id_admin' => $this->session->userdata('id_admin')
			);
 		}else{
 			//unlink('../assets/galeri/'.$this->input->post('terserah'));
 			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data = array(
			'produk_utama' => $judul,
			'produk_title_meta' => $title_meta,
			'produk_deskripsi_meta' => $deskripsi_meta,
			'produk_keyword_meta' => $keyword_meta,
			'produk_gambar' => $gambar1,
			'id_admin' => $this->session->userdata('id_admin')
			); 			
 		}	
 		

		$this->Mdl_produk->add($data);
		echo json_encode(array('status' => TRUE));
	}
	
	public function ajax_edit($id) {
		$data = $this->Mdl_produk->get_by_id($id);
		//print_r($this->db->last_query());
		echo json_encode($data);
	}
	
	public function update_kategori() {
		$data = array(
				'produk_utama'         	=> $this->input->post('produk_utama'),
				'produk_title_meta'     => $this->input->post('produk_title_meta'),
				'produk_deskripsi_meta' => $this->input->post('produk_deskripsi_meta'),
				'produk_keyword_meta'   => $this->input->post('produk_keyword_meta'),
				'id_admin' => $this->session->userdata('id_admin')
			);
		$this->Mdl_produk->update(array('id_produk' => $this->input->post('id_produk')), $data);
		echo json_encode(array("status" => TRUE));
    }
	
	// public function ajax_delete($id) {
	// 	// Remove Image
	// 	$oldImage = $this->Mdl_produk->get_by_id($id);
	// 	unlink('assets/images/'.$oldImage->produk_gambar);

 //     	$this->Mdl_produk->delete_by_id($id);
 //      	echo json_encode(array("status" => TRUE));
 //    }
    
    public function ajax_delete($id) {
		// // Remove Image
		// $oldImage = $this->Mdl_slide->get_by_id($id);
		// unlink('assets/images/Slider/'.$oldImage->slider_gambar);

		$id_img1 = $id;
			$oldImage1 = $this->Mdl_produk->get_by_id($id_img1);
			if ($oldImage1->produk_gambar != "") {
			unlink('assets/images/'.$oldImage1->produk_gambar);
			}

      	$this->Mdl_produk->delete_by_id($id);
      	echo json_encode(array("status" => TRUE));
    }
	
	public function create_load(){
		$this->load->view('moduls/load_produk');
	}
	
	function detail(){
       // $this->mdl_home->getsqurity();
	    $data['produk']       = $this->Mdl_produk->get_produk();
        $data['view_file']    = "admin/moduls/produk_det";
        $this->load->view('admin/admin_view',$data);
    }
	
	public function ajax_listid() {
		$kdProduk = $this->uri->segment(3);
		$list = $this->Mdl_produk->get_datatablesid($kdProduk);
		//print_r($this->db->last_query());
		$data = array();
		$no = $_REQUEST['start'];
		foreach ($list as $produk_det) {
			if($produk_det->detail_gambar==''){ $cover = 'no_image.jpg'; }else{ $cover = $produk_det->detail_gambar; }
			$row3 = '<img src="'.base_url().'assets/images/'.$cover.'" style="height: 500px; width: 600px;">';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $produk_det->detail_judul;
			$row[] = $produk_det->detail_deskripsi;
			$row[] = '
					  <a href="#modal-table'.$produk_det->id_detail.'" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
						<span class="green">
							<i class="ace-icon fa fa-eye bigger-120"></i>
						</span>
					  </a>
					  <div id="modal-table'.$produk_det->id_detail.'" class="modal fade" tabindex="-1">
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
                            <li><a href="javascript:void(0)" onclick="edit('."'".$produk_det->id_detail."'".')">Edit</a></li>
                            <li><a href="javascript:void(0)" onclick="hapuse('."'".$produk_det->id_detail."'".')">Delete</a></li>
							
                        </ul>
            </div>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_REQUEST['draw'],
						"recordsTotal" => $this->Mdl_produk->count_allid($kdProduk),
						"recordsFiltered" => $this->Mdl_produk->count_filteredid($kdProduk),
						"data" => $data,
				);
		echo json_encode($output);
	}
	
	public function ajax_addproduk() {
		// $olah = explode('.', $_FILES['userfile']['name']);
		// $nama_file = $this->input->post('detail_judul').'.'.$olah[1];
		
		// $gambar = str_replace(' ', '_', $nama_file);

		$id_produk = $this->input->post('id_produk');
		$judul = $this->input->post('detail_judul');
		$deskripsi = $this->input->post('detail_deskripsi');
		$title_meta = $this->input->post('detail_title_meta');
		$deskripsi_meta = $this->input->post('detail_deskripsi_meta');
		$keyword_meta = $this->input->post('detail_keyword_meta');
		//$gambar = str_replace(' ', '_', $nama_file);

		$config['upload_path'] = realpath('assets/images');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';
		// $config['file_name'] = $nama_file;	
		$new_name = 'produkdetail_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
		// $this->upload->do_upload('userfile');

		if(!$this->upload->do_upload('userfile')){
 			$data = array(
			'id_produk' => $id_produk,
			'detail_judul' => $judul,
			'detail_deskripsi' => $deskripsi,
			'detail_title_meta' => $title_meta,
			'detail_deskripsi_meta' => $deskripsi_meta,
			'detail_keyword_meta' => $keyword_meta,
			'id_admin' => $this->session->userdata('id_admin')
			);
 		}else{
 			//unlink('../assets/galeri/'.$this->input->post('terserah'));
 			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data = array(
			'id_produk' => $id_produk,
			'detail_judul' => $judul,
			'detail_deskripsi' => $deskripsi,
			'detail_title_meta' => $title_meta,
			'detail_deskripsi_meta' => $deskripsi_meta,
			'detail_keyword_meta' => $keyword_meta,
			'detail_gambar' => $gambar1,
			'id_admin' => $this->session->userdata('id_admin')
			); 			
 		}	
 		

		$this->Mdl_produk->addproduk($data);
		
		echo json_encode(array('status' => TRUE));
	}
	
	public function ajax_editproduk($id) {
		$data = $this->Mdl_produk->get_by_prod($id);
		//print_r($this->db->last_query());
		echo json_encode($data);
	}
	
	public function update() {
		$data = array(
				'detail_judul' 				=> $this->input->post('detail_judul'),
				'detail_deskripsi' 			=> $this->input->post('detail_deskripsi'),
				'detail_title_meta' 		=> $this->input->post('detail_title_meta'),
				'detail_deskripsi_meta' 	=> $this->input->post('detail_deskripsi_meta'),
				'detail_keyword_meta' 		=> $this->input->post('detail_keyword_meta'),
				'id_admin' 					=> $this->session->userdata('id_admin')
			);
		$this->Mdl_produk->update(array('id_detail' => $this->input->post('id_detail')), $data);
		echo json_encode(array("status" => TRUE));
    }
	
    //masuk e ng db detaionya
//     public function upload() {
    	
// 		// Remove Image
// 		$id_img = $this->input->post('id_detail');
// 		$oldImage = $this->Mdl_produk->get_by_id($id_img);
// 		//fungsi @ untuk apabila gambar kosong yang telah diinputkan di tampilan awala maka dapat diambil dri data gmambar
// 		if(@$oldImage->detail_gambar!=""){
// 			@unlink('assets/images/'.@$oldImage->detail_gambar);
// 		}
//   //       //if(!$modul){$this->session->set_userdata('err_msg', 'Anda Harus pilih salah satu Modul.'); redirect('admin');}
// 		$gambar = $_FILES['file-upload']['name'];
// 		// //$nama_file = $this->input->post('slider_judul').'.'.$olah[1];

// 		$olah = explode('.', $_FILES['file-upload']['name']);
// 		$nama = $this->input->post('produk_utama').'.'.$olah[1];

// 		$deskripsi = $this->input->post('produk_deskripsi_meta');
// 		// $nama = $this->input->post('nama_kantorpemerintahan');
// 		// $deskripsi = $this->input->post('deskripsi_kantorpemerintahan');
// 		// //$gambar = str_replace(' ', '_', $nama_file);

// 		$gambar = str_replace('', '_', $nama);
// // // untuk menamilkan id_upload gambar biar  muncul di bagian update kategori
// 		$new_name = 'produkdetail_'.$id_img.time();
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
// 			'detail_gambar' => $nama_foto,
// 			'id_admin' => $this->session->userdata('id_admin')
// 			); 			
 	

// 		$where = array('id_detail' => $this->input->post('id_detail'));			 
// 		$this->Mdl_produk->update_data($where,$data,'tb_produk');	
		
// 		echo json_encode(array('status' => TRUE));
//     }

     public function upload() {


		$config['upload_path'] = realpath('assets/images/');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';	
		
		$new_name = 'produkdetail_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
		if($this->upload->do_upload('file-upload')){	
			$id_img1 = $this->input->post('id_detail');
			$oldImage = $this->Mdl_produk->get_by_id2($id_img1);
			if($oldImage->detail_gambar != "") {
			unlink('assets/images/'.$oldImage->detail_gambar);
			}
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data['detail_gambar'] = $gambar1;
		}
		$data['id_admin'] = $this->session->userdata('id_admin');
 		
		$where = array('id_detail' => $this->input->post('id_detail'));			 
		$this->Mdl_produk->update_data($where,$data,'tb_produk');	
		
		echo json_encode(array('status' => TRUE));
    }


	
  //   //untuk uploadnya detailnya ???
  //   public function upload_kat() {
		// // Remove Image
	 // 	$id_img = $this->input->post('id_produk');
		// $oldImage = $this->Mdl_produk->get_by_id2($id_img);
		// //fungsi @ untuk apabila gambar kosong maka dapat diambil dri data gmambar
		// if(@$oldImage->produk_gambar!=""){
		// 	@unlink('assets/images/'.@$oldImage->produk_gambar);
		// }
		
		// $gambar2 = $_FILES['file-upload']['name'];
		// // //$nama_file = $this->input->post('slider_judul').'.'.$olah[1];

		// $olah = explode('.', $_FILES['file-upload']['name']);
		// $nama = $this->input->post('produk_utama').'.'.$olah[1];

		// $deskripsi = $this->input->post('produk_deskripsi_meta');

		// $new_name = 'produkkategori_'.$id_img.time();

		// $gambar2 = str_replace(' ', '_', $new_name);
		// $config['file_name'] = $new_name;

		// // $judul 	= $this->input->post('judul_kategori_kantorpemerintahan');
		// // $deskripsi = $this->input->post('kategori_kantorpemerintahan_deskripsi_meta');
		// // //$gambar = str_replace(' ', '_', $nama_file);

		// $config['upload_path'] = realpath('assets/images');
		// $config['allowed_types']        = 'gif|jpg|png';
		// $config['max_size'] = '2000000';
  //       $config['max_width'] = '2024';
  //       $config['max_height']= '1468';
		// // $config['file_name'] = $nama_file;	
		
		// $this->load->library('upload', $config);
 	// 	$this->upload->initialize($config);
		// $this->upload->do_upload('file-upload');

		// $get_name = $this->upload->data();
	 //   	$nama_foto = $get_name['file_name'];
 			
		// $data = array(
		// 	'produk_gambar' => $nama_foto,
		// 	'id_admin' => $this->session->userdata('id_admin')
		// 	); 			

		// $where = array('id_produk' => $this->input->post('id_produk'));
		// $this->Mdl_produk->update_kat2($where,$data,'tb_kategori_produk');	
		// //print_r($this->db->last_query());
		// echo json_encode(array('status' => TRUE));
  //   }


    //upload kategori produk
    public function upload_kat() {


		$config['upload_path'] = realpath('assets/images/');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';	
		
		$new_name = 'produkkategori_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
		if($this->upload->do_upload('file-upload')){	
			$id_img1 = $this->input->post('id_produk');
			$oldImage1 = $this->Mdl_produk->get_by_id($id_img1);
			if ($oldImage1->produk_gambar != "") {
			unlink('assets/images/'.$oldImage1->produk_gambar);
			}
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data['produk_gambar'] = $gambar1;
		}
		$data['id_admin'] = $this->session->userdata('id_admin');
 		
		$where = array('id_produk' => $this->input->post('id_produk'));			 
		$this->Mdl_produk->update_data($where,$data,'tb_kategori_produk');	
		
		echo json_encode(array('status' => TRUE));
    }
	
	// public function ajax_delproduk($id) {
 //      $this->Mdl_produk->delete_by($id);
 //      echo json_encode(array("status" => TRUE));
 //    }

    public function ajax_delproduk($id) {
		// // Remove Image
		// $oldImage = $this->Mdl_slide->get_by_id($id);
		// unlink('assets/images/Slider/'.$oldImage->slider_gambar);

		$id_img1 = $id;
			$oldImage1 = $this->Mdl_produk->get_by_id2($id_img1);
			if ($oldImage1->detail_gambar != "") {
			unlink('assets/images/'.$oldImage1->detail_gambar);
			}

      	$this->Mdl_produk->delete_by($id);
      	echo json_encode(array("status" => TRUE));
    }
}