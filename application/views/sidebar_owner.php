 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->


      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">


		<li><a href="<?php echo base_url('master/dasboard');?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('master/owners?user=owner');?>"><i class="fa fa-circle-o"></i> Owner</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Owner</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Laporan Laba rugi</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Laporan Bagi hasil</a></li>
			<li><a href="<?php echo base_url('modul_owner/permintaan_investasi');?>"><i class="fa fa-circle-o"></i> Laporan Investasi</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
