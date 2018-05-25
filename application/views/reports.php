<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Under Construction </h1>
                </div>
            <!-- /.container-fluid -->

        </div>
                   <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                               <div class="row">
                                <div style="color:#FF0000;" class="error"><?php if(isset($msg)){ echo $msg; } ?></div>
                    <div class="col-lg-3 text-center">
                        <div class="panel panel-default">
                                <input class="form-control" name="name" value="<?php if(isset($name)){ echo $name;} ?>" placeholder="Start Date">
                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                                <input class="form-control" name="email" value="<?php if(isset($email)){ echo $email;} ?>" placeholder="End Date">
                    </div>
                    <div class="col-lg-3 text-center">
                                <select class="form-control"  >
                                	<option>All</option>
                                    <option>Pending</option>
                                    <option>Completed</option>
                                </select>
                    </div>
                    <div class="col-lg-3 text-center">
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
        </div>
        <!-- /#page-wrapper -->

    </div>