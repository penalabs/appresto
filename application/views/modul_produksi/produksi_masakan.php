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
      <div class="col-md-4">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah produksi <i class="fa  fa-hand-lizard-o" ></i></h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?php echo base_url(). 'modul_produksi/aksi_tambah_produksi'; ?>" method="post" class="form-horizontal">
                <div class="box-body">

        				<div class="form-group">
                          <label for="inputPassword3" class="col-sm-3 control-label">Nama Menu</label>
                          <div class="col-sm-9">
                             <select class="form-control" name="nama_menu">
                             <?php
                  					 //$sql = "SELECT * FROM bahan_mentah join permintaan_bahan_detail on permintaan_bahan_detail.id_bahan_mentah=bahan_mentah.id";
                  					 $sql = "SELECT * FROM menu";
                  					 $data2=$this->db->query($sql)->result();
                                        foreach($data2 as $u2){
                                        ?>
                                        <option value="<?=$u2->id; ?>"><?=$u2->menu; ?></option>
                                        <?php
                                        }
                                        ?>
                             </select>
                          </div>
                  </div>


                <div class="form-group">
                         <label for="inputEmail3" class="col-sm-3 control-label">Jumlah produksi</label>
                         <div class="col-sm-9">
                           <input type="text" name="jumlah_produksi" class="form-control" id="inputEmail3" >
                         </div>
                </div>


                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right">Simpan</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
  		</div>
  	<div class="col-md-8">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Daftar Produksi Menu Masakan</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
  				          <th>Nama Menu</th>
                    <th>Tanggal</th>
                    <th>Jumlah Masakan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
            					$no = 1;
            					foreach($data as $u){
            				?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$u->menu;?></td>
                        <td><?=$u->tanggal;?></td>
                        <td><?=$u->jumlah_masakan;?></td>
                        <td><a href="<?php echo base_url('modul_produksi/produksi_masakan/?');?>id=<?php echo $u->id ?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Lihat bahan</a></td>
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

          <?php
          if(isset($_GET['id'])){
           ?>
          <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Tambah bahan mentah <i class="fa  fa-hand-lizard-o" ></i></h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form action="<?php echo base_url(). 'modul_logistik/aksi_update_stok_bahan_mentah'; ?>" method="post" class="form-horizontal">
                    <div class="box-body">


                      <input type="hidden" name="id_produksi_masakan" class="form-control" id="inputEmail3" value="<?=$_GET['id'];?>" >

                    <div class="form-group">
                              <label for="inputPassword3" class="col-sm-3 control-label">Bahan Mentah</label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="id_bahan_mentah">
                                 <?php
                                 //$sql = "SELECT * FROM bahan_mentah join permintaan_bahan_detail on permintaan_bahan_detail.id_bahan_mentah=bahan_mentah.id";
                                 $sql = "SELECT * FROM bahan_mentah";
                                 $data2=$this->db->query($sql)->result();
                                            foreach($data2 as $u2){
                                            ?>
                                            <option value="<?=$u2->id; ?>"><?=$u2->nama_bahan; ?></option>
                                            <?php
                                            }
                                            ?>
                                 </select>
                              </div>
                      </div>


                    <div class="form-group">
                             <label for="inputEmail3" class="col-sm-3 control-label">Jumlah bahan</label>
                             <div class="col-sm-9">
                               <input type="text" name="jumlah_bahan" class="form-control" id="inputEmail3" >
                             </div>
                    </div>


                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-info pull-right">Simpan</button>
                    </div>

                    <!-- /.box-footer -->
                  </form>
                </div>
          </div>

          <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Tambah bahan olahan <i class="fa  fa-hand-lizard-o" ></i></h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form action="<?php echo base_url(). 'modul_logistik/aksi_update_stok_bahan_mentah'; ?>" method="post" class="form-horizontal">
                    <div class="box-body">

            				<div class="form-group">
                              <label for="inputPassword3" class="col-sm-3 control-label">Bahan Olahan</label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="id_bahan_mentah">
                                 <?php
                      					 //$sql = "SELECT * FROM bahan_mentah join permintaan_bahan_detail on permintaan_bahan_detail.id_bahan_mentah=bahan_mentah.id";
                      					 $sql = "SELECT * FROM bahan_olahan";
                      					 $data2=$this->db->query($sql)->result();
                                            foreach($data2 as $u2){
                                            ?>
                                            <option value="<?=$u2->id; ?>"><?=$u2->nama_bahan; ?></option>
                                            <?php
                                            }
                                            ?>
                                 </select>
                              </div>
                      </div>


                    <div class="form-group">
                             <label for="inputEmail3" class="col-sm-3 control-label">Jumlah bahan</label>
                             <div class="col-sm-9">
                               <input type="text" name="jumlah_bahan" class="form-control" id="inputEmail3" >
                             </div>
                    </div>


                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-info pull-right">Simpan</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
                </div>
      		</div>

          <div class="col-md-6">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Bahan mentah</h3>
              </div>
                    <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
        				    <th>paket</th>
                    <th>jumlah pesan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
                    <!-- /.box-body -->
            </div>
                  <!-- /.box -->
          </div>
            <!-- /.box -->

            <div class="col-md-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Bahan olahan</h3>
                </div>
                      <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
          				    <th>paket</th>
                      <th>jumlah pesan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                      <!-- /.box-body -->
              </div>
                    <!-- /.box -->
            </div>
            <?php
            }
            ?>
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
  })
</script>


<script type="text/javascript">
  $(document).ready(function() {
      selesai();
  });

  function selesai() {
    setTimeout(function() {
      SelectDataPemesananMenu();
      SelectDataPemesananPaket();
      selesai();
    }, 700);
  }

  SelectDataPemesananMenu();
  function SelectDataPemesananMenu(){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'modul_produksi/data_pemesanan_menu' ?>',
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
                    '<td> '+ data[i].jumlahPesan +' </td>' +
                    '<td> '+'<a href="#myModalEdit" onclick="edit('+data[i].id+')" class="btn btn-success btn-xs" data-toggle="modal" > <i class="fa  fa-edit" ></i></a>'+
                    '</td>'
                +'<tr>';
        }
        $('#data_pesanan_menu').html(baris)
      }
    });
  }







  SelectDataPemesananPaket();
  function SelectDataPemesananPaket(){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'modul_produksi/data_pemesanan_paket' ?>',
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
                    '<td> '+ data[i].jumlahPesanPaket +' </td>' +
                    '<td> '+'<a href="#myModalEdit" onclick="edit('+data[i].id+')" class="btn btn-success btn-xs" data-toggle="modal" > <i class="fa  fa-edit" ></i></a>'+
                    '</td>'
                +'<tr>';
        }
        $('#data_pesanan_paket').html(baris)
      }
    });
  }



  function get_stok_bahan_mentah(id_bahan_mentah)[
    $.ajax({
              type  : 'POST',
              url   : '<?php echo base_url(). 'modul_produksi/get_stok_bahan_mentah'; ?>',
              data: {id_bahan_mentah:id_bahan_mentah} ,
              async : false,
              dataType : 'json',
              success : function(data){

                if(data.pesan=="gagal"){
                  alert(data.pesan);
                }else{
                  alert(data.pesan);
                }
                update_pemesanan(id_pesan);

              }

          });
  ]
</script>

</body>
</html>
