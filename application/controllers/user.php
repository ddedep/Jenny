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
		$data['query']=$this->ads_model->getsubscribedAds($userid);
		$query = $data['query'];
		$this->load->view('viewsubs',$data);
	}
	public function userSubscription()
	{
		$adID= $this->uri->segment(3);
		$data['username']=$this->session->userdata('username');
		$userid = $this->session->userdata('userid');
		$data['query']=$this->ads_model->getsubscribedUsers($userid);
		$query = $data['query'];
		$this->load->view('viewusersubs',$data);
	}
	public function edit()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('index.php/home');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname','firstname', 'required|xss_clean');
		$data['query']=$this->User_model->getAccount($this->session->userdata('userid'));
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$middlename=$this->input->post('middlename');
		$postalcode=$this->input->post('postalcode');
		$phonenum=$this->input->post('phonenumber');
		$address=$this->input->post('address');
		$email=$this->input->post('email');
		$birthdate = $this->input->post('year')."-".$this->input->post('month')."-".$this->input->post('day');
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '10000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
		$pic;
		foreach ($data['query']->result_array() as $row) {
			$pic = $row['picture'];
			break;
		}
		if($this->form_validation->run() == FALSE)
		{
			$data['err'] ="";
			$data['query']=$this->User_model->getAccount($this->session->userdata('userid'));
			$data['username']=$this->session->userdata('username');
			$this->load->view('editUser',$data);
			}
		else
		{
			$data['err'] ="Edited!";
		
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$this->User_model->updateAccount($this->session->userdata('userid'),$firstname,$middlename,$lastname,$phonenum,$pic,$birthdate,$email, $address, $postalcode);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data(),
								'err' => "Edited!");
				$dat = $this->upload->data();
				$this->User_model->updateAccount($this->session->userdata('userid'),$firstname,$middlename,$lastname,$phonenum,$dat['file_name'],$birthdate,$email, $address, $postalcode);
			}
			$data['query']=$this->User_model->getAccount($this->session->userdata('userid'));
			$data['username']=$this->session->userdata('username');
			$this->load->view('editUser',$data);
		}
		
	}
}
?>

