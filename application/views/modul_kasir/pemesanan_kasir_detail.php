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
       kasir

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
  	<div class="row">
      <div class="col-md-12">

        <!-- <div class="alert alert-success alert-dismissible">

               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h4><i class="icon fa fa-check"></i> Alert!</h4>
               <?php echo $user_data = $this->session->userdata('pesan'); ?>
       </div> -->

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
                <h3 class="box-title"></h3>
                <a href="<?php echo base_url(). 'kasir/pemesanan_kasir';?>" class="btn btn-primary"><span class="fa fa-edit"></span> kembali</a>
                <a href="<?php echo base_url(). 'kasir/pemesanan_kasir_final/'.$tampil_id_pemesanan;?>" class="btn btn-success"><span class="fa fa-edit"></span> pesan</a>
                <br>
                <br>
                <div class="row">
                  <div class="col-xs-9">
                      <div class="panel panel-default">
                          <div class="panel-body">
                            <?php foreach ($data_pemesanan as $data) {
                            ?>
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

                              </table>
                              <?php
                              }
                              ?>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-3 pull-right">
                      <div class="panel panel-default">
                          <div class="panel-body">
                              <div style='font-size: 28px;'>Total Harga :
                                <br>
                                Rp.<?php  echo number_format($total_subharga_paket+$total_subharga_menu,2,",","."); ?>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>

              </div>
              <!-- /.box-header -->
              <div class="box-body">

    <div class="row">
        <section class="col-md-6">
            <ul class="nav nav-tabs flex-nowrap" role="tablist">
                <li role="presentation" class="nav-item active">
                    <a href="#step1" class="nav-link " data-toggle="tab" aria-controls="step1" role="tab" title="Step 1"> pemesanan menu </a>
                </li>
            </ul>
                <div class="tab-content py-2">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                      <br>
                      <button type="button" data-toggle="modal" data-target="#myModalTambahDetailPemesananMenu" data-toggle="tooltip" title="Detail" class="btn btn-default pass_id"><i class="fa fa-plus"> Tambah</i></a></button>
                      <br>
                      <br>
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>nama menu</th>
                          <th>jumlah pesanan</th>
        				          <th>harga satuan</th>
                          <th>subharga</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                  					$no = 1;
                  					foreach($data_pemesanan_menu as $data){
                  				?>
                          <tr>
                              <td><?=$no;?></td>
                              <td><?=$data->menu;?> </td>
                              <td><?=$data->jumlah_pesan;?></td>
                              <td><?=number_format($data->subharga,2,",",".");?></td>
                              <td><?=number_format($data->jumlah_pesan * $data->subharga,2,",",".");?></td>
                              <td>

                                <!-- <a href="<?php echo base_url('modul_logistik/lihat_bahan_mentah/?');?>id_bahan_mentah=<?php echo $u->id_bahan_mentah ?>&&edit=edit&&id_permintaan=<?=$_GET['id_permintaan'];?>&&id=<?php echo $u->id; ?>&&jumlah_dikirim=<?php echo $u->jumlah_dikirim; ?>&&jumlah_permintaan=<?php echo $u->jumlah_permintaan; ?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Input Jumlah Kirim</a><br>
                                <!-- <a href="<?php echo base_url('modul_logistik/hapus_list_bahan_mentah/?');?>id=<?php echo $u->id ?>&&id_permintaan=<?=$_GET['id_permintaan'];?>" class="btn btn-danger btn-xs"><i class="fa   fa-close" ></i>Hapus</a> -->

                              </td>
                          </tr>
                          <?php
                            $no++;
                            }
                          ?>
                          <tr>
                            <td colspan="4"></td>
                            <td><?php echo number_format($total_subharga_menu,2,",",".") ?></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>

                </div>
        </section>




        <section class="col-md-6">
            <ul class="nav nav-tabs flex-nowrap" role="tablist">
                <li role="presentation" class="nav-item active" >
                    <a href="#step4" class="nav-link " data-toggle="tab" aria-controls="step4" role="tab" title="Step 4"> pemesanan paket </a>
                </li>
            </ul>
                <div class="tab-content py-2">

                    <div class="tab-pane active" role="tabpanel" id="step4">
                      <br>
                      <button type="button" data-toggle="modal" data-target="#myModalTambahDetailPemesananPaket" data-toggle="tooltip" title="Detail" class="btn btn-default pass_id"><i class="fa fa-plus"> Tambah</i></a></button>
                      <br>
                      <br>
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>nama paket</th>
                          <th>jumlah pesanan</th>
        				          <th>harga satuan</th>
                          <th>subharga</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                  					$no = 1;
                  					foreach($data_pemesanan_paket as $data){
                  				?>
                          <tr>
                              <td><?=$no;?></td>
                              <td><?=$data->nama_paket;?> </td>
                              <td><?=$data->jumlah_pesan;?></td>
                              <td><?=number_format($data->subharga,2,",",".");?></td>
                              <td><?=number_format($data->jumlah_pesan  * $data->subharga,2,",",".");?></td>
                              <td>

                                <!-- <a href="<?php echo base_url('modul_logistik/lihat_bahan_mentah/?');?>id_bahan_mentah=<?php echo $u->id_bahan_mentah ?>&&edit=edit&&id_permintaan=<?=$_GET['id_permintaan'];?>&&id=<?php echo $u->id; ?>&&jumlah_dikirim=<?php echo $u->jumlah_dikirim; ?>&&jumlah_permintaan=<?php echo $u->jumlah_permintaan; ?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Input Jumlah Kirim</a><br>
                                <!-- <a href="<?php echo base_url('modul_logistik/hapus_list_bahan_mentah/?');?>id=<?php echo $u->id ?>&&id_permintaan=<?=$_GET['id_permintaan'];?>" class="btn btn-danger btn-xs"><i class="fa   fa-close" ></i>Hapus</a> -->

                              </td>
                          </tr>
                          <?php
                            $no++;
                            }
                          ?>

                          <tr>
                            <td colspan="4"></td>
                            <td><?php echo number_format($total_subharga_paket,2,",",".");  ?></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>

                </div>
        </section>
    </div>


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


