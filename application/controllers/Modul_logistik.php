<<<<<<< HEAD
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modul_logistik extends CI_Controller {

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
		$this->load->model('m_modul_logistik');
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}

	}

	//---------------------- menu pengadaan bahan mentah

	//----- Pengadaan_bahan_mentah
	public function index_pengadaan_bahan_mentah()
	{
		$this->load->view('modul_logistik/menu_bahan_mentah/pengadaan_bahan_mentah');
	}
	public function data_pengadaan_bahan_mentah()
	{
		$data_pengadaan_bahan_mentah = $this->m_modul_logistik->tampil_data_permintaan_bahan()->result();
		echo json_encode($data_pengadaan_bahan_mentah);
	}
	public function tambah_data_pengadaan_bahan_mentah()
	{
		$nama_permintaan = $this->input->post('nama_permintaan');
		// echo $nama_permintaan;
		$this->m_modul_logistik->tambah_data_permintaan_bahan($nama_permintaan);
		redirect('modul_logistik/index_pengadaan_bahan_mentah');
	}
	public function update_proses_pengiriman()
	{
		$id_permintaan = $this->uri->segment('3');
		// $nama_permintaan = $this->input->post('nama_permintaan');
		// echo $nama_permintaan;
		$this->m_modul_logistik->update_proses_pengiriman($id_permintaan);
		redirect('modul_logistik/index_pengadaan_bahan_mentah');
	}

	//---------------------------------



	//----- Pengadaan_bahan_mentah_detail

	public function data_pengadaan_bahan_mentah_detail()
	{
		$id_permintaan = $this->uri->segment('3');
		$query_ambil_status = $this->db->query("SELECT permintaan_bahan.*
			FROM permintaan_bahan
			WHERE permintaan_bahan.id_permintaan = '$id_permintaan' ");

		foreach ($query_ambil_status->result() as $data_permintaan_bahan_detail) {
			 $status = $data_permintaan_bahan_detail->status;
			 $nama_permintaan = $data_permintaan_bahan_detail->nama_permintaan;
		}
		// echo $id_permintaan;
		$data['tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi'] = $this->m_modul_logistik->tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi($id_permintaan)->result();
		$data['tampil_data_permintaan_bahan_detail_tidak_sesuai'] = $this->m_modul_logistik->tampil_data_permintaan_bahan_detail_tidak_sesuai($id_permintaan)->result();
		$data['data_bahan_mentah'] = $this->m_modul_logistik->tampil_data_bahan_mentah()->result();
		$data['id_permintaan'] = $id_permintaan;
		$data['status'] = $status;
		$data['nama_permintaan'] = $nama_permintaan;
		$this->load->view('modul_logistik/menu_bahan_mentah/pengadaan_bahan_mentah_detail',$data);
	}
	public function tambah_data_pengadaan_bahan_mentah_detail()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		$bahan_mentah = $this->input->post('bahan_mentah');
		$jumlah_permintaan = $this->input->post('jumlah_permintaan');
		$satuan_besar = $this->input->post('satuan_besar');


		$this->m_modul_logistik->tambah_data_permintaan_bahan_detail($id_permintaan,$bahan_mentah,$jumlah_permintaan,$satuan_besar);
		redirect('modul_logistik/data_pengadaan_bahan_mentah_detail/'.$id_permintaan);
	}
	public function edit_pengadaan_bahan_mentah_detail()
	{
		$id_permintaan_detail = $this->uri->segment('3');
		$edit_data_permintaan_bahan_detail = $this->m_modul_logistik->edit_data_permintaan_bahan_detail($id_permintaan_detail)->result();
		// $this->load->view('modul_logistik/pengadaan_bahan_mentah_detail',$data,$id_permintaan);
		echo json_encode($edit_data_permintaan_bahan_detail);
	}
	public function update_pengadaan_bahan_mentah_detail()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		$id_permintaan_detail_edit = $this->input->post('id_permintaan_detail_edit');
		$jumlah_permintaan_edit = $this->input->post('jumlah_permintaan_edit');
		$harga_satuan_edit = $this->input->post('harga_satuan_edit');
		$this->m_modul_logistik->update_data_permintaan_bahan_detail($id_permintaan_detail_edit,$jumlah_permintaan_edit,$harga_satuan_edit);
		// $this->load->view('modul_logistik/pengadaan_bahan_mentah_detail',$data,$id_permintaan);
		redirect('modul_logistik/data_pengadaan_bahan_mentah_detail/'.$id_permintaan);
	}

	//---------------------------

	//-------------------------------------

	public function produksi_bahan_olahan(){

		$this->load->view('modul_logistik/produksi_bahan/produksi_bahan_olahan');
	}
	public function rubah_status(){
		$id = $this->input->get('id');
		$status = $this->input->get('status');

		if($status==1){
			$status=0;
		}elseif($status==0){
			$status=1;
		}
		$data = array(
			'status' => $status,
		);

		$where = array(
			'id' => $id
		);

		$this->m_modul_logistik->update_data($where,$data,'bahan_mentah');
		redirect('modul_logistik/produksi_bahan_olahan');
	}
	public function rubah_status_bahan_olahan(){
		$id = $this->input->get('id');
		$status = $this->input->get('status');

		if($status==1){
			$status=0;
		}elseif($status==0){
			$status=1;
		}
		$data = array(
			'status' => $status,
		);

		$where = array(
			'id' => $id
		);

		$this->m_modul_logistik->update_data($where,$data,'bahan_olahan');
		redirect('modul_logistik/produksi_bahan_olahan');
	}
	function aksi_produksi_bahan_olahan(){

		$id_bahan_mentah = $this->input->post('id_bahan_mentah');
		$id_bahan_olahan = $this->input->post('id_bahan_olahan');
		$jumlah = $this->input->post('jumlah');


		$data = array(
			'id_bahan_mentah' => $id_bahan_mentah,
			'id_bahan_olahan' => $id_bahan_olahan,
			'jumlah' => $jumlah
			);
		$this->m_modul_logistik->input_data($data,'produksi_bahan_olahan');



		$sql = "SELECT sum(jumlah) as jum_bahan_olahan FROM produksi_bahan_olahan where id_bahan_mentah='$id_bahan_mentah' and id_bahan_olahan='$id_bahan_olahan'";
		$hasiljumlah=$this->db->query($sql)->row();
		$jum_bahan_olahan=$hasiljumlah->jum_bahan_olahan;

		// update stok bahan olahan
		$data2 = array(
			'stok' => $jum_bahan_olahan,
		);

		$where2 = array(
			'id' => $id_bahan_olahan
		);

		$this->m_modul_logistik->update_data($where2,$data2,'bahan_olahan');


		redirect('modul_logistik/produksi_bahan_olahan');
	}


	function aksi_update_stok_bahan_mentah(){
		// update stok bahan mentah
		$id_bahan_mentah = $this->input->post('id_bahan_mentah');
		$stok_bahan_mentah = $this->input->post('stok_bahan_mentah');

		$sql2 = "SELECT stok FROM bahan_mentah where id='$id_bahan_mentah'";
		$cek_stok_bahan_mentah=$this->db->query($sql2)->row();
		$cek_stok_bahan_mentah=$cek_stok_bahan_mentah->stok;
		$pengurangan_bahan_mentah=$cek_stok_bahan_mentah-$stok_bahan_mentah;
		$data3 = array(
			'stok' => $pengurangan_bahan_mentah,
		);

		$where3 = array(
			'id' => $id_bahan_mentah
		);

		$this->m_modul_logistik->update_data($where3,$data3,'bahan_mentah');
		redirect('modul_logistik/produksi_bahan_olahan');
	}


}
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modul_logistik extends CI_Controller {

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
		$this->load->model('m_modul_logistik');
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}

	}

	//---------------------- menu pengadaan bahan mentah

	//----- Pengadaan_bahan_mentah
	public function index_pengadaan_bahan_mentah()
	{
		$this->load->view('modul_logistik/menu_bahan_mentah/pengadaan_bahan_mentah');
	}
	public function data_pengadaan_bahan_mentah()
	{
		$data_pengadaan_bahan_mentah = $this->m_modul_logistik->tampil_data_permintaan_bahan()->result();
		echo json_encode($data_pengadaan_bahan_mentah);
	}
	public function tambah_data_pengadaan_bahan_mentah()
	{
		$nama_permintaan = $this->input->post('nama_permintaan');
		// echo $nama_permintaan;
		$this->m_modul_logistik->tambah_data_permintaan_bahan($nama_permintaan);
		redirect('modul_logistik/index_pengadaan_bahan_mentah');
	}
	public function update_proses_pengiriman()
	{
		$id_permintaan = $this->uri->segment('3');
		// $nama_permintaan = $this->input->post('nama_permintaan');
		// echo $nama_permintaan;
		$this->m_modul_logistik->update_proses_pengiriman($id_permintaan);
		redirect('modul_logistik/index_pengadaan_bahan_mentah');
	}

	//---------------------------------



	//----- Pengadaan_bahan_mentah_detail

	public function data_pengadaan_bahan_mentah_detail()
	{
		$id_permintaan = $this->uri->segment('3');
		$query_ambil_status = $this->db->query("SELECT permintaan_bahan.*
			FROM permintaan_bahan
			WHERE permintaan_bahan.id_permintaan = '$id_permintaan' ");

		foreach ($query_ambil_status->result() as $data_permintaan_bahan_detail) {
			 $status = $data_permintaan_bahan_detail->status;
			 $nama_permintaan = $data_permintaan_bahan_detail->nama_permintaan;
		}
		// echo $id_permintaan;
		$data['tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi'] = $this->m_modul_logistik->tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi($id_permintaan)->result();
		$data['tampil_data_permintaan_bahan_detail_tidak_sesuai'] = $this->m_modul_logistik->tampil_data_permintaan_bahan_detail_tidak_sesuai($id_permintaan)->result();
		$data['data_bahan_mentah'] = $this->m_modul_logistik->tampil_data_bahan_mentah()->result();
		$data['id_permintaan'] = $id_permintaan;
		$data['status'] = $status;
		$data['nama_permintaan'] = $nama_permintaan;
		$this->load->view('modul_logistik/menu_bahan_mentah/pengadaan_bahan_mentah_detail',$data);
	}
	public function tambah_data_pengadaan_bahan_mentah_detail()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		$bahan_mentah = $this->input->post('bahan_mentah');
		$jumlah_permintaan = $this->input->post('jumlah_permintaan');
		$satuan_besar = $this->input->post('satuan_besar');


		$this->m_modul_logistik->tambah_data_permintaan_bahan_detail($id_permintaan,$bahan_mentah,$jumlah_permintaan,$satuan_besar);
		redirect('modul_logistik/data_pengadaan_bahan_mentah_detail/'.$id_permintaan);
	}
	public function edit_pengadaan_bahan_mentah_detail()
	{
		$id_permintaan_detail = $this->uri->segment('3');
		$edit_data_permintaan_bahan_detail = $this->m_modul_logistik->edit_data_permintaan_bahan_detail($id_permintaan_detail)->result();
		// $this->load->view('modul_logistik/pengadaan_bahan_mentah_detail',$data,$id_permintaan);
		echo json_encode($edit_data_permintaan_bahan_detail);
	}
	public function update_pengadaan_bahan_mentah_detail()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		$id_permintaan_detail_edit = $this->input->post('id_permintaan_detail_edit');
		$jumlah_permintaan_edit = $this->input->post('jumlah_permintaan_edit');
		$harga_satuan_edit = $this->input->post('harga_satuan_edit');
		$this->m_modul_logistik->update_data_permintaan_bahan_detail($id_permintaan_detail_edit,$jumlah_permintaan_edit,$harga_satuan_edit);
		// $this->load->view('modul_logistik/pengadaan_bahan_mentah_detail',$data,$id_permintaan);
		redirect('modul_logistik/data_pengadaan_bahan_mentah_detail/'.$id_permintaan);
	}

	//---------------------------

	//-------------------------------------

	public function produksi_bahan_olahan(){

		$this->load->view('modul_logistik/produksi_bahan/produksi_bahan_olahan');
	}
	public function rubah_status(){
		$id = $this->input->get('id');
		$status = $this->input->get('status');

		if($status==1){
			$status=0;
		}elseif($status==0){
			$status=1;
		}
		$data = array(
			'status' => $status,
		);

		$where = array(
			'id' => $id
		);

		$this->m_modul_logistik->update_data($where,$data,'bahan_mentah');
		redirect('modul_logistik/produksi_bahan_olahan');
	}
	public function rubah_status_bahan_olahan(){
		$id = $this->input->get('id');
		$status = $this->input->get('status');

		if($status==1){
			$status=0;
		}elseif($status==0){
			$status=1;
		}
		$data = array(
			'status' => $status,
		);

		$where = array(
			'id' => $id
		);

		$this->m_modul_logistik->update_data($where,$data,'bahan_olahan');
		redirect('modul_logistik/produksi_bahan_olahan');
	}
	function aksi_produksi_bahan_olahan(){

		$id_bahan_mentah = $this->input->post('id_bahan_mentah');
		$id_bahan_olahan = $this->input->post('id_bahan_olahan');
		$jumlah = $this->input->post('jumlah');


		$data = array(
			'id_bahan_mentah' => $id_bahan_mentah,
			'id_bahan_olahan' => $id_bahan_olahan,
			'jumlah' => $jumlah
			);
		$this->m_modul_logistik->input_data($data,'produksi_bahan_olahan');



		$sql = "SELECT sum(jumlah) as jum_bahan_olahan FROM produksi_bahan_olahan where id_bahan_mentah='$id_bahan_mentah' and id_bahan_olahan='$id_bahan_olahan'";
		$hasiljumlah=$this->db->query($sql)->row();
		$jum_bahan_olahan=$hasiljumlah->jum_bahan_olahan;

		// update stok bahan olahan
		$data2 = array(
			'stok' => $jum_bahan_olahan,
		);

		$where2 = array(
			'id' => $id_bahan_olahan
		);

		$this->m_modul_logistik->update_data($where2,$data2,'bahan_olahan');


		redirect('modul_logistik/produksi_bahan_olahan');
	}


	function aksi_update_stok_bahan_mentah(){
		// update stok bahan mentah
		$id_bahan_mentah = $this->input->post('id_bahan_mentah');
		$stok_bahan_mentah = $this->input->post('stok_bahan_mentah');

		$sql2 = "SELECT stok FROM bahan_mentah where id='$id_bahan_mentah'";
		$cek_stok_bahan_mentah=$this->db->query($sql2)->row();
		$cek_stok_bahan_mentah=$cek_stok_bahan_mentah->stok;
		$pengurangan_bahan_mentah=$cek_stok_bahan_mentah-$stok_bahan_mentah;
		$data3 = array(
			'stok' => $pengurangan_bahan_mentah,
		);

		$where3 = array(
			'id' => $id_bahan_mentah
		);

		$this->m_modul_logistik->update_data($where3,$data3,'bahan_mentah');
		redirect('modul_logistik/produksi_bahan_olahan');
	}


}
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
