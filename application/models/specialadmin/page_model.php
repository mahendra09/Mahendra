<?php
class page_model extends CI_Model {
	private $tablename;
	function __construct(){
		$this->tablepage = 'page';
		$this->tableadmin = 'admin';
		parent::__construct();
        $this->load->database();
	}
	
	function get_single_page_detail($p_id = ''){
        $where = array('p_id' => $p_id);
        return $this->db->get_where($this->tablepage, $where)->result_array();
    }  
	 
	public function update($data, $where){
        $res = $this->db->update($this->tablepage, $data, $where);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }    
    }
			

}