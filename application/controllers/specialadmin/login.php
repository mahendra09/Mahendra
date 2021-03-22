<?php 
### Rapid Technology Solution
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		### Import Model File
		$this->load->model('specialadmin/login_model');
		$this->load->helper('form');
	}

	public function index(){   
		if($this->session->userdata('admin_id')==null){
			### Server Side Validation
			$this->form_validation->set_rules('emailid', 'Email', 'required|trim|xss_clean|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){  
				$this->load->view('specialadmin/login/index');
			}else{ 	
				$where=array("a_email"=>$this->input->post("emailid"),
							"a_pass"=>$this->input->post("password"));
				$res = $this->login_model->check_login($where);
				if($res){  
					$res[0]['a_id']; 
					### Session Create
					$this->session->set_userdata('admin_email', $res[0]['a_email']);
					$this->session->set_userdata('admin_id', $res[0]['a_id']);
					$this->session->set_userdata('admin_name', $res[0]['a_name']);
					redirect(base_url().'specialadmin/index');	
				}else{
					$this->session->set_flashdata('error', '<div class="alert alert-danger">Please check your username and password.</div>');
					redirect(base_url().'specialadmin/login/index');
				}
			} 

		}else{
			redirect(base_url().'specialadmin/index');
		}

	}

}