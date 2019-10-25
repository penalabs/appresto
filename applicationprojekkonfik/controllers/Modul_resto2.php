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
		$data['data'] = $this->m_modul_resto->tampil_data('bahan_jadi')->result();

		$where2 = array(
			'id_menu' => $id_last_menu->id+1
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
		$stok = $this->input->post('porsi');
		
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 10240;
		$config['max_height']           = 76800;
 
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
		}else{
			$data = array('upload_data' => $this->upload->data());

			$berkas = $this->upload->data();
			$foto = $berkas['file_name'];

			$data = array(
					'id' => $id_last_menu,
					'id_resto' => $id_resto,
					'menu' => $nama_menu,
					'status' => $status,
					'harga' => $harga_jual,
					'stok' => $stok,
					'foto' => $foto,
					);
			$this->m_modul_resto->input_data($data,'menu');
			$this->session->set_flashdata('pesan', 'data menu disimpan');
		}
		redirect('modul_resto/add_menu_masakan');
	}
	public function action_edit_menu(){
		$id_menu = $this->input->post('id_menu');
		//$nama_menu = $this->input->post('nama_menu');
		$status = $this->input->post('status');
		$harga_jual = $this->input->post('harga_jual');
		$stok = $this->input->post('porsi');
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
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			$data = array(
					'status' => $status,
					'harga' => $harga_jual,
					'stok' => $stok,
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
					'stok' => $stok,
					'foto' => $foto,
					);
			$this->m_modul_resto->update_data($where,$data,'menu');
			$this->session->set_flashdata('pesan', 'data menu disimpan');
		}
		redirect('modul_resto/edit_menu_masakan/?id='.$id_menu);
	}
	
	public function edit_menu_masakan()
	{
		$id_menu=$_GET['id'];
		$data['id_menu']=$_GET['id'];
		$where = array(
			'id' => $id_menu
		);
		$data['menu_masakan'] = $this->m_modul_resto->tampil_data_where('menu',$where)->result();
		$data['jenis_masakan'] = $this->m_modul_resto->tampil_data('jenis_masakan')->result();
		$data['data'] = $this->m_modul_resto->tampil_data('bahan_jadi')->result();

		$where2 = array(
			'id_menu' => $id_menu
		);
		$data['daftar_menu_masakan'] = $this->m_modul_resto->tampil_data_daftar_menu_masakan($where2)->result();
		$this->load->view('modul_resto/edit_menu_masakan',$data);
	}
	
	public function restos()
	{
		$this->load->view('manajemen/resto');
	}
	public function rubah_status(){
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
		redirect('modul_resto/bahan_jadi');
	}
	public function bahan_jadi()
	{
		$data['data'] = $this->m_modul_resto->tampil_data('bahan_jadi')->result();
		$this->load->view('modul_resto/bahan_jadi',$data);
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
	public function add_paket()
	{
		$data['menu'] = $this->m_modul_resto->tampil_data('menu')->result();
		$where = array(
			'mode' => 'insert',
		);
		$id_last_paket=$this->m_modul_resto->get_last_id_paket($where)->row();
		$data['id_last_paket']=$id_last_paket;


		$where2 = array(
			'id_paket' => $id_last_paket->id+1
		);
		$data['daftar_menu_paket'] = $this->m_modul_resto->tampil_data_daftar_menu_paket($where2)->result();
		$this->load->view('modul_resto/add_paket',$data);
	}
	public function action_add_menu_paket(){
		$id_last_paket = $this->input->post('id_last_paket');
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
				'id_paket' => $id_last_paket,
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
		
		redirect('modul_resto/add_paket');
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
		$cek_jum_menu=$this->m_modul_resto->tampil_data_where('menu',$where)->row();
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
		$id_paket=$_GET['id'];
		$data['id_paket']=$_GET['id'];
		$where = array(
			'id' => $id_paket
		);
		$data['paket'] = $this->m_modul_resto->tampil_data_where('paket',$where)->result();
		
		$where2 = array(
			'id_paket' => $id_paket
		);
		$data['daftar_menu_paket'] = $this->m_modul_resto->tampil_data_daftar_menu_paket($where2)->result();
		$this->load->view('modul_resto/edit_paket',$data);
	}
	public function action_edit_paket(){
		$id_paket = $this->input->post('id_paket');
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
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
			$data = array(
					'status' => $status,
					'harga' => $harga_jual,
					'jumlah' => $stok,
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
					'jumlah' => $stok,
					'foto' => $foto,
					);
			$this->m_modul_resto->update_data($where,$data,'menu');
			$this->session->set_flashdata('pesan', 'data menu disimpan');
		}
		redirect('modul_resto/edit_paket/?id='.$id_paket);
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
}
