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
        Produksi

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
  	<div class="row">
      <?php if($user_data = $this->session->userdata('pesan')){ ?>
      <div class="col-md-12">
        <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h4><i class="icon fa fa-check"></i> Alert!</h4>
               <?php echo $user_data; ?>
       </div>
        </div>
       <?php
        }
        ?>

      <div class="col-md-4">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah produksi <i class="fa  fa-hand-lizard-o" ></i></h3>
              </div>
              <form action="<?php echo base_url(). 'modul_produksi/aksi_tambah_produksi'; ?>" method="post" class="form-horizontal">
                <div class="box-body">
        				<div class="form-group">
                          <label for="inputPassword3" class="col-sm-3 control-label">Nama Menu</label>
                          <div class="col-sm-9">
                             <select class="form-control" name="nama_menu">
                             <?php
                  					 //$sql = "SELECT * FROM bahan_mentah join permintaan_bahan_detail on permintaan_bahan_detail.id_bahan_mentah=bahan_mentah.id";
                  					 $id_resto=$this->session->userdata('id_resto');
									           $sql = "SELECT * FROM menu where id_resto='$id_resto'";
                  					 $data2=$this->db->query($sql)->result();
                                        foreach($data2 as $u2){
                                        ?>
                                        <option value="<?=$u2->id; ?>"><?=$u2->menu; ?></option>
                                        <?php
                                        }
                                        ?>
                             </select>
                          </div>
                  </div>
                <div class="form-group">
                         <label for="inputEmail3" class="col-sm-3 control-label">Jumlah produksi</label>
                         <div class="col-sm-9">
                           <input type="text" name="jumlah_produksi" class="form-control" id="inputEmail3" >
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
              <div class="box-header">
                <h3 class="box-title">Daftar Produksi Menu Masakan</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
  				          <th>Nama Menu</th>
                    <th>Tanggal</th>
                    <th>Jumlah Masakan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
            					$no = 1;
            					foreach($data as $u){
            				?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$u->menu;?></td>
                        <td><?=$u->tanggal;?></td>
                        <td><?=$u->jumlah_masakan;?></td>
                        <td><a href="<?php echo base_url('modul_produksi/produksi_masakan/?');?>id=<?php echo $u->id ?>&&menu=<?=$u->menu;?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Lihat bahan</a></td>
                    </tr>
                    <?php
                      $no++;
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <?php
          if(isset($_GET['id'])){
            $id_produksi_masakan=$_GET['id'];
           ?>

          <div class="col-md-6">
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Tambah bahan mentah <i class="fa  fa-hand-lizard-o" ></i></h3>
                  </div>
                  <form action="<?php echo base_url(). 'modul_produksi/aksi_tambah_bahan_mentah_produksi'; ?>" method="post" class="form-horizontal">
                    <div class="box-body">
                      <input type="hidden" name="menu" class="form-control" id="inputEmail3" value="<?=$_GET['menu'];?>" >
                      <input type="hidden" name="id_produksi_masakan" class="form-control" id="inputEmail3" value="<?=$_GET['id'];?>" >
                      <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Bahan Mentah</label>
                                <div class="col-sm-9">
                                   <select class="form-control" name="id_bahan_mentah">
                                   <?php
                                   //$sql = "SELECT * FROM bahan_mentah join permintaan_bahan_detail on permintaan_bahan_detail.id_bahan_mentah=bahan_mentah.id";
                                   $sql = "SELECT * FROM stok_bahan_mentah_produksi join bahan_mentah on bahan_mentah.id=stok_bahan_mentah_produksi.id_bahan_mentah";
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
                                 <label for="inputEmail3" class="col-sm-3 control-label">Jumlah bahan</label>
                                 <div class="col-sm-9">
                                   <input type="text" name="jumlah_bahan" class="form-control" id="inputEmail3" >
                                 </div>
                        </div>
                      </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-info pull-right">Simpan</button>
                    </div>
                  </form>
                </div>
          </div>



          <div class="col-md-6">
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Tambah bahan olahan <i class="fa  fa-hand-lizard-o" ></i></h3>
                  </div>
                  <form action="<?php echo base_url(). 'modul_produksi/aksi_tambah_bahan_olahan_produksi'; ?>" method="post" class="form-horizontal">
                    <div class="box-body">
                    <input type="hidden" name="menu" class="form-control" id="inputEmail3" value="<?=$_GET['menu'];?>" >
                    <input type="hidden" name="id_produksi_masakan" class="form-control" id="inputEmail3" value="<?=$_GET['id'];?>" >
            				<div class="form-group">
                              <label for="inputPassword3" class="col-sm-3 control-label">Bahan Olahan</label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="id_bahan_olahan">
                                 <?php
                      					 //$sql = "SELECT * FROM bahan_mentah join permintaan_bahan_detail on permintaan_bahan_detail.id_bahan_mentah=bahan_mentah.id";
                      					 $sql = "SELECT * FROM stok_bahan_olahan_produksi join bahan_olahan on bahan_olahan.id=stok_bahan_olahan_produksi.id_bahan_olahan";
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
                               <label for="inputEmail3" class="col-sm-3 control-label">Jumlah bahan</label>
                               <div class="col-sm-9">
                                 <input type="text" name="jumlah_bahan" class="form-control" id="inputEmail3" >
                               </div>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-info pull-right">Simpan</button>
                    </div>
                  </form>
                </div>
      		</div>


          <div class="col-md-12">
            <h3 class="box-title"><?php echo $_GET['menu'];?> MEMBUTUHKAN BAHAN <i class="fa  fa-hand-lizard-o" ></i></h3>
          </div>


          <div class="col-md-6">
            <?php if($responce = $this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h4><i class="icon fa fa-check"></i> Alert!</h4>
                   <?= $responce;?>
            </div>
            <?php endif;?>
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Bahan mentah</h3>
              </div>
                    <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
        				    <th>Bahan mentah</th>
                    <th>Jumlah bahan mentah</th>
                    <th>Satuan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    $sql = "SELECT bahan_mentah_masakan.id,bahan_mentah_masakan.id_produksi_masakan,bahan_mentah_masakan.id_bahan_mentah,bahan_mentah_masakan.jumlah,bahan_mentah.nama_bahan,bahan_mentah.satuan_besar,bahan_mentah.stok FROM bahan_mentah_masakan join bahan_mentah on bahan_mentah.id=bahan_mentah_masakan.id_bahan_mentah where bahan_mentah_masakan.id_produksi_masakan='$id_produksi_masakan'";
                		$data2=$this->db->query($sql)->result();
                    foreach($data2 as $u){
                    ?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?= $u->nama_bahan;?></td>
                        <td><?= $u->jumlah;?></td>
                        <td><?= $u->satuan_besar;?></td>
                        <td>
                        <a href="<?php echo base_url('modul_produksi/hapus_produksi_masakan_bahan_mentah/?');?>id=<?php echo $u->id ?>&&menu=<?=$_GET['menu'];?>&&jumlah=<?=$u->jumlah;?>&&id_produksi_masakan=<?=$id_produksi_masakan;?>&&id_bahan_mentah=<?=$u->id_bahan_mentah;?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Hapus bahan</a>
                      </td>
                    </tr>
                    <?php
                    $no++;
                    }
                   ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>




          <div class="col-md-6">
              <?php if($responce = $this->session->flashdata('success2')): ?>
              <div class="alert alert-success alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-check"></i> Alert!</h4>
                     <?= $responce;?>
              </div>
              <?php endif;?>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Bahan olahan</h3>
                </div>
                      <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
          				    <th>Bahan olahan</th>
                      <th>Jumlah Bahan Olahan</th>
                      <th>Satuan kecil</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $sql3 = "SELECT bahan_olahan_masakan.id,bahan_olahan_masakan.id_produksi_masakan,bahan_olahan_masakan.id_bahan_olahan,bahan_olahan_masakan.jumlah,bahan_olahan.nama_bahan,bahan_olahan.satuan_kecil,bahan_olahan.stok FROM bahan_olahan_masakan join bahan_olahan on bahan_olahan.id=bahan_olahan_masakan.id_bahan_olahan where bahan_olahan_masakan.id_produksi_masakan='$id_produksi_masakan'";
                      $data3=$this->db->query($sql3)->result();
                      foreach($data3 as $u3){
                      ?>
                      <tr>
                          <td><?= $no;?></td>
                          <td><?= $u3->nama_bahan;?></td>
                          <td><?= $u3->jumlah;?></td>
                          <td><?= $u3->satuan_kecil;?></td>
                          <td><a href="<?php echo base_url('modul_produksi/hapus_produksi_masakan_bahan_olahan/?');?>id=<?php echo $u3->id ?>&&menu=<?=$_GET['menu'];?>&&jumlah=<?=$u3->jumlah;?>&&id_produksi_masakan=<?=$id_produksi_masakan;?>&&id_bahan_olahan=<?=$u3->id_bahan_olahan;?>" class="btn btn-primary btn-xs"><i class="fa   fa-edit" ></i>Hapus bahan</a></td>
                      </tr>
                      <?php
                      $no++;
                      }
                     ?>
                    </tbody>
                  </table>
                </div>
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
  $(document).ready(function() {

  });
</script>

</body>
</html>
