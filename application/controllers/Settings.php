 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
    
	    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model'); 
        $this->load->model('project_model'); 
        $this->load->model('settings_model'); 
        $this->load->model('leave_model'); 
		 $this->load->model('Alldata'); 
		  $this->load->helper('form');
    }
    public function index(){
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('dashboard/Dashboard');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');        
    }
    public function Settings(){
        if($this->session->userdata('user_login_access') != False) { 
           // $data['settingsvalue'] = $this->settings_model->GetSettingsValue();
			 $comid=$this->session->userdata('company');
			 $where=array('companyid'=>$comid);
            $data['settingsvalue'] = $this->Alldata->DetailData('company_register',$where);
            $this->load->view('backend/settings',$data);
        }
        else{
		    redirect(base_url() , 'refresh');
	    }            
    }

    

    public function Add_Settings(){ 
        if($this->session->userdata('user_login_access') != False) { 
			$id = $this->input->post('id');
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			//$copyright = $this->input->post('copyright');
			//$contact = $this->input->post('contact');
			//$currency = $this->input->post('currency');
			//$symbol = $this->input->post('symbol');
			//$email = $this->input->post('email');
			$address = $this->input->post('address');
			$address2 = $this->input->post('address2');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters();
			// Validating Title Field
			$this->form_validation->set_rules('title', 'title','trim|required|min_length[5]|max_length[60]|xss_clean');
			// Validating description Field
			$this->form_validation->set_rules('description', 'description', 'trim|required|min_length[20]|max_length[512]|xss_clean');
			// Validating address Field
			//$this->form_validation->set_rules('address', 'address', 'trim|min_length[5]|max_length[600]|xss_clean');
			//$this->form_validation->set_rules('address2', 'address2', 'trim|min_length[5]|max_length[600]|xss_clean');

			if ($this->form_validation->run() == True) {
				if($_FILES['img_url']['name']){
					$settings = $this->settings_model->GetSettingsValue();
					$file_name = $_FILES['img_url']['name'];
					$fileSize = $_FILES["img_url"]["size"]/1024;
					$fileType = $_FILES["img_url"]["type"];
					/*	$new_file_name='';
					$new_file_name .= $title;*/
					$checkimage = "./assets/images/$settings->sitelogo";

					$config = array(
						'file_name' => $file_name,
						'upload_path' => "./assets/images/",
						'allowed_types' => "gif|jpg|png|jpeg|svg",
						'overwrite' => False,
						'max_size' => "130380", // Can be set to particular file size , here it is 220KB(220 Kb)
						//'max_height' => "850",
						//'max_width' => "850"
					);
    
					$this->load->library('Upload', $config);
					$this->upload->initialize($config);                
					if (!$this->upload->do_upload('img_url')) {
							$this->session->set_flashdata('display_errors','<div class="alert alert-warning icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <i class="icofont icofont-close-line-circled"></i>
                                                                    </button> <p><strong>Warning!</strong>'.$this->upload->display_errors().'</p>
                                                                </div>');
							redirect("settings/Settings");
					}else {
						if(file_exists($checkimage)){
							unlink($checkimage);
						}
						$path = $this->upload->data();
						$img_url =$path['file_name'];
						$data = array();
						$data = array(
							'logo' => $img_url,
							'sitetitle' => $title,
							'descripation' => $description,
							//'copyright' => $copyright,
							//'contact' => $contact,
							//'currency' => $currency,
							//'symbol' => $symbol,
							//'system_email'=>$email,
							'address'=>$address,
							'address2'=>$address2
						);
						if(isset($_FILES['loginimg']['name']) && !empty($_FILES['loginimg']['name'])) 
						{
							$imgfilename =  $this->img_do_upload();
							$data['login_img'] = $imgfilename['upload_data']['file_name'];
						}
						$where=array('companyid'=>$id);
						$success = $this->Alldata->UpdateData('company_register',$data,$where);
						#echo 'Successfully Updated';
						
						$this->session->set_flashdata('feedback','<div class="alert alert-success icons-alert">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <i class="icofont icofont-close-line-circled"></i>
                                                                    </button>
                                                                    <p><strong>Success!</strong>Successfully Updated</p>
                                                                </div>');    
						redirect("settings/Settings");
					}
				} else {
					$data = array();
					$data = array(
						'sitetitle' => $title,
						'descripation' => $description,
						//'copyright' => $copyright,
						//'contact' => $contact,
						//'currency' => $currency,
						//'symbol' => $symbol,
						//'system_email'=>$email,
						'address'=>$address,
						'address2'=>$address2,
					);
					if(isset($_FILES['loginimg']['name']) && !empty($_FILES['loginimg']['name'])) 
						{
							$imgfilename =  $this->img_do_upload();
							$data['login_img'] = $imgfilename['upload_data']['file_name'];
						}
					#$success = $this->settings_model->SettingsUpdate($id,$data);
					#echo 'Successfully Updated';
						#
					$where=array('companyid'=>$id);
						$success = $this->Alldata->UpdateData('company_register',$data,$where);
					
					$this->session->set_flashdata('feedback','<div class="alert alert-success icons-alert">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <i class="icofont icofont-close-line-circled"></i>
                                                                    </button>
                                                                    <p><strong>Success!</strong>Successfully Updated</p>
                                                                </div>');     
					redirect("settings/Settings");
				}
			} else {
				$this->session->set_flashdata('validation_errors','<div class="alert alert-warning icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
																			<i class="icofont icofont-close-line-circled"></i>
																		</button> <p><strong>Warning!</strong>'.validation_errors().'</p>
																	</div>');
				//$this->session->set_flashdata('validation_errors',validation_errors());     
				redirect("settings/Settings");
				/* echo validation_errors();
				exit; */
			
			}
        }else{
			redirect(base_url() , 'refresh');
		}	
	}
	
	public function img_do_upload(){
        if(!empty($_FILES['loginimg']['name'])){
            $ext = pathinfo($_FILES['loginimg']['name']);
			$pic= uniqid().'.'.$ext['extension']; 	 
        }
		
        $config['loginimg']= $pic;
	//	$config['upload_path'] = "./assets/images/";
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/hr/assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF';
		
        $this->load->library('Upload', $config);
		$this->upload->initialize($config);
        if (!$this->upload->do_upload('loginimg')){  
			
            // $error = array('error' => $this->upload->display_errors());
            // $this->form_validation->rules('Husbend Photo not uploaded');
        }else{  
		
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    } 
}