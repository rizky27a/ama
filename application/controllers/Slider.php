<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Mdl_slider');
		$this->auth->restrict();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library("session");
	}
	
	function index(){
       // $this->mdl_home->getsqurity();
        $data['view_file']    = "admin/moduls/slider";
        $this->load->view('admin/admin_view',$data);
    }
	
	public function ajax_list() {
		$list = $this->Mdl_slider->get_datatables();
		$data = array();
		$no = $_REQUEST['start'];
		foreach ($list as $slider) {
			if($slider->slider_gambar==''){ $cover = 'no_image.jpg'; }else{ $cover = $slider->slider_gambar; }
			$row3 = '<img src="'.base_url().'assets/images/'.$cover.'" style="height: 500px; width: 600px;">';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $slider->slider_judul;
			$row[] = $slider->slider_deskripsi;
			$row[] = '
					  <a href="#modal-table'.$slider->id_slider.'" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
						<span class="green">
							<i class="ace-icon fa fa-eye bigger-120"></i>
						</span>
					  </a>
					  <div id="modal-table'.$slider->id_slider.'" class="modal fade" tabindex="-1">
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
                            <li><a href="javascript:void(0)" onclick="update('."'".$slider->id_slider."'".')">Edit</a></li>
                            <li><a href="javascript:void(0)" onclick="hapus('."'".$slider->id_slider."'".')">Delete</a></li>
                        </ul>
            </div>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_REQUEST['draw'],
						"recordsTotal" => $this->Mdl_slider->count_all(),
						"recordsFiltered" => $this->Mdl_slider->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}
	
	function ajax_add(){
		// $olah = explode('.', $_FILES['userfile']['name']);
		// $nama_file = $this->input->post('slider_judul').'.'.$olah[1];
		// echo var_dump($this->input->post());
		$nama = $this->input->post('slider_judul');
		$deskripsi = $this->input->post('slider_deskripsi');
		// $gambar = str_replace(' ', '_', $nama_file);

		$config['upload_path'] = realpath('assets/images');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';
		// $config['file_name'] = $nama_file;	
		$new_name = 'slider_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);

		if(!$this->upload->do_upload('userfile')){
 			$data = array(
			'slider_judul' => $nama,
			'slider_deskripsi' => $deskripsi,
			'id_admin' => $this->session->userdata('id_admin')
			);
 		}else{
 			//unlink('../assets/galeri/'.$this->input->post('terserah'));
 			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data = array(
			'slider_judul' => $nama,
			'slider_deskripsi' => $deskripsi,
			'slider_gambar' => $gambar1,
			'id_admin' => $this->session->userdata('id_admin')
			); 			
 		}	
 		
 		// print_r($data);
		$this->Mdl_slider->add($data);
		echo json_encode(array('status' => TRUE));

	}
	
	public function ajax_edit($id) {
		$data = $this->Mdl_slider->get_by_id($id);
		echo json_encode($data);
	}
	
	public function update() {
		$data = array(
				'slider_judul'           => $this->input->post('a1'),
				'slider_deskripsi'       => $this->input->post('a2'),
				'id_admin' 			     => $this->session->userdata('id_admin')
			);
		$this->Mdl_slider->update(array('id_slider' => $this->input->post('id_slider')), $data);
		echo json_encode(array("status" => TRUE));
    }
//     
	public function upload() {


		$config['upload_path'] = realpath('assets/images/');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';	
		
		$new_name = 'slider_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 		$this->upload->initialize($config);
		if($this->upload->do_upload('file-upload')){	
			$id_img1 = $this->input->post('id_slider');
			$oldImage1 = $this->Mdl_slider->get_by_id($id_img1);
			if ($oldImage1->slider_gambar != "") {
			unlink('assets/images/'.$oldImage1->slider_gambar);
			}
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
	   		$gambar1 = $nama_foto;
			$data['slider_gambar'] = $gambar1;
		}
		$data['id_admin'] = $this->session->userdata('id_admin');
 		
		$where = array('id_slider' => $this->input->post('id_slider'));			 
		$this->Mdl_slider->update_data($where,$data,'tb_slider');	
		
		echo json_encode(array('status' => TRUE));
    }

    function createThumb($filename) {
      	$source_path = base_url().'/assets/images'.$filename;
      	$target_path = base_url().'/assets/images';
      	$config_manip = array(
          	'image_library' => 'gd2',
          	'source_image' => $source_path,
          	'new_image' => $target_path,
          	'maintain_ratio' => TRUE,
          	'create_thumb' => TRUE,
          	'thumb_marker' => '_thumb',
          	'width' => 200,
          	'height' => 200
     	);

      	$this->load->library('image_lib', $config_manip);
      	if (!$this->image_lib->resize()) {
          	echo $this->image_lib->display_errors();
      	}

      	$this->image_lib->clear();
   }
	
	// public function ajax_delete($id) {
 //      $this->Mdl_slider->delete_by_id($id);
 //      echo json_encode(array("status" => TRUE));
 //    }

	public function ajax_delete($id) {
		// // Remove Image
		// $oldImage = $this->Mdl_slide->get_by_id($id);
		// unlink('assets/images/Slider/'.$oldImage->slider_gambar);

		$id_img1 = $id;
			$oldImage1 = $this->Mdl_slider->get_by_id($id_img1);
			if ($oldImage1->slider_gambar != "") {
			unlink('assets/images/'.$oldImage1->slider_gambar);
			}

      	$this->Mdl_slider->delete_by_id($id);
      	echo json_encode(array("status" => TRUE));
    }
    

}