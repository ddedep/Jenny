<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Globe extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('User_model');
	}
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			require ('/src/GlobeApi.php');
			$globe = new GlobeApi();
		    $auth = $globe->auth(
		        'qAdAgFoGraoIx5Tq8KcrkKIX9d9EFLbj',
		        '64729180b8c47423d06e4d1de69117e7a37fea62354ef2e46a639f4f53b7a5bb'
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
		    $respo = $charge->charge(
			    1,
			    "51391000001"
			);
		   	
			   $this->User_model->updateToken($this->session->userdata('username'),$_SESSION['access_token']);
		    $points = $this->session->userdata('points') + 50;
		    $this->User_model->updatePoints($this->session->userdata('username'),$points);
		    redirect('index.php/user');
    	}
	}
	public function charge()
	{
		if($this->session->userdata('logged_in'))
		{
			require ('/src/GlobeApi.php');
			session_start();
		    $globe = new GlobeApi();
		    $auth = $globe->auth(
		        'qAdAgFoGraoIx5Tq8KcrkKIX9d9EFLbj',
		        '64729180b8c47423d06e4d1de69117e7a37fea62354ef2e46a639f4f53b7a5bb'
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

