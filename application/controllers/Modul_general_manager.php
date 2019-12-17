<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_general_manager extends CI_Controller {

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
		$this->load->model(array('m_modul_general_manager','M_modul_general_manager'));
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}

	}
	public function permintaan_investasi()
	{
		$id_user_kanwil=$this->session->userdata('id');
		$sql1 = "SELECT id_kanwil FROM user_kanwil WHERE id='$id_user_kanwil'";
		$data2=$this->db->query($sql1)->row();
		$id_kanwil=$data2->id_kanwil;

		$sql2 = "SELECT investasi_kanwil.status,investasi_kanwil.id,investasi_kanwil.tanggal,investasi_kanwil.nominal_investasi,investasi_kanwil.penyusutan,investasi_kanwil.nominal_saldo FROM investasi_kanwil  WHERE investasi_kanwil.id_kanwil='$id_kanwil'";
		$data['permintaaninvestasi'] = $this->db->query($sql2)->result();
		$this->load->view('modul_general_manager/V_permintaaninvestasi', $data);
	}
	public function permintaaninvestasi_tambah()
	{
		$this->load->view('modul_general_manager/V_permintaaninvestasi_tambah');
	}
	public function permintaaninvestasi_tambahaksi()
	{
		$tanggal					= $this->input->post('tanggal');
		$nominal_investasi= $this->input->post('nominal_investasi');
		$penyusutan				= $this->input->post('penyusutan');
		$id_kanwil				= $this->input->post('id_kanwil');
		$id_super_admin		= $this->input->post('id_super_admin');

		// $nominal			= $this->input->post('nominal');
		// $penyusutan			= $this->input->post('penyusutan');
		$datainput = array(
			'tanggal'				=> $tanggal,
			'id_kanwil'				=> $id_kanwil,
			'nominal_investasi'				=> $nominal_investasi,
			'penyusutan'				=> $penyusutan,
			'id_super_admin'				=> $id_super_admin,
			'status'				=> 'permintaan',
			// 'nominal'				=> $nominal,
			// 'nominal_penyusutan'	=> $penyusutan
		);
		$this->m_modul_general_manager->input_data($datainput, 'investasi_kanwil');
		redirect('modul_general_manager/permintaan_investasi');
	}

	public function permintaaninvestasi_edit()
	{
		$id=$this->input->get('id');
		$sql1 = "SELECT * FROM investasi_kanwil WHERE id='$id'";
		$data['investasi_kanwil']=$this->db->query($sql1)->row();
		$this->load->view('modul_general_manager/V_permintaaninvestasi_edit', $data);
	}
	public function permintaaninvestasi_hapus()
	{

		echo $id=$this->input->get('id');

		$where = array('id' => $id);
		$this->m_modul_general_manager->hapus_data($where, 'investasi_kanwil');

		redirect('modul_general_manager/permintaan_investasi');
	}
	public function permintaaninvestasi_editaksi()
	{
		$tanggal					= $this->input->post('tanggal');
		$nominal_investasi= $this->input->post('nominal_investasi');
		$penyusutan				= $this->input->post('penyusutan');
		$id_kanwil				= $this->input->post('id_kanwil');
		$id								= $this->input->post('id');
		// $nominal			= $this->input->post('nominal');
		// $penyusutan			= $this->input->post('penyusutan');
		$where = array('id' => $id);
		$datainput = array(
			'tanggal'				=> $tanggal,
			'id_kanwil'				=> $id_kanwil,
			'nominal_investasi'				=> $nominal_investasi,
			'penyusutan'				=> $penyusutan,
			'status'				=> 'permintaan',
			// 'nominal'				=> $nominal,
			// 'nominal_penyusutan'	=> $penyusutan
		);

		$this->m_modul_general_manager->update_data($where, $datainput, 'investasi_kanwil');
		redirect('modul_general_manager/permintaan_investasi');
	}





	public function bendahara_pengeluaran_investasi()
	{
		$id_bendahara=$this->session->userdata('id');
		$data['data_pengeluaran_investasi_cabang']=$this->M_modul_general_manager->data_pengeluaran_invest_cabang('')->result();
		$this->load->view('modul_general_manager/vc_pengeluaran_investasi',$data);
	}

	public function bendahara_pengeluaran_investasi_tambah()
	{
		$data['data_cabang_resto']=$this->M_modul_general_manager->data_cabang_resto()->result();
		//$data['data_investasi_cabang']=$this->M_modul_general_manager->data_investasi_cabang()->result();
		//$data['data_peralatan']=$this->M_modul_general_manager->data_peralatan()->result();
		$this->load->view('modul_general_manager/vc_pengeluaran_investasi_tambah',$data);
	}

	public function bendahara_pengeluaran_investasi_tambahaksi()
	{
		$id_bendahara=$this->session->userdata('id');
		$nama_cabang	= $this->input->post('nama_cabang');
		//$id_pemberian_kas_keluar	= $this->input->post('id_pemberian_kas_keluar');
		$nama_investasi				= $this->input->post('nama_investasi');
		$tanggal_mulai				= $this->input->post('tanggal_mulai');
		$tanggal_selesai 	= $this->input->post('tanggal_selesai');
		$jumlah_pengeluaran			= $this->input->post('jumlah_pengeluaran');
		$persen_susut		= $this->input->post('persen_susut');

		$datainput = array(
			'id_resto'				=> $nama_cabang,
			//'id_pemberian_kas_keluar'=> $id_pemberian_kas_keluar,
			'id_user_bendahara'				=> $id_bendahara,
			'nama_investasi'				=> $nama_investasi,
			'tanggal_mulai'				=> $tanggal_mulai,
			'tanggal_selesai'		=> $tanggal_selesai,
			'jumlah_pengeluaran'				=> $jumlah_pengeluaran,
			'persen_penyusutan'				=> $persen_susut,

		);
		$this->M_modul_general_manager->input_data($datainput,'investasi_cabang');
		redirect('modul_general_manager/bendahara_pengeluaran_investasi');
	}

	public function edit_bendahara_pengeluaran_investasi($id)
	{
		//$data['data_cabang_resto']=$this->M_modul_general_manager->data_cabang_resto()->result();
		//$data['data_investasi_cabang']=$this->M_modul_general_manager->data_investasi_cabang()->result();
		//$data['data_peralatan']=$this->M_modul_general_manager->data_peralatan()->result();
		$data['data_pengeluaran_invest_cabang']=$this->M_modul_general_manager->data_pengeluaran_invest_cabang_edit($id)->result();
		$this->load->view('modul_general_manager/vc_pengeluaran_investasi_edit',$data);
	}

	public function bendahara_pengeluaran_investasi_editaksi()
	{


		$id	= $this->input->get('id');
		$datainput = array(
			'status'				=> 'disetujui',
		);
		$where = array('id' => $id);
		$this->M_modul_general_manager->update_data($where,$datainput,'investasi_cabang');
		//redirect('modul_general_manager/bendahara_pengeluaran_investasi');
	}

	public function hapus_bendahara_pengeluaran_investasi($id)
	{
		$where = array('id' => $id);
		$this->M_modul_general_manager->hapus_data($where,'investasi_cabang');
		redirect('modul_general_manager/pengeluaran_investasi');
	}

	// ................................
	public function gaji()
	{
		$sql = "SELECT user_resto.id as id_user_resto,user_resto.nama,gaji.* FROM gaji join user_resto on user_resto.id=gaji.id_user_resto";
		$data['data']=$this->db->query($sql)->result();
		$this->load->view('modul_general_manager/gaji',$data);
	}
	public function add_gaji()
	{

		$this->load->view('modul_general_manager/add_gaji');
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
			$this->m_modul_general_manager->input_data($data,'gaji');
			redirect('general_manager/gaji');

	}
	public function edit_gaji()
	{

		$this->load->view('modul_general_manager/edit_gaji');
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
			$data['data'] = $this->m_modul_general_manager->update_data($where,$data,'gaji');
			redirect('general_manager/gaji');

	}
	function hapus_gaji(){
		echo $id = $this->input->get('id');
		$where = array('id' => $id);
		$this->m_modul_general_manager->hapus_data($where,'gaji');
		redirect('general_manager/gaji');
	}

	public function intensif()
	{
		$sql = "SELECT user_resto.nama,intensif_waiters.* FROM intensif_waiters join user_resto on user_resto.id=intensif_waiters.id_user_resto";
		$data['data']=$this->db->query($sql)->result();
		$this->load->view('modul_general_manager/intensif',$data);
	}
}
