<?PHP
	class Tipe_Dokumen_M extends CI_Model
	{
		//Properti
		private $id_tipe;
		private $tipe;
		private $id_jabatan;
		
		//Method
		public function set_id_tipe($value)
		{
			$this->id_tipe = $value;
		}
		public function set_tipe($value)
		{
			$this->tipe = $value;
		}
		public function set_id_jabatan($value)
		{
			$this->id_jabatan = $value;
		}
		public function get_id_tipe()
		{
			return $this->id_tipe;
		}
		public function get_id_jabatan()
		{
			return $this->id_jabatan;
		}
		public function get_tipe()
		{
			return $this->tipe;
		}
		public function view()
		{
			$sql="SELECT * FROM jabatan";
			return $this->db->query($sql);
		}
		public function view_tipe()
		{
			$sql="SELECT * FROM tipe_dokumen";
			return $this->db->query($sql);
		}
		public function delete()
		{
			$sql="DELETE FROM tipe_dokumen WHERE id_tipe ='".$this->get_id_tipe()."'";
			$this->db->query($sql);
		}
		public function delete_h()
		{
			$sql="DELETE FROM hak_akses WHERE id_tipe ='".$this->get_id_tipe()."'";
			$this->db->query($sql);
		}
		public function delete_d()
		{
			$sql="DELETE FROM dokumen WHERE id_tipe ='".$this->get_id_tipe()."'";
			return $this->db->query($sql);
		}
		public function view_tipe_id()
		{
			$sql="SELECT * FROM tipe_dokumen where id_tipe='".$this->get_id_tipe()."'";
			return $this->db->query($sql);
		}
		public function view_hak_akses()
		{
			$sql="SELECT * FROM hak_akses h, jabatan j where h.id_jabatan=j.id_jabatan and id_tipe='".$this->get_id_tipe()."'";
			return $this->db->query($sql);
		}
		public function add_tipe_dokumen()
		{
			$sql="INSERT INTO tipe_dokumen values('".$this->get_id_tipe()."','".$this->get_tipe()."')";
			$this->db->query($sql);
		}
		public function hak_akses()
		{
			$sql="INSERT INTO hak_akses values('".$this->get_id_tipe()."','".$this->get_id_jabatan()."')";
			$this->db->query($sql);
		}
		
		
	}
?>