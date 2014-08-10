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

		public function deleteInbox($messageid)
		{
			$sql = "UPDATE messages SET inboxdeleted=1 where messageid=?";
			$this->db->query($sql,array($messageid));
		}

		public function deleteSent($messageid)
		{
			$sql = "UPDATE messages SET sentdeleted=1 where messageid=?";
			$this->db->query($sql,array($messageid));
		}

		public function getInboxMessage($messageid, $userid)
		{
			$this->db->select("*");
			$this->db->from("messages");
			$this->db->join('users','users.userid=messages.mfrom');
			$this->db->where("messageid",$messageid);
			$this->db->where('inboxdeleted',0);
			$this->db->where("mto",$userid);
			$this->db->order_by("messageid", "desc"); 
			return $this->db->get();
		}
		public function getSentMessage($messageid, $userid)
		{
			$this->db->select("*");
			$this->db->from("messages");
			$this->db->join('users','users.userid=messages.mfrom');
			$this->db->where("messageid",$messageid);
			$this->db->where('sentdeleted',0);
			$this->db->where("mfrom",$userid);
			$this->db->order_by("messageid", "desc");
			return $this->db->get();
		}
		public function getInbox($userid)
		{
			$this->db->select("*");
			$this->db->from('messages');
			$this->db->join('users','users.userid=messages.mfrom');
			$this->db->where('inboxdeleted',0);
			$this->db->where('mto',$userid);
			$this->db->order_by("messageid", "desc");
			return $this->db->get();
		}
		public function getUnread($userid)
		{
			$this->db->select("*");
			$this->db->from('messages');
			$this->db->join('users','users.userid=messages.mfrom');
			$this->db->where('inboxdeleted',0);
			$this->db->where('opened',0);
			$this->db->where('mto',$userid);
			$this->db->order_by("messageid", "desc");
			return $this->db->get();
		}
		public function getSent($userid)
		{
			$this->db->select("*");
			$this->db->from('messages');
			$this->db->join('users','users.userid=messages.mto');
			$this->db->where('mfrom',$userid);
			$this->db->where('sentdeleted',0);
			$this->db->order_by("messageid", "desc");
			return $this->db->get();
		}

		
}
