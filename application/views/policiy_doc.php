<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Policiy : Medical</h1>
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                           <div class="list-group">
                            <a href="#" class="list-group-item active">Policy Details</a>
                            <a href="#" class="list-group-item">Policy Name : <?php echo $policy_name; ?> </a>
                            <a href="#" class="list-group-item">Policy Type : <?php echo $policy_category; ?></a>
                            <a href="#" class="list-group-item">Policy Number : <?php echo $policy_number; ?></a>
                            <a href="#" class="list-group-item">Policy Name : <?php echo $policy_amount; ?></a>
                            <a href="#" class="list-group-item">Policy Description: <?php echo $policy_description; ?></a>
                        </div>
                        </div>
                    </div>
         
                    <div class="col-lg-6">
                    
                        <div class="panel panel-primary">
                       
                            <div class="list-group">
                            <a href="#" class="list-group-item active">Policy Documents</a>
                                    <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Document Name</th>
                                        <th></th>
                                        <th></th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php 
								$num = 1;
								 foreach($docs as $val)
								 {
								?>
                                    <tr>
                                        <td><?php echo $val->doc_name; ?></td>
                                        <td><a onclick="javascript:get_doc(<?php echo $val->doc_id; ?>);" href="#">Edit</a></td>
                                        <td><a onclick="return deletealert();" href="<?php echo base_url(); ?>index.php/policies/delete_doc/<?php echo $val->doc_id; ?>/<?php echo $val->policy_id; ?>">Delete</a></td>
                                        
                                    </tr>
                             <?php
							$num++;
							}
							?>  
                                </tbody>
                            </table>
                             
                              
                             <a href="#" class="list-group-item"></a>
                            
                        
                            </div>
                            <div class="panel panel-default">
                              <div style="color:#FF0000;" class="error"><?php if(isset($msg)){ echo $msg; } ?></div>
                            <?php
					   		$attributes = array('class' => 'add_employee');
							echo form_open('policies/save_doc', $attributes);
					   ?>        
                            <div class="panel-body">
                            	<input type="hidden" name="policy_id" value="<?php echo $policy_id; ?>"  />
                                <input type="hidden" id="doc_id" name="doc_id" value="a"  />
                               <input type="text" name="doc_name" id="doc_name" class="form-control" placeholder="New Documen Name"><br/>
                                <input type="submit" name="doc_submit" class="btn btn-sm btn-primary" id="doc_submit" value="Add">
                            </div>
                        </div>
                    </div>
                </div>
						<?php
						  	echo form_close();
						  ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>