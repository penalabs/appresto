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
        Kasir

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">



		<div class="col-sm-12">
		<div class="box">
          <div class="box-header">
            <h3 class="box-title">Pembayaran</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="#" method="post" class="form-horizontal">
              <div class="box-body">


                <div class="form-group">
                  <label for="gross_amount" class="col-sm-12 control-label ">Tanggal: <div class="tanggal">0000-00-00 00:00:00</div></label>
                </div>

                <div class="col-md-4 col-xs-12 pull pull-left">

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Meja</label>
                    <div class="col-sm-7">
                      <select class="form-control meja" id="meja" name="meja">
            					  <option value="">--pilih--</option>
                                  <?php
            						$daftar_meja = $this->m_modul_kasir->tampil_data('meja')->result();
            						foreach($daftar_meja as $u){
            						?>
            						<option value="<?= $u->id?>"><?= $u->nomor?></option>
            						<?php
            						}
            						?>
                      </select>
                    </div>
                  </div>
				        <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Atas Nama</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="atasnama" name="atasnama" disabled>
                    </div>
                  </div>

                </div>


                <br /> <br/>
                <table class="table table-bordered" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:45%">Menu / Paket</th>
                      <th style="width:10%">Qty</th>
                      <th style="width:10%">Harga</th>
                      <th style="width:15%">Sub Total</th>
                      <th style="width:20%">
					  <!--
					  <button type="button" id="add_row_paket" class="btn btn-default"><i class="fa fa-plus"></i> Paket</button>
					  <button type="button" id="add_row_menu" class="btn btn-default"><i class="fa fa-plus"></i> Menu</button>
					  -->
					  Aksi
					  </th>

                    </tr>
                  </thead>

                   <tbody id="tb_item">


                   </tbody>
                </table>

                <br /> <br/>

				        <div class="col-md-6 col-xs-12">

                  <div class="form-group">
                    <label for="bayar" class="col-sm-5 control-label">BAYAR</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control" id="bayar" name="bayar"  autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="vat_charge" class="col-sm-5 control-label">KEMBALI</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="kembali" name="kembali" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="kembali_value" name="kembali_value" autocomplete="off">
                    </div>
                  </div>

                </div>


                <div class="col-md-6 col-xs-12 pull pull-right">

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label">Amount</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="total" name="total" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="total_value" name="total_value" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="vat_charge" class="col-sm-5 control-label">Pajak 10 %</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="pajak" name="pajak" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="pajak_value" name="pajak_value" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="discount" class="col-sm-5 control-label">Diskon %</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="diskon" name="diskon" placeholder="Diskon"  autocomplete="off">
                    </div>
                  </div>
          				   <div class="form-group">
                              <label for="discount" class="col-sm-5 control-label">Diskon Rp</label>
                              <div class="col-sm-7">
                                <input type="text" class="form-control" id="diskonrp" name="diskonrp" placeholder="Diskon Rupiah"  autocomplete="off" disabled>
          					  <input type="hidden" class="form-control" id="diskonrp_value" name="diskonrp_value" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="net_amount" class="col-sm-5 control-label">Total Harga</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="total_harga" name="total_harga" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="total_harga_value" name="total_harga_value" autocomplete="off">
                    </div>
                  </div>

                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="service_charge_rate" value="" autocomplete="off">
                <input type="hidden" name="vat_charge_rate" value="13" autocomplete="off">
                <button type="button" class="btn btn-primary" onclick="save()">Create / Simpan</button>
                <a href="<?php echo base_url('kasir/pemesanan');?>" class="btn btn-warning">KEMBALI KE TRANSAKSI</a>

                <a id="cetak" href="" target="_blank" class="btn btn-primary" >CETAK STRUK</a>
                <a href="<?php echo base_url('kasir/penjualan/');?>" class="btn btn-success">ENTER TRANSAKSI BARU</a>

              </div>
            </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
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
var total;
var pajak;
var diskon;
var bayar;
var kembali;
var no_meja;
function diskonku(diskon,hargaAwal,p){

  diskon = diskon/100*hargaAwal;
  hargaDiskon = diskon;
  return hargaDiskon;
}
function pajak(pajak,hargaAwal){

  pajak = pajak/100*hargaAwal;
  hargaPajak = pajak;
  return hargaPajak;
}

  var tot_harga_tmp;
  var idd_pesan;

	function save(){
		bayar=$('#bayar').val();
    kembali=$('#kembali_value').val();
    var id_user_kasir=<?php echo $this->session->userdata('id'); ?>;
    no_meja=$('#meja').val();
		alert(idd_pesan);
			$.ajax({
                type  : 'POST',
                url   : '<?php echo base_url(). 'kasir/action_pembayaran'; ?>',
				        data: {id_pesan:idd_pesan,nominal:bayar,id_user_kasir:id_user_kasir,kembali:kembali},
                async : false,
                dataType : 'json',
                success : function(data){

    						if(data.pesan=="gagal"){
    							alert(data.pesan);
    						}else{
    							alert(data.pesan);

    						}


                }

            });

	}

  function cetak(no_meja){
    total=$('#total_value').val();
    pajak=$('#pajak_value').val();
    diskon=$('#diskonrp_value').val();
    bayar=$('#bayar').val();
    kembali=$('#kembali_value').val();

    $('#cetak').attr('href', '<?php echo base_url('report/pdf/?no_meja=');?>'+no_meja);

  }
  //fungsi tampil barang

  function tampil_data_pemesan(meja){
    no_meja=meja;
    $('tbody').html("");
      $.ajax({
          type  : 'GET',
          url   : '<?php echo base_url(). 'kasir/get_pemesan'; ?>',
          data: { meja: meja} ,
          async : false,
          dataType : 'json',
          success : function(data){
              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                  $('#atasnama').val(data[i].nama_pemesan);
                  $('.tanggal').html(data[i].tanggal);

                  $('#total').val(data[i].total_harga);
                  $('#total_value').val(data[i].total_harga);

                  $('#pajak').val(pajak(10,data[i].total_harga));
                  $('#pajak_value').val(pajak(10,data[i].total_harga));
                  tot_harga_tmp=pajak(10,data[i].total_harga);


                  alert(data[i].nama_pemesan);

                  tampil_pesan_menu(data[i].id);
                  tampil_pesan_paket(data[i].id);

                  idd_pesan=data[i].id;
              }

          }

      });
  }


