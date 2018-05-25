<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class policies_model extends CI_Model
{
	public $tble_policies;
	//-----------------------------------------------------
	function policies_model()
	{
	  parent::__construct();
	  $this->tble_policies    = "adn_policies";
	  $this->tble_policy_pk   = "policy_id";
	}
	//--------------------------------------------------------
	function get_all()
	{
		$query = $this->db->select('*')
				->order_by($this->tble_policy_pk,'desc')
			     ->get($this->tble_policies);
		return $query;
	}
	//---------------------------------------------------------
	function insert($data)
	{
		$this->db->insert($this->tble_policies,$data); 
		return $this->db->insert_id();
	}
	//-------------------------------------------------------
	function getall_byid($id)
	{
		$query = $this->db->select('*')
				 ->where($this->tble_policy_pk, $id)
			     ->get($this->tble_policies);
		return $query;
	}
	//-------------------------------------------------------
	function update($fields,$id)
	{
	   	$this->db->where($this->tble_policy_pk,$id);
		$this->db->update($this->tble_policies,$fields); 
		return true;
	}
	//-------------------------------------------------------------
	function delete($id)
	{
		$this->db->where($this->tble_policy_pk, $id);
		$this->db->delete($this->tble_policies); 
	}

}