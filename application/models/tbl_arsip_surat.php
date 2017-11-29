<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class tbl_arsip_surat extends CI_Model {

    protected $table = "tbl_arsip_surat";
    

    public function __construct() {
        parent::__construct();
    }
    
    public function insertdata($arrInsert = array()) {
        unset($arrInsert["as_id"]);
        $return = $this->db->insert("tbl_arsip_surat", $arrInsert);
        
        return $return;
    }
    
    public function updatedata($arrUpdate = array(), $id = "") {
        unset($arrUpdate["as_id"]);
        $return = $this->db->update("tbl_arsip_surat", $arrUpdate, "as_id = ".$id);
        
        return $return;
    }

    public function retrieve_by_id($id) {
        $this->db->select("*")
            ->from($this->table)
            ->where("as_id = '$id'");
        
        $result = $this->db->get();
        
        $data = $this->result_to_array($result);
        return $data;
    }

    public function retrieve_no_thumb($start, $perpage) {
        /**
            SELECT t1 . * , t2.las_status
            FROM  `tbl_arsip_surat` AS t1
            LEFT JOIN log_arsip_surat_thumb AS t2 ON t1.as_id = t2.as_id
            WHERE t2.las_status IS NULL 
            OR t2.las_status =0
            LIMIT 0 , 30
         */

        $this->db->select("t1.*, t2.las_status")
            ->from($this->table . " as t1")
            ->join("log_arsip_surat_thumb as t2", "t1.as_id = t2.as_id", "left")
            ->limit($perpage, $start)
            ->where("t2.las_status IS NULL")
            ->or_where("t2.las_status", 0)
            ->order_by("t1.as_id DESC");

        $result = $this->db->get();
        
        $data = $this->result_to_array($result);
        return $data;
    }

    public function retrieve_by_limit($search, $start, $perpage) {
        $this->db->select("*")
            ->from($this->table)
            ->like("as_search_index", $search)
            ->where("as_status", 1)
            ->limit($perpage, $start)
            ->order_by("as_tgl_diterima DESC");

        $result = $this->db->get();
        
        $data = $this->result_to_array($result);
        return $data;
    }

    public function json_table($column, $arrOption) {
        $start = ($arrOption["page"] - 1) * $arrOption["perpage"];
        $this->db->select($column)
            ->from($this->table)
            ->like($arrOption["searchfield"], $arrOption["searchdata"], "both")
            ->order_by("as_tgl_diterima DESC")
            ->limit($arrOption["perpage"], $start);
        
        $result = $this->db->get();
        
        $data = $this->result_to_array($result);
        
        return $data;
    }
    
    public function json_table_count(
        $arrOption
    ) {
        $this->db->select("count(*) as total")
            ->from($this->table)
            ->like($arrOption["searchfield"], $arrOption["searchdata"], "both");
        
        $result = $this->db->get();
        
        $data = $this->result_to_array($result);
        
        return $data[0]["total"];
    }

    public function result_to_array($result) {
        $rows = array();
        foreach($result->result_array() as $row) {
            $rows[] = $row;
        }
        
        return $rows;
    }
    
    public function count() {
        $this->db->select("count(*) as total")
            ->from($this->table)
            ->where("as_status", 1);
        
        $result = $this->db->get();
        
        $data = $this->result_to_array($result);
        
        return $data[0]["total"];
    }

    public function count_search($search) {
        $this->db->select("count(*) as total")
            ->from($this->table)
            ->like("as_search_index", $search)
            ->where("as_status", 1);
        
        $result = $this->db->get();
        
        $data = $this->result_to_array($result);
        
        return $data[0]["total"];
    }

    public function update_index_search($id = 0) {
        $this->db->select("*")
            ->from($this->table)
            ->where("as_id", $id);

        $result = $this->db->get();
        $data = $this->result_to_array($result);
        
        $arrUpdate = array(
            "as_index_search" => $text
        );
        $this->update($arrUpdate, $id);
    }
}