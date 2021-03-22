<?php 
$comid=$this->session->userdata('company');
$email=$this->session->userdata('email');
			
			$where=array('company'=>$comid, 'email_to'=>$email, 'trash'=>0, 'read_email'=>0);
			$unread= $this->Alldata->DetailData('emails',$where);
			
			$where=array('company'=>$comid, 'email_to'=>$email, 'trash'=>1);
			$trash= $this->Alldata->DetailData('emails',$where);
			
?>
<div class="col-lg-12 col-xl-3">
                                                        <div class="user-body">
                                                            <div class="p-20 text-center">
                                                                <a href="<?php echo base_url(); ?>Email/compose" class="btn btn-danger">Compose</a>
                                                            </div>
                                                            <ul class="page-list nav nav-tabs flex-column" >
                                                                <li class="nav-item mail-section">
                                                                    <a class="nav-link active" href="<?php echo base_url(); ?>Email" >
                                                                        <i class="icofont icofont-inbox"></i> Inbox
                                                                        <span class="label label-primary f-right"><?php echo count($unread); ?></span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item mail-section">
                                                                    <a class="nav-link"  href="<?php echo base_url(); ?>Email/starred" >
                                                                        <i class="icofont icofont-star"></i> Starred
                                                                    </a>
                                                                </li>
                                                                <!-- <li class="nav-item mail-section">
                                                                    <a class="nav-link" data-toggle="pill" href="" role="tab">
                                                                        <i class="icofont icofont-file-text"></i> Drafts
                                                                    </a>
                                                                </li> -->
                                                                <li class="nav-item mail-section">
                                                                    <a class="nav-link" href="<?php echo base_url(); ?>Email/sentmail">
                                                                        <i class="icofont icofont-paper-plane"></i> Sent Mail
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item mail-section">
                                                                    <a class="nav-link"  href="<?php echo base_url(); ?>Email/trash">
                                                                        <i class="icofont icofont-ui-delete"></i> Trash
                                                                        <span class="label label-info f-right"><?php echo count($trash); ?></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <!--<ul class="p-20 label-list">
                                                                <li>
                                                                    <h5>Labels</h5>
                                                                </li>
                                                                <li>
                                                                    <a class="mail-work" href="">Work</a>
                                                                </li>
                                                                <li>
                                                                    <a class="mail-design" href="">Design</a>
                                                                </li>
                                                                <li>
                                                                    <a class="mail-family" href="">Family</a>
                                                                </li>
                                                                <li>
                                                                    <a class="mail-friends" href="">Friends</a>
                                                                </li>
                                                                <li>
                                                                    <a class="mail-office" href="">Office</a>
                                                                </li>
                                                            </ul> -->
                                                        </div>
                                                    </div>