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
        Produksi

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <h4><i class="icon fa fa-check"></i> Alert!</h4>
                 <?php echo $user_data = $this->session->userdata('pesan'); ?>
         </div>


       </div>
      <div class="col-md-8">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Produksi Menu Masakan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example3" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
    				          <th>Nama Pemesan</th>
                      <th>No Meja</th>
                      <th>Keterangan Tambahan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
              					$no = 1;
                       $sql = "SELECT * FROM pemesanan";
                       $data=$this->db->query($sql)->result();
              					foreach($data as $u){
              				?>
                      <tr>
                          <td><?=$no;?></td>
                          <td><?=$u->nama_pemesan;?></td>
                          <td><?=$u->no_meja;?></td>
                          <td><?=$u->keterangantambahan;?></td>
                          <td><?=$u->status;?></td>
                          <td><a class="btn btn-success btn-xs" href="<?php echo base_url('modul_produksi/konfirm_siap_saji/?id_pemesanan=');?><?=$u->id;?>">Konfirm siap saji</a>  <a onClick="selesai(<?=$u->id;?>)" href="#" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Lihat Pesanan</a></td>
                      </tr>
                      <?php
                        $no++;
                        }
                      ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
         </div>
  	<div class="row">

  	        <div class="col-md-6">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data pesanan menu</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
  				          <th>menu</th>
                    <th>jumlah pesan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody id="data_pesanan_menu">
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>






          <div class="col-md-6">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data pesanan paket</h3>
              </div>
                    <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
        				    <th>paket</th>
                    <th>jumlah pesan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody id="data_pesanan_paket">
                  </tbody>
                </table>
              </div>
                    <!-- /.box-body -->
            </div>
                  <!-- /.box -->
          </div>
            <!-- /.box -->
  	</div>





		<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Masukkan Jumlah Masakan</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url(). 'modul_produksi/set_produksi_pesanan'; ?>" method="post" role="form" enctype="multipart/form-data">
                   <input type="hidden" value="" name="id" class="form-control" id="id" >
                  <div class="box-body">


                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label">Ambil jumlah masakan</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control" value="" min="1" name="jumlah">
                      </div>
                    </div>

                  </div>
                  <!-- /.box-body -->


                  <!-- /.box-footer -->

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-default2">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Masukkan Jumlah Masakan</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url(). 'modul_produksi/set_produksi_pesanan_paket'; ?>" method="post" role="form" enctype="multipart/form-data">
                       <input type="hidden" value="" name="id_paket" class="form-control" id="id_paket" >
                      <div class="box-body">


                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label">Ambil jumlah masakan</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" value="" min="1" name="jumlah">
                          </div>
                        </div>

                      </div>
                      <!-- /.box-body -->


                      <!-- /.box-footer -->

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
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
    $('#example1').DataTable();
    $('#example2').DataTable();
    $('#example3').DataTable();
  })
</script>


<script type="text/javascript">
  $(document).ready(function() {
      // selesai(id_pemesan);
  });

  function selesai(id_pemesan) {
    setTimeout(function() {
      SelectDataPemesananMenu(id_pemesan);
      SelectDataPemesananPaket(id_pemesan);
      selesai(id_pemesan);
    }, 700);
  }

  // SelectDataPemesananMenu();
  function SelectDataPemesananMenu(id_pemesan){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'modul_produksi/data_pemesanan_menu?id_pemesan=' ?>'+id_pemesan,
      dataType:'json',
      success: function(data){
        var no = 0;
        var baris = '';
        for(var i=0;i<data.length;i++){
          no++;
          baris +=
                '<tr>'+
                    '<td> '+ no +' </td>' +
                    '<td> '+ data[i].menu +' </td>' +
                    '<td> '+ data[i].jumlah_pesan +' </td>' +
                    '<td> '+'<a href="#" onclick="edit('+data[i].id_menu+')" class="btn btn-success btn-xs" data-toggle="modal" > <i class="fa  fa-edit" ></i></a>'+
                    '</td>'
                +'<tr>';
        }
        $('#data_pesanan_menu').html(baris)
      }
    });
  }



  function edit(id){
     $('#modal-default').modal('show');
     $('#id').val(id);
  }
  function editpaket(id){
     $('#modal-default2').modal('show');
     $('#id_paket').val(id);
  }



  // SelectDataPemesananPaket();
  function SelectDataPemesananPaket(id_pemesan){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'modul_produksi/data_pemesanan_paket?id_pemesan=' ?>'+id_pemesan,
      dataType:'json',
      success: function(data){
        var no = 0;
        var baris = '';
        for(var i=0;i<data.length;i++){
          no++;
          baris +=
                '<tr>'+
                    '<td> '+ no +' </td>' +
                    '<td> '+ data[i].nama_paket +' </td>' +
                    '<td> '+ data[i].jumlah_pesan +' </td>' +
                    '<td> '+'<a href="#" onclick="editpaket('+data[i].id_paket+')" class="btn btn-success btn-xs" data-toggle="modal" > <i class="fa  fa-edit" ></i></a>'+
                    '</td>'
                +'<tr>';
        }
        $('#data_pesanan_paket').html(baris)
      }
    });
  }




</script>

</body>
</html>
