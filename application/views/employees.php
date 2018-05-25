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
				    <?php
					   		$attributes = array('method' => 'get');
							echo form_open('employees/search', $attributes);
					   ?>
               <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                               <div class="row">
                                <div style="color:#FF0000;" class="error"><?php if(isset($msg)){ echo $msg; } ?></div>
                    <div class="col-lg-4 text-center">
                        <div class="panel panel-default">
                                <input class="form-control" name="name" value="<?php if(isset($name)){ echo $name;} ?>" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                                <input class="form-control" name="email" value="<?php if(isset($email)){ echo $email;} ?>" placeholder="Enter Email">
                    </div>
                    <div class="col-lg-4 text-center">
                              <input type="submit" value="Search" class="btn btn-lg btn-primary">
                    </div>
                </div>
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
						 if(isset($employee_details)){
						?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
								 $num = 1;
								 foreach($employee_details as $val)
								 {
								?>
                                    <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $val->name; ?></td>
                                        <td><?php echo $val->email; ?></td>
                                        <td><?php echo $val->phone; ?></td>
                                        <td><?php echo $val->address; ?></td>
                                        <td><a href="<?php echo base_url(); ?>index.php/employees/edit/<?php echo $val->employee_id; ?>">Edit</a>&nbsp;&nbsp;<a onclick="return deletealert();" href="<?php echo base_url(); ?>index.php/employees/delete/<?php echo $val->employee_id; ?>">Delete</a></td>
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