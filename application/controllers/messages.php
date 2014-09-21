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
		$this->load->library('session');
		if($this->session->userdata('verified')==0) 
		{
			redirect('index.php/register/verify');
		}
		$data['hide'] = FALSE;
		$data['username']=$this->session->userdata('username');
		$userid = $this->session->userdata('userid');
		$data['messages']=$this->Messages_model->getInbox($userid);
		$data['unread']=$this->Messages_model->getUnread($this->session->userdata('userid'))->num_rows();
		$this->load->view('header',$data);
        $this->load->view('inbox',$data);   
    }

    public function view()
    {
    	$messageid= $this->uri->segment(3);
    	$data['hide'] = FALSE;
    	if($this->session->userdata('logged_in'))
    	{
		$data['unread']=$this->Messages_model->getUnread($this->session->userdata('userid'))->num_rows();
    		$data['username']=$this->session->userdata('username');
    		$data['query']=$this->Messages_model->getInboxMessage($messageid,$this->session->userdata('userid'));
    		$data['query2']=$this->Messages_model->getSentMessage($messageid,$this->session->userdata('userid'));
    		$this->load->view('header',$data);
    		$this->load->view('viewMessage',$data);
    	}
    	else
    	{
    		redirect('index.php/register');
    	}
    }
     public function view2()
    {
    	$messageid= $this->uri->segment(3);
    	$data['hide'] = FALSE;
    	if($this->session->userdata('logged_in'))
    	{
    		$data['username']=$this->session->userdata('username');
    		$data['unread']=$this->Messages_model->getUnread($this->session->userdata('userid'))->num_rows();
    		$data['query']=$this->Messages_model->getInboxMessage($messageid,$this->session->userdata('userid'));
    		$data['query2']=$this->Messages_model->getSentMessage($messageid,$this->session->userdata('userid'));
    		$this->load->view('header',$data);
    		$this->load->view('viewMessage2',$data);
    	}
    	else
    	{
    		redirect('index.php/register');
    	}
    }
    public function deleteInbox()
    {
    	$messageid=$this->input->post('messageid');
    	$this->Messages_model->deleteInbox($messageid);
    	redirect('index.php/messages');
    }
    public function deleteSent()
    {
    	$messageid=$this->input->post('messageid');
    	$this->Messages_model->deleteSent($messageid);
    	redirect('index.php/messages/sent');
    }
    public function sent() 
	{
		$data['hide'] = FALSE;
		$this->load->library('session');
		if($this->session->userdata('verified')==0) 
		{
			redirect('index.php/register/verify');
		}
		$data['username']=$this->session->userdata('username');
		$userid = $this->session->userdata('userid');
		$data['unread']=$this->Messages_model->getUnread($userid)->num_rows();
		$data['messages']=$this->Messages_model->getSent($userid);
		$this->load->view('header',$data);
        $this->load->view('sent',$data);   
    }
    

    public function compose()
    {
    	$userid= $this->uri->segment(3);
    	$data['users'] = $this->User_model->getAllUsers();
    	$data['hide'] = FALSE;
    	if(!$this->session->userdata('logged_in'))
    	{
    		$this->session->set_userdata('message',$userid);
    		redirect('index.php/home/login');
    	}
    	$this->load->library('session');
		if($this->session->userdata('verified')==0) 
		{
			redirect('index.php/register/verify');
		}
    	$this->load->library('form_validation');
		$this->load->library('session');
    	
    	$data['query'] = $this->User_model->getAccount($userid);
    	$data['Message'] = "";
    	$this->form_validation->set_rules('message','message', 'required|xss_clean');
    	$this->form_validation->set_rules('recipient','recipient', 'required|xss_clean');
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
			$k = $this->input->post('recipient');
			$recipient=$this->User_model->getUser($k);
			$data['username']=$this->session->userdata('username');
			if($recipient->num_rows()>0){
				$to=0;
				foreach ($recipient->result_array() as $row) {
					$to = $row['userid'];
					break;
				}
				$this->Messages_model->sendMessage($message,$from, $to);
				
				$data['Message'] = "Messsage Sent!";
			}	
			else
			{
				$data['Message'] = "Invalid Recipient!";
			}
			$this->load->view('header',$data);
			$this->load->view('composeMessage',$data);
		}
    }
}
?>

