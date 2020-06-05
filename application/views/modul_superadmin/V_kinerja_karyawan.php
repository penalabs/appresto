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
        General Manager Kanwil
		
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	

	<div class="row">
	    <div class="col-xs-12">
      <!--     <div class="box box-default">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
              <a href="<?php echo base_url('superadmin/add_gaji');?>" type="button" class="btn btn-success" >  Tambah
              </a>
            </div>
          </div>
        </div> -->
	<div class="col-md-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kinerja Karyawan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Karyawan</th>
                  <th>Nama Pelanggan</th>
                  <th>Tanggal</th>
                  <th>Jumlah Point</th>
                  <th>Aksi</th>

				          <!-- <th>Aksi</th> -->
                </tr>
                </thead>
                <tbody>
				<?php
					$no = 1;
					foreach($data as $u){
				?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama ?>
                  </td>
                  <td><?php echo $u->nama_pemesan ?></td>
                  <td><?php echo $u->tanggal ?></td>
                  <td><?php echo $u->jml_point ?></td>
				          <td>
                    <a href="<?php echo base_url('superadmin/view_kinerja/');?><?php echo $u->id_user_resto; ?>" class="btn btn-success btn-xs"><i class="fa fa-eye" ></i></a>
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
	</div>



<div class="col-xs-12">
	<div class="col-md-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kinerja Karyawan </h3><br>
              	<?php 
              	$superadmin = $this->session->userdata('tipe');
              	if($superadmin=="superadmin"){
              		//tidak ada aksi
              	}else{
              		echo '<a href="#" class="btn btn-success addKinerja" data-toggle="modal" data-target="#addEmpModal"><span class="fa fa-plus"></span> Tambah </a>';
              	}?>
			  	
            	
            	
            </div>
            <!-- /.box-header -->
			<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Resto</th>
                  <th>Nama Karyawan</th>
                  <th>Tanggal Awal</th>
                  <th>Tanggal Akhir</th>
				  <th>Status</th>
				  <th>Keterangan</th>
                  <th>Aksi</th>

				          <!-- <th>Aksi</th> -->
                </tr>
                </thead>
                <tbody id="listRecord">
				<?php
					function limit_words($string, $word_limit){
						$words = explode(" ",$string);
						return implode(" ",array_splice($words,0,$word_limit));
					}
					$no = 1;
					foreach($hasil as $u){
				?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama_resto ?></td>
                  <td><?php echo $u->nama ?></td>
				  <td><?php echo $u->tgl_mulai ?></td>
				  <td><?php echo $u->tgl_akhir ?></td>
                  <td><?php echo $u->status ?></td>
				  <td><?php echo (str_word_count($u->keterangan) > 1 ? substr($u->keterangan,0,30)."..." : $u->keterangan)?></td>
				  <td>
                    <a class="btn btn-success btn-xs showLihat"
					data-nama="<?php echo $u->nama ?>"
					data-nama_resto="<?php echo $u->nama_resto ?>"
					data-tgl_mulai="<?php echo $u->tgl_mulai ?>"
					data-tgl_akhir="<?php echo $u->tgl_akhir ?>"
					data-status="<?php echo $u->status; ?>"
					data-keterangan="<?php echo $u->keterangan ?>"><i class="fa fa-eye" ></i></a>
					
					<a class="btn btn-info btn-xs editPass"
					data-id="<?php echo $u->id_log ?>"
					data-user_resto="<?php echo $u->id_user_resto ?>"
					data-nama="<?php echo $u->nama ?>"
					data-nama_resto="<?php echo $u->nama_resto ?>"
					data-tgl_mulai="<?php echo $u->tgl_mulai ?>"
					data-tgl_akhir="<?php echo $u->tgl_akhir ?>"
					data-status="<?php echo $u->status; ?>"
					data-keterangan="<?php echo $u->keterangan ?>"><i class="fa fa-edit" ></i></a>
					
					<a href="<?php echo base_url()?>C_modul_admin_resto/hapus_kinerja/<?php echo $u->id_log?>" 
					class="btn btn-danger btn-xs deleteRecord">
					<i class="fa  fa-close" ></i></a>
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
<form id="saveEmpForm" method="post" action="<?php echo base_url().'C_modul_admin_resto/add_kinerja'?>">
		<div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="exampleModalLabel">Kinerja Karyawan</h3>
				
			  </div>
			  <div class="modal-body">                       
					<div class="form-group row">
						
						<div class="col-md-12">
						<h5>Nama Karyawan</h5>
							
							<select name="nama_karyawan" id="nama_karyawan"class="form-control" required>
							  <option value="">--- Pilih Nama Karyawan---</option>
								<?php
								foreach($user_resto as $u){
								?>
								<option value="<?php echo $u->id?>"><?php echo $u->nama?></option>
								<?php } ?>
							</select>
							
						</div>
					</div>
					<div class="form-group row">
						
						<div class="col-md-12">
						<h5>Status</h5>
						  <select name="status" id="status" class="form-control" required>
							  <option value="">--- Pilih Status---</option>
							  <option value="Lembur">Lembur</option>
							  <option value="Cuti">Cuti</option>
							  <option value="Tidak Masuk">Tidak Masuk</option>
							</select>
						</div>
					
					</div>
					
					<div class="form-group row input-daterange hilangkan">
						<div class="col-md-6">
						<h5>Tanggal Awal</h5>
						  <input type="text" id="tgl_mulai" name="tgl_mulai" class="form-control" value="<?php echo date("Y-m-d")?>"readonly/>
						</div>
						<div class="col-md-6">
						<h5>Tanggal Akhir</h5>
						  <input type="text" id="tgl_akhir" name="tgl_akhir" class="form-control" value="<?php echo date("Y-m-d")?>" readonly/>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-md-12">
						<h5>Keterangan</h5>
						  <input type="text" id="keterangan" name="keterangan" class="form-control" />
						</div>
					</div>

			  </div>
			  <div class="modal-footer">
			  
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			  </div>
			</div>
		  </div>
		</div>
	</form>

<form id="showForm" method="post">
	<div class="modal fade" id="showM" tabindex="-1" role="dialog" aria-labelledby="GajiLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
			<h3 class="modal-title" id="GajiLabel">Detail Karyawan</h3>
			
		  </div>
		  <div class="modal-body">
				<div class="form-group row">
					
					<div class="col-md-12">
					<label>Resto</label>
					  <input type="text" name="resto1" id="resto1" readonly class="form-control text-uppercase" required>
					</div>
				</div>			  
				<div class="form-group row">
					
					<div class="col-md-12">
					<label>Nama</label>
					  <input type="text" name="nama1" id="nama1" readonly class="form-control text-uppercase" required>
					</div>
				</div>			  
				<div class="form-group row">
					<div class="col-md-6">
						<h5>Tanggal Awal</h5>
						  <input type="text" id="tgl_mulai1" name="tgl_mulai1" class="form-control" readonly/>
						</div>
						<div class="col-md-6">
						<h5>Tanggal Akhir</h5>
						  <input type="text" id="tgl_akhir1" name="tgl_akhir1" class="form-control" readonly/>
						</div>
				</div>
				<div class="form-group row">
					
					<div class="col-md-12">
					<label class="col-form-label">Status</label>
					  <input type="text" name="status1" id="status1" readonly class="form-control" required> 
					</div>
				</div>
				<div class="form-group row">
					
					<div class="col-md-12">
					<label class="col-form-label">Keterangan</label>
					  <textarea name="keterangan1" id="keterangan1" readonly class="form-control" required> </textarea>
					</div>
				</div>
				
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
</form>

<form id="editFrom" method="post" action="<?php echo base_url().'C_modul_admin_resto/edit_kinerja'?>">
	<div class="modal fade" id="editM" tabindex="-1" role="dialog" aria-labelledby="exampleE" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
			<h3 class="modal-title" id="exampleE">Edit Karyawan</h3>
			
		  </div>
		  <div class="modal-body">
				<div class="form-group row">
					
					<div class="col-md-12">
					<label class="col-form-label">Resto</label>
					  <input type="text" name="resto2" id="resto2" readonly class="form-control text-uppercase" required />
					</div>
				</div>			  
				<div class="form-group row">
					<div class="col-md-12">
						<label class="col-form-label">Nama Karyawan</label>
							
							<select name="nama2" id="nama2"class="form-control" required>
							  <option id="namaku"></option>
								<?php
								foreach($user_resto as $u){
								?>
								<option value="<?php echo $u->id?>"><?php echo $u->nama?></option>
								<?php } ?>
							</select>
						</div>
					
				</div>			  
				
				<div class="form-group row">
					
					<div class="col-md-12">
					<label class="col-form-label">Status</label>
					  
							<select name="statusEdit" id="statusEdit" class="form-control" required>
							  <option id="status2" ></option>
							  <option value="Lembur">Lembur</option>
							  <option value="Cuti">Cuti</option>
							  <option value="Tidak Masuk">Tidak Masuk</option>
							</select>
					</div>
				</div>
				<div class="form-group row input-daterange hilangkan">
					<div class="col-md-6">
						<label class="col-form-label">Tanggal Awal</label>
						  <input type="text" id="tgl_mulai2" name="tgl_mulai2" class="form-control" />
						</div>
						<div class="col-md-6">
						<label class="col-form-label">Tanggal Akhir</label>
						  <input type="text" id="tgl_akhir2" name="tgl_akhir2" class="form-control" />
						</div>
				</div>
				<div class="form-group row">
					
					<div class="col-md-12">
					<label class="col-form-label">Keterangan</label>
					  <textarea name="keterangan2" id="keterangan2" class="form-control" required> </textarea>
					</div>
				</div>
				
		  </div>
		  <div class="modal-footer">
			<input type="hidden" id="idKin" name="idKin" class="form-control" />
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save</button>
		  </div>
		</div>
	  </div>
	</div>
</form>

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
	$( window ).on( 'load', function( e ) {
		$( '.hilangkan' ).hide();

	
	});
	$(document).ready(function () {
		$('.sidebar-menu').tree()
	})
  
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
  })


