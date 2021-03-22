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
                                    <h4>Employee Profile</h4>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>employee/Employees">Employee</a>
                                    </li>
                                    <li class="breadcrumb-item">Employee Profile
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                    <!-- Page-body start -->
                    <div class="page-body">
						<!-- Profile Header -->
						<div class="row" style="margin-left: 2px;">
							<div class="col-lg-12">
								<div class="card">									
									<div class="card-block" style="padding:0;">
										<div class="row">
											<div class="col-lg-3" style="padding:0;max-width: 20%;">
												<?php if(!empty($basic->em_image)){ ?>
													<img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basic->em_image; ?>" class="user-img img-radius" alt="<?php echo $basic->first_name ?>" style="height: 210px; width: 210px;" />
												<?php } else { ?>
													<img src="<?php echo base_url(); ?>assets/images/users/user.png" class="user-img img-radius"  alt="<?php echo $basic->first_name ?>" title="<?php echo $basic->first_name ?>"  style="height: 210px; width: 210px;background: #fff;"/>                                   
												<?php } ?>  
												<!-- <img src="<?php echo base_url(); ?>assets/images/users/4.jpg" class="user-img img-radius" alt="<?php echo $basic->first_name ?>" title="<?php echo $basic->first_name ?>"  style="height: 210px; width: 210px;background: #fff;"/> -->
											</div>
											<div class="col-lg-9" style="max-width: 80%;">
												<div class="col-lg-12">
													<div class="row employee-header" style="height: 65px;padding-top: 15px;">
														<h2 class="display-name ng-binding" style="font-weight: 400;display: inline-block;"><?php echo $basic->first_name .' '.$basic->last_name; ?></h2>
													</div>
													<p style="font-size: 12px;color: rgb(136, 136, 136);display: inline-block;margin: 0px 40px 5px 0px;"><i class="ti-location-pin"></i> <?php echo $basic->location; ?></p>
													 <p style="font-size: 12px;color: rgb(136, 136, 136);display: inline-block;margin: 0px 40px 5px 0px;"><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $basic->em_email; ?>" class="ng-binding"> <?php echo $basic->em_email; ?></a></p>
												</div>
												<hr>
												<div class="col-lg-12">
													<ul class="nav nav-tabs md-tabs tab-timeline" style="border-bottom: 0px solid #ddd;">
														<li class="nav-item" style="border-right: none;padding-right: 50px;font-size: 11px;text-align: left;">
															<span class="detail-label" style="text-transform: uppercase;display: block;font-weight: 700;">Job Title</span>
															<span class="detail-value" style="text-transform: capitalize;color: #7d7d7e;font-size: 12px;font-weight: 500;">
															<span ><?php echo $basic->des_name; ?></span>
																
															</span>
														</li>
														<li class="nav-item" style="border-right: none;padding-right: 50px;font-size: 11px;text-align: left;">
															<span class="detail-label" style="text-transform: uppercase;display: block;font-weight: 700;">Department</span>
															<span style="text-transform: capitalize;color: #7d7d7e;font-size: 12px;font-weight: 500;"><?php echo $basic->dep_name; ?></span>
														</li>
														<li class="nav-item" style="border-right: none;padding-right: 50px;font-size: 11px;text-align: left;">
															<span class="detail-label" style="text-transform: uppercase;display: block;font-weight: 700;">Reporting to</span>
															<span class="detail-value" style="text-transform: capitalize;color: #7d7d7e;font-size: 12px;font-weight: 500;">
																<a  href="<?php if(!empty($assignemp) && isset($assignemp)){ echo base_url(); ?>employee/view?I=<?php echo base64_encode($assignemp[0]['to_em_id']); ?><?php }else{ echo '#';} ?> " target="_blank" style="color: #7d7d7e;font-size: 12px;font-weight: 500;">
																	<?php 
																		if(!empty($assignemp) && isset($assignemp)){
																			echo $assignemp[0]['to_first_name'].' '.$assignemp[0]['to_last_name'];
																		}else{
																			echo '-';
																		}
																	?>
																</a>
															</span>
														</li>
														<li class="nav-item" style="border-right: none;padding-right: 50px;font-size: 11px;text-align: left;">
															<span class="detail-label" style="text-transform: uppercase;display: block;font-weight: 700;">Employee Number</span>
															<span class="detail-value detail-value-emp-no ng-binding" style="text-transform: capitalize;color: #7d7d7e;font-size: 12px;font-weight: 500;">
															<?php 
																$where = array('companyid'=>$this->session->userdata('company'));
																$companydata = $this->Alldata->DetailData('company_register',$where);
																$string = $companydata[0]['companyname'];
																$s = ucfirst($string);
																$bar = ucwords(strtolower($s));
																$employeecodename = preg_replace('/\s+/', '', $bar);
																$employeecodename = $employeecodename.'_';
																echo str_replace($employeecodename,"",$basic->em_code);
															?>
															</span>
														</li>
															
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Profile Header -->
						
                        <!--profile cover start-->
                        <div class="row">
                             <?php $degvalue = $this->employee_model->getdesignation(); ?>
							<?php $depvalue = $this->employee_model->getdepartment(); ?>
                           <?php /* <div class="col-lg-12">
                                <div class="cover-profile">
                                    <div class="profile-bg-img">
                                        <img class="profile-bg-img img-fluid" src="<?php echo base_url(); ?>assets\adminty\files\assets\images\user-profile\bg-img1.jpg" alt="bg-img">
                                        <div class="card-block user-info">
                                            <div class="col-md-12">
                                                <div class="media-left">
                                                    <a href="#" class="profile-image">
														<?php if(!empty($basic->em_image)){ ?><img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basic->em_image; ?>" class="user-img img-radius" alt="<?php echo $basic->first_name ?>" style="height: 150px; width: 150px;" />
														<?php } else { ?>
														<img src="<?php echo base_url(); ?>assets/images/users/user.png" class="user-img img-radius" width="150" alt="<?php echo $basic->first_name ?>" title="<?php echo $basic->first_name ?>"  style="height: 150px; width: 150px;background: #fff;"/>                                   
														<?php } ?>  
                                                       
                                                    </a>
                                                </div>
                                                <div class="media-body row">
                                                    <div class="col-lg-12">
                                                        <div class="user-title">
                                                            <h2><?php echo $basic->first_name .' '.$basic->last_name; ?></h2>
                                                            <?php /* <span class="text-white"><b>JOB TITLE</b> <br> Web designer</span> * ?>
															<ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
																
																<li class="nav-item" style="width: 160px;margin-right: 10px;">
																	<a class="nav-link"><span class="text-white"><b>JOB TITLE</b> <br> <p><?php echo $basic->des_name; ?></p></span></a>
																	
																</li>
																<li class="nav-item" style="width: 250px;margin-right: 10px;">
																	<a class="nav-link"><span class="text-white"><b>Email</b> <br> <p><?php echo $basic->em_email; ?></p></span></a>
																	
																</li>
																<li class="nav-item" style="width: 100px;margin-right: 10px;">
																	<a class="nav-link"><span class="text-white"><b>Phone</b> <br> <p>+91 <?php echo $basic->em_phone; ?></p></span></a>
																	
																</li>
																
															</ul>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <?php /* <div class="pull-right cover-btn">
                                                            <button type="button" class="btn btn-primary m-r-10 m-b-5"><i class="icofont icofont-plus"></i> Follow</button>
                                                            <button type="button" class="btn btn-primary"><i class="icofont icofont-ui-messaging"></i> Message</button>
                                                        </div> * ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  */ ?>
                        </div>
                        <!--profile cover end-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- tab header start -->
                                <div class="tab-header card">
                                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                        <li class="nav-item" style="width: calc(66% / 4);">
                                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
                                            <div class="slide" style="width: calc(66% / 4);"></div>
                                        </li>
                                       <?php /*  <li class="nav-item" style="width: calc(39% / 4);">
                                            <a class="nav-link" data-toggle="tab" href="#address" role="tab">Address</a>
                                            <div class="slide" style="width: calc(39% / 4);"></div>
                                        </li> */ ?>
                                        <li class="nav-item" style="width: calc(66% / 4);">
                                            <a class="nav-link" data-toggle="tab" href="#education" role="tab">Education</a>
                                            <div class="slide" style="width: calc(66% / 4);"></div>
                                        </li>
                                        <li class="nav-item" style="width: calc(66% / 4);">
                                            <a class="nav-link" data-toggle="tab" href="#experience" role="tab">Experience</a>
                                            <div class="slide" style="width: calc(66% / 4);"></div>
                                        </li>
										<?php  if(base64_encode($this->session->userdata('user_login_id')) == base64_encode($basic->em_id) || $this->session->userdata('user_type')=='ADMIN' || $this->session->userdata('user_type')=='SUPER ADMIN'){ 
										?>
                                        <li class="nav-item" style="width: calc(66% / 4);">
                                            <a class="nav-link" data-toggle="tab" href="#bankaccount" role="tab">Bank detail</a>
                                            <div class="slide" style="width: calc(66% / 4);"></div>
                                        </li>
										<?php } ?>
                                        <li class="nav-item" style="width: calc(66% / 4);">
                                            <a class="nav-link" data-toggle="tab" href="#document" role="tab">Document</a>
                                            <div class="slide" style="width: calc(66% / 4);"></div>
                                        </li>
										<?php  if(base64_encode($this->session->userdata('user_login_id')) == base64_encode($basic->em_id) || $this->session->userdata('user_type')=='ADMIN' || $this->session->userdata('user_type')=='SUPER ADMIN'){ 
										?>
                                         <li class="nav-item" style="width: calc(66% / 4);">
                                            <a class="nav-link" data-toggle="tab" href="#salary" role="tab">Salary</a>
                                            <div class="slide" style="width: calc(66% / 4);"></div>
                                        </li>
										<?php } ?>
                                       <?php /* <li class="nav-item" style="width: calc(39% / 4);">
                                            <a class="nav-link" data-toggle="tab" href="#leaveapp" role="tab">Leave</a>
                                            <div class="slide" style="width: calc(39% / 4);"></div>
                                        </li>
                                         <li class="nav-item" style="width: calc(39% / 4);">
                                            <a class="nav-link" data-toggle="tab" href="#socialmedia" role="tab">Social Media</a>
                                            <div class="slide" style="width: calc(39% / 4);"></div>
                                        </li> */ ?>
                                        <?php /* if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                                        <li class="nav-item" style="width: calc(52% / 4);">
                                            <a class="nav-link" data-toggle="tab" href="#epassword" role="tab">Change Password</a>
                                            <div class="slide" style="width: calc(39% / 4);"></div>
                                        </li>
                                        <?php } else { ?>
                                        <li class="nav-item" style="width: calc(52% / 4);">
                                            <a class="nav-link" data-toggle="tab" href="#password" role="tab">Change Password</a>
                                            <div class="slide" style="width: calc(39% / 4);"></div>
                                        </li>
                                        <?php } */?>
                                    </ul>
                                </div>
                                <!-- tab header end -->
                                <!-- tab content start -->
                                <div class="tab-content">
                                    <!-- tab panel personal start -->
                                    <div class="tab-pane active" id="personal" role="tabpanel">
                                        <!-- personal card start -->
										<?php
                                        if(!empty($this->session->flashdata('feedback'))){
                                     ?>
                                    <div class="alert alert-info background-info">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                                                    </button>
                                                                    <?php echo $this->session->flashdata('feedback'); ?>
                                                                </div>
                                                        <?php } //echo $this->session->flashdata('feedback'); ?>
                                        <div class="card">
                                            <div class="card-header">
                                                About <h5 class="card-header-text"> <?php echo $basic->first_name .' '.$basic->last_name; ?></h5>
												<?php  if(base64_encode($this->session->userdata('user_login_id')) == base64_encode($basic->em_id) || $this->session->userdata('user_type')=='ADMIN' || $this->session->userdata('user_type')=='SUPER ADMIN'){ 
													
												?>
                                                <button id="edit-btn" type="button" onclick="editpersonl()" class="btn btn-sm btn-primary waves-effect waves-light f-right">
													<i class="icofont icofont-edit"></i>
												</button>
												<?php } ?>
                                            </div>
                                            <div class="card-block">
                                                <div class="view-info">
													<div class="row" id="viewpersonldiv" >
														<div class="col-lg-12 col-xl-6">
                                                                       
                                                                        <div class="table-responsive">
                                                                            <table class="table m-0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th scope="row">Employee PIN</th>
                                                                                        <td><?php echo $basic->em_code; ?> </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Name </th>
                                                                                        <td><?php echo $basic->first_name.' '.$basic->last_name; ?></td>
                                                                                    </tr>
                                                                                   
                                                                                    <tr>
                                                                                        <th scope="row">Blood Group</th>
                                                                                        <td><?php echo $basic->em_blood_group; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Gender</th>
                                                                                        <td><?php echo $basic->em_gender; ?></td>
                                                                                    </tr>
                                                                                    <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>  <?php } else { ?> 
                                                                                    <tr>
                                                                                        <th scope="row">User Type</th>
                                                                                        <td><?php echo $basic->em_role; ?></td>
                                                                                    </tr>
                                                                                    <?php } ?>

                                                                                    <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>  <?php } else { ?> 
                                                                                    <tr>
                                                                                        <th scope="row">Status</th>
                                                                                        <td><?php echo $basic->status; ?></td>

                                                                                    </tr>
                                                                                      <?php } ?>
                                                                                      <tr>
                                                                                        <th scope="row">Date Of Birth</th>
                                                                                        <td><?php echo date("d-m-Y", strtotime($basic->em_birthday)); ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">NID Number</th>
                                                                                        <td><?php echo $basic->em_nid; ?></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end of table col-lg-6 -->
                                                                    <div class="col-lg-12 col-xl-6">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                             
                                                                                    
                                                                                    <tr>
                                                                                        <th scope="row">Contact Number</th>
                                                                                        <td><?php echo $basic->em_phone; ?></td>
                                                                                    </tr>
                                                                                     <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>  <?php } else { ?> 
                                                                                    <tr>
                                                                                        <th scope="row">Department</th>
                                                                                        <td><?php echo $basic->dep_name; ?></td>
                                                                                    </tr>
                                                                                    <?php } ?>
                                                                                     <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>  <?php } else { ?> 
                                                                                        <tr>
                                                                                           <th scope="row">Designation</th> 
                                                                                           <td><?php echo $basic->des_name; ?></td>
                                                                                        </tr>
                                                                                         <?php } ?>
                                                                                    <tr>
                                                                                        <th>Date Of Joining</th>
                                                                                        <td><?php echo date("d-m-Y", strtotime($basic->em_joining_date)); ?></td>
                                                                                    </tr>
                                                                                     <tr>
                                                                                        <th>Contract End Date</th>
                                                                                        <td><?php echo date("d-m-Y", strtotime($basic->em_contact_end)); ?> </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Email</th>
                                                                                        <td><?php echo $basic->em_email; ?> </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th> Image</th>
                                                                                        <td>
                                                                                            <?php if(!empty($basic->em_image)){ ?><img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basic->em_image; ?>" class="img-circle" width="100" />
                                    <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>assets/images/users/user.png" class="img-circle" width="150" alt="<?php echo $basic->first_name ?>" title="<?php echo $basic->first_name ?>"/>                                   
                                    <?php } ?>  
                                    <br>
                                                                                            </td>
                                                                                    </tr>
                                                                                    

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        
                                                                    </div>
													</div>
                                                    <div class="row" id="editpersonldiv" style="display: none;">
                                                        <div class="col-lg-12">
                                                            <div class="general-info">
                                                                <div class="row" id="editpersonlid">
																<form class="row" action="Update" method="post" enctype="multipart/form-data">
																<?php /* <form class="row" action="<?php echo base_url().'employee/Update'; ?>" method="post" enctype="multipart/form-data"> */ ?>
                                                                    <div class="col-lg-12 col-xl-6">
                                                                       
                                                                        <div class="table-responsive">
                                                                            <table class="table m-0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th scope="row">Employee PIN</th>
                                                                                        <td><input type="text" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line" placeholder="ID" name="eid" value="<?php echo $basic->em_code; ?>" required > </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">First Name </th>
                                                                                        <td><input type="text" class="form-control form-control-line" placeholder="Your first name" name="fname" value="<?php echo $basic->first_name; ?>" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> minlength="3" required></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Last Name</th>
                                                                                        <td><input type="text" id="" name="lname" class="form-control form-control-line" value="<?php echo $basic->last_name; ?>" placeholder="Your last name" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> minlength="3" required> </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Blood Group</th>
                                                                                        <td><select name="blood" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> value="<?php echo $basic->em_blood_group; ?>" class="form-control custom-select">
																								<option value="<?php echo $basic->em_blood_group; ?>"><?php echo $basic->em_blood_group; ?></option>
																								<option value="O+">O+</option>
																								<option value="O-">O-</option>
																								<option value="A+">A+</option>
																								<option value="A-">A-</option>
																								<option value="B+">B+</option>
																								<option value="B-">B-</option>
																								<option value="AB+">AB+</option>
																							</select></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Gender</th>
                                                                                        <td><select name="gender" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control custom-select">
                                                           
                                                            <option value="<?php echo $basic->em_gender; ?>"><?php echo $basic->em_gender; ?></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select></td>
                                                                                    </tr>
                                                                                    <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>  <?php } else { ?> 
                                                                                    <tr>
                                                                                        <th scope="row">User Type</th>
                                                                                        <td><select name="role" class="form-control custom-select" required >
                                                            <option value="<?php echo $basic->em_role; ?>"><?php echo $basic->em_role; ?></option>
                                                            <option value="HR">HR</option>
                                                            <option value="EMPLOYEE">Employee</option>
                                                            <option value="ADMIN">Super Admin</option>
                                                        </select></td>
                                                                                    </tr>
                                                                                    <?php } ?>

                                                                                    <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>  <?php } else { ?> 
                                                                                    <tr>
                                                                                        <th scope="row">Status</th>
                                                                                        <td><select name="status" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control custom-select" required >
                                                            <option value="<?php echo $basic->status; ?>"><?php echo $basic->status; ?></option>
                                                            <option value="ACTIVE">ACTIVE</option>
                                                            <option value="INACTIVE">INACTIVE</option>
                                                        </select></td>

                                                                                    </tr>
                                                                                      <?php } ?>
                                                                                      <tr>
                                                                                        <th scope="row">Date Of Birth</th>
                                                                                        <td><input type="date" id="example-email2" name="dob" class="form-control" placeholder="" value="<?php echo $basic->em_birthday; ?>" required> </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">NID Number</th>
                                                                                        <td><input type="text" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control"placeholder="NID Number" name="nid" value="<?php echo $basic->em_nid; ?>" minlength="10" required></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end of table col-lg-6 -->
                                                                    <div class="col-lg-12 col-xl-6">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                             
                                                                                    
                                                                                    <tr>
                                                                                        <th scope="row">Contact Number</th>
                                                                                        <td><input type="text" class="form-control" placeholder="" name="contact" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> value="<?php echo $basic->em_phone; ?>" minlength="10" maxlength="15" required></td>
                                                                                    </tr>
                                                                                     <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>  <?php } else { ?> 
                                                                                    <tr>
                                                                                        <th scope="row">Department</th>
                                                                                        <td><select name="dept" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control custom-select">
                                                            <option value="<?php echo $basic->id; ?>"><?php echo $basic->dep_name; ?></option>
                                            <?Php foreach($depvalue as $value): ?>
                                             <option value="<?php echo $value->id ?>"><?php echo $value->dep_name ?></option>
                                            <?php endforeach; ?>
                                                        </select></td>
                                                                                    </tr>
                                                                                    <?php } ?>
                                                                                     <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>  <?php } else { ?> 
                                                                                        <tr>
                                                                                           <th scope="row">Designation</th> 
                                                                                           <td><select name="deg" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control custom-select">
                                                            <option value="<?php echo $basic->id; ?>"><?php echo $basic->des_name; ?></option>
                                            <?Php foreach($degvalue as $value): ?>
                                            <option value="<?php echo $value->id ?>"><?php echo $value->des_name ?></option>
                                            <?php endforeach; ?>
                                                        </select></td>
                                                                                        </tr>
                                                                                         <?php } ?>
                                                                                    <tr>
                                                                                        <th>Date Of Joining</th>
                                                                                        <td><input type="date" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> id="example-email2" name="joindate" class="form-control" value="<?php echo $basic->em_joining_date; ?>" placeholder=""></td>
                                                                                    </tr>
                                                                                     <tr>
                                                                                        <th>Contract End Date</th>
                                                                                        <td><input type="date" id="example-email2" name="leavedate" class="form-control" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> value="<?php echo $basic->em_contact_end; ?>" placeholder=""> </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Email</th>
                                                                                        <td><input type="email" id="example-email2" name="email" class="form-control" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> value="<?php echo $basic->em_email; ?>" placeholder="email@mail.com" minlength="7" required> </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th> Image</th>
                                                                                        <td>
                                                                                            <?php if(!empty($basic->em_image)){ ?><img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basic->em_image; ?>" class="img-circle" width="100" />
                                    <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>assets/images/users/user.png" class="img-circle" width="150" alt="<?php echo $basic->first_name ?>" title="<?php echo $basic->first_name ?>"/>                                   
                                    <?php } ?>  
                                    <br>
                                                                                            <input type="file" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> name="image_url" class="form-control" value=""></td>
                                                                                    </tr>
                                                                                    

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                     <div class="text-center">
																		 <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20">Save</button>
                                                                        <a href="#" onclick='window.location.reload();' id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
                                                                    </div>
                                                                    </form>
                                                                    <!-- end of table col-lg-6 -->
                                                                </div>
                                                                <!-- end of row -->
                                                            </div>
                                                            <!-- end of general info -->
                                                        </div>
                                                        <!-- end of col-lg-12 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of view-info -->
                                                
                                                <!-- end of edit-info -->
                                            </div>
                                            <!-- end of card-block -->
                                        </div>
										
										
										<div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Address Information</h5>
                                            </div>
                                            <div class="card-block" >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card b-l-success business-info services m-b-20">
                                                            <div class="card-header">
                                                                <div class="service-header">
                                                                    <a href="#">
                                                                        <h5 class="card-header-text">Permanent Contact Information</h5>
                                                                    </a>
                                                                </div>
                                                                
                                                                <?php  if(base64_encode($this->session->userdata('user_login_id')) == base64_encode($basic->em_id) || $this->session->userdata('user_type')=='ADMIN' || $this->session->userdata('user_type')=='SUPER ADMIN'){ 
													
												?>
                                                <button id="addressinfo-btn" type="button" onclick="editaddressinfo()" class="btn btn-sm btn-primary waves-effect waves-light f-right">
													<i class="icofont icofont-edit"></i>
												</button>
												<?php } ?>
                                                            </div>
															<div class="card-block" id="addressviewdiv">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        
																			<div class="form-group col-md-12 m-t-5">
																				<label>Address :- </label>
																				<?php if(!empty($permanent->address)) echo $permanent->address  ?>
																			</div>
																			<div class="form-group col-md-6 m-t-5">
																				<label>City :- </label>
																				<?php if(!empty($permanent->city)) echo $permanent->city ?>
																			</div>
																			<div class="form-group col-md-6 m-t-5">
																				<label>Country :- </label>
																				<?php if(!empty($permanent->country)) echo $permanent->country ?>
																			</div>
																				<?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
																				<?php } else { ?>			                                    
																			
																			<?php } ?>			                                    
																		
                                                                    </div>
                                                                    <!-- end of col-sm-8 -->
                                                                </div>
                                                                <!-- end of row -->
                                                            </div>
                                                            <div class="card-block" id="addressinfoedit" style="display:none;">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <form class="row" action="Parmanent_Address" method="post" enctype="multipart/form-data">
																			<div class="form-group col-md-12 m-t-5">
																				<label>Address</label>
																				<textarea name="paraddress" value="<?php if(!empty($permanent->address)) echo $permanent->address  ?>" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control" rows="3" minlength="7" required><?php if(!empty($permanent->address)) echo $permanent->address  ?></textarea>
																			</div>
																			<div class="form-group col-md-6 m-t-5">
																				<label>City</label>
																				<input type="text" name="parcity" class="form-control form-control-line" placeholder="" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> value="<?php if(!empty($permanent->city)) echo $permanent->city ?>" minlength="2" required> 
																			</div>
																			<div class="form-group col-md-6 m-t-5">
																				<label>Country</label>
																				<input type="text" name="parcountry" class="form-control form-control-line" placeholder="" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> value="<?php if(!empty($permanent->country)) echo $permanent->country ?>" minlength="2" required> 
																			</div>
																				<?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
																				<?php } else { ?>			                                    
																			<div class="form-actions col-md-12">
																				<input type="hidden" name="emid" value="<?php echo $basic->em_id ?>">
																				<input type="hidden" name="id" value="<?php if(!empty($permanent->id)) echo $permanent->id  ?>">                                                    
																				<button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
																				<a href="#" onclick='window.location.reload();' id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
																			</div>
																			<?php } ?>			                                    
																		</form>
                                                                    </div>
                                                                    <!-- end of col-sm-8 -->
                                                                </div>
                                                                <!-- end of row -->
                                                            </div>
                                                            <!-- end of card-block -->
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="card b-l-info business-info services">
                                                            <div class="card-header">
                                                                <div class="service-header">
                                                                    <a href="#">
                                                                        <h5 class="card-header-text">Present Contact Information</h5>
                                                                    </a>
                                                                </div>
                                                                <?php  if(base64_encode($this->session->userdata('user_login_id')) == base64_encode($basic->em_id) || $this->session->userdata('user_type')=='ADMIN' || $this->session->userdata('user_type')=='SUPER ADMIN'){ 
													
												?>
                                                <button id="present-btn" type="button" onclick="editaddressresent()" class="btn btn-sm btn-primary waves-effect waves-light f-right">
													<i class="icofont icofont-edit"></i>
												</button>
												<?php } ?>
                                                            </div>
                                                            <div class="card-block" id="viewpresentdiv">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
																		<form class="row" action="Present_Address" method="post" enctype="multipart/form-data">			                                    
																			<div class="form-group col-md-12 m-t-5">
																				<label>Address :- </label>
																				<?php if(!empty($present->address)) echo $present->address;  ?>
																			</div>
																			<div class="form-group col-md-6 m-t-5">
																				<label>City :- </label>
																				<?php if(!empty($present->address)) echo $present->city;  ?>
																			</div>
																			<div class="form-group col-md-6 m-t-5">
																				<label>Country :- </label>
																				<?php if(!empty($present->address)) echo $present->country;  ?> 
																			</div>
																				
																		</form>
                                                                    </div>
                                                                    <!-- end of col-sm-8 -->
                                                                </div>
                                                                <!-- end of row -->
                                                            </div>
															
															<div class="card-block" id="editpresentdiv" style="display:none;">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
																		<form class="row" action="Present_Address" method="post" enctype="multipart/form-data">			                                    
																			<div class="form-group col-md-12 m-t-5">
																				<label>Address</label>
																				<textarea name="presaddress" value="<?php if(!empty($present->address)) echo $present->address  ?>" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control" rows="3" minlength="7" required><?php if(!empty($present->address)) echo $present->address  ?></textarea>
																			</div>
																			<div class="form-group col-md-6 m-t-5">
																				<label>City</label>
																				<input type="text" name="prescity" class="form-control form-control-line" value="<?php if(!empty($present->address)) echo $present->city  ?>" placeholder=" City name" minlength="2" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> required> 
																			</div>
																			<div class="form-group col-md-6 m-t-5">
																				<label>Country</label>
																				<input type="text" name="prescountry" class="form-control form-control-line" placeholder="" value="<?php if(!empty($present->address)) echo $present->country  ?>" minlength="2" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> required> 
																			</div>
																				<?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
																				<?php } else { ?>			                                    
																			<div class="form-actions col-md-12">
																				<input type="hidden" name="emid" value="<?php echo $basic->em_id ?>">
																				<input type="hidden" name="id" value="<?php if(!empty($present->id)) echo $present->id  ?>">
																				<button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
																				<a href="#" onclick='window.location.reload();' id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
																			</div>
																			<?php } ?>
																		</form>
                                                                    </div>
                                                                    <!-- end of col-sm-8 -->
                                                                </div>
                                                                <!-- end of row -->
                                                            </div>
                                                            <!-- end of card-block -->
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
										
										<div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Social Media</h5>
												<?php  if(base64_encode($this->session->userdata('user_login_id')) == base64_encode($basic->em_id) || $this->session->userdata('user_type')=='ADMIN' || $this->session->userdata('user_type')=='SUPER ADMIN'){ 
													
												?>
                                                <button id="socialmedia-btn" type="button" onclick="editsocialmedia()" class="btn btn-sm btn-primary waves-effect waves-light f-right">
													<i class="icofont icofont-edit"></i>
												</button>
												<?php } ?>
                                            </div>
											
                                            <div class="card-block" >
												
											<div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            
                                                            <div class="card-block contact-details" id="viewsocialmediadiv">
                                                                	<div class="form-group col-md-6 m-t-20">
																		<label>Facebook :- </label>
																		<a href="<?php if(!empty($socialmedia->facebook)) echo $socialmedia->facebook ?>" target="_blank"><?php if(!empty($socialmedia->facebook)) echo $socialmedia->facebook ?></a>
																	</div>
																	<div class="form-group col-md-6 m-t-20">
																		<label>Twitter :- </label>
																		<a href="<?php if(!empty($socialmedia->twitter)) echo $socialmedia->twitter ?>" target="_blank"><?php if(!empty($socialmedia->twitter)) echo $socialmedia->twitter ?></a>
																		
																	</div>
																	<div class="form-group col-md-6 m-t-20">
																		<label>Google + :-</label>
																		<a href="<?php if(!empty($socialmedia->google_plus)) echo $socialmedia->google_plus ?>" target="_blank"><?php if(!empty($socialmedia->google_plus)) echo $socialmedia->google_plus ?></a>
																		
																	</div>
																	<div class="form-group col-md-6 m-t-20">
																		<label>Skype :- </label>
																		<a href="<?php if(!empty($socialmedia->skype_id)) echo $socialmedia->skype_id ?>" target="_blank"><?php if(!empty($socialmedia->skype_id)) echo $socialmedia->skype_id ?></a>
																		
																	</div>
																
																
                                                            </div>
															<div class="card-block contact-details" id="editsocialmediadiv" style="display:none">
                                                                <form class="row" action="Save_Social" method="post" enctype="multipart/form-data">
																	<div class="form-group col-md-6 m-t-20">
																		<label>Facebook</label>
																		<input type="url" class="form-control" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> name="facebook" value="<?php if(!empty($socialmedia->facebook)) echo $socialmedia->facebook ?>" placeholder="www.facebook.com"> 
																	</div>
																	<div class="form-group col-md-6 m-t-20">
																		<label>Twitter</label>
																		<input type="text" class="form-control" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> name="twitter" value="<?php if(!empty($socialmedia->twitter)) echo $socialmedia->twitter ?>" > 
																	</div>
																	<div class="form-group col-md-6 m-t-20">
																		<label>Google +</label>
																		<input type="text" id="" name="google" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control " value="<?php if(!empty($socialmedia->google_plus)) echo $socialmedia->google_plus ?>"> 
																	</div>
																	<div class="form-group col-md-6 m-t-20">
																		<label>Skype</label>
																		<input type="text" id="" name="skype" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control " value="<?php if(!empty($socialmedia->skype_id)) echo $socialmedia->skype_id ?>"> 
																	</div>
																<?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
																	<?php } else { ?>
																	<div class="form-actions col-md-12">
																	<input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">                                                   
																	<input type="hidden" name="id" value="<?php if(!empty($socialmedia->id)) echo $socialmedia->id ?>">                                                   
																		<button type="submit" class="btn btn-info pull-right"> <i class="fa fa-check"></i> Save</button>
																	</div>
																	<?php } ?>
																</form>
                                                            </div>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
										
                                        <!-- personal card end-->
                                    </div>
                                    <!-- tab pane personal end -->
                                    <!-- tab pane info start -->
                                  
                                    <!-- tab pane info end -->
                                    <!-- tab pane contact start -->
                                    <div class="tab-pane" id="education" role="tabpanel">
                                        <div class="row">
                                            <div class="col-xl-3">
                                                <!-- user contact card left side start -->
												<!--	<div class="card">
                                                    <div class="card-header contact-user">
                                                        <img class="img-radius img-40" src="..\files\assets\images\avatar-4.jpg" alt="contact-user">
                                                        <h5 class="m-l-10">John Doe</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <ul class="list-group list-contacts">
                                                            <li class="list-group-item active"><a href="#">All Contacts</a></li>
                                                            <li class="list-group-item"><a href="#">Recent Contacts</a></li>
                                                            <li class="list-group-item"><a href="#">Favourite Contacts</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-block groups-contact">
                                                        <h4>Groups</h4>
                                                        <ul class="list-group">
                                                            <li class="list-group-item justify-content-between">
                                                                Project
                                                                <span class="badge badge-primary badge-pill">30</span>
                                                            </li>
                                                            <li class="list-group-item justify-content-between">
                                                                Notes
                                                                <span class="badge badge-success badge-pill">20</span>
                                                            </li>
                                                            <li class="list-group-item justify-content-between">
                                                                Activity
                                                                <span class="badge badge-info badge-pill">100</span>
                                                            </li>
                                                            <li class="list-group-item justify-content-between">
                                                                Schedule
                                                                <span class="badge badge-danger badge-pill">50</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> 
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Contacts<span class="f-15"> (100)</span></h4>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="connection-list">
                                                            <a href="#"><img class="img-fluid img-radius" src="..\files\assets\images\user-profile\follower\f-1.jpg" alt="f-1" data-toggle="tooltip" data-placement="top" data-original-title="Airi Satou">
                                                            </a>
                                                            <a href="#"><img class="img-fluid img-radius" src="..\files\assets\images\user-profile\follower\f-2.jpg" alt="f-2" data-toggle="tooltip" data-placement="top" data-original-title="Angelica Ramos">
                                                            </a>
                                                            <a href="#"><img class="img-fluid img-radius" src="..\files\assets\images\user-profile\follower\f-3.jpg" alt="f-3" data-toggle="tooltip" data-placement="top" data-original-title="Ashton Cox">
                                                            </a>
                                                            <a href="#"><img class="img-fluid img-radius" src="..\files\assets\images\user-profile\follower\f-4.jpg" alt="f-4" data-toggle="tooltip" data-placement="top" data-original-title="Cara Stevens">
                                                            </a>
                                                            <a href="#"><img class="img-fluid img-radius" src="..\files\assets\images\user-profile\follower\f-5.jpg" alt="f-5" data-toggle="tooltip" data-placement="top" data-original-title="Garrett Winters">
                                                            </a>
                                                            <a href="#"><img class="img-fluid img-radius" src="..\files\assets\images\user-profile\follower\f-1.jpg" alt="f-6" data-toggle="tooltip" data-placement="top" data-original-title="Cedric Kelly">
                                                            </a>
                                                            <a href="#"><img class="img-fluid img-radius" src="..\files\assets\images\user-profile\follower\f-3.jpg" alt="f-7" data-toggle="tooltip" data-placement="top" data-original-title="Brielle Williamson">
                                                            </a>
                                                            <a href="#"><img class="img-fluid img-radius" src="..\files\assets\images\user-profile\follower\f-5.jpg" alt="f-8" data-toggle="tooltip" data-placement="top" data-original-title="Jena Gaines">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>-->
                                                <!-- user contact card left side end -->
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Contacts</h5>
                                                            </div>
                                                            <div class="card-block contact-details">
                                                                <div class="data_table_main table-responsive dt-responsive">
                                                                    <table id="simpletable" class="table  table-striped table-bordered nowrap">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID </th>
																				<th>Certificate name</th>
																				<th>Institute </th>
																				<th>Result </th>
																				<th>year</th>
																				<?php  if(base64_encode($this->session->userdata('user_login_id')) == base64_encode($basic->em_id) || $this->session->userdata('user_type')=='ADMIN' || $this->session->userdata('user_type')=='SUPER ADMIN'){ 
																				?>
																				<th>Action</th>
																				<?php } ?>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($education as $value): ?>
																			<tr>
																				<td><?php echo $value->id ?></td>
																				<td><?php echo $value->edu_type ?></td>
																				<td><?php echo $value->institute ?></td>
																				<td><?php echo $value->result ?></td>
																				<td><?php echo $value->year ?></td>
																			   <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
																								<?php } else { ?>
																				<td class="jsgrid-align-center ">
																					<a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light education" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
																					<a onclick="confirm('Are you sure want to delet this Value?')" href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light edudelet"  data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
																				</td>
																				<?php } ?>
																			</tr>
																			<?php endforeach; ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>ID </th>
																				<th>Certificate name</th>
																				<th>Institute </th>
																				<th>Result </th>
																				<th>year</th>
																				<?php  if(base64_encode($this->session->userdata('user_login_id')) == base64_encode($basic->em_id) || $this->session->userdata('user_type')=='ADMIN' || $this->session->userdata('user_type')=='SUPER ADMIN'){ 
																				?>
																				<th>Action</th>
																				<?php } ?>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>
											<?php  if(base64_encode($this->session->userdata('user_login_id')) == base64_encode($basic->em_id) || $this->session->userdata('user_type')=='ADMIN' || $this->session->userdata('user_type')=='SUPER ADMIN'){ 
																				?>
											<div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Contacts</h5>
                                                            </div>
                                                            <div class="card-block contact-details">
                                                                <form class="row" action="Add_Education" method="post" enctype="multipart/form-data" id="insert_education">
																	<span id="error"></span>
																	<div class="form-group col-md-6 m-t-5">
																		<label>Degree Name</label>
																		<input type="text" name="name" class="form-control form-control-line" placeholder=" Degree Name" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> minlength="1" required> 
																	</div>
																	<div class="form-group col-md-6 m-t-5">
																		<label>Institute name</label>
																		<input type="text" name="institute" class="form-control form-control-line" placeholder=" Institute name" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> minlength="3" required> 
																	</div>
																	<div class="form-group col-md-6 m-t-5">
																		<label>Result</label>
																		<input type="text" name="result" class="form-control form-control-line" placeholder=" Result" minlength="2" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> required> 
																	</div>
																	<div class="form-group col-md-6 m-t-5">
																		<label>Passing Year</label>
																		<input type="text" name="year" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line" placeholder="Passing Year"> 
																	</div>
																  <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
																		<?php } else { ?>
																	<div class="form-actions col-md-6">
																		<input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
																		<button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
																	</div>
																	<?php } ?>
																</form>
                                                            </div>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>
											<?php } ?>
											
                                        </div>
                                    </div>
                                    <!-- tab pane contact end -->
                                    <div class="tab-pane" id="experience" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Experience</h5>
                                            </div>
                                            <div class="card-block">
												<div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Experience Details</h5>
                                                            </div>
                                                            <div class="card-block contact-details">
                                                                <div class="data_table_main table-responsive dt-responsive">
                                                                    <table id="simpletable1	" class="table  table-striped table-bordered nowrap">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID </th>
																				<th>Company name</th>
																				<th>Position </th>
																				<th>Work Duration </th>
																				<?php  if(base64_encode($this->session->userdata('user_login_id')) == base64_encode($basic->em_id) || $this->session->userdata('user_type')=='ADMIN' || $this->session->userdata('user_type')=='SUPER ADMIN'){ 
																				?>
																				<th>Action</th>
																				<?php } ?>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($experience as $value): ?>
																			<tr>
																				<td><?php echo $value->id ?></td>
																				<td><?php echo $value->exp_company ?></td>
																				<td><?php echo $value->exp_com_position ?></td>
																				<td><?php echo $value->exp_workduration ?></td>
																				  <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
																				   <?php } else { ?>
																				<td class="jsgrid-align-center ">
																				 
																					<a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light experience" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
																					<a onclick="confirm('Are you sure want to delet this Value?')" href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light deletexp" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
																					
																				</td>
																				<?php } ?>
																			</tr>
																			<?php endforeach; ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>ID </th>
																				<th>Company name</th>
																				<th>Position </th>
																				<th>Work Duration </th>
																				<?php  if(base64_encode($this->session->userdata('user_login_id')) == base64_encode($basic->em_id) || $this->session->userdata('user_type')=='ADMIN' || $this->session->userdata('user_type')=='SUPER ADMIN'){ 
																				?>
																				<th>Action</th>
																				<?php } ?>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>
											<?php  if(base64_encode($this->session->userdata('user_login_id')) == base64_encode($basic->em_id) || $this->session->userdata('user_type')=='ADMIN' || $this->session->userdata('user_type')=='SUPER ADMIN'){ 
																				?>
											<div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Add Experience</h5>
                                                            </div>
                                                            <div class="card-block contact-details">
                                                                <form class="row" action="Add_Experience" method="post" enctype="multipart/form-data">
																		<div class="form-group col-md-6 m-t-5">
																			<label> Company Name</label>
																			<input type="text" name="company_name" class="form-control form-control-line company_name" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> placeholder="Company Name" minlength="2" required> 
																		</div>
																		<div class="form-group col-md-6 m-t-5">
																			<label>Position</label>
																			<input type="text" name="position_name" class="form-control form-control-line position_name" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> placeholder="Position" minlength="3" required> 
																		</div>
																		<div class="form-group col-md-6 m-t-5">
																			<label>Address</label>
																			<input type="text" name="address" class="form-control form-control-line duty" placeholder=" Duty" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> minlength="7" required> 
																		</div>
																		<div class="form-group col-md-6 m-t-5">
																			<label>Working Duration</label>
																			<input type="text" name="work_duration" class="form-control form-control-line working_period" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> placeholder="Working Duration" required> 
																		</div>
																 <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
																		<?php } else { ?>
																	<div class="form-actions col-md-12">
																		<input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">                                                
																		<button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
																	</div>
																	<?php } ?>
																</form>
                                                            </div>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>
											<?php } ?>
                                            </div>
                                        </div>
                                    </div>
									
									<!-- tab pane contact end -->
                                    <div class="tab-pane" id="bankaccount" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Bank Account</h5>
                                            </div>
                                            <div class="card-block">
												
											<div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                           
                                                            <div class="card-block contact-details">
                                                                <form class="row" action="Add_bank_info" method="post" enctype="multipart/form-data">
																	<div class="form-group col-md-6 m-t-5">
																		<label> Bank Holder Name</label>
																		<input type="text" name="holder_name" value="<?php if(!empty($bankinfo->holder_name)) echo $bankinfo->holder_name  ?>" class="form-control form-control-line" placeholder="Bank Holder Name" minlength="5" required> 
																	</div>
																	<div class="form-group col-md-6 m-t-5">
																		<label>Bank Name</label>
																		<input type="text" name="bank_name" value="<?php if(!empty($bankinfo->bank_name)) echo $bankinfo->bank_name  ?>" class="form-control form-control-line" placeholder="Bank Name" minlength="5" required> 
																	</div>
																	<div class="form-group col-md-6 m-t-5">
																		<label>Branch Name</label>
																		<input type="text" name="branch_name" value="<?php if(!empty($bankinfo->branch_name)) echo $bankinfo->branch_name  ?>" class="form-control form-control-line" placeholder=" Branch Name"> 
																	</div>
																	<div class="form-group col-md-6 m-t-5">
																		<label>Bank Account Number</label>
																		<input type="text" name="account_number" value="<?php if(!empty($bankinfo->account_number)) echo $bankinfo->account_number ?>" class="form-control form-control-line" minlength="5" required> 
																	</div>
																	<div class="form-group col-md-6 m-t-5">
																		<label>Bank Account Type</label>
																		<input type="text" name="account_type" value="<?php if(!empty($bankinfo->account_type)) echo $bankinfo->account_type ?>" class="form-control form-control-line" placeholder="Bank Account Type"> 
																	</div>
																	<div class="form-actions col-md-12">
																		<input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
																		<input type="hidden" name="id" value="<?php if(!empty($bankinfo->id)) echo $bankinfo->id  ?>">
																		<button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
																	</div>
																</form>
                                                            </div>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="tab-pane" id="document" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Document</h5>
                                            </div>
                                            <div class="card-block">
												<div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Document Details</h5>
                                                            </div>
                                                            <div class="card-block contact-details">
                                                                <div class="data_table_main table-responsive dt-responsive">
                                                                    <table id="simpletable1	" class="table  table-striped table-bordered nowrap">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID </th>
																				<th>File Title</th>
																				<th>File </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($fileinfo as $value): ?>
																			<tr>
																				<td><?php echo $value->id ?></td>
																				<td><?php echo $value->file_title ?></td>
																				<td><a href="<?php echo base_url(); ?>assets/images/users/<?php echo $value->file_url ?>" target="_blank"><?php echo $value->file_url ?></a></td>
																			</tr>
																			<?php endforeach; ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>ID </th>
																				<th>File Title</th>
																				<th>File </th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Add Document</h5>
                                                            </div>
                                                            <div class="card-block contact-details">
                                                                <form class="row" action="Add_File" method="post" enctype="multipart/form-data">
																	<div class="form-group col-md-6 m-t-5">
																		<label class="">File Title</label>
																		<input type="text" name="title" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control" required="" aria-invalid="false" minlength="5" required>
																	</div>
																	<div class="form-group col-md-6 m-t-5">
																		<label class="">File</label>
																		<input type="file" name="file_url" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control" required="" aria-invalid="false" required>
																	</div>
																	<?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
																			<?php } else { ?>
																	<div class="form-group">
																		<div class="col-sm-12">
																			<input type="hidden" name="em_id" value="<?php echo $basic->em_id; ?>">                                                   
																			<button type="submit" class="btn btn-success">Add File</button>
																		</div>
																	</div>
																	<?php } ?>
																</form>
                                                            </div>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="tab-pane" id="salary" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Basic Slary</h5>
                                            </div>
                                            <div class="card-block">
												
												<div class="col-xl-12">
													<div class="row">
														<div class="col-sm-12">
															<!-- contact data table card start -->
															<div class="card">
															   
																<div class="card-block contact-details">
																	<form action="Add_Salary" method="post" enctype="multipart/form-data">
																		<div class="row">
																			<div class="form-group col-md-6 m-t-5">
																				<label class="control-label">Salary Type</label>
																				<select class="form-control <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> custom-select" data-placeholder="Choose a Category" tabindex="1" name="typeid" required>
																				   <?php if(empty($salaryvalue->salary_type)){ ?>
																					<?php } else { ?>
																					<option value="<?php echo $salaryvalue->id; ?>"><?php echo $salaryvalue->salary_type; ?></option>                         <?php } ?>                                      
																				   <?php foreach($typevalue as $value): ?>
																					<option value="<?php echo $value->id; ?>"><?php echo $value->salary_type; ?></option>
																					<?php endforeach; ?>
																				</select>
																			</div> 
																			<div class="form-group col-md-6 m-t-5">
																				<label>Total Salary</label>
																				<input type="text" name="total" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line total" placeholder="total salary" value="<?php if(!empty($salaryvalue->total)) echo $salaryvalue->total ?>" minlength="3" required> 
																			</div>
																		</div>
													 
																		<h5 class="card-title">Addition</h5>
																		<div class="row">
																			<div class="form-group col-md-6 m-t-5">
																				<label>Basic</label>
																				<input type="text" name="basic" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line basic" placeholder="Basic..." value="<?php if(!empty($salaryvalue->basic)) echo $salaryvalue->basic ?>" > 
																			</div> 
																			<div class="form-group col-md-6 m-t-5">
																				<label>House Rent</label>
																				<input type="text" name="houserent" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line houserent" placeholder="medical..." value="<?php if(!empty($salaryvalue->house_rent)) echo $salaryvalue->house_rent ?>" > 
																			</div> 
																			<div class="form-group col-md-6 m-t-5">
																				<label>Medical</label>
																				<input type="text" name="medical" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line medical" placeholder="medical..." value="<?php if(!empty($salaryvalue->medical)) echo $salaryvalue->medical ?>" > 
																			</div> 
																			<div class="form-group col-md-6 m-t-5">
																				<label>Conveyance</label>
																				<input type="text" name="conveyance" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line conveyance" placeholder="conveyance..." value="<?php if(!empty($salaryvalue->conveyance)) echo $salaryvalue->conveyance ?>" > 
																			</div>
																		</div>
													
																		<h5 class="card-title">Deduction</h5>
																		<div class="row">
																			<div class="form-group col-md-6 m-t-5">
																				<label>Bima</label>
																				<input type="text" name="bima" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line" placeholder="bima..." value="<?php if(!empty($salaryvalue->bima)) echo $salaryvalue->bima ?>"> 
																			</div>
																			<div class="form-group col-md-6 m-t-5">
																				<label>Tax</label>
																				<input type="text" name="tax" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line" placeholder="tax..." value="<?php if(!empty($salaryvalue->tax)) echo $salaryvalue->tax ?>" > 
																			</div>
																			<div class="form-group col-md-6 m-t-5">
																				<label>Provident Fund</label>
																				<input type="text" name="provident" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line" placeholder="Provident..." value="<?php if(!empty($salaryvalue->provident_fund)) echo $salaryvalue->provident_fund ?>"> 
																			</div>
																			<div class="form-group col-md-6 m-t-5">
																				<label>Others</label>
																				<input type="text" name="others" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="form-control form-control-line" placeholder="others..." value="<?php if(!empty($salaryvalue->others)) echo $salaryvalue->others ?>"> 
																			</div>
																		</div>
																		<?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
																		<?php } else { ?>
																		<div class="form-group">
																			<div class="col-sm-12">
																				<input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>"> 
																				<?php if(!empty($salaryvalue->salary_id)){ ?>    
																				<input type="hidden" name="sid" value="<?php echo $salaryvalue->salary_id; ?>">                                               <?php } ?> 
																				<?php if(!empty($salaryvalue->addi_id)){ ?>    
																				<input type="hidden" name="aid" value="<?php echo $salaryvalue->addi_id; ?>">                                                  <?php } ?> 
																				<?php if(!empty($salaryvalue->de_id)){ ?>
																				<input type="hidden" name="did" value="<?php echo $salaryvalue->de_id; ?>">
																				<?php } ?>                                                   
																				<button <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> disabled <?php } ?> type="submit" style="float: right" class="btn btn-success">Add Salary</button>
																			</div>
																			<?php } ?>
																		</div>                                                		                                    
																	</form>
																</div>
															</div>
															<!-- contact data table card end -->
														</div>
													</div>
												</div>
                                            </div>
                                        </div>
                                    </div>
								<?php /*	<div class="tab-pane" id="leaveapp" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Leave</h5>
                                            </div>
                                            <div class="card-block">
											<div class="row">
												<div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Leave Details</h5>
                                                            </div>
                                                            <div class="card-block contact-details">
                                                                <div class="data_table_main table-responsive dt-responsive">
                                                                    <table id="simpletable1	" class="table  table-striped table-bordered nowrap">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Type</th>
																				<th>Dayout/Day</th> 
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
																			if(!empty($Leaveinfo)){
																			foreach($Leaveinfo as $value): ?>
																			<tr>
																				<td><?php echo $value->name; ?></td>
																				<td><?php echo $value->total_day; ?>/<?php echo $value->day; ?></td>
																			</tr>
																			<?php endforeach; }?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>Type</th>
																				<th>Dayout/Day</th> 
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-xl-6">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Add Leave</h5>
                                                            </div>
                                                            <div class="card-block contact-details">
                                                                <form action="Assign_leave" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                <label class="">Leave Type</label>                                 
                                                 <select name="typeid" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> class="select2 form-control custom-select" style="width: 100%" id="" required>
                                                  <option value="">Select Here...</option>
                                                   <?php foreach($leavetypes as $value): ?>
                                                    <option value="<?php echo $value->type_id ?>"><?php echo $value->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>          
                                                </div>
			                                 <div class="form-group">
			                                    	<label>day</label>
			                                    	<input type="number" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> readonly <?php } ?> name="noday" class="form-control form-control-line noday" placeholder="Leave Day" required> 
			                                 </div>

                                                <div class="form-group">
                                                <label class="">Year</label>                                 <select name="year" class="select2 form-control custom-select" style="width: 100%" id="" required>
                                                 <option value="">Select Here...</option>
                                                  <?php 
                                                   for ($x = 2016; $x < 3000; $x++){
                                                    echo '<option value='.$x.'>'.$x.'</option>';            
                                                   }
                                                    ?>
                                                </select>          
                                                </div>
                                                <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                                                    <?php } else { ?>                 
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="em_id" value="<?php echo $basic->em_id; ?>">                                                   
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>                                                                     <?php } ?>         
                                            </form>
                                                            </div>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>
											</div>
                                            </div>
                                        </div>
                                    </div>  */ ?>
									
								<?php /*	<div class="tab-pane" id="epassword" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Change Password</h5>
                                            </div>
                                            <div class="card-block">
												
											<div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            
                                                            <div class="card-block contact-details">
                                                                <form class="row" action="Reset_Password" method="post" enctype="multipart/form-data">
																	<div class="form-group col-md-6 m-t-20">
																		<label>Old Password</label>
																		<input type="text" class="form-control" name="old" value="" placeholder="old password" required minlength="6"> 
																	</div>
																	<div class="form-group col-md-6 m-t-20">
																		<label>Password</label>
																		<input type="text" class="form-control" name="new1" value="" required minlength="6"> 
																	</div>
																	<div class="form-group col-md-6 m-t-20">
																		<label>Confirm Password</label>
																		<input type="text" id="" name="new2" class="form-control " required minlength="6"> 
																	</div>
																	<div class="form-actions col-md-12">
																	<input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">                                                   
																		<button type="submit" class="btn btn-info pull-right"> <i class="fa fa-check"></i> Save</button>
																	</div>
																</form>
                                                            </div>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="tab-pane" id="password" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Change Password</h5>
                                            </div>
                                            <div class="card-block">
												
											<div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- contact data table card start -->
                                                        <div class="card">
                                                            
                                                            <div class="card-block contact-details">
                                                                <form class="row" action="Reset_Password_Hr" method="post" enctype="multipart/form-data">
																	<div class="form-group col-md-6 m-t-20">
																		<label>Password</label>
																		<input type="text" class="form-control" name="new1" value="" required minlength="6"> 
																	</div>
																	<div class="form-group col-md-6 m-t-20">
																		<label>Confirm Password</label>
																		<input type="text" id="" name="new2" class="form-control " required minlength="6"> 
																	</div>
																	<?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
																	<?php } else { ?>
																	<div class="form-actions col-md-12">
																	<input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">                                                   
																		<button type="submit" class="btn btn-info pull-right"> <i class="fa fa-check"></i> Save</button>
																	</div>
																	<?php } ?>
																</form>
                                                            </div>
                                                        </div>
                                                        <!-- contact data table card end -->
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div> */ ?>
								</div>
                                <!-- tab content end -->
                            </div>
                        </div>
                    </div>
                    <!-- Page-body end -->
                </div>
            </div>
            <!-- Main body end -->
            
        </div>
    </div>
