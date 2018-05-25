<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Employees extends CI_Controller { 
    function employees()
	{
		parent::__construct();
	    $this->authenticate->logged_in();
	    $this->load->library('form_validation');
		$this->load->model('employee_model');
		
	}
    public function index()
	{
	  $data['content'] = "employees";
	  $data['page']    = "employees";
	  $query_result = $this->employee_model->get_all();
	  $data['employee_details'] = $query_result->result();

	  $this->load->view('template',$data);
	}
	//-----------------------------
	public function add()
	{
	  $data['content'] = "add_employees";
	  $data['page']    = "employees";
	  $this->load->view('template',$data);
	}
	//---------------------------------
	public function edit($id)
	{
	  $data['content'] = "edit_employees";
	  $data['page']    = "employees";
	  $result = $this->employee_model->getall_byid($id)->result();
	  foreach($result as $val)
	  {
	  	 $data['name']    = $val->name;
		 $data['email']    = $val->email;
		 $data['phone']    = $val->phone;
		 $data['address']    = $val->address;
		 $data['employee_id']    = $val->employee_id;
	  }
	  $this->load->view('template',$data);
	}
	//----------------------------------
	public function save()
	{
		$data['page']    = "employees";
		$data['content']  = "add_employees";
		$this->form_validation->set_rules('name', 'Employee Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE)
		{
				$data['msg'] =  $this->authenticate->generate_error(validation_errors());
				$this->load->view('template',$data);
		}
		else
		{
				unset($_POST['submit']);
				$action_res = $this->employee_model->insert($this->input->post());
			if($action_res == true){
				$this->index();				
			}
		}
	}
	
	//-------------------------------------------------------------------
		public function update()
		{
			$data['page']    = "employees";
			$this->form_validation->set_rules('name', 'Employee Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			if ($this->form_validation->run() == FALSE)
			{
					$data['msg'] =  $this->authenticate->generate_error(validation_errors());
					$data['content']  = "edit_employees";
					$data['page']    = "employees";
					$this->load->view('template',$data);
			}
			else
			{
				$eid = $this->input->post('employee_id');
				unset($_POST['submit']);
				unset($_POST['employee_id']);
			    $action_res = $this->employee_model->update($this->input->post(),$eid);
				if($action_res == true){
				$this->index();				
			}
			}
		}
		//----------------------------------------------------------------------
			function search()
			{
					$search = array();
					$data['content'] = "employees";
					  $data['page']    = "employees";

					$data['name'] =  $this->input->get('name');
					$data['email'] =  $this->input->get('email');
					//if($name != "")
					 $search['name'] = $data['name'];
					//if($email != "")
					 $search['email'] = $data['email'];
					 
					 print_r($search);
					 
					 $action_res = $this->employee_model->search($search);
					 if($action_res->num_rows() > 0)
						 $data['employee_details'] = $action_res->result();

					  $this->load->view('template',$data);
					// echo $this->db->last_query();
					// print_r($action_res->result());
						//$this->db->like('title', 'match');
					//	$this->db->or_like('body', $match); 
				//}
			}
		//----------------------------------------------------------------------
			function delete($id)
			{
				$result = $this->employee_model->delete($id);
				redirect("employees/index");
				
			}

	}
