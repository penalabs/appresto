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

        <div class="col-md-4">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Ambil Stok bahan Mentah untuk produksi <i class="fa  fa-hand-lizard-o" ></i></h3>
                </div>
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
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Simpan</button>
                  </div>
                </form>
              </div>
    		</div>
        <div class="col-md-8">
          <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">DAFTAR Mentah </h3>
                </div>
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama Bahan</th>
                      <th>Satuan Besar</th>
                      <th>Jumlah</th>
                      <th style="width: 40px">Aksi</th>
                    </tr>
                    <?php
                      $no = 1;

                      $sql = "SELECT bahan_mentah.nama_bahan,bahan_mentah.satuan_besar,produksi_bahan_olahan.jumlah_bahan_mentah,produksi_bahan_olahan.id,produksi_bahan_olahan.id_bahan_mentah,produksi_bahan_olahan.status FROM produksi_bahan_olahan join bahan_mentah on bahan_mentah.id=produksi_bahan_olahan.id_bahan_mentah where bahan_mentah.id_logistik='$id_logistik'";
                      $data=$this->db->query($sql)->result();
                      foreach($data as $u){
                    ?>
                    <tr>
                       <td><?php echo $no++ ?>.</td>
                      <td><?php echo $u->nama_bahan; ?>
                      </td>
                      <td><?php echo $u->satuan_besar; ?></td>
                      <td>
                      <?php echo $u->jumlah_bahan_mentah; ?>
                      </td>
                      <td>
                      <?php echo $u->status; ?>
                      </td>
                      <td>
                      <?php
                       if($u->status=='selesai produksi'){
                       ?>
                       <a href="<?php echo base_url('modul_logistik/produksi_bahan_olahan/?');?>id=<?php echo $u->id ?>&&id_bahan_mentah=<?php echo $u->id_bahan_mentah;?>&&status_olahan=<?=$u->status;?>" class="btn btn-warning btn-xs"><i class="fa   fa-edit" ></i>Lihat bahan olahan</a>
                       <a href="<?php echo base_url('modul_logistik/hapus_salah_data_produksi_bahan_olahan/?');?>id=<?php echo $u->id ?>&&id_bahan_mentah=<?php echo $u->id_bahan_mentah;?>&&jumlah_bahan_mentah=<?php echo $u->jumlah_bahan_mentah; ?>" class="btn btn-danger btn-xs"><i class="fa   fa-close" ></i> Hapus</a>
                       <?php
                      }else{
                      ?>
                      <a href="<?php echo base_url('modul_logistik/produksi_bahan_olahan/?');?>id=<?php echo $u->id ?>&&id_bahan_mentah=<?php echo $u->id_bahan_mentah;?>&&status_olahan=<?=$u->status;?>" class="btn btn-danger btn-xs"><i class="fa   fa-edit" ></i>Tambah bahan olahan</a>

                      <a href="<?php echo base_url('modul_logistik/rubah_status_produksi_bahan_olahan/?');?>id=<?php echo $u->id ?>" class="btn btn-success btn-xs"><i class="fa   fa-check" ></i> Selesai produksi</a>
                      <?php
                      }
                      ?>



                      <?php

                      ?>
                      </td>
                    </tr>
                      <?php } ?>
                  </table>
                </div>
              </div>
        </div>
        <div class="col-md-12"></div>

        <?php
        if(isset($_GET['id'])){
        ?>
        <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Konversi Bahan Mentah ke Bahan Olahan <i class="fa  fa-hand-lizard-o" ></i></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url(). 'modul_logistik/aksi_produksi_bahan_olahan'; ?>" method="post" class="form-horizontal">
                  <input type="hidden" name="id_produksi_bahan_olahan" value="<?php echo $_GET['id'];?>" class="form-control" id="inputEmail3" >
                  <input type="hidden" name="status_olahan" value="<?php echo $_GET['status_olahan'];?>" class="form-control" id="inputEmail3" >
                  <div class="box-body">
          				<div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Bahan Mentah</label>
                            <div class="col-sm-9">
                               <?php
                    					 //$sql = "SELECT * FROM bahan_mentah join permintaan_bahan_detail on permintaan_bahan_detail.id_bahan_mentah=bahan_mentah.id";
                               $id_bahan_mentah=$_GET['id_bahan_mentah'];
                               $sql = "SELECT * FROM bahan_mentah where id='$id_bahan_mentah'";
                    					 $data2=$this->db->query($sql)->result();
                                          foreach($data2 as $u2){
                                          ?>
                                          <input type="hidden" name="id_bahan_mentah" value="<?=$u2->id; ?>" class="form-control" id="inputEmail3" >
                                          <input type="text" name="id_bahan_mentah_txt" value="<?=$u2->nama_bahan; ?>" class="form-control" id="inputEmail3" readonly>
                                          <?php
                                          }
                                          ?>
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
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Bahan Olahan </h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama Bahan</th>
                  <th>Satuan Kecil</th>
                  <th>Jumlah</th>

                  <th style="width: 40px">Aksi</th>
                </tr>
                <?php
                  $no = 1;
                  $id_produksi_bahan_olahan=$_GET['id'];
                  $sql = "SELECT bahan_olahan.nama_bahan,bahan_olahan.satuan_kecil,produksi_bahan_olahan_detail.jumlah_bahan_olahan,produksi_bahan_olahan_detail.id,produksi_bahan_olahan_detail.id_bahan_olahan FROM produksi_bahan_olahan_detail join bahan_olahan on bahan_olahan.id=produksi_bahan_olahan_detail.id_bahan_olahan where produksi_bahan_olahan_detail.id_produksi_bahan_olahan='$id_produksi_bahan_olahan'";
                  $data=$this->db->query($sql)->result();
                  foreach($data as $u){
                ?>
                <tr>
                   <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama_bahan; ?>
                  </td>
                  <td><?php echo $u->satuan_kecil; ?></td>
                  <td>
                  <?php echo $u->jumlah_bahan_olahan; ?>
                  </td>
                  <td>
                  <?php
                  if($_GET['status_olahan']!='selesai produksi'){

                   ?>
                  <a href="<?php echo base_url('modul_logistik/aksi_hapus_produksi_bahan_olahan/?');?>id=<?php echo $id_produksi_bahan_olahan;?>&&id_bahan_mentah=<?php echo $id_bahan_mentah;?>&&id_produksi_bahan_olahan_detail=<?php echo $u->id ?>&&id_bahan_olahan=<?php echo $u->id_bahan_olahan ?>&&jumlah_bahan_olahan=<?php echo $u->jumlah_bahan_olahan; ?>&&status_olahan=<?php echo $_GET['status_olahan'];?>" class="btn btn-danger btn-xs"><i class="fa   fa-close" ></i></a>
                  <?php
                  }
                  ?>
                  </td>
                </tr>
                  <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
            </div>
        </div>
        <?php
        }
        ?>

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
