<?php
class inquiry_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tablecategory = 'inquiry';
		
		parent::__construct();
        $this->load->database();
	}
	
	
	function get_inquiry($where = ''){  
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
	
	function get_single_category_detail($c_id = ''){
        $where = array('c_id' => $c_id);
        return $this->db->get_where($this->tablecategory, $where)->result_array();
    }  
	 
	
	
	
	public function delete($in_id){
        $where = array('in_id' => $in_id);
        $res = $this->db->delete($this->tablecategory, $where);
        if($res){
             return TRUE;
        }
    }
		


}