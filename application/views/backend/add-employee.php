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
                                                        <h4>Employee</h4>
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
														<li class="breadcrumb-item">
                                                            <a href="<?php echo base_url(); ?>"> Employee </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">Add Employee</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->
									<div class="page-body">
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- Basic Inputs Validation start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Add New Employee</h5>
                                                        
                                                    </div>
                                                    <div class="card-block">
														<?php echo validation_errors(); ?>
													   <?php echo $this->upload->display_errors(); ?>
													   
													   <?php echo $this->session->flashdata('formdata'); ?>
													   <?php echo $this->session->flashdata('feedback'); ?>

														
                                                        <form id="form_validation" action="Save" enctype="multipart/form-data" method="POST" novalidate="">
                                                              
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">First Name</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="fname"  minlength="2" required>
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Last Name</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="lname"  minlength="2" required>
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Employee Code</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="eid" readonly value="<?php echo $newemployeecode; ?>"  required>
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Department</label>
                                                                <div class="col-sm-8">
                                                                    <select name="dept" value="" class="form-control" required>
																		<option>Select Department</option>
																		<?Php foreach($depvalue as $value): ?>
																		 <option value="<?php echo $value['id']; ?>"><?php echo $value['dep_name']; ?></option>
																		<?php endforeach; ?>
																	</select>
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Designation</label>
                                                                <div class="col-sm-8">
                                                                    <select name="deg" class="form-control" required>
																		<option>Select Designation</option>
																		<?Php foreach($degvalue as $value): ?>
																		<option value="<?php echo $value['id']; ?>"><?php echo $value['des_name']; ?></option>
																		<?php endforeach; ?>
																	</select>
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div><div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Role</label>
                                                                <div class="col-sm-8">
                                                                    <select name="role" class="form-control" required>
																		<option>Select Roll</option>
																		<option value="ADMIN">ADMIN</option>
																		<option value="EMPLOYEE">Employee</option>
																		<option value="SUPER ADMIN">Super Admin</option>
																	</select>
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Gender</label>
                                                                <div class="col-sm-8">
                                                                    <select name="gender" class="form-control" required>
																		<option>Select Gender</option>
																		<option value="MALE">Male</option>
																		<option value="FEMALE">Female</option>
																	</select>
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Blood Group</label>
                                                                <div class="col-sm-8">
                                                                    <select name="blood" class="form-control custom-select">
																		<option>Select Blood Group</option>
																		<option value="O+">O+</option>
																		<option value="O-">O-</option>
																		<option value="A+">A+</option>
																		<option value="A-">A-</option>
																		<option value="B+">B+</option>
																		<option value="B-">B-</option>
																		<option value="AB+">AB+</option>
																		<option value="AB-">AB-</option>
																	</select>
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">NID</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="nid" class="form-control" value=""  minlength="10" required> 
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Contact Number </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="contact" class="form-control" value=""  minlength="10" maxlength="15" required> 
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Date Of Birth</label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" name="dob" id="example-email2" name="example-email" class="form-control"  required> 
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Date Of Joining</label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" name="joindate" id="example-email2" name="example-email" class="form-control" > 
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Contract End Date </label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" name="leavedate" id="example-email2" name="example-email" class="form-control" > 
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Username</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="username" class="form-control form-control-line" value="" > 
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Email</label>
                                                                <div class="col-sm-8">
                                                                    <input type="email" id="example-email2" name="email" class="form-control"  minlength="7" required > 
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Image</label>
                                                                <div class="col-sm-8">
                                                                    <input type="file" name="image_url" class="form-control" value="">
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2"></label>
                                                                <div class="col-sm-10">
                                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- Basic Inputs Validation end -->
                    
                </div>
				
					
            </div>
         </div>
		 </div>
		 </div>
		 </div>
		 
            
                   
                
    <?php $this->load->view('backend/footer'); ?>