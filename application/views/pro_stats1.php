  <div id="page-wrapper">
         <div class="container-fluid">
               <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Prospective Name : Binu</h1>
                      <?php if($prospective_status == "A")  { 
							 ?>
                              <div class='alert alert-success'>Application <strong>Completed!</strong></div>
                             <?php
							 }
							 else if($prospective_status == "P")
							 {
							 ?>
                             <div class='alert alert-warning'><strong>Pending!</strong></div>
                             <?php
							 }
							 else
							 {
							 ?>
                             <div class='alert alert-danger'><strong>Lost!</strong></div>
                             <?php
							 }
							 ?>
                      <div >
                 </div>
           <!---------------------------------------------------------------------->
           		 <div class="row">
                 	 <div class="col-lg-6"><!----co1--------->
                        <div class="panel panel-primary">
                           <div class="list-group">
                           <a href="#" class="list-group-item active">Prospective  Details</a>
                            <a href="#" class="list-group-item ">Name : <?php if(isset($name)){ echo $name; } ?></a>
                            <a href="#" class="list-group-item">Expected Policy : <?php if(isset($name)){ echo $name; } ?></a>
                            <a href="#" class="list-group-item">Expected Bussiness: <?php if(isset($expecting_bussiness)){ echo $expecting_bussiness; } ?></a>
                            <a href="#" class="list-group-item">Email: <?php if(isset($email)){ echo $email; } ?></a>
                             <a href="#" class="list-group-item">Companys: <?php if(isset($company_activity)){ echo $company_activity; } ?></a>
                            <a href="#" class="list-group-item">Current Policy: <?php if(isset($company_activity)){ echo $email; } ?></a>
                      <a href="#" class="list-group-item"><button data-target="#myStatuslModal" data-toggle="modal">Change Status</button></a>
                          </div>
                        </div>
                    </div>
                    <!----col2--------->
                      <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="list-group">
                             <a href="#" class="list-group-item active">Policy Documents (2 Documents Not Received)</a>
                     
                            </div>
                            <div class="table-responsive">
                           <?php
						   $attributes = array('class' => 'doc_save');
							echo form_open('prospectives/change_status', $attributes);
			 
						    if(isset($policy_docs)){ echo $policy_docs; } 
							
							echo form_close();
							
							?>
                        </div>
                    </div>
                 </div>
                 </div>
                 <!------------------------------------------------------------------------------------------->
                  <div  class="row">
                 	<div class="col-lg-6"> 
                    <div class="panel panel-primary">
                            <div class="list-group">
                              <a href="#" class="list-group-item active">Follow Up Notes</a>
                     
                            </div>
                            <ul class="list-group">
                            <?php //printf( "#%06X\n", mt_rand( 0, 0xFFFFFF )); ?>
                               <?php
							 foreach($followups as $details)
							 {
							?>
                            <li class="list-group-item">Next Call Time :<span style="color:#000033; font-weight:bold;">  <?php echo $details->next_call_time; ?></span><br/><br/>
                            Comment : <span style="color:#006666; font-size:14px; font-weight:bold;"><?php echo $details->comments; ?></span></li>
                            <?php
							}
							?>
                             <li class="list-group-item"><button data-target="#myModal" data-toggle="modal">Follow Up Note</button></li>
                        </ul>
                    </div>
                 </div>
                 
                  <div class="col-lg-6">
                    	      <div class="panel panel-primary">
                            <div class="list-group">
                             <a href="#" class="list-group-item active">Previous Emails</a>
                            </div>
                        <ul class="list-group">
                               <?php
							 foreach($emails as $details)
							 {
							?>
                            <li class="list-group-item">Subject: <?php echo $details->subject; ?><br/>Content:  <?php echo $details->body; ?></li>
                            <?php
							}
							?>
                             <li class="list-group-item"><button data-target="#myEmailModal" data-toggle="modal">Send Email</button></li>
                        </ul>
                    </div>
                 
                   
                    </div>
                    
                    <!-------------------------------------------------------------------->
                     
                    
 
