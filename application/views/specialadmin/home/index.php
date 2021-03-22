<div class="right_col" role="main">

             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
<div class="x_title">
                    <h2>Home </h2>
                   
                    <div class="clearfix"></div>
                  </div>
<div class="x_content">
                    <br />
                    <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->
					
			 
					<?php echo $this->session->flashdata('success'); ?>
					
					 <?php echo validation_errors('<div class="alert alert-danger" style="color:#FF0000">','</div>'); ?>
					<?php echo form_open_multipart('specialadmin/home/index','class="form-horizontal form-label-left"'); ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Page Title <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="page_title" id="page_title"  value="<?php echo $page[0]['pagetitle']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Keyword <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="meta_keyword" id="meta_keyword"  value="<?php echo $page[0]['pagekeyword']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Discripation <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="meta_discripation" id="meta_discripation"  value="<?php echo $page[0]['pagedec']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">About <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="name" id="name" required="required" value="<?php echo $page[0]['p_title']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">About Us</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
	                      <textarea name="aboutus" id="aboutus"><?php echo $page[0]['aboutus']; ?> </textarea>
							<script type="text/javascript">CKEDITOR.replace("aboutus");</script>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">About Img <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="file" name="aboutimg" id="aboutimg"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Call Action</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
	                      <textarea name="callaction" id="callaction"><?php echo $page[0]['callaction']; ?> </textarea>
							<script type="text/javascript">CKEDITOR.replace("callaction");</script>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
	                      <textarea name="address" id="address"><?php echo $page[0]['address']; ?> </textarea>
							<script type="text/javascript">CKEDITOR.replace("address");</script>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="mobileno" id="aboutimg"  value="<?php echo $page[0]['mobileno']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="email" name="email" id="aboutimg"  value="<?php echo $page[0]['email']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Map</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
	                      <textarea name="map" id="map"><?php echo $page[0]['map']; ?> </textarea>
							<script type="text/javascript">CKEDITOR.replace("map");</script>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">facebook <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="facebook" id="aboutimg"  value="<?php echo $page[0]['facebook']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">twitter <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="twitter" id="aboutimg"  value="<?php echo $page[0]['twitter']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">instagram <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="instagram" id="aboutimg"  value="<?php echo $page[0]['instagram']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">googlepluse <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="googlepluse" id="aboutimg"  value="<?php echo $page[0]['googlepluse']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">linkedin <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="linkedin" id="aboutimg"  value="<?php echo $page[0]['linkedin']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  
					  
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                  </div>
                  </div>

</div>

 

