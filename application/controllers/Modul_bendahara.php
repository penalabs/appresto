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

	public function penyusutan_tambah()
	{
		$id_invest_cabang	= $this->input->get('id_invest_cabang');
		$sql = "SELECT jumlah_pengeluaran,persen_penyusutan  FROM investasi_cabang where id='$id_invest_cabang'";
		$penyusutan=$this->db->query($sql)->row();

		$tanggal=date('Y-m-d');
		echo $penyusutan->persen_penyusutan;
		echo $penyusutan->jumlah_pengeluaran;
		$jumlah_penyusutan=(int)$penyusutan->persen_penyusutan/100*(int)$penyusutan->jumlah_pengeluaran;

		$sql2 = "INSERT INTO penyusutan_investasi_cabang (id_investasi_cabang,  tanggal, nominal_penyusutan) VALUES ('$id_invest_cabang', '$tanggal', '$jumlah_penyusutan')";
		$this->db->query($sql2);

		redirect('modul_bendahara/bendahara_pengeluaran_investasi/?id_invest_cabang='.$id_invest_cabang);
	}

	public function bendahara_pengeluaran_investasi()
	{
		$id_bendahara=$this->session->userdata('id');
		$data['data_pengeluaran_investasi_cabang']=$this->M_bendahara->data_pengeluaran_invest_cabang($id_bendahara)->result();
		$this->load->view('modul_bendahara/vc_pengeluaran_investasi',$data);
	}

	public function bendahara_pengeluaran_investasi_tambah()
	{
		$data['data_cabang_resto']=$this->M_bendahara->data_cabang_resto()->result();
		//$data['data_investasi_cabang']=$this->M_bendahara->data_investasi_cabang()->result();
		//$data['data_peralatan']=$this->M_bendahara->data_peralatan()->result();
		$this->load->view('modul_bendahara/vc_pengeluaran_investasi_tambah',$data);
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
		$this->M_bendahara->input_data($datainput,'investasi_cabang');
		redirect('modul_bendahara/bendahara_pengeluaran_investasi');
	}

	public function edit_bendahara_pengeluaran_investasi($id)
	{
		//$data['data_cabang_resto']=$this->M_bendahara->data_cabang_resto()->result();
		//$data['data_investasi_cabang']=$this->M_bendahara->data_investasi_cabang()->result();
		//$data['data_peralatan']=$this->M_bendahara->data_peralatan()->result();
		$data['data_pengeluaran_invest_cabang']=$this->M_bendahara->data_pengeluaran_invest_cabang_edit($id)->result();
		$this->load->view('modul_bendahara/vc_pengeluaran_investasi_edit',$data);
	}

	public function bendahara_pengeluaran_investasi_editaksi()
	{

		$id_bendahara=$this->session->userdata('id');
		$id	= $this->input->post('id');
		$id_resto	= $this->input->post('id_resto');
		//$id_pemberian_kas_keluar	= $this->input->post('id_pemberian_kas_keluar');
		$nama_investasi				= $this->input->post('nama_investasi');
		$tanggal_mulai				= $this->input->post('tanggal_mulai');
		$tanggal_selesai 	= $this->input->post('tanggal_selesai');
		$jumlah_pengeluaran			= $this->input->post('jumlah_pengeluaran');
		$persen_susut		= $this->input->post('persen_susut');
		$datainput = array(
			'id_resto'				=> $id_resto,
			//'id_pemberian_kas_keluar'=> $id_pemberian_kas_keluar,
			'id_user_bendahara'				=> $id_bendahara,
			'nama_investasi'				=> $nama_investasi,
			'tanggal_mulai'				=> $tanggal_mulai,
			'tanggal_selesai'		=> $tanggal_selesai,
			'jumlah_pengeluaran'				=> $jumlah_pengeluaran,
			'persen_penyusutan'				=> $persen_susut,
		);
		$where = array('id' => $id);
		$this->M_bendahara->update_data($where,$datainput,'investasi_cabang');
		redirect('modul_bendahara/bendahara_pengeluaran_investasi');
	}

	public function hapus_bendahara_pengeluaran_investasi($id)
	{
		$where = array('id' => $id);
		$this->M_bendahara->hapus_data($where,'investasi_cabang');
		redirect('modul_bendahara/pengeluaran_investasi');
	}

	// public function setoran_kasir(){
	// 	$data['data_storan_kasir']=$this->M_bendahara->data_storan()->result();
	// 	$this->load->view('modul_bendahara/vc_storan_kasir',$data);
	// }

	public function laporan_investasi_cabang(){
		$cabang = $this->input->post('cabang_resto');
		$data['cabang'] = $this->input->post('cabang_resto');
		$data['data_cabang_resto']=$this->M_bendahara->data_cabang_resto()->result();
		$data['data_lp_cabang']=$this->M_bendahara->data_laporan_investasi_cabang($cabang)->result();
		//$data['data_jum_storan']=$this->M_bendahara->data_jum_storan($cabang)->row();
		//$data['data_lp_ic']=$this->M_bendahara->data_lp_ic($cabang)->result();
		$this->load->view('modul_bendahara/vc_investasi_cabang',$data);
	}
}
