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
        <?php
        $waiters = $_SESSION['id'];
        $queryrestouser ="SELECT user_resto.*, kanwil.*, resto.*
        FROM user_resto
        JOIN kanwil ON kanwil.`id_kanwil` = user_resto.`id_kanwil`
        JOIN resto ON resto.`id` = user_resto.`id_resto`
        WHERE user_resto.`id`= '$waiters'
        ORDER BY alamat_kantor,nama_resto DESC LIMIT 1";
        $hasilqueryuser = mysqli_query($koneksi,$queryrestouser);
        $datauserlogin=mysqli_fetch_array($hasilqueryuser);
        $nama_resto = $datauserlogin['nama_resto'];
        $nama_kanwil = $datauserlogin['alamat_kantor'];
        echo "<marquee>Kantor Wilayah ".$nama_kanwil." Resto ".$nama_resto."</marquee>";
        ?>

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
            <p>
              <?php 
//menampilkan nama waiters
              $kalimat = $_SESSION['user']; 
              $kalimat_new = ucfirst($kalimat);
              echo $kalimat_new;
              $waiters = $_SESSION['id'];

//select tanggal awal dan akhir untuk menentukan intensif SUM intensif gajo
              $querytanggalgaji ="SELECT tanggal_awal,tanggal_akhir FROM gaji ORDER BY tanggal_awal,tanggal_akhir DESC LIMIT 1";
              $hasiltglgaji = mysqli_query($koneksi,$querytanggalgaji);
              $datatglgaji=mysqli_fetch_array($hasiltglgaji);
              $tgl_awal = $datatglgaji['tanggal_awal'];
              $tgl_akhir = $datatglgaji['tanggal_akhir'];

// sum intensif gaji
              $queryitensif ="SELECT SUM(jumlah_bonus) AS total_bonus FROM intensif_waiters WHERE tanggal>'$tgl_awal' AND tanggal<'$tgl_akhir' AND id_user_resto='$waiters'";
              $hasilitensif = mysqli_query($koneksi,$queryitensif);
              $dataitensif=mysqli_fetch_array($hasilitensif);
              $nominalitensif = $dataitensif['total_bonus'];
              ?>
            </p>
            <a href="#"><i class="text-success"></i> Bonus : <?php echo "Rp. ".number_format($nominalitensif).",-"; ?></a>
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
                    <td colspan="3"><a href="kategori_menu_sub1.php"><button type="button" style="width: 100%;"><span class="fa fa-plus-circle"></span> Tambah Menu</button></a></td>
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
              </div>
              <div style="float: left; width: 50%;">
                <button style="width: 100%;" type="submit" name="submit" class="btn btn-primary">Pesan Dulu</button>  
              </div>
              <div style="float: right; width: 50%;">
                <a style="width: 100%;" data-toggle="modal" data-target="#modal-default2" class="btn btn-success">Bayar Awal</a>  
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal-default2">
      <div class="modal-dialog">
        <div class="modal-content">
          <div style="background-color: #db1d36;" class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 style="color: white;" class="modal-title">Pembayaran</h4>
            </div>
            <div class="modal-body">
              <!-- checkbox -->
              <input type="hidden" id="txt1" onkeyup="sum();" value="<?php echo $subtotal; ?>" class="form-control">
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
              </div>

              <div class="input-group input-group-md">
                <!-- <input type="hidden" name="idpemesanan" value="<?php echo $id; ?>" class="form-control"> -->
                <input type="text" id="txt2" onkeyup="sum();" name="nominal_bayar" placeholder="Uang Bayar" class="form-control">
                <span class="input-group-btn">
                  <button type="submit" name="submitbayar" class="btn btn-info btn-flat">Bayar</button>
                </span>
              </div>
              <br>
              <div class="form-group">
                <input type="text" id="txt3" class="form-control" placeholder="Uang Kembalian" disabled>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </form>
    <!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

        <script>
          var bayar = document.getElementById('txt2').value;
          function numberWithCommas(bayar) {
            return bayar.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          }

          function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtSecondNumberValue) - parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
              var number_string = result.toString(),
              sisa  = number_string.length % 3,
              rupiah  = number_string.substr(0, sisa),
              ribuan  = number_string.substr(sisa).match(/\d{3}/g);
              if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
              }
              document.getElementById('txt3').value = "Rp. "+rupiah+",-";
            }
          }
        </script>
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