</div>
<script type="text/javascript">
          $('.total').on('input',function() {
            var amount = parseInt($('.total').val());
            $('.basic').val((amount * .50 ? amount * .50 : 0).toFixed(2));
            $('.houserent').val((amount * .40 ? amount * .40 : 0).toFixed(2));
            $('.medical').val((amount * .05 ? amount * .05 : 0).toFixed(2));
            $('.conveyance').val((amount * .05 ? amount * .05 : 0).toFixed(2));
          });
          </script>
<?php $this->load->view('backend/em_modal'); ?> 
<?php $this->load->view('backend/footer'); ?>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".education").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#educationmodal').trigger("reset");
                                                $('#EduModal').modal('show');
                                                $.ajax({
                                                    url: 'educationbyib?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#educationmodal').find('[name="id"]').val(response.educationvalue.id).end();
                                                    $('#educationmodal').find('[name="name"]').val(response.educationvalue.edu_type).end();
                                                    $('#educationmodal').find('[name="institute"]').val(response.educationvalue.institute).end();
                                                    $('#educationmodal').find('[name="result"]').val(response.educationvalue.result).end();
                                                    $('#educationmodal').find('[name="year"]').val(response.educationvalue.year).end();
                                                    $('#educationmodal').find('[name="emid"]').val(response.educationvalue.emp_id).end();
												});
                                            });
                                        });
