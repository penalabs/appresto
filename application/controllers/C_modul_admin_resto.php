<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_modul_admin_resto extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_modul_admin_resto');
		$this->load->helper('url');
		if ($this->session->userdata('status') == "") {
			redirect(base_url("login"));
		}
	}

/* CATATAN
	1. Alter table pemberian_kaskeluar -> menambahkan fild status
	2. Create table tbl_pengeluaran_kebutuhan */
	public function pengeluaran_operasional()
	{
		$data['permintaanperalatan'] = $this->m_modul_admin_resto->data_pengeluaran_operasional_cabang()->result();
		$this->load->view('modul_admin_resto/V_pengeluaranbiayaoprasional_view', $data);
	}







	//menu permintaan peralatan
	public function permintaanperalatan_view()
	{
		$data['permintaanperalatan'] = $this->m_modul_admin_resto->tampil_data_permintaan_peralatan()->result();
		$this->load->view('modul_admin_resto/V_permintaanperalatan_view', $data);
	}

	public function permintaanperalatan_tambah()
	{
		$id_admin_resto=$this->session->userdata('id');
		$sql1 = "SELECT id_kanwil FROM user_resto WHERE id='$id_admin_resto'";
		$data_id_kanwil=$this->db->query($sql1)->row();
		$id_kanwil=$data_id_kanwil->id_kanwil;

		$sql2 = "SELECT * FROM resto WHERE id_kanwil='$id_kanwil'";

		$data['data_cabang_resto'] =$this->db->query($sql2)->result();
		$data['data_peralatan'] = $this->m_modul_admin_resto->tampil_data('peralatan')->result();
		$this->load->view('modul_admin_resto/V_permintaanperalatan_tambah', $data);
	}

	public function permintaanperalatan_tambahaksi()
	{
		// $id_admin_resto=$this->session->userdata('id');
		// $sql = "SELECT id_resto FROM user_resto where id='$id_admin_resto'";
		// $cek_id_resto=$this->db->query($sql)->row();
		// $id_resto=$cek_id_resto->id_resto;
		$id_admin_resto=$this->input->post('id_admin_resto');
		$id_resto=$this->input->post('nama_cabang');
		$nama_cabang		= $this->input->post('nama_cabang');
		$alat				= $this->input->post('alat');
		$jumlah				= $this->input->post('jumlah');
		$masapemanfaatan 	= $this->input->post('masapemanfaatan');
		$id_kanwil		= $this->input->post('id_kanwil');
		// $nominal			= $this->input->post('nominal');
		// $penyusutan			= $this->input->post('penyusutan');
		$datainput = array(
			'id_resto'				=> $id_resto,
			'id_kanwil'				=> $id_kanwil,
			'id_alat'				=> $alat,
			'tanggal'				=> date("Y-m-d"),
			'jumlah'				=> $jumlah,
			'masa_pemanfatan'		=> $masapemanfaatan,
			'status_permintaan'		=> 'permintaan',
			// 'nominal'				=> $nominal,
			// 'nominal_penyusutan'	=> $penyusutan
		);
		$this->m_modul_admin_resto->input_data($datainput, 'permintaan_alat');

		// $sql2 = "SELECT jumlah_stok FROM peralatan where id='$alat'";
		// $jumlah_stok_alat=$this->db->query($sql2)->row();
		//
		// $stok_akhir=$jumlah_stok_alat->jumlah_stok-$jumlah;
		//
		// $sql3 = "UPDATE peralatan set jumlah_stok='$stok_akhir' where id='$alat'";
		// $this->db->query($sql3);


		redirect('C_modul_admin_resto/permintaanperalatan_view');
	}

	public function permintaanperalatan_edit($id_permintaan_alat)
	{
		$id_admin_resto=$this->session->userdata('id');
		$sql1 = "SELECT id_kanwil FROM user_resto WHERE id='$id_admin_resto'";
		$data_id_kanwil=$this->db->query($sql1)->row();
		$id_kanwil=$data_id_kanwil->id_kanwil;

		$sql2 = "SELECT * FROM resto WHERE id_kanwil='$id_kanwil'";

		$data['data_cabang_resto'] =$this->db->query($sql2)->result();
		$data['data_peralatan'] = $this->m_modul_admin_resto->tampil_data('peralatan')->result();
		$data['permintaanperalatan'] = $this->m_modul_admin_resto->tampil_data_permintaan_peralatan_where($id_permintaan_alat)->result();
		$this->load->view('modul_admin_resto/V_permintaanperalatan_edit', $data);
	}

	public function permintaanperalatan_editaksi()
	{
		$id					= $this->input->post('id');
		$nama_cabang		= $this->input->post('nama_cabang');
		$alat				= $this->input->post('alat');
		$jumlah				= $this->input->post('jumlah');
		$masapemanfaatan 	= $this->input->post('masapemanfaatan');
		$id_kanwil		= $this->input->post('id_kanwil');
		// $nominal			= $this->input->post('nominal');
		// $penyusutan			= $this->input->post('penyusutan');

		// $sql2 = "SELECT jumlah_stok FROM peralatan where id='$alat'";
		// $jumlah_stok_alat=$this->db->query($sql2)->row();
		//
		// $sql3 = "SELECT jumlah FROM permintaan_alat where id_permintaan_alat='$id'";
		// $stok_permintaan=$this->db->query($sql3)->row();
	  // (int)$stok_permintaan->jumlah;
		//
		// if((int)$stok_permintaan->jumlah<(int)$jumlah){
		// 	echo 1;
		// 	echo 	$stok_akhir=(int)$jumlah_stok_alat->jumlah_stok+((int)$stok_permintaan->jumlah-(int)$jumlah);
		// }else if((int)$stok_permintaan->jumlah>(int)$jumlah){
		//
		// 	echo 	$stok_akhir=(int)$jumlah_stok_alat->jumlah_stok- ((int)$jumlah-(int)$stok_permintaan->jumlah);
		// }
		//
		//
		//
		// $sql4 = "UPDATE peralatan set jumlah_stok='$stok_akhir' where id='$alat'";
		// $this->db->query($sql4);

		$where = array('id_permintaan_alat' => $id);
		$datainput = array(
			'id_resto'				=> $nama_cabang,
			'id_kanwil'				=> $id_kanwil,
			'id_alat'				=> $alat,
			'tanggal'				=> date("Y-m-d"),
			'jumlah'				=> $jumlah,
			'masa_pemanfatan'		=> $masapemanfaatan,
			'status_permintaan'		=> 'permintaan',
			// 'nominal'				=> $nominal,
			// 'nominal_penyusutan'	=> $penyusutan
		);
		$this->m_modul_admin_resto->update_data($where, $datainput, 'permintaan_alat');

		redirect('C_modul_admin_resto/permintaanperalatan_view');
	}

	public function permintaanperalatan_hapus()
	{
		echo $id_alat=$this->input->get('id_alat');
		echo $id_permintaan_alat=$this->input->get('id');
		echo $jumlah=$this->input->get('jumlah');



		// $sql2 = "SELECT jumlah_stok FROM peralatan where id='$id_alat'";
		// $jumlah_stok_alat=$this->db->query($sql2)->row();
		//
		// $stok_akhir=$jumlah_stok_alat->jumlah_stok+$jumlah;
		//
		// $sql3 = "UPDATE peralatan set jumlah_stok='$stok_akhir' where id='$id_alat'";
		// $this->db->query($sql3);

		$where = array('id_permintaan_alat' => $id_permintaan_alat);
		$this->m_modul_admin_resto->hapus_data($where, 'permintaan_alat');

		redirect('C_modul_admin_resto/permintaanperalatan_view');
	}

	public function kembalikan_alat()
	{
		echo $id_alat=$this->input->get('id_alat');
		echo $id_permintaan_alat=$this->input->get('id');
		echo $jumlah=$this->input->get('jumlah');



		$sql2 = "SELECT jumlah_stok FROM peralatan where id='$id_alat'";
		$jumlah_stok_alat=$this->db->query($sql2)->row();

		$stok_akhir=$jumlah_stok_alat->jumlah_stok+$jumlah;

		$sql3 = "UPDATE peralatan set jumlah_stok='$stok_akhir' where id='$id_alat'";
		$this->db->query($sql3);

		// $where = array('id_permintaan_alat' => $id_permintaan_alat);
		// $this->m_modul_admin_resto->hapus_data($where, 'permintaan_alat');
		$sql4 = "UPDATE permintaan_alat set status_permintaan='dikembalikan' where id_permintaan_alat='$id_permintaan_alat'";
	  $this->db->query($sql4);

		redirect('C_modul_admin_resto/permintaanperalatan_view');
	}

	public function konfirmasi_alat()
	{
		echo $id_alat=$this->input->get('id_alat');
		echo $id_permintaan_alat=$this->input->get('id');
		echo $jumlah=$this->input->get('jumlah');

	  // $sql2 = "SELECT jumlah_stok FROM peralatan where id='$id_alat'";
	  // $jumlah_stok_alat=$this->db->query($sql2)->row();
		//
	  // $stok_akhir=(int)$jumlah_stok_alat->jumlah_stok-(int)$jumlah_permintaan;
		//
	  // $sql3 = "UPDATE peralatan set jumlah_stok='$stok_akhir' where id='$id_alat'";
	  // $this->db->query($sql3);

		$sql4 = "UPDATE permintaan_alat set status_permintaan='diterima' where id_permintaan_alat='$id_permintaan_alat'";
	  $this->db->query($sql4);


	  redirect('C_modul_admin_resto/permintaanperalatan_view');
	}









	//menu anggaran biaya oprasioanl
	public function anggaranbiayaoprasional_view(){
		$data['anggaranbiayaoprasional'] = $this->m_modul_admin_resto->tampil_data_anggaranbiayaoprasional()->result();
		$this->load->view('modul_admin_resto/V_anggaranbiayaoprasional_view', $data);
	}

	public function anggaranbiayaoprasional_tambah(){
		$data['data_cabang_resto'] = $this->m_modul_admin_resto->tampil_data('resto')->result();
		$this->load->view('modul_admin_resto/V_anggaranbiayaoprasional_tambah', $data);
	}

	public function anggaranbiayaoprasional_tambahaksi(){
		$date 				= date('Y-m-d H:i:s');
		$nama_cabang		= $this->input->post('nama_cabang');
		$nominal_kas_keluar				= $this->input->post('nominal_kas_keluar');
		$datainput = array(
			'id_bendahara'			=> "2",
			'id_resto'				=> $nama_cabang,
			'tanggal'				=> $date,
			'nominal_kas_keluar'	=> $nominal_kas_keluar,
			'status'				=> "Pengajuan"
		);
		$this->m_modul_admin_resto->input_data($datainput, 'pemberian_kaskeluar');
		redirect('C_modul_admin_resto/anggaranbiayaoprasional_view');
	}

	public function anggaranbiayaoprasional_edit($id){
		$data['data_cabang_resto'] = $this->m_modul_admin_resto->tampil_data('resto')->result();
		$data['anggaranbiayaoprasional_edit'] = $this->m_modul_admin_resto->tampil_anggaran_biaya_oprasional_where($id)->result();
		$this->load->view('modul_admin_resto/V_anggaranbiayaoprasional_edit', $data);
	}

	public function anggaranbiayaoprasional_updateaksi(){
		$id					= $this->input->post('id');
		$nama_cabang		= $this->input->post('nama_cabang');
		$nominal_kas_keluar	= $this->input->post('nominal_kas_keluar');
		$where = array('id_pengeluaran' => $id);
		$datainput = array(
			'id_resto'				=> $nama_cabang,
			'nominal_kas_keluar'	=> $nominal_kas_keluar
		);
		$this->m_modul_admin_resto->update_data($where, $datainput, 'pemberian_kaskeluar');
		redirect('C_modul_admin_resto/anggaranbiayaoprasional_view');
	}

	public function anggaranbiayaoprasional_hapus($id)
	{
		$where = array('id_pengeluaran' => $id);
		$this->m_modul_admin_resto->hapus_data($where, 'pemberian_kaskeluar');
		redirect('C_modul_admin_resto/anggaranbiayaoprasional_view');
	}









	//penerimaan biaya oprasional
	public function penerimaanbiayaoprasional_view(){
		$data['penerimaanbiayaoprasional'] = $this->m_modul_admin_resto->tampil_penerimaan_biaya_oprasional_where()->result();
		$this->load->view('modul_admin_resto/V_penerimaanbiayaoprasional_view', $data);
	}

	public function penerimaanbiayaoprasional_updatestatus($id){
		$where = array('id_pengeluaran' => $id);
		$datainput = array(
			'status'	=> "pemberian"
		);
		$this->m_modul_admin_resto->update_data($where, $datainput, 'pemberian_kaskeluar');
		redirect('C_modul_admin_resto/penerimaanbiayaoprasional_view');
	}











	//Pengeluaran Biaya Oprasional
	public function pengeluaranbiayaoprasional_view(){
		//$data['pengeluaranbiayaoprasional'] = $this->m_modul_admin_resto->tampil_data('pengeluaran_cabang_operasional')->result();
		$id_admin_resto=$this->session->userdata('id');
		$sql = "SELECT pengeluaran_cabang_operasional.tanggal,pengeluaran_cabang_operasional.masa_sewa,pengeluaran_cabang_operasional.nominal,operasional.nama_pengeluaran,pengeluaran_cabang_operasional.id as id_operasional FROM pengeluaran_cabang_operasional join operasional on operasional.id=pengeluaran_cabang_operasional.id_operasional where id_admin_resto='$id_admin_resto'";
		$data['pengeluaranbiayaoprasional']=$this->db->query($sql)->result();
		$this->load->view('modul_admin_resto/V_pengeluaranbiayaoprasional_view', $data);
	}

	public function pengeluaranbiayaoprasional_tambah(){
		$this->load->view('modul_admin_resto/V_pengeluaranbiayaoprasional_tambah');
	}

	public function pengeluaranbiayaoprasional_tambahaksi(){
		$id_operasional		= $this->input->post('id_operasional');
		$id_resto		= $this->input->post('id_resto');
		$id_kanwil		= $this->input->post('id_kanwil');
		$id_admin_resto		= $this->input->post('id_admin_resto');
		$nominal	= $this->input->post('nominal');
		$tanggal	= date('Y-m-d');
		$masa_sewa	= $this->input->post('masa_sewa');
		$datainput = array(
			'id_operasional'				=> $id_operasional,
			'nominal'	=> $nominal,
			'tanggal'	=> $tanggal,
			'masa_sewa'	=> $masa_sewa,
			'id_kanwil'	=> $id_kanwil,
			'id_admin_resto'	=> $id_admin_resto,
			'id_resto'	=> $id_resto
		);
		$this->m_modul_admin_resto->input_data($datainput, 'pengeluaran_cabang_operasional');
		redirect('C_modul_admin_resto/pengeluaranbiayaoprasional_view');
	}

	public function pengeluaranbiayaoprasional_edit(){
		//$where = array('id_pengeluaran_kebutuhan' => $id);
		$id		= $this->input->get('id');
		$sql = "SELECT pengeluaran_cabang_operasional.tanggal,pengeluaran_cabang_operasional.masa_sewa,pengeluaran_cabang_operasional.nominal,operasional.nama_pengeluaran,pengeluaran_cabang_operasional.id as id_operasional FROM pengeluaran_cabang_operasional join operasional on operasional.id=pengeluaran_cabang_operasional.id_operasional where pengeluaran_cabang_operasional.id='$id'";
		$data['pengeluaranbiayaoprasional_edit']=$this->db->query($sql)->result();
		$this->load->view('modul_admin_resto/V_pengeluaranbiayaoprasional_edit', $data);
	}

	public function pengeluaranbiayaoprasional_updateaksi(){
		$id		= $this->input->post('id');
		$id_operasional		= $this->input->post('id_operasional');
		$id_resto		= $this->input->post('id_resto');
		$id_kanwil		= $this->input->post('id_kanwil');
		$id_admin_resto		= $this->input->post('id_admin_resto');
		$nominal	= $this->input->post('nominal');
		$tanggal	= date('Y-m-d');
		$masa_sewa	= $this->input->post('masa_sewa');
		$datainput = array(
			'id_operasional'				=> $id_operasional,
			'nominal'	=> $nominal,
			'tanggal'	=> $tanggal,
			'masa_sewa'	=> $masa_sewa,
			'id_kanwil'	=> $id_kanwil,
			'id_admin_resto'	=> $id_admin_resto,
			'id_resto'	=> $id_resto
		);
		$where = array('id' => $id);
		$this->m_modul_admin_resto->update_data($where,$datainput, 'pengeluaran_cabang_operasional');
		redirect('C_modul_admin_resto/pengeluaranbiayaoprasional_view');
	}

	public function pengeluaranbiayaoprasional_hapus($id_pengeluaran_kebutuhan){
		$where = array('id_pengeluaran_kebutuhan' => $id_pengeluaran_kebutuhan);
		$this->m_modul_admin_resto->hapus_data($where, 'tbl_pengeluaran_kebutuhan');
		redirect('C_modul_admin_resto/pengeluaranbiayaoprasional_view');
	}











	public function laporanbiayaoprasional_view(){
		$tanggalwhare 				= date('Y-m-d');
		$data['laporanbiayaoprasional'] = $this->m_modul_admin_resto->tampil_laporan_biaya_oprasional_where_hari($tanggalwhare)->result();
		$this->load->view('modul_admin_resto/V_laporanbiayaoprasionalcabang_view', $data);
	}

	public function laporanbiayaoprasional_cariaksi_hari(){
		$tanggal_hari				= $this->input->post('tanggal_hari');
		$data['laporanbiayaoprasional'] = $this->m_modul_admin_resto->tampil_laporan_biaya_oprasional_where_hari($tanggal_hari)->result();
		$this->load->view('modul_admin_resto/V_laporanbiayaoprasionalcabang_view', $data);
	}

	public function laporanbiayaoprasional_cariaksi_bulan(){
		$tanggal_bulan				= $this->input->post('tanggal_bulan');
		$data['laporanbiayaoprasional'] = $this->m_modul_admin_resto->tampil_laporan_biaya_oprasional_where_bulan($tanggal_bulan)->result();
		$this->load->view('modul_admin_resto/V_laporanbiayaoprasionalcabang_view', $data);
	}









	public function laporanpenjualan_view(){
		$data['comboboxmenu'] = $this->m_modul_admin_resto->tampil_data('menu')->result();
		$data['comboboxpaket'] = $this->m_modul_admin_resto->tampil_data('paket')->result();
		$data['laporanpenjualanM'] = $this->m_modul_admin_resto->tampil_laporan_penjualanmenu('')->result();
		$data['laporanpenjualanP'] = $this->m_modul_admin_resto->tampil_laporan_penjualanpaket('')->result();
		$data['totalmenupayu'] = $this->m_modul_admin_resto->tampil_laporan_penjualanmenutotal('')->row_array();
		$data['totalpaketpayu'] = $this->m_modul_admin_resto->tampil_laporan_penjualanpakettotal('')->row_array();
		$data['datakondisi'] = "";
		$this->load->view('modul_admin_resto/V_laporanpenjualan_view', $data);
	}

	public function laporanpenjualanmenu_cariaksi(){
		$where						= $this->input->post('namamenu');
		$data['comboboxmenu'] = $this->m_modul_admin_resto->tampil_data('menu')->result();
		$data['comboboxpaket'] = $this->m_modul_admin_resto->tampil_data('paket')->result();
		$data['laporanpenjualanM'] = $this->m_modul_admin_resto->tampil_laporan_penjualanmenu($where)->result();
		$data['totalmenupayu'] = $this->m_modul_admin_resto->tampil_laporan_penjualanmenutotal($where)->row_array();
		$data['datakondisi'] = "menu";
		$this->load->view('modul_admin_resto/V_laporanpenjualan_view', $data);
	}

	public function laporanpenjualanpaket_cariaksi(){
		$where						= $this->input->post('namapaket');
		$data['comboboxmenu'] = $this->m_modul_admin_resto->tampil_data('menu')->result();
		$data['comboboxpaket'] = $this->m_modul_admin_resto->tampil_data('paket')->result();
		$data['laporanpenjualanP'] = $this->m_modul_admin_resto->tampil_laporan_penjualanpaket($where)->result();
		$data['totalpaketpayu'] = $this->m_modul_admin_resto->tampil_laporan_penjualanpakettotal($where)->row_array();
		$data['datakondisi'] = "";
		$this->load->view('modul_admin_resto/V_laporanpenjualan_view', $data);
	}


	//permintaan bahan mentah baru
	public function permintaan_bahan_mentah()
	{
		$sql = "SELECT resto.nama_resto,permintaan_bahan_mentah.id,permintaan_bahan_mentah.nama_permintaan,permintaan_bahan_mentah.tanggal,permintaan_bahan_mentah.status FROM permintaan_bahan_mentah join user_resto on user_resto.id=permintaan_bahan_mentah.id_user_produksi join resto on resto.id=user_resto.id_resto";
		$data['data']=$this->db->query($sql)->result();
		$sql2 = "SELECT resto.nama_resto,permintaan_bahan_olahan.id,permintaan_bahan_olahan.nama_permintaan,permintaan_bahan_olahan.tanggal,permintaan_bahan_olahan.status FROM permintaan_bahan_olahan join user_resto on user_resto.id=permintaan_bahan_olahan.id_user_produksi join resto on resto.id=user_resto.id_resto";
		$data['data2']=$this->db->query($sql2)->result();
		$this->load->view('modul_admin_resto/permintaan_bahan',$data);
	}

	public function lihat_bahan_mentah()
	{
		$data_session = array(
			'pesan' => '',
		);

		$this->session->set_userdata($data_session);
		$id_permintaan= $this->input->get('id_permintaan');
		$sql = "SELECT pengiriman_bahan_mentah.*,bahan_mentah.nama_bahan FROM pengiriman_bahan_mentah join bahan_mentah on bahan_mentah.id=pengiriman_bahan_mentah.id_bahan_mentah where id_permintaan='$id_permintaan'";
		$data['data2']=$this->db->query($sql)->result();

		$this->load->view('modul_admin_resto/lihat_bahan_mentah',$data);
	}
	public function lihat_bahan_olahan()
	{
		$data_session = array(
			'pesan' => '',
		);

		$this->session->set_userdata($data_session);
		$id_permintaan= $this->input->get('id_permintaan');
		$sql = "SELECT pengiriman_bahan_olahan.*,bahan_olahan.nama_bahan FROM pengiriman_bahan_olahan join bahan_olahan on bahan_olahan.id=pengiriman_bahan_olahan.id_bahan_olahan where id_permintaan='$id_permintaan'";
		$data['data2']=$this->db->query($sql)->result();

		$this->load->view('modul_admin_resto/lihat_bahan_olahan',$data);
	}

	public function aksi_tambah_permintaan_bahan_mentah(){
		$id_user_produksi = $this->input->post('id_user_produksi');
		$sql = "SELECT * FROM user_resto join resto on resto.id=user_resto.id_resto where user_resto.id='$id_user_produksi'";
		$user=$this->db->query($sql)->row();

		$nama_permintaan = $this->input->post('nama_permintaan');
		$tanggal = $this->input->post('tanggal');
		$status = 'permintaan';
		$id_resto = $user->id;
		$sql = "INSERT INTO permintaan_bahan_mentah (id_resto,id_user_produksi,nama_permintaan,tanggal,status) values ('$id_resto','$id_user_produksi','$nama_permintaan','$tanggal','$status')";
		if($this->db->query($sql)){
			$data_session = array(
				'pesan' => 'berhasil tambah data',
			);

			$this->session->set_userdata($data_session);
		}
		redirect('C_modul_admin_resto/permintaan_bahan_mentah');

	}
	public function aksi_tambah_permintaan_bahan_olahan(){
		$id_user_produksi = $this->input->post('id_user_produksi');
		$sql = "SELECT * FROM user_resto join resto on resto.id=user_resto.id_resto where user_resto.id='$id_user_produksi'";
		$user=$this->db->query($sql)->row();

		$nama_permintaan = $this->input->post('nama_permintaan');
		$tanggal = $this->input->post('tanggal');
		$status = 'permintaan';
		$id_resto = $user->id;
		$sql = "INSERT INTO permintaan_bahan_olahan (id_resto,id_user_produksi,nama_permintaan,tanggal,status) values ('$id_resto','$id_user_produksi','$nama_permintaan','$tanggal','$status')";
		if($this->db->query($sql)){
			$data_session = array(
				'pesan' => 'berhasil tambah data',
			);

			$this->session->set_userdata($data_session);
		}
		redirect('C_modul_admin_resto/permintaan_bahan_mentah');

	}
	public function hapus_permintaan(){
		$id_permintaan = $this->input->get('id_permintaan');
		$tabel = $this->input->get('tabel');

		$sql = "DELETE FROM $tabel where id='$id_permintaan'";
		if($this->db->query($sql)){
			$data_session = array(
				'pesan' => 'berhasil hapus data',
			);

			$this->session->set_userdata($data_session);
		}
		redirect('C_modul_admin_resto/permintaan_bahan_mentah');
	}

	public function aksi_tambah_list_bahan_olahan(){
		$id_user_produksi = $this->session->userdata('id');
		$sql = "SELECT * FROM user_resto join resto on resto.id=user_resto.id_resto where user_resto.id='$id_user_produksi'";
		$user=$this->db->query($sql)->row();

		$id_permintaan = $this->input->post('id_permintaan');
		$id_bahan_olahan = $this->input->post('id_bahan_olahan');
		$tanggal = $this->input->post('tanggal');
		$jumlah_permintaan = $this->input->post('jumlah_permintaan');
		$jumlah_dikirim = $this->input->post('jumlah_dikirim');
		$jumlah_dikembalikan = $this->input->post('jumlah_dikembalikan');

		$status = "";
		if((int)$jumlah_permintaan==(int)$jumlah_dikirim){
			$status = 'sesuai';
		}else{
			$status = 'tidak';
		}

		$id_resto = $user->id;

		$sql = "INSERT INTO pengiriman_bahan_olahan values ('','$id_permintaan','$id_bahan_olahan','$tanggal','$jumlah_permintaan','$jumlah_dikirim','$jumlah_dikembalikan','$status')";
		if($this->db->query($sql)){
			$data_session = array(
				'pesan' => 'beraksi_tambah_bahan_mentahhasil tambah data',
			);

			$this->session->set_userdata($data_session);
		}

		redirect('C_modul_admin_resto/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
	}
	function aksi_kembalikan_bahan_olahan(){
		$id_pengiriman = $this->input->post('id');
		$jumlah_dikembalikan = $this->input->post('jumlah_dikembalikan');
		$jumlah_permintaan = $this->input->post('jumlah_permintaan');
		$jumlah_dikirim = $this->input->post('jumlah_dikirim');
		$id_permintaan = $this->input->post('id_permintaan');
		$batas_kembali=(int)$jumlah_dikirim-(int)$jumlah_permintaan;

		if((int)$batas_kembali==0){
			$data_session = array(
				'pesan' => 'jumlah dikembalikan melebihi',
			);

			$this->session->set_userdata($data_session);
		}else{
			$sql = "UPDATE pengiriman_bahan_olahan SET jumlah_dikembalikan = '$jumlah_dikembalikan' WHERE id='$id_pengiriman'";
			if($this->db->query($sql)){
				$data_session = array(
					'pesan' => 'berhasil update bahan olahan dikembalikan',
				);

				$this->session->set_userdata($data_session);
				echo 1;
			}
		}
		redirect('C_modul_admin_resto/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
	}

	function hapus_list_bahan_olahan(){
		$id_permintaan = $this->input->get('id_permintaan');
		$id = $this->input->get('id');


		$sql = "DELETE FROM pengiriman_bahan_olahan where id='$id'";
		if($this->db->query($sql)){
			$data_session = array(
				'pesan' => 'berhasil hapus data',
			);

			$this->session->set_userdata($data_session);
		}
		redirect('C_modul_admin_resto/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
	}
	function terima_list_bahan_olahan(){
		$id_permintaan = $this->input->get('id_permintaan');
		$id_pengiriman= $this->input->get('id');
		$id_bahan_olahan = $this->input->get('id_bahan_olahan');
		$jumlah_bahan_diterima = $this->input->get('jumlah_bahan_diterima');

		$sql2 = "SELECT stok,status FROM stok_bahan_olahan_produksi WHERE id_bahan_olahan='$id_bahan_olahan'";
		$cek_stok=$this->db->query($sql2)->row();

		$stok_akhir=(int)$cek_stok->stok+(int)$jumlah_bahan_diterima;

		if($cek_stok->status=="diterima"){
			$data_session = array(
				'pesan' => 'barang sudah diterima',
			);

			$this->session->set_userdata($data_session);
		}else{
			$sql = "UPDATE stok_bahan_olahan_produksi SET stok = '$stok_akhir' WHERE id_bahan_olahan='$id_bahan_olahan'";
			if($this->db->query($sql)){
				$data_session = array(
					'pesan' => 'berhasil konrimasi bahan diterima',
				);

				$this->session->set_userdata($data_session);
			}
		}
		redirect('C_modul_admin_resto/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
	}





	public function aksi_tambah_list_bahan_mentah(){
		$id_user_produksi = $this->session->userdata('id');
		$sql = "SELECT * FROM user_resto join resto on resto.id=user_resto.id_resto where user_resto.id='$id_user_produksi'";
		$user=$this->db->query($sql)->row();

		$id_permintaan = $this->input->post('id_permintaan');
		$id_bahan_mentah = $this->input->post('id_bahan_mentah');
		$tanggal = $this->input->post('tanggal');
		$jumlah_permintaan = $this->input->post('jumlah_permintaan');
		$jumlah_dikirim = $this->input->post('jumlah_dikirim');
		$jumlah_dikembalikan = $this->input->post('jumlah_dikembalikan');

		$status = "";
		if((int)$jumlah_permintaan==(int)$jumlah_dikirim){
			$status = 'sesuai';
		}else{
			$status = 'tidak';
		}

		$id_resto = $user->id;

		$sql = "INSERT INTO pengiriman_bahan_mentah values ('','$id_permintaan','$id_bahan_mentah','$tanggal','$jumlah_permintaan','$jumlah_dikirim','$jumlah_dikembalikan','$status')";
		if($this->db->query($sql)){
			$data_session = array(
				'pesan' => 'beraksi_tambah_bahan_mentahhasil tambah data',
			);

			$this->session->set_userdata($data_session);
		}

		redirect('C_modul_admin_resto/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
	}
	function aksi_kembalikan_bahan_mentah(){
		$id_pengiriman = $this->input->post('id');
		$jumlah_dikembalikan = $this->input->post('jumlah_dikembalikan');

		$jumlah_permintaan = $this->input->post('jumlah_permintaan');
		$jumlah_dikirim = $this->input->post('jumlah_dikirim');
		$id_permintaan = $this->input->post('id_permintaan');
		$batas_kembali=(int)$jumlah_dikirim-(int)$jumlah_permintaan;

		if((int)$batas_kembali==0){
			$data_session = array(
				'pesan' => 'jumlah dikembalikan melebihi',
			);

			$this->session->set_userdata($data_session);
		}else{
			$sql = "UPDATE pengiriman_bahan_mentah SET jumlah_dikembalikan = '$jumlah_dikembalikan' WHERE id='$id_pengiriman'";
			if($this->db->query($sql)){
				$data_session = array(
					'pesan' => 'berhasil update bahan olahan dikembalikan',
				);

				$this->session->set_userdata($data_session);
				echo 1;
			}
		}
		redirect('C_modul_admin_resto/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
	}

	function hapus_list_bahan_mentah(){
		$id_permintaan = $this->input->get('id_permintaan');
		$id = $this->input->get('id');


		$sql = "DELETE FROM pengiriman_bahan_mentah where id='$id'";
		if($this->db->query($sql)){
			$data_session = array(
				'pesan' => 'berhasil hapus data',
			);

			$this->session->set_userdata($data_session);
		}
		redirect('C_modul_admin_resto/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
	}
	function terima_list_bahan_mentah(){
		$id_permintaan = $this->input->get('id_permintaan');
		$id_pengiriman= $this->input->get('id');
		$id_bahan_mentah = $this->input->get('id_bahan_mentah');
		$jumlah_bahan_diterima = $this->input->get('jumlah_bahan_diterima');

		$sql2 = "SELECT stok,status FROM stok_bahan_mentah_produksi WHERE id_bahan_mentah='$id_bahan_mentah'";
		$cek_stok=$this->db->query($sql2)->row();

		$stok_akhir=(int)$cek_stok->stok+(int)$jumlah_bahan_diterima;

		if($cek_stok->status=="diterima"){
			$data_session = array(
				'pesan' => 'barang sudah diterima',
			);

			$this->session->set_userdata($data_session);
		}else{
			$sql = "UPDATE stok_bahan_mentah_produksi SET stok = '$stok_akhir' WHERE id_bahan_mentah='$id_bahan_mentah'";
			if($this->db->query($sql)){
				$data_session = array(
					'pesan' => 'berhasil konrimasi bahan diterima',
				);

				$this->session->set_userdata($data_session);
			}
		}
		redirect('C_modul_admin_resto/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
	}

	function add_kinerja(){
		$id_kanwil = $this->session->userdata('id_kanwil');
		$id_resto = $this->session->userdata('id_resto');
		$id_user = $this->input->post('nama_karyawan');
		$status = $this->input->post('status');
		$tgl_m = $this->input->post('tgl_mulai');
		$tgl_a = $this->input->post('tgl_akhir');
		$ket = $this->input->post('keterangan');
		$data = array(
			'id_kanwil' => $id_kanwil,
			'id_resto' => $id_resto,
			'id_user_resto' => $id_user,
			'status' => $status,
			'tgl_mulai' => $tgl_m,
			'tgl_akhir' => $tgl_a,
			'keterangan' => $ket,
			);
		$this->m_modul_admin_resto->input_data($data,'log_aktivitas');
		$this->session->set_flashdata('flash','Ditambahkan');
        redirect('superadmin/kinerja_karyawan');
	}
	function hapus_kinerja($id){
		$where = array('id_log' => $id);
		$this->m_modul_admin_resto->hapus_data($where,'log_aktivitas');
		$this->session->set_flashdata('flash','Dihapuskan');
		redirect('superadmin/kinerja_karyawan');
	}
	function edit_kinerja(){
		$id_kanwil = $this->session->userdata('id_kanwil');
		$id_resto = $this->session->userdata('id_resto');
		$id_log = $this->input->post('idKin');
		$id_user = $this->input->post('nama2');
		$status = $this->input->post('statusEdit');
		$tgl_m = $this->input->post('tgl_mulai2');
		$tgl_a = $this->input->post('tgl_akhir2');
		$ket = $this->input->post('keterangan2');
		$data = array(
			'id_kanwil' => $id_kanwil,
			'id_resto' => $id_resto,
			'id_user_resto' => $id_user,
			'status' => $status,
			'tgl_mulai' => $tgl_m,
			'tgl_akhir' => $tgl_a,
			'keterangan' => $ket,
			);
		$where = array('id_log' => $id_log);
		$this->m_modul_admin_resto->update_data($where,$data,'log_aktivitas');
		$this->session->set_flashdata('flash','Di Edit');
        redirect('superadmin/kinerja_karyawan');
	}

	// public function setoran_kas_masuk(){
	// 	$id_resto=$this->session->userdata('id_resto');
	// 	$date = date('Y-m-d');
	// 	$jmakr = date('H');
	// 	$jamawal = "07";
	// 	$jamakhir = $jmakr;
	// 	$data['tampildatastor'] = $this->m_modul_admin_resto->tampildatastor("0","00","00","2020-02-01")->result();
	// 	$data['tampildatasum'] = $this->m_modul_admin_resto->tampildatasum($id_resto,$jamawal,$jamakhir,$date)->result();
	// 	$this->load->view('modul_admin_resto/V_setorankebendahara',$data);
	// }

	public function indexcarisetor()
	{
		$id_resto=$this->session->userdata('id_resto');
		date_default_timezone_set('Asia/Jakarta');
		$tglawal = date('Y-m-d');
		$tglakhir = date('Y-m-d');
		$data['tampildatastor'] = $this->m_modul_admin_resto->tampildatastor($id_resto,$tglawal,$tglakhir)->result();
		$data['tampildatasum'] = $this->m_modul_admin_resto->tampildatasum($id_resto,$tglawal,$tglakhir)->result();
		$this->load->view('modul_admin_resto/V_setorankebendahara', $data);
	}

	public function carisetor()
	{
		$id_resto=$this->session->userdata('id_resto');
		$tglawal = $this->input->post('tglawal');
		$tglakhir = $this->input->post('tglakhir');
		$data['tampildatastor'] = $this->m_modul_admin_resto->tampildatastor($id_resto,$tglawal,$tglakhir)->result();
		$data['tampildatasum'] = $this->m_modul_admin_resto->tampildatasum($id_resto,$tglawal,$tglakhir)->result();
		$this->load->view('modul_admin_resto/V_setorankebendahara', $data);
	}

	public function setorkebendahara()
	{
			$jmlstor = $this->input->post('jmlstor');
			$id_user_bendahara =$this->input->post('id_user_bendahara');
			$id_user_kasir =$this->input->post('id_user_kasir');
			$tanggal =$this->input->post('tanggal');

			$data = array(
				'id_user_bendahara' => $id_user_bendahara,
				'id_user_kasir' => $id_user_kasir,
				'jumlah_setoran' => $jmlstor,
				'tanggal' => $tanggal,
			);
			$this->m_modul_admin_resto->input_data($data,'pendapatan_kas_masuk');
			redirect('C_modul_admin_resto/indexcarisetor');
	}
}
