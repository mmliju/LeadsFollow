<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Employees </h1>
                  <ol class="breadcrumb">
                            <li class="active">
                                 <i class="fa fa-add"></i> <a href="<?php echo base_url(); ?>index.php/policies/add">Add New</a>
                            </li>
                        </ol>
                    </div>
                </div>

               <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                               <div class="row">
                   					<strong>Policies</strong>
                                </div>
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
                                           <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Policy Name</th>
                                        <th>Category</th>
                                        <th>Number</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php 
								 $num = 1;
								 foreach($policy_details as $val)
								 {
								?>
                                    <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $val->policy_name ; ?></td>
                                        <td><?php echo $val->policy_category ; ?></td>
                                        <td><?php echo $val->policy_number ; ?></td>
                                        <td><?php echo $val->policy_amount ; ?></td>
                                        <td><?php echo $val->policy_description; ?></td>
                                        <td><a href="<?php echo base_url(); ?>index.php/policies/edit/<?php echo $val->policy_id; ?>">Edit</a>&nbsp;&nbsp;<a onclick="return deletealert();" href="<?php echo base_url(); ?>index.php/policies/delete/<?php echo $val->policy_id; ?>">Delete</a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>index.php/policies/docs/<?php echo $val->policy_id; ?>">Documents</a></td>
                                    </tr>
                                 <?php
							   		$num++;
							   }
							   ?>
                                   
                                   
                                  
                                   
                                </tbody>
                            </table>
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