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


	<?php include(APPPATH.'views/customer/header.php');?>
	<?php include(APPPATH.'views/customer/sidebar.php');?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
  	<div class="row">


      <div class="col-md-12 col-sm-6 col-xs-12">Kategori Menu</div>
      <?php
  		foreach($kategori_menu as $k){
        if($k->parent_id==0){
  		?>
      <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

          <div class="info-box-content">

            <a href="<?php echo base_url();?>/customer/sub_kategori/<?php echo $k->id_kategori;?>/menu"><span style="top: 30%;position: absolute;" class="info-box-number"><?php echo $k->nama;?></span></a>

          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <?php
          }
      }
      ?>


      <div class="col-md-12 col-sm-6 col-xs-12">Kategori paket</div>
      <?php
      foreach($kategori_paket as $k){
        if($k->parent_id==0){
      ?>
      <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

          <div class="info-box-content">

            <a href="<?php echo base_url();?>/customer/sub_kategori/<?php echo $k->id_kategori;?>/paket"><span style="top: 30%;position: absolute;" class="info-box-number"><?php echo $k->nama;?></span></a>

          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <?php
          }
      }
      ?>

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
