<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_owner extends CI_Controller {

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
		$this->load->model('m_modul_owner');
		$this->load->model(array('m_modul_owner'));
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}

	}
	public function permintaan_investasi()
	{



		$this->load->view('modul_owner/V_permintaaninvestasi');
	}
	public function permintaaninvestasi_tambah()
	{
		$this->load->view('modul_owner/V_permintaaninvestasi_tambah');
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
		$this->m_modul_owner->input_data($datainput, 'investasi_kanwil');
		redirect('modul_owner/permintaan_investasi');
	}

	public function permintaaninvestasi_edit()
	{
		$id=$this->input->get('id');
		$sql1 = "SELECT * FROM investasi_kanwil WHERE id='$id'";
		$data['investasi_kanwil']=$this->db->query($sql1)->row();
		$this->load->view('modul_owner/V_permintaaninvestasi_edit', $data);
	}
	public function permintaaninvestasi_hapus()
	{

		echo $id=$this->input->get('id');

		$where = array('id' => $id);
		$this->m_modul_owner->hapus_data($where, 'investasi_kanwil');

		redirect('modul_owner/permintaan_investasi');
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

		$this->m_modul_owner->update_data($where, $datainput, 'investasi_kanwil');
		redirect('modul_owner/permintaan_investasi');
	}





	public function bendahara_pengeluaran_investasi()
	{
		$id_bendahara=$this->session->userdata('id');
		$data['data_pengeluaran_investasi_cabang']=$this->M_modul_owner->data_pengeluaran_invest_cabang('')->result();
		$this->load->view('modul_owner/vc_pengeluaran_investasi',$data);
	}

	public function bendahara_pengeluaran_investasi_tambah()
	{
		$data['data_cabang_resto']=$this->M_modul_owner->data_cabang_resto()->result();
		//$data['data_investasi_cabang']=$this->M_modul_owner->data_investasi_cabang()->result();
		//$data['data_peralatan']=$this->M_modul_owner->data_peralatan()->result();
		$this->load->view('modul_owner/vc_pengeluaran_investasi_tambah',$data);
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
		$this->M_modul_owner->input_data($datainput,'investasi_cabang');
		redirect('modul_owner/bendahara_pengeluaran_investasi');
	}

	public function edit_bendahara_pengeluaran_investasi($id)
	{
		//$data['data_cabang_resto']=$this->M_modul_owner->data_cabang_resto()->result();
		//$data['data_investasi_cabang']=$this->M_modul_owner->data_investasi_cabang()->result();
		//$data['data_peralatan']=$this->M_modul_owner->data_peralatan()->result();
		$data['data_pengeluaran_invest_cabang']=$this->M_modul_owner->data_pengeluaran_invest_cabang_edit($id)->result();
		$this->load->view('modul_owner/vc_pengeluaran_investasi_edit',$data);
	}

	public function bendahara_pengeluaran_investasi_editaksi()
	{


		$id	= $this->input->get('id');
		$datainput = array(
			'status'				=> 'disetujui',
		);
		$where = array('id' => $id);
		$this->M_modul_owner->update_data($where,$datainput,'investasi_cabang');
		//redirect('modul_owner/bendahara_pengeluaran_investasi');
	}

	public function hapus_bendahara_pengeluaran_investasi($id)
	{
		$where = array('id' => $id);
		$this->M_modul_owner->hapus_data($where,'investasi_cabang');
		redirect('modul_owner/pengeluaran_investasi');
	}




	public function users(){
		if(isset($_GET['user'])){
			 $tipe=$_GET['user'];
			if($tipe=="logistik" || $tipe=="bendahara" || $tipe=="general manajer"){

				$where = array(
					'tipe' => $tipe,
				);
				$data['data'] = $this->m_modul_owner->tampil_data_where('user_kanwil',$where)->result();
			}else	if($tipe=="owner"){
				$data['data'] = $this->m_modul_owner->tampil_data($tipe)->result();

				}
			}
	$this->load->view('modul_owner/user',$data);
	}

	// public function user_bendahara(){
	// 	$where = array(
	// 		'tipe' => 'bendahara',
	// 	);
	// $data['data'] = $this->m_modul_owner->tampil_data_where('user_kanwil',$where)->result();
	// $this->load->view('modul_owner/user_bendahara',$data);
	// }

	public function add_user()
	{
		$this->load->view('modul_owner/add_user');
	}

	public function edit_user()
	{
		$id=$_GET['id'];
		if(isset($_GET['tipe'])){
			echo $tipe=$_GET['tipe'];
			if($tipe=="logistik" || $tipe=="bendahara" || $tipe=="general manajer"){
				$tabel='user_kanwil';
				$where = array('id' => $id);
				$data['data'] = $this->m_modul_owner->tampil_data_where($tabel,$where)->result();
				$this->load->view('modul_owner/edit_user',$data);
			}else{
				$tipe=$_GET['tipe'];
				$tabel=$tipe;
				$where = array('id' => $id);
				$data['data'] = $this->m_modul_owner->tampil_data_where($tabel,$where)->result();
				$this->load->view('modul_owner/edit_user',$data);
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
			'id_kanwil' => $id_kanwil,
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
		$this->m_modul_owner->update_data($where,$data,$tabel);
		redirect('modul_owner/users?user='.$tipe);
	}else if($tipe=="owner"){
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
			$where = array(
			'id' => $id
			);
		$this->m_modul_owner->update_data($where,$data,$tabel);
		redirect('modul_owner/users?user='.$tipe);
		}

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
		// $id_kanwil = $this->input->post('id_kanwil');
		$tabel="";
		if($tipe=="logistik" || $tipe=="bendahara" || $tipe=="general manajer"){
			$tabel='user_kanwil';
			$data = array(
			'id_super_admin'=>$session_id,
			// 'id_kanwil' => $id_kanwil,
			'nama' => $nama,
			'user' => $user,
			'pass' => $pass,
			'alamat' => $alamat,
			'telp' => $telp,
			'email' => $email,
			'tipe' => $tipe,
			);
			$this->m_modul_owner->input_data($data,$tabel);
			redirect('modul_owner/users?user='.$tipe);
		} else if($tipe=="owner"){
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
			$this->m_modul_owner->input_data($data,$tabel);
			redirect('modul_owner/users?user='.$tipe);
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
			$this->m_modul_owner->hapus_data($where,$tabel);
			redirect('modul_owner/users?user='.$tipe);
		}else{
			$tabel=$tipe;
			$where = array(
			'id'=>$id,
			);
			$this->m_modul_owner->hapus_data($where,$tabel);
			redirect('modul_owner/users?user='.$tipe);
		}

	}
}
