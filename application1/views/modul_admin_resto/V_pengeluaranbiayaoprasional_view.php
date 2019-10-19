<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengeluaran Biaya Oprasional</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include(APPPATH.'views/css.php');?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  
	<?php include(APPPATH.'views/header.php');?>
  <!-- =============================================== -->

	<?php include(APPPATH.'views/menu.php');?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Pengeluran Biaya Oprasional
      </h1>
      
    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
          <div class="box-header with-border">
              <div class="box-tools pull-right">
                <a href="<?php echo base_url('C_modul_admin_resto/pengeluaranbiayaoprasional_tambah'); ?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Entry</a>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Pengeluaran</th>
                  <th>Nominal</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php 
          $no = 1;
          foreach($pengeluaranbiayaoprasional as $u){
        ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama ?></td>
                  <td><?php echo "Rp. ".number_format($u->nominal_pengeluaran_kebutuhan).",-"; ?></td>
          <td>
          <a href="<?php echo base_url('C_modul_admin_resto/pengeluaranbiayaoprasional_edit/'.$u->id_pengeluaran_kebutuhan); ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a>
          <a href="<?php echo base_url('C_modul_admin_resto/pengeluaranbiayaoprasional_hapus/'.$u->id_pengeluaran_kebutuhan); ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a></td>
          </td>
                </tr>
        <?php } ?>
        
                </tbody>
               
              </table>
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
