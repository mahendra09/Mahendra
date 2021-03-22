<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>Issue List</h4>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="<?php echo base_url(); ?>"> <i class="feather icon-home"></i> </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>'Projects/All_Projects'">Project</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Issue List</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            
                                            <div class="col-xl-12">
                                                <!-- New ticket button card start -->
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class=" waves-effect waves-light m-r-10 v-middle issue-btn-group">
															<?php
																if(!empty($this->session->flashdata('feedback'))){
															 ?>
															<div class="alert alert-info background-info">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	<i class="icofont icofont-close-line-circled text-white"></i>
																</button>
																<?php echo $this->session->flashdata('feedback'); ?>
															</div>
															<?php } ?>
                                                            <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="btn btn-sm btn-success btn-new-tickets waves-effect waves-light m-r-15 m-b-5 m-t-5"><i class="icofont icofont-paper-plane"></i><span class="m-l-10">New Tickets</span></button>
															
                                                            <!--<div class="btn-group m-b-5 m-t-5">
                                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="icofont icofont-ui-user"></i></button>
                                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="icofont icofont-edit-alt"></i></button>
                                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="icofont icofont-reply"></i></button>
                                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="icofont icofont-printer"></i></button>
                                                            </div> -->
                                                            <div class="f-right bug-issue-link m-t-5">
                                                                <ol class="breadcrumb bg-white m-0 p-t-5 p-b-0">
                                                                    <li class="breadcrumb-item"><a href="#">16 Bugs</a></li>
                                                                    <li class="breadcrumb-item"><a href="#">19 Issue</a></li>
                                                                </ol>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- New ticket button card end -->
                                                <!-- bug list card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Zero Configuration</h5>
                                                        <div class="card-header-right">
                                                            <i class="icofont icofont-spinner-alt-5"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table id="issue-list-table" class="table dt-responsive width-100">
                                                                <thead class="text-left">
                                                                    <tr>
                                                                        <th>Type</th>
                                                                        <th>#ID</th>
                                                                        <th>Description</th>
                                                                        <th>Assigned</th>
																		<th>Assigned date</th>
                                                                        <th>Priority</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="text-left">
																	<?php
																		if(isset($ticket) && !empty($ticket)){
																			foreach($ticket as $ticketobj){
																	?>
																	<tr>
                                                                        <td class="txt-primary"><?php echo $ticketobj['type']; ?></td>
                                                                        <td>#<?php echo $ticketobj['ticketid']; ?></td>
                                                                        <td style="white-space: normal;"><?php echo $ticketobj['discription']; ?></td>
                                                                        <td>
																			<?php
																				$where=array('id'=>$ticketobj['assignto']);
																				$assignto = $this->Alldata->DetailData('employee',$where);
																				if(isset($assignto) &&  !empty($assignto)){
																			?>
																			<a href="#">
																				<?php echo $assignto[0]['first_name'].''.$assignto[0]['last_name']; ?>
																			</a>
																				<?php }  ?>
																		</td>
																		<td><?php echo date("d/m/Y", strtotime($ticketobj['assigndate'])); ?></td>
                                                                        <td>
																			<?php 
																				if($ticketobj['priority'] == 'Highest'){
																			?>
																				<span class="label label-danger">Highest</span>
																			<?php 
																				}elseif($ticketobj['priority'] == 'High'){
																			?>
																				<span class="label label-warning">High</span>
																			<?php 
																				}elseif($ticketobj['priority'] == 'Normal'){
																			?>
																				<span class="label label-success">Normal</span>
																			<?php 
																				}elseif($ticketobj['priority'] == 'Slow'){
																			?>
																				<span class="label label-info">Slow</span>
																			<?php 
																				} 
																			?>
																		</td>
                                                                        
                                                                        <td>
																			<?php 
																				if($ticketobj['status'] == 'Open'){
																			?>
																				<span class="label label-primary">Open</span>
																			<?php 
																				}elseif($ticketobj['status'] == 'Close'){
																			?>
																				<span class="label label-danger">Close</span>
																			<?php 
																				}elseif($ticketobj['status'] == 'Pending'){
																			?>
																				<span class="label label-warning">Pending</span>
																			<?php 
																				}elseif($ticketobj['status'] == 'On Hold'){
																			?>
																				<span class="label label-info">On Hold</span>
																			<?php 
																				} 
																			?>
																			
																		</td>
                                                                    </tr>
																	<?php }} ?>
                                                                    
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- end of table -->
                                                    </div>
                                                </div>
                                                <!-- bug list card end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
					
					<!-- sample modal content -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">New Tickets</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Ticket" id="tasksModalform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Project List</label>
                                                <select class="form-control custom-select col-md-8 proid" data-placeholder="Choose a Category" tabindex="1" name="projectid">
                                                   <option value="">Select Project</option>
												   <?php foreach($projects as $value): ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->pro_name; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
											<!--	<div class="form-group row">
                                                <label class="control-label col-md-3">Project Date</label>
                                                <input type="text" value="" name="prostart" class="form-control col-md-4" id="recipient-name1" readonly>
                                                <input type="text" value="" name="proend" class="form-control col-md-4" id="recipient-name1" readonly>
                                            </div>    -->                                          
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Assign To</label>
                                                <select class="select2 form-control custom-select col-md-8" data-placeholder="Choose a Category"  tabindex="1" name="assignto">
                                                  <option value="">Select Here</option>
                                                   <?php foreach($employee as $value): ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->first_name.' '.$value->last_name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                
                                            </div>                                                                                   
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Issue Type</label>
                                                <select class="select2 form-control custom-select col-md-8" data-placeholder="Choose a Issue Type"  tabindex="1" name="type">
													<option value="">Select Issue Type</option>
													<option value="Bug">Bug</option>
													<option value="Issue">Issue</option>
                                                </select>
                                            </div>
											
											<div class="form-group row">
                                                <label for="message-text" class="control-label col-md-3">Description</label>
                                                <textarea class="form-control col-md-8" name="discription" id="message-text1" minlength="10" maxlength="1400"></textarea>
                                            </div>
											<div class="form-group row">
                                                <label class="control-label col-md-3">Priority</label>
                                                <select class="select2 form-control custom-select col-md-8" data-placeholder="Choose a Issue Type"  tabindex="1" name="priority">
													<option value="">Select Priority</option>
													<option value="Highest">Highest</option>
													<option value="High">High</option>
													<option value="Normal">Normal</option>
													<option value="Slow">Slow</option>
                                                </select>
                                            </div>
											<div class="form-group row">
                                                <label for="message-text" class="control-label col-md-3">Screen Short</label>
                                                <input type="file" class="form-control col-md-8" name="screenshort" id="message-text1" >
                                            </div>
											
                                            
                                    </div>
                                    <div class="modal-footer">
											<!-- <input type="hidden" name="id" class="form-control" id="recipient-name1">  -->
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
<?php $this->load->view('backend/footer'); ?>