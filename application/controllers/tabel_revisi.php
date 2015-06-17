<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tabel_Revisi extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('dokumen_m');
	}
	public function index()
	{	
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="Laporan Revisi.xls"');
		
		$data = array(
				'id_dok' => $this->dokumen_m->get_id(),
				'dok' => $this->dokumen_m->view()
				);
		$this->load->view('laporan_v',$data);
		
	}
	
}

