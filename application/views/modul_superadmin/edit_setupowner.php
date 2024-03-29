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
	<?php include(APPPATH.'views/menu.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Investasi

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">



				<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Quick Input</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->

          <?php
          $id=$_GET['id'];
          $sql2 = "SELECT owner.nama,investasi_owner.*,user_kanwil.nama as nama_bendahara FROM investasi_owner join owner on owner.id=investasi_owner.id_owner join user_kanwil  on user_kanwil.id=investasi_owner.id_bendahara where investasi_owner.id='$id'";
          $data = $this->db->query($sql2)->result();
          foreach($data as $u){
          ?>
					<form  action="<?php echo base_url(). 'superadmin/action_update_investasi'; ?>" method="post" role="form">
            <input type="hidden" value="<?php echo $_GET['id'];?>" class="form-control" id="id" name="id">
            <div class="box-body">
            <div class="form-group">
              <label for="exampleInputPassword1">Owner</label>
              <input type="hidden" class="form-control" id="id_owner" name="id_owner" value="<?php echo $u->id_owner;?>" placeholder="id_owner" readonly>
              <input type="text" class="form-control" id="" name="" value="<?php echo $u->nama;?>" placeholder="id_owner" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Bendahara</label>
              <input type="hidden" class="form-control" id="id_bendahara" name="id_bendahara" value="<?php echo $u->id_bendahara;?>" placeholder="id_bendahara" readonly>
              <input type="text" class="form-control" id="" name="" value="<?php echo $u->nama_bendahara;?>" placeholder="id_bendahara" readonly>
            </div>
						<div class="form-group">
						  <label for="exampleInputPassword1">Tanggal</label>
						  <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
						</div>
						 <div class="form-group">
						  <label for="exampleInputPassword1">Jumlah Investasi</label>
						  <input type="number" size="12" class="form-control" id="exampleInputPassword1" name="jumlah_investasi" placeholder="Jumlah Investasi">
						</div>
						<div class="form-group">
						  <label for="exampleInputPassword1">Jangan Waktu Bulan</label>
              <select name="jangka_waktu" class="form-control">
                <option value="">--- Pilih ---</option>
                  <option value="1 bulan">1 bulan</option>
                  <option value="2 bulan">2 bulan</option>
                  <option value="3 bulan">3 bulan</option>
                  <option value="4 bulan">4 bulan</option>
                  <option value="5 bulan">5 bulan</option>
                  <option value="6 bulan">6 bulan</option>
                  <option value="7 bulan">7 bulan</option>
                  <option value="8 bulan">8 bulan</option>
                  <option value="9 bulan">9 bulan</option>
                  <option value="10 bulan">10 bulan</option>
                  <option value="11 bulan">11 bulan</option>
                  <option value="12 bulan">12 bulan</option>
                </select>
						</div>
            <div class="form-group">
						  <label for="exampleInputPassword1">Persentase Omset</label>
						  <input type="number" class="form-control" id="exampleInputPassword1" name="persentase_omset" placeholder="Persentase omset">
						</div>
            <!-- <div class="form-group">
						  <label for="exampleInputPassword1">Jumlah Omset</label>
						  <input type="number" class="form-control" id="exampleInputPassword1" name="jumlah_omset" placeholder="Jumlah omset">
						</div> -->


					  </div>
					  <!-- /.box-body -->
					  <div class="box-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
					  </div>
					</form>
          <?php
          }
          ?>


				  </div>
				</div>
				<div class="col-md-3">
				<div class="box-header with-border">
					  <h3 class="box-title">INPUT INVESTASI BARU <i class="fa  fa-hand-lizard-o" ></i></h3>
				</div>
				</div>
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
    $('#tanggal').datepicker({
        format: 'yyyy-mm-dd'
    });
  })
</script>
</body>
</html>