</script>                
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".experience").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#experiencemodal').trigger("reset");
                                                $('#ExpModal').modal('show');
                                                $.ajax({
                                                    url: 'experiencebyib?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#experiencemodal').find('[name="id"]').val(response.expvalue.id).end();
                                                    $('#experiencemodal').find('[name="company_name"]').val(response.expvalue.exp_company).end();
                                                    $('#experiencemodal').find('[name="position_name"]').val(response.expvalue.exp_com_position).end();
                                                    $('#experiencemodal').find('[name="address"]').val(response.expvalue.exp_com_address).end();
                                                    $('#experiencemodal').find('[name="work_duration"]').val(response.expvalue.exp_workduration).end();
                                                    $('#experiencemodal').find('[name="emid"]').val(response.expvalue.emp_id).end();
												});
                                            });
                                        });
</script>                
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".deletexp").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $.ajax({
                                                    url: 'EXPvalueDelet?id=' + iid,
                                                    method: 'GET',
                                                    data: 'data',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                                                    window.setTimeout(function(){location.reload()},2000)
                                                    // Populate the form fields with the data returned from server
												});
                                            });
                                        });
</script>                 
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".edudelet").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $.ajax({
                                                    url: 'EduvalueDelet?id=' + iid,
                                                    method: 'GET',
                                                    data: 'data',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                                                    window.setTimeout(function(){location.reload()},2000)
                                                    // Populate the form fields with the data returned from server
												});
                                            });
                                        });
</script>
<script>
function editpersonl() {
  var x = document.getElementById("editpersonldiv");
  var y = document.getElementById("viewpersonldiv");
  var z = document.getElementById("edit-btn");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";
  } else {
    x.style.display = "none";
	y.style.display = "block";
	z.style.display = "block";
	
  }
}

function editaddressinfo() {
  var x = document.getElementById("addressinfoedit");
  var y = document.getElementById("addressviewdiv");
  var z = document.getElementById("addressinfo-btn");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";
  } else {
    x.style.display = "none";
	y.style.display = "block";
	z.style.display = "block";
	
  }
}

function editaddressresent() {
  var x = document.getElementById("editpresentdiv");
  var y = document.getElementById("viewpresentdiv");
  var z = document.getElementById("present-btn");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";
  } else {
    x.style.display = "none";
	y.style.display = "block";
	z.style.display = "block";
	
  }
}

function editsocialmedia() {
  var x = document.getElementById("editsocialmediadiv");
  var y = document.getElementById("viewsocialmediadiv");
  var z = document.getElementById("socialmedia-btn");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";
  } else {
    x.style.display = "none";
	y.style.display = "block";
	z.style.display = "block";
	
  }
}
</script>                
