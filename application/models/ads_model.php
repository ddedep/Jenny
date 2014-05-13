<?php
	class Ads_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		
		public function CreateAd($title,$userid,$duration,$price,$video,$imagelink,$body,$categoryid,$cityid)
		{	
			$sql = "INSERT into ads (title,owner,isFeatured,duration,price,videolink,imagelink,body,categorid,cityid) VALUES (?,?,?,?,?,?,?,?,?,?)";
			
			$this->db->query($sql, array($title,$userid,0,$duration,$price,$video,$imagelink,$body,$categoryid,$cityid));
		}

		public function getAds()
		{
			$sql = "SELECT * FROM ads";
			
			return $this->db->query($sql);
		}
		public function getAdsOfUser($id)
		{
			$sql = "SELECT * FROM ads where owner=".$id;
			
			return $this->db->query($sql);
		}
		public function getAd($adid)
		{
			$sql = "SELECT * FROM ads where adid=".$adid;
			
			return $this->db->query($sql);
		}
		
}
