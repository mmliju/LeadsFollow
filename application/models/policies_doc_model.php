<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class policies_doc_model extends CI_Model
{
	public $tble_policy_doc;
	function policies_doc_model()
	{
	  parent::__construct();
	  $this->tble_policy_doc    				= "adn_policy_docs";
	  $this->tble_policy_doc_pk 				= "doc_id";
	  $this->tble_policy_doc_fk  				= "policy_id";
	  $this->tble_policy_doc_child      		= "adn_pros_docs";
	  $this->tble_policy_doc_child_pk      		= "pros_doc_id";
	  $this->tble_policy_doc_child_proc_id      = "proc_id";
	  $this->tble_policy_doc_child_doc_id    	= "doc_id";
	  $this->tble_policy_doc_child_status    	="proc_doc_status";
	}
	//--------------------------------------------------------
	function get_all()
	{
		$query = $this->db->select('*')
				->order_by($this->tble_policy_doc_pk,'desc')
			     ->get($this->tble_policy_doc);
		return $query;
	}
	//---------------------------------------------------------
	function insert($data)
	{
		$this->db->insert($this->tble_policy_doc,$data); 
		return $this->db->insert_id();
	}
	//---------------------------------------------------------
	function insert_child($data)
	{
		$this->db->insert($this->tble_policy_doc_child,$data); 
		return $this->db->insert_id();
	}
	//-------------------------------------------------------
	function getall_byfk($id)
	{
		$query = $this->db->select('*')
				 ->where($this->tble_policy_doc_fk, $id)
			     ->get($this->tble_policy_doc);
		return $query;
	}
	//-------------------------------------------------------
	function getall_byid($id)
	{
		$query = $this->db->select('*')
				 ->where($this->tble_policy_doc_pk, $id)
			     ->get($this->tble_policy_doc);
		return $query;
	}
	//------------------------------------------------------------
	function getall_by_where($data)
	{
		$query = $this->db->select('*')
				 ->where($data)
			     ->get($this->tble_policy_doc_child);
		return $query;
	}
	//-------------------------------------------------------
	function update($fields,$id)
	{
	   	$this->db->where($this->tble_policy_doc_pk,$id);
		$this->db->update($this->tble_policy_doc,$fields); 
		return true;
	}
		//-------------------------------------------------------
	function update_child($fields,$id)
	{
	   	$this->db->where($this->tble_policy_doc_child_pk,$id);
		$this->db->update($this->tble_policy_doc_child,$fields); 
		return true;
	}
	//-------------------------------------------------------------
	function delete_row($table,$key,$id)
	{
		$fields['status'] = "D";
		$this->db->where($key,$id);
		$this->db->update($table,$fields); 
	}
	//------------------------------------------------------------------------
	function delete($id)
	{
		$this->db->where($this->tble_policy_doc_pk, $id);
		$this->db->delete($this->tble_policy_doc); 
	}
	//--------------------------------------------------------------------
	function doc_status_check($proc_id,$doc_id)
	{
	
			$query = $this->db->select('*')
				 ->where($this->tble_policy_doc_child_proc_id,$proc_id)
				 ->where($this->tble_policy_doc_child_doc_id,$doc_id)
				 ->where($this->tble_policy_doc_child_status,"R")
			     ->get($this->tble_policy_doc_child);
		return $query;
		
	}
	//------------------------------------------------------------------
	function doc_current_status($proc_id,$doc_id)
	{
			$query = $this->db->select('*')
				 ->where($this->tble_policy_doc_child_proc_id,$proc_id)
				 ->where($this->tble_policy_doc_child_doc_id,$doc_id)
			     ->get($this->tble_policy_doc_child);
		return $query;
		
	}
	//----------------------------------------------------------------
	function update_doc_status($proc_id,$doc_id,$fields)
	{
		$this->db->where($this->tble_policy_doc_child_proc_id,$proc_id);
		$this->db->where($this->tble_policy_doc_child_doc_id,$doc_id);
		$this->db->update($this->tble_policy_doc_child,$fields); 
		return true;
	}
	//----------------------------------------------------------------
	function insert_doc_status($data)
	{
		$this->db->insert($this->tble_policy_doc_child,$data); 
		return $this->db->insert_id();
	}
	//------------------------------------------------------------
	function getall_child_by_where($proc_id)
	{
		$query = $this->db->select('*')
				 ->where($this->tble_policy_doc_child_proc_id,$proc_id)
			     ->get($this->tble_policy_doc_child);
		return $query;
	}

	//-----------------------------------------------------------

}