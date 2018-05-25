
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                           Add New Employee </h3>
                 
                    </div>
                </div>

 <div class="row"></div>
                <!-- /.row -->
			  <div class="row">
                    <div class="col-lg-6 text-center">
                       <?php
					   		$attributes = array('class' => 'add_employee');
							echo form_open('employees/save', $attributes);
					   ?>
                       		 <div style="color:#FF0000;" class="error"><?php if(isset($msg)){ echo $msg; } ?></div>
                            <div class="form-group">
                                <input class="form-control" name="name" placeholder="Employee Name">
                            </div>
                            
                            <div class="form-group">
									<input class="form-control" name="email" placeholder="Email">
                            </div>
                            
                            <div class="form-group">
                            		<input class="form-control" name="phone" placeholder="Phone Number">
                            </div>
                           
                               <div class="form-group">
                                <textarea  placeholder="Address" name="address" class="form-control" rows="3"></textarea>
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