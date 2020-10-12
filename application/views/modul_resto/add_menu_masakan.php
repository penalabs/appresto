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
        Add menu masakan

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">


		<div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Beri nama MENU</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url(). 'modul_resto/action_add_menu'; ?>" method="post" role="form" enctype="multipart/form-data">
               <input type="hidden" value="<?php echo $id_last_menu->id+1;?>" name="id_last_menu" class="form-control" id="inputEmail3" >
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-10">

                    <select name="id_kategori" class="form-control">
                        <?php
                          $parent_kategori = $this->db->query("SELECT max(parent_id) as parent_max FROM tbl_kategori_menu ")->row();
                        // foreach ($parent_kategori as $parent) {
                          $id_p=$parent_kategori->parent_max;
                          $kategori = $this->db->query("SELECT * FROM tbl_kategori_menu where id_kategori>'$id_p'")->result();
                          foreach ($kategori as $k) {

                            // if($parent->id_kategori>$k->id_kategori){
                        ?>
                            <option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama; ?></option>
                        <?php
                            // }
                          }
                        // }
                        ?>
                    </select>

                  </div>
                </div>
				        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Menu</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="nama_menu">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <input type="radio" name="status"  value="tersedia" checked>
                      Tersedia
					           <input type="radio" name="status"  value="habis" checked>
                      Habis
                  </div>
                </div>
				        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga penjualan</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" min="1" name="harga_jual">
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
              <!-- /.box-footer -->
            </form>
          </div>
		</div>
		<div class="col-md-12">
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
