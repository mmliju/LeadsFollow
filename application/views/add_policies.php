
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
							echo form_open('policies/save', $attributes);
					   ?>
                <!-- /.row -->
			  <div class="row">
                    <div class="col-lg-6 text-center">
                        <div style="color:#FF0000;" class="error"><?php if(isset($msg)){ echo $msg; } ?></div>
                            <div class="form-group">
                                <input class="form-control" name=" policy_name" placeholder="Policy Name">
                            </div>
                            
                     
                            <div class="form-group">
                                <label>Policy Type</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio"  name="policy_category" id="general" value="General" checked>General
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="policy_category" id="medical" value="Medical">Medical
                                    </label>
                                </div>
                               
                            </div>
                            
                            <div class="form-group">
                            		<input class="form-control" name="policy_number" placeholder="Policy Number">
                            </div>
                             <div class="form-group">
                            		<input class="form-control" name="policy_amount" placeholder="Policy Amount">
                            </div>
                               <div class="form-group">
                                <textarea name="policy_description"  placeholder="Description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
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

