<header class="main-header ">
    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo bg-purple">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SR</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIM RESTO</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar bg-purple navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->



          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('dist/img/user2-160x160.jpg');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->userdata('nama');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">

                <p>
                  PENA HOST
                  <small>CORE</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('customer/pemesanan'); ?>" class="btn btn-default btn-flat">Transaksi</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('customer_login/logout'); ?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
