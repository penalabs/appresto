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
                <form class="form-horizontal" action="<?php echo base_url(). 'modul_bendahara_wilayah/tambah_data_kas_keluar_cabang'; ?>" method="post" role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">resto</label>

                      <div class="col-sm-10">
                        <select class="form-control select2" name="resto" id="resto" style="width: 100%;">
                          <option value="">Pilih kanwil</option>
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
                      <label for="inputPassword3" class="col-sm-2 control-label">nominal</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">tanggal</label>

                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Password">
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
                <form class="form-horizontal" action="<?php echo base_url(). 'modul_bendahara_wilayah/tambah_data_kas_keluar_cabang'; ?>" method="post" role="form">
                  <div class="box-body">
                    <div class="form-group">
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
                      <label for="inputPassword3" class="col-sm-2 control-label">nominal</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nominaledit" id="nominaledit" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">tanggal</label>

                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggaledit" id="tanggaledit" placeholder="Password">
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
              <h3 class="box-title">Laporan Kas Cabang</h3>
              <br>
              <br>
              <!-- <button type="button" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Detail" class="btn btn-default pass_id"><i class="fa fa-plus"> Tambah</i></button> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
				          <th>Bendahara</th>
                  <th>Nama Resto</th>
                  <th>nominal_kas_keluar</th>
                  <th>tanggal</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <?php
                $no = 0;
                foreach ($data_kas_keluar_cabang as $data) {
                  $no++;
                	?>

                <tbody>
                <tr id="<?php echo $data->id_pengeluaran;?>">
                      <td><?php echo $no;?></td>
				              <td><?php echo $data->nama;?></td>
				              <td><?php echo $data->nama_resto;?></td>
                      <td><?php
                       echo $hasil_rupiah = "Rp " . number_format($data->nominal_kas_keluar,2,',','.');
                       ?></td>
                      <td><?php echo $data->tanggal;?></td>
				              <td>
                        <!-- <button type="submit" class="btn btn-success btn-xs edit" data-toggle="modal" data-target="#myModalEdit" data-toggle="tooltip" title="Detail"> <i class="fa  fa-edit" ></i></button>
                        <a href="<?php echo site_url('modul_bendahara_wilayah/delete_data_kas_keluar_cabang/'.$data->id_pengeluaran) ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a> -->
                        <a href="<?php echo site_url('modul_bendahara_wilayah/data_kas_keluar_cabang/?id_kas='.$data->id_pengeluaran) ?>" class="btn btn-danger btn-xs"><i class="fa  fa-eye" ></i></a>
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
          <?php
          if(isset($_GET['id_kas'])){
            $id_kas=$_GET['id_kas'];
            ?>
          <div class="col-md-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Detail penggunaan kas</h3>
                      <br>
                      <br>
                      <!-- <button type="button" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Detail" class="btn btn-default pass_id"><i class="fa fa-plus"> Tambah</i></button> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
        				          <th>Nama pengeluaran</th>
                          <th>Tanggal</th>
                          <th>Nominal</th>

                          <!-- <th>Aksi</th> -->
                        </tr>
                        </thead>


                        <tbody>
                          <?php
                          $no = 0;
                          $sql = "SELECT * from pengeluaran_cabang_operasional join operasional on operasional.id=pengeluaran_cabang_operasional.id_operasional where id_kas='$id_kas'";
            						  $detail_pengeluaran_cabang=$this->db->query($sql)->result();
                          foreach ($detail_pengeluaran_cabang as $data) {
                            $no++;
                          	?>
                        <tr >
                              <td><?php echo $no;?></td>
        				              <td><?php echo $data->nama_pengeluaran;?></td>
        				              <td><?php echo $data->tanggal;?></td>
                              <td><?php
                               echo $hasil_rupiah = "Rp " . number_format($data->nominal,2,',','.');
                               ?></td>

        				              <!-- <td>
                                <button type="submit" class="btn btn-success btn-xs edit" data-toggle="modal" data-target="#myModalEdit" data-toggle="tooltip" title="Detail"> <i class="fa  fa-edit" ></i></button>
                                <a href="<?php echo site_url('modul_bendahara_wilayah/delete_data_kas_keluar_cabang/'.$data->id_pengeluaran) ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a>
                                <a href="<?php echo site_url('modul_bendahara_wilayah/delete_data_kas_keluar_cabang/'.$data->id_pengeluaran) ?>" class="btn btn-danger btn-xs"><i class="fa  fa-eye" ></i></a>
                              </td> -->
                        </tr>
                        <?php
                        	}
                        ?>
                        </tbody>

                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                  <!-- /.box -->
                  <?php
                    }
                   ?>
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
  var id_kas_keluar_cabang = $(this).parents("tr").attr("id");
  ambilDataKasKeluarCabang();
  function ambilDataKasKeluarCabang(){
    $.ajax({
      type:'POST',
        url:'<?php echo base_url()."modul_bendahara_wilayah/edit_data_kas_keluar_cabang/" ?>'+id_kas_keluar_cabang,
      dataType:'json',
      success: function(data){
        for(var i=0;i<data.length;i++){
          document.getElementById("restoedit").value  = data[i].id;
          document.getElementById("nominaledit").value = data[i].nominal_kas_keluar;
          document.getElementById("tanggaledit").value = data[i].tanggal;
        }
      }
    });
  }
  });
</script>
</body>
</html>
