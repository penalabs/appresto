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
        Entry Permintaan Investasi

      </h1>

    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url(). 'modul_general_manager/permintaaninvestasi_tambahaksi'; ?>" method="post" class="form-horizontal">
              <div class="box-body">
                <?php
                echo $id_kanwil=$this->session->userdata('id_kanwil');

                $sql1 = "SELECT * FROM superadmin";
                $data2=$this->db->query($sql1)->result();
                 ?>

                 <input type="hidden" name="id_kanwil"  value="<?=$id_kanwil;?>" class="form-control" >

                 <div class="form-group">
                   <label class="col-sm-2 control-label">Super admin</label>
                   <div class="col-sm-10">
                     <select name="id_super_admin" class="form-control">
                       <option value="">-- Pilihan --</option>
                       <?php foreach ($data2 as $superadmin) { ?>
                         <option value="<?php echo $superadmin->id; ?>"><?php echo $superadmin->nama; ?></option>
                       <?php } ?>
                     </select>
                   </div>
                 </div>
                 <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control pull-right"  name="tanggal" id="datepicker">
                          </div>
                 </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nominal Investasi</label>
                  <div class="col-sm-10">
                    <input type="number" name="nominal_investasi" class="form-control" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Penyusutan</label>
                  <div class="col-sm-10">
                    <input type="number" name="penyusutan" class="form-control" >
                  </div>
                </div>

                <!-- <div class="form-group">
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
                </div> -->
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
  //Date picker
      $('#datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
      })
      $(document).ready(function () {
        $('.sidebar-menu').tree()
      })
</script>
</body>
</html>
