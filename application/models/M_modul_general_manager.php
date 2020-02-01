<?php

class M_modul_general_manager extends CI_Model{
	function tampil_data($tabel){
		return $this->db->get($tabel);
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function update_data($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
}

function data_pengeluaran_invest_cabang($id_bendahara){
	$query = $this->db->query("select resto.id as id_resto,resto.nama_resto,investasi_cabang.id,investasi_cabang.nama_investasi
	,investasi_cabang.tanggal_mulai,investasi_cabang.tanggal_selesai
	,investasi_cabang.jumlah_pengeluaran,investasi_cabang.persen_penyusutan,investasi_cabang.status from investasi_cabang join resto on resto.id=investasi_cabang.id_resto where status='permintaan' or status='disetujui'");
	return $query;
}

function data_pengeluaran_invest_cabang_edit($where){
	$query = $this->db->query("select resto.id as id_resto,resto.nama_resto,investasi_cabang.id,investasi_cabang.nama_investasi
	,investasi_cabang.tanggal_mulai,investasi_cabang.tanggal_selesai
	,investasi_cabang.jumlah_pengeluaran,investasi_cabang.persen_penyusutan,investasi_cabang.status from investasi_cabang
	join resto on resto.id=investasi_cabang.id_resto where status='permintaan' or status='disetujui'
	");
	return $query;
	}

	function data_cabang_resto(){
		$query = $this->db->query("SELECT * FROM resto");
		return $query;
	}

	function data_investasi_cabang(){
		$query = $this->db->query("SELECT * FROM investasi_cabang");
		return $query;
	}

	function data_peralatan(){
		$query = $this->db->query("SELECT * FROM peralatan");
		return $query;
	}
	
	function get_tabel($resto_id){
		$this->db->select('gaji.id_resto, gaji.id AS id_gaji,nama, nama_resto, jenis AS jabatan, SUM(jumlah_bonus)AS intensif, nominal_gaji ',);
		$this->db->join('resto', 'gaji.id_resto = resto.id');
		$this->db->join('user_resto', 'gaji.id_user_resto = user_resto.id');
		$this->db->join('intensif_waiters', 'intensif_waiters.id_user_resto = gaji.id_user_resto','Left');
		$this->db->where('gaji.id_resto', $resto_id);
		$this->db->from('gaji');
		$this->db->group_by("gaji.id_user_resto");
		$query=$this->db->get();
		//$query = $this->db->get_where('gaji', array('id_resto' => $resto_id));
		return $query;
	}
	function get_karyawan($id_resto){
		$id_user_kanwil=$this->session->userdata('id_kanwil');
		$this->db->select('*');
		$this->db->where('id_resto', $id_resto);
		$this->db->where('id_kanwil', $id_user_kanwil);
		$this->db->from('user_resto');
		$query=$this->db->get();
		//$query = $this->db->get_where('gaji', array('id_resto' => $resto_id));
		return $query;
	}

	function updateEmpGaji($id,$nominal_gaji){
		$hasil=$this->db->query("UPDATE gaji SET nominal_gaji='$nominal_gaji' WHERE id='$id'");
		return $hasil;	
	}
	
	function deleteEmp(){
		$id=$this->input->post('id');
		$this->db->where('id', $id);
		$result=$this->db->delete('gaji');
		return $result;
	}

}
