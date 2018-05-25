
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
             <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Employees </h1>
                  <ol class="breadcrumb">
                  
                            <li class="active">
                                 <i class="fa fa-add"></i>  Add New Client
                            </li>
                        </ol>
                    </div>
                </div>

 <div class="row"></div>
                <!-- /.row -->
			  <div class="row">
                    <div class="col-lg-6 text-center">
                       <?php
					   		$attributes = array('class' => 'add_employee');
							echo form_open('clients/save', $attributes);
					   ?>
                       		 <div style="color:#FF0000;" class="error"><?php if(isset($msg)){ echo $msg; } ?></div>
                            <div class="form-group">
                            <select class="form-control" name="proc_id">
                              <option value="">Select a prospective</option>
                            <?php
								foreach($prospectives->result() as $val)
								{
							?>
                             <option value="<?php echo $val->prospective_id; ?>"><?php echo $val->pros_name; ?></option>
                             <?php
							 	}
							?>
                            </select></div>
                             <div class="form-group">
                                <input class="form-control" name="policy_expiry" placeholder="Policy Expiry">
                            </div>
                            
                                                     
                               <div class="form-group">
                                <textarea  placeholder="Description" name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                            
                            <input name="submit" type="submit" value="Save" class="btn btn-lg btn-primary">
							</div>
                          <?php
						  	echo form_close();
						  ?>
                        </div>
                    </div>
              </div>
            </div>            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>