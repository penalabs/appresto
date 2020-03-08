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
            <i class="fa fa-dashboard"></i> <span>Kasir</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('kasir/penjualan');?>"><i class="fa fa-circle-o"></i> Pembayaran</a></li>
			       <!-- <li><a href="<?php echo base_url('kasir/pemesanan');?>"><i class="fa fa-circle-o"></i> Transaksi pembayaran</a></li> -->
             <li><a href="<?php echo base_url('kasir/pemesanan');?>"><i class="fa fa-circle-o"></i> Setor</a></li>
            <!-- <li><a href="<?php echo base_url('kasir/pendapatan');?>"><i class="fa fa-circle-o"></i> Setoran ke bendahara</a></li> -->
          </ul>
        </li>
        
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>