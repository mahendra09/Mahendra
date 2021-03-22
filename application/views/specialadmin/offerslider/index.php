<div class="right_col" role="main">
  

            <div><a href="<?php echo base_url().'specialadmin/offerslider/add' ?>" class="btn btn-round btn-primary" style="float: right;">Add Offer Slider</a></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Offer Slider </h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Image</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php 
						if($slider){
						foreach($slider as $sliderobj) {?>
                        <tr>
                          <td><?php echo $sliderobj['sl_name']; ?></td>
                          <td><img src="<?php echo public_path; ?>slider/<?php echo $sliderobj['img']; ?>" width="100px" height="100px"> </td>
                          <td><a href="<?php echo base_url().'specialadmin/offerslider/edit/'. $sliderobj['os_id'] ?>" class="btn btn-warning">Update</a>
							  <a href="<?php echo base_url().'specialadmin/offerslider/delete/'. $sliderobj['os_id'] ?>" class="btn btn-danger">Delete</a></td>
                          
                        </tr>
						<?php }} ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>