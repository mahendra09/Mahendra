<!-- https://github.com/eboominathan/Basic-Crud-in-Full-Calendar-Using-Codeigniter-3.0.3/tree/master/fullcalendar
https://www.patchesoft.com/fullcalendar-with-php-and-codeigniter/
 -->
<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>

<style>
    .fc-fri {
        background-color: #FFEB3B;
    }
    .fc-event, .fc-event-dot {
        background-color: #FF5722;
    }
    .fc-event {
        border: 0;
    }
    .fc-day-grid-event {
        margin: 0;
        padding: 0;
    }
    .dayWithEvent {
        background: #FFEB3B;
        cursor: pointer;
    }
</style>
 <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
            <div class="message"></div>
            <div class="page-header">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4>Salary Count</h4>
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
                                                        
                                                        <li class="breadcrumb-item"><a href="#!">Holiday</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-12">
                   
                    </div>
                                    </div>
           
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
<!--
                <div class="row m-m-10">
                    <div class="col-12">
                        <div class="card-body b-l calender-sidebar">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

                 CALENDAR MODAL 
                <div class="modal none-border" id="my-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add Event</strong></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>-->

               
                <div class="page-body">

            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Salary  </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    
                                        <thead>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>EMPLOYEE Id </th>
                                                <th>Total Leave</th>
                                                <th>Total Unapid Leave</th>
                                                <th>Total Salary</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>EMPLOYEE Id </th>
                                                <th>Total Leave</th>
                                                <th>Total Unapid Leave</th>
                                                <th>Total Salary</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php foreach($employee as $value): ?>
                                            <tr>
                                                <td><?php echo $value['first_name'].' '.$value['last_name']; ?></td>
                                                <td><?php echo $value['em_code']; ?></td>
                                                <td><?php ?></td>
                                                <td><?php echo $value->number_of_days; ?></td>
                                                <td><?php echo $value->year; ?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="" title="Edit" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> hidden <?php } ?> class="btn btn-sm btn-info waves-effect waves-light holiday" data-id="<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a onclick="confirm('Are you sure want to delet this Value?')" href="<?php echo base_url(); ?>leave/Holidaysdelete/<?php echo $value->id ?>" title="Delete" <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?> hidden <?php } ?> class="btn btn-sm btn-info waves-effect waves-light holidelet" data-id="<?php echo $value->id; ?>"><i class="fa fa-trash-o"></i></a>
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
            </div>
                        <div class="modal fade" id="holysmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Holidays</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Holidays" id="holidayform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        
                                            <div class="form-group">
                                                <label class="control-label">Holidays name</label>
                                                <input type="text" name="holiname" class="form-control" id="recipient-name1" minlength="4" maxlength="25" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Holidays Start Date</label>
                                                <input type="text" name="startdate" class="form-control mydatetimepickerFull" id="recipient-name1"  value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Holidays End Date</label>
                                                <input type="text" name="enddate" class="form-control mydatetimepickerFull" id="recipient-name1" value="">
                                            </div><!--
                                            <div class="form-group">
                                                <label class="control-label">Number of Days</label>
                                                <input type="number" name="nofdate" class="form-control" id="recipient-name1" readonly required>
                                            </div>-->
                                            <!--<div class="form-group">
                                                <label for="message-text" class="control-label"> Year</label>
                                                <input class="form-control mydatetimepicker" name="year" id="message-text1" required>
                                            </div> -->                                          
                                        
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">                                       
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div></div></div>
                <script>
/*    $('#holidayform').find('[name="enddate"]').on("change", function() {
      //console.log('Yes');
      var date1 = new Date($('#holidayform').find('[name="startdate"]').val());
      var date2 = new Date($('#holidayform').find('[name="enddate"]').val());
      var timeDiff = Math.abs(date2.getTime() - date1.getTime());
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        console.log(date1);
        if(date1.length > '0'){
        $('#holidayform').find('[name="nofdate"]').val('1').end();
        } else if(date2.length > '0') {
         $('#holidayform').find('[name="nofdate"]').val(diffDays).end();   
        }
    });*/
                
                </script>                        
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".holiday").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#holidayform').trigger("reset");
                                                $('#holysmodel').modal('show');
                                                $.ajax({
                                                    url: 'Holidaybyib?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#holidayform').find('[name="id"]').val(response.holidayvalue.id).end();
                                                    $('#holidayform').find('[name="holiname"]').val(response.holidayvalue.holiday_name).end();
                                                    $('#holidayform').find('[name="startdate"]').val(response.holidayvalue.from_date).end();
                                                    $('#holidayform').find('[name="enddate"]').val(response.holidayvalue.to_date).end();
                                                    $('#holidayform').find('[name="nofdate"]').val(response.holidayvalue.number_of_days).end();
                                                    $('#holidayform').find('[name="year"]').val(response.holidayvalue.year).end();
												});
                                            });
                                        });
</script>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".holidelet").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $.ajax({
                                                    url: 'HOLIvalueDelet?id=' + iid,
                                                    method: 'GET',
                                                    data: 'data',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                                                    window.setTimeout(function(){location.reload()},2000)
                                                    // Populate the form fields with the data returned from server
												});
                                            });
                                        });
</script>                              
<?php $this->load->view('backend/footer'); ?>