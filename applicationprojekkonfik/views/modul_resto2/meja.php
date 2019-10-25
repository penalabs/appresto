<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Manajemen Resto</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php include(APPPATH.'views/css.php');?>
		<style>
	/* Styles go here */

	.box-container {
		height: 200px;
	}

	.box-item {
		width: 100%;
		z-index: 1000
	}
	</style>
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
        MEJA
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	<?php				 
	$daftar_meja = $this->m_modul_resto->tampil_data_group('meja','panel')->result();
	foreach($daftar_meja as $u2){
	?>
		<div class="col-xs-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title">Panel <?php echo $u2->panel;?></h1>
            </div>
            <div id="container<?php echo $u2->panel;?>" class="panel-body box-container">
			<?php
							$where2 = array(
								'panel' => $u2->panel
							);
							
						  $meja = $this->m_modul_resto->tampil_data_where('meja',$where2)->result();
						  foreach($meja as $u){
			?>
              <div itemid="<?php echo $u->nomor;?>" class="btn btn-default box-item">Meja <?php echo $u->nomor;?></div>
			<?php
			}
			?>
            </div>
          </div>
        </div>
	<?php
	}
	?>
		<div class="col-md-12">
		<?php
		if(!empty($this->session->flashdata('pesan'))){
		?>
		<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                 <?php echo $this->session->flashdata('pesan');?>
		</div>
		<?php
		}
		?>
		</div>
        <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">DATA</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>NOMOR MEJA</th>
                  <th>PANEL</th>
                  <th style="width: 100px">AKSI</th>
                </tr>
                
				<?php
				$no=1;
						  $data = $this->m_modul_resto->tampil_data('meja')->result();
						  foreach($data as $u3){
				?>
				<tr>
                  <td><?=$no;?>.</td>
                  <td>Nomor Meja <?=$u3->nomor;?></td>
                  <td>
                    Panel Meja <?=$u3->panel;?>
                  </td>
                  <td><a href="<?php echo base_url(). 'modul_resto/hapus_meja'; ?>/?id=<?=$u3->id;?>&&mode=hapus" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a><a href="<?php echo base_url(). 'modul_resto/edit_meja'; ?>/?id=<?=$u3->id;?>&&mode=edit" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a></td>
				  
                </tr>
                <?php
				$no++;
				}
				?>
              </table>
            </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->
		</div>
		<?php
		if(isset($_GET['mode']) && $_GET['mode']=="edit"){
		?>
		<div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">EDIT MEJA <i class="fa  fa-hand-lizard-o" ></i></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url(). 'modul_resto/action_edit_meja'; ?>" method="post">
			<?php
						  foreach($data_meja as $u4){
				?>
              <div class="box-body">
               <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id" class="form-control" id="inputEmail3" >
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">PANEL</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputEmail3" value="<?= $u4->panel;?>"  min="1" name="panel" >
                  </div>
                </div>
               	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NOMOR MEJA</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputEmail3"  value="<?= $u4->nomor;?>" min="1" name="nomor" >
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
			  <?php
						  }
						  ?>
            </form>
          </div>
		</div>
		<?php
		}else{
		?>
		<div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">TAMBAH MEJA <i class="fa  fa-hand-lizard-o" ></i></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url(). 'modul_resto/action_add_meja'; ?>" method="post">
              <div class="box-body">
               <input type="hidden" value="<?php ?>" name="id_last_paket" class="form-control" id="inputEmail3" >
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">PANEL</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputEmail3"  min="1" name="panel" >
                  </div>
                </div>
               	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NOMOR MEJA</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputEmail3"  min="1" name="nomor" >
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
		<?php
		}
		?>
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
$(document).ready(function() {

  $('.box-item').draggable({
    cursor: 'move',
    helper: "clone"
  });
<?php				 
	$daftar_meja = $this->m_modul_resto->tampil_data_group('meja','panel')->result();
	foreach($daftar_meja as $u2){
	?>
  $("#container<?php echo $u2->panel;?>").droppable({
    drop: function(event, ui) {
      var itemid = $(event.originalEvent.toElement).attr("itemid");
	  alert(itemid)
      $('.box-item').each(function() {
        if ($(this).attr("itemid") === itemid) {
          $(this).appendTo("#container<?php echo $u2->panel;?>");
		  
        }
      });
    }
  });
<?php
	}
	?>
  
});
</script>
</body>
</html>
