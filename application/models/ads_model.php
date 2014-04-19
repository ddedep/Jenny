<?php
	class Ads_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		
		public function CreateAd($title,$description,$price,$expiration)
		{	
			$sql = "INSERT into users (username,first,last,email,birthdate,password,accountType) VALUES (?,?,?,?,?,?,?)";
			
			$this->db->query($sql, array($user,$first,$last,$email,$birth,$password,1));
		}
		
}
