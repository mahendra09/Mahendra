<?php 
$id = $this->session->userdata('user_login_id');
$basicinfo = $this->employee_model->GetBasic($id); 
?>  
<div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
								
								<?php  if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
								<li class="">
                                    <a href="<?php echo base_url(); ?>">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Home</span>
                                    </a>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Me</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?php echo base_url(); ?>Attendance/Employee_Attendance?I=<?php echo base64_encode($basicinfo->em_id); ?>">
                                                <span class="pcoded-mtext">Attendance</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>leave/EmApplication">
                                                <span class="pcoded-mtext">Leave</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="#">
                                                <span class="pcoded-mtext">Expenses & Travel</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Leave</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?php echo base_url(); ?>leave/EmApplication">
                                                <span class="pcoded-mtext">My Leave</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <span class="pcoded-mtext">Leave Balances</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="<?php echo base_url(); ?>leave/leavecalendar">
                                                <span class="pcoded-mtext">Leave Calendar</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="<?php echo base_url(); ?>leave/holidaycalendar">
                                                <span class="pcoded-mtext">Holiday Calendar</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url(); ?>Email">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Email</span>
                                    </a>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">My Team</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="#">
                                                <span class="pcoded-mtext">Summary</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">My Finances</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="#">
                                                <span class="pcoded-mtext">Summary</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="#">
                                                <span class="pcoded-mtext">My Pay</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="#">
                                                <span class="pcoded-mtext">Preferences</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="#">
                                                <span class="pcoded-mtext">Loan</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url(); ?>Projects/All_Tasks">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">To Do</span>
                                    </a>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url(); ?>Projects/Project_issue">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Assigned Issue</span>
                                    </a>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">ORG</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>employee/employeesdirectory">
                                                <span class="pcoded-mtext">Employee</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="#">
                                                <span class="pcoded-mtext">Document</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="#">
                                                <span class="pcoded-mtext">Engage</span>
                                            </a>
                                        </li>
										
                                    </ul>
                                </li>
								<?php /*
								<li> 
									<a  href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id); ?>">
										<span class="pcoded-micon"><i class="feather icon-home"></i></span>
										<span class="pcoded-mtext">Employees </span>
									</a>
								</li>
								<li> 
									<a  href="<?php echo base_url(); ?>Attendance/Employee_Attendance?I=<?php echo base64_encode($basicinfo->em_id); ?>">
										<span class="pcoded-micon"><i class="feather icon-home"></i></span>
										<span class="pcoded-mtext">Attendance </span>
									</a>
								</li>
								<li class="pcoded-hasmenu   pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Leave</span>
                                    </a>
									
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?php echo base_url(); ?>leave/Holidays">
                                                <span class="pcoded-mtext">Holiday</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>leave/EmApplication">
                                                <span class="pcoded-mtext">Leave Application</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?php echo base_url(); ?>leave/EmLeavesheet">
                                                <span class="pcoded-mtext">Leave Sheet</span>
                                                
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu   pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Projects</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?php echo base_url(); ?>Projects/All_Projects">
                                                <span class="pcoded-mtext">Projects</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>Projects/All_Tasks">
                                                <span class="pcoded-mtext">Task List</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li> */ ?>
								                                                                      
								<?php } else { ?>
								<li class="">
                                    <a href="<?php echo base_url(); ?>dashboard/Dashboard">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Organization</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?php echo base_url();?>organization/Department">
                                                <span class="pcoded-mtext">Department</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url();?>organization/Designation">
                                                <span class="pcoded-mtext">Designation</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Employees</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?php echo base_url(); ?>employee/Employees">
                                                <span class="pcoded-mtext">Employees</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>employee/Disciplinary">
                                                <span class="pcoded-mtext">Disciplinary</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="<?php echo base_url(); ?>employee/Inactive_Employee">
                                                <span class="pcoded-mtext">Inactive User</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="<?php echo base_url(); ?>employee/employeesreporter">
                                                <span class="pcoded-mtext">Assign Employee</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Attendance</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?php echo base_url(); ?>attendance/Attendance">
                                                <span class="pcoded-mtext">Attendance List</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>attendance/Save_Attendance">
                                                <span class="pcoded-mtext">Add Attendance</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="<?php echo base_url(); ?>attendance/Attendance_Report">
                                                <span class="pcoded-mtext">Attendance Report</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url(); ?>Email">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Email</span>
                                    </a>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Leave</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?php echo base_url(); ?>leave/Holidays">
                                                <span class="pcoded-mtext">Holiday</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>leave/leavetypes">
                                                <span class="pcoded-mtext">Leave Type</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="<?php echo base_url(); ?>leave/Application">
                                                <span class="pcoded-mtext">Leave Application</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>leave/Earnedleave">
                                                <span class="pcoded-mtext">Earned Leave</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="<?php echo base_url(); ?>leave/Leave_report">
                                                <span class="pcoded-mtext">Report</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Project</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?php echo base_url(); ?>Projects/All_Projects">
                                                <span class="pcoded-mtext">Projects</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>Projects/All_Tasks">
                                                <span class="pcoded-mtext">Task List</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="<?php echo base_url(); ?>Projects/Field_visit">
                                                <span class="pcoded-mtext">Field Visit</span>
                                            </a>
                                        </li>
										
										<li class="">
                                            <a href="<?php echo base_url(); ?>Projects/Project_issue">
                                                <span class="pcoded-mtext">Issue List</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Loan</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?php echo base_url(); ?>Loan/View">
                                                <span class="pcoded-mtext">Grand Loan</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>Loan/installment">
                                                <span class="pcoded-mtext">Loan Installment</span>
                                            </a>
                                        </li>
										
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Assets</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?php echo base_url(); ?>Logistice/Assets_Category">
                                                <span class="pcoded-mtext">Assets Category</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>Logistice/All_Assets">
                                                <span class="pcoded-mtext">Asset List</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="<?php echo base_url(); ?>Logistice/logistic_support">
                                                <span class="pcoded-mtext">Logistic Support</span>
                                            </a>
                                        </li>
										
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Payroll</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?php echo base_url(); ?>Payroll/Salary_List">
                                                <span class="pcoded-mtext">Payroll List</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>Payroll/Generate_salary">
                                                <span class="pcoded-mtext">Generate Payslip</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="<?php echo base_url(); ?>Payroll/Payslip_Report">
                                                <span class="pcoded-mtext">Payslip Report</span>
                                            </a>
                                        </li>
										
                                    </ul>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url()?>notice/All_notice">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">Notice</span>
                                    </a>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url(); ?>settings/Settings">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">Settings</span>
                                    </a>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">ORG</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="<?php echo base_url(); ?>employee/employeesdirectory">
                                                <span class="pcoded-mtext">Employee</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="#">
                                                <span class="pcoded-mtext">Document</span>
                                            </a>
                                        </li>
										<li class="">
                                            <a href="#">
                                                <span class="pcoded-mtext">Engage</span>
                                            </a>
                                        </li>
										
                                    </ul>
                                </li>
								<!-- <li> <a href="<?php echo base_url()?>notice/All_notice" ><i class="mdi mdi-treasure-chest"></i><span class="hide-menu">Notice <span class="hide-menu"></a></li>
								<li> <a href="<?php echo base_url(); ?>settings/Settings" ><i class="mdi mdi-settings"></i><span class="hide-menu">Settings <span class="hide-menu"></a></li> -->
								<?php } ?>
								<?php 
								if($this->session->userdata('user_type')=='SUPER ADMIN'){
								?>
									<li class="">
                                    <a href="<?php echo base_url(); ?>Payroll/salarycount">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">This Month Salary</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                            
                            
                            
                            
                            
                        </div>
                    </nav>