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
          <div class="box box-default">
            <div class="box-body">
              <!--<div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#addEmpModal"><span class="fa fa-plus"></span>Tambah Karyawan</a></div><br>-->
			  <select name="resto_id" id="resto_id" class="form-control">
					
						  <?php
						  $sql = "SELECT * FROM resto";
						  $data2=$this->db->query($sql)->result();
						  foreach($data2 as $u2){ ?>
							<option value="<?php echo $u2->id; ?>"><?php echo $u2->nama_resto; ?></option>
						  <?php } ?>
						  </select>
            </div>
          </div>
        </div>
  <div class="col-md-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Gaji Karyawan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
				  <th>Resto</th>
                  <th>Jabatan</th>
                  <th>Total Gaji</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="listRecords">
        <?php
          $no = 1;
          foreach($data as $u){
			  $gaji=$u->nominal_gaji;
			  $intensif=$u->intensif;
        ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $u->nama ?></td>
				  <td><?php echo $u->nama_resto ?></td>
                  <td><?php echo $u->jabatan ?></td>
                  <td><?php echo "Rp. ".number_format($gaji+$intensif).",-"; ?></td>
                  <td style="text-align:right;">

                    <a href="javascript:void(0);" class="btn btn-success btn-sm showRecordGaji"
					data-resto="<?php echo $u->nama_resto ?>"
					data-nama="<?php echo $u->nama ?>"
					data-jabatan="<?php echo $u->jabatan ?>"
					data-nominal_gaji="<?php echo "Rp. ".number_format($gaji).",-"; ?>"
					data-intensif="<?php echo "Rp. ".number_format($intensif).",-"; ?>"
					><i class="fa  fa-eye" ></i></a>

                    <a href="javascript:void(0);" class="btn btn-info btn-sm editRecordGaji"
					data-id="<?php echo $u->id_gaji ?>"
					data-resto="<?php echo $u->nama_resto ?>"
					data-nama="<?php echo $u->nama ?>"
					data-jabatan="<?php echo $u->jabatan ?>"
					data-nominal_gaji="<?php echo $gaji; ?>"
					data-intensif="<?php echo "Rp. ".number_format($intensif).",-"; ?>"><i class="fa  fa-edit" ></i></a>

                    <a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" 
					data-id="<?php echo $u->id_gaji ?>"><i class="fa  fa-close" ></i></a>

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



<form id="saveEmpForm" method="post">
	<div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
			<h3 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h3>
			
		  </div>
		  <div class="modal-body">                       
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Resto</label>
					<div class="col-md-10">
						
						<select name="id_resto" class="form-control">
						  <option value="">--- Pilih Resto---</option>
						  <?php
						  $sql = "SELECT * FROM resto";
						  $data2=$this->db->query($sql)->result();
						  foreach($data2 as $u2){ ?>
							<option value="<?php echo $u2->id; ?>"><?php echo $u2->nama_resto; ?></option>
						  <?php } ?>
						  </select>
						
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Karyawan*</label>
					<div class="col-md-10">
					  <select name="id_user_resto" class="form-control">
						  <option value="">--- Pilih Karyawan---</option>
						  <?php
						  $sql = "SELECT * FROM user_resto";
						  $data2=$this->db->query($sql)->result();
						  foreach($data2 as $u2){ ?>
							<option value="<?php echo $u2->id; ?>"><?php echo $u2->nama; ?></option>
						  <?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Tanggal Awal*</label>
					<div class="col-md-10">
						  <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" placeholder="Tanggal Awal">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Tanggal akhir*</label>
					<div class="col-md-10">
						  <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" placeholder="Tanggal Awal">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Jenis Gaji*</label>
					<div class="col-md-10">
					<select name="jenis_gaji" class="form-control">
						<option value="">--- Pilih ---</option>
						<option value="bulanan">Bulanan</option>
					</select>
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

<form id="showGajiForm" method="post">
	<div class="modal fade" id="showGaji" tabindex="-1" role="dialog" aria-labelledby="GajiLabel" aria-hidden="true">
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
					<label class="col-md-2 col-form-label">Resto</label>
					<div class="col-md-10">
					  <input type="text" name="resto" id="resto" readonly class="form-control text-uppercase" required>
					</div>
				</div>			  
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Nama</label>
					<div class="col-md-10">
					  <input type="text" name="nama" id="nama" readonly class="form-control text-uppercase" required>
					</div>
				</div>			  
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Jabatan</label>
					<div class="col-md-10">
					  <input type="text" name="jabatan" id="jabatan" readonly class="form-control text-uppercase" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Gaji Pokok</label>
					<div class="col-md-10">
					  <input type="text" name="gaji" id="gaji" readonly class="form-control" required> 
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Insentif</label>
					<div class="col-md-10">
					  <input type="text" name="intensif" id="intensif" readonly class="form-control" required> 
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Lembur</label>
					<div class="col-md-10">
					  <input type="text" name="lembur" id="lembur" readonly class="form-control" required> 
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

<form id="editGajiForm" method="post" action="<?php echo base_url().'modul_general_manager/action_edit_gaji'?>">
	<div class="modal fade" id="editGajim" tabindex="-1" role="dialog" aria-labelledby="GajiLabel" aria-hidden="true">
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
					<label class="col-md-2 col-form-label">Resto</label>
					<div class="col-md-10">
					  <input type="text" name="resto" id="resto1" readonly class="form-control text-uppercase" required>
					</div>
				</div>			  
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Nama</label>
					<div class="col-md-10">
					  <input type="text" name="nama1" id="nama1" readonly class="form-control text-uppercase" required>
					</div>
				</div>			  
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Jabatan</label>
					<div class="col-md-10">
					  <input type="text" name="jabatan1" id="jabatan1" readonly class="form-control text-uppercase" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Gaji Pokok</label>
					<div class="col-md-10">
					  <input type="text" name="editgaji" id="editgaji" class="form-control" required> 
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Insentif</label>
					<div class="col-md-10">
					  <input type="text" name="intensif1" id="intensif1" readonly class="form-control" required> 
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Lembur</label>
					<div class="col-md-10">
					  <input type="text" name="lembur1" id="lembur1" readonly class="form-control" required> 
					</div>
				</div>
				
		  </div>
		  <div class="modal-footer">
		    <input type="hidden" name="emId" id="emId" class="form-control">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save</button>
		  </div>
		</div>
	  </div>
	</div>
</form>

<form id="deleteEmpForm" method="post" action="<?php echo base_url().'modul_general_manager/hapus_gaji'?>">
	<div class="modal fade" id="deleteEmpModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
			<h3 class="modal-title" id="deleteModalLabel">Delete Employee</h3>
		  </div>
		  <div class="modal-body">
			   <strong>Yahkin ingin Menghapus Data?</strong>
		  </div>
		  <div class="modal-footer">
			<input type="hidden" name="deleteEmpId" id="deleteEmpId" class="form-control">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			<button type="submit" class="btn btn-primary">Yes</button>
		  </div>
		</div>
	  </div>
	</div>
</form>

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
<script>
$(document).ready(function(){
	
	var table = $('#employeeListing').dataTable({     
		"bPaginate": false,
		"bInfo": false,
		"bFilter": false,
		"bLengthChange": false,
		"pageLength": 5		
	}); 
	
	// show lihat modal form with emp data
	$('#listRecords').on('click','.showRecordGaji',function(){
		$('#showGaji').modal('show');
		$("#resto").val($(this).data('resto'));
		$("#nama").val($(this).data('nama'));
		$("#jabatan").val($(this).data('jabatan'));
		$("#gaji").val($(this).data('nominal_gaji'));
		$("#intensif").val($(this).data('intensif'));
		$("#lembur").val($(this).data(''));
	});
	
	// edit lihat modal form with emp data
	$('#listRecords').on('click','.editRecordGaji',function(){
		$('#editGajim').modal('show');
		$("#emId").val($(this).data('id'));
		$("#resto1").val($(this).data('resto'));
		$("#nama1").val($(this).data('nama'));
		$("#jabatan1").val($(this).data('jabatan'));
		$("#editgaji").val($(this).data('nominal_gaji'));
		$("#intensif1").val($(this).data('intensif'));
		$("#lembur1").val($(this).data(''));
	});
	
	// show delete form
	$('#listRecords').on('click','.deleteRecord',function(){
		var empId = $(this).data('id');            
		$('#deleteEmpModal').modal('show');
		$('#deleteEmpId').val(empId);
	});
	
	//onchange
	$('#resto_id').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('modul_general_manager/onchange');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
						var n =1;
                        for(i=0; i<data.length; i++){
							if(data[i].intensif == null){
								var intensif=0;
							}else{
								var intensif = data[i].intensif;
							}
							var bilangan = (parseInt(data[i].nominal_gaji)+parseInt(intensif));
		
							var	reverse = bilangan.toString().split('').reverse().join(''),
								ribuan 	= reverse.match(/\d{1,3}/g);
								ribuan	= ribuan.join('.').split('').reverse().join('');
                            html += '<tr id="'+data[i].id+'">'+
								'<td>'+n+'</td>'+
								'<td>'+data[i].nama+'</td>'+
								'<td>'+data[i].nama_resto+'</td>'+
								'<td>'+data[i].jabatan+'</td>'+
								'<td>Rp. '+ribuan+'</td>'+
								'<td style="text-align:right;">'+' '+
							'<a href="javascript:void(0);" class="btn btn-success btn-sm showRecordGaji" data-id_resto="'+data[i].id_gaji+
									'" data-resto="'+data[i].nama_resto+
									'" data-nama="'+data[i].nama+
									'" data-jabatan="'+data[i].jabatan+
									'" data-intensif="'+intensif+
									'" data-nominal_gaji="'+data[i].nominal_gaji+
									'"><i class="fa  fa-eye" ></i></a>'+' '+
									'<a href="javascript:void(0);" class="btn btn-info btn-sm editRecordGaji" data-id="'+data[i].id_gaji+
									'" data-resto="'+data[i].nama_resto+
									'" data-nama="'+data[i].nama+
									'" data-jabatan="'+data[i].jabatan+
									'" data-intensif="'+intensif+
									'" data-nominal_gaji="'+data[i].nominal_gaji+
									'"><i class="fa  fa-edit" ></i></a>'+' '+
									'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+data[i].id_gaji+'"><i class="fa  fa-close" ></a>'+
								'</td>'+
								'</tr>';
								n++
                        }
                        $('#listRecords').html(html);

                    }
                });
                return false;
            });
});</script>
</body>
</html>
