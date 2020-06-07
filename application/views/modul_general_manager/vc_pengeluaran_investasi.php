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
        Permintaan Investasi percabang

      </h1>

    </section>

     <section class="content">
  <div class="row">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <!-- <a href="<?php echo base_url('modul_general_manager/bendahara_pengeluaran_investasi_tambah'); ?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Entry</a> -->
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Cabang</th>
                  <th>Nama Investasi</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>

                  <th>Jumlah Pengeluaran</th>
                  <th>Persen Penyusutan</th>
                  <th>Status</th>

                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $id_bendahara=$this->session->userdata('id');
                    foreach($data_pengeluaran_investasi_cabang as $u){
                  ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama_resto ?></td>
                  <td><?php echo $u->nama_investasi ?></td>
                  <td><?php echo $u->tanggal_mulai ?></td>
                  <td><?php echo $u->tanggal_selesai ?></td>
                  <td><?php echo $u->jumlah_pengeluaran ?></td>
                  <td><?php echo $u->persen_penyusutan ?>%</td>
                  <td><?php echo $u->status ?></td>


                    <td>
                  <?php 
                    if($u->status=="permintaan"){
                  ?>
                      <a href="<?php echo base_url('modul_general_manager/bendahara_pengeluaran_investasi_editaksi/?id='.$u->id); ?>" class="btn btn-success btn-xs">Setuju</a>
                  <?php
                    }else{

                    }
                  ?>
                    
                    <!-- <a href="<?php echo base_url('modul_general_manager/bendahara_pengeluaran_investasi_editaksi/?id='.$u->id); ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a> -->
                    <!-- <a href="<?php echo base_url('modul_general_managerss/hapus_bendahara_pengeluaran_investasi/'.$u->id); ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a> -->
                    <!-- <a href="<?php echo base_url('modul_bendahara/bendahara_pengeluaran_investasi/?id_invest_cabang='.$u->id); ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a></td> -->

                          </tr>
                  <?php } ?>

                </tbody>

              </table>
            </div>
          </div>
    </div>

    <?php
    if(isset($_GET['id_invest_cabang'])){
    $id_invest_cabang=$this->input->get('id_invest_cabang');

    $sql = "SELECT sum(nominal_penyusutan) as jumlah_penyusutan FROM penyusutan_investasi_cabang where id_investasi_cabang='$id_invest_cabang'";
    $jumlah_penyusutan=$this->db->query($sql)->row();

    $sql2 = "SELECT jumlah_pengeluaran FROM investasi_cabang where id='$id_invest_cabang'";
    $jumlah_pengeluaran=$this->db->query($sql2)->row();
     ?>
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <div class="box-tools pull-right">

                <?php
                if((int)$jumlah_penyusutan->jumlah_penyusutan<(int)$jumlah_pengeluaran->jumlah_pengeluaran){
                 ?>
                <a href="<?php echo base_url('modul_bendahara/penyusutan_tambah/'); ?>?id_invest_cabang=<?=$id_invest_cabang;?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Tambah Penyusustan</a>
                <?php
                }
               ?>
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
                  <th>Nominal Penyusutan</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  $id_invest_cabang=$this->input->get('id_invest_cabang');
                  $sql = "SELECT *  FROM penyusutan_investasi_cabang where id_investasi_cabang='$id_invest_cabang'";
                  $penyusutan=$this->db->query($sql)->result();
                  foreach($penyusutan as $u){
                ?>
                        <tr>
                          <td><?php echo $no++ ?>.</td>
                          <td><?php echo $u->tanggal ?></td>
                          <td><?php echo $u->nominal_penyusutan ?></td>
                        </tr>
                <?php } ?>

                </tbody>

              </table>
            </div>
          </div>
    </div>
    <?php
    }
   ?>

    
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
