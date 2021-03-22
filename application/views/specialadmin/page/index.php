<div class="right_col" role="main">

             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
<div class="x_title">
                    <h2>Page </h2>
                   
                    <div class="clearfix"></div>
                  </div>
<div class="x_content">
                    <br />
                    <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->
					
			 
					<?php echo $this->session->flashdata('success'); ?>
					
					 <?php echo validation_errors('<div class="alert alert-danger" style="color:#FF0000">','</div>'); ?>
					<?php echo form_open_multipart('specialadmin/page/index/'.$p_id,'class="form-horizontal form-label-left"'); ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Page Title <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="page_title" id="page_title" required="required" value="<?php echo $page[0]['page_title']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Keyword <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="meta_keyword" id="meta_keyword" required="required" value="<?php echo $page[0]['meta_keywrod']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Discripation <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="meta_discripation" id="meta_discripation" required="required" value="<?php echo $page[0]['meta_discripation']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <?php if($p_id != 2){ ?>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="name" id="name" required="required" value="<?php echo $page[0]['p_title']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Page Discripation</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
	                      <textarea name="details" id="comment"><?php echo $page[0]['p_dis']; ?> </textarea>
							<script type="text/javascript">CKEDITOR.replace("comment");</script>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Banner Image</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
							<img src="<?php echo public_path; ?>banner/<?php echo $page[0]['bannerimg']; ?>" height="100px" width="100px">
							<input type="file" name="banner">
                        </div>
                      </div>
					  <?php } ?>
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

 

