<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Clients </h1>
                  <ol class="breadcrumb">
                  
                            <li class="active">
                                 <i class="fa fa-add"></i> <a href="<?php echo base_url(); ?>index.php/clients/add">Add New</a>
                            </li>
                        </ol>
                    </div>
                </div>
				    <?php
					   		$attributes = array('method' => 'get');
							echo form_open('employees/search', $attributes);
					   ?>
               <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="panel panel-default">
                           
                <?php
				echo form_close();
			   ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
			  <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                        <div class="table-responsive">
                        <?php
						 if(isset($client_details)){
						?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Policy Expiry</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
								 $num = 1;
								 foreach($client_details as $val)
								 {
								?>
                                    <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $val->pros_name; ?></td>
                                        <td><?php echo $val->pros_email; ?></td>
                                        <td><?php echo $val->policy_expiry; ?></td>
                                        <td><?php echo $val->description; ?></td>
                                        <td><a href="<?php echo base_url(); ?>index.php/employees/edit/<?php echo $val->client_id; ?>">Edit</a>&nbsp;&nbsp;<a onclick="return deletealert();" href="<?php echo base_url(); ?>index.php/employees/delete/<?php echo $val->client_id; ?>">Delete</a></td>
                                    </tr>
                               <?php
							   		$num++;
							   }
							   ?>
                                   
                                   
                                </tbody>
                            </table>
                          <?php } else {?>
                          	<h2>No Result Found!</h2>
                          <?php } ?>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>