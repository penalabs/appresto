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
            <i class="fa fa-dashboard"></i> <span>Produksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('/modul_produksi/index_permintaan_bahan');?>"><i class="fa fa-circle-o"></i> Permintaan Bahan</a></li>
            <li><a href="<?php echo base_url('/modul_produksi/index_produksi_pesanan');?>"><i class="fa fa-circle-o"></i> Produksi pesanan</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

             <li><a href="<?php echo base_url('modul_produksi/produksi_masakan');?>"><i class="fa fa-circle-o"></i> Produksi makanan</a></li>
            <li><a href="<?php echo base_url('modul_resto/menu_masakan');?>"><i class="fa fa-circle-o"></i> Menu</a></li>
            <li><a href="<?php echo base_url('modul_resto/paket');?>"><i class="fa fa-circle-o"></i> Paket</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
