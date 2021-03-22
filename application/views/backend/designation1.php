<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
	<section class="content">
        <div class="container-fluid">
            <div class="row block-header" style="background: #fff;padding: 10px;">
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <h2 style="padding: 5px;font-weight: 600;font-size: 22px;">
                   Designation
                    
                </h2>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				
					<ol class="breadcrumb" style="float: right;">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="active">Designation</li>
                            </ol>
				</div>
            </div>
			<div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php if (isset($editdesignation)) { echo 'Edit'; }else{echo 'Add';}?> Designation</h2>
                            
                        </div>
                        <div class="body">
						<?php echo validation_errors(); ?>
                            <?php echo $this->upload->display_errors(); ?>
                            <?php echo $this->session->flashdata('feedback'); ?>
                            <form id="form_validation" action="<?php if (isset($editdesignation)) { echo base_url().'organization/Update_des'; }else{ echo 'Save_des'; }?>" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="designation" id="firstName" <?php if (isset($editdesignation)) {?>value='<?php  echo $editdesignation->des_name;?>'<?php }?> minlength="3" required>
                                        <label class="form-label">Designation Name</label>
										<?php if (isset($editdesignation)) { ?>
										<input type="hidden" name="id" value="<?php  echo $editdesignation->id;?>">
										<?php } ?>
                                    </div>
                                </div>
                                
                                
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Designation List
                            </h2>
                            <?php echo $this->session->flashdata('delsuccess'); ?>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
											
                                                <th>Designation</th>
                                                <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>Designation</th>
                                                <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <?php foreach ($designation as $value) { ?>
                                            <tr>
                                                <td><?php echo $value->des_name;?></td>
                                                <td>
                                                    <a href="<?php echo base_url();?>organization/Edit_des/<?php echo $value->id?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="material-icons">mode_edit</i></a>
                                                    <a onclick="return confirm('Are you sure to delete this data?')" href="<?php echo base_url();?>organization/des_delete/<?php echo $value->id;?>" title="Delete" class="btn btn-sm btn-info waves-effect waves-light"><i class="material-icons">delete</i></a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
		 
            
                   
                
			</section>
    <?php $this->load->view('backend/footer'); ?>