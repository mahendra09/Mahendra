<div class="right_col" role="main">
	<div></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Event </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact No</th>
                          <th>Event Type</th>
                          <th>Howmany Person</th>
                          <th>Date of Event</th>
                          <th>Location</th>
                          <th>Food Type</th>
                          <th>Action</th>
                          
                          
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php 
						if($event){
						foreach($event as $eventobj) {?>
                        <tr>
                          <td><?php echo $eventobj['name']; ?></td>
                          <td><?php echo $eventobj['email']; ?></td>
                          <td><?php echo $eventobj['conno']; ?></td>
                          <td><?php echo $eventobj['event']; ?></td>
                          <td><?php echo $eventobj['howmany_person']; ?></td>
                          <td><?php echo $eventobj['date']; ?></td>
                          <td><?php echo $eventobj['location']; ?></td>
                          <td><?php echo $eventobj['food']; ?></td>
                          <td>
							  <a href="<?php echo base_url().'specialadmin/event/delete/'. $eventobj['ev_id'] ?>" class="btn btn-danger">Delete</a></td>
                          
                        </tr>
                         
                          
                        </tr>
						<?php }} ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>