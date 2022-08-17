<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bus extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
	$data['title'] = "List Bus";
	$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY kd_bus DESC")->result_array();
	// die(print_r($data));
	$this->load->view('backend/bus', $data);	
	}
	public function viewbus($id=''){
		$data['title'] = "View Bus";
		$data['bus'] = $this->db->query("SELECT * FROM tbl_bus WHERE kd_bus = '".$id."'")->row_array();
		// die(print_r($data));
		$this->load->view('backend/view_bus', $data);
	}
	public function tambahbus(){
		$kode = $this->getkod_model->get_kodbus();
		$data = array(
			'kd_bus' => $kode,
			'nama_bus' => $this->input->post('nama_bus'),
			'plat_bus'		 => $this->input->post('plat_bus'),
			'kapasitas_bus'		 => $this->input->post('seat'),
			'status_bus'			=> '1'
			 );
		$this->db->insert('tbl_bus', $data);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Bus Di Simpan", "success");');
		redirect('backend/bus');
	}


	public function edit(){
		$data = array(
			'nama_bus' => $this->input->post('nama_bus'),
			'plat_bus'		 => $this->input->post('plat_bus'),
			'kapasitas_bus'		 => $this->input->post('seat'),
			'status_bus'			=> $this->input->post('status')
		);
		$where = [
			'kd_bus' => $this->input->post('id')
		];

		$this->db->update('tbl_bus', $data, $where);
		// $this->session->set_flashdata('message', 'swal("Data Berhasil Di Edit");');
		redirect('backend/bus');
	}

	public function hapus($id){
		$this->db->where('kd_bus', $id);
		$this->db->delete('tbl_bus');
		$this->session->set_flashdata('message', 'swal("Data Berhasil Di Edit");');
		redirect('backend/bus');
	}

}