<?php 
 
class M_modul_resto extends CI_Model{
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
	function get_last_id_menu($where){
		$this->db->select_max('id');
		$this->db->where($where);
		$this->db->from('menu');
		$query = $this->db->get();
		return $query;
	}
	function tampil_data_daftar_menu_masakan($where){
		$this->db->where($where);
		$this->db->select('daftar_masakan.id, bahan_jadi.nama_masakan,daftar_masakan.jenis,daftar_masakan.jumlah,daftar_masakan.harga,daftar_masakan.id_bahan_jadi');
		$this->db->from('daftar_masakan');
		$this->db->join('bahan_jadi', 'daftar_masakan.id_bahan_jadi = bahan_jadi.id');
		$result = $this->db->get();
		return $result;
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function get_last_id_paket($where){
		$this->db->select_max('id');
		$this->db->where($where);
		$this->db->from('paket');
		$query = $this->db->get();
		return $query;
	}
	function tampil_data_daftar_menu_paket($where){
		$this->db->where($where);
		$this->db->select('detail_paket.id,detail_paket.id_paket,detail_paket.id_menu,menu.menu,detail_paket.jumlah,detail_paket.total_harga');
		$this->db->from('detail_paket');
		$this->db->join('menu', 'menu.id = detail_paket.id_menu');
		$result = $this->db->get();
		return $result;
	}
	function tampil_data_group($tabel,$group){
		$this->db->select('*');
		$this->db->from($tabel);
		$this->db->group_by($group);
		$query = $this->db->get(); 
		return $query;
	}

}