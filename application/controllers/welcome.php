<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -  
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index($search = "", $start = 0)
    {

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


        $arrData = array(
            "ctlTitle" => "SPPD",
            "ctlSubTitle" => "Sekretariat BPKAD",

            "ctlSideBar" => $this->load->view('devel/master_menu', array(), true),
            "ctlHeaderBar" => $this->load->view('devel/master_headerbar', array(), true),
            "ctlContentArea" => $this->load->view("spt_spd/vw_data_table", $arrData, true),
            "ctlSideBarR" => $this->load->view("devel/master_sidebar_r", $arrData, true)
        );
        $this->load->view('devel/master_index', $arrData);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */