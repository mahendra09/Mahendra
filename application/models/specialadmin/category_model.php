<?php
class category_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tablecategory = 'category';
		
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
	
	function get_single_category_detail($c_id = ''){
        $where = array('c_id' => $c_id);
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
	
	public function delete($c_id){
        $where = array('c_id' => $c_id);
        $res = $this->db->delete($this->tablecategory, $where);
        if($res){
             return TRUE;
        }
    }
		


}