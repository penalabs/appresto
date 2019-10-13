<?php
// koneksi database
include 'koneksi.php';
session_start();

$currentDateTime = date('Y-m-d H:i:s');
$user_resto = $_SESSION['id'];
$nominal_bayar = $_POST['nominal_bayar'];
$idpemesanan = $_POST['idpemesanan'];

$query="INSERT INTO pembayaran (id_user_kasir,id_pemesanan,nominal,status,tanggal) VALUES ('$user_resto', '$idpemesanan','$nominal_bayar','lunas','$currentDateTime')";
mysqli_query($koneksi,$query) or die(mysqli_error());

$queryupdate = "UPDATE pemesanan SET status='lunas' WHERE id='$idpemesanan'";
$hasilupdate = mysqli_query($koneksi,$queryupdate);
header("location:statuspesanan.php");