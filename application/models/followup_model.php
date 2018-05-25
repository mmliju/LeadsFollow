<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class followup_model extends CI_Model
{
	public $tble_followups;
	//-----------------------------------------------------
	function followup_model()
	{
	  parent::__construct();
	  $this->tble_followups    	  = "adn_followups";
	  $this->tble_crm_followups   = "adn_crm";
	  $this->tble_followups_fk    = "proc_id";
	  $this->tble_followups_pk    = "follow_up_id";
	  $this->tble_crm_pk    = "crm_id";
	  $this->tble_prospectives    = "adn_prospectives";
	}
	//--------------------------------------------------------
	function get_all()
	{
		$query = $this->db->select('*')
				->order_by($this->tble_policy_pk,'desc')
			     ->get($this->tble_followups);
		return $query;
	}
	//--------------------------------------------------------
	function get_all_by_fk($id)
	{
		$query = $this->db->select('*')
				->order_by($this->tble_followups_pk,'desc')
				->where($this->tble_followups_fk, $id)
			     ->get($this->tble_followups);
		return $query;
	}
		//--------------------------------------------------------
	function get_all_by_crm_fk($id)
	{
		$query = $this->db->select('*')
				->order_by($this->tble_crm_pk,'desc')
				->where($this->tble_followups_fk, $id)
			     ->get($this->tble_crm_followups);
		return $query;
	}
	//---------------------------------------------------------
	function insert($data)
	{
		$this->db->insert($this->tble_followups,$data); 
		return $this->db->insert_id();
	}
	//---------------------------------------------------------
	function insert_crm($data)
	{
		$this->db->insert($this->tble_crm_followups,$data); 
		return $this->db->insert_id();
	}
	//-------------------------------------------------------
	function getall_byid($id)
	{
		$query = $this->db->select('*')
				 ->where($this->tble_policy_pk, $id)
			     ->get($this->tble_followups);
		return $query;
	}
	//-------------------------------------------------------
	function update($fields,$id)
	{
	   	$this->db->where($this->tble_policy_pk,$id);
		$this->db->update($this->tble_followups,$fields); 
		return true;
	}
	//-------------------------------------------------------------
	function delete($id)
	{
		$this->db->where($this->tble_policy_pk, $id);
		$this->db->delete($this->tble_followups); 
	}
	//------------------------------------------------------------------
	function followup_pending($days)
	{
	  $result = $this->db->query("SELECT * FROM ".$this->tble_followups." JOIN ".$this->tble_prospectives ." ON ".$this->tble_followups.".proc_id = ".$this->tble_prospectives." .prospective_id  WHERE next_call_time >= DATE(now()) and next_call_time <= DATE_ADD(CURDATE(), INTERVAL ".$days." DAY) group by proc_id");
	  return $result;
	}//------------------------------------------------------------------

      
}