<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class spt_spd_pdf extends CI_Controller {


	public function __construct() {
		parent::__construct();
        // load helper
        $this->load->helper("misc");


        $this->load->model("trans_spt_spd");
        $this->load->model("tbl_asn");

        $arrConfig = array("session" => $this->session);
        $this->lib_login = new lib_login($arrConfig);

        $this->lib_login->redir_ifnot_login();
        $this->isLogin = $this->lib_login->check_login();
        $this->arrSession = $this->lib_login->get_session_data();
        // endof load libraries
        
        //$this->libLogin->redir_ifnot_login();
        $this->thisurl = base_url("index.php/spt_spd");
	}

	public function index($id = "") {
		show_404();
	}

    public function print_pdf($id) {
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        $this->load->library('fpdf');
        $this->fpdf->SetTitle("SPPD");

        $arrData = $this->trans_spt_spd->retrieve_spt_spd($id);

        if (!$arrData) {
            show_404();
        }

        if ($arrData[0]["ta_id"] == 1) {
            $this->print_pdf_kaban($arrData);
        } else {
            $this->print_pdf_default($arrData);
        }
        
    }

    public function print_pdf_default($arrData) {

        $arrId = array(
            $arrData[0]["tspt_pengesahan_spt"],
            $arrData[0]["tspt_pengesahan_spd"],
            $arrData[0]["tspt_pengesahan_lbr3"],
            $arrData[0]["tspt_pptk"],
        );

        $arrAsn = $this->trans_spt_spd->retrieve_asn_byId($arrId);

        $key = 0;
        
        foreach ($arrData as $key => $arrVal) {

            $this->_print_spd($arrVal, $arrAsn);
            $this->_halaman_belakang($arrData[0], $arrAsn);
        }

        $this->_print_spt($arrData, $arrAsn);
        
        $dir = APPPATH."../assets/sppd/";
        $this->fpdf->Output();        
    }

    public function print_pdf_kaban($arrData) {

        $arrId = array(
            $arrData[0]["tspt_pengesahan_spt"],
            $arrData[0]["tspt_pengesahan_spd"],
            $arrData[0]["tspt_pengesahan_lbr3"],
            $arrData[0]["tspt_pptk"],
        );

        $arrAsn = $this->trans_spt_spd->retrieve_asn_byId($arrId);
        
        $arrAsn["bupati"] = array(
            "ta_id" => "bupati",
            "ta_nip" => "",
            "ta_pangkat" => "",
            "ta_jabatan" => "",
            "tap_jenis_pangkat" => "",
            "ta_nama" => "CHRISTIANY EUGENIA PARUNTU, SE"
        );
        $arrAsn["as3"] = array(
            "ta_id" => "as3",
            "ta_nip" => "19680618 198902 1 001",
            "ta_pangkat" => "PEMBINA UTAMA MUDA",
            "tap_jenis_pangkat" => "PEMBINA UTAMA MUDA",
            "ta_jabatan" => "ASISTEN ADMINISTRASI UMUM",
            "ta_nama" => "Drs. JAMES J. TOMBOKAN"

        );
        $arrAsn["sekda"] = array(
            "ta_id" => "sekda",
            "ta_nip" => "19581023 198103 1 012",
            "ta_pangkat" => "PEMBINA UTAMA MADYA",
            "tap_jenis_pangkat" => "PEMBINA UTAMA MADYA",
            "ta_jabatan" => "SEKRETARIS DAERAH",
            "ta_nama" => "Drs. DANNY H. RINDENGAN, M.Si"
        );


        $this->_print_spd($arrData[0], $arrAsn);
        $arrData[0]["tspt_pengesahan_spd"] = "as3";
        $this->_print_spd($arrData[0], $arrAsn, 2);
        $arrData[0]["tspt_pengesahan_spd"] = "sekda";
        $this->_halaman_belakang($arrData[0], $arrAsn);

        $arrData[0]["tspt_pengesahan_spt"] = "bupati";
        $this->_print_spt($arrData, $arrAsn, 1, 5, 12);

        $arrData[0]["tspt_pengesahan_spt"] = "sekda";
        $this->_print_spt($arrData, $arrAsn, 2, 5, 12);
        
        $dir = APPPATH."../assets/sppd/";
        $this->fpdf->Output();
    }

    protected function _print_spd($arrData, $arrAsn, $headertype = 0) {

        $this->fpdf->AddPage("P", array(210, 330));
        $this->fpdf->SetAutoPageBreak(false, "5");

        if ($headertype == 1) { // header Garuda
            $this->_surat_header_bupati();
        } else if ($headertype == 2) { // header SEKDA
            $this->_surat_header_sekretariat();
        } else { // header BPKAD
            $this->_surat_header();
        }
        
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

        $fontSize = 11;
        $fontFam = "arial";

        $this->fpdf->Cell($noWidth, $height, "", "LBR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "KUASA PENGGUNA ANGGARAN", "BR");
        $this->fpdf->Cell($centerWidth, $height,
            " ASET DAERAH / SEKRETARIS, ", "BR");
        
        $this->fpdf->Ln(); ////////////


        $this->fpdf->Cell($noWidth, $height, "2.", "LTR", 0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "NAMA/NIP PELAKSANA SURAT", "TR");
        $this->fpdf->SetFont($fontFam,'B',$fontSize);
        $this->fpdf->Cell($centerWidth, $height,
            " ".$arrData["ta_nama"], "TR");
        $this->fpdf->SetFont($fontFam,'',$fontSize);

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

        $pangkatGol = $arrData["tap_jenis_pangkat"]
                . " (" . $arrData["tap_golongan"] . "/" . $arrData["tap_ruang"] . ")";
        $this->fpdf->Cell($centerWidth, $height,
            " a.  ". strtoupper($pangkatGol), "TR");

        $this->fpdf->Ln();

        $tempHeight = $height;
        $height = 5;

        $arrLineJabatan = misc_helper::fpdf_multiline(
            $arrData["taj_nama"], 32
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
            " c.  ". $arrData["taj_biaya"], "BR");

        $this->fpdf->Ln(); //////////////////////////////

        $arrMaksud = explode("\n", $arrData["tspt_maksud"]);

        $space = "";
        if (count($arrMaksud) > 1) {
            $space = "   ";
        }
        foreach($arrMaksud as $key => $val) {

            $arrLnMaksud = misc_helper::fpdf_multiline(
                $val, 45
            );


            $tempHeight = $height;
            $height = 5;

            $txt = $no = "";
            if ($key == 0) {
                $txt = "MAKSUD PERJALANAN DINAS";
                $no = "4. ";
            }

            $this->fpdf->Cell($noWidth, $height, $no, "LR",0, "C");
            $this->fpdf->Cell($centerWidth, $height,
                $txt, "R");
            $this->fpdf->Cell($centerWidth, $height,
                trim($arrLnMaksud[0]), "R");

            $this->fpdf->Ln();        
            unset($arrLnMaksud[0]);
            foreach ($arrLnMaksud as $key => $val) {
                $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
                $this->fpdf->Cell($centerWidth, $height,
                    "", "R");
                $this->fpdf->Cell($centerWidth, $height,
                    $space . $val, "R");
                $this->fpdf->Ln();
            }
        }
        $height = $tempHeight;
        //////////////////////////////////


        $height = 7;
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

        $arrTujuan = explode("\n", $arrData["tspt_tujuan"]);

        $space = "";
        if (count($arrTujuan) > 1) {
            $space = "   ";
        }
        foreach($arrTujuan as $key => $val) {

            $arrLnTujuan = misc_helper::fpdf_multiline(
                $val, 45
            );

            $tempHeight = $height;
            $height = 5;

            $txt = "";
            if ($key == 0) {
                $txt = "b.  TEMPAT TUJUAN";
            }
            $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
            $this->fpdf->Cell($centerWidth, $height,
                $txt, "LR");
            $this->fpdf->Cell($centerWidth, $height,
                " " . trim($arrLnTujuan[0]), "LR");

            $this->fpdf->Ln();        
            unset($arrLnTujuan[0]);
            foreach ($arrLnTujuan as $key2 => $val) {
                $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
                $this->fpdf->Cell($centerWidth, $height,
                    "", "R");
                $this->fpdf->Cell($centerWidth, $height,
                    $space . $val, "R");
                $this->fpdf->Ln();
            }
        }
        $height = 7;

        //$this->fpdf->Ln(); ////////////77777777777//////////////

        $string = "";
        if ($arrData["tspt_jmlh_hari"] > 0) {
            $string = $arrData["tspt_jmlh_hari"] . " hari";
        }
        $this->fpdf->Cell($noWidth, $height, "7. ", "LTR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "a.  LAMA PERJALANAN", "LTR");
        $this->fpdf->Cell($centerWidth, $height,
            $string, "LTR");

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "b.  TANGGAL BERANGKAT", "LR");

        $tglBerangkat = "";
        if ($arrData["tspt_tgl_berangkat"] != "0000-00-00") {
            $tglBerangkat = misc_helper::format_idDate($arrData["tspt_tgl_berangkat"]);
        }
        
        $this->fpdf->Cell($centerWidth, $height,
            " ". $tglBerangkat, "LR");

        $this->fpdf->Ln();

        $this->fpdf->Cell($noWidth, $height, "", "LR",0, "C");
        $this->fpdf->Cell($centerWidth, $height,
            "c.  TANGGAL HARUS KEMBALI/", "LR");

        

        $tglKembali = "";
        if ($arrData["tspt_tgl_kembali"] != "0000-00-00") {
            $tglKembali = misc_helper::format_idDate($arrData["tspt_tgl_kembali"]);
        }
        $this->fpdf->Cell($centerWidth, $height,
            " ". $tglKembali, "LR");

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


        $tglSurat = "";
        if ($arrData["tspt_tanggal"] == "0000-00-00") {
            $tglSurat = "";
        } else {

            $tglSurat = misc_helper::format_idDate($arrData["tspt_tanggal"]);
        }
        
        $arrPengesahanSPD = $arrAsn[$arrData["tspt_pengesahan_spd"]];

        $this->_ttd_template($tglSurat, $arrPengesahanSPD);
    }

    protected function _print_spt(
        $arrData, $arrAsn, $headertype = 0, $contentHeight = 3, $fontSize = 11
    ) {

        $this->fpdf->AddPage("P", array(210, 330));
        
        if ($headertype == 1) { // header Garuda
            $this->_surat_header_bupati();
        } else if ($headertype == 2) { // header SEKDA
            $this->_surat_header_sekretariat();
        } else {
            $this->_surat_header();
        }
        
        $this->fpdf->Ln(10);

        $widthMargin = 10;
        $this->fpdf->SetFont('arial','BU',16);
        $this->fpdf->Cell(210 - $widthMargin, 6,
            "SURAT PERINTAH TUGAS", 0, 0, 'C');

        $this->fpdf->Ln(5);

        if (trim($arrData[0]["tspt_nomor"]) == "") {
            $nomor ="NOMOR :       /BPKAD/ST/     /".date("Y");
        } else {
            $nomor = "NOMOR : " . $arrData[0]["tspt_nomor"];
        }

        $this->fpdf->SetFont('arial','',11);
        $this->fpdf->Cell(210 - $widthMargin, 6,
            $nomor, 0, 0, 'C');

        $this->fpdf->Ln(7);

        $this->fpdf->SetFont('arial','B',10);
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

        $fontSize = $fontSize;
        $fontFam = "arial";
        $this->fpdf->SetFont($fontFam,'',$fontSize);

        $col1 = 10; $col2 = 50; $col3 = 10; $col4 = 130;
        $height = $contentHeight;

        foreach($arrData as $key => $arrVal) {
            $taPangkat = $arrVal["tap_jenis_pangkat"]
                    . " (" . $arrVal["tap_golongan"] . "/" . $arrVal["tap_ruang"] . ")";

            $arrLoop = array(
                array(
                    "no" => $key + 1,
                    "title" => "Nama",
                    "content" => $arrVal["ta_nama"]
                ),
                array(
                    "no" => "",
                    "title" => "N I P.",
                    "content" => $arrVal["ta_nip"]
                ),
                array(
                    "no" => "",
                    "title" => "Pangkat / Gol. Ruang",
                    "content" => $taPangkat
                )  
            );

            foreach ($arrLoop as $key2 => $arrVal2) {
                $this->fpdf->Cell($col1, $height,
                    $arrVal2["no"], 0);
                $this->fpdf->Cell($col2, $height,
                    $arrVal2["title"], 0);
                $this->fpdf->Cell($col3, $height,
                    ":", 0);
                $this->fpdf->Cell($col4, $height,
                    $arrVal2["content"], 0);

                $this->fpdf->Ln($height+1);
            }


            $arrLineJabatan = misc_helper::fpdf_multiline(
                $arrVal["taj_nama"], 50
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
                $this->fpdf->Ln($height+1);
                $this->fpdf->Cell($col1, $height,
                    "", 0);
                $this->fpdf->Cell($col2, $height,
                    "", 0);
                $this->fpdf->Cell($col3, $height,
                    "", 0);
                $this->fpdf->Cell($col4, $height,
                    $arrLineJabatan[$key2], 0);
                
            }

            $this->fpdf->Ln($height+1);
        }

        $arrTujuan = explode("\n", $arrData[0]["tspt_tujuan"]);
        

        $space = "";
        if (count($arrTujuan) > 1) {
            $space = "   ";
        }
        foreach($arrTujuan as $key => $val) {
            $arrLineTujuan = misc_helper::fpdf_multiline(
                $val, 50
            );

            $txt = $titik2 = "";
            if ($key == 0) {
                $txt = "Tujuan";
                $titik2 = ":";
                $tempHeight = $height;
            }
            $this->fpdf->Ln();
            $this->fpdf->Cell($col1, $height,
                "", 0);
            $this->fpdf->Cell($col2, $height,
                $txt, 0);
            $this->fpdf->Cell($col3, $height,
                $titik2, 0);
            $this->fpdf->Cell($col4, $height,
                trim($arrLineTujuan[0]), 0);


            $height = $contentHeight + 2;

            unset($arrLineTujuan[0]);
            foreach ($arrLineTujuan as $key2 => $val) {
                $this->fpdf->Ln();
                $this->fpdf->Cell($col1, $height,
                    "", 0);
                $this->fpdf->Cell($col2, $height,
                    "", 0);
                $this->fpdf->Cell($col3, $height,
                    "", 0);
                $this->fpdf->Cell($col4, $height,
                    $space . $val, 0);
            }

        }

        $height = $tempHeight;
        $arrMaksud = explode("\n", $arrData[0]["tspt_maksud"]);
        
        $this->fpdf->Ln($height-1);

        $space = "";
        if (count($arrMaksud) > 1) {
            $space = "   ";
        }
        foreach($arrMaksud as $key => $val) {
            $arrLineMaksud = misc_helper::fpdf_multiline(
                $val, 50
            );

            $txt = $titik2 = "";
            if ($key == 0) {
                $txt = "Maksud";
                $titik2 = ":";
                $tempHeight = $height;
            }

            $this->fpdf->Ln();
            $this->fpdf->Cell($col1, $height,
                "", 0);
            $this->fpdf->Cell($col2, $height,
                $txt, 0);
            $this->fpdf->Cell($col3, $height,
                $titik2, 0);
            $this->fpdf->Cell($col4, $height,
                trim($arrLineMaksud[0]), 0);

            $height = $contentHeight + 2;
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
                    $space . $val, 0);
            }
        }
        $height = 5;

        $this->fpdf->Ln($height+1);
        $this->fpdf->Cell($col1, $height,
            "", 0);
        $this->fpdf->Cell($col2, $height,
            "Jumlah hari", 0);
        $this->fpdf->Cell($col3, $height,
            ":", 0);

        $string = "";
        if ($arrData[0]["tspt_jmlh_hari"] > 0) {
            $tglBerangkat = misc_helper::format_idDate($arrData[0]["tspt_tgl_berangkat"]);
            $tglKembali = misc_helper::format_idDate($arrData[0]["tspt_tgl_kembali"]);
            $string = $arrData[0]["tspt_jmlh_hari"] . " hari (".$tglBerangkat." - ".$tglKembali.")";
        }
        
        $this->fpdf->Cell($col4, $height,
            $string, 0);

        $this->fpdf->Ln($height+4);
        $string = "     Demikian Perintah Tugas ini dibuat untuk dilaksanakan dengan penuh tanggungjawab dan selesai menjalankan tugas agar melaporkan hasilnya kepada Kepala Badan Pengelola Keuangan dan Aset Daerah Kabupaten Minahasa Selatan.";

        $this->fpdf->MultiCell(190, $height,
            $string, 0);

        if ($arrData[0]["tspt_tanggal"] == "0000-00-00") {
            $tglSurat = "";
        } else {
            $tglSurat = misc_helper::format_idDate($arrData[0]["tspt_tanggal"]);
        }
        
        $arrPengesahanSPT = $arrAsn[$arrData[0]["tspt_pengesahan_spt"]];

        $this->_ttd_template($tglSurat, $arrPengesahanSPT, $fontSize);
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

        if ($arrData["tspt_pengesahan_lbr3"] == 1) {
            $strKPA = "PA";
        } else {
            $strKPA = "KPA";
        }

        $this->fpdf->Cell($pageWidth / 2, $height,
            $strKPA, "R", 2, 'C');

        $this->fpdf->Cell($pageWidth / 2, $height*3,
            "", "R", 2, 'C');

        $dataAsn1 = $arrAsn[$arrData["tspt_pengesahan_lbr3"]];

        $this->fpdf->SetFont('arial','U',11);

        $this->fpdf->Cell($pageWidth / 2, $height,
            $dataAsn1["ta_nama"], "R", 2, 'C');

        $this->fpdf->SetFont('arial','',11);

        $this->fpdf->Cell($pageWidth / 2, $height,
            strtoupper($dataAsn1["tap_jenis_pangkat"]), "R", 2, 'C');
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
            "Tiba di ".$arrData["tspt_tpt_berangkat"], "", 0, '');
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

        $this->fpdf->Cell($pageWidth / 2, $height, $strKPA, "LR", 0, 'C');
        $this->fpdf->Cell($pageWidth / 2, $height, "PPTK", "LR", 1, 'C');

        $this->fpdf->Cell($pageWidth / 2, $height*3,
            "", "LR", 0, 'C');
        $this->fpdf->Cell($pageWidth / 2, $height*3,
            "", "LR", 1, 'C');

        
        $dataAsn2 = $arrAsn[$arrData["tspt_pptk"]];

        $this->fpdf->SetFont('arial','U',11);
        $this->fpdf->Cell($pageWidth / 2, $height,
            $dataAsn1["ta_nama"], "LR", 0, 'C');
        $this->fpdf->Cell($pageWidth / 2, $height,
            $dataAsn2["ta_nama"], "LR", 1, 'C');

        $this->fpdf->SetFont('arial','',11);

        $this->fpdf->Cell($pageWidth / 2, $height,
            strtoupper($dataAsn1["tap_jenis_pangkat"]), "LR", 0, 'C');
        $this->fpdf->Cell($pageWidth / 2, $height,
            strtoupper($dataAsn2["tap_jenis_pangkat"]), "LR", 1, 'C');

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

    protected function _surat_header_sekretariat() {
         
        // start header surat
        $fileLogo = APPPATH."../assets/img/logo-bw-minsel.png";
        $this->fpdf->Image($fileLogo,10,11,20);

        $this->fpdf->SetFont('times','B',16);
        $widthMargin = 10;

        
        $this->fpdf->Ln(4);
        $this->fpdf->Cell(
            210 - $widthMargin,8,
            "PEMERINTAH KABUPATEN MINAHASA SELATAN",0,0,'C'
        );
        $this->fpdf->Ln();
        $this->fpdf->SetFont('times','B',25);

        $this->fpdf->Cell(
            210 - $widthMargin,
            8,"SEKRETARIAT DAERAH",0,0,'C'
        );
        $this->fpdf->Ln();
        $this->fpdf->SetFont('times','I',10);
        $this->fpdf->Cell(
            210 - $widthMargin,
            5, "Jln. TRANS SULAWESI KEL. PONDANG - AMURANG TIMUR",0,0,'C'
        );
        $this->fpdf->Ln(2);
        //$this->fpdf->SetLineWidth(0.2);
        //$this->fpdf->SetDrawColor();
        $this->fpdf->line(10, 40, 210-13, 40);

        $this->fpdf->Ln(5);
        // end header surat
    }


    protected function _surat_header_bupati() {
         
        // start header surat
        $fileLogo = APPPATH."../assets/img/logo-garuda.png";
        $this->fpdf->Image($fileLogo,98,11,20);

        $this->fpdf->SetFont('times','B',20);
        $widthMargin = 10;
        
        $this->fpdf->Ln(14);
        $this->fpdf->Ln(14);
        $this->fpdf->Cell(
            210-$widthMargin,8,"BUPATI MINAHASA SELATAN",0,0,'C'
        );
        $this->fpdf->Ln();
        $this->fpdf->Cell(
            210-$widthMargin,8,"PROVINSI SULAWESI UTARA",0,0,'C'
        );

        $this->fpdf->Ln(2);
        //$this->fpdf->SetLineWidth(0.2);
        //$this->fpdf->SetDrawColor();
        $this->fpdf->line(10, 60, 210-13, 60);

        $this->fpdf->Ln(10);
        // end header surat
    }

    
    protected function _ttd_template($tglSurat = "", $arrAsn, $fontSize = 11) {

        $height = 5;
        $textWidth = 90;
        $leftSpace = 100;
        $fontSize = $fontSize;

        $this->fpdf->SetFont('arial','',$fontSize);

        $this->fpdf->Ln($height+1);
        $this->fpdf->Cell($leftSpace, $height,"", 0);
        $string = "Di keluarkan di Amurang";
        $this->fpdf->Cell($textWidth, $height, $string, 0);

        $this->fpdf->Ln();
        $this->fpdf->Cell($leftSpace, $height,"", 0);
        $string = "Pada Tanggal                   :   " . $tglSurat;
        $this->fpdf->Cell($textWidth, $height, $string, 0);

        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $arrTitle = array();

        if ($arrAsn["ta_id"] == 1) { //kaban
            $arrTitle = array(
                "KEPALA BADAN PENGELOLA",
                "KEUANGAN DAN ASET DAERAH"
            );
        } else if ($arrAsn["ta_id"] == 2) { //sekban
            $arrTitle = array(
                "a/n KEPALA BADAN PENGELOLA",
                "KEUANGAN DAN ASET DAERAH",
                "SEKRETARIS,"
            );
        } else if ($arrAsn["ta_id"] == "as3") {
            $arrTitle = array(
                "a/n BUPATI MINAHASA SELATAN",
                "SEKRETARIS DAERAH",
                "u.b. ASISTEN ADMINISTRASI UMUM,"
            );
        } else if ($arrAsn["ta_id"] == "sekda") {
            $arrTitle = array(
                "a/n BUPATI MINAHASA SELATAN",
                "SEKRETARIS DAERAH",
            );
        } else if ($arrAsn["ta_id"] == "bupati") {
            $arrTitle = array(
                "BUPATI MINAHASA SELATAN"
            );
        } else {
            $arrTitle = array(
                "a/n KEPALA BADAN PENGELOLA",
                "KEUANGAN DAN ASET DAERAH"
            );
        }

        $this->fpdf->SetFont('arial','B',$fontSize);
        foreach ($arrTitle as $key => $val) {
            $this->fpdf->Cell($leftSpace, $height,"", 0);
            $this->fpdf->Cell($textWidth, $height, $val, 0, 0, "C");
            $this->fpdf->Ln();
        }

        $this->fpdf->Ln(20);

        $this->fpdf->SetFont('arial','UB',$fontSize);
        $this->fpdf->Cell($leftSpace, $height,"", 0);
        $this->fpdf->Cell($textWidth, $height,
            $arrAsn["ta_nama"], 0, 0, "C");

        $this->fpdf->SetFont('arial','',$fontSize);

        $this->fpdf->Ln();
        $this->fpdf->Cell($leftSpace, $height,"", 0);
        $this->fpdf->Cell($textWidth, $height,
            strtoupper($arrAsn["tap_jenis_pangkat"]), 0, 0, "C");


        if (trim($arrAsn["ta_nip"])) {
            $strNIP = "NIP. " . $arrAsn["ta_nip"];
        } else {
            $strNIP = "";
        }
        $this->fpdf->Ln();
        $this->fpdf->Cell($leftSpace, $height,"", 0);
        $this->fpdf->Cell($textWidth, $height,
            $strNIP, 0, 0, "C");

    }
}