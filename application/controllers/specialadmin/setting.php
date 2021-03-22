<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class setting extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('specialadmin/admindetail_model');
		$this->load->model('specialadmin/setting_model');
        $this->load->helper('form');
	}		

	public function index(){    
		if($this->session->userdata('admin_id')!=null)
		{
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data1['admin']= $this->admindetail_model->get_admin($where);
			$s_id='1';
			$data['setting']= $this->setting_model->get_single_setting_detail($s_id);
			$data['admin']= $this->setting_model->get_single_admin_detail($a_id);
			$this->load->view('specialadmin/includes/header',$data1);		  
			$this->load->view('specialadmin/setting/index',$data);
			$this->load->view('specialadmin/includes/footer');
		}else{
			redirect(base_url().'specialadmin/login');
		}
	}

	public function updatesetting(){     
        $data  = array();
		$s_id='1';
		$where = array('s_id' => $s_id);
        $data  = array('title' => $this->input->post('title'), 
				       'contact' => $this->input->post('contactno'),
					   'email' => $this->input->post('email'));
		if(isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])) 
        {
            $logofilename =  $this->logo_do_upload();
            $data['logo'] = $logofilename['upload_data']['file_name'];
        }
        $res = $this->setting_model->updatesetting($data, $where);
        if($res){
            $this->session->set_flashdata('success', '<div class="alert alert-info alert-dismissible fade in" role="alert">Setting Updated Successfully.</div>');
        }else{

            $this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Setting Not Updated Successfully.</div>');
        }
        redirect(base_url().'specialadmin/setting/index');
    }

	public function logo_do_upload(){
        if(!empty($_FILES['logo']['name'])){
            $ext = pathinfo($_FILES['logo']['name']);
            $pic= uniqid().'.'.$ext['extension']; 	 
        }
        $config['logo']= $pic;
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/mahakaliwebtechnology/public/logo/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF';
        $this->load->library('Upload', $config);
        if (!$this->upload->do_upload('logo')){  
            // $error = array('error' => $this->upload->display_errors());
            // $this->form_validation->rules('Husbend Photo not uploaded');
        }else{  
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    } 

	public function updateadmin(){ 
		$a_id=$this->session->userdata('admin_id');
        $data  = array();
		$where = array('a_id' => $a_id);
		$pass=$this->input->post('password');
		if(!empty($pass)){
			$confirmpass=$this->input->post('confirmpass');	
			if($pass == $confirmpass){
				$newpass=$pass;
			}else{
				$this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Password And Confirm Password Not Match.</div>');
				redirect(base_url().'specialadmin/setting/index');
			}
		}else{
			$newpass=$this->input->post('oldpass');
		}	
		$data  = array('a_name' => $this->input->post('name'), 
				       'a_email' => $this->input->post('email'),
					   'a_pass' => $newpass);
        $res = $this->setting_model->updateadmin($data, $where);
        if($res){
            $this->session->set_flashdata('success', '<div class="alert alert-info alert-dismissible fade in" role="alert">Profile Updated Successfully.</div>');
        }else{
            $this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Profile Not Updated Successfully.</div>');
        }
        redirect(base_url().'specialadmin/setting/index');
    }

	public function updatemap(){     
        $data  = array();
		$s_id='1';
		$where = array('s_id' => $s_id);
        $data  = array('map' => $this->input->post('map'));
        $res = $this->setting_model->updatesetting($data, $where);
        if($res){
            $this->session->set_flashdata('success', '<div class="alert alert-info alert-dismissible fade in" role="alert">Setting Updated Successfully.</div>');
        }else{
            $this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Setting Not Updated Successfully.</div>');
        }
        redirect(base_url().'specialadmin/setting/index');
    }

}