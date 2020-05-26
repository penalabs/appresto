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
        Manajemen Kantor Wilayah

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	<div class="col-md-8">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar kanwil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>

            				  <th>Alamat</th>
                      <th>Telp</th>
            				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $no = 1;
                foreach($data as $u){
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $u->alamat_kantor;?></td>
        		  <td><?php echo $u->telp;?></td>
        		  <td>  
						  <a href="<?php echo base_url('superadmin/');?>manajemen_kanwil?id=<?php echo  $u->id_kanwil;?>&&mode=edit" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a> 
						  <a onclick="return confirm('apakah anda yakin ingin menghapus?');" href="<?php echo base_url('superadmin/');?>hapus_kanwil?id=<?php echo  $u->id_kanwil;?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a></td>
                </tr>
                <?php
                $no++;
                }
                ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      <?php if (isset($_GET['mode']))
        {
        ?>
        <div class="col-md-4">
		      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Input</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('superadmin/');?>tambah_kanwil_aksi" method="post">
              <div class="box-body">
				 <!-- select -->

               <?php
               $id=$_GET['id'];
               $sql = "SELECT * FROM kanwil where id_kanwil='$id'";
               $data=$this->db->query($sql)->result();
               foreach($data as $u){
               ?>
                 <input type="hidden" class="form-control" name="id" value="<?php echo $u->id_kanwil;?>" >
				        <div class="form-group">
                  <label>Alamat kanwil</label>
                  <textarea class="form-control" rows="3" name="alamat_kantor" placeholder="alamat ..."><?php echo $u->alamat_kantor;?></textarea>
                </div>
				        <div class="form-group">
                  <label for="exampleInputPassword1">Telp kanwil</label>
                  <input type="text" class="form-control" name="telp" value="<?php echo $u->telp;?>" id="exampleInputPassword1" placeholder="telp kanwil">
                </div>
                <?php
                }
               ?>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
		      </div>
          <!-- /.box -->

          <?php
          }else{
          ?>
          <div class="col-md-4">
          <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Quick Input</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" action="<?php echo base_url('superadmin/');?>tambah_kanwil_aksi" method="post">
                    <div class="box-body">
               <!-- select -->

                      <div class="form-group">
                        <label>Alamat kanwil</label>
                        <textarea class="form-control" rows="3" name="alamat_kantor" placeholder="alamat ..."></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Telp kanwil</label>
                        <input type="text" class="form-control" name="telp" id="exampleInputPassword1" placeholder="telp cabang">
                      </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
          </div>
          <?php
          }
          ?>
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