<div class="modal fade" id="myModalTambahDetailPemesananMenu" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Permintaan Bahan</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url(). 'kasir/pemesanan_kasir_menu_tambah'; ?>" method="post" role="form">
                  <div class="box-body">
                    <div class="box-body">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="id_pemesanan" id="id_pemesanan" value="<?php echo $tampil_id_pemesanan ?>">
                        <label for="inputPassword3" class="col-sm-2 control-label">menu</label>
                        <div class="col-sm-6">
                          <select class="form-control select2" name="menu" id="menu" style="width: 100%;">
                            <option value="">menu</option>
                            <?php
                            foreach ($data_menu as $data) {
                            ?>
                            <option value="<?php echo $data->id ?>"><?php echo $data->menu ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="harga_per_menu" id="harga_per_menu" placeholder="no meja">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">jumlah pesan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="jumlah_pesan_menu" id="jumlah_pesan_menu" onkeyup="perkalian_menu()" placeholder="no meja">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">subharga</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="sub_harga_menu" id="sub_harga_menu" placeholder="keterangan">
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

        <div class="modal fade" id="myModalTambahDetailPemesananPaket" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Permintaan Bahan</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" action="<?php echo base_url(). 'kasir/pemesanan_kasir_paket_tambah'; ?>" method="post" role="form">
                          <div class="box-body">
                            <div class="box-body">
                              <input type="hidden" class="form-control" name="id_pemesanan" id="id_pemesanan" value="<?php echo $tampil_id_pemesanan ?>">
                              <div class="form-group">
                                  <label for="inputPassword3" class="col-sm-2 control-label">paket</label>
                                <div class="col-sm-6">
                                  <select class="form-control select2" name="paket" id="paket" style="width: 100%;">
                                    <option value="">paket</option>
                                    <?php
                                    foreach ($data_paket as $data) {
                                    ?>
                                    <option value="<?php echo $data->id ?>"><?php echo $data->nama_paket ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="harga_per_paket" id="harga_per_paket" placeholder="no meja">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">jumlah pesan</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="jumlah_pesan_paket" id="jumlah_pesan_paket" onkeyup="perkalian_paket()" placeholder="no meja">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">subharga</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="sub_harga_paket" id="sub_harga_paket" placeholder="keterangan">
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


      <script type="text/javascript">
        $(document).ready(function(){

            $('#menu').change(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('kasir/ambil_data_harga_per_menu');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){

                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            // html += '<option value='+data[i].subcategory_id+'>'+data[i].subcategory_name+'</option>';
                            // alert(data[i].harga);
                            document.getElementById("harga_per_menu").value = data[i].harga;
                        }
                        // $('#sub_category').html(html);
                        // print_r($data);

                    }
                });
                return false;
            });

        });
    </script>

    <!-- <script type="text/javascript">
      $(document).ready(function(){

          $('#jumlah_pesan').change(function(){
              var harga_per_menu = document.getElementById('harga_per_menu').value;
              var jumlah_pesan = document.getElementById('jumlah_pesan').value;
              var perkalian = harga_per_menu*jumlah_pesan;
              // alert(perkalian);
              document.getElementById('sub_harga').value = perkalian;
          });

      });
  </script> -->

  <script type="text/javascript">
    function perkalian_menu() {

            var harga_per_menu = document.getElementById('harga_per_menu').value;
            var jumlah_pesan_menu = document.getElementById('jumlah_pesan_menu').value;
            var perkalian_menu = harga_per_menu*jumlah_pesan_menu;
            // alert(perkalian);
            document.getElementById('sub_harga_menu').value = perkalian_menu;

    };
</script>


<script type="text/javascript">
  $(document).ready(function(){

      $('#paket').change(function(){
          var id=$(this).val();
          $.ajax({
              url : "<?php echo site_url('kasir/ambil_data_harga_per_paket');?>",
              method : "POST",
              data : {id: id},
              async : true,
              dataType : 'json',
              success: function(data){

                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){
                      // html += '<option value='+data[i].subcategory_id+'>'+data[i].subcategory_name+'</option>';
                      // alert(data[i].harga);
                      document.getElementById("harga_per_paket").value = data[i].harga;
                  }
                  // $('#sub_category').html(html);
                  // print_r($data);

              }
          });
          return false;
      });

  });
</script>

<script type="text/javascript">
  function perkalian_paket() {

          var harga_per_paket = document.getElementById('harga_per_paket').value;
          var jumlah_pesan_paket = document.getElementById('jumlah_pesan_paket').value;
          var perkalian_paket = harga_per_paket*jumlah_pesan_paket;
          // alert(perkalian);
          document.getElementById('sub_harga_paket').value = perkalian_paket;

  };
</script>

</body>
</html>
