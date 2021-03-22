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
						<?php /* <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Save_Attendance" class="text-white"><i class="" aria-hidden="true"></i> Add Attendance </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="#" class="text-white" data-toggle="modal" data-target="#Bulkmodal"><i class="" aria-hidden="true"></i>  Add Bulk Attendance</a></button>
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Attendance_Report" class="text-white"><i class="" aria-hidden="true"></i> Attendance Report </a></button>  */ ?>
                        
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
													<div style="float: right;">
														<input type="hidden" name='id' id="id" value="<?php echo base64_decode($this->input->get('I')); ?>">
														<label class="switch">
															<input class="switch-input" id="attendancevalue" <?php if(!empty($attendancedata1)){ if(!empty($attendancedata1[0]['sign_in']) && empty($attendancedata1[0]['sign_out'])){ echo 'checked'; } } ?> type="checkbox" />
															<span class="switch-label" data-on="Sign Out" data-off="Sign In" style="margin-top:0px;"></span> 
															<span class="switch-handle" style="margin-top:-2px;"></span> 
														</label>
														 <?php  /* <input type="checkbox" class="js-single" id="attendancevalue" onclick="attendance();" <?php if(!empty($attendancedata)){ if(!empty($attendancedata[0]['signin_time']) && empty($attendancedata[0]['signout_time'])){ echo 'checked'; } } ?> checked value="signin">  */ ?>
													</div>
                                                    
                                                </div>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive" style="min-height: 300px;">
                                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>Date</th>
																<th>Effective Hours</th>
																<th>Gross Hours</th>
																<th>Arrival</th>
																<th>Log</th>
																
                                                            </tr>
                                                            </thead>
                                                            <tbody>
																<?php 
																	if(!empty($abc)){
																		foreach($abc as $abcobj){
																?>
																<tr>
																	<td><!-- Apr 23, Thu -->
																		<?php// echo date("Y M d, D", strtotime($abcobj['date'])); ?>
																		<?php echo $abcobj['date']; ?>
																	</td>
																	<td>	
																		<?php echo $abcobj['effectivehours']; ?> 
																	</td>
																	<td><?php echo $abcobj['grosshours']; ?></td>
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
																													'attendance_id'=>$abcobj['id'],
																													'date'=>$abcobj['date'],
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
																	<?php }} ?>
															</tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th>Date</th>
																<th>Effective Hours</th>
																<th>Gross Hours</th>
																<th>Arrival</th>
																<th>Log</th>
																
                                                            </tr>
                                                            </tfoot>
                                                        </table>
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
	<script>
		const checkbox = document.getElementById('attendancevalue')

checkbox.addEventListener('change', (event) => {
  if (event.target.checked) {
    
	var id = document.getElementById("id").value;
		$.ajax({
             type: 'POST',
             url: '<?php echo base_url(); ?>Attendance/Employee_signin',
             data: {id: id},
             //dataType: "json",
             
             success: function (data) {
                alert("Sign In successfully completed");
				//location.reload()
             },
             error: function () {
                 
             }
         });
  } else {
		var id = document.getElementById("id").value;
		$.ajax({
             type: 'POST',
             url: '<?php echo base_url(); ?>Attendance/Employee_signout',
             data: {id: id},
            // dataType: "json",
             
             success: function (data) {
				
                 alert("Sign Out successfully completed");
				 //location.reload();
             },
             error: function () {
                 
             }
         });
  }
});
		
	</script>