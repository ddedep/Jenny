<?php
	class User_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		
		public function createPerson($firstname,$middlename,$lastname,$phonenum,$picture)
		{	
			$sql = "INSERT into persons (firstname,lastname,middlename,phonenum,picture) VALUES (?,?,?,?,?)";
			
			$this->db->query($sql, array($firstname,$middlename,$lastname,$phonenum,$picture));
		}
		
		public function createUser($username,$password,$email,$address,$postalcode)
		{	
			
			$query=$this->db->query("SELECT * FROM persons");
			$id=0;
			foreach($query->result_array() as $row)
			{
				$id=$row['personid'];
			}
			$sql = "INSERT into users (username,password,email,address,postalcode,personid) VALUES (?,?,?,?,?,?)";
			$this->db->query($sql, array($username,$password,$email,$address,$postalcode,$id));
		}

		public function getUser($username)
		{
			return $query=$this->db->query("SELECT * FROM users WHERE email ='".$username."' OR username='".$username."'");
		}	
		public function getPerson($personid)
		{
			return $query=$this->db->query("SELECT * FROM persons WHERE personid ='".$personid."'");
		}

}
