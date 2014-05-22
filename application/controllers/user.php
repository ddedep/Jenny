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
			$data['hide'] = FALSE;
			$data['username']=$this->session->userdata('username');
			$this->load->view('profile',$data);
		}
		else
		{
			redirect("/index.php/home");
		}
	}
	public function view()
	{
		$user= $this->uri->segment(3);
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$query=$this->User_model->getPerson($user);
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
				break;
			
		}
		$data['profile']=$newdata;
		$data['username']=$this->session->userdata('username');
		$data['hide'] = TRUE;
		$q = $this->User_model->getUserFromPerson($user);
		foreach($q->result_array() as $row)
		{
				$data['userid'] = $row['userid'];
			
		}
		$this->load->view('profile',$data);
	}
	public function subscription()
	{
		$adID= $this->uri->segment(3);
		$data['username']=$this->session->userdata('username');
		$userid = $this->session->userdata('userid');
		$query=$this->ads_model->getsubscribedAds($userid);
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
				break;
			
		}
		$this->load->view('viewsubs',$data);
	}
}
?>

