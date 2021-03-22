<?php
class product_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tableproduct = 'product';
		
		parent::__construct();
        $this->load->database();
	}
	
	
	function get_product($where = ''){  
		$this->load->database();
        if(empty($where)){
			$this->db->select('*');
			$this->db->from('product');
			$this->db->join('category', 'category.c_id = product.c_id');
			$this->db->join('subcategory', 'subcategory.sc_id = product.sc_id');
			$query = $this->db->get();
//            $query=$this->db->get($this->tableproduct);
        }else{
            $query=$this->db->get_where($this->tableproduct,$where);
        }
		
        if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	} 
	
	function get_single_product_detail($p_id = ''){
        $where = array('p_id' => $p_id);
        return $this->db->get_where($this->tableproduct, $where)->result_array();
    }  
	 
	public function update($data, $where){
        $res = $this->db->update($this->tableproduct, $data, $where);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    }
	
	public function add($data){   
        $res = $this->db->insert($this->tableproduct, $data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    } 
	
	public function delete($p_id){
        $where = array('p_id' => $p_id);
        $res = $this->db->delete($this->tableproduct, $where);
        if($res){
             return TRUE;
        }
    }
		


}