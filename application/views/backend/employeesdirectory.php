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
                                                        <li class="breadcrumb-item"><a href="#!">Employee</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
											
                                        </div>
                                    </div>
                                    <!-- Page-header end -->
									<div class="page-body">
			<div class="row clearfix">
                
				
					
						 <!-- user start -->
						 <?php 
							if(!empty($employee)){
								foreach($employee as $employeeobj){
						 ?>
                                            <div class="col-xl-6 col-md-12">
                                                <div class="card user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-sm-5 bg-c-lite-green user-profile">
                                                            <div class="card-block text-center text-white">
                                                                <div class="m-b-25">
																	<a href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($employeeobj['em_id']); ?>">
																	<?php if(!empty($employeeobj['em_image'])){ ?>
																		<img src="<?php echo base_url(); ?>assets/images/users/<?php echo $employeeobj['em_image']; ?>" class="img-radius" alt="User-Profile-Image" style="width: 100px;height: 100px; border: 2px solid;">
																	<?php } else { ?>
																		<img src="<?php echo base_url(); ?>assets/images/users/user.png" class="img-radius" alt="<?php echo $employeeobj["first_name"].' '.$employeeobj["last_name"]; ?>" style="width: 100px; height: 100px; border: 2px solid;">
																		
																	<?php } ?>
																	</a>
                                                                </div>
																<a href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($employeeobj['em_id']); ?>" style="color: #fff;">
                                                                <h6 class="f-w-600"><?php echo $employeeobj["first_name"].' '.$employeeobj["last_name"]; ?></h6>
																</a>
                                                                <p><?php echo $employeeobj["des_name"]; ?></p>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <div class="card-block" style="padding: 25px 0 25px 0;">
                                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                                                <div class="row">
																	<div class="col-sm-12">
                                                                        <p class="m-b-10 f-w-600">Department</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $employeeobj["dep_name"]; ?></h6>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <p class="m-b-10 f-w-600">Email</p>
                                                                        <h6 class="text-muted f-w-400"><a href="#" class="__cf_email__" ><?php echo $employeeobj["em_email"]; ?></a></h6>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <p class="m-b-10 f-w-600">Phone</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $employeeobj["em_phone"]; ?></h6>
                                                                    </div>
                                                                </div>
																
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
							<?php }} ?>
						
               
            </div>
         </div>
		 </div>
		 </div>
		 </div>
		 
            
                   
                
    <?php $this->load->view('backend/footer'); ?>