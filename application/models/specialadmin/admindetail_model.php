<?php
class admindetail_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tablename = 'admin';
		parent::__construct();
	}
	
	function get_admin($where = ''){  
		$this->load->database();
        if(empty($where)){
            $query=$this->db->get($this->tablename);
        }else{
            $query=$this->db->get_where($this->tablename,$where);
        }
		if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	}
}