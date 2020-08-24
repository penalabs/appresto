<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Manajemen Resto</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include(APPPATH . 'views/css.php'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">


    <?php include(APPPATH . 'views/header.php'); ?>
    <?php include(APPPATH . 'views/menu.php'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Management Stok Bahan
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div calss="row">
          <div class="col-md-4">
            <!-- /.box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">DAFTAR Bahan Mentah </h3>
                <br>
                <a href="<?php echo site_url('modul_logistik/pembelian_bahan_mentah') ?>"><button type="button" class="btn btn-primary">Beli</button></a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalJual">Jual</button>
                <a href="<?php echo site_url('modul_logistik/produksi_bahan_olahan') ?>"><button type="button" class="btn btn-info">Olah</button></a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nama Bahan</th>
                      <th>Stok</th>
                      <th>Avg Beli</th>
                    </tr>
                  </thead>

                  <tbody id="data_bahan">
                    <?php
                    $no = 1;
                    foreach ($bahanMentah as $u) {
                    ?>
                      <tr>
                        <td><?= $u->nama_bahan; ?></td>
                        <td><?= $u->stok; ?></td>
                        <td><?= number_format($u->rata, 2); ?></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <div class="col-md-4">
            <!-- /.box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">DAFTAR Bahan Olahan </h3>
                <br>
                <button type="button" class="btn btn-success">Jual</button>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nama Bahan</th>
                      <th>Stok</th>
                      <th>Avg Produksi</th>
                    </tr>
                  </thead>

                  <tbody id="data_bahan">
                    <?php
                    $no = 1;
                    foreach ($bahanOlahan as $o) {
                    ?>
                      <tr>
                        <td><?= $o->nama_bahan; ?></td>
                        <td><?= $o->stok; ?></td>
                        <td></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <div class="col-md-4">
            <!-- /.box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">DAFTAR Peralatan</h3>
                <br>
                <a href="<?php echo site_url('modul_logistik/pembelian_alat') ?>"><button type="button" class="btn btn-primary">Beli</button></a>
                <button type="button" class="btn btn-success">Jual</button>
              </div>
              <!-- /.box-header -->
              <table id="example3" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>Nama Alat</th>
                    <th>Stok</th>
                    <th>Avg Beli</th>
                  </tr>
                </thead>

                <tbody id="data_bahan">
                  <?php
                  $no = 1;
                  foreach ($Peralatan as $u) {
                  ?>
                    <tr>
                      <td><?= $u->nama_peralatan; ?></td>
                      <td><?= $u->jumlah_stok; ?></td>
                      <td><?= number_format($u->rata, 2); ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- Modal -->
        <div id="myModalJual" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Jual Bahan Mentah</h4>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="bahanMentah">Pilih Bahan:</label>
                    <select class="form-control" id="bahanMentah" name="bahanMentah">
                      <?php
                      foreach ($bahanMentah as $u) {
                      ?>
                        <option><?= $u->nama_bahan; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pembeli">Pembeli</label>
                    <input type="text" class="form-control" id="pembeli" name="pembeli">
                  </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah">
                  </div>
                </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>

          </div>
        </div>
      </section>
    </div>
    <!-- /.content-wrapper -->

    <?php include(APPPATH . 'views/footer.php'); ?>
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
  <?php include(APPPATH . 'views/js.php'); ?>
  <script>
    $(document).ready(function() {
      $('.sidebar-menu').tree();
      //SelectDataBahan();
    })
  </script>
  <script>
    $(function() {
      $('#example1').DataTable();
      $('#example2').DataTable();
      $('#example3').DataTable();
    })
  </script>
</body>

</html>