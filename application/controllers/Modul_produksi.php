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
		$id_user_resto_produksi = $this->session->userdata('id');
		$data_produksi = $this->m_modul_produksi->tampil_data_permintaan_bahan($id_user_resto_produksi)->result();
		echo json_encode($data_produksi);
	}
	public function tambah_data_permintaan_bahan()
	{
		$id_user_resto_produksi = $this->session->userdata('id');

		$ambil_id_kanwil = $this->db->query("SELECT user_resto.*
			FROM user_resto
			WHERE user_resto.id = '$id_user_resto_produksi' ");

		foreach ($ambil_id_kanwil->result() as $data) {
			 $id_kanwil = $data->id_kanwil;
		}

		$ambil_id_user_kanwil_logistik = $this->db->query("SELECT user_kanwil.*
			FROM user_kanwil
			WHERE user_kanwil.id_kanwil = '$id_kanwil'
			AND user_kanwil.tipe = 'logistik' ");

		foreach ($ambil_id_user_kanwil_logistik->result() as $data) {
			 $id_user_kanwil_logistik = $data->id;
		}
		// echo $id_user_kanwil;

		$nama_permintaan = $this->input->post('nama_permintaan');
		$this->m_modul_produksi->tambah_data_permintaan_bahan($nama_permintaan,$id_user_resto_produksi,$id_user_kanwil_logistik);
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


			// echo $stok_bahan_mentah;

		$ambil_id_bahan_mentah_sesuai = $this->db->query("SELECT permintaan_bahan_detail.*
			FROM permintaan_bahan_detail
			WHERE permintaan_bahan_detail.id_permintaan = '$id_permintaan'
			and permintaan_bahan_detail.status_penerimaan = 'sesuai' ");

		foreach ($ambil_id_bahan_mentah_sesuai->result() as $ambil_id_bahan_mentah_sesuai) {
			 // $stok_bahan_mentah_sesuai = $ambil_id_bahan_mentah_dari_table_permintaan_bahan_detail->jumlah_permintaan;
			 $id_bahan_mentah_sesuai = $ambil_id_bahan_mentah_sesuai->id_bahan_mentah;
			 // echo $stok_bahan_mentah_sesuai.' ';

							$ambil_stok_bahan_mentah = $this->db->query("SELECT bahan_mentah.*
					 			FROM bahan_mentah
					 			WHERE bahan_mentah.id = '$id_bahan_mentah_sesuai' ");

					 		foreach ($ambil_stok_bahan_mentah->result() as $ambil_stok_bahan_mentah) {
					 			 $stok_bahan_mentah = $ambil_stok_bahan_mentah->stok;
					 			 // echo $stok_bahan_mentah;
					 		}

							$ambil_stok_bahan_mentah_sesuai = $this->db->query("SELECT permintaan_bahan_detail.*
								FROM permintaan_bahan_detail
								WHERE permintaan_bahan_detail.id_bahan_mentah = '$id_bahan_mentah_sesuai'
								and permintaan_bahan_detail.status_penerimaan = 'sesuai' ");

							foreach ($ambil_stok_bahan_mentah_sesuai->result() as $ambil_stok_bahan_mentah_sesuai) {
									$stok_bahan_mentah_sesuai = $ambil_stok_bahan_mentah_sesuai->jumlah_permintaan;
							}

							$update_stok_bahan_mentah = $this->db->query("UPDATE bahan_mentah
						 	SET bahan_mentah.stok = $stok_bahan_mentah+$stok_bahan_mentah_sesuai
							WHERE bahan_mentah.id = $id_bahan_mentah_sesuai; ");

		}
			// echo $stok_bahan_mentah_sesuai;

		$ambil_id_bahan_mentah_tidak_sesuai = $this->db->query("SELECT * FROM `permintaan_bahan_detail`
		JOIN `permintaan_bahan_tidak_sesuai` ON `permintaan_bahan_tidak_sesuai`.`id_detail_permintaan` = `permintaan_bahan_detail`.`id_detail_permintaan`
		WHERE permintaan_bahan_detail.`id_permintaan` = $id_permintaan
		AND permintaan_bahan_detail.`status_penerimaan` = 'tidak sesuai' ");

		foreach ($ambil_id_bahan_mentah_tidak_sesuai->result() as $ambil_id_bahan_mentah_tidak_sesuai) {
			 $id_bahan_mentah_tidak_sesuai = $ambil_id_bahan_mentah_tidak_sesuai->id_bahan_mentah;
			 // echo $stok_bahan_mentah_tidak_sesuai.' ';


			 $ambil_stok_bahan_mentah2 = $this->db->query("SELECT bahan_mentah.*
				 FROM bahan_mentah
				 WHERE bahan_mentah.id = '$id_bahan_mentah_tidak_sesuai' ");

			 foreach ($ambil_stok_bahan_mentah2->result() as $ambil_stok_bahan_mentah2) {
					$stok_bahan_mentah2 = $ambil_stok_bahan_mentah2->stok;
					// echo $stok_bahan_mentah;
			 }

			 $ambil_stok_bahan_mentah_tidak_sesuai = $this->db->query("SELECT * FROM `permintaan_bahan_detail`
		 		JOIN `permintaan_bahan_tidak_sesuai` ON `permintaan_bahan_tidak_sesuai`.`id_detail_permintaan` = `permintaan_bahan_detail`.`id_detail_permintaan`
		 		WHERE permintaan_bahan_detail.id_bahan_mentah = '$id_bahan_mentah_tidak_sesuai'
		 		AND permintaan_bahan_detail.`status_penerimaan` = 'tidak sesuai' ");

			 foreach ($ambil_stok_bahan_mentah_tidak_sesuai->result() as $ambil_stok_bahan_mentah_tidak_sesuai) {
					 $bahan_mentah_tidak_sesuai = $ambil_stok_bahan_mentah_tidak_sesuai->jumlah_bahan_terkirim;
			 }

			 $update_stok_bahan_mentah = $this->db->query("UPDATE bahan_mentah
			 SET bahan_mentah.stok = $stok_bahan_mentah+$bahan_mentah_tidak_sesuai
			 WHERE bahan_mentah.id = $id_bahan_mentah_tidak_sesuai; ");


		}

		// echo $stok_bahan_mentah.' '.$stok_bahan_mentah_sesuai.' '.$stok_bahan_mentah_tidak_sesuai;

		// $update_stok_bahan_mentah = $this->db->query("UPDATE bahan_mentah
		// 	SET bahan_mentah.stok = $stok_bahan_mentah+$stok_bahan_mentah_sesuai+$stok_bahan_mentah_tidak_sesuai
		// 	WHERE bahan_mentah.id = $id_bahan_mentah; ");

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

		$id_user_resto_produksi = $this->session->userdata('id');
		$ambil_id_resto = $this->db->query("SELECT user_resto.*
			FROM user_resto
			WHERE user_resto.id = '$id_user_resto_produksi' ");

		foreach ($ambil_id_resto->result() as $data2) {
			 $id_resto = $data2->id_resto;
		}

		// echo $id_permintaan;
		$data['tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi'] = $this->m_modul_produksi->tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi($id_permintaan)->result();
		$data['tampil_data_permintaan_bahan_detail_tidak_sesuai'] = $this->m_modul_produksi->tampil_data_permintaan_bahan_detail_tidak_sesuai($id_permintaan)->result();
		$data['data_bahan_mentah'] = $this->m_modul_produksi->tampil_data_bahan_mentah($id_permintaan,$id_resto)->result();
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

		// echo $selisih;

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
	public function update_status_siap_saji_data_pemesanan_menu()
	{
		$id_menu = $this->uri->segment('3');
		$id_resto = $this->session->userdata('id_resto');




		$ambil_menu_stok = $this->db->query("SELECT menu.*
			FROM menu
			WHERE menu.id = '$id_menu'
			AND menu.id_resto = '$id_resto' ");

		foreach ($ambil_menu_stok->result() as $data) {
			 $menu_stok = $data->stok;
		}

		$ambil_jumlah_pesan_menu = $this->db->query("SELECT * , SUM(`pemesanan_menu`.`jumlah_pesan`) AS jumlahPesan
		FROM `pemesanan_menu`
		JOIN menu ON `menu`.`id` = `pemesanan_menu`.`id_menu`
		WHERE menu.`id_resto` = '$id_resto'
		AND pemesanan_menu.id_menu = '$id_menu'
		GROUP BY `pemesanan_menu`.`id_menu` ");

		foreach ($ambil_jumlah_pesan_menu->result() as $data) {
			 echo $jumlah_pesanan = $data->jumlahPesan;
		}

		// echo $jumlah_pesanan.' '.$menu_stok;


		$update_status_pemesanan_menu = $this->db->query("UPDATE menu
		SET menu.stok = $menu_stok-$jumlah_pesanan
		WHERE menu.`id_resto` = '$id_resto'
		AND menu.id = '$id_menu' ");



		$update_status_pemesanan_menu = $this->db->query("UPDATE pemesanan_menu
		SET pemesanan_menu.status = 'siap saji'
		WHERE pemesanan_menu.id_menu = $id_menu; ");

		redirect('modul_produksi/index_produksi_pesanan');

		echo $id_resto.'ini datanya';
	}
	public function data_pemesanan_paket()
	{
		$data_pemesanan_paket = $this->m_modul_produksi->tampil_data_pemesanan_paket()->result();
		echo json_encode($data_pemesanan_paket);
	}
	public function update_status_siap_saji_data_pemesanan_paket()
	{
		$id_paket = $this->uri->segment('3');
		$id_resto = $this->session->userdata('id_resto');




		$ambil_paket_stok = $this->db->query("SELECT paket.*
			FROM paket
			WHERE paket.id = '$id_paket'
			AND paket.id_resto = '$id_resto' ");

		foreach ($ambil_paket_stok->result() as $data) {
			 $paket_stok = $data->jumlah;
		}

		$ambil_jumlah_pesan_paket = $this->db->query("SELECT * , SUM(`pemesanan_paket`.`jumlah_pesan`) AS jumlahPesan
		FROM `pemesanan_paket`
		JOIN paket ON `paket`.`id` = `pemesanan_paket`.`id_paket`
		WHERE paket.`id_resto` = '$id_resto'
		AND pemesanan_paket.id_paket = '$id_paket'
		GROUP BY `pemesanan_paket`.`id_paket` ");

		foreach ($ambil_jumlah_pesan_paket->result() as $data) {
			 echo $jumlah_pesanan = $data->jumlahPesan;
		}

		// echo $jumlah_pesanan.' '.$menu_stok;


		$this->db->query("UPDATE paket
		SET paket.jumlah = $paket_stok-$jumlah_pesanan
		WHERE paket.`id_resto` = '$id_resto'
		AND paket.id = '$id_paket' ");



		$this->db->query("UPDATE pemesanan_paket
		SET pemesanan_paket.status = 'siap saji'
		WHERE pemesanan_paket.id_paket = $id_paket; ");

		redirect('modul_produksi/index_produksi_pesanan');

		echo $id_resto.'ini datanya';
	}

	//----------------------


	//--------------------------------------










	public function produksi_masakan()
	{
		$sql = "SELECT * FROM produksi_masakan join menu on menu.id=produksi_masakan.id_menu";
		$data['data']=$this->db->query($sql)->result();
		$this->load->view('modul_produksi/produksi_masakan',$data);
	}
	public function get_stok_bahan_mentah(){
		
	}




}
