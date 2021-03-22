<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class offerslider extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('specialadmin/admindetail_model');
		$this->load->model('specialadmin/offer_slider_model');
		$this->load->model('specialadmin/gallery_model');
        $this->load->helper('form');
	}		

	public function index(){    
		if($this->session->userdata('admin_id')!=null)
		{
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data1['admin']= $this->admindetail_model->get_admin($where);
			$data['slider']   = $this->offer_slider_model->get_offer_slider();
			$this->load->view('specialadmin/includes/header',$data1);		  
			$this->load->view('specialadmin/offerslider/index',$data);
			$this->load->view('specialadmin/includes/footer');
		}else{
			redirect(base_url().'specialadmin/login');
		}
	}

	public function edit($os_id){     
        if(empty($os_id)){
            redirect($_SERVER['HTTP_REFERER']);
        }
		if($this->session->userdata('admin_id')!=null)
		{
		$data['os_id'] = $os_id;
		$this->form_validation->set_rules('name', 'Slider Name', 'required|trim|xss_clean');
        if($this->form_validation->run() === FALSE){
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data1['admin']= $this->admindetail_model->get_admin($where);
			$data['slider'] = $this->offer_slider_model->get_single_offer_slider_detail($os_id);
			$this->load->view('specialadmin/includes/header',$data1);		  
			$this->load->view('specialadmin/offerslider/edit',$data);
			$this->load->view('specialadmin/includes/footer');
        }else{
            $data  = array();
			$where = array('os_id' => $os_id);
            $data  = array('sl_name' => $this->input->post('name'));
			if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) 
                {
                    $imgfilename =  $this->img_do_upload();
                    $data['img'] = $imgfilename['upload_data']['file_name'];
                }
            $res = $this->offer_slider_model->updateslider($data, $where);
                if($res)
                {
                    $this->session->set_flashdata('success', 'Offer Slider Updated Successfully.');
                }
                else
                {
                    $this->session->set_flashdata('success', 'Offer Slider Not Updated Successfully.');
                }
                redirect(base_url().'specialadmin/offerslider/index');
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
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/public/slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF';
        $this->load->library('Upload', $config);
        if (!$this->upload->do_upload('img')){  
            $error = array('error' => $this->upload->display_errors());
            // $this->form_validation->rules('Husbend Photo not uploaded');
        }else{  
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    } 

	 public function add(){
		if($this->session->userdata('admin_id')!=null){
			$this->form_validation->set_rules('name', 'Slider Name', 'required|trim|xss_clean');
			if($this->form_validation->run() === FALSE){
				$a_id=$this->session->userdata('admin_id');
				$where = array('a_id'=> $a_id);
				$data1['admin']= $this->admindetail_model->get_admin($where);
				$data['gallery']   = $this->gallery_model->get_gallery();
				$this->load->view('specialadmin/includes/header',$data1);		  
				$this->load->view('specialadmin/offerslider/add',$data);
				$this->load->view('specialadmin/includes/footer');
			}else{	
			    $data    = array('sl_name' => $this->input->post('name'));
				if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) 
                {
                    $imgfilename =  $this->img_do_upload();
                    $data['img'] = $imgfilename['upload_data']['file_name'];
                }			
                $res = $this->offer_slider_model->add($data);
                if($res)
                {
                    $this->session->set_flashdata('success', '<div class="alert alert-success">Offer Slider Add Successfully.</div>');
                }
                else
                {
                    $this->session->set_flashdata('success', '<div class="alert alert-danger">Offer Slider Not Add Successfully.</div>');
                }
                redirect(base_url().'specialadmin/offerslider/index');
            }
		 }else{
			redirect(base_url().'specialadmin/login');
		}  
        }

		



	public function delete($os_id){
        $res =   $this->offer_slider_model->delete($os_id);
        if($res){
            $this->session->set_flashdata('success', '<div class="alert alert-success">Offer Slider Deleted Successfully.</div>');
        }else{
            $this->session->set_flashdata('success', '<div class="alert alert-danger">Offer Slider Not Deleted.</div>');
        }
		redirect(base_url().'specialadmin/offerslider/index');
    }

      

    public function logout(){
        $this->session->unset_userdata('admin_id');
        $this->session->sess_destroy();
        redirect(base_url());
    }   
}

