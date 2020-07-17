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
        Edit Paket

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	  <div class="row">

		<div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah menu ke PAKET <i class="fa  fa-hand-lizard-o" ></i></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url(). 'modul_resto/action_add_menu_paket'; ?>" method="post">
              <div class="box-body">
               <input type="hidden" value="<?php echo $id_paket;?>" name="id_paket" class="form-control" id="inputEmail3" >
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pilih Menu</label>

                  <div class="col-sm-10">
                     <select class="form-control" name="menu">
					           <?php
                      foreach($menu as $u){
                      ?>
            						<option value="<?= $u->id?>"><?= $u->menu?></option>
            						<?php
            					  }
            					  ?>
					           </select>
                  </div>

                </div>
               	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputEmail3"  min="1" name="jumlah" >
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

		        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">DAFTAR MENU DALAM PAKET</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama Menu</th>
				          <th>Jumlah</th>
				          <th>Sub Harga</th>
                  <th style="width: 40px">Aksi</th>
                </tr>
				        <?php
                    $no=1;
                    $total=0;
                    foreach($daftar_menu_paket as $u3){
                ?>
				            <?=$u3->id;?>
                <tr>
                  <td><?=$no;?>.</td>
                  <td><?=$u3->menu;?></td>
				          <td><?=$u3->jumlah;?></td>
				          <td><?=$u3->total_harga;?></td>
                  <td><a href="<?php echo base_url(). 'modul_resto/hapus_item_paket'; ?>/?id=<?=$u3->id;?>&&tb=detail_paket&&id_menu=<?=$u3->id_menu;?>&&jumlah=<?=$u3->jumlah;?>&&id_paket=<?php echo $id_paket;?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a></td>
                </tr>
               <?php
        			   $no++;
        					}
        			  ?>
              </table>
            </div>
            <!-- /.box-body -->

          </div>
		</div>

		<div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Detil PAKET </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			    <div class="box-body">
            <form class="form-horizontal" action="<?php echo base_url(). 'modul_resto/action_edit_paket'; ?>" method="post" role="form" enctype="multipart/form-data">
			      <input type="hidden" class="form-control" value="<?php echo $_GET['id'];?>" name="id_paket" id="inputEmail3" >
			          <?php
                      foreach($paket as $u3){
                ?>
				         <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?=$u3->harga?>" name="harga_jual" id="inputEmail3" >
                  </div>
                </div>
				        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?=$u3->jumlah?>" id="inputEmail3"  min="1" name="jumlah" >
                  </div>
                </div>
				        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Paket</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?=$u3->nama_paket?>" name="nama_paket" id="inputEmail3" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <?php
          				 if($u3->status=="tersedia"){
          				 ?>
                    <input type="radio" name="status" id="optionsRadios1" value="tersedia" checked>
                      Tersedia
					          <input type="radio" name="status" id="optionsRadios1" value="habis" >
                      Habis
            				<?php
            				 }else{
            				 ?>
            				 <input type="radio" name="status" id="optionsRadios1" value="tersedia" >
                                  Tersedia
            				 <input type="radio" name="status" id="optionsRadios1" value="habis" checked>
                      Habis
              		  <?php
              			 }
              			?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Foto paket</label>
                  <div class="col-sm-10">
                    <input type="file"  class="form-control"  name="berkas">
                    <p class="help-block">max 1MB.</p>
                  </div>
                </div>

        			  <?php
        					  }
        				?>
              <!-- /.box-body -->
              <div class="box-footer">

                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		</div>
		</div>
		<div class="col-md-4">

          <!-- /.box -->
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
