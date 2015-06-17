<?PHP
	class Jabatan extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('jabatan_m');
		}
		public function index()
		{	
				$data = array(
				'jab' => $this->jabatan_m->view()
				);
				$this->load->view('jabatan_v',$data);
		}
		public function insert()
		{
					$this->jabatan_m->set_nama($this->input->post('nama_jabatan'));
					$this->jabatan_m->insert();
					redirect(site_url().'jabatan/index/success');
		}
		public function update()
		{
					$this->jabatan_m->set_nama($this->input->post('nama_jabatan'));
					$this->jabatan_m->set_id_jabatan($this->input->post('id_jabatan'));
					$this->jabatan_m->update();
					redirect(site_url().'jabatan/index/update');
		}
		
		public function delete()
		{
			$id=$this->uri->segment(3);
			$this->jabatan_m->set_id_jabatan($id);
			$this->jabatan_m->delete();
			redirect(site_url().'jabatan/index/hapus');
		}
		
}
	
?>