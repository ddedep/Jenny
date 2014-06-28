<?php
	class Messages_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function sendMessage($message,$from, $to)
		{
			$sql = "INSERT INTO messages(body,mfrom,mto) VALUES(?,?,?)";
			$this->db->query($sql,array($message,$from,$to));
		}

		public function getInbox($userid)
		{
			$this->db->select("*");
			$this->db->from('messages');
			$this->db->join('users','users.userid=messages.mfrom');
			$this->db->where('mto',$userid);
			return $this->db->get();
		}
		public function getSent($userid)
		{
			$this->db->select("*");
			$this->db->from('messages');
			$this->db->join('users','users.userid=messages.mto');
			$this->db->where('mfrom',$userid);
			return $this->db->get();
		}

		
}
