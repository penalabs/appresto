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
                <a href="index.html">
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
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/cart.png" height="40" width="40" alt="">
                            </div>
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
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Pesanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
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

                    <div id="contentData" style="width:100%;"></div>


















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
          loadData(0);
        });
        function loadData(parent) {
            $('#contentData').html('');
            $.ajax({
                url: 'kategori_menu.php?parent_id='+parent,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                  var  no=1;
                  if(data.length == 0) {
                      alert('empty');
                      loadDataMenu(parent);
                      return;
                  }else{
                      $.each( data, function( key, value ) {

                          $('#contentData').append('<a onCLick="loadData('+value.id_kategori+')"><div class="col-lg-3 col-sm-6">'+
                              '<div class="card gradient-'+no+'">'+
                                  '<div class="card-body">'+
                                      '<div class="d-inline-block">'+
                                          '<h1 class="text-white">'+value.nama+'</h1>'+
                                      '</div>'+
                                      '<span class="float-right display-5 opacity-5"><i class="fa fa-cutlery"></i></span>'+
                                  '</div>'+
                              '</div>'+
                          '</div></a>');

                          no++;

                      });
                  }

                }
            });
        }

        function loadDataMenu(id_kategori) {
            $('#contentData').html('');
            $.ajax({
                url: 'menu.php?id_kategori='+id_kategori,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                  var  no=1;
                  if(data.length == 0) {
                      alert('empty');
                      return;
                  }else{
                      $.each( data, function( key, value ) {

                          $('#contentData').append('<a onCLick="addDatacart('+value.id+','+value.harga+')"><div class="col-lg-3 col-sm-6">'+
                              '<div class="card gradient-'+no+'">'+
                                  '<div class="card-body">'+
                                      '<div class="d-inline-block">'+
                                          '<h1 class="text-white">'+value.menu+'</h1>'+
                                      '</div>'+
                                      '<span class="float-right display-5 opacity-5"><i class="fa fa-cutlery"></i></span>'+
                                  '</div>'+
                              '</div>'+
                          '</div></a>');

                          no++;

                      });
                  }

                }
            });
        }

        function addDatacart(id_menu,harga) {
            $.ajax({
                url: 'addmenutocart.php?id_menu='+id_menu+'&&harga='+harga+'&&jumlah=1',
                type: 'get',
                dataType: 'json',
                success: function(data) {
                  var  no=1;
                  if(data.length == 0) {
                      alert('empty');
                      return;
                  }else{
                      $.each( data, function( key, value ) {

                          // $('#contentData').append('<a onCLick="addDatacart('+value.id+')"><div class="col-lg-3 col-sm-6">'+
                          //     '<div class="card gradient-'+no+'">'+
                          //         '<div class="card-body">'+
                          //             '<div class="d-inline-block">'+
                          //                 '<h1 class="text-white">'+value.menu+'</h1>'+
                          //             '</div>'+
                          //             '<span class="float-right display-5 opacity-5"><i class="fa fa-cutlery"></i></span>'+
                          //         '</div>'+
                          //     '</div>'+
                          // '</div></a>');
                          alert(value.pesan);

                          no++;

                      });
                  }

                }
            });
        }
    </script>

</body>

</html>
