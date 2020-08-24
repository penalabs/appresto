<?php

class M_modul_logistik extends CI_Model
{

	//---- menu Pengadaan bahan mentah
	function tampil_data_permintaan_bahan()
	{
		$hasil = $this->db->query("SELECT permintaan_bahan.*
		FROM permintaan_bahan
		WHERE permintaan_bahan.`status` = 'proses pengiriman'
		OR permintaan_bahan.`status` = 'proses permintaan'
		OR permintaan_bahan.`status` = 'diterima' ");

		return $hasil;
	}
	function tambah_data_permintaan_bahan($nama_permintaan)
	{
		$hasil = $this->db->query("INSERT INTO permintaan_bahan (nama_permintaan,status)
      VALUES ('$nama_permintaan','draft')");

		return $hasil;
	}
	function update_proses_pengiriman($id_permintaan)
	{
		$hasil = $this->db->query("UPDATE permintaan_bahan
			SET permintaan_bahan.`status`  = 'proses pengiriman',
			permintaan_bahan.`tanggal_pengiriman`  = NOW()
			where permintaan_bahan.`id_permintaan`  = '$id_permintaan' ");

		return $hasil;
	}




	function tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi($id_permintaan)
	{
		$hasil = $this->db->query("SELECT permintaan_bahan_detail.*, permintaan_bahan.*, bahan_mentah.*
			FROM permintaan_bahan_detail
			JOIN permintaan_bahan ON permintaan_bahan.id_permintaan = permintaan_bahan_detail.id_permintaan
			JOIN `bahan_mentah` ON `bahan_mentah`.`id` = permintaan_bahan_detail.id_bahan_mentah
			WHERE permintaan_bahan_detail.id_permintaan = '$id_permintaan'
			AND (permintaan_bahan_detail.status_penerimaan = 'sesuai' OR permintaan_bahan_detail.status_penerimaan = 'menunggu konfirmasi') ");

		return $hasil;
	}
	function tampil_data_permintaan_bahan_detail_tidak_sesuai($id_permintaan)
	{
		$hasil = $this->db->query("SELECT permintaan_bahan_detail.*, permintaan_bahan.*, bahan_mentah.*, permintaan_bahan_tidak_sesuai.*
			FROM permintaan_bahan_detail
			JOIN permintaan_bahan ON permintaan_bahan.id_permintaan = permintaan_bahan_detail.id_permintaan
			JOIN `bahan_mentah` ON `bahan_mentah`.`id` = permintaan_bahan_detail.id_bahan_mentah
			JOIN `permintaan_bahan_tidak_sesuai` ON `permintaan_bahan_tidak_sesuai`.id_detail_permintaan = permintaan_bahan_detail.`id_detail_permintaan`
			WHERE permintaan_bahan_detail.id_permintaan = '$id_permintaan'
			AND permintaan_bahan_detail.status_penerimaan = 'tidak sesuai' ");

		return $hasil;
	}
	function edit_data_permintaan_bahan_detail($id_permintaan_detail)
	{
		$hasil = $this->db->query("SELECT permintaan_bahan_detail.*, permintaan_bahan.*, bahan_mentah.*
			FROM permintaan_bahan_detail
			JOIN permintaan_bahan ON permintaan_bahan.id_permintaan = permintaan_bahan_detail.id_permintaan
			JOIN `bahan_mentah` ON `bahan_mentah`.`id` = permintaan_bahan_detail.id_bahan_mentah
			WHERE permintaan_bahan_detail.id_detail_permintaan = '$id_permintaan_detail' ");

		return $hasil;
	}
	function update_data_permintaan_bahan_detail($id_permintaan_detail_edit, $jumlah_permintaan_edit, $harga_satuan_edit)
	{
		$hasil = $this->db->query("UPDATE permintaan_bahan_detail
			SET permintaan_bahan_detail.`jumlah_permintaan`  = '$jumlah_permintaan_edit',
			permintaan_bahan_detail.`satuan_harga_per_satuan_bahan`  = '$harga_satuan_edit'
			where permintaan_bahan_detail.`id_detail_permintaan`  = '$id_permintaan_detail_edit' ");

		return $hasil;
	}
	function tambah_data_permintaan_bahan_detail($id_permintaan, $bahan_mentah, $jumlah_permintaan, $satuan_besar)
	{
		$hasil = $this->db->query("INSERT INTO permintaan_bahan_detail (id_permintaan,id_bahan_mentah,jumlah_permintaan,satuan_besar)
      VALUES ('$id_permintaan','$bahan_mentah','$jumlah_permintaan','$satuan_besar')");

		return $hasil;
	}

	function tampil_data_bahan_mentah()
	{
		$hasil = $this->db->query("SELECT bahan_mentah.*
			FROM bahan_mentah");
		return $hasil;
	}
	//---------------------


	//query dinamis
	function tampil_data($tabel)
	{
		return $this->db->get($tabel);
	}

	function tampil_data_where($tabel, $where)
	{
		$this->db->where($where);
		return $this->db->get($tabel);
	}

	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	//query statik
	function tampil_data_permintaan_peralatan()
	{
		$query = $this->db->query("
	SELECT permintaan_alat.*,resto.*,peralatan.*,kanwil.*
	FROM permintaan_alat
	JOIN resto ON resto.id = permintaan_alat.id_resto
	JOIN peralatan ON peralatan.id = permintaan_alat.id_alat
	JOIN kanwil ON kanwil.`id_kanwil` = permintaan_alat.`id_kanwil`
	ORDER BY permintaan_alat.`id_permintaan_alat` DESC");
		return $query;
	}

	function tampil_data_permintaan_peralatan_where($where)
	{
		$query = $this->db->query("
	SELECT permintaan_alat.*,resto.*,peralatan.*
	FROM permintaan_alat
	JOIN resto ON resto.id = permintaan_alat.id_resto
	JOIN peralatan ON peralatan.id = permintaan_alat.id_alat
	WHERE id_permintaan_alat = '$where'");
		return $query;
	}

	function tampilDataBahan($id_logistik)
	{
		$query = $this->db->query("SELECT `id_bahan_mentah`,nama_bahan,stok,AVG(jumlah*harga_beli) as rata FROM `detail_pembelian_bahan_mentah`
	JOIN `bahan_mentah` ON bahan_mentah.id=detail_pembelian_bahan_mentah.id_bahan_mentah
	WHERE id_logistik='$id_logistik'
	GROUP BY id_bahan_mentah ORDER BY id_bahan_mentah ASC");
		return $query;
	}

	function tampilDataPeralatan($id_logistik)
	{

		$query = $this->db->query("SELECT peralatan.id,nama_peralatan,jumlah_stok,AVG(jumlah*harga_beli) AS rata FROM peralatan
	JOIN detail_pembelian_alat ON id_alat=peralatan.id
	WHERE id_logistik='$id_logistik'
	GROUP BY peralatan.id ORDER BY peralatan.id ASC");
		return $query;
	}

	function tampilDataOlahan($id_logistik)
	{
		$query = $this->db->query("SELECT * FROM bahan_olahan WHERE id_logistik='$id_logistik'");
		return $query;
	}
}
