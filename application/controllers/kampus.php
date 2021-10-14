<?php
class Kampus extends CI_Controller{

	function __construct() {
		parent:: __construct();
		$this->load->model('m_data');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	function index() {
		$data['mahasiswa'] = $this->m_data->tampil_data()->result();
		$this->load->view('tampil_data',$data);
	}
	
	function tambah() {
		$this->load->view('input_data');
	}

	function tambah_aksi() {
		$this->form_validation->set_rules('nim','NIM','required|min_length[8] |max_length[8]');
		$this->form_validation->set_rules('nama','Nama','required|alpha|min_length[5] |max_length[15]');
		$this->form_validation->set_rules('alamat','Alamat','required|alpha');
		$this->form_validation->set_rules('pekerjaan','Pekerjaan','required|alpha');

		if ($this->form_validation->run() == TRUE)
		{
			$nim = $this->input->post('nim');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$pekerjaan = $this->input->post('pekerjaan');

			$config['max_size']=2048;
			$config['allowed_types']="png|jpg|jpeg|gif";
			$config['remove_spaces']=TRUE;
			$config['overwrite']=TRUE;
			$config['upload_path']=FCPATH.'images';

			$this->load->library('upload');
			$this->upload->initialize($config);

			$this->upload->do_upload('foto');
			$data_image=$this->upload->data('file_name');
			$location='images/gambar.jpg';
			$foto=$location.$data_image;

		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan,
			'foto' => $foto
			);
		$this->m_data->input_data($data,'mahasiswa');
		redirect('kampus/index');
		}else{
			$this->load->view('input_data');
		}
	}
	function edit ($id){
		$where = array('id' => $id);
		$data['mahasiswa'] = $this->m_data->edit_data($where,'mahasiswa')->result();
		$this ->load->view('edit_data',$data);
	}

	function update (){
		$id = $this->input->post('id');
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');

		$config['max_size']=2048;
		$config['allowed_types']="png|jpg|jpeg|gif";
		$config['remove_spaces']=TRUE;
		$config['overwrite']=TRUE;
		$config['upload_path']=FCPATH.'images';

		$this->load->library('upload');
		$this->upload->initialize($config);

		$this->upload->do_upload('foto');
		$data_image=$this->upload_data('file_name');
		$location='images/gambar.jpg';
		$foto=$location.$data_image;

		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan,
			'foto' => $foto
		);
		
		$where = array (
			'id' => $id
		);

		$this->m_data->update_data($where,$data,'mahasiswa');
		redirect('kampus/index');
	}

	function hapus ($id){
		$where = array ('id' => $id);
		$this->m_data->hapus_data($where,'mahasiswa');
		redirect('kampus/index');
	}
}