</div>
 <div  class="row">
                      <div class="col-lg-6">
                      	 <div class="panel panel-primary">
                            <div class="list-group">
                             <a href="#" class="list-group-item active">CRM Follow Ups</a>
                            </div>
                        <ul class="list-group">
                          
                           <ul class="list-group">
                               <?php
							 foreach($crm as $details)
							 {
							?>
                            <li class="list-group-item"> 
							<?php if($details->crm_status == 0){ 
							 $color = "#663366";
							 $status =  "Pending with Under Writters";
							} else if($details->crm_status == 1){
								$color = "#FF9900";
								$status =   "Pending with Client";
							} else { 
								$color = "#006633";
								$status =   "Completed";
							} ?><span style="color:<?php echo $color; ?>;"><?php echo $status; ?></span><br/>
                            Note: <strong> <?php echo $details->description; ?></strong><br/>
                            Updated Time : <?php echo $details->crm_followup_date; ?></li>
                            <?php
							}
							?>
                          
                        </ul>
                          
                             <li class="list-group-item"><button data-target="#myCRMlModal" data-toggle="modal">Add Follow Up Note</button></li>
                        </ul>
                    </div>
                      </div>
                      
                      
                      <!-------------------------------------------------------------------->
                      
                      
                        <div class="col-lg-6">
                      	 <div class="panel panel-primary">
                            <div class="list-group">
                             <a href="#" class="list-group-item active">Quatations</a>
                            </div>
                        <ul class="list-group">
                           <?php
							 foreach($quotes as $qdetails)
							 {
							?>
                            <li class="list-group-item">Issued Date: <?php echo $qdetails->issued_date; ?>
                            <br/>Client Feedback:  <?php echo $qdetails->feedback; ?><br/><br/>
                            File <a href="http://aidansoic.com/OIC/quotations/<?php echo $qdetails->file;  ?>"><?php echo $qdetails->file; ?></a></li>
                            <?php
							}
							?>
                           <ul class="list-group">
                               
                          
                        </ul>
                          
                             <li class="list-group-item"><button data-target="#quoteModal" data-toggle="modal">New Quatation</button></li>
                        </ul>
                    </div>
                      </div>
                     
 
</div>

<!--=====================================Popup boxes=========================================================-->
<!----------------1------------------------->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 id="myModalLabel" class="modal-title">Follow Up Comments</h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                       <?php
                                                        $attributes = array('class' => 'add_comment');
                                                        echo form_open('prospectives/save_comment', $attributes);
                                                       ?>
                                                    <ul class="list-group">
                                                        <li class="list-group-item"> <textarea name="comments" rows="7" cols="70" placeholder="Reminder Note"></textarea></li>
                                                        <li class="list-group-item">
                                                        <div id="datetimepicker" class="input-append date">
                                                         <input type="text" name="next_call_time"   placeholder="Next Call Time"></input>
                                                          <span class="add-on">
                                                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                                          </span>
                                                        </div>
                                         </li>
                                                        <input type="hidden" name="proc_id" value="<?php if(isset($prospective_id)){ echo $prospective_id; } ?>" class="btn btn-sm btn-primary">
                                                        <li class="list-group-item"><input type="submit" value="Add Note" class="btn btn-sm btn-primary"></li>
                                                    </ul>
                                                     <?php
                                                        echo form_close();
                                                      ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    </div>
 
</div>
 
</div>
<!----------------1------------------------->

