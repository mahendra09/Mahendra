<?php require_once(APPPATH.'views/specialadmin/Header.php');?>
<div class="right_col" role="main">
 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
<div class="x_title">
                    <h2>Slider </h2>
                    
                    <div class="clearfix"></div>
                  </div>
<div class="x_content">
                    <br />
                    <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->
					
			 
					<?php echo $this->session->flashdata('success'); ?>
					
					 <?php echo validation_errors('<div class="alert alert-danger" style="color:#FF0000">','</div>'); ?>
					<?php echo form_open_multipart('specialadmin/slider/edit/'.$sl_id,'class="form-horizontal form-label-left"'); ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" id="name" required="required" value="<?php echo $slider[0]['sl_name']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Slider Image</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<?php if($slider[0]['img'] != NULL){ ?>
							<img Src="<?php echo public_path; ?>slider/<?php echo $slider[0]['img']; ?>" width="100px" height="100px">
							<?php } ?>
							<br><br>
                          <input id="img" name="img" type="file">
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

<?php require_once(APPPATH.'views/specialadmin/Footer.php');?>