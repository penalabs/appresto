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
		$data['data_cabang_resto'] = $this->m_modul_admin_resto->tampil_data('resto')->result();
		$data['data_peralatan'] = $this->m_modul_admin_resto->tampil_data('peralatan')->result();
		$this->load->view('modul_admin_resto/V_permintaanperalatan_tambah', $data);
	}

	public function permintaanperalatan_tambahaksi()
	{
		$nama_cabang		= $this->input->post('nama_cabang');
		$alat				= $this->input->post('alat');
		$jumlah				= $this->input->post('jumlah');
		$masapemanfaatan 	= $this->input->post('masapemanfaatan');
		$id_kanwil		= $this->input->post('id_kanwil');
		// $nominal			= $this->input->post('nominal');
		// $penyusutan			= $this->input->post('penyusutan');
		$datainput = array(
			'id_resto'				=> $nama_cabang,
			'id_kanwil'				=> $id_kanwil,
			'id_alat'				=> $alat,
			'jumlah'				=> $jumlah,
			'masa_pemanfatan'		=> $masapemanfaatan,
			'status_permintaan'		=> 'permintaan',
			// 'nominal'				=> $nominal,
			// 'nominal_penyusutan'	=> $penyusutan
		);
		$this->m_modul_admin_resto->input_data($datainput, 'permintaan_alat');

		$sql2 = "SELECT jumlah_stok FROM peralatan where id='$alat'";
		$jumlah_stok_alat=$this->db->query($sql2)->row();

		$stok_akhir=$jumlah_stok_alat->jumlah_stok-$jumlah;

		$sql3 = "UPDATE peralatan set jumlah_stok='$stok_akhir' where id='$alat'";
		$this->db->query($sql3);


		redirect('C_modul_admin_resto/permintaanperalatan_view');
	}

	public function permintaanperalatan_edit($id_pengeluaran_cabang)
	{
		$data['data_cabang_resto'] = $this->m_modul_admin_resto->tampil_data('resto')->result();
		$data['data_peralatan'] = $this->m_modul_admin_resto->tampil_data('peralatan')->result();
		$data['permintaanperalatan'] = $this->m_modul_admin_resto->tampil_data_permintaan_peralatan_where($id_pengeluaran_cabang)->result();
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

		$sql2 = "SELECT jumlah_stok FROM peralatan where id='$alat'";
		$jumlah_stok_alat=$this->db->query($sql2)->row();

		$sql3 = "SELECT jumlah FROM permintaan_alat where id_permintaan_alat='$id'";
		$stok_permintaan=$this->db->query($sql3)->row();
	  (int)$stok_permintaan->jumlah;

		if((int)$stok_permintaan->jumlah<(int)$jumlah){
			echo 1;
			echo 	$stok_akhir=(int)$jumlah_stok_alat->jumlah_stok+((int)$stok_permintaan->jumlah-(int)$jumlah);
		}else if((int)$stok_permintaan->jumlah>(int)$jumlah){

			echo 	$stok_akhir=(int)$jumlah_stok_alat->jumlah_stok- ((int)$jumlah-(int)$stok_permintaan->jumlah);
		}



		$sql4 = "UPDATE peralatan set jumlah_stok='$stok_akhir' where id='$alat'";
		$this->db->query($sql4);

		$where = array('id_permintaan_alat' => $id);
		$datainput = array(
			'id_resto'				=> $nama_cabang,
			'id_kanwil'				=> $id_kanwil,
			'id_alat'				=> $alat,
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



		$sql2 = "SELECT jumlah_stok FROM peralatan where id='$id_alat'";
		$jumlah_stok_alat=$this->db->query($sql2)->row();

		$stok_akhir=$jumlah_stok_alat->jumlah_stok+$jumlah;

		$sql3 = "UPDATE peralatan set jumlah_stok='$stok_akhir' where id='$id_alat'";
		$this->db->query($sql3);

		$where = array('id_permintaan_alat' => $id_permintaan_alat);
		$this->m_modul_admin_resto->hapus_data($where, 'permintaan_alat');

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
}
