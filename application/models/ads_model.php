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

		public function getExpiredAds($userid)
		{
			$this->db->select("*");
			$this->db->from('ads');
			$this->db->where('owner',$userid);
			$this->db->where('isexpired',1);
			return $this->db->get();
		}
		public function getsubscribedAds($userid)
		{
			$this->db->select('*'); 
			 $this->db->from('subscriptions');
   			 $this->db->join('ads','ads.owner = subscriptions.subscribedto');
    		 $this->db->where('subscriber',$userid);
    		 $this->db->where('ads.isExpired',0);
            return $this->db->get();
		}
		public function getsubscribedUsers($userid)
		{
			$this->db->select('*'); 
			 $this->db->from('users');
   			 $this->db->join('subscriptions','users.userid = subscriptions.subscribedto');
   			 $this->db->join('persons','persons.personid = users.personid');
    		 $this->db->where('subscriptions.subscriber',$userid);
            return $this->db->get();
		}
		public function isSubscribed()
		{

		}
		public function getFavorites($userid)
		{
			$this->db->select('*'); 
			$this->db->from('favorites');
			$this->db->join('ads','ads.adid=favorites.favoriteAdid');
			$this->db->where('favorites.ownerid',$userid);
			return $this->db->get();
		}
		public function isFavorite($userid,$adid)
		{
			$sql= "SELECT * FROM favorites where ownerid=? AND favoriteAdid=?";
			return $this->db->query($sql,array($userid,$adid))->num_rows();
		}
		public function favoriteAd($adID, $userid)
		{
			$sql = "INSERT INTO favorites (ownerid,favoriteAdid) values (?,?)";
			$this->db->query($sql,array($userid,$adID));
		}
		public function getAds()
		{
			$sql = "SELECT * FROM ads";
			
			return $this->db->query($sql);
		}
		public function getAdsOfUser($id)
		{
			$sql = "SELECT * FROM ads where owner=".$id." AND isexpired=0";
			
			return $this->db->query($sql);
		}
		public function getProvinces($regionid)
		{
			$this->db->select('*'); 
			$this->db->from('provinces');
			$this->db->where('regionid',$regionid);
			return $this->db->get();
		}
		public function getRegions()
		{
			$this->db->select('*'); 
			$this->db->from('regions');
			return $this->db->get();
		}
		public function getAd($adid)
		{
			//$sql = "SELECT * FROM ads where adid=".$adid;
			$this->db->select('*'); 
			 $this->db->from('ads');
   			 $this->db->join('users','ads.owner = users.userid','left');
   			 $this->db->where('ads.adid',$adid);
    		
            return $this->db->get();
		}
		public function searchAds($search)
		{
			$sql = "SELECT * FROM ads WHERE MATCH(title, body) AGAINST ('".$search."')";
			return $this->db->query($sql);
		}
		public function getCategories()
		{
			$this->db->select("*");
			$this->db->from('categories');
			return $this->db->get();
		}
}
