<?php
// koneksi database
include 'koneksi.php';
$id = $_GET['id'];
$queryupdate = "UPDATE pemesanan SET status='selsai' WHERE id='$id'";
$hasilupdate = mysqli_query($koneksi,$queryupdate);
header("location:statuspesanan.php");