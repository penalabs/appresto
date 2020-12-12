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


          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Pemesanan menu</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                  </tr>

                  <?php
                  $total=0;
              		foreach($pemesanan_menu as $p){
                    $total+=$p->subharga;
              		?>
                  <tr>
                    <td>1.</td>
                    <td><?php echo $p->menu;?></td>
                    <td><?php echo $p->jumlah_pesan;?></td>
                    <td><?php echo $p->subharga;?>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                  <tr>
                    <td colspan="3">Sub total</td>
                    <td><?php echo $total;?></td>
                  </tr>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">

              </div>
            </div>
          </div>
          <!-- /.box -->

          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Pemesanan paket</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Paket</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                  </tr>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $total=0;
              		foreach($pemesanan_paket as $p){
                    $total+=$p->subharga;
              		?>
                  <tr>
                    <td>1.</td>
                    <td><?php echo $p->nama_paket;?></td>
                    <td><?php echo $p->jumlah_pesan;?></td>
                    <td><?php echo $p->subharga;?>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                  <tr>
                    <td colspan="3">Sub total</td>
                    <td><?php echo $total;?></td>
                  </tr>
              </table>


              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">

              </div>
            </div>
          </div>


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
  $('#example1').DataTable({
      responsive: true
  })
  $('#example2').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
  })
  $('#myTable').DataTable( {
      responsive: true
  } );
})
</script>
</body>
</html>
