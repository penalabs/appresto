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
       Permintaan Peralatan
      </h1>

    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <!-- <a href="<?php echo base_url('C_modul_admin_resto/permintaanperalatan_tambah'); ?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Entry</a> -->
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Cabang</th>
                  <th>Nama Alat</th>
                  <th>Jumlah</th>
                  <th>Masa Pemanfaatan</th>
                  <th>Status</th>
                  <!-- <th>Nominal</th>
                  <th>Penyusutan %</th> -->
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="listRecords">
        <?php
          $no = 1;
          foreach($permintaanperalatan as $u){
        ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama_resto ?></td>
                  <td><?php echo $u->nama_peralatan ?></td>
                  <td><?php echo $u->jumlah ?></td>
                  <td><?php echo $u->masa_pemanfatan ?></td>
                  <td><?php echo $u->status_permintaan ?></td>
                  <!-- <td><?php echo "Rp. ".number_format($u->nominal).",-"; ?></td>
                  <td><?php echo $u->nominal_penyusutan ?> %</td> -->
				  <td>



						<?php if($u->status_permintaan == "permintaan"){
						  ?>
						  <a href="<?php echo base_url()?>Modul_logistik/KirimPermintaanAlat/?id_permintaan_alat=<?php echo $u->id_permintaan_alat?>&&id_alat=<?php echo $u->id_alat?>&&jumlah_permintaan=<?php echo $u->jumlah; ?>" class="btn btn-success btn-xs KirimForm">Kirimkan</a>
						  <a href="<?php echo base_url()?>Modul_logistik/TolakPermintaanAlat/?id_permintaan_alat=<?php echo $u->id_permintaan_alat?>&&id_alat=<?php echo $u->id_alat?>&&jumlah_permintaan=<?php echo $u->jumlah; ?>" class="btn btn-danger btn-xs tolakData">Tolak</a>
						  <?php
						}else if($u->status_permintaan != "permintaan"){
						 ?>
						 <!-- <a href="javascript:void(0);" class="btn btn-info btn-xs showForm"
						 data-resto="<?php echo $u->nama_resto ?>"
						 data-alat="<?php echo $u->nama_peralatan ?>"
						 data-jml="<?php echo $u->jumlah ?>"
						 data-masa="<?php echo $u->masa_pemanfatan ?>"
						 data-status="<?php echo $u->status_permintaan ?>"
						 data-tgl_permintaan="<?php echo $u->tanggal ?>"
						 >Lihat</i></a> -->
						 <?php
						}?>

					</td>
					</tr>
					<?php } ?>
                </tbody>

              </table>
            </div>
          </div>
    </div>
  </div>

<!-- <form id="showForm" method="post">
	<div class="modal fade" id="showM" tabindex="-1" role="dialog" aria-labelledby="GajiLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
			<h3 class="modal-title text-center" id="GajiLabel">Detail</h3>

		  </div>
		  <div class="modal-body">
			<div class="form-group row">
				<div class="col-md-12">
				<h5>Resto</h5>
				<input type="text" name="resto" id="resto" readonly class="form-control text-uppercase" required>
				</div>

				<div class="col-md-12">
				<h5>Nama Alat</h5>
				<input type="text" name="alat" id="alat" readonly class="form-control text-uppercase" required>
				</div>

				<div class="col-md-6">
				<h5>Jumlah</h5>
				<input type="text" name="jml" id="jml" readonly class="form-control text-uppercase" required>
				</div>
				<div class="col-md-6">
				<h5>Masa Pemanfaatan</h5>
				<input type="text" name="masa" id="masa" readonly class="form-control text-uppercase" required>
				</div>

				<div class="col-md-12">
				<h5>Status</h5>
				<input type="text" name="status" id="status" readonly class="form-control text-uppercase text-center" required>
				</div>

				<div class="col-md-6">
				<h5>Tanggal Permintaan</h5>
				<input type="text" name="tgl_permintaan" id="tgl_permintaan" readonly class="form-control text-uppercase text-center" required>
				</div>

				<div class="col-md-6 tglKirim">
				<h5>Tanggal Pengiriman</h5>
				<input type="text" name="tgl_kirim" id="tgl_kirim" readonly class="form-control text-uppercase text-center" required>
				</div>

				<div class="col-md-12 tglTerima text-center">
				<h5>Tanggal Terima</h5>
				<input type="text" name="tgl_terima" id="tgl_terima" readonly class="form-control text-uppercase text-center" required>
				</div>
			</div>

		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
</form> -->

<!-- <form id="KirimForm" method="post" action="<?php echo base_url().'modul_logistik/editRecordPermintaan'?>">
	<div class="modal fade" id="showK" tabindex="-1" role="dialog" aria-labelledby="KirimLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
			<h3 class="modal-title text-center" id="KirimLabel">Detail</h3>

		  </div>
		  <div class="modal-body">
			<div class="form-group row">
				<div class="col-md-12">
				<h5>Resto</h5>
				<input type="text" name="resto1" id="resto1" class="form-control text-uppercase" required>
				</div>

				<div class="col-md-12">
				<h5>Nama Alat</h5>
				<input type="text" name="alat1" id="alat1" class="form-control text-uppercase" required>
				</div>

				<div class="col-md-6">
				<h5>Jumlah</h5>
				<input type="text" name="jml1" id="jml1" class="form-control text-uppercase" required>
				</div>
				<div class="col-md-6">
				<h5>Masa Pemanfaatan</h5>
				<input type="text" name="masa1" id="masa1" class="form-control text-uppercase" required>
				</div>

				<div class="col-md-12">
				<h5>Status</h5>
				<input type="text" name="status1" id="status1" class="form-control text-uppercase text-center" required>
				</div>

				<div class="col-md-12">
				<h5>Tanggal Permintaan</h5>
				<input type="text" name="tgl_permintaan1" id="tgl_permintaan1" class="form-control text-uppercase text-center" required>
				</div>
			</div>

		  </div>
		  <div class="modal-footer">
			<input type="hidden" name="idP" id="idP" class="form-control text-uppercase" required>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
			<button type="submit" class="btn btn-primary">Kirim</button>
		  </div>
		</div>
	  </div>
	</div>
</form> -->

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

	// $('#listRecords').on('click','.showForm',function(){
	// 	$('#showM').modal('show');
	// 	$("#resto").val($(this).data('resto'));
	// 	$("#alat").val($(this).data('alat'));
	// 	$("#jml").val($(this).data('jml'));
	// 	$("#masa").val($(this).data('masa'));
	// 	$("#status").val($(this).data('status'));
	// 	$("#tgl_permintaan").val($(this).data('tgl_permintaan'));
	// 	$("#tgl_kirim").val($(this).data('status'));
	// 	$("#tgl_terima").val($(this).data('status'));
	// 	var stt = $(this).data('status');
	// 	if(stt=="diterima"){
	// 		$(".tglTerima").show();
	// 	}else{
	// 		$(".tglTerima").hide();
	// 	}
  //
	// });
  //
	$('#listRecords').on('click','.KirimForm',function(){
		$('#showK').modal('show');

		$("#resto1").attr('readonly','true').val($(this).data('resto1'));
		$("#alat1").attr('readonly','true').val($(this).data('alat1'));
		$("#jml1").val($(this).data('jml1'));
		$("#masa1").attr('readonly','true').val($(this).data('masa1'));
		$("#status1").attr('readonly','true').val($(this).data('status1'));
		$("#tgl_permintaan1").attr('readonly','true').val($(this).data('tgl_permintaan1'));
		$("#idP").val($(this).data('id_permintaan_alat'));

	});

  })
</script>
</body>
</html>
