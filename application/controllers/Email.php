<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->model('employee_model');
		$this->load->model('settings_model');
		       $this->load->model('leave_model');
        $this->load->model('Alldata');
        $this->load->helper('form');
       
    }
    
    public function index()
    {
        if ($this->session->userdata('user_login_access') != False) {
			$comid=$this->session->userdata('company');
			$email=$this->session->userdata('email');
			$where=array('company'=>$comid, 'email_to'=>$email, 'trash'=>0);
			$order = "emails_id DESC";
			$data['inbox']= $this->Alldata->DetailData('emails',$where,$order);
			
			$where=array('company'=>$comid, 'email_to'=>$email, 'trash'=>0, 'read_email'=>0);
			$data['unread']= $this->Alldata->DetailData('emails',$where,$order);
			
			$where=array('company'=>$comid, 'email_to'=>$email, 'trash'=>1);
			$data['trash']= $this->Alldata->DetailData('emails',$where,$order);
			$where=array('company'=>$comid, 'email_from'=>$email, 'trash'=>0);
			$data['sentmail']= $this->Alldata->DetailData('emails',$where,$order);
			$where=array('company'=>$comid, 'email_to'=>$email, 'trash'=>0, 'starred'=>1);
			$data['starred']= $this->Alldata->DetailData('emails',$where,$order);
            $this->load->view('backend/email_index',$data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
	
	
	public function sentmail()
    {
        if ($this->session->userdata('user_login_access') != False) {
			$comid=$this->session->userdata('company');
			$email=$this->session->userdata('email');
			$order = "emails_id DESC";
			$where=array('company'=>$comid, 'email_from'=>$email, 'trash'=>0);
			$data['inbox']= $this->Alldata->DetailData('emails',$where,$order);
			
			$this->load->view('backend/email_sent',$data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
	
	public function starred()
    {
        if ($this->session->userdata('user_login_access') != False) {
			$comid=$this->session->userdata('company');
			$email=$this->session->userdata('email');
			
			$order = "emails_id DESC";
			
			$where=array('company'=>$comid, 'email_to'=>$email, 'trash'=>0, 'starred'=>1);
			$data['inbox']= $this->Alldata->DetailData('emails',$where,$order);
			$where=array('company'=>$comid, 'email_from'=>$email, 'trash'=>0, 'read_email'=>0);
			$data['unread']= $this->Alldata->DetailData('emails',$where,$order);
            $this->load->view('backend/email_starred',$data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
	
	public function trash()
    {
        if ($this->session->userdata('user_login_access') != False) {
			$comid=$this->session->userdata('company');
			$email=$this->session->userdata('email');
			$where=array('company'=>$comid, 'email_to'=>$email, 'trash'=>1);
			$data['inbox']= $this->Alldata->DetailData('emails',$where);
			
            $this->load->view('backend/email_trash',$data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
	
	public function compose()
    {
        if ($this->session->userdata('user_login_access') != False) {
			$comid=$this->session->userdata('company');
			$where=array('em_company'=>$comid);
			$data['em_meail']= $this->Alldata->emp_detail('employee',$where);
			$this->load->view('backend/email_compose',$data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
	
	public function sendemail()
    {
		$comid=$this->session->userdata('company');
		$email_from=$this->session->userdata('email');
		$date=date('Y-m-d');
		$time=date("h:i:sa");
		$data=array(
				'email_to'=>$this->input->post('email_to'),
				'email_from'=>$email_from,
				'cc'=>$this->input->post('cc'),
				'bcc'=>$this->input->post('bcc'),
				'subject'=>$this->input->post('subject'),
				'message'=>$this->input->post('message'),
				'time'=>$time,
				'date'=>$date,
				'read_status'=>1,
				'company'=>$comid,
			  );
			  
		if(isset($_FILES['attach']['name']) && !empty($_FILES['attach']['name'])) 
		{
			for($i=0;$i<count($_FILES['attach']['name']);$i++){
				$imgfilename =  $this->img_do_upload($i);
				$abc[] = $imgfilename['upload_data']['file_name'];
			}
			
			$data['attach'] = $imgfilename['upload_data']['file_name'];
		}
		
		$res = $this->Alldata->insertData('emails',$data);
		if($res)
		{
			$this->session->set_flashdata('success', '<div class="alert alert-success">Email Send Successfully.</div>');
		}
		else
		{
			$this->session->set_flashdata('success', '<div class="alert alert-danger">Email Not Send Successfully.</div>');
		}
		redirect(base_url().'Email/index');
	}
	
	public function img_do_upload($i){
		
		
        if(!empty($_FILES['attach']['name'][$i])){
			
            $ext = pathinfo($_FILES['attach']['name'][$i]);
			$pic= uniqid().'.'.$ext['extension']; 	 
        }
        $config['file_name']= $pic;
		//$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/public/email_attach';
		$config['upload_path'] = './assets/images/users';
		//$config['upload_path'] = UPLOAD_PATH_img.'slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF';
        $this->load->library('Upload', $config);
		$this->upload->initialize($config);
		/* echo '<pre>';
		print_r($config); */
        if (!$this->upload->do_upload('attach[$i]')){  
			
            $error = array('error' => $this->upload->display_errors());
			
        }else{  
			$data = array('upload_data' => $this->upload->data());
			return $data;
        }
    } 
	
	public function email_read($id){
		$comid=$this->session->userdata('company');
		$email=$this->session->userdata('email');
		$where=array('company'=>$comid, 'email_from'=>$email, 'trash'=>0);
		$data['inbox']= $this->Alldata->DetailData('emails',$where);
		
		$where=array('company'=>$comid, 'email_from'=>$email, 'trash'=>0, 'read_email'=>0);
		$data['unread']= $this->Alldata->DetailData('emails',$where);
		
		$where=array('company'=>$comid, 'email_from'=>$email, 'trash'=>1);
		$data['trash']= $this->Alldata->DetailData('emails',$where);
		$where=array('company'=>$comid, 'email_to'=>$email, 'trash'=>0);
		$data['sentmail']= $this->Alldata->DetailData('emails',$where);
		$where=array('company'=>$comid, 'email_from'=>$email, 'trash'=>0, 'starred'=>1);
		$data['starred']= $this->Alldata->DetailData('emails',$where);
		
		$where=array('emails_id'=>$id);
		$data = array('read_email'=>1);
		$this->Alldata->UpdateData('emails',$data,$where);
		$data['emailread']= $this->Alldata->DetailData('emails',$where);
		
		$fromemail = $data['emailread'][0]['email_from'];
		$where=array('em_email'=>$fromemail);
		$data['fromdetail']= $this->Alldata->DetailData('employee',$where);
		
		$comid=$this->session->userdata('company');
			$where=array('em_company'=>$comid);
			$data['em_meail']= $this->Alldata->emp_detail('employee',$where);
		
		$this->load->view('backend/email_read',$data);
	}
	
	public function deleteall(){
		$id = $this->input->post('checkbox_value');
		for($count = 0; $count < count($id); $count++){
				
				$where = array('emails_id'=>$id[$count]);
				$data = array('trash'=>1);
				$data = $this->Alldata->UpdateData('emails',$data,$where);
				if($data){
					$this->session->set_flashdata('success_msg','Deleted successfully');
				}else{
					$this->session->set_flashdata('error_msg','Failed to Delete ');
				}
			}
	}
	
	public function favourite(){
		$id = $this->input->post('id');
				
		$where = array('emails_id'=>$id);
		$data = array('starred'=>1);
		$data = $this->Alldata->UpdateData('emails',$data,$where);
		if($data){
			$this->session->set_flashdata('success_msg','Starred Email successfully');
		}else{
			$this->session->set_flashdata('error_msg','Failed to Starred Email ');
		}
			
	}
	
	public function unfavourite(){
		$id = $this->input->post('id');
				
		$where = array('emails_id'=>$id);
		$data = array('starred'=>0);
		$data = $this->Alldata->UpdateData('emails',$data,$where);
		if($data){
			$this->session->set_flashdata('success_msg','UnStarred Email successfully');
		}else{
			$this->session->set_flashdata('error_msg','Failed to UnStarred Email ');
		}
			
	}
}
?>