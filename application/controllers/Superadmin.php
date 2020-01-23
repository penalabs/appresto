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
	public function users(){
		if(isset($_GET['user'])){
			 $tipe=$_GET['user'];
			if($tipe=="logistik" || $tipe=="bendahara" || $tipe=="general manajer"){

				$where = array(
					'tipe' => $tipe,
				);
				$data['data'] = $this->m_modul_superadmin->tampil_data_where('user_kanwil',$where)->result();
			}else	if($tipe=="superadmin"){
				$data['data'] = $this->m_modul_superadmin->tampil_data($tipe)->result();

				}
			}
	$this->load->view('modul_superadmin/user',$data);
	}

	// public function user_bendahara(){
	// 	$where = array(
	// 		'tipe' => 'bendahara',
	// 	);
	// $data['data'] = $this->m_modul_superadmin->tampil_data_where('user_kanwil',$where)->result();
	// $this->load->view('modul_superadmin/user_bendahara',$data);
	// }

	public function add_user()
	{
		if(isset($_GET['tipe'])){
			echo $tipe=$_GET['tipe'];
			if($tipe=="logistik" || $tipe=="bendahara" || $tipe=="general manajer"){
				$this->load->view('modul_superadmin/add_user');
		}else{
				$this->load->view('modul_superadmin/add_user2');
			}
		}
	}

	public function edit_user()
	{
		$id=$_GET['id'];
		if(isset($_GET['tipe'])){
			echo $tipe=$_GET['tipe'];
			if($tipe=="logistik" || $tipe=="bendahara" || $tipe=="general manajer"){
				$tabel='user_kanwil';
				$where = array('id' => $id);
				$data['data'] = $this->m_modul_superadmin->tampil_data_where($tabel,$where)->result();
				$this->load->view('modul_superadmin/edit_user',$data);
			}else{
				$tipe=$_GET['tipe'];
				$tabel=$tipe;
				$where = array('id' => $id);
				$data['data'] = $this->m_modul_superadmin->tampil_data_where($tabel,$where)->result();
				$this->load->view('modul_superadmin/edit_user',$data);
			}
		}

	}
	public function action_update_user()
	{
		 $session_id = $this->session->userdata('id');
		 $id = $this->input->post('id');
		$tipe = $this->input->post('tipe');
		$nama = $this->input->post('nama');
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$tabel="";
		if($tipe=="logistik" || $tipe=="bendahara" || $tipe=="general manajer"){
			$tabel='user_kanwil';
			$data = array(
			'id_super_admin'=>$session_id,
			'id_kanwil' => $id_kanwil,
			'nama' => $nama,
			'user' => $user,
			'pass' => $pass,
			'alamat' => $alamat,
			'telp' => $telp,
			'email' => $email,
			'tipe' => $tipe,
			);
			$where = array(
			'id' => $id
			);
		$this->m_modul_superadmin->update_data($where,$data,$tabel);
		redirect('superadmin/users?user='.$tipe);
	}else if($tipe=="superadmin"){
			$tabel=$tipe;
			$data = array(
			'nama' => $nama,
			'user' => $user,
			'pass' => $pass,
			'alamat' => $alamat,
			'telp' => $telp,
			'email' => $email,
			);
			$where = array(
			'id' => $id
			);
		$this->m_modul_superadmin->update_data($where,$data,$tabel);
		redirect('superadmin/users?user='.$tipe);
		}

	}

	public function action_add_user()
	{
		$session_id = $this->session->userdata('id');
		$tipe = $this->input->post('tipe');
		$nama = $this->input->post('nama');
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$id_kanwil = $this->input->post('id_kanwil');
		$tabel="";
		if($tipe=="logistik" || $tipe=="bendahara" || $tipe=="general manajer"){
			$tabel='user_kanwil';
			$data = array(
			'id_super_admin'=>$session_id,
			'id_kanwil' => $id_kanwil,
			'nama' => $nama,
			'user' => $user,
			'pass' => $pass,
			'alamat' => $alamat,
			'telp' => $telp,
			'email' => $email,
			'tipe' => $tipe,
			);
			$this->m_modul_superadmin->input_data($data,$tabel);
			redirect('superadmin/users?user='.$tipe);
		}if($tipe=="superadmin"){
			$tabel='superadmin';
			$data = array(
			'nama' => $nama,
			'user' => $user,
			'pass' => $pass,
			'alamat' => $alamat,
			'telp' => $telp,
			'email' => $email,
			);
			$this->m_modul_superadmin->input_data($data,$tabel);
			redirect('superadmin/users?user='.$tipe);
		}else{
			$tabel=$tipe;
			$saldo_rek = $this->input->post('saldo_rek');
			$data = array(
			'id_super_admin'=>$session_id,
			'nama' => $nama,
			'user' => $user,
			'pass' => $pass,
			'alamat' => $alamat,
			'telp' => $telp,
			'email' => $email,
			'saldo_rek'=>$saldo_rek,
			);
			$this->m_modul_superadmin->input_data($data,$tabel);
			redirect('superadmin/owners?user='.$tipe);
		}

	}

	public function hapus_user()
	{
		$session_id = $this->session->userdata('id');
		$tipe = $this->input->get('tipe');
		$id = $this->input->get('id');
		$tabel="";
		if($tipe=="logistik" || $tipe=="bendahara" || $tipe=="general manajer"){
			$tabel='user_kanwil';
			$where = array(
			'id' => $id,
			);
			$this->m_modul_superadmin->hapus_data($where,$tabel);
			redirect('superadmin/users?user='.$tipe);
		}else if($tipe=="superadmin"){
			$tabel='superadmin';
			$where = array(
			'id' => $id,
			);
			$this->m_modul_superadmin->hapus_data($where,$tabel);
			redirect('superadmin/users?user='.$tipe);
		}else{
			$tabel=$tipe;
			$where = array(
			'id'=>$id,
			);
			$this->m_modul_superadmin->hapus_data($where,$tabel);
			redirect('superadmin/owners?user='.$tipe);
		}

	}

	public function laporan_bagi_hasil_owner()
	{
		$sql2 = "SELECT investasi_owner.id,owner.nama as nama_owner,user_kanwil.nama as nama_bendahara,investasi_owner.tanggal,investasi_owner.jumlah_investasi,investasi_owner.jangka_waktu,investasi_owner.persentase_omset FROM investasi_owner join user_kanwil on user_kanwil.id=investasi_owner.id_bendahara join owner on owner.id=investasi_owner.id_owner";

		$data['data'] = $this->db->query($sql2)->result();
		$this->load->view('modul_superadmin/investasi_owner',$data);
	}

	public function  action_add_penyusutan(){
		$session_id = $this->session->userdata('id');
		$id_investasi_owner = $this->input->post('id');
		$tanggal = $this->input->post('tanggal');
		$penyusutan_invest = $this->input->post('penyusutan_invest');

			$data = array(
			'id_investasi_owner' => $id_investasi_owner,
			'id_super_admin'=>$session_id,
			'tanggal' => $tanggal,
			'penyusutan_invest' => $penyusutan_invest,
			);
			$this->m_modul_superadmin->input_data($data,'omset_investasi_owner');
			redirect('superadmin/detail_investasi?id='.$id_investasi_owner);
	}
	public function detail_investasi()
	{
		$id = $this->input->get('id');
		$sql2 = "SELECT * from omset_investasi_owner where id_investasi_owner='$id'";
		$data['data'] = $this->db->query($sql2)->result();
		$this->load->view('modul_superadmin/detail_investasi',$data);
	}

	public function laporan_investasi_owner()
	{
		$sql2 = "SELECT investasi_owner.id,owner.nama as nama_owner,user_kanwil.nama as nama_bendahara,investasi_owner.tanggal,investasi_owner.jumlah_investasi,investasi_owner.jangka_waktu,investasi_owner.persentase_omset FROM investasi_owner join user_kanwil on user_kanwil.id=investasi_owner.id_bendahara join owner on owner.id=investasi_owner.id_owner";

		$data['data'] = $this->db->query($sql2)->result();
		$this->load->view('modul_superadmin/laporan_bagi_hasil_owner',$data);
	}

	public function manajemen_kanwil()
	{
		$data['data'] = $this->m_modul_superadmin->tampil_data('kanwil')->result();
		$this->load->view('manajemen/kanwil',$data);
	}
	function tambah_kanwil_aksi(){
			$alamat_kantor = $this->input->post('alamat_kantor');
			$telp = $this->input->post('telp');

			$data = array(
				'alamat_kantor' => $alamat_kantor,
				'telp' => $telp,
				);
			$this->m_modul_superadmin->input_data($data,'kanwil');
		redirect('superadmin/manajemen_kanwil');
	}


	function hapus_kanwil(){
		echo $id = $this->input->get('id');
		$where = array('id_kanwil' => $id);
		$this->m_modul_superadmin->hapus_data($where,'kanwil');
		redirect('superadmin/manajemen_kanwil');
	}

		function update_kanwil(){
		$id = $this->input->post('id');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');

		$data = array(
			'alamat_kantor' => $alamat,
			'telp' => $pekerjaan
		);

		$where = array(
			'id' => $id
		);

		$this->m_modul_superadmin->update_data($where,$data,'kanwil');
		redirect('superadmin/manajemen_kanwil');
	}
	public function owners()
	{
		$data['data'] = $this->m_modul_superadmin->tampil_data('owner')->result();
		$this->load->view('modul_superadmin/owners',$data);
	}

	public function add_owner()
	{
		$this->load->view('modul_superadmin/add_owner');
	}

	function tambah_owner_aksi(){
		$session_id = $this->session->userdata('id');
		$tipe = $this->input->post('tipe');
		$nama = $this->input->post('nama');
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$saldo_rek = $this->input->post('saldo_rek');

			$data = array(
				'id_super_admin'=>$session_id,
				'nama' => $nama,
				'user' => $user,
				'pass' => $pass,
				'alamat' => $alamat,
				'telp' => $telp,
				'email' => $email,
				'saldo_rek'=>$saldo_rek,
				);
			$this->m_modul_superadmin->input_data($data,'owner');
		redirect('superadmin/owners');
	}

	function hapus_owner(){
		echo $id = $this->input->get('id');
		$where = array('id' => $id);
		$this->m_modul_superadmin->hapus_data($where,'owner');
		redirect('superadmin/owners');
	}

	public function edit_owner()
	{
				$id=$_GET['id'];
				$where = array('id' => $id);
				$data['data'] = $this->m_modul_superadmin->tampil_data_where('owner',$where)->result();
				$this->load->view('modul_superadmin/edit_owner',$data);
	}

	public function action_update_owner()
	{
		$session_id = $this->session->userdata('id');
		$id = $this->input->post('id');
		$tipe = $this->input->post('tipe');
		$nama = $this->input->post('nama');
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$saldo_rek= $this->input->post('saldo_rek');

			$data = array(
			'nama' => $nama,
			'user' => $user,
			'pass' => $pass,
			'alamat' => $alamat,
			'telp' => $telp,
			'email' => $email,
			'saldo_rek' => $saldo_rek,
			);
			$where = array(
			'id' => $id
			);
		$this->m_modul_superadmin->update_data($where,$data,'owner');
		redirect('superadmin/owners');


	}




	public function manajemen_resto()
	{

		$this->load->view('manajemen/resto');
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
		// $where = array(
		// 	'id_user_kasir' => $id_user_kasir,
		// );
    // $x['data']=$this->m_modul_superadmin->tampil_data_where('pendapatan_kas_masuk',$where)->result();

		$sql2 = "SELECT * FROM pendapatan_kas_masuk join user_kanwil on user_kanwil.id=pendapatan_kas_masuk.id_user_bendahara ";

		$x['data'] = $this->db->query($sql2)->result();

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

		//Pengeluaran Biaya Oprasional
	public function pengeluaranbiayaoprasional_view(){
		//$data['pengeluaranbiayaoprasional'] = $this->m_modul_superadmin->tampil_data('pengeluaran_cabang_operasional')->result();
		$data['data_cabang_resto'] = $this->m_modul_superadmin->tampil_data('resto')->result();
		//$id_admin_resto=$this->session->userdata('id');
		$sql = "SELECT pengeluaran_cabang_operasional.tanggal,pengeluaran_cabang_operasional.masa_sewa,pengeluaran_cabang_operasional.nominal,operasional.nama_pengeluaran,pengeluaran_cabang_operasional.id as id_operasional FROM pengeluaran_cabang_operasional join operasional on operasional.id=pengeluaran_cabang_operasional.id_operasional where id_resto=''";
		$data['pengeluaranbiayaoprasional']=$this->db->query($sql)->result();
		$this->load->view('modul_superadmin/V_pengeluaranbiayaoprasional_view', $data);
	}

	public function cari_pengeluaranbiayaoprasional_view(){
		//$data['pengeluaranbiayaoprasional'] = $this->m_modul_superadmin->tampil_data('pengeluaran_cabang_operasional')->result();
		$data['data_cabang_resto'] = $this->m_modul_superadmin->tampil_data('resto')->result();
		$cari_id_resto = $this->input->post('cari_id_resto');
		//$id_admin_resto=$this->session->userdata('id');
		$sql = "SELECT pengeluaran_cabang_operasional.*,operasional.*,pengeluaran_cabang_operasional.id as id_operasional FROM pengeluaran_cabang_operasional join operasional on operasional.id=pengeluaran_cabang_operasional.id_operasional where id_resto='$cari_id_resto'";
		//echo "datane broo : ".$cari_id_resto;
		$data['pengeluaranbiayaoprasional']=$this->db->query($sql)->result();
		$this->load->view('modul_superadmin/V_pengeluaranbiayaoprasional_view', $data);
	}

	public function pengeluaranbiayaoprasional_tambah(){
		$this->load->view('modul_superadmin/V_pengeluaranbiayaoprasional_tambah');
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
		$this->m_modul_superadmin->input_data($datainput, 'pengeluaran_cabang_operasional');
		redirect('superadmin/cari_pengeluaranbiayaoprasional_view');
	}

	public function pengeluaranbiayaoprasional_edit(){
		//$where = array('id_pengeluaran_kebutuhan' => $id);
		$id		= $this->input->get('id');
		$sql = "SELECT pengeluaran_cabang_operasional.*,operasional.*,resto.*,pengeluaran_cabang_operasional.id as id_operasional 
		FROM pengeluaran_cabang_operasional 
		join operasional on operasional.id=pengeluaran_cabang_operasional.id_operasional 
		join resto on resto.id=pengeluaran_cabang_operasional.id_resto
		where pengeluaran_cabang_operasional.id='$id'";
		$data['pengeluaranbiayaoprasional_edit']=$this->db->query($sql)->result();
		$this->load->view('modul_superadmin/V_pengeluaranbiayaoprasional_edit', $data);
	}

	public function pengeluaranbiayaoprasional_updateaksi(){
		$id		= $this->input->post('id');
		$id_operasional		= $this->input->post('idops');
		$id_resto		= $this->input->post('id_resto');
		$id_kanwil		= $this->input->post('id_kanwil');
		$id_admin_resto		= $this->input->post('id_admin_resto');
		$nominal	= $this->input->post('nominal');
		$tanggal	= date('Y-m-d');
		$masa_sewa	= $this->input->post('masa_sewa');
		$datainput = array(
			'id_operasional'	=> $id_operasional,
			'nominal'	=> $nominal,
			'tanggal'	=> $tanggal,
			'masa_sewa'	=> $masa_sewa,
			'id_kanwil'	=> $id_kanwil,
			'id_admin_resto'	=> $id_admin_resto,
			'id_resto'	=> $id_resto
		);
		$where = array('id' => $id);
		$this->m_modul_superadmin->update_data($where,$datainput, 'pengeluaran_cabang_operasional');
		redirect('superadmin/cari_pengeluaranbiayaoprasional_view');
	}

	public function pengeluaranbiayaoprasional_hapus($id_pengeluaran_kebutuhan){
		$where = array('id' => $id_pengeluaran_kebutuhan);
		$this->m_modul_superadmin->hapus_data($where, 'pengeluaran_cabang_operasional');
		redirect('superadmin/pengeluaranbiayaoprasional_view');
	}

	//----- data_kas_keluar_cabang
	public function data_kas_keluar_cabang()
	{
		$data['data_kas_masuk_cabang'] = $this->m_modul_superadmin->tampil_data_kas_masuk_cabang()->result();
		$data['data_kas_keluar_cabang'] = $this->m_modul_superadmin->tampil_data_kas_keluar_cabang()->result();
		$data['data_resto'] = $this->m_modul_superadmin->tampil_data_resto()->result();
		$this->load->view('modul_superadmin/kas_keluar_cabang',$data);
	}
	public function tambah_data_kas_keluar_cabang()
	{
		$resto = $this->input->post('resto');
		$nominal = $this->input->post('nominal');
		$tanggal = $this->input->post('tanggal');

		$this->m_modul_superadmin->tambah_data_kas_keluar_cabang($resto,$tanggal,$nominal);
		redirect('superadmin/data_kas_keluar_cabang');
	}
	public function edit_data_kas_keluar_cabang()
	{
		$id_kas_keluar_cabang = $this->uri->segment('3');
		$edit_data_kas_keluar_cabang = $this->m_modul_superadmin->edit_data_kas_keluar_cabang($id_kas_keluar_cabang)->result();
		echo json_encode($edit_data_kas_keluar_cabang);
	}
	public function delete_data_kas_keluar_cabang()
	{
		$id_kas_keluar_cabang = $this->uri->segment('3');

		$this->m_modul_superadmin->delete_data_kas_keluar_cabang($id_kas_keluar_cabang);
		redirect('superadmin/data_kas_keluar_cabang');
	}
	//-----------------------------



	// ................................
	public function gaji()
	{
		$sql = "SELECT user_resto.id as id_user_resto,user_resto.nama,gaji.* FROM gaji join user_resto on user_resto.id=gaji.id_user_resto";
		$data['data']=$this->db->query($sql)->result();
		$this->load->view('modul_superadmin/gaji',$data);
	}
	public function add_gaji()
	{

		$this->load->view('modul_superadmin/add_gaji');
	}

	public function action_add_gaji()
	{
		$session_id = $this->session->userdata('id');
		$id_user_resto = $this->input->post('id_user_resto');
		$id_resto = $this->input->post('id_resto');
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$jenis_gaji = $this->input->post('jenis_gaji');
		$nominal_gaji = $this->input->post('nominal_gaji');


			$data = array(
			'id_user_resto' => $id_user_resto,
			'id_resto' => $id_resto,
			'tanggal_awal' => $tanggal_awal,
			'tanggal_akhir' => $tanggal_akhir,
			'jenis_gaji' => $jenis_gaji,
			'nominal_gaji' => $nominal_gaji,
			);
			$this->m_modul_superadmin->input_data($data,'gaji');
			redirect('superadmin/gaji');

	}
	public function edit_gaji()
	{

		$this->load->view('modul_superadmin/edit_gaji');
	}

	public function action_edit_gaji()
	{
		$session_id = $this->session->userdata('id');
		$id = $this->input->post('id');
		$id_user_resto = $this->input->post('id_user_resto');
		$id_resto = $this->input->post('id_resto');
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$jenis_gaji = $this->input->post('jenis_gaji');
		$nominal_gaji = $this->input->post('nominal_gaji');

			$where = array(
			'id'=>$id,
			);

			$data = array(
			'id_user_resto' => $id_user_resto,
			'id_resto' => $id_resto,
			'tanggal_awal' => $tanggal_awal,
			'tanggal_akhir' => $tanggal_akhir,
			'jenis_gaji' => $jenis_gaji,
			'nominal_gaji' => $nominal_gaji,
			);
			$data['data'] = $this->m_modul_superadmin->update_data($where,$data,'gaji');
			redirect('superadmin/gaji');

	}
	function hapus_gaji(){
		echo $id = $this->input->get('id');
		$where = array('id' => $id);
		$this->m_modul_superadmin->hapus_data($where,'gaji');
		redirect('superadmin/gaji');
	}

	public function intensif($id)
	{
		$sql = "SELECT user_resto.* ,intensif_waiters.* ,gaji.*
		FROM intensif_waiters 
		join user_resto on user_resto.id=intensif_waiters.id_user_resto
		join gaji on gaji.id_user_resto = intensif_waiters.id_user_resto
		WHERE gaji.id_user_resto='$id'";
		$data['data']=$this->db->query($sql)->result();
		$this->load->view('modul_superadmin/intensif',$data);
	}

	public function laporan_transaksi()
	{

		$this->load->view('modul_superadmin/laporan_transaksi');
	}

	public function kinerja_karyawan(){
		$sql = "SELECT tbl_kinerja_karyawan.*, user_resto.*, pemesanan.* ,SUM(point) AS jml_point
		FROM tbl_kinerja_karyawan
		JOIN user_resto ON user_resto.id = tbl_kinerja_karyawan.id_user_resto
		JOIN pemesanan ON pemesanan.id = tbl_kinerja_karyawan.pemesanan";
		$data['data']=$this->db->query($sql)->result();
		$this->load->view('modul_superadmin/V_kinerja_karyawan',$data);
	}

	public function view_kinerja($id){
		$sql = "SELECT tbl_kinerja_karyawan.*, user_resto.*, pemesanan.*
		FROM tbl_kinerja_karyawan
		JOIN user_resto ON user_resto.id = tbl_kinerja_karyawan.id_user_resto
		JOIN pemesanan ON pemesanan.id = tbl_kinerja_karyawan.pemesanan
		WHERE tbl_kinerja_karyawan.id_user_resto='$id'";
		$data['data']=$this->db->query($sql)->result();
		$this->load->view('modul_superadmin/V_view_kinerja',$data);
	}

	public function view_user_resto(){
		
	}
}

//aku coba coba