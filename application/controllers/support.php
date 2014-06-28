<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('date');
		$this->load->model('ads_model');
		$this->load->model('User_model');
		$this->load->model('support_model');
	}
	public function index()
	{
		$supportID= $this->uri->segment(3);
		$userid = $this->session->userdata('userid');
		$data['username']=$this->session->userdata('username');
		$data['query']=$this->support_model->getAllSupport();
		$this->load->view('header',$data);
		$this->load->view('support',$data);
	}
	public function comment()
	{
		$threadid=$this->input->post('threadid');
		$body=$this->input->post('body');
		$userid = $this->session->userdata('userid');
		if($body!=""){
			$this->support_model->addComment($body,$userid,$threadid);
			$datestring = "%Y-%m-%d %h:%i:%s";
			$time = time();

			echo mdate($datestring, $time);
		}
	}
	public function view()
	{
		$supportID= $this->uri->segment(3);
		$this->load->library('session');
		if($this->session->userdata('verified')==0) 
		{
			redirect('index.php/register/verify');
		}
		$userid = $this->session->userdata('userid');
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $userid;
		$data['query']=$this->support_model->getSupport($supportID);
		$data['comments'] = $this->support_model->getComments($supportID);
		$this->load->view('header',$data);
		$this->load->view('support2',$data);

	}
	public function createSupport()
	{
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in')){
			$this->load->library('session');
			if($this->session->userdata('verified')==0) 
			{
				redirect('index.php/register/verify');
			}
			$userid = $this->session->userdata('userid');
			$data['username']=$this->session->userdata('username');
			$this->form_validation->set_rules('title','title', 'required|xss_clean');
			$this->form_validation->set_rules('body','body', 'required|xss_clean');
			$title=$this->input->post('title');
			$body=$this->input->post('body');
			if($this->form_validation->run()==FALSE){
				$data['message'] ="";
				$data['username']=$this->session->userdata('username');
				$this->load->view('header',$data);
				$this->load->view('createSupport',$data);
			}
			else
			{
				$this->support_model->createSupport($title,$body,$userid);
				$data['message'] ="Support created";
				$this->load->view('header',$data);
				$this->load->view('createSupport',$data);
			}
		}
		else
		{
			redirect("index.php/register");
		}
	}
}
?>

