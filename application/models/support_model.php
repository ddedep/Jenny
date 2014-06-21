<?php
	class Support_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		public function getAllSupport()
		{
			$this->db->select('*');
			$this->db->from('support');
			$this->db->join('users', 'users.userid=support.owner');
			return $this->db->get();
		}

		public function createSupport($title, $body,$owner)
		{
			$sql = "INSERT INTO support(title,body,owner) values (?,?,?)";
			$this->db->query($sql,array($title,$body,$owner));
		}
		public function getSupport($supportID)
		{
			$this->db->select('*');
			$this->db->from('support');
			$this->db->join('users', 'users.userid=support.owner');
			$this->db->where('support_id',$supportID);
			return $this->db->get();
		}

		public function getComments($supportID)
		{
			$this->db->select('*');
			$this->db->from('comments');
			$this->db->join('users','users.userid=comments.owner');
			$this->db->where('threadid',$supportID);
			$this->db->order_by("cominsertedon", "desc"); 
			return $this->db->get();
		}
		public function addComment($body,$owner,$supportid)
		{
			$sql = "INSERT INTO comments(body,owner,threadid) VALUES (?,?,?)";
			$this->db->query($sql,array($body,$owner,$supportid));
		}
		
}
