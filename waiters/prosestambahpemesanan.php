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

//select tanggal awal dan akhir untuk menentukan intensif SUM intensif gajo
$querytanggalgaji ="SELECT tanggal_awal,tanggal_akhir FROM gaji ORDER BY tanggal_awal,tanggal_akhir DESC LIMIT 1";
$hasiltglgaji = mysqli_query($koneksi,$querytanggalgaji);
$datatglgaji=mysqli_fetch_array($hasiltglgaji);
$tgl_awal = $datatglgaji['tanggal_awal'];
$tgl_akhir = $datatglgaji['tanggal_akhir'];

if(isset($_POST["submit"])) {
	$konsumen = $_POST['konsumen'];
	$no_meja = $_POST['meja'];
	$keterangantambahan = $_POST['keterangantambahan'];
	$query="INSERT INTO pemesanan (id,nama_pemesan,no_meja,keterangantambahan,tanggal,total_harga,id_user_resto,status) VALUES ('$id_pemesanan', '$konsumen', '$no_meja','$keterangantambahan','$tanggal','$subtotal','$waiters','produksi')";
	mysqli_query($koneksi,$query) or die(mysqli_error());

//query insert intensif waiters
	$query_insert_intensif="INSERT INTO intensif_waiters (id_user_resto,tanggal,jumlah_bonus) VALUES ('$waiters', '$tanggal','1000')";
	mysqli_query($koneksi,$query_insert_intensif) or die(mysqli_error());
	//echo "iki loh bonusmu = ".$nominalitensif;

	$queryitensif ="SELECT jumlah_bonus FROM intensif_waiters WHERE tanggal>'$tgl_awal' AND tanggal<'$tgl_akhir' AND id_user_resto='$waiters'";
	$hasilitensif = mysqli_query($koneksi,$queryitensif);
	$dataitensif=mysqli_fetch_array($hasilitensif);
	$nominalitensif = $dataitensif['jumlah_bonus'];

	//mengambil gaji awal + intensif gaji
	$querygajiawal ="SELECT tanggal_awal,tanggal_akhir,nominal_gaji FROM gaji ORDER BY tanggal_awal,tanggal_akhir DESC LIMIT 1";
	$hasilgajiawal = mysqli_query($koneksi,$querygajiawal);
	$datagajiawal=mysqli_fetch_array($hasilgajiawal);
	$gajiawal = $datagajiawal['nominal_gaji'];
	$hasilpenambahan = $gajiawal+$nominalitensif;

	//update gaji + intensif gaji
	$queryupdate = "UPDATE gaji SET nominal_gaji='$hasilpenambahan' WHERE id_user_resto='$waiters'";
	$hasilupdate = mysqli_query($koneksi,$queryupdate);

	header("location:pesan.php");
}
?>