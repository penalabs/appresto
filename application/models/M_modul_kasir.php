<?php

class M_modul_kasir extends CI_Model{
	function tampil_data_where($tabel,$where){
		$this->db->where($where);
		return $this->db->get($tabel);
	}
	function tampil_data_where_join($where){

		$this->db->select("pemesanan.id,nama_pemesan,no_meja,pembayaran.tanggal,total_harga,pembayaran.nominal,pembayaran.status");
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
	function tampil_data($tabel){
		return $this->db->get($tabel);
	}
	function sum_pembayaran($id_user_kasir,$tgl1,$tgl2){
		return $this->db->query("SELECT sum(nominal) as cek_jumlah_setor FROM pembayaran WHERE id_user_kasir='$id_user_kasir' AND tanggal >= '$tgl1' AND tanggal <= '$tgl2'");
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
	function tampil_pesan_menu_where($tabel,$where){
		$this->db->where($where);
		$this->db->select('menu.id as id2,menu.harga,menu.menu,pemesanan_menu.id,pemesanan_menu.id_pemesanan,pemesanan_menu.id_menu,pemesanan_menu.id_menu,pemesanan_menu.jumlah_pesan,pemesanan_menu.subharga');
		$this->db->from($tabel);
		$this->db->join('menu', 'menu.id = '.$tabel.'.id_menu');
		$result = $this->db->get();
		return $result;
	}
	function tampil_pesan_paket_where($tabel,$where){
		$this->db->where($where);
		$this->db->select('paket.id as id2,paket.harga,paket.nama_paket,pemesanan_paket.id,pemesanan_paket.id_pemesanan,pemesanan_paket.id_paket,pemesanan_paket.id_paket,pemesanan_paket.jumlah_pesan,pemesanan_paket.subharga');
		$this->db->from($tabel);
		$this->db->join('paket', 'paket.id = '.$tabel.'.id_paket');
		$result = $this->db->get();
		return $result;
	}

	public function tampildatastor($idresto,$jamawal,$jamakhir,$date)
	{
		$query = $this->db->query("
			SELECT pemesanan.`id`,`nama_pemesan`,`no_meja`,`total_harga`, pembayaran.`status`,`nominal`,pembayaran.`tanggal`
			FROM pemesanan
			JOIN user_resto ON user_resto.`id` = pemesanan.`id_user_resto`
			JOIN resto ON resto.id = user_resto.id_resto
			JOIN pembayaran ON pembayaran.id_pemesanan = pemesanan.id
			WHERE resto.`id` = '$idresto' AND SUBSTRING(pembayaran.tanggal, 1, 10) = '$date' AND HOUR(pembayaran.tanggal)
			BETWEEN '$jamawal' AND '$jamakhir'");
		return $query;
	}

	public function tampildatasum($idresto,$jamawal,$jamakhir,$date)
	{
		$query = $this->db->query("
			SELECT SUM(pemesanan.total_harga) AS nominalsetor, pemesanan.`id`,`nama_pemesan`,`no_meja`,`total_harga`, pembayaran.`status`,`nominal`,pembayaran.`tanggal`
			FROM pemesanan
			JOIN user_resto ON user_resto.`id` = pemesanan.`id_user_resto`
			JOIN resto ON resto.id = user_resto.id_resto
			JOIN pembayaran ON pembayaran.id_pemesanan = pemesanan.id
			WHERE resto.`id` = '$idresto' AND SUBSTRING(pembayaran.tanggal, 1, 10) = '$date' AND HOUR(pembayaran.tanggal)
			BETWEEN '$jamawal' AND '$jamakhir'");
		return $query;
	}

	public function tampil_data_pemesanan_menu($id){
		$query = $this->db->query("
			SELECT pemesanan_menu.*, menu.*
			FROM pemesanan_menu
			JOIN menu ON menu.id = pemesanan_menu.id_menu
			where pemesanan_menu.id_pemesanan = $id
			");
		return $query->result();
	}

	public function tampil_data_pemesanan_paket($id){
		$query = $this->db->query("
			SELECT pemesanan_paket.*,paket.*
			from pemesanan_paket
			JOIN paket ON paket.id = pemesanan_paket.id_paket
			where pemesanan_paket.id_pemesanan = $id
			");
		return $query->result();
	}

	public function tampil_data_pemesanan($id){
		$query = $this->db->query("
			SELECT pemesanan.*
			from pemesanan
			where id = $id
			");
		return $query->result();
	}

	public function tambah_data_pemesanan($nama_pemesan,$no_meja,$keterangan,$id_resto){
		$date = date("Y-m-d H:i:s");
		$hasil=$this->db->query("INSERT INTO pemesanan (nama_pemesan,no_meja,keterangantambahan,tanggal,id_user_resto)
			VALUES ('$nama_pemesan','$no_meja','$keterangan','$date','$id_resto')");

		return $hasil;
	}

	public function tambah_data_pemesanan_menu($id_pemesanan,$menu,$jumlah_pesan_menu,$harga_per_menu){
		$hasil=$this->db->query("INSERT INTO pemesanan_menu (id_pemesanan,id_menu,jumlah_pesan,subharga)
			VALUES ('$id_pemesanan','$menu','$jumlah_pesan_menu','$harga_per_menu')");

		return $hasil;
	}

	public function tambah_data_pemesanan_paket($id_pemesanan,$paket,$jumlah_pesan_paket,$harga_per_paket){
		$hasil=$this->db->query("INSERT INTO pemesanan_paket (id_pemesanan,id_paket,jumlah_pesan,subharga)
			VALUES ('$id_pemesanan','$paket','$jumlah_pesan_paket','$harga_per_paket')");

		return $hasil;
	}

	function update_status_pemesanan($id_pemesanan){
		$hasil=$this->db->query("UPDATE pemesanan
			SET pemesanan.`status`  = 'produksi'
			WHERE `pemesanan`.`id` = '$id_pemesanan' ");

		return $hasil;
	}

	public function tampil_menu_tersedia(){
		$hasil=$this->db->query("SELECT * FROM menu WHERE status = 'tersedia'");
		return $hasil;
	}

	public function tampil_menu_habis(){
		$hasil=$this->db->query("SELECT * FROM menu WHERE status = 'habis'");
		return $hasil;
	}

	public function tampil_paket_tersedia(){
		$hasil=$this->db->query("SELECT * FROM paket WHERE status = 'tersedia'");
		return $hasil;
	}

	public function tampil_paket_habis(){
		$hasil=$this->db->query("SELECT * FROM paket WHERE status = 'habis'");
		return $hasil;
	}

	public function udpate_stok_menu($where,$value){
		$hasil=$this->db->query("UPDATE menu SET stok = '$value' WHERE id = '$where'");
		return $hasil;
	}

}
