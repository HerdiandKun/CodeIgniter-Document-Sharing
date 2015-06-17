<?PHP
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Tipe_Dokumen extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			$this->load->model('tipe_dokumen_m');
		}
		
		public function index()
		{	$data = array(
					'jabat'=> $this->tipe_dokumen_m->view(),
					'tipe' => $this->tipe_dokumen_m->view_tipe()
					);
			$this->load->view('tipe_dok_v',$data);
		}
		public function hak_akses()
		{	
			$this->tipe_dokumen_m->set_id_tipe($this->input->get('id'));
			$data = array(
					'hak'=> $this->tipe_dokumen_m->view_hak_akses(),
					);
			
			$this->load->view('hak_akses_v',$data);
		}
		
		public function insert()
		{
			
			$id_tipe = $this->input->post('id_tipe');
			$tipe = $this->input->post('tipe');
			$this->tipe_dokumen_m->set_id_tipe($id_tipe);
			$this->tipe_dokumen_m->set_tipe($tipe);
			$sql = $this->tipe_dokumen_m->view_tipe_id();
			if($sql->num_rows())
			{
			redirect(base_url().'tipe_dokumen/index/error');
			}else
			{
			$this->tipe_dokumen_m->add_tipe_dokumen();
			
			$jum=$this->input->post('check');
			foreach($jum as $selected)
			{
				$this->tipe_dokumen_m->set_id_jabatan($selected);
				$this->tipe_dokumen_m->hak_akses();
			}
			redirect(base_url().'tipe_dokumen/index/success');
			}
		}
		public function delete()
		{
			$id=$this->uri->segment(3);
			$this->tipe_dokumen_m->set_id_tipe($id);
			$this->tipe_dokumen_m->delete();
			$this->tipe_dokumen_m->delete_d();
			$this->tipe_dokumen_m->delete_h();
			redirect(site_url().'tipe_dokumen');
		}
	}
?>