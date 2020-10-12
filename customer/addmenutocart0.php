<?php
   include "koneksi.php";
   $id_menu=$_GET['id_menu'];
   $result_array = array();
   $query=mysqli_query($koneksi, "SELECT * FROM menu where id_kategori='$id_kategori'") or die(mysqli_error($koneksi));
   if($query) {
          $h['status'] = 'berhasil';
          array_push($result_array, $h);
    ?>
  <?php
    }
    echo json_encode($result_array);
  ?>
