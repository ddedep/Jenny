<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
	}
	public function index()
	{
		$this->session->sess_destroy();
		redirect("index.php/home");
	}
}
?>

