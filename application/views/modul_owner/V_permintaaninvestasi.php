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
       Investasi saya
      </h1>

    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <!-- <a href="<?php echo base_url('modul_general_manager/permintaaninvestasi_tambah'); ?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Entry</a> -->
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>

                  <th>Tanggal</th>
                  <th>Jumlah Investasi</th>
                  <th>Jangka Waktu</th>
                  <th>Persentase Omset</th>

                  <!-- <th>Nominal</th>
                  <th>Penyusutan %</th> -->
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php
          $no = 1;
          $id_owner=$this->session->userdata('id');
          $sql1 = "SELECT * FROM investasi_owner WHERE id_owner='$id_owner'";
          $investasisaya=$this->db->query($sql1)->result();
          foreach($investasisaya as $u){
        ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>

                  <td><?php echo $u->tanggal ?></td>
                  <td><?php echo $u->jumlah_investasi ?></td>
                  <td><?php echo $u->jangka_waktu ?></td>
                  <td><?php echo $u->persentase_omset ?></td>


                  <td>

          <!-- <a href="<?php echo base_url('C_modul_admin_resto/konfirmasi_alat/'.$u->id); ?>" class="btn btn-primary btn-xs"><i class="fa  fa-check" ></i></a> -->
          <!-- <a href="<?php echo base_url('modul_general_manager/permintaaninvestasi_edit/?id='.$u->id); ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a> -->

          <a href="<?php echo base_url('modul_owner/permintaan_investasi/?id='.$u->id); ?>" class="btn btn-danger btn-xs"><i class="fa  fa-eye" ></i></a></td>

                </tr>
        <?php } ?>

                </tbody>

              </table>
            </div>
          </div>
    </div>
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <!-- <a href="<?php echo base_url('modul_general_manager/permintaaninvestasi_tambah'); ?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Entry</a> -->
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>

                  <th>Tanggal</th>
                  <th>Nominal investasi</th>
                  <th>Penyusutan</th>
                  <th>Nominal investasi kembali</th>
                  <th>Status</th>
                  <!-- <th>Nominal</th>
                  <th>Penyusutan %</th> -->
                  <!-- <th>Aksi</th> -->
                </tr>
                </thead>
                <tbody>
        <?php
          $no = 1;
          if(isset($_GET['id'])){
          $id_investasi_owner=$_GET['id'];
          $sql2 = "SELECT investasi_kanwil.status,investasi_kanwil.id,investasi_kanwil.tanggal,investasi_kanwil.nominal_investasi,investasi_kanwil.penyusutan,investasi_kanwil.nominal_saldo FROM investasi_kanwil  WHERE investasi_kanwil.id_investasi_owner='$id_investasi_owner'";
      		$permintaaninvestasi = $this->db->query($sql2)->result();
          foreach($permintaaninvestasi as $u){
        ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>

                  <td><?php echo $u->tanggal ?></td>
                  <td><?php echo $u->nominal_investasi ?></td>
                  <td><?php echo $u->penyusutan ?></td>
                  <td><?php echo $u->nominal_saldo ?></td>
                  <td><?php echo $u->status ?></td>

                  <td>

          <!-- <a href="<?php echo base_url('C_modul_admin_resto/konfirmasi_alat/'.$u->id); ?>" class="btn btn-primary btn-xs"><i class="fa  fa-check" ></i></a> -->
          <!-- <a href="<?php echo base_url('modul_general_manager/permintaaninvestasi_edit/?id='.$u->id); ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a> -->

          <!-- <a href="<?php echo base_url('modul_general_manager/permintaaninvestasi_hapus/?id='.$u->id.'&&id_alat='.$u->id); ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a></td> -->

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
