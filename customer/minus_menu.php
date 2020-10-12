<?php
session_start();
$result_array = array();
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
      // echo $value['id_menu'] . " in " . $key . ", ";
      if($value['id_menu']==$_GET['id_menu']){


        if($value['jumlah']==0){
              $Jumlah=$value['jumlah'];

              $pesan['jumlah'] = $Jumlah;

              $_SESSION["cart"][$key]['jumlah']=$Jumlah;

              array_push($result_array, $pesan);
        }else{
              $Jumlah=$value['jumlah']-1;

              $pesan['jumlah'] = $Jumlah;

              $_SESSION["cart"][$key]['jumlah']=$Jumlah;

              array_push($result_array, $pesan);
        }

      }
    }
    echo json_encode($result_array);

}
 ?>
