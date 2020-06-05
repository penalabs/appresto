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
	public function cetak_struk()
	{
		$this->load->view('modul_kasir/cetak_struk');
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
		$sql4 = "select user_kanwil.nama as nama_bendahara,pendapatan_kas_masuk.*,user_resto.nama as nama_kasir from pendapatan_kas_masuk join user_kanwil on user_kanwil.id=pendapatan_kas_masuk.id_user_bendahara join user_resto on user_resto.id=pendapatan_kas_masuk.id_user_kasir where id_user_kasir='$id_user_kasir'";
        $x['data']=$this->db->query($sql4)->result();
        // $x['data']=$this->m_modul_kasir->tampil_data_where('pendapatan_kas_masuk',$where)->result();
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
		$id_resto=$this->session->userdata('id_resto');
		$date = date('Y-m-d');
		$jmakr = date('H');
		$jamawal = "07";
		$jamakhir = $jmakr;
		$data['tampildatastor'] = $this->m_modul_kasir->tampildatastor("0","00","00","2020-02-01")->result();
		$data['tampildatasum'] = $this->m_modul_kasir->tampildatasum($id_resto,$jamawal,$jamakhir,$date)->result();
		$this->load->view('modul_kasir/setor',$data);
	}
	 function get_pemesan(){
        $no_meja=$this->input->get('meja');
				$where = array(
					'no_meja' => $no_meja,
					'status' => 'siapsaji',
				);
        //$data=$this->m_modul_kasir->tampil_data_where('pemesanan',$where)->result();
		$sql = "SELECT * from pemesanan where no_meja='$no_meja' and status='selesai' limit 1";
        $data=$this->db->query($sql)->result();
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
		$diskon = $this->input->post('diskon');
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
			'diskon' => $diskon,
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

	public function tampildatastor()
	{
		$id_resto=$this->session->userdata('id_resto');
		$date = date('Y-m-d');
		$jmakr = date('H');
		$jamawal = "07";
		$jamakhir = $jmakr;
		$data['tampildatastor'] = $this->m_modul_kasir->tampildatastor($id_resto,$jamawal,$jamakhir,$date)->result();
		$data['tampildatasum'] = $this->m_modul_kasir->tampildatasum($id_resto,$jamawal,$jamakhir,$date)->result();
		$this->load->view('modul_kasir/setor', $data);
	}

//setor ke admin resto bukan ke bendahara (males mengganti function) // kurang karena selain ID WAITER tidak bisa include
	public function setorkebendahara()
	{
			$id_resto=$this->session->userdata('id_resto');
			date_default_timezone_set('Asia/Jakarta');
			$date = date('Y-m-d');
			$jmakr = date('H');
			$jamawal = "07";

			$querynominal = "SELECT SUM(pemesanan.total_harga) AS nominalsetor, pemesanan.`id`,`nama_pemesan`,`no_meja`,`total_harga`, pembayaran.`status`,`nominal`,pembayaran.`tanggal`
			FROM pemesanan
			JOIN user_resto ON user_resto.`id` = pemesanan.`id_user_resto`
			JOIN resto ON resto.id = user_resto.id_resto
			JOIN pembayaran ON pembayaran.id_pemesanan = pemesanan.id
			WHERE resto.`id` = $id_resto AND SUBSTRING(pembayaran.tanggal, 1, 10) = '$date' AND HOUR(pembayaran.tanggal)
			BETWEEN $jamawal AND $jmakr";
			$nominalsetorkasir=$this->db->query($querynominal)->row();

			$date = date('Y-m-d H:i:s')."<br>";
			$id_user_adminresto = $this->input->post('id_user_adminresto');
			$id_user_kasir =$this->session->userdata('id');

			// belum di beri kondisi jika NOMINALSETOR kosong maka di view menampilkan error NULL NOMINALSETOR
			// jadi harus diberi kondisi dulu
			$jumlah_setoran = $nominalsetorkasir->nominalsetor;

			$data = array(
				'id_resto' => $id_resto,
				'id_user_kasir' => $id_user_kasir,
				'id_adminresto' => $id_user_adminresto,
				'jumlah_setoran' => $jumlah_setoran,
				'tanggal' => $date,
			);
			$this->m_modul_kasir->input_data($data,'pendapatan_kas_masuk_dari_kasir');
			$this->session->set_flashdata('flash','Berhasil');
			redirect('kasir/tampildatastor');
	}

	public function pemesanan_kasir(){

		$id_resto=$this->session->userdata('id_resto');
		$data_pemesanan = $this->db->query("SELECT pemesanan.*
			FROM pemesanan
			where pemesanan.id_user_resto = $id_resto
			order by pemesanan.id DESC
			")
			->result();

		$data['data_pemesanan'] = $data_pemesanan;

		$this->load->view('modul_kasir/pemesanan_kasir',$data);
	}

	public function pemesanan_kasir_tambah(){

		$id_resto=$this->session->userdata('id_resto');
		$nama_pemesan = $this->input->post('nama_pemesan');
		$no_meja = $this->input->post('no_meja');
		$keterangan = $this->input->post('keterangan');

		$this->m_modul_kasir->tambah_data_pemesanan($nama_pemesan,$no_meja,$keterangan,$id_resto);
		redirect('kasir/pemesanan_kasir');
		// $this->load->view('modul_kasir/pemesanan_kasir');
	}

	public function pemesanan_detail_pemesanan($id){

		$id_pemesanan = $id;

		$data_menu = $this->db->query("SELECT menu.*
			FROM menu
			")
			->result();

		$data_paket = $this->db->query("SELECT paket.*
			FROM paket
			")
			->result();

		$total_pesanan_menu = $this->db->query("SELECT SUM(pemesanan_menu.subharga*pemesanan_menu.jumlah_pesan) as subharga_menu
					FROM pemesanan_menu
					WHERE pemesanan_menu.id_pemesanan = '$id'
			")
			->result();

		$total_pesanan_paket = $this->db->query("SELECT SUM(pemesanan_paket.subharga*pemesanan_paket.jumlah_pesan) as subharga_paket
					FROM pemesanan_paket
					WHERE pemesanan_paket.id_pemesanan = '$id'
			")
		->result();

		$total_subharga_menu = $total_pesanan_menu[0]->subharga_menu;
		$total_subharga_paket = $total_pesanan_paket[0]->subharga_paket;
		// print_r($total_pesanan_menu);

		$data['data_pemesanan_menu'] = $this->m_modul_kasir->tampil_data_pemesanan_menu($id);
		$data['data_pemesanan_paket'] = $this->m_modul_kasir->tampil_data_pemesanan_paket($id);
		$data['data_pemesanan'] = $this->m_modul_kasir->tampil_data_pemesanan($id);
		$data['tampil_id_pemesanan'] = $id_pemesanan;
		$data['data_menu'] = $data_menu;
		$data['data_paket'] = $data_paket;
		$data['total_subharga_menu'] = $total_subharga_menu;
		$data['total_subharga_paket'] = $total_subharga_paket;

		$this->load->view('modul_kasir/pemesanan_kasir_detail',$data);
	}

	public function pemesanan_detail_pemesanan_tambah(){

		$id_pemesanan = $id;

		$data['data_pemesanan_menu'] = $this->m_modul_kasir->tampil_data_pemesanan_menu($id);
		$data['data_pemesanan_paket'] = $this->m_modul_kasir->tampil_data_pemesanan_paket($id);
		$data['data_pemesanan'] = $this->m_modul_kasir->tampil_data_pemesanan($id);
		$data['tampil_id_pemesanan'] = $id_pemesanan;

		$this->load->view('modul_kasir/pemesanan_kasir_detail',$data);
	}

	public function ambil_data_harga_per_menu(){

		// $id_resto=$this->session->userdata('id_resto');
		$id = $this->input->post('id',TRUE);
		$data_ambil_menu = $this->db->query("SELECT menu.*
			FROM menu
			where menu.id = '$id';
			")
			->result();

		echo json_encode($data_ambil_menu);


	}

	public function ambil_data_harga_per_paket(){

		// $id_resto=$this->session->userdata('id_resto');
		$id = $this->input->post('id',TRUE);
		$data_ambil_menu = $this->db->query("SELECT paket.*
			FROM paket
			where paket.id = '$id';
			")
			->result();

		echo json_encode($data_ambil_menu);


	}

	public function pemesanan_kasir_menu_tambah(){

		$id_pemesanan = $this->input->post('id_pemesanan');
		$menu = $this->input->post('menu');
		// $harga_per_menu = $this->input->post('harga_per_menu');
		$jumlah_pesan_menu = $this->input->post('jumlah_pesan_menu');
		$harga_per_menu = $this->input->post('harga_per_menu');

		$this->m_modul_kasir->tambah_data_pemesanan_menu($id_pemesanan,$menu,$jumlah_pesan_menu,$harga_per_menu);
		redirect(base_url()."kasir/pemesanan_detail_pemesanan/".$id_pemesanan);
		// $this->load->view('modul_kasir/pemesanan_kasir');
	}

	public function pemesanan_kasir_paket_tambah(){

		$id_pemesanan = $this->input->post('id_pemesanan');
		$paket = $this->input->post('paket');
		// $harga_per_menu = $this->input->post('harga_per_menu');
		$jumlah_pesan_paket = $this->input->post('jumlah_pesan_paket');
		$harga_per_paket = $this->input->post('harga_per_paket');

		$this->m_modul_kasir->tambah_data_pemesanan_paket($id_pemesanan,$paket,$jumlah_pesan_paket,$harga_per_paket);
		redirect(base_url()."kasir/pemesanan_detail_pemesanan/".$id_pemesanan);
		// $this->load->view('modul_kasir/pemesanan_kasir');
	}

	public function pemesanan_kasir_final($id){

		$id_pemesanan = $id;

		$this->m_modul_kasir->update_status_pemesanan($id_pemesanan);
		redirect(base_url()."kasir/pemesanan_kasir");
		// $this->load->view('modul_kasir/pemesanan_kasir');
	}


}
