<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_resto extends CI_Controller {

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
		$this->load->model('m_modul_resto');
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}

	}
	public function barang()
	{
		$this->load->view('master/barang');
	}
	public function menu_masakan()
	{
		$id_resto=$this->session->userdata('id_resto');
		$where = array(
			'id_resto' => $id_resto,
		);
		$data['menu_masakan'] = $this->m_modul_resto->tampil_data_where('menu',$where)->result();
		$this->load->view('modul_resto/menu_masakan',$data);
	}
	public function paket()
	{
		$id_resto=$this->session->userdata('id_resto');
		$where = array(
			'id_resto' => $id_resto,
		);
		$data['paket'] = $this->m_modul_resto->tampil_data_where('paket',$where)->result();
		$this->load->view('modul_resto/paket',$data);
	}

	public function add_menu_masakan()
	{
		$where = array(
			'mode' => 'insert',
		);
		$id_last_menu=$this->m_modul_resto->get_last_id_menu($where)->row();
		$data['id_last_menu']=$id_last_menu;

		$data['jenis_masakan'] = $this->m_modul_resto->tampil_data('jenis_masakan')->result();


		$where2 = array(
			'id' => $id_last_menu->id+1
		);
		$data['daftar_menu_masakan'] = $this->m_modul_resto->tampil_data_daftar_menu_masakan($where2)->result();


		$this->load->view('modul_resto/add_menu_masakan',$data);
	}
	public function action_add_item_menu(){
		$id_last_menu = $this->input->post('id_last_menu');
		$id_bahan_jadi = $this->input->post('id_bahan_jadi');
		$id_jenis_masakan = $this->input->post('id_jenis_masakan');
		$jumlah = $this->input->post('jumlah');
		$harga = $this->input->post('harga');
		$where = array(
			'id' => $id_bahan_jadi
		);
		$cek_jum_bahan_jadi=$this->m_modul_resto->tampil_data_where('bahan_jadi',$where)->row();
		$jum=$cek_jum_bahan_jadi->jumlah;
		$jum2=$jum-$jumlah;
		if($jum2>=0){

				$data = array(
				'id_menu' => $id_last_menu,
				'id_bahan_jadi' => $id_bahan_jadi,
				'jenis' => $id_jenis_masakan,
				'jumlah' => $jumlah,
				'harga' => $harga,
				);
				$this->m_modul_resto->input_data($data,'daftar_masakan');
				$where2 = array(
					'id' => $id_bahan_jadi
				);
				$data2 = array(
					'jumlah' => $jum2
				);
				$this->m_modul_resto->update_data($where2,$data2,'bahan_jadi');
			$this->session->set_flashdata('pesan', 'masakan ditambahkan ke menu');
		}else{
			$this->session->set_flashdata('pesan', 'bahan jadi tidak mencukupi');
		}

		redirect('modul_resto/add_menu_masakan');
	}
	public function action_edit_item_menu(){
		$id_last_menu = $this->input->post('id_last_menu');
		$id_bahan_jadi = $this->input->post('id_bahan_jadi');
		$id_jenis_masakan = $this->input->post('id_jenis_masakan');
		$jumlah = $this->input->post('jumlah');
		$harga = $this->input->post('harga');
		$where = array(
			'id' => $id_bahan_jadi
		);
		$cek_jum_bahan_jadi=$this->m_modul_resto->tampil_data_where('bahan_jadi',$where)->row();
		$jum=$cek_jum_bahan_jadi->jumlah;
		$jum2=$jum-$jumlah;
		if($jum2>=0){

				$data = array(
				'id_menu' => $id_last_menu,
				'id_bahan_jadi' => $id_bahan_jadi,
				'jenis' => $id_jenis_masakan,
				'jumlah' => $jumlah,
				'harga' => $harga,
				);
				$this->m_modul_resto->input_data($data,'daftar_masakan');
				$where2 = array(
					'id' => $id_bahan_jadi
				);
				$data2 = array(
					'jumlah' => $jum2
				);
				$this->m_modul_resto->update_data($where2,$data2,'bahan_jadi');
			$this->session->set_flashdata('pesan', 'masakan ditambahkan ke menu');
		}else{
			$this->session->set_flashdata('pesan', 'bahan jadi tidak mencukupi');
		}

		redirect('modul_resto/edit_menu_masakan/?id='.$id_last_menu);
	}
	public function hapus_item_menu(){
		$id=$_GET['id'];
		$id_menu=$_GET['id_menu'];
		$id_bahan_jadi=$_GET['id_bahan_jadi'];
		$jumlah=$_GET['jumlah'];


		$where = array(
			'id' => $id_bahan_jadi
		);
		$cek_jum_bahan_jadi=$this->m_modul_resto->tampil_data_where('bahan_jadi',$where)->row();
		$jum=$cek_jum_bahan_jadi->jumlah;


		$jum2=$jum+$jumlah;
		$where3 = array('id' => $id_bahan_jadi);
		$data = array(
					'jumlah' => $jum2,
					);
		$this->m_modul_resto->update_data($where3,$data,'bahan_jadi');


		$tabel=$_GET['tb'];
		$where2 = array('id' => $id);
		$this->m_modul_resto->hapus_data($where2,$tabel);

		redirect('modul_resto/edit_menu_masakan/?id='.$id_menu);
	}
	public function action_add_menu(){
		$id_resto=$this->session->userdata('id_resto');
		$id_last_menu = $this->input->post('id_last_menu');
		$nama_menu = $this->input->post('nama_menu');
		$status = $this->input->post('status');
		$harga_jual = $this->input->post('harga_jual');

		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 10240;
		$config['max_height']           = 76800;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			$data = array(
					'id' => $id_last_menu,
					'id_resto' => $id_resto,
					'menu' => $nama_menu,
					'status' => $status,
					'harga' => $harga_jual,
					);
			$this->m_modul_resto->input_data($data,'menu');
			$this->session->set_flashdata('pesan', 'data menu disimpan');
		}else{
			$data = array('upload_data' => $this->upload->data());
			echo 2;
			$berkas = $this->upload->data();
			$foto = $berkas['file_name'];

			$data = array(
					'id' => $id_last_menu,
					'id_resto' => $id_resto,
					'menu' => $nama_menu,
					'status' => $status,
					'harga' => $harga_jual,
					'foto' => $foto,
					);
			$this->m_modul_resto->input_data($data,'menu');
			$this->session->set_flashdata('pesan', 'data menu disimpan');
		}
		redirect('modul_resto/menu_masakan');
	}
	public function action_edit_menu(){
		$id_menu = $this->input->post('id_menu');
		//$nama_menu = $this->input->post('nama_menu');
		$status = $this->input->post('status');
		$harga_jual = $this->input->post('harga_jual');

		$where = array(
			'id' => $id_menu
		);

		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			$data = array(
					'status' => $status,
					'harga' => $harga_jual,
					);
			$this->m_modul_resto->update_data($where,$data,'menu');
			$this->session->set_flashdata('pesan', 'data menu disimpan');
		}else{
			$data = array('upload_data' => $this->upload->data());

			$berkas = $this->upload->data();
			$foto = $berkas['file_name'];

			$data = array(
					'status' => $status,
					'harga' => $harga_jual,
					'foto' => $foto,
					);
			$this->m_modul_resto->update_data($where,$data,'menu');
			$this->session->set_flashdata('pesan', 'data menu disimpan');

		}
		redirect('modul_resto/menu_masakan/');
	}

	public function edit_menu_masakan()
	{
		$id_menu=$_GET['id'];
		$data['id_menu']=$_GET['id'];
		$where = array(
			'id' => $id_menu
		);
		$data['menu_masakan'] = $this->m_modul_resto->tampil_data_where('menu',$where)->result();


		$where2 = array(
			'id' => $id_menu
		);
		$data['daftar_menu_masakan'] = $this->m_modul_resto->tampil_data_daftar_menu_masakan($where2)->result();
		$this->load->view('modul_resto/edit_menu_masakan',$data);
	}

	public function restos()
	{
		$this->load->view('manajemen/resto');
	}
	public function rubah_status_bahan_mentah(){
		$tabel = $this->input->get('mode');
		$status = $this->input->get('status');
		$id = $this->input->get('id');
		$data = array(
			'status'=>$status,
			);
		$where = array(
			'id' => $id
		);
		$this->m_modul_resto->update_data($where,$data,$tabel);
		redirect('modul_resto/pengolahan_bahan_mentah');
	}
	public function rubah_status_bahan_mentah_detil(){
		$tabel = $this->input->get('mode');
		$status = $this->input->get('status');
		$id = $this->input->get('id');
		$id_bahan_mentah = $this->input->get('id_bahan_mentah');
		$jumlah = $this->input->get('jumlah');
		$data = array(
			'status'=>$status,
			);
		$where = array(
			'id' => $id
		);
		$this->m_modul_resto->update_data($where,$data,$tabel);
		redirect('modul_resto/pengolahan_bahan_mentah/?id='.$id_bahan_mentah.'&&jumlah='.$jumlah);
	}
	public function pengolahan_bahan_mentah()
	{
		$data['data'] = $this->m_modul_resto->tampil_data('bahan_mentah')->result();
		$this->load->view('modul_resto/pengolahan_bahan_mentah',$data);
	}
	public function produksi_bahan_jadi()
	{
		$data['data'] = $this->m_modul_resto->tampil_data('bahan_jadi')->result();
		$this->load->view('modul_resto/produksi_bahan_jadi',$data);
	}
	public function add_bahan_jadi(){
		$nama = $this->input->post('nama');
		$porsi = $this->input->post('porsi');
		$jumlah = $this->input->post('jumlah');
			$data = array(
			'nama_masakan' => $nama,
			'porsi' => $porsi,
			'jumlah' => $jumlah,
			);
		$this->m_modul_resto->input_data($data,'bahan_jadi');
		redirect('modul_resto/bahan_jadi');
	}
	public function add_bahan_olahan(){
		$id_bahan_mentah = $this->input->post('id_bahan_mentah');
		$satuan_kecil = $this->input->post('satuan_kecil');
		$stok = $this->input->post('stok');
			$data = array(
			'id_bahan_mentah' => $id_bahan_mentah,
			'satuan_kecil' => $satuan_kecil,
			'stok' => $stok,
			);
		$this->m_modul_resto->input_data($data,'bahan_olahan');
		redirect('modul_resto/pengolahan_bahan_mentah');
	}
	public function add_bahan_mentah(){
		$id_bahan_mentah = $this->input->post('id_bahan_mentah');
		$satuan_kecil = $this->input->post('satuan_kecil');
		$stok = $this->input->post('stok');
			$data = array(
			'id_bahan_mentah' => $id_bahan_mentah,
			'satuan_kecil' => $satuan_kecil,
			'stok' => $stok,
			);
		$this->m_modul_resto->input_data($data,'detil_bahan_mentah');
		redirect('modul_resto/pengolahan_bahan_mentah');
	}
	public function add_paket()
	{
		$data['menu'] = $this->m_modul_resto->tampil_data('menu')->result();

		$sql = "SELECT max(id) as id FROM paket where mode='insert'";
		$data_id_last_paket=$this->db->query($sql)->row();
		$data['id_last_paket']=$data_id_last_paket;
		$id_last_paket=$data_id_last_paket->id+1;

		$sql2 = "SELECT detail_paket.id,detail_paket.id_paket,detail_paket.id_menu,menu.menu,detail_paket.jumlah,detail_paket.total_harga FROM detail_paket join menu on menu.id=detail_paket.id_menu where detail_paket.id_paket='$id_last_paket'";
		$data['daftar_menu_paket']=$this->db->query($sql2)->result();

		$this->load->view('modul_resto/add_paket',$data);
	}
	public function action_add_menu_paket(){
		$id_paket = $this->input->post('id_last_paket');
		$id_menu = $this->input->post('menu');
		$jumlah = $this->input->post('jumlah');

		$where = array(
			'id' => $id_menu
		);
		$cek_jum_menu=$this->m_modul_resto->tampil_data_where('menu',$where)->row();
		$jum=$cek_jum_menu->stok;
		$jum2=$jum-$jumlah;

		$har=$cek_jum_menu->harga;
		$harga=$har*$jumlah;
		if($jum2>=0){
				$data = array(
				'id_menu' => $id_menu,
				'id_paket' => $id_paket,
				'jumlah' => $jumlah,
				'total_harga' => $harga,
				);
				$this->m_modul_resto->input_data($data,'detail_paket');
				$where2 = array(
					'id' => $id_menu
				);
				$data2 = array(
					'stok' => $jum2
				);
				$this->m_modul_resto->update_data($where2,$data2,'menu');
				$this->session->set_flashdata('pesan', 'masakan ditambahkan ke menu');
		}else{
			$this->session->set_flashdata('pesan', 'menu tidak mencukupi');
		}

		redirect('modul_resto/edit_paket/?id='.$id_paket);
	}
	public function action_add_menu_paket2(){
		$id_paket = $this->input->post('id_last_paket');
		$id_menu = $this->input->post('menu');
		$jumlah = $this->input->post('jumlah');

		$where = array(
			'id' => $id_menu
		);
		$cek_jum_menu=$this->m_modul_resto->tampil_data_where('menu',$where)->row();
		$jum=$cek_jum_menu->stok;
		$jum2=$jum-$jumlah;

		$har=$cek_jum_menu->harga;
		$harga=$har*$jumlah;
		if($jum2>=0){
				$data = array(
				'id_menu' => $id_menu,
				'id_paket' => $id_paket,
				'jumlah' => $jumlah,
				'total_harga' => $harga,
				);
				$this->m_modul_resto->input_data($data,'detail_paket');
				$where2 = array(
					'id' => $id_menu
				);
				$data2 = array(
					'stok' => $jum2
				);
				$this->m_modul_resto->update_data($where2,$data2,'menu');
				$this->session->set_flashdata('pesan', 'masakan ditambahkan ke menu');
		}else{
			$this->session->set_flashdata('pesan', 'menu tidak mencukupi');
		}

		redirect('modul_resto/add_paket/?id='.$id_paket);
	}
	public function action_add_paket(){
		$id_resto=$this->session->userdata('id_resto');
		$id_last_paket = $this->input->post('id_last_paket');
		$nama_paket = $this->input->post('nama_paket');
		$status = $this->input->post('status');
		$harga_jual = $this->input->post('harga_jual');
		$jumlah = $this->input->post('jumlah');

		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
		}else{
			$data = array('upload_data' => $this->upload->data());

			$berkas = $this->upload->data();
			$foto = $berkas['file_name'];

			$data = array(
					'id' => $id_last_paket,
					'id_resto' => $id_resto,
					'nama_paket' => $nama_paket,
					'status' => $status,
					'harga' => $harga_jual,
					'jumlah' => $jumlah,
					'foto' => $foto,
					);
			$this->m_modul_resto->input_data($data,'paket');
			$this->session->set_flashdata('pesan', 'data paket disimpan');
		}
		redirect('modul_resto/add_paket');
	}
	public function hapus_item_paket(){
		$id=$_GET['id'];
		$id_menu=$_GET['id_menu'];
		$id_paket=$_GET['id_paket'];
		$jumlah=$_GET['jumlah'];


		$where = array(
			'id' => $id_menu
		);
		$sql = "SELECT stok as jumlah FROM menu where id='$id_menu'";
		$cek_jum_menu=$this->db->query($sql)->row();
		$jum=$cek_jum_menu->jumlah;


		$jum2=$jum+$jumlah;
		$where3 = array('id' => $id_menu);
		$data = array(
					'stok' => $jum2,
					);
		$this->m_modul_resto->update_data($where3,$data,'menu');


		$tabel=$_GET['tb'];
		$where2 = array('id' => $id);
		$this->m_modul_resto->hapus_data($where2,$tabel);

		redirect('modul_resto/edit_paket/?id='.$id_paket);
	}

	public function hapus_item_paket2(){
		$id=$_GET['id'];
		$id_menu=$_GET['id_menu'];
		$id_paket=$_GET['id_paket'];
		$jumlah=$_GET['jumlah'];


		$where = array(
			'id' => $id_menu
		);
		$sql = "SELECT stok as jumlah FROM menu where id='$id_menu'";
		$cek_jum_menu=$this->db->query($sql)->row();
		$jum=$cek_jum_menu->jumlah;


		$jum2=$jum+$jumlah;
		$where3 = array('id' => $id_menu);
		$data = array(
					'stok' => $jum2,
					);
		$this->m_modul_resto->update_data($where3,$data,'menu');


		$tabel=$_GET['tb'];
		$where2 = array('id' => $id);
		$this->m_modul_resto->hapus_data($where2,$tabel);

		redirect('modul_resto/add_paket/?id='.$id_paket);
	}

	public function edit_paket()
	{
		$id_resto=$this->session->userdata('id_resto');
		$id_paket=$_GET['id'];
		$data['id_paket']=$_GET['id'];
		$where = array(
			'id' => $id_paket
		);
		$where2 = array(
			'id_resto' => $id_resto
		);
		$data['paket'] = $this->m_modul_resto->tampil_data_where('paket',$where)->result();
		$data['menu'] = $this->m_modul_resto->tampil_data_where('menu',$where2)->result();

		$where2 = array(
			'id_paket' => $id_paket
		);
		$data['daftar_menu_paket'] = $this->m_modul_resto->tampil_data_daftar_menu_paket($where2)->result();
		$this->load->view('modul_resto/edit_paket',$data);
	}
	public function action_edit_paket(){
		echo $id_paket = $this->input->post('id_paket');
		$nama_paket = $this->input->post('nama_paket');
		$status = $this->input->post('status');
		$harga_jual = $this->input->post('harga_jual');
		$jumlah = $this->input->post('jumlah');

		$where = array(
			'id' => $id_paket
		);

		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas')){
			echo json_encode($error = array('error' => $this->upload->display_errors()));
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			$data = array(
					'status' => $status,
					'harga' => $harga_jual,
					'jumlah' => $jumlah,
					);
			$this->m_modul_resto->update_data($where,$data,'paket');
			$this->session->set_flashdata('pesan', 'data paket disimpan');
			echo 1;
		}else{
			$data = array('upload_data' => $this->upload->data());

			$berkas = $this->upload->data();
			echo $foto = $berkas['file_name'];

			$data = array(
					'status' => $status,
					'harga' => $harga_jual,
					'jumlah' => $jumlah,
					'foto' => $foto,
					);
			$this->m_modul_resto->update_data($where,$data,'paket');
			$this->session->set_flashdata('pesan', 'data paket disimpan');
			echo 2;
		}
		//redirect('modul_resto/edit_paket/?id='.$id_paket);
	}
	public function meja()
	{
		$this->load->view('modul_resto/meja');
	}
	public function edit_meja()
	{
		$id=$_GET['id'];
		$where = array(
			'id' => $id
		);
		$data['data_meja'] = $this->m_modul_resto->tampil_data_where('meja',$where)->result();
		$this->load->view('modul_resto/meja',$data);
	}
	public function action_edit_meja(){
		$id = $this->input->post('id');
		$panel = $this->input->post('panel');
		$nomor = $this->input->post('nomor');


		$where = array(
			'id' => $id
		);
		$data = array(
			'panel' => $panel,
			'nomor' => $nomor
		);
		if($this->m_modul_resto->update_data($where,$data,'meja')){
			$this->session->set_flashdata('pesan', 'gagal update data');
		}else{

			$this->session->set_flashdata('pesan', 'meja berhasil update data');
		}
		redirect('modul_resto/meja');
	}
	public function action_add_meja(){

		$panel = $this->input->post('panel');
		$nomor = $this->input->post('nomor');



		$data = array(
			'panel' => $panel,
			'nomor' => $nomor
		);
		if($this->m_modul_resto->input_data($data,'meja')){
			$this->session->set_flashdata('pesan', 'gagal update data');
		}else{

			$this->session->set_flashdata('pesan', 'meja berhasil menambah data');
		}
		redirect('modul_resto/meja');
	}















	//----- permintaan_bahan

	public function index_permintaan_bahan()
	{
		$this->load->view('modul_resto/menu_permintaan_bahan/permintaan_bahan');
	}
	public function data_permintaan_bahan()
	{
		$id_user_resto_produksi_adminresto = $this->session->userdata('id');
		$data_produksi = $this->m_modul_resto->tampil_data_permintaan_bahan($id_user_resto_produksi_adminresto)->result();
		echo json_encode($data_produksi);
	}
	public function tambah_data_permintaan_bahan()
	{
		$id_user_resto_produksi_adminresto = $this->session->userdata('id');

		$ambil_id_kanwil = $this->db->query("SELECT user_resto.*
			FROM user_resto
			WHERE user_resto.id = '$id_user_resto_produksi_adminresto' ");

		foreach ($ambil_id_kanwil->result() as $data) {
			 $id_kanwil = $data->id_kanwil;
		}

		$ambil_id_user_kanwil_logistik = $this->db->query("SELECT user_kanwil.*
			FROM user_kanwil
			WHERE user_kanwil.id_kanwil = '$id_kanwil'
			AND user_kanwil.tipe = 'logistik' ");

		foreach ($ambil_id_user_kanwil_logistik->result() as $data) {
			 $id_user_kanwil_logistik = $data->id;
		}
		// echo $id_user_kanwil;

		$nama_permintaan = $this->input->post('nama_permintaan');
		$this->m_modul_resto->tambah_data_permintaan_bahan($nama_permintaan,$id_user_resto_produksi_adminresto,$id_user_kanwil_logistik);
		redirect('modul_resto/index_permintaan_bahan');
	}
	public function edit_data_permintaan_bahan()
	{
		$id_permintaan = $this->uri->segment('3');
		$edit_data_permintaan_bahan = $this->m_modul_resto->edit_data_permintaan_bahan($id_permintaan)->result();
		echo json_encode($edit_data_permintaan_bahan);
	}
	public function update_data_permintaan_bahan()
	{
		$id_permintaan_edit = $this->input->post('id_permintaan_edit');
		$nama_permintaan_edit = $this->input->post('nama_permintaan_edit');
		// $id_permintaan = $this->uri->segment('3');
		// $nama_permintaan = $this->input->post('nama_permintaan');
		// echo $nama_permintaan;
		$this->m_modul_resto->update_data_permintaan_bahan($id_permintaan_edit,$nama_permintaan_edit);
		redirect('modul_resto/index_permintaan_bahan');
	}
	public function delete_data_permintaan_bahan()
	{
		$id_permintaan = $this->uri->segment('3');
		$this->m_modul_resto->delete_data_permintaan_bahan($id_permintaan);
		redirect('modul_resto/index_permintaan_bahan');
	}
	public function update_proses_permintaan()
	{
		$id_permintaan = $this->uri->segment('3');
		// $nama_permintaan = $this->input->post('nama_permintaan');
		// echo $nama_permintaan;
		$this->m_modul_resto->update_proses_permintaan($id_permintaan);
		redirect('modul_resto/index_permintaan_bahan');
	}
	public function update_diterima()
	{
		$id_permintaan = $this->uri->segment('3');
		// $nama_permintaan = $this->input->post('nama_permintaan');
		// echo $nama_permintaan;


			// echo $stok_bahan_mentah;

		$ambil_id_bahan_mentah_sesuai = $this->db->query("SELECT permintaan_bahan_detail.*
			FROM permintaan_bahan_detail
			WHERE permintaan_bahan_detail.id_permintaan = '$id_permintaan'
			and permintaan_bahan_detail.status_penerimaan = 'sesuai' ");

		foreach ($ambil_id_bahan_mentah_sesuai->result() as $ambil_id_bahan_mentah_sesuai) {
			 // $stok_bahan_mentah_sesuai = $ambil_id_bahan_mentah_dari_table_permintaan_bahan_detail->jumlah_permintaan;
			 $id_bahan_mentah_sesuai = $ambil_id_bahan_mentah_sesuai->id_bahan_mentah;
			 // echo $stok_bahan_mentah_sesuai.' ';

							$ambil_stok_bahan_mentah = $this->db->query("SELECT bahan_mentah.*
					 			FROM bahan_mentah
					 			WHERE bahan_mentah.id = '$id_bahan_mentah_sesuai' ");

					 		foreach ($ambil_stok_bahan_mentah->result() as $ambil_stok_bahan_mentah) {
					 			 $stok_bahan_mentah = $ambil_stok_bahan_mentah->stok;
					 			 // echo $stok_bahan_mentah;
					 		}

							$ambil_stok_bahan_mentah_sesuai = $this->db->query("SELECT permintaan_bahan_detail.*
								FROM permintaan_bahan_detail
								WHERE permintaan_bahan_detail.id_bahan_mentah = '$id_bahan_mentah_sesuai'
								and permintaan_bahan_detail.status_penerimaan = 'sesuai' ");

							foreach ($ambil_stok_bahan_mentah_sesuai->result() as $ambil_stok_bahan_mentah_sesuai) {
									$stok_bahan_mentah_sesuai = $ambil_stok_bahan_mentah_sesuai->jumlah_permintaan;
							}

							$update_stok_bahan_mentah = $this->db->query("UPDATE bahan_mentah
						 	SET bahan_mentah.stok = $stok_bahan_mentah+$stok_bahan_mentah_sesuai
							WHERE bahan_mentah.id = $id_bahan_mentah_sesuai; ");

		}
			// echo $stok_bahan_mentah_sesuai;

		$ambil_id_bahan_mentah_tidak_sesuai = $this->db->query("SELECT * FROM `permintaan_bahan_detail`
		JOIN `permintaan_bahan_tidak_sesuai` ON `permintaan_bahan_tidak_sesuai`.`id_detail_permintaan` = `permintaan_bahan_detail`.`id_detail_permintaan`
		WHERE permintaan_bahan_detail.`id_permintaan` = $id_permintaan
		AND permintaan_bahan_detail.`status_penerimaan` = 'tidak sesuai' ");

		foreach ($ambil_id_bahan_mentah_tidak_sesuai->result() as $ambil_id_bahan_mentah_tidak_sesuai) {
			 $id_bahan_mentah_tidak_sesuai = $ambil_id_bahan_mentah_tidak_sesuai->id_bahan_mentah;
			 // echo $stok_bahan_mentah_tidak_sesuai.' ';


			 $ambil_stok_bahan_mentah2 = $this->db->query("SELECT bahan_mentah.*
				 FROM bahan_mentah
				 WHERE bahan_mentah.id = '$id_bahan_mentah_tidak_sesuai' ");

			 foreach ($ambil_stok_bahan_mentah2->result() as $ambil_stok_bahan_mentah2) {
					$stok_bahan_mentah2 = $ambil_stok_bahan_mentah2->stok;
					// echo $stok_bahan_mentah;
			 }

			 $ambil_stok_bahan_mentah_tidak_sesuai = $this->db->query("SELECT * FROM `permintaan_bahan_detail`
		 		JOIN `permintaan_bahan_tidak_sesuai` ON `permintaan_bahan_tidak_sesuai`.`id_detail_permintaan` = `permintaan_bahan_detail`.`id_detail_permintaan`
		 		WHERE permintaan_bahan_detail.id_bahan_mentah = '$id_bahan_mentah_tidak_sesuai'
		 		AND permintaan_bahan_detail.`status_penerimaan` = 'tidak sesuai' ");

			 foreach ($ambil_stok_bahan_mentah_tidak_sesuai->result() as $ambil_stok_bahan_mentah_tidak_sesuai) {
					 $bahan_mentah_tidak_sesuai = $ambil_stok_bahan_mentah_tidak_sesuai->jumlah_bahan_terkirim;
			 }

			 $update_stok_bahan_mentah = $this->db->query("UPDATE bahan_mentah
			 SET bahan_mentah.stok = $stok_bahan_mentah+$bahan_mentah_tidak_sesuai
			 WHERE bahan_mentah.id = $id_bahan_mentah_tidak_sesuai; ");


		}

		// echo $stok_bahan_mentah.' '.$stok_bahan_mentah_sesuai.' '.$stok_bahan_mentah_tidak_sesuai;

		// $update_stok_bahan_mentah = $this->db->query("UPDATE bahan_mentah
		// 	SET bahan_mentah.stok = $stok_bahan_mentah+$stok_bahan_mentah_sesuai+$stok_bahan_mentah_tidak_sesuai
		// 	WHERE bahan_mentah.id = $id_bahan_mentah; ");

		$this->m_modul_resto->update_diterima($id_permintaan);
		redirect('modul_resto/index_permintaan_bahan');
	}

	//----------------------

	//----- permintaan_bahan_detail

	public function data_permintaan_bahan_detail()
	{
		$id_permintaan = $this->uri->segment('3');
		$query = $this->db->query("SELECT permintaan_bahan.*
			FROM permintaan_bahan
			WHERE permintaan_bahan.id_permintaan = '$id_permintaan' ");

		foreach ($query->result() as $data_permintaan_bahan_detail) {
			 $status = $data_permintaan_bahan_detail->status;
			 $nama_permintaan = $data_permintaan_bahan_detail->nama_permintaan;
		}

		$id_user_resto_produksi_adminresto = $this->session->userdata('id');
		$ambil_id_resto = $this->db->query("SELECT user_resto.*
			FROM user_resto
			WHERE user_resto.id = '$id_user_resto_produksi_adminresto' ");

		foreach ($ambil_id_resto->result() as $data2) {
			 $id_resto = $data2->id_resto;
		}

		// echo $id_permintaan;
		$data['tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi'] = $this->m_modul_resto->tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi($id_permintaan)->result();
		$data['tampil_data_permintaan_bahan_detail_tidak_sesuai'] = $this->m_modul_resto->tampil_data_permintaan_bahan_detail_tidak_sesuai($id_permintaan)->result();
		$data['data_bahan_mentah'] = $this->m_modul_resto->tampil_data_bahan_mentah($id_permintaan,$id_resto)->result();
		$data['status'] = $status;
		$data['id_permintaan'] = $id_permintaan;
		$data['nama_permintaan'] = $nama_permintaan;
		// echo $status;
		$this->load->view('modul_resto/menu_permintaan_bahan/permintaan_bahan_detail',$data);
	}
	public function tambah_data_permintaan_bahan_detail()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		$bahan_mentah = $this->input->post('bahan_mentah');
		$jumlah_permintaan = $this->input->post('jumlah_permintaan');
		$satuan_besar = $this->input->post('satuan_besar');

		$this->m_modul_resto->tambah_data_permintaan_bahan_detail($id_permintaan,$bahan_mentah,$jumlah_permintaan,$satuan_besar);
		redirect('modul_resto/data_permintaan_bahan_detail/'.$id_permintaan);
	}
	public function update_sesuai_data_permintaan_bahan_detail()
	{
		$id_detail_permintaan = $this->uri->segment('3');
		$ambil_id_permintaan = $this->db->query("SELECT permintaan_bahan_detail.*
			FROM permintaan_bahan_detail
			WHERE permintaan_bahan_detail.id_detail_permintaan = '$id_detail_permintaan' ");

		foreach ($ambil_id_permintaan->result() as $data) {
			 $id_permintaan = $data->id_permintaan;
		}

		$delete_bahan_tidak_sesuai = $this->db->query("DELETE FROM permintaan_bahan_tidak_sesuai
			WHERE permintaan_bahan_tidak_sesuai.id_detail_permintaan = '$id_detail_permintaan' ");

		// $nama_permintaan = $this->input->post('nama_permintaan');
		// echo $nama_permintaan;
		$this->m_modul_resto->update_sesuai_data_permintaan_bahan_detail($id_detail_permintaan);
		redirect('modul_resto/data_permintaan_bahan_detail/'.$id_permintaan);
	}
	public function update_tidak_sesuai_data_permintaan_bahan_detail()
	{
		// $id_detail_permintaan = $this->uri->segment('3');
		$id_detail_permintaan = $this->input->post('id_detail_permintaan_AmbilBahanTidakSesuai');
		$jumlah_bahan_terkirim = $this->input->post('jumlah_bahan_terkirim_AmbilBahanTidakSesuai');
		$jumlah_permintaan = $this->input->post('jumlah_permintaan_AmbilBahanTidakSesuai');
		$selisih_bahan = abs($jumlah_bahan_terkirim - $jumlah_permintaan);

		// echo $selisih;

		$ambil_id_permintaan = $this->db->query("SELECT permintaan_bahan_detail.*
			FROM permintaan_bahan_detail
			WHERE permintaan_bahan_detail.id_detail_permintaan = '$id_detail_permintaan' ");

		foreach ($ambil_id_permintaan->result() as $data) {
			 $id_permintaan = $data->id_permintaan;
		}

		$this->m_modul_resto->update_tidak_sesuai_data_permintaan_bahan_detail($id_detail_permintaan);
		$this->m_modul_resto->tambah_data_permintaan_bahan_tidak_sesuai($id_detail_permintaan,$jumlah_bahan_terkirim,$selisih_bahan);
		redirect('modul_resto/data_permintaan_bahan_detail/'.$id_permintaan);
	}

	
	//---------------------------
	//--------------------------------------




}
