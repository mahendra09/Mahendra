<?php 
### Rapid Technology Solution
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class user extends CI_Controller {
	public function __construct(){
		parent::__construct();
		### Include Model File
		$this->load->model('specialadmin/admindetail_model');
		$this->load->model('specialadmin/user_model');
		$this->load->library('email');
		$this->load->helper('form');
	}		
	
	public function index(){    
		### Check Session
		if($this->session->userdata('admin_id')!=null){
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data1['admin']= $this->admindetail_model->get_admin($where);
			$data['user']   = $this->user_model->get_user();
			$this->load->view('specialadmin/includes/header',$data1);		  
			$this->load->view('specialadmin/user/index',$data);
			$this->load->view('specialadmin/includes/footer');
		}else{
			redirect(base_url().'specialadmin/login');
		}
	}
	
	### Edit Function
	public function edit($uid){     
		if(empty($uid)){
			redirect($_SERVER['HTTP_REFERER']);
		}
		if($this->session->userdata('admin_id')!=null){
			$data['uid'] = $uid;
			### Form Server Side Validation
			$this->form_validation->set_rules('name', 'User Name', 'required|trim|xss_clean');
			$this->form_validation->set_rules('conno', 'Contact No', 'required|trim|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean');
			$this->form_validation->set_rules('uname', 'User Name', 'required|trim|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){
				$a_id=$this->session->userdata('admin_id');
				$where = array('a_id'=> $a_id);
				$data1['admin']= $this->admindetail_model->get_admin($where);
				$data['user'] = $this->user_model->get_single_user_detail($uid);
				$this->load->view('specialadmin/includes/header',$data1);		  
				$this->load->view('specialadmin/user/edit',$data);
				$this->load->view('specialadmin/includes/footer');
			}else{
				$data  = array();
				$where = array('uid' => $uid);
				$data  = array('name' => $this->input->post('name'),
							 'address' => $this->input->post('address'),
							 'conno' => $this->input->post('conno'),
							 'email' => $this->input->post('email'),
							 'uname' => $this->input->post('uname'),
							 'upass' => $this->input->post('password'));
				
				$res = $this->user_model->update($data, $where);
				if($res){
					$this->session->set_flashdata('success', '<div class="alert alert-success">User Updated Successfully.</div>');
				}else{
					$this->session->set_flashdata('success', '<div class="alert alert-danger">User Not Updated Successfully.</div>');
				}
				redirect(base_url().'specialadmin/user/index');
			}
		}else{
			redirect(base_url().'specialadmin/login');
		}  
	}

	public function img_do_upload(){
		if(!empty($_FILES['img']['name'])){
			$ext = pathinfo($_FILES['img']['name']);
			$pic= uniqid().'.'.$ext['extension']; 	 
		}
		$config['img']= $pic;
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/amazingusbci/public/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF';
		$this->load->library('Upload', $config);
		if (!$this->upload->do_upload('img')){  
		}else{  
			$data = array('upload_data' => $this->upload->data());
			return $data;
		}
	} 
	
	### Add User 
	public function add(){
		### Check Session
		if($this->session->userdata('admin_id')!=null){
			### Form Server Side Validation
			$this->form_validation->set_rules('name', 'User Name', 'required|trim|xss_clean');
			$this->form_validation->set_rules('conno', 'Contact No', 'required|trim|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean');
			$this->form_validation->set_rules('uname', 'User Name', 'required|trim|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){
				$a_id=$this->session->userdata('admin_id');
				$where = array('a_id'=> $a_id);
				$data1['admin']= $this->admindetail_model->get_admin($where);
				$this->load->view('specialadmin/includes/header',$data1);		  
				$this->load->view('specialadmin/user/add');
				$this->load->view('specialadmin/includes/footer');
			}else{	
				$data= array('name' => $this->input->post('name'),
							 'address' => $this->input->post('address'),
							 'conno' => $this->input->post('conno'),
							 'email' => $this->input->post('email'),
							 'uname' => $this->input->post('uname'),
							 'upass' => $this->input->post('password')
				);
				$res = $this->user_model->add($data);
				if($res){
					$data['name']=$this->input->post('name');
					$data['address']=$this->input->post('address');
					$data['conno']=$this->input->post('conno');
					$data['email']=$this->input->post('email');
					$body=$this->load->view('specialadmin/useremail/index',$data,TRUE);
					$email=$this->input->post('email');
					$name=$this->input->post('name');
					$this->email->from('mahendraprajapati621@gmail.com', 'Myrest');
					$this->email->to($email);
					$this->email->subject('Wlcome Myrest');
					$this->email->message('Welcome To Myrest');
					$this->email->send();
					$this->email->from($email, $name);
					$this->email->to('mahendraprajapati621@gmail.com');
					$this->email->subject('New User');
					$this->email->message($body);
					$this->email->send();
					$this->session->set_flashdata('success', '<div class="alert alert-success">User Add Successfully.</div>');
				}else{
					$this->session->set_flashdata('success', '<div class="alert alert-danger">User Not Add Successfully.</div>');
				}
				redirect(base_url().'specialadmin/user/index');
			}
		}else{
			redirect(base_url().'specialadmin/login');
		}  
	}
	
	public function delete($uid){
		$res =$this->user_model->delete($uid);
		if($res){
			$this->session->set_flashdata('success', '<div class="alert alert-success">User Deleted Successfully.</div>');
		}else{
			$this->session->set_flashdata('success', '<div class="alert alert-danger">User Not Deleted.</div>');
		}
		redirect(base_url().'specialadmin/user/index');
	}
}