</script>
<script>
$(function(){
     $(".input-daterange").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
    $("#tgl_mulai").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#tgl_akhir").datepicker('setStartDate', startDate);
        if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
          $("#tgl_akhir").val($("#tgl_mulai").val());
        }
    });
	$("#tgl_mulai2").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#tgl_akhir2").datepicker('setStartDate', startDate);
        if($("#tgl_mulai2").val() > $("#tgl_akhir2").val()){
          $("#tgl_akhir2").val($("#tgl_mulai2").val());
        }
    });
	//tambah show Modal
	$('.addKinerja').on('click',function(){
		$(".hilangkan").hide();
	});
	//show Lihat
	$('#listRecord').on('click','.showLihat',function(){
		$('#showM').modal('show');
		$("#resto1").val($(this).data('nama_resto'));
		$("#nama1").val($(this).data('nama'));
		$("#tgl_mulai1").val($(this).data('tgl_mulai'));
		$("#tgl_akhir1").val($(this).data('tgl_akhir'));
		$("#status1").val($(this).data('status'));
		$("#keterangan1").val($(this).data('keterangan'));
	});
	
	//show Edit
	$('#listRecord').on('click','.editPass',function(){
		$('#editM').modal('show');
		$("#idKin").val($(this).data('id'));
		$("#resto2").val($(this).data('nama_resto'));
		$("#namaku").html($(this).data('nama'));
		$("#namaku").val($(this).data('user_resto'));
		$("#tgl_mulai2").val($(this).data('tgl_mulai'));
		$("#tgl_akhir2").val($(this).data('tgl_akhir'));
		$("#status2").html($(this).data('status'));
		$("#status2").val($(this).data('status'));
		$("#keterangan2").val($(this).data('keterangan'));
		var stt = $("#status2").attr("value");
		if(stt == "Cuti"){
			$(".hilangkan").show();
		}else{
			$(".hilangkan").hide();
		}
		//console.log(stt);
	});
	
	
	
	$('#status').change(function(){
		var status = this.value;
		//alert(status);
		if(status == "Cuti"){
			$(".hilangkan").show();
		}else{
			$(".hilangkan").hide();
		}
	});
	$('#statusEdit').change(function(){
		var status = this.value;
		//alert(status);
		if(status == "Cuti"){
			$(".hilangkan").show();
		}else{
			$(".hilangkan").hide();
		}
	});
	
	
 });
</script>
</body>
</html>
