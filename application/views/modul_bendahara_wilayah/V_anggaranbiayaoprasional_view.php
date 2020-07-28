<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Anggaran Biaya Oprasional</title>
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
      Pemberian Anggaran Biaya Oprasional
      </h1>

    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Informasi Saldo Kanwil</span>
                  
                  <span class="info-box-number"><h1>Rp. Masih Belum Bisa</h1></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
    </div>
        <!-- ./col -->
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <a href="<?php echo base_url('modul_bendahara_wilayah/anggaranbiayaoprasional_tambah'); ?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Entry</a>
              </div>
            </div>
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
                  <th>Nominal Pemberian</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php
          $no = 1;
          foreach($anggaranbiayaoprasional as $u){
        ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama ?></td>
                  <td><?php echo $u->nama_resto ?></td>
                  <td><?php echo $u->tanggal ?></td>
                  <td><?php echo "Rp. ".number_format($u->nominal_kas_keluar).",-"; ?></td>
                  <td><?php echo $u->status ?></td>
        				  <td>
                    <?php if($u->status=='pengajuan'){
                    ?>
                    <a href="<?php echo base_url('modul_bendahara_wilayah/anggaranbiayaoprasional_berikan/'.$u->id_pengeluaran); ?>" class="btn btn-warning btn-xs" ><i class="fa   fa-dollar" ></i></a>
        					  <a href="<?php echo base_url('modul_bendahara_wilayah/anggaranbiayaoprasional_edit/'.$u->id_pengeluaran); ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a>
        					  <a onclick="return confirm('Apakah anda yakin ingin menghapus ?');" href="<?php echo base_url('modul_bendahara_wilayah/anggaranbiayaoprasional_hapus/'.$u->id_pengeluaran); ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a>
                    <?php
                    }
                    ?>

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
