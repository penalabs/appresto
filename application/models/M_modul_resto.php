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

	//---- menu permintaan_bahan
	function tampil_data_permintaan_bahan($id_user_resto_admin_resto){
		$hasil=$this->db->query("SELECT permintaan_bahan.*
			FROM permintaan_bahan
			WHERE permintaan_bahan.id_user_resto_produksi_adminresto = '$id_user_resto_admin_resto'");

		return $hasil;
	}
	function tambah_data_permintaan_bahan($nama_permintaan,$id_user_resto_admin_resto,$id_user_kanwil_logistik){
		$hasil=$this->db->query("INSERT INTO permintaan_bahan (id_user_kanwil_logistik,id_user_resto_produksi_adminresto,nama_permintaan,status,tanggal_permintaan,tanggal_pengiriman,tanggal_penerimaan)
      VALUES ('$id_user_kanwil_logistik','$id_user_resto_admin_resto','$nama_permintaan','draft','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00')");

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

	// modul fauzin
	function get_last_id_menu($where){
		$this->db->select_max('id');
		$this->db->where($where);
		$this->db->from('menu');
		$query = $this->db->get();
		return $query;
	}
	function tampil_data_daftar_menu_masakan($where){
		$this->db->where($where);
		$this->db->select('*');
		$this->db->from('menu');
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
