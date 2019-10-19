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
        Menu Masakan
       
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="col-md-3">
          <div class="box box-success">
            <div class="box-header with-border">
              <span class="info-box-number">Nasi Bebek</span>

               <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
					 <img src="<?php echo base_url('dist/img/user2-160x160.jpg');?>" class="user-image" alt="User Image" width="100%" height="150">
					  <div class="info-box">
					 
					  <div class="pull-right">
					  <i class="fa fa-edit"></i>
					  </div>
						<span class="info-box-icon bg-aqua"><i class="fa fa-cutlery">  </i></span>
						  

						<div class="info-box-content">
						  
						  <span class="info-box-number">Rp. 30000</span>
						  <span class="info-box-text">- paha</span>
						  <span class="info-box-text">- sambal teri</span>
						   <span class="info-box-text">- paha</span>
						  <span class="info-box-text">- sambal teri</span>
						  <span class="info-box-number">Tersedia</span></span>
						</div>
						<!-- /.info-box-content -->
					  </div>
					  <!-- /.info-box -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
