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
	<div class="row">
		<div class="col-xs-10">
          <div class="box box-default">
            <div class="box-header with-border">
              
            </div>
            <div class="box-body">
						<?php
	
						  ?>
						  <a href="<?php echo base_url('modul_resto/add_menu_masakan');?>"  class="btn btn-success" > Tambah</a>
						  <?php
						  
						  ?>
              
               
            </div>
          </div>
        </div>
			<!-- Button to Open the Modal -->
		

		<!-- The Modal -->
		<div class="modal" id="myModal">
		  <div class="modal-dialog modal-sm">
			<div class="modal-content">

			  <!-- Modal Header -->
			  <div class="modal-header">
				<h4 class="modal-title">Tambah Menu</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  </div>

			  <!-- Modal body -->
			  <div class="modal-body">
				<form class="form-horizontal">
				  <div class="box-body">
				   
					
					<div class="form-group">
					  <label for="inputEmail3" class="col-sm-2 control-label">Nama Menu</label>

					  <div class="col-sm-10">
						<input type="text" class="form-control" id="inputEmail3" >
					  </div>
					</div>
					
				  </div>
				  
				</form>
			  </div>

			  <!-- Modal footer -->
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			  </div>

			</div>
		  </div>
		</div>
	<?php
    foreach($menu_masakan as $u){ 
    ?>  
	<div class="col-md-3">
          <div class="box box-success">
            <div class="box-header with-border">
              <span class="info-box-number"><?= $u->menu;?></span>

               <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
					 <img src="<?php echo base_url('gambar');?>/<?= $u->foto;?>" class="user-image" alt="User Image" width="100%" height="150">
					  <div class="info-box">
					 
					  <div class="pull-right">
					  <a href="<?php echo base_url('modul_resto/edit_menu_masakan');?>?id=<?= $u->id;?>"><i class="fa fa-edit"></i></a>
					  </div>
						<span class="info-box-icon bg-aqua"><i class="fa fa-cutlery">  </i></span>
						  

						<div class="info-box-content">
						  
						  <span class="info-box-number">Rp. <?= $u->harga;?></span>
						  <?php
						  $where2 = array(
								'id_menu' => $u->id
							);
						  $daftar_menu_masakan = $this->m_modul_resto->tampil_data_daftar_menu_masakan($where2)->result();
						  foreach($daftar_menu_masakan as $u2){
						  ?>
							<span class="info-box-text">- <?=$u2->nama_masakan;?></span>
							<?php
							}
							?>
						  
						  <span class="info-box-number"><?= $u->status;?></span></span>
						</div>
						<!-- /.info-box-content -->
					  </div>
					  <!-- /.info-box -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	<?php
                      }
                      ?>

	</div>


	
    <nav aria-label="Page navigation example">
	  <ul class="pagination">
		<li class="page-item"><a class="page-link" href="#">Previous</a></li>
		<li class="page-item"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item"><a class="page-link" href="#">Next</a></li>
	  </ul>
	</nav>
	


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
