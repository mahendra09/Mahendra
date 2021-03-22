<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('specialadmin/admindetail_model');
		$this->load->model('specialadmin/subcategory_model');
		$this->load->model('specialadmin/category_model');
		$this->load->model('specialadmin/product_model');$this->load->helper(array('form', 'url'));
		//$this->load->helper('form');
	}		
  
	public function index(){    
		if($this->session->userdata('admin_id')!=null)
		{
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data1['admin']= $this->admindetail_model->get_admin($where);
			$data['category']=$this->category_model->get_category();
			$data['subcategory']   = $this->subcategory_model->get_subcategory();
			$data['product'] = $this->product_model->get_product();
			$this->load->view('specialadmin/includes/header',$data1);		  
			$this->load->view('specialadmin/product/index',$data);
			$this->load->view('specialadmin/includes/footer');
		}else{
			redirect(base_url().'specialadmin/login');
		}
	}
	
	public function edit($p_id){     
        if(empty($p_id)){
            redirect($_SERVER['HTTP_REFERER']);
        }
		if($this->session->userdata('admin_id')!=null)
		{
		$data['p_id'] = $p_id;
		$this->form_validation->set_rules('name', 'Product Name', 'required|trim|xss_clean');
		
        if($this->form_validation->run() === FALSE){
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data1['admin']= $this->admindetail_model->get_admin($where);
			$data['category']   = $this->category_model->get_category();
			$data['subcategory']   = $this->subcategory_model->get_subcategory();
			$data['product'] = $this->product_model->get_single_product_detail($p_id);
			$this->load->view('specialadmin/includes/header',$data1);		  
			$this->load->view('specialadmin/product/edit',$data);
			$this->load->view('specialadmin/includes/footer');
        }else{
            $data  = array();
			$where = array('p_id' => $p_id);
            $data  = array('p_name' => $this->input->post('name'),
			               
						   'p_dis'=>$this->input->post('pdis'),
						   'c_id'=>$this->input->post('category'),
						   'sc_id'=>$this->input->post('subcategory'),
						   'page_title' => $this->input->post('page_title'),
							   'meta_keywrod' => $this->input->post('meta_keyword'),
							   'meta_discripation' => $this->input->post('meta_discripation'),							   'model_no' => $this->input->post('model_no'));
			if(isset($_FILES['img1']['name']) && !empty($_FILES['img1']['name'])) 
                {				### File Unlink Code					$userid = $user_id;					$profile = $this->input->post('oldimg1') ;					$path =  $_SERVER['DOCUMENT_ROOT'].'/amazingusbci/public/upload/'.$profile;					if(file_exists($path)){						unlink($path);					}else{					}            ### End File Unlink 								
                    $imgfilename =  $this->img_do_upload();
                    $data['p_img'] = $imgfilename['upload_data']['file_name'];
                }
				if(isset($_FILES['img2']['name']) && !empty($_FILES['img2']['name'])) 
                {					### File Unlink Code					$userid = $user_id;					$profile1 = $this->input->post('oldimg2') ;					$path =  $_SERVER['DOCUMENT_ROOT'].'/amazingusbci/public/upload/'.$profile1;					if(file_exists($path)){						unlink($path);					}else{					}            ### End File Unlink 
                    $imgfilename =  $this->img_do_upload1();
                    $data['p_img1'] = $imgfilename['upload_data']['file_name'];
                }
				if(isset($_FILES['img3']['name']) && !empty($_FILES['img3']['name'])) 
                {								### File Unlink Code					$userid = $user_id;					$profile2 = $this->input->post('oldimg3') ;					$path =  $_SERVER['DOCUMENT_ROOT'].'/amazingusbci/public/upload/'.$profile2;					$path =  $_SERVER['DOCUMENT_ROOT'].'/amazingusbci/public/upload/'.$profile2;					if(file_exists($path)){						unlink($path);					}else{					}            ### End File Unlink 
                    $imgfilename =  $this->img_do_upload2();
                    $data['p_img2'] = $imgfilename['upload_data']['file_name'];
                }
				
            $res = $this->product_model->update($data, $where);
                if($res)
                {
                    $this->session->set_flashdata('success', '<div class="alert alert-success">Product Updated Successfully.</div>');
                }
                else
                {
                    $this->session->set_flashdata('success', '<div class="alert alert-danger">Product Not Updated Successfully.</div>');
                }
                redirect(base_url().'specialadmin/product/index');
            }
          }else{
			redirect(base_url().'specialadmin/login');
		}  
        }

	
	public function img_do_upload(){
        if(!empty($_FILES['img1']['name'])){
            $ext = pathinfo($_FILES['img1']['name']);
			$pic= uniqid().'.'.$ext['extension']; 	 
        }
		
        $config['file_name']= $pic;
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/amazingusbci/public/upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF';
	
        $this->load->library('Upload', $config);		$this->upload->initialize($config);
        if (!$this->upload->do_upload('img1')){  
            // $error = array('error' => $this->upload->display_errors());
            // $this->form_validation->rules('Husbend Photo not uploaded');
        }else{  
            $data = array('upload_data' => $this->upload->data());			
            return $data;
        }
    } 
	
	public function img_do_upload1(){
        if(!empty($_FILES['img2']['name'])){
            $ext = pathinfo($_FILES['img2']['name']);
			$pic= uniqid().'.'.$ext['extension']; 	 
        }
		
        $config['file_name']= $pic;
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/amazingusbci/public/upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF';
	
        $this->load->library('Upload', $config);		$this->upload->initialize($config);
        if (!$this->upload->do_upload('img2')){  
            // $error = array('error' => $this->upload->display_errors());
            // $this->form_validation->rules('Husbend Photo not uploaded');
        }else{  
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }

public function img_do_upload2(){
        if(!empty($_FILES['img3']['name'])){
            $ext = pathinfo($_FILES['img3']['name']);
			$pic= uniqid().'.'.$ext['extension']; 	 
        }
		
        $config['file_name']= $pic;
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/amazingusbci/public/upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF';
	
        $this->load->library('Upload', $config);		$this->upload->initialize($config);
        if (!$this->upload->do_upload('img3')){  
            // $error = array('error' => $this->upload->display_errors());
            // $this->form_validation->rules('Husbend Photo not uploaded');
        }else{  
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    } 	
	 public function add(){
		if($this->session->userdata('admin_id')!=null){
			$this->form_validation->set_rules('name', 'Product Name', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){
				$a_id=$this->session->userdata('admin_id');
				$where = array('a_id'=> $a_id);
				$data1['admin']= $this->admindetail_model->get_admin($where);
				$data['category']   = $this->category_model->get_category();
				$data['subcategory']   = $this->subcategory_model->get_subcategory();
				$this->load->view('specialadmin/includes/header',$data1);		  
				$this->load->view('specialadmin/product/add',$data);
				$this->load->view('specialadmin/includes/footer');
			}else{	
			   $data  = array('p_name' => $this->input->post('name'),
			               
						   'p_dis'=>$this->input->post('pdis'),
						   'c_id'=>$this->input->post('category'),
						   'sc_id'=>$this->input->post('subcategory'),
						   'page_title' => $this->input->post('page_title'),
							   'meta_keywrod' => $this->input->post('meta_keyword'),
							   'meta_discripation' => $this->input->post('meta_discripation'),							   'model_no' => $this->input->post('model_no'));
				if(isset($_FILES['img1']['name']) && !empty($_FILES['img1']['name'])) 
                {
                    $imgfilename =  $this->img_do_upload();
                    $data['p_img'] = $imgfilename['upload_data']['file_name'];
                }
				if(isset($_FILES['img2']['name']) && !empty($_FILES['img2']['name'])) 
                {
                    $imgfilename =  $this->img_do_upload1();
                    $data['p_img1'] = $imgfilename['upload_data']['file_name'];
                }
				if(isset($_FILES['img3']['name']) && !empty($_FILES['img3']['name'])) 
                {
                    $imgfilename =  $this->img_do_upload2();
                    $data['p_img2'] = $imgfilename['upload_data']['file_name'];
                }
                $res = $this->product_model->add($data);
                if($res)
                {
                    $this->session->set_flashdata('success', '<div class="alert alert-success">Product Add Successfully.</div>');
                }
                else
                {
                    $this->session->set_flashdata('success', '<div class="alert alert-danger">Product Not Add Successfully.</div>');
                }
                redirect(base_url().'specialadmin/product/index');
            }
		 }else{
			redirect(base_url().'specialadmin/login');
		}  
    }
	
	public function delete($p_id){
        $res =$this->product_model->delete($p_id);
        if($res){
            $this->session->set_flashdata('success', '<div class="alert alert-success">Product Deleted Successfully.</div>');
        }else{
            $this->session->set_flashdata('success', '<div class="alert alert-danger">Product Not Deleted.</div>');
        }
        redirect(base_url().'specialadmin/product/index');
    }
      
		
	
}
