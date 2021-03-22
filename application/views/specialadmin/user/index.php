<div class="right_col" role="main">
  

            <div><a href="<?php echo base_url().'specialadmin/user/add' ?>" class="btn btn-round btn-primary" style="float: right;">Add User</a></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php echo $this->session->flashdata('success'); ?>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Contact No</th>
                          <th>Email</th>
                          <th>User Name</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php 
						if($user){
						foreach($user as $userobj) {?>
                        <tr>
                          <td><?php echo $userobj['name']; ?></td>
                          <td><?php echo $userobj['address']; ?></td>
                          <td><?php echo $userobj['conno']; ?></td>
                          <td><?php echo $userobj['email']; ?></td>
                          <td><?php echo $userobj['uname']; ?></td>
                          
                          <td><a href="<?php echo base_url().'specialadmin/user/edit/'. $userobj['uid'] ?>" class="btn btn-warning">Update</a>
							  <a href="<?php echo base_url().'specialadmin/user/delete/'. $userobj['uid'] ?>" class="btn btn-danger">Delete</a></td>
                          
                        </tr>
						<?php }} ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>