<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
		$this->load->library('pdf');
    }
    
    function index(){
       $data = array(
        "dataku" => array(
            "nama" => "Petani Kode",
            "url" => "http://petanikode.com"
        )
		);

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-petanikode.pdf";
		
		$this->pdf->load_view('cetakstruk', $data);

    }
	
}