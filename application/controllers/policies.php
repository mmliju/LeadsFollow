<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Policies extends CI_Controller { 
    function policies()
	{
		parent::__construct();
	    $this->authenticate->logged_in();
	    $this->load->library('form_validation');
		$this->load->model('policies_model');
		$this->load->model('policies_doc_model');
		
	}
    public function index()
	{
	  $data['content'] = "policies";
	  $data['page']    = "policies";
	  $query_result = $this->policies_model->get_all();
	  $data['policy_details'] = $query_result->result();

	  $this->load->view('template',$data);
	}
	//-----------------------------
	public function add()
	{
	  $data['content'] = "add_policies";
	  $data['page']    = "policies";
	  $this->load->view('template',$data);
	}
	//---------------------------------
	public function edit($id)
	{
	  $data['content'] = "edit_policies";
	  $data['page']    = "policies";
	  $data1 =   $this->get_policy_details($id);
	  $this->load->view('template',array_merge($data,$data1));
	}
	//----------------------------------
	public function save()
	{
		$this->data['page']    = "policies";
		$this->data['content']  = "add_policies";
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'required');
		$this->form_validation->set_rules('policy_category', 'Policy Category', 'required');
		if ($this->form_validation->run() == FALSE)
		{
				$this->data['msg'] =  $this->authenticate->generate_error(validation_errors());
				$this->load->view('template',$this->data);
		}
		else
		{
				unset($_POST['submit']);
				$action_res = $this->policies_model->insert($this->input->post());
			if($action_res == true){
				$this->index();				
			}
		}
	}
	
	//-------------------------------------------------------------------
		public function update()
		{
			$this->data['page']    = "policies";
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'required');
		$this->form_validation->set_rules('policy_category', 'Policy Category', 'required');

			if ($this->form_validation->run() == FALSE)
			{
					$this->data['msg'] =  $this->authenticate->generate_error(validation_errors());
					$this->data['content']  = "edit_policies";
					$this->load->view('template',$this->data);
			}
			else
			{
				$eid = $this->input->post('policy_id');
				unset($_POST['submit']);
				unset($_POST['policy_id']);
			    $action_res = $this->policies_model->update($this->input->post(),$eid);
				if($action_res == true){
				$this->index();				
			}
			}
		}
		//----------------------------------------------------------------------
			function delete($id)
			{
				$result = $this->policies_model->delete($id);
				redirect("policies/index");
				
			}
		//-------------------------------------------------------------------------------
			function docs($id)
			{
				$data['page']    = "policies";
				$data['content']  = "policiy_doc";
				$data1 =   $this->get_policy_details($id);
			    $data['docs'] = $this->policies_doc_model->getall_byfk($id)->result();
				$this->load->view('template',array_merge($data,$data1));
			}
		//-------------------------------------------------------------------------------
			function doc_details()
			{
			   $doc_id = $this->input->post("doc_id");
			  // $this->policies_doc_model->getall_byid($doc_id);
			   $doc_details = $this->policies_doc_model->getall_byid($doc_id);
			   if($doc_details->num_rows() == 1)
			   {
				   foreach($doc_details->result() as $details )
				   {
					  //$chitid = $details->doc_id;
					  $dtls = json_encode($details);
				   }
				   //$status['result'] =  0 ;
				   echo $dtls;
				}
				
			}
		//----------------------------------------------------------------
			function save_doc()
			{
				$this->form_validation->set_rules('doc_name', 'Document Name', 'required');
				$data['page']    = "policies";
				$data['content'] = "policiy_doc";
				$policy_id = $this->input->post("policy_id");
				$data1 =   $this->get_policy_details($policy_id);
				if ($this->form_validation->run() == FALSE)
				{
						$data['msg'] =  $this->authenticate->generate_error(validation_errors());
						$this->load->view('template',array_merge($data,$data1));
				}
				else
				{
						if($_POST['doc_submit'] == "Add")
						{
							unset($_POST['doc_submit']);
							$action_res = $this->policies_doc_model->insert($this->input->post());
						}
						else
						{
							$did = $this->input->post("doc_id");
							unset($_POST['doc_submit']);
							unset($_POST['policy_id']);
							unset($_POST['doc_id']);
							$action_res = $this->policies_doc_model->update($this->input->post(),$did);
						}
					if($action_res == true){
						$this->docs($policy_id);				
					}
				}
			}
			function delete_doc($id,$policy_id)
			{
				$result = $this->policies_doc_model->delete($id);
				$this->docs($policy_id);	

			}
		//------------------------------------------------------------------------------------
		   private function get_policy_details($id)
			{
				 $result = $this->policies_model->getall_byid($id)->result();
				  foreach($result as $val)
				  {
					 $data['policy_id']   		 = $val->policy_id;
					 $data['policy_name']   	 = $val->policy_name;
					 $data['policy_category']    = $val->policy_category;
					 $data['policy_number']    	 = $val->policy_number;
					 $data['policy_amount']    	 = $val->policy_amount;
					 $data['policy_description'] = $val->policy_description;
				  }
				  return $data;
			}
		//------------------------------------------------------------------------
	}
