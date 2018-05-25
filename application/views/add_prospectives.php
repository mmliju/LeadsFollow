
<div id="page-wrapper">

            <div class="container-fluid">
			
               <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                           Add New Prospectives </h3>
                 
                    </div>
                </div>


                <!-- /.row -->
                <div class="row">
                  <h3 class="page-header">
                           Add New Prospectives </h3>
            </div>
             <div class="panel-body">
			  <div class="row">
                    <div class="col-lg-6">
                       <?php
					   		$attributes = array('class' => 'add_prospective');
							echo form_open('prospectives/save', $attributes);
					   ?>
                       		 <div style="color:#FF0000;" class="error"><?php if(isset($msg)){ echo $msg; } ?></div>
                              <div class="form-group">
                                            
                            <div class="form-group">
                            <label>Prospective Name</label>    
                            <input class="form-control" name="pros_name" >
                            </div>
                            
                            <div class="form-group">
                            		<label>Prospective Email</label> 
									<input class="form-control" name="pros_email" >
                            </div>
                              <div class="form-group">
                              		<label>Concerned Person</label> 
                            		<input class="form-control" name="concerned_person" >
                            </div>
                             <div class="form-group">
                             		<label>Contact Number</label> 
                            		<input class="form-control" name="contact_number" >
                            </div>
                            <div class="form-group">
                            		<label>Existing Insurance</label> 
                            		<input class="form-control" name="existing_insurance" >
                            </div>
                            <div class="form-group">
                            		  <label>Existing Insurance Expiry</label> 
                            		  <div id="datetimepicker" class="input-append date">
                            		<input class="form-control" name="existing_insurance_expiry" >
                                    <span class="add-on">
                                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                      </span></div>
                            </div>
                                <div class="form-group">
                                	<label>Company Activity</label> 
                            		<input class="form-control" name="company_location" >
                            </div>
                              <div class="form-group">
                              		<label>Company Location</label> 
                            		<input class="form-control" name="company_activity" >
                            </div>
                         
                            <div class="form-group">
                                     <label>Class of Policy</label> 
                            		<select  class="form-control" name="expected_policy" >
                                    	<option>Select</option>
                                        <?php
											foreach($policies as $val)
											{
										?>
                                        	<option value="<?php echo $val->policy_id; ?>"><?php echo $val->policy_name; ?></option>
                                        <?php
										}
										?>
                                    </select>
                            </div>
                              <div class="form-group">
                                 	<label>Expecting Bussiness</label> 
                            		<input class="form-control" name="expecting_bussiness">
                            </div>
                           	  <div class="form-group">
                              		<label>Expecting Premium</label> 
                            		<input class="form-control" name="expecting_premium">
                            </div>
                           
                               <div class="form-group">
                               <label>Remark</label> 
                                <textarea   name="remark" class="form-control" rows="3"></textarea>
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
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>