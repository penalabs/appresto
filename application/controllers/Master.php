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
			$id_user=$this->session->userdata('id');
			if($user=="superadmin"){
			$data['data'] = $this->m_master->tampil_data($user)->result();
			$this->load->view('master/superadmin',$data);
			}else if($user=="general manajer"){
				$sql2 = "SELECT id_kanwil FROM user_resto where id='$id_user'";
				$id_kanwil=$this->db->query($sql2)->row();

				$where = array(
					'tipe' => $user,
					// 'id_kanwil'=>$id_kanwil->id_kanwil
				);
			$data['data'] = $this->m_master->tampil_data_where('user_kanwil',$where)->result();
			$this->load->view('master/users',$data);
			}else if($user=="bendahara"){
				$sql2 = "SELECT id_kanwil FROM user_resto where id='$id_user'";
				$id_kanwil=$this->db->query($sql2)->row();
				$id_kanwil->id_kanwil;
				$where = array(
					'tipe' => $user,
					// 'id_kanwil'=>$id_kanwil->id_kanwil
				);
			$data['data'] = $this->m_master->tampil_data_where('user_kanwil',$where)->result();
			$this->load->view('master/users',$data);
			}else if($user=="logistik"){
				$sql2 = "SELECT id_kanwil FROM user_resto where id='$id_user'";
				$id_kanwil=$this->db->query($sql2)->row();

				$where = array(
					'tipe' => $user,
					// 'id_kanwil'=>$id_kanwil->id_kanwil
				);
			$data['data'] = $this->m_master->tampil_data_where('user_kanwil',$where)->result();
			$this->load->view('master/users',$data);
			}else{
				$sql2 = "SELECT id_kanwil FROM user_resto where id='$id_user'";
				$id_kanwil=$this->db->query($sql2)->row();

				$where = array(
					'jenis' => $user,
					// 'id_kanwil'=>$id_kanwil->id_kanwil
				);
			$data['data'] = $this->m_master->tampil_data_where('user_resto',$where)->result();
			$this->load->view('master/users',$data);
			}
		}
	}
	public function owners()
	{
		$data['data'] = $this->m_master->tampil_data('owner')->result();
		$this->load->view('master/owners',$data);
	}

	public function kanwils()
	{

		$this->load->view('manajemen/kanwil');
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
		}else if($tipe=="admin resto" || $tipe=="kasir" || $tipe=="produksi" || $tipe=="waiters"){
			$tabel='user_resto';
			$id_kanwil = $this->input->post('id_kanwil');
			$id_resto = $this->input->post('id_resto');
			$data = array(
			'id_kanwil'=>$id_kanwil,
			'id_resto'=>$id_resto,
			'nama' => $nama,
			'user' => $user,
			'pass' => $pass,
			'alamat' => $alamat,
			'telp' => $telp,
			'jenis' => $tipe,
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
		if(isset($_GET['tipe']) && $_GET['tipe']=="waiters"){
			$this->load->view('master/add_user2');
		}else{
			$this->load->view('master/add_user');
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
				$data['data'] = $this->m_master->tampil_data_where($tabel,$where)->result();
				$this->load->view('master/edit_user',$data);
			}else if($tipe=="waiters"){
				$tabel='user_resto';
				$where = array('id' => $id);
				$data['data'] = $this->m_master->tampil_data_where($tabel,$where)->result();
				$this->load->view('master/edit_user2',$data);
			}else{
				$tipe=$_GET['tipe'];
				$tabel=$tipe;
				$where = array('id' => $id);
				$data['data'] = $this->m_master->tampil_data_where($tabel,$where)->result();
				//$this->load->view('master/edit_owner',$data);
			}
		}

	}
	public function action_update_user()
	{
		echo $session_id = $this->session->userdata('id');
		echo $id = $this->input->post('id');
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
		}else if($tipe=="waiters"){
			$tabel='user_resto';
			$id_kanwil = $this->input->post('id_kanwil');
			$id_resto = $this->input->post('id_resto');
			$data = array(
			'id_kanwil'=>$id_kanwil,
			'id_resto'=>$id_resto,
			'nama' => $nama,
			'user' => $user,
			'pass' => $pass,
			'alamat' => $alamat,
			'telp' => $telp,
			'jenis' => $tipe,
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
			$this->m_master->hapus_data($where,$tabel);
			redirect('master/users?user='.$tipe);
		}else if($tipe=="admin resto" || $tipe=="kasir" || $tipe=="produksi" || $tipe=="waiters"){
			$tabel='user_resto';
			$where = array(
			'id' => $id,
			);
			$this->m_master->hapus_data($where,$tabel);
			redirect('master/users?user='.$tipe);
		}else{
			$tabel=$tipe;
			$where = array(
			'id'=>$id,
			);
			$this->m_master->hapus_data($where,$tabel);
			redirect('master/owners?user='.$tipe);
		}

	}



	public function index_kantor_wilayah()
	{
		$this->load->view('master/kantor_wilayah');
	}
	public function data_kantor_wilayah()
	{
		$data_kantor_wilayah = $this->m_master->data_kantor_wilayah()->result();
		echo json_encode($data_kantor_wilayah);
	}
	public function tambah_kantor_wilayah()
	{
		$id_kanwil = $this->uri->segment('3');
		$alamat = $this->input->post('alamat_kantor_tambah');

		echo $alamat;

		$telp = $this->input->post('telp_tambah');
		$this->m_master->tambah_kantor_wilayah($alamat,$telp);
		redirect('master/index_kantor_wilayah');
	}
	public function edit_kantor_wilayah()
	{
		$id_kanwil = $this->uri->segment('3');
		$edit_data_kantor_wilayah = $this->m_master->edit_kantor_wilayah($id_kanwil)->result();
		echo json_encode($edit_data_kantor_wilayah);
	}
	public function update_kantor_wilayah()
	{
		$id_kanwil_edit =  $this->input->post('id_kanwil_edit');
		$alamat_kantor_edit =  $this->input->post('alamat_kantor_edit');
		$telp_edit =  $this->input->post('telp_edit');
		$this->m_master->update_kantor_wilayah($id_kanwil_edit,$alamat_kantor_edit,$telp_edit);
		redirect('master/index_kantor_wilayah');
	}
	public function delete_kantor_wilayah()
	{
		$id_kanwil = $this->uri->segment('3');
		$this->m_master->delete_kantor_wilayah($id_kanwil);
		redirect('master/index_kantor_wilayah');
	}
}
