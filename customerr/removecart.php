<?php
session_start();
$result_array = array();
if(isset($_GET['id_menu'])) {

  // foreach ($_SESSION['cart'] as $cart_item) {
  //     // echo $pid=$cart_item['id_menu'].'<br>';
  //     echo $_SESSION['cart']['id_menu'];
  // }
  foreach ($_SESSION['cart'] as $key => $value) {
    // echo $value['id_menu'] . " in " . $key . ", ";
    if($value['id_menu']==$_GET['id_menu']){
      unset ($_SESSION["cart"][$key]);

      $pesan['pesan'] = 'sukses hapus item';
      array_push($result_array, $pesan);
    }
  }
// $key = array_search('green', $array); // $key = 2;
// unset ($_SESSION["cart"]);
echo json_encode($result_array);
}
