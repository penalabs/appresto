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
        Konversi bahan mentah ke bahan olahan

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">



		<?php  echo $id_logistik=$this->session->userdata('id'); ?>


		<div class="col-md-12"></div>
		<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Master bahan mentah <i class="fa  fa-hand-lizard-o" ></i></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url(). 'modul_resto/add_bahan_mentah'; ?>" method="post" class="form-horizontal">
              <input type="hidden" name="id_logistik" value="" class="form-control" id="inputEmail3">
              <div class="box-body">
                <div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Nama bahan</label>
                   <div class="col-sm-9">
                     <input type="text" name="nama_bahan" class="form-control" id="inputEmail3">
                   </div>
                 </div>
				       <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Satuan besar</label>
                  <div class="col-sm-9">
                    <input type="text" name="satuan_besar" class="form-control" id="inputEmail3">
                  </div>
                </div>
				       <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Jumlah</label>
                  <div class="col-sm-9">
                    <input type="text" name="jumlah" class="form-control" id="inputEmail3" >
                  </div>
                </div>

              </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		</div>
    <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Rubah Bahan Mentah ke Bahan Olahan <i class="fa  fa-hand-lizard-o" ></i></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url(). 'modul_resto/add_bahan_olahan'; ?>" method="post" class="form-horizontal">
              <div class="box-body">

      				<div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Bahan Mentah</label>
                        <div class="col-sm-9">
                           <select class="form-control" name="id_bahan_mentah">
                           <?php
                					 //$sql = "SELECT * FROM bahan_mentah join permintaan_bahan_detail on permintaan_bahan_detail.id_bahan_mentah=bahan_mentah.id";
                					 $sql = "SELECT * FROM bahan_mentah";
                					 $data2=$this->db->query($sql)->result();
                                      foreach($data2 as $u2){
                                      ?>
                                      <option value="<?=$u2->id; ?>"><?=$u2->nama_bahan; ?></option>
                                      <?php
                                      }
                                      ?>
                           </select>
                        </div>
                </div>

				       <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Satuan Kecil</label>
                  <div class="col-sm-9">
                    <input type="text" name="satuan_kecil" class="form-control" id="inputEmail3">
                  </div>
                </div>
				       <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Stok</label>
                  <div class="col-sm-9">
                    <input type="text" name="stok" class="form-control" id="inputEmail3" >
                  </div>
                </div>

              </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		</div>
		<div class="col-md-6">

          <!-- /.box -->
		  <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">DAFTAR Mentah </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama Bahan</th>
        				  <th>Satuan Besar</th>
        				  <th>Jumlah</th>
                  <th>Status data</th>
                  <th style="width: 40px">Detil</th>
                </tr>
        				<?php
        					$no = 1;

        					$sql = "SELECT * FROM bahan_mentah where id_logistik='$id_logistik'";
        					$data=$this->db->query($sql)->result();
        					foreach($data as $u){
        				?>
                <tr>
                   <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama_bahan; ?>
                  </td>
                  <td><?php echo $u->satuan_besar; ?></td>
				          <td>
        				  <?php
        				  $id=$u->id;
        				  $sql2 = "SELECT sum(jumlah_permintaan) as stok,permintaan_bahan_detail.status_penerimaan,permintaan_bahan_tidak_sesuai.selisih_bahan FROM permintaan_bahan_detail join permintaan_bahan_tidak_sesuai on permintaan_bahan_detail.id_detail_permintaan=permintaan_bahan_tidak_sesuai.id_detail_permintaan where permintaan_bahan_detail.id_bahan_mentah='$id' ";
        				  $data2=$this->db->query($sql2)->row();

                  $jumlah=0;
        				  if($data2->status_penerimaan=="sesuai"){
        					  echo $jumlah=(int)$data2->stok;
        				  }else{
        					  echo $jumlah=(int)$data2->stok-(int)$data2->selisih_bahan;
        				  }
        				  ?>
				          </td>
                  <td>
                  <?php
                  if($u->status==1){
                  ?>
                    <i class="fa  fa-close" ></i>
                  <?php
                  }else{
                  ?>
                    <i class="fa fa-check-square" ></i>
                  <?php
                  }
                  ?>
                  </td>
                  <td>
				  <?php

				  ?>
					<a href="<?php echo base_url('modul_resto/rubah_status_bahan_mentah?status=1&&mode=bahan_mentah');?>&&id=<?php echo $u->id ?>" class="btn btn-danger btn-xs"><i class="fa   fa-close" ></i></a>
				  <?php

				  ?>
          <a href="<?php echo base_url('modul_resto/rubah_status_bahan_mentah?status=0&&mode=bahan_mentah');?>&&id=<?php echo $u->id ?>" class="btn btn-success btn-xs"><i class="fa fa-check-square" ></i></a>
          <?php

          ?>
					   <a href="<?php echo base_url('modul_resto/pengolahan_bahan_mentah/?');?>id=<?php echo $u->id ?>&&jumlah=<?=$jumlah;?>" class="btn btn-primary btn-xs"><i class="fa   fa-eye" ></i></a>
				  <?php

				  ?>
				  </td>
                </tr>
				<?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>

		<div class="col-md-6">

          <!-- /.box -->
		  <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Konversi Bahan Olahan </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
        				  <th>Satuan Kecil</th>
        				  <th>Stok per satuan besar</th>
                  <th>Total jumlah stok satuan kecil</th>
                  <th>Status data</th>
                  <th style="width: 40px">Detil</th>
                </tr>
    				<?php
    				$no = 1;
    				if(isset($_GET['id']) && isset($_GET['jumlah'])){
    					$id_bahan_mentah=$_GET['id'];
              $jumlah=$_GET['jumlah'];
    					$sql = "SELECT * FROM bahan_olahan where id_bahan_mentah='$id_bahan_mentah'";
    					$data2=$this->db->query($sql)->result();
    					foreach($data2 as $u2){
    				?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u2->satuan_kecil;?></td>
				          <td><?php echo $u2->stok;?></td>
                  <td><?php echo (int)$u2->stok*(int)$jumlah;?></td>
                  <td>
                  <?php
                  if($u2->status==1){
                  ?>
                    <i class="fa  fa-close" ></i>
                  <?php
                  }else{
                  ?>
                    <i class="fa fa-check-square" ></i>
                  <?php
                  }
                  ?>
                  </td>
                  <td>
				  <?php

				  ?>
						<a href="<?php echo base_url('modul_resto/rubah_status_bahan_mentah_detil?status=1&&mode=detil_bahan_mentah');?>&&jumlah=<?=$jumlah;?>&&id_bahan_mentah=<?=$id_bahan_mentah;?>&&id=<?php echo $u2->id ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a>
				  <?php

				  ?>
          <a href="<?php echo base_url('modul_resto/rubah_status_bahan_mentah_detil?status=0&&mode=detil_bahan_mentah');?>&&jumlah=<?=$jumlah;?>&&id_bahan_mentah=<?=$id_bahan_mentah;?>&&id=<?php echo $u2->id ?>" class="btn btn-success btn-xs"><i class="fa   fa-check-square" ></i></a>
         <?php

         ?>
				  </td>
                </tr>
				<?php
				}
				}
				?>
              </table>
            </div>
            <!-- /.box-body -->
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
