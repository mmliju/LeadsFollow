<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class home_model extends CI_Model
{
   
	function home_model()
	{
	  parent::__construct();
 	}
	//------------------------------------------------------
    function policy_expiry()
	{
		$result = $this->db->query("SELECT * FROM  adn_clients WHERE policy_expiry >= DATE(now()) and policy_expiry <= DATE_ADD(CURDATE(), INTERVAL 9 DAY) group by proc_id");
	  return $result;
	}
	//------------------------------------------------------
    function policy_expiry_details()
	{
		$result = $this->db->query("SELECT * FROM  adn_clients join adn_prospectives on adn_prospectives.prospective_id = adn_clients.proc_id WHERE adn_clients.policy_expiry >= DATE(now()) and adn_clients.policy_expiry <= DATE_ADD(CURDATE(), INTERVAL 90 DAY) group by proc_id");
	  return $result;
	}
}
