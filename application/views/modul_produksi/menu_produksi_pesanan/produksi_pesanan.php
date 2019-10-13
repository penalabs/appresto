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
  <!-- =============================================== -->

	<?php include(APPPATH.'views/menu.php');?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Produksi

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
  	<div class="row">
  	<div class="col-md-6">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data pesanan menu</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
  				          <th>menu</th>
                    <th>jumlah pesan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody id="data_pesanan_menu">
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>






          <div class="col-md-6">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data pesanan paket</h3>
              </div>
                    <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
        				    <th>paket</th>
                    <th>jumlah pesan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody id="data_pesanan_paket">
                  </tbody>
                </table>
              </div>
                    <!-- /.box-body -->
            </div>
                  <!-- /.box -->
          </div>
            <!-- /.box -->
  	</div>





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


<script type="text/javascript">
  $(document).ready(function() {
      selesai();
  });

  function selesai() {
    setTimeout(function() {
      SelectDataPemesananMenu();
      SelectDataPemesananPaket();
      selesai();
    }, 700);
  }

  SelectDataPemesananMenu();
  function SelectDataPemesananMenu(){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'modul_produksi/data_pemesanan_menu' ?>',
      dataType:'json',
      success: function(data){
        var no = 0;
        var baris = '';
        for(var i=0;i<data.length;i++){
          no++;
          baris +=
                '<tr>'+
                    '<td> '+ no +' </td>' +
                    '<td> '+ data[i].menu +' </td>' +
                    '<td> '+ data[i].jumlahPesan +' </td>' +
                    '<td> '+'<a href="#myModalEdit" onclick="edit('+data[i].id+')" class="btn btn-success btn-xs" data-toggle="modal" > <i class="fa  fa-edit" ></i></a>'+
                    '</td>'
                +'<tr>';
        }
        $('#data_pesanan_menu').html(baris)
      }
    });
  }







  SelectDataPemesananPaket();
  function SelectDataPemesananPaket(){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'modul_produksi/data_pemesanan_paket' ?>',
      dataType:'json',
      success: function(data){
        var no = 0;
        var baris = '';
        for(var i=0;i<data.length;i++){
          no++;
          baris +=
                '<tr>'+
                    '<td> '+ no +' </td>' +
                    '<td> '+ data[i].nama_paket +' </td>' +
                    '<td> '+ data[i].jumlahPesanPaket +' </td>' +
                    '<td> '+'<a href="#myModalEdit" onclick="edit('+data[i].id+')" class="btn btn-success btn-xs" data-toggle="modal" > <i class="fa  fa-edit" ></i></a>'+
                    '</td>'
                +'<tr>';
        }
        $('#data_pesanan_paket').html(baris)
      }
    });
  }




</script>

</body>
</html>
