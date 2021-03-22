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
														<li class="breadcrumb-item">
                                                            <a href="<?php echo base_url(); ?>"> Attendance </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">Add Attendance</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Attendance" class="text-white"><i class="" aria-hidden="true"></i>  Attendance List</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>leave/Application" class="text-white"><i class="" aria-hidden="true"></i>  Leave Application</a></button>
                    </div>
                                    </div>
                                    <!-- Page-header end -->
									<div class="page-body">

			<div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<!-- Basic Inputs Validation start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Add Attendance</h5>
                                                        
                                                    </div>
                                                    <div class="card-block">
														<?php echo validation_errors(); ?>
													   <?php echo $this->upload->display_errors(); ?>
													   
													   <?php echo $this->session->flashdata('formdata'); ?>
													   <?php echo $this->session->flashdata('feedback'); ?>

														<form method="post" action="Add_Attendance" id="holidayform" enctype="multipart/form-data">
                                                        <!-- <form id="form_validation" action="Save" enctype="multipart/form-data" method="POST" novalidate=""> -->
                                                              
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Employee</label>
                                                                <div class="col-sm-8">
                                                                     <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="emid" required>
                                                   
                                                   <?php if(!empty($attval->em_code)){ ?>
                                                    <option value="<?php echo $attval->em_code ?>"><?php echo $attval->first_name.' '.$attval->last_name ?></option>           
                                                   <?php } else { ?>
                                                   <option value="#">Select Here</option>
                                                    <?php foreach($employee as $value): ?>
                                                    <option value="<?php echo $value->em_code ?>"><?php echo $value->first_name.' '.$value->last_name ?></option>
                                                    <?php endforeach; ?>
                                                    <?php } ?>
                                                </select>
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Select Date</label>
                                                                <div class="col-sm-8">
                                                                   <input name="attdate" class="form-control mydatetimepickerFull" value="<?php if(!empty($attval->atten_date)) { 
                                                $old_date_timestamp = strtotime($attval->atten_date);
                                                $new_date = date('Y-m-d', $old_date_timestamp);    
                                                echo $new_date; } ?>" required> <input type="text" class="form-control" name="lname"  minlength="2" required>
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Sign In Time</label>
                                                                <div class="col-sm-8">
                                                                     <input class="form-control" name="signin" id="single-input" value="<?php if(!empty($attval->signin_time)) { echo  $attval->signin_time;} ?>" placeholder="Now" required>
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Sign Out Time</label>
                                                                <div class="col-sm-8">
                                                                     <input type="text" name="signout" class="form-control" value="<?php if(!empty($attval->signout_time)) { echo  $attval->signout_time;} ?>">
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Place</label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-control custom-select" data-placeholder="" tabindex="1" name="place" required>
                                                    <option value="office" <?php if(isset($attval->place) && $attval->place == "office") { echo "selected"; } ?>>Office</option>
                                                    <option value="field"  <?php if(isset($attval->place) && $attval->place == "field") { echo "selected"; } ?>>Field</option>
                                                </select>
                                                                    <span class="messages"></span>
																	
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2"></label>
                                                                <div class="col-sm-10">
                                                                    <input type="hidden" name="id" value="<?php if(!empty($attval->id)){ echo  $attval->id;} ?>" class="form-control" id="recipient-name1">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" id="attendanceUpdate" class="btn btn-primary">Submit</button>
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