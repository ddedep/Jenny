<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('ads_model');
		$this->load->model('User_model');
		$this->load->helper('date');
	}

	public function comment()
	{

		$adid=$this->input->post('adid');
		$body=$this->input->post('body');
		$userid = $this->session->userdata('userid');
		if($body!=""){
			$this->ads_model->addComment($body,$userid,$adid);
			$datestring = "%Y-%m-%d %h:%i:%s";
			$time = time();

			echo mdate($datestring, $time);
		}
	}
	public function Sell()
	{
		$this->input->post('adid');
		$this->ads_model->sold($adid);
		$this->redirect('index.php/ads/viewAd/'.$adid);
	}
	public function view()
	{
		$adID= $this->uri->segment(3);
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
			if($adID==null){
				$data['query'] = $this->ads_model->getAdsOfUser($this->session->userdata('userid'));
				$data['hide'] = FALSE;
				$this->load->view('header',$data);
				$this->load->view('viewAd',$data);
			}
			else
			{
				$query=$this->ads_model->getAd($adID);
				$data['hidefav'] = $this->ads_model->isFavorite($this->session->userdata('userid'),$adID);
				$data['hidewish'] = $this->ads_model->isWish($this->session->userdata('userid'),$adID);
				$data['query'] =$query;
				$data['comments'] = $this->ads_model->getComments($adID);
				if($query->num_rows()>0){
					$this->ads_model->adViewed($adID);
					$this->load->view('header',$data);
					$this->load->view('viewAd2',$data);
				}					
				else
				{
					$this->load->view('header',$data);
					$this->load->view('notfound',$data);
				}
			}
	}
	public function wish()
	{
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$query=$this->ads_model->getAd($adID);
		$data['query'] =$query;
		$adID = $this->input->post('wishid');
		$userid = $data['userid'];
		$this->ads_model->wishAd($adID, $userid);
		redirect("index.php/ads/viewWish");
	}
	public function viewWish()
	{
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$data['hide'] = FALSE;
		$data['query'] = $this->ads_model->getWishes($this->session->userdata('userid'));
		$this->load->view('header',$data);
		$this->load->view('viewAd',$data);
	}
	public function viewExpired()
	{
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$data['query'] = $this->ads_model->getExpiredAds($this->session->userdata('userid'));
		$data['hide'] = FALSE;
		$this->load->view('header',$data);
		$this->load->view('viewAd',$data);
	}
	public function viewFavorites()
	{
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$data['hide'] = FALSE;
		$data['query'] = $this->ads_model->getFavorites($this->session->userdata('userid'));
		$this->load->view('header',$data);
		$this->load->view('viewAd',$data);
	}
	public function Extend()
	{
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$adID= $this->uri->segment(3);
		$query=$this->ads_model->getAd($adID);
		$data['query'] = $query;
		$data['message'] ="";
		$this->load->view('header',$data);
		$this->load->view('extend',$data);
	}
    public function Feature()
	{
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$adID= $this->uri->segment(3);
		$query=$this->ads_model->getAd($adID);
		$data['query'] = $query;
		$data['message'] ="";
		$this->load->view('header',$data);
		$this->load->view('feature',$data);
	}
    
    public function repost()
    {
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$adID= $this->uri->segment(3);
		$query=$this->ads_model->getAd($adID);
		$data['query'] = $query;
		$data['message'] ="";
		$this->load->view('header',$data);
		$this->load->view('repost',$data);
    }
    public function repostThis()
	{
		$adID=$this->input->post('adid');
				
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$query=$this->ads_model->getAd($adID);
		$data['query'] = $query;
		$user=$this->User_model->getUser($this->session->userdata('username'));
		$points=0;
		foreach ($user->result_array() as $row) {
			$points= $row['points'];
			break;
		}
		if($points<150){
			$data['message'] ="Not Enough Points";
			$query=$this->ads_model->getAd($adID);
			$data['query'] = $query;
			$this->load->view('header',$data);
			$this->load->view('repost',$data);
		}
		else
		{

			$points = $points-150;
			$this->ads_model->repostAd($adID);
			$this->User_model->updatePoints($this->session->userdata('username'),$points);
			$data['message'] ="150 Points Deducted";
			$query=$this->ads_model->getAd($adID);
			$data['query'] = $query;
			$this->load->view('header',$data);
			$this->load->view('repost',$data);
		}
	}
	public function featureThis()
	{
		$adID=$this->input->post('adid');
				
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$query=$this->ads_model->getAd($adID);
		$data['query'] = $query;
		$user=$this->User_model->getUser($this->session->userdata('username'));
		$points=0;
		foreach ($user->result_array() as $row) {
			$points= $row['points'];
			break;
		}
		if($points<300){
			$data['message'] ="Not Enough Points";
			$query=$this->ads_model->getAd($adID);
			$data['query'] = $query;
			$this->load->view('header',$data);
			$this->load->view('feature',$data);
		}
		else
		{

			$points = $points-300;
			$this->ads_model->featureAd($adID);
			$this->User_model->updatePoints($this->session->userdata('username'),$points);
			$data['message'] ="300 Points Deducted";
			$query=$this->ads_model->getAd($adID);
			$data['query'] = $query;
			$this->load->view('header',$data);
			$this->load->view('feature',$data);
		}
	}

    public function extendThis()
    {
       	$adID=$this->input->post('adid');
		$duration = $this->input->post('duration');
        $data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$query=$this->ads_model->getAd($adID);
		$data['query'] = $query;
		$user=$this->User_model->getUser($this->session->userdata('username'));
		$points=0;
		foreach ($user->result_array() as $row) {
			$points= $row['points'];
			break;
		}
		if($points<120){
			$data['message'] ="Not Enough Points";
			$query=$this->ads_model->getAd($adID);
			$data['query'] = $query;
			$this->load->view('header',$data);
			$this->load->view('extend',$data);
		}
		else
		{
			$points = $points-120;
			$this->ads_model->extendAd($adID,$duration);
			$this->User_model->updatePoints($this->session->userdata('username'),$points);
			$data['message'] ="120 Points Deducted";
			$query=$this->ads_model->getAd($adID);
			$data['query'] = $query;
			$this->load->view('header',$data);
			$this->load->view('extend',$data);
		}
    }
	
	public function favorite()
	{
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$adID = $this->input->post('favid');
		$userid = $data['userid'];
		$this->ads_model->favoriteAd($adID, $userid);
		redirect("index.php/ads/viewFavorites");
	}
	public function delete()
	{
		$adID = $this->input->post('owner');
		$this->ads_model->delete($adID);
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$data['query'] = $this->ads_model->getAdsOfUser($this->session->userdata('userid'));
		$this->load->view('header',$data);
		$this->load->view('viewAd',$data);
	}
	public function edit()
	{

		$data['regions'] = $this->ads_model->getRegions();
		$data['categories'] = $this->ads_model->getCategories();
		$this->load->library('form_validation');
		if($this->session->userdata('verified')==0) 
		{
			redirect('index.php/user');
		}
		$adID= $this->uri->segment(3);
		$data['adID'] = $adID;
		if($adID!=null){
			if($this->session->userdata('logged_in')){
				$data['username']=$this->session->userdata('username');
				$query=$this->ads_model->getAd($adID);
				$data['query'] =$query;
				$this->form_validation->set_rules('title','title', 'required|xss_clean');
				$this->form_validation->set_rules('description','description', 'required|xss_clean');
				$this->form_validation->set_rules('price','price', 'required|xss_clean');
				$categoryid=$this->input->post('category');
				$cityid=$this->input->post('city');
				$title=$this->input->post('title');
				$body=$this->input->post('description');
				$duration=$this->input->post('duration');
				$price=$this->input->post('price');
				$video=$this->input->post('video');
				$temp = explode("/",$video);
				$video = $temp[count($temp)-1];
				$temp = explode("=", $video);
				$video = $temp[count($temp)-1];
				$userid = $this->session->userdata('userid');

				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '10000';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				$this->load->library('upload', $config);
				if($this->form_validation->run()==FALSE){
					$data['message'] ="";
					$data['username']=$this->session->userdata('username');
					$this->load->view('header',$data);
					$this->load->view('editAd',$data);
				}
				else
				{
					if ( ! $this->upload->do_upload())
					{
						$error = array('error' => $this->upload->display_errors());

						$image = $this->input->post('imgname');;
						$this->ads_model->EditAd($adID,$title,$userid,$duration,$price,$video,$image,$body,$categoryid,$cityid);
						$data['message'] ="Ad Edited!";
						$data['username']=$this->session->userdata('username');
						$data['adID'] = $adID;
						$this->load->view('header',$data);
						$this->load->view('editAd',$data);
					}
					else
					{
						$data = array('upload_data' => $this->upload->data(),
										'err' => "Edited!");
						$dat = $this->upload->data();
						$data['query'] =$query;
						$image = $dat['file_name'];
						$data['adID'] = $adID;
						$this->ads_model->EditAd($adID,$title,$userid,$duration,$price,$video,$image,$body,$categoryid,$cityid);
						$data['message'] ="Ad Edited!";
						$data['username']=$this->session->userdata('username');
						$this->load->view('header',$data);
						$this->load->view('editAd',$data);
						
					}
					
				}

			}
			else
			{
				redirect("index.php/register");
			}
		}
		else
		{
			redirect("index.php/Ads/view");
		}
	
	}
	public function search()
	{
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$search = $this->input->post('search');
		$category = $this->input->post('category');
		$province = $this->input->post('province');
		$region = $this->input->post('region');
		$data['hide'] = TRUE;
		$data['query']= $this->ads_model->searchAds($search,$province,$category,$region);
		if($this->session->userdata('logged_in')){
			$this->ads_model->addSearch($data['userid'],$search);
		}
		$this->load->view('header',$data);		
		$this->load->view('viewAd3',$data);
	}
	public function subscribe()
	{
		if(!$this->session->userdata('logged_in')) redirect('index.php/register');
		$owner = $this->input->post('userid');
		$subscriber = $this->session->userdata('userid');
		$this->User_model->subscribe($owner,$subscriber);
		redirect('index.php/user');
	}
	public function index() // create ad
	{
		$this->load->library('form_validation');
			$data['regions'] = $this->ads_model->getRegions();
			$data['categories'] = $this->ads_model->getCategories();
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('verified')==0) 
			{
				redirect('index.php/register/verify');
			}
			$data['regions'] = $this->ads_model->getRegions();
			$data['categories'] = $this->ads_model->getCategories();
			$data['username']=$this->session->userdata('username');
			$data['search'] = $this->ads_model->getSearches($this->session->userdata('userid'));
			$this->form_validation->set_rules('title','title', 'required|xss_clean');
			$this->form_validation->set_rules('description','description', 'required|xss_clean');
			$this->form_validation->set_rules('price','price', 'required|xss_clean');
			$categoryid=$this->input->post('category');
			$cityid=$this->input->post('provinces');
			$title=$this->input->post('title');
			$body=$this->input->post('description');
			$duration=$this->input->post('duration');
			$price=$this->input->post('price');
			$video=$this->input->post('video');
			$temp = explode("/",$video);
			$video = $temp[count($temp)-1];
			$temp = explode("=", $video);
			$video = $temp[count($temp)-1];
			$userid = $this->session->userdata('userid');

			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|jpe';
			$config['max_size']	= '10000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);
			if($this->form_validation->run()==FALSE){
				$data['message'] ="";
				$data['username']=$this->session->userdata('username');
				$this->load->view('header',$data);
				$this->load->view('createAd',$data);
			}
			else
			{
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
				}
				else
				{
					$data = array('upload_data' => $this->upload->data(),
									'err' => "Registered!");
					
				}
				$dat = $this->upload->data();
				$image = $dat['file_name'];
				$this->ads_model->CreateAd($title,$userid,$duration,$price,$video,$image,$body,$categoryid,$cityid);
				$userz=$this->User_model->getUser($this->session->userdata('username'));
				$points=0;
				foreach ($userz->result_array() as $row) {
					$points= $row['points'];
					break;
				}

				$points = $points+1;
				$this->User_model->updatePoints($this->session->userdata('username'),$points);
				$data['message'] ="Ad Created!";
				$data['username']=$this->session->userdata('username');
				$data['regions'] = $this->ads_model->getRegions();
				$data['categories'] = $this->ads_model->getCategories();
				$this->load->view('header',$data);
				$this->load->view('createAd',$data);
			}

		}
		else
		{
			redirect("index.php/register");
		}
	}
}
?>

