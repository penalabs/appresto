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
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="keranjang.php" class="dropdown-toggle" >
              <img src="cart.png" class="user-image pull-right" alt="User Image">
              <span class="hidden-xs">adminrestosatu</span>
            </a>
          </li>

        </ul>
      </div>
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

      <div class="content-wrapper">

      <section class="content">
        <div class="row">
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- /.box -->
            <!-- general form elements disabled -->
            <div class="box box-default">
              <!-- /.box-header -->

                <table class="table table-hover">
                  <tr>
                    <td colspan="3"><a href="kategori_menu_sub1.php"><button type="button" class="btn btn-block btn-success btn-lg" style="width: 100%;text-align:left; padding-left:6px"><span class="fa fa-arrow-right"></span> Tambah Menu</button></a></td>
                  </tr>
                  <tr>
                    <td colspan="3"><a href="kategori_paket_sub1.php"><button type="button" class="btn btn-block btn-success btn-lg" style="width: 100%;text-align:left; padding-left:6px"><span class="fa fa-arrow-right"></span> Tambah Paket</button></a></td>
                  </tr>

                </table>



            </div>
            <!-- /.box -->
          </div>
          <!--/.col (right) -->
        </div>
      </section>

      </div>


    <!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>


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
