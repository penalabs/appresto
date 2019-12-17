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
            <i class="fa fa-dashboard"></i> <span>Admin Resto</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url('C_modul_admin_resto/permintaanperalatan_view');?>"><i class="fa fa-circle-o"></i> Permintaan Peralatan</a></li>
      <li><a href="<?php echo base_url('C_modul_admin_resto/anggaranbiayaoprasional_view');?>"><i class="fa fa-circle-o"></i> Pengajuan Biaya Operasional</a></li>
      <li><a href="<?php echo base_url('C_modul_admin_resto/penerimaanbiayaoprasional_view');?>"><i class="fa fa-circle-o"></i> Penerimaan Biaya Operasional</a></li>

      <li><a href="<?php echo base_url('/C_modul_admin_resto/pengeluaranbiayaoprasional_view');?>"><i class="fa fa-circle-o"></i> Pengeluaran Operasional</a></li>
			<li><a href="<?php echo base_url('C_modul_admin_resto/laporanbiayaoprasional_view');?>"><i class="fa fa-circle-o"></i> Laporan biaya Operasional</a></li>
			<li><a href="<?php echo base_url('C_modul_admin_resto/laporanpenjualan_view');?>"><i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>
			<li><a href="<?php echo base_url('superadmin/intensif');?>"><i class="fa fa-circle-o"></i> Laporan Kinerja karyawan</a></li>
			<li><a href="<?php echo base_url('superadmin/laporan_transaksi');?>"><i class="fa fa-circle-o"></i> Laporan Transaksi</a></li>
      <li><a href="<?php echo base_url('/C_modul_admin_resto/permintaan_bahan_mentah');?>"><i class="fa fa-circle-o"></i> Permintaan Bahan Manual</a></li>
          </ul>
        </li>
		<li><a href="<?php echo base_url('modul_resto/meja');?>"><i class="fa fa-circle-o"></i> Meja</a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
