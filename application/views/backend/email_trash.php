<?php $this->load->view('backend/header'); ?>
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
                                                               <!--  <img class="img-fluid" src="..\files\assets\images\logo.png" alt="Theme-Logo"> -->
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
                                                        <div class="tab-content" id="pills-tabContent">
                                                            <div class="tab-pane fade show active" id="e-inbox" role="tabpanel">

                                                                <div class="mail-body">
                                                                    <div class="mail-body-header">
                                                                        <!--<button type="button" class="btn btn-primary btn-xs waves-effect waves-light">
                                                                              <i class="icofont icofont-exclamation-circle"></i>
                                                                          </button>
                                                                        <button type="button" class="btn btn-success btn-xs waves-effect waves-light">
                                                                              <i class="icofont icofont-inbox"></i>
                                                                          </button>  -->
                                                                        <button type="button" class="btn btn-danger btn-xs waves-effect waves-light">
                                                                              <i class="icofont icofont-ui-delete"></i>
                                                                          </button>
                                                                        <div class="btn-group dropdown-split-primary">
                                                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                  <i class="icofont icofont-ui-folder"></i>
                                                                              </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item waves-effect waves-light" href="#">Action</a>
                                                                                <a class="dropdown-item waves-effect waves-light" href="#">Another action</a>
                                                                                <a class="dropdown-item waves-effect waves-light" href="#">Something else here</a>
                                                                                <div class="dropdown-divider"></div>
                                                                                <a class="dropdown-item waves-effect waves-light" href="#">Separated link</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="btn-group dropdown-split-primary">
                                                                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                  More
                                                                              </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item waves-effect waves-light" href="#">Action</a>
                                                                                <a class="dropdown-item waves-effect waves-light" href="#">Another action</a>
                                                                                <a class="dropdown-item waves-effect waves-light" href="#">Something else here</a>
                                                                                <div class="dropdown-divider"></div>
                                                                                <a class="dropdown-item waves-effect waves-light" href="#">Separated link</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mail-body-content">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
																				<?php 
																					if($inbox){
																						foreach($inbox as $inboxobj){
																				?>
                                                                                <tr class="<?php if($inboxobj['read_email'] == 0){ echo 'unread'; }else{ echo 'read'; } ?>">
                                                                                    <td>
                                                                                        <div class="check-star">
                                                                                            <div class="checkbox-fade fade-in-primary checkbox">
                                                                                                <label>
                                                                                                      <input type="checkbox" value="">
																									  
                                                                                                      <span class="cr"><i class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                                                  </label>
                                                                                            </div>
																							<?php 
																								if($inboxobj['starred'] == 0){
																							?>
                                                                                            <i class="icofont icofont-star text-warning"></i>
																							<?php 
																								}else{
																							?>
																							  <i class="icofont icofont-star text-primary"></i>
																							<?php 
																								} 
																							?>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><a href="<?php echo base_url(); ?>Email/email_read/<?php echo $inboxobj['emails_id']; ?>" class="email-name"><?php echo $inboxobj['subject']; ?></a></td>
                                                                                    <td><a href="<?php echo base_url(); ?>Email/email_read/<?php echo $inboxobj['emails_id']; ?>" class="email-name"><?php echo substr($inboxobj['message'],0,150); ?></a></td>
																					<?php 
																						if($inboxobj['attach'] != ""){
																					?>
                                                                                    <td class="email-attch"><a href="<?php echo base_url(); ?>Email/email_read/<?php echo $inboxobj['emails_id']; ?>"><i class="icofont icofont-clip"></i></a></td>
																					<?php 
																						}else{
																					?>
																						<td class="email-attch"></td>
																					<?php 
																						}
																					?>
                                                                                    <td class="email-time"><?php if($inboxobj['date'] == date('Y-m-d')){ echo date("H:i a", strtotime($inboxobj['time'])); }else{ echo date("d M", strtotime($inboxobj['date'])); } ?></td>
                                                                                </tr>
																				<?php 
																						}
																					}
																				?>
                                                                                
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <!-- Right-side section end -->
                                                </div>
                                            </div>
                                            <!-- Email-card end -->
                                        </div>
                                    </div>
                                    <!-- Page-body start -->
                                </div>
                            </div>
                            <!-- Main-body end -->
                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
      
                                           
<?php $this->load->view('backend/footer'); ?>
 