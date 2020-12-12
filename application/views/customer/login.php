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
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url();?>"><b>SI</b>Restoran</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan masukkan nama kamu</p>

    <form action="<?php echo base_url('customer_login/aksi_login'); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nama_pemesan" placeholder="Masukan Nama Kamu">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="id_resto" class="form-control">
          <?php
          foreach($resto as $r){
          ?>
                    <option value="<?php echo $r->id;?>">Resto <?php echo $r->nama_resto;?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="row">
        <div class="col-xs-5">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk aplikasi</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
  <?php include(APPPATH.'views/js.php');?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
