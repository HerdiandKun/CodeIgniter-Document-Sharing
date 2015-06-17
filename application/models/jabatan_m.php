<?PHP
	class Jabatan_M extends CI_Model
	{
		//Properti
		private $id_jabatan;
		private $nama_jabatan;
		
		//Method
		public function set_id_jabatan($value)
		{
			$this->id_jabatan = $value;
		}
		public function set_nama($value)
		{
			$this->nama = $value;
		}
		
		
		public function get_id_jabatan()
		{
			return $this->id_jabatan;
		}
		public function get_nama()
		{
			return $this->nama;
		}
		
		public function insert()
		{
			$sql = "INSERT INTO jabatan values('','".$this->get_nama()."')";
			$this->db->query($sql);
		}
		public function view()
		{
			$sql = "SELECT * FROM jabatan";
			return $this->db->query($sql);
		}
		public function cek_id()
		{
			$sql = "SELECT * FROM user WHERE id_jabatan = '".$this->get_id_jabatan()."'";
			return $this->db->query($sql);
		}
		
		public function delete()
		{
			$sql = "DELETE FROM jabatan WHERE id_jabatan='".$this->get_id_jabatan()."'";
			return $this->db->query($sql);
		}
		
		public function update()
		{
			$sql = "UPDATE jabatan SET nama_jabatan='".$this->get_nama()."' WHERE id_jabatan='".$this->get_id_jabatan()."'";
			$this->db->query($sql);
		}
		
	}
?>