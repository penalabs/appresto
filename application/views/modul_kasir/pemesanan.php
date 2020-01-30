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
        Transaksi

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
        <div class="col-xs-3">
          <div class="box box-default">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
              <?php
              $id_kanwil=$this->session->userdata('id_kanwil');
              ?>
              <div class="form-group">
                <?php
                    $sql4 = "SELECT * FROM user_kanwil WHERE id_kanwil='$id_kanwil' AND tipe='bendahara'";
                    $data2=$this->db->query($sql4)->result();
                    foreach($data2 as $u2){ 
                    $kalimat_new = ucfirst($u2->nama);
                      ?>
                  <label>Untuk setor ke bendahara <br> <h3><b><?php echo $kalimat_new;?></b></h3></label>
                    <?php } ?>
                </div>
            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box box-default">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
              
              <div class="form-group">
                  <label>Jumlah yang disetor</label>
                  <h1>
                  <?php
                   $total_setor=0;
                  if(isset($_GET['jumlah_setor'])){
                    if(isset($_GET['total_setor'])){
                      $total_setor=$_GET['total_setor'];
                      $jumlah_setor=$_GET['jumlah_setor'];
                      echo $total=$total_setor+$jumlah_setor;
                       $total_setor=$total;
                    }else{
                    
                    echo $jumlah_setor=$_GET['jumlah_setor'];
                    }

                    //code insert update
                  }else{
                    echo "0";
                  }
                  ?>
                  </h1>
                </div>
            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box box-default">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
              
              <div class="form-group">
                  <label>TANGGAL</label>
                  <h1><?php echo date('Y-m-d');?></h1>
                </div>
            </div>
          </div>
        </div>
	   <div class="col-md-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pemesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>No Urut</th>
                  <th>Nama Pemesan</th>
                  <th>Meja</th>
        				  <th>Tanggal</th>
        				  <th>Total Harga</th>
                  <th>Pembayaran</th>
        				  <th>Status</th>
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
                  <td>no urut <?php echo $u->id ?>
                  </td>
                  <td><?php echo $u->nama_pemesan; ?></td>
        				  <td><?php echo $u->no_meja; ?></td>
        				  <td><?php echo $u->tanggal; ?></td>
        				  <td><?php echo  "Rp " . number_format($u->total_harga,2,',','.'); ?></td>
                  <td><?php echo  "Rp " . number_format($u->nominal,2,',','.'); ?></td>
        				  <td><?php echo $u->status; ?></td>
				          <td><a href="<?=base_url('kasir/transaksi/'.$u->id);?>" class="btn btn-success btn-xs" data-toggle="tooltip" title="Lihat detail"><i class="fa  fa-eye" ></i> Detail masakan yang dipesan</a>
                     <?php
                  if($u->status=="disetor ke bendahara"){
                  }else{
                  if(isset($_GET['jumlah_setor'])){
                    $total=0;
                    if(isset($_GET['total_setor'])){
                      $total_setor=$_GET['total_setor'];
                      $jumlah_setor=$_GET['jumlah_setor'];
                      $total=$total_setor+$jumlah_setor;
                       
                    
                    ?>
                    <a href="<?=base_url();?>/kasir/pemesanan/?id=<?php echo $u->id;?>&&jumlah_setor=<?php echo $u->nominal;?>&&total_setor=<?php echo $total;?>" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Lihat detail"><i class="fa  fa-check" ></i> Setor ke bendahara</a>
                    <?php
                    }else{
                      ?>
                      <a href="<?=base_url();?>/kasir/pemesanan/?id=<?php echo $u->id;?>&&jumlah_setor=<?php echo $u->nominal;?>&&total_setor=<?php echo $total;?>" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Lihat detail"><i class="fa  fa-check" ></i> Setor ke bendahara</a>
                    <?php
                    }
                  }else{
                    ?>
                     <a href="<?=base_url();?>/kasir/pemesanan/?id=<?php echo $u->id;?>&&jumlah_setor=<?php echo $u->nominal;?>" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Lihat detail"><i class="fa  fa-check" ></i> Setor ke bendahara</a>
                    <?php
                  }
                  }
                  ?>
                 
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
