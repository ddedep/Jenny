<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('User_model');
		$this->load->model('ads_model');
		
	}
	public function terms()
	{
		$this->load->view('terms');
	}
	public function getProvinces()
	{
		$regionid = $this->input->post('regionID');
		$res=$this->ads_model->getProvinces($regionid);
		$k ="";
		foreach($res->result_array() as $row)
		{
			$k=$k."<option value='".$row['provinceid']."'>".$row['provincename']."</option>";
		}
		echo $k;
		
	}
	public function index()
	{
		$data['username']=$this->session->userdata('username');
		$data['query'] = $this->ads_model->getAds();
		$data['topAds'] = $this->ads_model->getTop();
		$data['regions'] = $this->ads_model->getRegions();
		$data['categories'] = $this->ads_model->getCategories();
		$this->load->view('home',$data);
	}
	public function login()
	{
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->form_validation->set_rules('username','username', 'required|xss_clean');
		$this->form_validation->set_rules('password','password', 'required|xss_clean');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$newdata = array(
                'logged_in' => FALSE
       );
		if($this->form_validation->run()==FALSE)
		{
			if(!$this->session->userdata('logged_in')){
				$data['username']=$this->session->userdata('username');
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
			foreach($query->result_array() as $row)
			{
				if($row['password']==$password){
					$newdata = array(
			                'username'  => $row['username'],
			                'userid'	=> $row['userid'],
			                'personid'	=> $row['personid'],
			                'email'		=> $row['email'],
			                'logged_in' => TRUE
			       );
					$this->session->set_userdata($newdata);
					redirect('/index.php/user');
				}
				else
				{
					
					break;
				}
			}
			$data['username']=$this->session->userdata('username');
			$this->load->view('login',$data);
		}
		
	}
}
?>

