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

       <a href="<?php echo base_url('modul_produksi/lihat_bahan_olahan?');?>id_permintaan=<?php echo $_GET['id_permintaan']; ?>" class="btn btn-primary btn"><i class="fa   fa-check" ></i> KEMBALI TAMBAH PERMINTAAN BAHAN OLAHAN</a><br>
       <br>
     </div>

     <?php
       if(isset($_GET['edit'])){

      ?>
      <?php
      $id=$_GET['id'];
      $id_permintaan=$_GET['id_permintaan'];
      //$sql = "SELECT * FROM bahan_mentah join permintaan_bahan_detail on permintaan_bahan_detail.id_bahan_mentah=bahan_mentah.id";
      $sql4 = "SELECT * FROM pengiriman_bahan_olahan where id='$id'";
      $data4=$this->db->query($sql4)->row();
      ?>
      <div class="col-md-4">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Update list Bahan Olahan<i class="fa  fa-hand-lizard-o" ></i></h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?php echo base_url(). 'modul_produksi/aksi_kembalikan_bahan_olahan'; ?>" method="post" class="form-horizontal">
                <div class="box-body">
                <input type="hidden" value="<?php echo $id; ?>"  name="id" class="form-control" id="inputEmail3" >
                <input type="hidden" value="<?php echo $id_permintaan; ?>"  name="id_permintaan" class="form-control" id="inputEmail3" >
                <input type="hidden" value="<?php echo $_GET['id_bahan_olahan']; ?>"  name="id_bahan_olahan" class="form-control" id="inputEmail3" >

                <!-- <div class="form-group">
                         <label for="inputEmail3" class="col-sm-4 control-label">Jumlah Permintaan</label>
                         <div class="col-sm-8">
                           <input type="text" value="<?php echo $data4->jumlah_permintaan; ?>" name="jumlah_permintaan" class="form-control" id="inputEmail3" >
                         </div>
                </div> -->

                <div class="form-group">
                         <label for="inputEmail3" class="col-sm-4 control-label">Jumlah Dikembalikan</label>
                         <div class="col-sm-8">
                           <input type="text" value="<?php echo $data4->jumlah_dikembalikan; ?>"  name="jumlah_dikembalikan" class="form-control" id="inputEmail3" >
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
    }
    ?>
  	<div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">List Permintaan Bahan Olahan</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NAMA BAHAN</th>
                    <th>Tanggal Pengiriman</th>
  				          <th>Jumlah permintaan</th>
                    <th>Jumlah dikirm</th>
                    <th>Jumlah dikembalikan</th>
                    <th>Sesuai pengiriman ?</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
            					$no = 1;
            					foreach($data2 as $u){
            				?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$u->nama_bahan;?> </td>
                        <td><?=$u->tanggal_pengiriman;?></td>
                        <td><?=$u->jumlah_permintaan;?></td>
                        <td><?=$u->jumlah_dikirim;?></td>
                        <td><?=$u->jumlah_dikembalikan;?></td>
                        <td><?=$u->status;?></td>
                        <td>
                          <?php
                          if($u->jumlah_dikirim==$u->jumlah_dikembalikan || $u->jumlah_dikirim>$u->jumlah_dikembalikan){
                          ?>

                          <?php
                          }else{
                          ?>
                            <a href="<?php echo base_url('modul_produksi/lihat_bahan_olahan/?');?>id_bahan_olahan=<?php echo $u->id_bahan_olahan ?>&&edit=edit&&id_permintaan=<?=$_GET['id_permintaan'];?>&&id=<?php echo $u->id; ?>&&jumlah_dikirim=<?php echo $u->jumlah_dikirim; ?>&&jumlah_permintaan=<?php echo $u->jumlah_permintaan; ?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Return</a><br>
                          <?php
                          }
                          ?>

                          <?php
                          if($u->status_bahan!="diterima"){
                           ?>
                          <a href="<?php echo base_url('modul_produksi/terima_list_bahan_olahan/?');?>id=<?php echo $u->id ?>&&id_permintaan=<?=$_GET['id_permintaan'];?>&&id_bahan_olahan=<?=$u->id_bahan_olahan;?>&&jumlah_bahan_diterima=<?=$u->jumlah_dikirim;?>" class="btn btn-success btn-xs"><i class="fa   fa-close" ></i>Terima</a>
                          <a href="<?php echo base_url('modul_produksi/hapus_list_bahan_olahan/?');?>id=<?php echo $u->id ?>&&id_permintaan=<?=$_GET['id_permintaan'];?>" class="btn btn-danger btn-xs"><i class="fa   fa-close" ></i>Hapus</a>
                          <?php
                            }
                           ?>
                        </td>
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
