<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authenticate
{

	 function authenticate()
	{
	  $this->CI =& get_instance();
	  $this->CI->load->library('session');
	  $this->CI->load->model('auth_login');
	 // $this->load->model('auth_login');
	}

	public function logged_in()
	{
	  if( $this->CI->session->userdata('logged_in') != 1)
	     redirect('login', 'refresh');
	   else
	   {
	      //$this->check_permissions($this->CI->session->userdata('role'));
		  return true;
	   }
	}
    private function check_permissions($role)
	{
	
	 $class =  $this->CI->uri->segment(1);
	 $action =  $this->CI->uri->segment(2);
	// $permission = $this->CI->auth_login->get_role_permission($role,$class,$action);
	 if($permission > 0)
	 {
	    return true;
	 }
	 else
	 {
	  	echo "Not Permitted";
		exit;
	 }
	 
	}
	private function error()
	{
		  $data['content'] = "branches";
	  $this->load->view('template',$data);
	}
	function generate_error($error)
	{
		  $errormsg =  '<div class="box round first">
                <div class="block">
                            <div class="message error">
                                <h5>Error!</h5>
                                <p>'.
                                   $error
                               .' </p>
                            </div>
                        </div>
            </div>';
       return $errormsg;
	   
	}
	function generate_success()
	{
	  $success = '<div class="box round first">
                <div class="block">
                            <div class="message success">
                                <h5>Success!</h5>
                                <p>
                                    This is a success message.
                                </p>
                            </div>
                        </div>
                
            </div>';
			return  $success;
	}
	function generate_info($msg)
	{
	   $info = '<div class="box round first">
                <div class="block">
	   			<div class="message info">
                                <h5>Information</h5>
                                <p>'.
                                    $msg
                               .' </p>
                            </div>
						</div>
            </div>';
			
		return  $info;
	}
}