<?php

class M_customer extends CI_Model{

	function tampil_data($tabel){
		return $this->db->get($tabel);
	}
	function mboh(){
		return $this->db->query("SELECT * FROM pembayaran");
	}

}
