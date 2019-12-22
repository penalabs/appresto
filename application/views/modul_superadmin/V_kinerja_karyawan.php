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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Manager Kanwil

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	    <div class="col-xs-12">
      <!--     <div class="box box-default">
            <div class="box-header with-border">

            </div>
            <div class="box-body">


              <a href="<?php echo base_url('superadmin/add_gaji');?>" type="button" class="btn btn-success" >  Tambah
              </a>



            </div>
          </div>
        </div> -->
	<div class="col-md-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kinerja Karyawan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Karyawan</th>
                  <th>Nama Pelanggan</th>
                  <th>Tanggal</th>
                  <th>Jumlah Point</th>
                  <th>Aksi</th>

				          <!-- <th>Aksi</th> -->
                </tr>
                </thead>
                <tbody>
				<?php
					$no = 1;
					foreach($data as $u){
				?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama ?>
                  </td>
                  <td><?php echo $u->nama_pemesan ?></td>
                  <td><?php echo $u->tanggal ?></td>
                  <td><?php echo $u->jml_point ?></td>
				          <td>
                    <a href="<?php echo base_url('superadmin/view_kinerja/');?><?php echo $u->id_user_resto; ?>" class="btn btn-success btn-xs"><i class="fa fa-eye" ></i></a>
                  </td>
                </tr>
				<?php } ?>

                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	</div>





		<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">EDIT</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



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
