<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('ads_model');
		$this->load->model('User_model');
	}
	public function view()
	{
		$adID= $this->uri->segment(3);
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
			if($adID==null){
				$data['query'] = $this->ads_model->getAdsOfUser($this->session->userdata('userid'));
				$this->load->view('viewAd',$data);
			}
			else
			{
				$query=$this->ads_model->getAd($adID);
				$data['query'] =$query;
				if($query->num_rows()>0)
					$this->load->view('viewAd2',$data);
				else
					$this->load->view('notfound',$data);
			}
	}
	public function delete()
	{
		$adID = $this->input->post('owner');
		$this->ads_model->delete($adID);
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$data['query'] = $this->ads_model->getAdsOfUser($this->session->userdata('userid'));
		$this->load->view('viewAd',$data);
	}
	public function editAd()
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
			$temp = explode("/",$video);
			$video = $temp[count($temp)-1];
			$temp = explode("=", $video);
			$video = $temp[count($temp)-1];
			$userid = $this->session->userdata('userid');

			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '10000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);
			if($this->form_validation->run()==FALSE){
				$data['message'] ="";
				$data['username']=$this->session->userdata('username');
				$this->load->view('createAd',$data);
			}
			else
			{
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
				}
				else
				{
					$data = array('upload_data' => $this->upload->data(),
									'err' => "Registered!");
					
				}
				$dat = $this->upload->data();
				$image = $dat['file_name'];
				$this->ads_model->CreateAd($title,$userid,$duration,$price,$video,$image,$body,$categoryid,$cityid);
				$data['message'] ="Ad Created!";
				$data['username']=$this->session->userdata('username');
				$this->load->view('createAd',$data);
			}

		}
		else
		{
			redirect("index.php/register");
		}
	
	}
	public function search()
	{
		$data['username']=$this->session->userdata('username');
		$data['userid'] = $this->session->userdata('userid');
		$search = $this->input->post('search');
		$data['query']= $this->ads_model->searchAds($search);
		$this->load->view('viewAd',$data);
	}
	public function subscribe()
	{
		$owner = $this->input->post('userid');
		$subscriber = $this->session->userdata('userid');
		$this->User_model->subscribe($owner,$subscriber);
		redirect('index.php/user');
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
			$temp = explode("/",$video);
			$video = $temp[count($temp)-1];
			$temp = explode("=", $video);
			$video = $temp[count($temp)-1];
			$userid = $this->session->userdata('userid');

			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '10000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);
			if($this->form_validation->run()==FALSE){
				$data['message'] ="";
				$data['username']=$this->session->userdata('username');
				$this->load->view('createAd',$data);
			}
			else
			{
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
				}
				else
				{
					$data = array('upload_data' => $this->upload->data(),
									'err' => "Registered!");
					
				}
				$dat = $this->upload->data();
				$image = $dat['file_name'];
				$this->ads_model->CreateAd($title,$userid,$duration,$price,$video,$image,$body,$categoryid,$cityid);
				$data['message'] ="Ad Created!";
				$data['username']=$this->session->userdata('username');
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

