<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                           Edit Employee </h3>
                 
                    </div>
                </div>

 <div class="row"></div>
                <!-- /.row -->
			  <div class="row">
                    <div class="col-lg-6 text-center">
                       <?php
					   		$attributes = array('class' => 'add_employee');
							echo form_open('employees/update', $attributes);
					   ?>
                       		 <div style="color:#FF0000;" class="error"><?php if(isset($msg)){ echo $msg; } ?></div>
                            <div class="form-group">
                                <input class="form-control" name="name" placeholder="Employee Name" value="<?php echo $name; ?>">
                            </div>
                            
                            <div class="form-group">
									<input class="form-control" name="email" placeholder="Email"  value="<?php echo $email; ?>">
                            </div>
                            
                            <div class="form-group">
                            		<input class="form-control" name="phone" placeholder="Phone Number"  value="<?php echo $phone; ?>">
                            </div>
                           
                               <div class="form-group">
                                <textarea  placeholder="Address" name="address" class="form-control" rows="3">  <?php echo $address; ?></textarea>
                            </div>
                            <div class="form-group">
                            <input type="hidden" name="employee_id" value="<?php echo $employee_id; ?>"  />
                            <input name="submit" type="submit" value="Update" class="btn btn-lg btn-primary">
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