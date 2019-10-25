<!DOCTYPE html>
<div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url(). 'modul_bendahara_wilayah/tambah_data_biaya_operasional_cabang'; ?>" method="post" role="form">
                  <div class="box-body">

				  <div class="form-group">
                  <label class="col-sm-2 control-label">Saldo Kas KANWIL</label>
                  <div class="col-sm-10">

                         <?php
						  echo $id_bendahara=$this->session->userdata('id');
						  $sql = "SELECT sum(nominal_kas_keluar) as saldo FROM pemberian_kaskeluar where id_bendahara='$id_bendahara'";
						  $data_kas=$this->db->query($sql)->row();

						  $id_kanwil=$this->session->userdata('id_kanwil');
						  $sql2 = "SELECT sum(nominal) as nominal_pengeluaran_cabang_alat FROM pengeluaran_cabang_alat where id_kanwil='$id_kanwil'";
						  $data_pengeluaran_cabang2=$this->db->query($sql2)->row();

						  $id_kanwil=$this->session->userdata('id_kanwil');
						  $sql3 = "select sum(satuan_harga_per_satuan_bahan) as harga from permintaan_bahan_detail join bahan_mentah on bahan_mentah.id=permintaan_bahan_detail.id_bahan_mentah JOIN permintaan_bahan on permintaan_bahan.id_permintaan=permintaan_bahan_detail.id_permintaan join user_kanwil on user_kanwil.id=permintaan_bahan.id_user_kanwil_logistik where permintaan_bahan.status='diterima' and user_kanwil.id_kanwil='$id_kanwil'";
						  $data_pengeluaran_cabang3=$this->db->query($sql3)->row();

						  $id_kanwil=$this->session->userdata('id_kanwil');
						  $sql4 = "SELECT sum(nominal) as nominal_pengeluaran_cabang_operasional FROM pengeluaran_cabang_operasional where id_kanwil='$id_kanwil'";
						  $data_pengeluaran_cabang4=$this->db->query($sql4)->row();

						  $saldo_akhir=(int)$data_kas->saldo-((int)$data_pengeluaran_cabang2->nominal_pengeluaran_cabang_alat+(int)$data_pengeluaran_cabang4->nominal_pengeluaran_cabang_operasional+(int)$data_pengeluaran_cabang3->harga);
						  ?>


                        <input type="number" name="saldokas" value="<?php echo $saldo_akhir; ?>" class="form-control" disabled>

                    </select>
                  </div>
                </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">pengeluaran</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="pengeluaran" id="pengeluaran" placeholder="Password">
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">lama sewa</label>

                      <div class="col-sm-10">
                        <div class="input-group">
                          <input type="text" class="form-control" name="lama_sewa" id="lama_sewa" placeholder="Password">
                          <div class="input-group-addon">
                            Bulan
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">harga</label>

                      <div class="col-sm-10">
                        <div class="input-group">
                          <div class="input-group-addon">
                            Rp.
                          </div>
                          <input type="text" class="form-control" name="harga_sewa" id="harga_sewa" placeholder="Password">
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



        <div class="modal fade" id="myModalEdit" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url(). 'modul_bendahara_wilayah/update_data_biaya_operasional_cabang'; ?>" method="post" role="form">
                  <div class="box-body">
				  <div class="form-group">
                  <label class="col-sm-2 control-label">Saldo Kas KANWIL</label>
                  <div class="col-sm-10">

                         <?php
						  echo $id_bendahara=$this->session->userdata('id');
						  $sql = "SELECT sum(nominal_kas_keluar) as saldo FROM pemberian_kaskeluar where id_bendahara='$id_bendahara'";
						  $data_kas=$this->db->query($sql)->row();

						  $id_kanwil=$this->session->userdata('id_kanwil');
						  $sql2 = "SELECT sum(nominal) as nominal_pengeluaran_cabang_alat FROM pengeluaran_cabang_alat where id_kanwil='$id_kanwil'";
						  $data_pengeluaran_cabang2=$this->db->query($sql2)->row();

						  $id_kanwil=$this->session->userdata('id_kanwil');
						  $sql3 = "select sum(satuan_harga_per_satuan_bahan) as harga from permintaan_bahan_detail join bahan_mentah on bahan_mentah.id=permintaan_bahan_detail.id_bahan_mentah JOIN permintaan_bahan on permintaan_bahan.id_permintaan=permintaan_bahan_detail.id_permintaan join user_kanwil on user_kanwil.id=permintaan_bahan.id_user_kanwil_logistik where permintaan_bahan.status='diterima' and user_kanwil.id_kanwil='$id_kanwil'";
						  $data_pengeluaran_cabang3=$this->db->query($sql3)->row();

						  $id_kanwil=$this->session->userdata('id_kanwil');
						  $sql4 = "SELECT sum(nominal) as nominal_pengeluaran_cabang_operasional FROM pengeluaran_cabang_operasional where id_kanwil='$id_kanwil'";
						  $data_pengeluaran_cabang4=$this->db->query($sql4)->row();

						  $saldo_akhir=(int)$data_kas->saldo-((int)$data_pengeluaran_cabang2->nominal_pengeluaran_cabang_alat+(int)$data_pengeluaran_cabang4->nominal_pengeluaran_cabang_operasional+(int)$data_pengeluaran_cabang3->harga);
						  ?>


                        <input type="number" name="saldokas" value="<?php echo $saldo_akhir; ?>" class="form-control" disabled>

                    </select>
                  </div>
                </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="id_operasionaledit" id="id_operasionaledit" placeholder="Password">
                      <label for="inputPassword3" class="col-sm-2 control-label">pengeluaran</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="pengeluaranedit" id="pengeluaranedit" placeholder="Password">
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">lama sewa</label>

                      <div class="col-sm-10">
                        <div class="input-group">
                          <input type="number" class="form-control" name="lama_sewaedit" id="lama_sewaedit" placeholder="Password">
                          <div class="input-group-addon">
                            Bulan
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">harga</label>

                      <div class="col-sm-10">
                        <div class="input-group">
                          <div class="input-group-addon">
                            Rp.
                          </div>
                          <input type="text" class="form-control" name="harga_sewaedit" id="harga_sewaedit" placeholder="Password">
                        </div>
                      </div>
                    </div>
                  </div>
              <!-- /.box-body -->
                <div class="box-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info pull-right">Update</button>
                </div>
              <!-- /.box-footer -->
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
                  <!-- /.modal-dialog -->
                </div>





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
        Bendahara Wilayah

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	<div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Biaya Operasional Cabang</h3>
              <br>
              <br>
              <button type="button" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Detail" class="btn btn-default pass_id"><i class="fa fa-plus"> Tambah</i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
				          <th>nama_pengeluaran</th>
                  <th>lama_sewa</th>
				          <th>harga_sewa</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <?php
                $no = 0;
                foreach ($data_biaya_operasional_cabang as $data) {
                  $no++;
                	?>

                <tbody>
                <tr id="<?php echo $data->id;?>">
                      <td><?php echo $no;?></td>
				              <td><?php echo $data->nama_pengeluaran;?></td>
				              <td><?php echo $data->masa_sewa;?></td>
                      <td><?php
                       echo $hasil_rupiah = "Rp " . number_format($data->nominal,2,',','.');
                       ?></td>
				              <td>
                        <button type="submit" class="btn btn-success btn-xs edit" data-toggle="modal" data-target="#myModalEdit" data-toggle="tooltip" title="Detail"> <i class="fa  fa-edit" ></i></button>
                        <!-- <a href="<?php echo site_url('modul_bendahara_wilayah/delete_data_biaya_operasional_cabang/'.$data->id) ?>" class="btn btn-danger btn-xs" ><i class="fa  fa-close" ></i></a> -->
                        <button type="submit" data-toggle="tooltip" class="btn btn-danger btn-xs konfirmasi_edit"><i class="fa  fa-close" ></i></button>
                      </td>
                </tr>
                </tbody>
                <?php
                	}
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          <!-- /.box -->
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
$(".berhasil_tambah").click(function(){
  var id_biaya_operasional_cabang = $(this).parents("tr").attr("id");
  konfirmasi_edit_alert();
  function konfirmasi_edit_alert() {
    $.ajax({
      type:'POST',
        url:'<?php echo base_url()."modul_bendahara_wilayah/edit_data_biaya_operasional_cabang/" ?>'+id_biaya_operasional_cabang,
      dataType:'json',
      success: function(data){
        for(var i=0;i<data.length;i++){
          swal(
          {title: 'apakah kamu yakin ingin mengahapus "'+data[i].nama_pengeluaran+'" ?', showCancelButton: true, type: 'warning'},
          function(isConfirm) {
              if (isConfirm) {
                window.location = "delete_data_biaya_operasional_cabang/"+id_biaya_operasional_cabang;
              } else {
              // handle all other cases
              }
            }
          )
        }
      }
    });
  }
  });
