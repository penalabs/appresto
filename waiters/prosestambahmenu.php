<?php
// koneksi database
include 'koneksi.php';
$query_trx = "SELECT MAX(id) AS id_trx FROM pemesanan";
$hasil_trx = mysqli_query($koneksi,$query_trx);
$data=mysqli_fetch_array($hasil_trx);
$id_trx = $data['id_trx'];
$id_pemesanan = $id_trx+1;

if(isset($_POST["submit"])) {
	$checkboxmenu = $_POST['menu'];
	for ($i=0; $i<sizeof ($checkboxmenu);$i++) {
		// select harga
		$queryharga = "SELECT harga FROM menu WHERE id='$checkboxmenu[$i]'";
		$hasilharga = mysqli_query($koneksi,$queryharga);
		$dataharga=mysqli_fetch_array($hasilharga);
		$harga = $dataharga['harga'];

		//insert
		$query="INSERT INTO pemesanan_menu (id_pemesanan,id_menu,jumlah_pesan,subharga,status) VALUES ('$id_pemesanan','$checkboxmenu[$i]','1','$harga','')";
		mysqli_query($koneksi,$query) or die(mysqli_error());
	}
}
header("location:pesan.php");
?>
