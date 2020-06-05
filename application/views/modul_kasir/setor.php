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
.anim {
  animation: jiggle 1s ease-in infinite;
}
@keyframes jiggle {
  48%, 62% {
    transform: scale(1.0, 1.0)
  }
  50% {
    transform: scale(1.1, 0.9)
  }
  56% {
    transform: scale(0.9, 1.1) translate(0, -5px)
  }
  59% {
    transform: scale(1.0, 1.0) translate(0, -3px)
  }
}

/*=================*/
/*====GRADIENT====*/
.gradient, .gradient:after {
 display: block;
 content: "";
 width: 400px; height: 80px;
}

.gradient {
 animation: 8s anim linear infinite;
}

.gradient:after {
 transform: translateX(400px);
}

@keyframes anim{
 0% {transform: translateX(0px) ;}
 100% {transform: translateX(-400px) ;}
}


.ghost{
  /* posisi di tengah */
    display:inline-block;
  position: relative;
  top: 50%;
  left:50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
  -ms-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  /* text styles */
  font-family: Tahoma, Verdana, Segoe, sans-serif;
  font-size: 50px;
  letter-spacing: 10px;
  color:#ffffff;
  /* untuk modifikasi text*/
  text-decoration:none;
  text-transform:uppercase;
  /* menambahkan border */
  border:0.15em solid #fff;
  padding:0.4em 0.6em;
}
.ghost:hover{
  font-weight: bold;
  border-color:red;
  color:red;
  background-color:#FFF;
}
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
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
         <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <?php
              $id_kanwil=$this->session->userdata('id_kanwil');
              $query1 = "SELECT id_kanwil,alamat_kantor FROM kanwil where  id_kanwil='$id_kanwil'";
              $datakanwil=$this->db->query($query1)->row();

              $query2 = "SELECT kanwil.*,resto.*
              FROM kanwil
              JOIN resto ON resto.`id_kanwil` = kanwil.`id_kanwil`
              WHERE kanwil.`id_kanwil`='$id_kanwil'";
              $hasilquery=$this->db->query($query2)->row();
              ?>

            <h4 align="center">Klik tombol SETOR maka uang akan di setorkan ke Admin resto Kantor wilayah <?php echo "".$datakanwil->alamat_kantor; ?> cabang <?php echo "".$hasilquery->nama_resto; ?> pada tanggal <?php date_default_timezone_set('Asia/Jakarta'); echo date('d F, Y');?> per jam 07:00 sampai <?php date_default_timezone_set('Asia/Jakarta'); echo date('H:i');?>.<hr>WAJIB SETOR 1X 24JAM</h4>
            </div>
          </div>
        </div>
        <div class="col-xs-12">
          <form action="<?php echo base_url(). 'kasir/setorkebendahara'; ?>" method="post">

            <?php
            $id_kanwil=$this->session->userdata('id_kanwil');
            $query3 = "SELECT * FROM user_resto WHERE id_kanwil='$id_kanwil' AND jenis='admin resto'";
            $idbendahara=$this->db->query($query3)->row();
            ?>

            <input type="hidden" name="id_user_adminresto" value="<?php echo "".$idbendahara->id ?>">
            <input type="hidden" name="dateget" value="<?php echo date('H'); ?>">
            <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d');?>">
            <div class="anim">
              <div class="gradient"></div>
                <div class="">
                  <button type="submit" class="ghost"> SETOR </button>
                </div>
            </div>
          </form>
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
