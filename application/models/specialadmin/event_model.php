<?php
class event_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tableevent = 'event';
		parent::__construct();
        $this->load->database();
	}
	
	
	function get_event($where = ''){  
		$this->load->database();
        if(empty($where)){
            $query=$this->db->get($this->tableevent);
        }else{
            $query=$this->db->get_where($this->tableevent,$where);
        }
		
        if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	} 
	
	function get_single_event_detail($ev_id = ''){
        $where = array('ev_id' => $ev_id);
        return $this->db->get_where($this->tableevent, $where)->result_array();
    }  
	 
	public function update($data, $where){
        $res = $this->db->update($this->tableevent, $data, $where);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    }
	
	public function add($data){   
        $res = $this->db->insert($this->tableevent, $data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    } 
	
	public function delete($ev_id){
        $where = array('ev_id' => $ev_id);
        $res = $this->db->delete($this->tableevent, $where);
        if($res){
             return TRUE;
        }
    }
		


}