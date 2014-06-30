<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('ads_model');
		$this->load->model('User_model');
		$this->load->helper('date');
	}

	public function index() // create ad
	{
		if($this->session->userdata('logged_in'))
			$data['hide'] = FALSE;
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$this->load->view('header',$data);
		$this->load->view('faq',$data);
	}
}
?>

