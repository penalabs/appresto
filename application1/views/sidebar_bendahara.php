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
			<li><a href="<?php echo base_url('master/users?user=bendahara');?>"><i class="fa fa-circle-o"></i> Bendahara Kanwil</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Bendahara Wilayah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url('/modul_bendahara/bendahara_pengeluaran_investasi');?>"><i class="fa fa-circle-o"></i> Pengeluaran inves Cabang</a></li>
			<li><a href="<?php echo base_url('modul_bendahara_wilayah/data_pengeluaran_kanwil');?>"><i class="fa fa-circle-o"></i> Pengeluaran Kanwil</a></li>
      <li><a href="<?php echo base_url('/modul_bendahara_wilayah/anggaranbiayaoprasional_view');?>"><i class="fa fa-circle-o"></i> Pemberian Biaya OP. Cabang</a></li>


      <li><a href="<?php echo base_url('modul_bendahara_wilayah/data_kas_keluar_cabang');?>"><i class="fa fa-circle-o"></i> Laporan Kas Cabang</a></li>
			<li><a href="<?php echo base_url('modul_labarugi/');?>"><i class="fa fa-circle-o"></i> Laporan Laba Rugi</a></li>
			<li><a href="<?php echo base_url('/modul_bendahara/setoran_kasir');?>"><i class="fa fa-circle-o"></i> Setoran Kasir</a></li>
			<li><a href="<?php echo base_url('/modul_bendahara/laporan_investasi_cabang');?>"><i class="fa fa-circle-o"></i> Laporan inves cabang</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
