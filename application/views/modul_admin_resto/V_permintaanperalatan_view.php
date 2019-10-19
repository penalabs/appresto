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
  <!-- =============================================== -->

	<?php include(APPPATH.'views/menu.php');?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Permintaan Peralatan
      </h1>

    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <a href="<?php echo base_url('C_modul_admin_resto/permintaanperalatan_tambah'); ?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Entry</a>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Cabang</th>
                  <th>Nama Alat</th>
                  <th>Jumlah</th>
                  <th>Masa Pemanfaatan</th>
                  <th>Status</th>
                  <!-- <th>Nominal</th>
                  <th>Penyusutan %</th> -->
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php
          $no = 1;
          foreach($permintaanperalatan as $u){
        ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama_resto ?></td>
                  <td><?php echo $u->nama_peralatan ?></td>
                  <td><?php echo $u->jumlah ?></td>
                  <td><?php echo $u->masa_pemanfatan ?></td>
                  <td><?php echo $u->status_permintaan ?></td>
                  <!-- <td><?php echo "Rp. ".number_format($u->nominal).",-"; ?></td>
                  <td><?php echo $u->nominal_penyusutan ?> %</td> -->
          <td>
            <a href="<?php echo base_url('C_modul_admin_resto/konfirmasi_alat/'.$u->id_permintaan_alat); ?>" class="btn btn-primary btn-xs"><i class="fa  fa-check" ></i></a>
          <a href="<?php echo base_url('C_modul_admin_resto/permintaanperalatan_edit/'.$u->id_permintaan_alat); ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a>
          <a href="<?php echo base_url('C_modul_admin_resto/permintaanperalatan_hapus/'.$u->id_permintaan_alat); ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a></td>
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
