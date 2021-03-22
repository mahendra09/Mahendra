<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contactform extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('specialadmin/admindetail_model');
		$this->load->model('specialadmin/contactfrom_model');
        $this->load->helper('form');
	}		
  
	public function index(){    
		if($this->session->userdata('admin_id')!=null)
		{
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data1['admin']= $this->admindetail_model->get_admin($where);
			$data['contactform']   = $this->contactfrom_model->get_contactform();
			$this->load->view('specialadmin/includes/header',$data1);		  
			$this->load->view('specialadmin/contactfrom/index',$data);
			$this->load->view('specialadmin/includes/footer');
		}else{
			redirect(base_url().'specialadmin/login');
		}
	}
	
	public function edit($g_id){     
        if(empty($g_id)){
            redirect($_SERVER['HTTP_REFERER']);
        }
		if($this->session->userdata('admin_id')!=null)
		{
		$data['g_id'] = $g_id;
		$this->form_validation->set_rules('name', 'Gallery Name', 'required|trim|xss_clean');
		
        if($this->form_validation->run() === FALSE){
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data1['admin']= $this->admindetail_model->get_admin($where);
			$data['gallery'] = $this->gallery_model->get_single_gallery_detail($sl_id);
			$this->load->view('specialadmin/includes/header',$data1);		  
			$this->load->view('specialadmin/gallery/edit',$data);
			$this->load->view('specialadmin/includes/footer');
        }else{
            $data  = array();
			$where = array('g_id' => $g_id);
            $data  = array('g_name' => $this->input->post('name'));
			if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) 
                {
                    $imgfilename =  $this->img_do_upload();
                    $data['g_img'] = $imgfilename['upload_data']['file_name'];
                }
				
            $res = $this->gallery_model->update($data, $where);
                if($res)
                {
                    $this->session->set_flashdata('success', 'gallery Updated Successfully.');
                }
                else
                {
                    $this->session->set_flashdata('success', 'gallery Not Updated Successfully.');
                }
                redirect(base_url().'specialadmin/gallery/index');
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
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/ciadmin/public/upload/';
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
			$this->form_validation->set_rules('name', 'Gallery Name', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){
				$a_id=$this->session->userdata('admin_id');
				$where = array('a_id'=> $a_id);
				$data1['admin']= $this->admindetail_model->get_admin($where);
				$this->load->view('specialadmin/includes/header',$data1);		  
				$this->load->view('specialadmin/gallery/add');
				$this->load->view('specialadmin/includes/footer');
			}else{	
			    $data    = array('g_name' => $this->input->post('name'));
				if(isset($_FILES['g_img']['name']) && !empty($_FILES['img']['name'])) 
                {
                    $imgfilename =  $this->img_do_upload();
                    $data['g_img'] = $imgfilename['upload_data']['file_name'];
                }
                $res = $this->gallery_model->add($data);
                if($res)
                {
                    $this->session->set_flashdata('success', '<div class="alert alert-success">Gallery Add Successfully.</div>');
                }
                else
                {
                    $this->session->set_flashdata('success', '<div class="alert alert-danger">Gallery Not Add Successfully.</div>');
                }
                redirect(base_url().'specialadmin/gallery/index');
            }
		 }else{
			redirect(base_url().'specialadmin/login');
		}  
        }
		
	
}
