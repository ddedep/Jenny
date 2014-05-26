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

		public function EditAd($adID,$title,$userid,$duration,$price,$video,$imagelink,$body,$categoryid,$cityid)
		{	
			$data = array('title'=>$title,
							'owner'=>$userid,
							'isFeatured'=>0,
							'duration'=>$duration,
							'price' => $price,
							'videolink' => $video,
							'imagelink' =>$imagelink,
							'body' =>$body,
							'categorid' =>$categoryid,
							'cityid' => $cityid);
			$this->db->where('adid', $adID);
			$this->db->update('ads', $data);
		}
		public function delete($adid)
		{
			$sql = "DELETE FROM ads where adid=".$adid;
			$this->db->query($sql);
		}
		public function getsubscribedAds($userid)
		{
			$this->db->select('*'); 
			 $this->db->from('subscriptions');
   			 $this->db->join('ads','ads.owner = subscriptions.subscribedto');
    		 $this->db->where('subscriber',$userid);
            return $this->db->get();
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
			//$sql = "SELECT * FROM ads where adid=".$adid;
			$this->db->select('*'); 
			 $this->db->from('ads');
			 
   			 $this->db->join('users','users.userid = ads.owner');
   			 $this->db->where('ads.adid',$adid);
    		
            return $this->db->get();
		}
		public function searchAds($search)
		{
			$sql = "SELECT * FROM ads WHERE MATCH(title, body) AGAINST ('".$search."')";
			return $this->db->query($sql);
		}
}
