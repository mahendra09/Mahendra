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
                                                        <h4>Dashboard</h4>
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
                                                        <li class="breadcrumb-item"><a href="#!">Dashbord</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->
                                    <!-- Page-body start -->
                                    <div class="page-body">
										<div class="row">
											<div class="col-xl-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
																<i class="fa fa-birthday-cake f-30 text-c-lite-green"></i>
                                                                
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10"> Celebrating Birthday</h6>
                                                                
																	<?php 
																		if(empty($birthday)){
																	?>
																	<h3 class="m-b-0"></h3>
																	<?php 
																			echo 'No birthdays today.';
																		}else{
																	?>
																	<h2 class="m-b-0"></h2>
																	<?php
																			
																		}
																	?>
																
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-xl-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
																<i class="icon-paper-plane f-30 text-c-lite-green"></i>
                                                              <i class="ion-android-send f-30 text-c-lite-green"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10"> Celebrating Work Anniversaries</h6>
                                                                <?php 
																		if(empty($birthday)){
																	?>
																	<h3 class="m-b-0"></h3>
																	<?php 
																			echo 'No Work Anniversaries today.';
																		}else{
																	?>
																	<h2 class="m-b-0"></h2>
																	<?php
																			
																		}
																	?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div> 
                                        <div class="row">
											<div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
                                                                <i class="feather icon-book f-30 text-c-lite-green"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10"> Employees</h6>
                                                                <h2 class="m-b-0">
																	<?php 
																		$comid=$this->session->userdata('company');
																		$this->db->where('em_company',$comid);
																		$this->db->where('status','ACTIVE');
																		$this->db->from("employee");
																		echo $this->db->count_all_results();
																	?>
																</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
                                                                <i class="feather icon-book f-30 text-c-lite-green"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10">Leaves</h6>
                                                                <h2 class="m-b-0">
																	<?php 
																		/* $comid=$this->session->userdata('company');
																		$this->db->where('em_company',$comid); */
																		$this->db->where('leave_status','Approve');
																		$this->db->from("emp_leave");
																		echo $this->db->count_all_results();
																	?>
																</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
                                                                <i class="feather icon-book f-30 text-c-lite-green"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10">Projects</h6>
                                                                <h2 class="m-b-0">
																	<?php 
																		$this->db->where('pro_status','running');
																		$this->db->from("project");
																		echo $this->db->count_all_results();
																	?>
																</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
                                                                <i class="feather icon-book f-30 text-c-lite-green"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10">Loan</h6>
                                                                <h2 class="m-b-0">
																	<?php 
																		$this->db->where('status','Granted');
																		$this->db->from("loan");
																		echo $this->db->count_all_results();
																	?>
																</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="row">
											<div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
                                                                <i class="feather icon-book f-30 text-c-lite-green"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10"> Ex-employees</h6>
                                                                <h2 class="m-b-0">
																	<?php
																		$comid=$this->session->userdata('company');
																		$this->db->where('em_company',$comid);
																		$this->db->where('status','INACTIVE');
																		$this->db->from("employee");
																		echo $this->db->count_all_results();
																	?>
																</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
                                                                <i class="feather icon-book f-30 text-c-lite-green"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10">Leave Application</h6>
                                                                <h2 class="m-b-0">
																	<?php 
																		$this->db->where('leave_status','Approve');
																		$this->db->from("emp_leave");
																		echo $this->db->count_all_results();
																	?>
																</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
                                                                <i class="feather icon-book f-30 text-c-lite-green"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10">Upcomming <BR> Project</h6>
                                                                <h2 class="m-b-0">
																	<?php 
																		$this->db->where('pro_status','upcoming');
																		$this->db->from("project");
																		echo $this->db->count_all_results();
																	?>
																</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
                                                                <i class="feather icon-book f-30 text-c-lite-green"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10">Loan Application</h6>
                                                                <h2 class="m-b-0">
																	<?php 
																		$this->db->where('status','Granted');
																		$this->db->from("loan");
																		echo $this->db->count_all_results();
																	?>
																</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										
										<div class="row">
											<!-- Notice Bord -->
											<?php $notice = $this->notice_model->GetNoticelimit(); 
											$running = $this->dashboard_model->GetRunningProject(); 
											$userid = $this->session->userdata('user_login_id');
											$todolist = $this->dashboard_model->GettodoInfo($userid);                 
											$holiday = $this->dashboard_model->GetHolidayInfo();                 
											?>
											<div class="col-xl-8 col-md-6">
												<div class="card">
													<div class="card-header">
														<h5>Notice Board</h5>
														

													</div>
													<div class="card-block table-border-style">
														<div class="table-responsive">
															<table class="table">
																<thead>
																	<tr>
																		<th>#</th>
																		<th>Title</th>
																		<th>File</th>
																		<th>Date</th>
																	</tr>
																</thead>
																<tbody>
																	<?php $i=1; foreach($notice AS $value){ ?>
																	<tr>
																		<th scope="row"><?php echo $i; ?></th>
																		<td style="white-space: normal;"><?php echo $value->title ?></td>
																		<td><mark><a href="<?php echo base_url(); ?>assets/images/notice/<?php echo $value->file_url ?>" target="_blank"><?php echo $value->file_url ?></a></mark>
																		</td>
																		<td style="width:100px"><?php echo $value->date ?></td>
																	</tr>
																	<?php $i++; } ?>
																	
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
											<!-- Notice Bord -->
											<!-- To Do List -->
											<div class="col-xl-4 col-md-6">
												<div class="card">
													<div class="card-header">
														<h5>To Do list</h5>
														<span>List of your next task to complete</span>

													</div>
													<div class="card-block table-border-style">
														<div class="col-xl-12 col-md-6">
															<?php foreach($todolist as $value): ?>
																<div class="well well-sm">
																   <?php if($value->value == '1'){ ?>
																	<div class="checkbox checkbox-info">
																		<input class="to-do" data-id="<?php echo $value->id?>" data-value="0" type="checkbox" id="<?php echo $value->id?>" >
																		<label for="<?php echo $value->id?>"><span><?php echo $value->to_dodata; ?></span></label>
																	</div>
																	<?php } else { ?>
																	<div class="checkbox checkbox-info">
																		<input class="to-do" data-id="<?php echo $value->id?>" data-value="1" type="checkbox" id="<?php echo $value->id?>" checked>
																		<label class="task-done" for="<?php echo $value->id?>"><span><?php echo $value->to_dodata; ?></span></label>
																	</div> 
																	<?php } ?>                                                   
																</div>
															<?php endforeach; ?>
															
														</div>
													</div>
												</div>
											</div>
											<!-- To Do List -->
										</div>
										
										<div class="row">
											<!-- Running Project -->
											
											<div class="col-xl-8 col-md-6">
												<div class="card">
													<div class="card-header">
														<h5>Running Project</h5>
														

													</div>
													<div class="card-block table-border-style">
														<div class="table-responsive">
															<table class="table">
																<thead>
																	<tr>
																		<th>#</th>
																		<th>Title</th>
																		<th>Start Date</th>
																		<th>End Date</th>
																	</tr>
																</thead>
																<tbody>
																	<?php $i=1; foreach($running AS $value): ?>
																	<tr>
																		<th scope="row"><?php echo $i; ?></th>
																		<td><a href="<?php echo base_url(); ?>Projects/view?P=<?php echo base64_encode($value->id); ?>"><?php echo substr("$value->pro_name",0,25).'...'; ?></a></td>
																		<td><?php echo $value->pro_start_date; ?></td>
																		<td><?php echo $value->pro_end_date; ?></td>
																	</tr>
																	<?php $i++; endforeach; ?>
																	
																	
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
											<!-- Running Project -->
											<!-- To Do List -->
											<div class="col-xl-4 col-md-6">
												<div class="card">
													<div class="card-header">
														<h5>Holidays</h5>
														

													</div>
													<div class="card-block table-border-style">
														<table class="table">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Holiday Name</th>
																	<th>Date</th>
																	
																</tr>
															</thead>
															<tbody>
																<?php $i=1; foreach($holidaylist as $value): ?>
																    <tr>
																		<th scope="row"><?php echo $i; ?></th>
																		<td><?php echo $value['holiday_name']; ?></td>
																		<td><?php echo $value['from_date']; ?></td>
																    </tr>
																 <?php $i++; endforeach ?>
																
																
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
											<!-- To Do List -->
										</div>
                                        
									</div>
								</div>
							</div>
						</div>
					</div>
      
                                           
<?php $this->load->view('backend/footer'); ?>
<script>
  $(".to-do").on("click", function(){
      //console.log($(this).attr('data-value'));
      $.ajax({
          url: "Update_Todo",
          type:"POST",
          data:
          {
          'toid': $(this).attr('data-id'),         
          'tovalue': $(this).attr('data-value'),
          },
          success: function(response) {
              location.reload();
          },
          error: function(response) {
            console.error();
          }
      });
  });			
</script>    