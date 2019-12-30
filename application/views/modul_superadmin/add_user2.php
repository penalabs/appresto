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
        Users

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">



				<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Quick Input</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form  action="<?php echo base_url(). 'superadmin/action_add_user'; ?>" method="post" role="form">
					  <div class="box-body">
						<div class="form-group">
						  <label for="exampleInputPassword1">Nama</label>
						  <?php
						  if(isset($_GET['tipe'])){
               $_GET['tipe'];
						  ?>
						  <input type="hidden" class="form-control" id="exampleInputPassword1" name="tipe" value="<?php echo $_GET['tipe'];?>" placeholder="nama">
						  <?php
						  }
						  ?>
						  <input type="text" class="form-control" id="exampleInputPassword1" name="nama" placeholder="nama">
						</div>

					   <div class="form-group">
						  <label for="exampleInputPassword1">User</label>
						  <input type="text" class="form-control" id="exampleInputPassword1" name="user" placeholder="user">
						</div>
						<div class="form-group">
						  <label for="exampleInputPassword1">Pass</label>
						  <input type="text" class="form-control" id="exampleInputPassword1" name="pass" placeholder="pass">
						</div>

						<div class="form-group">
						  <label>Alamat</label>
						  <textarea class="form-control" rows="3" name="alamat" placeholder="alamat ..."></textarea>
						</div>
						 <div class="form-group">
						  <label for="exampleInputPassword1">Telp</label>
						  <input type="number" size="12" class="form-control" id="exampleInputPassword1" name="telp" placeholder="telp">
						</div>
						<div class="form-group">
						  <label for="exampleInputPassword1">Email</label>
						  <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="email">
						</div>

					  </div>
					  <!-- /.box-body -->

					  <div class="box-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
					  </div>
					</form>
				  </div>
				</div>
				<div class="col-md-3">
				<div class="box-header with-border">
					  <h3 class="box-title">INPUT USER BARU <i class="fa  fa-hand-lizard-o" ></i></h3>
				</div>
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
