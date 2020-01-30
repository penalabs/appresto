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
        Edit User
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">



				<div class="col-md-">
				<div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Quick Input</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form  action="<?php echo base_url(). 'master/action_update_user'; ?>" method="post" role="form">
					  <div class="box-body">
					  <?php
					  foreach($data1 as $u){
					  ?>
						<div class="form-group">
						  <label for="exampleInputPassword1">Nama</label>
						  <!-- <?php
						  if(isset($_GET['tipe'])){
						  ?> -->
						  <input type="hidden" class="form-control" id="exampleInputPassword1" name="tipe" value="<?php echo $_GET['tipe'];?>" placeholder="nama">
						  <input type="hidden" class="form-control" id="exampleInputPassword1" name="id" value="<?php echo $_GET['id'];?>" placeholder="nama">
						  <!-- <?php
						  }
						  ?> -->
						  <input type="text" class="form-control" id="exampleInputPassword1" name="nama" value="<?php echo $u->nama; ?>" placeholder="nama" >
						</div>
						<div class="form-group">
						  <label for="exampleInputPassword1">Kanwil</label>
						  <input type="hidden" class="form-control" name="id_kanwil" value="<?php echo $u->id_kanwil; ?>">
						  <input type="text" class="form-control" value="<?php echo $u->alamat_kantor; ?>" readonly>
						</div>
						  <div class="form-group">
    						  <label for="exampleInputPassword2">Resto</label>
			                  <select name="id_resto" class="form-control">
			                    <?php
			                    foreach($data2 as $u2){
			                    ?>
			                    <option value="<?php echo $u2->id; ?>"><?php echo $u2->nama_resto; ?> --> pilihan awal</option>
			                    <?php
			                	}
			                	$id_kanwil = $this->session->userdata('id_kanwil');
			                    $sql2 = "SELECT * FROM resto
								WHERE resto.`id_kanwil`=$id_kanwil";
			          				  $data3=$this->db->query($sql2)->result();
			                    foreach($data3 as $u3){ ?>
			                      <option value="<?php echo $u3->id; ?>"><?php echo $u3->nama_resto; ?></option>
			                    <?php } ?>
			                    </select>
    						</div>
					   <div class="form-group">
						  <label for="exampleInputPassword1">User</label>
						  <input type="text" class="form-control" id="exampleInputPassword1" name="user" value="<?php echo $u->user; ?>" placeholder="user">
						</div>
						<div class="form-group">
						  <label for="exampleInputPassword1">Pass</label>
						  <input type="text" class="form-control" id="exampleInputPassword1" name="pass" value="<?php echo $u->pass; ?>" placeholder="pass">
						</div>

						<div class="form-group">
						  <label>Alamat</label>
						  <textarea class="form-control" rows="3" name="alamat" placeholder="alamat ..."><?php echo $u->alamat; ?></textarea>
						</div>
						 <div class="form-group">
						  <label for="exampleInputPassword1">Telp</label>
						  <input type="number" size="12" class="form-control" id="exampleInputPassword1" name="telp" value="<?php echo $u->telp; ?>" placeholder="telp">
						</div>
						

					  </div>
					  <!-- /.box-body -->
					<?php
					  }
					  ?>
					  <div class="box-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
					  </div>
					</form>
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
