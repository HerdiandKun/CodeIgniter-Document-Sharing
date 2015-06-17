<?PHP
	class Dokumen_M extends CI_Model
	{
		//Properti
		private $id_dok;
		private $nama_dok;
		private $id_tipe;
		private $revisi;
		private $keterangan;
		
		
		//Method
		public function set_id_dok($value)
		{
			$this->id_dok = $value;
		}
		public function set_keterangan($value)
		{
			$this->keterangan = $value;
		}
		public function set_nama_dok($value)
		{
			$this->nama_dok = $value;
		}
		public function set_id_tipe($value)
		{
			$this->id_tipe = $value;
		}
		public function set_revisi($value)
		{
			$this->revisi = $value;
		}
		public function get_id_dok()
		{
			return $this->id_dok;
		}
		public function get_nama_dok()
		{
			return $this->nama_dok;
		}
		public function get_id_tipe()
		{
			return $this->id_tipe;
		}
		public function get_revisi()
		{
			return $this->revisi;
		}
		public function get_keterangan()
		{
			return $this->keterangan;
		}
		public function dok_insert()
		{
			$sql = "INSERT INTO dokumen values('".$this->get_id_dok()."', '".$this->get_nama_dok()."',now(),'".$this->get_id_tipe()."','".$this->get_revisi()."','".$this->get_keterangan()."')";
			$this->db->query($sql);
		}
		public function download()
		{
			$sql = "INSERT INTO download values('','".$this->get_id_dok()."', '".$this->get_nama_dok()."','".$this->session->userdata('id_user')."',now())";
			$this->db->query($sql);
		}
		public function cek_id()
		{
			$sql = "SELECT * FROM dokumen where id_dok='".$this->get_id_dok()."'";
			return $this->db->query($sql);
		}
		public function view()
		{
			$sql = "SELECT * FROM dokumen d,tipe_dokumen t where d.id_tipe=t.id_tipe";
			return $this->db->query($sql);
		}
		public function view_hk()
		{
			$sql = "SELECT * FROM dokumen d,hak_akses h,tipe_dokumen t where d.id_tipe=t.id_tipe and d.id_tipe=h.id_tipe and h.id_jabatan='".$this->session->userdata('id_jabatan')."'";
			return $this->db->query($sql);
		}
		public function get_id()
		{
			$sql = "SELECT * FROM tipe_dokumen";
			return $this->db->query($sql);
		}
		public function view_download()
		{
			$sql = "SELECT * FROM download d, user u where d.id_user=u.id_user";
			return $this->db->query($sql);
		}
		public function get_email()
		{
			$sql = "SELECT distinct(email) FROM user u, hak_akses h where u.id_jabatan=h.id_jabatan and h.id_tipe='".$this->get_id_tipe()."'";
			return $this->db->query($sql);
		}
		
	}
?>