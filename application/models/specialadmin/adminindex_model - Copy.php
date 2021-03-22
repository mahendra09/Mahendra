<?php
class adminindex_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tablename = 'users';
		parent::__construct();
	}
	
	function get_user($where = ''){  
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