<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('specialadmin/admindetail_model');
		$this->load->model('specialadmin/event_model');
		/* $this->load->model('restaurantpanel/booking_model');  */
        $this->load->helper('form');
	}		
  
	public function index(){    
		if($this->session->userdata('admin_id')!=null)
		{
			$data=array();
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data['admin']= $this->admindetail_model->get_admin($where);
			$this->load->view('specialadmin/index',$data);
		}else{
			redirect(base_url().'specialadmin/login');
		}
	}	
}
