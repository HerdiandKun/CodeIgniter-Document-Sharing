<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('dokumen_m');
	}
	public function index()
	{	
		if($this->session->userdata('id_jabatan')=='1')
		{
		$data = array(
				'id_dok' => $this->dokumen_m->get_id(),
				'dok' => $this->dokumen_m->view()
				);
		$this->load->view('home_v',$data);
		}else
		{
		$data = array(
				'id_dok' => $this->dokumen_m->get_id(),
				'dok' => $this->dokumen_m->view_hk()
				);
		$this->load->view('home_v',$data);
		}
	}
	public function upload()
		{
			$id = $this->input->post('id_dok');
			$this->dokumen_m->set_id_dok($id);
			$query = $this->dokumen_m->cek_id();
			if(!$query->num_rows())
			{
				$config['upload_path'] = './assets/dokumen/';
				$config['allowed_types'] = 'docx|txt|pdf|doc';
				$config['max_size']	= '5000';
				//$config['max_width']  = '1024';
				//$config['max_height']  = '768';
				
				$this->load->library("upload", $config);
				
				if($this->upload->do_upload("file"))
				{
				$data = $this->upload->data();
				$nama= $data['file_name'];
				
				$tipe = $this->input->post('tipe');
				$rev = $this->input->post('revisi');
				$ket = $this->input->post('keterangan');				
				
				$this->dokumen_m->set_nama_dok($nama);
				$this->dokumen_m->set_id_tipe($tipe);
				$this->dokumen_m->set_keterangan($ket);			
				$this->dokumen_m->set_revisi($rev);			
				$this->dokumen_m->dok_insert();

				$this->load->library('email');
			
				$query=$this->dokumen_m->get_email();
				foreach($query->result() as $row)
				{
				$this->email->from('herdiandkun@gmail.com', 'PT BETON');
				$email = $row->email;
				$this->email->to($email);
				
				$this->email->subject('Dokumen Baru');
				$this->email->message('Pemberitahuan Dokumen Baru telah terupload. : '.$nama);

				$this->email->send();
				}
				echo $this->email->print_debugger();
				redirect(site_url().'home/index/success');
				}
				else
				{
					$error = array('error' => $this->upload->display_errors());
					//$this->load->view('home_v', $error);
					echo $error['error'];
				}
			}else 
			{
				redirect(site_url().'home/index/error');
			}
		}
		public function download()
			{	
				$id = $this->input->get('id');
				$nama = $this->input->get('nama');
				$this->dokumen_m->set_id_dok($id);
				$this->dokumen_m->set_nama_dok($nama);
				$this->dokumen_m->download();
				$this->load->helper('download');
				$data = file_get_contents(site_url().'assets/dokumen/'.$nama); // Read the file's contents
				$name = $nama;

			force_download($name, $data);
			
			
			redirect(site_url());
			
			}
}

