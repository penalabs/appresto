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
					<form  action="<?php echo base_url(). 'superadmin/action_edit_gaji'; ?>" method="post" role="form">
					  <div class="box-body">
              <?php
              $id=$_GET['id'];

              $sql3 = "SELECT * FROM gaji where id='$id'";
              $data3=$this->db->query($sql3)->result();
              foreach($data3 as $u3){ ?>
              <div class="form-group">
                <label for="exampleInputPassword1">Resto</label>
                <select name="id_resto" class="form-control">
                  <option value="">--- Pilih Resto---</option>
                  <?php
                  $sql = "SELECT * FROM resto";
                  $data2=$this->db->query($sql)->result();
                  foreach($data2 as $u2){ ?>
                    <option value="<?php echo $u2->id; ?>"><?php echo $u2->nama_resto; ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Karyawan</label>
                <select name="id_user_resto" class="form-control">
                  <option value="">--- Pilih Karyawan---</option>
                  <?php
                  $sql = "SELECT * FROM user_resto";
                  $data2=$this->db->query($sql)->result();
                  foreach($data2 as $u2){ ?>
                    <option value="<?php echo $u2->id; ?>"><?php echo $u2->nama; ?></option>
                  <?php } ?>
                  </select>
              </div>
            <input type="hidden" class="form-control" id="exampleInputPassword1" value="<?php echo $id; ?>" name="id">
						<div class="form-group">
						  <label for="exampleInputPassword1">Tanggal Awal</label>

						  <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $u3->tanggal_awal; ?>" name="tanggal_awal" placeholder="Tanggal Awal">
						</div>

					   <div class="form-group">
						  <label for="exampleInputPassword1">Tanggal Akhir</label>
						  <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $u3->tanggal_akhir; ?>" name="tanggal_akhir" placeholder="Tanggal Akhir">
						</div>

            <div class="form-group">
              <label for="exampleInputPassword1">Jenis Gaji</label>
              <select name="jenis_gaji" class="form-control">
                <option value="">--- Pilih ---</option>

                  <option value="bulanan">Bulanan</option>

                </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nominal Gaji</label>
              <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $u3->nominal_gaji; ?>" name="nominal_gaji" placeholder="Nominal gaji">
            </div>
            <?php } ?>

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
					  <h3 class="box-title">INPUT GAJI KARYAWAN <i class="fa  fa-hand-lizard-o" ></i></h3>
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