<!----------------2------------------------->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myEmailModal" class="modal fade" style="display: none;">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 id="myModalLabel" class="modal-title">Send Email</h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                         <?php
                                $attributes = array('class' => 'send_email');
                                 echo form_open('prospectives/send_reminder', $attributes);
                              ?>
                       		 <ul class="list-group">
                              <li class="list-group-item"><input readonly="readonly" type="text" name="to" value="<?php if(isset($email)){ echo $email; } ?>" /></li>
                             <li class="list-group-item"><input  type="text" name="subject" placeholder="Subject" value="" /></li>
                            <li class="list-group-item"> <textarea rows="7" name="body" cols="70" placeholder="Reminder Note"></textarea></li>
                            <li class="list-group-item"> <input type="hidden" name="proc_id" value="<?php if(isset($prospective_id)){ echo $prospective_id; } ?>" class="btn btn-sm btn-primary">
                            <input type="submit" class="btn btn-sm btn-primary" value="Send Email" /></li>
                        </ul>
                        	<?php
                                echo form_close();
                           ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    </div>
 
</div>
 
</div>
<!----------------2------------------------->

 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myStatuslModal" class="modal fade" style="display: none;">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 id="myModalLabel" class="modal-title">Send Email</h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                           <?php
								$attributes = array('class' => 'change_status');
								echo form_open('prospectives/change_proc_status', $attributes);
							   ?>
                              
                            Status <select name="prospective_status">
                             				<option value="P">Pending</option>
                                            <option value="A">Completed</option>
                                            <option value="L">Lost</option>
                                            </select>&nbsp;
                                             <input type="hidden" name="proc_id" value="<?php if(isset($prospective_id)){ echo $prospective_id; } ?>" class="btn btn-sm btn-primary">
                                             <a href="#" class="list-group-item">Remark: <textarea name="remark"></textarea></a>
                                            <a href="#" class="list-group-item"> <input type="submit" class="btn btn-sm btn-primary" value="Update"/></a>
                      
                        <?php
							echo form_close();
						?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    </div>
 
</div>
 
</div>


<!------------------------------------------------------->
<!----------------3------------------------->

 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myCRMlModal" class="modal fade" style="display: none;">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 id="myModalLabel" class="modal-title">Send Email</h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                           <?php
								$attributes = array('class' => 'change_status');
								echo form_open('prospectives/crm_update', $attributes);
							   ?>
                              <ul>
                           <li> Pending With Under Writters <input type="radio" class="btn btn-sm btn-primary" name="crm_status" value="0" />&nbsp;</li>
                           <li> Pending With Client <input type="radio" class="btn btn-sm btn-primary" name="crm_status"  value="1"/>&nbsp;</li>
                            </ul>
                                             <input type="hidden" name="proc_id" value="<?php if(isset($prospective_id)){ echo $prospective_id; } ?>" class="btn btn-sm btn-primary">
                                             <a href="#" class="list-group-item">Remark: <textarea name="description"></textarea></a>
                                            <a href="#" class="list-group-item"> <input type="submit" class="btn btn-sm btn-primary" value="Update"/></a>
                      
                        <?php
							echo form_close();
						?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    </div>
 
</div>
 
</div>


<!--------------------4--------------------------------->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="quoteModal" class="modal fade" style="display: none;">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 id="myModalLabel" class="modal-title">Send Email</h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                         <?php
                                $attributes = array('class' => 'send_email');
                                 echo form_open_multipart('prospectives/upload_quote', $attributes);
                              ?>
                       		 <ul class="list-group">
                              <li class="list-group-item"><input   type="text" placeholder="Quotation Date"  name="issued_date" value="" /></li>
                            <li class="list-group-item"> <textarea rows="7" name="feedback" cols="70" placeholder="Feedback Note"></textarea></li>
                             <li class="list-group-item"><input   type="file" name="userfile" placeholder="Quotation File" value="" /></li>

                            <li class="list-group-item"> <input type="hidden" name="proc_id" value="<?php if(isset($prospective_id)){ echo $prospective_id; } ?>" class="btn btn-sm btn-primary">
                            <input type="submit" class="btn btn-sm btn-primary" value="Upload" /></li>
                        </ul>
                        	<?php
                                echo form_close();
                           ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    </div>
 
</div>
 
</div>

 
</div>
<!--=================================================================================================>