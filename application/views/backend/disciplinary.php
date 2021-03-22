<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
	<div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4>Disciplinary</h4>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="<?php echo base_url(); ?>"> <i class="feather icon-home"></i> </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">Disciplinary</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
											<div class="col-12 ">
						<a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"  class="btn btn-primary waves-effect">
							<?php /* <i class="material-icons">add</i> */ ?>
							<span style="color: #fff;"> Add Disciplinary</span>
						</a>
						<a href="<?php echo base_url(); ?>employee/Employees" class="btn btn-primary waves-effect">
							<?php /* <i class="material-icons">list</i> */ ?>
							<span>Employee List</span>
						</a>
                        
                    </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->
									<div class="page-body">
			<div class="row clearfix">
                
				
					<div class="col-xl-12 col-md-12">
						<div class="card">
                                                <div class="card-header">
                                                    <h5>Disciplinary Action List</h5>
                                                    
                                                </div>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
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
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
						<!-- sample modal content -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel1">Disciplinary Notice</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="post" action="add_Desciplinary" id="btnSubmit" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    
                                                        <div class="form-group">
                                                            <label class="control-label">Employee Name</label>
                                                            <select class="form-control custom-select" name="emid" data-placeholder="Choose a Category" tabindex="1" value="" required>
                                                               <?php foreach($allemployees as $value): ?>
                                                                <option value="<?php echo $value['em_id'] ?>"><?php echo $value['first_name'].' '.$value['last_name']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Disciplinary Action</label>
                                                            <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="warning" value="">
                                                                <option value="Verbel Warning">Verbel Warning</option>
                                                                <option value="Writing Warning">Writing Warning</option>
                                                                <option value="Demotion">Demotion</option>
                                                                <option value="Suspension">Suspension</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Title</label>
                                                            <input type="text" name="title" value="" class="form-control" id="recipient-name1">
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
                </div>
            </div>
         </div>
		 </div>
		 </div>
		 </div>
		 
            
                   
                
    <?php $this->load->view('backend/footer'); ?>
	<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".disiplinary").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#btnSubmit').trigger("reset");
                                                $('#exampleModal').modal('show');
                                                $.ajax({
                                                    url: 'DisiplinaryByID?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#btnSubmit').find('[name="id"]').val(response.desipplinary.id).end();
                                                    $('#btnSubmit').find('[name="emid"]').val(response.desipplinary.em_id).end();
                                                    $('#btnSubmit').find('[name="warning"]').val(response.desipplinary.action).end();
                                                    $('#btnSubmit').find('[name="title"]').val(response.desipplinary.title).end();
                                                    $('#btnSubmit').find('[name="details"]').val(response.desipplinary.description).end();
												});
                                            });
                                        });
</script>