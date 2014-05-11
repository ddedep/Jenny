<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('User_model');
	}
	public function index()
	{
		if($this->session->userdata('logged_in')){
			redirect('index.php/home');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username', 'required|xss_clean');
		$this->form_validation->set_rules('password','password', 'required|xss_clean');
		$this->form_validation->set_rules('passwordconfirm','passwordconfirm', 'required|min_length[6]|max_length[12]|xss_clean|matches[passwordconfirm]');
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$middlename=$this->input->post('middlename');
		$postalcode=$this->input->post('postalcode');
		$phonenum=$this->input->post('phonenumber');
		$address=$this->input->post('address');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$email=$this->input->post('email');
		if($this->form_validation->run() == FALSE)
		{
			$data['err'] ="";
			$data['username']=$this->session->userdata('username');
			$this->load->view('register',$data);
		}
		else
		{
			$data['err'] ="Registered!";
			$this->User_model->createPerson($firstname,$middlename,$lastname,$phonenum);
			$this->User_model->createUser($username,$password,$email,$address,$postalcode);
			$data['username']=$this->session->userdata('username');
			$this->load->view('register',$data);
		}
	}
}
?>

