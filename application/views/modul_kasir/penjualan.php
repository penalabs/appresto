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
                  <select id="no_meja" class="form-control" >
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
                  <!-- <h4>Nama Pemesan : <input type="text" value="" class="form-control" id="nama_pemesan" readonly></h4> -->
                  <label>Pilih nama pemesan</label>
                  <select id="nama_pemesan" class="form-control" >
                    <?php
                      $data=$this->db->query("SELECT * FROM pemesanan group by nama_pemesan")->result();
                      foreach ($data as $d) {
                     ?>
                        <option value="<?= $d->nama_pemesan;?>"><?= $d->nama_pemesan;?></option>
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
                 <!-- load pertama -->
                 <input type="hidden" value="0" id="sub_harga_menu" name="sub_harga_menu" class="form-control" >
                 <input type="hidden" value="0" id="sub_harga_paket" name="sub_harga_paket" class="form-control" >
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


     $('#no_meja').change(function(){
               var no_meja=$(this).val();
               $.ajax({
                   url: '<?php echo base_url();?>/kasir/get_id_pemesan2/',
                   type: 'get',
                   data: { no_meja: no_meja},
                   dataType: 'json',
                   success: function(data) {
                     if(data.length == 0) {
                         alert('empty');
                         return;
                     }else{
                         $.each( data, function( key, value ) {
                           alert(value.id);
                           clearDatapemesanan();
                           loadDatamenu(value.id);
                           loadDatapaket(value.id);
                           loadDatapemesan(value.id);

                         });
                     }
                   }
               });

      });

      $('#nama_pemesan').change(function(){
                var nama_pemesan=$(this).val();
                $.ajax({
                    url: '<?php echo base_url();?>/kasir/get_id_pemesan1/',
                    type: 'get',
                    data: { nama_pemesan: nama_pemesan},
                    dataType: 'json',
                    success: function(data) {
                      if(data.length == 0) {
                          alert('empty');
                          return;
                      }else{
                          $.each( data, function( key, value ) {
                            alert(value.id);
                            clearDatapemesanan();
                            loadDatamenu(value.id);
                            loadDatapaket(value.id);
                            loadDatapemesan(value.id);

                          });
                      }
                    }
                });
       });



  });


  function clearDatapemesanan(){
    $('#tabel_detail_pesan > tbody').html('');
  }
  function loadDatamenu(id_pemesanan) {
      var subharga=0;
      var value_id_pemesanan=id_pemesanan;
      $.ajax({
          url: '<?php echo base_url();?>/kasir/tampil_pesanan_menu',
          type: 'get',
          data: { id_pemesanan: value_id_pemesanan} ,
          dataType: 'json',
          success: function(data) {
            var  no=1;
            if(data.length == 0) {
                // alert('empty');
                // total_semua();
                return;
            }else{
                $.each( data, function( key, value ) {
                  // alert(value.id_menu);
                    $('#tabel_detail_pesan > tbody').append('<tr>'+
                        '<td>'+no+'</td>'+
                        '<td>'+value.menu+'</td>'+
                        '<td>'+
                          '<button type="button" onclick="minusmenu('+value.id+',\''+value.jumlah_pesan+'\',\''+value.harga+'\');" style="float:left;" class="btn mb-1 btn-success btn-xs">-</button>'+
                          '<input type="text" id="jumlah-'+value.id+'" style="width:40px;height:40px;float:left;" class="form-control input-default" value="'+value.jumlah_pesan+'">'+
                          '<button type="button" onclick="plusmenu('+value.id+',\''+value.jumlah_pesan+'\',\''+value.harga+'\');" style="float:left;" class="btn mb-1 btn-success btn-xs">+</button>'+
                        '</td>'+
                        '<td>'+
                          value.harga+
                        '</td>'+
                        '<td id="sub_harga-'+value.id+'">'+
                          value.subharga+
                        '</td>'+
                        '<td>'+
                          '<button type="button" onclick="removemenu('+value.id+');" class="btn mb-1 btn-danger btn-xs"><i class="fa fa-close"></i></span>'+
                          '</button>'+
                        '</td>'+
                    '</tr>');


                    no++;
                    subharga+=parseInt(value.harga)*parseInt(value.jumlah_pesan);

                });

              // $("#sub_harga_menu").val(subharga);
              total_seluruh_harga();

            }


          }
      });


  }
  function plusmenu(id_pemesanan_menu,jumlah_pesan,harga) {
      var jumlah_pesan=$("#jumlah-"+id_pemesanan_menu).val();
      var jumlah_pesan_baru=parseInt(jumlah_pesan)+1;
      var sub_harga_baru=parseInt(jumlah_pesan_baru)*parseInt(harga);
      var id_pemesanan=$("#id_pemesanan").val();
      $.ajax({
          url: '<?php echo base_url();?>/kasir/menu_plus/',
          type: 'get',
          data: { id_pemesanan_menu: id_pemesanan_menu, jumlah_pesan:jumlah_pesan, harga:harga, id_pemesanan:id_pemesanan},
          dataType: 'json',
          success: function(data) {
            if(data.length == 0) {
                alert('empty');
                return;
            }else{
                $.each( data, function( key, value ) {

                    if(value.pesan=1){
                      // alert("berhasil tambah jumlah menu");
                      $("#jumlah-"+id_pemesanan_menu).val(jumlah_pesan_baru);
                      // alert(sub_harga_baru);
                      $('#sub_harga-'+id_pemesanan_menu).html(sub_harga_baru);


                      total_seluruh_harga();
                    }

                });
            }
          }
      });
  }

  function minusmenu(id_pemesanan_menu,jumlah_pesan,harga) {
      var jumlah_pesan=$("#jumlah-"+id_pemesanan_menu).val();
      var jumlah_pesan_baru=parseInt(jumlah_pesan)-1;
      var sub_harga_baru=parseInt(jumlah_pesan_baru)*parseInt(harga);
      var id_pemesanan=$("#id_pemesanan").val();
      $.ajax({
          url: '<?php echo base_url();?>/kasir/menu_minus/',
          type: 'get',
          data: { id_pemesanan_menu: id_pemesanan_menu, jumlah_pesan:jumlah_pesan, harga:harga, id_pemesanan:id_pemesanan},
          dataType: 'json',
          success: function(data) {
            if(data.length == 0) {
                // alert('empty');
                return;
            }else{
                $.each( data, function( key, value ) {

                    if(value.pesan=1){
                      // alert("berhasil tambah jumlah menu");
                      $("#jumlah-"+id_pemesanan_menu).val(jumlah_pesan_baru);
                      // alert(sub_harga_baru);
                      $('#sub_harga-'+id_pemesanan_menu).html(sub_harga_baru);

                      total_seluruh_harga();
                    }

                });
            }
          }
      });
  }

  function removemenu(id_pemesanan_menu) {
      // var no_meja=$( "#no_meja option:selected" ).val();
      var id_pemesanan=$("#id_pemesanan").val();
      $.ajax({
          url: '<?php echo base_url();?>/kasir/remove_menu/',
          type: 'get',
          data: { id_pemesanan_menu: id_pemesanan_menu, id_pemesanan:id_pemesanan},
          dataType: 'json',
          success: function(data) {
            if(data.length == 0) {
                // alert('empty');
                return;
            }else{
                $.each( data, function( key, value ) {

                    if(value.pesan=1){

                      clearDatapemesanan();
                      loadDatamenu(id_pemesanan);
                      loadDatapaket(id_pemesanan);
                      loadDatapemesan(id_pemesanan);
                      total_seluruh_harga();
                    }

                });
            }
          }
      });
  }

  function loadDatapaket(id_pemesanan) {
      // var no_meja=$("#no_meja").val();
      var subharga=0;
      var value_id_pemesanan=id_pemesanan;
      $.ajax({
          url: '<?php echo base_url();?>/kasir/tampil_pesanan_paket',
          type: 'get',
          data: { id_pemesanan: value_id_pemesanan} ,
          dataType: 'json',
          success: function(data) {
            var  no=1;
            if(data.length == 0) {
                // alert('empty');
                // total_semua();
                return;
            }else{
                $.each( data, function( key, value ) {
                  // alert(value.id_paket);
                    $('#tabel_detail_pesan > tbody').append('<tr>'+
                        '<td>'+no+'</td>'+
                        '<td>'+value.nama_paket+'</td>'+
                        '<td>'+
                          '<button type="button" onclick="minuspaket('+value.id+',\''+value.jumlah_pesan+'\',\''+value.harga+'\');" style="float:left;" class="btn mb-1 btn-success btn-xs">-</button>'+
                          '<input type="text" id="jumlah-'+value.id+'" style="width:40px;height:40px;float:left;" class="form-control input-default" value="'+value.jumlah_pesan+'">'+
                          '<button type="button" onclick="pluspaket('+value.id+',\''+value.jumlah_pesan+'\',\''+value.harga+'\');" style="float:left;" class="btn mb-1 btn-success btn-xs">+</button>'+
                        '</td>'+
                        '<td>'+
                          value.harga+
                        '</td>'+
                        '<td id="sub_harga-'+value.id+'">'+
                          value.subharga+
                        '</td>'+
                        '<td>'+
                          '<button type="button" onclick="removepaket('+value.id+');" class="btn mb-1 btn-danger btn-xs"><i class="fa fa-close"></i></span>'+
                          '</button>'+
                        '</td>'+
                    '</tr>');


                    no++;
                    subharga+=parseInt(value.harga)*parseInt(value.jumlah_pesan);

                });
                // $("#sub_harga_paket").val(subharga);
                total_seluruh_harga();

            }


          }
      });
  }

  function pluspaket(id_pemesanan_paket,jumlah_pesan,harga) {
      var jumlah_pesan=$("#jumlah-"+id_pemesanan_paket).val();
      var jumlah_pesan_baru=parseInt(jumlah_pesan)+1;
      var sub_harga_baru=parseInt(jumlah_pesan_baru)*parseInt(harga);
      var id_pemesanan=$("#id_pemesanan").val();
      $.ajax({
          url: '<?php echo base_url();?>/kasir/paket_plus/',
          type: 'get',
          data: { id_pemesanan_paket: id_pemesanan_paket, jumlah_pesan:jumlah_pesan, harga:harga, id_pemesanan:id_pemesanan},
          dataType: 'json',
          success: function(data) {
            if(data.length == 0) {
                // alert('empty');
                return;
            }else{
                $.each( data, function( key, value ) {

                    if(value.pesan=1){
                      // alert("berhasil tambah jumlah paket");
                      $("#jumlah-"+id_pemesanan_paket).val(jumlah_pesan_baru);
                      // alert(sub_harga_baru);
                      $('#sub_harga-'+id_pemesanan_paket).html(sub_harga_baru);


                      total_seluruh_harga();
                    }

                });
            }
          }
      });
  }

  function minuspaket(id_pemesanan_paket,jumlah_pesan,harga) {
      var jumlah_pesan=$("#jumlah-"+id_pemesanan_paket).val();
      var jumlah_pesan_baru=parseInt(jumlah_pesan)-1;
      var sub_harga_baru=parseInt(jumlah_pesan_baru)*parseInt(harga);
      var id_pemesanan=$("#id_pemesanan").val();
      $.ajax({
          url: '<?php echo base_url();?>/kasir/paket_minus/',
          type: 'get',
          data: { id_pemesanan_paket: id_pemesanan_paket, jumlah_pesan:jumlah_pesan, harga:harga, id_pemesanan:id_pemesanan},
          dataType: 'json',
          success: function(data) {
            if(data.length == 0) {
                // alert('empty');
                return;
            }else{
                $.each( data, function( key, value ) {

                    if(value.pesan=1){
                      // alert("berhasil tambah jumlah paket");
                      $("#jumlah-"+id_pemesanan_paket).val(jumlah_pesan_baru);
                      // alert(sub_harga_baru);
                      $('#sub_harga-'+id_pemesanan_paket).html(sub_harga_baru);

                      total_seluruh_harga();
                    }

                });
            }
          }
      });
  }

  function removepaket(id_pemesanan_paket) {
      // var no_meja=$( "#no_meja option:selected" ).val();
      var id_pemesanan=$("#id_pemesanan").val();
      $.ajax({
          url: '<?php echo base_url();?>/kasir/remove_paket/',
          type: 'get',
          data: { id_pemesanan_paket: id_pemesanan_paket, id_pemesanan:id_pemesanan},
          dataType: 'json',
          success: function(data) {
            if(data.length == 0) {
                // alert('empty');
                return;
            }else{
                $.each( data, function( key, value ) {

                    if(value.pesan=1){

                      clearDatapemesanan();
                      loadDatamenu(id_pemesanan);
                      loadDatapaket(id_pemesanan);
                      loadDatapemesan(id_pemesanan);
                      total_seluruh_harga();
                    }

                });
            }
          }
      });
  }

  function loadDatapemesan(id_pemesanan) {
      var value_id_pemesanan=id_pemesanan;
      $.ajax({
          url: '<?php echo base_url();?>/kasir/tampil_pemesan',
          type: 'get',
          data: { id_pemesanan: value_id_pemesanan} ,
          dataType: 'json',
          success: function(data) {
            if(data.length == 0) {
                // alert('empty');
                // total_semua();
                return;
            }else{
                $.each( data, function( key, value ) {
                    // alert(value.nama_pemesan);
                    $("#nama_pemesan").val(value.nama_pemesan);
                    $("#id_pemesanan").val(value.id);

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
                    // alert('empty');
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



   function total_pembayaran(){
     var total_harga_value=$("#total_harga_value").val();
     var diskon_rupiah=$('#total_diskon_value').val();
     var pajak_rupiah=$('#total_pajak_value').val();
   }

  function total_seluruh_harga(){
    var total_harga_item=0;
    $('#tabel_detail_pesan > tbody tr').each(function() {
      var subharga = this.cells[4].innerHTML;
        total_harga_item+=parseInt(subharga);

    });
    alert(total_harga_item);

    $("#total_harga_value").val(total_harga_item);
    $("#total_harga").html('Total item Rp. '+total_harga_item);

    var total_pembayaran=total_harga_item;
    $('#total_pembayaran_value').val(total_pembayaran);
    $("#total_pembayaran").html('Total Bayar Rp. '+total_pembayaran);
  }

</script>
</body>
</html>
