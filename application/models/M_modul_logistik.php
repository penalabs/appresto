<<<<<<< HEAD
<?php

class M_modul_logistik extends CI_Model{

	//---- menu Pengadaan bahan mentah
	function tampil_data_permintaan_bahan(){
		$hasil=$this->db->query("SELECT permintaan_bahan.*
		FROM permintaan_bahan
		WHERE permintaan_bahan.`status` = 'proses pengiriman'
		OR permintaan_bahan.`status` = 'proses permintaan'
		OR permintaan_bahan.`status` = 'diterima' ");

		return $hasil;
	}
	function tambah_data_permintaan_bahan($nama_permintaan){
		$hasil=$this->db->query("INSERT INTO permintaan_bahan (nama_permintaan,status)
      VALUES ('$nama_permintaan','draft')");

		return $hasil;
	}
	function update_proses_pengiriman($id_permintaan){
		$hasil=$this->db->query("UPDATE permintaan_bahan
			SET permintaan_bahan.`status`  = 'proses pengiriman',
			permintaan_bahan.`tanggal_pengiriman`  = NOW()
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
	function edit_data_permintaan_bahan_detail($id_permintaan_detail){
		$hasil=$this->db->query("SELECT permintaan_bahan_detail.*, permintaan_bahan.*, bahan_mentah.*
			FROM permintaan_bahan_detail
			JOIN permintaan_bahan ON permintaan_bahan.id_permintaan = permintaan_bahan_detail.id_permintaan
			JOIN `bahan_mentah` ON `bahan_mentah`.`id` = permintaan_bahan_detail.id_bahan_mentah
			WHERE permintaan_bahan_detail.id_detail_permintaan = '$id_permintaan_detail' ");

		return $hasil;
	}
	function update_data_permintaan_bahan_detail($id_permintaan_detail_edit,$jumlah_permintaan_edit,$harga_satuan_edit){
		$hasil=$this->db->query("UPDATE permintaan_bahan_detail
			SET permintaan_bahan_detail.`jumlah_permintaan`  = '$jumlah_permintaan_edit',
			permintaan_bahan_detail.`satuan_harga_per_satuan_bahan`  = '$harga_satuan_edit'
			where permintaan_bahan_detail.`id_detail_permintaan`  = '$id_permintaan_detail_edit' ");

		return $hasil;
	}
	function tambah_data_permintaan_bahan_detail($id_permintaan,$bahan_mentah,$jumlah_permintaan,$satuan_besar){
		$hasil=$this->db->query("INSERT INTO permintaan_bahan_detail (id_permintaan,id_bahan_mentah,jumlah_permintaan,satuan_besar)
      VALUES ('$id_permintaan','$bahan_mentah','$jumlah_permintaan','$satuan_besar')");

		return $hasil;
	}

	function tampil_data_bahan_mentah(){
		$hasil=$this->db->query("SELECT bahan_mentah.*
			FROM bahan_mentah");
		return $hasil;
	}
	//---------------------
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

}
=======
<?php

class M_modul_logistik extends CI_Model{

	//---- menu Pengadaan bahan mentah
	function tampil_data_permintaan_bahan(){
		$hasil=$this->db->query("SELECT permintaan_bahan.*
		FROM permintaan_bahan
		WHERE permintaan_bahan.`status` = 'proses pengiriman'
		OR permintaan_bahan.`status` = 'proses permintaan'
		OR permintaan_bahan.`status` = 'diterima' ");

		return $hasil;
	}
	function tambah_data_permintaan_bahan($nama_permintaan){
		$hasil=$this->db->query("INSERT INTO permintaan_bahan (nama_permintaan,status)
      VALUES ('$nama_permintaan','draft')");

		return $hasil;
	}
	function update_proses_pengiriman($id_permintaan){
		$hasil=$this->db->query("UPDATE permintaan_bahan
			SET permintaan_bahan.`status`  = 'proses pengiriman',
			permintaan_bahan.`tanggal_pengiriman`  = NOW()
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
	function edit_data_permintaan_bahan_detail($id_permintaan_detail){
		$hasil=$this->db->query("SELECT permintaan_bahan_detail.*, permintaan_bahan.*, bahan_mentah.*
			FROM permintaan_bahan_detail
			JOIN permintaan_bahan ON permintaan_bahan.id_permintaan = permintaan_bahan_detail.id_permintaan
			JOIN `bahan_mentah` ON `bahan_mentah`.`id` = permintaan_bahan_detail.id_bahan_mentah
			WHERE permintaan_bahan_detail.id_detail_permintaan = '$id_permintaan_detail' ");

		return $hasil;
	}
	function update_data_permintaan_bahan_detail($id_permintaan_detail_edit,$jumlah_permintaan_edit,$harga_satuan_edit){
		$hasil=$this->db->query("UPDATE permintaan_bahan_detail
			SET permintaan_bahan_detail.`jumlah_permintaan`  = '$jumlah_permintaan_edit',
			permintaan_bahan_detail.`satuan_harga_per_satuan_bahan`  = '$harga_satuan_edit'
			where permintaan_bahan_detail.`id_detail_permintaan`  = '$id_permintaan_detail_edit' ");

		return $hasil;
	}
	function tambah_data_permintaan_bahan_detail($id_permintaan,$bahan_mentah,$jumlah_permintaan,$satuan_besar){
		$hasil=$this->db->query("INSERT INTO permintaan_bahan_detail (id_permintaan,id_bahan_mentah,jumlah_permintaan,satuan_besar)
      VALUES ('$id_permintaan','$bahan_mentah','$jumlah_permintaan','$satuan_besar')");

		return $hasil;
	}

	function tampil_data_bahan_mentah(){
		$hasil=$this->db->query("SELECT bahan_mentah.*
			FROM bahan_mentah");
		return $hasil;
	}
	//---------------------
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

}
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
