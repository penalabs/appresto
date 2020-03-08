<?php
class M_bendahara extends CI_Model{

	function data_pengeluaran_invest_cabang($id_bendahara){
		$query = $this->db->query("select resto.id as id_resto,resto.nama_resto,investasi_cabang.id,investasi_cabang.nama_investasi
		,investasi_cabang.tanggal_mulai,investasi_cabang.tanggal_selesai
		,investasi_cabang.jumlah_pengeluaran,investasi_cabang.persen_penyusutan from investasi_cabang join resto on resto.id=investasi_cabang.id_resto where id_user_bendahara='$id_bendahara'");
		return $query;
	}

	function data_pengeluaran_invest_cabang_edit($where){
		$query = $this->db->query("select resto.id as id_resto,resto.nama_resto,investasi_cabang.id,investasi_cabang.nama_investasi
		,investasi_cabang.tanggal_mulai,investasi_cabang.tanggal_selesai
		,investasi_cabang.jumlah_pengeluaran,investasi_cabang.persen_penyusutan from investasi_cabang
		join resto on resto.id=investasi_cabang.id_resto
		WHERE investasi_cabang.id = '$where'");
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

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	// function data_storan(){
	// 	$query = $this->db->query("
	// 	SELECT pendapatan_kas_masuk.*,user_kanwil.*,user_resto.*, user_kanwil.nama AS nama_user_kanwil
	// 	FROM pendapatan_kas_masuk
	// 	JOIN user_kanwil ON user_kanwil.id = pendapatan_kas_masuk.id_user_bendahara
	// 	JOIN user_resto ON user_resto.id = pendapatan_kas_masuk.id_user_kasir");
	// 	return $query;
	// }

	/*function data_laporan_investasi_cabang($where){
		$query = $this->db->query("
		SELECT pengeluaran_cabang_alat.*,resto.*,investasi_cabang.*
		FROM pengeluaran_cabang_alat
		JOIN resto ON resto.id = pengeluaran_cabang_alat.id_resto
		JOIN investasi_cabang ON investasi_cabang.id_resto = pengeluaran_cabang_alat.id_resto
		WHERE pengeluaran_cabang_alat.id_resto = '$where'");
		return $query;
	}*/

	function data_laporan_investasi_cabang($where){
		$query = $this->db->query("SELECT * FROM investasi_cabang join resto on resto.id=investasi_cabang.id_resto
		WHERE investasi_cabang.id_resto = '$where'");
		return $query;
	}
	function data_laporan_pengeluran_alat($where){
			$query = $this->db->query("
			SELECT pengeluaran_cabang_alat.*,resto.*
			FROM pengeluaran_cabang_alat
			JOIN resto ON resto.id = pengeluaran_cabang_alat.id_resto
			WHERE pengeluaran_cabang_alat.id_resto = '$where'");
			return $query;
		}
	function data_jum_storan($where){
		$query = $this->db->query("SELECT SUM(jumlah_setoran) AS jum FROM pendapatan_kas_masuk WHERE id_user_kasir='$where'");
		return $query;
	}

	function data_lp_ic($where){
		$query = $this->db->query("
		SELECT pemberian_kaskeluar.*,resto.*
		FROM pemberian_kaskeluar
		JOIN resto ON resto.id = pemberian_kaskeluar.id_resto
		WHERE pemberian_kaskeluar.id_resto = '$where' and status='pemberian'");
		return $query;
	}
}
