<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth_login extends CI_Model
{

    private $chit_admins;
	function auth_login()
	{
	  parent::__construct();
	  $this->chit_admins = "adn_users";
	}
	public function login($username, $password)
	{
		$query = $this->db->select('username, first_name, user_id, password,last_login,role,status')
		                  ->where('username', $this->db->escape_str($username))
		                  ->limit(1)
		                  ->get($this->chit_admins);

		if ($query->num_rows() == 1)
		{
		  $user = $query->row();
		  if($user->password == md5($password))
		  {
		  	$session_data = array(
				    'name'             => $user->first_name,
				    'username'         => $user->username,
				    'role'             => $user->role,
				    'user_id'          => $user->user_id,
					'logged_in'        => 1, 
				    'old_last_login'   => $user->last_login
				);
				$this->session->set_userdata($session_data);
				//--------------------------------------------------------
				$login_time = time();
				$login_ip = $_SERVER['REMOTE_ADDR'];
				//--------------------------------------------------------
				$data = array(
               'last_login' => $login_time,
               'ip' => $login_ip
                );
				$this->db->where('user_id', $user->user_id);
				$this->db->update($this->chit_admins, $data);

				//--------------------------------------------------------
				
				return true;
		  }
		 
		}
		
	}

}
?>
