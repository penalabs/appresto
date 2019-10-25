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
			<li><a href="<?php echo base_url('master/users?user=logistik');?>"><i class="fa fa-circle-o"></i> Logistik</a></li>

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
			<li><a href="<?php echo base_url('/modul_logistik/pembelian_alat');?>"><i class="fa fa-circle-o"></i> Pengadaan Peralatan</a></li>
      <li><a href="<?php echo base_url('/modul_logistik/permintaanperalatan_view');?>"><i class="fa fa-circle-o"></i> Permintaan Peralatan</a></li>
			<li><a href="<?php echo base_url('/modul_logistik/pembelian_bahan_mentah');?>"><i class="fa fa-circle-o"></i> Pengadaan Bahan mentah</a></li>
			<li><a href="<?php echo base_url('/modul_logistik/produksi_bahan_olahan');?>"><i class="fa fa-circle-o"></i> Entri Bahan olahan</a></li>
			<li><a href="<?php echo base_url('/modul_logistik/laporan_permintaan_barang');?>"><i class="fa fa-circle-o"></i> Laporan Permintaan barang</a></li>
			<li><a href="<?php echo base_url('/modul_logistik/permintaan_bahan_mentah');?>"><i class="fa fa-circle-o"></i> Pengiriman barang</a></li>
			<li><a href="<?php echo base_url('/modul_logistik/laporan_penerimaan_barang');?>"><i class="fa fa-circle-o"></i> Laporan penerimaan barang</a></li>
          </ul>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
