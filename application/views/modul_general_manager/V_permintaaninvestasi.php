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
       Investasi Kanwil
      </h1>

    </section>

     <section class="content">
  <div class="row">
      <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <a href="<?php echo base_url('modul_general_manager/permintaaninvestasi_tambah'); ?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Entry</a>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>

                  <th>Tanggal</th>
                  <th>Nominal investasi</th>
                  <th>Penyusutan</th>
                  <th>Nominal investasi kembali</th>
                  <th>Status</th>
                  <!-- <th>Nominal</th>
                  <th>Penyusutan %</th> -->
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach($permintaaninvestasi as $u){
                  ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>

                  <td><?php echo $u->tanggal ?></td>
                  <td><?php echo $u->nominal_investasi ?></td>
                  <td><?php echo $u->penyusutan ?></td>
                  <td><?php echo $u->nominal_saldo ?></td>
                  <td><?php echo $u->status ?></td>

                  <td>

                    <!-- <a href="<?php echo base_url('C_modul_admin_resto/konfirmasi_alat/'.$u->id); ?>" class="btn btn-primary btn-xs"><i class="fa  fa-check" ></i></a> -->
                    <a href="<?php echo base_url('modul_general_manager/permintaaninvestasi_edit/?id='.$u->id); ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a>

                    <a onclick="return confirm('apakah anda yakin ingin menghapus ?');" href="<?php echo base_url('modul_general_manager/permintaaninvestasi_hapus/?id='.$u->id); ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a></td>

                          </tr>
                  <?php } ?>

                </tbody>

              </table>
            </div>
          </div>
      </div>

      <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pengajuan Buka Resto</h3>
              <a href="#" class="btn btn-success pull-right btn-xs" data-toggle="modal" data-target="#addBukaResto" ><i class="fa fa-plus-square-o"></i> Pengajuan</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <!-- <div class="input-group">
                   <span class="input-group-addon">Search</span>
                   <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
                </div><br> -->
                <!-- <div id="result">
                </div> -->


              <table id="bukaResto" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Resto</th>
                  <th>Perkiraan Dana</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="listBukaResto">
                  <?php
                    $no = 1;
                    foreach($bukaResto as $u){
                  ?>
                    <tr>
                      <td><?php echo $u->nama_resto ?></td>
                      <td><?php echo $u->perkiraan_dana ?></td>
                      <td><?php echo $u->status ?></td>
                      <td><a href="javascript:;" class="btn btn-info btn-xs item_lihat" data="<?php echo $u->id ?>" data-id_bend="<?php echo $u->id_bendahara ?>" data-id_resto="<?php echo $u->id_resto ?>">Lihat</a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>

      <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">History Investasi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <!-- <div class="input-group">
                   <span class="input-group-addon">Search</span>
                   <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
                </div><br> -->
                <!-- <div id="result">
                </div> -->


              <table id="historyResto" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Owner</th>
                  <th>Nama Resto</th>
                  <th>Tanggal</th>
                  <th>Nominal</th>
                  <th>Ket</th>
                </tr>
                </thead>
                <tbody id="listHistoryResto">
                  <?php
                    $no = 1;
                    $modal='';
                    foreach($historyResto as $u){
                    $m=$u->keterangan;
                    if($m=="Modal Awal"){
                      $modal="MA";
                    }else{
                      $modal="MT";
                    }
                  ?>
                    <tr>
                      <td><?php echo $u->nama ?></td>
                      <td><?php echo $u->nama_resto ?></td>
                      <td><?php echo $u->tanggal ?></td>
                      <td><?php echo $u->jumlah_investasi ?></td>
                      <td><?php echo $modal ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>

  </div>

  <div class="modal fade" id="showBukaResto">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="title"></h3>
              </div>
                <div class="modal-body">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label>Nama Bendahara</label><br>
                        <input type="text" name="nama_bend" id="nama_bend" readonly class="form-control text-uppercase" required>
                      </div>

                      <div class="col-md-4">
                          <label>Status</label>
                          <input type="text" name="status" id="status" readonly class="form-control text-uppercase" required>
                      </div>

                      <div class="col-md-4">
                        <label>Perkiraan Dana</label>
                        <input type="text" name="perkiraan_dana" id="perkiraan_dana" readonly class="form-control text-uppercase" required>
                      </div>
                    </div>

                    <div class="form-group row ">
                      <div class="col-md-12 text-center">
                        <label>Alamat</label>
                        <input type="text" name="alamat" id="alamat" readonly class="form-control text-uppercase text-center" required>
                      </div>
                    </div>

                    <div class="form-group row tanggal">
                      <div class="col-md-12 text-center">
                        <label>Tanggal Disetujui</label>
                        <input type="text" name="tanggal" id="tanggal" readonly class="form-control text-uppercase text-center" required>
                      </div>
                    </div>

                    <div class="form-group row tgl_setujui">
                      <div class="col-md-6">
                        <label>Tanggal Disetujui</label>
                        <input type="text" name="tanggal_setujui" id="tanggal_setujui" readonly class="form-control text-uppercase text-center" required>
                      </div>

                      <div class="col-md-6">
                        <label>Tanggal Dikerjakan</label>
                        <input type="text" name="tanggal_pengerjaan" id="tanggal_pengerjaan" readonly class="form-control text-uppercase text-center" required>
                      </div>
                    </div>

                    <div class="tabel_investasi">
                      <div class="cal-md-12">
                        <div class="box box-info">
                            <table id="tabelInvestasi" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th class="text-center">Nama Owner</th>
                                  <th class="text-center">Tanggal</th>
                                  <th class="text-center">Nominal</th>
                                </tr>
                              </thead>
                              <tbody id="listTabelInvestasi">
                                <tr>
                                  <td class="text-center" colspan="3">Investor Belum Ada</td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                      </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <div class="col-md-12">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="addBukaResto">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Pengajuan Buka Resto</h4>
              </div>
              <form id="formAddBukaResto" method="post" action="<?php echo base_url().'modul_general_manager/addBukaResto'?>">
                <div class="modal-body">
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label>Nama Resto</label>
                        <input type="text" name="nama_resto" id="nama_resto" class="form-control text-uppercase" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label>Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control text-uppercase" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label>Perkiraan Dana</label>
                        <input type="text" name="perkiraan_dana" id="perkiraan_dana" class="form-control text-uppercase" required>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <div class="col-md-12">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
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

    //alert("Hallo");

    $('.sidebar-menu').tree();

    $('#bukaResto').DataTable();
    $('#historyResto').DataTable();

    $('#listBukaResto').on('click','.item_lihat',function(){
      var id=$(this).attr('data');
      var getIdBend =$(this).data('id_bend');
      var getIdResto =$(this).data('id_resto');
      //alert(id);
      //$('#showBukaResto').modal('show');
      $.ajax({
        url : "<?php echo site_url('modul_general_manager/getDataResto');?>",
        method : "GET",
        data : {id: id},
        async : true,
        dataType : 'json',
        success: function(data){
          var i;
            for(i=0; i<data.length; i++){
              //modal
              $('#showBukaResto').modal('show');
              //Kondisi
              var status = data[i].status;
                if(status=="permintaan"){
                  $(".tanggal").hide();
                  $(".tgl_setujui").hide();
                  $(".tabel_investasi").hide();
                }else if(status=="menunggu investor"){
                  $(".tanggal").show();
                  $(".tgl_setujui").hide();
                  $(".tabel_investasi").show();
                }else{
                  $(".tanggal").hide();
                  $(".tgl_setujui").show();
                  $(".tabel_investasi").show();
                } 
              //data
              document.getElementById("title").innerHTML = data[i].nama_resto;
              //document.getElementById("nama_bend").innerHTML = data[i].nama;
              $("#nama_bend").val(data[i].nama);
              //$("#nama_resto").val(data[i].nama_resto);
              $("#alamat").val(data[i].alamat);
              $("#perkiraan_dana").val(data[i].perkiraan_dana);
              $("#status").val(data[i].status);
              $("#tanggal").val(data[i].tanggal_setujui);
              $("#tanggal_setujui").val(data[i].tanggal_setujui);
              $("#tanggal_pengerjaan").val(data[i].tanggal_pengerjaan);
              
            }
          }
      });

      $.ajax({
        url : "<?php echo site_url('modul_general_manager/getTableResto');?>",
        method : "POST",
        data : {getIdBend: getIdBend, getIdResto: getIdResto},
        async : true,
        dataType : 'json',
        success: function(data){
          //alert(data);
          var output='';
          var i;
            if(data.length>0){
              for(i=0; i<data.length; i++){
              output += '<tr><td>'+data[i].nama+'</td><td>'+data[i].tanggal+'</td><td>'+data[i].jumlah_investasi+'</td></tr>';
              }
            }else{
              output+= '<tr><td class="text-center" colspan="3">Investor Belum Ada</td></tr>';
            }
            

          $('#listTabelInvestasi').html(output);
          
        }
      });

          return false;

    });

    
  });
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
