<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
  <div id="login-box">
    <div class="logo">
      <img src="user.png" class="img img-responsive img-circle center-block"/>
      <h1 class="logo-caption"><span class="tweak">L</span>Login</h1>
    </div><!-- /.logo -->
    <div class="controls">
      <form method="post" action="cek_login.php">
      <input type="text" name="username" placeholder="Username" class="form-control" />
      <input type="password" name="password" placeholder="Password" class="form-control" />
      <button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
      </form>
    </div><!-- /.controls -->
  </div><!-- /#login-box -->
</div><!-- /.container -->
<div id="particles-js"></div>
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="style.js"></script>

</body>
</html>