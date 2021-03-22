<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newcompany extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('Alldata');
		$this->load->model('specialadmin/admindetail_model');
		$this->load->model('employee_model');
        $this->load->helper('form');
	}		

	public function index(){    
		if($this->session->userdata('admin_id')!=null)
		{
			$a_id=$this->session->userdata('admin_id');
			$where = array('a_id'=> $a_id);
			$data['admin']= $this->admindetail_model->get_admin($where);
			$data['company']   = $this->Alldata->getDatamodel('company_register');
			//$this->load->view('specialadmin/includes/header',$data1);		  
			$this->load->view('specialadmin/Newcompany/index',$data);
			//$this->load->view('specialadmin/includes/footer');
		}else{
			redirect(base_url().'specialadmin/login');
		}
	}

	public function active($id){     
        $where = array('companyid'=>$id);
		$data = array('status' => 'Active');
		$res = $this->Alldata->UpdateData('company_register',$data,$where);
		if($res){
			$where = array('em_company'=>$id);
			$companyemp = $this->Alldata->DetailData('employee',$where);
			if(empty($companyemp)){
				$where = array('companyid'=>$id);
				$companydata = $this->Alldata->DetailData('company_register',$where);
				$string = $companydata[0]['companyname'];
				$s = ucfirst($string);
				$bar = ucwords(strtolower($s));
				$employeecodename = preg_replace('/\s+/', '', $bar);
				
					
				$em_id = $employeecodename.'_001';
				$em_code = $employeecodename.'_001';
				//$em_code = str_pad($gen + 1, 3, 0, STR_PAD_LEFT);
				//$em_id=$employeecodename.'_'.str_pad($emid + 1, 3, 0, STR_PAD_LEFT);
				
				$data = array(
							'em_id'=>$em_id,
							'em_code'=>$em_code,
							'first_name'=>$companydata[0]['fname'],
							'last_name'=>$companydata[0]['lname'],
							'em_email'=>$companydata[0]['email'],
							'em_password'=>$companydata[0]['password'],
							'em_role'=>'SUPER ADMIN',
							'status'=>'ACTIVE',
							'em_phone'=>$companydata[0]['phoneno'],
							'em_username'=>$companydata[0]['username'],
							'em_company'=>$id,
						); 
				$this->Alldata->insertData('employee',$data);
			}else{
				$where = array('em_company'=>$id);
				$data = array('status' => 'ACTIVE');
				$this->Alldata->UpdateData('employee',$data,$where);
			}
			$this->session->set_flashdata('success', '<div class="alert alert-success">Company Active Successfully.</div>');
		}else{
            $this->session->set_flashdata('success', '<div class="alert alert-danger">Company Not Active.</div>');
        }
		redirect(base_url().'specialadmin/Newcompany/index');
		
    }
	
	public function inactive($id){     
        $where = array('companyid'=>$id);
		$data = array('status' => 'INACTIVE');
		$res = $this->Alldata->UpdateData('company_register',$data,$where);
		if($res){
			$where = array('em_company'=>$id);
			$data = array('status' => 'INACTIVE');
			$this->Alldata->UpdateData('employee',$data,$where);
			
			$this->session->set_flashdata('success', '<div class="alert alert-success">Company Inacive Successfully.</div>');
		}else{
            $this->session->set_flashdata('success', '<div class="alert alert-danger">Company Not Inacive.</div>');
        }
		redirect(base_url().'specialadmin/Newcompany/index');
		
    }
	
	

	public function img_do_upload(){
        if(!empty($_FILES['img']['name'])){
            $ext = pathinfo($_FILES['img']['name']);
			$pic= uniqid().'.'.$ext['extension']; 	 
        }
        $config['img']= $pic;
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/mahakaliwebtechnology1/public/slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF';
        $this->load->library('Upload', $config);
		/* print_r($config);
		exit; */
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

				$data['admin']= $this->admindetail_model->get_admin($where);

				$data['gallery']   = $this->gallery_model->get_gallery();

			//	$this->load->view('specialadmin/includes/header',$data1);		  

				$this->load->view('specialadmin/slider/add',$data);

			//	$this->load->view('specialadmin/includes/footer');

			}else{	

			    $data    = array('sl_name' => $this->input->post('name'));

				if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) 

                {

                    $imgfilename =  $this->img_do_upload();

                    $data['img'] = $imgfilename['upload_data']['file_name'];

                }
				
                $res = $this->slider_model->add($data);

                if($res)

                {

                    $this->session->set_flashdata('success', '<div class="alert alert-success">Slider Add Successfully.</div>');

                }

                else

                {

                    $this->session->set_flashdata('success', '<div class="alert alert-danger">Slider Not Add Successfully.</div>');

                }

                redirect(base_url().'specialadmin/slider/index');

            }

		 }else{

			redirect(base_url().'specialadmin/login');

		}  

        }

		



	public function delete($sl_id){

        $res =   $this->slider_model->delete($sl_id);

        if($res){

            $this->session->set_flashdata('success', '<div class="alert alert-success">Slider Deleted Successfully.</div>');

        }else{

            $this->session->set_flashdata('success', '<div class="alert alert-danger">Slider Not Deleted.</div>');

        }

		redirect(base_url().'specialadmin/slider/index');

    }

      

    public function logout(){

        $this->session->unset_userdata('admin_id');

        $this->session->sess_destroy();

        redirect(base_url());

    }   

		

	

}

