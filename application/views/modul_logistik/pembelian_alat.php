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
        Pembelian Peralatan

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
    <form action="<?php echo base_url(). 'modul_logistik/aksi_update_stok_alat'; ?>" method="post" class="form-horizontal">
	  <div class="row">



		<?php  $id_logistik=$this->session->userdata('id'); ?>
    <div class="col-md-4">
          <div class="box box-solid">

            <!-- /.box-header -->
            <div class="box-body">

                <div class="box-body">

                <div class="form-group">
                         <label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
                         <div class="col-sm-9">
                           <input type="text" name="tanggal" class="form-control" id="tanggal" value="<?php echo date('Y-m-d');?>">
                         </div>
                </div>
                <div class="form-group">
                         <label for="inputEmail3" class="col-sm-3 control-label">Logistik</label>
                         <div class="col-sm-9">
                           <input type="hidden" value="<?php echo $id_logistik;?>" name="id_logistik" id="id_logistik" class="form-control">
                           <input type="text"  value="<?php echo $this->session->userdata('nama');?>"  class="form-control"  disabled>
                         </div>
                </div>
                <div class="form-group">
                         <label for="inputEmail3" class="col-sm-3 control-label">Supplier</label>
                         <div class="col-sm-9">
                           <input type="text" name="nama_supplier" class="form-control" id="nama_supplier" >
                         </div>
                </div>


                </div>

                <!-- /.box-body -->

                <!-- /.box-footer -->
              </form>
            </div>
            <!-- /.box-body -->
    </div>
  </div>
    <div class="col-md-4">
          <div class="box box-solid">

            <!-- /.box-header -->
            <div class="box-body">

                <div class="box-body">

                <div class="form-group">
                         <label for="inputEmail3" class="col-sm-4 control-label">Nama Bahan</label>
                         <div class="col-sm-8">
                           <div class="input-group input-group-md">
                             <input type="hidden" name="id_alat" class="form-control" value="" id="id_alat" >
                              <input type="text" class="form-control" name="nama_bahan" value="" id="nama_bahan">
                                  <span class="input-group-btn">
                                    <button type="button" onclick="select_bahan();" class="btn btn-info btn-flat"><li class="fa fa-search"></li></button>
                                  </span>
                          </div>
                         </div>
                </div>
                <div class="form-group">
                         <label for="inputEmail3" class="col-sm-4 control-label">Harga Beli</label>
                         <div class="col-sm-8">
                           <input type="number" name="harga_beli" class="form-control" id="harga_beli" >
                         </div>
                </div>
                <div class="form-group">
                         <label for="inputEmail3" class="col-sm-4 control-label">Qty</label>
                         <div class="col-sm-8">
                           <input type="number" name="qty" class="form-control" id="qty" >
                         </div>
                </div>


                </div>

                <!-- /.box-body -->
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="button" onclick="add_cart();" class="btn btn-info pull-right">Add</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
          <!-- /.box -->
          <div class="col-md-4">
                <div class="box box-solid">

                  <!-- /.box-header -->
                  <div class="box-body">

                      <div class="box-body pull-right">

                        <?php
                          $no = 1;
                          $sql = "SELECT max(id) as no_transaksi FROM pembelian_alat where id_logistik='$id_logistik' and status='selesai'";
                          $data2=$this->db->query($sql)->row();
                          $no_transaksi=$data2->no_transaksi+1;
                        ?>
                        <input type="hidden" name="no_transaksi" value="<?php echo $no_transaksi;?>" class="form-control" id="no_transaksi" >
                        <span class="info-box-text">No Transaksi <?php echo $no_transaksi;?></span>
                        <span class="info-box-number" ><h1 id="total_pembelian2">Rp. 20000</h1></span>
                        <input type="hidden" name="total_pembelian" value="" class="form-control" id="total_pembelian" >
                      </div>

                      <!-- /.box-body -->

                      <!-- /.box-footer -->
                    </form>
                  </div>
                  <!-- /.box-body -->
          </div>
        </div>
		<div class="col-md-12"></div>


		<div class="col-md-12">

          <!-- /.box -->
		  <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">DAFTAR Peralatan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama Alat</th>
        				  <th>Satuan</th>

                  <th>Harga Beli</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th style="width: 40px">Aksi</th>
                </tr>
                </thead>

                <tbody id="data_bahan">


                  </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>


    <div class="col-md-12"></div>
    <div class="col-md-4">
          <div class="box box-solid">

            <!-- /.box-header -->
            <div class="box-body">

                <div class="box-body">

                <div class="form-group">
                         <label for="inputEmail3" class="col-sm-4 control-label">DIBAYAR</label>
                         <div class="col-sm-8">
                           <input type="number" name="dibayar" class="form-control" id="dibayar" >
                         </div>
                </div>



                </div>

                <!-- /.box-body -->

                <!-- /.box-footer -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-4">
          <div class="box box-solid">

            <!-- /.box-header -->
            <div class="box-body">

                <div class="box-body">

                <div class="form-group">
                         <label for="inputEmail3" class="col-sm-4 control-label">Note</label>
                         <div class="col-sm-8">
                           <textarea id="catatan" name="catatan" palceholder="catatan pembelian"></textarea>
                         </div>
                </div>



                </div>

                <!-- /.box-body -->

                <!-- /.box-footer -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-4">
          <div class="box box-solid">

            <!-- /.box-header -->
            <div class="box-body">

                <div class="box-body">

                <div class="form-group">

                         <div class="col-sm-8">

                             <button type="button" onclick="konfirmasi_pembelian();" class="btn btn-block btn-warning btn-lg">Konfirm Pembelian</button>

                         </div>
                </div>



                </div>

                <!-- /.box-body -->

                <!-- /.box-footer -->

            </div>
            <!-- /.box-body -->
          </div>
    </div>
		</div>
    </form>





    <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Select Bahan</h4>
              </div>
              <div class="modal-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama Bahan</th>
                      <th style="width: 40px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody >
                  <?php
                    $no = 1;

                    $sql = "SELECT * FROM peralatan";
                    $data=$this->db->query($sql)->result();
                    foreach($data as $u){
                  ?>

                  <tr>
                     <td><?php echo $no++ ?>.</td>
                    <td><?php echo $u->nama_peralatan; ?>
                    </td>
                    <td>
                    <a href="#" class="btn btn-primary btn-xs" onclick="add_bahan('<?php echo $u->id; ?>','<?php echo $u->nama_peralatan; ?>');"><i class="fa   fa-edit" ></i></a>

                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
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
    SelectDataBahan();
  })
  function select_bahan(){

       $('#modal-default').modal('show');
       //$('#id').val(id);
  }
  function add_bahan(id,nama_bahan){

       $('#modal-default').modal('hide');
       $('#id_alat').val(id);
       $('#nama_bahan').val(nama_bahan);
       //$('#id').val(id);


  }
  function SelectDataBahan(){
    var id_transaksi=$('#no_transaksi').val();
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'modul_logistik/data_alat/'?>',
      data:{id_transaksi:id_transaksi},
      dataType:'json',
      success: function(data){
        var no = 0;
        var baris = '';
        var total_pembelian=0;
        for(var i=0;i<data.length;i++){
          no++;
          baris +=
                '<tr>'+
                    '<td> '+ no +' </td>' +
                    '<td> '+ data[i].nama_peralatan +' </td>' +
                    '<td> '+ data[i].satuan_besar +' </td>' +
                    '<td> '+ data[i].harga_beli +' </td>' +
                    '<td> '+ data[i].jumlah +' </td>' +
                    '<td> '+ data[i].jumlah*data[i].harga_beli +' </td>' +
                    '<td> '+'<a href="#" onclick="hapus_cart('+data[i].id_detail_pembelian_alat+')" class="btn btn-success btn-xs" data-toggle="modal" > <i class="fa  fa-edit" ></i></a>'+
                    '</td>'
                +'<tr>';
          total_pembelian+=data[i].jumlah*data[i].harga_beli;
        }
        $('#total_pembelian').val(total_pembelian);
        $('#total_pembelian2').text('Rp. '+total_pembelian);
        $('#data_bahan').html(baris)
      }
    });
  }
  function add_cart(){
    var no_transaksi=$('#no_transaksi').val();
    var id_alat=$('#id_alat').val();
    var qty=$('#qty').val();
    var harga_beli=$('#harga_beli').val();
    alert(no_transaksi);
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'modul_logistik/add_cart_data_alat/'?>',
      data:{no_transaksi:no_transaksi,id_alat:id_alat,qty:qty,harga_beli:harga_beli},
      dataType:'html',
      success: function(data){
        alert(data);
        if(data=="TRUE"){
            SelectDataBahan();
            alert(data);
        }else{
          alert(data);
        }

      }
    });
  }
  function konfirmasi_pembelian(){
    var tanggal=$('#tanggal').val();
    var id_logistik=$('#id_logistik').val();
    var nama_supplier=$('#nama_supplier').val();
    var total_pembelian=$('#total_pembelian').val();
    var no_transaksi=$('#no_transaksi').val();
    var dibayar=$('#dibayar').val();
    var catatan=$('#catatan').val();
    alert(no_transaksi);
    $.ajax({
      type:'POST',
      url:'<?php echo base_url().'modul_logistik/konfirmasi_pembelian_alat/'?>',
      data:{no_transaksi:no_transaksi,id_logistik:id_logistik,tanggal:tanggal,nama_supplier:nama_supplier,total_pembelian:total_pembelian,nama_supplier:nama_supplier,dibayar:dibayar,catatan:catatan},
      dataType:'html',
      success: function(data){
        alert(data);
        if(data=="TRUE"){
            alert(data);
            window.location.href="<?php echo base_url(); ?>modul_logistik/pembelian_alat";

        }else{
          alert(data);
        }

      }
    });
  }
</script>
<script>
  $(function () {
    $('#example1').DataTable();
    $('#example2').DataTable();
  })


</script>
</body>
</html>
