<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class prospective_model extends CI_Model
{
	public $tble_prospectives;
	//-----------------------------------------------------
	function prospective_model()
	{
	  parent::__construct();
	  $this->tble_prospectives    = "adn_prospectives";
	  $this->tble_prospectives_pk = "prospective_id";
	  $this->tble_prospectives_status = "prospective_status";
	  $this->expected_policy	= "expected_policy";
	  $this->tble_quotations    = "adn_quotations";
	  $this->tble_quotations_pk = "quote_id";
	  $this->tble_quotations_fk = "proc_id";
	}
	
	//-------------------------------------------------
	function get_all_active_prospectives()
	{
		$query = $this->db->select('*')
				 ->where($this->tble_prospectives_status, 'A')
			     ->get($this->tble_prospectives);
		return $query;
	}
	//--------------------------------------------------------
	function get_all()
	{
		$query = $this->db->select('*')
				->order_by($this->tble_prospectives_pk,'desc')
			     ->get($this->tble_prospectives);
		return $query;
	}
	//---------------------------------------------------------
	function get_all_limit($start,$count)
	{
		$query = $this->db->select('*')
				->order_by($this->expected_policy,'asc')
			     ->get($this->tble_prospectives,$start,$count);
		return $query;
	}
	//------------------------------------------------------------------------
	function search($search_array)
	{
		$this->db->select('*');
		$this->db->from($this->tble_prospectives);
		$this->db->like($search_array); 
		return $this->db->get();
	}
	//---------------------------------------------------------
	function insert($data)
	{
		$this->db->insert($this->tble_prospectives,$data); 
		return $this->db->insert_id();
	}
	//-------------------------------------------------------
	function getall_byid($id)
	{
		$query = $this->db->select('*')
				 ->where($this->tble_prospectives_pk, $id)
			     ->get($this->tble_prospectives);
		return $query;
		
	}
		//-------------------------------------------------------
	function getall_group($ids)
	{
		$query = $this->db->select('*')
				 ->where_in($this->tble_prospectives_pk,$ids)
			     ->get($this->tble_prospectives);
		return $query;
		
	}
	//------------------------------------------------------------
	function getall_by_where($data)
	{
		$query = $this->db->select('*')
				 ->where($data)
			     ->get($this->tble_prospectives);
		return $query;
	}
	//------------------------------------------------------------
	function update($fields,$id)
	{
	   	$this->db->where($this->tble_prospectives_pk,$id);
		$this->db->update($this->tble_prospectives,$fields); 
		return true;
	}
	//-------------------------------------------------------------
	function delete($id)
	{
		$this->db->where($this->tble_prospectives_pk, $id);
		$this->db->delete($this->tble_prospectives); 
	}
	//--------------------------------------------------------
	function save_quote($data)
	{
		$this->db->insert($this->tble_quotations,$data); 
		return $this->db->insert_id();
	}
//--------------------------------------------------------
	function show_quotes($id)
	{
		$query = $this->db->select('*')
				->order_by($this->tble_quotations_pk,'desc')
				->where($this->tble_quotations_fk, $id)
			     ->get($this->tble_quotations);
		return $query;
	}

}