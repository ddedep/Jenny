<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('User_model');
	}
	public function terms()
	{
		$this->load->view('terms');
	}
	public function index()
	{
		if($this->session->userdata('logged_in')){
			redirect('index.php/home');
		}
		//nexmo
		$this->load->library('nexmo');
        // set response format: xml or json, default json
        $this->nexmo->set_format('json');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username', 'required|xss_clean');
		$this->form_validation->set_rules('password','password', 'required|xss_clean');
		$this->form_validation->set_rules('passwordconfirm','passwordconfirm', 'required|min_length[6]|max_length[23]|xss_clean|matches[passwordconfirm]');
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$middlename=$this->input->post('middlename');
		$postalcode=$this->input->post('postalcode');
		$phonenum=$this->input->post('phonenumber');
		$address=$this->input->post('address');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$email=$this->input->post('email');
		$birthdate = $this->input->post('year')."-".$this->input->post('month')."-".$this->input->post('day');
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '10000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		
		if($this->form_validation->run() == FALSE || $this->User_model->emailExists($email) || $this->User_model->userExists($username))
		{
			$data['err'] ="";
			if($this->User_model->userExists($username) && $username!='')
				$data['err'] ="Username Already Exists!";
			if($this->User_model->emailExists($email) && $email!='')
				$data['err'] =$data['err']."<br />"."Email Already Exists!";
			$data['username']=$this->session->userdata('username');
			$this->load->view('header',$data);
			$this->load->view('register',$data);
		}
		else
		{
			$data['err'] ="Registered!";
			
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$data = array('upload_data' => $this->upload->data(),
								'err' => "Registered!");
				$dat = $this->upload->data();
				$this->User_model->createPerson($firstname,$middlename,$lastname,$phonenum,$dat['file_name'],$birthdate);
				$this->User_model->createUser($username,$password,$email,$address,$postalcode);
			}
			$data['username']=$this->session->userdata('username');
			$this->load->view('header',$data);
			$this->load->view('register',$data);


        // **********************************Text Message*************************************
	        $from = 'dexter';
	        $to = ''.$phonenum;
	        $message = array(
	            'text' => 'Verification Code: '.rand(1000,9999)
	        );
	        $response = $this->nexmo->send_message($from, $to, $message);
		}
	}
}
?>

