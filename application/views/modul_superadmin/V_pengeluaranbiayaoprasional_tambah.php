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
        Entry Pengeluaran Biaya Operasional

      </h1>

    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url(). 'superadmin/pengeluaranbiayaoprasional_tambahaksi'; ?>" method="post" class="form-horizontal">

              <?php
              $id_admin_resto=$this->session->userdata('id');
              $sql2 = "SELECT * FROM user_resto where id='$id_admin_resto'";
              $idnya=$this->db->query($sql2)->row();
              $id_kanwil=$idnya->id_kanwil;
              $id_resto=$idnya->id_resto;

              ?>
              <input type="hidden" name="id_admin_resto"  value="<?=$id_admin_resto;?>" class="form-control" >
              <input type="hidden" name="id_kanwil"  value="<?=$id_kanwil;?>" class="form-control" >
              <!-- <input type="hidden" name="id_resto"  value="<?=$id_resto;?>" class="form-control" > -->

              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Resto</label>
                  <div class="col-sm-10">
                    <select name="id_resto" class="form-control">
                      <option value="">-- Pilihan --</option>

                      <?php


                      $sql = "SELECT * FROM resto";
                      $operasional=$this->db->query($sql)->result();
                      foreach($operasional as $u){
                      ?>
                      <option value="<?= $u->id?>"><?= $u->nama_resto?></option>
                      <?php
                      }
                      ?>

                    </select>
                    </div>
                </div>
                    <div class="form-group">
                  <label class="col-sm-2 control-label">Pengeluaran Oprasional</label>
                  <div class="col-sm-10">
                  <select name="id_operasional" class="form-control">
                      <option value="">-- Pilihan --</option>

                      <?php


                      $sql = "SELECT * FROM operasional";
                  		$operasional=$this->db->query($sql)->result();
                      foreach($operasional as $u){
                      ?>
                      <option value="<?= $u->id?>"><?= $u->nama_pengeluaran?></option>
                      <?php
                      }
                      ?>

                    </select>
                  </div>
                </div>
                <?php
                $sql3 = "SELECT sum(nominal_kas_keluar) as saldo_kas FROM pemberian_kaskeluar where id_resto='$id_resto'";
                $saldo_kas=$this->db->query($sql3)->row();

                $sql4 = "SELECT sum(nominal) as jumlah_pengeluaran FROM pengeluaran_cabang_operasional where id_resto='$id_resto'";
                $jumlah_pengeluaran=$this->db->query($sql4)->row();

                $saldo_akhir_kas=(int)$saldo_kas->saldo_kas-(int)$jumlah_pengeluaran->jumlah_pengeluaran;
                ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">SALDO KAS</label>
                  <div class="col-sm-10">
                    <input type="number" name="saldo_kas"  value="<?php echo $saldo_akhir_kas;?>" class="form-control" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nominal</label>
                  <div class="col-sm-10">
                    <input type="number" name="nominal" class="form-control" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Masa Pemakaian</label>
                  <div class="col-sm-10">
                    <input type="text" name="masa_sewa" class="form-control" >
                  </div>
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
