<?php
	class Auth_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		//authentication
		public function isMember($user,$pass)
		{	
			$pass = hash('ripemd160',$pass);
			$query=$this->db->query("SELECT * FROM users where username ='".$user."'");
			foreach($query->result_array() as $row)
			{
				if($row['password']==$pass) return TRUE;
			}
			return FALSE;
		}
		
		public function getDetails($email)
		{
			return $query=$this->db->query("SELECT * FROM users where email ='".$email."'");
			
		}	
		public function exists($name)
		{
			return	$this->db->query("SELECT * FROM users where username ='".$name."'");
		}	
		public function addMember($user,$first,$last,$email,$birth,$password)
		{	
			$sql = "INSERT into users (username,first,last,email,birthdate,password,accountType) VALUES (?,?,?,?,?,?,?)";
			$password = hash('ripemd160',$password);
			$this->db->query($sql, array($user,$first,$last,$email,$birth,$password,1));
		}
		public function login($name,$email,$position)
		{
			$this->session->set_userdata( array(
				'name'=>$name,
				'email'=>$email,
				'position'=>$position,
				'isLogged'=>TRUE
			)
			);
		}
}
