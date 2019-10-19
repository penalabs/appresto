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
		// $nominal			= $this->input->post('nominal');
		// $penyusutan			= $this->input->post('penyusutan');
		$datainput = array(
			'id_resto'				=> $nama_cabang,
			'id_alat'				=> $alat,
			'jumlah'				=> $jumlah,
			'masa_pemanfatan'		=> $masapemanfaatan,
			// 'nominal'				=> $nominal,
			// 'nominal_penyusutan'	=> $penyusutan
		);
		$this->m_modul_admin_resto->input_data($datainput, 'pengeluaran_cabang_alat');
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
		// $nominal			= $this->input->post('nominal');
		// $penyusutan			= $this->input->post('penyusutan');
		$where = array('id_pengeluaran_cabang' => $id);
		$datainput = array(
			'id_resto'				=> $nama_cabang,
			'id_alat'				=> $alat,
			'jumlah'				=> $jumlah,
			'masa_pemanfatan'		=> $masapemanfaatan,
			// 'nominal'				=> $nominal,
			// 'nominal_penyusutan'	=> $penyusutan
		);
		$this->m_modul_admin_resto->update_data($where, $datainput, 'pengeluaran_cabang_alat');
		redirect('C_modul_admin_resto/permintaanperalatan_view');
	}

	public function permintaanperalatan_hapus($id_pengeluaran_cabang)
	{
		$where = array('id_pengeluaran_cabang' => $id_pengeluaran_cabang);
		$this->m_modul_admin_resto->hapus_data($where, 'pengeluaran_cabang_alat');
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
		$data['pengeluaranbiayaoprasional'] = $this->m_modul_admin_resto->tampil_data('tbl_pengeluaran_kebutuhan')->result();
		$this->load->view('modul_admin_resto/V_pengeluaranbiayaoprasional_view', $data);
	}

	public function pengeluaranbiayaoprasional_tambah(){
		$this->load->view('modul_admin_resto/V_pengeluaranbiayaoprasional_tambah');
	}

	public function pengeluaranbiayaoprasional_tambahaksi(){
		$nama		= $this->input->post('pengeluaran');
		$nominal_pengeluaran_kebutuhan	= $this->input->post('nominal_pengeluaran_kebutuhan');
		$datainput = array(
			'nama'				=> $nama,
			'nominal_pengeluaran_kebutuhan'	=> $nominal_pengeluaran_kebutuhan
		);
		$this->m_modul_admin_resto->input_data($datainput, 'tbl_pengeluaran_kebutuhan');
		redirect('C_modul_admin_resto/pengeluaranbiayaoprasional_view');
	}

	public function pengeluaranbiayaoprasional_edit($id){
		$where = array('id_pengeluaran_kebutuhan' => $id);
		$data['pengeluaranbiayaoprasional'] = $this->m_modul_admin_resto->tampil_data('tbl_pengeluaran_kebutuhan')->result();
		$data['pengeluaranbiayaoprasional_edit'] = $this->m_modul_admin_resto->tampil_data_where('tbl_pengeluaran_kebutuhan',$where)->result();
		$this->load->view('modul_admin_resto/V_pengeluaranbiayaoprasional_edit', $data);
	}

	public function pengeluaranbiayaoprasional_updateaksi(){
		$id								= $this->input->post('id');
		$nama							= $this->input->post('pengeluaran');
		$nominal_pengeluaran_kebutuhan	= $this->input->post('nominal_pengeluaran_kebutuhan');
		$datainput = array(
			'nama'				=> $nama,
			'nominal_pengeluaran_kebutuhan'	=> $nominal_pengeluaran_kebutuhan
		);
		$where = array('id_pengeluaran_kebutuhan' => $id);
		$this->m_modul_admin_resto->update_data($where,$datainput, 'tbl_pengeluaran_kebutuhan');
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
