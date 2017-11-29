<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajx_arsip_surat extends CI_Controller {
	protected $isLogin = false;
    protected $arrSession = array();
    
    protected $thisurl = "";
    protected $arrStatus = array("Non-active", "Active");


    public function __construct() {
        parent::__construct();
        
        $this->thisurl = base_url("index.php/arsip_surat");

        // load helper        
        $this->load->helper("html");
        $this->load->helper("misc");
        //$this->load->helper("form");
        // endof load helper
        
        // load models
        //$this->load->model("config/db_menu_main");
        $this->load->model("tbl_arsip_surat");
        // endof load models
        
		$this->load->database();
    }
    
    public function tester() {
    	$arrOption = array(
			"searchfield" => "as_dari",
			"searchdata" => "",
			"page" => "1",
			"perpage" => "10",
		);

    	$this->retrieve_data($arrOption);
    }


    public function retrieve_data($arrOption = array()) {

    	if (!$arrOption) {
			$arrOption = $this->input->post();
    	}
        
        if (!is_array($arrOption)) {
            show_404();
        }
        
        $arrOption["searchfield"] = "as_dari";
        $arrOption["searchdata"] = "";
        $arrData = $this->tbl_arsip_surat->json_table(
            "*",
            $arrOption
        );
        
        $total = $this->tbl_arsip_surat->json_table_count($arrOption);
        
        $arrContent = array();

        $arrStatus = $this->arrStatus;
        $baseUrl = $this->thisurl."/form/";
        foreach($arrData as $key => $arrVal) {
            //$arrData[$key]["fk_status"] = $arrStatus[$arrVal["fk_status"]];
            $arrTemp = array();
            $arrTemp["as_id"] = $arrVal["as_id"];

        	$arrTemp["thumbnail"] = "<div class='thumbnail'>"
        		."<img src='". base_url($arrVal["as_file"]) ."'"
        	."</div>";
            
            $arrVal["as_tgl_surat"] = misc_helper::format_idDate($arrVal["as_tgl_surat"]);
            $arrVal["as_tgl_diterima"] = misc_helper::format_idDate($arrVal["as_tgl_diterima"]);
            $arrTemp["content"] = $this->load->view("arsip/vw_tbl_data_box", $arrVal, true);

            $arrTemp["action"] = '
            	<span>
            		<a href="#show'.$arrVal["as_id"].'"
            			data-id="'.$arrVal["as_id"].'"
            			rel="tooltip"
            			title="Lihat Detail"
            			class="tooltip-left tbl-action view-detail"
            			>'.
                        '<i class="icon-info-sign"></i>'.
                    '</a> |
            		
            		<a href="'.$baseUrl.$arrVal["as_id"].'"
            			rel="tooltip"
            			title="Edit Detail"
            			class="tooltip-right tbl-action"
            			>'.
            			'<i class="icon-pencil"></i>'.
                    '</a>
            	</span>
            ';
            $arrContent[] = $arrTemp;
        }
        
        $arrReady = misc_helper::prepare_to_table($arrContent, "as_id");
        $arrReady = array(
            "total" => $total,
            "data" => $arrReady
        );
        
        $this->output
            ->set_content_type("application/json")
            ->set_output(json_encode($arrReady));
    }
    
    public function input_data($post = array()) {
        
        if (!$post || !is_array($post)) {
            $post = $this->input->post();
        }
        
        if (!$post) {
            show_404();
        }
        
        $arrInput = misc_helper::get_form_arrData_todb($post, "fk_");
        
        if ($arrInput["fk_id"]) {
            $id = $arrInput["fk_id"];
            $arrWhere = array("fk_id" => $arrInput["fk_id"]);
            unset($arrInput["fk_id"]);
            $arrUpdate = $arrInput;
            $result = $this->db_fakultas_data->update($arrUpdate, $arrWhere);
        } else {
            $result = $this->db_fakultas_data->insert($arrInput);
        }
        
        if ($result) {
            $url = $this->thisurl;
    		$arrReturn = array(
    		    "status" => true,
    		    "url" => $url
		    );
        } else {
            $arrReturn = array(
    		    "status" => false,
    		    "url" => ""
		    );
        }
        
        $this->output
            ->set_content_type("application/json")
            ->set_output(json_encode($arrReturn));
    }
}