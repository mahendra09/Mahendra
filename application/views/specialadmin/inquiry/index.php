<div class="right_col" role="main">
  

            <div><a href="<?php echo base_url().'admin/slider/add' ?>" class="btn btn-round btn-primary" style="float: right;">Add Slider</a></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Inquiry </h2>
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
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
						  <th>Contact</th>
						  
						  <th>Message</th>
						  <th>Date</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php 
						if($inquiry){
						foreach($inquiry as $inquiryobj) {?>
                        <tr>
                          <td><?php echo $inquiryobj['name']; ?></td>
						  <td><?php echo $inquiryobj['email']; ?></td>
						  <td><?php echo $inquiryobj['contact']; ?></td>
						  
						  <td><?php echo $inquiryobj['message']; ?></td>
						  <td><?php echo $inquiryobj['date']; ?></td>
                          
                          <td><a href="<?php echo base_url().'specialadmin/inquiry/delete/'. $inquiryobj['in_id'] ?>" class="btn btn-danger">Delete</a></td>
                          
                        </tr>
						<?php }} ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>