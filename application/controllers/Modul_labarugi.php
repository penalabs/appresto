<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_labarugi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_bendahara');
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$cabang = $this->input->post('cabang_resto');
		$data['cabang'] = $this->input->post('cabang_resto');
		$data['data_cabang_resto']=$this->M_bendahara->data_cabang_resto()->result();
		//$data['data_lp_cabang']=$this->M_bendahara->data_laporan_pengeluran_alat($cabang)->result();
		//$data['data_jum_storan']=$this->M_bendahara->data_jum_storan($cabang)->row();
		$data['data_lp_ic']=$this->M_bendahara->data_lp_ic($cabang)->result();
		$this->load->view('modul_laba_rugi/vc_labarugi',$data);
	}


}
