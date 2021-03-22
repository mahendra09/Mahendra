<?php
class restaurant_owner_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tablero = 'restaurant_owner';
		parent::__construct();
        $this->load->database();
	}
	
	function get_restaurant_owner($where = ''){  
		$this->load->database();
        if(empty($where)){
            $query=$this->db->get($this->tablero);
        }else{
            $query=$this->db->get_where($this->tablero,$where);
        }
		if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	} 
	
	function get_single_restaurant_owner_detail($ro_id = ''){
        $where = array('ro_id' => $ro_id);
        return $this->db->get_where($this->tablero, $where)->result_array();
    }  
	 
	public function update($data, $where){
        $res = $this->db->update($this->tablero, $data, $where);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    }
	
	public function add($data){   
        $res = $this->db->insert($this->tablero, $data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    } 
		
	public function delete($ro_id){
        $where = array('ro_id' => $ro_id);
        $res = $this->db->delete($this->tablero, $where);
        if($res){
             return TRUE;
        }
    }
	


}