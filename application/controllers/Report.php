<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function pdf()
	{

      $no_meja = $this->input->get('no_meja');
	  $this->load->library('pdfgenerator');

      $sql = "SELECT pemesanan.id,menu.menu,pemesanan_menu.jumlah_pesan,pemesanan_menu.subharga FROM pemesanan_menu join menu on menu.id=pemesanan_menu.id_menu join pemesanan on pemesanan.id=pemesanan_menu.id_pemesanan where pemesanan.no_meja='$no_meja'";
      $data['datamenu']=$this->db->query($sql)->result();

      $sql = "SELECT pemesanan.id,paket.nama_paket,pemesanan_paket.jumlah_pesan,pemesanan_paket.subharga FROM pemesanan_paket join paket on paket.id=pemesanan_paket.id_paket join pemesanan on pemesanan.id=pemesanan_paket.id_pemesanan where pemesanan.no_meja='$no_meja'";
      $data['datapaket']=$this->db->query($sql)->result();

      $sql = "SELECT pemesanan.id,paket.nama_paket,pemesanan_paket.jumlah_pesan,pemesanan_paket.subharga FROM pemesanan_paket join paket on paket.id=pemesanan_paket.id_paket join pemesanan on pemesanan.id=pemesanan_paket.id_pemesanan where pemesanan.no_meja='$no_meja'";
      $data['id_pemesanan']=$this->db->query($sql)->row();
      $pemesanan=$this->db->query($sql)->row();
      $id_pemesanan=$pemesanan->id;

      $sql = "SELECT * FROM pemesanan where no_meja='$no_meja'";
      $data['data_pemesanan']=$this->db->query($sql)->row();
	  $id_user_resto=$this->db->query($sql)->row();
	  $id_user_resto2=$id_user_resto->id_user_resto;
	  
	  $sql = "SELECT * FROM user_resto join resto on resto.id=user_resto.id_resto where user_resto.id='$id_user_resto2'";
      $data['data_resto']=$this->db->query($sql)->row();

      $sql = "SELECT * FROM pembayaran where id_pemesanan='$id_pemesanan'";
      $data['data_pembayaran']=$this->db->query($sql)->row();

	    $html = $this->load->view('modul_kasir/table_report', $data, true);

	    $this->pdfgenerator->generate($html,'contoh');

	}
	public function struk_opsi(){
		$this->load->library("EscPos.php");
		try {
			// Enter the device file for your USB printer here
			// You can check the tutorial here: https://mike42.me/blog/2015-03-getting-a-usb-receipt-printer-working-on-linux
			if($connector = new Escpos\PrintConnectors\FilePrintConnector("/dev/usb/lp0")){
			/* Print a "Hello world" receipt" */
			$printer = new Printer($connector);
			$printer -> text("Hello World!\n");
			$printer -> cut();
			/* Close printer */
			$printer -> close();
			}
		} catch (Exception $e) {
			echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
		}
	}

}
