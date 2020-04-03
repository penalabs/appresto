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
        Manajemen Investasi

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
  	    <div class="col-xs-10">
            <div class="box box-default">
              <div class="box-header with-border">

              </div>
              <div class="box-body">
  						<?php
  						  //if(isset($_GET['user'])){
  							  //$user=$_GET['user'];
  						  ?>
  						  
                <?php
              // }
               ?>
              </div>
            </div>
          </div>
      	   <div class="col-md-12">

                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Data Investasi</h3>
                    <a href="<?php echo base_url('superadmin/add_investasi');?>" type="button" class="btn btn-success" >Tambah</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Owner</th>
                        <th>Bendahara</th>
                        <th>Tanggal</th>
                        <th>Jumlah Invest</th>
                        <th>Jangka Waktu</th>
                        <th>Persentase Omset</th>
                        <th>Jumlah Omset</th>
      				          <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
              				<?php
              					$no = 1;
              					foreach($data as $u){
              				?>
                              <tr>
                                <td><?php echo $no++ ?>.</td>
                                <td><?php echo $u->nama_owner ?>
                                </td>
                                <td><?php echo $u->nama_bendahara ?></td>
                                <td><?php echo $u->tanggal ?></td>
                                <td><?php echo $u->jumlah_investasi ?></td>
                                <td><?php echo $u->jangka_waktu ?></td>
                                <td><?php echo $u->persentase_omset ?></td>
                                <td><?php echo (int)$u->persentase_omset/100*(int)$u->jumlah_investasi+$u->jumlah_investasi; ?></td>
              				          <td> <a href="<?php echo base_url('superadmin/edit_investasi/?');?>id=<?php echo $u->id ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a>
                                   <a href="<?php echo base_url('superadmin/hapus_investasi/?');?>id=<?php echo $u->id ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a>
                                   <a href="<?php echo base_url('superadmin/setupowner/?');?>id=<?php echo $u->id ?>" class="btn btn-primary btn-xs"><i class="fa  fa-eye" ></i></a>
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
          <?php
          if(isset($_GET['id'])){
           ?>
          <div class="col-md-4">
                <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <div class="box-tools pull-right">
                      <!-- <a href="<?php echo base_url('modul_general_manager/permintaaninvestasi_tambah'); ?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Entry</a> -->

                    </div>
                  </div>
                  <div class="box-header">
                    <h3 class="box-title">Masukkan Omset </h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>#</th>

                        <th>Tanggal</th>

                        <th>Omset</th>

                        <!-- <th>Nominal</th>
                        <th>Penyusutan %</th> -->
                        <!-- <th>Aksi</th> -->
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                        $no = 1;

                        $id_investasi_owner=$_GET['id'];
                        $sql2 = "SELECT * FROM omset_investasi_owner where id_investasi_owner='$id_investasi_owner'";
                    		$permintaaninvestasi = $this->db->query($sql2)->result();
                        foreach($permintaaninvestasi as $u){
                      ?>
                      <tr>
                        <td><?php echo $no++ ?>.</td>
                        <td><?php echo $u->tanggal ?></td>
                        <td><?php echo $u->penyusutan_invest ?></td>
                        <td>

                <!-- <a href="<?php echo base_url('C_modul_admin_resto/konfirmasi_alat/'.$u->id); ?>" class="btn btn-primary btn-xs"><i class="fa  fa-check" ></i></a> -->
                <!-- <a href="<?php echo base_url('modul_general_manager/permintaaninvestasi_edit/?id='.$u->id); ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a> -->

                        <a href="<?php echo base_url('superadmin/penyusutan_invest_hapus/?id='.$u->id.'&&id_investasi_owner='.$id_investasi_owner); ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a></td>

                      </tr>
                      <?php
                          }
                        }
                       ?>

                      </tbody>

                    </table>
                  </div>
                </div>
          </div>
        <?php
        if(isset($_GET['id'])){
         ?>
        <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Quick Input</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form  action="<?php echo base_url(). 'superadmin/action_add_omset'; ?>" method="post" role="form">
            <div class="box-body">

              <input type="hidden" class="form-control" value="<?php echo $_GET['id']; ?>" id="id_investasi_owner" name="id_investasi_owner" placeholder="Tanggal">
            <div class="form-group">
              <label for="exampleInputPassword1">Tanggal</label>
              <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Input Jumlah Omset</label>
              <input type="number" class="form-control" id="exampleInputPassword1" name="penyusutan_invest" placeholder="Persentase omset">
            </div>
            <!-- <div class="form-group">
              <label for="exampleInputPassword1">Jumlah Omset</label>
              <input type="number" class="form-control" id="exampleInputPassword1" name="jumlah_omset" placeholder="Jumlah omset">
            </div> -->
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
  $('#tanggal').datepicker({
       format: 'yyyy-mm-dd'
   });
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
