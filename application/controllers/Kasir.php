<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

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
		$this->load->model('m_modul_kasir');
		$this->load->helper('url');
		if($this->session->userdata('status')==""){
			redirect(base_url("login"));
		}

	}
	public function penjualan()
	{
		$this->load->view('modul_kasir/penjualan');
	}
	public function add_setor()
	{
		$id_user_kasir=$this->session->userdata('id');
		$this->load->view('modul_kasir/add_setoran');
	}

	public function action_setor()
	{
		$id_user_kasir=$this->session->userdata('id');


		/*$where = array(
			'id' => $id_user_kasir
		);*/
		$jumlah = $this->input->post('jumlah');
		$tanggal_awal = $this->input->post('tgl1');
		$tanggal_akhir = $this->input->post('tgl2');
		$data2 = array(
			'id_user_bendahara' => $id_user_kasir,
			'id_user_kasir' => $id_user_kasir,
			'jumlah_setoran' => $jumlah,
			'tanggal_awal' => $tanggal_awal,
			'tanggal_akhir' => $tanggal_akhir
		);
		echo $cek_jumlah_setor=$this->m_modul_kasir->sum_pembayaran($id_user_kasir,$tanggal_awal,$tanggal_akhir)->row()->cek_jumlah_setor;
		if($cek_jumlah_setor>$jumlah){
			redirect('kasir/add_setor?pesan=error minimum setor');
			echo 1;
		}else{
			$sql = "SELECT * FROM pendapatan_kas_masuk where tanggal_awal<'$tanggal_awal' and tanggal_akhir<'$tanggal_akhir'";
			$cek=$this->db->query($sql)->num_rows();
			if($cek==0){

			$this->m_modul_kasir->input_data($data2,'pendapatan_kas_masuk');
			redirect('kasir/pendapatan?pesan=sukses');
			echo 2;
			}else{
				$sql2 = "SELECT * FROM pendapatan_kas_masuk where tanggal_awal>'$tanggal_awal' and tanggal_akhir>'$tanggal_akhir'";
				$cek2=$this->db->query($sql2)->num_rows();
				if($cek2==0){
					$this->m_modul_kasir->input_data($data2,'pendapatan_kas_masuk');
					redirect('kasir/pendapatan?pesan=sukses');
					echo 3;
				}else{
					redirect('kasir/add_setor?pesan=sudah di setor');
					echo 4;
					echo $cek2;
				}

			}

		}
	}
	public function pendapatan()
	{
		$id_user_kasir=$this->session->userdata('id');
		$where = array(
			'id_user_kasir' => $id_user_kasir,
		);
        $x['data']=$this->m_modul_kasir->tampil_data_where('pendapatan_kas_masuk',$where)->result();
		$this->load->view('modul_kasir/pendapatan',$x);
	}
	public function transaksi($id)
	{
		$id_pemesanan=$this->session->userdata('id');

    $x['data']=$this->m_modul_kasir->detail_transaksi_paket('pemesanan_paket',$id_pemesanan)->result();
		$x['data2']=$this->m_modul_kasir->detail_transaksi_menu('pemesanan_menu',$id_pemesanan)->result();
		$this->load->view('modul_kasir/pembayaran',$x);
	}
	public function pemesanan()
	{
		$id_user_kasir=$this->session->userdata('id');

		$query = $this->db->query("SELECT resto.id as id_resto FROM user_resto join resto on resto.id=user_resto.id_resto WHERE user_resto.id='$id_user_kasir'")->row();

		/*$where = array(
			'user_resto.id' => $id_user_kasir,
		);*/
		$id_resto=$query->id_resto;
    $x['data']=$this->m_modul_kasir->tampil_data_where_join($id_resto)->result();
		$this->load->view('modul_kasir/pemesanan',$x);
	}
	 function get_pemesan(){
        $kobar=$this->input->get('meja');
				$where = array(
					'no_meja' => $kobar,
					'status' => 'siapsaji',
				);
        $data=$this->m_modul_kasir->tampil_data_where('pemesanan',$where)->result();
        echo json_encode($data);
    }
	function get_menu(){
        $kobar=$this->input->get('id_pesan');
				$where = array(
					'id_pemesanan' => $kobar,
				);
        $data=$this->m_modul_kasir->tampil_pesan_menu_where('pemesanan_menu',$where)->result();
        echo json_encode($data);
    }
	function get_paket(){
        $kobar=$this->input->get('id_pesan');
				$where = array(
					'id_pemesanan' => $kobar,

				);
        $data=$this->m_modul_kasir->tampil_pesan_paket_where('pemesanan_paket',$where)->result();
        echo json_encode($data);
    }
	public function action_pembayaran(){
		$id_pemesanan = $this->input->post('id_pesan');
		$nominal = $this->input->post('nominal');
		$kembali = $this->input->post('kembali');
		$id_user_kasir = $this->input->post('id_user_kasir');

		$date = date('Y-m-d H:i:s');
		$status="";
		if($kembali<0){
			$status="kredit";
		}else{
			$status="lunas";
		}
		$where = array(
			'id' => $id_pemesanan
		);
		$data2 = array(
			'id_user_kasir' => $id_user_kasir,
			'id_pemesanan' => $id_pemesanan,
			'nominal' => $nominal,
			'status' => $status,
			'tanggal' => $date
		);
		$data3 = array(
			'status' => $status,
		);
		if($this->m_modul_kasir->input_data($data2,'pembayaran')){
		$this->session->set_flashdata('pesan', 'pembayaran berhasil');

			$data = array(
				'pesan' => "gagal"
			);
			echo json_encode($data);
		}else{
			$this->m_modul_kasir->update_data($where,$data3,'pemesanan');
			$data = array(
			'pesan' => "berhasil"
			);
			echo json_encode($data);
		}

	}

	public function update_pesanan_menu(){
			$jumlah_pesan = $this->input->post('jumlah_pesan');
			$subharga = $this->input->post('sub_harga');
			$id = $this->input->post('id_pesan_menu');



			$where = array(
				'id' => $id
			);
			$data = array(
				'jumlah_pesan' => $jumlah_pesan,
				'subharga' => $subharga,
			);


			$this->m_modul_kasir->update_data($where,$data,'pemesanan_menu');
			$data = array(
			'pesan' => "berhasil"
			);
			echo json_encode($data);


	}
	public function update_pesanan_paket(){
			$jumlah_pesan = $this->input->post('jumlah_pesan');
			$subharga = $this->input->post('sub_harga');
			$id = $this->input->post('id_pesan_paket');

			$where = array(
				'id' => $id
			);
			$data = array(
				'jumlah_pesan' => $jumlah_pesan,
				'subharga' => $subharga,
			);


			$this->m_modul_kasir->update_data($where,$data,'pemesanan_paket');

			$data = array(
			'pesan' => "berhasil"
			);
			echo json_encode($data);


	}
	public function update_pemesanan(){
			$id_pesan = $this->input->post('id_pesan');
			$tot_sub_harga = $this->input->post('tot_sub_harga');


			$where = array(
				'id' => $id_pesan
			);
			$data = array(
				'total_harga' => $tot_sub_harga,
			);


			$this->m_modul_kasir->update_data($where,$data,'pemesanan');

			$data = array(
			'pesan' => "berhasil"
			);
			echo json_encode($data);


	}
}
