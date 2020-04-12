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
        Manajemen Investasi

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
  	      <div class="col-xs-10">
            <div class="box box-default">
              <div class="box-header with-border">

              </div>
              <div class="box-body">
  						<?php
  						  //if(isset($_GET['user'])){
  							  //$user=$_GET['user'];
  						  ?>
  						  
                <?php
              // }
               ?>
              </div>
            </div>
          </div>

          <div class="col-md-4">

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Total Investasi</h3>
                    <a href="#" class="btn btn-primary pull-right btn-sm" data-toggle="modal" data-target="#addInvestasi"><span class="fa fa-plus">&nbsp </span > Tambah</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="totalInvestasi" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Owner</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody id="listDetailInvestasi">
                      <?php
                        $no = 1;
                        foreach($data1 as $u){
                      ?>
                              <tr>
                                <td><?php echo $u->nama ?></td>
                                <td><?php echo $u->investasi ?></td>
                                <td></a>
                                   <a href="javascript:void(0);" class="btn btn-primary btn-xs showDetail" data-id="<?php echo $u->id ?>"
                                   ><i class="fa  fa-eye" ></i></a>
                                 </td>
                              </tr>
                      <?php } ?>

                      </tbody>

                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
          </div>

          <div class="col-md-8">

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Permintaan Pembukaan Cabang</h3>
                    <a href="#" class="btn btn-primary pull-right btn-sm" data-toggle="modal" data-target="#addInvestasi"><span class="fa fa-plus">&nbsp </span > Tambah Resto</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="permitaanBukaResto" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nama Resto</th>
                        <th>Alamat</th>
                        <th>Perkiraan Dana</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody id="listBukaResto">
                      <?php
                        $no = 1;
                        foreach($data2 as $u){
                      ?>
                              <tr>
                                <td><?php echo $u->nama_resto ?></td>
                                <td><?php echo $u->alamat ?></td>
                                <td><?php echo $u->perkiraan_dana ?></td>
                                <td><?php echo $u->status ?></td>
                                <td></a>
                                  <?php
                                      if($u->status == "permintaan"){
                                  ?>
                                   <a href="javascript:void(0);" class="btn btn-primary btn-xs Konfirmasi" data-id="<?php echo $u->id ?>"
                                   >Setujui</i></a>
                                   
                                  <?php
                                      }
                                      if($u->status != "permintaan"){
                                  ?>
                                      <a href="javascript:void(0);" class="btn btn-primary btn-xs showDetailBukaResto" data-id="<?php echo $u->id_resto ?>"
                                      >Lihat</i></a>
                                  <?php } ?>
                                   
                                 </td>
                              </tr>
                      <?php } ?>

                      </tbody>

                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
          </div>

      	  <div class="col-md-12">

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Data Investasi</h3>
                    <!-- <a href="<?php echo base_url('superadmin/add_investasi');?>" type="button" class="btn btn-success" >Tambah</a> -->
                    <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addInvestasi"><span class="fa fa-plus">&nbsp </span > Tambah Investasi</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Owner</th>
                        <th>Bendahara</th>
                        <th>Tanggal</th>
                        <th>Jumlah Invest</th>
                        <th>Jangka Waktu</th>
                        <th>Persentase Omset</th>
                        <th>Jumlah Omset</th>
      				          <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
              				<?php
              					$no = 1;
              					foreach($data as $u){
              				?>
                              <tr>
                                <td><?php echo $no++ ?>.</td>
                                <td><?php echo $u->nama_owner ?>
                                </td>
                                <td><?php echo $u->nama_bendahara ?></td>
                                <td><?php echo $u->tanggal ?></td>
                                <td><?php echo $u->jumlah_investasi ?></td>
                                <td><?php echo $u->jangka_waktu ?></td>
                                <td><?php echo $u->persentase_omset ?></td>
                                <td><?php echo (int)$u->persentase_omset/100*(int)$u->jumlah_investasi+$u->jumlah_investasi; ?></td>
              				          <td> <a href="<?php echo base_url('superadmin/edit_investasi/?');?>id=<?php echo $u->id ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a>
                                   <a href="<?php echo base_url('superadmin/hapus_investasi/?');?>id=<?php echo $u->id ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a>
                                   <a href="<?php echo base_url('superadmin/setupowner/?');?>id=<?php echo $u->id ?>" class="btn btn-primary btn-xs"><i class="fa  fa-eye" ></i></a>
                                 </td>
                              </tr>
              				<?php } ?>

                      </tbody>

                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
          </div>



          <?php
          if(isset($_GET['id'])){
           ?>
          <div class="col-md-4">
                <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <div class="box-tools pull-right">
                      <!-- <a href="<?php echo base_url('modul_general_manager/permintaaninvestasi_tambah'); ?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Entry</a> -->

                    </div>
                  </div>
                  <div class="box-header">
                    <h3 class="box-title">Masukkan Omset </h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>#</th>

                        <th>Tanggal</th>

                        <th>Omset</th>

                        <!-- <th>Nominal</th>
                        <th>Penyusutan %</th> -->
                        <!-- <th>Aksi</th> -->
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                        $no = 1;

                        $id_investasi_owner=$_GET['id'];
                        $sql2 = "SELECT * FROM omset_investasi_owner where id_investasi_owner='$id_investasi_owner'";
                    		$permintaaninvestasi = $this->db->query($sql2)->result();
                        foreach($permintaaninvestasi as $u){
                      ?>
                      <tr>
                        <td><?php echo $no++ ?>.</td>
                        <td><?php echo $u->tanggal ?></td>
                        <td><?php echo $u->penyusutan_invest ?></td>
                        <td>

                <!-- <a href="<?php echo base_url('C_modul_admin_resto/konfirmasi_alat/'.$u->id); ?>" class="btn btn-primary btn-xs"><i class="fa  fa-check" ></i></a> -->
                <!-- <a href="<?php echo base_url('modul_general_manager/permintaaninvestasi_edit/?id='.$u->id); ?>" class="btn btn-success btn-xs"><i class="fa  fa-edit" ></i></a> -->

                        <a href="<?php echo base_url('superadmin/penyusutan_invest_hapus/?id='.$u->id.'&&id_investasi_owner='.$id_investasi_owner); ?>" class="btn btn-danger btn-xs"><i class="fa  fa-close" ></i></a></td>

                      </tr>
                      <?php
                          }
                        }
                       ?>

                      </tbody>

                    </table>
                  </div>
                </div>
          </div>

        <?php
        if(isset($_GET['id'])){
         ?>
        <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Quick Input</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form  action="<?php echo base_url(). 'superadmin/action_add_omset'; ?>" method="post" role="form">
            <div class="box-body">

              <input type="hidden" class="form-control" value="<?php echo $_GET['id']; ?>" id="id_investasi_owner" name="id_investasi_owner" placeholder="Tanggal">
            <div class="form-group">
              <label for="exampleInputPassword1">Tanggal</label>
              <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Input Jumlah Omset</label>
              <input type="number" class="form-control" id="exampleInputPassword1" name="penyusutan_invest" placeholder="Persentase omset">
            </div>
            <!-- <div class="form-group">
              <label for="exampleInputPassword1">Jumlah Omset</label>
              <input type="number" class="form-control" id="exampleInputPassword1" name="jumlah_omset" placeholder="Jumlah omset">
            </div> -->
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
          </div>
        </div>
        <?php
        }
       ?>

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

        <div class="modal fade" id="modalDetailInvesatasi">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Investasi&hellip;</h4>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                  <div class="col-md-12">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>tanggal</th>
                            <th>Jumalah</th>
                          </tr>
                          </thead>
                      <tbody id="modalDetail">
                          
                      </tbody>

                  </table>
                </div>
              </div>
                  
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

        <div class="modal fade" id="addInvestasi">
          <div class="modal-dialog">
            <div class="modal-content">
              <form id="addInvestasi" method="post" action="<?php echo base_url().'superadmin/tambahInvestasi'?>">
              <div class="modal-body">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <select name="tipe_inves" id="tipe_inves" class="form-control">
                        <option value="0" >Pilih Tipe Modal</option>
                        <option value="1">Modal Awal</option>
                        <option value="2">Modal Tambahan</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <select name="owner" id="owner" class="form-control">
                        <?php
                        $sql = "SELECT * FROM owner";
                        $data=$this->db->query($sql)->result();
                        foreach($data as $u){ ?>
                          <option value="<?php echo $u->id; ?>"><?php echo $u->nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12 hilang">
                    <div class="form-group row">
                      <select name="resto" id="resto" class="form-control">
                        <option value="0">Pilih Resto</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <input type="text" name="alamat1" id="alamat1" readonly class="form-control text-uppercase" required>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <input type="text" name="bendahara" id="bendahara" readonly class="form-control text-uppercase" required>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label>Jumlah</label>
                      <input type="text" name="jumlah_investasi" id="jumlah_investasi"  class="form-control text-uppercase" required>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label>Jangka Waktu</label>
                      <input type="text" name="jangka_waktu" id="jangka_waktu"  class="form-control text-uppercase" required>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label>Omset dalam Persen</label>
                      <input type="text" name="omset" id="omset"  class="form-control text-uppercase" required>
                    </div>
                  </div>

              </div>
              <div class="modal-footer">
                <input type="hidden" name="id_bend" id="id_bend" required>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modalLihatBukaResto">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-body">
                <div class="form-group row">
                <div class="col-lg-6 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3 id="pdana">000000</h3>
                      <p>Perkiraan Dana</p>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3 id="kdana">000000</h3>
                      <p>Dana Sudah di Transfer</p>
                    </div>
                  </div>
                </div>
                  
            <div class="col-md-12">

                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Permintaan Pembukaan Cabang</h3><br>
                    
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="permitaanBukaResto" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nama Owner</th>
                        <th>Nama Resto</th>
                        <th>Tanggal</th>
                        <th>Jumlah Investasi</th>
                      </tr>
                      </thead>
                      <tbody id="listInvestor">
                      </tbody>

                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
          </div>

                </div>
              </div>
              <div class="modal-footer">
                
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


      <form id="addResto" method="post" action="<?php echo base_url().'superadmin/addBukaResto'?>"> 
        <div class="modal fade" id="modalBukaResto">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Buka Resto</h4>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                  <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-12 col-form-label">Kanwil</label>
                        <div class="col-md-12">
                          <input type="text" name="kanwil" id="kanwil" readonly class="form-control" required> 
                        </div>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-12 col-form-label">Nama Resto</label>
                        <div class="col-md-12">
                          <input type="text" name="nama_resto" id="nama_resto" readonly class="form-control" required> 
                        </div>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-12 col-form-label">Alamat</label>
                        <div class="col-md-12">
                          <input type="text" name="alamat" id="alamat" readonly class="form-control" required> 
                        </div>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-12 col-form-label">Telp Cabang</label>
                        <div class="col-md-12">
                          <input type="text" name="telp" id="telp" class="form-control"> 
                        </div>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-12 col-form-label">Pajak</label>
                        <div class="col-md-12">
                          <input type="text" name="pajak" id="pajak"  class="form-control"> 
                        </div>
                      </div>
                  </div>
              </div>
                  
              </div>
              <div class="modal-footer">
                <input type="hidden" name="id_ref" id="id_ref"  class="form-control" required>
                <input type="hidden" name="id_ref_kanwil" id="id_ref_kanwil"  class="form-control" required>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </from>

    

       
        
     

    </section>
    <!-- /.content -->
  </div>
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
  $('#tanggal').datepicker({
       format: 'yyyy-mm-dd'
   });
  $('#totalInvestasi').DataTable({ 
    "scrollY"        : "150px",
    'paging'         : false,
    'searching'      : true,
    'ordering'    : true,
    'info'        : false

  });
  $('#permitaanBukaResto').DataTable({
    "scrollY"        : "150px",
    'paging'         : false,
    'searching'      : true,
    'ordering'    : true,
    'info'        : false


  });

  $('#listDetailInvestasi').on('click','.showDetail',function(){

    $('#modalDetailInvesatasi').modal('show');
    //$("#idInv").val($(this).data('id'));
    //var getDetail =$(this).data('id');
    //$("#idInv").val(getDetail);

    var getDetail =$(this).data('id');
    $.ajax({
        url : "<?php echo site_url('superadmin/detailInvestasi');?>",
        method : "POST",
        data : {getDetail: getDetail},
        async : true,
        dataType : 'json',
        success: function(data){
          var html = '';
          var i;
          var n =1;
            for(i=0; i<data.length; i++){
              html += '<tr> <td>'+n+'</td> <td>'+data[i].tanggal+'</td> <td>'+data[i].jumlah_investasi+'</td></tr>';
              n++;
            }
            $('#modalDetail').html(html);
          }
                });
          return false;

      });

  $('#listBukaResto').on('click','.Konfirmasi',function(){
    $('#modalBukaResto').modal('show');
    var getDetail =$(this).data('id');
    //$("#kanwil").val(getDetail);
              
    $.ajax({
        url : "<?php echo site_url('superadmin/detailBukaResto');?>",
        method : "POST",
        data : {getDetail: getDetail},
        async : true,
        dataType : 'json',
        success: function(data){
          var i;
            for(i=0; i<data.length; i++){
              $("#kanwil").val(data[i].alamat_kantor);
              $("#nama_resto").val(data[i].nama_resto);
              $("#alamat").val(data[i].alamat);
              $("#id_ref").val(data[i].id);
              $("#id_ref_kanwil").val(data[i].id_kanwil);
            }
            
          }
                });
          return false;

      });

  $('#listBukaResto').on('click','.showDetailBukaResto',function(){
        $('#modalLihatBukaResto').modal('show');
        var getDetail =$(this).data('id');
        //$("#id_ref_resto").val(getDetail);
        //alert(getDetail);
        $.ajax({
        url : "<?php echo site_url('superadmin/kurangBukaResto');?>",
        method : "POST",
        data : {getDetail: getDetail},
        async : true,
        dataType : 'json',
        success: function(data){
          var i;
          if(data.length<1){
              document.getElementById("pdana").innerHTML ="0";
              document.getElementById("kdana").innerHTML = "0";
          }else{
            for(i=0; i<data.length; i++){
              document.getElementById("pdana").innerHTML = data[i].perkiraan_dana;
              document.getElementById("kdana").innerHTML = data[i].investasi;
            }
          }
            
          }
                });

       $.ajax({
        url : "<?php echo site_url('superadmin/listInvestorBukaResto');?>",
        method : "POST",
        data : {getDetail: getDetail},
        async : true,
        dataType : 'json',
        success: function(data){
          var html = '';
          var i;
          var n =1;
            for(i=0; i<data.length; i++){
              html += '<tr><td>'+data[i].nama+'</td><td>'+data[i].nama_resto+'</td><td>'+data[i].tanggal+'</td><td>'+data[i].jumlah_investasi+'</td></tr>';
              n++;
            }
            $('#listInvestor').html(html);
          }
                });
          return false; });


  //onchange
  $('#tipe_inves').change(function(){ 
    var id=$(this).val();
    if(id=="0"){
      $('#resto').html('<option value="0">Pilih Resto</option>');
    }else{
      $.ajax({
      url : "<?php echo site_url('superadmin/onChangeModal');?>",
      method : "POST",
      data : {id: id},
      async : true,
      dataType : 'json',
      success: function(data){
        var html = '';
        var i;
        var n =1;
        for(i=0; i<data.length; i++){
          html += '<option value='+data[i].id+'>'+data[i].nama_resto+'</option>';
        }
        $('#resto').html('<option value="0">Pilih Resto</option>'+html);
      }
    });
    }
     return false;
  });

  $('#resto').change(function(){ 
    var id=$(this).val();
    if(id=="0"){
      $("#alamat1").val("");
      $("#bendahara").val("");
      $("#id_bend").val("");
    }else{
      $.ajax({
      url : "<?php echo site_url('superadmin/onChangeResto');?>",
      method : "POST",
      data : {id: id},
      async : true,
      dataType : 'json',
      success: function(data){
        var i;
        for(i=0; i<data.length; i++){
          $("#alamat1").val(data[i].alamat);
          $("#bendahara").val(data[i].nama);
          $("#id_bend").val(data[i].id);
        }
      }
    });
    }
      return false;
  });

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
</body>
</html>
