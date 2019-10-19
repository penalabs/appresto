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
        Tambah Item MASAKAN
       
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	
	
		
		<?php echo $id_resto=$this->session->userdata('id_resto'); ?>
		<div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Bahan Jadi <i class="fa  fa-hand-lizard-o" ></i></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url(). 'modul_resto/add_bahan_jadi'; ?>" method="post" class="form-horizontal">
              <div class="box-body">
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Item</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="inputEmail3" >
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Porsi</label>
                  <div class="col-sm-10">
                    <input type="text" name="porsi" class="form-control" id="inputEmail3" >
                  </div>
                </div>
				 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" name="jumlah" class="form-control" id="inputEmail3" >
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
		
		<div class="col-md-12">
		</div>
		<div class="col-md-6">

          <!-- /.box -->
		  <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">DAFTAR ITEM MASAKAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>ITEM</th> 
				  <th>PORSI</th>
				  <th>JUMLAH</th>
                  <th style="width: 40px">Aksi</th>
                </tr>
				<?php 
					$no = 1;
					foreach($data as $u){ 
				?>
                <tr>
                   <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama_masakan ?>
                  </td>
                  <td><?php echo $u->jumlah ?></td>
				  <td><?php echo $u->porsi ?></td>
                  <td>
				  <?php 
				  if($u->status=="on"){ 
				  
				  ?>
						<a href="<?php echo base_url('modul_resto/rubah_status?status=off&&mode=bahan_jadi');?>&&id=<?php echo $u->id ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i> data tidak digunakan</a>
				  <?php
				  }else if($u->status=="off"){
				  ?>
					   <a href="<?php echo base_url('modul_resto/rubah_status?status=on&&mode=bahan_jadi');?>&&id=<?php echo $u->id ?>" class="btn btn-success btn-xs"><i class="fa   fa-check-square" ></i> data digunakan</a>
				  <?php
				  }
				  ?>
				  </td>
                </tr>
				<?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
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
