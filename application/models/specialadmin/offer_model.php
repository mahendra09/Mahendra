<?php
class offer_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tablegallery = 'offer';
		parent::__construct();
        $this->load->database();
	}
	
	
	function get_offer($where = ''){  
		$this->load->database();
        if(empty($where)){
            $this->db->select('*');
			$this->db->from('offer');
			$this->db->join('restaurant_owner', 'restaurant_owner.ro_id = offer.ro_id');
			
			$query = $this->db->get();
        }else{
            $query=$this->db->get_where($this->tablegallery,$where);
        }
		
        if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	} 
	
	function get_single_offer_detail($offer_id = ''){
        $where = array('offer_id' => $offer_id);
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
	
	public function delete($offer_id){
        $where = array('offer_id' => $offer_id);
        $res = $this->db->delete($this->tablegallery, $where);
        if($res){
             return TRUE;
        }
    }
}