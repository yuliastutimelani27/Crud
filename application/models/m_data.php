<?php
class M_data extends CI_Model{
	
	function input_data($data,$table) {
		$this->db->insert($table,$data);
		
	}
	
	function tampil_data(){
		return $this->db->get('mahasiswa');
	}
}

?>