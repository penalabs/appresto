<!DOCTYPE html>

<div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Permintaan Bahan</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url(). 'modul_produksi/tambah_data_permintaan_bahan'; ?>" method="post" role="form">
                  <div class="box-body">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">permintaan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_permintaan" id="nama_permintaan" placeholder="permintaan">
                        </div>
                      </div>
                    </div>
                  </div>
              <!-- /.box-body -->
                <div class="box-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info pull-right">Tambah</button>
                </div>
              <!-- /.box-footer -->
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>









        <div class="modal fade" id="myModalEdit" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Permintaan Bahan</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url(). 'modul_produksi/update_data_permintaan_bahan'; ?>" method="post" role="form">
                  <div class="box-body">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">permintaan</label>
                        <div class="col-sm-10">
                          <input type="hidden" class="form-control" name="id_permintaan_edit" id="id_permintaan_edit" placeholder="permintaan">

                          <input type="text" class="form-control" name="nama_permintaan_edit" id="nama_permintaan_edit" placeholder="permintaan">
                        </div>
                      </div>
                    </div>
                  </div>
              <!-- /.box-body -->
                <div class="box-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="button" onclick="updatedata()" id="btn_edit" class="btn btn-info pull-right">Update</button>
                </div>
              <!-- /.box-footer -->
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
                  <!-- /.modal-dialog -->
        </div>




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
	<div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Permintaan Bahan</h3>
              <br>
              <br>
              <button type="button" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Detail" class="btn btn-default pass_id"><i class="fa fa-plus"> Tambah</i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
				          <th>nama permintaan</th>
                  <th>status</th>
                  <th>tanggal permintaan</th>
				          <th>tanggal pengiriman</th>
                  <th>tanggal penerimaan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="target">
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
      SelectDataPermintaanBahan();
      selesai();
    }, 700);
  }
  SelectDataPermintaanBahan();
  function SelectDataPermintaanBahan(){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'modul_produksi/data_permintaan_bahan' ?>',
      dataType:'json',
      success: function(data){
        var baris='';
        var no = 0;

        var button_delete;
        var button_edit;
        var button_detail;
        var button_ajukan_permintaan;
        var button_diterima;

        for(var i=0;i<data.length;i++){
          if(data[i].status == 'draft'){
            button_delete = "";
            button_edit = "";
            button_detail = "";
            button_ajukan_permintaan = "";
            button_diterima = " style = 'display: none' ";
          }else if(data[i].status == 'proses permintaan'){
            button_delete = " style = 'display: none' ";
            button_edit = " style = 'display: none' ";
            button_detail = "";
            button_ajukan_permintaan = " style = 'display: none' ";
            button_diterima = " style = 'display: none' ";
          }else if(data[i].status == 'proses pengiriman'){
            button_delete = " style = 'display: none' ";
            button_edit = " style = 'display: none' ";
            button_detail = "";
            button_ajukan_permintaan = " style = 'display: none' ";
            button_diterima = "";
          }else if(data[i].status == 'diterima'){
            button_delete = " style = 'display: none' ";
            button_edit = " style = 'display: none' ";
            button_detail = "";
            button_ajukan_permintaan = " style = 'display: none' ";
            button_diterima = " style = 'display: none' ";
          }


          no++;
          baris +=
                '<tr>'+
                    '<td> '+ no +' </td>' +
                    '<td> '+ data[i].nama_permintaan +' </td>' +
                    '<td> '+ data[i].status +' </td>' +
                    '<td> '+ data[i].tanggal_permintaan +' </td>' +
                    '<td> '+ data[i].tanggal_pengiriman +' </td>' +
                    '<td> '+ data[i].tanggal_penerimaan +' </td>' +
                    '<td> '+'<a '+button_edit+'              href="#myModalEdit" onclick="edit('+data[i].id_permintaan+')" class="btn btn-success btn-xs" data-toggle="modal" > <i class="fa  fa-edit" ></i></a>'+
                            '<a '+button_delete+'            href="<?php echo site_url('modul_produksi/delete_data_permintaan_bahan/') ?>'+data[i].id_permintaan+' " class="btn btn-danger btn-xs" data-toggle="modal" > <i class="fa  fa-trash" ></i></a>'+
                            '<a '+button_detail+'            href="<?php echo site_url('modul_produksi/data_permintaan_bahan_detail/') ?>'+data[i].id_permintaan+' " class="btn btn-info btn-xs" data-toggle="modal" > Detail </a>'+
                    '</td>'
                +'<tr>';
        }
        $('#target').html(baris)
      }
    });
  }




</script>

<script type="text/javascript">
  function edit(id_permintaan){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'modul_produksi/edit_data_permintaan_bahan/' ?>'+id_permintaan,
      dataType:'json',
      success: function(data){

        var no = 0;
        for(var i=0;i<data.length;i++){
        $('[name="id_permintaan_edit"]').val(data[i].id_permintaan);
        $('[name="nama_permintaan_edit"]').val(data[i].nama_permintaan);
        }

      }
    });
  };


  function updatedata(){
    var id_permintaan = $('[name="id_permintaan_edit"]').val();
    var nama_permintaan = $('[name="nama_permintaan_edit"]').val();

    $.ajax({
      type:'POST',
      data: 'id_permintaan='+id_permintaan+'&nama_permintaan='+nama_permintaan,
      url:'<?php echo base_url().'modul_produksi/update_data_permintaan_bahan' ?>',
      dataType:'json',
      success: function(data){

        var no = 0;
        for(var i=0;i<data.length;i++){
        $('[name="id_permintaan_edit"]').val(data[i].id_permintaan);
        $('[name="nama_permintaan_edit"]').val(data[i].nama_permintaan);
        }

      }
    });
  };
</script>
</body>
</html>
