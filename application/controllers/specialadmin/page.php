<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('specialadmin/admindetail_model');
		$this->load->model('specialadmin/page_model');
        $this->load->helper('form');
	}		
  
	public function index($p_id){
		 if(empty($p_id)){
            redirect($_SERVER['HTTP_REFERER']);
        }
		
		
		if($this->session->userdata('admin_id')!=null)
		{
			$data['p_id'] = $p_id;
			$this->form_validation->set_rules('page_title', 'Page Title', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){
				$a_id=$this->session->userdata('admin_id');
				$where = array('a_id'=> $a_id);
				$data1['admin']= $this->admindetail_model->get_admin($where);
			
				$data['page']= $this->page_model->get_single_page_detail($p_id);
				$this->load->view('specialadmin/includes/header',$data1);		  
				$this->load->view('specialadmin/page/index',$data);
				$this->load->view('specialadmin/includes/footer');
			 }else{
				$data  = array();
				$where = array('p_id' => $p_id);
				$data  = array('p_title' => $this->input->post('name'),
							   'p_dis' => $this->input->post('details'),
							   'page_title' => $this->input->post('page_title'),
							   'meta_keywrod' => $this->input->post('meta_keyword'),
							   'meta_discripation' => $this->input->post('meta_discripation'));
				if(isset($_FILES['banner']['name']) && !empty($_FILES['banner']['name'])) 
                {
                    $logofilename =  $this->banner_do_upload();
                    $data['bannerimg'] = $logofilename['upload_data']['file_name'];
                }
				$res = $this->page_model->update($data, $where);
                if($res){
                    $this->session->set_flashdata('success', 'Page Updated Successfully.');
                }else{
                    $this->session->set_flashdata('success', 'Page Not Updated Successfully.');
                }
                redirect(base_url().'specialadmin/page/index/'.$p_id);
            }	
			
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
					   'email' => $this->input->post('email'),);
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
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/ciadmin/public/logo/';
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
	
	public function banner_do_upload(){
        if(!empty($_FILES['banner']['name'])){
            $ext = pathinfo($_FILES['banner']['name']);
			
            $pic= uniqid().'.'.$ext['extension']; 	 
        }
		
        $config['file_name']= $pic;
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/spoutsourcing/public/banner/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF';
		
        $this->load->library('Upload', $config);
		
        if (!$this->upload->do_upload('banner')){  
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
	
}
