<?php
// koneksi database
session_start();
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s");
$waiters = $_SESSION['id'];

//update status
$id = $_GET['id'];
$queryupdate = "UPDATE pemesanan SET status='selsai' WHERE id='$id'";
$hasilupdate = mysqli_query($koneksi,$queryupdate);

//insert kinerja karyawan
$query_insert_kinerja="INSERT INTO tbl_kinerja_karyawan (id_user_resto,pemesanan,point) VALUES ('$waiters', '$id','1')";
	mysqli_query($koneksi,$query_insert_kinerja) or die(mysqli_error());
	
header("location:statuspesanan.php");