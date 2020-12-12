<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

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
		$this->load->model('m_customer');
		$this->load->helper('url');
		if ($this->is_logged_in()!=TRUE)
        {
            // User is logged in.  Do something.
						redirect('customer_login/');
        }
	}

	public function is_logged_in()
  {
        $status_login = $this->session->userdata('logged_in');
        return $status_login;
  }

	public function pesan()
	{
		$data['kategori_menu']=$this->db->query("SELECT * FROM tbl_kategori_menu")->result();
		$data['kategori_paket']=$this->db->query("SELECT * FROM tbl_kategori_paket")->result();
		$this->load->view('customer/pesan', $data);
	}
	public function sub_kategori($id_parent,$tipe)
	{
		$id_resto=$this->session->userdata('id_resto');
		$query=$this->db->query("SELECT * FROM tbl_kategori_menu where parent_id='$id_parent'");
		$data['kategori_menu']=$query->result();

		$query2=$this->db->query("SELECT * FROM menu where id_kategori='$id_parent' AND id_resto='$id_resto'");
		$data['masakan_menu']=$query2->result();

		$query=$this->db->query("SELECT * FROM tbl_kategori_paket where parent_id='$id_parent'");
		$data['kategori_paket']=$query->result();

		$query2=$this->db->query("SELECT * FROM paket where id_kategori='$id_parent' AND id_resto='$id_resto'");
		$data['masakan_paket']=$query2->result();
		$this->load->view('customer/sub_kategori', $data);
	}
	public function masakan()
	{
		$data['kategori_menu']=$this->db->query("SELECT * FROM tbl_kategori_menu")->result();
		$data['masakan_menu']=$this->db->query("SELECT * FROM menu")->result();
		$this->load->view('customer/masakan', $data);
	}
	function tambah_keranjang_menu()
  {
				$id_menu=$this->input->get('id_menu');
				$sub_kategori=$this->input->get('sub_kategori');
				$tipe=$this->input->get('tipe');

				$query=$this->db->query("SELECT * FROM menu where id='$id_menu'");
				$data_menu=$query->row();
				echo $id_menu="menu_".$data_menu->id;
				echo $nama_menu=$data_menu->menu;
				$harga_menu=$data_menu->harga;
				$foto_menu=$data_menu->foto;
				$qty_menu=1;

        $data_menu= array('id' => $id_menu,
                          'name' => $nama_menu,
                          'price' => $harga_menu,
                          'foto' => $foto_menu,
                          'qty' =>$qty_menu,
													'tipe' =>'menu',
                          );
        $this->cart->insert($data_menu);
        redirect('customer/sub_kategori/'.$sub_kategori."/".$tipe);
				echo $id_menu;
  }

	function tambah_keranjang_paket()
  {
				$id_paket=$this->input->get('id_paket');
				$sub_kategori=$this->input->get('sub_kategori');
				$tipe=$this->input->get('tipe');

				$query=$this->db->query("SELECT * FROM paket where id='$id_paket'");
				$data_paket=$query->row();
				echo $id_paket="paket_".$data_paket->id;
				echo $nama_paket=$data_paket->nama_paket;
				$harga_paket=$data_paket->harga;
				$foto_paket=$data_paket->foto;
				$qty_paket=1;

        $data_paket= array('id' => $id_paket,
                          'name' => $nama_paket,
                          'price' => $harga_paket,
                          'foto' => $foto_paket,
                          'qty' =>$qty_paket,
													'tipe' =>'paket',
                          );
        $this->cart->insert($data_paket);
        redirect('customer/sub_kategori/'.$sub_kategori."/".$tipe);
				echo $id_menu;
  }

	function hapus_item()
  {
				// $this->cart->destroy();
				$rowid=$this->input->get('rowid');
      	$data = array('rowid' => $rowid,
                      'qty' =>0);
        $this->cart->update($data);
        redirect('customer/keranjang/');
				// print_r($this->cart->contents());
  }

	function update_item()
	{
					// $this->cart->destroy();
					$rowid=$this->input->get('rowid');
					$qty=$this->input->get('qty');
					$aksi=$this->input->get('aksi');
					if($aksi=="minus"){
						$hasilqty=$qty-1;
						$data = array('rowid' => $rowid,
		                      'qty' => $hasilqty
												);
		        $this->cart->update($data);
					}else if($aksi=="plus"){
						$hasilqty=$qty+1;
						$data = array('rowid' => $rowid,
		                      'qty' => $hasilqty
												);
		        $this->cart->update($data);
					}

	        redirect('customer/keranjang/');
					// print_r($this->cart->contents());
	}

	public function keranjang()
	{
		$this->load->view('customer/keranjang');
	}

	public function simpan_pemesanan(){
		date_default_timezone_set('Asia/Jakarta');
		$nama_pemesan=$this->session->userdata('nama_pemesan');
		$catatan=$this->input->post('catatan');
		$tanggal=date("Y-m-d H:i:s");
		$id_resto=$this->session->userdata('id_resto');
		$total_harga=$this->input->post('total_harga');
		$query=$this->db->query("INSERT INTO pemesanan (nama_pemesan, keterangantambahan, tanggal, total_harga, id_user_resto, status)
    VALUES ('$nama_pemesan', '$catatan', '$tanggal', '$total_harga', '$id_resto', 'customer memesan')");
		$insert_last_id = $this->db->insert_id();

		if ($cart = $this->cart->contents())
					 {
							 foreach ($cart as $item)
									 {
											 if($item['tipe']=="menu"){
												 echo $item['id'];
												  $id = explode("_", $item['id']);
													$id_menu=$id[1];
													$jumlah_pesan=$item['qty'];
													$subharga=$item['subtotal'];
													$query=$this->db->query("INSERT INTO pemesanan_menu (id_pemesanan, id_menu, jumlah_pesan, subharga)
													VALUES ('$insert_last_id', '$id_menu', '$jumlah_pesan', '$subharga')");
											}else if($item['tipe']=="paket"){
												echo $item['id'];
												 $id = explode("_", $item['id']);
												 $id_paket=$id[1];
												 $jumlah_pesan=$item['qty'];
												 $subharga=$item['subtotal'];
												 $query=$this->db->query("INSERT INTO pemesanan_paket (id_pemesanan, id_paket, jumlah_pesan, subharga)
												 VALUES ('$insert_last_id', '$id_paket', '$jumlah_pesan', '$subharga')");
											}
									 }
								$this->cart->destroy();
					 }
		redirect('customer/keranjang/');
	}

	public function pemesanan()
	{
		$nama_pemesan=$this->session->userdata('nama_pemesan');
		$data['pemesanan']=$this->db->query("SELECT * FROM pemesanan WHERE nama_pemesan='$nama_pemesan'")->result();
		$this->load->view('customer/pemesanan', $data);
	}

	public function detail_pemesanan()
	{
		$id_pemesanan=$this->input->get('id_pemesanan');
		$query1=$this->db->query("SELECT * FROM pemesanan_menu join menu on menu.id=pemesanan_menu.id_menu where pemesanan_menu.id_pemesanan='$id_pemesanan'");
		$data['pemesanan_menu']=$query1->result();

		$query2=$this->db->query("SELECT * FROM pemesanan_paket join paket on paket.id=pemesanan_paket.id_paket where pemesanan_paket.id_pemesanan='$id_pemesanan'");
		$data['pemesanan_paket']=$query2->result();
		$this->load->view('customer/detail_pemesanan', $data);
	}


}
