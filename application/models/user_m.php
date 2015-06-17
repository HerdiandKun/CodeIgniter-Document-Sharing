<?PHP
	class User_M extends CI_Model
	{
		//Properti
		private $id_user;
		private $nama;
		private $password;
		private $email;
		private $id_jabatan;
		
		//Method
		public function set_id_user($value)
		{
			$this->id_user = $value;
		}
		public function set_nama($value)
		{
			$this->nama = $value;
		}
		public function set_password($value)
		{
		$this->password = $value;
		}
		public function set_email($value)
		{
			$this->email = $value;
		}
		public function set_id_jabatan($value)
		{
			$this->id_jabatan = $value;
		}
		
		public function get_id_user()
		{
			return $this->id_user;
		}
		public function get_nama()
		{
			return $this->nama;
		}
		public function get_email()
		{
			return $this->email;
		}
		public function get_password()
		{
			return $this->password;
		}
		public function get_id_jabatan()
		{
			return $this->id_jabatan;
		}
		
		public function insert()
		{
			$sql = "INSERT INTO user values('".$this->get_id_user()."','".$this->get_email()."',md5('12345'),'".$this->get_nama()."','".$this->get_id_jabatan()."')";
			$this->db->query($sql);
		}
		public function sql_login()
		{
			$sql = "SELECT * FROM user WHERE EMAIL = '".$this->get_email()."' AND PASSWORD = md5('".$this->get_password()."')";
			return $this->db->query($sql);
		}
		public function view()
		{
			$sql = "SELECT * FROM user as u,jabatan as j WHERE u.id_jabatan=j.id_jabatan";
			return $this->db->query($sql);
		}
		public function cek_id()
		{
			$sql = "SELECT * FROM user WHERE id_user = '".$this->get_id_user()."'";
			return $this->db->query($sql);
		}
		public function ambil_jab()
		{
			$sql = "SELECT * FROM jabatan";
			return $this->db->query($sql);
		}
		public function delete()
		{
			$sql = "DELETE FROM user WHERE id_user='".$this->get_id_user()."'";
			return $this->db->query($sql);
		}
		public function view_id()
		{
			$sql = "SELECT * FROM user as u,jabatan as j WHERE u.id_jabatan=j.id_jabatan and id_user='".$this->get_id_user()."'";
			return $this->db->query($sql);
		}
		public function update()
		{
			$sql = "UPDATE user SET NAMA='".$this->get_nama()."', EMAIL='".$this->get_email()."' WHERE id_user='".$this->get_id_user()."'";
			$this->db->query($sql);
		}
		public function view_by_password()
		{
				$sql = "SELECT * FROM user WHERE password=md5('".$this->get_password()."')";
			return $this->db->query($sql);
		}
		public function update_p()
		{
			$sql = "UPDATE user SET Password=md5('".$this->get_password()."') WHERE id_user='".$this->get_id_user()."'";
			$this->db->query($sql);
		}
	}
?>