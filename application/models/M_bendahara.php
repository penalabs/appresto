<?php
class M_bendahara extends CI_Model{

	function data_pengeluaran_invest_cabang($id_bendahara){
		$query = $this->db->query("select resto.id as id_resto,resto.nama_resto,investasi_cabang.id,investasi_cabang.nama_investasi
		,investasi_cabang.tanggal_mulai,investasi_cabang.tanggal_selesai
		,investasi_cabang.jumlah_pengeluaran,investasi_cabang.persen_penyusutan from investasi_cabang join resto on resto.id=investasi_cabang.id_resto where id_user_bendahara='$id_bendahara'");
		return $query;
	}

	function data_pengeluaran_invest_cabang_edit($where){
		$query = $this->db->query("select resto.id as id_resto,resto.nama_resto,investasi_cabang.id,investasi_cabang.nama_investasi
		,investasi_cabang.tanggal_mulai,investasi_cabang.tanggal_selesai
		,investasi_cabang.jumlah_pengeluaran,investasi_cabang.persen_penyusutan from investasi_cabang
		join resto on resto.id=investasi_cabang.id_resto
		WHERE investasi_cabang.id = '$where'");
		return $query;
	}

	function data_cabang_resto(){
		$query = $this->db->query("SELECT * FROM resto");
		return $query;
	}

	function data_investasi_cabang(){
		$query = $this->db->query("SELECT * FROM investasi_cabang");
		return $query;
	}

	function data_peralatan(){
		$query = $this->db->query("SELECT * FROM peralatan");
		return $query;
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

	// function data_storan(){
	// 	$query = $this->db->query("
	// 	SELECT pendapatan_kas_masuk.*,user_kanwil.*,user_resto.*, user_kanwil.nama AS nama_user_kanwil
	// 	FROM pendapatan_kas_masuk
	// 	JOIN user_kanwil ON user_kanwil.id = pendapatan_kas_masuk.id_user_bendahara
	// 	JOIN user_resto ON user_resto.id = pendapatan_kas_masuk.id_user_kasir");
	// 	return $query;
	// }

	/*function data_laporan_investasi_cabang($where){
		$query = $this->db->query("
		SELECT pengeluaran_cabang_alat.*,resto.*,investasi_cabang.*
		FROM pengeluaran_cabang_alat
		JOIN resto ON resto.id = pengeluaran_cabang_alat.id_resto
		JOIN investasi_cabang ON investasi_cabang.id_resto = pengeluaran_cabang_alat.id_resto
		WHERE pengeluaran_cabang_alat.id_resto = '$where'");
		return $query;
	}*/

	function data_laporan_investasi_cabang($where){
		$query = $this->db->query("SELECT * FROM investasi_cabang join resto on resto.id=investasi_cabang.id_resto
		WHERE investasi_cabang.id_resto = '$where'");
		return $query;
	}
	function data_laporan_pengeluran_alat($where){
			$query = $this->db->query("
			SELECT pengeluaran_cabang_alat.*,resto.*
			FROM pengeluaran_cabang_alat
			JOIN resto ON resto.id = pengeluaran_cabang_alat.id_resto
			WHERE pengeluaran_cabang_alat.id_resto = '$where'");
			return $query;
		}
	function data_jum_storan($where){
		$query = $this->db->query("SELECT SUM(jumlah_setoran) AS jum FROM pendapatan_kas_masuk WHERE id_user_kasir='$where'");
		return $query;
	}

	function data_lp_ic($where){
		$query = $this->db->query("
		SELECT pemberian_kaskeluar.*,resto.*
		FROM pemberian_kaskeluar
		JOIN resto ON resto.id = pemberian_kaskeluar.id_resto
		WHERE pemberian_kaskeluar.id_resto = '$where' and status='pemberian'");
		return $query;
	}

	function tampilResto(){
		$id_kanwil=$this->session->userdata('id_kanwil');


		$this->db->select("*");
		$this->db->from("investasi_buka_resto");
		$this->db->from("(SELECT nama FROM user_kanwil WHERE id_kanwil='$id_kanwil' AND tipe='bendahara') AS temp1");
		$this->db->group_by('investasi_buka_resto.id');
		$this->db->order_by('investasi_buka_resto.id', 'DESC');
		return $this->db->get()->result();

		// $sql="SELECT * FROM investasi_buka_resto, (SELECT nama FROM user_kanwil WHERE id_kanwil='$id_kanwil' AND tipe='bendahara') AS temp1 WHERE investasi_buka_resto.id_kanwil ='$id_kanwil' GROUP BY investasi_buka_resto.id ORDER BY investasi_buka_resto.id DESC";
		// $result=$this->db->query($sql);
		// return $result->result();
	}
	function getResto($id){
		$id_kanwil=$this->session->userdata('id_kanwil');
		$sql="SELECT * FROM investasi_buka_resto, (SELECT nama FROM user_kanwil WHERE id_kanwil='$id_kanwil' AND tipe='bendahara') AS temp1 WHERE investasi_buka_resto.id_kanwil ='$id_kanwil' AND id='$id' GROUP BY investasi_buka_resto.id ORDER BY investasi_buka_resto.id DESC";
		$result=$this->db->query($sql);
		return $result->result();
	}

	function getRestoT($idBend,$idResto){
		$id_kanwil=$this->session->userdata('id_kanwil');
		$this->db->select('*');
		$this->db->from('investasi_owner');
		$this->db->join('owner', 'owner.id = investasi_owner.id_owner');
		$this->db->where('id_bendahara',$idBend);
		$this->db->where('id_ref_resto',$idResto);
		$result=$this->db->get();
		return $result->result();
	}

	function tampilHistoryResto(){
		$id_kanwil=$this->session->userdata('id_kanwil');
		$this->db->select("*");
		$this->db->from("investasi_owner");
		$this->db->from("(SELECT id AS id_bend FROM user_kanwil WHERE id_kanwil='7' AND tipe='bendahara') AS temp1");
		$this->db->join('owner', 'owner.id = investasi_owner.id_owner');
		$this->db->join('resto', 'resto.id = investasi_owner.id_ref_resto');
		return $this->db->get()->result();
	}

	function tampilLaporanResto(){
		$id_bend=$this->session->userdata('id');
		$this->db->select("*");
		$this->db->from("investasi_cabang");
		$this->db->join('resto', 'resto.id = investasi_cabang.id_resto');
		$this->db->where('id_user_bendahara',$id_bend);
		$this->db->order_by('investasi_cabang.id','DESC');
		return $this->db->get()->result();
	}

	function tampilDanaResto(){
		$id_bend=$this->session->userdata('id');
		$id_kanwil=$this->session->userdata('id_kanwil');
		$id_resto=$this->input->post('id');

		$this->db->select("SUM(jumlah_investasi)-pengeluaran AS sisa, pengeluaran, SUM(jumlah_investasi) AS dana");
		$this->db->from("investasi_owner");
		$this->db->from("(SELECT SUM(jumlah_pengeluaran) AS pengeluaran FROM investasi_cabang WHERE id_user_bendahara='$id_bend' AND id_resto='$id_resto') AS temp1");
		$this->db->where('id_bendahara',$id_bend);
		$this->db->where('id_ref_resto',$id_resto);
		return $this->db->get()->result();
	}

	function aksiLaporanResto(){
		$id_bend=$this->session->userdata('id');
		$id_kanwil=$this->session->userdata('id_kanwil');
		$id_resto=$this->input->post('resto');
		$tanggal_mulai=$this->input->post('tanggal_mulai');
		$tanggal_selesai=$this->input->post('tanggl_akhir');
		$pembelian=$this->input->post('pembelian');
		$biaya=$this->input->post('biaya');
		$dataInput = array(
			'id_resto' => $id_resto, 
			'id_user_bendahara' => $id_bend, 
			'nama_investasi' => $pembelian, 
			'tanggal_mulai' => $tanggal_mulai, 
			'tanggal_selesai' => $tanggal_selesai, 
			'jumlah_pengeluaran' => $biaya, 
		);
		$this->db->insert('investasi_cabang',$dataInput);
	}

	function getRestoL($idResto){
		$id_kanwil=$this->session->userdata('id_kanwil');
		$this->db->select('*');
		$this->db->from('investasi_cabang');
		$this->db->join('user_kanwil', 'user_kanwil.id = investasi_cabang.id_user_bendahara');
		$this->db->join('resto', 'resto.id = investasi_cabang.id_resto');
		$this->db->where('id_resto',$idResto);
		$result=$this->db->get();
		return $result->result();
	}
}
