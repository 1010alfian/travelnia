<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
	public function index(){
	$data['title'] = "Data Rekening";
 	$data['bank'] = $this->db->query("SELECT * FROM tbl_bank ORDER BY kd_bank DESC")->result_array();
		// die(print_r($data));
	$this->load->view('backend/bank', $data);	
	}
	
	public function viewbank($id=""){
	$data['title'] = "Data Rekening";
 	$data['bank'] = $this->db->query("SELECT * FROM tbl_bank WHERE kd_bank = '".$id."'")->row_array();
		// die(print_r($data));
	$this->load->view('backend/view_bank', $data);	
	}

	public function tambah(){
		$config['upload_path']          = './assets/frontend/img/bank/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', 'gagal');
			redirect('backend/bank');
		}else{
			$kode = $this->getkod_model->get_kodbank();
			$data = array(
				'kd_bank' => $kode,
				'nasabah_bank' => $this->input->post('nasabah_bank'),
				'nama_bank' => $this->input->post('nama_bank'),
				'nomrek_bank' => $this->input->post('nomrek_bank'),
				'photo_bank' =>$this->upload->data('file_name'),
			 );
			// die(print_r($data)); 
			$this->db->insert('tbl_bank', $data);
			$this->session->set_flashdata('message', 'swal("Data Berhasil Di Tambah");');
			redirect('backend/bank');
		} 		
	}

	public function edit(){
		$data = array(
			'nasabah_bank' => $this->input->post('nasabah_bank'),
			'nama_bank' => $this->input->post('nama_bank'),
			'nomrek_bank' => $this->input->post('nomrek_bank'),
			'photo_bank' => $this->input->post('photo_bank'),
		);
		$where = [
			'kd_bank' => $this->input->post('id')
		];

		$this->db->update('tbl_bank', $data, $where);
		$this->session->set_flashdata('message', 'swal("Data Berhasil Di Edit");');
		redirect('backend/bank');
	}

	public function hapus($id){
		$this->db->where('kd_bank', $id);
		$this->db->delete('tbl_bank');
		$this->session->set_flashdata('message', 'swal("Data Berhasil Di Hapus");');
		redirect('backend/bank');
	}

}