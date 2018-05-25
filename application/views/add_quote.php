
<div id="page-wrapper">

            <div class="container-fluid">

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
                             
                              <li class="list-group-item">
                              <div id="datetimepicker" class="input-append date">
                              <input   type="text" placeholder="Quotation Date"  name="issued_date" value="" />
                               <span class="add-on">
                                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                      </span></div></li>
                            <li class="list-group-item"> <textarea rows="7" name="feedback" cols="70" placeholder="Feedback Note"></textarea></li>
                             <li class="list-group-item"><input   type="file" name="userfile" placeholder="Quotation File" value="" /></li>
							  <li class="list-group-item"> <select name="quote_status"  placeholder="Qutoation Status Note">
                              	<option value="Pending">Pending</option>
                                <option value="Progress">Progress</option>
                                <option value="Completed">Completed</option>
                                <option value="Abandoned">Abandoned</option>
                              </select></li
                            <li class="list-group-item"> <input type="hidden" name="proc_id" value="<?php if(isset($prospective_id)){ echo $prospective_id; } ?>" class="btn btn-sm btn-primary">
                            <input type="submit" class="btn btn-sm btn-primary" value="Upload" /></li>
                        </ul>

                          
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    </div>
 
</div>
 
</div>

 
</div>
