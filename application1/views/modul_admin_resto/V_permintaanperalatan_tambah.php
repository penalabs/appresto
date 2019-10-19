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
        Entry Permintaan Peralatan
       
      </h1>
      
    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url(). 'C_modul_admin_resto/permintaanperalatan_tambahaksi'; ?>" method="post" class="form-horizontal">
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
                  <label class="col-sm-2 control-label">Alat</label>
                  <div class="col-sm-10">
                    <select name="alat" class="form-control">
                      <option value="">-- Pilihan --</option>
                      <?php foreach ($data_peralatan as $dataperalatan) { ?>
                        <option value="<?php echo $dataperalatan->id; ?>"><?php echo $dataperalatan->nama_peralatan; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" name="jumlah" class="form-control" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Masa Pemanfaatan</label>
                  <div class="col-sm-10">
                    <select name="masapemanfaatan" class="form-control">
                      <option value="">-- Pilihan --</option>
                      <option value="1 bulan">1 bulan</option>
                      <option value="2 bulan">2 bulan</option>
                      <option value="3 bulan">3 bulan</option>
                      <option value="4 bulan">4 bulan</option>
                      <option value="5 bulan">5 bulan</option>
                      <option value="6 bulan">6 bulan</option>
                      <option value="7 bulan">7 bulan</option>
                      <option value="8 bulan">8 bulan</option>
                      <option value="9 bulan">9 bulan</option>
                      <option value="10 bulan">10 bulan</option>
                      <option value="11 bulan">11 bulan</option>
                      <option value="12 bulan">12 bulan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nominal</label>
                  <div class="col-sm-10">
                    <input type="number" name="nominal" class="form-control" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Penyusutan</label>
                  <div class="col-sm-10">
                    <input type="number" name="penyusutan" class="form-control" >
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
