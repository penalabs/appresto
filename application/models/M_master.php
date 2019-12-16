<?php

class M_master extends CI_Model{
	function tampil_data_where($tabel,$where){
		$this->db->where($where);
		return $this->db->get($tabel);
	}
	function tampil_data($tabel){
		return $this->db->get($tabel);
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}


  function data_kantor_wilayah(){
    $hasil=$this->db->query("SELECT kanwil.*
		FROM kanwil ");
		return $hasil;
	}
	function tambah_kantor_wilayah($alamat,$telp){
		$hasil=$this->db->query("INSERT INTO kanwil
			(alamat_kantor,telp)
      VALUES ('$alamat',$telp)");

		return $hasil;
	}
  function edit_kantor_wilayah($id_kanwil){
    $hasil=$this->db->query("SELECT kanwil.*
		FROM kanwil
		where id_kanwil = $id_kanwil");
		return $hasil;
	}
	function update_kantor_wilayah($id_kanwil_edit,$alamat_kantor_edit,$telp_edit){
    $hasil=$this->db->query("UPDATE kanwil
			SET alamat_kantor = '$alamat_kantor_edit', telp = '$telp_edit'
		where id_kanwil = $id_kanwil_edit");
		return $hasil;
	}
	function delete_kantor_wilayah($id_kanwil){
    $hasil=$this->db->query("DELETE FROM kanwil
		where id_kanwil = $id_kanwil");
		return $hasil;
	}

}
