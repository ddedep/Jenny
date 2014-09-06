<?php
	class Ads_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		public function getSold($userid)
		{
			$this->db->select("*");
			$this->db->from("ads");
			$this->db->where("owner",$userid);
			$this->db->where("issold",1);
			return $this->db->get();
		}
		public function deleteWish($wishid)
		{
			$sql = "DELETE FROM lookingfor where lookingid=?";
			$this->db->query($sql,array($wishid));
		}
		public function addLookingFor($userid,$search)
		{
			$sql = "INSERT INTO lookingfor(body,owner) VALUES(?,?)";
			$this->db->query($sql,array($search,$userid));
		}

		public function sold($adid)
		{
			$sql = "UPDATE ads SET issold=1 WHERE adid=?";
			$this->db->query($sql,array($adid));
		}
		public function extendAd($adID,$duration,$ad)
		{
            $duration = $duration +$ad;
			$data = array('duration'=>$duration);
			$this->db->where('adid', $adID);
			$this->db->update('ads', $data);
		}
	    public function repostAd($adID,$length)
		{
			$data = array('duration'=>$length,'isexpired'=>0,'issold'=>0);
			$this->db->where('adid', $adID);
            $this->db->set('adinsertedon','NOW()',FALSE);
			$this->db->update('ads', $data);
		}
		public function featureAd($adID,$length)
		{
			$data = array('isfeatured'=>1,'featureddate'=>'NOW()','featuredlength'=>$length);
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
		public function upload_photo($image,$adid)
		{
			$sql = "UPDATE ads SET imagelink1=?,imagelink2=?,imagelink3=?,imagelink4=?,imagelink5=?,imagelink6=? WHERE adid=?";
			$this->db->query($sql,array($image[0],$image[1],$image[2],$image[3],$image[4],$image[5],$adid));
		}

		public function upload_photo2($image,$adid,$k)
		{
			$sql = "UPDATE ads SET imagelink".($k+1)."=? WHERE adid=?";
			$this->db->query($sql,array($image,$adid,$k));
		}

		public function getLatest($userid)
		{
			$this->db->select_max("adid");
			$this->db->from("ads");
			$this->db->where("owner",$userid);
			$this->db->where("issold",0);
			$this->db->where("isexpired",1);
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
		public function CreateAd($title,$userid,$duration,$price,$video,$body,$categoryid,$provinceid)
		{	
			$sql = "INSERT into ads (title,owner,isFeatured,duration,price,videolink,body,categoryid,provinceid) VALUES (?,?,?,?,?,?,?,?,?)";
			
			$this->db->query($sql, array($title,$userid,0,$duration,$price,$video,$body,$categoryid,$provinceid));
		}
		public function adViewed($adid)
		{
			$sql ="UPDATE ads SET view = view + 1 WHERE adid=?";
			$this->db->query($sql,array($adid));
		}
		public function EditAd($adID,$title,$userid,$duration,$price,$video,$body,$categoryid,$cityid)
		{	
			$data = array('title'=>$title,
							'owner'=>$userid,
							'duration'=>$duration,
							'price' => $price,
							'videolink' => $video,
							'body' =>$body,
							'categoryid' =>$categoryid,
							'provinceid' => $cityid);
			$sql = "UPDATE ads SET title=?,owner=?,duration=?,price=?,videolink=?,body=?,categoryid=?,provinceid=? WHERE adid=?";
			return $this->db->query($sql,array($title,$userid,$duration,$price,$video,$body,$categoryid,$cityid,$adID));
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
			$this->db->join('users','users.userid=ads.owner');
			$this->db->where('isexpired',0);
			$this->db->where('issold',0);
			$this->db->where('isfeatured',1);
			return $this->db->get();
		}
		public function subcribe($subscriber, $adid)
		{
			$sql = "INSERT into subscriptions (subscriber,subscribedto) VALUES (?,?)";
			$this->db->query($sql, array($subscriber,$owner));
		}
		public function unsubcribe($subscriptionid)
		{
			$sql = "DELETE FROM subscriptions WHERE subscriptionid=?";
			$this->db->query($sql, array($subscriptionid));
		}
		public function getsubscribedAds($userid)
		{
			$this->db->select('*'); 
			 $this->db->from('subscriptions');
   			 $this->db->join('ads','ads.owner = subscriptions.subscribedto');
   			 $this->db->join('users', 'users.userid = ads.owner');
    		 $this->db->where('subscriber',$userid);
    		 $this->db->where('ads.isExpired',0);
    		 $this->db->where('ads.isSold',0);
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
		public function lookAt($search,$adid)
		{
			$sql = "SELECT * FROM ads WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE)  AND adid=?";
			return $this->db->query($sql,array($search,$adid));
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
			$this->db->from('lookingfor');
			$this->db->where('owner',$userid);
			$this->db->order_by('lookingid', 'desc');
			return $this->db->get();
		}

		public function getAllWish()
		{
			$this->db->select("*");
			$this->db->from("lookingfor");
			$this->db->join('users','users.userid=lookingfor.owner');
			$this->db->join('persons','persons.personid=users.personid');
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
		public function unfavorite($adid,$userid)
		{
			$sql = "DELETE FROM favorites WHERE favoriteAdid=? and ownerid=?";
			$this->db->query($sql,array($adid,$userid));
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
		public function getRecentAds()
		{
			$this->db->select('*'); 
			$this->db->from('ads');
			$this->db->join('users','users.userid=ads.owner','left');
			$this->db->order_by('adid', 'desc');
			return $this->db->get();
		}
		public function getAdsOfUser($id)
		{
			$sql = "SELECT * FROM ads where owner=".$id." AND isexpired=0 AND issold=0 ORDER BY adid DESC";
			
			return $this->db->query($sql);
		}
		public function getProvinces($regionid)
		{
			$this->db->select('*'); 
			$this->db->from('provinces');
			$this->db->where('regionid',$regionid);
			$this->db->order_by("provinceid", "asc");
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
   			 $this->db->join('persons','users.personid=persons.personid');
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
        public function searchCat($cat)
        {
        	$this->db->select("*");
        	$this->db->from("ads");
        	$this->db->join("users", "users.userid=ads.owner");
        	$this->db->where("categoryid",$cat);
        	return $this->db->get();
        }
		public function searchAds($search, $provinceid, $category,$region)
		{
			if($provinceid==0 && $category>0){
				$sql = "SELECT * FROM ads LEFT JOIN users on users.userid=ads.owner WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE)  AND categoryid=? AND issold=0 AND isExpired=0 ORDER BY adinsertedon DESC";
				return $this->db->query($sql, array($search, $category));
			}
			elseif($provinceid==1 && $category==0)
			{
				$sql = "SELECT * FROM ads LEFT JOIN users on users.userid=ads.owner JOIN (provinces)  where  (ads.provinceid= provinces.provinceid and provinces.regionid=?) and MATCH(title, body ) AGAINST (? IN BOOLEAN MODE) AND issold=0 AND isExpired=0 ORDER BY adinsertedon DESC";
				return $this->db->query($sql, array($region,$search));
			}
			elseif($provinceid==1 && $category>0)
			{
				$sql = "SELECT * FROM ads LEFT JOIN users on users.userid=ads.owner JOIN (provinces) where  (ads.provinceid= provinces.provinceid and provinces.regionid=?) and MATCH(title, body) AGAINST (? IN BOOLEAN MODE) and categoryid=? AND issold=0 AND isExpired=0 ORDER BY adinsertedon DESC";
				return $this->db->query($sql, array($region,$search,$category));
			}
			elseif($provinceid>1 && $category==0){
				$sql = "SELECT * FROM ads LEFT JOIN users on users.userid=ads.owner WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE) AND provinceid=? AND issold=0 AND isExpired=0 ORDER BY adinsertedon DESC";
				return $this->db->query($sql, array($search, $provinceid));
			}
			elseif($provinceid==0 && $category==0)
			{
				$sql = "SELECT * FROM ads LEFT JOIN users on users.userid=ads.owner WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE) AND issold=0 AND isExpired=0 ORDER BY adinsertedon DESC";
				return $this->db->query($sql,array($search));
			}
			
			else
			{
				$sql = "SELECT * FROM ads LEFT JOIN users on users.userid=ads.owner WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE) AND provinceid=?  AND categoryid=? AND issold=0 AND isExpired=0 ORDER BY adinsertedon DESC";
				return $this->db->query($sql, array($search, $provinceid, $category));
			}
            
		}

		public function searchAdsAs($search, $provinceid, $category,$region)
		{
			if($provinceid==0 && $category>0){
				$sql = "SELECT * FROM ads left JOIN users on users.userid=ads.owner WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE)  AND categoryid=? AND issold=0 AND isExpired=0 ORDER BY adinsertedon DESC";
				return $this->db->query($sql, array($search, $category));
			}
			elseif($provinceid==1 && $category==0)
			{
				$sql = "SELECT * FROM ads left JOIN users on users.userid=ads.owner JOIN (provinces)  where  (ads.provinceid= provinces.provinceid and provinces.regionid=?) and MATCH(title, body ) AGAINST (? IN BOOLEAN MODE) AND issold=0 AND isExpired=0 ORDER BY adinsertedon DESC";
				return $this->db->query($sql, array($region,$search));
			}
			elseif($provinceid==1 && $category>0)
			{
				$sql = "SELECT * FROM ads left JOIN users on users.userid=ads.owner JOIN (provinces) where  (ads.provinceid= provinces.provinceid and provinces.regionid=?) and MATCH(title, body) AGAINST (? IN BOOLEAN MODE) and categoryid=? AND issold=0 AND isExpired=0 ORDER BY adinsertedon DESC";
				return $this->db->query($sql, array($region,$search,$category));
			}
			elseif($provinceid>1 && $category==0){
				$sql = "SELECT * FROM ads left JOIN users on users.userid=ads.owner WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE) AND provinceid=? AND issold=0 AND isExpired=0 ORDER BY adinsertedon DESC";
				return $this->db->query($sql, array($search, $provinceid));
			}
			elseif($provinceid==0 && $category==0)
			{
				$sql = "SELECT * FROM ads left JOIN users on users.userid=ads.owner WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE) AND issold=0 AND isExpired=0 ORDER BY adinsertedon DESC";
				return $this->db->query($sql);
			}
			
			else
			{
				$sql = "SELECT * FROM ads left JOIN users on users.userid=ads.owner WHERE MATCH(title, body) AGAINST (? IN BOOLEAN MODE) AND provinceid=?  AND categoryid=? AND issold=0 AND isExpired=0 ORDER BY adinsertedon DESC";
				return $this->db->query($sql, array($search, $provinceid, $category));
			}
            
		}
		public function getCategories()
		{
			$this->db->select("*");
			$this->db->from('categories');
			$this->db->order_by("categoryname", "asc");
			return $this->db->get();
		}
		public function getTop()
		{
			$this->db->select('*');
			$this->db->from('ads');
			$this->db->join('users','users.userid=ads.owner','left');
			$this->db->where('isexpired',0);
			$this->db->where('issold',0);
			$this->db->order_by("view", "desc"); 
			return $this->db->get();
		}
}
