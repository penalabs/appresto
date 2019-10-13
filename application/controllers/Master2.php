<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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
		$this->load->model('m_master');
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}
 
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function dasboard()
	{
		$this->load->view('dasboard/index');
	}
	public function barang()
	{
		$this->load->view('master/barang');
	}
	public function users()
	{
		if(isset($_GET['user'])){
			
			$user=$_GET['user'];
			if($user=="superadmin"){
			$data['data'] = $this->m_master->tampil_data($user)->result();
			$this->load->view('master/superadmin',$data);
			}else if($user=="general manajer"){
				$where = array(
					'tipe' => $user
				);
			$data['data'] = $this->m_master->tampil_data_where('user_kanwil',$where)->result();
			$this->load->view('master/users',$data);
			}else if($user=="bendahara"){
				$where = array(
					'tipe' => $user
				);
			$data['data'] = $this->m_master->tampil_data_where('user_kanwil',$where)->result();
			$this->load->view('master/users',$data);
			}else if($user=="logistik"){
				$where = array(
					'tipe' => $user
				);
			$data['data'] = $this->m_master->tampil_data_where('user_kanwil',$where)->result();
			$this->load->view('master/users',$data);
			}
		}
	}
	public function owners()
	{
		
		$data['data'] = $this->m_master->tampil_data('owner')->result();
		$this->load->view('master/owners',$data);
	}
	public function restos()
	{
		$this->load->view('manajemen/resto');
	}
	public function kanwils()
	{
		
		$this->load->view('manajemen/kanwil',$data);
	}
	public function superadmins()
	{
		$this->load->view('manajemen/superadmin');
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
		$tabel="";
		if($tipe=="logistik" || $tipe=="bendahara" || $tipe=="general manajer"){
			$tabel='user_kanwil';
			$data = array(
			'id_super_admin'=>$session_id,
			'nama' => $nama,
			'user' => $user,
			'pass' => $pass,
			'alamat' => $alamat,
			'telp' => $telp,
			'email' => $email,
			'tipe' => $tipe,
			);
			$this->m_master->input_data($data,$tabel);
			redirect('master/users?user='.$tipe);
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
			$this->m_master->input_data($data,$tabel);
			redirect('master/owners?user='.$tipe);
		}
		
	}
	public function add_user()
	{
		$this->load->view('master/add_user');
	}
	public function edit_user()
	{
		$id=$_GET['id'];
		if(isset($_GET['tipe'])){
			$tipe=$_GET['tipe'];	
			if($tipe=="logistik" || $tipe=="bendahara" || $tipe=="general manajer"){
				$tabel='user_kanwil';
				$where = array('id' => $id);
				$data['data'] = $this->m_master->tampil_data_where($tabel,$where)->result();
				$this->load->view('master/edit_user',$data);
			}else{
				$tipe=$_GET['tipe'];
				$tabel=$tipe;
				$where = array('id' => $id);
				$data['data'] = $this->m_master->tampil_data_where($tabel,$where)->result();
				$this->load->view('master/edit_owner',$data);
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
		$this->m_master->update_data($where,$data,$tabel);
		redirect('master/users?user='.$tipe);
		}else{
			$saldo_rek = $this->input->post('saldo_rek');
			$tabel=$tipe;
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
			$where = array(
			'id' => $id
			);
		$this->m_master->update_data($where,$data,$tabel);
		redirect('master/owners?user='.$tipe);
		}
		
	}
}
