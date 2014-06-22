<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('ads_model');
		$this->load->model('User_model');
		$this->load->helper('date');
	}

	public function index() 
	{
		$this->load->view('header',$data);
        $this->load->view('admin');   
    }
}
?>

