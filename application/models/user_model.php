<?php
	class User_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		public function getReferenceCode()
		{
			$sql = "SELECT MAX(transactioncode) as transactioncode";
			$query=$this->db->query($sql);
			foreach ($query->result_array() as $row) {
				return $row['transactioncode'];
			}
		}
		public function addTrans($userid,$trans)
		{
			$data = array(
				'transactioncode' => $trans,
				'userid' =>$userid
			);
			$this->db->insert('payments',$data);
		}
		public function updateToken($username,$token)
		{	
			$data = array(
				'access_token' => $token,
			);
			$this->db->where('username', $username);
			$this->db->update('users',$data);
		}
		public function addView($userid)
		{
			$this->db->select("*");
			$this->db->from('users');
			$this->db->where('userid',$userid);
			$query=$this->db->get();
			$views=0;
			foreach ($query->result_array as $row) 
			{
				$views = $row['views'];
				break;
			}
			$views = $views+1;
			//$data = array('views' =>$views);
			$sql = "UPDATE users set views=? where userid=?";
			$this->db->query($sql,array($views,$userid));
		}
		public function verify($userid)
		{
			$data = array('isVerified' => 1);
			$this->db->where('userid', $userid);
			$this->db->update('users',$data);
		}
		public function userExists($username)
		{
			$this->db->select("*");
			$this->db->from('users');
			$this->db->where('username',$username);
			$count = $this->db->get()->num_rows();
			if($count>0) return true;
			else return false;
		}
		public function emailExists($email)
		{
			$this->db->select("*");
			$this->db->from('users');
			$this->db->where('email',$email);
			$count = $this->db->get()->num_rows();
			if($count>0) return true;
			else return false;
		}
		public function getSubscribers($userid)
		{
			$this->db->select("*");
			$this->db->from('subscriptions');
			$this->db->where('subscribedto',$userid);
			return $this->db->get();
		}
		public function getSubscriptions($userid)
		{
			$this->db->select("*");
			$this->db->from('subscriptions');
			$this->db->where('subscriber',$userid);
			return $this->db->get();
		}
		public function createPerson($firstname,$middlename,$lastname,$phonenum,$picture,$birthdate)
		{	
			$sql = "INSERT into persons (firstname,middlename,lastname,phonenum,picture,birthdate) VALUES (?,?,?,?,?,?)";
			
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

		public function createUser($username,$password,$email,$address,$postalcode,$verify)
		{	
			
			$query=$this->db->query("SELECT * FROM persons");
			$id=0;
			foreach($query->result_array() as $row)
			{
				$id=$row['personid'];
			}
			$sql = "INSERT into users (username,password,email,address,postalcode,personid,verification) VALUES (?,?,?,?,?,?,?)";
			$this->db->query($sql, array($username,$password,$email,$address,$postalcode,$id,$verify));
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
