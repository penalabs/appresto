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
       Logistik

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

       <!-- <a href="<?php echo base_url('modul_logistik/lihat_bahan_mentah?');?>id_permintaan=<?php echo $_GET['id_permintaan']; ?>" class="btn btn-primary btn"><i class="fa   fa-check" ></i> KEMBALI TAMBAH PERMINTAAN BAHAN OLAHAN</a><br> -->
       <br>
     </div>

     <?php
       if(isset($_GET['edit'])){

      ?>
      <?php
      $id=$_GET['id'];
      $id_permintaan=$_GET['id_permintaan'];
      //$sql = "SELECT * FROM bahan_mentah join permintaan_bahan_detail on permintaan_bahan_detail.id_bahan_mentah=bahan_mentah.id";
      $sql4 = "SELECT * FROM pengiriman_bahan_mentah where id='$id'";
      $data4=$this->db->query($sql4)->row();
      ?>
      <div class="col-md-4">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Update list Bahan Mentah<i class="fa  fa-hand-lizard-o" ></i></h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?php echo base_url(). 'modul_logistik/aksi_kirim_bahan_mentah'; ?>" method="post" class="form-horizontal">
                <div class="box-body">
                <input type="hidden" value="<?php echo $id; ?>"  name="id" class="form-control" id="inputEmail3" >
                <input type="hidden" value="<?php echo $id_permintaan; ?>"  name="id_permintaan" class="form-control" id="inputEmail3" >
                <input type="hidden" value="<?php echo $data4->jumlah_permintaan; ?>" name="jumlah_permintaan" class="form-control" id="inputEmail3" >
                <input type="hidden" value="<?php echo $data4->id_bahan_mentah; ?>" name="id_bahan_mentah" class="form-control" id="inputEmail3" >
                <!-- <div class="form-group">
                         <label for="inputEmail3" class="col-sm-4 control-label">Jumlah Permintaan</label>
                         <div class="col-sm-8">
                           <input type="text" value="<?php echo $data4->jumlah_permintaan; ?>" name="jumlah_permintaan" class="form-control" id="inputEmail3" >
                         </div>
                </div> -->

                <div class="form-group">
                         <label for="inputEmail3" class="col-sm-4 control-label">Jumlah Dikirim</label>
                         <div class="col-sm-8">
                           <input type="text" value="<?php echo $data4->jumlah_dikirim; ?>"  name="jumlah_dikirim" class="form-control" id="inputEmail3" >
                         </div>
                </div>



                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right">Update</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
  		</div>
      <?php
    }else{ ?>

      <?php
    } ?>
  	<div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">List Permintaan Bahan Mentah</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
    <button type="button" data-toggle="modal" data-target="#myModalTambahPemesanan" data-toggle="tooltip" title="Detail" class="btn btn-default pass_id"><i class="fa fa-plus"> Tambah</i></a></button>
    <br>
    <br>
    <?php
      foreach ($data_pemesanan as $data) {
    ?>

    <?php
      if($data->status == 'lunas'){
        $button_visibility_detail_pesan = "style='opacity: 0.65; pointer-events: none;'";
        $button_visibility_edit = "style='opacity: 0.65; pointer-events: none;'";
        $button_visibility_delete = "style='opacity: 0.65; pointer-events: none;'";
        $button_visibility_lunas = "style='opacity: 0.65; pointer-events: none;'";
      }else if($data->status == 'produksi'){
        $button_visibility_detail_pesan = "";
        $button_visibility_edit = "style='opacity: 0.65; pointer-events: none;'";
        $button_visibility_delete = "style='opacity: 0.65; pointer-events: none;'";
        $button_visibility_lunas = "";
      }else if($data->status == 'siapsaji'){
        $button_visibility_detail_pesan = "";
        $button_visibility_edit = "style='opacity: 0.65; pointer-events: none;'";
        $button_visibility_delete = "style='opacity: 0.65; pointer-events: none;'";
        $button_visibility_lunas = "";
      }else if($data->status == 'belum'){
        $button_visibility_detail_pesan = "";
        $button_visibility_edit = "";
        $button_visibility_delete = "";
        $button_visibility_lunas = "style='opacity: 0.65; pointer-events: none;'";
      }else{
        $button_visibility_detail_pesan = "style='opacity: 0.65; pointer-events: none;'";
        $button_visibility_edit = "style='opacity: 0.65; pointer-events: none;'";
        $button_visibility_delete = "style='opacity: 0.65; pointer-events: none;'";
        $button_visibility_lunas = "style='opacity: 0.65; pointer-events: none;'";
      }
    ?>

    <div class="panel panel-default">
      <div class="panel-body">

      	<table>

            <tr>
                <th>No pemesanan </th>
                <th>: </th>
                <th><?php echo $data->id?></th>
            </tr>

            <tr>
              	<th>Nama pemesan </th>
                <th>: </th>
                <th><?php echo $data->nama_pemesan?></th>
            </tr>
            <tr>
              	<th>No meja </th>
                <th>: </th>
                <th><?php echo $data->no_meja?></th>
            </tr>
            <tr>
              	<th>Keterangan tambahan </th>
                <th>: </th>
                <th><?php echo $data->keterangantambahan?></th>
            </tr>
            <tr>
              	<th>Status </th>
                <th>: </th>
                <th><?php echo $data->status?></th>
            </tr>

          </table>
          <a href="<?php echo base_url(). 'kasir/pemesanan_detail_pemesanan/'.$data->id;?>" class="btn btn-primary" <?php echo $button_visibility_detail_pesan; ?>><span class="fa fa-edit"></span> Detail Pesan</a>
          <a href="<?php echo base_url(). 'kasir/pemesanan_detail_pemesanan/'.$data->id;?>" class="btn btn-primary" <?php echo $button_visibility_edit; ?>><span class="fa fa-edit"></span> Edit</a>
          <a href="<?php echo base_url(). 'kasir/pemesanan_detail_pemesanan/'.$data->id;?>" class="btn btn-primary" <?php echo $button_visibility_delete; ?>><span class="fa fa-edit"></span> Delete</a>
          <a href="<?php echo base_url(). 'kasir/pemesanan_detail_pemesanan/'.$data->id;?>" class="btn btn-success" <?php echo $button_visibility_lunas; ?>><span class="fa fa-edit"></span> Lunas</a>
      </div>
    </div>
    <?php
      }
    ?>

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
      url:'<?php echo base_url().'modul_logistik/data_pemesanan_menu' ?>',
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
      url:'<?php echo base_url().'modul_logistik/data_pemesanan_paket' ?>',
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
              url   : '<?php echo base_url(). 'modul_logistik/get_stok_bahan_mentah'; ?>',
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

<div class="modal fade" id="myModalTambahPemesanan" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Permintaan Bahan</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url(). 'kasir/pemesanan_kasir_tambah'; ?>" method="post" role="form">
                  <div class="box-body">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">pemesan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" placeholder="nama">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">no meja</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="no_meja" id="no_meja" placeholder="no meja">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">keterangan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="keterangan">
                        </div>
                      </div>
                    </div>
                  </div>
              <!-- /.box-body -->
                <div class="box-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info pull-right">Tambah</button>
                </div>
              <!-- /.box-footer -->
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

</body>
</html>
