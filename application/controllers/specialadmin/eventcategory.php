<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class eventcategory extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('specialadmin/admindetail_model');
		$this->load->model('specialadmin/eventcategory_model');
		$this->load->helper('form');
	}		
  
	public function index(){    
		if($this->session->userdata('admin_id')!=null)
		{
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data1['admin']= $this->admindetail_model->get_admin($where);
			$data['category']   = $this->eventcategory_model->get_category();
			$this->load->view('specialadmin/includes/header',$data1);		  
			$this->load->view('specialadmin/eventcategory/index',$data);
			$this->load->view('specialadmin/includes/footer');
		}else{
			redirect(base_url().'specialadmin/login');
		}
	}
	
	public function edit($ec_id){     
        if(empty($ec_id)){
            redirect($_SERVER['HTTP_REFERER']);
        }
		if($this->session->userdata('admin_id')!=null)
		{
		$data['ec_id'] = $ec_id;
		$this->form_validation->set_rules('name', 'Category Name', 'required|trim|xss_clean');
		
        if($this->form_validation->run() === FALSE){
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data1['admin']= $this->admindetail_model->get_admin($where);
			$data['category'] = $this->eventcategory_model->get_single_category_detail($ec_id);
			$this->load->view('specialadmin/includes/header',$data1);		  
			$this->load->view('specialadmin/eventcategory/edit',$data);
			$this->load->view('specialadmin/includes/footer');
        }else{
            $data  = array();
			$where = array('ec_id' => $ec_id);
            $data  = array('c_name' => $this->input->post('name'),
			               'page_title' => $this->input->post('page_title'),
						   'meta_keywrod' => $this->input->post('meta_keyword'),
						   'meta_discripation' => $this->input->post('meta_discripation'));
			if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) 
                {
                    $imgfilename =  $this->img_do_upload();
                    $data['c_img'] = $imgfilename['upload_data']['file_name'];
                }
				
            $res = $this->eventcategory_model->update($data, $where);
                if($res)
                {
                    $this->session->set_flashdata('success', '<div class="alert alert-success">Category Updated Successfully.</div>');
                }
                else
                {
                    $this->session->set_flashdata('success', '<div class="alert alert-danger">Category Not Updated Successfully.</div>');
                }
                redirect(base_url().'specialadmin/eventcategory/index');
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
            // $error = array('error' => $this->upload->display_errors());
            // $this->form_validation->rules('Husbend Photo not uploaded');
        }else{  
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    } 
	
	 public function add(){
		if($this->session->userdata('admin_id')!=null){
			$this->form_validation->set_rules('name', 'Category Name', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){
				$a_id=$this->session->userdata('admin_id');
				$where = array('a_id'=> $a_id);
				$data1['admin']= $this->admindetail_model->get_admin($where);
				
				$this->load->view('specialadmin/includes/header',$data1);		  
				$this->load->view('specialadmin/eventcategory/add');
				$this->load->view('specialadmin/includes/footer');
			}else{	
			    $data    = array('c_name' => $this->input->post('name'),
								 'page_title' => $this->input->post('page_title'),
							   'meta_keywrod' => $this->input->post('meta_keyword'),
							   'meta_discripation' => $this->input->post('meta_discripation'));
				if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) 
                {
                    $imgfilename =  $this->img_do_upload();
                    $data['c_img'] = $imgfilename['upload_data']['file_name'];
                }
                $res = $this->eventcategory_model->add($data);
                if($res)
                {
                    $this->session->set_flashdata('success', '<div class="alert alert-success">Category Add Successfully.</div>');
                }
                else
                {
                    $this->session->set_flashdata('success', '<div class="alert alert-danger">Category Not Add Successfully.</div>');
                }
                redirect(base_url().'specialadmin/eventcategory/index');
            }
		 }else{
			redirect(base_url().'specialadmin/login');
		}  
    }
	
	public function delete($ec_id){
        $res =$this->eventcategory_model->delete($ec_id);
        if($res){
            $this->session->set_flashdata('success', '<div class="alert alert-success">Category Deleted Successfully.</div>');
        }else{
            $this->session->set_flashdata('success', '<div class="alert alert-danger">Category Not Deleted.</div>');
        }
        redirect(base_url().'specialadmin/eventcategory/index');
    }
      
		
	
}
