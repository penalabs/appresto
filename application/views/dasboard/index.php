<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Manajemen Resto</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php include(APPPATH.'views/css.php');?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">


	<?php include(APPPATH.'views/header.php');?>
	<?php include(APPPATH.'views/menu.php');?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
       <?=$this->session->userdata('tipe');?>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
              $tgl=date("Y-m-d");
              $sql1 = "SELECT count(nominal) as jumlah_pembayaran FROM pembayaran where  tanggal LIKE '%$tgl%'";
              $jumlah_pembayaran=$this->db->query($sql1)->row();
              ?>

              <h3><?php echo $jumlah_pembayaran->jumlah_pembayaran;?></h3>

              <p>Pembayaran</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">

              <?php
               $tgl=date("Y-m-d");
              $sql = "SELECT count(nama_pemesan) as jumlah_pesan FROM pemesanan where status='siapsaji' or status='produksi' and tanggal LIKE '%$tgl%'";
						  $jumlah_pesan=$this->db->query($sql)->row();
              ?>

              <h3><?php echo $jumlah_pesan->jumlah_pesan;?></h3>

              <p>Pesanan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
              $tgl=date("Y-m-d");
              $sql2 = "SELECT sum(nominal) as pembayaran FROM pembayaran where  tanggal LIKE '%$tgl%'";
						  $pembayaran=$this->db->query($sql2)->row();
              ?>

              <h3><?php echo  "Rp " . number_format($pembayaran->pembayaran,2,',','.');?></h3>

              <p>Pendapatan Hari ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
		</div>








    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include(APPPATH.'views/footer.php');?>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
  <?php include(APPPATH.'views/js.php');?>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
