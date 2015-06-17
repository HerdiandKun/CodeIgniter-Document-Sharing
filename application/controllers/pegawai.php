<?PHP
	class Pegawai extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('user_m');
		}
		public function index()
		{	
				$data = array(
				'jab' => $this->user_m->ambil_jab(),
				'user' => $this->user_m->view()
				);
				$this->load->view('pegawai_v',$data);
		}
		public function insert()
		{
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				if ($this->form_validation->run() == TRUE)
				{	
					$this->user_m->set_id_user($this->input->post('id_user'));
					$query = $this->user_m->cek_id();
					if(!$query->num_rows())
					{
					$this->user_m->set_nama($this->input->post('nama'));
					$this->user_m->set_id_jabatan($this->input->post('jabatan'));
					$this->user_m->set_email($this->input->post('email'));
					$this->user_m->insert();
					redirect(site_url().'pegawai/index/success');
					}
					else
						redirect(site_url().'pegawai/index/error');
				} else
				{
					redirect(site_url().'pegawai/index/validat');
				}
		}
		public function delete()
		{
			$id=$this->uri->segment(3);
			$this->user_m->set_id_user($id);
			$this->user_m->delete();
			redirect(site_url().'pegawai');
		}
		
}
	
?>