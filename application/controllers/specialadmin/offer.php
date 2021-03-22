<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class offer extends CI_Controller {	public function __construct(){
	parent::__construct();
	$this->load->model('specialadmin/admindetail_model');
	$this->load->model('specialadmin/offer_model');		
	$this->load->model('specialadmin/restaurant_owner_model');		
	$this->load->helper('form');
	
	}
	
	public function index(){
		if($this->session->userdata('admin_id')!=null){
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data1['admin']= $this->admindetail_model->get_admin($where);
			$data['offer']   = $this->offer_model->get_offer();
			$this->load->view('specialadmin/includes/header',$data1);
			$this->load->view('specialadmin/offer/index',$data);
			$this->load->view('specialadmin/includes/footer');
			
		}else{
			redirect(base_url().'specialadmin/login');
		}	
	}
	
	public function edit($offer_id){
		if(empty($offer_id)){
			redirect($_SERVER['HTTP_REFERER']);
		}
		if($this->session->userdata('admin_id')!=null){
			$data['offer_id'] = $offer_id;
			$this->form_validation->set_rules('offer', 'Offer', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){
				$a_id=$this->session->userdata('admin_id');
				$where = array('a_id'=> $a_id);
				$data1['admin']= $this->admindetail_model->get_admin($where);
				$data['offer'] = $this->offer_model->get_single_offer_detail($offer_id);
				$data['ro']   = $this->restaurant_owner_model->get_restaurant_owner();
				$this->load->view('specialadmin/includes/header',$data1);
				$this->load->view('specialadmin/offer/edit',$data);
				$this->load->view('specialadmin/includes/footer');
			}else{
				$data  = array();
				$where = array('offer_id' => $offer_id);
				$data    = array('offer' => $this->input->post('offer'),
						 'ro_id' => $this->input->post('restaurant'),	
						 'promocode' => $this->input->post('promocode'),
						 'offer_type' => $this->input->post('offer_type'),
						 'offer_price' => $this->input->post('offer_price'),
						 'dis' => $this->input->post('dis')
						 );	
				if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
					$imgfilename =  $this->img_do_upload();
					$data['o_img'] = $imgfilename['upload_data']['file_name'];
				}	
				$res = $this->offer_model->update($data, $where);
				if($res){
					$this->session->set_flashdata('success', 'Offer Updated Successfully.');
				}else{
					$this->session->set_flashdata('success', 'Offer Not Updated Successfully.');
				}
				redirect(base_url().'specialadmin/offer/index');
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
			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/public/upload/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF';
			$this->load->library('Upload', $config);
			if (!$this->upload->do_upload('img')){  
			}else{  
			$data = array('upload_data' => $this->upload->data());
			return $data;	
			}
			} 
			
	public function add(){
		if($this->session->userdata('admin_id')!=null){	
			$this->form_validation->set_rules('offer', 'offer', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){	
				$a_id=$this->session->userdata('admin_id');		
				$where = array('a_id'=> $a_id);		
				$data1['admin']= $this->admindetail_model->get_admin($where);
				$data['ro']   = $this->restaurant_owner_model->get_restaurant_owner();	
				$this->load->view('specialadmin/includes/header',$data1);	
				$this->load->view('specialadmin/offer/add',$data);	
				$this->load->view('specialadmin/includes/footer');	
			}else{	
			
				$data    = array('offer' => $this->input->post('offer'),
						 'ro_id' => $this->input->post('restaurant'),	
						 'promocode' => $this->input->post('promocode'),
						 'offer_type' => $this->input->post('offer_type'),
						 'offer_price' => $this->input->post('offer_price'),
						 'dis' => $this->input->post('dis')
						 );	
				if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {	
					$imgfilename =  $this->img_do_upload();		
					$data['o_img'] = $imgfilename['upload_data']['file_name'];
				}				
				$res = $this->offer_model->add($data);
				if($res){			
					$this->session->set_flashdata('success', '<div class="alert alert-success">Offer Add Successfully.</div>');	
				}else{	
					$this->session->set_flashdata('success', '<div class="alert alert-danger">Offer Not Add Successfully.</div>');
				}		
				redirect(base_url().'specialadmin/offer/index');	
			}		
		}else{		
			redirect(base_url().'specialadmin/login');	
		} 
	}
		
	

		
		
		public function delete($offer_id){
        $res =   $this->offer_model->delete($offer_id);
        if($res){
            $this->session->set_flashdata('success', '<div class="alert alert-success">Offer Slider Deleted Successfully.</div>');
        }else{
            $this->session->set_flashdata('success', '<div class="alert alert-danger">Offer Slider Not Deleted.</div>');
        }
		redirect(base_url().'specialadmin/offer/index');
    }	
	
	}