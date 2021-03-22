<div class="right_col" role="main">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
<div class="x_title">
                    <h2>Product </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
<div class="x_content">
                    <br />
                    <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->
					
			 
					<?php echo $this->session->flashdata('success'); ?>
					
					 <?php echo validation_errors('<div class="alert alert-danger" style="color:#FF0000">','</div>'); ?>
					<?php echo form_open_multipart('specialadmin/product/add','class="form-horizontal form-label-left"'); ?>
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Page Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="page_title" id="page_title" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Keyword <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="meta_keyword" id="meta_keyword" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Discripation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="meta_discripation" id="meta_discripation" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<select name="category" class="form-control col-md-7 col-xs-12">
								<option value="">Select Category</option>
								 <?php 
									if($category){
										foreach($category as $categoryobj) {?>
										<option value="<?php echo $categoryobj['c_id']; ?>"><?php echo $categoryobj['c_name']; ?></option>
									<?php }} ?>
							</select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subcategory <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<select name="subcategory" class="form-control col-md-7 col-xs-12">
								<option value="">Select Subcategory</option>
								 <?php 
									if($subcategory){
										foreach($subcategory as $subcategoryobj) {?>
										<option value="<?php echo $subcategoryobj['sc_id']; ?>"><?php echo $subcategoryobj['sc_name']; ?></option>
									<?php }} ?>
							</select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" id="name" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Discription <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<textarea name="pdis" id="comment"></textarea>
							<script type="text/javascript">CKEDITOR.replace("comment");</script>
						
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Image 1</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <input id="img1" name="img1" type="file">
						  
						  <br>
						  
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Image 2</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <input id="img2" name="img2" type="file">
						  
						  <br>
						  
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Image 3</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <input id="img3" name="img3" type="file">
						  
						  <br>
						  
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
					  
					  
					  
                    </form>
					
					
					
                      
                    

                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </div>

</div>

                  </div>
                  </div>
                  </div>
</div>