<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct(){
		parent::__construct();
		$this->load->model('m_customer');
		$this->load->helper('url');
	}

	public function index()
	{
		$query=$this->db->query("SELECT * FROM resto");
		$data['resto']=$query->result();
		$this->load->view('customer/login', $data);
	}

	public function aksi_login(){
			$nama_pemesan=$this->input->post('nama_pemesan');
			$id_resto=$this->input->post('id_resto');
			$newdata = array(
			        'nama_pemesan'  => $nama_pemesan,
							'id_resto'  => $id_resto,
			        'logged_in' => TRUE
						);

			$this->session->set_userdata($newdata);
			redirect('customer/pesan');
	}

	function logout(){
		$this->session->sess_destroy();
		$this->session->set_userdata("");
		$data_session = array(
			'nama_pemesan' => '',
			'id_resto' => '',
			'logged_in' => FALSE,
			);
		$this->session->set_userdata($data_session);
		redirect('customer_login/');
	}

}
