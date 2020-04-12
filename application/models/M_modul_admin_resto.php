<?php

class M_modul_admin_resto extends CI_Model{

    //query dinamis
    function tampil_data($tabel){
		return $this->db->get($tabel);
    }

    function tampil_data_where($tabel,$where){
		$this->db->where($where);
		return $this->db->get($tabel);
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










    //query statik
    function tampil_data_permintaan_peralatan(){
        $query = $this->db->query("
		SELECT permintaan_alat.*,resto.*,peralatan.*,kanwil.*
		FROM permintaan_alat
		JOIN resto ON resto.id = permintaan_alat.id_resto
		JOIN peralatan ON peralatan.id = permintaan_alat.id_alat
		JOIN kanwil ON kanwil.`id_kanwil` = permintaan_alat.`id_kanwil`
		ORDER BY permintaan_alat.`id_permintaan_alat` DESC");
		return $query;
	}

	function tampil_data_permintaan_peralatan_where($where){
		$query = $this->db->query("
		SELECT permintaan_alat.*,resto.*,peralatan.*
		FROM permintaan_alat
		JOIN resto ON resto.id = permintaan_alat.id_resto
		JOIN peralatan ON peralatan.id = permintaan_alat.id_alat
		WHERE id_permintaan_alat = '$where'");
		return $query;
	}

	function tampil_data_anggaranbiayaoprasional(){
		$query = $this->db->query("
		SELECT pemberian_kaskeluar.*,resto.*,user_kanwil.*
		FROM pemberian_kaskeluar
		JOIN resto ON resto.id = pemberian_kaskeluar.id_resto
		JOIN user_kanwil ON user_kanwil.id = pemberian_kaskeluar.`id_bendahara`
		WHERE pemberian_kaskeluar.`status` = 'pemberian'
		ORDER BY pemberian_kaskeluar.`id_pengeluaran` DESC");
		return $query;
	}

	function tampil_anggaran_biaya_oprasional_where($where){
		$query = $this->db->query("
		SELECT pemberian_kaskeluar.*,resto.*,user_kanwil.*,resto.`id` AS id_restojoin
		FROM pemberian_kaskeluar
		JOIN resto ON resto.id = pemberian_kaskeluar.id_resto
		JOIN user_kanwil ON user_kanwil.id = pemberian_kaskeluar.`id_bendahara`
		WHERE pemberian_kaskeluar.`id_pengeluaran` = '$where'");
		return $query;
	}

	function tampil_penerimaan_biaya_oprasional_where(){
		$query = $this->db->query("
		SELECT pemberian_kaskeluar.*,resto.*,user_kanwil.*
		FROM pemberian_kaskeluar
		JOIN resto ON resto.id = pemberian_kaskeluar.id_resto
		JOIN user_kanwil ON user_kanwil.id = pemberian_kaskeluar.`id_bendahara`
		ORDER BY pemberian_kaskeluar.`id_pengeluaran` DESC");
		return $query;
	}

	function tampil_laporan_biaya_oprasional_where_hari($where){
		$query = $this->db->query("
		SELECT pengeluaran_cabang_operasional.*,kanwil.*,resto.*,operasional.*
		FROM pengeluaran_cabang_operasional
		JOIN kanwil ON kanwil.id_kanwil = pengeluaran_cabang_operasional.`id_kanwil`
		JOIN resto ON resto.id = pengeluaran_cabang_operasional.`id_resto`
		JOIN operasional ON operasional.id = pengeluaran_cabang_operasional.`id_operasional`
		WHERE pengeluaran_cabang_operasional.`tanggal` = '$where'
		ORDER BY pengeluaran_cabang_operasional.`id` DESC");
		return $query;
	}

	function tampil_laporan_biaya_oprasional_where_bulan($where){
		$query = $this->db->query("
		SELECT pengeluaran_cabang_operasional.*,kanwil.*,resto.*,operasional.*
		FROM pengeluaran_cabang_operasional
		JOIN kanwil ON kanwil.id_kanwil = pengeluaran_cabang_operasional.`id_kanwil`
		JOIN resto ON resto.id = pengeluaran_cabang_operasional.`id_resto`
		JOIN operasional ON operasional.id = pengeluaran_cabang_operasional.`id_operasional`
		WHERE SUBSTR(tanggal,6,2) = '$where'
		ORDER BY pengeluaran_cabang_operasional.`id` DESC");
		return $query;
	}

	function tampil_laporan_penjualanmenu($where){
		$query = $this->db->query("SELECT pemesanan_menu.* ,pemesanan.* ,menu.*
		FROM pemesanan_menu
		JOIN pemesanan ON pemesanan.`id` = pemesanan_menu.`id_pemesanan`
		JOIN menu ON menu.`id` = pemesanan_menu.`id_menu`
		WHERE id_menu = '$where'");
		return $query;
	}

	function tampil_laporan_penjualanpaket($where){
		$query = $this->db->query("SELECT pemesanan_paket.* ,pemesanan.* ,paket.*
		FROM pemesanan_paket
		JOIN pemesanan ON pemesanan.`id` = pemesanan_paket.`id_pemesanan`
		JOIN paket ON paket.`id` = pemesanan_paket.`id_paket`
		WHERE id_paket = '$where'");
		return $query;
	}

	function tampil_laporan_penjualanmenutotal($where){
		$query = $this->db->query("SELECT pemesanan_menu.* ,pemesanan.* ,menu.* ,SUM(jumlah_pesan) AS payu
		FROM pemesanan_menu
		JOIN pemesanan ON pemesanan.`id` = pemesanan_menu.`id_pemesanan`
		JOIN menu ON menu.`id` = pemesanan_menu.`id_menu`
		WHERE id_menu = '$where'");
		return $query;
	}

	function tampil_laporan_penjualanpakettotal($where){
		$query = $this->db->query("SELECT pemesanan_paket.* ,pemesanan.* ,paket.* ,SUM(jumlah_pesan) AS payu
		FROM pemesanan_paket
		JOIN pemesanan ON pemesanan.`id` = pemesanan_paket.`id_pemesanan`
		JOIN paket ON paket.`id` = pemesanan_paket.`id_paket`
		WHERE id_paket = '$where'");
		return $query;
	}

	function data_storan($tanggal){
		$query = $this->db->query("
		SELECT pendapatan_kas_masuk_dari_kasir.*, user_resto.*
		FROM pendapatan_kas_masuk_dari_kasir
		JOIN user_resto ON user_resto.id = pendapatan_kas_masuk_dari_kasir.id_user_kasir
		WHERE SUBSTRING(tanggal, 1, 10) = '$tanggal'");
		return $query;
	}

	public function tampildatastor($idresto,$tglawal,$tglakhir)
	{
		$query = $this->db->query("
		SELECT pendapatan_kas_masuk_dari_kasir.* FROM pendapatan_kas_masuk_dari_kasir
		WHERE id_resto = '$idresto' AND tanggal BETWEEN '$tglawal' AND '$tglakhir'");
		return $query;
	}

	public function tampildatasum($idresto,$tglawal,$tglakhir)
	{
		$query = $this->db->query("SELECT pendapatan_kas_masuk_dari_kasir.*, SUM(jumlah_setoran) AS jmlstor FROM pendapatan_kas_masuk_dari_kasir
		WHERE id_resto = '$idresto' AND tanggal BETWEEN '$tglawal' AND '$tglakhir'");
		return $query;
	}
}
