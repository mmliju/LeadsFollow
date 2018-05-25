<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function login()
	{
		parent::__construct();
	  $this->load->model('auth_login');
	}
    public function index()
	{
	    $data['tittle'] = "Login";
		$this->load->view('login',$data);
	}
	public function authenticate()
	{
	   $this->data['title'] = "Login";

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == true)
		{ 
			
			if ($this->auth_login->login($this->input->post('username'), $this->input->post('password')))
			{  
					redirect('home/', 'refresh');
			}
			else
			{ 
				$data['message'] = "Invalid Login . Please Try Again";

			   $this->load->view('login',$data);

			}
		}
		else
		{  
			//enter login details
			$data['message'] = "Please Enter Login Details";

			$this->load->view('login',$data);
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->sess_create();

		redirect('login/', 'refresh');
	}

}