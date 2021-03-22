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
                                                        <h4>Payroll View</h4>
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
                                                        
                                                        <li class="breadcrumb-item"><a href="#!">Payroll View</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                          <button type="button" class="btn btn-primary">
                                            <i class="fa fa-bars">
                                            </i>
                                            <a href="<?php
                                                     echo base_url();
                                                     ?>Payroll/Salary_Type" class="text-white">
                                              <i class="" aria-hidden="true">
                                              </i>   Payroll List
                                            </a>
                                        </button>     
                  
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
                                <h4> Monthly Payroll List  </h4>
                            </div>

                            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="" id="salaryform" class="form-material row">
                                    <div class="form-group col-md-3">
                                        <select class="form-control custom-select"  tabindex="1" name="emid" id="emid" style="margin-top: 23px" required>
                                        <option>Employee</option>
                                         <?php foreach($employee as $value): ?>
                                         <option value="<?php echo $value->em_id; ?>">
                                            <?php echo $value->first_name ?>
                                            <?php echo $value->last_name ?>
                                         </option>
                                         <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label>
                                      </label>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <div class='input-group date' id=''>
                                            <input type='text' name="datetime" class="form-control mydatetimepicker" placeholder="Month"/>
                                          </div>
                                        </div>
                                      </div>
                                    </div> 
                                      <div class="form-group col-md-3">
                                      <button style="float:left;margin-top:23px" type="submit" id="BtnSubmit" class="btn btn-primary">Submit</button>          
                                       </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>            

<div class="salaryr">

            </div>
                       <button type='button' class='btn btn-primary print_payslip_btn' id='print_payslip_btn'><i class='fa fa-print'></i><i class='' aria-hidden='true' onclick='printDiv()'></i>  Print</button>      
                        </div>
                    </div>
                </div>
            </div>
             <script>
        $('.print_payslip_btn').hide();
        // Populate the payroll table to generate the payroll for each individual
      $("#BtnSubmit").on("click", function(event){
        event.preventDefault();
        var emid = $('#emid').val();
        var datetime = $('.mydatetimepicker').val();
        
        $.ajax({
          url: "load_employee_Invoice_by_EmId_for_pay?date_time="+datetime+"&emid="+emid,
          type:"GET",
          dataType:'',
          data:'data',          
          success: function(response) {
            // console.log(response);
            $('.salaryr').html(response);
              $('.print_payslip_btn').show();
          },
          error: function(response) {
            
          }
        });
      });
    </script>


                               
<?php $this->load->view('backend/footer'); ?>
 <script src="<?php echo base_url(); ?>assets/js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {
        $(".print_payslip_btn").click(function() {
            console.log('sfsdfs');
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.salaryr").printArea(options);
        });
    });
    </script>