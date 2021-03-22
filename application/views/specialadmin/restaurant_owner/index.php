<div class="right_col" role="main">
  

            <div><a href="<?php echo base_url().'specialadmin/restaurant_owner/add' ?>" class="btn btn-round btn-primary" style="float: right;">Restaurant Owner</a></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Restaurant Owner </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php echo $this->session->flashdata('success'); ?>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Owner Name</th>
                          <th>Restaurant Name</th>
                          <th>Address</th>
                          <th>Contact No</th>
                          <th>Email</th>
                          <th>User Name</th>
                          <th>Status</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php 
						if($ro){
						foreach($ro as $roobj) {?>
                        <tr>
                          <td><?php echo $roobj['name']; ?></td>
                          <td><?php echo $roobj['restaurant_name']; ?></td>
                          <td><?php echo $roobj['address']; ?></td>
                          <td><?php echo $roobj['conno']; ?></td>
                          <td><?php echo $roobj['email']; ?></td>
                          <td><?php echo $roobj['uname']; ?></td>
						<td><?php if($roobj['status'] == '0'){ ?>
							<a href="<?php echo base_url().'specialadmin/restaurant_owner/approve/'. $roobj['ro_id'] ?>" class="btn btn-warning">Approve</a>
						<?php }else{ ?>
							<a href="<?php echo base_url().'specialadmin/restaurant_owner/disapprove/'. $roobj['ro_id'] ?>" class="btn btn-danger">Disapprove</a></td>
						<?php } ?>
						</td>
                          
                          <td><a href="<?php echo base_url().'specialadmin/restaurant_owner/edit/'. $roobj['ro_id'] ?>" class="btn btn-warning">Update</a>
							  <a href="<?php echo base_url().'specialadmin/restaurant_owner/delete/'. $roobj['ro_id'] ?>" class="btn btn-danger">Delete</a></td>
                          
                        </tr>
						<?php }} ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>