</script>



<script type="text/javascript">
$(".konfirmasi_edit").click(function(){
  var id_biaya_operasional_cabang = $(this).parents("tr").attr("id");
  konfirmasi_edit_alert();
  function konfirmasi_edit_alert() {
    $.ajax({
      type:'POST',
        url:'<?php echo base_url()."modul_bendahara_wilayah/edit_data_biaya_operasional_cabang/" ?>'+id_biaya_operasional_cabang,
      dataType:'json',
      success: function(data){
        for(var i=0;i<data.length;i++){
          swal(
          {title: 'apakah kamu yakin ingin mengahapus "'+data[i].nama_pengeluaran+'" ?', showCancelButton: true, type: 'warning'},
          function(isConfirm) {
              if (isConfirm) {
                window.location = "delete_data_biaya_operasional_cabang/"+id_biaya_operasional_cabang;
              } else {
              // handle all other cases
              }
            }
          )
        }
      }
    });
  }
  });
</script>




<script type="text/javascript">
  $(".edit").click(function(){
  var id_biaya_operasional_cabang = $(this).parents("tr").attr("id");
  ambilDataBiayaOperasionalCabang();
  function ambilDataBiayaOperasionalCabang(){
    $.ajax({
      type:'POST',
        url:'<?php echo base_url()."modul_bendahara_wilayah/edit_data_biaya_operasional_cabang/" ?>'+id_biaya_operasional_cabang,
      dataType:'json',
      success: function(data){
        for(var i=0;i<data.length;i++){
          document.getElementById("id_operasionaledit").value  = data[i].id;
          document.getElementById("pengeluaranedit").value  = data[i].nama_pengeluaran;
          document.getElementById("lama_sewaedit").value = data[i].lama_sewa;
          document.getElementById("harga_sewaedit").value = data[i].harga_sewa;
        }
      }
    });
  }
  });
</script>
</body>
</html>
