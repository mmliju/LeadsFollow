        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small> Overview</small>                        </h1>
                  <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

             
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php if(isset($followup_pending)){ echo $followup_pending; }else{ echo "0";} ?></div>
                                        <div>Follow up Pending in next 10 days</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>index.php/home/pending_followups/10">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php if(isset($policy_expiry)){ echo $policy_expiry; }else{ echo "0";} ?></div>
                                        <div>Policy Expires in 3 months</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>index.php/home/expiring_details">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="list-group">
                            <a href="#" class="list-group-item active"><strong>Todays Follo Up (<?php if(isset($policy_expiry_today)){ echo $policy_expiry_today; }else{ echo "0";} ?>)</strong></a>
                            <?php
								foreach($pending_comments->result() as $val)
								{
							?>
                            <a href="#" class="list-group-item"><strong><?php echo $val->pros_name; ?>&nbsp;:&nbsp;</strong><?php echo $val->comments; ?><br/><?php echo $val->next_call_time; ?></a>
                            <?php
							}
							?>
                        </div>
                    </div>
                <!-- /.row -->

                
                <!-- /.row -->

              
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
      </div>