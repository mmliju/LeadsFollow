<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class email_model extends CI_Model
{
	public $tble_emails;
	//-----------------------------------------------------
	function email_model()
	{
	  parent::__construct();
	  $this->tble_emails    	  = "adn_emails";
	  $this->tble_emails_fk    = "proc_id";
	  $this->tble_emails_pk    = "email_id";
	}
	//--------------------------------------------------------
	function get_all()
	{
		$query = $this->db->select('*')
				->order_by($this->tble_policy_pk,'desc')
			     ->get($this->tble_emails);
		return $query;
	}
	//--------------------------------------------------------
	function get_all_by_fk($id)
	{
		$query = $this->db->select('*')
				->order_by($this->tble_emails_pk,'desc')
				->where($this->tble_emails_fk, $id)
			     ->get($this->tble_emails);
		return $query;
	}
	//---------------------------------------------------------
	function insert($data)
	{
		$this->db->insert($this->tble_emails,$data); 
		return $this->db->insert_id();
	}
	//-------------------------------------------------------
	function getall_byid($id)
	{
		$query = $this->db->select('*')
				 ->where($this->tble_policy_pk, $id)
			     ->get($this->tble_emails);
		return $query;
	}
	//-------------------------------------------------------
	function update($fields,$id)
	{
	   	$this->db->where($this->tble_policy_pk,$id);
		$this->db->update($this->tble_emails,$fields); 
		return true;
	}
	//-------------------------------------------------------------
	function delete($id)
	{
		$this->db->where($this->tble_policy_pk, $id);
		$this->db->delete($this->tble_emails); 
	}
	//------------------------------------------------------------------
	
}