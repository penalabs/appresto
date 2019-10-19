<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Penjualan</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php include(APPPATH . 'views/css.php'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">


		<?php include(APPPATH . 'views/header.php'); ?>
		<!-- =============================================== -->

		<?php include(APPPATH . 'views/menu.php'); ?>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Laporan Penjualan
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
										<form action="<?php echo base_url() . 'C_modul_admin_resto/laporanpenjualanmenu_cariaksi'; ?>" method="post" class="form-horizontal">
											<div class="form-group">
												<div class="col-sm-6">
													<select name="namamenu" class="form-control">
														<option value="">-- Pilihan Menu --</option>
														<?php foreach ($comboboxmenu as $datamenu) { ?>
															<option value="<?php echo $datamenu->id; ?>"><?php echo $datamenu->menu; ?></option>
														<?php } ?>
													</select>
												</div>
												<div class=col-sm-6">
													<button type="submit" class="btn btn-info">Tampilkan Menu</button>
												</div>
											</div>

										</form>
									</div>
									<div class=col-sm-6>
										<form action="<?php echo base_url() . 'C_modul_admin_resto/laporanpenjualanpaket_cariaksi'; ?>" method="post" class="form-horizontal">
											<div class="form-group">
												<div class="col-sm-6">
													<select name="namapaket" class="form-control">
														<option value="">-- Pilihan Paket --</option>
														<?php foreach ($comboboxpaket as $datapaket) { ?>
															<option value="<?php echo $datapaket->id; ?>"><?php echo $datapaket->nama_paket; ?></option>
														<?php } ?>
													</select>
												</div>
												<div class=col-sm-6">
													<button type="submit" class="btn btn-primary">Tampilkan Paket</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<?php
								if ($datakondisi == "menu")
								{?>
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama</th>
											<th>Terjual</th>
											<th>Tanggal</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($laporanpenjualanM as $u) {
											?>
											<tr>
												<td><?php echo $no++ ?>.</td>
												<td><?php echo $u->menu ?></td>
												<td><?php echo $u->jumlah_pesan ?></td>
												<td><?php echo $u->tanggal ?></td>
											</tr>
										<?php } ?>
										<tr style="background-color: #9bfabe;">
											<th style="font-size: 2em;">Jumlah Terjual</th>
											<td colspan="3" style="font-size: 2em;" align="center"><?php echo $totalmenupayu['payu']; ?></td>
										</tr>
									</tbody>

								</table>
								<?php
								} else
								{?>
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama</th>
											<th>Terjual</th>
											<th>Tanggal</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($laporanpenjualanP as $u) {
											?>
											<tr>
												<td><?php echo $no++ ?>.</td>
												<td><?php echo $u->nama_paket ?></td>
												<td><?php echo $u->jumlah_pesan ?></td>
												<td><?php echo $u->tanggal ?></td>
											</tr>
										<?php } ?>
										<tr style="background-color: #9bfabe;">
											<th style="font-size: 2em;">Jumlah Terjual</th>
											<td colspan="3" style="font-size: 2em;" align="center"><?php echo $totalpaketpayu['payu']; ?></td>
										</tr>
									</tbody>

								</table>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</section>


			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?php include(APPPATH . 'views/footer.php'); ?>
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->
	<?php include(APPPATH . 'views/js.php'); ?>
	<script>
		$(document).ready(function() {
			$('.sidebar-menu').tree()
		})
	</script>
	<script>
		$(function() {
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