
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Add a new Employees </h1>
                  <ol class="breadcrumb">
                           
                      </ol>
                    </div>
                </div>

              <div class="row"></div>
                <?php
					   		$attributes = array('class' => 'add_employee');
							echo form_open('policies/update', $attributes);
					   ?>
                <!-- /.row -->
			  <div class="row">
                    <div class="col-lg-6 text-center">
                        <div style="color:#FF0000;" class="error"><?php if(isset($msg)){ echo $msg; } ?></div>
                            <div class="form-group">
                                <input class="form-control" name=" policy_name" value="<?php echo $policy_name; ?>" placeholder="Policy Name">
                            </div>
                            
                     
                            <div class="form-group">
                                <label>Policy Type</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" <?php if($policy_category == "General"){ echo "checked";} ?>  name="policy_category" id="general" value="General" checked>General
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" <?php if($policy_category == "Medical"){ echo "checked";} ?> name="policy_category" id="medical" value="Medical">Medical
                                    </label>
                                </div>
                               
                            </div>
                            
                            <div class="form-group">
                            		<input class="form-control"  value="<?php echo $policy_number; ?>"  name="policy_number" placeholder="Policy Number">
                            </div>
                             <div class="form-group">
                            		<input class="form-control" value="<?php echo $policy_amount; ?>"  name="policy_amount" placeholder="Policy Amount">
                            </div>
                               <div class="form-group">
                                <textarea name="policy_description"  placeholder="Description" class="form-control" rows="3"><?php echo $policy_description; ?></textarea>
                            </div>
                            <div class="form-group">
                               <input type="hidden" name="policy_id" value="<?php echo $policy_id; ?>"  />
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
							</div>
                        </div>
                              <?php
						  	echo form_close();
						  ?>
                    </div>
              </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

