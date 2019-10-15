<?php

class M_modul_produksi extends CI_Model{

	//---- menu permintaan_bahan
	function tampil_data_permintaan_bahan($id_user_resto_produksi_adminresto){
		$hasil=$this->db->query("SELECT permintaan_bahan.*
			FROM permintaan_bahan
			WHERE permintaan_bahan.id_user_resto_produksi_adminresto = '$id_user_resto_produksi_adminresto'");

		return $hasil;
	}
	function tambah_data_permintaan_bahan($nama_permintaan,$id_user_resto_produksi_adminresto,$id_user_kanwil_logistik){
		$hasil=$this->db->query("INSERT INTO permintaan_bahan (id_user_kanwil_logistik,id_user_resto_produksi_adminresto,nama_permintaan,status,tanggal_permintaan,tanggal_pengiriman,tanggal_penerimaan)
      VALUES ('$id_user_kanwil_logistik','$id_user_resto_produksi_adminresto','$nama_permintaan','draft','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00')");

		return $hasil;
	}
	function edit_data_permintaan_bahan($id_permintaan){
		$hasil=$this->db->query("SELECT permintaan_bahan.*
			FROM permintaan_bahan
			WHERE permintaan_bahan.id_permintaan = '$id_permintaan' ");

		return $hasil;
	}
	function update_data_permintaan_bahan($id_permintaan_edit,$nama_permintaan_edit){
		$hasil=$this->db->query("UPDATE permintaan_bahan
			SET permintaan_bahan.`nama_permintaan`  = '$nama_permintaan_edit'
			WHERE `permintaan_bahan`.`id_permintaan` = '$id_permintaan_edit' ");

		return $hasil;
	}
	function delete_data_permintaan_bahan($id_permintaan){
		$hasil=$this->db->query("DELETE FROM permintaan_bahan
			WHERE permintaan_bahan.id_permintaan = '$id_permintaan' ");

		return $hasil;
	}







	function update_proses_permintaan($id_permintaan){
		$hasil=$this->db->query("UPDATE permintaan_bahan
			SET permintaan_bahan.`status`  = 'proses permintaan',
			permintaan_bahan.`tanggal_permintaan`  = NOW()
			where permintaan_bahan.`id_permintaan`  = '$id_permintaan' ");

		return $hasil;
	}
	function update_diterima($id_permintaan){
		$hasil=$this->db->query("UPDATE permintaan_bahan
			SET permintaan_bahan.`status`  = 'diterima',
			permintaan_bahan.`tanggal_penerimaan`  = NOW()
			where permintaan_bahan.`id_permintaan`  = '$id_permintaan' ");

		return $hasil;
	}




	function tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi($id_permintaan){
		$hasil=$this->db->query("SELECT permintaan_bahan_detail.*, permintaan_bahan.*, bahan_mentah.*
			FROM permintaan_bahan_detail
			JOIN permintaan_bahan ON permintaan_bahan.id_permintaan = permintaan_bahan_detail.id_permintaan
			JOIN `bahan_mentah` ON `bahan_mentah`.`id` = permintaan_bahan_detail.id_bahan_mentah
			WHERE permintaan_bahan_detail.id_permintaan = '$id_permintaan'
			AND (permintaan_bahan_detail.status_penerimaan = 'sesuai' OR permintaan_bahan_detail.status_penerimaan = 'menunggu konfirmasi') ");

		return $hasil;
	}
	function tambah_data_permintaan_bahan_detail($id_permintaan,$bahan_mentah,$jumlah_permintaan){
		$hasil=$this->db->query("INSERT INTO permintaan_bahan_detail (id_permintaan,id_bahan_mentah,jumlah_permintaan,status_penerimaan)
      VALUES ('$id_permintaan','$bahan_mentah','$jumlah_permintaan','menunggu konfirmasi')");

		return $hasil;
	}
	function update_sesuai_data_permintaan_bahan_detail($id_detail_permintaan){
		$hasil=$this->db->query("UPDATE permintaan_bahan_detail
			SET permintaan_bahan_detail.`status_penerimaan`  = 'sesuai'
			where permintaan_bahan_detail.`id_detail_permintaan`  = '$id_detail_permintaan' ");

		return $hasil;
	}
	function update_tidak_sesuai_data_permintaan_bahan_detail($id_detail_permintaan){
		$hasil=$this->db->query("UPDATE permintaan_bahan_detail
			SET permintaan_bahan_detail.`status_penerimaan`  = 'tidak sesuai'
			where permintaan_bahan_detail.`id_detail_permintaan`  = '$id_detail_permintaan' ");

		return $hasil;
	}









	function tampil_data_permintaan_bahan_detail_tidak_sesuai($id_permintaan){
		$hasil=$this->db->query("SELECT permintaan_bahan_detail.*, permintaan_bahan.*, bahan_mentah.*, permintaan_bahan_tidak_sesuai.*
			FROM permintaan_bahan_detail
			JOIN permintaan_bahan ON permintaan_bahan.id_permintaan = permintaan_bahan_detail.id_permintaan
			JOIN `bahan_mentah` ON `bahan_mentah`.`id` = permintaan_bahan_detail.id_bahan_mentah
			JOIN `permintaan_bahan_tidak_sesuai` ON `permintaan_bahan_tidak_sesuai`.id_detail_permintaan = permintaan_bahan_detail.`id_detail_permintaan`
			WHERE permintaan_bahan_detail.id_permintaan = '$id_permintaan'
			AND permintaan_bahan_detail.status_penerimaan = 'tidak sesuai' ");

		return $hasil;
	}
	function data_permintaan_bahan_tidak_sesuai($id_permintaan){
		$hasil=$this->db->query("SELECT permintaan_bahan_tidak_sesuai.*
			FROM permintaan_bahan_tidak_sesuai
			WHERE permintaan_bahan_tidak_sesuai.id_permintaan = '$id_permintaan' ");

		return $hasil;
	}
	function tambah_data_permintaan_bahan_tidak_sesuai($id_detail_permintaan,$jumlah_bahan_terkirim,$selisih_bahan){
		$hasil=$this->db->query("INSERT INTO permintaan_bahan_tidak_sesuai (id_detail_permintaan,jumlah_bahan_terkirim,selisih_bahan)
      VALUES ('$id_detail_permintaan','$jumlah_bahan_terkirim','$selisih_bahan')");
		return $hasil;
	}









	function tampil_data_bahan_mentah($id_permintaan,$id_resto){
		$hasil=$this->db->query("SELECT bahan_mentah.*
			FROM bahan_mentah
			WHERE id NOT IN
			(
				SELECT DISTINCT `permintaan_bahan_detail`.`id_bahan_mentah`
				FROM permintaan_bahan_detail
				WHERE permintaan_bahan_detail.id_permintaan = '$id_permintaan'
			)
			AND `bahan_mentah`.`id_resto` = '$id_resto' ");

		return $hasil;
	}

	//---------------------


	//---- menu permintaan_bahan

	function tampil_data_pemesanan_menu($id_pemesan){

		$hasil=$this->db->query("SELECT data1.* FROM(SELECT pemesanan_menu.`id` , pemesanan_menu.`id_menu` , menu.`menu` , SUM(`pemesanan_menu`.`jumlah_pesan`) AS jumlahPesan, pemesanan_menu.`status`
		FROM `pemesanan_menu`
		JOIN menu ON `menu`.`id` = `pemesanan_menu`.`id_menu`
		WHERE pemesanan_menu.status = ''
		GROUP BY `pemesanan_menu`.`id_menu`
		HAVING SUM(`pemesanan_menu`.`jumlah_pesan`) > 1
		ORDER BY jumlahPesan DESC) AS data1
		UNION
		SELECT data2.* FROM(SELECT pemesanan_menu.`id` , pemesanan_menu.`id_menu` , menu.`menu` , SUM(`pemesanan_menu`.`jumlah_pesan`) AS jumlahPesan, pemesanan_menu.`status`
		FROM `pemesanan_menu`
		JOIN menu ON `menu`.`id` = `pemesanan_menu`.`id_menu`
		WHERE pemesanan_menu.status = ''
		GROUP BY `pemesanan_menu`.`id_menu` ASC
		HAVING SUM(`pemesanan_menu`.`jumlah_pesan`) = 1
		ORDER BY pemesanan_menu.`id` ASC) AS data2");

		return $hasil;
	}

	function tampil_data_pemesanan_paket(){

		$hasil=$this->db->query("SELECT data1.* FROM(SELECT pemesanan_paket.`id` , pemesanan_paket.`id_paket` , paket.`nama_paket` , SUM(`pemesanan_paket`.`jumlah_pesan`) AS jumlahPesanPaket
		FROM `pemesanan_paket`
		JOIN paket ON `paket`.`id` = `pemesanan_paket`.`id_paket`
		WHERE pemesanan_paket.status = ''
		GROUP BY `pemesanan_paket`.`id_paket`
		HAVING SUM(`pemesanan_paket`.`jumlah_pesan`) > 1
		ORDER BY jumlahPesanPaket DESC) AS data1
		UNION
		SELECT data2.* FROM(SELECT pemesanan_paket.`id` , pemesanan_paket.`id_paket` , paket.`nama_paket` , SUM(`pemesanan_paket`.`jumlah_pesan`) AS jumlahPesanPaket
		FROM `pemesanan_paket`
		JOIN paket ON `paket`.`id` = `pemesanan_paket`.`id_paket`
		WHERE pemesanan_paket.status = ''
		GROUP BY `pemesanan_paket`.`id_paket`
		HAVING SUM(`pemesanan_paket`.`jumlah_pesan`) = 1
		ORDER BY jumlahPesanPaket ASC) AS data2");

		return $hasil;
	}

	//---------------------

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
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

}
