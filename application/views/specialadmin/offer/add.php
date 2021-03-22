<div class="right_col" role="main">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
<div class="x_title">
                    <h2>Offer </h2>
                    
                    <div class="clearfix"></div>
                  </div>
<div class="x_content">
                    <br />
                    <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->
					
			 
					<?php echo $this->session->flashdata('success'); ?>
					
					 <?php echo validation_errors('<div class="alert alert-danger" style="color:#FF0000">','</div>'); ?>
					<?php echo form_open_multipart('specialadmin/offer/add','class="form-horizontal form-label-left"'); ?>
                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Show Offer Contain<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="offer" id="offer" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Promocode<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="promocode" id="promocode" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Restaurant<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="restaurant" class="form-control col-md-7 col-xs-12">
							<option value="">Select Restaurant</option>
							<?php
							if($ro){
								foreach($ro as $roobj) {
							?>
							<option value="<?php echo $roobj['ro_id']; ?>"><?php echo $roobj['restaurant_name']; ?></option>
							<?php }} ?>
						  </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Offer Price Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<select name="offer_type" id="offer_type" required="required"  class="form-control col-md-7 col-xs-12">
								<option value="">Select Offer Price Type</option>
								<option value="Rs.">Rs.</option>
								<option value="%">Percent</option>
							</select>
                          
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Offer Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="offer_price" id="offer_price" required="required"  class="form-control col-md-7 col-xs-12">
                          
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripation<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<textarea name="dis" id="dis" required="required"  class="form-control col-md-7 col-xs-12"></textarea>
                          
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Offer Image</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
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