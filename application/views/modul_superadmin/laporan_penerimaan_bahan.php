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
  <!-- =============================================== -->

	<?php include(APPPATH.'views/menu.php');?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Logistik

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
  	<div class="row">
      <div class="col-md-12">
        <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h4><i class="icon fa fa-check"></i> Alert!</h4>
               <?php echo $user_data = $this->session->userdata('pesan'); ?>
       </div>


     </div>

  	<div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Daftar Penerimaan Bahan Mentah</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Resto</th>
  				          <th>Nama Permintaan</th>
                    <th>Tanggal</th>
                    <th>Nama Bahan</th>
                    <th>Jumlah Permintaan</th>
                    <th>Status</th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php
            					$no = 1;
            					foreach($data as $u){
            				?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$u->nama_resto;?></td>
                        <td><?=$u->nama_permintaan;?></td>
                        <td><?=$u->tanggal;?></td>
                        <td><?=$u->nama_bahan;?></td>

                        <td>
                          <?=$u->jumlah_permintaan;?>
                          <!-- <a href="<?php echo base_url('modul_logistik/lihat_bahan_mentah/?');?>id_permintaan=<?php echo $u->id ?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Lihat Bahan</a><br>
                          <a href="<?php echo base_url('modul_logistik/ubah_status_dikirim_bahan_mentah/?');?>id_permintaan=<?php echo $u->id ?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Kirim</a>
                          <!-- <a href="<?php echo base_url('modul_logistik/hapus_permintaan/?');?>id_permintaan=<?php echo $u->id ?>&&tabel=permintaan_bahan_mentah" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Hapus</a> -->

                        </td>
                        <td><?=$u->status;?></td>
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




      	<div class="col-md-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Daftar Penerimaan Bahan Olahan</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Resto</th>
      				          <th>Nama Permintaan</th>
                        <th>Tanggal</th>
                        <th>Nama Bahan</th>

                        <th>Jumlah Permintaan</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                					$no = 1;
                					foreach($data2 as $u2){
                				?>
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$u2->nama_resto;?></td>
                            <td><?=$u2->nama_permintaan;?></td>
                            <td><?=$u2->tanggal;?></td>
                            <td><?=$u2->nama_bahan;?></td>
                            <td><?=$u2->jumlah_permintaan;?></td>
                            <td><?=$u2->status;?></td>
                            <td>
                              <!-- <a href="<?php echo base_url('modul_logistik/lihat_bahan_olahan?');?>id_permintaan=<?php echo $u2->id ?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Lihat Bahan</a><br>
                              <a href="<?php echo base_url('modul_logistik/ubah_status_dikirim_bahan_olahan/?');?>id_permintaan=<?php echo $u2->id ?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Kirim</a>


                              <!-- <a href="<?php echo base_url('modul_logistik/hapus_permintaan/?');?>id_permintaan=<?php echo $u2->id ?>&&tabel=permintaan_bahan_olahan" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Hapus</a> -->

                            </td>
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
  //Date picker
      $('#datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
      })
      $('#datepicker2').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
      })
  </script>
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


<script type="text/javascript">
  $(document).ready(function() {
      selesai();
  });


</script>

</body>
</html>
