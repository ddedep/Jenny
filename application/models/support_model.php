<?php
	class Support_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		public function getSupport()
		{
			$sql = "SELECT * FROM support";
			return $this->db->query($sql);
		}

		public function createSupport($title, $body,$owner)
		{
			$sql = "INSERT INTO support(title,body,owner) values (?,?,?)";
			$this->db->query($sql,array($title,$body,$owner));
		}
		
}
