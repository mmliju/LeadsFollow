<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Home extends CI_Controller {
    function home()
	{
		parent::__construct();
	    $this->authenticate->logged_in();
	    $this->load->library('form_validation');
		$this->load->model('home_model');
		$this->load->model('followup_model');
		$this->load->model('prospective_model');
		
	}
    public function index()
	{
	  $data['content'] = "dashboard";
	  $data['page']    = "dashboard";
	  $data['followup_pending'] = $this->followup_pending(10);
	  $data['policy_expiry'] = $this->policy_expiring(10);
	  $data['policy_expiry_today'] = $this->followup_pending(1);
	  $data['pending_comments'] = $this->followup_model->followup_pending(1);
	  
	  $this->load->view('template',$data);
	}
	//------------------------------------------
	public function followup_pending($day)
	{
		$query_result = $this->followup_model->followup_pending($day);
	    $followups =  $query_result->num_rows();
		return $followups;
		
	}
	//-----------------------------------------------
	public function pending_followups($day)
	{
	  $data['content'] = "prospectives";
	  $data['page']    = "prospectives";
	  $query_result = $this->followup_model->followup_pending($day);
	  $folloup_pending_procs = array();
	  foreach($query_result->result() as $val)
	  {
	  	array_push($folloup_pending_procs,$val->proc_id);
	  }
	// $procs = implode(",", $folloup_pending_procs);
	 $query_result1 = $this->prospective_model->getall_group($folloup_pending_procs);
	  $data['prospective_details'] = $query_result1->result();
	  $this->load->view('template',$data);
	}
	//------------------------------------------
	public function policy_expiring($day)
	{
		$query_result = $this->home_model->policy_expiry();
		$expiry =  $query_result->num_rows();
		return $expiry;
		
	}
	//--------------------------------------------------------------
	public function expiring_details()
	{
	  $data['content'] = "clients";
	  $data['page']    = "clients";
	  $query_result = $this->home_model->policy_expiry_details();
	  $data['client_details'] = $query_result->result();
	  $this->load->view('template',$data);

		
	}
	//-----------------------------------------------------------
	public function followup_expiry()
	{
	  $data['content'] = "pendings";
	  $data['page']    = "prospectives";
	  $this->table->set_heading('#', 'Document Name','Status',"Received");
	  $query_result = $this->followup_model->followup_pending(10);
	  
	  $this->table->add_row($i,$docs->doc_name,"Received",form_checkbox($data));
	  $doc_table =  $this->table->generate();
	  $this->load->view('template',$data);
    }
	
}