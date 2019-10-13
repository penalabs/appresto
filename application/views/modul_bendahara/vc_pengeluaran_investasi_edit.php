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
        Bendahara
       
      </h1>
      
    </section>

     <section class="content">
  <div class="row">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pengeluaran Investasi<i class="fa  fa-hand-lizard-o" ></i></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($data_pengeluaran_cabang_alat as $dataedit) { ?>
			
            <form action="<?php echo base_url(). 'modul_bendahara/bendahara_pengeluaran_investasi_editaksi'; ?>" method="post" class="form-horizontal">
              <center>ALAT : <?php echo $dataedit->nama_peralatan; ?></center>
			  <input type="hidden" name="id" class="form-control" value="<?php echo $dataedit->id_pengeluaran_cabang; ?>" >
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Cabang</label>
                  <div class="col-sm-10">
                    <select name="nama_cabang" class="form-control">
                      <option value="<?php echo $dataedit->id; ?>"><?php echo $dataedit->nama_resto; ?></option>
                      <?php foreach ($data_cabang_resto as $datacabangresto) { ?>
                        <option value="<?php echo $datacabangresto->id; ?>"><?php echo $datacabangresto->nama_resto; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                
                </div>
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" name="jumlah" class="form-control" value="<?php echo $dataedit->jumlah; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Masa Pemanfaatan</label>
                  <div class="col-sm-10">
                    <select name="masapemanfaatan" class="form-control">
                      <option value="<?php echo $dataedit->masa_pemanfatan; ?>"><?php echo $dataedit->masa_pemanfatan; ?></option>
                      <option value="1 bulan">1 bulan</option>
                      <option value="2 bulan">2 bulan</option>
                      <option value="3 bulan">3 bulan</option>
                      <option value="4 bulan">4 bulan</option>
                      <option value="5 bulan">5 bulan</option>
                      <option value="6 bulan">6 bulan</option>
                      <option value="7 bulan">7 bulan</option>
                      <option value="8 bulan">8 bulan</option>
                      <option value="9 bulan">9 bulan</option>
                      <option value="10 bulan">10 bulan</option>
                      <option value="11 bulan">11 bulan</option>
                      <option value="12 bulan">12 bulan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nominal</label>
                  <div class="col-sm-10">
                    <input type="number" name="nominal" class="form-control" value="<?php echo $dataedit->nominal; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Penyusutan</label>
                  <div class="col-sm-10">
                    <input type="number" name="penyusutan" class="form-control" value="<?php echo $dataedit->nominal_penyusutan; ?>" >
                  </div>
                </div>
              </div>
        
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          <?php } ?>
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
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
