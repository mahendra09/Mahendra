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
									<h4>Employee Assign</h4>
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
									<li class="breadcrumb-item"><a href="#!">Employee Assign</a> </li>
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
									<h5><?php if (isset($edit)) { echo 'Edit'; }else{echo 'Add';}?> Employee Assign</h5>
									
								</div>
                                <div class="card-block">
									<?php echo validation_errors(); ?>
									<?php echo $this->upload->display_errors(); ?>														
									<form id="main" method="post" action="<?php if (isset($edit)) { echo base_url().'employee/employeesreporter_update'; }else{ echo 'Save_employeesreporter'; }?>" novalidate="">
										  
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Employee Report To </label>
											<div class="col-sm-8">
												<select name="to" value="" class="form-control" required="">
													<option>Select Employee</option>
													
													<?Php foreach($employee as $value): ?>
													 <option value="<?php echo $value['id']; ?>" <?php if(isset($edit) && !empty($edit)){ if($value['id'] == $edit[0]['reportingempto']){ echo 'Selected'; } }?> ><?php echo $value['first_name'].' '.$value['last_name']; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Employee Report From</label>
											<div class="col-sm-8">
												<select name="from" value="" class="form-control" required="">
													<option>Select Employee</option>
													<?Php foreach($employeefrom as $value): ?>
													 <option value="<?php echo $value['id']; ?>" <?php if(isset($edit) && !empty($edit)){ if($value['id'] == $edit[0]['reportingempfrom']){ echo 'Selected'; } }?> ><?php echo $value['first_name'].' '.$value['last_name']; ?></option>
													<?php endforeach; ?>
												</select>
												<?php 
													if (isset($edit)) { 
												?>
												<input type="hidden" name="id" value="<?php  echo $edit[0]['reportingempid'];?>">
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
                                    <h5>Assign Employee List</h5>                  
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
												<tr>
													<th>Employee Name</th>
													<th>Reporting To</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													if(!empty($Assignemp) && isset($Assignemp)){
														foreach ($Assignemp as $value) { 
												?>
													<tr>
														<td>
															<?php 
																$where=array('id'=>$value['reportingempfrom']);
																$reportingempfrom = $this->Alldata->DetailData('employee',$where);
																echo $reportingempfrom[0]['first_name'].' '.$reportingempfrom[0]['last_name'];
															?>
														</td>
														<td>
															<?php 
																//echo $value['reportingempto'];
																$where=array('id'=>$value['reportingempto']);
																$reportingempto = $this->Alldata->DetailData('employee',$where);
																echo $reportingempto[0]['first_name'].' '.$reportingempto[0]['last_name'];
															?>
														</td>
														<td>
															<a href="<?php echo base_url();?>employee/employeesreporter_edit/<?php echo $value['reportingempid'];?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="material-icons">mode_edit</i></a>
															<a onclick="return confirm('Are you sure to delete this data?')" href="<?php echo base_url();?>employee/Delete_assignemp/<?php echo $value['reportingempid'];?>" title="Delete" class="btn btn-sm btn-info waves-effect waves-light"><i class="material-icons">delete</i></a>
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
</div>
<?php $this->load->view('backend/footer'); ?>