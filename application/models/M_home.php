<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_home extends CI_Model {

	function view($table) {
		$ambil = $this->db->get($table);
		return $ambil->result_array();
	}

	function view_produk($table) {
		$this->db->order_by('id_produk','RANDOM');
		$ambil = $this->db->get($table);
		return $ambil->result_array();
	}

	public function get_all1(){
		$this->db->order_by('id_foto','DESC');
		return $this->db->get('tb_galeri');

	}

	public function get_karya(){
		$this->db->order_by('id_produk','DESC');
		$this->db->limit(3);
		return $this->db->get('tb_produk');

	}

	public function get_aktivitas(){
		$this->db->order_by('id_aktivitas','DESC');
		$this->db->limit(4);
		return $this->db->get('tb_aktivitas');

	}

	public function get_all(){
		$this->db->order_by('id_produk','DESC');
		return $this->db->get('tb_produk');

	}

	public function get_limited2($offset, $limit){
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_limited3($offset1, $limit){
		$this->db->select('*');
		$this->db->from('tb_galeri');
		$this->db->limit($limit, $offset1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function kategori_lim($limit, $offset){
        $this->db->from('tb_produk');
        $this->db->limit($limit, $offset);
        return $this->db->get();
    } 

    function getCount()
	{
		return $this->db->from("tb_produk")->count_all_results();
	}

	function edit($id) {
		$d = $this->db->get_where('tb_produk', array('id_produk'=> $id))->row();
		return $d;
	}

	function edit_aktivitas($id){
		$d = $this->db->get_where('tb_aktivitas', array('id_aktivitas'=> $id))->row();
		return $d;
	}
//template
	// function view1() {
	// 	$ambil = $this->db->get('tb_produk');
	// 	return $ambil->result_array();
	// }

	function add($data) {
		$this->db->insert('calon_maba', $data);
	}
	function delete($a) {
		$this->db->delete('calon_maba', array('No_peserta' => $a));
		 return;
	}
	function edit2($a) {
		$d = $this->db->get_where('calon_maba', array('No_peserta'=> $a))->row();
		return $d;
	}
	function update($id,$data) {
		$this->db->where('No_peserta', $id);
		$this->db->update('calon_maba', $data);
	}

	public function update_pass($where, $data) {

		$this->db->update($this->table, $data, $where);

		return $this->db->affected_rows();

	}


	function update1($id,$data3) {
		$this->db->where('Id', $id);
		$this->db->update('admin', $data3);
	}


	function get_by_id($id){
        $this->db->where('No_peserta', $id);
        return $this->db->get('calon_maba')->result();
    }
     function get_last_id(){
    	$query = $this->db->get('calon_maba');
    	return $query->last_row();
    }
    function get_last_ai(){
    	$query = $this->db->query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'elecomp_sawmaba' AND TABLE_NAME = 'calon_maba'");
    	return $query->last_row();
    }
    public function getid($id)
	{
		return $this->db->where('No_peserta',$id)
						->get('admin');
	}

	public function ubah_pass($where, $data) {

		$this->db->update('admin', $data, $where);

		return $this->db->affected_rows();

	}

	function meta_beranda(){
		$query=$this->db->get('meta_beranda');
		return $query->row();
	}

	function meta_produk(){
		$query=$this->db->get('meta_produk');
		return $query->row();
	}

	function meta_galeri(){
		$query=$this->db->get('meta_galeri');
		return $query->row();
	}

	function meta_kontak(){
		$query=$this->db->get('meta_kontak');
		return $query->row();
	}

	function meta_detail($id){
		$this->db->where('id_produk',$id);
		$query=$this->db->get('tb_produk');
		return $query->row();
	}

	function meta_detail_1(){
		$query=$this->db->get('tb_produk');
		return $query->row();
	
	}

	function meta_detail_2(){
		$query=$this->db->get('tb_aktivitas');
		return $query->row();
	
	}
//template
}