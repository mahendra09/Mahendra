<?php
class user_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tableuser = 'user';
		parent::__construct();
        $this->load->database();
	}
	
	function get_user($where = ''){  
		$this->load->database();
        if(empty($where)){
            $query=$this->db->get($this->tableuser);
        }else{
            $query=$this->db->get_where($this->tableuser,$where);
        }
		if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	} 
	
	function get_single_user_detail($uid = ''){
        $where = array('uid' => $uid);
        return $this->db->get_where($this->tableuser, $where)->result_array();
    }  
	 
	public function update($data, $where){
        $res = $this->db->update($this->tableuser, $data, $where);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    }
	
	public function add($data){   
        $res = $this->db->insert($this->tableuser, $data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    } 
	
	public function delete($uid){
        $where = array('uid' => $uid);
        $res = $this->db->delete($this->tableuser, $where);
        if($res){
             return TRUE;
        }
    }


}