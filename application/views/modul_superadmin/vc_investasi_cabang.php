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
      <form method="post" action="<?php echo base_url(). 'modul_bendahara/laporan_investasi_cabang'; ?>">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Pilih Cabang</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-7">
                  <select name="cabang_resto" class="form-control">
                    <option value="">--- Pilih Cabang ---</option>
                    <?php foreach($data_cabang_resto as $u){ ?>
                      <option value="<?php echo $u->id ?>"><?php echo $u->nama_resto ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="col-xs-5">
                  <button type="submit" class="btn btn-block btn-success btn-flat">Cari Cabang</button>
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
                    <h1>Investasi Cabang</h1>
              <table id="example1" class="table table-bordered table-striped">
                 <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Investasi</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Jumlah Pengeluaran</th>
                  <th>Persen Penyusutan</th>


                </tr>
                        </thead>
                        <tbody>
                <?php
                  $no = 1;
                  $id_bendahara=$this->session->userdata('id');
                  foreach($data_lp_cabang as $u){ ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama_resto ?></td>
                  <td><?php echo $u->tanggal_mulai ?></td>
                  <td><?php echo $u->tanggal_selesai ?></td>
                  <td><?php echo "Rp. ".number_format($u->jumlah_pengeluaran).",-"; ?></td>
                  <td><?php echo $u->persen_penyusutan ?> %</td>



                </tr>
                <?php } ?>
                </tbody>




              </table>
              <?php
              if(isset($_POST['cabang_resto'])){
              $sql2 = "select sum(jumlah_setoran) as pendapatan from pendapatan_kas_masuk where id_user_bendahara='$id_bendahara'";
              $pendapatan=$this->db->query($sql2)->row();

              $sql3 = "select sum(nominal) as nominal_pengeluaran_cabang_operasional from pengeluaran_cabang_operasional";
              $nominal_pengeluaran_cabang_operasional=$this->db->query($sql3)->row();

              $batas_tanggal_penyusutan=date('Y-m-d');
              $sql4 = "select sum(nominal_penyusutan) as jumlah_penyusutan from penyusutan_investasi_cabang where tanggal<$batas_tanggal_penyusutan";
              $jumlah_penyusutan=$this->db->query($sql4)->row();

              $lababersih = $pendapatan->pendapatan-( $nominal_pengeluaran_cabang_operasional->nominal_pengeluaran_cabang_operasional + $jumlah_penyusutan->jumlah_penyusutan);

              $pengembalian_invest=(int)$u->jumlah_pengeluaran-((int)$lababersih+(int)$jumlah_penyusutan->jumlah_penyusutan)/(int)$u->jumlah_pengeluaran*100;

              ?>
              <h1>Pengembalian Dana  Rp. <?php echo number_format($pengembalian_invest).",-" ?></h1>

              <?php
              }
              ?>
            </div>
          </div>
          <!-- <div class="box box-info">
                  <div class="box-body">
                    <h1>Investasi Uang</h1>
              <table id="example2" class="table table-bordered table-striped">
                 <thead>
                <tr>
                  <th>#</th>
                  <th>Cabang</th>
                  <th>Investasi</th>
				  <th>Status</th>
                </tr>
                        </thead>
                        <tbody>
                <?php
                  $no = 1;
                  foreach($data_lp_ic as $datavalue){ ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $datavalue->nama_resto ?></td>
                  <td><?php echo "Rp. ".number_format($datavalue->nominal_kas_keluar).",-"; ?></td>
				  <td><?php echo $datavalue->status ?></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div> -->
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
</body>
</html>
