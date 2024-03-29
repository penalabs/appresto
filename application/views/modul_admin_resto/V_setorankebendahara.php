<!-- layout lama setor -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Manajemen Resto</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php include(APPPATH.'views/css.php');?>
  <style>
    .warnaahref {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding:5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
.warna {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.warna:hover {
  background-color: #008CBA;
  color: white;
}

.btnsetor {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 60px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  width: 100%;
  height: 140px;
}
.btnsetor1 {
  box-shadow: 10px -17px 25px 0px rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
  </style>
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
        Setoran

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
        <div class="col-xs-3">
          <form action="<?php echo base_url(). 'kasir/setorkebendahara'; ?>" method="post">
            <?php
            $id_kasir=$this->session->userdata('id');
            $id_kanwil=$this->session->userdata('id_kanwil');

            $sql4 = "SELECT * FROM user_kanwil WHERE id_kanwil='$id_kanwil' AND tipe='bendahara'";
            $data2=$this->db->query($sql4)->result();
              foreach($data2 as $u2){ 
                $kalimat_new = ucfirst($u2->nama);
              }

            ?>
            <input type="hidden" name="id_user_bendahara" value="<?php echo $u2->id; ?>">
            <input type="hidden" name="id_user_kasir" value="<?php echo $id_kasir; ?>">
            <!-- <input type="hidden" name="nominalsetor" value="<?php echo $nominalsetor; ?>"> -->
            <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d');?>">
            <!-- <button type="submit" onClick="alert('Setor Berhasil!')" class="btnsetor btnsetor1"> SETOR </button> -->
          </form>
        </div>
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
            <h5>Setor ke bendahara</h5>
            </div>
            <div class="box-body">
              <form action="<?php echo base_url(). 'C_modul_admin_resto/carisetor'; ?>" method="post">
              <div class="col-xs-5 form-group">
                  <input type="text" name="tglawal" id="tglawal" class="form-control" required>
                </div>
                <div class="col-xs-5 form-group">
                 <input type="text" name="tglakhir" id="tglakhir" class="form-control" required>
                </div>
                <div class="col-xs-2 form-group">
                   <button type="submit" class="warnaahref warna">C A R I</button>
                </div>
              </form>
            </div>
              
          </div>
        </div>
<?php 
foreach($tampildatasum as $jmlsetor){
  $jmlstor =$jmlsetor->jmlstor;
  }
?>

        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h5>Nominal yang akan disetor ke Bendahara</h5>
            </div>
            <div class="box-body">
              <form action="<?php echo base_url(). 'C_modul_admin_resto/setorkebendahara'; ?>" method="post">
                <h1><?php echo $jmlstor; ?></h1>
                <input type="hidden" name="jmlstor" value='<?php echo $jmlstor; ?>' class="form-control" required>
                <input type="hidden" name="id_user_bendahara" value="<?php echo $u2->id; ?>">
                <input type="hidden" name="id_user_kasir" value="<?php echo $id_kasir; ?>">
                <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d');?>">
                <div class="col-xs-2 form-group">
                   <button type="submit" class="warnaahref warna">S E T O R</button>
                </div>
              </form>
            </div>
              
          </div>
        </div>

	   <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rincian pembayaran pesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Tanggal | Jam</th>
                  <th>Nominal</th>
                </tr>
                </thead>
                <tbody>
        <?php 
          $no = 1;
          foreach($tampildatastor as $u){ 
        ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->tanggal ?></td>
                  <td><?php echo "Rp. ".number_format($u->jumlah_setoran).",-"; ?></td>
                </tr>
        <?php } ?>
        
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
    $('.sidebar-menu').tree();
    $('#tglawal').datepicker({
       format: 'yyyy-mm-dd'
    });
    $('#tglakhir').datepicker({
       format: 'yyyy-mm-dd'
    });
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
</body>
</html>
