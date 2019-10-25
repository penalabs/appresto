<?php 
 
class M_master extends CI_Model{
	function tampil_data_where($tabel,$where){
		$this->db->where($where);
		return $this->db->get($tabel);
	}
	function tampil_data($tabel){
		return $this->db->get($tabel);
	}
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}