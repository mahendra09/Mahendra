<div class="right_col" role="main">
	<div></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Booking </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Booking Person Name</th>
                          <th>Howmany Person</th>
                          <th>Date of Lunch/Dinner</th>
                          <th>Time</th>
                          <th>Contact</th>
                          <th>Offer Code</th>
                          <th>Restuarant Name</th>
                          <th>Restuarant Location</th>
                          <th>Message</th>
                          <th>Action</th>
                         
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php 
						if($book){
						foreach($book as $bookobj) {?>
                        <tr>
                          <td><?php echo $bookobj['booking_person_name']; ?></td>
                          <td><?php echo $bookobj['howmany_person']; ?></td>
                          <td><?php echo $bookobj['date_of_lunch_or_dinner']; ?></td>
                          <td><?php echo $bookobj['time']; ?></td>
                          <td><?php echo $bookobj['contact']; ?></td>
                          <td><?php echo $bookobj['offercode']; ?></td>
                          <td><?php echo $bookobj['res_name']; ?></td>
                          <td><?php echo $bookobj['restuarant_location']; ?></td>
                          <td><?php echo $bookobj['message']; ?></td>
                         <td>
							  <a href="<?php echo base_url().'specialadmin/booking/delete/'. $bookobj['book_id'] ?>" class="btn btn-danger">Delete</a></td>
                          
                        </tr>
						<?php }} ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>