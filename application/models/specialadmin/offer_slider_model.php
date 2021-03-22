<?php
class offer_slider_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tableslider = 'offerslider';
		parent::__construct();
        $this->load->database();
	}
	
	
	function get_offer_slider($where = ''){  
		$this->load->database();
        if(empty($where)){
            $query=$this->db->get($this->tableslider);
        }else{
            $query=$this->db->get_where($this->tableslider,$where);
        }
		
        if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	} 
	
	function get_single_offer_slider_detail($os_id = ''){
        $where = array('os_id' => $os_id);
        return $this->db->get_where($this->tableslider, $where)->result_array();
    }  
	 
	public function updateslider($data, $where){
        $res = $this->db->update($this->tableslider, $data, $where);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    }
	
	public function add($data){   
        $res = $this->db->insert($this->tableslider, $data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    } 

	public function delete($os_id){
        $where = array('os_id' => $os_id);
        $res = $this->db->delete($this->tableslider, $where);
        if($res){
            return TRUE;
        }
    }


}