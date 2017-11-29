<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class tbl_asn_trans extends CI_Model {

    protected $table1 = "tbl_asn";
    protected $table2 = "tbl_asn_jabatan_trans";
    protected $table3 = "tbl_asn_jabatan";
    protected $table4 = "tbl_asn_pangkat_trans";
    protected $table5 = "tbl_asn_pangkat";

    protected $primaryKey = "ta_id";

    public function __construct() {
        parent::__construct();
    }
    
    public function insertdata($arrInsert = array()) {
        unset($arrInsert[$this->primaryKey]);
        $return = $this->db->insert($this->table, $arrInsert);
        
        return $return;
    }

    public function insertJabatanTrans($arrInsert = array()) {
        $return = $this->db->insert($this->table2, $arrInsert);
        return $return;
    }
    
    public function insertPangkatTrans($arrInsert = array()) {
        $return = $this->db->insert($this->table4, $arrInsert);
        return $return;
    }
    
    public function updatedata($arrUpdate = array(), $id = "") {
        unset($arrUpdate["as_id"]);
        $return = $this->db->update($this->table, $arrUpdate, $this->primaryKey ." = ". $id);
        
        return $return;
    }

    public function retrieve_by_id($id) {
        $this->db->select("*")
            ->from($this->table1)
            ->where("ta_id", $id);
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        return $data;
    }

    public function retrieve_pangkat_by_id($id) {
        $this->db->select("*")
            ->from($this->table5)
            ->where("tap_id", $id);
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        return $data;
    }

    public function retrieve_jabatan_by_id($id) {
        $this->db->select("*")
            ->from($this->table3)
            ->where("taj_id", $id);
        
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

    public function retrieve_test() {
        $this->db->select("ta_id, ta_nip, ta_nama, ta_pangkat, ta_jabatan")
            ->from($this->table1 . " as t1")
            ->where("t1.ta_status = 1");

        $result = $this->db->get();
        $data = $result->result_array();

        return $data;
    }

    public function retrieve_by_limit() {
        $this->db->select("ta_id, ta_nip, ta_nama, ta_pangkat, ta_jabatan")
            ->from($this->table1 . " as t1")
            ->where("t1.ta_status = 1");

        $result = $this->db->get();
        $data = $result->result_array();

        return $data;
    }


    public function count_search() {
        $this->db->select("count(*) as total")
            ->from($this->table1 . " as t1")
            ->where("t1.ta_status = 1");

        $result = $this->db->get();
        $data = $result->result_array();

        return $data[0]["total"];
    }

    public function retrieve_all_data($perpage, $start) {
        $this->db->select("t1.ta_id, t1.ta_nama, t1.ta_nip, t3.taj_nama, t5.tap_jenis_pangkat,  
                    t5.tap_golongan, t5.tap_ruang")
            ->from($this->table1 . " as t1")
            ->join($this->table2 ." as t2", "t1.ta_id = t2.ta_id", "left")
            ->join($this->table3 ." as t3", "t2.taj_id = t3.taj_id", "left")
            ->join($this->table4 ." as t4", "t1.ta_id = t4.ta_id", "left")
            ->join($this->table5 ." as t5", "t4.tap_id = t5.tap_id", "left")
            ->limit($perpage, $start)
            ->where("t1.ta_status = 1")
            ->order_by("t3.taj_id ASC, t5.tap_id ASC");
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        return $data;
    }

    public function retreive_pangkat() {
        $this->db->select("*")
            ->from($this->table5 . " as t5")
            ->where("t5.tap_status = 1")
            ->order_by("t5.tap_id DESC");
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        return $data;   
    }

    public function retreive_jabatan() {
        $this->db->select("*")
            ->from($this->table3 . " as t3")
            ->where("t3.taj_status = 1")
            ->order_by("t3.taj_id ASC");
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        return $data;   
    }

    public function retreive_asn() {
        $this->db->select("t1.*")
            ->from($this->table1 . " as t1")
            //->join($this->table4 . " as t4", "t1.ta_id = t4.ta_id", "left")
            //->join($this->table5 . " as t5", "t4.tap_id = t5.tap_id", "left")
            ->where("t1.ta_status = 1")
            ->order_by("t1.ta_id ASC");
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        return $data;   
    }

    public function temp() {
        $this->db->select("t1.*, t3.*")
            ->from($this->table3 . " as t3")
            ->join($this->table2 . " as t2", "t3.taj_id = t2.taj_id", "right")
            ->join($this->table1 . " as t1", "t2.ta_id = t1.ta_id", "right")
            ->order_by("t1.ta_id ASC");
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        return $data;   
    }

    public function temp_insert($arrInsert) {
        $result = $this->db->insert_batch($this->table2, $arrInsert);

        return $result;
    }
}