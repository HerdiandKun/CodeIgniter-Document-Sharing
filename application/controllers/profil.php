<?PHP
	class Profil extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('user_m');
			}
		public function index()
			{	
				$this->user_m->set_id_user($this->session->userdata('id_user'));
				$data = array(
						'profil' =>$this->user_m->view_id()
						);
				$this->load->view('profil_v',$data);
			}
		public function update()
		{
			$this->user_m->set_id_user($this->session->userdata('id_user'));
			$this->user_m->set_nama($this->input->post('nama'));
			$this->user_m->set_email($this->input->post('email'));
			$this->user_m->update();
			redirect(site_url().'profil');
			
		}
		public function password()
			{
			$this->user_m->set_id_user($this->session->userdata('id_user'));
			if($this->input->post('pass_baru')== $this->input->post('konf_password'))
				{
					$this->user_m->set_password($this->input->post('pass_lama'));
					
					$query = $this->user_m->view_by_password();
					
					if($query->num_rows())
					{
					$this->user_m->set_password($this->input->post('pass_baru'));
					$this->user_m->update_p();
					redirect(site_url().'profil/index/success');
					}else
						redirect(site_url().'profil/index/error_save');
					}else
					redirect(site_url().'profil/index/error_pass');
				}
				
		}
?>