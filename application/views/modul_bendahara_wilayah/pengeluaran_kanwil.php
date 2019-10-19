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
                <form class="form-horizontal" action="<?php echo base_url(). 'modul_bendahara_wilayah/tambah_data_pengeluaran_kanwil'; ?>" method="post" role="form">
                  <div class="box-body">
					<div class="form-group">
					  <label class="col-sm-2 control-label">Saldo Kas KANWIL</label>
					  <div class="col-sm-10">

						  <?php
              $id_bendahara=$this->session->userdata('id');
              $id_kanwil=$this->session->userdata('id_kanwil');
              $sql = "SELECT sum(nominal_kas_keluar) as saldo FROM pemberian_kaskeluar where id_bendahara='$id_bendahara'";
              $data_kas=$this->db->query($sql)->row();

              // $sql = "SELECT sum(nominal_kas_keluar) as saldo FROM pemberian_kaskeluar where id_bendahara='$id_bendahara'";
              // $data_kas=$this->db->query($sql)->row();


              $sql2 = "select sum(dibayar) as pengeluaran_alat from pembelian_alat join user_kanwil on user_kanwil.id=pembelian_alat.id_logistik where id_kanwil='$id_kanwil'";
              $pengeluaran_alat=$this->db->query($sql2)->row();


              $sql3 = "select sum(dibayar) as pengeluaran_bahan_mentah from pembelian_bahan_mentah join user_kanwil on user_kanwil.id=pembelian_bahan_mentah.id_logistik where id_kanwil='$id_kanwil'";
              $pengeluaran_bahan_mentah=$this->db->query($sql3)->row();


              $sql4 = "SELECT sum(nominal) as nominal_pengeluaran_kanwil_operasional FROM pengeluaran_kanwil_operasional where id_kanwil='$id_kanwil'";
              $nominal_pengeluaran_kanwil_operasional=$this->db->query($sql4)->row();


              $sql4 = "SELECT (nominal_investasi) as nominal_investasi_kanwil FROM investasi_kanwil where id_kanwil='$id_kanwil'";
              $nominal_investasi_kanwil=$this->db->query($sql4)->row();

              $saldo_akhir=(int)$nominal_investasi_kanwil->nominal_investasi_kanwil-(int)$data_kas->saldo+((int)$pengeluaran_alat->pengeluaran_alat+(int)$pengeluaran_bahan_mentah->pengeluaran_bahan_mentah+(int)$nominal_pengeluaran_kanwil_operasional->nominal_pengeluaran_kanwil_operasional);
              ?>

							<input type="number" name="saldokas" value="<?php echo $saldo_akhir; ?>" class="form-control" disabled>

						</select>
					  </div>
					</div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">kanwil</label>

                      <div class="col-sm-10">
                        <select class="form-control select2" name="kanwil" id="kanwil" style="width: 100%;">
                          <option value="">Pilih kanwil</option>
                            <?php
                            foreach ($data_kanwil as $data) {
                            ?>
                              <option value="<?php echo $data->id_kanwil; ?>"><?php echo $data->alamat_kantor ?> <?php echo $data->id_kanwil; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                      </div>
                    </div><div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">operasional</label>

                      <div class="col-sm-10">
                        <select class="form-control select2" name="operasional" id="operasional" style="width: 100%;">
                          <option value="">Pilih operasional</option>
                          <?php
                          foreach ($data_operasional as $data) {
                          ?>
                            <option value="<?php echo $data->id; ?>"><?php echo $data->nama_pengeluaran ?> </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">nominal</label>

                      <div class="col-sm-10">
                        <div class="input-group">
                          <div class="input-group-addon">
                            Rp.
                          </div>
                          <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal pengeluaran">
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
                <form class="form-horizontal" action="<?php echo base_url(). 'modul_bendahara_wilayah/update_data_pengeluaran_kanwil'; ?>" method="post" role="form">
                  <div class="box-body">
				  <div class="form-group">
					  <label class="col-sm-2 control-label">Saldo Kas KANWIL</label>
					  <div class="col-sm-10">

              <?php
              $id_bendahara=$this->session->userdata('id');
              $id_kanwil=$this->session->userdata('id_kanwil');
              $sql = "SELECT sum(nominal_kas_keluar) as saldo FROM pemberian_kaskeluar where id_bendahara='$id_bendahara'";
              $data_kas=$this->db->query($sql)->row();

              // $sql = "SELECT sum(nominal_kas_keluar) as saldo FROM pemberian_kaskeluar where id_bendahara='$id_bendahara'";
              // $data_kas=$this->db->query($sql)->row();


              $sql2 = "select sum(dibayar) as pengeluaran_alat from pembelian_alat join user_kanwil on user_kanwil.id=pembelian_alat.id_logistik where id_kanwil='$id_kanwil'";
              $pengeluaran_alat=$this->db->query($sql2)->row();


              $sql3 = "select sum(dibayar) as pengeluaran_bahan_mentah from pembelian_bahan_mentah join user_kanwil on user_kanwil.id=pembelian_bahan_mentah.id_logistik where id_kanwil='$id_kanwil'";
              $pengeluaran_bahan_mentah=$this->db->query($sql3)->row();


              $sql4 = "SELECT sum(nominal) as nominal_pengeluaran_kanwil_operasional FROM pengeluaran_kanwil_operasional where id_kanwil='$id_kanwil'";
              $nominal_pengeluaran_kanwil_operasional=$this->db->query($sql4)->row();


              $sql4 = "SELECT (nominal_investasi) as nominal_investasi_kanwil FROM investasi_kanwil where id_kanwil='$id_kanwil'";
              $nominal_investasi_kanwil=$this->db->query($sql4)->row();

              $saldo_akhir=(int)$nominal_investasi_kanwil->nominal_investasi_kanwil-(int)$data_kas->saldo+((int)$pengeluaran_alat->pengeluaran_alat+(int)$pengeluaran_bahan_mentah->pengeluaran_bahan_mentah+(int)$nominal_pengeluaran_kanwil_operasional->nominal_pengeluaran_kanwil_operasional);
              ?>
							<input type="number" name="saldokas" value="<?php echo $saldo_akhir; ?>" class="form-control" disabled>

						</select>
					  </div>
					</div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="id_pengeluaran_kanwiledit" id="id_pengeluaran_kanwiledit" placeholder="Password">
                      <label for="inputEmail3" class="col-sm-2 control-label">kanwil</label>

                      <div class="col-sm-10">
                        <select class="form-control select2" name="kanwiledit" id="kanwiledit" style="width: 100%;">
                          <option value="">Pilih kanwil</option>
                            <?php
                            foreach ($data_kanwil as $data) {
                            ?>
                              <option value="<?php echo $data->id_kanwil; ?>"><?php echo $data->alamat_kantor ?></option>
                            <?php
                            }
                            ?>
                        </select>
                      </div>
                    </div><div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">operasional</label>

                      <div class="col-sm-10">
                        <select class="form-control select2" name="operasionaledit" id="operasionaledit" style="width: 100%;">
                          <option value="">Pilih operasional</option>
                          <?php
                          foreach ($data_operasional as $data) {
                          ?>
                            <option value="<?php echo $data->id; ?>"><?php echo $data->nama_pengeluaran ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">nominal</label>

                      <div class="col-sm-10">
                        <div class="input-group">
                          <div class="input-group-addon">
                            Rp.
                          </div>
                          <input type="text" class="form-control" name="nominaledit" id="nominaledit" placeholder="Password">
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
              <h3 class="box-title">Daftar Pengeluaran Kanwil</h3>
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
				          <th>nama kanwil</th>
                  <th>nama pengeluaran Operasional</th>
				          <th>Nominal</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <?php
                $no = 0;
                foreach ($data_pengeluaran_kanwil as $data) {
                  $no++;
                	?>

                <tbody>
                <tr id = <?php echo $data->id_pengeluaran_kanwil ?>>
                      <td><?php echo $no;?></td>
				              <td><?php echo $data->alamat_kantor;?></td>
				              <td><?php echo $data->nama_pengeluaran;?></td>
                      <td><?php
                       echo $hasil_rupiah = "Rp " . number_format($data->nominal,2,',','.');
                       ?></td>
				              <td>
                        <button type="submit" class="btn btn-success btn-xs edit" data-toggle="modal" data-target="#myModalEdit" data-toggle="tooltip" title="Detail"> <i class="fa  fa-edit" ></i></button>
                        <a href="<?php echo site_url('modul_bendahara_wilayah/delete_data_pengeluaran_kanwil/?id='.$data->id_pengeluaran_kanwil) ?>" class="btn btn-danger btn-xs" onclick="return confirm('apakah anda yakin ingin menghapus data \n<?php echo $data->alamat_kantor;?>?')"><i class="fa  fa-close" ></i></a></td>
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
  $(".edit").click(function(){
  var id_pengeluaran_kanwil = $(this).parents("tr").attr("id");
  ambilDataPengeluaranKanwil();
  function ambilDataPengeluaranKanwil(){
    $.ajax({
      type:'POST',
        url:'<?php echo base_url()."modul_bendahara_wilayah/edit_data_pengeluaran_kanwil/" ?>'+id_pengeluaran_kanwil,
      dataType:'json',
      success: function(data){
        for(var i=0;i<data.length;i++){

          document.getElementById("kanwiledit").value  = data[i].id_kanwil;
          document.getElementById("operasionaledit").value = data[i].id_operasional;
          document.getElementById("nominaledit").value = data[i].nominal;
          document.getElementById("id_pengeluaran_kanwiledit").value = id_pengeluaran_kanwil;
        }
      }
    });
  }
  });
</script>
</body>
</html>
