<!DOCTYPE html>
<html lang="en">
<?php
date_default_timezone_set('Asia/Dhaka');
 if($this->session->userdata('user_login_access') != False) {
	 
 }else{
	redirect(base_url().'login' , 'refresh');
 }
?>
<head>
    <title>HRMS</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="author" content="#">
	<?php $settingsvalue = $this->settings_model->GetSettingsValue(); ?>
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo base_url(); ?>assets\adminty\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\assets\icon\feather\css\feather.css">
	<!-- Data Table Css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
	<!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\assets\icon\themify-icons\themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\assets\icon\font-awesome\css\font-awesome.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\assets\icon\icofont\css\icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\assets\icon\feather\css\feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\assets\css\jquery.mCustomScrollbar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\bower_components\switchery\css\switchery.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\bower_components\bootstrap-tagsinput\css\bootstrap-tagsinput.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\assets\css\custome.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\assets\icon\ion-icon\css\ionicons.min.css">
	
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\adminty\files\assets\icon\material-design\css\material-design-iconic-font.min.css">
    
</head>

<body>

<?php 
		/* if(empty($this->session->userdata('user_login_id'))){
			redirect(base_url().'login');
		} */
            $id = $this->session->userdata('user_login_id');
            $basicinfo = $this->employee_model->GetBasic($id); 
			/* if(empty($basicinfo->des_id)){
				redirect(base_url('employee/view?I='.base64_encode($basicinfo->em_id)));
			} */
            $settingsvalue = $this->settings_model->GetSettingsValue();
            $year =  date('y');
            $y = substr( $year, -2);
            $date = date("m/d/$y");
    #echo $date;
            $leavetoday = $this->leave_model->GetLeaveToday($date); 
        ?>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
						<?php //echo get_cookie('email'); ?>
                        <a href="<?php echo base_url(); ?>dashboard/Dashboard">
							<?php 
							$comid=$this->session->userdata('company');
							$where=array('companyid'=>$comid);
							$companydetil = $this->Alldata->DetailData('company_register',$where);
							if($companydetil[0]['logo']){ ?>
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/images/<?php echo $companydetil[0]['logo']; ?>" style="width: 185px;height: 50px;">
									<?php } else { ?>
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/adminty/files/assets/images/logo.png">
                            <?php } ?>
                            <?php /* <img class="img-fluid" src="<?php echo base_url(); ?>assets\adminty\files\assets\images\logo.png" alt="Theme-Logo"> */ ?>
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
								<a href="#!">
									<i class="feather icon-message-square"></i>
								</a>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
						<?php 
						$comid=$this->session->userdata('company');
						$email=$this->session->userdata('email');
											$where=array('company'=>$comid, 'email_to'=>$email, 'trash'=>0, 'read_email'=>0);
											$unreadmail_notification= $this->Alldata->DetailData('emails',$where);
										?>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-pink">
										<?php 
											$x=0;
											if($unreadmail_notification){
												foreach($unreadmail_notification as $unreadmail_notificationobj){
														$x++;
												}
											}
											echo $x;
										?>
										
										</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
										<?php foreach($unreadmail_notification as $unreadmail_notificationobj): ?>
                                            <a href="<?php echo base_url(); ?>Email/email_read/<?php echo $unreadmail_notificationobj['emails_id']; ?>">
											<li>
												
												<div class="media">
													<!-- <img class="d-flex align-self-center img-radius" src="..\files\assets\images\avatar-4.jpg" alt="Generic placeholder image"> -->
													
													<div class="media-body">
														<h5 class="notification-user"><?php echo $unreadmail_notificationobj['subject']; ?></h5>
														<p class="notification-msg"><?php echo substr($unreadmail_notificationobj['message'],0,150); ?></p>
														<span class="notification-time" ><?php echo  date("H:i a", strtotime($unreadmail_notificationobj['time'])); ?></span>
													</div>
													
												</div>
												
												
                                            </li>
											</a>
                                            <?php endforeach; ?>
										<?php foreach($leavetoday as $value): ?>
                                            <li>
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5><?php echo $value->first_name; ?></h5> <span class="mail-desc"><?php echo $value->reason; ?></span> <span class="time"><?php echo $value->start_date; ?></span> </div>
                                            </li>
                                            <?php endforeach; ?>
                                       
                                    </ul>
                                </div>
                            </li>
                             <li class="header-notification" onclick="allunreadmsg()" id="allmsgcount">
								<div class="dropdown-primary dropdown">
									<div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
										<i class="feather icon-message-square"></i>
										<span class="badge bg-c-green"  id="allmsgcountupdate">
										<?php 
											$comid=$this->session->userdata('company');
											$to=$this->session->userdata('id');
											$where = array('company'=>$comid,'to'=>$to,'recd'=>0);
											$unreadmsg = $this->Alldata->DetailData('chat',$where);
											echo count($unreadmsg);
										?>
										</span>
									</div>
								</div>
							</li>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
										<?php if(!empty($basicinfo->em_image)){ ?>
                                        <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image; ?>" class="img-radius" alt="User-Profile-Image">
										<?php }else{ ?>
										<img src="<?php echo base_url(); ?>assets/images/users/user.png" class="img-radius" alt="User-Profile-Image">
										<?php } ?>
                                        <span><?php echo $basicinfo->first_name.' '.$basicinfo->last_name; ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id); ?>">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
										 <li>
                                            <a href="<?php echo base_url(); ?>settings/Settings">
                                                <i class="feather icon-settings"></i> Account Settings
                                            </a>
                                        </li>   
                                        <!-- <li>
                                            <a href="email-inbox.htm">
                                                <i class="feather icon-mail"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.htm">
                                                <i class="feather icon-lock"></i> Lock Screen
                                            </a>
                                        </li> -->
                                        <li>
                                            <a href="<?php echo base_url(); ?>Logout/index">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
			
			<!-- Sidebar chat start -->
        <div id="sidebar" class="users p-chat-user showChat">
            <div class="had-container">
                <div class="card card_main p-fixed users-main">
                    <div class="user-box">
                        <div class="chat-inner-header">
                            <div class="back_chatBox">
                                <div class="right-icon-control">
                                    <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                    <div class="form-icon">
                                        <i class="icofont icofont-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-friend-list">
							<?php 
								$comid=$this->session->userdata('company');
								$where = array('em_company'=>$comid);
								$chatuser = $this->Alldata->DetailData('employee',$where);
								if(isset($chatuser) && !empty($chatuser)){
									$x=1;
									foreach($chatuser as $chatuserobj){
										if($chatuserobj['id'] != $this->session->userdata('id')){
							?>
                            <div class="media userlist-box" data-id="<?php echo $x; ?>" data-status="<?php if($chatuserobj['live'] == 1){ echo 'online'; }else{ echo 'offline'; } ?>" data-username="<?php echo $chatuserobj['first_name'].' '.$chatuserobj['last_name']; ?>" data-toggle="tooltip" data-placement="left" title="<?php echo $chatuserobj['first_name'].' '.$chatuserobj['last_name']; ?>">
                                <a class="media-left" href="#!" onclick="abc('<?php echo $chatuserobj['first_name'].' '.$chatuserobj['last_name']; ?>','<?php echo $chatuserobj['id'] ?>')">
									<?php if(!empty($chatuserobj['em_image'])){ ?>
									<img class="media-object img-radius img-radius" src="<?php echo base_url(); ?>assets/images/users/<?php echo $chatuserobj['em_image']; ?>" alt="Generic placeholder image">
									
									<?php }else{ ?>
									<img class="media-object img-radius img-radius" src="<?php echo base_url(); ?>assets/images/users/user.png" alt="Generic placeholder image">
									
									<?php } ?>
                                    <?php 
										if($chatuserobj['live'] == 1){ 
									?>
									<div class="live-status bg-success"></div>
									<?php }else{ ?>
									<div class="live-status bg-danger"></div>
									<?php } ?>
                                </a>
                                <div class="media-body" onclick="abc('<?php echo $chatuserobj['first_name'].' '.$chatuserobj['last_name']; ?>','<?php echo $chatuserobj['id'] ?>')">
                                    <div class="f-13 chat-header">
										<?php echo $chatuserobj['first_name'].' '.$chatuserobj['last_name']; ?>
										<?php 
											$comid=$this->session->userdata('company');
											$to=$this->session->userdata('id');
											$from=$chatuserobj['id'];
											$where = array('company'=>$comid,'to'=>$to,'from'=>$from,'unread'=>0);
											$unreadmsg = $this->Alldata->DetailData('chat',$where);
											if(count($unreadmsg)!= 0){
										?>
										<span class="badge bg-c-green">
										<?php
											echo count($unreadmsg);
										?>
										</span>
											<?php } ?>
									</div>
                                </div>
                            </div>
							<?php 
							$x++;
								}}}
							?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar inner chat start-->
		<style>
			#scroller * {
				/* don't allow the children of the scrollable element to be selected as an anchor node */
				overflow-anchor: none;
			}

			#anchor {
				/* allow the final child to be selected as an anchor node */
				overflow-anchor: auto;

				/* anchor nodes are required to have non-zero area */
				height: 1px;
			}
		</style>
        <div class="showChat_inner" id="scrollerdiv" style="overflow: auto;max-height: 80%; " >
            <div class="media chat-inner-header" style="z-index: 103;background: #fff;position: fixed;width: 300px;">
                <a class="back_chatBox" id="chatuser">
                    <i class="feather icon-chevron-left" onclick="clearname()"></i> 
                </a>
            </div>
			<div id="messagebody" >
				
			</div>
            <div class="chat-reply-box p-b-20" style="width: 300px;">
				<form action="<?php echo base_url(); ?>Chat/send" method="post">
					<div class="right-icon-control">
						<input type="text" class="form-control search-text" name="message" id="message" placeholder="Messages">
						<input type="hidden"  name="to" id="to">
						<div class="form-icon">
							<button type="button" id="sentbutton" onclick="sentmessage()" style="border: 0;background: #fff;"><i class="feather icon-navigation"></i></button>
						</div>
					</div>
				</form>
            </div>
        </div>
        <!-- Sidebar inner chat end-->
		
