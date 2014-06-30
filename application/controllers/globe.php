<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Globe extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('User_model');
		$this->load->model('ads_model');
	}
	public function index()
	{
		$data['hide'] = FALSE;
		if($this->session->userdata('logged_in'))
		{
			require ('/var/www/html/Jenny/src/GlobeApi.php');
			$globe = new GlobeApi();
		    $auth = $globe->auth(
		        'jrdA6C5Ra8RfA7izkpTa6EfaEdXdCbRp',
		        '19d8c5e751dfdf8f19c2f9a478792dd61e40cfd2f1af581917818bc4128b57d3'
		    );
			$code = $this->input->get('code');
			$response = $auth->getAccessToken($code);
	        $_SESSION['access_token'] = $response['access_token'];
	        $_SESSION['subscriber_number'] = $response['subscriber_number'];
	        $charge = $globe->payment(
		        $_SESSION['access_token'],
		        $_SESSION['subscriber_number']
		    );
		    echo $_SESSION['access_token'];
		    $code=$this->ads_model->getReferenceCode();
		    $trans = "6491".($code+1);
		    $respo = $charge->charge(
			    50,
			    $trans
			);
		   	
			//   $this->User_model->updateToken($this->session->userdata('username'),$_SESSION['access_token']);
		    $points = $this->session->userdata('points') + 50;
		    $this->User_model->updatePoints($this->session->userdata('username'),$points);
		    $this->User_model->updateToken($this->session->userdata('username'),$_SESSION['access_token']);
		    $this->User_model->updateTrans($this->session->userdata('userid'),($code+1));
		    redirect('index.php/user');
    	}
	}
	public function charge()
	{
		$data['hide'] = FALSE;
		if($this->session->userdata('logged_in'))
		{
			require ('/var/www/html/Jenny/src/GlobeApi.php');
			session_start();
		    $globe = new GlobeApi();
		    $auth = $globe->auth(
		        'jrdA6C5Ra8RfA7izkpTa6EfaEdXdCbRp',
		        '19d8c5e751dfdf8f19c2f9a478792dd61e40cfd2f1af581917818bc4128b57d3'
		    );
		    
		    if(!isset($_SESSION['code'])) {
		        $loginUrl = $auth->getLoginUrl();
		        header('Location: '.$loginUrl); 
		        exit;
		    }

		  
		}
	}
}
?>

