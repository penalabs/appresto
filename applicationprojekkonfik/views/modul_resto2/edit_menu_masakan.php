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
        Edit menu masakan
       
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	
	
		
		
		<div class="col-md-4">
		<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                 <?php echo $this->session->flashdata('pesan');?>
		</div>
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah item ke MENU <i class="fa  fa-hand-lizard-o" ></i></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url(). 'modul_resto/action_edit_item_menu'; ?>" method="post" role="form">
              <div class="box-body">
               <input type="hidden" value="<?php echo $id_menu;?>" name="id_last_menu" class="form-control" id="inputEmail3" >
               <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Bahan jadi</label>
                  <div class="col-sm-10">
                     <select class="form-control" name="id_bahan_jadi">
          					 <?php
          					  foreach($data as $u){ 
          					  ?>
          						<option value="<?=$u->id; ?>"><?=$u->nama_masakan; ?></option>
          					  <?php
          					  }
          					  ?>
					           </select>
                  </div>
                </div>
				       <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis Masakan</label>
                  <div class="col-sm-10">
                     <select class="form-control" name="id_jenis_masakan">
                     <?php
                      foreach($jenis_masakan as $u2){ 
                      ?>
                      <option value="<?=$u2->id; ?>"><?=$u2->jenis; ?></option>
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
				      <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputEmail3"  min="1" name="harga" >
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
		
		<div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Detil MENU</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url(). 'modul_resto/action_edit_menu'; ?>" method="post" role="form" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $id_menu;?>" name="id_menu" class="form-control" id="inputEmail3" >
              <div class="box-body">
			   <?php
                      foreach($menu_masakan as $u3){ 
                      ?>  
                
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Menu</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_menu" value="<?=$u3->menu?>" id="inputEmail3" disabled>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Porsi</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?=$u3->stok?>" name="porsi">
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga penjualan</label>

                  <div class="col-sm-10">
                    <input type="number" name="harga_jual" class="form-control" value="<?=$u3->harga?>" id="inputEmail3" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Foto masakan</label>
                  <div class="col-sm-10">
                    <input type="file"  class="form-control"  name="berkas">
                    <p class="help-block">max 1MB.</p>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
			  <?php
                      }
                      ?>
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
              <h3 class="box-title">DAFTAR ITEM MENU </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>ITEM</th>
                  <th>JML</th>
				          <th>HARGA</th>
                  <th style="width: 40px">Aksi</th>
                </tr>
                <?php
                    $no=1;
                    $total=0;
                    foreach($daftar_menu_masakan as $u3){ 
                ?>
                      <tr>
                        <td><?=$no;?>.</td>
                        <td><?=$u3->nama_masakan;?></td>
                        <td><?=$u3->jumlah;?></td>
      				    <td>Rp. <?=$u3->harga;?></td>
                        <td><a href="<?php echo base_url(). 'modul_resto/hapus_item_menu'; ?>/?id=<?=$u3->id;?>&&tb=daftar_masakan&&id_bahan_jadi=<?=$u3->id_bahan_jadi;?>&&jumlah=<?=$u3->jumlah;?>&&id_menu=<?php echo $id_menu;?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a></td>
                      </tr>
                      <?php 
                       $total=$total+$u3->harga;
                      ?>
                <?php
					$no++;
                    }
                ?>
				        <tr>
                  <td  colspan="2">TOTAL HARGA MASAKAN</td>
				          <td  colspan="3" class="pull-right">Rp. <?php echo $total;?></td>
                  </tr>
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
