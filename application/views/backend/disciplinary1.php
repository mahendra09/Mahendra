<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
        <section class="content">
        <div class="container-fluid">
            <div class="row block-header" style="background: #fff;padding: 10px;">
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <h2 style="padding: 5px;font-weight: 600;font-size: 22px;">
                   Disciplinary
                    
                </h2>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				
					<ol class="breadcrumb" style="float: right;">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="active">Disciplinary</li>
                            </ol>
				</div>
				<div class="col-12 ">
						<a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"  class="btn btn-primary waves-effect">
							<i class="material-icons">add</i>
							<span> Add Disciplinary</span>
						</a>
						<a href="<?php echo base_url(); ?>employee/Employees" class="btn btn-primary waves-effect">
							<i class="material-icons">list</i>
							<span>Employee List</span>
						</a>
                        
                    </div>
            </div>
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Disciplinary Action List
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                                <th>PIN</th>
                                                <th>Title </th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Employee Name</th>
                                                <th>PIN</th>
                                                <th>Title </th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($desciplinary as $value): ?>
                                            <tr>
                                                <td ><?php echo $value->first_name.' '.$value->last_name; ?></td>
                                                <td ><?php echo $value->em_code; ?></td>
                                                <td ><?php echo substr("$value->title",0,15).'...' ?></td>
                                                <td><?php echo substr("$value->description",0,10).'...' ?> </td>
                                                <td><button class="btn btn-sm btn-success"><?php echo $value->action; ?></button></td>
                                                <td  class="jsgrid-align-center ">
                                                    <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light disiplinary" data-id="<?php echo $value->id; ?>"><i class="material-icons">mode_edit</i></a>
                                                    <a href="DeletDisiplinary?D=<?php echo $value->id; ?>" onclick="confirm('Are you sure want to delet this value?')" title="Delete" class="btn btn-sm btn-info waves-effect waves-light"><i class="material-icons">delete</i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
	
	<!-- sample modal content -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel1">Disciplinary Notice</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                
                                                <form id="form_validation" id="btnSubmit" action="add_Desciplinary" method="POST" enctype="multipart/form-data">
												<div class="modal-body">
														
														<div class="form-group form-float">
															
														
															<div class="form-line">
																<select class="form-control"  id="firstName" name="emid" data-placeholder="Choose a Category" tabindex="1" value="" required style="margin-top: 15px;">
																<option>Select Employee Name</option>
																<?php foreach($allemployees as $value): ?>
                                                                <option value="<?php echo $value->em_id ?>"><?php echo $value->first_name.' '.$value->last_name ?></option>
                                                                <?php endforeach; ?>
																</select>
																
																
																
																
															</div>
														</div>
														<div class="form-group form-float">
															<div class="form-line">
																<select class="form-control"data-placeholder="Choose a Category" tabindex="1" name="warning" value="">
																<option>Disciplinary Action</option>
																<option value="Verbel Warning">Verbel Warning</option>
                                                                <option value="Writing Warning">Writing Warning</option>
                                                                <option value="Demotion">Demotion</option>
                                                                <option value="Suspension">Suspension</option>
																</select>
																
																
																
															</div>
														</div>
														<div class="form-group form-float">
															<div class="form-line">
																<input type="text" class="form-control" name="title" value="" id="recipient-name1">
																<label class="form-label">Title</label>
																
															</div>
														</div>
														<div class="form-group form-float">
															<div class="form-line">
																<textarea class="form-control" value="" name="details" id="message-text1" rows="4"></textarea>
																<label class="form-label">Details</label>
																
															</div>
														</div>
														
                                                        
                                                        

                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label">Details</label>
                                                            <textarea class="form-control" value="" name="details" id="message-text1" rows="4"></textarea>
                                                        </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                   <input type="hidden" name="id" value="">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->
<?php $this->load->view('backend/footer'); ?>
<script>
    $('#employees123').DataTable({
        "aaSorting": [[1,'asc']],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>