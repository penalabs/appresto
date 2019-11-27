<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

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
		$this->load->model('m_modul_superadmin');
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}

	}
	public function setupowner()
	{
		$sql2 = "SELECT investasi_owner.id,owner.nama as nama_owner,user_kanwil.nama as nama_bendahara,investasi_owner.tanggal,investasi_owner.jumlah_investasi,investasi_owner.jangka_waktu,investasi_owner.persentase_omset FROM investasi_owner join user_kanwil on user_kanwil.id=investasi_owner.id_bendahara join owner on owner.id=investasi_owner.id_owner";

		$data['data'] = $this->db->query($sql2)->result();
		$this->load->view('modul_superadmin/setupowner', $data);
	}
	public function add_investasi()
	{
		//$data['data'] = $this->m_modul_superadmin->tampil_data('investasi_owner')->result();
		$this->load->view('modul_superadmin/add_setupowner');
	}
	public function action_add_investasi()
	{
		$id=$this->session->userdata('id');
		$owner = $this->input->post('owner');
		$bendahara = $this->input->post('bendahara');
		$tanggal = $this->input->post('tanggal');
		$jumlah_investasi = $this->input->post('jumlah_investasi');
		$jangka_waktu = $this->input->post('jangka_waktu');
		$persentase_omset = $this->input->post('persentase_omset');
		// $jumlah_omset = $this->input->post('jumlah_omset');
		$data = array(
		'id_super_admin'=>$id,
		'id_owner'=>$owner,
		'id_bendahara' => $bendahara,
		'tanggal' => $tanggal,
		'jumlah_investasi' => $jumlah_investasi,
		'jangka_waktu' => $jangka_waktu,
		'persentase_omset' => $persentase_omset,
		// 'jumlah_omset' => $jumlah_omset,
		);

		$data['data'] = $this->m_modul_superadmin->input_data($data,'investasi_owner');
		redirect('superadmin/add_investasi');
	}
	public function action_add_omset()
	{
		$id=$this->session->userdata('id');
		$id_investasi_owner = $this->input->post('id_investasi_owner');
		$tanggal = $this->input->post('tanggal');
		$penyusutan_invest = $this->input->post('penyusutan_invest');
		// $jumlah_omset = $this->input->post('jumlah_omset');

		$data = array(
		'id_investasi_owner'=>$id_investasi_owner,
		'tanggal'=>$tanggal,
		'penyusutan_invest' => $penyusutan_invest,
		// 'jumlah_omset' => $jumlah_omset,
		);

		$data['data'] = $this->m_modul_superadmin->input_data($data,'omset_investasi_owner');
		redirect('superadmin/setupowner/?id='.$id_investasi_owner);
	}

	public function edit_investasi()
	{
		$id = $this->input->get('id');
		$where = array(
		'id'=>$id,
		);
		$data['data'] = $this->m_modul_superadmin->tampil_data_where('investasi_owner',$where)->result();
		$this->load->view('modul_superadmin/edit_setupowner',$data);
	}
	public function action_update_investasi()
	{
		$id_superadmin=$this->session->userdata('id');
		$id = $this->input->post('id');
		$id_owner = $this->input->post('id_owner');
		$id_bendahara = $this->input->post('id_bendahara');
		$tanggal = $this->input->post('tanggal');
		$jumlah_investasi = $this->input->post('jumlah_investasi');
		$jangka_waktu = $this->input->post('jangka_waktu');
		$persentase_omset = $this->input->post('persentase_omset');
		$jumlah_omset = $this->input->post('jumlah_omset');

		$where = array(
		'id'=>$id,
		);

		$data = array(
		'id_super_admin'=>$id_superadmin,
		'id_owner'=>$id_owner,
		'id_bendahara' => $id_bendahara,
		'tanggal' => $tanggal,
		'jumlah_investasi' => $jumlah_investasi,
		'jangka_waktu' => $jangka_waktu,
		'persentase_omset' => $persentase_omset,
		// 'jumlah_omset' => $jumlah_omset,
		);

		$data['data'] = $this->m_modul_superadmin->update_data($where,$data,'investasi_owner');
		redirect('superadmin/setupowner');
	}
	public function hapus_investasi()
	{
		$id = $this->input->get('id');
		$data = array(
		'id'=>$id,
		);
		$this->m_modul_superadmin->hapus_data($data,'investasi_owner');
		redirect('superadmin/setupowner');
	}

	public function penyusutan_invest_hapus()
	{
		$id = $this->input->get('id');
		$id_investasi_owner = $this->input->get('id_investasi_owner');
		$data = array(
		'id'=>$id,
		);
		$this->m_modul_superadmin->hapus_data($data,'omset_investasi_owner');
		redirect('superadmin/setupowner/?id='.$id_investasi_owner);
	}







	//---------------------------irhas---------------------------
	public function laporanbiayaoprasional_view(){
		$tanggalwhare 				= date('Y-m-d');
		$data['laporanbiayaoprasional'] = $this->m_modul_superadmin->tampil_laporan_biaya_oprasional_where_hari($tanggalwhare)->result();
		$this->load->view('modul_superadmin/V_laporanbiayaoprasional_view', $data);
	}

	public function laporanbiayaoprasional_cariaksi_hari(){
		$tanggal_hari				= $this->input->post('tanggal_hari');
		$data['laporanbiayaoprasional'] = $this->m_modul_superadmin->tampil_laporan_biaya_oprasional_where_hari($tanggal_hari)->result();
		$this->load->view('modul_superadmin/V_laporanbiayaoprasional_view', $data);
	}

	public function laporanbiayaoprasional_cariaksi_bulan(){
		$tanggal_bulan				= $this->input->post('tanggal_bulan');
		$data['laporanbiayaoprasional'] = $this->m_modul_superadmin->tampil_laporan_biaya_oprasional_where_bulan($tanggal_bulan)->result();
		$this->load->view('modul_superadmin/V_laporanbiayaoprasional_view', $data);
	}

	public function laporanpenjualan_view(){
		$data['comboboxmenu'] = $this->m_modul_superadmin->tampil_data('menu')->result();
		$data['comboboxpaket'] = $this->m_modul_superadmin->tampil_data('paket')->result();
		$data['laporanpenjualanM'] = $this->m_modul_superadmin->tampil_laporan_penjualanmenu('')->result();
		$data['laporanpenjualanP'] = $this->m_modul_superadmin->tampil_laporan_penjualanpaket('')->result();
		$data['totalmenupayu'] = $this->m_modul_superadmin->tampil_laporan_penjualanmenutotal('')->row_array();
		$data['totalpaketpayu'] = $this->m_modul_superadmin->tampil_laporan_penjualanpakettotal('')->row_array();
		$data['datakondisi'] = "";
		$this->load->view('modul_superadmin/V_laporanpenjualan_view', $data);
	}

	public function laporanpenjualanmenu_cariaksi(){
		$where						= $this->input->post('namamenu');
		$data['comboboxmenu'] = $this->m_modul_superadmin->tampil_data('menu')->result();
		$data['comboboxpaket'] = $this->m_modul_superadmin->tampil_data('paket')->result();
		$data['laporanpenjualanM'] = $this->m_modul_superadmin->tampil_laporan_penjualanmenu($where)->result();
		$data['totalmenupayu'] = $this->m_modul_superadmin->tampil_laporan_penjualanmenutotal($where)->row_array();
		$data['datakondisi'] = "menu";
		$this->load->view('modul_superadmin/V_laporanpenjualan_view', $data);
	}

	public function laporanpenjualanpaket_cariaksi(){
		$where						= $this->input->post('namapaket');
		$data['comboboxmenu'] = $this->m_modul_superadmin->tampil_data('menu')->result();
		$data['comboboxpaket'] = $this->m_modul_superadmin->tampil_data('paket')->result();
		$data['laporanpenjualanP'] = $this->m_modul_superadmin->tampil_laporan_penjualanpaket($where)->result();
		$data['totalpaketpayu'] = $this->m_modul_superadmin->tampil_laporan_penjualanpakettotal($where)->row_array();
		$data['datakondisi'] = "";
		$this->load->view('modul_superadmin/V_laporanpenjualan_view', $data);
	}

	public function laporan_investasi_cabang(){
		$cabang = $this->input->post('cabang_resto');
		$data['cabang'] = $this->input->post('cabang_resto');
		$data['data_cabang_resto']=$this->m_modul_superadmin->data_cabang_resto()->result();
		$data['data_lp_cabang']=$this->m_modul_superadmin->data_laporan_investasi_cabang($cabang)->result();
		//$data['data_jum_storan']=$this->m_modul_superadmin->data_jum_storan($cabang)->row();
		//$data['data_lp_ic']=$this->m_modul_superadmin->data_lp_ic($cabang)->result();
		$this->load->view('modul_superadmin/vc_investasi_cabang',$data);
	}

	public function restos()
	{
		$this->load->view('modul_superadmin/resto');
	}


	public function action_add_resto()
	{
		// $id=$this->session->userdata('id');
		$id_kanwil = $this->input->post('id_kanwil');
		$nama_resto = $this->input->post('nama_resto');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$pajak = $this->input->post('pajak');
		// $jumlah_omset = $this->input->post('jumlah_omset');

		$data = array(
		'id_kanwil'=>$id_kanwil,
		'nama_resto'=>$nama_resto,
		'alamat' => $alamat,
		'no_telp' => $telp,
		'pajak' => $pajak,
		// 'jumlah_omset' => $jumlah_omset,
		);

		$data['data'] = $this->m_modul_superadmin->input_data($data,'resto');
		redirect('superadmin/restos');
	}

	public function action_edit_resto()
	{
		// $id=$this->session->userdata('id');
		$id = $this->input->post('id');
		$id_kanwil = $this->input->post('id_kanwil');
		$nama_resto = $this->input->post('nama_resto');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$pajak = $this->input->post('pajak');
		// $jumlah_omset = $this->input->post('jumlah_omset');

		$where = array(
		'id'=>$id,
		);

		$data = array(
		'id_kanwil'=>$id_kanwil,
		'nama_resto'=>$nama_resto,
		'alamat' => $alamat,
		'no_telp' => $telp,
		'pajak' => $pajak,
		// 'jumlah_omset' => $jumlah_omset,
		);

		$data['data'] = $this->m_modul_superadmin->update_data($where,$data,'resto');

		echo json_encode($data);
		redirect('superadmin/restos');
	}

	public function hapus_manajemen_resto()
	{
		$id = $this->input->get('id');
		$data = array(
		'id'=>$id,
		);
		$this->m_modul_superadmin->hapus_data($data,'resto');
		redirect('superadmin/restos');
	}

	public function pemesanan()
	{
		$id_user_kasir=$this->session->userdata('id');

		$query = $this->db->query("SELECT resto.id as id_resto FROM user_resto join resto on resto.id=user_resto.id_resto WHERE user_resto.id='$id_user_kasir'")->row();

		/*$where = array(
			'user_resto.id' => $id_user_kasir,
		);*/
		$id_resto=$query->id_resto;
    $x['data']=$this->m_modul_superadmin->tampil_data_where_join($id_resto)->result();
		$this->load->view('modul_superadmin/pemesanan',$x);
	}
	public function transaksi($id)
	{
		$id_pemesanan=$this->session->userdata('id');

    $x['data']=$this->m_modul_superadmin->detail_transaksi_paket('pemesanan_paket',$id_pemesanan)->result();
		$x['data2']=$this->m_modul_superadmin->detail_transaksi_menu('pemesanan_menu',$id_pemesanan)->result();
		$this->load->view('modul_superadmin/pembayaran',$x);
	}

	public function setoran_kasir()
	{
		$id_user_kasir=$this->session->userdata('id');
		$where = array(
			'id_user_kasir' => $id_user_kasir,
		);
        $x['data']=$this->m_modul_superadmin->tampil_data_where('pendapatan_kas_masuk',$where)->result();
		$this->load->view('modul_superadmin/setoran_kasir',$x);
	}

	public function laporan_permintaan_barang()
	{
	  $sql = "SELECT bahan_mentah.*,resto.nama_resto,pengiriman_bahan_mentah.jumlah_permintaan,permintaan_bahan_mentah.id,permintaan_bahan_mentah.nama_permintaan,permintaan_bahan_mentah.tanggal,permintaan_bahan_mentah.status FROM  pengiriman_bahan_mentah join permintaan_bahan_mentah on pengiriman_bahan_mentah.id_permintaan=permintaan_bahan_mentah.id join user_resto on user_resto.id=permintaan_bahan_mentah.id_user_produksi join resto on resto.id=user_resto.id_resto join bahan_mentah on bahan_mentah.id=pengiriman_bahan_mentah.id_bahan_mentah where permintaan_bahan_mentah.status='permintaan'";
	  $data['data']=$this->db->query($sql)->result();
	  $sql2 = "SELECT bahan_olahan.*,pengiriman_bahan_olahan.jumlah_permintaan,pengiriman_bahan_olahan.jumlah_permintaan,resto.nama_resto,permintaan_bahan_olahan.id,permintaan_bahan_olahan.nama_permintaan,permintaan_bahan_olahan.tanggal,permintaan_bahan_olahan.status FROM pengiriman_bahan_olahan join permintaan_bahan_olahan on pengiriman_bahan_olahan.id_permintaan=permintaan_bahan_olahan.id join user_resto on user_resto.id=permintaan_bahan_olahan.id_user_produksi join resto on resto.id=user_resto.id_resto join bahan_olahan on bahan_olahan.id=pengiriman_bahan_olahan.id_bahan_olahan where permintaan_bahan_olahan.status='permintaan'";
	  $data['data2']=$this->db->query($sql2)->result();
	  $this->load->view('modul_superadmin/laporan_permintaan_bahan',$data);
	}

	public function laporan_penerimaan_barang()
	{
	  $sql = "SELECT bahan_mentah.*,resto.nama_resto,pengiriman_bahan_mentah.jumlah_permintaan,permintaan_bahan_mentah.id,permintaan_bahan_mentah.nama_permintaan,permintaan_bahan_mentah.tanggal,permintaan_bahan_mentah.status FROM  pengiriman_bahan_mentah join permintaan_bahan_mentah on pengiriman_bahan_mentah.id_permintaan=permintaan_bahan_mentah.id join user_resto on user_resto.id=permintaan_bahan_mentah.id_user_produksi join resto on resto.id=user_resto.id_resto join bahan_mentah on bahan_mentah.id=pengiriman_bahan_mentah.id_bahan_mentah where permintaan_bahan_mentah.status='diterima'";
	  $data['data']=$this->db->query($sql)->result();
	  $sql2 = "SELECT bahan_olahan.*,pengiriman_bahan_olahan.jumlah_permintaan,pengiriman_bahan_olahan.jumlah_permintaan,resto.nama_resto,permintaan_bahan_olahan.id,permintaan_bahan_olahan.nama_permintaan,permintaan_bahan_olahan.tanggal,permintaan_bahan_olahan.status FROM pengiriman_bahan_olahan join permintaan_bahan_olahan on pengiriman_bahan_olahan.id_permintaan=permintaan_bahan_olahan.id join user_resto on user_resto.id=permintaan_bahan_olahan.id_user_produksi join resto on resto.id=user_resto.id_resto join bahan_olahan on bahan_olahan.id=pengiriman_bahan_olahan.id_bahan_olahan where permintaan_bahan_olahan.status='diterima'";
	  $data['data2']=$this->db->query($sql2)->result();
	  $this->load->view('modul_superadmin/laporan_penerimaan_bahan',$data);
	}

}
