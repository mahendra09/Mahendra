<?php
class booking_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tablegallery = 'book_now';
		
		parent::__construct();
        $this->load->database();
	}
	
	
	function get_booking($where = ''){  
		$this->load->database();
        if(empty($where)){
            $query=$this->db->get($this->tablegallery);
        }else{
            $query=$this->db->get_where($this->tablegallery,$where);
        }
		
        if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	} 
	
	function get_single_booking_detail($book_id = ''){
        $where = array('book_id' => $book_id);
        return $this->db->get_where($this->tablegallery, $where)->result_array();
    }  
	 
	public function update($data, $where){
        $res = $this->db->update($this->tablegallery, $data, $where);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    }
	
	public function add($data){   
        $res = $this->db->insert($this->tablegallery, $data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    } 
		
	public function delete($book_id){
        $where = array('book_id' => $book_id);
        $res = $this->db->delete($this->tablegallery, $where);
        if($res){
             return TRUE;
        }
    }

}