<?php
session_start();
include "koneksi.php";
if(empty($_SESSION['user'])){
header("Location:index.php");
}else{

    ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Waiters</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="../plugins/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="../plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
	<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="../plugins/Ionicons/css/ionicons.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<a class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>A</b>LT</span>
				<!-- logo for regular state and mobile devices -->
				<marquee> <span class="logo-lg">Resto Elastis</span></marquee>
			</a>
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="user.png" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?php echo $_SESSION['user']; ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">Menu</li>
					<li>
						<a href="pesan.php"><i class="fa fa-cart-plus"></i> <span>Pesan</span></a>
					</li>
					<li>
						<a href="statuspesanan.php"><i class="fa fa-clipboard"></i> <span>Status Pesanan</span></a>
					</li>
					<li class="header">Setting</li>
					<li><a href="logout.php"><i class="fa fa-unlock"></i> Logout</a></li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
		<section class="content-wrapper">
			<div class="wrapper">
				<div class="row">
					<!--/.col (left) -->
					<!-- right column -->
					<div class="col-md-12">
						<!-- /.box -->
						<!-- general form elements disabled -->
						<div class="box box-warning">
							<!-- /.box-header -->
							<!-- /.box-header -->
							<div class="box-body table-responsive no-padding">
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Menu</th>
											<th>Jumlah</th>
											<th>Harga</th>
										</tr>
									</thead>
									<tbody>
										<?php
                  $user_resto = $_SESSION['id'];
                  $id = $_GET['id'];
                  $quermenu = "SELECT pemesanan.*, pemesanan_menu.*, menu.*
                  FROM pemesanan_menu
                  JOIN pemesanan ON pemesanan.id = pemesanan_menu.id_pemesanan
                  JOIN menu ON menu.id = pemesanan_menu.id_menu
                  WHERE pemesanan.id_user_resto='$user_resto' AND pemesanan.id='$id'
                  ORDER BY pemesanan.id DESC";
                  $hasilpemesanan_menu = mysqli_query($koneksi,$quermenu);
                  $no = 1;
                  while($data=mysqli_fetch_array($hasilpemesanan_menu)){?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $data['menu'] ?></td>
											<td><?php echo $data['jumlah_pesan'] ?></td>
											<td><?php echo "Rp. ".number_format($data['subharga']).",-"; ?></td>
										</tr>
										<?php } ?>
									</tbody>
									<!-- ----------------------------------------------------------------------------- -->
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Paket</th>
											<th>Jumlah</th>
											<th>Harga</th>
										</tr>
									</thead>
									<tbody>
										<?php
                  $user_resto = $_SESSION['id'];
                  $id = $_GET['id'];
                  $querypaket = "SELECT pemesanan.*, pemesanan_paket.*, paket.*
                  FROM pemesanan_paket
                  JOIN pemesanan ON pemesanan.id = pemesanan_paket.id_pemesanan
                  JOIN paket ON paket.id = pemesanan_paket.id_paket
                  WHERE pemesanan.id_user_resto='$user_resto' AND pemesanan.id='$id'
                  ORDER BY pemesanan.id DESC";
                  $hasilpemesanan_paket = mysqli_query($koneksi,$querypaket);
                  $no = 1;
                  while($data=mysqli_fetch_array($hasilpemesanan_paket)){?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $data['nama_paket'] ?></td>
											<td><?php echo $data['jumlah_pesan'] ?></td>
											<td><?php echo "Rp. ".number_format($data['subharga']).",-"; ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<hr>
								<table class="table table-bordered table-striped" style="background:#1cd9d9;">
									<thead>
										<tr>
											<th>Nama Pemesan</th>
											<th>Meja</th>
											<th>Total Harga</th>
										</tr>
									</thead>
									<?php
                $user_resto = $_SESSION['id'];
                $id = $_GET['id'];
                $querypaket = "SELECT * FROM pemesanan
                WHERE pemesanan.id_user_resto='$user_resto' AND pemesanan.id='$id'
                ORDER BY pemesanan.id DESC";
                $hasilpemesanan_paket = mysqli_query($koneksi,$querypaket);
                $no = 1;
                while($data=mysqli_fetch_array($hasilpemesanan_paket)){?>
									<tbody>
										<tr>
											<td><?php echo $data['nama_pemesan'] ?></td>
											<td>Meja <?php echo $data['no_meja'] ?></td>
											<td><?php echo "Rp. ".number_format($data['total_harga']).",-"; ?></td>

										</tr>
									</tbody>
									<input type="hidden" id="txt1" onkeyup="sum();" value="<?php echo $data['total_harga']; ?>" class="form-control">
									<?php }?>
								</table>
								<form method="post" action="updatestatus_selsai_to_lunas.php">
								<div class="input-group input-group-md">
									<input type="hidden" name="idpemesanan" value="<?php echo $id; ?>" class="form-control">
									<input type="text" id="txt2" onkeyup="sum();" name="nominal_bayar" class="form-control">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-info btn-flat">Bayar</button>
									</span>
								</div>
								</form>
								<br>
								<div class="form-group">
									<input type="text" id="txt3" class="form-control" placeholder="Uang Kembalian" disabled>
								</div>
							</div>
						</div>
						<!-- /.box -->
					</div>
					<!--/.col (right) -->
				</div>
			</div>
		</section>
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- /.modal -->
	<script>
	var bayar = document.getElementById('txt2').value;
	function numberWithCommas(bayar) {
		return bayar.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	function sum() {
		var txtFirstNumberValue = document.getElementById('txt1').value;
		var txtSecondNumberValue = document.getElementById('txt2').value;
		var result = parseInt(txtSecondNumberValue) - parseInt(txtFirstNumberValue);
		if (!isNaN(result)) {
			var	number_string = result.toString(),
			sisa 	= number_string.length % 3,
			rupiah 	= number_string.substr(0, sisa),
			ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
			document.getElementById('txt3').value = "Rp. "+rupiah+",-";
		}
	}
	</script>

	<script src="../plugins/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="../plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="../plugins/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="../dist/js/demo.js"></script>
	<script src="../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css" />
	<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#table_id').DataTable({
				"paging": false,
				"ordering": false,
				"info": false,
				responsive: true
			});
		});

	</script>
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
	<script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
</body>

</html>
<?php
}
?>
