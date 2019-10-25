<!DOCTYPE html>

<div class="modal fade" id="myModalEdit" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit permintaan bahan mentah</h4>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" action="<?php echo base_url(). 'modul_logistik/update_pengadaan_bahan_mentah_detail'; ?>" method="post" role="form">
                                  <input type="hidden" class="form-control" name="id_permintaan_detail_edit" id="id_permintaan_detail_edit" placeholder="Password">
                                  <input type="hidden" class="form-control" name="id_permintaan" id="id_permintaan" placeholder="Password">

                                    <div class="form-group">
                                      <label for="inputPassword3" class="col-sm-2 control-label">bahan</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_bahan_edit" id="nama_bahan_edit" placeholder="Password" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="inputPassword3" class="col-sm-2 control-label">jumlah</label>
                                      <div class="col-sm-7">
                                        <input type="text" class="form-control" name="jumlah_permintaan_edit" id="jumlah_permintaan_edit" placeholder="jumlah permintaan">
                                      </div>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="satuan_besar_edit" id="satuan_besar_edit" placeholder="jumlah permintaan" disabled>
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
        Produksi

      </h1>

    </section>

    <!-- Main content -->
  <section class="content">
	<div class="row">
	<div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Permintaan Bahan Mentah Detail</h3>
              <br>
              <br>
              <!-- <button type="button" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Detail" class="btn btn-default pass_id"><i class="fa fa-plus"> Tambah</i></a> -->
              <?php $status;?>
              <?php
                if($status == 'proses permintaan'){
                  $button_kirim = "";
                }else if($status == 'proses pengiriman'){
                  $button_kirim = " style = 'display: none' ";
                }else if($status == 'diterima'){
                  $button_kirim = "style = 'display: none'";
                }
              ?>
              <a <?php echo $button_kirim ?> href="<?php echo site_url('modul_logistik/update_proses_pengiriman/') ?><?php echo $id_permintaan ?> " class="btn btn-primary btn-mg" > kirim </a>
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

                  <?php
                    $data->status;
                    $button_edit_harga_bahan = "";
                    if($data->status == 'proses permintaan'){
                      $button_edit_harga_bahan = "";
                    }else if($data->status == 'proses pengiriman'){
                      $button_edit_harga_bahan = " style = 'display: none' ";
                    }else if($data->status == 'diterima'){
                      $button_edit_harga_bahan = "style = 'display: none'";
                    }
                  ?>

                <tbody>
                <tr id="<?php echo $data->id_detail_permintaan; ?>">
                      <td><?php echo $no;?></td>
                      <td><?php echo $data->nama_bahan;?></td>
				              <td><?php echo $data->jumlah_permintaan;?></td>
                      <td><?php echo $data->satuan_besar;?></td>

                      <td><i><?php echo $data->status_penerimaan; ?> </i></td>
                      <td>
                        <button <?php echo $button_edit_harga_bahan; ?> type="submit" class="btn btn-warning btn-xs" onclick="edit('<?php echo $data->id_detail_permintaan;?>')" data-toggle="modal" data-target="#myModalEdit" data-toggle="tooltip" title="harga"> <i class="fa  fa-money" ></i></button>
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
                    $button_edit_harga_bahan = "";
                    $button_edit_harga_bahan = "";
                    $button_edit_harga_bahan = "";
                    if($data->status == 'proses permintaan'){
                      $button_edit_harga_bahan = "";
                    }else if($data->status == 'proses pengiriman'){
                      $button_edit_harga_bahan = " style = 'display: none' ";
                    }else if($data->status == 'diterima'){
                      $button_edit_harga_bahan = "style = 'display: none'";
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
                        <button <?php echo $button_edit_harga_bahan; ?> type="submit" class="btn btn-warning btn-xs" onclick="edit('<?php echo $data->id_detail_permintaan;?>')" data-toggle="modal" data-target="#myModalEdit" data-toggle="tooltip" title="harga"> <i class="fa  fa-money" ></i></button>
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
  function edit(id_detail_permintaan){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'modul_logistik/edit_pengadaan_bahan_mentah_detail/' ?>'+id_detail_permintaan,
      dataType:'json',
      success: function(data){

        var no = 0;
        for(var i=0;i<data.length;i++){
        $('[name="id_permintaan"]').val(data[i].id_permintaan);
        $('[name="id_permintaan_detail_edit"]').val(data[i].id_detail_permintaan);
        $('[name="jumlah_permintaan_edit"]').val(data[i].jumlah_permintaan);
        $('[name="harga_satuan_edit"]').val(data[i].satuan_harga_per_satuan_bahan);
        $('[name="nama_bahan_edit"]').val(data[i].nama_bahan);
        $('[name="satuan_besar_edit"]').val(data[i].satuan_besar);
        }

      }
    });
  };
</script>


</body>
</html>
