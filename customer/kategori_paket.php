<?php
   include "koneksi.php";
   $parent_id=$_GET['parent_id'];
   $no=1;
   $result_array = array();
   $query=mysqli_query($koneksi, "SELECT * FROM tbl_kategori_paket where parent_id='$parent_id'") or die(mysqli_error($koneksi));
   while ($row=mysqli_fetch_array($query)) {
          $h['id_kategori'] = $row["id_kategori"];
          $h['nama'] = $row["nama"];
          $h['parent_id'] = $row["parent_id"];
          array_push($result_array, $h);
    ?>
  <?php
    $no++;
    }
    echo json_encode($result_array);
  ?>
