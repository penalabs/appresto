<?php
// koneksi database
include 'koneksi.php';
$query_trx = "SELECT MAX(id) AS id_trx FROM pemesanan";
$hasil_trx = mysqli_query($koneksi,$query_trx);
$data=mysqli_fetch_array($hasil_trx);
$id_trx = $data['id_trx'];
$id_pemesanan = $id_trx+1;

if(isset($_POST["submit"])) {
	$checkboxpaket = $_POST['paket'];
	for ($i=0; $i<sizeof ($checkboxpaket);$i++) {
		//tampilkan harga
		$queryharga = "SELECT harga FROM paket WHERE id='$checkboxpaket[$i]'";
		$hasilharga = mysqli_query($koneksi,$queryharga);
		$dataharga=mysqli_fetch_array($hasilharga);
		$harga = $dataharga['harga'];

		//insert
		$query="INSERT INTO pemesanan_paket (id_pemesanan,id_paket,jumlah_pesan,subharga,status) VALUES ('$id_pemesanan','$checkboxpaket[$i]','1','$harga','')";
		mysqli_query($koneksi,$query) or die(mysqli_error());
	}
}
header("location:pesan.php");
?>
