<?php
	class Ads_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		public function isSold($adid)
		{
			$sql = "INSERT INTO sold(adid) values(?)";
			$this->db->query($sql,$adid);
		}
		public function extendAd($adID,$duration)
		{
            $duration = $duration +30;
			$data = array('duration'=>$duration);
			$this->db->where('adid', $adID);
			$this->db->update('ads', $data);
		}
	    public function repostAd($adID)
		{
			$data = array('duration'=>30,'isexpired'=>0);
			$this->db->where('adid', $adID);
            $this->db->set('insertedon','NOW()',FALSE);
			$this->db->update('ads', $data);
		}
		public function featureAd($adID)
		{
			$data = array('isfeatured'=>1);
			$this->db->where('adid', $adID);
			$this->db->update('ads', $data);
		}

		public function getComments($adID)
		{
			$this->db->select('*');
			$this->db->from('adcomment');
			$this->db->join('users','users.userid=adcomment.owner');
			$this->db->where('adid',$adID);
			$this->db->order_by("cominsertedon", "desc"); 
			return $this->db->get();
		}
		public function getImages($adid)
		{
			$this->db->select("*");
			$this->db->from("images");
			$this->db->where("ad",$adid);
			return $this->db->get();
		}
		public function upload_photo($imagelink,$adid)
		{
			$sql = "INSERT INTO images(imagelink,ad) VALUES(?,?)";
			$this->db->query($sql,array($imagelink,$adid));
		}

		public function getLatest($userid)
		{
			$this->db->select_max("adid");
			$this->db->from("ads");
			$this->db->where("owner",$userid);
			$q =$this->db->get();
			foreach ($q->result_array() as $row) {
				return $row['adid'];
			}
		}
		public function addComment($body,$owner,$adid)
		{
			$sql = "INSERT INTO adcomment(body,owner,adid) VALUES (?,?,?)";
			$this->db->query($sql,array($body,$owner,$adid));
		}
		public function CreateAd($title,$userid,$duration,$price,$video,$image,$body,$categoryid,$provinceid)
		{	
			$sql = "INSERT into ads (title,owner,isFeatured,duration,price,videolink,imagelink,body,categoryid,provinceid) VALUES (?,?,?,?,?,?,?,?,?,?)";
			
			$this->db->query($sql, array($title,$userid,0,$duration,$price,$video,$image,$body,$categoryid,$provinceid));
		}
		public function adViewed($adid)
		{
			$sql ="UPDATE ads SET view = view + 1 WHERE adid=?";
			$this->db->query($sql,array($adid));
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
							'categoryid' =>$categoryid,
							'provinceid' => $cityid);
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
		public function getFeaturedAds()
		{
			$this->db->select("*");
			$this->db->from('ads');
			$this->db->where('isexpired',0);
			$this->db->where('isfeatured',1);
			return $this->db->get();
		}
		public function subcribe($subscriber, $adid)
		{
			$sql = "INSERT into subscriptions (subscriber,subscribedto) VALUES (?,?)";
			$this->db->query($sql, array($subscriber,$owner));
		}
		public function getsubscribedAds($userid)
		{
			$this->db->select('*'); 
			 $this->db->from('subscriptions');
   			 $this->db->join('ads','ads.owner = subscriptions.subscribedto');
   			 $this->db->join('users', 'users.userid = ads.owner');
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
   		//	 $this->db->join('ads', 'ads.owner =  subscriptions.subscribedto');
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
			$this->db->where('ads.isexpired',0);
			$this->db->where('favorites.ownerid',$userid);
			return $this->db->get();
		}
		public function getWishes($userid)
		{
			$this->db->select('*'); 
			$this->db->from('wishes');
			$this->db->join('ads','ads.adid=wishes.adid');
			$this->db->where('ads.isexpired',0);
			$this->db->where('wishes.userid',$userid);
			return $this->db->get();
		}
		public function isFavorite($userid,$adid)
		{
			$sql= "SELECT * FROM favorites where ownerid=? AND favoriteAdid=?";
			return $this->db->query($sql,array($userid,$adid))->num_rows();
		}
		public function isWish($userid,$adid)
		{
			$sql= "SELECT * FROM wishes where userid=? AND adid=?";
			return $this->db->query($sql,array($userid,$adid))->num_rows();
		}
		public function favoriteAd($adID, $userid)
		{
			$sql = "INSERT INTO favorites (ownerid,favoriteAdid) values (?,?)";
			$this->db->query($sql,array($userid,$adID));
		}
		public function wishAd($adID, $userid)
		{
			$sql = "INSERT INTO wishes (userid,adid) values (?,?)";
			$this->db->query($sql,array($userid,$adID));
		}
		public function getAds()
		{
			$this->db->select('*'); 
			$this->db->from('ads');
			$this->db->order_by('adid', 'asc');
			return $this->db->get();
		}
		public function getAdsOfUser($id)
		{
			$sql = "SELECT * FROM ads where owner=".$id." AND isexpired=0 ORDER BY adid DESC";
			
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
        public function addSearch($userid,$body)
        {
            $sql = "INSERT INTO searches (searchbody,owner) values(?,?)";
            $this->db->query($sql,array($body,$userid));
        }
        public function getSearches($userid)
        {
        	$this->db->select("*");
        	$this->db->from('searches');
        	$this->db->where('owner',$userid);
        	$this->db->order_by("insertedon", "desc"); 
        	return $this->db->get();
        }
		public function searchAds($search, $provinceid, $category,$region)
		{
			if($provinceid==0 && $category>0){
				$sql = "SELECT * FROM ads WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE)  AND categoryid=?";
				return $this->db->query($sql, array($search, $category));
			}
			elseif($provinceid==1 && $category==0)
			{
				$sql = "SELECT * FROM ads JOIN (provinces) where  (ads.provinceid= provinces.provinceid and provinces.regionid=?) and MATCH(title, body ) AGAINST (? IN BOOLEAN MODE) ";
				return $this->db->query($sql, array($region,$search));
			}
			elseif($provinceid==1 && $category>0)
			{
				$sql = "SELECT * FROM ads JOIN (provinces) where  (ads.provinceid= provinces.provinceid and provinces.regionid=?) and MATCH(title, body) AGAINST (? IN BOOLEAN MODE) and categoryid=?";
				return $this->db->query($sql, array($region,$search,$category));
			}
			elseif($provinceid>1 && $category==0){
				$sql = "SELECT * FROM ads WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE) AND provinceid=?";
				return $this->db->query($sql, array($search, $provinceid));
			}
			elseif($provinceid==0 && $category==0)
			{
				$sql = "SELECT * FROM ads WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE)";
				return $this->db->query($sql, array($search));
			}
			
			else
			{
				$sql = "SELECT * FROM ads WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE) AND provinceid=?  AND categoryid=?";
				return $this->db->query($sql, array($search, $provinceid, $category));
			}
            
		}
		public function getCategories()
		{
			$this->db->select("*");
			$this->db->from('categories');
			return $this->db->get();
		}
		public function getTop()
		{
			$this->db->select('*');
			$this->db->from('ads');
			$this->db->where('isexpired',0);
			$this->db->order_by("view", "desc"); 
			return $this->db->get();
		}
}
