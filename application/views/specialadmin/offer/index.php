<div class="right_col" role="main">
	<div><a href="<?php echo base_url().'specialadmin/offer/add' ?>" class="btn btn-round btn-primary" style="float: right;">Add Offer</a></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
					<h2>Offer</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Offer Contain</th>
								<th>Restaurant Name</th>
								<th>Promocode</th>
								<th>Offer</th>
								<th>Descripation</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								if($offer){
									foreach($offer as $offerobj) {?>
							<tr>
								<td><?php echo $offerobj['offer']; ?></td>
								<td><?php echo $offerobj['restaurant_name']; ?></td>
								<td><?php echo $offerobj['promocode']; ?></td>
								<td><?php echo $offerobj['offer_price']; ?><?php echo $offerobj['offer_type']; ?></td>
								<td><?php echo $offerobj['dis']; ?></td>
								<td><img src="<?php echo public_path; ?>upload/<?php echo $offerobj['o_img']; ?>" width="100px" height="100px"> </td>
								<td><a href="<?php echo base_url().'specialadmin/offer/edit/'. $offerobj['offer_id'] ?>" class="btn btn-warning">Update</a>
									<a href="<?php echo base_url().'specialadmin/offer/delete/'. $offerobj['offer_id'] ?>" class="btn btn-danger">Delete</a></td>
							</tr>
							<?php }} ?>
						</tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>