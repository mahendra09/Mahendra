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
                                                        <h4>Inactive Employee</h4>
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
											<div class="col-12 ">
						<a href="<?php echo base_url(); ?>employee/Add_employee" class="btn btn-primary waves-effect">
							
							<span> Add Employee</span>
						</a>
						<a href="<?php echo base_url(); ?>employee/Disciplinary" class="btn btn-primary waves-effect">
							
							<span> Disciplinary List</span>
						</a>
                        
                    </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->
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
									<div class="page-body">
			<div class="row clearfix">
                
				
					<div class="col-xl-12 col-md-12">
						<div class="card">
                                                <div class="card-header">
                                                    <h5> Employee List</h5>
                                                    
                                                </div>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>ID </th>
																<th>Employee Name</th>
																<th>Email </th>
																<th>Contact </th>
																<th>Roll</th>
																<th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
																
																<?php foreach($invalidem as $value): ?>
																<tr>
																	<td><?php echo $value->em_code; ?></td>
																	<td><?php echo $value->first_name .' '.$value->last_name; ?></td>
																	<td><?php echo $value->em_email; ?></td>
																	<td><?php echo $value->em_phone; ?></td>
																	<td><?php echo $value->em_role; ?></td>
																	<td class="jsgrid-align-center ">
																		<a href="<?php echo base_url(); ?>employee/activeemployeeactions?I=<?php echo base64_encode($value->em_id); ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light">Active Employee</a>
																	</td>
																</tr>
																<?php endforeach; ?>
														   
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th>ID </th>
																<th>Employee Name</th>
																<th>Email </th>
																<th>Contact </th>
																<th>Roll</th>
																<th>Action</th>
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