<!DOCTYPE html>

<div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kanwil</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url(). 'master/tambah_kantor_wilayah'; ?>" method="post" role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">alamat kantor</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamat_kantor_tambah" id="alamat_kantor_tambah" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">no telp</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="telp_tambah" id="telp_tambah" placeholder="Password">
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
                        <h4 class="modal-title">Default Modal</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" action="<?php echo base_url(). 'master/update_kantor_wilayah'; ?>" method="post" role="form">
                          <div class="box-body">
                            <input type="hidden" class="form-control" name="id_kanwil_edit" id="id_kanwil_edit" placeholder="Password">

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">alamat kantor</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat_kantor_edit" id="alamat_kantor_edit" placeholder="Password">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">no telp</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="telp_edit" id="telp_edit" placeholder="Password">
                              </div>
                            </div>
                          </div>
                      <!-- /.box-body -->
                        <div class="box-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-info pull-right">Update</button>
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
        Logistik

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	<div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pengadaan Bahan Mentah</h3>
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
				          <th>id kanwil</th>
                  <th>alamat kantor</th>
                  <th>no telp</th>
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


  SelectDataKantorWilayah();
  function SelectDataKantorWilayah(){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'master/data_kantor_wilayah' ?>',
      dataType:'json',
      success: function(data){
        var baris='';
        var no = 0;


        for(var i=0;i<data.length;i++){
          no++;
          baris +=
                '<tr>'+
                    '<td> '+ no +' </td>' +
                    '<td> '+ data[i].id_kanwil +' </td>' +
                    '<td> '+ data[i].alamat_kantor +' </td>' +
                    '<td> '+ data[i].telp +' </td>' +
                    '<td> '+'<a href="#myModalEdit" onclick="edit('+data[i].id_kanwil+')" class="btn btn-success btn-xs" data-toggle="modal" > <i class="fa  fa-edit" ></i></a>'+
                            '<a href="<?php echo site_url('master/delete_kantor_wilayah/') ?>'+data[i].id_kanwil+' " class="btn btn-danger btn-xs" data-toggle="modal" > <i class="fa  fa-trash" ></i></a>'+
                    '</td>'
                +'<tr>';
        }
        $('#target').html(baris)
      }
    });
  }
</script>
<script type="text/javascript">
  function edit(id_kanwil){

    // alert(id_kanwil);

    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'master/edit_kantor_wilayah/' ?>'+id_kanwil,
      dataType:'json',
      success: function(data){

        // alert(data[i].id_kanwil);

        var no = 0;
        for(var i=0;i<data.length;i++){
        $('[name="id_kanwil_edit"]').val(data[i].id_kanwil);
        $('[name="alamat_kantor_edit"]').val(data[i].alamat_kantor);
        $('[name="telp_edit"]').val(data[i].telp);
        }

      }
    });
  };
</script>
</body>
</html>
