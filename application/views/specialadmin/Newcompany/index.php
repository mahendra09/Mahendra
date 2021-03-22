<?php require_once(APPPATH.'views/specialadmin/Header.php');?>
<div class="right_col" role="main">
  <!-- <div><a href="<?php echo base_url().'specialadmin/slider/add' ?>" class="btn btn-round btn-primary" style="float: right;">Add Slider</a></div> -->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>New Company </h2>
          
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <?php echo $this->session->flashdata('success'); ?>       
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Company Name</th>
                <th>Phone Number</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
					    <?php 
						  if($company){
						  foreach($company as $companyobj) {?>
              <tr>
                <td><?php echo $companyobj['fname'].' '.$companyobj['lname']; ?></td>
                <td><?php echo $companyobj['email']; ?></td>
                <td><?php echo $companyobj['companyname']; ?></td>
                <td><?php echo $companyobj['phoneno']; ?></td>
                
                <td>
					<?php 
						if($companyobj['status'] == 'INACTIVE'){
					?>
							<a href="<?php echo base_url().'specialadmin/Newcompany/active/'. $companyobj['companyid'] ?>"   class="btn btn-warning">ACTIVE</a>
					<?php 
						}else{
					?>
							     <a href="<?php echo base_url().'specialadmin/Newcompany/inactive/'. $companyobj['companyid'] ?>" class="btn btn-danger">INACTIVE</a>
					<?php } ?>
                </td>
              </tr>
						  <?php }} ?>
                        
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
<?php require_once(APPPATH.'views/specialadmin/Footer.php');?>
<?php // include_once 'Footer.php'; ?>