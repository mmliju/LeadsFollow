<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Prospectives extends CI_Controller { 
    function prospectives() 
	{
		parent::__construct();
	    $this->authenticate->logged_in();
	    $this->load->library('form_validation');
		$this->load->model('prospective_model');
		$this->load->model('policies_model');
		$this->load->model('policies_doc_model');
		$this->load->model('followup_model');
		$this->load->model('email_model');
		$this->load->library('table');
			//----------------Table configurations-----------------------------------
		$tmpl = array (
                    'table_open'          => ' <table class="table table-bordered table-hover table-striped">',
                    'heading_row_start'   => '<tr >',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',
                    'row_start'           => '<tr >',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',
                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',
                    'table_close'         => '</table>'
              );

			$this->table->set_template($tmpl); 
	}
	//----------------------------------------
    public function index()
	{
	  $data['content'] = "prospectives";
	  $data['page']    = "prospectives";
	  //--------------------------------------------------------
	  $total_rows  =  $this->prospective_model->get_all()->num_rows();

	  $this->load->library('pagination');
	  $config['base_url'] = base_url().'index.php/prospectives/index';
	  $config['total_rows'] = $total_rows;
	  $config['per_page'] = 25;
	  $this->pagination->initialize($config);
	  $query_result =  $this->prospective_model->get_all_limit($config['per_page'],$this->uri->segment(3));
	  $rows =  $query_result->num_rows();

      $data['pagination'] =  $this->pagination->create_links();

	  //--------------------------------------------------------
	
	  $data['prospective_details'] = $query_result->result();
	  $this->load->view('template',$data);
	}
	//-----------------------------
	public function add()
	{
	  $data['content'] = "add_prospectives";
	  $data['page']    = "prospectives";
	  $data['policies']        = $this->policies_model->get_all()->result();
	  $this->load->view('template',$data);
	}
	//---------------------------------
	public function edit($id)
	{
	  $data['content'] = "edit_prospectives";
	  $data['page']    = "prospectives";
	  $data['policies']        = $this->policies_model->get_all()->result();
	  $data1 = $this->prospective_details($id);
	  $this->load->view('template',array_merge($data,$data1));
	}
	//----------------------------------
	public function save()
	{
		$this->data['page']    = "prospectives";
		$this->data['content']  = "add_prospectives";
		$this->form_validation->set_rules('pros_name', 'prospective Name', 'required');
		$this->form_validation->set_rules('pros_email', 'Prospective Email', 'required');
		$this->form_validation->set_rules('existing_insurance', 'Existing Insurance', 'required');
		$this->form_validation->set_rules('expected_policy', 'Expected Policy', 'required');
		if ($this->form_validation->run() == FALSE)
		{
				$this->data['msg'] =  $this->authenticate->generate_error(validation_errors());
				$this->load->view('template',$this->data);
		}
		else
		{
				unset($_POST['submit']);
				$action_res = $this->prospective_model->insert($this->input->post());
			if($action_res == true)
			{
				$proc_id = $this->db->insert_id();
				$doc_lists = $this->get_doc_list($this->input->post('expected_policy'));
				foreach($doc_lists as $doc)
				{
					//-----------------------------
					$doc_data['proc_id'] = $proc_id;
					$doc_data['doc_id']  = $doc->doc_id;
					$doc_data['proc_doc_status']  = "P";
					$this->policies_doc_model->insert_child($doc_data);
				}
				//--------------------------
				$this->index();				
			}
		}
	}
	
	//-------------------------------------------------------------------
		public function update()
		{
		$this->data['page']    = "prospectives";
		$this->data['content']  = "add_prospectives";
		$this->form_validation->set_rules('pros_name', 'prospective Name', 'required');
		$this->form_validation->set_rules('pros_email', 'Prospective Email',  'required|valid_email');
		$this->form_validation->set_rules('existing_insurance', 'Existing Insurance', 'required');
		$this->form_validation->set_rules('expected_policy', 'Expected Policy', 'required');

			if ($this->form_validation->run() == FALSE)
			{
					$this->data['msg'] =  $this->authenticate->generate_error(validation_errors());
					$this->data['content']  = "edit_prospectives";
					$this->load->view('template',$this->data);
			}
			else
			{
				$eid = $this->input->post('prospective_id');
				unset($_POST['submit']);
				unset($_POST['prospective_id']);
			    $action_res = $this->prospective_model->update($this->input->post(),$eid);
				if($action_res == true){
				$this->index();				
			}
			}
		}
		//----------------------------------------------------------------------
			function search()
			{
					$search = array();
					$data['content'] = "prospectives";
					  $data['page']    = "prospectives";

					$data['name']  =  $this->input->get('name');
					$data['email'] =  $this->input->get('email');
					$data['from_date']  =  $this->input->get('from_date');
					$data['to_date'] 	=  $this->input->get('to_date');
					//------------------------------------------------------
					if($this->input->get('from_date') != "" && $this->input->get('to_date') != "")
					{
						//----------------------------------------------------
					 $dates['added_date >='] = $this->input->get('from_date');
					 $dates['added_date <='] = $this->input->get('to_date');
					}
					else
					 $dates = array();
					//------------------------------------------------------
					 $search['pros_name'] = $data['name'];
					 $search['pros_email'] = $data['email'];
					
					 
					 $action_res = $this->prospective_model->search($search,$dates);
					// echo $this->db->last_query();
					 if($action_res->num_rows() > 0)
						 $data['prospective_details'] = $action_res->result();
					 else
					  $data['prospective_details'] = 0;

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
				$result = $this->prospective_model->delete($id);
				redirect("prospectives/index");
				
			}
		//-------------------------------------------------------------------------------
		 function pro_stat($id)
		 {
		 	$data['page']     = "prospectives";
			$data['content']  = "pro_stats";
			$data1 = $this->prospective_details($id);
			$data['followups']= $this->followup_model->get_all_by_fk($data1['prospective_id'])->result();
			$data['crm']= $this->followup_model->get_all_by_crm_fk($data1['prospective_id'])->result();
			$data['emails']= $this->email_model->get_all_by_fk($data1['prospective_id'])->result();
			$data['quotes']= $this->prospective_model->show_quotes($data1['prospective_id'])->result();
			$data['policy_docs'] = $this->create_doc_table($data1['prospective_id'],$data1['expected_policy']);
			$this->load->view('template',array_merge($data,$data1));
		 }
		 //------------------------------------------------------
		 private function prospective_details($id)
		 {
		 	$result =   $this->prospective_model->getall_byid($id)->result();
			  foreach($result as $val)
			  {
				 $data['prospective_id']    = $val->prospective_id;
				 $data['expected_policy']    = $val->expected_policy;
				 $data['name']    = $val->pros_name;
				 $data['email']    = $val->pros_email;
				 $data['existing_insurance']    = $val->existing_insurance;
				 $data['existing_insurance_expiry']    = $val->existing_insurance_expiry;
				 $data['company_activity']    = $val->company_activity;
				 $data['company_location']    = $val->company_location;
				 $data['expecting_bussiness'] = $val->expecting_bussiness;
				 $data['expecting_premium']    = $val->expecting_premium;
				 $data['concerned_person']    = $val->concerned_person;
				  $data['contact_number']    = $val->contact_number;
				 $data['prospective_status']    = $val->prospective_status;
				 $data['remark']    		  = $val->remark;
			  }
			  
			  return $data;
		 }
		
		//------------------------------------------------------------------------
		
		function doc_status_save()
		{
			$proc_id = $this->input->post('proc_id');
			//print_r($_POST);
			$fields[$this->policies_doc_model->tble_policy_doc_child_status] = "R";
			foreach($this->input->post('doc_status') as $docs)
			{
				$doc_result = $this->policies_doc_model->doc_current_status($proc_id,$docs);
				if($doc_result->num_rows() > 0)
					$this->policies_doc_model->update_doc_status($proc_id,$docs,$fields);
				else
				{
					$vals['proc_id'] = $proc_id;
					$vals['doc_id'] = $docs;
					$vals['proc_doc_status'] = 'R';
					$this->policies_doc_model->insert_doc_status($vals);
				}
				
			}
			redirect("prospectives/pro_stat/".$proc_id,"refresh");
		}
		//---------------------------------------------------------------------------
		function save_comment()
		{
			
			$_POST["updated_user"] = $this->session->userdata('user_id');
			$action_res = $this->followup_model->insert($this->input->post());
			if($action_res == true){
				$this->pro_stat($this->input->post("proc_id"));	
			}			
		}
		//----------------------------------------------------------------------------
		private function create_doc_table($proc_id,$policy_id)
		{
			$result = $this->policies_doc_model->getall_byfk($policy_id)->result();
			$this->table->set_heading('#', 'Document Name','Status',"Received");
			$i = 1;
			foreach($result as $docs)
			{
				$doc_id =  $docs->doc_id;
				$doc_status = $this->policies_doc_model->doc_status_check($proc_id,$doc_id);
				$doc_stat = $doc_status->num_rows();
				if($doc_stat > 0)
				{
					$data = array(
							'name'        => 'doc_status[]',
							'id'          => 'doc_status',
							'value'       => $docs->doc_id,
							'checked'     => TRUE,
							
							);
					$this->table->add_row($i,$docs->doc_name,"Received",form_checkbox($data));
				}
				else
				{
					$data = array(
							'name'        => 'doc_status[]',
							'id'          => 'doc_status',
							'value'       => $docs->doc_id,
							'checked'     => FALSE,
							);
					$this->table->add_row($i,$docs->doc_name,"Pending",form_checkbox($data));
				}
					
				$i++;

				//echo $this->db->last_query();
			//	echo $doc_status->num_rows();
			}
			$data = array(
              'proc_id'       =>  $proc_id,
            );

			$hidden = form_hidden($data);
			 $this->table->add_row('<input type="submit" class="btn btn-sm btn-primary" value="Update">',$hidden);
			 //--------------------------------------------------------------------
			 $attributes = array('class' => 'doc_save');
			 $form_open   =  form_open('prospectives/doc_status_save', $attributes);
			 $form_close  =  form_close();
			 //-----------------------------------------------------------------------
			 $doc_table =  $this->table->generate();
			
			return $doc_table;
		}
	  //-------------------------------------------------------------
	  public function send_reminder()
	  {
		if(isset($_POST['to']))
		{
			
			$to	= $this->input->post('to');
			$subject = $this->input->post('subject');
			$proc_id = $this->input->post('proc_id');
			$body = $this->input->post('body');
			if(!empty($_FILES['email_attachment']['name'])) {
				//------------------------------------------------------
				$config['upload_path'] = './attahments/';
				$config['allowed_types'] = 'doc|docx|pdf';
				$config['max_size']	= '50000';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
		
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload('email_attachment'))
				{
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
					exit;
				//	$this->load->view('upload_form', $error);
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$_POST['email_attachment'] = $data ['upload_data']['file_name'];
					//$this->load->view('upload_success', $data);
					
				}
				
				//-------------------------------------------------------
			}
			$send =  $this->send($to,$subject,$body,$data['upload_data']['full_path']);
			if($send)
			{
				$_POST["sent_user"] = $this->session->userdata('user_id');
				$action_res = $this->email_model->insert($this->input->post());
				redirect('prospectives/pro_stat/'.$proc_id, 'refresh');
			}
				
		}
	
	  }
	  //-----------------------------------------------------------
	  function get_doc_list($policy_id)
	  {
	  	$doc_list = 	$this->policies_doc_model->getall_byfk($policy_id)->result();
		return $doc_list;
	  }
	  //------------------------------------------------------------------
	private function send($to,$subject,$body,$attach="")
	{
		$this->load->library('email');
		$this->email->from('support@aidansoic.com', 'Aiden\'s Supprt');
		$this->email->to($to);
	//	$this->email->cc('another@another-example.com');
	//	$this->email->bcc('them@their-example.com');
		$this->email->subject($subject);
		$this->email->message($body);
		if($attach != "")
			$this->email->attach($attach);
		$this->email->send();
		return $this->email->print_debugger();
	}
	//-------------------------------------------------------------------
	function change_status()
	{
		$eid = $this->input->post('proc_id');
		unset($_POST['proc_id']);
		$existind_doc_details = $this->policies_doc_model->getall_child_by_where($eid)->result();
		$existing_doc = array();
			foreach($existind_doc_details as $doc_details)
			{
			//	array_push($existing_doc,$doc_details->doc_id);
			  if(isset($_POST['doc_status']))
			  {
				if(in_array($doc_details->doc_id,$this->input->post('doc_status')))
				{
					$fields['proc_doc_status'] =  "R";
					$action_res = $this->policies_doc_model->update_child($fields,$doc_details->pros_doc_id);
				}
				else
				{
					$fields['proc_doc_status'] =  "P";
					$action_res = $this->policies_doc_model->update_child($fields,$doc_details->pros_doc_id);
				}
			 }
			 else
			 {
				$fields['proc_doc_status'] =  "P";
				$action_res = $this->policies_doc_model->update_child($fields,$doc_details->pros_doc_id);
			 }
			}
		 
		
		
		redirect('prospectives/pro_stat/'.$eid, 'refresh');
	}
	//-----------------------------------------------------------------------
	function change_proc_status()
	{
		$eid = $this->input->post('proc_id');
		unset($_POST['proc_id']);
		unset($_POST['doc_status']);
		
		$action_res = $this->prospective_model->update($this->input->post(),$eid);
		redirect('prospectives/pro_stat/'.$eid, 'refresh');
	}
	//-----------------------------------------------------------------------
	function crm_update()
	{
		$eid = $this->input->post('proc_id');
		$action_res = $this->followup_model->insert_crm($this->input->post());
		redirect('prospectives/pro_stat/'.$eid, 'refresh');
	}
	//-------------------------------------------------------------------
	function upload_quote()
	{
		print_r($_POST);
		$config['upload_path'] = './quotations/';
		$config['allowed_types'] = 'gif|doc|docx|pdf';
		$config['max_size']	= '50000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		//	$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$_POST['file'] = $data ['upload_data']['file_name'];
			$action_res = $this->prospective_model->save_quote($_POST);
			if($action_res == true){
				$this->pro_stat($this->input->post("proc_id"));	
			}	
			//$this->load->view('upload_success', $data);
		}
	}
	//------------------------------------------------------
	function add_quote($proc_id)
	{
	  $data['content'] = "add_quote";
	  $data['page']    = "prospectives";
	  $data['prospective_id']    = $proc_id;
	  //--------------------------------------------------------
	
	  $this->load->view('template',$data);
	}
}
