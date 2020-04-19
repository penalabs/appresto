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
      <h1>MANAGEMENT INVESTASI</h1>
    </section>
    <section class="content">
      <div class="row">

        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Pengajuan Buka Resto</h3>
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
                        <td><a href="javascript:;" class="btn btn-info btn-xs item_lihat" data="<?php echo $u->id ?>" data-id_bend="<?php echo $u->id_bendahara ?>" data-id_resto="<?php echo $u->id_resto ?>">Lihat</a>
                        <?php if($u->status=="pengerjaan"){ ?>
                          <a href="javascript:;" class="btn btn-primary btn-xs item_selesai" data="<?php echo $u->id ?>" data-id_bend="<?php echo $u->id_bendahara ?>"data-id_resto="<?php echo $u->id_resto ?>">Selesai</a>
                        <?php } ?> 
                        </td>
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
                      <td><a href="#;" class="btn btn-info btn-xs"><?php echo $modal ?></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Investasi Resto</h3>
              <a href="#" class="btn btn-success pull-right btn-xs" data-toggle="modal" data-target="#addBukaResto" ><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              <table id="laporanResto" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Resto</th>
                  <th>Pembelian</th>
                  <th>Tanggal Awal</th>
                  <th>Tanggal Akhir</th>
                  <th>Nominal</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="listHistoryResto">
                  <?php
                    $no = 1;
                    $modal='';
                    foreach($laporanResto as $u){
                  ?>
                    <tr>
                      <td><?php echo $u->nama_resto ?></td>
                      <td><?php echo $u->nama_investasi ?></td>
                      <td><?php echo $u->tanggal_mulai ?></td>
                      <td><?php echo $u->tanggal_selesai ?></td>
                      <td><?php echo $u->jumlah_pengeluaran ?></td>
                      <td class="pull-right"><a href="#;" class="btn btn-info btn-xs">Edit</a> &nbsp <a href="#;" class="btn btn-danger btn-xs">Hapus</a></td>
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
                          <div class="box-body">
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
              <form id="formAddLaporanResto" method="post" action="<?php echo base_url().'modul_bendahara/addLaporanResto'?>">
                <div class="modal-body">
                    <div class="form-group row text-center">
                      <div class="col-md-12">
                        <label>Pilih Resto</label>
                        <select class="form-control " name="resto" id="resto" required>
                          <option value="">== Pilih Resto ==</option>
                          <?php 
                            $this->db->select("resto.id AS id_resto, resto.nama_resto");
                            $this->db->from("resto");
                            $this->db->join("investasi_buka_resto","resto.id=investasi_buka_resto.id_resto");
                            $data=$this->db->get()->result();
                            foreach($data as $u){
                          ?>
                            <option value="<?php echo $u->id_resto ?>"><?php echo $u->nama_resto ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="col-lg-6" id="pengeluaran">
                        <label>Pengeluaran</label>
                        <input type="text" name="keluar" id="keluar" class="form-control text-uppercase text-center" readonly required>
                      </div>

                      <div class="col-md-6" id="dana">
                        <label>Dana</label>
                        <input type="text" name="sisa" id="sisa" class="form-control text-uppercase text-center" readonly required>
                      </div>

                      <div class="col-md-12">
                        <label>Jenis Pembelian</label>
                        <select class="form-control" id="jenis" name="jenis" required>
                          <option value="">Pilih Jenis Pembelian</option>
                          <option value="1">Habis Pakai</option>
                          <option value="2">Berjanga Waktu</option>
                        </select>
                      </div>

                      <div class="col-md-6 text-center" id="tgl_mulai">
                        <label>Tanggal Mulai</label>
                        <input type="text" name="tanggal_mulai" id="tanggal_mulai" class="form-control text-uppercase text-center" value="<?php echo date('Y-m-d') ?>" required>
                      </div>

                      <div class="col-md-6 text-center" id="tgl_akhir">
                        <label>Tanggal Akhir</label>
                        <input type="text" name="tanggl_akhir" id="tanggl_akhir" class="form-control text-uppercase text-center" value="<?php echo date('Y-m-d') ?>" required>
                      </div>

                      <div class="col-md-12 text-center">
                        <label>Nama Pembelian</label>
                        <input type="text" name="pembelian" id="pembelian" class="form-control text-uppercase text-center" required> 
                      </div>

                      <div class="col-md-12 text-center">
                        <label>Biaya</label>
                        <input type="text" name="biaya" id="biaya" class="form-control text-uppercase text-center" required>
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

      <div class="modal fade" id="selesaiBukaResto">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="title1"></h3>
              </div>
                <form method="post" action="<?php echo base_url().'modul_bendahara/selesaiResto'?>">
                  <div class="modal-body">
                    <div class="form-group row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <div class="col-md-4">
                              <label>Nama Bendahara</label><br>
                              <input type="text" name="nama_bend1" id="nama_bend1" readonly class="form-control text-uppercase" required>
                              <input type="hidden" name="id_ref" id="id_ref" readonly class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label>Status</label>
                                <input type="text" name="status1" id="status1" readonly class="form-control text-uppercase" required>
                            </div>

                            <div class="col-md-4">
                              <label>Perkiraan Dana</label>
                              <input type="text" name="perkiraan_dana1" id="perkiraan_dana1" readonly class="form-control text-uppercase text-center" required>
                            </div>
                          </div>

                          <div class="form-group row ">
                            <div class="col-md-12 text-center">
                              <label>Alamat</label>
                              <input type="text" name="alamat1" id="alamat1" readonly class="form-control text-uppercase text-center" required>
                            </div>
                          </div>

                          <div class="form-group row tanggal1">
                            <div class="col-md-12 text-center">
                              <label>Tanggal Disetujui</label>
                              <input type="text" name="tanggal1" id="tanggal1" readonly class="form-control text-uppercase text-center" required>
                            </div>
                          </div>

                          <div class="form-group row tgl_setujui1">
                            <div class="col-md-6">
                              <label>Tanggal Disetujui</label>
                              <input type="text" name="tanggal_setujui1" id="tanggal_setujui1" readonly class="form-control text-uppercase text-center" required>
                            </div>

                            <div class="col-md-6">
                              <label>Tanggal Dikerjakan</label>
                              <input type="text" name="tanggal_pengerjaan1" id="tanggal_pengerjaan1" readonly class="form-control text-uppercase text-center" required>
                            </div>
                          </div>

                          <div class="cal-md-12">
                              <div class="box box-info">
                                  <table id="tabelInvestasi1" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th class="text-center">Nama Owner</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Nominal</th>
                                      </tr>
                                    </thead>
                                    <tbody id="listTabelInvestasi1">
                                      <tr>
                                        <td class="text-center" colspan="3">Investor Belum Ada</td>
                                      </tr>
                                    </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                      
                      

                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-md-6 pull-left bg-info">
                            <h3 id="sisa_dana" >Rp. 000</h3>
                            <p>Sisa Dana</p>
                            <input type="hidden" name="nominaldana" id="nominaldana" readonly class="form-control text-center" required>
                          </div>
                          <div class="col-md-6 pull-right">
                            <br>
                            <button type="submit" class="btn btn-primary btn-lg pull-right item_klik_selesai">Selesaikan</button>
                          </div>
                        </div>
                        <div class="box box-info">
                          <table id="tabelInvestasi2" class="table table-bordered table-striped table-hover">
                            <thead>
                              <tr>
                                <th>Pembelian</th>
                                <th>Nominal</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody id="listTabelInvestasi2">
                            </tbody>
                           </table>
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

      <div class="modal fade" id="detailLaporan">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="detailTitle"></h3>
            </div>
            <div class="modal-body">
              <div class="form-group row">
                  <div class="col-md-6">
                    <label>Bendahara</label>
                    <input type="text" name="nama_bend2" id="nama_bend2" readonly class="form-control text-uppercase text-center">
                  </div>

                  <div class="col-md-6">
                    <label>Nominal</label>
                    <input type="text" name="nominal" id="nominal" readonly class="form-control text-uppercase text-center">
                  </div>

                  <div class="col-md-6">
                    <label>Tanggal Mulai</label>
                    <input type="text" name="awal" id="awal" readonly class="form-control text-uppercase text-center">
                  </div>

                  <div class="col-md-6">
                    <label>Tanggal Selesai</label>
                    <input type="text" name="akhir" id="akhir" readonly class="form-control text-uppercase text-center">
                  </div>
              </div>
            </div>
          </div>
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
    $('.sidebar-menu').tree();

    $('#bukaResto').DataTable({
      "pageLength": 5,
      "scrollY": "200px",
      "scrollCollapse": true,
    });
    $('#historyResto').DataTable({
      "pageLength": 5,
      "scrollY": "200px",
      "scrollCollapse": true,
    });

    $('#tabelInvestasi2').DataTable({
      "scrollY": "300px",
      'scrollCollapse': true,
      'paging'      : false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    });

    $('#laporanResto').DataTable();
    $('#tanggal_mulai').datepicker({
       format: 'yyyy-mm-dd'
    });
    $('#tanggl_akhir').datepicker({
       format: 'yyyy-mm-dd'
    });

    //Event Click
    $('#listBukaResto').on('click','.item_lihat',function(){
      var id=$(this).attr('data');
      var getIdBend =$(this).data('id_bend');
      var getIdResto =$(this).data('id_resto');
      //alert(id);
      //$('#showBukaResto').modal('show');
      $.ajax({
        url : "<?php echo site_url('modul_bendahara/getDataResto');?>",
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
        url : "<?php echo site_url('modul_bendahara/getTableResto');?>",
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

    $('#listBukaResto').on('click','.item_selesai',function(){
      var id=$(this).attr('data');
      var getIdBend =$(this).data('id_bend');
      var getIdResto =$(this).data('id_resto');
      
      //$('#showBukaResto').modal('show');
      $.ajax({
        url : "<?php echo site_url('modul_bendahara/getDataResto');?>",
        method : "GET",
        data : {id: id},
        async : true,
        dataType : 'json',
        success: function(data){
          var i;
            for(i=0; i<data.length; i++){
              //modal
              $('#selesaiBukaResto').modal('show');
              //Kondisi
              var status = data[i].status;
                if(status=="permintaan"){
                  $(".tanggal1").hide();
                  $(".tgl_setujui1").hide();
                  $(".tabel_investasi1").hide();
                }else if(status=="menunggu investor"){
                  $(".tanggal1").show();
                  $(".tgl_setujui1").hide();
                  $(".tabel_investasi1").show();
                }else{
                  $(".tanggal1").hide();
                  $(".tgl_setujui1").show();
                  $(".tabel_investasi1").show();
                } 
              //data
              document.getElementById("title1").innerHTML = data[i].nama_resto;
              //document.getElementById("nama_bend").innerHTML = data[i].nama;
              $("#nama_bend1").val(data[i].nama);
              $("#id_ref").val(data[i].id);
              //$("#nama_resto").val(data[i].nama_resto);
              $("#alamat1").val(data[i].alamat);
              $("#perkiraan_dana1").val(formatRupiah(data[i].perkiraan_dana,''));
              $("#status1").val(data[i].status);
              $("#tanggal1").val(data[i].tanggal_setujui);
              $("#tanggal_setujui1").val(data[i].tanggal_setujui);
              $("#tanggal_pengerjaan1").val(data[i].tanggal_pengerjaan);
              
            }
          }
      });

      $.ajax({
        url : "<?php echo site_url('modul_bendahara/getTableResto');?>",
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
            

          $('#listTabelInvestasi1').html(output);
          
        }
      });
      
      $.ajax({
          url : "<?php echo site_url('modul_bendahara/danaResto');?>",
          method : "POST",
          data : {id: getIdResto},
          async : true,
          dataType : 'json',
          success: function(data){
            //alert(data);
            var i;
            for(i=0; i<data.length; i++){
              var dana=data[i].sisa;
              if(dana!= null){
                document.getElementById("sisa_dana").innerHTML = formatRupiah(data[i].sisa, 'Rp.') ;
                $("#nominaldana").val(data[i].sisa);
              }else{
                document.getElementById("sisa_dana").innerHTML = formatRupiah(data[i].dana, 'Rp.') ;
                $("#nominaldana").val(data[i].dana);
              }
              
            }
          }
        });
      $.ajax({
        url : "<?php echo site_url('modul_bendahara/getTableLaporanResto');?>",
        method : "POST",
        data : {getIdResto: getIdResto},
        async : true,
        dataType : 'json',
        success: function(data){
          //alert(data);
          var output='';
          var i;
            if(data.length>0){
              for(i=0; i<data.length; i++){
              output += '<tr>'+
              '<td>'+data[i].nama_investasi+'</td>'+
              '<td>'+data[i].jumlah_pengeluaran+'</td>'+
              '<td><a href="javascript:;" class="btn btn-info btn-xs item_laporan"'+
              'data="'+data[i].id+'" '+
              'data-nama_peng="'+data[i].nama_investasi+'" '+
              'data-nama_bend="'+data[i].nama+'" '+
              'data-nominal="'+data[i].jumlah_pengeluaran+'" '+
              'data-awal="'+data[i].tanggal_mulai+'" '+
              'data-akhir="'+data[i].tanggal_selesai+'">Detail</a></td>'+
              '</tr>';
              }
            }else{
              output+= '<tr><td class="text-center" colspan="3">Investor Belum Ada</td></tr>';
            }
            

          $('#listTabelInvestasi2').html(output);
          
        }
      }); return true;
       
      //getTableLaporanResto();
      //alert(id);
    });

    $('#listTabelInvestasi2').on('click','.item_laporan',function(){
      var id = $(this).attr('data');
      $('#detailLaporan').modal('show');
      //$('#detailTitle').val($(this).data('nama_peng'));
      document.getElementById("detailTitle").innerHTML = $(this).data('nama_peng');
      $("#nama_bend2").val($(this).data('nama_bend'));
      $("#nominal").val($(this).data('nominal'));
      $("#awal").val($(this).data('awal'));
      $("#akhir").val($(this).data('akhir'));
    });

    $('.item_klik_selesai').click(function(){
      //alert("Hallow");
      //fungsi
    });

   //Onchange
    $('#tgl_mulai').hide();
    $('#tgl_akhir').hide();
    $('#dana').hide();
    $('#pengeluaran').hide();
    $('#jenis').change(function(){ 
      var id=$(this).val();
      //alert(id);
      if(id=="2"){
        $('#tgl_mulai').show();
        $('#tgl_akhir').show();
      }else{
        $('#tgl_mulai').hide();
        $('#tgl_akhir').hide();
      }
    });

    $('#resto').change(function(){ 
      var id=$(this).val();
      //alert(id);
      if(id==""){
        $('#dana').hide();
        $('#pengeluaran').hide();
      }else{
        // $('#dana').show();
        // $('#pengeluaran').show();
        $.ajax({
          url : "<?php echo site_url('modul_bendahara/danaResto');?>",
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(data){
            //alert(data);
            var i;
            for(i=0; i<data.length; i++){
              $('#dana').show();
              $('#pengeluaran').show();
              if(data[i].sisa != null || data[i].pengeluaran != null){
                $("#sisa").val(formatRupiah(data[i].sisa, 'Rp.'));
                $("#keluar").val(formatRupiah(data[i].pengeluaran, 'Rp.'));
              }else{
                $("#sisa").val(formatRupiah('0', 'Rp.'));
                $("#keluar").val(formatRupiah('0', 'Rp.'));
              }
              
              
            }
          }
        });
      }
      return false;
    });

  });




  /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split  = number_string.split(","),
        sisa   = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
     
      if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
      }
     
      rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
    }

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
