<?php

class M_modul_superadmin extends CI_Model{
	function tampil_data_where_join($where){

		$this->db->select("resto.nama_resto,pemesanan.id,nama_pemesan,no_meja,pembayaran.tanggal,total_harga,pembayaran.nominal,pembayaran.status");
		$this->db->from('pemesanan');
		$this->db->join('user_resto', 'user_resto.id = pemesanan.id_user_resto');
		$this->db->join('resto', 'resto.id = user_resto.id_resto');
    	$this->db->join('pembayaran', 'pembayaran.id_pemesanan = pemesanan.id');
		$this->db->where('resto.id', $where);
		return $this->db->get();
	}
	function detail_transaksi_paket($tabel,$where){

		$this->db->select('pemesanan_paket.jumlah_pesan,paket.nama_paket,pemesanan_paket.subharga');
		$this->db->from($tabel);
		$this->db->join('paket', $tabel.'.id_paket = paket.id');
		$this->db->where('pemesanan_paket.id_pemesanan', $where);
		return $this->db->get();
	}
	function detail_transaksi_menu($tabel,$where){

		$this->db->select('pemesanan_menu.jumlah_pesan,menu.menu,pemesanan_menu.subharga');
		$this->db->from($tabel);
		$this->db->join('menu', $tabel.'.id_menu = menu.id');
		$this->db->where('pemesanan_menu.id_pemesanan', $where);
		return $this->db->get();
	}
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









	//-----------------------------irhas----------------------
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

	function data_laporan_investasi_cabang($where){
		$query = $this->db->query("SELECT * FROM investasi_cabang join resto on resto.id=investasi_cabang.id_resto
		WHERE investasi_cabang.id_resto = '$where'");
		return $query;
	}

	function data_cabang_resto(){
		$query = $this->db->query("SELECT * FROM resto");
		return $query;
	}

	function data_storan(){
		$query = $this->db->query("
		SELECT pendapatan_kas_masuk.*,user_kanwil.*,user_resto.*, user_kanwil.nama AS nama_user_kanwil
		FROM pendapatan_kas_masuk
		JOIN user_kanwil ON user_kanwil.id = pendapatan_kas_masuk.id_user_bendahara
		JOIN user_resto ON user_resto.id = pendapatan_kas_masuk.id_user_kasir");
		return $query;
	}

	//---- kas keluar cabang  // IKI LOH ZIN KUDU RUBAH TABLE SOALE AKU KUDU JUMUK ID_OPRASIONAL TAPI GK ENEK FORENKAY
	function tampil_data_kas_keluar_cabang(){
		$hasil=$this->db->query("SELECT * FROM pemberian_kaskeluar
			JOIN resto ON resto.`id` = `pemberian_kaskeluar`.`id_resto` join user_kanwil on user_kanwil.id=pemberian_kaskeluar.id_bendahara");
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

	function tampil_data_resto(){
		$hasil=$this->db->query("SELECT * FROM resto");
		return $hasil;
	}
	//-----------------------

	function tampil_data_kas_masuk_cabang(){
		$hasil = $this->db->query("SELECT pendapatan_kas_masuk.*, user_kanwil.*, user_resto.*, user_kanwil.nama AS namakanwil, user_resto.nama AS namaresto
		FROM pendapatan_kas_masuk
		JOIN user_kanwil ON user_kanwil.id = pendapatan_kas_masuk.id_user_bendahara
		JOIN user_resto ON user_resto.id = pendapatan_kas_masuk.id_user_kasir");
		return $hasil;
	}

	public function join_kanwil($where)
	{
		$hasil=$this->db->query("SELECT user_kanwil.*,kanwil.*
		FROM user_kanwil
		JOIN kanwil ON kanwil.`id_kanwil`=user_kanwil.`id_kanwil`
		WHERE user_kanwil.`id`=$where");
		return $hasil;
	}
}
