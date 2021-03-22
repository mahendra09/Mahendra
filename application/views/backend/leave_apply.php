<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<script src="<?php echo base_url(); ?>assets\js\jquery-1.11.0.min.js"></script>
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
                                                        <h4>Application</h4>
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
                                                        <li class="breadcrumb-item"><a href="#!">Leave Application</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
											<div class="col-12 ">
						<?php /* <a href="<?php echo base_url(); ?>employee/Add_employee" class="btn btn-primary waves-effect">
							<?php /* <i class="material-icons">add</i> / ?>
							<span> Add Employee</span>
						</a>
						<a href="<?php echo base_url(); ?>employee/Disciplinary" class="btn btn-primary waves-effect">
							<?php /* <i class="material-icons">list</i> / ?>
							<span> Disciplinary List</span>
						</a> */ ?>
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#appmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Apply </a></button>
                <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>leave/Holidays" class="text-white"><i class="" aria-hidden="true"></i>  Holiday List</a></button>
                    </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->
									<div class="page-body">
			<div class="row clearfix">
                
				
					<div class="col-xl-12 col-md-12">
						<div class="card">
                                                <div class="card-header">
                                                    <h5>Application List</h5>
                                                    
                                                </div>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                            <tr>
                                                               
																<th>Leave Type</th>
																<th>Apply Date</th>
																<th>start Date</th>
																<th>End Date</th>
																<th>Leave Duration</th>
																<th>Leave Status</th>
																<th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
																
																<?php foreach($application as $value): ?>
                                    <tr style="vertical-align:top">
                                        
                                        
                                        <td><?php echo $value->name; ?></td>
                                        <td><?php echo date('jS \of F Y',strtotime($value->apply_date)); ?></td>
                                        <td><?php echo date('jS \of F Y',strtotime($value->start_date)); ?></td>
                                        <td><?php echo date('jS \of F Y',strtotime($value->end_date)); ?></td>
                                        <td><?php echo $value->leave_duration; ?></td>
                                        <td><?php echo $value->leave_status; ?></td>
                                      
                                        <td class="jsgrid-align-center">
                                            <?php if($value->leave_status =='Approve'){ ?>
												-
                                            <?php } elseif($value->leave_status =='Not Approve'){ ?>
                                            <a href="<?php echo base_url(); ?>/leave/cancelleave/<?php echo $value->id; ?>" title="Cancel" class="btn btn-sm btn-info waves-effect waves-light" >Cancel</a>
											<a href="" title="Edit" class="btn btn-sm btn-info waves-effect waves-light leaveapp" data-id="<?php echo $value->id; ?>" ><i class="fa fa-pencil-square-o"></i> Edit</a>
                                            
                                            <?php } elseif($value->leave_status =='Rejected'){ ?>
											-
                                            <?php }elseif($value->leave_status =='Cancel'){ ?>
											<a href="" title="Edit" class="btn btn-sm btn-info waves-effect waves-light leaveapp" data-id="<?php echo $value->id; ?>" ><i class="fa fa-pencil-square-o"></i> Edit</a>
											<?php } ?>
                                            
                                        </td>
                                        
                                    </tr>
                                    <?php endforeach; ?>
														   
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                               
																<th>Leave Type</th>
																<th>Apply Date</th>
																<th>start Date</th>
																<th>End Date</th>
																<th>Leave Duration</th>
																<th>Leave Status</th>
																<th>Action</th>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
						
                </div>
            </div>
         </div>
		 </div>
		 </div>
		 </div>
		 <div class="modal fade" id="appmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Leave Application</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="post" action="Add_Applications" id="leaveapply" enctype="multipart/form-data">
                        <div class="modal-body">
                            
                            <div class="form-group">
                                
								<input type="hidden" name="emid" value="<?php echo $employee->em_id ?>">
                            </div>
                            <div class="form-group">
                                <label>Leave Type</label>
                                <select class="form-control custom-select assignleave"  tabindex="1" name="typeid" id="leavetype" required>
                                    <option value="">Select Here..</option>
                                    <?php foreach($leavetypes as $value): ?>

                                    <option value="<?php echo $value->type_id ?>"><?php echo $value->name ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!--<div class="form-group">
                                <span style="color:red" id="total"></span>
								<label></label>
                                <div class="span pull-right">
                                    <button class="btn btn-info fetchLeaveTotal">Fetch Total Leave</button>
                                </div>
                                <br>
                            </div> -->
                            <div class="form-group">
                                <label class="control-label">Leave Duration</label><br>
                                <input name="type" type="radio" id="radio_1" data-value="Half" class="duration" value="Half Day" checked="">
                                <label for="radio_1">Half Day</label>
                                <input name="type" type="radio" id="radio_2" data-value="Full" class="type" value="Full Day">
                                <label for="radio_2">Full Day</label>
                                <input name="type" type="radio" class="with-gap duration" id="radio_3" data-value="More" value="More than One day">
                                <label for="radio_3">Above a Day</label>
                            </div>
                            <div class="form-group">
                                <label class="control-label" id="hourlyFix">Date</label>
                                <input type="date" name="startdate" class="form-control" id="recipient-name1" required>
                            </div>
                            <div class="form-group" id="enddate" style="display:none">
                                <label class="control-label">End Date</label>
                                <input type="date" name="enddate" class="form-control" id="recipient-name1">
                            </div>

                            <div class="form-group" id="hourAmount">
                                <label>Session</label>
                                <select  id="hourAmountVal" class=" form-control custom-select"  tabindex="1" name="hourAmount">
                                    <option value="">Select Hour</option>
                                    <option value="Session 1">Session 1</option>
                                    <option value="Session 2">Session 2</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Reason</label>
                                <textarea class="form-control" name="reason" id="message-text1" required minlength="10"></textarea>                                                
                            </div>
                            
                        </div>
						
                        <script>
                        $(document).ready(function () {
                            $('#leaveapply input').on('change', function(e) {
                                e.preventDefault(e);

                                // Get the record's ID via attribute  
                                var duration = $('input[name=type]:checked', '#leaveapply').attr('data-value');

                                if(duration =='Half'){
                                    $('#enddate').hide();
                                    $('#hourlyFix').text('Date');
                                    $('#hourAmount').show();
                                }
                                else if(duration =='Full'){
                                    $('#enddate').hide();  
                                    $('#hourAmount').hide();  
                                    $('#hourlyFix').text('Start date');  
                                }
                                else if(duration =='More'){
                                    $('#enddate').show();
                                    $('#hourAmount').hide();
                                }
                            });
                        }); 
                        </script>
                        <div class="modal-footer">
                            <input type="hidden" name="id" class="form-control" id="recipient-name1" required>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		
