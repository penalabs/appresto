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
		$owner = $this->input->post('owner');
		$bendahara = $this->input->post('bendahara');
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
		'id_owner'=>$owner,
		'id_bendahara' => $bendahara,
		'tanggal' => $tanggal,
		'jumlah_investasi' => $jumlah_investasi,
		'jangka_waktu' => $jangka_waktu,
		'persentase_omset' => $persentase_omset,
		'jumlah_omset' => $jumlah_omset,
		);

		$data['data'] = $this->m_modul_superadmin->update_data($where,$data,'investasi_owner');
		redirect('superadmin/edit_investasi/?id='.$id);
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

}
