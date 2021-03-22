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
                                                        <h4>Attendance</h4>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="<?php echo base_url(); ?>"> <i class="feather icon-home"></i> </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">Attendance</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
											<div class="col-12 ">
						<button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Save_Attendance" class="text-white"><i class="" aria-hidden="true"></i> Add Attendance </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="#" class="text-white" data-toggle="modal" data-target="#Bulkmodal"><i class="" aria-hidden="true"></i>  Add Bulk Attendance</a></button>
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Attendance_Report" class="text-white"><i class="" aria-hidden="true"></i> Attendance Report </a></button>
                        
                    </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->
									<div class="page-body">
			<div class="row clearfix">
                
				
					<div class="col-xl-12 col-md-12">
						<div class="card">
                                                <div class="card-header">
                                                    <h5>Attendance List</h5>
                                                    
                                                </div>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
													
														<table id="simpletable" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                            <tr>
																<th>#</th>
																<th>Date</th>
																<th>Employee Name</th>
																<th>PIN</th>
                                                                
																<th>Effective Hours</th>
																<th>Gross Hours</th>
																<th>Arrival</th>
																<th>Log</th>
																
                                                            </tr>
                                                            </thead>
                                                            <tbody>
																<?php 
																	if(!empty($attendancedetails)){
																		$x=1;
																		foreach($attendancedetails as $attendancedetailsobj){
																?>
																<tr>
																	<td><?php echo $x; ?></td>
																	<td ><!-- Apr 23, Thu -->
																		<?php echo date("M d, D", strtotime($attendancedetailsobj['attendancedate'])); ?>
																	</td>
																	<td><!-- Apr 23, Thu -->
																		<?php echo $attendancedetailsobj['first_name'].' '.$attendancedetailsobj['last_name']; ?>
																	</td>
																	<td><!-- Apr 23, Thu -->
																		<?php echo $attendancedetailsobj['em_code']; ?>
																	</td>
																	
																	<td>	
																		 <?php echo $attendancedetailsobj['attendanceeffectivehours']; ?>
																	</td>
																	<td><?php echo $attendancedetailsobj['attendancegrosshours']; ?></td>
																	<td>On Time</td>
																	<td>
																		<div class="nav-right">
																			<div class="header-notification">
																				<div class="dropdown-primary dropdown">
																					<div class="dropdown-toggle" data-toggle="dropdown">
																						<i class="ion-ios-clock"></i>
																						
																					</div>
																					<div class="show-notification notification-view dropdown-menu " style="width: 250px;" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
																						<div>
																							<div class="panel panel-default">
																								<div class="panel-heading bg-default txt-white" style="background-color: #f6f7fb !important; color: #000; border-bottom: 1px solid;">
																									<p>NuWave Night... (Apr 22)</p>
																									<p>10:00 PM - 6:00 Am</p>
																								</div>
																								<div class="panel-body" style="padding: 5px 0 0 13px;overflow: scroll;max-height: 200px;">
																									
																									<a href="#" style="color:#01a9ac;background-color: #fff;"> <i class="fa fa-edit"></i> Regularize </a>
																									<br><br>
																									<h5>Time</h5>
																									
																									<br>
																									<table>
																										<?php 
																										$where = array(
																													'attendance_id'=>$attendancedetailsobj['attendanceid'],
																													'date'=>$attendancedetailsobj['attendancedate'],
																												);
																										
																										
																										$order = "id  DESC";	
																											
																										$logdata = $this->Alldata->DetailData('attendanc_log',$where,$order);
																										
																										
																										if(!empty($logdata)){ 
																											foreach($logdata as $logdataobj){
																										?>	 
																										<tr>
																											<td><i class="zmdi zmdi-arrow-left-bottom" style="color:green;"></i> <?php echo date("h:i:s A", strtotime($logdataobj['sign_in'])); ?><!-- 9:45:36 AM --></td>
																											<td><i class="zmdi zmdi-arrow-right-top" style="color:red;"></i><?php if(!empty($logdataobj['sign_out'])){ echo date("h:i:s A", strtotime($logdataobj['sign_out'])); }else{ echo 'MISSING'; } ?></td>
																										</tr>
																										<?php } }  ?>
																										
																										
																									</table>
																								</div>
																								
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>	
																	</td>
																</tr>
																	<?php $x++; }} ?>
															</tbody>
                                                            <tfoot>
                                                            <tr>
																<th>Employee Name</th>
																<th>PIN</th>
                                                                <th>Date</th>
																<th>Effective Hours</th>
																<th>Gross Hours</th>
																<th>Arrival</th>
																<th>Log</th>
																
                                                            </tr>
                                                            </tfoot>
                                                        </table>
													
													
													
                                                        <?php /* <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>Employee Name</th>
																<th>PIN</th>
																<th>Date </th>
																<th>Sign In</th>
																<th>Sign Out</th>
																<th>Working Hour</th>
																<th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
																
																<?php foreach($attendancelist as $value): ?>
                                            <tr>
                                                <td><mark><?php echo $value->name; ?></mark></td>
                                                <td><?php echo $value->emp_id; ?></td>
                                                <td><?php echo $value->atten_date; ?></td>
                                                <td><?php echo $value->signin_time; ?></td>
                                                <td><?php echo $value->signout_time; ?></td>
                                                <td><?php echo $value->Hours; ?></td>
                                                <td class="jsgrid-align-center ">
                                                <?php if($value->signout_time == '00:00:00') { ?>
                                                    <a href="Save_Attendance?A=<?php echo $value->id; ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light" data-value="Approve" >Sign Out</a><br>                           
                                                <?php } ?>
                                                    <a href="Save_Attendance?A=<?php echo $value->id; ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light" data-value="Approve" ><i class="fa fa-pencil"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
														   
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th>Employee Name</th>
																<th>PIN</th>
																<th>Date </th>
																<th>Sign In</th>
																<th>Sign Out</th>
																<th>Working Hour</th>
																<th>Action</th>
                                                            </tr>
                                                            </tfoot>
                                                        </table> */  ?>
                                                    </div>
                                                </div>
                                            </div>
						
                </div>
            </div>
         </div>
		 </div>
		 </div>
		 </div>
		 
            
                   
                
    <?php $this->load->view('backend/footer'); ?>