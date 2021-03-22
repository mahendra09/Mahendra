<?php $this->load->view('backend/header'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dropdown/css/jquery.dropdown.css">
  
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
                                                            <div class="mail-body">

                                                                <div class="mail-body-content">
                                                                    <form action="<?php echo base_url() ?>Email/sendemail" method="post" enctype="multipart/form-data">
                                                                        <div class="form-group">
																		
																				

																			
                                                                            <!-- <input type="text" class="form-control" name="email_to" placeholder="To"> -->
																			<select class="browser-default custom-select form-control" name="email_to" multiple required>
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
																		 <div class="dropdown-mul-2">
        <select style="display:none"  name="email_to" id="mul-2" multiple placeholder="Select">
          <option value="">To</option>
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
                                                                            <input type="text" class="form-control" name="subject" required placeholder="Subject">
                                                                        </div>
																		<div class="form-group">
																			<textarea class="form-control" id="discripation"  name="message"  placeholder="Message"></textarea>
																			<script type="text/javascript">CKEDITOR.replace("discripation");</script>
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
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/dropdown/js/mock.js"></script>
 <script src="<?php echo base_url(); ?>assets/dropdown/js/jquery.dropdown.js"></script>
 <script>
    var Random = Mock.Random;
    var json1 = Mock.mock({
      "data|10-50": [{
        name: function () {
          return Random.name(true)
        },
        "id|+1": 1,
        "disabled|1-2": true,
        groupName: 'Group Name',
        "groupId|1-4": 1,
        "selected": false
      }]
    });

    $('.dropdown-mul-1').dropdown({
      data: json1.data,
      limitCount: 40,
      multipleMode: 'label',
      choice: function () {
        // console.log(arguments,this);
      }
    });

    var json2 = Mock.mock({
      "data|10000-10000": [{
        name: function () {
          return Random.name(true)
        },
        "id|+1": 1,
        "disabled": false,
        groupName: 'Group Name',
        "groupId|1-4": 1,
        "selected": false
      }]
    });

    $('.dropdown-mul-2').dropdown({
     
      searchable: false
    });

    $('.dropdown-sin-1').dropdown({
      readOnly: true,
      input: '<input type="text" maxLength="20" placeholder="Search">'
    });

    $('.dropdown-sin-2').dropdown({
      data: json2.data,
      input: '<input type="text" maxLength="20" placeholder="Search">'
    });
  </script>