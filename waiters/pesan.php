<?php
session_start();
include "koneksi.php";
if(empty($_SESSION['user'])){
header("Location:index.php");
}else{

    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Waiters</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../plugins/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="../plugins/Ionicons/css/ionicons.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
      <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <marquee> <span class="logo-lg">Resto</span></marquee>
    </a>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['user']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <li>
          <a href="pesan.php"><i class="fa fa-cart-plus"></i> <span>Pesan</span></a>
        </li>
        <li>
          <a href="statuspesanan.php"><i class="fa fa-clipboard"></i> <span>Status Pesanan</span></a>
        </li>
        <li class="header">Setting</li>
       <li><a href="logout.php"><i class="fa fa-unlock"></i> Logout</a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <form method="post" action="prosestambahpemesanan.php">
  <div class="wrapper">
    <div class="row">
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-12">
        <!-- /.box -->
        <!-- general form elements disabled -->
        <div class="box box-warning">
          <!-- /.box-header -->
            <!-- /.box-header -->
            <?php
            $query_trx = "SELECT MAX(id) AS id_trx FROM pemesanan";
            $hasil_trx = mysqli_query($koneksi,$query_trx);
            $data=mysqli_fetch_array($hasil_trx);
            $id_trx = $data['id_trx'];
            $id_pemesanan = $id_trx+1;
            ?>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr style="background: #99ffff;">
                  <th style="width: 5px;">No</th>
                  <th style="width: 65px;">Menu</th>
                  <th style="width: 30px;">Qty</th>
                </tr>
                <?php
                  $querytampildata = mysqli_query ($koneksi, "
                    SELECT pemesanan_menu.*,menu.*, pemesanan_menu.id AS idpemesananmenu
                    FROM pemesanan_menu
                    JOIN menu ON menu.id = pemesanan_menu.id_menu 
                    WHERE pemesanan_menu.id_pemesanan='$id_pemesanan' ORDER BY pemesanan_menu.id  DESC ");
                  $no = 1;
                  while ($datatampilpesanan = mysqli_fetch_array($querytampildata)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $datatampilpesanan['menu'] ?></td>
                  <td>
                    <div class="row">
                      <div style="width: 20px; display: inline-block; padding: 0px 0px;" class="col-md-4">
                        <a href="updateqtymenukurang.php?idpemesananmenu=<?php echo $datatampilpesanan['idpemesananmenu']; ?>" class="btn btn-block btn-primary btn-xs">-</a>
                      </div>
                      <div style="display: inline-block; padding: 0px 0px;" class="col-md-4">
                        <input style="width: 30px; text-align: center;" type="text" readonly="" name="qty" value="<?php echo $datatampilpesanan['jumlah_pesan']; ?>">
                      </div>
                      <div style="width: 20px; display: inline-block; padding: 0px 0px; margin-right: 5px;" class="col-md-4">
                        <a href="updateqtymenutambah.php?idpemesananmenu=<?php echo $datatampilpesanan['idpemesananmenu']; ?>" class="btn btn-block btn-success btn-xs">+</a>
                      </div>
                      </div>
                  </td>
                </tr>
                <?php } ?>
                <tr>
                  <td><span class="fa fa-plus-circle"></span></td>
                  <td><a data-toggle="modal" data-target="#modal-default">Tambah Menu</a></td>
                  <td></td>
                </tr>
                <!-- pembatas pesanan paket -->
                <tr style="background: #99ffff;">
                 <th style="width: 5px;">No</th>
                  <th style="width: 65px;">Paket</th>
                  <th style="width: 30px;">Qty</th>
                </tr>
                <?php
                  $querytampildata = mysqli_query ($koneksi, "
                    SELECT pemesanan_paket.*,paket.*,pemesanan_paket.id AS idpemesananpaket
                    FROM pemesanan_paket
                    JOIN paket ON paket.id = pemesanan_paket.id_paket 
                    WHERE pemesanan_paket.id_pemesanan='$id_pemesanan'
                    ORDER BY pemesanan_paket.id DESC");
                  $no = 1;
                  while ($datatampilpesanan = mysqli_fetch_array($querytampildata)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $datatampilpesanan['nama_paket'] ?></td>
                    <td>
                    <div class="row">
                      <div style="width: 20px; display: inline-block; padding: 0px 0px;" class="col-md-4">
                        <a href="updateqtypaketkurang.php?idpemesananpaket=<?php echo $datatampilpesanan['idpemesananpaket']; ?>" class="btn btn-block btn-primary btn-xs">-</a>
                      </div>
                      <div style="display: inline-block; padding: 0px 0px;" class="col-md-4">
                        <input style="width: 30px; text-align: center;" type="text" readonly="" name="qty" value="<?php echo $datatampilpesanan['jumlah_pesan']; ?>">
                      </div>
                      <div style="width: 20px; display: inline-block; padding: 0px 0px; margin-right: 5px;" class="col-md-4">
                        <a href="updateqtypakettambah.php?idpemesananpaket=<?php echo $datatampilpesanan['idpemesananpaket']; ?>" class="btn btn-block btn-success btn-xs">+</a>
                      </div>
                      </div>
                  </td>
                </tr>
                <?php } ?>
                <tr>
                  <td><span class="fa fa-plus-circle"></span></td>
                  <td><a data-toggle="modal" data-target="#modal-default1">Tambah Paket</a></td>
                  <td></td>
                </tr>
              </table>
            </div>

            <!-- /.box-body -->
          <div class="box-body">
              <!-- text input -->
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="konsumen" class="form-control" placeholder="Nama Konsumen" required="">
              </div>
              <div class="form-group">
                  <label>No. Meja</label>
                  <select name="meja" class="form-control">
                  <?php
                  $querymeja = "SELECT * FROM meja";
                  $hasilmeja = mysqli_query($koneksi,$querymeja);
                  while($data=mysqli_fetch_array($hasilmeja)){
                      echo "<option value=$data[nomor]>Meja $data[nomor]</option>";
                  }
                  ?>
                  </select>
                </div>
                <div class="form-group">
                <label>Keterangan Tambahan</label>
                <textarea name="keterangantambahan" class="form-control" placeholder="Isikan jika ingi menambah permintaan lain!"></textarea>
              </div>
            </div>
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (right) -->
    </div>

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <?php
            //menu
              $querysubtotalmenu = "SELECT SUM(subharga) AS jummenu FROM pemesanan_menu WHERE id_pemesanan='$id_pemesanan'";
              $hasilsubtotalmenu = mysqli_query($koneksi,$querysubtotalmenu);
              $datasubhargamenu=mysqli_fetch_array($hasilsubtotalmenu);
              $subhargamenu = $datasubhargamenu['jummenu'];
            //paket
              $querysubtotalpaket = "SELECT SUM(subharga) AS jumpaket FROM pemesanan_paket WHERE id_pemesanan='$id_pemesanan'";
              $hasilsubtotalpaket = mysqli_query($koneksi,$querysubtotalpaket);
              $datasubhargapaket=mysqli_fetch_array($hasilsubtotalpaket);
              $subhargapaket = $datasubhargapaket['jumpaket'];

            //menu + paket
              $subtotal = $subhargamenu + $subhargapaket;
            ?>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th style="width: 20%;">Subtotal Menu</th>
                  <th style="width: 2%;"> : </th>
                  <td style="width: 75%;"><?php echo "Rp. ".number_format($subhargamenu).",-"; ?></td>
                </tr>
                <tr>
                  <th style="width: 20%;">Subtotal Paket</th>
                  <th style="width: 2%;"> : </th>
                  <td style="width: 75%;"><?php echo "Rp. ".number_format($subhargapaket).",-"; ?></td>
                </tr>
                <tr>
                  <th style="width: 20%;">Total Menu + Paket</th>
                  <th style="width: 2%;"> : </th>
                  <td style="width: 75%;"><?php echo "Rp. ".number_format($subtotal).",-"; ?></td>
                </tr>
              </table>
              <hr>
              <button style="width: 100%; height: 100%;" type="submit" name="submit" class="btn btn-primary">Pesan</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
  </div>
</form>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="prosestambahmenu.php">
        <div style="background-color: #2de34c;" class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Menu</h4>
          </div>
          <div class="modal-body">
             <!-- checkbox -->
             <div class="col-md-6">
              <h4><b>Tersedia</h4>
               <div class="form-group">
                  <div class="checkbox">
                    <label>
                     <?php
                      $querymenu = "SELECT * FROM menu WHERE status = 'tersedia'";
                      $hasilmenu = mysqli_query($koneksi,$querymenu);
                      while($datamenu=mysqli_fetch_array($hasilmenu)){
                        if ($datamenu['foto'] == null) {
                          $foto = "";
                          echo " <img src='../uploads/default.jpg' width='60px' height='50px' /> <input type='checkbox' name='menu[]' value='$datamenu[id]'> $datamenu[menu]<br>";
                        }else{
                          echo " <img src='../uploads/$datamenu[foto]' width='60px' height='50px' /> <input type='checkbox' name='menu[]' value='$datamenu[id]'> $datamenu[menu]<br>";
                        }
                      }
                      ?>
                    </label>
                  </div>
                </div>
             </div>
            <?php
            $querymenuhabis = "SELECT * FROM menu WHERE STATUS = 'habis'";
            $hasilmenuhabis = mysqli_query($koneksi,$querymenuhabis);
            $datamenuhabis=mysqli_fetch_array($hasilmenuhabis);
            $status =  $datamenuhabis['status'];

            if ($status == 'habis') { ?>
            <div class="col-md-6">
               <h4><b>Tidak Tersedia</h4>
               <div class="form-group">
                  <div class="checkbox">
                    <label>
                     <?php
                     $querymenuhabis = "SELECT * FROM menu WHERE STATUS = 'habis'";
                      $hasilmenuhabis = mysqli_query($koneksi,$querymenuhabis);
                      while($datamenuhabis=mysqli_fetch_array($hasilmenuhabis)){
                        if ($datamenu['foto'] == null) {
                          $foto = "";
                          echo " <img src='../uploads/default.jpg' width='60px' height='50px' /> <input disabled type='checkbox' name='menu[]' value='$datamenu[id]'> $datamenu[menu]<br>";
                        }else{
                          echo " <img src='../uploads/$datamenu[foto]' width='60px' height='50px' /> <input disabled type='checkbox' name='menu[]' value='$datamenu[id]'> $datamenu[menu]<br>";
                        }
                      }
                      ?>
                    </label>
                  </div>
                </div>
             </div>
            <?php }?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">List</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-default1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="prosestambahpaket.php">
        <div style="background-color: #6eb8f5;" class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Paket</h4>
          </div>
          <div class="modal-body">
             <!-- checkbox -->
              <!-- checkbox -->
             <div class="col-md-6">
              <h4><b>Tersedia</h4>
               <div class="form-group">
                  <div class="checkbox">
                    <label>
                     <?php
                      $querypaket = "SELECT * FROM paket WHERE status = 'tersedia'";
                      $hasilpaket = mysqli_query($koneksi,$querypaket);
                      while($datapaket=mysqli_fetch_array($hasilpaket)){
                        if ($datamenu['foto'] == null) {
                          $foto = "";
                          echo " <img src='../uploads/default.jpg' width='60px' height='50px' /> <input type='checkbox' name='paket[]' value='$datapaket[id]'> $datapaket[nama_paket]<br>";
                        }else{
                          echo " <img src='../uploads/$datamenu[foto]' width='60px' height='50px' /> <input type='checkbox' name='paket[]' value='$datapaket[id]'> $datapaket[nama_paket]<br>";
                        }
                      }
                      ?>
                    </label>
                  </div>
                </div>
             </div>
            <?php
            $querypakethabis = "SELECT * FROM paket WHERE STATUS = 'habis'";
            $hasilpakethabis = mysqli_query($koneksi,$querypakethabis);
            $datapakethabis=mysqli_fetch_array($hasilpakethabis);
            $statuspaket =  $datapakethabis['status'];

            if ($statuspaket == 'habis') { ?>
            <div class="col-md-6">
               <h4><b>Tidak Tersedia</h4>
               <div class="form-group">
                  <div class="checkbox">
                    <label>
                     <?php
                     $querypaket = "SELECT * FROM paket WHERE status = 'habis'";
                      $hasilpaket = mysqli_query($koneksi,$querypaket);
                      while($datapaket=mysqli_fetch_array($hasilpaket)){
                        if ($datamenu['foto'] == null) {
                          $foto = "";
                          echo " <img src='../uploads/default.jpg' width='60px' height='50px' /> <input disabled type='checkbox' name='paket[]' value='$datapaket[id]'> $datapaket[nama_paket]<br>";
                        }else{
                          echo " <img src='../uploads/$datamenu[foto]' width='60px' height='50px' /> <input disabled type='checkbox' name='paket[]' value='$datapaket[id]'> $datapaket[nama_paket]<br>";
                        }
                      }
                      ?>
                    </label>
                  </div>
                </div>
             </div>
            <?php }?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">List</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
      <script src="../plugins/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- SlimScroll -->
      <script src="../plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="../plugins/fastclick/lib/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="../dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../dist/js/demo.js"></script>
      <script src="../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css" />
      <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
</body>
</html>
    <?php
}
?>