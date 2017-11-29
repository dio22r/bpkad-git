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

        $arrConfig = array("session" => $this->session);
        $this->lib_login = new lib_login($arrConfig);

        $this->lib_login->redir_ifnot_login();
        $this->isLogin = $this->lib_login->check_login();
        $this->arrSession = $this->lib_login->get_session_data();
        // endof load libraries
        
        //$this->libLogin->redir_ifnot_login();

        $this->thisurl = base_url("index.php/spt_spd");
    }

    public function index($search = "all", $start = 0) {

        $perpage = 20;

        $arrCtl = array(
            "ctlArrJs" => array(base_url("assets/js/controller/spt_spd.js")),
            "ctlArrCss" => array(base_url("assets/css/3-col-portfolio.css"))
        );

        $tempSearch = array("tspt_status" => 1);
        $arrData = $this->trans_spt_spd->retrieve_spt($tempSearch, $start, $perpage);

        $arrAttrEdit = array("class" => "btn btn-warning");
        $arrAttrPrint = array(
            "class" => "btn btn-default",
            "target" => "_blank"
        );

        foreach($arrData as $key => $arrVal) {
            $arrData[$key]["tspt_tanggal"] = misc_helper::format_idDate($arrVal["tspt_tanggal"]);
            $btnPrint = anchor(
                $this->thisurl."/print_pdf/".$arrVal["tspt_id"],
                '<span class="glyphicon glyphicon-print"></span>', $arrAttrPrint
            );

            if (trim($arrVal["tspt_nomor"]) != "") {
                $btnEdit = "";
            } else {
                $btnEdit =  anchor(
                    $this->thisurl."/form_edit/".$arrVal["tspt_id"],
                    '<span class="glyphicon glyphicon-edit"></span>', $arrAttrEdit
                );    
            }
            
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
            "ctlUrlNew" => $this->thisurl . "/form_step1/"
        );


        $this->load->view("view_admin_html_header", $arrCtl);
        $this->load->view("spt_spd/vw_data_table", $arrData);
        $this->load->view("view_admin_footer", array());
    }

    public function form_step1() {

        $arrData = array(
            "ctlArrData" => "",
            "ctlUrlEdit" => $this->thisurl . "/form/",
            "ctlUrlTable" => $this->thisurl
        );

        $arrCtl = array(
            "ctlArrJs" => array(
                base_url("assets/js/controller/spt_spd.js")
            ),
            "ctlArrCss" => array(
                base_url("assets/css/3-col-portfolio.css")
            )
        );
        $this->load->view("view_admin_html_header", $arrCtl);
        $this->load->view("spt_spd/vw_form_step1_jumlah_petugas", $arrData);
        $this->load->view("view_admin_footer", array());
    }

    public function form_edit($id = 0) {

        $arrPetugas = $this->tbl_asn->retrieve_data_for_dropdown();
        $arrPengesahan = $this->trans_spt_spd->retrieve_data_dropdown_pengesahan(1);
        $arrPPTK = $this->trans_spt_spd->retrieve_data_dropdown_pengesahan(2);

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

        $arrCtl = array(
            "ctlArrJs" => array(
                base_url("assets/js/controller/spt_spd.js"),
                base_url("assets/js/jquery-ui.min.js")
            ),
            "ctlArrCss" => array(
                base_url("assets/css/3-col-portfolio.css"),
                base_url("assets/css/jquery-ui.structure.min.css"),
                base_url("assets/css/jquery-ui.theme.min.css"),
                base_url("assets/css/jquery-ui.css"),
            )
        );
        $this->load->view("view_admin_html_header", $arrCtl);
        $this->load->view("spt_spd/vw_form_step2_filling", $arrData);
        $this->load->view("view_admin_footer", array());

    }

    public function form_step2() {

        $arrPost = $this->input->post();

        if (!$arrPost) {
            show_404();
        }

        $arrPetugas = $this->tbl_asn->retrieve_data_for_dropdown();
        $arrPengesahan = $this->trans_spt_spd->retrieve_data_dropdown_pengesahan(1);
        $arrPPTK = $this->trans_spt_spd->retrieve_data_dropdown_pengesahan(2);

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

        $arrCtl = array(
            "ctlArrJs" => array(
                base_url("assets/js/controller/spt_spd.js"),
                base_url("assets/js/jquery-ui.min.js")
            ),
            "ctlArrCss" => array(
                base_url("assets/css/3-col-portfolio.css"),
                base_url("assets/css/jquery-ui.structure.min.css"),
                base_url("assets/css/jquery-ui.theme.min.css"),
                base_url("assets/css/jquery-ui.css"),
            )
        );
        $this->load->view("view_admin_html_header", $arrCtl);
        $this->load->view("spt_spd/vw_form_step2_filling", $arrData);
        $this->load->view("view_admin_footer", array());

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

        if ($result) {
            $arrData = array(
                "ctlUrlPdf" => $this->thisurl."/print_pdf/". $idSPT,
                "ctlThisUrl" => $this->thisurl,
                "ctlUrlTable" => $this->thisurl
            );

            $arrCtl = array(
                "ctlArrJs" => array(),
                "ctlArrCss" => array(
                    base_url("assets/css/3-col-portfolio.css")
                )
            );
            $this->load->view("view_admin_html_header", $arrCtl);
            $this->load->view("spt_spd/vw_aftersubmit", $arrData);
            $this->load->view("view_admin_footer", array());
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

    public function print_pdf($id = 1) {

        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        $this->load->library('fpdf');
        $this->fpdf->SetTitle("SPPD");

        $arrData = $this->trans_spt_spd->retrieve_spt_spd($id);

        if (!$arrData) {
            show_404();
        }
        $arrId = array(
            $arrData[0]["tspt_pengesahan_spt"],
            $arrData[0]["tspt_pengesahan_spd"],
            $arrData[0]["tspt_pengesahan_lbr3"],
            $arrData[0]["tspt_pptk"],
        );

        $arrAsn = $this->trans_spt_spd->retrieve_asn_byId($arrId);

        $key = 0;
        
        foreach ($arrData as $key => $arrVal) {
            $arrVal["tspt_tgl_berangkat"] = misc_helper::format_idDate(
                $arrVal["tspt_tgl_berangkat"]
            );
            $arrVal["tspt_tgl_kembali"] = misc_helper::format_idDate(
                $arrVal["tspt_tgl_kembali"]
            );
            $arrVal["tspt_tanggal"] = misc_helper::format_idDate(
                $arrVal["tspt_tanggal"]
            );
            
            $this->_print_spd($arrVal, $arrAsn);
            $this->_halaman_belakang($arrData[0], $arrAsn);
        }

        $this->_print_spt($arrData, $arrAsn);


        $dir = APPPATH."../assets/sppd/";
        $this->fpdf->Output();        
    }

    protected function _print_spd($arrData, $arrAsn) {

        $this->fpdf->AddPage("P", array(210, 330));
        $this->fpdf->SetAutoPageBreak(false, "5");

        $this->_surat_header();

        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $widthMargin = 10;

        $this->fpdf->SetFont('arial','',10);

        $this->fpdf->Cell(210 - $widthMargin - 70,4, "");
        $this->fpdf->Cell(25, 4, "Lembar ke");
        $this->fpdf->Cell(40, 4, ":");
        $this->fpdf->Ln();
        $this->fpdf->Cell(210 - $widthMargin - 70,4, "");
        $this->fpdf->Cell(25, 4, "Nomor");
        $this->fpdf->Cell(40, 4, ":");

        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('arial','BU',16);
        $this->fpdf->Cell(210 - $widthMargin, 5,
            "Surat Perjalanan Dinas", 0, 0, 'C');

        $this->fpdf->Ln(8);

        $this->fpdf->SetFont('arial','B',12);
        $this->fpdf->Cell(210 - $widthMargin, 5,
            "Nomor dan Tanggal Surat Perintah Tugas");

        $this->fpdf->Ln(8);

        $this->fpdf->SetFont('arial','',11);
        $noWidth = 8;
        $centerWidth = 90;
        $height = 7;
        $this->fpdf->Cell($noWidth, $height, "1.", "LTR", 0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "PENGGUNA ANGGARAN/", "TR");
        $this->fpdf->Cell($centerWidth, $height,
            " KEPALA BADAN PENGELOLA KEUANGAN DAN", "TR");
        
        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LBR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "KUASA PENGGUNA ANGGARAN", "BR");
        $this->fpdf->Cell($centerWidth, $height,
            " ASET DAERAH / SEKRETARIS, ", "BR");
        
        $this->fpdf->Ln(); ////////////


        $this->fpdf->Cell($noWidth, $height, "2.", "LTR", 0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "NAMA/NIP PELAKSANA SURAT", "TR");
        $this->fpdf->SetFont('arial','B',11);
        $this->fpdf->Cell($centerWidth, $height,
            " ".$arrData["ta_nama"], "TR");
        $this->fpdf->SetFont('arial','',11);

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LBR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "PERJALANAN DINAS (SPD)", "BR");
        $this->fpdf->Cell($centerWidth, $height,
            " NIP.    ".$arrData["ta_nip"], "BR");
        
        $this->fpdf->Ln(); ////////////


        $this->fpdf->Cell($noWidth, $height, "3.", "LTR", 0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "a.   PANGKAT DAN GOLONGAN", "TR");
        $this->fpdf->Cell($centerWidth, $height,
            " a.  ".$arrData["ta_pangkat"], "TR");

        $this->fpdf->Ln();

        $tempHeight = $height;
        $height = 5;

        $arrLineJabatan = misc_helper::fpdf_multiline(
            $arrData["ta_jabatan"], 32
        );
        //print_r($arrLineJabatan);
        $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "b.   JABATAN / INSTANSI", "R");
        $this->fpdf->Cell($centerWidth, $height,
            " b. ".$arrLineJabatan[0], "R");
        
        $this->fpdf->Ln();

        unset($arrLineJabatan[0]);

        foreach ($arrLineJabatan as $key => $val) {
            $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
            $this->fpdf->Cell($centerWidth, $height,
                "", "R");
            $this->fpdf->Cell($centerWidth, $height,
                "      ".$val, "R");
            $this->fpdf->Ln();
        }

        $height = $tempHeight;
        $this->fpdf->Cell($noWidth, $height, "", "LBR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "c.   TINGKAT BIAYA PERJALANAN DINAS", "BR");
        $this->fpdf->Cell($centerWidth, $height,
            " c.  ". $arrData["tlj_biaya"], "BR");

        $this->fpdf->Ln(); //////////////////////////////

        $arrLnMaksud = misc_helper::fpdf_multiline(
            $arrData["tspt_maksud"], 45
        );


        $tempHeight = $height;
        $height = 5;

        $this->fpdf->Cell($noWidth, $height, "4. ", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "MAKSUD PERJALANAN DINAS", "R");
        $this->fpdf->Cell($centerWidth, $height,
            trim($arrLnMaksud[0]), "R");

        $this->fpdf->Ln();        
        unset($arrLnMaksud[0]);
        foreach ($arrLnMaksud as $key => $val) {
            $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
            $this->fpdf->Cell($centerWidth, $height,
                "", "R");
            $this->fpdf->Cell($centerWidth, $height,
                $val, "R");
            $this->fpdf->Ln();
        }

        $height = $tempHeight;
        //////////////////////////////////


        $this->fpdf->Cell($noWidth, $height, "5. ", 1,0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "MODA TRANSPORTASI", 1);
        $this->fpdf->Cell($centerWidth, $height,
            " ". $arrData["tspt_transport"], 1);

        $this->fpdf->Ln(); //////////////////////////


        $this->fpdf->Cell($noWidth, $height, "6. ", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "a.  TEMPAT BERANGKAT", "LR");
        $this->fpdf->Cell($centerWidth, $height,
            " ". $arrData["tspt_tpt_berangkat"], "LR");

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LBR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "b.  TEMPAT TUJUAN", "LBR");
        $this->fpdf->Cell($centerWidth, $height,
            " ". $arrData["tspt_tujuan"], "LBR");

        $this->fpdf->Ln(); ////////////77777777777//////////////

        $string = $arrData["tspt_jmlh_hari"] . " hari";
        $this->fpdf->Cell($noWidth, $height, "7. ", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "a.  LAMA PERJALANAN", "LR");
        $this->fpdf->Cell($centerWidth, $height,
            $string, "LR");

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "b.  TANGGAL BERANGKAT", "LR");
        $this->fpdf->Cell($centerWidth, $height,
            " ". $arrData["tspt_tgl_berangkat"], "LR");

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "c.  TANGGAL HARUS KEMBALI/", "LR");
        $this->fpdf->Cell($centerWidth, $height,
            " ". $arrData["tspt_tgl_kembali"], "LR");

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LBR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "    TIBA DITEMPAT BARU *)", "LBR");
        $this->fpdf->Cell($centerWidth, $height,
            " ", "LBR");


        $this->fpdf->Ln(); /////////////8888888///////////////////

        $this->fpdf->Cell($noWidth, $height, "8.", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            " PENGIKUT : NAMA", "LR");
        $this->fpdf->Cell($centerWidth/2, $height,
            "    TANGGAL LAHIR", "");
        $this->fpdf->Cell($centerWidth/2, $height,
            "    KETERANGAN", "R");

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LBR",0, "C");
        $this->fpdf->Cell(10, $height,
            " 1.", "TLBR");
        $this->fpdf->Cell($centerWidth - 10, $height,
            "    ", "TLBR");
        $this->fpdf->Cell(10, $height,
            " 1.", "TLBR");
        $this->fpdf->Cell($centerWidth/2 - 10, $height,
            " ", "TLBR");
        $this->fpdf->Cell(10, $height,
            " 1.", "TLBR");
        $this->fpdf->Cell($centerWidth/2 - 10, $height,
            " ", "TLBR");

        $this->fpdf->Ln(); /////////////9999999///////////////////

        $this->fpdf->Cell($noWidth, $height, "9. ", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            " PEMBEBANAN ANGGARAN / UPTD", "LR");
        $this->fpdf->Cell($centerWidth, $height,
            " ", "LR");

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "a. ", "LR");
        $this->fpdf->Cell($centerWidth, $height,
            "a. ", "LR");

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "b.  ", "LR");
        $this->fpdf->Cell($centerWidth, $height,
            "b. ", "LR");

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "c.  ", "LR");
        $this->fpdf->Cell($centerWidth, $height,
            "c. ", "LR");

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LBR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "d. ", "LBR");
        $this->fpdf->Cell($centerWidth, $height,
            "d. ", "LBR");


        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $height2 = 5;
        $this->fpdf->Cell($noWidth + $centerWidth, $height2,
            "", 0);
        $this->fpdf->Cell($centerWidth, $height2,
            "Di keluarkan di Amurang", 0);

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth + $centerWidth, $height2,
            "", 0);
        $this->fpdf->Cell($centerWidth/2 - 10, $height2,
            "Pada tanggal", 0);
        $this->fpdf->Cell(10, $height2,
            " : ", 0);
        $this->fpdf->Cell($centerWidth/2, $height2,
            $arrData["tspt_tanggal"], 0);

        $this->fpdf->Ln(8);

        $this->fpdf->Cell($noWidth + $centerWidth, $height-2,
            "", 0);
        $this->fpdf->Cell($centerWidth, $height-2,
            "a.n. KEPALA BADAN PENGELOLA", 0, 0, "C");

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth + $centerWidth, $height-2,
            "", 0);
        $this->fpdf->Cell($centerWidth, $height-2,
            "KEUANGAN DAN ASET DAERAH", 0, 0, "C");

        $this->fpdf->Ln();

        $jabatan = str_replace(
            "BADAN PENGELOLA KEUANGAN DAN ASET DAERAH", "",
            $arrAsn[$arrData["tspt_pengesahan_spd"]]["ta_jabatan"]
        );
        $this->fpdf->Cell($noWidth + $centerWidth, $height-2,
            "", 0);
        $this->fpdf->Cell($centerWidth, $height,
            $jabatan, 0, 0, "C");
        $this->fpdf->Ln();
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('arial','U',11);
        $this->fpdf->Cell($noWidth + $centerWidth, $height2,
            "", 0);
        $this->fpdf->Cell($centerWidth, $height2,
            $arrAsn[$arrData["tspt_pengesahan_spd"]]["ta_nama"], 0, 0, "C");

        $this->fpdf->SetFont('arial','',11);
        $this->fpdf->Ln();
        $this->fpdf->Cell($noWidth + $centerWidth, $height2,
            "", 0);
        $this->fpdf->Cell($centerWidth, $height2,
            $arrAsn[$arrData["tspt_pengesahan_spd"]]["ta_pangkat"], 0, 0, "C");

        $this->fpdf->Ln();
        $this->fpdf->Cell($noWidth + $centerWidth, $height2,
            "", 0);
        $this->fpdf->Cell($centerWidth, $height2,
            "NIP. " . $arrAsn[$arrData["tspt_pengesahan_spd"]]["ta_nip"], 0, 0, "C");
        
    }

    protected function _print_spt($arrData, $arrAsn) {

        $this->fpdf->AddPage("P", array(210, 330));
        
        $this->_surat_header();
        $this->fpdf->Ln(15);

        $widthMargin = 10;
        $this->fpdf->SetFont('arial','BU',16);
        $this->fpdf->Cell(210 - $widthMargin, 6,
            "SURAT PERINTAH TUGAS", 0, 0, 'C');

        $this->fpdf->Ln(7);

        if (trim($arrData[0]["tspt_nomor"]) == "") {
            $nomor ="NOMOR :       /BPKAD/ST/     /".date("Y");
        } else {
            $nomor = "NOMOR : " . $arrData[0]["tspt_nomor"];
        }

        $this->fpdf->SetFont('arial','',11);
        $this->fpdf->Cell(210 - $widthMargin, 6,
            $nomor, 0, 0, 'C');

        $this->fpdf->Ln(14);

        $this->fpdf->SetFont('arial','B',11);
        $string = "KEPALA BADAN PENGELOLA KEUANGAN DAN ASET DAERAH KABUPATEN";
        $this->fpdf->Cell(210 - $widthMargin, 5,
            $string, 0, 0, 'C');

        $this->fpdf->Ln();
        $string = "MINAHASA SELATAN ATAS NAMA BUPATI MINAHASA SELATAN DENGAN INI";
        $this->fpdf->Cell(210 - $widthMargin, 5,
            $string, 0, 0, 'C');

        $this->fpdf->Ln();
        $string = "MENUGASKAN KEPADA :";
        $this->fpdf->Cell(210 - $widthMargin, 5,
            $string, 0, 0, 'C');

        $this->fpdf->Ln();
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('arial','',11);

        $col1 = 10; $col2 = 50; $col3 = 10; $col4 = 130;
        $height = 4;

        foreach($arrData as $key => $arrVal) {
            $this->fpdf->Cell($col1, $height,
                $key + 1, 0);
            $this->fpdf->Cell($col2, $height,
                "Nama", 0);
            $this->fpdf->Cell($col3, $height,
                ":", 0);
            $this->fpdf->Cell($col4, $height,
                $arrVal["ta_nama"], 0);
            
            $this->fpdf->Ln($height+1);

            $this->fpdf->Cell($col1, $height,
                "", 0);
            $this->fpdf->Cell($col2, $height,
                "N I P.", 0);
            $this->fpdf->Cell($col3, $height,
                ":", 0);
            $this->fpdf->Cell($col4, $height,
                $arrVal["ta_nip"], 0);
            
            $this->fpdf->Ln($height+1);

            $this->fpdf->Cell($col1, $height,
                "", 0);
            $this->fpdf->Cell($col2, $height,
                "Pangkat / Gol. Ruang", 0);
            $this->fpdf->Cell($col3, $height,
                ":", 0);
            $this->fpdf->Cell($col4, $height,
                $arrVal["ta_pangkat"], 0);
            
            $this->fpdf->Ln($height+1);


            $arrLineJabatan = misc_helper::fpdf_multiline(
                $arrVal["ta_jabatan"], 50
            );
            
            $this->fpdf->Cell($col1, $height,
                "", 0);
            $this->fpdf->Cell($col2, $height,
                "Jabatan", 0);
            $this->fpdf->Cell($col3, $height,
                ":", 0);
            $this->fpdf->Cell($col4, $height,
                trim($arrLineJabatan[0]), 0);

            unset($arrLineJabatan[0]);
            foreach ($arrLineJabatan as $key2 => $val) {
                $this->fpdf->Ln();
                $this->fpdf->Cell($col1, $height,
                    "", 0);
                $this->fpdf->Cell($col2, $height,
                    "", 0);
                $this->fpdf->Cell($col3, $height,
                    "", 0);
                $this->fpdf->Cell($col4, $height,
                    $arrLineJabatan[$key2], 0);
                
            }

            $this->fpdf->Ln($height+2);
        }

        $this->fpdf->Ln();
        $this->fpdf->Cell($col1, $height,
            "", 0);
        $this->fpdf->Cell($col2, $height,
            "Tujuan", 0);
        $this->fpdf->Cell($col3, $height,
            ":", 0);
        $this->fpdf->Cell($col4, $height,
            $arrData[0]["tspt_tujuan"], 0);

        $arrLineMaksud = misc_helper::fpdf_multiline(
            $arrVal["tspt_maksud"], 50
        );


        $this->fpdf->Ln($height+1);
        $this->fpdf->Cell($col1, $height,
            "", 0);
        $this->fpdf->Cell($col2, $height,
            "Maksud", 0);
        $this->fpdf->Cell($col3, $height,
            ":", 0);
        $this->fpdf->Cell($col4, $height,
            trim($arrLineMaksud[0]), 0);

        unset($arrLineMaksud[0]);
        foreach ($arrLineMaksud as $key => $val) {
            $this->fpdf->Ln();
            $this->fpdf->Cell($col1, $height,
                "", 0);
            $this->fpdf->Cell($col2, $height,
                "", 0);
            $this->fpdf->Cell($col3, $height,
                "", 0);
            $this->fpdf->Cell($col4, $height,
                $val, 0);
        }

        $this->fpdf->Ln($height+1);
        $this->fpdf->Cell($col1, $height,
            "", 0);
        $this->fpdf->Cell($col2, $height,
            "Jumlah hari", 0);
        $this->fpdf->Cell($col3, $height,
            ":", 0);

        $tglBerangkat = misc_helper::format_idDate($arrData[0]["tspt_tgl_kembali"]);
        $string = $arrData[0]["tspt_jmlh_hari"] . " hari (".$tglBerangkat.")";
        $this->fpdf->Cell($col4, $height,
            $string, 0);

        $this->fpdf->Ln($height+4);
        $string = "     Demikian Perintah Tugas ini dibuat untuk dilaksanakan dengan penuh tanggungjawab dan selesai menjalankan tugas agar melaporkan hasilnya kepada Kepala Badan Pengelola Keuangan dan Aset Daerah Kabupaten Minahasa Selatan.";

        $this->fpdf->MultiCell(190, $height,
            $string, 0);

        $this->fpdf->Ln($height+1);
        $this->fpdf->Cell($col1+$col2+$col3+30, $height,"", 0);
        $string = "Di keluarkan di Amurang";
        $this->fpdf->Cell($col4, $height, $string, 0);

        $tglSurat = misc_helper::format_idDate($arrData[0]["tspt_tanggal"]);
        $this->fpdf->Ln();
        $this->fpdf->Cell($col1+$col2+$col3+30, $height,"", 0);
        $string = "Pada Tanggal                   :   " . $tglSurat;
        $this->fpdf->Cell($col4, $height, $string, 0);

        $height = 5;
        $this->fpdf->Ln();
        $this->fpdf->Ln();
        $this->fpdf->Cell(95, $height,"", 0);
        $string = "";
        if ($arrData[0]["tspt_pengesahan_spt"] != 1) {
            $string = "a/n ";
        }
        $string .= "KEPALA BADAN PENGELOLA";
        $this->fpdf->Cell(90, $height, $string, 0, 0, "C");

        $this->fpdf->Ln();
        $this->fpdf->Cell(95, $height,"", 0);
        $string = "KEUANGAN DAN ASET DAERAH,";
        $this->fpdf->Cell(90, $height, $string, 0, 0, "C");

        $arrPengesahanSPT = $arrAsn[$arrData[0]["tspt_pengesahan_spt"]];
        if ($arrData[0]["tspt_pengesahan_spt"] != 1) {
            $this->fpdf->Ln();
            $this->fpdf->Cell(95, $height,"", 0);
            $string = str_replace(
                "BADAN PENGELOLA KEUANGAN DAN ASET DAERAH", "", $arrPengesahanSPT["ta_jabatan"]
            );
            $this->fpdf->Cell(90, $height, 
                $string, 0, 0, "C");
        }
        $this->fpdf->Ln(25);

        $this->fpdf->SetFont('arial','U',11);
        $this->fpdf->Cell(95, $height,"", 0);
        $this->fpdf->Cell(90, $height,
            $arrPengesahanSPT["ta_nama"], 0, 0, "C");

        $this->fpdf->SetFont('arial','',11);
        $this->fpdf->Ln();
        $this->fpdf->Cell(95, $height,"", 0);
        $this->fpdf->Cell(90, $height,
            $arrPengesahanSPT["ta_pangkat"], 0, 0, "C");

        $this->fpdf->Ln();
        $this->fpdf->Cell(95, $height,"", 0);
        $this->fpdf->Cell(90, $height,
            "NIP. " . $arrPengesahanSPT["ta_nip"], 0, 0, "C");
    }

    public function _halaman_belakang($arrData, $arrAsn) {

        $this->fpdf->AddPage("P", array(210, 330));
        
        $this->fpdf->SetFont('arial','',11);

        $pageWidth = 190;
        $height = 5;
        $this->fpdf->Cell($pageWidth / 2, $height*11,"", 1);

        $this->fpdf->Cell($pageWidth / 2, $height,
            "Berangkat dari ".$arrData["tspt_tpt_berangkat"], "TR", 2, '');
        $this->fpdf->Cell($pageWidth / 2, $height,
            "(Tempat Kedudukan)", "R", 2, '');
        $this->fpdf->Cell($pageWidth / 2, $height,
            "Pada Tanggal: ", "R", 2, '');
        $this->fpdf->Cell($pageWidth / 2, $height,
            "Ke ", "R", 2, '');

        $this->fpdf->Cell($pageWidth / 2, $height,
            "KPA", "R", 2, 'C');

        $this->fpdf->Cell($pageWidth / 2, $height*3,
            "", "R", 2, 'C');

        $dataAsn1 = $arrAsn[$arrData["tspt_pengesahan_lbr3"]];

        $this->fpdf->Cell($pageWidth / 2, $height,
            $dataAsn1["ta_nama"], "R", 2, 'C');
        $this->fpdf->Cell($pageWidth / 2, $height,
            $dataAsn1["ta_pangkat"], "R", 2, 'C');
        $this->fpdf->Cell($pageWidth / 2, $height,
            "NIP. " . $dataAsn1["ta_nip"], "RB", 1, 'C');

        $arrRomawi = array(
            1 => "I.",
            2 => "II.",
            3 => "III.",
            4 => "IV.",
            5 => "V.",
            6 => "VI.",
            7 => "VII."
        );

        for($i = 2; $i < 5; $i ++) {
            $this->fpdf->Cell(10, $height,
            $arrRomawi[$i], "L", 0, 'C');
            $this->fpdf->Cell($pageWidth / 2 - 10, $height,
                "Tiba di", "", 0, '');
            $this->fpdf->Cell($pageWidth / 2, $height,
                "Berangkat dari ", "LR", 1, '');

            $this->fpdf->Cell(10, $height,
            "", "L", 0, '');
            $this->fpdf->Cell($pageWidth / 2 - 10, $height,
                "Pada Tanggal", "", 0, '');
            $this->fpdf->Cell($pageWidth / 2, $height,
                "Ke ", "LR", 1, '');


            $this->fpdf->Cell($pageWidth / 2, $height*4,
            "", "LBR", 0, '');

            $this->fpdf->Cell($pageWidth / 2, $height,
            "Pada Tanggal", "LR", 2, '');
            $this->fpdf->Cell($pageWidth / 2, $height*3,
            "", "LBR", 1, '');

        }
        

        
        $this->fpdf->Cell(10, $height, $arrRomawi[5], "L", 0, 'C');
        $this->fpdf->Cell($pageWidth / 2 - 10, $height,
            "Berangkat dari ".$arrData["tspt_tpt_berangkat"], "", 0, '');
        $this->fpdf->Cell($pageWidth / 2, $height,
            "Telah diperiksa dengan keterangan bahwa", "LR", 1, '');

        $this->fpdf->Cell(10, $height, "", "L", 0, '');
        $this->fpdf->Cell($pageWidth / 2 - 10, $height,
            "(Tempat Kedudukan)", "", 0, '');
        $this->fpdf->Cell($pageWidth / 2, $height,
            "perjalanan tersebut dilakukan atas perintah", "LR", 1, '');

        $this->fpdf->Cell(10, $height, "", "L", 0, '');
        $this->fpdf->Cell($pageWidth / 2 - 10, $height,
            "Pada Tanggal: ", "", 0, '');
        $this->fpdf->Cell($pageWidth / 2, $height,
            "Pejabat Berwenang dan semata-mata untuk", "LR", 1, '');

        $this->fpdf->Cell($pageWidth / 2, $height,
            "", "LR", 0, '');
        $this->fpdf->Cell($pageWidth / 2, $height,
            "kepentingan jabatan dalam waktu yang", "LR", 1, '');

        $this->fpdf->Cell($pageWidth / 2, $height,
            "", "LR", 0, '');
        $this->fpdf->Cell($pageWidth / 2, $height,
            "sesingkat-singkatnya", "LR", 1, '');

        $this->fpdf->Cell($pageWidth / 2, $height, "", "LR");
        $this->fpdf->Cell($pageWidth / 2, $height, "", "LR", 1);

        $this->fpdf->Cell($pageWidth / 2, $height, "KPA", "LR", 0, 'C');
        $this->fpdf->Cell($pageWidth / 2, $height, "PPTK", "LR", 1, 'C');

        $this->fpdf->Cell($pageWidth / 2, $height*3,
            "", "LR", 0, 'C');
        $this->fpdf->Cell($pageWidth / 2, $height*3,
            "", "LR", 1, 'C');

        
        $dataAsn2 = $arrAsn[$arrData["tspt_pptk"]];

        $this->fpdf->Cell($pageWidth / 2, $height,
            $dataAsn1["ta_nama"], "LR", 0, 'C');
        $this->fpdf->Cell($pageWidth / 2, $height,
            $dataAsn2["ta_nama"], "LR", 1, 'C');

        $this->fpdf->Cell($pageWidth / 2, $height,
            $dataAsn1["ta_pangkat"], "LR", 0, 'C');
        $this->fpdf->Cell($pageWidth / 2, $height,
            $dataAsn2["ta_pangkat"], "LR", 1, 'C');

        $this->fpdf->Cell($pageWidth / 2, $height,
            "NIP. " . $dataAsn1["ta_nip"], "LRB", 0, 'C');
        $this->fpdf->Cell($pageWidth / 2, $height,
            "NIP. " . $dataAsn2["ta_nip"], "LRB", 1, 'C');
        
        $this->fpdf->Cell(10, $height, $arrRomawi[6], "L", 0, 'C');
        $this->fpdf->Cell($pageWidth - 10, $height,
            "Catatan Lain-lain: ", "R", 1, '');
        $this->fpdf->Cell($pageWidth, $height*4, "", "LBR", 1);

        $this->fpdf->Cell(10, $height, $arrRomawi[7], "L", 0, 'C');
        $this->fpdf->Cell($pageWidth - 10, $height,
            "Perhatian: ", "R", 1, '');
        $this->fpdf->Cell($pageWidth, $height,
            "", "LR", 1, '');
        $text = "Pejabat yang berwenang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, pada pejabat yang mengesahkan tanggal berangkat/tiba, serta pihak yang terlibat dalam penerbitan SPD bertanggungjawab berdasarkan peraturan-peraturan keuangan negara apabila menderita rugi akibat kesalahan, kelalaian, dan kealpaannya.";
        $this->fpdf->Cell(10, $height*4, "", "BL", 0, 'C');
        $this->fpdf->MultiCell($pageWidth-10, $height, $text, "BR");

    }

    protected function _surat_header() {
        
        // start header surat
        $fileLogo = APPPATH."../assets/img/logo-bw-minsel.png";
        $this->fpdf->Image($fileLogo,10,11,20);

        $this->fpdf->SetFont('times','B',16);
        $widthMargin = 10;
        $this->fpdf->Cell(
            210 - $widthMargin,8,
            "PEMERINTAH KABUPATEN MINAHASA SELATAN",0,0,'C'
        );
        $this->fpdf->Ln();
        $this->fpdf->SetFont('times','B',20);

        $this->fpdf->Cell(
            210 - $widthMargin,
            8,"BADAN PENGELOLA",0,0,'C'
        );
        $this->fpdf->Ln();
        $this->fpdf->Cell(
            210 - $widthMargin,
            8,"KEUANGAN DAN ASET DAERAH",0,0,'C'
        );
        $this->fpdf->Ln();

        $this->fpdf->SetFont('times','I',10);
        $this->fpdf->Cell(
            210 - $widthMargin,
            5, "Jln. TRANS SULAWESI KEL. PONDANG - AMURANG TIMUR, Email :bpkad_kabminsel@gmail.com",0,0,'C'
        );
        
        //$this->fpdf->SetLineWidth(0.2);
        //$this->fpdf->SetDrawColor();
        $this->fpdf->line(10, 40, 210-13, 40);

        // end header surat
    }



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


}