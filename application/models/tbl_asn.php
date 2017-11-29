<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class tbl_asn extends CI_Model {

    protected $table = "tbl_asn";
    protected $primaryKey = "ta_id";

    public function __construct() {
        parent::__construct();
    }
    
    public function insertdata($arrInsert = array()) {
        unset($arrInsert[$this->primaryKey]);
        $return = $this->db->insert($this->table, $arrInsert);
        
        return $return;
    }
    
    public function updatedata($arrUpdate = array(), $id = "") {
        unset($arrUpdate["as_id"]);
        $return = $this->db->update($this->table, $arrUpdate, $this->primaryKey ." = ". $id);
        
        return $return;
    }

    public function retrieve_by_id($id) {
        $this->db->select("*")
            ->from($this->table)
            ->where($this->primaryKey, $id);
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        return $data;
    }

    public function insert_batch($arrInsert) {
        $result = $this->db->insert_batch($this->table, $arrInsert);

        return $result;
    }

    public function retrieve_data_for_dropdown() {
        $this->db->select("ta_id, ta_nama")
            ->from($this->table)
            ->where("ta_status = 1")
            ->order_by("tlj_id ASC");
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        $return = array();
        foreach($data as $key => $arrVal) {
            $return[$arrVal["ta_id"]] = $arrVal["ta_nama"];
        }
        return $return;
    }

    public function retrieve_all_data() {
        $this->db->select("*")
            ->from($this->table)
            ->where("ta_status = 1");
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        return $data;
    }
}