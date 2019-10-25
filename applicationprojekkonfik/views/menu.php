		<?php
		if($this->session->userdata('tipe')=="superadmin"){
		?>
		
		<?php include(APPPATH.'views/sidebar_superadmin.php');?>
		
		<?php
		}else if($this->session->userdata('tipe')=="general manajer"){
		?>
		
		<?php include(APPPATH.'views/sidebar_general_manager.php');?>
		

		<?php
		}else if($this->session->userdata('tipe')=="bendahara"){
		?>
		
		<?php include(APPPATH.'views/sidebar_bendahara.php');?>
		

		<?php
		}else if($this->session->userdata('tipe')=="logistik"){
		?>
		
		<?php include(APPPATH.'views/sidebar_logistik.php');?>
		
		<?php
		}else if($this->session->userdata('tipe')=="owner"){
		?>
		
		<?php include(APPPATH.'views/sidebar_owner.php');?>
		

		<?php
		}else if($this->session->userdata('tipe')=="kasir"){
		?>
		
		<?php include(APPPATH.'views/sidebar_kasir.php');?>
		
		<?php
		}else if($this->session->userdata('tipe')=="produksi"){
		?>
		
		<?php include(APPPATH.'views/sidebar_produksi.php');?>
		
		<?php
		}else if($this->session->userdata('tipe')=="admin resto"){
		?>
		
		<?php include(APPPATH.'views/sidebar_admin_resto.php');?>
		
		<?php
		}
		?>