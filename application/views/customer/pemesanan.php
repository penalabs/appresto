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
                <h3 class="box-title">Transaksi</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">


                <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama Pemesan</th>
                  <th>Tanggal</th>
                  <th>Total harga</th>
                  <th>Ket. tambahan</th>
                  <th>Status</th>
                  <th style="width: 40px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1;
                  foreach($pemesanan as $p){
                  ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $p->nama_pemesan;?></td>
                    <td><?php echo $p->tanggal;?></td>
                    <td><?php echo $p->total_harga;?></td>
                    <td><?php echo $p->keterangantambahan;?></td>
                    <td><?php echo $p->status;?></td>
                    <td><a class="btn btn-success btn-sm" href="<?php echo base_url();?>/customer/detail_pemesanan/?id_pemesanan=<?php echo $p->id;?>"><span class="fa fa-eye"></span></a></td>
                  </tr>
                  <?php
                  $no++;
                  }
                  ?>
                  <tfoot>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Pemesan</th>
                    <th>Tanggal</th>
                    <th>Total harga</th>
                    <th>Ket. tambahan</th>
                    <th>Status</th>
                    <th style="width: 40px">Aksi</th>
                  </tr>
                  </tfoot>
              </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">

              </div>
            </div>
          </div>
          <!-- /.box -->
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
