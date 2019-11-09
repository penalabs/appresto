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
        Resto

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	<div class="col-md-8">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Resto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Resto</th>
                  <th>Wilayah</th>

				          <th>Alamat</th>
                  <th>Telp</th>
                    <th>Pajak</th>
				          <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;

                    // $id_investasi_owner=$_GET['id'];
                    $sql2 = "SELECT * FROM resto join kanwil on kanwil.id_kanwil=resto.id_kanwil";
                    $data = $this->db->query($sql2)->result();
                    foreach($data as $u){
                  ?>
                <tr>
                  <td>1.</td>
                  <td><?php echo $u->nama_resto;?>
                  </td>
                  <td><?php echo $u->alamat_kantor;?></td>
                  <td><?php echo $u->alamat;?></td>
                  <td><?php echo $u->no_telp;?></td>
                  <td><?php echo $u->pajak;?></td>

				          <td><a href="" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Intensif"><i class="fa  fa-line-chart" ></i></a>  <a href="<?php echo base_url();?>/superadmin/restos/?id=<?php echo $u->id; ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a>  <a href="<?php echo base_url(); ?>/superadmin/hapus_manajemen_resto/?id=<?php echo $u->id;?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a></td>
                </tr>
                <?php
                    }
                 ?>


                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

    <?php
      if(isset($_GET['id'])){
        $id_edit=$_GET['id'];
     ?>
    <div class="col-md-4">
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Input</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            <?php
            $sql = "SELECT * FROM resto join kanwil on kanwil.id_kanwil=resto.id_kanwil where id='$id_edit'";
            $data2=$this->db->query($sql)->row();
            ?>
            <form role="form" action="<?php echo base_url(). 'superadmin/action_edit_resto'; ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <!-- <label for="exampleInputEmail1">Kanwil</label> -->
                  <input type="hidden" name="id" value="<?php echo $id_edit;?>" class="form-control"  placeholder="kanwil" disabled>
                  <input type="hidden" name="id_kanwil" value="<?php echo $data2->id_kanwil?>" class="form-control"  placeholder="kanwil" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Resto / Cabang</label>
                  <input type="text" name="nama_resto" value="<?php echo $data2->nama_resto; ?>" class="form-control"  placeholder="cabang">
                </div>
				            <!-- select -->
        				<div class="form-group">
                          <label>Alamat</label>
                          <textarea class="form-control"  name="alamat" rows="3" placeholder="alamat ..."><?php echo $data2->alamat; ?></textarea>
                </div>
        				 <div class="form-group">
                          <label for="exampleInputPassword1">Telp cabang</label>
                          <input type="text" class="form-control" value="<?php echo $data2->no_telp; ?>" name="telp" id="exampleInputPassword1" placeholder="Telp cabang">
                        </div>
                 </div>
                 <div class="form-group">
                          <label for="exampleInputPassword1">Pajak</label>
                          <input type="number" class="form-control" value="<?php echo $data2->pajak; ?>" name="pajak" rows="3" id="exampleInputPassword1" placeholder="Pajak">
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
    }else{
   ?>
    <div class="col-md-4">
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Input</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url(). 'superadmin/action_add_resto'; ?>" method="post">
              <div class="box-body">
                <div class="form-group">
    						  <label for="exampleInputPassword1">Kanwil</label>
                  <select name="id_kanwil" class="form-control">
                    <option value="">--- Pilih Kanwil---</option>
                    <?php
                    $sql = "SELECT * FROM kanwil";
          				  $data2=$this->db->query($sql)->result();
                    foreach($data2 as $u2){ ?>
                      <option value="<?php echo $u2->id_kanwil; ?>"><?php echo $u2->alamat_kantor; ?></option>
                    <?php } ?>
                    </select>
    						</div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Resto / Cabang</label>
                  <input type="text" name="nama_resto" class="form-control"  placeholder="cabang">
                </div>
				            <!-- select -->
        				<div class="form-group">
                          <label>Alamat</label>
                          <textarea class="form-control" name="alamat" rows="3" placeholder="alamat ..."></textarea>
                </div>
        				 <div class="form-group">
                          <label for="exampleInputPassword1">Telp cabang</label>
                          <input type="text" class="form-control" name="telp" id="exampleInputPassword1" placeholder="Telp cabang">
                        </div>
                 </div>
                 <div class="form-group">
                          <label for="exampleInputPassword1">Pajak</label>
                          <input type="number" class="form-control" name="pajak" rows="3" id="exampleInputPassword1" placeholder="Pajak">
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
