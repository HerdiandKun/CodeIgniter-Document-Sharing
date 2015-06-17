<?php
class Download extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			$this->load->model('dokumen_m');
		}
		
		public function index()
		{	
			$data = array(
					'down'=> $this->dokumen_m->view_download(),
					);
			
			$this->load->view('download_v',$data);
		}
	}
	?>