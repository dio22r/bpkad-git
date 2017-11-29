<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class log_arsip_surat_thumb extends CI_Model {

    protected $table = "log_arsip_surat_thumb";
    
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
}