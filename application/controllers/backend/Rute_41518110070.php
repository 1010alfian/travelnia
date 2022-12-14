<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rute_41518110070 extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model_41518110070');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login_41518110070');
		}
	}
	public function index(){
		$data['title'] = "List Tujuan";
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan_41518110070 ORDER BY kd_tujuan DESC")->result_array();
		// die(print_r($data));
		$this->load->view('backend/tujuan', $data);
	}
	public function viewrute($id=''){
		$data['title'] = "List Tujuan";
		$data['rute'] = $this->db->query("SELECT * FROM tbl_tujuan_41518110070 WHERE kd_tujuan = '".$id."' ")->row_array();
		// die(print_r($data));
		$this->load->view('backend/view_tujuan', $data);
	}
	public function tambahtujuan(){
		$kode = $this->getkod_model_41518110070->get_kodtuj();
		$data = array(
			'kota_tujuan' => $this->input->post('tujuan'),
			'kd_tujuan' => $kode,
			'terminal_tujuan' => $this->input->post('terminal'),
			 );
		// die(print_r($data));
		$this->db->insert('tbl_tujuan_41518110070', $data);
		// $this->session->set_flashdata('message', 'swal("Data Berhasil Di Tambah");');
		redirect('backend/rute_41518110070');
	}
}