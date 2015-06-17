<?PHP
	class Login extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			
			$this->load->model('user_m');
			}
		public function index()
			{
				if($this->session->userdata('nama')=='')
				{
				$this->load->view('login_v');
				}else
				{
				redirect(site_url().'home');
				}
			}
		public function func_login()
			{
				$this->load->helper(array('form', 'url'));

				$this->load->library('form_validation');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');			
				if ($this->form_validation->run() == TRUE)
				{
					$this->user_m->set_email($this->input->post('email'));
					$this->user_m->set_password($this->input->post('password'));
					$query = $this->user_m->sql_login();
					if($query->num_rows())
					{
						$row = $query->row();
						$this->session->set_userdata('nama',$row->nama);
						$this->session->set_userdata('id_jabatan',$row->id_jabatan);
						$this->session->set_userdata('id_user',$row->id_user);
						//echo "Ada";
						redirect(site_url().'home');
					}
					else
						redirect(site_url().'login/index/error');
				} else
				{
					redirect(site_url().'login/index/validat');
				}
			}
		public function logout()
			{
					//$this->session->set_userdata('username','');
					//$this->session->unset_userdata('username');
					$this->session->sess_destroy();
					redirect(site_url());
			}
		}
?>