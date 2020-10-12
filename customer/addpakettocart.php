<?php
session_start();
$result_array = array();
if(isset($_GET['id_paket'])) {
    if (!isset($_SESSION['cart2'])) {
        $_SESSION['cart2']=array();
    }

    if (!empty($_SESSION['cart2'])) {
        foreach ($_SESSION['cart2'] as $key => $value) {
          // echo $value['id_paket'] . " in " . $key . ", ";
          if($value['id_paket']==$_GET['id_paket']){
            $pesan['pesan'] = 'paket sudah di daftar pesanan';
            array_push($result_array, $pesan);
          }else{
            $h['id_paket'] = $_GET['id_paket'];
            $h['nama_paket'] = $_GET['nama_paket'];
            $h['jumlah'] = $_GET['jumlah'];
            $h['harga'] = $_GET['harga'];
            array_push($_SESSION['cart2'], $h);
            $pesan['pesan'] = 'sukses menambah pesanan';
            array_push($result_array, $pesan);
          }
        }
    }else{
      $h['id_paket'] = $_GET['id_paket'];
      $h['nama_paket'] = $_GET['nama_paket'];
      $h['jumlah'] = $_GET['jumlah'];
      $h['harga'] = $_GET['harga'];
      array_push($_SESSION['cart2'], $h);
      $pesan['pesan'] = 'sukses menambah pesanan';
      array_push($result_array, $pesan);
    }

}
echo json_encode($result_array);
// echo $_SESSION['cart2'][0]['id_paket'];
// unset ($_SESSION["cart2"][1]);
