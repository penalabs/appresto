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


	<?php include(APPPATH.'views/customer/header.php');?>
	<?php include(APPPATH.'views/customer/sidebar.php');?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
  	<div class="row">


      <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Keranjang pemesanan</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th style="width: 400px">Qty</th>
                    <th style="width: 40px">Aksi</th>
                  </tr>

                  <?php
                  $total=0;
                  if ($cart = $this->cart->contents())
                  {
              		foreach($cart as $item){
                    $total+=$item['subtotal'];
              		?>
                  <tr>
                    <td>1.</td>
                    <td><?php echo $item['name'];?></td>
                    <td><?php echo $item['price'];?></td>
                    <td><div class="col-lg-4">
                      <div class="input-group">
                        <div class="input-group-btn">
                          <a class="btn btn-success btn-sm" href="<?php echo base_url();?>/customer/update_item/?rowid=<?php echo $item['rowid'];?>&&qty=<?php echo $item['qty'];?>&&aksi=minus">-</a>
                        </div>
                          <input type="text" class="form-control" value="<?php echo $item['qty'];?>" disabled>
                        <div class="input-group-btn">
                            <a class="btn btn-success btn-sm" href="<?php echo base_url();?>/customer/update_item/?rowid=<?php echo $item['rowid'];?>&&qty=<?php echo $item['qty'];?>&&aksi=plus">+</a>
                        </div>
                      </div>
                    </td>
                    <td><a class="btn btn-success btn-sm" href="<?php echo base_url();?>/customer/hapus_item/?rowid=<?php echo $item['rowid'];?>"><span class="fa fa-close"></span></a></td>
                  </tr>
                  <?php
                  }
                  }
                  ?>
                  <tr>
                    <td colspan="4">Total</td>
                    <td><?php echo $total;?></td>
                  </tr>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">

              </div>
            </div>
          </div>
          <!-- /.box -->
  	 </div>

           <div class="box box-primary">
             <div class="box-header with-border">
               <h3 class="box-title">Data pemesanan</h3>
             </div>
             <!-- /.box-header -->
             <form role="form" action="<?php echo base_url();?>/customer/simpan_pemesanan" method="post">
               <input name="total_harga" type="hidden" class="form-control" value="<?php echo $total;?>"  readonly>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pemesan</label>
                      <input name="nama_pemesan" type="text" class="form-control" value="<?php echo $this->session->userdata('nama_pemesan');?>"  placeholder="Masukan nama pemesan" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Catatan</label>
                      <textarea name="catatan" class="form-control" rows="3" placeholder="Masukan catatan"></textarea>
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Kirim pesanan</button>
                  </div>
            </form>
             <!-- /.box-body -->
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
