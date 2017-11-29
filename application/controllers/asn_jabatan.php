<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class asn_jabatan extends CI_Controller {

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

        $this->thisurl = base_url("index.php/asn_jabatan");
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
        
        $arrData = $this->tbl_asn_trans->retreive_jabatan();
        $arrJabatan = array();
        foreach($arrData as $key => $arrVal) {
            $arrJabatan[$arrVal["taj_id"]] = $arrVal["taj_nama"];
        }

        $arrData = $this->tbl_asn_trans->retreive_asn();
        $arrAsn = array();
        foreach($arrData as $key => $arrVal) {
            $arrAsn[$arrVal["ta_id"]] = $arrVal["ta_nama"];
        }

        $arrContent = array(
            "ctlArrJabatan" => $arrJabatan,
            "ctlArrAsn" => $arrAsn,
            "ctlActionPost" => $this->thisurl . "/submit",
            "ctlArrConfig" => array(
                "urlData" => $this->thisurl . "/ajx_data"
            )
        );

        $arrData = array(
            "ctlTitle" => "ASN",
            "ctlSubTitle" => "Daftar Aparatur Sipil Negara",

            "ctlSideBar" => $this->lib_defaultView->retrieve_menu("jabatan"),
            "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
            "ctlContentArea" => $this->load->view("asn/vw_form_jabatan", $arrContent, true),
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
        $arrJabatan = $this->tbl_asn_trans->retrieve_jabatan_by_id($arrPost["taj_id"]);


        $result = $this->tbl_asn_trans->insertJabatanTrans($arrPost);
        
        if ($result) {
            $arrData = $arrDataLama[0];

            $arrJabatan = $arrJabatan[0];
            $arrData["jabatan_baru"] = $arrJabatan["taj_nama"];
            
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
            "ctlContentArea" => $this->load->view("asn/vw_submit_jabatan", $arrContent, true),
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
    
    public function set_data() {
        $arrData = $this->tbl_asn_trans->temp();

        $arrInsert = array();

        foreach ($arrData as $key => $arrVal) {
            $arrInsert[] = array(
                "ta_id" => $arrVal["ta_id"],
                "taj_id" => 20,
                "tajt_date_start" => "",
                "tajt_date_end" => "",
            );
        }

        //$result = $this->tbl_asn_trans->temp_insert($arrInsert);

        print_r($arrData);
    }
    
}
    