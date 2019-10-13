<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_bendahara extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_bendahara');
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}
	}
	
	public function bendahara_pengeluaran_investasi()
	{
		$data['data_pengeluaran_cabang_alat']=$this->M_bendahara->data_pengeluaran_cabang_alat()->result();
		$this->load->view('modul_bendahara/vc_pengeluaran_investasi',$data);
	}

	public function bendahara_pengeluaran_investasi_tambah()
	{
		$data['data_cabang_resto']=$this->M_bendahara->data_cabang_resto()->result();
		//$data['data_investasi_cabang']=$this->M_bendahara->data_investasi_cabang()->result();
		$data['data_peralatan']=$this->M_bendahara->data_peralatan()->result();
		$this->load->view('modul_bendahara/vc_pengeluaran_investasi_tambah',$data);
	}

	public function bendahara_pengeluaran_investasi_tambahaksi()
	{
		$id_kanwil=$this->session->userdata('id_kanwil');
		$nama_cabang	= $this->input->post('nama_cabang');
		//$id_pemberian_kas_keluar	= $this->input->post('id_pemberian_kas_keluar');
		$alat				= $this->input->post('alat');
		$jumlah				= $this->input->post('jumlah');
		$masapemanfaatan 	= $this->input->post('masapemanfaatan');
		$nominal			= $this->input->post('nominal');
		$penyusutan			= $this->input->post('penyusutan');
		$datainput = array(
			'id_resto'				=> $nama_cabang,
			//'id_pemberian_kas_keluar'=> $id_pemberian_kas_keluar,
			'id_kanwil'				=> $id_kanwil,
			'id_alat'				=> $alat,
			'jumlah'				=> $jumlah,
			'masa_pemanfatan'		=> $masapemanfaatan,
			'nominal'				=> $nominal,
			'nominal_penyusutan'	=> $penyusutan
		);
		$this->M_bendahara->input_data($datainput,'pengeluaran_cabang_alat');
		redirect('modul_bendahara/bendahara_pengeluaran_investasi');
	}

	public function edit_bendahara_pengeluaran_investasi($id_pengeluaran_cabang)
	{
		$data['data_cabang_resto']=$this->M_bendahara->data_cabang_resto()->result();
		//$data['data_investasi_cabang']=$this->M_bendahara->data_investasi_cabang()->result();
		$data['data_peralatan']=$this->M_bendahara->data_peralatan()->result();
		$data['data_pengeluaran_cabang_alat']=$this->M_bendahara->data_pengeluaran_cabang_alat_edit($id_pengeluaran_cabang)->result();
		$this->load->view('modul_bendahara/vc_pengeluaran_investasi_edit',$data);
	}

	public function bendahara_pengeluaran_investasi_editaksi()
	{
		$id					= $this->input->post('id');
		$nama_cabang		= $this->input->post('nama_cabang');
		$jumlah				= $this->input->post('jumlah');
		$masapemanfaatan 	= $this->input->post('masapemanfaatan');
		$nominal			= $this->input->post('nominal');
		$penyusutan			= $this->input->post('penyusutan');
		$where = array('id_pengeluaran_cabang' => $id);
		$datainput = array(
			'id_resto'				=> $nama_cabang,
			'jumlah'				=> $jumlah,
			'masa_pemanfatan'		=> $masapemanfaatan,
			'nominal'				=> $nominal,
			'nominal_penyusutan'	=> $penyusutan
		);
		$this->M_bendahara->update_data($where,$datainput,'pengeluaran_cabang_alat');
		redirect('modul_bendahara/bendahara_pengeluaran_investasi');
	}

	public function hapus_bendahara_pengeluaran_investasi($id_pengeluaran_cabang)
	{
		$where = array('id_pengeluaran_cabang' => $id_pengeluaran_cabang);
		$this->M_bendahara->hapus_data($where,'pengeluaran_cabang_alat');
		redirect('bendahara_pengeluaran_investasi');
	}

	public function setoran_kasir(){
		$data['data_storan_kasir']=$this->M_bendahara->data_storan()->result();
		$this->load->view('modul_bendahara/vc_storan_kasir',$data);
	}

	public function laporan_investasi_cabang(){
		$cabang = $this->input->post('cabang_resto');
		$data['cabang'] = $this->input->post('cabang_resto');
		$data['data_cabang_resto']=$this->M_bendahara->data_cabang_resto()->result();
		$data['data_lp_cabang']=$this->M_bendahara->data_laporan_pengeluran_alat($cabang)->result();
		//$data['data_jum_storan']=$this->M_bendahara->data_jum_storan($cabang)->row();
		$data['data_lp_ic']=$this->M_bendahara->data_lp_ic($cabang)->result();
		$this->load->view('modul_bendahara/vc_investasi_cabang',$data);
	}
}