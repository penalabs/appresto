<?php
// koneksi database
include 'koneksi.php';
$id = $_GET['idpemesananpaket'];

//mencari jumlah pesan
$querykurang = "SELECT * FROM pemesanan_paket WHERE id = '$id'";
$hasilkurang = mysqli_query($koneksi,$querykurang);
$data=mysqli_fetch_array($hasilkurang);
$iddatabase = $data['jumlah_pesan'];
$hasiljumlahpesan = $iddatabase+1;

//mencari harga paket
$cariharga_paket = "SELECT harga FROM paket join pemesanan_paket on pemesanan_paket.id_paket=paket.id WHERE pemesanan_paket.id = '$id'";
$queryhasilcariharga_paket = mysqli_query($koneksi,$cariharga_paket);
$hasilcariharga_paket=mysqli_fetch_array($queryhasilcariharga_paket);
$harga_paket=$hasilcariharga_paket['harga'];
$subharga=$harga_paket*$hasiljumlahpesan;

if ($hasiljumlahpesan == 0){
	$querydelete = "DELETE FROM pemesanan_paket WHERE id='$id'";
	$delete = mysqli_query($koneksi,$querydelete);
	header("location:pesan.php");
}else{
	$queryupdate = "UPDATE pemesanan_paket SET jumlah_pesan='$hasiljumlahpesan',subharga='$subharga' WHERE id='$id'";
	$hasilupdate = mysqli_query($koneksi,$queryupdate);
	header("location:pesan.php");
}
?>