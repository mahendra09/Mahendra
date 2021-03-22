<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class booking extends CI_Controller {	
public function __construct(){		
parent::__construct();		
$this->load->model('specialadmin/admindetail_model');
		$this->load->model('specialadmin/booking_model');
						$this->load->helper('form');	
		}		
	
	
	public function index(){
	    		if($this->session->userdata('admin_id')!=null){			
				$a_id=$this->session->userdata('admin_id');			
				$where = array('a_id'=> $a_id);			
				$data1['admin']= $this->admindetail_model->get_admin($where);			
				$data['book']   = $this->booking_model->get_booking();			
				$this->load->view('specialadmin/includes/header',$data1);		  			
				$this->load->view('specialadmin/booking/index',$data);			
				$this->load->view('specialadmin/includes/footer');		
			}else{			
				redirect(base_url().'specialadmin/login');		
			}	
		}
		
	
	public function delete($book_id){
        $res =$this->booking_model->delete($book_id);
        if($res){
            $this->session->set_flashdata('success', '<div class="alert alert-success">Booking Deleted Successfully.</div>');
        }else{
            $this->session->set_flashdata('success', '<div class="alert alert-danger">Booking Not Deleted.</div>');
        }
        redirect(base_url().'specialadmin/booking/index');
    }	

}