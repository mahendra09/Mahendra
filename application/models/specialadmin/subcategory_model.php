<?php
class subcategory_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tablesubcategory = 'subcategory';
		
		parent::__construct();
        $this->load->database();
	}
	
	
	function get_subcategory($where = ''){  
		$this->load->database();
        if(empty($where)){
			$this->db->select('*');
			$this->db->from('subcategory');
			$this->db->join('category', 'category.c_id = subcategory.c_id');
 
			$query = $this->db->get();

		
		//            $query=$this->db->get($this->tablesubcategory);
        }else{

			
            $query=$this->db->get_where($this->tablesubcategory,$where);
        }
		
        if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	} 
	
	function get_single_subcategory_detail($sc_id = ''){
        $where = array('sc_id' => $sc_id);
        return $this->db->get_where($this->tablesubcategory, $where)->result_array();
    }  
	 
	public function update($data, $where){
        $res = $this->db->update($this->tablesubcategory, $data, $where);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    }
	
	public function add($data){   
        $res = $this->db->insert($this->tablesubcategory, $data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    } 
	
	public function delete($sc_id){
        $where = array('sc_id' => $sc_id);
        $res = $this->db->delete($this->tablesubcategory, $where);
        if($res){
             return TRUE;
        }
    }
		


}