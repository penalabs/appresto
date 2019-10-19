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
                <form class="form-horizontal" action="<?php echo base_url(). 'modul_produksi/tambah_data_permintaan_bahan_detail'; ?>" method="post" role="form">
                  <div class="box-body">
                    <input type="hidden" class="form-control" name="id_permintaan" id="id_permintaan" value="<?php echo $id_permintaan?>" placeholder="Password">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">bahan </label>

                      <div class="col-sm-10">
                        <select class="form-control select2" name="bahan_mentah" id="bahan_mentah" style="width: 100%;">
                          <option value="">Pilih bahan </option>

                          <?php
                          foreach ($data_bahan_mentah as $data){
                          ?>
                            <option value="<?php echo $data->id; ?>"><?php echo $data->nama_bahan; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">jumlah</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="jumlah_permintaan" id="jumlah_permintaan" placeholder="jumlah permintaan">
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control select2" name="satuan_besar" id="satuan_besar" style="width: 100%;">
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
                              <label for="inputPassword3" class="col-sm-2 control-label">nama permintaan</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_permintaan" id="nama_permintaan" placeholder="Password">
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


                <div class="modal fade" id="myModalAmbilBahanTidakSesuai" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Default Modal aaaa</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" action="<?php echo base_url(). 'modul_produksi/update_tidak_sesuai_data_permintaan_bahan_detail'; ?>" method="post" role="form">
                          <div class="box-body">
                            <input type="hidden" class="form-control" name="id_detail_permintaan_AmbilBahanTidakSesuai" id="id_detail_permintaan_AmbilBahanTidakSesuai" placeholder="Password">
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">bahan </label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_bahan_AmbilBahanTidakSesuai" id="nama_bahan_AmbilBahanTidakSesuai" placeholder="jumlah permintaan" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">permintaan</label>
                              <div class="col-sm-7">
                                <input type="text" class="form-control" name="jumlah_permintaan_AmbilBahanTidakSesuai" id="jumlah_permintaan_AmbilBahanTidakSesuai" placeholder="jumlah permintaan" readonly="readonly">
                              </div>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" name="satuan_besar_AmbilBahanTidakSesuai" id="satuan_besar_AmbilBahanTidakSesuai" placeholder="jumlah permintaan" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">terkirim</label>
                              <div class="col-sm-7">
                                <input type="text" class="form-control" name="jumlah_bahan_terkirim_AmbilBahanTidakSesuai" id="jumlah_terkirim_AmbilBahanTidakSesuai" placeholder="jumlah permintaan">
                              </div>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" name="satuan_besar2_AmbilBahanTidakSesuai" id="satuan_besar2_AmbilBahanTidakSesuai" placeholder="jumlah permintaan" disabled>
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
              <h1 class="box-title">Judul permintaan : <i><?php echo $nama_permintaan; ?></i> </h1>
              <br>
              <h3 class="box-title">Detail Permintaan Bahan Sesuai dan Belum Terkonfirmasi </h3>
              <br>
              <br>
              <?php
                if($status == 'draft'){
                  $button_tambah = "";
                  $button_ajukan_permintaan = "";
                  $button_diterima = " style = 'display: none' ";
                }else if($status == 'proses permintaan'){
                  $button_tambah = " style = 'display: none' ";
                  $button_ajukan_permintaan = " style = 'display: none' ";
                  $button_diterima = " style = 'display: none' ";
                }else if($status == 'proses pengiriman'){
                  $button_tambah = " style = 'display: none' ";
                  $button_ajukan_permintaan = " style = 'display: none' ";
                  $button_diterima = "";
                }else if($status == 'diterima'){
                  $button_tambah = " style = 'display: none' ";
                  $button_ajukan_permintaan = " style = 'display: none' ";
                  $button_diterima = " style = 'display: none' ";
                }
              ?>
              <button <?php echo $button_tambah ?> type="button" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Detail" class="btn btn-default pass_id" ><i class="fa fa-plus"> Tambah</i></button>
              <a      <?php echo $button_ajukan_permintaan ?> href="<?php echo site_url('modul_produksi/update_proses_permintaan/') ?><?php echo $id_permintaan ?> " class="btn btn-primary btn-md" data-toggle="modal" > <i class="fa fa-chevron-circle-right" aria-hidden="true"> Ajukan permintaan </i></a>
              <a      <?php echo $button_diterima ?> href="<?php echo site_url('modul_produksi/update_diterima/') ?><?php echo $id_permintaan ?> " class="btn btn-success btn-md" data-toggle="modal" > diterima </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>id bahan mentah</th>
                  <th>jumlah permintaan</th>
				          <th>satuan besar</th>
                  <th>status penerimaan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <?php
                $no = 0;
                foreach ($tampil_data_permintaan_bahan_detail_sesuai_menunggukonfirmasi as $data) {
                  $no++;
                	?>

                <tbody>
                <tr id="<?php echo $data->id_detail_permintaan; ?>">
                      <td><?php echo $no;?></td>
                      <td><?php echo $data->nama_bahan;?></td>
				              <td><?php echo $data->jumlah_permintaan;?></td>
                      <td><?php echo $data->satuan_besar;?></td>
                      <td><i><?php echo $data->status_penerimaan; ?> </i></td>
                      <td>
                        <?php
                        $btn_update = "";
                        $btn_delete = "";
                        $btn_update_sesuai = "";
                        $btn_update_tidak_sesuai = "";
                          if($data->status == 'draft'){
                            $btn_update = "";
                            $btn_delete = "";
                            $btn_update_sesuai = " style = 'display: none' ";
                            $btn_update_tidak_sesuai = " style = 'display: none' ";
                          }else if($data->status == 'proses permintaan'){
                            $btn_update = " style = 'display: none' ";
                            $btn_delete = " style = 'display: none' ";
                            $btn_update_sesuai = " style = 'display: none' ";
                            $btn_update_tidak_sesuai = " style = 'display: none' ";
                          }else if($data->status == 'proses pengiriman'){
                            $btn_update = " style = 'display: none' ";
                            $btn_delete = " style = 'display: none' ";
                            $btn_update_sesuai = "";
                            $btn_update_tidak_sesuai = "";
                          }else if($data->status == 'diterima'){
                            $btn_update = " style = 'display: none' ";
                            $btn_delete = " style = 'display: none' ";
                            $btn_update_sesuai = " style = 'display: none' ";
                            $btn_update_tidak_sesuai = " style = 'display: none' ";
                          }
                        ?>
                        <button  <?php echo $btn_update ?>        type="submit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalEdit" data-toggle="tooltip" title="Detail"> <i class="fa  fa-edit" ></i></button>
                        <a <?php echo $btn_delete ?>              href="<?php echo site_url(''.$data->id_detail_permintaan) ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a>
                        <a <?php echo $btn_update_sesuai ?>       href="<?php echo site_url('modul_produksi/update_sesuai_data_permintaan_bahan_detail/'.$data->id_detail_permintaan) ?>" class="btn btn-success btn-xs"> sesuai </a>
                        <a <?php echo $btn_update_tidak_sesuai ?> href="#myModalAmbilBahanTidakSesuai" onclick="AmbilBahanTidakSesuai('<?php echo $data->id_detail_permintaan; ?>','<?php echo $data->nama_bahan; ?>','<?php echo $data->jumlah_permintaan; ?>','<?php echo $data->satuan_besar; ?>')" class="btn btn-warning btn-xs" data-toggle="modal"> tidak sesuai </a>
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


  <?php
  if(($status == 'proses pengiriman' || $status == 'diterima')&&(count($tampil_data_permintaan_bahan_detail_tidak_sesuai) > 0)){
  ?>

  <div class="row">
	<div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Permintaan Bahan Tidak Sesuai </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>id bahan mentah</th>
                  <th>jumlah permintaan</th>
                  <th>jumlah terkirim</th>
                  <th>selisih bahan</th>
				          <th>satuan besar</th>
                  <th>status penerimaan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <?php
                $no = 0;
                foreach ($tampil_data_permintaan_bahan_detail_tidak_sesuai as $data) {
                  $no++;
                	?>
                  <?php
                    if($data->status == 'draft'){
                      $btn_update_sesuai = " style = 'display: none' ";
                    }else if($data->status == 'proses permintaan'){
                      $btn_update_sesuai = " style = 'display: none' ";
                    }else if($data->status == 'proses pengiriman'){
                      $btn_update_sesuai = "";
                    }else if($data->status == 'diterima'){
                      $btn_update_sesuai = " style = 'display: none' ";
                    }
                  ?>
                <tbody>
                <tr id="<?php echo $data->id_detail_permintaan; ?>">
                      <td><?php echo $no;?></td>
                      <td><?php echo $data->nama_bahan;?></td>
				              <td><?php echo $data->jumlah_permintaan;?></td>
                      <td><?php echo $data->jumlah_bahan_terkirim;?></td>
                      <td><?php echo $data->selisih_bahan;?></td>
                      <td><?php echo $data->satuan_besar;?></td>
                      <td><i><?php echo $data->status_penerimaan; ?> </i></td>
                      <td>
                        <a <?php echo $btn_update_sesuai ?>   href="<?php echo site_url('modul_produksi/update_sesuai_data_permintaan_bahan_detail/'.$data->id_detail_permintaan) ?>" class="btn btn-success btn-xs"> sesuai </a>
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

  <?php
}else{

}
  ?>





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


<script>

function AmbilBahanTidakSesuai(id_detail_permintaan,nama_bahan,jumlah_permintaan,satuan_besar){
  // window.alert(id_detail_permintaan+' '+nama_bahan);
  document.getElementById("id_detail_permintaan_AmbilBahanTidakSesuai").value = id_detail_permintaan;
  document.getElementById("nama_bahan_AmbilBahanTidakSesuai").value = nama_bahan;
  document.getElementById("jumlah_permintaan_AmbilBahanTidakSesuai").value = jumlah_permintaan;
  document.getElementById("satuan_besar_AmbilBahanTidakSesuai").value = satuan_besar;
  document.getElementById("satuan_besar2_AmbilBahanTidakSesuai").value = satuan_besar;

};

</script>


</body>
</html>
