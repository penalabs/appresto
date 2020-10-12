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
        <h1>Kasir</h1>
      </section>

      <!-- Main content -->
      <section class="content">
       <div class="row">
         <div class="col-xs-3">
           <div class="box box-solid">
             <!-- /.box-header -->
             <div class="box-body">
               <div class="form-group">
                  <label>Pilih meja</label>
                  <select id="no_meja" class="form-control" onchange="clearDatapemesanan();loadDatamenu(this);loadDatapaket(this);loadDatapemesan(this);">
                    <?php
                      $data=$this->db->query("SELECT * FROM meja")->result();
                      foreach ($data as $meja) {
                     ?>
                        <option value="<?= $meja->nomor;?>"><?= $meja->nomor;?></option>
                    <?php
                      }
                     ?>
                  </select>
                </div>
             </div>
           </div>
         </div>
         <div class="col-xs-3">
           <div class="box box-solid">
             <!-- /.box-header -->
             <div class="box-body">
               <div class="form-group">
                  <h4>Nama Pemesan : <input type="text" value="" class="form-control" id="nama_pemesan" readonly></h4>
                </div>
             </div>
           </div>
         </div>
         <div class="col-xs-3">
           <div class="box box-solid">
             <!-- /.box-header -->
             <div class="box-body">
               <div class="form-group">
                  <h4>No Pemesanan : <input type="text" value="" class="form-control" id="id_pemesanan" readonly></h4>
                </div>
             </div>
           </div>
         </div>
         <div class="col-xs-3">
           <div class="box box-solid">
             <!-- /.box-header -->
             <div class="box-body">
               <div class="form-group">
                  <h4>Tanggal jam : <input type="text" value="<?= date('Y-m-d H:i:s'); ?>" class="form-control" id="tanggaljam" readonly></h4>
                </div>
             </div>
           </div>
         </div>

         <div class="col-xs-12">
           <div class="box box-solid">
             <div class="box-header with-border">
               <h3 class="box-title">Detail Pemesanan</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
               <table id="tabel_detail_pesan" class="table table-bordered table-hover">
                 <thead>
                 <tr>
                   <th>#</th>
                   <th>Nama Menu / Paket</th>
                   <th>Qty</th>
                   <th>Harga</th>
                   <th>Sub Harga</th>
                   <th>Aksi</th>
                 </tr>
                 </thead>
                 <tbody>

                 </tbody>
               </table>
             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->
        </div>
        <div class="col-xs-4">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Diskon</label>

                <div class="col-sm-6">
                  <input type="text" value="0" name="diskon_rupiah" class="form-control" placeholder="Diskon Rp.">
                </div>
                <div class="col-sm-4">
                  <input type="text" value="0" name="diskon_persen" class="form-control" placeholder="Diskon %">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Pajak</label>
                <div class="col-sm-6">
                  <input type="text" value="0" name="pajak_rupiah" class="form-control" placeholder="Pajak Rp.">
                </div>
                <div class="col-sm-4">
                  <input type="text" value="0" name="pajak_persen" class="form-control" placeholder="Pajak %">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Bayar</label>

                <div class="col-sm-10">
                  <input type="text" name="bayar" value="0" class="form-control" placeholder="Bayar">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" value="0" class="col-sm-2 control-label">Kembali</label>

                <div class="col-sm-10">
                  <input type="text" name="kembali" class="form-control" placeholder="Kembali" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body">

              <div class="form-group">
                  <button type="button" onclick="aksi_pembayaran()" class="btn btn-block btn-success btn-lg">BAYAR</button>
              </div>

            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                 <h2 id="total_harga">Total Item Rp. 0</h2>
                 <input type="hidden" value="0" class="form-control" id="total_harga_value" readonly>
                 <h4 id="diskon">Diskon Rp. 0</h4>
                 <input type="hidden" value="0" class="form-control" id="total_diskon_value" readonly>
                 <h4 id="pajak">Pajak Rp. 0</h4>
                 <input type="hidden" value="0" class="form-control" id="total_pajak_value" readonly>
                 <h4 id="total_pembayaran">Total Bayar Rp. 0</h4>
                 <input type="hidden" value="0" class="form-control" id="total_pembayaran_value" readonly>
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
  // $(function () {
  //   $('#tabel_detail_pesan').DataTable({
  //     'paging'      : true,
  //     'lengthChange': false,
  //     'searching'   : true,
  //     'ordering'    : true,
  //     'info'        : true,
  //     'autoWidth'   : true
  //   })
  // })
  $(document).ready(function(){

    $('input[name=bayar]').keyup(function() {
        var total_harga_value=$("#total_harga_value").val();
        var bayar=$(this).val();
        var diskon_rupiah=$('#total_diskon_value').val();
        var pajak_rupiah=$('#total_pajak_value').val();
        // alert(diskon_rupiah);
        // alert(pajak_rupiah);
        var kembali=parseInt(bayar)-(parseInt(total_harga_value)-parseInt(diskon_rupiah)+parseInt(pajak_rupiah));
        // alert(kembali);
        $('input[name=kembali]').val(kembali);


        var total_pajak_value=$('#total_pajak_value').val();
        var total_diskon_value=$('#total_diskon_value').val();
        var total_pembayaran=parseInt(total_harga_value)+parseInt(total_pajak_value)-parseInt(total_diskon_value);
        $('#total_pembayaran_value').val(total_pembayaran);
        $("#total_pembayaran").html('Total Bayar Rp. '+total_pembayaran);
    });

     $('input[name=diskon_persen]').keyup(function() {
         var total_harga_value=$("#total_harga_value").val();
         var diskon_persen=$(this).val();
         var diskon_rupiah=total_harga_value*diskon_persen/100;
         // alert(kembali);
         $('#total_diskon_value').val(diskon_rupiah);
         $("#diskon").html('Diskon Rp. '+diskon_rupiah);
         $('input[name=diskon_rupiah]').val(diskon_rupiah);

         var total_pajak_value=$('#total_pajak_value').val();
         var total_diskon_value=$('#total_diskon_value').val();
         var total_pembayaran=parseInt(total_harga_value)+parseInt(total_pajak_value)-parseInt(total_diskon_value);
         $('#total_pembayaran_value').val(total_pembayaran);
         $("#total_pembayaran").html('Total Bayar Rp. '+total_pembayaran);
     });

     $('input[name=pajak_persen]').keyup(function() {
         var total_harga_value=$("#total_harga_value").val();
         var pajak_persen=$(this).val();
         var pajak_rupiah=total_harga_value*pajak_persen/100;
         // alert(kembali);
         $('#total_pajak_value').val(pajak_rupiah);
         $("#pajak").html('Pajak Rp. '+pajak_rupiah);
         $('input[name=pajak_rupiah]').val(pajak_rupiah);

         var total_pajak_value=$('#total_pajak_value').val();
         var total_diskon_value=$('#total_diskon_value').val();
         var total_pembayaran=parseInt(total_harga_value)+parseInt(total_pajak_value)-parseInt(total_diskon_value);
         $('#total_pembayaran_value').val(total_pembayaran);
         $("#total_pembayaran").html('Total Bayar Rp. '+total_pembayaran);
     });

     $('input[name=diskon_rupiah]').keyup(function() {
         var total_harga_value=$("#total_harga_value").val();
         var diskon_rupiah=$(this).val();
         var diskon_persen=diskon_rupiah/total_harga_value*100;
         // alert(kembali);
         $('#total_diskon_value').val(diskon_rupiah);
         $("#diskon").html('Diskon Rp. '+diskon_rupiah);
         $('input[name=diskon_persen]').val(diskon_persen);

         var total_pajak_value=$('#total_pajak_value').val();
         var total_diskon_value=$('#total_diskon_value').val();
         var total_pembayaran=parseInt(total_harga_value)+parseInt(total_pajak_value)-parseInt(total_diskon_value);
         $('#total_pembayaran_value').val(total_pembayaran);
         $("#total_pembayaran").html('Total Bayar Rp. '+total_pembayaran);
     });

     $('input[name=pajak_rupiah]').keyup(function() {
         var total_harga_value=$("#total_harga_value").val();
         var pajak_rupiah=$(this).val();
         var pajak_persen=pajak_rupiah/total_harga_value*100;
         // alert(kembali);
         $('#total_pajak_value').val(pajak_rupiah);
         $("#pajak").html('pajak Rp. '+pajak_rupiah);
         $('input[name=pajak_persen]').val(pajak_persen);

         var total_pajak_value=$('#total_pajak_value').val();
         var total_diskon_value=$('#total_diskon_value').val();
         var total_pembayaran=parseInt(total_harga_value)+parseInt(total_pajak_value)-parseInt(total_diskon_value);
         $('#total_pembayaran_value').val(total_pembayaran);
         $("#total_pembayaran").html('Total Bayar Rp. '+total_pembayaran);
     });



  });

  function total_pembayaran(){
    var total_harga_value=$("#total_harga_value").val();
    var diskon_rupiah=$('#total_diskon_value').val();
    var pajak_rupiah=$('#total_pajak_value').val();
  }
  function clearDatapemesanan(){
    $('#tabel_detail_pesan > tbody').html('');
  }
  function loadDatamenu(no_meja) {
      // var no_meja=$("#no_meja").val();
      var subharga=0;
      alert(no_meja.value);
      var value_no_meja=no_meja.value;
      $.ajax({
          url: '<?php echo base_url();?>/kasir/tampil_pesanan_menu',
          type: 'get',
          data: { no_meja: value_no_meja} ,
          dataType: 'json',
          success: function(data) {
            var  no=1;
            if(data.length == 0) {
                alert('empty');
                // total_semua();
                return;
            }else{
                $.each( data, function( key, value ) {
                  alert(value.id_menu);
                    $('#tabel_detail_pesan > tbody').append('<tr>'+
                        '<td>'+no+'</td>'+
                        '<td>'+value.menu+'</td>'+
                        '<td>'+
                          '<button type="button" onclick="minusmenu('+value.id_menu+');" style="float:left;" class="btn mb-1 btn-success btn-xs">-</button>'+
                          '<input type="text" id="jumlah" style="width:40px;height:40px;float:left;" class="form-control input-default" value="'+value.jumlah_pesan+'">'+
                          '<button type="button" onclick="plusmenu('+value.id_menu+');" style="float:left;" class="btn mb-1 btn-success btn-xs">+</button>'+
                        '</td>'+
                        '<td>'+
                          value.harga+
                        '</td>'+
                        '<td>'+
                          value.subharga+
                        '</td>'+
                        '<td>'+
                          '<button type="button" onclick="removemenu('+value.id_menu+');" class="btn mb-1 btn-danger btn-xs"><i class="fa fa-close"></i></span>'+
                          '</button>'+
                        '</td>'+
                    '</tr>');


                    no++;
                    subharga+=value.harga*value.jumlah;

                });


            }


          }
      });


  }


  function loadDatapaket(no_meja) {
      // var no_meja=$("#no_meja").val();
      var subharga=0;
      alert(no_meja.value);
      var value_no_meja=no_meja.value;
      $.ajax({
          url: '<?php echo base_url();?>/kasir/tampil_pesanan_paket',
          type: 'get',
          data: { no_meja: value_no_meja} ,
          dataType: 'json',
          success: function(data) {
            var  no=1;
            if(data.length == 0) {
                alert('empty');
                // total_semua();
                return;
            }else{
                $.each( data, function( key, value ) {
                  alert(value.id_paket);
                    $('#tabel_detail_pesan > tbody').append('<tr>'+
                        '<td>'+no+'</td>'+
                        '<td>'+value.nama_paket+'</td>'+
                        '<td>'+
                          '<button type="button" onclick="minusmenu('+value.id_paket+');" style="float:left;" class="btn mb-1 btn-success btn-xs">-</button>'+
                          '<input type="text" id="jumlah" style="width:40px;height:40px;float:left;" class="form-control input-default" value="'+value.jumlah_pesan+'">'+
                          '<button type="button" onclick="plusmenu('+value.id_paket+');" style="float:left;" class="btn mb-1 btn-success btn-xs">+</button>'+
                        '</td>'+
                        '<td>'+
                          value.harga+
                        '</td>'+
                        '<td>'+
                          value.subharga+
                        '</td>'+
                        '<td>'+
                          '<button type="button" onclick="removemenu('+value.id_paket+');" class="btn mb-1 btn-danger btn-xs"><i class="fa fa-close"></i></span>'+
                          '</button>'+
                        '</td>'+
                    '</tr>');


                    no++;
                    subharga+=value.harga*value.jumlah;

                });


            }


          }
      });


  }

  function loadDatapemesan(no_meja) {
      // var no_meja=$("#no_meja").val();
      alert(no_meja.value);
      var value_no_meja=no_meja.value;
      $.ajax({
          url: '<?php echo base_url();?>/kasir/tampil_pemesan',
          type: 'get',
          data: { no_meja: value_no_meja} ,
          dataType: 'json',
          success: function(data) {
            if(data.length == 0) {
                alert('empty');
                // total_semua();
                return;
            }else{
                $.each( data, function( key, value ) {
                    alert(value.nama_pemesan);
                    $("#nama_pemesan").val(value.nama_pemesan);
                    $("#id_pemesanan").val(value.id);
                    $("#total_harga_value").val(value.total_harga);
                    $("#total_harga").html('Total item Rp. '+value.total_harga);
                });


            }


          }
      });


  }

  function aksi_pembayaran() {
      var id_pemesanan=$("#id_pemesanan").val();
      var total_pembayaran_value=$('#total_pembayaran_value').val();
      var total_pajak_value=$('#total_pajak_value').val();
      var total_diskon_value=$('#total_diskon_value').val();

      var cek_value_bayar=$("input[name=bayar]").val();

      if(parseInt(cek_value_bayar)!=0){
          $.ajax({
              url: '<?php echo base_url();?>/kasir/aksi_pembayaran',
              type: 'post',
              data: { id_pemesanan:id_pemesanan, total_pembayaran:total_pembayaran_value, total_pajak:total_pajak_value, total_diskon:total_diskon_value} ,
              dataType: 'json',
              success: function(data) {
                if(data.length == 0) {
                    alert('empty');
                    // total_semua();
                    return;
                }else{
                    $.each( data, function( key, value ) {
                        alert(value.pesan);
                    });
                }
              }
          });
      }else{
        alert("input pembayarn")
      }


  }
</script>
</body>
</html>
