<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class trans_spt_spd extends CI_Model {

    protected $table1 = "tbl_spt";
    protected $table2 = "tbl_spd";
    protected $table3 = "tbl_asn";
    protected $table4 = "tbl_asn_jabatan_trans";
    protected $table5 = "tbl_asn_jabatan";
    protected $table6 = "tbl_asn_pangkat_trans";
    protected $table7 = "tbl_asn_pangkat";


    protected $primaryKey = "tspt_id";

    public function __construct() {
        parent::__construct();
    }
    
    public function insert_spt($arrInsert = array()) {
        $return = $this->db->insert($this->table1, $arrInsert);

        return $this->db->insert_id();
    }

    public function insert_spd($arrInsert = array()) {
        $return = $this->db->insert_batch($this->table2, $arrInsert);
        return $return;
    }

    public function update_spt($arrUpdate = array(), $id = "") {
        unset($arrUpdate["tspt_id"]);
        $return = $this->db->update($this->table1, $arrUpdate, "tspt_id = ". $id);
        
        return $return;
    }

    public function update_spd($arrUpdate = array()) {
        $return = true;
        foreach($arrUpdate as $key => $arrVal) {
            $this->db->where($arrVal["where"]);

            if ($return) {
                $return = $this->db->update($this->table2, $arrVal["update"]);
            }
        }

        return $return;
    }

    public function retrieve_spt($arrData, $start, $perpage) {
        $this->db->select("tspt_id, tspt_nomor, tspt_tgl_berangkat, tspt_jmlh_hari, tspt_tujuan, tspt_maksud")
            ->from($this->table1)
            ->where($arrData)
            ->limit($perpage, $start)
            ->order_by("tspt_tgl_berangkat DESC, tspt_datetime DESC");

        $result = $this->db->get();
        
        $data = $result->result_array();

        // echo $this->db->last_query();
        
        return $data;
    }
 
    public function count_sppd($arrWhere = array()) {
        $this->db->select("count(*) as total")
            ->from($this->table1)
            ->where($arrWhere);

        $result = $this->db->get();
        
        $data = $result->result_array();

        // echo $this->db->last_query();
        
        return $data;
    }


    public function retrieve_spt_spd($id) {
        $this->db->select("*")
            ->from($this->table1 ." as t1")
            ->join($this->table2 ." as t2", "t1.tspt_id = t2.tspt_id")
            ->join($this->table3 ." as t3", "t2.ta_id = t3.ta_id")
            ->join($this->table4 ." as t4", "t3.ta_id = t4.ta_id")
            ->join($this->table5 ." as t5", "t4.taj_id = t5.taj_id")
            ->join($this->table6 ." as t6", "t3.ta_id = t6.ta_id")
            ->join($this->table7 ." as t7", "t6.tap_id = t7.tap_id")
            ->where("t1.tspt_id", $id)
            ->where("t6.tapt_status", 1)
            ->where("t4.tajt_status", 1)
            ->order_by("t2.tspd_id ASC");
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        // echo $this->db->last_query();
        
        return $data;
    }

    public function retrieve_asn_byId($arrId = array()) {
        $this->db->select("*")
            ->from($this->table3 . " as t3")
            ->join($this->table4 ." as t4", "t3.ta_id = t4.ta_id")
            ->join($this->table5 ." as t5", "t4.taj_id = t5.taj_id")
            ->join($this->table6 ." as t6", "t3.ta_id = t6.ta_id")
            ->join($this->table7 ." as t7", "t6.tap_id = t7.tap_id")
            ->where("t6.tapt_status", 1)
            ->where("t4.tajt_status", 1)
            ->where_in("t3.ta_id", $arrId);

        $result = $this->db->get();
        
        $data = $result->result_array();

        $arrResult = array();
        foreach($data as $key => $arrVal) {
            $arrResult[$arrVal["ta_id"]] = $arrVal;
        }

        return $arrResult;
    }

    public function insert_batch($arrInsert) {
        $result = $this->db->insert_batch($this->table, $arrInsert);

        return $result;
    }

    public function retrieve_data_for_dropdown() {
        $this->db->select("ta_id, ta_nama")
            ->from($this->table)
            ->where("ta_status = 1");
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        $return = array();
        foreach($data as $key => $arrVal) {
            $return[$arrVal["ta_id"]] = $arrVal["ta_nama"];
        }
        return $return;
    }


    public function retrieve_data_dropdown_pengesahan($pangkat = 1) {

        $query = $this->db->select("t3.ta_id, t3.ta_nama")
            ->from($this->table3 . " as t3")
            ->join($this->table4 . " as t4", "t3.ta_id = t4.ta_id")
            ->join($this->table5 . " as t5", "t4.taj_id = t5.taj_id")
            ->where("ta_status = 1");

        if ($pangkat == 1) {
            $query->where("(t5.taj_level = 1 OR t5.taj_level = 2)");
        } else if ($pangkat == 2) {
            $query->where("(t5.taj_level <= 4)");
        } else {
            return array();
        }
        
        $result = $this->db->get();
        
        $data = $result->result_array();

        $return = array();
        foreach($data as $key => $arrVal) {
            $return[$arrVal["ta_id"]] = $arrVal["ta_nama"];
        }
        return $return;
    }

}