<?php
class eventcategory_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tablecategory = 'eventcategory';
		
		parent::__construct();
        $this->load->database();
	}
	
	
	function get_category($where = ''){  
		$this->load->database();
        if(empty($where)){
            $query=$this->db->get($this->tablecategory);
        }else{
            $query=$this->db->get_where($this->tablecategory,$where);
        }
		
        if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	} 
	
	function get_single_category_detail($ec_id = ''){
        $where = array('ec_id' => $ec_id);
        return $this->db->get_where($this->tablecategory, $where)->result_array();
    }  
	 
	public function update($data, $where){
        $res = $this->db->update($this->tablecategory, $data, $where);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    }
	
	public function add($data){   
        $res = $this->db->insert($this->tablecategory, $data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    } 
	
	public function delete($ec_id){
        $where = array('ec_id' => $ec_id);
        $res = $this->db->delete($this->tablecategory, $where);
        if($res){
             return TRUE;
        }
    }
		


}