<?php
// koneksi database
session_start();
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s");
$waiters = $_SESSION['id'];
//echo "data waiters : ".$waiters;

$query_trx = "SELECT MAX(id) AS id_trx FROM pemesanan";
$hasil_trx = mysqli_query($koneksi,$query_trx);
$data=mysqli_fetch_array($hasil_trx);
$id_trx = $data['id_trx'];
$id_pemesanan = $id_trx+1;

//menu
$querysubtotalmenu ="SELECT SUM(subharga) AS jummenu FROM pemesanan_menu WHERE id_pemesanan='$id_pemesanan'";
$hasilsubtotalmenu = mysqli_query($koneksi,$querysubtotalmenu);
$datasubhargamenu=mysqli_fetch_array($hasilsubtotalmenu);
$subhargamenu = $datasubhargamenu['jummenu'];
//paket
$querysubtotalpaket ="SELECT SUM(subharga) AS jumpaket FROM pemesanan_paket WHERE id_pemesanan='$id_pemesanan'";
$hasilsubtotalpaket = mysqli_query($koneksi,$querysubtotalpaket);
$datasubhargapaket=mysqli_fetch_array($hasilsubtotalpaket);
$subhargapaket = $datasubhargapaket['jumpaket'];
//menu + paket
$subtotal = $subhargamenu + $subhargapaket;

if(isset($_POST["submit"])) {
	$konsumen = $_POST['konsumen'];
	$no_meja = $_POST['meja'];
	$keterangantambahan = $_POST['keterangantambahan'];
	$query="INSERT INTO pemesanan (id,nama_pemesan,no_meja,keterangantambahan,tanggal,total_harga,id_user_resto,status) VALUES ('$id_pemesanan', '$konsumen', '$no_meja','$keterangantambahan','$tanggal','$subtotal','$waiters','produksi')";
	mysqli_query($koneksi,$query) or die(mysqli_error());
	header("location:pesan.php");
}
?>