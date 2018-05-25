
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
			  <div class="row">
                    <div class="col-lg-6 text-center">
                       <?php
					   		$attributes = array('class' => 'add_prospective');
							echo form_open('prospectives/save', $attributes);
					   ?>
                       		 <div style="color:#FF0000;" class="error"><?php if(isset($msg)){ echo $msg; } ?></div>
                            <div class="form-group">
                                <input class="form-control" name="pros_name" placeholder="Prospective Name">
                            </div>
                            
                            <div class="form-group">
									<input class="form-control" name="pros_email" placeholder="Prospective Email">
                            </div>
                            
                            <div class="form-group">
                            		<input class="form-control" name="existing_insurance" placeholder="Existing Insurance">
                            </div>
                            <div class="form-group">
                            		  <div id="datetimepicker" class="input-append date">
                            		<input class="form-control" name="existing_insurance_expiry" placeholder="Existing Insurance Expiry">
                                    <span class="add-on">
                                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                      </span></div>
                            </div>
                              <div class="form-group">
                            		<input class="form-control" name="company_activity" placeholder="Company Location">
                            </div>
                             <div class="form-group">
                            		<input class="form-control" name="company_location" placeholder="Company Activity">
                            </div>
                            <div class="form-group">
                            		<select  class="form-control" name="expected_policy" >
                                    	<option>Class of Policy</option>
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
                            		<input class="form-control" name="expecting_bussiness" placeholder="Expecting Bussiness">
                            </div>
                           	  <div class="form-group">
                            		<input class="form-control" name="expecting_premium" placeholder="Expecting Premium">
                            </div>
                             <div class="form-group">
                            		<input class="form-control" name="concerned_person" placeholder="Concerned Person">
                            </div>
                             <div class="form-group">
                            		<input class="form-control" name="contact_number" placeholder="Contact Number">
                            </div>
                               <div class="form-group">
                                <textarea  placeholder="Remark" name="remark" class="form-control" rows="3"></textarea>
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