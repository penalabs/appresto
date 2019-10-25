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
        Paket
       
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
						  <a href="<?php echo base_url('modul_resto/add_paket');?>"  class="btn btn-success" > Tambah</a>
						  <?php
						  
						  ?>
              
               
            </div>
          </div>
        </div>
		<?php
         foreach($paket as $u){ 
        ?>  
		<div class="col-md-3">
          <div class="box box-success">
            <div class="box-header with-border">
              <span class="info-box-number"><?=$u->nama_paket;?></span>

               <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
					 <img src="<?php echo base_url('uploads/paketnasibebek.jpg');?>" class="user-image" alt="User Image" width="100%" height="150">
					  <div class="info-box">
					 
					  <div class="pull-right">
					  <a href="<?php echo base_url('modul_resto/edit_paket');?>?id=<?= $u->id;?>"><i class="fa fa-edit"></i></a>
					  
					  </div>
						<span class="info-box-icon bg-aqua"><i class="fa fa-cutlery" ></i></span>
						  

						<div class="info-box-content">
						  
						  <span class="info-box-number">Rp. <?=$u->harga;?></span>
						  <?php
						  $where2 = array(
								'id_paket' => $u->id
							);
						  $daftar_menu_masakan = $this->m_modul_resto->tampil_data_daftar_menu_paket($where2)->result();
						  foreach($daftar_menu_masakan as $u2){
						  ?>
						  -  <?=$u2->menu;?><br>
							<?php
							}
							?>
						  <span class="info-box-number"><?=$u->status;?></span></span>
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
	
	
		<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">EDIT</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



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
