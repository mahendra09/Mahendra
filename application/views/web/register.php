<?php $this->load->view('web/header'); ?>
 <!-- inner banner -->
    <div class="inner-banner-w3ls d-flex flex-column justify-content-center align-items-center">
    </div>
    <!-- //inner banner -->
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
                <a href="index.html" class="m-0">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- register  -->
    <div class="modal-body align-w3" style="max-width: 750px;">
		<?php
                                        if(!empty($this->session->flashdata('success'))){
											echo $this->session->flashdata('success');
										}
                                     ?>
        <form action="<?php echo base_url(); ?>index/savecompany" method="post" class="p-sm-3">
			<div class="row">
				<div class="col-md-6">
					 <div class="form-group">
						<label for="recipient-name" class="col-form-label ">First Name</label>
						<input type="text" class="form-control" placeholder="First name" name="fname" id="fname"
							required="">
					</div>
				</div>
				<div class="col-md-6">
					 <div class="form-group">
						<label for="recipient-name" class="col-form-label ">Last Name</label>
						<input type="text" class="form-control" placeholder="Last name" name="lname" id="lname"
							required="">
					</div>
				</div>
				<div class="col-md-6">
					 <div class="form-group">
						<label for="recipient-name" class="col-form-label ">Official Email</label>
						<input type="email" class="form-control" placeholder="Official Email" name="email" id="email"
							required="">
					</div>
				</div>
				<div class="col-md-6">
					 <div class="form-group">
						<label for="recipient-name" class="col-form-label ">Company Name</label>
						<input type="text" class="form-control" placeholder="Company Name" name="companyname" id="companyname"
							required="">
					</div>
				</div>
				<div class="col-md-6">
					 <div class="form-group">
						<label for="recipient-name" class="col-form-label ">Phone Number</label>
						<input type="text" class="form-control" placeholder="Phone Number" name="phoneno" id="phoneno"
							required="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label ">Username</label>
						<input type="text" class="form-control" placeholder="User name" name="username" id="username"
							required="">
					</div>
				</div>
				<div class="col-md-6">
					
					<div class="form-group">
						<label for="password1" class="col-form-label">Password</label>
						<input type="password" class="form-control" placeholder="******" name="password" id="password1"
							required="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="password2" class="col-form-label">Confirm Password</label>
						<input type="password" class="form-control" placeholder="******" name="confirmpassword" id="confirmpassword"
							required="">
					</div>
				</div>
			</div>
            <div class="sub-w3l">
                <div class="sub-w3layouts_hub">
                    <input type="checkbox" id="brand2" name='tc' value="1" required="">
                    <label for="brand2" class="mb-3 text-secondary">
                        <span></span>I Accept to the Terms & Conditions</label>
                </div>
            </div>
            <div class="right-w3l">
                <input type="submit" class="form-control bg-theme" name="save" value="Register">
            </div>
        </form>
    </div>
    <!-- //register -->
<?php $this->load->view('web/footer'); ?>