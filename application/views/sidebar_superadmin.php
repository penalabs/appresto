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
            <li><a href="<?php echo base_url('master/users?user=superadmin');?>"><i class="fa fa-circle-o"></i> Super Admin</a></li>

      			<li><a href="<?php echo base_url('master/users?user=general manajer');?>"><i class="fa fa-circle-o"></i> Manajer Kanwil</a></li>
      			<li><a href="<?php echo base_url('master/users?user=bendahara');?>"><i class="fa fa-circle-o"></i> Bendahara Kanwil</a></li>
      			<li><a href="<?php echo base_url('master/users?user=logistik');?>"><i class="fa fa-circle-o"></i> Logistik</a></li>
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
      			<li><a href="#"><i class="fa fa-circle-o"></i> Laporan Investasi</a></li>
          </ul>
    </li>
    <li><a href="<?php echo base_url('superadmin/setupowner');?>"><i class="fa fa-circle-o"></i> Setup Investor / Owner</a></li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Manajemen Super admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
      			<li><a href="<?php echo base_url('master/superadmins');?>"><i class="fa fa-circle-o"></i> Manajemen Kanwil</a></li>
      			<li><a href="<?php echo base_url('master/kanwils');?>"><i class="fa fa-circle-o"></i> Manajemen Resto</a></li>

      			<li><a href="<?php echo base_url('master/owners?user=owner');?>"><i class="fa fa-circle-o"></i> Investor / Owner</a></li>

            <li><a href="<?php echo base_url('superadmin/restos');?>"><i class="fa fa-circle-o"></i> Daftar resto / Pajak Resto</a></li>
      			<li><a href="<?php echo base_url('Superadmin/laporanpenjualan_view');?>"><i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>
      			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Laba Rugi</a></li>
      			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Pengeluaran</a></li>
      			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Kinerja Pegawai</a></li>

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
    			<li><a href="#"><i class="fa fa-circle-o"></i> Laporan Kinerja Karyawan</a></li>
    			<li><a href="#"><i class="fa fa-circle-o"></i> Gaji Intensif Karyawan</a></li>
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
    			<li><a href="#"><i class="fa fa-circle-o"></i> Laporan Kas Cabang</a></li>
    			<li><a href="#"><i class="fa fa-circle-o"></i> Laporan Laba Rugi</a></li>
    			<li><a href="#"><i class="fa fa-circle-o"></i> Setoran Kasir</a></li>
    			<li><a href="#"><i class="fa fa-circle-o"></i> Laporan investasi cabang</a></li>
          </ul>
        </li>
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Logistik Wilayah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
    			<li><a href="#"><i class="fa fa-circle-o"></i> Laporan Permintaan barang</a></li>
    			<li><a href="#"><i class="fa fa-circle-o"></i> Laporan penerimaan barang</a></li>
          </ul>
      </li>
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Admin Resto</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
      			<li><a href="<?php echo base_url('Superadmin/laporanbiayaoprasional_view');?>"><i class="fa fa-circle-o"></i> laporan biaya Operasional</a></li>

      			<li><a href="<?php echo base_url('Superadmin/laporanpenjualan_view');?>"><i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>
      			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Kinerja karyawan</a></li>
      			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Transaksi</a></li>

          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