function tampil_pesan_menu(id_pesan){
 alert(id_pesan)
      $.ajax({
          type  : 'GET',
          url   : '<?php echo base_url(). 'kasir/get_menu'; ?>',
          data: {id_pesan:id_pesan} ,
          async : false,
          dataType : 'json',
          success : function(data){
              var html = '';

              var i;
              for(i=0; i<data.length; i++){
                alert(data[i].id);
                  html += '<tr id="data">'+
                          '<td>'+data[i].menu+'</td>'+
                          '<td><input type="text" name="qty_'+data[i].id+'" id="qty_'+data[i].id+'" class="form-control" value="'+data[i].jumlah_pesan+'"  disabled></td>'+
                          '<td id="harga_'+data[i].id+'">'+data[i].harga+'</td>'+
                          '<td class="value_sub_harga_td" id="sub_harga_'+data[i].id+'">'+data[i].harga*data[i].jumlah_pesan+'</td>'+
                          '<td style="text-align:right;">'+
                              '<a id="btn_edit_'+data[i].id+'" href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id+'" onclick="edit_menu('+id_pesan+','+data[i].id+')">Edit</a>'+' '+
                              //'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id+'">Hapus</a>'+
                          '</td>'+
                          '</tr>';
              }
              $('tbody').append(html);
          }

      });
  }

