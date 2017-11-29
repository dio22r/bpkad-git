<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class asn_pangkat extends CI_Controller {

    protected $activeMenu = "asn";
    protected $title = "Data ASN";
    protected $arrViewContentHeader = array(
        "ctlTitle" => "ASN",
        "ctlSubtitle" => "Form Pengisian"
    );
    protected $arrCss = array();
    protected $arrJs = array();
    
    protected $thisurl;
    protected $lib_defaultView;

    public function __construct() {
        parent::__construct();
        // load helper
        $this->load->helper("misc");
        $this->load->helper("path");
        $this->load->helper("file");
        $this->load->helper("form");
        
        $this->load->library("image_lib");
        $this->load->library("default_view");

        $this->load->model("tbl_asn_trans");
        
        // load libraries

        $arrConfig = array("session" => $this->session);
        $this->lib_login = new lib_login($arrConfig);

        $this->lib_login->redir_ifnot_login();
        $this->isLogin = $this->lib_login->check_login();
        $this->arrSession = $this->lib_login->get_session_data();
        // endof load libraries
        
        $this->lib_defaultView = new default_view($this->load, $this->lib_login);
        //$this->libLogin->redir_ifnot_login();

        $this->thisurl = base_url("index.php/asn_pangkat");
    }
    
    public function index($search = "all", $start = 0) {
		
        $search = urldecode($search);
        
        $arrPost = $this->input->post();
        if ($arrPost) {
            $search = $arrPost["search"];
        }

        $perpage = 10;
        if ($search == "all") {
            $tempSearch = "";
        } else if (trim($search) == "") {
            $tempSearch = $search;
            $search = "all";
        } else {
            $tempSearch = $search;
        }
        //$arrData = $this->tbl_asn_trans->retrieve_test();
        
        $arrData = $this->tbl_asn_trans->retreive_pangkat();
        $arrPangkat = array();
        foreach($arrData as $key => $arrVal) {
            $arrPangkat[$arrVal["tap_id"]] = $arrVal["tap_jenis_pangkat"] .
                " (" . $arrVal["tap_golongan"] . "/" . $arrVal["tap_ruang"] . ")";
        }

        $arrData = $this->tbl_asn_trans->retreive_asn();
        $arrAsn = array();
        foreach($arrData as $key => $arrVal) {
            $arrAsn[$arrVal["ta_id"]] = $arrVal["ta_nama"];
        }

        $arrContent = array(
            "ctlArrPangkat" => $arrPangkat,
            "ctlArrAsn" => $arrAsn,
            "ctlActionPost" => $this->thisurl . "/submit",
            "ctlArrConfig" => array(
                "urlData" => $this->thisurl . "/ajx_data"
            )
        );

        $arrData = array(
            "ctlTitle" => "ASN",
            "ctlSubTitle" => "Daftar Aparatur Sipil Negara",

            "ctlSideBar" => $this->lib_defaultView->retrieve_menu("pangkat"),
            "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
            "ctlContentArea" => $this->load->view("asn/vw_form_pangkat", $arrContent, true),
            "ctlSideBarR" => $this->load->view("master_view/master_sidebar_r", array(), true),

            "ctlArrJs" => array(
                base_url("assets/js/controller/asn_pangkat.js"),
                base_url("assets/js/bootstrap-datepicker.min.js"),
                base_url("assets/js/select2.full.min.js"),
            ),
            "ctlArrCss" => array(
                base_url("assets/css/bootstrap-datepicker3.min.css"),
                base_url("assets/css/select2.min.css"),
            )
        );
        $this->load->view('master_view/master_index', $arrData);
    }
	
    public function ajx_data($id = "") {
        $arrPost = $this->input->post();

        if ($arrPost) {
            $id = $arrPost["id"];
        }

        $arrPetugas = $this->tbl_asn_trans->retrieve_by_id($id);

        if ($arrPetugas) {
            $arrJson = array(
                "arr_data" => $arrPetugas[0],
                "status" => true
            );
        } else {
            $arrJson = array(
                "arr_data" => $arrPetugas,
                "status" => false
            );
        }
        
        $this->output
            ->set_content_type("application/json")
            ->set_output(json_encode($arrJson));
    }

    public function submit($arrPost = array()) {

        if (!is_array($arrPost) || !$arrPost) {
            $arrPost = $this->input->post();
        }
        
        if (!$arrPost) {
            show_404();
        }

        $arrDataLama = $this->tbl_asn_trans->retrieve_by_id($arrPost["ta_id"]);
        $arrPangkat = $this->tbl_asn_trans->retrieve_pangkat_by_id($arrPost["tap_id"]);

        $result = $this->tbl_asn_trans->insertPangkatTrans($arrPost);

        if ($result) {
            $arrData = $arrDataLama[0];

            $arrPangkat = $arrPangkat[0];
            $arrData["pangkat_baru"] = $arrPangkat["tap_jenis_pangkat"] .
                " (" . $arrPangkat["tap_golongan"] . "/" . $arrPangkat["tap_ruang"] . ")";

        } else {
            $arrData = array();
        }
        
        $arrContent = array(
            "ctlBackUrl" => $this->thisurl,
            "ctlArrData" => $arrData,
            "ctlResult" => $result
        );
        $arrData = array(
            "ctlTitle" => "ASN",
            "ctlSubTitle" => "Daftar Aparatur Sipil Negara",

            "ctlSideBar" => $this->lib_defaultView->retrieve_menu("pangkat"),
            "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
            "ctlContentArea" => $this->load->view("asn/vw_submit_pangkat", $arrContent, true),
            "ctlSideBarR" => $this->load->view("master_view/master_sidebar_r", array(), true),

            "ctlArrJs" => array(
                base_url("assets/js/controller/asn_pangkat.js"),
                base_url("assets/js/bootstrap-datepicker.min.js"),
                base_url("assets/js/select2.full.min.js"),
            ),
            "ctlArrCss" => array(
                base_url("assets/css/bootstrap-datepicker3.min.css"),
                base_url("assets/css/select2.min.css"),
            )
        );

        $this->load->view('master_view/master_index', $arrData);
    }
    
    private function _set_data($arrPost) {
        $status = false;
        $arrPost["as_status"] = 1;

        if (in_array("Lain-lain ...", $arrPost["as_diteruskan"])) {
            $arrPost["as_diteruskan"][] = $arrPost["as_diteruskan_lain"];
        }
        $arrPost["as_diteruskan"] = json_encode($arrPost["as_diteruskan"]);

        if (in_array("Lain-lain ...", $arrPost["as_ket"])) {
            $arrPost["as_ket"][] = $arrPost["as_ket_lain"];
        }
        $arrPost["as_ket"] = json_encode($arrPost["as_ket"]);

        unset($arrPost["as_diteruskan_lain"]);
        unset($arrPost["as_ket_lain"]);

        if (!isset($arrPost["as_id"]) || trim($arrPost["as_id"]) == "") {
            $status = $this->tbl_arsip_surat->insertdata($arrPost);
        } else {
            $status = $this->tbl_arsip_surat->updatedata($arrPost, $arrPost["as_id"]);
        }

        return $status;
    }
    
}
    