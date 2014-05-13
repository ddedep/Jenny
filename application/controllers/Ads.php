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
		$data['username']=$this->session->userdata('username');
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

			$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '10000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
			if($this->form_validation->run()==FALSE){
				$data['message'] ="";
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
				$data['message'] ="Ad Created!".$price;
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