<script>
    $(document).ready(function () {

        $('.fetchLeaveTotal').on('click', function (e) {
            e.preventDefault();
            var selectedEmployeeID = $('.selectedEmployeeID').val();
            var leaveTypeID = $('.assignleave').val();
            console.log(selectedEmployeeID, leaveTypeID);
            $.ajax({
                url: 'LeaveAssign?leaveID=' + leaveTypeID + '&employeeID=' +selectedEmployeeID,
                method: 'GET',
                data: '',
            }).done(function (response) {
                //console.log(response);
                $("#total").html(response);
            });
        });
    });
</script>
        <script type="text/javascript">
            $('#duration').on('input', function() {
                var day = parseInt($('#duration').val());
                console.log('gfhgf');
                var hour = 8;
                $('.totalhour').val((day * hour ? day * hour : 0).toFixed(2));

            });
        </script>
        <!-- Set leaves approved for ADMIN? -->
        <script type="text/javascript">
            $(document).ready(function() {
                $(".leaveapproval").click(function(e) {
                    e.preventDefault(e);
                    // Get the record's ID via attribute
                    var iid = $(this).attr('data-id');
                    $('#leaveapplyval').trigger("reset");
                    $('#appmodelcc').modal('show');
                    $.ajax({
                        url: 'LeaveAppbyid?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).done(function(response) {
                        console.log(response);
                        // Populate the form fields with the data returned from server
                        $('#leaveapplyval').find('[name="id"]').val(response.leaveapplyvalue.id).end();
                        $('#leaveapplyval').find('[name="emid"]').val(response.leaveapplyvalue.em_id).end();
                        $('#leaveapplyval').find('[name="applydate"]').val(response.leaveapplyvalue.apply_date).end();
                        $('#leaveapplyval').find('[name="typeid"]').val(response.leaveapplyvalue.typeid).end();
                        $('#leaveapplyval').find('[name="startdate"]').val(response.leaveapplyvalue.start_date).end();
                        $('#leaveapplyval').find('[name="enddate"]').val(response.leaveapplyvalue.end_date).end();
                        $('#leaveapplyval').find('[name="duration"]').val(response.leaveapplyvalue.leave_duration).end();
                        $('#leaveapplyval').find('[name="reason"]').val(response.leaveapplyvalue.reason).end();
                        $('#leaveapplyval').find('[name="status"]').val(response.leaveapplyvalue.leave_status).end();
                    });
                });
            });
        </script>
            
        <script type="text/javascript">
            $(document).ready(function() {
                $(".leaveapp").click(function(e) {
                    e.preventDefault(e);
                    // Get the record's ID via attribute
                    var iid = $(this).attr('data-id');
                    $('#leaveapply').trigger("reset");
                    $('#appmodel').modal('show');
                    $.ajax({
                        url: 'LeaveAppbyid?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).done(function(response) {
                        // console.log(response);
                        // Populate the form fields with the data returned from server
                        $('#leaveapply').find('[name="id"]').val(response.leaveapplyvalue.id).end();
                        $('#leaveapply').find('[name="emid"]').val(response.leaveapplyvalue.em_id).end();
                        $('#leaveapply').find('[name="applydate"]').val(response.leaveapplyvalue.apply_date).end();
                        $('#leaveapply').find('[name="typeid"]').val(response.leaveapplyvalue.typeid).end();
                        $('#leaveapply').find('[name="startdate"]').val(response.leaveapplyvalue.start_date).end();
                        $('#leaveapply').find('[name="enddate"]').val(response.leaveapplyvalue.end_date).end();
                        $('#leaveapply').find('[name="reason"]').val(response.leaveapplyvalue.reason).end();
                        $('#leaveapply').find('[name="status"]').val(response.leaveapplyvalue.leave_status).end();

                        if(response.leaveapplyvalue.leave_type == 'Half day') {
                            $('#appmodel').find(':radio[name=type][value="Half Day"]').prop('checked', true).end();
                            $('#hourAmount').show().end();
                            $('#enddate').hide().end();
                        } else if(response.leaveapplyvalue.leave_type == 'Full Day') {
                            $('#appmodel').find(':radio[name=type][value="Full Day"]').prop('checked', true).end();
                            $('#hourAmount').hide().end();
                        } else if(response.leaveapplyvalue.leave_type == 'More than One day'){
                            $('#appmodel').find(':radio[name=type][value="More than One day"]').prop('checked', true).end();
                            $('#hourAmount').hide().end();
                            $('#enddate').show().end();
                        }

                        $('#hourAmountVal').val(response.leaveapplyvalue.leave_duration).show().end();
                    });
                });
            });
        </script>             
                
    <?php $this->load->view('backend/footer'); ?>