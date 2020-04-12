<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('m_login');
		$this->load->model('m_master');

	}
	public function index()
	{
		$this->load->view('login');
	}
	function aksi_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'user' => $username,
			'pass' => $password,
			);
		$tipe= $this->input->post('tipe');

		if($tipe=="superadmin" || $tipe=="owner"){
			$tabel=$tipe;
			$cek = $this->m_login->cek_login($tabel,$where)->num_rows();
			$data=$this->m_login->tampil_user_where($tabel,$where)->row();
			$id=$data->id;

			if($cek > 0){
				$data_session = array(
					'id' => $id,
					'nama' => $username,
					'tipe' => $tipe,
					'status' => $tabel

					);

				$this->session->set_userdata($data_session);

				redirect(base_url("master/dasboard"));
				echo 1;
			}else{
				redirect(base_url("login?pesan=usernamesalah"));
				echo 2;
			}
		}else if($tipe=="logistik" || $tipe=="bendahara" || $tipe=="general manajer"){
			$tabel='user_kanwil';
			$cek = $this->m_login->cek_login($tabel,$where)->num_rows();
			$data=$this->m_login->tampil_user_where($tabel,$where)->row();
			$id=$data->id;
			$id_kanwil=$data->id_kanwil;
			if($cek > 0){
				$data_session = array(
					'id' => $id,
					'nama' => $username,
					'tipe' => $tipe,
					'status' => $tabel,
					'id_kanwil'=>$id_kanwil
					);

				$this->session->set_userdata($data_session);

				redirect(base_url("master/dasboard"));
				echo 3;
			}else{
				redirect(base_url("login?pesan=usernamesalah"));
				echo 4;
			}
		}else if($tipe=="kasir" || $tipe=="waiters" || $tipe=="produksi" || $tipe=="admin resto"){
			$tabel='user_resto';
			$cek = $this->m_login->cek_login($tabel,$where)->num_rows();
			$data=$this->m_login->tampil_user_where($tabel,$where)->row();
			$id=$data->id;
			$id_resto=$data->id_resto;
			$id_kanwil=$data->id_kanwil;
			if($cek > 0){
				$data_session = array(
					'id' => $id,
					'nama' => $username,
					'tipe' => $tipe,
					'status' => $tabel,
					'id_resto'=>$id_resto,
					'id_kanwil'=>$id_kanwil
					);

				$this->session->set_userdata($data_session);

				redirect(base_url("master/dasboard"));
				echo 3;
			}else{
				redirect(base_url("login?pesan=usernamesalah"));
				echo 4;
			}
		}else{
			redirect(base_url("login?pesan=masukkantipeuser"));
		}


	}
	function logout(){
		$this->session->sess_destroy();
		$this->session->set_userdata("");
		$data_session = array(
			'id' => '',
			'nama' => '',
			'tipe' => '',
			'status' => '',
			'id_kanwil'=>''
			);
		$this->session->set_userdata($data_session);
		redirect(base_url('login'));
	}

}
//ini coba
