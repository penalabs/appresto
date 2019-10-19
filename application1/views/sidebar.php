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
            <li><a href="<?php echo base_url('master/owners?user=owner');?>"><i class="fa fa-circle-o"></i> Owner</a></li>
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
            <li><a href="<?php echo base_url('master/restos');?>"><i class="fa fa-circle-o"></i> Daftar Resto</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Investor / Owner</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Pajak Resto</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>
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
			<li><a href="<?php echo base_url('master/users');?>"><i class="fa fa-circle-o"></i> Manajemen User Admin Resto</a></li>
			<li><a href="<?php echo base_url('master/users');?>"><i class="fa fa-circle-o"></i> Manajemen User Produksi</a></li>
			<li><a href="<?php echo base_url('master/users');?>"><i class="fa fa-circle-o"></i> Manajemen User Kasir</a></li>
			<li><a href="<?php echo base_url('master/users');?>"><i class="fa fa-circle-o"></i> Manajemen User Waiters</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Kinerja Karyawan</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Gaji Intensif Karyawan</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Permintaan Investasi</a></li>

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
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Pengeluaran investasi</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Pengeluaran Kanwil</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Biaya Operasional Cabang</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Kas Cabang</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Laba Rugi</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Setoran Kasir</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan investasi cabang</a></li>
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
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Pengadaan Peralatan</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Pengadaan Bahan mentah</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Entri Bahan olahan</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Permintaan barang</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Pengiriman barang</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan penerimaan barang</a></li>
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
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Permintaan Peralatan</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Anggaran Operasional</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> laporan biaya Operasional</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Kinerja karyawan</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Laporan Transaksi</a></li>
			<li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Permintaan bahan</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Waiters</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Menu Masakan</a></li>
            <li><a href="<?php echo base_url('master/paket');?>"><i class="fa fa-circle-o"></i> Paket</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Produksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Permintaan Bahan</a></li>
            <li><a href="<?php echo base_url('#');?>"><i class="fa fa-circle-o"></i> Produksi pesanan</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Kasir</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('kasir/penjualan');?>"><i class="fa fa-circle-o"></i> Pembayaran</a></li>
			<li><a href="<?php echo base_url('kasir/transaksi');?>"><i class="fa fa-circle-o"></i> Transaksi</a></li>
            <li><a href="<?php echo base_url('kasir/pendapatan');?>"><i class="fa fa-circle-o"></i> Setoran ke bendahara</a></li>
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
			<li><a href="<?php echo base_url('modul_resto/bahan_jadi');?>"><i class="fa fa-circle-o"></i> Bahan Jadi</a></li>
            <li><a href="<?php echo base_url('modul_resto/menu_masakan');?>"><i class="fa fa-circle-o"></i> Menu Masakan</a></li>
            <li><a href="<?php echo base_url('modul_resto/paket');?>"><i class="fa fa-circle-o"></i> Paket</a></li>
			<li><a href="<?php echo base_url('modul_resto/meja');?>"><i class="fa fa-circle-o"></i> Meja</a></li>
          </ul>
        </li>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>