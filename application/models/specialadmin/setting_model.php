<?php
class setting_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tablesetting = 'setting';
		$this->tableadmin = 'admin';
		parent::__construct();
        $this->load->database();
	}
	
	function get_single_setting_detail($s_id = ''){
        $where = array('s_id' => $s_id);
        return $this->db->get_where($this->tablesetting, $where)->result_array();
    }  
	 
	public function updatesetting($data, $where){
        $res = $this->db->update($this->tablesetting, $data, $where);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    }
			
	function get_single_admin_detail($a_id = ''){
        $where = array('a_id' => $a_id);
        return $this->db->get_where($this->tableadmin, $where)->result_array();
    }  
	 
	public function updateadmin($data, $where){
        $res = $this->db->update($this->tableadmin, $data, $where);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    }

}