<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('User_model');
		$this->load->model('ads_model');
		
	}
	public function contactUs()
	{
		$data['hide'] = TRUE;
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','name', 'required|xss_clean');
		$this->form_validation->set_rules('email','email', 'required|xss_clean');
		$this->form_validation->set_rules('contact','contact', 'required|xss_clean');
		$this->form_validation->set_rules('body','body', 'required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$data['message'] = "";
		}
		else
		{
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$contact = $this->input->post('contact');
			$body = $this->input->post('body');
			$to="dexteredep@gmail.com";
			$message = "Contact Us: \n\nName: ".$name."\n"."Email: ".$email."\n"."Contact number: ".$contact."\n\n"."Message: ".$body."\n";
			$headers = "From: messages@onestopdealph.com";
			mail($to,"Somebody Sent you a Message on onestopdealph.com", $message,$headers);
			$data['message'] = "Message Sent!";
			
		}
		$this->load->view('header',$data);
		$this->load->view('contact',$data);
	}
	public function forget()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','email', 'required|xss_clean');
		$email=$this->input->post('email');
		$data['username']=$this->session->userdata('username');
		$data['message'] = "";
		if($this->form_validation->run()!=FALSE)
		{
			$query=$this->User_model->getUser($email);

			$password="";

			foreach ($query->result_array() as $row) {
				$password = $row['password'];
			}
			if($query->num_rows()){
				$headers = "From: forget@onestopdealph.com";
				mail($email,"Password Retrieval", 'You have requested your password: : '.$password."\nPlease Ignore if you didn't request it.",$headers);
				$data['message'] = "Password Sent!";
			}
			else
			{
				$data['message'] = "Password Not Sent! Email does not exist";
			}
		}
		$this->load->view('header',$data);
		$this->load->view('forget',$data);

	}
	public function terms()
	{

		$this->load->view('terms');
	}
	public function getProvinces()
	{
		$regionid = $this->input->post('regionID');
		$res=$this->ads_model->getProvinces($regionid);
		$k ="<option value='1'>----------</option>";
		foreach($res->result_array() as $row)
		{
			$k=$k."<option value='".$row['provinceid']."'>".$row['provincename']."</option>";
		}
		echo $k;
		
	}
	public function index()
	{
	//	$data['mess'] ="sex ".$this->User_model->getReferenceCode();
		$data['username']=$this->session->userdata('username');
		$data['query'] = $this->ads_model->getfeaturedAds();
		$data['topAds'] = $this->ads_model->getTop();
		$data['recent'] = $this->ads_model->getRecentAds();
		$data['regions'] = $this->ads_model->getRegions();
		$data['categories'] = $this->ads_model->getCategories();
		$data['search'] = $this->ads_model->getSearches($this->session->userdata('userid'));
		$this->load->view('header',$data);
		$this->load->view('home',$data);

	}
	public function login()
	{
		$supportID= $this->uri->segment(3);
		$data['forumid'] = $supportID;
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->form_validation->set_rules('username','username', 'required|xss_clean');
		$this->form_validation->set_rules('password','password', 'required|xss_clean');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$data['err'] = "";
		$newdata = array(
                'logged_in' => FALSE
       );
		if($this->form_validation->run()==FALSE)
		{
			if(!$this->session->userdata('logged_in')){
				$data['username']=$this->session->userdata('username');
				$this->load->view('header',$data);
				$this->load->view('login',$data);
				$this->session->set_userdata($newdata);
			}
			else
			{
				redirect('/index.php/home');
			}
		}
		else
		{
			$query=$this->User_model->getUser($username);
			if($query->num_rows()==0) $data['err'] = "Incorrect username/email or password";
			foreach($query->result_array() as $row)
			{
				if($row['password']==$password){
					$newdata = array(
			                'username'  => $row['username'],
			                'userid'	=> $row['userid'],
			                'personid'	=> $row['personid'],
			                'email'		=> $row['email'],
			                'logged_in' => TRUE,
			                'verified'	=> $row['isVerified'],
			                'points'	=> $row['points'],
			       );
					if($this->session->userdata('look')=='true')
					{
						$this->session->set_userdata($newdata);
						$this->session->unset_userdata('look');
						$userid = $newdata['userid'];
		
						$wishes=$this->ads_model->getWishes($userid);
						foreach ($wishes->result_array() as $row) {
							if($row['body']==$this->session->userdata('lookingfor'))
							{
								redirect('index.php/ads/viewWish');
								break;
							}
						}
						$this->ads_model->addLookingFor($newdata['userid'],$this->session->userdata('lookingfor'));
						redirect('/index.php/ads/viewWish');
					}
					else if($this->session->userdata('message')>0)
					{
						$this->session->set_userdata($newdata);
						redirect('index.php/messages/compose/'.$this->session->userdata('message'));
					}
					else
					{
						

						if($this->input->post('forum')>0)
						{
							$this->session->set_userdata($newdata);
							redirect('index.php/support/view/'.$this->input->post('forum'));
						}
						else{
							$this->session->set_userdata($newdata);
							redirect('/index.php/user');
						}
					}
					

					
				}
				else
				{
					$data['err'] = "Incorrect username/email or password";
					break;
				}
			}
			$data['username']=$this->session->userdata('username');
			$this->load->view('header',$data);
			$this->load->view('login',$data);
		}
		
	}
}
?>

