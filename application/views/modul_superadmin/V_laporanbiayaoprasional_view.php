<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Biaya Oprasional</title>
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
					Laporan Biaya Oprasional
				</h1>

			</section>

			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<!-- Horizontal Form -->
						<div class="box box-info">
							<div class="box-header with-border">
								<div class="box-tool">
								<div class=col-sm-6>
									<form
										action="<?php echo base_url(). 'C_modul_admin_resto/laporanbiayaoprasional_cariaksi_hari'; ?>"
										method="post" class="form-horizontal">
										<div class="form-group">
										<div class="col-sm-6">
												<input type="date" name="tanggal_hari" class="form-control">
											</div>
											
											<div class=col-sm-6">
												<button type="submit" class="btn btn-info">Berdasarkan Hari</button>
											</div>
										</div>

									</form>
									</div>
									<div class=col-sm-6>
									<form
										action="<?php echo base_url(). 'C_modul_admin_resto/laporanbiayaoprasional_cariaksi_bulan'; ?>"
										method="post" class="form-horizontal">
										<div class="form-group">
											<div class="col-sm-6">
											<select name="tanggal_bulan" class="form-control">
												<option value="">--- Pilih Bulan ---</option>
												<option value="01">Januari</option>
												<option value="02">Februari</option>
												<option value="03">Maret</option>
												<option value="04">April</option>
												<option value="05">Mei</option>
												<option value="06">Juni</option>
												<option value="07">Juli</option>
												<option value="08">Agustus</option>
												<option value="09">September</option>
												<option value="10">Oktober</option>
												<option value="11">November</option>
												<option value="12">Desember</option>
											</select>
											</div>
											<div class=col-sm-6">
												<button type="submit" class="btn btn-primary">Berdasarkan Bulan</button>
											</div>
										</div>
									</form>
									</div>
								</div>
							</div>
							<!-- /.box-header -->
							<!-- form start -->
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Resto</th>
											<th>Kanwil</th>
											<th>Tanggal</th>
											<th>Oprasional</th>
										</tr>
									</thead>
									<tbody>
										<?php 
          $no = 1;
          foreach($laporanbiayaoprasional as $u){
        ?>
										<tr>
											<td><?php echo $no++ ?>.</td>
											<td><?php echo $u->nama_resto ?></td>
											<td><?php echo $u->alamat_kantor ?></td>
											<td><?php echo $u->tanggal ?></td>
											<td><?php echo $u->nama_pengeluaran ?></td>
										</tr>
										<?php } ?>

									</tbody>

								</table>
							</div>
						</div>
					</div>
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
				'paging': true,
				'lengthChange': false,
				'searching': false,
				'ordering': true,
				'info': true,
				'autoWidth': false
			})
		})

	</script>
</body>

</html>
