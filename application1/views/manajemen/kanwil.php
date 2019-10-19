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
        Manajemen Resto
       
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	<div class="col-md-8">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Kanwil pengurus resto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
				  <th>Kanwil</th>
                  <th>Nama Resto</th>
                  <th>Pengurus / Admin resto</th>
				  <th>Alamat</th>
                  <th>Telp</th>
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1.</td>
				  <td>Kediri</td>
                  <td>Resto Omah Bebek
                  </td>
                  <td>Dedy Ardiansyah</td>
                  <td>Jln perintis kemerdekaan no 100</td>
				  <td>08564684655774</td>
				  <td><a href="" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Intensif"><i class="fa  fa-line-chart" ></i></a>  <a href="" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a>  <a href="" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a></td>
                </tr>
				<tr>
                  <td>1.</td>
				  <td>Kediri</td>
                  <td>Resto Omah Ayam Gejoh
                  </td>
                  <td>Dedy Ardiansyah</td>
                  <td>Jln perintis kemerdekaan no 100</td>
				  <td>08564684655774</td>
				  <td><a href="" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Intensif"><i class="fa  fa-line-chart" ></i></a>  <a href="" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a>  <a href="" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a></td>
                </tr>
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		<div class="col-md-4">
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Input</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
				<div class="form-group">
                  <label for="exampleInputPassword1">Kantor Wilayah</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="wilayah">
                </div>
               <div class="form-group">
                  <label>Nama resto / cabang</label>
                  <select class="form-control">
                    <option>--pilih--</option>
                    <option>Resto Omah Bebek</option>
                    <option>Resto Omah Ayam Gejoh</option>
                  </select>
                </div>
				 <!-- select -->
                <div class="form-group">
                  <label>Pengurus Admin resto</label>
                  <select class="form-control">
                    <option>--pilih--</option>
                    <option>Dedy ardiansyah</option>
                    <option>Endang</option>
                  </select>
                </div>
				<div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" placeholder="alamat ..."></textarea>
                </div>
				 <div class="form-group">
                  <label for="exampleInputPassword1">Telp cabang</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="telp cabang">
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
		</div>
          <!-- /.box -->
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
