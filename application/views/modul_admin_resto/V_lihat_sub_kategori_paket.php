<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lihat Sub Kategori Paket</title>
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
       Lihat Sub Kategori
      </h1>

    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
                  <div class="box-body">
                    <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-default">Tambah Kategori Menu</button>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Sub Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php
          $no = 1;
          foreach($data1 as $u){
        ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama ?></td>
                  <td>
                    <a href="<?php echo base_url('C_modul_admin_resto/lihat_sub_kategori_paket/'.$u->id_kategori); ?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Lihat</a>
                    <a href="<?php echo base_url('C_modul_admin_resto/delete_kategori_paket/'.$u->id_kategori); ?>" class="btn btn-danger btn-xs"><i class="fa   fa-remove" ></i>Delete</a>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
    </div>
  </div>
</section>


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori Menu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url(). 'C_modul_admin_resto/aksi_tambah_sub_kategori_paket'; ?>" method="post" class="form-horizontal">
        <div class="modal-body">
          <div class="form-group col-md-6">
            <label class="control-label">Nama Kategori</label>
            <?php
              $no = 1;
              foreach($data2 as $u2){
            ?>
            <input type="hidden" name="id_parent_sub" class="form-control" value="<?php echo $u2->id_kategori ?>">
          <?php } ?>
            <input type="text" name="nama" class="form-control">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
