<?php 
### Rapid Technology Solution
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class restaurant_owner extends CI_Controller {
	public function __construct(){
		parent::__construct();
		### Include Model File
		$this->load->model('specialadmin/admindetail_model');
		$this->load->model('specialadmin/restaurant_owner_model');
		$this->load->library('email');
		$this->load->helper('form');
	}		
	
	public function index(){    
		### Check Session
		if($this->session->userdata('admin_id')!=null){
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data1['admin']= $this->admindetail_model->get_admin($where);
			$data['ro']   = $this->restaurant_owner_model->get_restaurant_owner();
			$this->load->view('specialadmin/includes/header',$data1);		  
			$this->load->view('specialadmin/restaurant_owner/index',$data);
			$this->load->view('specialadmin/includes/footer');
		}else{
			redirect(base_url().'specialadmin/login');
		}
	}
	
	### Edit Function
	public function edit($ro_id){     
		if(empty($ro_id)){
			redirect($_SERVER['HTTP_REFERER']);
		}
		if($this->session->userdata('admin_id')!=null){
			$data['ro_id'] = $ro_id;
			### Form Server Side Validation
			$this->form_validation->set_rules('name', 'Restaurant Owner Name', 'required|trim|xss_clean');
			$this->form_validation->set_rules('rname', 'Restaurant Name', 'required|trim|xss_clean');
			$this->form_validation->set_rules('conno', 'Contact No', 'required|trim|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean');
			$this->form_validation->set_rules('uname', 'User Name', 'required|trim|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){
				$a_id=$this->session->userdata('admin_id');
				$where = array('a_id'=> $a_id);
				$data1['admin']= $this->admindetail_model->get_admin($where);
				$data['ro'] = $this->restaurant_owner_model->get_single_restaurant_owner_detail($ro_id);
				$this->load->view('specialadmin/includes/header',$data1);		  
				$this->load->view('specialadmin/restaurant_owner/edit',$data);
				$this->load->view('specialadmin/includes/footer');
			}else{
				$data  = array();
				$where = array('ro_id' => $ro_id);
				$data  = array('name' => $this->input->post('name'),
							 'restaurant_name' => $this->input->post('rname'),
							 'address' => $this->input->post('address'),
							 'conno' => $this->input->post('conno'),
							 'email' => $this->input->post('email'),
							 'uname' => $this->input->post('uname'),
							 'password' => $this->input->post('password'));
				
				$res = $this->restaurant_owner_model->update($data, $where);
				if($res){
					$this->session->set_flashdata('success', '<div class="alert alert-success">Restaurant Owner Updated Successfully.</div>');
				}else{
					$this->session->set_flashdata('success', '<div class="alert alert-danger">Restaurant Owner Not Updated Successfully.</div>');
				}
				redirect(base_url().'specialadmin/restaurant_owner/index');
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
			$this->form_validation->set_rules('name', 'Restaurant Owner Name', 'required|trim|xss_clean');
			$this->form_validation->set_rules('rname', 'Restaurant Name', 'required|trim|xss_clean');
			$this->form_validation->set_rules('conno', 'Contact No', 'required|trim|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean');
			$this->form_validation->set_rules('uname', 'User Name', 'required|trim|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){
				$a_id=$this->session->userdata('admin_id');
				$where = array('a_id'=> $a_id);
				$data1['admin']= $this->admindetail_model->get_admin($where);
				$this->load->view('specialadmin/includes/header',$data1);		  
				$this->load->view('specialadmin/restaurant_owner/add');
				$this->load->view('specialadmin/includes/footer');
			}else{	
				$data= array('name' => $this->input->post('name'),
							 'restaurant_name' => $this->input->post('rname'),
							 'address' => $this->input->post('address'),
							 'conno' => $this->input->post('conno'),
							 'email' => $this->input->post('email'),
							 'uname' => $this->input->post('uname'),
							 'password' => $this->input->post('password')
				);
				$res = $this->restaurant_owner_model->add($data);
				if($res){
					$email=$this->input->post('email');
					$name=$this->input->post('name');
					$this->email->from('mahendraprajapati621@gmail.com', 'Myrest');
					$this->email->to($email);
					$this->email->subject('Wlcome Myrest');
					$this->email->message('Welcome To Myrest');
					$this->email->send();
				
					$data['name']=$this->input->post('name');
					$data['rname']=$this->input->post('rname');
					$data['address']=$this->input->post('address');
					$data['conno']=$this->input->post('conno');
					$data['email']=$this->input->post('email');
					$body=$this->load->view('specialadmin/restaurantemail/index',$data,TRUE);
					$this->email->from($email, $name);
					$this->email->to('mahendraprajapati621@gmail.com');
					$this->email->subject('New Restaurant');
					$this->email->message($body);
					$this->email->send();
					$this->session->set_flashdata('success', '<div class="alert alert-success">Restaurant Owner Add Successfully.</div>');
				}else{
					$this->session->set_flashdata('success', '<div class="alert alert-danger">Restaurant Owner Not Add Successfully.</div>');
				}
				redirect(base_url().'specialadmin/restaurant_owner/index');
			}
		}else{
			redirect(base_url().'specialadmin/login');
		}  
	}
	
	
	public function delete($ro_id){
		$res =$this->restaurant_owner_model->delete($ro_id);
		if($res){
			$this->session->set_flashdata('success', '<div class="alert alert-success">Restaurant Owner Deleted Successfully.</div>');
		}else{
			$this->session->set_flashdata('success', '<div class="alert alert-danger">Restaurant Owner Not Deleted.</div>');
		}
		redirect(base_url().'specialadmin/restaurant_owner/index');
	}
	
	
	
	
	public function approve($ro_id){     
		if(empty($ro_id)){
			redirect($_SERVER['HTTP_REFERER']);
		}
		$where = array('ro_id' => $ro_id);
		$data  = array('status' => '1');
		$res = $this->restaurant_owner_model->update($data, $where);
		if($res){
			$data['ro'] = $this->restaurant_owner_model->get_single_restaurant_owner_detail($ro_id);
			$email=$data['ro'][0]['email'];
			$name=$data['ro'][0]['name'];
			$this->email->from('mahendraprajapati621@gmail.com', 'Myrest');
			$this->email->to($email);
			$this->email->subject('Account Approvel');
			$this->email->message('You Account is Approve. Thanks For Registration in Myrest');
			$this->email->send();
			$this->session->set_flashdata('success', '<div class="alert alert-success">Restaurant Approved.</div>');
		}else{
			$this->session->set_flashdata('success', '<div class="alert alert-danger">Restaurant Not Approved .</div>');
		}
		redirect(base_url().'specialadmin/restaurant_owner/index');
	}
	
	public function disapprove($ro_id){     
		if(empty($ro_id)){
			redirect($_SERVER['HTTP_REFERER']);
		}
		$where = array('ro_id' => $ro_id);
		$data  = array('status' => '0');
		$res = $this->restaurant_owner_model->update($data, $where);
		if($res){
			
			$this->session->set_flashdata('success', '<div class="alert alert-success">Restaurant Disapproved.</div>');
		}else{
			$this->session->set_flashdata('success', '<div class="alert alert-danger">Restaurant Disapproved.</div>');
		}
		redirect(base_url().'specialadmin/restaurant_owner/index');
	}
}