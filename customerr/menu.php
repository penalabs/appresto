<?php
   include "koneksi.php";
   $id_kategori=$_GET['id_kategori'];
   $id_resto=$_GET['id_resto'];
   $no=1;
   $result_array = array();
   $query=mysqli_query($koneksi, "SELECT * FROM menu where id_kategori='$id_kategori' and id_resto='$id_resto'") or die(mysqli_error($koneksi));
   while ($row=mysqli_fetch_array($query)) {
          $h['id'] = $row["id"];
          $h['menu'] = $row["menu"];
          $h['foto'] = $row["foto"];
          $h['harga'] = $row["harga"];
          array_push($result_array, $h);
    ?>
  <?php
    $no++;
    }
    echo json_encode($result_array);
  ?>
