<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modul_bendahara_wilayah extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct(){
		parent::__construct();
		$this->load->model('m_modul_bendahara_wilayah');
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}

	}

	//----- data_peralatan
	public function data_peralatan()
	{
		$data['data_peralatan'] = $this->m_modul_bendahara_wilayah->tampil_data_peralatan()->result();
		$data['data_resto'] = $this->m_modul_bendahara_wilayah->tampil_data_resto()->result();
		$this->load->view('modul_bendahara_wilayah/peralatan',$data);
		// print_r($data);
	}
	public function edit_data_peralatan()
	{
		$id_peralatan = $this->uri->segment('3');
		$edit_data_peralatan = $this->m_modul_bendahara_wilayah->edit_data_peralatan($id_peralatan)->result();
		echo json_encode($edit_data_peralatan);
	}
	public function update_data_peralatan()
	{
		$id_peralatanedit = $this->input->post('id_peralatanedit');
		$restoedit = $this->input->post('restoedit');
		$stokedit = $this->input->post('stokedit');
		$hargaedit = $this->input->post('hargaedit');
		$peralatan = $this->input->post('peralatanedit');
		$tipe_satuanedit = $this->input->post('tipe_satuanedit');
		// echo $restoedit;

		$this->m_modul_bendahara_wilayah->update_data_peralatan($id_peralatanedit,$restoedit,$stokedit,$hargaedit,$peralatan,$tipe_satuanedit);
		redirect('modul_bendahara_wilayah/data_peralatan');
	}
	public function tambah_data_peralatan()
	{
		$resto = $this->input->post('resto');
		$peralatan = $this->input->post('peralatan');
		$stok = $this->input->post('stok');
		$harga = $this->input->post('harga');
		$tipe_satuan = $this->input->post('tipe_satuan');

		// echo $tipe_satuan;
		$this->m_modul_bendahara_wilayah->tambah_data_peralatan($resto,$peralatan,$stok,$harga,$tipe_satuan);
		redirect('modul_bendahara_wilayah/data_peralatan');
	}
	public function delete_data_peralatan()
	{
		$id_data_peralatan = $this->uri->segment('3');

		$this->m_modul_bendahara_wilayah->delete_data_peralatan($id_data_peralatan);
		redirect('modul_bendahara_wilayah/data_peralatan');
	}

	//-----------------------------












	//----- data_pengeluaran_kanwil
	public function data_pengeluaran_kanwil()
	{
		$data['data_pengeluaran_kanwil'] = $this->m_modul_bendahara_wilayah->tampil_data_pengeluaran_kanwil()->result();
		$data['data_kanwil'] = $this->m_modul_bendahara_wilayah->tampil_data_kanwil()->result();
		$data['data_operasional'] = $this->m_modul_bendahara_wilayah->tampil_data_biaya_operasional_cabang()->result();
		$this->load->view('modul_bendahara_wilayah/pengeluaran_kanwil',$data);
	}

	public function tambah_data_pengeluaran_kanwil()
	{
		$kanwil = $this->input->post('kanwil');
		$operasional = $this->input->post('operasional');
		$nominal = $this->input->post('nominal');

		$this->m_modul_bendahara_wilayah->tambah_data_pengeluaran_kanwil($kanwil,$operasional,$nominal);
		redirect('modul_bendahara_wilayah/data_pengeluaran_kanwil');
	}

	public function edit_data_pengeluaran_kanwil()
	{
		$id_pengeluaran_kanwil = $this->uri->segment('3');
		$edit_data_pengeluaran_kanwil = $this->m_modul_bendahara_wilayah->edit_data_pengeluaran_kanwil($id_pengeluaran_kanwil)->result();
		echo json_encode($edit_data_pengeluaran_kanwil);
	}

	public function update_data_pengeluaran_kanwil()
	{
		$id_pengeluaran_kanwiledit = $this->input->post('id_pengeluaran_kanwiledit');
		$kanwiledit = $this->input->post('kanwiledit');
		$operasionaledit = $this->input->post('operasionaledit');
		$nominaledit = $this->input->post('nominaledit');
		// echo $restoedit;

		$this->m_modul_bendahara_wilayah->update_data_pengeluaran_kanwil($id_pengeluaran_kanwiledit,$kanwiledit,$operasionaledit,$nominaledit);
		redirect('modul_bendahara_wilayah/data_pengeluaran_kanwil');
	}

	public function delete_data_pengeluaran_kanwil()
	{
		$id_pengeluaran_kanwil = $this->input->get('id');

		$this->m_modul_bendahara_wilayah->delete_data_pengeluaran_kanwil($id_pengeluaran_kanwil);
		redirect('modul_bendahara_wilayah/data_pengeluaran_kanwil');
	}

	//-----------------------------












	//----- data_biaya_operasional_cabang
	public function data_biaya_operasional_cabang()
	{
		$data['data_biaya_operasional_cabang'] = $this->m_modul_bendahara_wilayah->tampil_data_biaya_operasional_cabang()->result();
		$this->load->view('modul_bendahara_wilayah/biaya_operasional_cabang',$data);
	}
	public function tambah_data_biaya_operasional_cabang()
	{
		$pengeluaran = $this->input->post('pengeluaran');
		$lama_sewa = $this->input->post('lama_sewa');
		$harga_sewa = $this->input->post('harga_sewa');

		$this->m_modul_bendahara_wilayah->tambah_data_biaya_operasional_cabang($pengeluaran,$lama_sewa,$harga_sewa);
		redirect('modul_bendahara_wilayah/data_biaya_operasional_cabang');
	}
	public function edit_data_biaya_operasional_cabang()
	{
		$id_biaya_operasional_cabang = $this->uri->segment('3');
		$edit_data_biaya_operasional_cabang = $this->m_modul_bendahara_wilayah->edit_data_biaya_operasional_cabang($id_biaya_operasional_cabang)->result();
		echo json_encode($edit_data_biaya_operasional_cabang);
	}
	public function update_data_biaya_operasional_cabang()
	{
		$id_operasionaledit = $this->input->post('id_operasionaledit');
		$pengeluaranedit = $this->input->post('pengeluaranedit');
		$lama_sewaedit = $this->input->post('lama_sewaedit');
		$harga_sewaedit = $this->input->post('harga_sewaedit');
		// echo $restoedit;

		$this->m_modul_bendahara_wilayah->update_data_biaya_operasional_cabang($id_operasionaledit,$pengeluaranedit,$lama_sewaedit,$harga_sewaedit);
		redirect('modul_bendahara_wilayah/data_biaya_operasional_cabang');
	}
	public function delete_data_biaya_operasional_cabang()
	{
		$id_biaya_operasional_cabang = $this->uri->segment('3');

		$this->m_modul_bendahara_wilayah->delete_data_biaya_operasional_cabang($id_biaya_operasional_cabang);
		redirect('modul_bendahara_wilayah/data_biaya_operasional_cabang');
	}
	//-----------------------------









	//----- data_kas_masuk_cabang
	public function data_kas_masuk_cabang()
	{
		$data['data_kas_masuk_cabang'] = $this->m_modul_bendahara_wilayah->tampil_data_kas_masuk_cabang()->result();
		$this->load->view('modul_bendahara_wilayah/kas_masuk_cabang',$data);
	}
	public function tambah_data_kas_masuk_cabang()
	{
		$setoran = $this->input->post('setoran');
		$tanggal = $this->input->post('tanggal');

		$this->m_modul_bendahara_wilayah->tambah_data_kas_masuk_cabang($setoran,$tanggal);
		redirect('modul_bendahara_wilayah/data_kas_masuk_cabang');
	}
	public function edit_data_kas_masuk_cabang()
	{
		$id_kas_masuk_cabang = $this->uri->segment('3');
		$edit_data_kas_masuk_cabang = $this->m_modul_bendahara_wilayah->edit_data_kas_masuk_cabang($id_kas_masuk_cabang)->result();
		echo json_encode($edit_data_kas_masuk_cabang);
	}
	public function delete_data_kas_masuk_cabang()
	{
		$id_kas_masuk_cabang = $this->uri->segment('3');

		$this->m_modul_bendahara_wilayah->delete_data_kas_masuk_cabang($id_kas_masuk_cabang);
		redirect('modul_bendahara_wilayah/data_kas_masuk_cabang');
	}
	//-----------------------------











	//----- data_kas_keluar_cabang
	public function data_kas_keluar_cabang()
	{
		$data['data_kas_keluar_cabang'] = $this->m_modul_bendahara_wilayah->tampil_data_kas_keluar_cabang()->result();
		$data['data_resto'] = $this->m_modul_bendahara_wilayah->tampil_data_resto()->result();
		$this->load->view('modul_bendahara_wilayah/kas_keluar_cabang',$data);
	}
	public function tambah_data_kas_keluar_cabang()
	{
		$resto = $this->input->post('resto');
		$nominal = $this->input->post('nominal');
		$tanggal = $this->input->post('tanggal');

		$this->m_modul_bendahara_wilayah->tambah_data_kas_keluar_cabang($resto,$tanggal,$nominal);
		redirect('modul_bendahara_wilayah/data_kas_keluar_cabang');
	}
	public function edit_data_kas_keluar_cabang()
	{
		$id_kas_keluar_cabang = $this->uri->segment('3');
		$edit_data_kas_keluar_cabang = $this->m_modul_bendahara_wilayah->edit_data_kas_keluar_cabang($id_kas_keluar_cabang)->result();
		echo json_encode($edit_data_kas_keluar_cabang);
	}
	public function delete_data_kas_keluar_cabang()
	{
		$id_kas_keluar_cabang = $this->uri->segment('3');

		$this->m_modul_bendahara_wilayah->delete_data_kas_keluar_cabang($id_kas_keluar_cabang);
		redirect('modul_bendahara_wilayah/data_kas_keluar_cabang');
	}
	//-----------------------------










	//----- data_kas_keluar_cabang
	public function data_laporan_laba_rugi()
	{
		$data['data_laporan_laba_rugi'] = $this->m_modul_bendahara_wilayah->tampil_data_laporan_laba_rugi()->result();
		$this->load->view('modul_bendahara_wilayah/laporan_laba_rugi',$data);
	}
	//-----------------------------













	//menu anggaran biaya oprasioanl
	public function anggaranbiayaoprasional_view(){
		$data['anggaranbiayaoprasional'] = $this->m_modul_bendahara_wilayah->tampil_data_anggaranbiayaoprasional()->result();
		$this->load->view('modul_bendahara_wilayah/V_anggaranbiayaoprasional_view', $data);
	}

	public function anggaranbiayaoprasional_tambah(){
		$data['data_cabang_resto'] = $this->m_modul_bendahara_wilayah->tampil_data('resto')->result();
		$this->load->view('modul_bendahara_wilayah/V_anggaranbiayaoprasional_tambah', $data);
	}

	public function anggaranbiayaoprasional_tambahaksi(){
		$date 				= date('Y-m-d');
		$nama_cabang		= $this->input->post('nama_cabang');
		$nominal_kas_keluar				= $this->input->post('nominal_kas_keluar');
		$id_bendahara=$this->session->userdata('id');
		$datainput = array(
			'id_bendahara'			=> $id_bendahara,
			'id_resto'				=> $nama_cabang,
			'tanggal'				=> $date,
			'nominal_kas_keluar'	=> $nominal_kas_keluar,
			'status'				=> "pengajuan"
		);
		$this->m_modul_bendahara_wilayah->input_data($datainput, 'pemberian_kaskeluar');
		redirect('modul_bendahara_wilayah/anggaranbiayaoprasional_view');
	}

	public function anggaranbiayaoprasional_edit($id){
		$data['data_cabang_resto'] = $this->m_modul_bendahara_wilayah->tampil_data('resto')->result();
		$data['anggaranbiayaoprasional_edit'] = $this->m_modul_bendahara_wilayah->tampil_anggaran_biaya_oprasional_where($id)->result();
		$this->load->view('modul_bendahara_wilayah/V_anggaranbiayaoprasional_edit', $data);
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
		$this->m_modul_bendahara_wilayah->update_data($where, $datainput, 'pemberian_kaskeluar');
		redirect('modul_bendahara_wilayah/anggaranbiayaoprasional_view');
	}

	public function anggaranbiayaoprasional_hapus($id)
	{
		$where = array('id_pengeluaran' => $id);
		$this->m_modul_bendahara_wilayah->hapus_data($where, 'pemberian_kaskeluar');
		redirect('modul_bendahara_wilayah/anggaranbiayaoprasional_view');
	}


}
