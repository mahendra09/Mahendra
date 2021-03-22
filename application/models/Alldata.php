<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alldata extends CI_Model {
	
	public function insertData($table,$data)
    {
		$dates=array('lasttime'=> date("Y-m-d H:i:s"));
	    $query = $this->db->insert($table, $data); 
		return $query;
	}

	public function getDatamodel($table)
    {
      	  $query=$this->db->get($table);
      	  return $query->result_array();
	}

	public function DeleteData($table,$where)
    {
	    $this->db->delete($table, $where);
	}

	public function DetailData($table,$where,$order="")
    {
		$this->db->from($table);
		$this->db->where($where);
		if(!empty($order)){
			$this->db->order_by($order);
		}
		$result = $this->db->get()->result_array(); 
        return $result; 

	}
	
	public function emp_detail($table,$where){
		$email=$this->session->userdata('email');
		
		$where1=array('em_email!='=>$email);
		$this->db->from($table);
		$this->db->where($where);
		$this->db->where($where1);
		if(!empty($order)){
			$this->db->order_by($order);
		}
		$result = $this->db->get()->result_array(); 
        return $result; 
	}
	
	public function attendanceData($id)
    {
		
		$this->db->from('attendance1');
		$this->db->where('emp_id',$id);
		$this->db->group_by("atten_date");
		$this->db->order_by('id','DESC');
		$result = $this->db->get()->result_array(); 
		return $result; 
	}

	public function UpdateData($table,$data,$where)
    {
		$query = $this->db->update($table, $data,$where); 
		return $query;
	}

    

	public function sortingdata($selectdata,$table,$order)
	{
              $this->db->select($selectdata); 
              $this->db->from($table);

              $this->db->order_by($order);

              return $this->db->get()->result_array(); 

   } 
  public function containdetail($where)
  {       
          $session_data=$this->session->all_userdata();
          $lang=$session_data['flang'];
          $this->db->order_by("menu_position", "asc");
          $sel= $this->db->select('*');
          $this->db->from($lang.'tblmenu');
          $this->db->where($where);
          $this->db->join($lang.'tblcontent', $lang.'tblmenu.menu_content = '.$lang.'tblcontent.content_id','left');
          $this->db->join('tblbanners', 'tblbanners.banner_id ='.$lang.'tblcontent.banner_id','left');
          return  $this->db->get()->result_array();
  }
  //page view in backend...........
  public function pagedetail($where)
  {       
          $session_data=$this->session->all_userdata();
          $lang=$session_data['flang'];
          $sel= $this->db->select('*');
          $this->db->from($lang.'tblcontent');
          $this->db->where($where);
          $this->db->join('tblbanners', 'tblbanners.banner_id ='.$lang.'tblcontent.banner_id','left');
          return  $this->db->get()->result_array();
		  
  }

  public function portfolio_model(){

        $session_data=$this->session->all_userdata();
        $lang=$session_data['lang'];

        $this->db->from($lang.'tbl_portfolio as p1');

        $this->db->join('tbl_portfolio_category as p2', 'p2.portfolio_cat_id = p1.portfolio_cat_id','left');

        return $this->db->get()->result_array();

  }

    //send Feedback email //
    public function emailsend($to,$sub,$message)
    {
      $email_config = Array(
            'protocol'  => 'smtp',
             'smtp_host' => 'ssl://smtp.gmail.com',
             'smtp_port' => '465',
             'smtp_user' => 'parmarkuldeep481@gmail.com',
             'smtp_pass' => '123@cooldeep', 
             'mailtype'  => 'html',
             'starttls'  => true,
             'newline'   => "\r\n",
              'charset'   => 'iso-8859-1'
             );
                $this->load->library('email', $email_config);
                 $this->email->set_mailtype("html");
                $this->email->from('parmarkuldeep481@gmail.com', 'Original Indian DVDs');
                $this->email->to($to);
                $this->email->subject($sub);
                $this->email->message($message);
                $this->email->send();
                $this->email->set_mailtype("html");          
    }
  
	public function allattendacedetail()
	{       
          
		$this->db->select('*');
        $this->db->from('attendance');
        $this->db->join('employee','attendance.em_id = employee.id');
        $this->db->join('attendanc_log','attendance.id = attendanc_log.attendance_id');
	    return  $this->db->get()->result_array();
	}
  
	public function allattendacedetail1()
	{         
		$comid=$this->session->userdata('company');
		$this->db->select('att.id as attendanceid,att.date as attendancedate,att.effectivehours as attendanceeffectivehours,att.grosshours as attendancegrosshours,emp.*');
        $this->db->from('attendance as att');
		$this->db->join('employee as emp','att.em_id = emp.id');
		$this->db->where('emp.em_company',$comid);
		$this->db->order_by('attendanceid','DESC');
		return  $this->db->get()->result_array();
	}
	
	public function allemployeedetail1()
	{       
        $comid=$this->session->userdata('company');
		$this->db->select('*');
        $this->db->from('employee');
        $this->db->where('em_company',$comid);
        $this->db->join('department','department.id = employee.dep_id');
        $this->db->join('designation','designation.id = employee.des_id');
        return  $this->db->get()->result_array();
	}
	
	public function withoutassignemp($ignore = "")
	{       
        $comid=$this->session->userdata('company');
		$this->db->select('*');
        $this->db->from('employee');
        $this->db->where('em_company',$comid);
		if(!empty($ignore)){
			$this->db->where_not_in('id', $ignore);
		}
		return  $this->db->get()->result_array();
	}
	
	
	
	public function assignempdetail($id){
		
		$comid=$this->session->userdata('company');
		$where=array('remp.company'=>$comid,'remp.reportingempfrom'=>$id);
		$this->db->select('remp.*,toemp.first_name as to_first_name,toemp.last_name as to_last_name,toemp.em_id as to_em_id,fromemp.first_name as from_first_name,fromemp.last_name as from_last_name,fromemp.em_id as from_em_id');
        $this->db->from('reportingemp as remp');
        $this->db->join('employee as toemp','remp.reportingempto = toemp.id');
		$this->db->join('employee as fromemp','remp.reportingempfrom = fromemp.id');
		$this->db->where($where);
		return  $this->db->get()->result_array();
	}
	
	public function birthday(){
		$comid=$this->session->userdata('company');
		$this->db->select("*");
		$this->db->from("employee");
		$this->db->where("EXTRACT(month FROM `em_birthday`)","MONTH(NOW())");
		$this->db->where("EXTRACT(day FROM `em_birthday`)","DAY(NOW())");
		$this->db->where('em_company',$comid);
		return $this->db->get()->result_array();
	}
	
	/* public function chatemployee($ignore = ""){
		$comid=$this->session->userdata('company');
		$where = array('em_company'=>$comid);
		$this->db->select('*');
        $this->db->from('employee');
        $this->db->where('em_company',$comid);
		if(!empty($ignore)){
			$this->db->where_not_in('id', $ignore);
		}
	} */
}

