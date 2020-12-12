<?php
session_start();
$result_array = array();
if(isset($_GET['id_menu'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart']=array();
    }

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
          // echo $value['id_menu'] . " in " . $key . ", ";
          if($value['id_menu']==$_GET['id_menu']){
            $pesan['pesan'] = 'menu sudah di daftar pesanan';
            array_push($result_array, $pesan);
          }else{
            $h['id_menu'] = $_GET['id_menu'];
            $h['nama_menu'] = $_GET['nama_menu'];
            $h['jumlah'] = $_GET['jumlah'];
            $h['harga'] = $_GET['harga'];
            array_push($_SESSION['cart'], $h);
            $pesan['pesan'] = 'sukses menambah pesanan';
            array_push($result_array, $pesan);
          }
        }
    }else{
      $h['id_menu'] = $_GET['id_menu'];
      $h['nama_menu'] = $_GET['nama_menu'];
      $h['jumlah'] = $_GET['jumlah'];
      $h['harga'] = $_GET['harga'];
      array_push($_SESSION['cart'], $h);
      $pesan['pesan'] = 'sukses menambah pesanan';
      array_push($result_array, $pesan);
    }

}
echo json_encode($result_array);
// echo $_SESSION['cart'][0]['id_menu'];
// unset ($_SESSION["cart"][1]);
