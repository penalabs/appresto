<?php
session_start();
$result_array = array();
if(isset($_GET['id_paket'])) {

  // foreach ($_SESSION['cart2'] as $cart2_item) {
  //     // echo $pid=$cart2_item['id_paket'].'<br>';
  //     echo $_SESSION['cart2']['id_paket'];
  // }
  foreach ($_SESSION['cart2'] as $key => $value) {
    // echo $value['id_paket'] . " in " . $key . ", ";
    if($value['id_paket']==$_GET['id_paket']){
      unset ($_SESSION["cart2"][$key]);

      $pesan['pesan'] = 'sukses hapus item';
      array_push($result_array, $pesan);
    }
  }
// $key = array_search('green', $array); // $key = 2;
// unset ($_SESSION["cart2"]);
echo json_encode($result_array);
}
