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
		$this->load->model('m_modul_general_manager');
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
}