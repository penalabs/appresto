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
        LAPORAN

      </h1>

    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
      <form
										action="<?php echo base_url(). 'modul_labarugi/'; ?>"
										method="post" class="form-horizontal">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Pilih TANGGAL</h3>
            </div>
            <div class="box-body">
              <div class="row">
									<div class="col-sm-12">
										<div class="form-group">
										    <div class="col-sm-3">
												<input type="text" name="tanggal1" class="form-control tanggal1">
											</div>
											 <div class="col-sm-3">
												<input type="text" name="tanggal2" class="form-control tanggal2">
											</div>
											<div class=col-sm-6">
												<button type="submit" class="btn btn-info">Berdasarkan Hari</button>
											</div>
										</div>
									</form>
									</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </form>
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
                  <div class="box-body">
                    <h1>Laporan Laba Rugi Per Resto</h1>
			<?php
			if(isset($_POST['tanggal1']) && isset($_POST['tanggal2'])){
			?>
              <table id="example1" class="table table-bordered table-striped">
                 <thead>
						<tr>
						  <th>#</th>
						  <th>Cabang</th>
						  <th>Laba Rugi</th>
						</tr>
                 </thead>

               <tbody>
                <?php
                  $no = 1;
				          $laba=0;
                  foreach($data_cabang_resto as $u){ ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama_resto ?></td>
                  <td>
				  <?php
				   $id_resto=$u->id;
				   $tanggal1=$_POST['tanggal1'];
				   $tanggal2=$_POST['tanggal2'];
				  $id_bendahara=$this->session->userdata('id');
				  $sql = "SELECT sum(jumlah_setoran) as pendapatan FROM pendapatan_kas_masuk where id_user_bendahara='$id_bendahara' and tanggal>'$tanggal1' and tanggal<'$tanggal2'";
				  $data1=$this->db->query($sql)->row();
				  echo 'pendapatan : '.$pendapatan=$data1->pendapatan;
				  echo '<br>';
						  $id_kanwil=$this->session->userdata('id_kanwil');
						  $sql2 = "SELECT sum(nominal_penyusutan) as nominal_penyusutan_cabang_alat,sum(nominal) as nominalnya FROM pengeluaran_cabang_alat where id_resto='$id_resto' and tanggal>'$tanggal1' and tanggal<'$tanggal2'";
						  $data_pengeluaran_cabang2=$this->db->query($sql2)->row();
						  $nominal=(int)$data_pengeluaran_cabang2->nominalnya;
				  echo 'penyusutan alat cabang: '.$penyusutan=((int)$data_pengeluaran_cabang2->nominal_penyusutan_cabang_alat/100)*(int)$nominal;
				  echo '<br>';

						  $id_kanwil=$this->session->userdata('id_kanwil');
						  $sql4 = "SELECT sum(nominal) as nominal_pengeluaran_cabang_operasional FROM pengeluaran_cabang_operasional where id_resto='$id_resto' and tanggal>'$tanggal1' and tanggal<'$tanggal2'";
						  $data_pengeluaran_cabang4=$this->db->query($sql4)->row();
				  echo 'biaya operasional cabang : '.$biaya_operasional_cabang=$data_pengeluaran_cabang4->nominal_pengeluaran_cabang_operasional;
				  echo '<br>';
				  echo '<h3>Laba Bersih : Rp. '.$laba_bersih=(int)$pendapatan-((int)$biaya_operasional_cabang+(int)$penyusutan).'</h3>';
				  (int)$laba=+(int)$laba_bersih;
				  ?>
                    <!-- nilai investasi – (laba bersih + penyusutan) / nilai investasi x 100% -->
                  </td>

                </tr>

                <?php }

				?>

                </tbody>

              </table>
			  <tr>
				<?php
				$id_kanwil=$this->session->userdata('id_kanwil');
						  $sql3 = "SELECT sum(nominal) as nominal_pengeluaran_kanwil_operasional FROM pengeluaran_kanwil_operasional where id_kanwil='$id_kanwil' and tanggal>'$tanggal1' and tanggal<'$tanggal2'";
						  $data_pengeluaran_kanwil3=$this->db->query($sql3)->row();
				$biaya_operasional_kanwil=$data_pengeluaran_kanwil3->nominal_pengeluaran_kanwil_operasional;
				$laba_nya=(int)$laba-(int)$biaya_operasional_kanwil;
				  echo '<h4>- biaya operasional kanwil : '.$biaya_operasional_kanwil.'</h4>';
				  echo '<h3>HASIL AKHIR LABA RUGI : '.$laba_nya.'</h3>';
				  echo '<br>';
				?>
				</tr>
			<?php
			}
			?>
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
    $('#example2').DataTable()
  })
</script>
<script>
  $(function () {
    //Initialize Select2 Elements

    //Datemask dd/mm/yyyy
    $('.tanggal1').datepicker({
        format: 'yyyy-mm-dd'
    });
	 $('.tanggal2').datepicker({
        format: 'yyyy-mm-dd'
    });
  })
</script>
</body>
</html>
