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
		$sql = "SELECT * FROM pemesanan_menu join pemesanan on pemesanan.id=pemesanan_menu.id_pemesanan";
		$data['data']=$this->db->query($sql)->result();
		$this->load->view('modul_produksi/menu_produksi_pesanan/produksi_pesanan', $data);
	}
	public function data_pemesanan_menu()
	{

		$id_pemesan=$this->input->get('id_pemesan');

		$sql = "SELECT * FROM pemesanan_menu join menu on menu.id=pemesanan_menu.id_menu where id_pemesanan='$id_pemesan'";
		$data_pemesanan_menu=$this->db->query($sql)->result();
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

		$id_pemesan=$this->input->get('id_pemesan');
		$sql = "SELECT * FROM pemesanan_paket join paket on paket.id=pemesanan_paket.id_paket where id_pemesanan='$id_pemesan'";
		$data_pemesanan_paket=$this->db->query($sql)->result();
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
		$this->session->set_userdata("");
		$sql = "SELECT * FROM produksi_masakan join menu on menu.id=produksi_masakan.id_menu";
		$data['data']=$this->db->query($sql)->result();
		$this->load->view('modul_produksi/produksi_masakan',$data);
	}
	public function aksi_tambah_bahan_mentah_produksi(){

			$id_produksi_masakan = $this->input->post('id_produksi_masakan');
			$id_bahan_mentah = $this->input->post('id_bahan_mentah');
			$jumlah = $this->input->post('jumlah_bahan');
			$menu = $this->input->post('menu');

			$data = array(
				'id_produksi_masakan' => $id_produksi_masakan,
				'id_bahan_mentah' => $id_bahan_mentah,
				'jumlah' => $jumlah
				);
			$sql = "SELECT stok FROM stok_bahan_mentah_produksi where id_bahan_mentah='$id_bahan_mentah'";
			$stok_bahan_mentah=$this->db->query($sql)->row();
			$cek_stok=$this->db->query($sql)->num_rows();
			if($cek_stok==0){
					$data_session = array(
						'pesan' => 'stok bahan mentah kosong',
					);
					$this->session->set_userdata($data_session);
			}else{
			$hasil_akhir_stok_bahan_mentah=(int)$stok_bahan_mentah->stok-(int)$jumlah;

			$this->m_modul_produksi->input_data($data,'bahan_mentah_masakan');

			$data4 = array(
				'stok' => $hasil_akhir_stok_bahan_mentah,
			);

			$where4 = array(
				'id_bahan_mentah' => $id_bahan_mentah
			);

			$this->m_modul_produksi->update_data($where4,$data4,'stok_bahan_mentah_produksi');

			$data_session = array(
				'pesan' => 'berhasil manmbah data',
			);

			$this->session->set_userdata($data_session);
			}
			redirect('modul_produksi/produksi_masakan/?id='.$id_produksi_masakan.'&&menu='.$menu,$data);

	}

		function aksi_tambah_produksi(){
			$id_menu = $this->input->post('nama_menu');
			$jumlah_produksi = $this->input->post('jumlah_produksi');

			$tanggal=date('Y-m-d');
			$data = array(
				'id_menu' => $id_menu,
				'jumlah_masakan' => $jumlah_produksi,
				'tanggal' => $tanggal,
				);
			$this->m_modul_produksi->input_data($data,'produksi_masakan');

			$sql = "SELECT stok FROM menu where id='$id_menu'";
			$stok_menu=$this->db->query($sql)->row();
			$cek_stok=$this->db->query($sql)->num_rows();


				$hasil_akhir_stok_menu=(int)$stok_menu->stok+(int)$jumlah_produksi;


				$data4 = array(
					'stok' => $hasil_akhir_stok_menu,
				);

				$where4 = array(
					'id' => $id_menu
				);

				$this->m_modul_produksi->update_data($where4,$data4,'menu');


			redirect('modul_produksi/produksi_masakan/');
		}

		public function aksi_tambah_bahan_olahan_produksi(){

				$id_produksi_masakan = $this->input->post('id_produksi_masakan');
				$id_bahan_olahan = $this->input->post('id_bahan_olahan');
				$jumlah = $this->input->post('jumlah_bahan');
				$menu = $this->input->post('menu');

				$data = array(
					'id_produksi_masakan' => $id_produksi_masakan,
					'id_bahan_olahan' => $id_bahan_olahan,
					'jumlah' => $jumlah
					);
				$sql = "SELECT stok FROM stok_bahan_olahan_produksi where id_bahan_olahan='$id_bahan_olahan'";
				$stok_bahan_olahan=$this->db->query($sql)->row();
				$cek_stok=$this->db->query($sql)->num_rows();

				if($cek_stok==0){
						$data_session = array(
							'pesan' => 'stok bahan olahan kosong',
						);

						$this->session->set_userdata($data_session);
				}else{
				$hasil_akhir_stok_bahan_olahan=(int)$stok_bahan_olahan->stok-(int)$jumlah;

				$this->m_modul_produksi->input_data($data,'bahan_olahan_masakan');

				$data4 = array(
					'stok' => $hasil_akhir_stok_bahan_olahan,
				);

				$where4 = array(
					'id_bahan_olahan' => $id_bahan_olahan
				);

				$this->m_modul_produksi->update_data($where4,$data4,'stok_bahan_olahan_produksi');
				$data_session = array(
					'pesan' => 'berhasil manmbah data',
				);

				$this->session->set_userdata($data_session);
			 }
				redirect('modul_produksi/produksi_masakan/?id='.$id_produksi_masakan.'&&menu='.$menu,$data);

		}
		public function set_produksi_pesanan(){

				$id = $this->input->post('id');
				$jumlah = $this->input->post('jumlah');

				$sql = "SELECT stok FROM menu where id='$id'";
				$stok_menu=$this->db->query($sql)->row();
				$hasil_stok_menu=$stok_menu->stok;

				if($jumlah>$hasil_stok_menu){
					$data_session = array(
						'pesan' => 'stok menu kurang dari pesanan silahkan produksi masakan terlebih dahulu',
					);
					$this->session->set_userdata($data_session);
				}else{

				$stok_akhir_jumlah_pesan=$hasil_stok_menu-$jumlah;

				$data4 = array(
					'stok' => $stok_akhir_jumlah_pesan,
				);

				$where4 = array(
					'id' => $id
				);

				$this->m_modul_produksi->update_data($where4,$data4,'menu');
				$data_session = array(
					'pesan' => 'berhasil manmbah data',
				);

				$this->session->set_userdata($data_session);
				}
				redirect('modul_produksi/index_produksi_pesanan/');

		}
		public function set_produksi_pesanan_paket(){

				$id = $this->input->post('id_paket');
				$jumlah = $this->input->post('jumlah');

				$sql = "SELECT jumlah FROM paket where id='$id'";
				$stok_paket=$this->db->query($sql)->row();
				$hasil_stok_paket=$stok_paket->jumlah;

				if($jumlah>$hasil_stok_paket){
					$data_session = array(
						'pesan' => 'stok paket kurang dari pesanan silahkan masukan stok paket',
					);
					$this->session->set_userdata($data_session);
				}else{

				$stok_akhir_jumlah_pesan=$hasil_stok_paket-$jumlah;

				$data4 = array(
					'jumlah' => $stok_akhir_jumlah_pesan,
				);

				$where4 = array(
					'id' => $id
				);

				$this->m_modul_produksi->update_data($where4,$data4,'paket');
				$data_session = array(
					'pesan' => 'berhasil manmbah data',
				);

				$this->session->set_userdata($data_session);
				}
				redirect('modul_produksi/index_produksi_pesanan/');

		}

		function hapus_produksi_masakan_bahan_olahan(){
			$id_bahan_olahan_masakan = $this->input->get('id');
			$id_bahan_olahan = $this->input->get('id_bahan_olahan');
			$id_produksi_masakan = $this->input->get('id_produksi_masakan');
			$menu = $this->input->get('menu');
			$jumlah = $this->input->get('jumlah');

			$where = array('id' => $id_produksi_masakan);

			$this->m_modul_produksi->hapus_data($where,'bahan_olahan_masakan');


			$sql = "SELECT stok FROM stok_bahan_olahan_produksi where id_bahan_olahan='$id_bahan_olahan'";
			$jumlah_bahan_olahan_masakan=$this->db->query($sql)->row();

			$stok_bahan_olahan_produksi=$jumlah_bahan_olahan_masakan->stok+$jumlah;

			$data4 = array(
				'stok' => $stok_bahan_olahan_produksi,
			);

			$where4 = array(
				'id_bahan_olahan' => $id_bahan_olahan
			);

			$this->m_modul_produksi->update_data($where4,$data4,'stok_bahan_olahan_produksi');
			$data_session = array(
				'pesan' => 'berhasil hapus data',
			);

			$this->session->set_userdata($data_session);
			redirect('modul_produksi/produksi_masakan/?id='.$id_produksi_masakan.'&&menu='.$menu);
		}
		function hapus_produksi_masakan_bahan_mentah(){
		  $id_bahan_mentah_masakan = $this->input->get('id');
		  $id_bahan_mentah = $this->input->get('id_bahan_mentah');
		  $id_produksi_masakan = $this->input->get('id_produksi_masakan');
		  $menu = $this->input->get('menu');
		  $jumlah = $this->input->get('jumlah');

		  $where = array('id' => $id_produksi_masakan);

		  $this->m_modul_produksi->hapus_data($where,'bahan_mentah_masakan');


		  $sql = "SELECT stok FROM stok_bahan_mentah_produksi where id_bahan_mentah='$id_bahan_mentah'";
		  $jumlah_bahan_mentah_masakan=$this->db->query($sql)->row();

		  $stok_bahan_mentah_produksi=$jumlah_bahan_mentah_masakan->stok+$jumlah;

		  $data4 = array(
		    'stok' => $stok_bahan_mentah_produksi,
		  );

		  $where4 = array(
		    'id_bahan_mentah' => $id_bahan_mentah
		  );

		  $this->m_modul_produksi->update_data($where4,$data4,'stok_bahan_mentah_produksi');
		  $data_session = array(
		    'pesan' => 'berhasil hapus data',
		  );

		  $this->session->set_userdata($data_session);
		  redirect('modul_produksi/produksi_masakan/?id='.$id_produksi_masakan.'&&menu='.$menu);
		}

		function konfirm_siap_saji(){
		  $id_pemesanan = $this->input->get('id_pemesanan');


		  $where = array('id' => $id_pemesanan);



		  $data = array(
		    'status' => 'siapsaji',
		  );



		  $this->m_modul_produksi->update_data($where,$data,'pemesanan');
		  $data_session = array(
		    'pesan' => 'berhasil hapus data',
		  );

		  $this->session->set_userdata($data_session);
		  redirect('modul_produksi/index_produksi_pesanan');
		}

		//permintaan bahan mentah baru
		public function permintaan_bahan_mentah()
		{
			$sql = "SELECT resto.nama_resto,permintaan_bahan_mentah.id,permintaan_bahan_mentah.nama_permintaan,permintaan_bahan_mentah.tanggal,permintaan_bahan_mentah.status FROM permintaan_bahan_mentah join user_resto on user_resto.id=permintaan_bahan_mentah.id_user_produksi join resto on resto.id=user_resto.id_resto";
		  $data['data']=$this->db->query($sql)->result();
			$sql2 = "SELECT resto.nama_resto,permintaan_bahan_olahan.id,permintaan_bahan_olahan.nama_permintaan,permintaan_bahan_olahan.tanggal,permintaan_bahan_olahan.status FROM permintaan_bahan_olahan join user_resto on user_resto.id=permintaan_bahan_olahan.id_user_produksi join resto on resto.id=user_resto.id_resto";
		  $data['data2']=$this->db->query($sql2)->result();
			$this->load->view('modul_produksi/permintaan_bahan',$data);
		}

		public function lihat_bahan_mentah()
		{
			$data_session = array(
				'pesan' => '',
			);

			$this->session->set_userdata($data_session);
			$id_permintaan= $this->input->get('id_permintaan');
			$sql = "SELECT * FROM pengiriman_bahan_mentah join bahan_mentah on bahan_mentah.id=pengiriman_bahan_mentah.id_bahan_mentah where id_permintaan='$id_permintaan'";
		  $data['data2']=$this->db->query($sql)->result();

			$this->load->view('modul_produksi/lihat_bahan_mentah',$data);
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

			$this->load->view('modul_produksi/lihat_bahan_olahan',$data);
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
			redirect('modul_produksi/permintaan_bahan_mentah');

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
			redirect('modul_produksi/permintaan_bahan_mentah');

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
			redirect('modul_produksi/permintaan_bahan_mentah');
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

			redirect('modul_produksi/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
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
			redirect('modul_produksi/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
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
			redirect('modul_produksi/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
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
			redirect('modul_produksi/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
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

		  redirect('modul_produksi/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
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
		  redirect('modul_produksi/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
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
		  redirect('modul_produksi/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
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
		  redirect('modul_produksi/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
		}
}
