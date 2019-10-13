<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user_resto where user='$username' and pass='$password' and jenis='waiters'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$akun = mysqli_fetch_assoc($data);
	$_SESSION['id'] = $akun['id'];
	$_SESSION['user'] = $username;
	header("location:pesan.php");
}else{
	header("location:index.php");
}
?>