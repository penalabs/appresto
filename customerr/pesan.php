<?php
   session_start();
   include "koneksi.php";
   $no_meja=$_GET['no_meja'];
   $nama_pemesan=$_GET['nama_pemesan'];
   $keterangan=$_GET['keterangan'];
   $total_harga=$_GET['total_harga'];
   $id_resto=$_GET['id_resto'];
   $tanggal=date('Y-m-d');

   $result_array = array();
   $query=mysqli_query($koneksi, "INSERT INTO pemesanan (nama_pemesan, no_meja, keterangantambahan, tanggal, total_harga, id_user_resto, status)
   VALUES ('$nama_pemesan', '$no_meja', '$keterangan', '$tanggal', '$total_harga', '$id_resto', 'customer memesan')") or die(mysqli_error($koneksi));
       if ($query === TRUE) {
         $last_id = mysqli_insert_id($koneksi);
         // $pesan['pesan'] = 'sukses input pesanan';
         // array_push($result_array, $pesan);

         foreach ($_SESSION['cart'] as $cart_item) {
             $id_menu=$cart_item['id_menu'];
             $nama_menu=$cart_item['nama_menu'];
             $jumlah=$cart_item['jumlah'];
             $harga=$cart_item['harga'];
             $subharga=$harga*$jumlah;
             $query2=mysqli_query($koneksi, "INSERT INTO pemesanan_menu (id_pemesanan, id_menu, jumlah_pesan, subharga)
             VALUES ('$last_id', '$id_menu', '$jumlah', '$subharga')") or die(mysqli_error($koneksi));
                 if ($query2 === TRUE) {
                   // $pesan['pesan'] = 'sukses input item menu pesanan';
                   // array_push($result_array, $pesan);
                 }else{
                   // $pesan['pesan'] = 'gagal input item menu pesanan';
                   // array_push($result_array, $pesan);
                 }
         }

         foreach ($_SESSION['cart2'] as $cart_item) {
             $id_paket=$cart_item['id_paket'];
             $nama_paket=$cart_item['nama_paket'];
             $jumlah=$cart_item['jumlah'];
             $harga=$cart_item['harga'];
             $subharga=$harga*$jumlah;
             $query2=mysqli_query($koneksi, "INSERT INTO pemesanan_paket (id_pemesanan, id_paket, jumlah_pesan, subharga)
             VALUES ('$last_id', '$id_paket', '$jumlah', '$subharga')") or die(mysqli_error($koneksi));
                 if ($query2 === TRUE) {
                   // $pesan['pesan'] = 'sukses input item menu pesanan';
                   //  array_push($result_array, $pesan);
                 }else{
                   // $pesan['pesan'] = 'gagal input item menu pesanan';
                   //  array_push($result_array, $pesan);
                 }
         }

         $pesan['pesan'] = 'sukses input pesanan';
         array_push($result_array, $pesan);
       } else {
         $pesan['pesan'] = 'gagal input pesanan';
          array_push($result_array, $pesan);
       }
    ?>
  <?php
    unset ($_SESSION["cart"]);
    unset ($_SESSION["cart2"]);
    echo json_encode($result_array);
  ?>
