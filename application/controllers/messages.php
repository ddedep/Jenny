<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('ads_model');
		$this->load->model('User_model');
		$this->load->model('Messages_model');
		$this->load->helper('date');
	}

	public function index() 
	{
		$data['username']=$this->session->userdata('username');
		$userid = $this->session->userdata('userid');
		$data['messages']=$this->Messages_model->getInbox($userid);
		$this->load->view('header',$data);
        $this->load->view('inbox',$data);   
    }

    public function sent() 
	{
		$data['username']=$this->session->userdata('username');
		$userid = $this->session->userdata('userid');
		$data['messages']=$this->Messages_model->getSent($userid);
		$this->load->view('header',$data);
        $this->load->view('sent',$data);   
    }
    

    public function compose()
    {
    	$this->load->library('form_validation');
		$this->load->library('session');
    	$userid= $this->uri->segment(3);
    	$data['query'] = $this->User_model->getAccount($userid);
    	$data['Message'] = "";
    	$this->form_validation->set_rules('message','message', 'required|xss_clean');
    	if($this->form_validation->run()==FALSE)
		{
			if($this->session->userdata('logged_in')){
				$data['username']=$this->session->userdata('username');
				$this->load->view('header',$data);
				$this->load->view('composeMessage',$data);
			}
			else
			{
				redirect('/index.php/home');
			}
		}
		else
		{
			$message = $this->input->post('message');
			$from = $this->session->userdata('userid');
			$to = $this->input->post('to');
			$this->Messages_model->sendMessage($message,$from, $to);
			$data['username']=$this->session->userdata('username');
			$data['Message'] = "Messsage Sent!";
			$this->load->view('header',$data);
			$this->load->view('composeMessage',$data);
		}
    }
}
?>

