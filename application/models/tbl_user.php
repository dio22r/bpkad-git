<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class tbl_user extends CI_Model {

    protected $table = "tbl_user";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insertdata($arrInsert = array()) {
        $return = $this->db->insert_batch($this->table, $arrInsert);
        return $return;
    }
    
    public function updatedata($arrUpdate = array(), $id = "") {
        unset($arrUpdate["as_id"]);
        $return = $this->db->update($this->table, $arrUpdate, "as_id = ".$id);
        
        return $return;
    }

    public function select_by_username($username) {
        $this->db->select("*")
            ->from($this->table)
            ->where("u_username", $username);

        $result = $this->db->get();
        $result = $this->result_to_array($result);
        
        return $result;
    }


    public function result_to_array($result) {
        $rows = array();
        foreach($result->result_array() as $row) {
            $rows[] = $row;
        }
        
        return $rows;
    }
}