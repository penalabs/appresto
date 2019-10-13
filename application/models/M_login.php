<?php 
 
class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	function tampil_user_where($tabel,$where){
		$this->db->where($where);
		return $this->db->get($tabel);
	}
}