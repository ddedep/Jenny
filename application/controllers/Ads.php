<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('ads_model');
	}
	public function view()
	{
		$adID= $this->uri->segment(3);
		if($this->session->userdata('logged_in')){
			$data['query'] = $this->ads_model->getAds();
			$data['username']=$this->session->userdata('username');
			$this->load->view('viewAd',$data);
		}
		else
		{
			redirect("index.php/register");
		}
	}
	public function index()
	{
		$this->load->library('form_validation');

		if($this->session->userdata('logged_in')){
			$data['username']=$this->session->userdata('username');
			$this->form_validation->set_rules('title','title', 'required|xss_clean');
			$this->form_validation->set_rules('description','description', 'required|xss_clean');
			$this->form_validation->set_rules('price','price', 'required|xss_clean');
			$categoryid=$this->input->post('category');
			$cityid=$this->input->post('city');
			$title=$this->input->post('title');
			$body=$this->input->post('description');
			$duration=$this->input->post('duration');
			$price=$this->input->post('price');
			$video=$this->input->post('video');
			$userid = $this->session->userdata('userid');
			if($this->form_validation->run()==FALSE){
				$data['message'] ="";
				$this->load->view('createAd',$data);
			}
			else
			{
				$this->ads_model->CreateAd($title,$userid,$duration,$price,$video,$body,$categoryid,$cityid);
				$data['message'] ="Ad Created!";
				$this->load->view('createAd',$data);
			}

		}
		else
		{
			redirect("index.php/register");
		}
	}
}
?>

