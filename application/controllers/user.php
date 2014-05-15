<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('User_model');
		$this->load->model('ads_model');
	}
	public function index()
	{
		$this->load->library('session');
		$newdata=array();
		if($this->session->userdata('logged_in')){
			$query=$this->User_model->getPerson($this->session->userdata('personid'));
			
			foreach($query->result_array() as $row)
			{
					$newdata = array(
						'firstname' => $row['firstname'],
						'lastname' => $row['lastname'],
						'middlename' => $row['middlename'],
						'phonenum' => $row['phonenum'],
						'pic' =>$row['picture'],
						'email' =>$this->session->userdata('email')
			       );
					$this->session->set_userdata($newdata);
					break;
				
			}
			$data['profile']=$newdata;
			$data['username']=$this->session->userdata('username');
			$this->load->view('profile',$data);
		}
		else
		{
			redirect("/index.php/home");
		}
	}
	public function subscription()
	{
		$adID= $this->uri->segment(3);
		$data['username']=$this->session->userdata('username');
		if($adID==null){
			$data['query'] = $this->ads_model->getAdsOfUser($this->session->userdata('userid'));
			$this->load->view('subscription',$data);
		}
		else
		{
			$query=$this->ads_model->getAd($adID);
			$data['query'] =$query;
			if($query->num_rows()>0)
				$this->load->view('viewAd2',$data);
			else
				$this->load->view('notfound',$data);
		}
	}
}
?>

