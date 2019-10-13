<?php

class M_modul_bendahara_wilayah extends CI_Model{

	//---- peralatan
	function tampil_data_peralatan(){
		$hasil=$this->db->query("SELECT peralatan.*, resto.*, peralatan.id AS id_peralatan
			FROM peralatan
			JOIN resto ON resto.id = peralatan.id_resto");

		return $hasil;
	}
	function tambah_data_peralatan($resto,$peralatan,$stok,$harga,$tipe_satuan){
		$hasil=$this->db->query("INSERT INTO peralatan (id_resto,nama_peralatan,jumlah_stok,harga_satuan,tipe_satuan)
      VALUES ('$resto','$peralatan','$stok','$harga','$tipe_satuan')");

		return $hasil;
	}
	function edit_data_peralatan($id_peralatan){
		$hasil=$this->db->query("SELECT peralatan.*, resto.*, peralatan.id AS id_peralatan
			FROM peralatan
			JOIN resto ON resto.id = peralatan.id_resto
			WHERE peralatan.id = '$id_peralatan' ");

		return $hasil;
	}
	function update_data_peralatan($id_peralatanedit,$restoedit,$stokedit,$hargaedit,$peralatan,$tipe_satuanedit){
		$hasil=$this->db->query("UPDATE peralatan
			SET peralatan.`id_resto`  = '$restoedit',
			`peralatan`.`nama_peralatan` = '$peralatan',
			`peralatan`.`jumlah_stok` = '$stokedit',
			`peralatan`.`harga_satuan` = '$hargaedit',
			`peralatan`.`tipe_satuan` = '$tipe_satuanedit'
			WHERE `peralatan`.`id` = '$id_peralatanedit' ");

		return $hasil;
	}
	function delete_data_peralatan($id_data_peralatan){
		$hasil=$this->db->query("DELETE FROM peralatan WHERE id = '$id_data_peralatan'");

		return $hasil;
	}
	function tampil_data_resto(){
		$hasil=$this->db->query("SELECT * FROM resto");
		return $hasil;
	}
	//-----------------------











	//---- pengeluaran kanwil
	function tampil_data_pengeluaran_kanwil(){
		$hasil=$this->db->query("SELECT `pengeluaran_kanwil_operasional`.`id` AS id_pengeluaran_kanwil, `pengeluaran_kanwil_operasional`.*, `kanwil`.*, `operasional`.*
			FROM `pengeluaran_kanwil_operasional`
			JOIN kanwil ON kanwil.`id_kanwil` = `pengeluaran_kanwil_operasional`.`id_kanwil`
			JOIN `operasional` ON `operasional`.`id` = `pengeluaran_kanwil_operasional`.`id_operasional`");
		return $hasil;
	}
	function tambah_data_pengeluaran_kanwil($kanwil,$operasional,$nominal){
		$hasil=$this->db->query("INSERT INTO pengeluaran_kanwil_operasional (id_kanwil,id_operasional,nominal)
      VALUES ('$kanwil','$operasional','$nominal')");

		return $hasil;
	}
	function edit_data_pengeluaran_kanwil($id_pengeluaran_kanwil){
		$hasil=$this->db->query("SELECT `pengeluaran_kanwil_operasional`.*, `kanwil`.*, `operasional`.*
			FROM `pengeluaran_kanwil_operasional`
			JOIN kanwil ON kanwil.`id_kanwil` = `pengeluaran_kanwil_operasional`.`id_kanwil`
			JOIN `operasional` ON `operasional`.`id` = `pengeluaran_kanwil_operasional`.`id_operasional`
			WHERE `pengeluaran_kanwil_operasional`.`id` = '$id_pengeluaran_kanwil'");

		return $hasil;
	}
	function update_data_pengeluaran_kanwil($id_pengeluaran_kanwiledit,$kanwiledit,$operasionaledit,$nominaledit){
		$hasil=$this->db->query("UPDATE pengeluaran_kanwil_operasional
			SET pengeluaran_kanwil_operasional.`id_kanwil`  = '$kanwiledit',  `pengeluaran_kanwil_operasional`.`id_operasional` = '$operasionaledit', `pengeluaran_kanwil_operasional`.`nominal` = '$nominaledit'
			WHERE `pengeluaran_kanwil_operasional`.`id` = '$id_pengeluaran_kanwiledit' ");

		return $hasil;
	}
	function delete_data_pengeluaran_kanwil($id_pengeluaran_kanwil){
		$hasil=$this->db->query("DELETE FROM pengeluaran_kanwil_operasional WHERE id = '$id_pengeluaran_kanwil'");

		return $hasil;
	}
	function tampil_data_kanwil(){
		$hasil=$this->db->query("SELECT * FROM kanwil");
		return $hasil;
	}
	//-----------------------











	//---- biaya operasional cabang
	function tampil_data_biaya_operasional_cabang(){
		$hasil=$this->db->query("SELECT * FROM operasional");
		return $hasil;
	}
	function tambah_data_biaya_operasional_cabang($pengeluaran,$lama_sewa,$harga_sewa){
		$hasil=$this->db->query("INSERT INTO operasional (nama_pengeluaran,lama_sewa,harga_sewa)
      VALUES ('$pengeluaran','$lama_sewa','$harga_sewa')");

		return $hasil;
	}
	function edit_data_biaya_operasional_cabang($id_biaya_operasional_cabang){
		$hasil=$this->db->query("SELECT * FROM operasional
			WHERE `operasional`.`id` = '$id_biaya_operasional_cabang'");

		return $hasil;
	}
	function update_data_biaya_operasional_cabang($id_operasionaledit,$pengeluaranedit,$lama_sewaedit,$harga_sewaedit){
		$hasil=$this->db->query("UPDATE operasional
			SET operasional.`nama_pengeluaran`  = '$pengeluaranedit',  `operasional`.`lama_sewa` = '$lama_sewaedit', `operasional`.`harga_sewa` = '$harga_sewaedit'
			WHERE `operasional`.`id` = '$id_operasionaledit' ");

		return $hasil;
	}
	function delete_data_biaya_operasional_cabang($id_biaya_operasional_cabang){
		$hasil=$this->db->query("DELETE FROM operasional WHERE id = '$id_biaya_operasional_cabang'");

		return $hasil;
	}
	//-----------------------











	//---- kas masuk cabang
	function tampil_data_kas_masuk_cabang(){
		$hasil=$this->db->query("SELECT * FROM pendapatan_kas_masuk");
		return $hasil;
	}
	function tambah_data_kas_masuk_cabang($setoran){
		$hasil=$this->db->query("INSERT INTO pendapatan_kas_masuk (id_user_bendahara,id_user_kasir,jumlah_setoran,tanggal)
      VALUES ('2','1','$setoran',NOW())");

		return $hasil;
	}
	function edit_data_kas_masuk_cabang($id_kas_masuk_cabang){
		$hasil=$this->db->query("SELECT * FROM pendapatan_kas_masuk
		WHERE pendapatan_kas_masuk.id = $id_kas_masuk_cabang");

		return $hasil;
	}
	function delete_data_kas_masuk_cabang($id_kas_masuk_cabang){
		$hasil=$this->db->query("DELETE FROM pendapatan_kas_masuk WHERE id = '$id_kas_masuk_cabang'");

		return $hasil;
	}
	//-----------------------











	//---- kas keluar cabang
	function tampil_data_kas_keluar_cabang(){
		$hasil=$this->db->query("SELECT * FROM pemberian_kaskeluar
			JOIN resto ON resto.`id` = `pemberian_kaskeluar`.`id_resto`");
		return $hasil;
	}
	function tambah_data_kas_keluar_cabang($resto,$tanggal,$nominal){
		$hasil=$this->db->query("INSERT INTO pemberian_kaskeluar
			(id_bendahara,id_resto,tanggal,nominal_kas_keluar)
      VALUES ('2','$resto','$tanggal','$nominal')");

		return $hasil;
	}
	function edit_data_kas_keluar_cabang($id_kas_keluar_cabang){
		$hasil=$this->db->query("SELECT * FROM pemberian_kaskeluar
		JOIN resto ON resto.`id` = `pemberian_kaskeluar`.`id_resto`
		WHERE pemberian_kaskeluar.id_pengeluaran = $id_kas_keluar_cabang");

		return $hasil;
	}
	function delete_data_kas_keluar_cabang($id_kas_keluar_cabang){
		$hasil=$this->db->query("DELETE FROM pemberian_kaskeluar WHERE id_pengeluaran = '$id_kas_keluar_cabang'");

		return $hasil;
	}
	//-----------------------










	//---- kas keluar cabang
	function tampil_data_laporan_laba_rugi(){
		$hasil=$this->db->query("SELECT * FROM pemberian_kaskeluar
			JOIN resto ON resto.`id` = `pemberian_kaskeluar`.`id_resto`");
		return $hasil;
	}
	//-----------------------



}
