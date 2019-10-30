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
        Genaral Manager

      </h1>

    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Permintaan Investasi<i class="fa  fa-hand-lizard-o" ></i></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url(). 'modul_general_manager/bendahara_pengeluaran_investasi_tambahaksi'; ?>" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Cabang</label>
                  <div class="col-sm-10">
                    <select name="nama_cabang" class="form-control">
                      <option value="">-- Pilihan --</option>
                      <?php foreach ($data_cabang_resto as $datacabangresto) { ?>
                        <option value="<?php echo $datacabangresto->id; ?>"><?php echo $datacabangresto->nama_resto; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Saldo Kas KANWIL</label>
                  <div class="col-sm-10">

                        <?php
        						  $id_bendahara=$this->session->userdata('id');
                      $id_kanwil=$this->session->userdata('id_kanwil');
                      $sql = "SELECT sum(nominal_kas_keluar) as saldo FROM pemberian_kaskeluar where id_bendahara='$id_bendahara'";
                      $data_kas=$this->db->query($sql)->row();

        						  // $sql = "SELECT sum(nominal_kas_keluar) as saldo FROM pemberian_kaskeluar where id_bendahara='$id_bendahara'";
        						  // $data_kas=$this->db->query($sql)->row();


        						  $sql2 = "select sum(dibayar) as pengeluaran_alat from pembelian_alat join user_kanwil on user_kanwil.id=pembelian_alat.id_logistik where id_kanwil='$id_kanwil'";
        						  $pengeluaran_alat=$this->db->query($sql2)->row();


        						  $sql3 = "select sum(dibayar) as pengeluaran_bahan_mentah from pembelian_bahan_mentah join user_kanwil on user_kanwil.id=pembelian_bahan_mentah.id_logistik where id_kanwil='$id_kanwil'";
        						  $pengeluaran_bahan_mentah=$this->db->query($sql3)->row();


        						  $sql4 = "SELECT sum(nominal) as nominal_pengeluaran_kanwil_operasional FROM pengeluaran_kanwil_operasional where id_kanwil='$id_kanwil'";
        						  $nominal_pengeluaran_kanwil_operasional=$this->db->query($sql4)->row();


        						  $sql4 = "SELECT (nominal_investasi) as nominal_investasi_kanwil FROM investasi_kanwil where id_kanwil='$id_kanwil'";
        						  $nominal_investasi_kanwil=$this->db->query($sql4)->row();

        						  $saldo_akhir=(int)$nominal_investasi_kanwil->nominal_investasi_kanwil-(int)$data_kas->saldo+((int)$pengeluaran_alat->pengeluaran_alat+(int)$pengeluaran_bahan_mentah->pengeluaran_bahan_mentah+(int)$nominal_pengeluaran_kanwil_operasional->nominal_pengeluaran_kanwil_operasional);
        						  ?>

                        <input type="number" name="saldokas" value="<?php echo $saldo_akhir; ?>" class="form-control" disabled>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Investasi</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_investasi" class="form-control" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Mulai</label>
                  <div class="col-sm-10">
                    <input type="text" name="tanggal_mulai" class="form-control" >
                  </div>
                </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Selesai</label>
                <div class="col-sm-10">
                  <input type="text" name="tanggal_selesai" class="form-control" >
                </div>
              </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pengeluaran</label>
                  <div class="col-sm-10">
                    <input type="number" name="jumlah_pengeluaran" class="form-control" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Persentase Penyusutan</label>
                  <div class="col-sm-10">
                    <input type="number" name="persen_susut" class="form-control" >
                  </div>
                </div>



              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
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
</body>
</html>
