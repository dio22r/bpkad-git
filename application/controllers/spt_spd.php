<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class spt_spd extends CI_Controller {

    protected $activeMenu = "spt_spd";
    protected $title = "Data Arsip Surat";
    protected $arrViewContentHeader = array(
        "ctlTitle" => "Surat Perintah Tugas",
        "ctlSubtitle" => "Form Pengisian"
    );
    protected $arrCss = array();
    protected $arrJs = array();
    
    protected $thisurl;

    public function __construct() {
        parent::__construct();
        // load helper
        $this->load->helper("misc");
        $this->load->helper("form");

        $this->load->model("trans_spt_spd");
        $this->load->model("tbl_asn");
        // load libraries
        $this->load->library("default_view");


        $arrConfig = array("session" => $this->session);
        $this->lib_login = new lib_login($arrConfig);

        $this->lib_login->redir_ifnot_login();
        $this->isLogin = $this->lib_login->check_login();
        $this->arrSession = $this->lib_login->get_session_data();
        // endof load libraries
        
        $this->lib_login->redir_ifnot_login();
        $this->lib_defaultView = new default_view($this->load, $this->lib_login);

        $this->thisurl = base_url("index.php/spt_spd");
    }

    public function index($search = "all", $start = 0) {

        $perpage = 20;

        $tempSearch = array("tspt_status" => 1);
        $arrData = $this->trans_spt_spd->retrieve_spt($tempSearch, $start, $perpage);
        $totalData = $this->trans_spt_spd->count_sppd($tempSearch);
        
        //print_r($arrData);
        $url = $this->thisurl."/index/all/";
        $paging = $this->_pagination($url, $totalData[0]["total"], $perpage, 4);

        $arrAttrEdit = array("class" => "btn btn-default  btn-xs");
        $arrAttrPrint = array(
            "class" => "btn btn-default  btn-xs",
            "target" => "_blank"
        );

        $printPdfUrl = base_url("index.php/spt_spd_pdf/print_pdf");
        foreach($arrData as $key => $arrVal) {
            $arrData[$key]["tspt_tgl_berangkat"] = misc_helper::format_idDate($arrVal["tspt_tgl_berangkat"]) . " (" . $arrVal["tspt_jmlh_hari"] . " hari)";
            unset($arrData[$key]["tspt_jmlh_hari"]);
            $btnPrint = anchor(
                $printPdfUrl. "/" .$arrVal["tspt_id"],
                '<span class="glyphicon glyphicon-print"></span>', $arrAttrPrint
            );


            $btnNomor = anchor(
                $this->thisurl."/form_nomor_surat/".$arrVal["tspt_id"],
                '<span class="fa fa-tags"></span>', $arrAttrEdit
            );

            if (trim($arrVal["tspt_nomor"]) != "") {
                $btnEdit = $btnPlus = $btnHapus = "";
            } else {
                $btnEdit =  anchor(
                    $this->thisurl."/form_edit/".$arrVal["tspt_id"],
                    '<span class="glyphicon glyphicon-edit"></span>', $arrAttrEdit
                );
                $btnPlus = anchor(
                    $this->thisurl."/form_tambah_anggota/".$arrVal["tspt_id"],
                    '<span class="fa fa-user-plus"></span>', $arrAttrEdit
                );
                $btnHapus = anchor(
                    $this->thisurl."/hapus_data/".$arrVal["tspt_id"],
                    '<span class="fa fa-trash"></span>', $arrAttrEdit
                );             
            }

            $btnEdit .= $btnNomor . $btnHapus;

            unset($arrData[$key]["tspt_nomor"]);
            
            $arrData[$key]["action"] =
            '<div class="input-group-btn">'
                .$btnPrint. ' ' .$btnEdit.
            '</div>';
        }

        $arrData = array(
            "ctlArrData" => $arrData,
            "ctlUrlEdit" => $this->thisurl . "/form/",
            "ctlUrlTable" => $this->thisurl,
            "ctlUrlNew" => $this->thisurl . "/form_step1/",
            "ctlPaging" => $paging
        );


        $contentData = $this->load->view("spt_spd/vw_data_table", $arrData, true);

        $arrData = array(
            "ctlTitle" => "SPPD",
            "ctlSubTitle" => "Sekretariat BPKAD",

            "ctlSideBar" => $this->lib_defaultView->retrieve_menu("spt_spd"),
            "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
            "ctlContentArea" => $contentData,
            "ctlSideBarR" => $this->load->view("master_view/master_sidebar_r", $arrData, true),

            "ctlArrJs" => array(),
            "ctlArrCss" => array()
        );
        $this->load->view('master_view/master_index', $arrData);
    }

    protected function _pagination($url, $totalRows, $perpage, $uriSegment) {
        $this->load->library('pagination');

        $config['base_url'] = $url;
        $config['total_rows'] = $totalRows;
        $config['reuse_query_string'] = true;
        $config['per_page'] = $perpage;
        $config['uri_segment'] = $uriSegment;
        $config['num_links'] = 3;
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($config); 

        $pagination = $this->pagination->create_links();

        return $pagination;
    }

    public function form_step1() {

        $arrData = array(
            "ctlArrData" => "",
            "ctlUrlEdit" => $this->thisurl . "/form/",
            "ctlUrlSubmit" => $this->thisurl . "/form_step2/",
            "ctlUrlTable" => $this->thisurl
        );
        
        $contentData = $this->load->view("spt_spd/vw_form_step1_jumlah_petugas", $arrData, true);

        $arrData = array(
            "ctlTitle" => "SPPD",
            "ctlSubTitle" => "Sekretariat BPKAD",

            "ctlSideBar" => $this->lib_defaultView->retrieve_menu("spt_spd"),
            "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
            "ctlContentArea" => $contentData,
            "ctlSideBarR" => $this->load->view("master_view/master_sidebar_r", $arrData, true),
            "ctlArrJs" => array(),
            "ctlArrCss" => array()
        );
        $this->load->view('master_view/master_index', $arrData);
    }

    public function form_edit($id = 0) {

        $arrPetugas = $this->tbl_asn->retrieve_data_for_dropdown();

        $arrPengesahan = $this->trans_spt_spd->retrieve_data_dropdown_pengesahan(1);

        $arrPPTK = $this->trans_spt_spd->retrieve_data_dropdown_pengesahan(2);
        $arrPPTK[0] = "- - - -";

        $arrData = $this->trans_spt_spd->retrieve_spt_spd($id);

        $jumlah = $arrData[0]["tspt_jumlah_orang"];

        $arrData = array(
            "ctlId" => $id,
            "ctlArrData" => $arrData[0],
            "ctlArrDetail" => $arrData,
            "ctlCancelUrl" => $this->thisurl . "/",
            "ctlThisUrl" => $this->thisurl,
            "ctlSubmitUrl" => $this->thisurl . "/submit",
            "ctlUrlData" => $this->thisurl . "/ajx_retrieve_asn/",
            "ctlUrlTable" => $this->thisurl,
            "ctlJumlahPetugas" => $jumlah,
            "ctlArrPetugas" => $arrPetugas,
            "ctlArrPengesahan" => $arrPengesahan,
            "ctlArrPPTK" => $arrPPTK
        );

        $contentData = $this->load->view("spt_spd/vw_form_step2_filling", $arrData, true);
        

        $arrData = array(
            "ctlTitle" => "SPPD",
            "ctlSubTitle" => "Sekretariat BPKAD",

            "ctlSideBar" => $this->lib_defaultView->retrieve_menu("spt_spd"),
            "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
            "ctlContentArea" => $contentData,
            "ctlSideBarR" => $this->load->view("master_view/master_sidebar_r", $arrData, true),
            "ctlArrJs" => array(
                base_url("assets/js/controller/spt_spd.js"),
                base_url("assets/js/jquery-ui.min.js")
            ),
            "ctlArrCss" => array(
                base_url("assets/css/jquery-ui.structure.min.css"),
                base_url("assets/css/jquery-ui.theme.min.css"),
                base_url("assets/css/jquery-ui.css"),
            )
        );
        $this->load->view('master_view/master_index', $arrData);

    }

    public function form_step2() {

        $arrPost = $this->input->post();

        if (!$arrPost) {
            show_404();
        }

        $arrPetugas = $this->tbl_asn->retrieve_data_for_dropdown();

        $arrPengesahan = $this->trans_spt_spd->retrieve_data_dropdown_pengesahan(1);
        //$arrPengesahan[] = array("0" => "kosong");
        
        $arrPPTK = $this->trans_spt_spd->retrieve_data_dropdown_pengesahan(2);
        $arrPPTK[0] = "- - - -";
        //$arrPPTK[] = array("0" => "kosong");

        $jumlah = $arrPost["as_jumlah_orang"];

        $arrDet = array();
        for ($i=0; $i<$jumlah; $i++) {
            $arrDet[] = array();
        }
        
        $arrData = array(
            "ctlArrData" => "",
            "ctlArrDetail" => $arrDet,
            "ctlCancelUrl" => $this->thisurl . "/",
            "ctlThisUrl" => $this->thisurl,
            "ctlSubmitUrl" => $this->thisurl . "/submit",
            "ctlUrlData" => $this->thisurl . "/ajx_retrieve_asn/",
            "ctlUrlTable" => $this->thisurl,
            "ctlJumlahPetugas" => $jumlah,
            "ctlArrPetugas" => $arrPetugas,
            "ctlArrPengesahan" => $arrPengesahan,
            "ctlArrPPTK" => $arrPPTK
        );
        //$this->load->view("view_admin_html_header", $arrCtl);
        
        $contentData = $this->load->view("spt_spd/vw_form_step2_filling", $arrData, true);
        //$this->load->view("view_admin_footer", array());

        $arrData = array(
            "ctlTitle" => "SPPD",
            "ctlSubTitle" => "Sekretariat BPKAD",

            "ctlSideBar" => $this->lib_defaultView->retrieve_menu("spt_spd"),
            "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
            "ctlContentArea" => $contentData,
            "ctlSideBarR" => $this->load->view("master_view/master_sidebar_r", $arrData, true),
            "ctlArrJs" => array(
                base_url("assets/js/controller/spt_spd.js"),
                base_url("assets/js/jquery-ui.min.js")
            ),
            "ctlArrCss" => array(
                base_url("assets/css/jquery-ui.structure.min.css"),
                base_url("assets/css/jquery-ui.theme.min.css"),
                base_url("assets/css/jquery-ui.css"),
            )
        );
        $this->load->view('master_view/master_index', $arrData);

    }

    public function submit() {
        $arrPost = $this->input->post();

        $arrInsertTSPT = misc_helper::get_form_arrData_todb($arrPost, "tspt_");
        $arrInsertTSPT["tspt_jumlah_orang"] = count($arrPost["tspd_ta_id"]);
        $arrInsertTSPT["tspt_status"] = 1;

        if (trim($arrPost["tspt_id"]) == "") {
            $idSPT = $this->trans_spt_spd->insert_spt($arrInsertTSPT);

            $arrInsertTSPD = array();
            foreach($arrPost["tspd_ta_id"] as $key => $val) {
                $arrInsertTSPD[] = array(
                    "tspt_id" => $idSPT,
                    "ta_id" => $val,
                    "tspd_status" => 1
                );
            }

            $result = $this->trans_spt_spd->insert_spd($arrInsertTSPD);
        } else {
            $idSPT = $arrPost["tspt_id"];
            $result = $this->trans_spt_spd->update_spt($arrInsertTSPT, $idSPT);
        }

        $printUrl = base_url("index.php/spt_spd_pdf/print_pdf");
        if ($result) {
            $arrData = array(
                "ctlUrlPdf" => $printUrl . "/" . $idSPT,
                "ctlThisUrl" => $this->thisurl,
                "ctlUrlTable" => $this->thisurl
            );

            $contentData = $this->load->view("spt_spd/vw_aftersubmit", $arrData, true);

            $arrData = array(
                "ctlTitle" => "SPPD",
                "ctlSubTitle" => "Sekretariat BPKAD",

                "ctlSideBar" => $this->lib_defaultView->retrieve_menu("spt_spd"),
                "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
                "ctlContentArea" => $contentData,
                "ctlSideBarR" => $this->load->view("master_view/master_sidebar_r", $arrData, true),
                "ctlArrJs" => array(),
                "ctlArrCss" => array()
            );
            $this->load->view('master_view/master_index', $arrData);

        } else {
            echo "sorry terjadi kesalahan pada system";
        }
        
    }

    public function ajx_retrieve_asn($id = "") {
        $arrPost = $this->input->post();

        if ($arrPost) {
            $id = $arrPost["id"];
        }

        $arrPetugas = $this->tbl_asn->retrieve_by_id($id);

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

    public function form_nomor_surat($idSpt) {
        
        $arrData = $this->trans_spt_spd->retrieve_spt_spd($idSpt);

        if (!$arrData) {
            show_404();
        }

        $arrData = array(
            "ctlUrlSubmit" => $this->thisurl . "/submit_nomor_surat/",
            "ctlUrlNew" => $this->thisurl . "/form_step1/",
            "ctlUrlTable" => $this->thisurl,
            "ctlArrData" => $arrData[0],
            "ctlArrDataDetail" => $arrData,
        );

        $contentData = $this->load->view("spt_spd/vw_form_nomor_surat", $arrData, true);

        $arrData = array(
            "ctlTitle" => "SPPD",
            "ctlSubTitle" => "Sekretariat BPKAD",

            "ctlSideBar" => $this->lib_defaultView->retrieve_menu("spt_spd"),
            "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
            "ctlContentArea" => $contentData,
            "ctlSideBarR" => $this->load->view("master_view/master_sidebar_r", $arrData, true),
            "ctlArrJs" => array(),
            "ctlArrCss" => array()
        );
        $this->load->view('master_view/master_index', $arrData);

    }

    public function submit_nomor_surat() {
        $arrPost = $this->input->post();

        if (!$arrPost) {
            show_404();
        }

        $arrUpdateSPT = array(
            "tspt_nomor" => $arrPost["tspt_nomor"]
        );
        $idSPT = $arrPost["tspt_id"];

        $arrUpdateSPD = array();
        foreach($arrPost["tspd_id"] as $key => $val) {
            $arrUpdateSPD[] = array(
                "update" => array(
                    "tspd_nomor" => $arrPost["tspd_nomor"][$key]
                ),
                "where" => array(
                    "tspd_id" => $val
                )
            );
        }


        $status = $this->trans_spt_spd->update_spt($arrUpdateSPT, $idSPT);
        if ($status) {
            $status = $this->trans_spt_spd->update_spd($arrUpdateSPD);
        }
        
        $status = false;

        $arrData = $this->trans_spt_spd->retrieve_spt_spd($idSPT);


        $arrData = array(
            "ctlArrData" => $arrData[0],
            "ctlArrDataDetail" => $arrData,
            "ctlResult" => $status,
            "ctlBackUrl" => $this->thisurl . "/form_nomor_surat/" . $idSPT,
            "ctlHomeUrl" => $this->thisurl
        );
        
        $contentData = $this->load->view("spt_spd/vw_submit_nomor_surat", $arrData, true);

        $arrData = array(
            "ctlTitle" => "SPPD",
            "ctlSubTitle" => "Sekretariat BPKAD",

            "ctlSideBar" => $this->lib_defaultView->retrieve_menu("spt_spd"),
            "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
            "ctlContentArea" => $contentData,
            "ctlSideBarR" => $this->load->view("master_view/master_sidebar_r", $arrData, true),
            "ctlArrJs" => array(),
            "ctlArrCss" => array()
        );
        $this->load->view('master_view/master_index', $arrData);
    }

    public function hapus_data() {

    }

/*
    public function update_data() {

        return false;

        $this->load->helper("file");
        $filepath = APPPATH."../assets/other/daftar-nama-ASN.csv";
        $string = read_file($filepath);
        
        $arrData = explode("\n", $string);

        $arrInsert = array();
        foreach ($arrData as $key => $val) {
            $arrRow = explode(",", $val);

            if (count($arrRow) > 1) {
                $jabatan = str_replace('"', "", $arrRow[1]);
                $jabatan = str_replace('BADAN', "", $jabatan);

                $id = $arrRow[0];

                if (trim($jabatan) != "PELAKSANA") {
                    $jabatan = trim($jabatan);
                    $jabatan .= " BADAN PENGELOLA KEUANGAN DAN ASET DAERAH";
                }

                $arrUpdate = array(
                    "ta_jabatan" => $jabatan
                );

                $this->tbl_asn->updatedata($arrUpdate, $id);
            }
        }
        
        //$this->tbl_asn->update_batch($arrInsert);
        print_r($arrInsert);
    }

    public function insert_data() {
        $this->load->helper("file");
        $filepath = APPPATH."../assets/other/daftar-nama-ASN.csv";
        $string = read_file($filepath);

        $arrData = explode("\n", $string);

        $arrInsert = array();
        for ($i = 0; $i <= 146; $i += 3) {
            $nip = str_replace("NIP. ", "", $arrData[$i+1]);
            $nama = str_replace('"', "", $arrData[$i]);
            $arrInsert[] = array(
                "ta_nama" => $nama,
                "ta_nip" => $nip,
                "ta_pangkat" => $arrData[$i+2],
                "ta_status" => 1
            );
        }
        
        //$this->tbl_asn->insert_batch($arrInsert);
    }
*/

}
