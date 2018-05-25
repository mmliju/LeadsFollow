<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class employee_model extends CI_Model
{
	public $tble_employee;
	function employee_model()
	{
	  parent::__construct();
	  $this->tble_employee     = "adn_employees";
	  $this->tble_employee_pk  = "employee_id";
	}
	//--------------------------------------------------------
	function get_all()
	{
		$query = $this->db->select('*')
				->order_by($this->tble_employee_pk,'desc')
			     ->get($this->tble_employee);
		return $query;
	}
	//---------------------------------------------------------
	function insert($data)
	{
		$this->db->insert($this->tble_employee,$data); 
		return $this->db->insert_id();
	}
	//-------------------------------------------------------
	function getall_byid($id)
	{
		$query = $this->db->select('*')
				 ->where($this->tble_employee_pk, $id)
			     ->get($this->tble_employee);
		return $query;
	}
	//-------------------------------------------------------
	function update($fields,$id)
	{
	   	$this->db->where($this->tble_employee_pk,$id);
		$this->db->update($this->tble_employee,$fields); 
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
		$this->db->where($this->tble_employee_pk, $id);
		$this->db->delete($this->tble_employee); 
	}
	//------------------------------------------------------------------------
	function search($search_array)
	{
		$this->db->select('*');
		$this->db->from($this->tble_employee);
		$this->db->like($search_array); 
		return $this->db->get();
	}


}