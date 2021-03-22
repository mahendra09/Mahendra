 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
    
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
    }
	
    public function index(){
		$comid=$this->session->userdata('company');
		$where = array('em_company'=>$comid);
		$data['employee'] = $this->Alldata->DetailData('employee',$where);
		
		$this->load->view('backend/chat',$data);
    }
	
	public function send(){
		$comid=$this->session->userdata('company');
		$from=$this->session->userdata('id');
		$message = $this->input->post('message');    
		$to = $this->input->post('to'); 
		
		date_default_timezone_set("Asia/Calcutta");
		$sent = date('Y-m-d H:i:s');
		
		$data= array(
						'from'=>$from,
						'to'=>$to,
						'message'=>$message,
						'sent'=>$sent,
						'company'=>$comid,
					);
		
		$this->Alldata->insertData('chat',$data); 
	}
	
	public function allunreadmsg(){
		$where=array(
						'to'=>$this->session->userdata('id'),
						'company'=>$this->session->userdata('company'),
						'recd'=>0,
					);
		$data=array('recd'=>1);
		$this->Alldata->UpdateData('chat',$data,$where); 
	}
	
	public function personalunreadmsg(){
		$from = $this->input->post('id'); 
		//$from = 44; 
		
		$where=array(
						'to'=>$this->session->userdata('id'),
						'from'=>$from,
						'company'=>$this->session->userdata('company'),
						'unread'=>0,
					);
		$data=array('unread'=>1);
		$this->Alldata->UpdateData('chat',$data,$where); 
		
		$comid=$this->session->userdata('company');
		$to=$this->session->userdata('id');
		
		
		if(!empty($from) && isset($from)){
			$id=$from;
			$where ='(c.company = '. $comid .' AND c.to ='. $to.' AND c.from ='.$id .') OR ( c.company ='. $comid .' AND  c.from ='.$to.' AND c.to ='.$id.')';
		
		$this->db->select('c.*,toemp.first_name as to_first_name,toemp.last_name as to_last_name,toemp.em_id as to_em_id,toemp.em_image as to_em_image,fromemp.first_name as from_first_name,fromemp.last_name as from_last_name,fromemp.em_id as from_em_id,fromemp.em_image as from_em_image');
		$this->db->from('chat as c');
		$this->db->join('employee as toemp','c.to = toemp.id');
		$this->db->join('employee as fromemp','c.from = fromemp.id');
		$this->db->where($where);
		$this->db->order_by('id','ASC');
		//$this->db->or_where($whereor);
		$msg=$this->db->get()->result_array(); 
		/* echo '<pre>';
		print_r($msg);
		exit; */
		if(isset($msg) && !empty($msg)){
			foreach($msg as $msgobj){
				$msghtml = "";
				if($msgobj['from'] != $this->session->userdata('id')){
					$msghtml .= '<div class="media chat-messages">';
					$msghtml .= '<a class="media-left photo-table" href="#!">';
					if(!empty($msgobj['from_em_image'])){
						$msghtml .= '<img src="'. base_url().'assets/images/users/'.$msgobj["from_em_image"].'" class="media-object img-radius img-radius m-t-5" alt="User-Profile-Image"> ';
					}else{
						$msghtml .= '<img src="'. base_url().'assets/images/users/user.png" class="media-object img-radius img-radius m-t-5" alt="User-Profile-Image">';
					}
					
					$msghtml .= "</a>";
					$msghtml .= '<div class="media-body chat-menu-content">';
						$msghtml .= '<div class="">';
							$msghtml .= '<p class="chat-cont">'.$msgobj['message'].'</p>';
							
							$msghtml .= '<p class="chat-time">8:20 a.m.</p>';
						$msghtml .='</div>';
					$msghtml .= '</div>';
					$msghtml .= '</div>';
					
				}else{
					$msghtml .= '<div class="media chat-messages">';
						$msghtml .= '<div class="media-body chat-menu-reply">';
							$msghtml .= '<div class="">';
								$msghtml .= '<p class="chat-cont">'. $msgobj["message"] .'</p>';
								$msghtml .= '<p class="chat-time">8:20 a.m.</p>.';
							$msghtml .= '</div>';
						$msghtml .= '</div>';
						$msghtml .= '<div class="media-right photo-table">';
							$msghtml .= '<a href="#!">';
							if(!empty($msgobj['from_em_image'])){
								$msghtml .= '<img src="'.base_url().'assets/images/users/'.$msgobj["from_em_image"].'" class="media-object img-radius img-radius m-t-5" alt="User-Profile-Image">';
							}else{
								$msghtml .= '<img src="'.base_url().'assets/images/users/user.png" class="media-object img-radius img-radius m-t-5" alt="User-Profile-Image">';
							}
							$msghtml .= '</a>';
						$msghtml .= '</div>';
					$msghtml .= '</div>';
				//	echo $msghtml;
				}
				echo $msghtml;
			}
		}
			
			
			
			
		}
		
		 
		
	}
	
	public function allmessage($id){
		$comid=$this->session->userdata('company');
		$to=$this->session->userdata('id');
		
		$where ='(c.company = '. $comid .' AND c.to ='. $to.' AND c.from ='.$id .') OR ( c.company ='. $comid .' AND  c.from ='.$to.' AND c.to ='.$id.')';
		
		
		
		
		$this->db->select('c.*,toemp.first_name as to_first_name,toemp.last_name as to_last_name,toemp.em_id as to_em_id,toemp.em_image as to_em_image,fromemp.first_name as from_first_name,fromemp.last_name as from_last_name,fromemp.em_id as from_em_id,fromemp.em_image as from_em_image');
        $this->db->from('chat as c');
        $this->db->join('employee as toemp','c.to = toemp.id');
		$this->db->join('employee as fromemp','c.from = fromemp.id');
		$this->db->where($where);
		//$this->db->or_where($whereor);
		$msg=$this->db->get()->result_array();
		echo $this->db->last_query();
		echo '<pre>';
		print_r($msg);
		exit;
	}
    

}