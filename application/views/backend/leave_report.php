<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>

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
                                                        <h4>Leave Report</h4>
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
                                                        
                                                        <li class="breadcrumb-item"><a href="#!">Leave Report</a> </li>
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


               
                <div class="page-body">

            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Report List  </h4>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="post" action="" id="salaryform" class="form-material row">
                                                <div class="form-group col-md-3">
                                                    <input type="text" name="datetime" id="date_from" class="form-control mydatetimepicker" placeholder="from" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <select class="select2 form-control custom-select col-md-8" data-placeholder="Choose a Category" tabindex="1" id="emid" name="emid" required>
                                                        <option value="#">Select Here</option>
                                                        <option value="all">All Employee</option>
                                                        <?php foreach($employee as $value): ?>
                                                        <option value="<?php echo $value->em_id ?>">
                                                            <?php echo $value->first_name.' '.$value->last_name; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <input type="submit" class="btn btn-success" value="Submit" name="submit" id="BtnSubmit">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    
                                        <thead>
                                            <tr>
                                                <th>PIN</th>
                                                <th>Employee</th>
                                                <th>Type</th>
                                                <th>Duration</th>
                                                <th>Start</th>
                                                <th>End</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>PIN</th>
                                                <th>Employee</th>
                                                <th>Type</th>
                                                <th>Duration</th>
                                                <th>Start</th>
                                                <th>End</th>
                                            </tr>
                                        </tfoot>
                                         <tbody style="color:green" class="leave">

                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            $(document).ready(function() {
                $("#BtnSubmit").on("click", function(event) {

                    event.preventDefault();

                    var emid = $('#emid').val();
                    var datetime = $('.mydatetimepicker').val();
                    console.log(datetime);
                    $.ajax({
                        url: "Get_LeaveDetails?date_time=" + datetime + "&emp_id=" + emid,
                        type: "GET",
                        data: 'data',
                        success: function(response) {
                            $('.leave').html(response);
                        }
                    });
                });
            });

        </script>
<?php $this->load->view('backend/footer'); ?>