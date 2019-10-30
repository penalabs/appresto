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


}
