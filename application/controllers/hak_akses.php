<?php
class Hak_Akses extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			$this->load->model('tipe_dokumen_m');
		}
		
		public function index()
		{	
			$this->tipe_dokumen_m->set_id_tipe($this->input->get('id'));
			$data = array(
					'hak'=> $this->tipe_dokumen_m->view_hak_akses(),
					);
			
			$this->load->view('hak_akses_v',$data);
		}
	}
	?>