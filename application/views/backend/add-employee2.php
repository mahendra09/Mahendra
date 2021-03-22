<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <section class="content">
        <div class="container-fluid">
            <div class="row block-header" style="background: #fff;padding: 10px;">
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <h2 style="padding: 5px;font-weight: 600;font-size: 22px;">
                   Employee
                    
                </h2>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				
					<ol class="breadcrumb" style="float: right;">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a href="<?php echo base_url(); ?>">Employee</a></li>
                                <li class="active">Add Employee</li>
                            </ol>
				</div>
				<div class="col-12 ">
						<a href="<?php echo base_url(); ?>employee/Employees"  class="btn btn-primary waves-effect">
							<i class="material-icons">list</i>
							<span> Employee List</span>
						</a>
						<a href="<?php echo base_url(); ?>employee/Disciplinary" class="btn btn-primary waves-effect">
							<i class="material-icons">list</i>
							<span>Disciplinary List</span>
						</a>
                        
                    </div>
					<?php $degvalue = $this->employee_model->getdesignation(); ?>
    <?php $depvalue = $this->employee_model->getdepartment(); ?>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add New Employee</h2>
                           
                        <div class="body">
							<?php echo validation_errors(); ?>
                               <?php echo $this->upload->display_errors(); ?>
                               
                               <?php echo $this->session->flashdata('formdata'); ?>
                               <?php echo $this->session->flashdata('feedback'); ?>
                            <form id="form_validation" action="Save" enctype="multipart/form-data" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
										 <label>First Name</label>
                                        <input type="text" class="form-control" name="fname"  minlength="2" required>
                                       
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
										<label>Last Name </label>
                                        <input type="text" class="form-control" name="lname"  minlength="2" required>
                                        
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
										 <label>Employee Code</label>
										<input type="text" class="form-control" name="eid"  required>
                                       
                                    </div>
                                </div>
                                <div class="form-group">
									<label>Department</label>
                                        <select name="dept" value="" class="form-control" required>
                                            <option>Select Department</option>
                                            <?Php foreach($depvalue as $value): ?>
                                             <option value="<?php echo $value->id ?>"><?php echo $value->dep_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    
                                </div>
								<div class="form-group">
									<label>Designation </label>
                                        <select name="deg" class="form-control" required>
                                            <option>Select Designation</option>
                                            <?Php foreach($degvalue as $value): ?>
                                            <option value="<?php echo $value->id ?>"><?php echo $value->des_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    
                                </div>
								<!--  1 -->
								<div class="form-group">
									<label>Role </label>
                                        <select name="role" class="form-control" required>
                                            <option>Select Roll</option>
                                            <option value="ADMIN">ADMIN</option>
                                            <option value="EMPLOYEE">Employee</option>
                                            <option value="SUPER ADMIN">Super Admin</option>
                                        </select>
                                    
                                </div>
								<!--  2 -->
								<div class="form-group">
									<label>Gender </label>
                                        <select name="gender" class="form-control" required>
                                            <option>Select Gender</option>
                                            <option value="MALE">Male</option>
                                            <option value="FEMALE">Female</option>
                                        </select>
                                    
                                </div>
								<!--  3 -->
								<div class="form-group">
									<label>Blood Group </label>
                                        <select name="blood" class="form-control custom-select">
                                            <option>Select Gender</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                        </select>
                                    
                                </div>
								
								<div class="form-group form-float">
									<div class="form-line">
                                        <label>NID</label>
                                        <input type="text" name="nid" class="form-control" value=""  minlength="10" required> 
                                    </div>
                                </div>
                                    <div class="form-group  form-float">
										<div class="form-line">
                                        <label>Contact Number </label>
                                        <input type="text" name="contact" class="form-control" value=""  minlength="10" maxlength="15" required> 
                                    </div>
                                    </div>
                                    <div class="form-group  form-float">
										<div class="form-line">
                                        <label>Date Of Birth </label>
                                        <input type="date" name="dob" id="example-email2" name="example-email" class="form-control"  required> 
										
                                    </div>
                                    </div>
                                    <div class="form-group  form-float">
										<div class="form-line">
                                        <label>Date Of Joining </label>
                                        <input type="date" name="joindate" id="example-email2" name="example-email" class="form-control" > 
                                    </div>
                                    </div>
                                    <div class="form-group  form-float">
										<div class="form-line">
                                        <label>Date Of Leaving </label>
                                        <input type="date" name="leavedate" id="example-email2" name="example-email" class="form-control" > 
                                    </div>
                                    </div>
                                    <div class="form-group  form-float">
										<div class="form-line">
                                        <label>Username </label>
                                        <input type="text" name="username" class="form-control form-control-line" value="" > 
                                    </div>
                                    </div>
                                    <div class="form-group  form-float">
										<div class="form-line">
                                        <label>Email </label>
                                        <input type="email" id="example-email2" name="email" class="form-control"  minlength="7" required > 
                                    </div>
                                    </div><!--
                                    <div class="form-group col-md-3 m-t-20">
                                        <label class="form-label">Password </label>
                                        <input type="text" name="password" class="form-control" value="" placeholder="**********"> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label class="form-label">Confirm Password </label>
                                        <input type="text" name="confirm" class="form-control" value="" placeholder="**********"> 
                                    </div>-->
                                    <div class="form-group  form-float">
										<div class="form-line">
                                        <label>Image </label>
                                        <input type="file" name="image_url" class="form-control" value=""> 
                                    </div>
                                    </div>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
            
        </div>
    </section>
<?php $this->load->view('backend/footer'); ?>