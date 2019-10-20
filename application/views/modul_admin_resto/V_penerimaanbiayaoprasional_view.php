<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Penerimaan Biaya Oprasional</title>
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
       Penerimaan Biaya Oprasional
      </h1>

    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
                  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Bendahara</th>
                  <th>Nama Resto</th>
                  <th>Tanggal</th>
                  <th>Nominal KAS</th>
                  <th>Konfrimasi</th>
                </tr>
                </thead>
                <tbody>
        <?php
          $no = 1;
          foreach($penerimaanbiayaoprasional as $u){
        ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama ?></td>
                  <td><?php echo $u->nama_resto ?></td>
                  <td><?php echo $u->tanggal ?></td>
                  <td><?php echo "Rp. ".number_format($u->nominal_kas_keluar).",-"; ?></td>
          <td>
          <?php if ($u->status == "pemberian"){?>
          <a class="btn btn-primary btn-md"><i class="fa fa-check-square-o" ></i> Sudah Dikonfrimasi</a>
          <?php }
          else{ ?>
          <a href="<?php echo base_url('C_modul_admin_resto/penerimaanbiayaoprasional_updatestatus/'.$u->id_pengeluaran); ?>" class="btn btn-success btn-md"><i class="fa  fa-square-o" ></i> Belum Dikonfrimasi</a>
          <?php }?>
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
