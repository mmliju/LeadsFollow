<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class client_model extends CI_Model
{
	function client_model()
	{
	  parent::__construct();
		$this->tble_client     = "adn_clients";
	  $this->tble_client_pk  = "client_id";
	}
	//--------------------------------------------------get_all-----
	function get_all()
	{
		$query = $this->db->select('*')
				->order_by($this->tble_client_pk,'desc')
			     ->get($this->tble_client);
		return $query;
	}
	//-------------------------------------------------------
	function get_all_clients()
	{
		$query = $this->db->query('select * from adn_prospectives join adn_clients on adn_prospectives.prospective_id = adn_clients.proc_id');
		return $query;
	}
	
	//---------------------------------------------------------
	function insert($data)
	{
		$this->db->insert($this->tble_client,$data); 
		return $this->db->insert_id();
	}
	//-------------------------------------------------------
	function getall_byid($id)
	{
		$query = $this->db->select('*')
				 ->where($this->tble_client_pk, $id)
			     ->get($this->tble_client);
		return $query;
	}
	//-------------------------------------------------------
	function update($fields,$id)
	{
	   	$this->db->where($this->tble_client_pk,$id);
		$this->db->update($this->tble_client,$fields); 
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
		$this->db->where($this->tble_client_pk, $id);
		$this->db->delete($this->tble_client); 
	}
	//------------------------------------------------------------------------
	function search($search_array)
	{
		$this->db->select('*');
		$this->db->from($this->tble_client);
		$this->db->like($search_array); 
		return $this->db->get();
	}


}