function tampil_pesan_paket(id_pesan){
      $.ajax({
          type  : 'GET',
          url   : '<?php echo base_url(). 'kasir/get_paket'; ?>',
          data: {id_pesan:id_pesan} ,
          async : false,
          dataType : 'json',
          success : function(data){
              var html = '';
              var i;

              for(i=0; i<data.length; i++){
                html += '<tr id="data">'+
                        '<td>'+data[i].nama_paket+'</td>'+
                        '<td><input type="text" name="qty_paket_'+data[i].id+'" id="qty_paket_'+data[i].id+'" class="form-control" value="'+data[i].jumlah_pesan+'"  disabled></td>'+
                        '<td id="harga_paket_'+data[i].id+'">'+data[i].harga+'</td>'+
                        '<td class="value_sub_harga_td" id="sub_harga_paket_'+data[i].id+'">'+data[i].harga*data[i].jumlah_pesan+'</td>'+
                        '<td style="text-align:right;">'+
                            '<a id="btn_edit_paket_'+data[i].id+'" href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id+'" onclick="edit_paket('+id_pesan+','+data[i].id+')">Edit</a>'+' '+
                            //'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id+'">Hapus</a>'+
                        '</td>'+
                        '</tr>';
              }
              $('tbody').append(html);
          }

      });
  }
  function edit_menu(id_pesan,id){
          // $("input[name='qty[]']").each(function(index) {
          //   $(this).removeAttr("disabled").eq(0);
          // });
          //alert(id);
          var identifikasi="";
          identifikasi=$("#btn_edit_"+id).text();
          alert(id);
          alert(identifikasi);
          var jum;
          var qty=$("#qty_"+id).val();
          alert(qty);
          if(identifikasi=="Edit"){
            var harga;
            $("#qty_"+id).removeAttr("disabled");
            $("#qty_"+id).keyup(function(){
                jum=$(this).val();
                //alert(jum);
                //$("#qty_"+id);
                harga=$("#harga_"+id).text();
                //alert(harga);
                var sub_harga=jum*harga;
                //alert(sub_harga);
                $("#sub_harga_"+id).text(sub_harga);

                $("#btn_edit_"+id).text("save");

                var tot_sub_harga=0;
                var subhargaku=0;
                $('tr#data').each(function() {

                    subhargaku = $(this).find(".value_sub_harga_td").html();
                    alert(subhargaku)
                    tot_sub_harga+=parseInt(subhargaku);
                 });
                //alert(tot_sub_harga);
                $("#total").val(tot_sub_harga);
                alert(tot_sub_harga);
                var total_harga_value=$("#total_value").val(tot_sub_harga);
                //alert(pajak(10,tot_sub_harga));
                $('#pajak').val(pajak(10,tot_sub_harga));
                $('#pajak_value').val(pajak(10,tot_sub_harga));
            });

        }else{
          //alert('aksi save')
          var tot_sub_harga=0;
          var sub_harga;
          sub_harga=$("#sub_harga_"+id).text();
          //alert(nilai)
          $.ajax({
                    type  : 'POST',
                    url   : '<?php echo base_url(). 'kasir/update_pesanan_menu'; ?>',
    				        data: {id_pesan_menu:id,jumlah_pesan:qty,sub_harga:sub_harga} ,
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
        }
  }

  function edit_paket(id_pesan,id){
          // $("input[name='qty[]']").each(function(index) {
          //   $(this).removeAttr("disabled").eq(0);
          // });
          //alert(id);
          var identifikasi=$("#btn_edit_paket_"+id).text();
          var jum;
          var qty=$("#qty_paket_"+id).val();
          alert(identifikasi);
          alert(id);

          var tot_sub_harga=0;
          var subhargaku=0;
          $('tr#data').each(function() {

              subhargaku = $(this).find(".value_sub_harga_td").html();
              alert(subhargaku)
              tot_sub_harga+=parseInt(subhargaku);
           });
          //alert(tot_sub_harga);
          $("#total").val(tot_sub_harga);
          alert(tot_sub_harga);
          var total_harga_value=$("#total_value").val(tot_sub_harga);
          //alert(pajak(10,tot_sub_harga));
          $('#pajak').val(pajak(10,tot_sub_harga));
          $('#pajak_value').val(pajak(10,tot_sub_harga));

          if(identifikasi=="Edit"){
            var harga;
            $("#qty_paket_"+id).removeAttr("disabled");
            $("#qty_paket_"+id).keyup(function(){
                jum=$(this).val();
                //alert(jum);
                //$("#qty_"+id);
                harga=$("#harga_paket_"+id).text();
                //alert(harga);
                var sub_harga=jum*harga;
                //alert(sub_harga);
                $("#sub_harga_paket_"+id).text(sub_harga);

                $("#btn_edit_paket_"+id).text("save");


            });

        }else{
          //alert('aksi save')
          var tot_sub_harga=0;
          var sub_harga;
          sub_harga=$("#sub_harga_"+id).text();
          //alert(nilai)
          $.ajax({
                    type  : 'POST',
                    url   : '<?php echo base_url(). 'kasir/update_pesanan_paket'; ?>',
    				        data: {id_pesan_paket:id,jumlah_pesan:qty,sub_harga:sub_harga} ,
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
        }
  }


  function update_pemesanan(id_pesan){
        var tot_sub_harga=0;
        var subhargaku=0;
        $('tr#data').each(function() {

            subhargaku = $(this).find(".value_sub_harga_td").html();
            alert(subhargaku)
            tot_sub_harga+=parseInt(subhargaku);
         });
        alert(tot_sub_harga);
        $.ajax({
              type  : 'POST',
              url   : '<?php echo base_url(). 'kasir/update_pemesanan'; ?>',
              data  : {id_pesan:id_pesan,tot_sub_harga:tot_sub_harga} ,
              async : false,
              dataType : 'json',
              success : function(data){
                if(data.pesan=="gagal"){
                  alert(data.pesan);

                }else{
                  alert(data.pesan);
                  $('tbody').html('');
                  tampil_data_pemesan(no_meja);
                }
              }

          });
  }
  $(document).ready(function () {
    $('.sidebar-menu').tree();
	  $("select.meja").change(function(){
		 var selected = $(this).children("option:selected").val();
		 alert(selected);
		 tampil_data_pemesan(selected);   //pemanggilan fungsi tampil barang.

     cetak(selected);
		 return false;
    });
	$("#diskon").keyup(function(){
		 var dk=$('#diskon').val();
		 var hargaAwal=$('#total_value').val();
		 var p=$('#pajak_value').val();
		 var dc=diskonku(dk,hargaAwal);
		 $('#diskonrp').val(dc);
		 $('#diskonrp_value').val(dc);


		 var h=parseInt(hargaAwal)+parseInt(p)-parseInt(dc);

		  $('#total_harga').val(h);
		  $('#total_harga_value').val(h);
	});
	$("#bayar").keyup(function(){
		 var tot_harga=$('#total_harga_value').val();

		 if(tot_harga==""){
			 alert("Total harga belum terisi");
		 }else{
			 var bayar=$('#bayar').val();
			 var kembali=parseInt(bayar)-parseInt(tot_harga);
			 $('#kembali_value').val(kembali);
			 $('#kembali').val(kembali);
		 }
	});
	// $("#add_row_paket").click(function(){
  //
	// 		var html='';
	// 		html +='<tr id="row_1">'+
  //                      '<td >'+
  //                       '<select class="form-control option_add"  id="option_add" name="option_add[]" style="width:100%;" onChange="hi(this.value)"  required>'+
  //                           '<option value=""></option>'+
	// 						'<option value="1">1</option>'+
  //                       '</select>'+
  //                       '</td>'+
  //                       '<td><input type="text" name="qty[]" id="qty_1" class="form-control" required onkeyup="getTotal(1)"></td>'+
  //                       '<td>'+
  //                         '<input type="text" name="harga[]" id="harga_1" class="form-control" disabled autocomplete="off">'+
  //                         '<input type="hidden" name="harga_value[]" id="harga_value_1" class="form-control" autocomplete="off">'+
  //                       '</td>'+
  //                       '<td>'+
  //                         '<input type="text" name="subharga[]" id="subharga_1" class="form-control" disabled autocomplete="off">'+
  //                         '<input type="hidden" name="subharga_value[]" id="subharga_value_1" class="form-control" autocomplete="off">'+
  //                       '</td>'+
  //                       '<td><button type="button" class="btn btn-default" ><i class="fa fa-close"></i></button></td>'+
  //                    '</tr>';
	// 		var cekpemesan=$( ".meja option:selected" ).val();
  //
	// 		if(cekpemesan!=""){
	// 		$('#tb_item').append(html);
	// 		}
	// 	});

		function hapus_item(id,jenis){
			$('tbody').html("");
			tampil_pesan_menu(data[i].id);
			tampil_pesan_paket(data[i].id);
		}
		function update_qty(id,jenis,qty){
			$('tbody').html("");
			tampil_pesan_menu(data[i].id);
			tampil_pesan_paket(data[i].id);
		}



  })
</script>
</body>
</html>
