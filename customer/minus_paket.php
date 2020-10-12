<?php
session_start();
$result_array = array();
if (!empty($_SESSION['cart2'])) {
    foreach ($_SESSION['cart2'] as $key => $value) {
      // echo $value['id_paket'] . " in " . $key . ", ";
      if($value['id_paket']==$_GET['id_paket']){


        if($value['jumlah']==0){
              $Jumlah=$value['jumlah'];

              $pesan['jumlah'] = $Jumlah;

              $_SESSION["cart2"][$key]['jumlah']=$Jumlah;

              array_push($result_array, $pesan);
        }else{
              $Jumlah=$value['jumlah']-1;

              $pesan['jumlah'] = $Jumlah;

              $_SESSION["cart2"][$key]['jumlah']=$Jumlah;

              array_push($result_array, $pesan);
        }

      }
    }
    echo json_encode($result_array);

}
 ?>
