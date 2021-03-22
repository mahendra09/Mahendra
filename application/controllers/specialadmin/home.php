<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('specialadmin/admindetail_model');
		$this->load->model('alldata');
        $this->load->helper('form');
	}		
  
	public function index(){
		if($this->session->userdata('admin_id')!=null)
		{
			
			$this->form_validation->set_rules('page_title', 'Page Title', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){
				
				$a_id=$this->session->userdata('admin_id');
				$where = array('a_id'=> $a_id);
				$data1['admin']= $this->admindetail_model->get_admin($where);
				$where = array('homeid'=> 1);
				$data['page']= $this->alldata->DetailData('home',$where);
				
				$this->load->view('specialadmin/includes/header',$data1);		  
				$this->load->view('specialadmin/home/index',$data);
				$this->load->view('specialadmin/includes/footer');
			 }else{
				
				$data  = array();
				$where = array('homeid' => 1);
				$data  = array('aboutus' => $this->input->post('aboutus'),
							   'callaction' => $this->input->post('callaction'),
							   'address' => $this->input->post('address'),
							   'mobileno' => $this->input->post('mobileno'),
							   'email' => $this->input->post('email'),
							   'map' => $this->input->post('map'),
							   'facebook' => $this->input->post('facebook'),
							   'twitter' => $this->input->post('twitter'),
							   'instagram' => $this->input->post('instagram'),
							   'googlepluse' => $this->input->post('googlepluse'),
							   'linkedin' => $this->input->post('linkedin'),
							   'pagetitle' => $this->input->post('page_title'),
							   'pagekeyword' => $this->input->post('meta_keyword'),
							   'pagedec' => $this->input->post('meta_discripation'));
				if(isset($_FILES['aboutimg']['name']) && !empty($_FILES['aboutimg']['name'])) {
                    $imgfilename =  $this->img_do_upload();
                    $data['abooutimg'] = $imgfilename['upload_data']['file_name'];
                }
				
				$res = $this->alldata->UpdateData('home',$data, $where);
                if($res){
                    $this->session->set_flashdata('success', 'Home Updated Successfully.');
                }else{
                    $this->session->set_flashdata('success', 'Home Not Updated.');
                }
                redirect(base_url().'specialadmin/home/index');
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
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/spoutsourcing/public/slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF';
        $this->load->library('Upload', $config);
        if (!$this->upload->do_upload('img')){  
            $error = array('error' => $this->upload->display_errors());
        }else{  
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }

    } 
}