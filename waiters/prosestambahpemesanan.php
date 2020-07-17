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

	//update stok menu
	$query_update_menu ="SELECT id_menu,jumlah_pesan FROM pemesanan_menu";
	$hasil_query_menu = mysqli_query($koneksi,$query_update_menu);
	while ($data_menu_query=mysqli_fetch_array($hasil_query_menu)) {
		$vlu_menu = $data_menu_query['jumlah_pesan'];
		$vlu_id_menu = $data_menu_query['id_menu'];

		//mengambil stok saat ini pada menu
		$query_master_menu ="SELECT stok FROM menu";
		$hasil_query_master = mysqli_query($koneksi,$query_master_menu);
		$data_master_query=mysqli_fetch_array($hasil_query_master);
		$vlu_menu_master = $data_master_query['stok'];

		$rumus_update_stok = $vlu_menu_master-$vlu_menu;

		//update stok master menu
		$queryupdate_master = "UPDATE menu SET stok='$rumus_update_stok' WHERE id='$vlu_id_menu'";
		$hasilupdate_master = mysqli_query($koneksi,$queryupdate_master);
	}

	//update stok paket
	$query_update_paket ="SELECT id_paket,jumlah_pesan FROM pemesanan_paket";
	$hasil_query_paket = mysqli_query($koneksi,$query_update_paket);
	while ($data_paket_query=mysqli_fetch_array($hasil_query_paket)) {
		$vlu_paket = $data_paket_query['jumlah_pesan'];
		$vlu_id_paket = $data_paket_query['id_paket'];

		//mengambil stok saat ini pada menu
		$query_master_paket ="SELECT jumlah FROM paket";
		$hasil_query_master_paket = mysqli_query($koneksi,$query_master_paket);
		$data_master_paket_query=mysqli_fetch_array($hasil_query_master_paket);
		$vlu_paket_master = $data_master_paket_query['jumlah'];

		$rumus_update_stok_paket = $vlu_paket_master-$vlu_paket;

		//update stok master menu
		$queryupdate_master_paket = "UPDATE paket SET jumlah='$rumus_update_stok_paket' WHERE id='$vlu_id_paket'";
		$hasilupdate_master_paket = mysqli_query($koneksi,$queryupdate_master_paket);
	}

	header("location:pesan.php");
}elseif(isset($_POST["submitbayar"])){
	$konsumen = $_POST['konsumen'];
	$no_meja = $_POST['meja'];
	$nominal_bayar = $_POST['nominal_bayar'];
	$keterangantambahan = $_POST['keterangantambahan'];
	$query="INSERT INTO pemesanan (id,nama_pemesan,no_meja,keterangantambahan,tanggal,total_harga,id_user_resto,status) VALUES ('$id_pemesanan', '$konsumen', '$no_meja','$keterangantambahan','$tanggal','$subtotal','$waiters','produksi_lunas')";
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

//digunakan untuk insert pembayaran awal
	$query="INSERT INTO pembayaran (id_user_kasir,id_pemesanan,nominal,status,tanggal) VALUES ('$waiters', '$id_pemesanan','$nominal_bayar','lunas','$tanggal')";
	mysqli_query($koneksi,$query) or die(mysqli_error());

	header("location:pesan.php");
}
?>