<?php
// koneksi database
include 'koneksi.php';
$id = $_GET['idpemesananmenu'];

//mencari jumlah pesan
$querykurang = "SELECT * FROM pemesanan_menu WHERE id = '$id'";
$hasilkurang = mysqli_query($koneksi,$querykurang);
$data=mysqli_fetch_array($hasilkurang);
$iddatabase = $data['jumlah_pesan'];
$hasiljumlahpesan = $iddatabase+1;

//mengurangi stok menu
/*$querykurang = "SELECT * FROM pemesanan_menu WHERE id = '$id'";
$hasilkurang = mysqli_query($koneksi,$querykurang);
$data=mysqli_fetch_array($hasilkurang);
$iddatabase = $data['jumlah_pesan'];
$hasiljumlahpesan = $iddatabase+1;*/

//mencari harga menu
$cariharga_menu = "SELECT harga FROM menu join pemesanan_menu on pemesanan_menu.id_menu=menu.id WHERE pemesanan_menu.id = '$id'";
$queryhasilcariharga_menu = mysqli_query($koneksi,$cariharga_menu);
$hasilcariharga_menu=mysqli_fetch_array($queryhasilcariharga_menu);
$harga_menu=$hasilcariharga_menu['harga'];
$subharga=$harga_menu*$hasiljumlahpesan;

if ($hasiljumlahpesan == 0){
	$querydelete = "DELETE FROM pemesanan_menu WHERE id='$id'";
	$delete = mysqli_query($koneksi,$querydelete);
	header("location:pesan.php");
}else{
	$queryupdate = "UPDATE pemesanan_menu SET jumlah_pesan='$hasiljumlahpesan',subharga='$subharga' WHERE id='$id'";
	$hasilupdate = mysqli_query($koneksi,$queryupdate);
	header("location:pesan.php");
}
?>