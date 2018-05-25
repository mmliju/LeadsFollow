<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Reports extends CI_Controller { 
    function reports() 
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
	  $data['content'] = "reports";
	  $data['page']    = "reports";
	  $query_result = $this->prospective_model->get_all();
	  $data['prospective_details'] = $query_result->result();

	  $this->load->view('template',$data);
	}
	

}
