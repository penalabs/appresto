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
        Entri Bahan Olahan

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">



		<?php  $id_logistik=$this->session->userdata('id'); ?>


		<div class="col-md-12"></div>

    <div class="col-md-5">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ambil Stok bahan Mentah untuk produksi <i class="fa  fa-hand-lizard-o" ></i></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url(). 'modul_logistik/aksi_update_stok_bahan_mentah'; ?>" method="post" class="form-horizontal">
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
                       <label for="inputEmail3" class="col-sm-3 control-label">Ambil Stok Bahan Mentah</label>
                       <div class="col-sm-9">
                         <input type="text" name="stok_bahan_mentah" class="form-control" id="inputEmail3" >
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

        <div class="col-md-7">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Produksi Bahan Olahan <i class="fa  fa-hand-lizard-o" ></i></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url(). 'modul_logistik/aksi_produksi_bahan_olahan'; ?>" method="post" class="form-horizontal">
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
                              <label for="inputPassword3" class="col-sm-3 control-label">Ke Bahan Olahan</label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="id_bahan_olahan">
                                 <?php
                      					 //$sql = "SELECT * FROM bahan_mentah join permintaan_bahan_detail on permintaan_bahan_detail.id_bahan_mentah=bahan_mentah.id";
                      					 $sql = "SELECT * FROM bahan_olahan";
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
                      <!-- <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Satuan Kecil</label>
                                <div class="col-sm-9">
                                   <select class="form-control" name="satuan_keci">

                                              <option value="buah">Buah</option>
                                              <option value="buah">Pack</option>

                                   </select>
                                </div>
                        </div> -->

                
    				       <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Hasil produksi Jumlah Bahan Olahan</label>
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
                  <th style="width: 40px">Aksi</th>
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
        				  <?php echo $u->stok; ?>
				          </td>
                  <td>
                  <?php
                  if($u->status==1){
                  ?>
                    <i class="fa fa-check-square" ></i>
                  <?php
                  }else{
                  ?>

                    <i class="fa  fa-close" ></i>
                  <?php
                  }
                  ?>
                  </td>
                  <td>

					        <a href="<?php echo base_url('modul_logistik/rubah_status/?');?>id=<?php echo $u->id ?>&&status=<?php echo $u->status ?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i></a>
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
              <h3 class="box-title">DAFTAR Olahan </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama Bahan</th>
                  <th>Satuan Kecil</th>
                  <th>Jumlah</th>
                  <th>Status data</th>
                  <th style="width: 40px">Aksi</th>
                </tr>
                <?php
                  $no = 1;

                  $sql = "SELECT * FROM bahan_olahan where id_logistik='$id_logistik'";
                  $data=$this->db->query($sql)->result();
                  foreach($data as $u){
                ?>
                <tr>
                   <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama_bahan; ?>
                  </td>
                  <td><?php echo $u->satuan_kecil; ?></td>
                  <td>
                  <?php echo $u->stok; ?>
                  </td>
                  <td>
                  <?php
                  if($u->status==1){
                  ?>
                    <i class="fa fa-check-square" ></i>
                  <?php
                  }else{
                  ?>

                    <i class="fa  fa-close" ></i>
                  <?php
                  }
                  ?>
                  </td>
                  <td>

                  <a href="<?php echo base_url('modul_logistik/rubah_status_bahan_olahan/?');?>id=<?php echo $u->id ?>&&status=<?php echo $u->status ?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i></a>
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
