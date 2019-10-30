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
			<li><a href="<?php echo base_url('master/users?user=general manajer');?>"><i class="fa fa-circle-o"></i> Manajer Kanwil</a></li>
			<li><a href="<?php echo base_url('master/users?user=bendahara');?>"><i class="fa fa-circle-o"></i> Bendahara Kanwil</a></li>
			<li><a href="<?php echo base_url('master/users?user=logistik');?>"><i class="fa fa-circle-o"></i> Logistik</a></li>

          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>General Manager Kanwil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url('master/users?user=admin resto');?>"><i class="fa fa-circle-o"></i> Manajemen User Admin Resto</a></li>
			<li><a href="<?php echo base_url('master/users?user=produksi');?>"><i class="fa fa-circle-o"></i> Manajemen User Produksi</a></li>
			<li><a href="<?php echo base_url('master/users?user=kasir');?>"><i class="fa fa-circle-o"></i> Manajemen User Kasir</a></li>
			<li><a href="<?php echo base_url('master/users?user=waiters');?>"><i class="fa fa-circle-o"></i> Manajemen User Waiters</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Laporan Kinerja Karyawan</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Gaji Intensif Karyawan</a></li>
			<li><a href="<?php echo base_url('modul_general_manager/permintaan_investasi');?>"><i class="fa fa-circle-o"></i> Investasi Kanwil</a></li>
      <li><a href="<?php echo base_url('modul_general_manager/bendahara_pengeluaran_investasi');?>"><i class="fa fa-circle-o"></i> Setujui Permintaan Investasi</a></li>

          </ul>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
