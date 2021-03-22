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
                                                        <h4>Department</h4>
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
                                                        <li class="breadcrumb-item"><a href="#!">Department</a> </li>
                                                    </ul>
                                                </div>
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
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
					<!-- Basic Inputs Validation start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5><?php if (isset($editdepartment)) { echo 'Edit'; }else{echo 'Add';}?> Department</h5>
                                                        
                                                    </div>
                                                    <div class="card-block">
														<?php echo validation_errors(); ?>
														<?php echo $this->upload->display_errors(); ?>

														
                                                        <form id="main" method="post" action="<?php if (isset($editdepartment)) { echo base_url().'organization/Update_dep'; }else{ echo 'Save_dep'; }?>" novalidate="">
                                                              
															<div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Department Name</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="department" id="firstName" minlength="3" required <?php if (isset($editdepartment)) {?>value='<?php  echo $editdepartment->dep_name;?>'<?php }?>>
                                                                    <span class="messages"></span>
																	<?php if (isset($editdepartment)) { ?>
																	<input type="hidden" name="id" value="<?php  echo $editdepartment->id;?>">
																	<?php } ?>
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
				
					<div class="col-xl-7 col-md-7">
						<div class="card">
                                                <div class="card-header">
                                                    <h5>Department List</h5>
                                                    
                                                </div>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>Department Name</th>
																<th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
																<?php 
																	if(!empty($department) && isset($department)){
																		foreach ($department as $value) { 
																?>
																	<tr>
																		<td><?php echo $value['dep_name'];?></td>
																		<td>
																			<a href="<?php echo base_url();?>organization/dep_edit/<?php echo $value['id'];?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="material-icons">mode_edit</i></a>
																			<a onclick="return confirm('Are you sure to delete this data?')" href="<?php echo base_url();?>organization/Delete_dep/<?php echo $value['id'];?>" title="Delete" class="btn btn-sm btn-info waves-effect waves-light"><i class="material-icons">delete</i></a>
																		</td>
																	</tr>
																	<?php } } ?>
																		
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th>Department Name</th>
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