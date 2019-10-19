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
            <form action="<?php echo base_url(). 'C_modul_admin_resto/pengeluaranbiayaoprasional_tambahaksi'; ?>" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pengeluaran Oprasional</label>
                  <div class="col-sm-10">
                  <select name="pengeluaran" class="form-control">
                      <option value="">-- Pilihan --</option>
                      <option value="Komunikasi">Komunikasi</option>
                      <option value="Promosi">Promosi</option>
                      <option value="Transportasi">Transportasi</option>
                      <option value="Listrik">Listrik</option>
                      <option value="Bahan Bakar Masak">Bahan Bakar Masak</option>
                      <option value="Maintenance">Maintenance</option>
                      <option value="Lain Lain">Lain Lain</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nominal</label>
                  <div class="col-sm-10">
                    <input type="number" name="nominal_pengeluaran_kebutuhan" class="form-control" >
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
