 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->model('getkod_model');
		$this->getsecurity();
		$this->load->library('form_validation');
		$this->load->helper('tglindo_helper');
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
		$data['title'] = "Jadwal & Harga";
		$data['jadwal'] = $this->db->query("SELECT  a.kd_jadwal, b.kota_tujuan as kota_tujuan_asal, c.kota_tujuan as kota_tujuan_tujuan, a.jam_berangkat_jadwal, a.jam_tiba_jadwal, a.harga_jadwal, b.kd_tujuan as kd_tujuan_asal, b.terminal_tujuan as terminal_asal, c.kd_tujuan as kd_tujuan, c.terminal_tujuan as terminal_tujuan
											FROM tbl_jadwal as a 
											LEFT JOIN tbl_bus on a.kd_bus = tbl_bus.kd_bus 
											LEFT JOIN tbl_tujuan as b on a.kd_asal = b.kd_tujuan 
											LEFT JOIN tbl_tujuan as c on a.kd_tujuan = c.kd_tujuan 
											ORDER BY c.kd_tujuan DESC, a.kd_jadwal DESC
											")->result_array();
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan ORDER BY kota_tujuan asc")->result_array();
		$this->load->view('backend/jadwal', $data);
	}
	public function viewtambahjadwal($value=''){
		$data['title'] = "Tambah Jadwal";
		$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan ORDER BY kota_tujuan asc")->result_array();
		$this->load->view('backend/tambahjadwal', $data);
	}
	public function tambahjadwal(){
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required|min_length[5]|max_length[12]');
		if ($this->form_validation->run() ==  FALSE) {
			$data['title'] = "Tambah Jadwal";
			$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();
			$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan ORDER BY kota_tujuan asc")->result_array();
			$this->load->view('backend/tambahjadwal', $data);
		} else {
			$asal = $this->input->post('asal');
			$tujuan = $this->db->query("SELECT * FROM tbl_tujuan
               WHERE kd_tujuan ='".$this->input->post('tujuan')."'")->row_array();
			if ($asal == $tujuan['kd_tujuan']) {
				$this->session->set_flashdata('message', 'swal("Berhasil", "Tujuan Jadwal Tidak Boleh Sama", "error");');
			redirect('backend/jadwal');
			}else{
			$kode = $this->getkod_model->get_kodjad();
			$simpan = array(
					'kd_jadwal' => $kode,
					'kd_asal' => $asal,
					'kd_tujuan' => $tujuan['kd_tujuan'],
					'kd_bus' => $this->input->post('bus'),
					'wilayah_jadwal' => $tujuan['kota_tujuan'],
					'jam_berangkat_jadwal' => $this->input->post('berangkat'),
					'jam_tiba_jadwal' => $this->input->post('tiba'),
					'harga_jadwal' =>  $this->input->post('harga'),
					 );
			// die(print_r($simpan));
			$this->db->insert('tbl_jadwal', $simpan);
			$this->session->set_flashdata('message', 'swal("Berhasil", "Data Jadwal Di Simpan", "success");');
			redirect('backend/jadwal');
			}
			
		}
		
	}
	
	public function edit(){
		$tujuan = $this->db->query("SELECT * FROM tbl_tujuan
               WHERE kd_tujuan ='".$this->input->post('tujuan')."'")->row_array();
		$simpan = array(
					'kd_asal' => $this->input->post('asal'),
					'kd_tujuan' => $tujuan['kd_tujuan'],
					'wilayah_jadwal' => $tujuan['kota_tujuan'],
					'jam_berangkat_jadwal' => $this->input->post('berangkat'),
					'jam_tiba_jadwal' => $this->input->post('tiba'),
					'harga_jadwal' =>  $this->input->post('harga'),
					 );
		$where = array('kd_jadwal' => $this->input->post('kd_jadwal'));
		$this->db->update('tbl_jadwal', $simpan,$where);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Edit", "success");');
		redirect('backend/jadwal/');
	}

	public function hapus($id){
		$this->db->where('kd_jadwal', $id);
		$this->db->delete('tbl_jadwal');
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Hapus", "success");');
		redirect('backend/jadwal/');
	}
}