<?php
class kampus extends CI_Controller{
	
	function __construct() {
		parent::__construct();
		$this->load->model('m_data');
		$this->load->helper('url');
	}
	
	function index(){
		$data['mahasiswa'] = $this->m_data->tampil_data()->result();
		$this->load->view('tampil_data',$data);
	}
	
	function tambah(){
		$this->load->view('input_data');
	}
	
	function tambah_aksi(){
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		
		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->m_data->input_data($data,'mahasiswa');
		redirect('kampus/index');
	}
}
?>