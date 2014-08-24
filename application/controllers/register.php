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
	public function verify()
	{
		$this->load->library('form_validation');
		$this->load->library('session');
		if($this->session->userdata('verified')>0) 
		{
			redirect('index.php/user');
		}
		
		$this->form_validation->set_rules('code','code', 'required|xss_clean');
		$data['username']=$this->session->userdata('username');
		$data['err'] = "Enter Code";
		$code=$this->input->post('code');
		$userid=$this->session->userdata('userid');
		$query=$this->User_model->getAccount($userid);
		$verified=FALSE;
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('header',$data);
			$this->load->view('verify',$data);
		}
		else{
			foreach($query->result_array() as $row)
			{
				if($row['verification']==$code)
				{
					$verified=TRUE;
				}
				else
				{
					break;
				}
			}
			if($verified)
			{
				$this->User_model->verify($userid);
				$newdata = array(
                   'verified' => 1,
               );

				$this->session->set_userdata($newdata);
					redirect('index.php/user');
			}
			else
			{
				$data['err'] = "Wrong code!";
				$this->load->view('header',$data);
				$this->load->view('verify',$data);
			}
		}
	}
	public function index()
	{
		if($this->session->userdata('logged_in')){
			redirect('index.php/home');
		}
		$data['users'] = $this->User_model->getAllUsers();
		//nexmo
		$this->load->library('nexmo');
        // set response format: xml or json, default json
        $this->nexmo->set_format('json');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username', 'required|xss_clean');
		$this->form_validation->set_rules('phonenumber','phonenumber', 'required|xss_clean');
		$this->form_validation->set_rules('lastname','lastname', 'required|xss_clean');
		$this->form_validation->set_rules('firstname','firstname', 'required|xss_clean');
		$this->form_validation->set_rules('password','password', 'required|xss_clean');
		$this->form_validation->set_rules('passwordconfirm','passwordconfirm', 'required|min_length[6]|max_length[23]|xss_clean|matches[passwordconfirm]');
		$this->form_validation->set_rules('address','address', 'required|xss_clean');
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$middlename=$this->input->post('middlename');
		$postalcode='0000';
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
				$data = array('upload_data' => $this->upload->data(),
								'err' => "Registered!");
				$dat['file_name'] = 'default.jpg';
				$verify = rand(1000,9999);
				$this->User_model->createPerson($firstname,$middlename,$lastname,$phonenum,$dat['file_name'],$birthdate);
				$this->User_model->createUser($username,$password,$email,$address,$postalcode,$verify);
				$from = 'dexter';
		        $to = ''.$phonenum;
		        $message = array(
		            'text' => 'Welcome to One Stop Deal! Your Verification Code: '.$verify
		        );
		        $response = $this->nexmo->send_message($from, $to, $message);
		        $headers = " From: welcome@onestopdealph.com";
		        mail($email, 'Thank you for signing up!','Welcome to onestopdealph.com! Your Verification code: '.$verify,$headers);
			
				$data['username']=$this->session->userdata('username');
				$this->load->view('header',$data);
				$this->load->view('verify2',$data);
			}
			
			else
			{
				$data = array('upload_data' => $this->upload->data(),
								'err' => "Registered!");
				$dat = $this->upload->data();
				$verify = rand(1000,9999);
				$this->User_model->createPerson($firstname,$middlename,$lastname,$phonenum,$dat['file_name'],$birthdate);
				$this->User_model->createUser($username,$password,$email,$address,$postalcode,$verify);
				$from = 'OneStopDeal.ph';
		        $to = ''.$phonenum;
		        $message = array(
		            'text' => 'Welcome to One Stop Deal! Your Verification Code: '.$verify
		        );
		        $response = $this->nexmo->send_message($from, $to, $message);
		        $headers = "From: welcome@onestopdealph.com";
		        mail($email, 'Thank you for signing up!','Welcome to onestopdealph.com! Your Verification code: '.$verify,$headers);
			
				$data['username']=$this->session->userdata('username');
				$this->load->view('header',$data);
				$this->load->view('verify2',$data);
			}
			


        // **********************************Text Message*************************************
	        
		}
	}
}
?>

