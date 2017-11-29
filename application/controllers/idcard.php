<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class idcard extends CI_Controller {


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

    public function print_pdf($id = 1) {
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        $this->load->library('fpdf');
        $this->fpdf->SetTitle("ID Card BPKAD MINSEL");

        //$this->_print_hal_depan();
        $this->_print_1muka();
    }

    protected function _print_hal_depan() {
        $this->fpdf->AddPage("P", array(210, 330));
        
        $pngTemplate = APPPATH."../assets/img/template-dpn.png";
        $pngPhoto = APPPATH."../assets/img/pasfoto/kaban.png";

        $arrData = $this->tbl_asn->retrieve_all_data();

        //print_r($arrData);


        $arrPhoto = array(
            APPPATH."../assets/img/pasfoto/kaban.png",
            APPPATH."../assets/img/pasfoto/sekretaris.png",
            APPPATH."../assets/img/pasfoto/04.png",
            APPPATH."../assets/img/pasfoto/sekretaris.png",
            APPPATH."../assets/img/pasfoto/kaban.png",
            APPPATH."../assets/img/pasfoto/sekretaris.png",
            APPPATH."../assets/img/pasfoto/kaban.png",
            APPPATH."../assets/img/pasfoto/sekretaris.png",
            APPPATH."../assets/img/pasfoto/kaban.png",
            APPPATH."../assets/img/pasfoto/sekretaris.png",
            APPPATH."../assets/img/pasfoto/kaban.png",
            APPPATH."../assets/img/pasfoto/sekretaris.png",
            APPPATH."../assets/img/pasfoto/kaban.png",
            APPPATH."../assets/img/pasfoto/sekretaris.png",
            APPPATH."../assets/img/pasfoto/kaban.png",
        );


        $count = 0;
        $row = 0;
        foreach ($arrData as $key => $arrVal) {

            if (!$arrVal["ta_photo"]) {
                $arrVal["ta_photo"] = APPPATH."../assets/img/pasfoto/kaban.png";
            } else {
                $arrVal["ta_photo"] = APPPATH."../assets/".$arrVal["ta_photo"];
            }

            $this->fpdf->Image($pngTemplate, 52*$count+10, 84*$row+10,-300);
            $this->fpdf->Image($arrVal["ta_photo"], 52*$count+21.4,84*$row+48.5,-300);
            $count ++;

            if ($count == 3) {
                $count = 0;
                $row ++;
            }

            if ($row == 3) {
                $this->fpdf->AddPage("P", array(210, 330));   
                $row = 0;
            }
            
        }

        $this->fpdf->Output();
    }



    public function _print_1muka() {
        $this->fpdf->AddPage("P", array(210, 297));
        
        $pngTemplate = APPPATH."../assets/img/template-1muka.png";
        $pngPhoto = APPPATH."../assets/img/pasfoto/kaban.png";

        $arrData = $this->tbl_asn->retrieve_all_data();

        $count = 0;
        $row = 0;
        foreach ($arrData as $key => $arrVal) {

            if (!$arrVal["ta_photo"]) {
                $arrVal["ta_photo"] = APPPATH."../assets/img/pasfoto/no-cilp.png";
            } else {
                $arrVal["ta_photo"] = APPPATH."../assets/".$arrVal["ta_photo"];
            }

            $this->fpdf->Image($pngTemplate, 52*$count+10, 84*$row+10,-300);
            $this->fpdf->Image($arrVal["ta_photo"], 52*$count+25, 84*$row+48.9,-400);


            $this->fpdf->SetFont('arial','BU',8);
            $ln = $this->fpdf->GetStringWidth($arrVal["ta_nama"]);            
            $start = 10 + (52 - $ln) / 2;
            $this->fpdf->text(52*$count+$start, 84*$row+83, $arrVal["ta_nama"]);

            $this->fpdf->SetFont('arial','',7);


            $jabatan = str_replace("BADAN PENGELOLA KEUANGAN DAN ASET DAERAH", "", $arrVal["ta_jabatan"]);

            if (trim($jabatan) == "KEPALA" || trim($jabatan) == "SEKRETARIS") {
                $jabatan = trim($jabatan) . " BADAN";
            }
            $ln = $this->fpdf->GetStringWidth($jabatan);

            $widthCard = 52;
            if ($ln >= $widthCard) {
                $arrJabatan = misc_helper::fpdf_multiline_bypoint(
                    $this->fpdf, $jabatan, $widthCard
                );
                $startTop = 84*$row+87;
                $i = 0;
                foreach($arrJabatan as $key => $val) {
                    $ln = $this->fpdf->GetStringWidth($val);
                    $start = 10 + ($widthCard - $ln) / 2;
                    $this->fpdf->text(52*$count+$start, $startTop + $i * 3, $val);

                    $i ++;
                }
            } else {
                $start = 10 + (52 - $ln) / 2;
                $this->fpdf->text(52*$count+$start, 84*$row+87, $jabatan);
            }
            $count ++;

            if ($count == 3) {
                $count = 0;
                $row ++;
            }

            if ($row == 3) {
                $this->fpdf->AddPage("P", array(210, 297));   
                $row = 0;
            }
        }

        $this->fpdf->Output();
    }

    public function _halaman_belakang($arrData, $arrAsn) {

    }

    protected function _surat_header() {

    }

}