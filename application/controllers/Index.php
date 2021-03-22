<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
		$this->load->model('Alldata');
        $this->load->library('csvimport');
        $this->load->library('email');
		
  
    }
    
	public function index()
	{
		
		$this->load->view('web/index');
	}
	
	public function register()
	{
		
		$this->load->view('web/register');
	}
	
	public function savecompany()
	{
		if($this->input->post('save')== "Register"){
			if($this->input->post('password') == $this->input->post('confirmpassword')){
				$emailwhere = array(
									'email'=>$this->input->post('email')
								);
				$findbyemail = $this->Alldata->DetailData('company_register',$emailwhere);
				$namewhere = array(
									'companyname'=>$this->input->post('companyname')
								);
				$findbyname = $this->Alldata->DetailData('company_register',$namewhere);
				$contactwhere = array(
									'phoneno'=>$this->input->post('phoneno')
								);
				$findbycontact = $this->Alldata->DetailData('company_register',$contactwhere);
				if(!empty($findbyemail)){
					$this->session->set_flashdata('success','<div class="alert alert-danger">
													  <strong>Danger!</strong> This Official Email already Register.
													</div>'
												);
						redirect(base_url().'index/register' , 'refresh');
				}elseif(!empty($findbyname)){
					$this->session->set_flashdata('success','<div class="alert alert-danger">
													  <strong>Danger!</strong>  This Company Name already Register..
													</div>'
												);
						redirect(base_url().'index/register' , 'refresh');
				}elseif(!empty($findbycontact)){
					$this->session->set_flashdata('success','<div class="alert alert-danger">
													  <strong>Danger!</strong>  This Phone Number already Register..
													</div>'
												);
						redirect(base_url().'index/register' , 'refresh');
				}else{
					$data=array(
								'fname'=>$this->input->post('fname'),
								'lname'=>$this->input->post('lname'),
								'email'=>$this->input->post('email'),
								'companyname'=>$this->input->post('companyname'),
								'phoneno'=>$this->input->post('phoneno'),
								'username'=>$this->input->post('username'),
								'password'=>md5($this->input->post('password')),
								'status'=>'INACTIVE',
								'tc'=>$this->input->post('tc'),
							);
					$res = $this->Alldata->insertData('company_register',$data);
					//$res = 1;
					if($res){
						
						 $config = array(
							'protocol' => 'smtp', 
							'smtp_host' => 'ssl://smtp.gmail.com', 
							'smtp_port' => 465, 
							'smtp_user' => 'mahendraprajapati621@gmail.com', 
							'smtp_pass' => '123@mahendra09', 
							'mailtype' => 'html', 
							'charset' => 'iso-8859-1'
						); 
						

						$this->email->initialize($config);
						$this->email->set_mailtype("html");
						$this->email->set_newline("\r\n");
	 
						//Email content
						$htmlContent = '<div style="border: 1px solid #dbd4d4; padding: 50px;">';
						$htmlContent .= '<center style="margin-bottom: 60px;"><h1><u>Small steps for a Giant Leap</u></h1></center>';
						$htmlContent .= '<p>Hi Mahendra,</p>';
						$htmlContent .= '<p style="text-align: justify;">I wanted to reach out and personally thank you for signing up with MWT. Since our inception, we at MWT have focused on helping HR teams engage and retain employees using various tools like attendance gamification, cascading performance management, automated payroll and much more. During this trial you will get to see how we helped thousands of companies across the country increase employee satisfaction and efficiency.</p>';
						$htmlContent .= '<p style="text-align: justify;">I hope you will have a great time exploring MWT. If you need any help setting up or have any queries, please feel free to give me a call on +91-40-41371111 or drop me a mail at sales@MWT.com</p>';
						$htmlContent .= '<p>Regards,</br>';
						$htmlContent .= 'MWT Signup</p>';
						$htmlContent .= '</div>';
						$this->email->to($this->input->post('email'));
						$this->email->from('mahendraprajapati621@gmail.com','MWT Signup');
						$this->email->subject('Thank you for your signing up');
						$this->email->message($htmlContent);
	 
						//Send email
						$this->email->send();
						
						
						$config = array(
							'protocol' => 'smtp', 
							'smtp_host' => 'ssl://smtp.gmail.com', 
							'smtp_port' => 465, 
							'smtp_user' => 'mahendraprajapati621@gmail.com', 
							'smtp_pass' => '123@mahendra09', 
							'mailtype' => 'html', 
							'charset' => 'iso-8859-1'
						); 
						
						$this->email->initialize($config);
						$this->email->set_mailtype("html");
						$this->email->set_newline("\r\n"); 
						//Email content
						$htmlContent1 = '<div style="border: 1px solid #dbd4d4; padding: 50px;">';
						$htmlContent1 .= '<center style="margin-bottom: 60px;"><h1><u>Small steps for a Giant Leap</u></h1></center>';
						$htmlContent1 .= '<p>Hi MWT,</p>';
						$htmlContent1 .= '<p style="text-align: justify;">One New Company Register. Below Detail This Company</p>';
						$htmlContent1 .= '<p style="text-align: justify;">name : '.$this->input->post("fname").' '.$this->input->post('lname').'<br>
																		email : '.$this->input->post('email').'<br>
																		Company Name : '.$this->input->post('companyname').'<br>
																		contact : '.$this->input->post('phoneno').'</p>';
																		
												
						$htmlContent1 .= '<p>Regards,</br>';
						$htmlContent1 .= 'MWT Signup</p>';
						$htmlContent1 .= '</div>';
						$this->email->to('mahendraprajapati621@gmail.com');
						$this->email->from('mahendraprajapati621@gmail.com','New Register');
						$this->email->subject('New Company Register for HRMS');
						$this->email->message($htmlContent1);
	 
						//Send email
						$this->email->send();
					/*	echo $this->email->print_debugger(); */
						$this->session->set_flashdata('success','<div class="alert alert-success">
													  <strong>Success!</strong> Company Register Successfull.
													</div>'
												);
						
						redirect(base_url().'index/register' , 'refresh');
					}else{
						$this->session->set_flashdata('success','<div class="alert alert-danger">
													  <strong>Danger!</strong> Something Want Worng. Please Try Agin.
													</div>'
												);
						redirect(base_url().'index/register' , 'refresh');
					}
				}
			}else{
				
				$this->session->set_flashdata('success','<div class="alert alert-danger">
												  <strong>Danger!</strong> Confirm Password not Match.
												</div>'
											);
				redirect(base_url().'index/register' , 'refresh');
			}
		}else{
			$this->session->set_flashdata('success','<div class="alert alert-danger">
												  <strong>Danger!</strong> Something Want Worng. Please Try Agin.
												</div>'
											);
				redirect(base_url().'index/register' , 'refresh');
		}
	}
    
}