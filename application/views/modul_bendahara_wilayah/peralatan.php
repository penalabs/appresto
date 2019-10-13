<!DOCTYPE html>

<div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url(). 'modul_bendahara_wilayah/tambah_data_peralatan'; ?>" method="post" role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">resto</label>

                      <div class="col-sm-10">
                        <select class="form-control select2" name="resto" id="resto" style="width: 100%;">
                          <option value="">Pilih resto</option>
                            <?php
                            foreach ($data_resto as $data) {
                            ?>
                              <option value="<?php echo $data->id; ?>"><?php echo $data->nama_resto ?></option>
                            <?php
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">peralatan</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="peralatan" id="peralatan" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">stok</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="stok" id="stok" placeholder="Password">
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control select2" name="tipe_satuan" id="tipe_satuan" style="width: 100%;">
                          <option value="">Pilih satuan</option>
                          <option value="buah">buah</option>
                          <option value="lusin">lusin</option>
                          <option value="gross">gross</option>
                          <option value="kodi">kodi</option>
                          <option value="rim">rim</option>
                          <option value="kg">kg</option>
                          <option value="pcs">pcs</option>
                          <option value="liter">liter</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">harga</label>

                      <div class="col-sm-10">
                        <div class="input-group">
                          <div class="input-group-addon">
                            Rp.
                          </div>
                          <input type="text" class="form-control" name="harga" id="harga" placeholder="Password">
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
                        <h4 class="modal-title">Default Modal</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" action="<?php echo base_url(). 'modul_bendahara_wilayah/update_data_peralatan'; ?>" method="post" role="form">
                          <div class="box-body">
                            <div class="form-group">
                              <input type="hidden" class="form-control" name="id_peralatanedit" id="id_peralatanedit" placeholder="Password">
                              <label for="inputEmail3" class="col-sm-2 control-label">resto</label>

                              <div class="col-sm-10">
                                <select class="form-control select2" name="restoedit" id="restoedit" style="width: 100%;">
                                  <option value="">Pilih resto</option>
                                    <?php
                                    foreach ($data_resto as $data) {
                                    ?>
                                      <option value="<?php echo $data->id; ?>"><?php echo $data->nama_resto ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">peralatan</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="peralatanedit" id="peralatanedit" placeholder="Password">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">stok</label>
                              <div class="col-sm-7">
                                <input type="text" class="form-control" name="stokedit" id="stokedit" placeholder="Password">
                              </div>
                              <div class="col-sm-3">
                                <select class="form-control select2" name="tipe_satuanedit" id="tipe_satuanedit" style="width: 100%;">
                                  <option value="">Pilih satuan</option>
                                  <option value="buah">buah</option>
                                  <option value="lusin">lusin</option>
                                  <option value="gross">gross</option>
                                  <option value="kodi">kodi</option>
                                  <option value="rim">rim</option>
                                  <option value="kg">kg</option>
                                  <option value="pcs">pcs</option>
                                  <option value="liter">liter</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">harga</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="hargaedit" id="hargaedit" placeholder="Password">
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
  <!-- =============================================== -->

	<?php include(APPPATH.'views/menu.php');?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bendahara Wilayah

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	<div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Peralatan</h3>
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
				          <th>nama resto</th>
                  <th>nama_peralatan</th>
				          <th>jumlah_stok</th>
                  <th>harga_satuan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <?php
                $no = 0;
                foreach ($data_peralatan as $data) {
                  $no++;
                	?>

                <tbody>
                <tr id="<?php echo $data->id_peralatan; ?>">
                      <td><?php echo $no;?></td>
				              <td><?php echo $data->nama_resto;?></td>
				              <td><?php echo $data->nama_peralatan;?></td>
                      <td><?php echo $data->jumlah_stok;?> <?php echo $data->tipe_satuan;?></td>
                      <td><?php
                       echo $hasil_rupiah = "Rp " . number_format($data->harga_satuan,2,',','.');
                       ?></td>
				              <td>
                        <button type="submit" class="btn btn-success btn-xs edit" data-toggle="modal" data-target="#myModalEdit" data-toggle="tooltip" title="Detail"> <i class="fa  fa-edit" ></i></button>
                        <a href="<?php echo site_url('modul_bendahara_wilayah/delete_data_peralatan/'.$data->id_peralatan) ?>" class="btn btn-danger btn-xs" onclick="return confirm('apakah anda yakin ingin menghapus data \n<?php echo $data->nama_resto;?>?')"><i class="fa  fa-close" ></i></a>
                      </td>
                </tr>
                </tbody>
                <?php
                	}
                ?>
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
  $(".edit").click(function(){
  var id_peralatan = $(this).parents("tr").attr("id");
  ambilDataPeralatan();
  function ambilDataPeralatan(){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url()."modul_bendahara_wilayah/edit_data_peralatan/" ?>'+id_peralatan,
      dataType:'json',
      success: function(data){
        for(var i=0;i<data.length;i++){

          document.getElementById("restoedit").value  = data[i].id_resto;
          document.getElementById("peralatanedit").value = data[i].nama_peralatan;
          document.getElementById("stokedit").value = data[i].jumlah_stok;
          document.getElementById("hargaedit").value = data[i].harga_satuan;
          document.getElementById("id_peralatanedit").value = data[i].id_peralatan;
          document.getElementById("tipe_satuanedit").value = data[i].tipe_satuan;
        }
      }
    });
  }
  });
</script>
</body>
</html>
