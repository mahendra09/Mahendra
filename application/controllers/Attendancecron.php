<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendancecron extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('loan_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
        $this->load->model('attendance_model');
        $this->load->model('project_model');
        $this->load->model('Alldata');
        $this->load->library('csvimport');
       
    }
    
    public function Attendance()
    {
		$employee = $this->Alldata->getDatamodel('employee');
		foreach($employee as $employeeobj){
			$date = date('yy-m-d');
			$where=array('date'=>$date,'em_id'=>$employeeobj['id']);
			$atten = $this->Alldata->DetailData('attendance',$where);
			
			if(empty($atten)){
				$data=array(
						'date'=>$date,
						'effectivehours'=>'00.00',
						'grosshours'=>'00.00',
						'em_id'=>$employeeobj['id'],
					);
				$this->Alldata->insertData('attendance',$data);
				
			}else{
				
			}
			
		}
		
		
    }
	
	public function Attendanceupdate()
    {
		$employee = $this->Alldata->getDatamodel('employee');
		foreach($employee as $employeeobj){
			$date = date('yy-m-d');
			$where=array('date'=>$date,'em_id'=>$employeeobj['id']);
			$attendancedata = $this->Alldata->DetailData('attendance',$where);
			$where = array(
					'attendance_id'=>$attendancedata[0]['id'],
					'date'=>$date,
				);
			$signindata = $this->Alldata->DetailData('attendanc_log',$where);
			echo '<pre>';
			print_r($signindata);
			
			if(!empty($signindata)){
				$effectivehours = 0;
				$x=0;
				foreach($signindata as $signindataobj){
					echo $signindataobj['working_hour'].'<br>';
					$effectivehours = $effectivehours + $signindataobj['working_hour'];
					$x++;
				}
				$x= $x-1;
				echo $effectivehours;
				
				$starttimestamp = strtotime($signindata[0]['date'].' '.$signindata[0]['sign_in']);
				if(!empty($signindata[$x]['sign_out'])){
					$endtimestamp = strtotime($signindata[0]['date'].' '.$signindata[$x]['sign_out']);
				}else{
					$x = $x-1;
					$endtimestamp = strtotime($signindata[0]['date'].' '.$signindata[$x]['sign_out']);
				}
				$grosstime = abs($endtimestamp - $starttimestamp)/3600;
				$grosshours =number_format($grosstime, 2);
				
				$data = array(
							'effectivehours'=>number_format($effectivehours, 2),
							'grosshours'=>$grosshours,
						);
				/* echo '<pre>';
				print_r($data); */
				$where=array('date'=>$date,'em_id'=>$employeeobj['id']);
				$this->Alldata->UpdateData('attendance',$data,$where); 
			}else{
				
			}
		}
    }

    

}
?>