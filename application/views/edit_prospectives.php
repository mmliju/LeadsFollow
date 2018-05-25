
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                           Add New Prospective </h3>
                 
                    </div>
                </div>

 <div class="row"></div>
                <!-- /.row -->
			  <div class="row">
                    <div class="col-lg-6 text-center">
                       <?php
					   		$attributes = array('class' => 'edit_prospective');
							echo form_open('prospectives/update', $attributes);
					   ?>
                       		 <div style="color:#FF0000;" class="error"><?php if(isset($msg)){ echo $msg; } ?></div>
                            <div class="form-group">
                                <input class="form-control" name="pros_name" value="<?php if(isset($name)){ echo $name; } ?>" placeholder="Prospective Name">
                            </div>
                            
                            <div class="form-group">
									<input class="form-control" name="pros_email" value="<?php if(isset($email)){ echo $email; } ?>" placeholder="Prospective Email">
                            </div>
                            
                            <div class="form-group">
                            		<input class="form-control" name="existing_insurance" value="<?php if(isset($existing_insurance)){ echo $existing_insurance; } ?>"  placeholder="Existing Insurance">
                            </div>
                              <div class="form-group">
                                <div id="datetimepicker" class="input-append date">
                            		<input class="form-control" name="existing_insurance_expiry"  value="<?php if(isset($existing_insurance_expiry)){ echo $existing_insurance_expiry; } ?>" placeholder="Existing Insurance Expiry">
                                    <span class="add-on">
                                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                      </span>
                            </div>
                              <div class="form-group">
                            		<select name="expected_policy" >
                                    	<option>Class of Policy</option>
                                        <?php
											foreach($policies as $val)
											{
										?>
                                        	<option <?php if($expected_policy == $val->policy_id){ echo "selected";} ?> value="<?php echo $val->policy_id; ?>"><?php echo $val->policy_name; ?></option>
                                        <?php
										}
										?>
                                    </select>
                            </div>
                              <div class="form-group">
                            		<input class="form-control" name="company_activity" value="<?php if(isset($company_activity)){ echo $company_activity; } ?>"  placeholder="Company Activity">
                            </div>
                             <div class="form-group">
                            		<input class="form-control" name="company_location"  value="<?php if(isset($company_location)){ echo $company_location; } ?>" placeholder="Company Location">
                            </div>
                              <div class="form-group">
                            		<input class="form-control" name="expecting_bussiness" value="<?php if(isset($expecting_bussiness)){ echo $expecting_bussiness; } ?>"  placeholder="Expecting Bussiness">
                            </div>
                           	  <div class="form-group">
                            		<input class="form-control" name="expecting_premium" value="<?php if(isset($expecting_premium)){ echo $expecting_premium; } ?>"  placeholder="Expecting Premium">
                            </div>
                                  <div class="form-group">
                            		<input class="form-control" name="concerned_person" value="<?php if(isset($concerned_person)){ echo $concerned_person; } ?>"  placeholder="Concerned Person">
                            </div>
                             <div class="form-group">
                            		<input class="form-control" name="contact_number" value="<?php if(isset($contact_number)){ echo $contact_number; } ?>"  placeholder="Contact Number">
                            </div>
                               <div class="form-group">
                                <textarea  placeholder="Remark" name="remark" class="form-control" rows="3"> <?php if(isset($remark)){ echo $remark; } ?> </textarea>
                            </div>
                            <div class="form-group">
                            <input type="hidden" name="prospective_id" value="<?php echo $prospective_id; ?>"  />
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