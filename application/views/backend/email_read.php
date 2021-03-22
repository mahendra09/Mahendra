<?php $this->load->view('backend/header'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<?php $this->load->view('backend/sidebar'); ?>
<div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="card">
                                            <!-- Email-card start -->
                                            <div class="card-block email-card">
                                                <div class="row">
                                                    <div class="col-lg-12 col-xl-3">
                                                        <div class="user-head row">
                                                            <div class="user-face">
                                                               <!-- <img class="img-fluid" src="..\files\assets\images\logo.png" alt="Theme-Logo"> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-xl-9">
                                                        <div class="mail-box-head row">
                                                            <div class="col-md-12">
                                                                <form class="f-right">
                                                                    <div class="right-icon-control">
                                                                        <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends-2">
                                                                        <div class="form-icon">
                                                                            <i class="icofont icofont-search"></i>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- Left-side section start -->
                                                     <?php $this->load->view('backend/email_leftside'); ?>
                                                    <!-- Left-side section end -->
                                                    <!-- Right-side section start -->
                                                    <div class="col-lg-12 col-xl-9">
                                                        <div class="mail-body">
                                                            <div class="mail-body-content email-read">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h5><?php echo $emailread[0]['subject']; ?></h5>
                                                                        <h6 class="f-right"><?php echo date("h:i A", strtotime($emailread[0]['time'])); ?></h6>
                                                                    </div>
                                                                    <div class="card-block">
                                                                        <div class="media m-b-20">
                                                                            <div class="media-left photo-table">
                                                                                <a href="#">
                                                                                    <img class="media-object img-radius" src="<?php echo base_url(); ?>\assets\images\avatar-3.jpg" alt="E-mail User">
                                                                                </a>
                                                                            </div>
                                                                            <div class="media-body photo-contant">
                                                                                <a href="#">
                                                                                    <h6 class="user-name txt-primary"><?php echo $fromdetail[0]['first_name'].' '.$fromdetail[0]['last_name']; ?></h6>
                                                                                </a>
                                                                                <a class="user-mail txt-muted" href="#">
                                                                                    <h6>From:<span class="__cf_email__" data-cfemail="503a3f383e343f356165646310373d31393c7e333f3d">[<?php echo $emailread[0]['email_from']; ?>]</span></h6>
                                                                                </a>
                                                                                <div>
                                                                                    <h6 class="email-welcome-txt">Hello Dear...</h6>
                                                                                    <p class="email-content" <?php if(empty($emailread[0]['attach'])){ echo 'style="border-bottom: 0;"'; }  ?>>
																						<?php echo $emailread[0]['message']; ?>
                                                                                        
                                                                                    </p>
                                                                                </div>
																				<?php 
																					if(!empty($emailread[0]['attach'])){
																				?>
                                                                                <div class="m-t-15">
                                                                                    <i class="icofont icofont-clip f-20 m-r-10"></i>Attachments <b>(<?php  $cattach = explode(",",$emailread[0]['attach']); echo count($cattach);  ?>)</b>
                                                                                    <div class="row mail-img">
																						<?php 
																							
																							for($x=0;$x<count($cattach);$x++){
																						?>
                                                                                        <div class="col-sm-4 col-md-2 col-xs-12">
                                                                                            <a href="#"><img class="card-img-top img-fluid img-thumbnail" src="<?php echo base_url(); ?>\assets\images\users\<?php echo $cattach[$x]; ?>" alt="Card image cap"></a>
                                                                                        </div>
																							<?php } ?>
                                                                                        
                                                                                        
                                                                                    </div>
																					
                                                                                </div>
																					<?php } ?>
																					<div class="row" style="border-top: 1px solid;padding-top: 15px;">
																						
																							<button class="btn btn-primary btn-outline-primary" style="margin-right: 10px;" onclick="reply()"><i class="fa fa-mail-reply"></i>Reply</button>
																						
																							<button class="btn btn-primary btn-outline-primary" onclick="forward()"><i class="fa fa-mail-forward"></i>Forward</button>
																						
																					</div>
																					<br>
																					<div id="replydiv" style="display: none;">
																						<form action="<?php echo base_url(); ?>Email/sendemail" method="post">
																						<input type="text" name="email_to" class="form-control" readonly value="<?php echo $emailread[0]['email_from']; ?>" >
																						<input type="hidden" name="subject" class="form-control" readonly value="<?php echo $emailread[0]['subject']; ?>" >
																						<br>
																						<textarea class="form-control m-t-30 col-xs-12 email-textarea" id="discripation" name="message" placeholder="Reply Your Thoughts" rows="4"></textarea> 
																						<script type="text/javascript">CKEDITOR.replace("discripation");</script>
																						<br>
																						<button type="submit">Send</button>
																						</form>
																					</div>
																					<div id="forwarddiv" style="display: none;">
																						<form action="<?php echo base_url() ?>Email/sendemail" method="post" enctype="multipart/form-data">
																							<div class="form-group">
																								<!-- <input type="text" class="form-control" name="email_to" placeholder="To"> -->
																								<select class="browser-default custom-select form-control" name="email_to" required>
																								  <option value="" selected>To</option>
																								  <?php 
																										if($em_meail){
																											foreach($em_meail as $em_meailobj){
																								  ?>
																								  <option value="<?php echo $em_meailobj['em_email']; ?>"><?php echo $em_meailobj['em_email']; ?></option>
																								  <?php 
																											}
																										}
																								  ?>
																								  
																								</select>
																							</div>
																							<div class="form-group">
																								<div class="row">
																									<div class="col-md-6">
																										<input type="email" class="form-control" name="cc" placeholder="Cc">
																									</div>
																									<div class="col-md-6">
																										<input type="email" class="form-control" name="bcc" placeholder="Bcc">
																									</div>
																								</div>
																							</div>
																							<div class="form-group">
																								<input type="text" class="form-control" name="subject" required value="<?php echo $emailread[0]['subject']; ?>" placeholder="Subject">
																							</div>
																							<div class="form-group">
																								<textarea class="form-control" id="discripation1"  name="message"  placeholder="Message"></textarea>
																								<script type="text/javascript">CKEDITOR.replace("discripation1");</script>
																							</div>
																							<div class="form-group">
																								<input type="file" class="form-control" name="attach[]" placeholder="Attach" multiple="multiple">
																							</div>
																							<button type="submit">Send</button>
																						</form>
																					</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Right-side section end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->
                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
      
                                           
<?php $this->load->view('backend/footer'); ?>
<script>
function reply() {
  document.getElementById("replydiv").style.display = "block";
  document.getElementById("forwarddiv").style.display = "none";
}

function forward() {
  document.getElementById("replydiv").style.display = "none";
  document.getElementById("forwarddiv").style.display = "block";
}
</script>