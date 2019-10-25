<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_Invest extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}
	}

	public function cek_invest_cabang($id_resto)
	{
        $id_resto=$this->session->userdata('id_resto');
        $sql2 = "SELECT sum(nominal_investasi) as saldo_investasi FROM investasi_cabang where id_resto='$id_resto'";
        $data_pengeluaran=$this->db->query($sql2)->row();

        $saldo=$data_kas->saldo_investasi;
		return $saldo;
	}
}