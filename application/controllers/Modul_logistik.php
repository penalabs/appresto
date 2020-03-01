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
		// $sql = "SELECT id_bahan_mentah,jumlah_permintaan FROM permintaan_bahan_detail where id_permintaan='$id_permintaan'";
		// $data1=$this->db->query($sql)->result();


		$this->m_modul_logistik->update_proses_pengiriman($id_permintaan);
		// foreach ($data1 as $d) {
		// 	 $id_bahan_mentah = $d->id_bahan_mentah;
		// 	 $jumlah_permintaan= $d->jumlah_permintaan;
		//
		// 	 $sql = "SELECT stok FROM stok_bahan_mentah_produksi where id_bahan_mentah='$id_bahan_mentah'";
		// 	 $stok=$this->db->query($sql)->row();
		//
		// 	 $stok_akhir=(int)$stok->stok+(int)$d->jumlah_permintaan;
		//
		// 	 $sql2 = "UPDATE stok_bahan_mentah_produksi set stok='$stok_akhir' where id_bahan_mentah='$id_bahan_mentah'";
		// 	 $this->db->query($sql2);
		// }

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

	public function pembelian_bahan_mentah(){

		$this->load->view('modul_logistik/pembelian_bahan_mentah');
	}
	public function data_bahan(){
		$id_logistik=$this->session->userdata('id');
		$id_transaksi = $this->input->post('id_transaksi');
		$sql = "SELECT detail_pembelian_bahan_mentah.id as id_detail_pembelian_bahan_mentah,bahan_mentah.nama_bahan,bahan_mentah.satuan_besar,detail_pembelian_bahan_mentah.harga_beli,detail_pembelian_bahan_mentah.jumlah FROM bahan_mentah join detail_pembelian_bahan_mentah on detail_pembelian_bahan_mentah.id_bahan_mentah=bahan_mentah.id where id_logistik='$id_logistik' and id_transaksi='$id_transaksi'";
		$data=$this->db->query($sql)->result();
		echo json_encode($data);
	}
	public function add_cart_data_bahan(){
		$id_logistik=$this->session->userdata('id');
		$no_transaksi = $this->input->post('no_transaksi');
		$id_bahan_mentah = $this->input->post('id_bahan_mentah');
		$qty = $this->input->post('qty');
		$harga_beli = $this->input->post('harga_beli');
		$sql = "INSERT INTO detail_pembelian_bahan_mentah  VALUES ('', '$no_transaksi', '$id_bahan_mentah', '$qty', '$harga_beli');";
		if (!$this->db->query($sql)) {
	    echo "FALSE";
		}
		else {
		    echo "TRUE";
		}
	}
	public function konfirmasi_pembelian(){
		$id_logistik=$this->session->userdata('id');
		$no_transaksi = $this->input->post('no_transaksi');
		$nama_supplier = $this->input->post('nama_supplier');
		$total_pembelian = $this->input->post('total_pembelian');
		$tanggal= $this->input->post('tanggal');
		$dibayar= $this->input->post('dibayar');
		$catatan= $this->input->post('catatan');
		$sql = "INSERT INTO pembelian_bahan_mentah  VALUES ('', '$id_logistik','$no_transaksi', '$nama_supplier', '$tanggal', '$total_pembelian', '$dibayar', 'selesai', '$catatan');";

		if (!$this->db->query($sql)) {
			echo "FALSE";
		}
		else {
				echo "TRUE";
		}
	}

	public function pembelian_alat(){

	  $this->load->view('modul_logistik/pembelian_alat');
	}
	public function data_alat(){
	  $id_logistik=$this->session->userdata('id');
	  $id_transaksi = $this->input->post('id_transaksi');
	  $sql = "SELECT detail_pembelian_alat.id as id_detail_pembelian_alat,peralatan.nama_peralatan,peralatan.satuan_besar,detail_pembelian_alat.harga_beli,detail_pembelian_alat.jumlah FROM peralatan join detail_pembelian_alat on detail_pembelian_alat.id_alat=peralatan.id where  detail_pembelian_alat.id_transaksi='$id_transaksi'";
	  $data=$this->db->query($sql)->result();
	  echo json_encode($data);
	}
	public function add_cart_data_alat(){
	  $id_logistik=$this->session->userdata('id');
	  $no_transaksi = $this->input->post('no_transaksi');
	  $id_alat = $this->input->post('id_alat');
	  $qty = $this->input->post('qty');
	  $harga_beli = $this->input->post('harga_beli');
	  $sql = "INSERT INTO detail_pembelian_alat  VALUES ('', '$no_transaksi', '$id_alat', '$qty', '$harga_beli');";

		$sql2 = "SELECT jumlah_stok FROM peralatan WHERE id='$id_alat'";
		$data2=$this->db->query($sql2)->row();
		$jumlah_stok=(int)$data2->jumlah_stok+(int)$qty;

		$sql3 = "UPDATE peralatan SET jumlah_stok='$jumlah_stok' WHERE id='$id_alat'";
		$this->db->query($sql3);

	  if (!$this->db->query($sql)) {
	    echo "FALSE";
	  }
	  else {
	      echo "TRUE";
	  }
	}
	public function konfirmasi_pembelian_alat(){
	  $id_logistik=$this->session->userdata('id');
	  $no_transaksi = $this->input->post('no_transaksi');
	  $nama_supplier = $this->input->post('nama_supplier');
	  $total_pembelian = $this->input->post('total_pembelian');
	  $tanggal= $this->input->post('tanggal');
	  $dibayar= $this->input->post('dibayar');
	  $catatan= $this->input->post('catatan');
	  $sql = "INSERT INTO pembelian_alat  VALUES ('', '$id_logistik','$no_transaksi', '$nama_supplier','$tanggal', '$total_pembelian', '$dibayar', 'selesai', '$catatan');";
	  if (!$this->db->query($sql)) {
	    echo "FALSE";
	  }
	  else {
	      echo "TRUE";
	  }
	}




	//menu permintaan peralatan
	public function permintaanperalatan_view()
	{
	  $data['permintaanperalatan'] = $this->m_modul_logistik->tampil_data_permintaan_peralatan()->result();
	  $this->load->view('modul_logistik/V_permintaanperalatan_view', $data);
	}

	public function hapusRecordPermintaan($id)
	{
		$where = array('id_permintaan_alat' => $id);
		$this->m_modul_logistik->hapus_data($where,'permintaan_alat');
		$this->session->set_flashdata('flash','Dihapuskan');
		redirect('modul_logistik/permintaanperalatan_view');
	}
	
	public function editRecordPermintaan()
	{
		$id 	= $this->input->post('idP');
		$where	= array('id_permintaan_alat' => $id);
		$jumlah	= $this->input->post('jml1');
		$data = array(
			'jumlah'				=> $jumlah,
			'status_permintaan'		=> "proses pengiriman",
		);
		$this->m_modul_logistik->update_data($where,$data,'permintaan_alat');
		//$this->session->set_flashdata('flash','Dihapuskan');
		redirect('modul_logistik/permintaanperalatan_view');
	}
	public function permintaanperalatan_tambah()
	{
	  $data['data_cabang_resto'] = $this->m_modul_logistik->tampil_data('resto')->result();
	  $data['data_peralatan'] = $this->m_modul_logistik->tampil_data('peralatan')->result();
	  $this->load->view('modul_logistik/V_permintaanperalatan_tambah', $data);
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
	  $this->m_modul_logistik->input_data($datainput, 'permintaan_alat');

	  $sql2 = "SELECT jumlah_stok FROM peralatan where id='$alat'";
	  $jumlah_stok_alat=$this->db->query($sql2)->row();

	  $stok_akhir=$jumlah_stok_alat->jumlah_stok-$jumlah;

	  $sql3 = "UPDATE peralatan set jumlah_stok='$stok_akhir' where id='$alat'";
	  $this->db->query($sql3);


	  redirect('modul_logistik/permintaanperalatan_view');
	}

	public function permintaanperalatan_edit($id_pengeluaran_cabang)
	{
	  $data['data_cabang_resto'] = $this->m_modul_logistik->tampil_data('resto')->result();
	  $data['data_peralatan'] = $this->m_modul_logistik->tampil_data('peralatan')->result();
	  $data['permintaanperalatan'] = $this->m_modul_logistik->tampil_data_permintaan_peralatan_where($id_pengeluaran_cabang)->result();
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
	  $this->m_modul_logistik->update_data($where, $datainput, 'permintaan_alat');

	  redirect('modul_logistik/permintaanperalatan_view');
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
	  $this->m_modul_logistik->hapus_data($where, 'permintaan_alat');

	  redirect('modul_logistik/permintaanperalatan_view');
	}


	//permintaan bahan mentah baru
	public function laporan_permintaan_barang()
	{
	  $sql = "SELECT bahan_mentah.*,resto.nama_resto,pengiriman_bahan_mentah.jumlah_permintaan,permintaan_bahan_mentah.id,permintaan_bahan_mentah.nama_permintaan,permintaan_bahan_mentah.tanggal,permintaan_bahan_mentah.status FROM  pengiriman_bahan_mentah join permintaan_bahan_mentah on pengiriman_bahan_mentah.id_permintaan=permintaan_bahan_mentah.id join user_resto on user_resto.id=permintaan_bahan_mentah.id_user_produksi join resto on resto.id=user_resto.id_resto join bahan_mentah on bahan_mentah.id=pengiriman_bahan_mentah.id_bahan_mentah where permintaan_bahan_mentah.status='permintaan'";
	  $data['data']=$this->db->query($sql)->result();
	  $sql2 = "SELECT bahan_olahan.*,pengiriman_bahan_olahan.jumlah_permintaan,pengiriman_bahan_olahan.jumlah_permintaan,resto.nama_resto,permintaan_bahan_olahan.id,permintaan_bahan_olahan.nama_permintaan,permintaan_bahan_olahan.tanggal,permintaan_bahan_olahan.status FROM pengiriman_bahan_olahan join permintaan_bahan_olahan on pengiriman_bahan_olahan.id_permintaan=permintaan_bahan_olahan.id join user_resto on user_resto.id=permintaan_bahan_olahan.id_user_produksi join resto on resto.id=user_resto.id_resto join bahan_olahan on bahan_olahan.id=pengiriman_bahan_olahan.id_bahan_olahan where permintaan_bahan_olahan.status='permintaan'";
	  $data['data2']=$this->db->query($sql2)->result();
	  $this->load->view('modul_logistik/laporan_permintaan_bahan',$data);
	}
	public function laporan_penerimaan_barang()
	{
	  $sql = "SELECT bahan_mentah.*,resto.nama_resto,pengiriman_bahan_mentah.jumlah_permintaan,permintaan_bahan_mentah.id,permintaan_bahan_mentah.nama_permintaan,permintaan_bahan_mentah.tanggal,permintaan_bahan_mentah.status FROM  pengiriman_bahan_mentah join permintaan_bahan_mentah on pengiriman_bahan_mentah.id_permintaan=permintaan_bahan_mentah.id join user_resto on user_resto.id=permintaan_bahan_mentah.id_user_produksi join resto on resto.id=user_resto.id_resto join bahan_mentah on bahan_mentah.id=pengiriman_bahan_mentah.id_bahan_mentah where permintaan_bahan_mentah.status='diterima'";
	  $data['data']=$this->db->query($sql)->result();
	  $sql2 = "SELECT bahan_olahan.*,pengiriman_bahan_olahan.jumlah_permintaan,pengiriman_bahan_olahan.jumlah_permintaan,resto.nama_resto,permintaan_bahan_olahan.id,permintaan_bahan_olahan.nama_permintaan,permintaan_bahan_olahan.tanggal,permintaan_bahan_olahan.status FROM pengiriman_bahan_olahan join permintaan_bahan_olahan on pengiriman_bahan_olahan.id_permintaan=permintaan_bahan_olahan.id join user_resto on user_resto.id=permintaan_bahan_olahan.id_user_produksi join resto on resto.id=user_resto.id_resto join bahan_olahan on bahan_olahan.id=pengiriman_bahan_olahan.id_bahan_olahan where permintaan_bahan_olahan.status='diterima'";
	  $data['data2']=$this->db->query($sql2)->result();
	  $this->load->view('modul_logistik/laporan_penerimaan_bahan',$data);
	}
	public function permintaan_bahan_mentah()
	{
	  $sql = "SELECT resto.nama_resto,permintaan_bahan_mentah.id,permintaan_bahan_mentah.nama_permintaan,permintaan_bahan_mentah.tanggal,permintaan_bahan_mentah.status FROM permintaan_bahan_mentah join user_resto on user_resto.id=permintaan_bahan_mentah.id_user_produksi join resto on resto.id=user_resto.id_resto";
	  $data['data']=$this->db->query($sql)->result();
	  $sql2 = "SELECT resto.nama_resto,permintaan_bahan_olahan.id,permintaan_bahan_olahan.nama_permintaan,permintaan_bahan_olahan.tanggal,permintaan_bahan_olahan.status FROM permintaan_bahan_olahan join user_resto on user_resto.id=permintaan_bahan_olahan.id_user_produksi join resto on resto.id=user_resto.id_resto";
	  $data['data2']=$this->db->query($sql2)->result();
	  $this->load->view('modul_logistik/permintaan_bahan',$data);
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

	  $this->load->view('modul_logistik/lihat_bahan_mentah',$data);
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

	  $this->load->view('modul_logistik/lihat_bahan_olahan',$data);
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
	  redirect('modul_logistik/permintaan_bahan_mentah');

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
	  redirect('modul_logistik/permintaan_bahan_mentah');

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
	  redirect('modul_logistik/permintaan_bahan_mentah');
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

	  redirect('modul_logistik/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
	}
	function aksi_kirim_bahan_olahan(){
		$id_pengiriman = $this->input->post('id');
		$jumlah_dikembalikan = $this->input->post('jumlah_dikembalikan');
		$jumlah_permintaan = $this->input->post('jumlah_permintaan');
		$jumlah_dikirim = $this->input->post('jumlah_dikirim');
		$id_permintaan = $this->input->post('id_permintaan');
		$batas_kembali=(int)$jumlah_dikirim-(int)$jumlah_permintaan;

		$tanggal=date('Y-m-d');

		$sql = "UPDATE pengiriman_bahan_olahan SET jumlah_dikirim = '$jumlah_dikirim', status='tidak',tanggal_pengiriman='$tanggal' WHERE id='$id_pengiriman'";
		$this->db->query($sql);

		if((int)$jumlah_permintaan!=(int)$jumlah_dikirim){
		   $sql = "UPDATE pengiriman_bahan_olahan SET jumlah_dikirim = '$jumlah_dikirim', status='tidak',tanggal_pengiriman='$tanggal' WHERE id='$id_pengiriman'";
		   if($this->db->query($sql)){
		     $data_session = array(
		       'pesan' => 'berhasil update jumlah pengiriman bahan mentah !',
		     );

		     $this->session->set_userdata($data_session);
		     echo 1;
		   }
		}else{
		  $sql = "UPDATE pengiriman_bahan_olahan SET jumlah_dikirim = '$jumlah_dikirim', status='sesuai',tanggal_pengiriman='$tanggal' WHERE id='$id_pengiriman'";
		  if($this->db->query($sql)){
		    $data_session = array(
		      'pesan' => 'berhasil update jumlah pengiriman bahan mentah !',
		    );

		    $this->session->set_userdata($data_session);
		    echo 1;
		  }
		}
		redirect('modul_logistik/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
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
	  redirect('modul_logistik/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
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
	  redirect('modul_logistik/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
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

	  redirect('modul_logistik/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
	}
	function aksi_kirim_bahan_mentah(){
	  $id_pengiriman = $this->input->post('id');
	  $jumlah_dikembalikan = $this->input->post('jumlah_dikembalikan');
	  $jumlah_permintaan = $this->input->post('jumlah_permintaan');
	  $jumlah_dikirim = $this->input->post('jumlah_dikirim');
	  $id_permintaan = $this->input->post('id_permintaan');
	  $batas_kembali=(int)$jumlah_dikirim-(int)$jumlah_permintaan;

		$tanggal=date('Y-m-d');
	  if((int)$jumlah_permintaan!=(int)$jumlah_dikirim){
			 $sql = "UPDATE pengiriman_bahan_mentah SET jumlah_dikirim = '$jumlah_dikirim', status='tidak',tanggal_pengiriman='$tanggal' WHERE id='$id_pengiriman'";
			 if($this->db->query($sql)){
				 $data_session = array(
					 'pesan' => 'berhasil update jumlah pengiriman bahan mentah !',
				 );

				 $this->session->set_userdata($data_session);
				 echo 1;
			 }
	  }else{
	    $sql = "UPDATE pengiriman_bahan_mentah SET jumlah_dikirim = '$jumlah_dikirim', status='sesuai',tanggal_pengiriman='$tanggal' WHERE id='$id_pengiriman'";
	    if($this->db->query($sql)){
	      $data_session = array(
	        'pesan' => 'berhasil update jumlah pengiriman bahan mentah !',
	      );

	      $this->session->set_userdata($data_session);
	      echo 1;
	    }
	  }
	  redirect('modul_logistik/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
	}
	function aksi_kirim_ke_produksi_bahan_mentah(){
	  $id_bahan_mentah = $this->input->get('id_bahan_mentah');
	  $jumlah_dikirim = $this->input->get('jumlah_bahan_dikirim');
		$id_permintaan = $this->input->get('id_permintaan');

		$sql5 = "SELECT stok FROM bahan_mentah WHERE id='$id_bahan_mentah'";
		$data5=$this->db->query($sql5)->row();
		$stok_bahan_mentah=$data5->stok;

		$stok_akhir=(int)$stok_bahan_mentah-(int)$jumlah_dikirim;


			 $sql = "UPDATE bahan_mentah SET stok = '$stok_akhir' WHERE id='$id_bahan_mentah'";
			 if($this->db->query($sql)){
				 $data_session = array(
					 'pesan' => 'berhasil update stok bahan mentah !',
				 );
				 $this->session->set_userdata($data_session);
				 echo 1;
			 }

	  redirect('modul_logistik/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
	}

	function aksi_kirim_ke_produksi_bahan_olahan(){
	  $id_bahan_olahan = $this->input->get('id_bahan_olahan');
	  $jumlah_dikirim = $this->input->get('jumlah_bahan_dikirim');
		$id_permintaan = $this->input->get('id_permintaan');

		$sql5 = "SELECT stok FROM bahan_olahan WHERE id='$id_bahan_olahan'";
		$data5=$this->db->query($sql5)->row();
		$stok_bahan_olahan=$data5->stok;

		$stok_akhir=(int)$stok_bahan_olahan-(int)$jumlah_dikirim;


			 $sql = "UPDATE bahan_olahan SET stok = '$stok_akhir' WHERE id='$id_bahan_olahan'";
			 if($this->db->query($sql)){
				 $data_session = array(
					 'pesan' => 'berhasil update stok bahan mentah !',
				 );
				 $this->session->set_userdata($data_session);
				 echo 1;
			 }

	  redirect('modul_logistik/lihat_bahan_olahan/?id_permintaan='.$id_permintaan);
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
	  redirect('modul_logistik/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
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
	  redirect('modul_logistik/lihat_bahan_mentah/?id_permintaan='.$id_permintaan);
	}

	function ubah_status_dikirim_bahan_mentah(){
	 // $id_permintaan = $this->input->get('id_permintaan');
	  $id = $this->input->get('id_permintaan');
		$sql = "UPDATE permintaan_bahan_mentah SET status = 'pengiriman' WHERE id='$id'";
		if($this->db->query($sql)){
	    $data_session = array(
	      'pesan' => 'barang akan dikirim',
	    );

	    $this->session->set_userdata($data_session);
	  }

	  redirect('modul_logistik/permintaan_bahan_mentah');
	}
	function ubah_status_dikirim_bahan_olahan(){
	 // $id_permintaan = $this->input->get('id_permintaan');
		$id = $this->input->get('id_permintaan');
		$sql = "UPDATE permintaan_bahan_olahan SET status = 'pengiriman' WHERE id='$id'";
		if($this->db->query($sql)){
			$data_session = array(
				'pesan' => 'barang akan dikirim',
			);

			$this->session->set_userdata($data_session);
		}

		redirect('modul_logistik/permintaan_bahan_mentah');
	}
}
