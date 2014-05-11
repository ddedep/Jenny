<?php
	class Map_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function getMap()
		{
			$sql = "SELECT * FROM ads";
			
			return $this->db->query($sql);
		}
		
		
}
