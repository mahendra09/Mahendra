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
                                                        <h4>Settings</h4>
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
														
                                                        <li class="breadcrumb-item"><a href="#!">Settings</a> </li>
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
                                                        <h5>Settings</h5>
                                                        
                                                    </div>
                                                    <div class="card-block">
														<?php // echo validation_errors(); ?>
           <?php ///echo $this->upload->display_errors(); ?>
           <?php echo $this->session->flashdata('formdata'); ?>
           <?php echo $this->session->flashdata('feedback'); ?>
           <?php echo $this->session->flashdata('validation_errors'); ?>
           <?php echo $this->session->flashdata('display_errors'); ?>

														
                                                       

                                                        <form action="Add_Settings" id="form_validation"  method="post" enctype="multipart/form-data" accept-charset="utf-8">
                                                              
															<div class="form-group clearfix">
                                            <label for="" class="col-md-3">Upload site logo</label>
                                            <div class="col-md-9">
                                                <div class="file_prev inb" style="margin-bottom: 20px;">
                                                <?php if($settingsvalue[0]['logo']){ ?>
                                                    <img src="<?php echo base_url(); ?>assets/images/<?php echo $settingsvalue[0]['logo']; ?>" height="100" width="167" style="width: 50%;">
                                                    <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>assets/adminty/files/assets/images/logo.png" height="100" width="167" style="background: #000;margin: 10px;">
                                                <?php } ?>
                                                </div>
                                                <label for="img_url" class="custom-file-upload"><i class="fa fa-camera" aria-hidden="true"></i> Upload Logo</label>
                                                <input type="file" value="" class="" id="img_url" name="img_url" aria-describedby="fileHelp">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="title" class="col-md-3">Site Title</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="title" value="<?php echo $settingsvalue[0]['sitetitle']; ?>" id="title" placeholder="Title..." required minlength="7" maxlength="120">
                                            </div>
                                        </div>                                    
                                        <div class="form-group clearfix">
                                            <label for="description" class="col-md-3">Description</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="description" value="<?php echo $settingsvalue[0]['descripation']; ?>" name="description" rows="6" required minlength="20" maxlength="512"><?php echo $settingsvalue[0]['descripation']; ?></textarea>
                                            </div>                                        
                                        </div>                                                                
                                        <?php /* <div class="form-group clearfix">
                                            <label for="copyright" class="col-md-3">Copyright</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="copyright" value="<?php echo $settingsvalue->copyright; ?>" id="copyright" placeholder="copyright...">
                                            </div>
                                        </div>                                
                                        <div class="form-group clearfix">
                                            <label for="contact" class="col-md-3">Contact</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="contact" value="<?php echo $settingsvalue->contact; ?>" id="contact" placeholder="contact...">
                                            </div>
                                        </div>                                    
                                        <div class="form-group clearfix">
                                            <label for="currency" class="col-md-3">Currency</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="currency" value="<?php echo $settingsvalue->currency; ?>" id="currency" placeholder="currency...">
                                            </div>
                                        </div>                                    
                                        <div class="form-group clearfix">
                                            <label for="currency" class="col-md-3">Symbol</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="symbol" value="<?php echo $settingsvalue->symbol; ?>" id="symbol" placeholder="symbol...">
                                            </div>
                                        </div>                                    
                                        <div class="form-group clearfix">
                                            <label for="email" class="col-md-3">System Email</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $settingsvalue->system_email; ?>" placeholder="email...">
                                            </div>
                                        </div>    */?>                                 
                                        <div class="form-group clearfix">
                                            <label for="address" class="col-md-3">Address</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="address" id="address" value="<?php echo $settingsvalue[0]['address']; ?>" placeholder="address...">
                                            </div>
                                        </div>                                    
                                        <div class="form-group clearfix">
                                            <label for="address" class="col-md-3">Address 2</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="address2" id="address2" value="<?php echo $settingsvalue[0]['address2']; ?>" placeholder="address more...">
                                            </div>
                                        </div>
										<div class="form-group clearfix">
                                            <label for="" class="col-md-3">Upload Login Image</label>
                                            <div class="col-md-9">
                                                <div class="file_prev inb" style="margin-bottom: 20px;">
                                                <?php if($settingsvalue[0]['login_img']){ ?>
                                                    <img src="<?php echo base_url(); ?>assets/images/<?php echo $settingsvalue[0]['login_img']; ?>" height="100" width="167" style="width: 50%;">
                                                    <?php }?>
                                                </div>
                                                <!-- <label for="img_url" class="custom-file-upload "><i class="fa fa-camera" aria-hidden="true"></i> Upload Login Image</label>-->
                                                <input type="file" value="" class="" id="img_url" name="loginimg" aria-describedby="fileHelp">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="col-md-9 col-md-offset-3">
                                                <input type="hidden" name="id" value="<?php echo $settingsvalue[0]['companyid']; ?>"/>
                                                <button type="submit" name="submit" id="btnSubmit" class="btn btn-primary m-b-0">Submit</button>
                                                <span class="flashmessage"></span>
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