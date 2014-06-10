<?php
	class User_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		
		public function createPerson($firstname,$middlename,$lastname,$phonenum,$picture,$birthdate)
		{	
			$sql = "INSERT into persons (firstname,lastname,middlename,phonenum,picture,birthdate) VALUES (?,?,?,?,?,?)";
			
			$this->db->query($sql, array($firstname,$middlename,$lastname,$phonenum,$picture,$birthdate));
		}
		public function updateAccount($userid,$firstname,$middlename,$lastname,$phonenum,$picture,$birthdate,$email, $address, $postalcode)
		{	
			$data = array(
				'firstname' => $firstname,
				'middlename'=> $middlename,
				'lastname' => $lastname,
				'phonenum' => $phonenum,
				'picture' =>$picture,
				'birthdate' =>$birthdate,
				'email' => $email,
				'address' => $address,
				'postalcode' =>$postalcode
			);
			$this->db->where('userid', $userid);
	//		$this->db->join('persons','persons.personid = users.personid');
			$this->db->update('users join persons on persons.personid = users.personid',$data);
		}
		
		public function updatePoints($username,$points)
		{	
			$data = array(
				'points' => $points,
			);
			$this->db->where('username', $username);
			$this->db->update('users',$data);
		}

		public function getAccount($userid)
		{
			$this->db->select('*'); 
			$this->db->from('users');
			$this->db->join('persons','persons.personid = users.personid');
			$this->db->where('userid',$userid);
            return $this->db->get();
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
		public function subscribe($owner,$subscriber)
		{
			$sql = "INSERT into subscriptions (subscriber,subscribedto) VALUES (?,?)";
			$this->db->query($sql, array($subscriber,$owner));
		}
		public function getUser($username)
		{
			return $query=$this->db->query("SELECT * FROM users WHERE email ='".$username."' OR username='".$username."'");
		}	
		public function getUserFromPerson($personid)
		{
			return $query=$this->db->query("SELECT * FROM users WHERE personid ='".$personid."'");

		}
		public function getPerson($personid)
		{
			return $query=$this->db->query("SELECT * FROM persons WHERE personid ='".$personid."'");
		}

}
