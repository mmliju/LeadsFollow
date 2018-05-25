<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Prospectives </h1>
                  <ol class="breadcrumb">
                            <li class="active">
                                 <i class="fa fa-add"></i> <a href="<?php echo base_url(); ?>index.php/prospectives/add">Add New</a>
                            </li>
                        </ol>
                    </div>
                </div>
			    <?php
					   		$attributes = array('method' => 'get');
							echo form_open('prospectives/search', $attributes);
					   ?>
               <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                               <div class="row">
                                <div style="color:#FF0000;" class="error"><?php if(isset($msg)){ echo $msg; } ?></div>
                    <div class="col-lg-4 text-center">
                        <div class="panel panel-default">
                                <input class="form-control" name="name" value="<?php if(isset($name)){ echo $name;} ?>" placeholder="Enter Prospective Name">
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
               <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                               <div class="row">
                   					<strong>Prospectives</strong>
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
                        <?php 
                         if($prospective_details != 0)
                         {
                        ?>
                                           <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Prospective Name</th>
                                        <th>Prospective Email</th>
                                        <th>Contact Number</th>
                                        <th>Contact Person</th>
                                        <th>Existing Insurance</th>
                                        <th>Expiry</th>
                                       <th>Remark</th>
                                        <th>Status</th>
                                        <th>Date Added</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php 
								 $num = 1;
								 foreach($prospective_details as $val)
								 {
								?>
                                    <tr style="height:50px; <?php if($val->prospective_status == "A"){ echo "color: #4F8A10; background-color: #DFF2BF;"; } else if($val->prospective_status == "P") { echo "color: #4F2F4F; background-color: #FEEFB3;"; }else { echo "color: #ff1919; background-color: #ffcccc;"; } ?>;" >
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $val->pros_name ; ?></td>
                                        <td><?php echo $val->pros_email ; ?></td>
                                        <td><?php echo $val->contact_number; ?></td>
                                        <td><?php echo $val->concerned_person; ?></td>
                                        <td><?php echo $val->existing_insurance ; ?></td>
                                        <td><?php echo $val->existing_insurance_expiry ; ?></td>
                                        
                                        <td><?php echo $val->remark; ?></td>
                                        <td><strong><?php if($val->prospective_status == "P"){ echo "Pending"; } else if($val->prospective_status == "A") { echo "Approved"; }else {echo "Lost"; } ?></strong></td>
                                         <td><?php echo $val->added_date ; ?></td>
                                        <td><a href="<?php echo base_url(); ?>index.php/prospectives/edit/<?php echo $val->prospective_id; ?>">Edit</a>&nbsp;&nbsp;<a onclick="return deletealert();" href="<?php echo base_url(); ?>index.php/prospectives/delete/<?php echo $val->prospective_id; ?>">Delete</a>&nbsp;<a  href="<?php echo base_url(); ?>index.php/prospectives/pro_stat/<?php echo $val->prospective_id; ?>">Status</a>&nbsp;</td>
                                    </tr>
                                 <?php
							   		$num++;
							   }
							   ?>
                                   
                                   <tr>
                                   	<td colspan="10" align="right"><?php if(isset($pagination)){ echo $pagination; } ?></td>
                                   </tr>
                                  
                                   
                                </tbody>
                            </table>
			  <?php
			  }
			  else
			  {
			  ?>
			  <?php
			    echo "NO DATA FOUND!";
			  }
			  ?>
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