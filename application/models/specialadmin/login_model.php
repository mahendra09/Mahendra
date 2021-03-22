<?php
### Rapid Technology Solution
class login_model extends CI_Model {
	private $tablename;
	function __construct(){
		### Database Table Name
		$this->tablename = 'admin';
		parent::__construct();
        $this->load->database();
	}
	
	### Login Funcation
	function check_login($where){
		### Select Query
		$query=$this->db->get_where($this->tablename,$where);
        if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	}
}