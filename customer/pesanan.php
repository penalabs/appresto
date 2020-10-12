<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Customer landing page</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <!-- Pignose Calender -->
  <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
  <!-- Chartist -->
  <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
  <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
  <!-- Custom Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php session_start(); ?>
<?php include('koneksi.php');?>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>

                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                          <a href="pesanan.php?id_resto=<?php echo $_GET['id_resto'];?>">
                            <div class="user-img c-pointer position-relative">
                                <span class="activity active"></span>
                                <img src="images/cart.png" height="40" width="40" alt="">
                            </div>
                          </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>

                    <li>
                        <a href="index.php?id_resto=<?php echo $_GET['id_resto'];?>" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Pesan</span>
                        </a>
                    </li>
                    <li>
                        <a href="../waiters" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Login waiters</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">

                  <div class="col-12">
                    <h4 class="card-title">Pesanan Menu</h4>
                      <div class="card">


                              <div class="table-responsive">
                                  <table class="table table-bordered" id="myTable">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Nama menu</th>
                                              <th>Qty</th>
                                              <th>Harga</th>
                                              <!-- <th>Sub Harg.</th> -->
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>




                                      </tbody>
                                  </table>



                          </div>

                    </div>
                </div>

                <div class="col-12">
                  <h4 class="card-title">Pesanan Paket</h4>
                    <div class="card">


                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama paket</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <!-- <th>Sub Harg.</th> -->
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>




                                    </tbody>
                                </table>



                        </div>

                  </div>
              </div>


              <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">Total semua pesan</h4>
                              <div class="basic-form">
                                  <form>

                                      <div class="form-group">

                                          <input type="text" id="total_semua_pesan" class="form-control" value="" readonly>
                                      </div>


                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>


                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Pemesan</h4>
                                <div class="basic-form">
                                    <form id="myform">
                                        <div class="form-group">
                                            <label>No Meja</label>
                                            <input type="text" class="form-control" name="no_meja" placeholder="No Meja">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama pemesan</label>
                                            <input type="text" class="form-control" name="nama_pemesan" placeholder="Nama pemesan">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan tambahan</label>
                                            <textarea class="form-control" name="keterangan"></textarea>
                                        </div>


                                        <button type="submit" class="btn btn-dark">PESAN</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>








            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="./js/dashboard/dashboard-1.js"></script>
    <script>
        $(document).ready(function(){
          var redirect_home=$(location).attr('href');
          // alert(redirect_home);
          loadDatamenu();
          loadDatapaket();

                $('#myform').on('submit', function(e) {
                  e.preventDefault();
                  var no_meja=$("input[name=no_meja]").val();
                  var nama_pemesan=$("input[name=nama_pemesan]").val();
                  var keterangan=$("textarea[name=keterangan]").val();
                  var total_harga=$("#total_semua_pesan").val();
                  var id_resto= getParam('id_resto');
                  alert(keterangan);

                  $.ajax({
                      url: 'pesan.php',
                      type: 'get',
                      data: { no_meja: no_meja, nama_pemesan : nama_pemesan, keterangan:keterangan, total_harga:total_harga, id_resto:id_resto} ,
                      dataType: 'json',
                      success: function(data) {
                        var  no=1;
                        if(data.length == 0) {
                            alert('empty');
                            return;
                        }else{
                            $.each( data, function( key, value ) {

                                alert(value.pesan);
                                window.location.href = redirect_home;
                                no++;

                            });

                        }

                      }
                  });

                });
        });


        // modul menu
        function loadDatamenu() {
            $('#contentData').html('');
            var total=0;
            $.ajax({
                url: 'cart.php',
                type: 'get',
                dataType: 'json',
                success: function(data) {
                  var  no=1;
                  if(data.length == 0) {
                      alert('empty');
                      $('#myTable > tbody').append('<tr>'+
                        '<td colspan="3">Total</td>'+
                        '<td colspan="2">'+
                          '<div id="total">'+total+'</div>'+
                        '</td>'+
                      '</tr>');
                      total_semua();
                      return;
                  }else{
                      $.each( data, function( key, value ) {
                        alert(value.id_menu);
                          $('#myTable > tbody').append('<tr>'+
                              '<td>'+value.id_menu+'</td>'+
                              '<td>'+value.nama_menu+'</td>'+
                              '<td>'+
                                '<button type="button" onclick="minusmenu('+value.id_menu+');" style="float:left;" class="btn mb-1 btn-success btn-xs">-</button>'+
                                '<input type="text" id="jumlah" style="width:40px;height:40px;float:left;" class="form-control input-default" value="'+value.jumlah+'">'+
                                '<button type="button" onclick="plusmenu('+value.id_menu+');" style="float:left;" class="btn mb-1 btn-success btn-xs">+</button>'+
                              '</td>'+
                              '<td>'+
                                value.harga+
                              '</td>'+
                              '<td>'+
                                '<button type="button" onclick="removemenu('+value.id_menu+');" class="btn mb-1 btn-danger btn-xs"><i class="fa fa-close"></i></span>'+
                                '</button>'+
                              '</td>'+
                          '</tr>');


                          no++;
                          total+=value.harga*value.jumlah;


                      });
                      $('#myTable > tbody').append('<tr>'+
                        '<td colspan="3">Total</td>'+
                        '<td colspan="2">'+
                          '<div id="total">'+total+'</div>'+
                        '</td>'+
                    '</tr>');
                    total_semua();


                  }

                }
            });


        }

        function plusmenu(id_menu) {
          alert(id_menu)
          $('#myTable > tbody').html('');
            $.ajax({
                url: 'plus_menu.php?id_menu='+id_menu,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                  var  no=1;
                  if(data.length == 0) {
                      alert('empty');
                      return;
                  }else{
                      $.each( data, function( key, value ) {

                          $('#jumlah').val(value.jumlah)
                          alert(value.jumlah);
                          no++;

                      });
                      loadDatamenu();
                  }

                }
            });
        }

        function minusmenu(id_menu) {
          alert(id_menu)
          $('#myTable > tbody').html('');
            $.ajax({
                url: 'minus_menu.php?id_menu='+id_menu,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                  var  no=1;
                  if(data.length == 0) {
                      alert('empty');
                      return;
                  }else{
                      $.each( data, function( key, value ) {

                          $('#jumlah').val(value.jumlah)
                          alert(value.jumlah);
                          no++;

                      });
                      loadDatamenu();
                  }

                }
            });
        }

        function removemenu(id_menu) {
          alert(id_menu)
          $('#myTable > tbody').html('');
            $.ajax({
                url: 'removecart.php?id_menu='+id_menu,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                  var  no=1;
                  if(data.length == 0) {
                      alert('empty');
                      return;
                  }else{
                      $.each( data, function( key, value ) {

                          alert(value.pesan);
                          no++;
                          loadDatamenu();
                      });

                  }

                }
            });
        }


        //modul paket
        function loadDatapaket() {
            $('#contentData').html('');
            var total=0;
            $.ajax({
                url: 'cart2.php',
                type: 'get',
                dataType: 'json',
                success: function(data) {
                  var  no=1;
                  if(data.length == 0) {
                      alert('empty');
                      $('#myTable2 > tbody').append('<tr>'+
                        '<td colspan="3">Total</td>'+
                        '<td colspan="2">'+
                          '<div id="total2">'+total+'</div>'+
                        '</td>'+
                    '</tr>');

                      total_semua();
                      return;
                  }else{
                      $.each( data, function( key, value ) {
                        alert(value.id_paket);
                          $('#myTable2 > tbody').append('<tr>'+
                              '<td>'+value.id_paket+'</td>'+
                              '<td>'+value.nama_paket+'</td>'+
                              '<td>'+
                                '<button type="button" onclick="minuspaket('+value.id_paket+');" style="float:left;" class="btn mb-1 btn-success btn-xs">-</button>'+
                                '<input type="text" id="jumlah" style="width:40px;height:40px;float:left;" class="form-control input-default" value="'+value.jumlah+'">'+
                                '<button type="button" onclick="pluspaket('+value.id_paket+');" style="float:left;" class="btn mb-1 btn-success btn-xs">+</button>'+
                              '</td>'+
                              '<td>'+
                                value.harga+
                              '</td>'+
                              '<td>'+
                                '<button type="button" onclick="removepaket('+value.id_paket+');" class="btn mb-1 btn-danger btn-xs"><i class="fa fa-close"></i></span>'+
                                '</button>'+
                              '</td>'+
                          '</tr>');


                          no++;
                          total+=value.harga*value.jumlah;


                      });
                      $('#myTable2 > tbody').append('<tr>'+
                        '<td colspan="3">Total</td>'+
                        '<td colspan="2">'+
                          '<div id="total2">'+total+'</div>'+
                        '</td>'+
                    '</tr>');

                    total_semua();

                  }

                }
            });




        }

        function pluspaket(id_paket) {
          alert(id_paket)
          $('#myTable2 > tbody').html('');
            $.ajax({
                url: 'plus_paket.php?id_paket='+id_paket,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                  var  no=1;
                  if(data.length == 0) {
                      alert('empty');
                      return;
                  }else{
                      $.each( data, function( key, value ) {

                          $('#jumlah').val(value.jumlah)
                          alert(value.jumlah);
                          no++;

                      });
                      loadDatapaket();
                  }

                }
            });
        }

        function minuspaket(id_paket) {
          alert(id_paket)
          $('#myTable2 > tbody').html('');
            $.ajax({
                url: 'minus_paket.php?id_paket='+id_paket,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                  var  no=1;
                  if(data.length == 0) {
                      alert('empty');
                      return;
                  }else{
                      $.each( data, function( key, value ) {

                          $('#jumlah').val(value.jumlah)
                          alert(value.jumlah);
                          no++;

                      });
                      loadDatapaket();
                  }

                }
            });
        }

        function removepaket(id_paket) {
          alert(id_paket)
          $('#myTable2 > tbody').html('');
            $.ajax({
                url: 'removecart2.php?id_paket='+id_paket,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                  var  no=1;
                  if(data.length == 0) {
                      alert('empty');
                      return;
                  }else{
                      $.each( data, function( key, value ) {

                          alert(value.pesan);
                          no++;
                          loadDatapaket();
                      });

                  }

                }
            });
        }

        function total_semua(){
          var total=$('#total').text();
          var total2=$('#total2').text();

          var total_semua=parseInt(total)+parseInt(total2);

          $('#total_semua_pesan').val(total_semua);
        }




        function getParam(param){
          return new URLSearchParams(window.location.search).get(param);
        }


    </script>

</body>

</html>
