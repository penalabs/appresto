<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modul_produksi extends CI_Controller {

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
		$this->load->model('m_modul_produksi');
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}

	}
	//---------------------- menu permintaan bahan


	//----- permintaan_bahan

	public function index_permintaan_bahan()
	{
		$this->load->view('modul_produksi/menu_permintaan_bahan/permintaan_bahan');
	}
	public function data_permintaan_bahan()
	{
		$data_produksi = $this->m_modul_produksi->tampil_data_permintaan_bahan()->result();
		echo json_encode($data_produksi);
	}
	public function tambah_data_permintaan_bahan()
	{
		$nama_permintaan = $this->input->post('nama_permintaan');
		$this->m_modul_produksi->tambah_data_permintaan_bahan($nama_permintaan);
		redirect('modul_produksi/index_permintaan_bahan');
	}
	public function edit_data_permintaan_bahan()
	{
		$id_permintaan = $this->uri->segment('3');
		$edit_data_permintaan_bahan = $this->m_modul_produksi->edit_data_permintaan_bahan($id_permintaan)->result();
		echo json_encode($edit_data_permintaan_bahan);
	}
	public function update_data_permintaan_bahan()
	{
		$id_permintaan_edit = $this->input->post('id_permintaan_edit');
		$nama_permintaan_edit = $this->input->post('nama_permintaan_edit');
		// $id_permintaan = $this->uri->segment('3');
		// $nama_permintaan = $this->input->post('nama_permintaan');
		// echo $nama_permintaan;
		$this->m_modul_produksi->update_data_permintaan_bahan($id_permintaan_edit,$nama_permintaan_edit);
		redirect('modul_produksi/index_permintaan_bahan');
	}
	public function delete_data_permintaan_bahan()
	{
		$id_permintaan = $this->uri->segment('3');
		$this->m_modul_produksi->delete_data_permintaan_bahan($id_permintaan);
		redirect('modul_produksi/index_permintaan_bahan');
	}
	public function update_proses_permintaan()
	{
		$id_permintaan = $this->uri->segment('3');
		// $nama_permintaan = $this->input->post('nama_permintaan');
		// echo $nama_permintaan;
		$this->m_modul_produksi->update_proses_permintaan($id_permintaan);
		redirect('modul_produksi/index_permintaan_bahan');
	}
	public function update_diterima()
	{
		$id_permintaan = $this->uri->segment('3');
		// $nama_permintaan = $this->input->post('nama_permintaan');
		// echo $nama_permintaan;
		$this->m_modul_produksi->update_diterima($id_permintaan);
		redirect('modul_produksi/index_permintaan_bahan');
	}

	//----------------------

	//----- permintaan_bahan_detail

	public function data_permintaan_bahan_detail()
	{
		$id_permintaan = $this->uri->segment('3');
		$query = $this->db->query("SELECT permintaan_bahan.*
			FROM permintaan_bahan
			WHERE permintaan_bahan.id_permintaan = '$id_permintaan' ");

		foreach ($query->result() as $data_permintaan_bahan_detail) {
			 $status = $data_permintaan_bahan_detail->status;
			 $nama_permintaan = $data_permintaan_bahan_detail->nama_permintaan;
		}

		// echo $id_permintaan;
		$data['tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi'] = $this->m_modul_produksi->tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi($id_permintaan)->result();
		$data['tampil_data_permintaan_bahan_detail_tidak_sesuai'] = $this->m_modul_produksi->tampil_data_permintaan_bahan_detail_tidak_sesuai($id_permintaan)->result();
		$data['data_bahan_mentah'] = $this->m_modul_produksi->tampil_data_bahan_mentah($id_permintaan)->result();
		$data['status'] = $status;
		$data['id_permintaan'] = $id_permintaan;
		$data['nama_permintaan'] = $nama_permintaan;
		// echo $status;
		$this->load->view('modul_produksi/menu_permintaan_bahan/permintaan_bahan_detail',$data);
	}
	public function tambah_data_permintaan_bahan_detail()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		$bahan_mentah = $this->input->post('bahan_mentah');
		$jumlah_permintaan = $this->input->post('jumlah_permintaan');
		$satuan_besar = $this->input->post('satuan_besar');

		$this->m_modul_produksi->tambah_data_permintaan_bahan_detail($id_permintaan,$bahan_mentah,$jumlah_permintaan,$satuan_besar);
		redirect('modul_produksi/data_permintaan_bahan_detail/'.$id_permintaan);
	}
	public function update_sesuai_data_permintaan_bahan_detail()
	{
		$id_detail_permintaan = $this->uri->segment('3');
		$ambil_id_permintaan = $this->db->query("SELECT permintaan_bahan_detail.*
			FROM permintaan_bahan_detail
			WHERE permintaan_bahan_detail.id_detail_permintaan = '$id_detail_permintaan' ");

		foreach ($ambil_id_permintaan->result() as $data) {
			 $id_permintaan = $data->id_permintaan;
		}

		$delete_bahan_tidak_sesuai = $this->db->query("DELETE FROM permintaan_bahan_tidak_sesuai
			WHERE permintaan_bahan_tidak_sesuai.id_detail_permintaan = '$id_detail_permintaan' ");

		// $nama_permintaan = $this->input->post('nama_permintaan');
		// echo $nama_permintaan;
		$this->m_modul_produksi->update_sesuai_data_permintaan_bahan_detail($id_detail_permintaan);
		redirect('modul_produksi/data_permintaan_bahan_detail/'.$id_permintaan);
	}
	public function update_tidak_sesuai_data_permintaan_bahan_detail()
	{
		// $id_detail_permintaan = $this->uri->segment('3');
		$id_detail_permintaan = $this->input->post('id_detail_permintaan_AmbilBahanTidakSesuai');
		$jumlah_bahan_terkirim = $this->input->post('jumlah_bahan_terkirim_AmbilBahanTidakSesuai');
		$jumlah_permintaan = $this->input->post('jumlah_permintaan_AmbilBahanTidakSesuai');
		$selisih_bahan = abs($jumlah_bahan_terkirim - $jumlah_permintaan);


		echo $selisih;

		$ambil_id_permintaan = $this->db->query("SELECT permintaan_bahan_detail.*
			FROM permintaan_bahan_detail
			WHERE permintaan_bahan_detail.id_detail_permintaan = '$id_detail_permintaan' ");

		foreach ($ambil_id_permintaan->result() as $data) {
			 $id_permintaan = $data->id_permintaan;
		}

		$this->m_modul_produksi->update_tidak_sesuai_data_permintaan_bahan_detail($id_detail_permintaan);
		$this->m_modul_produksi->tambah_data_permintaan_bahan_tidak_sesuai($id_detail_permintaan,$jumlah_bahan_terkirim,$selisih_bahan);
		redirect('modul_produksi/data_permintaan_bahan_detail/'.$id_permintaan);
	}


	//---------------------------
	//--------------------------------------







	//---------------------- menu produksi pesanan

	//----- produksi_pesnanan

	public function index_produksi_pesanan()
	{
		$this->load->view('modul_produksi/menu_produksi_pesanan/produksi_pesanan');
	}
	public function data_pemesanan_menu()
	{
		$data_pemesanan_menu = $this->m_modul_produksi->tampil_data_pemesanan_menu()->result();
		echo json_encode($data_pemesanan_menu);
	}
	public function data_pemesanan_paket()
	{
		$data_pemesanan_paket = $this->m_modul_produksi->tampil_data_pemesanan_paket()->result();
		echo json_encode($data_pemesanan_paket);
	}

	//----------------------


	//--------------------------------------
















}
