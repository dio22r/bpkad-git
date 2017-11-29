<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class asn extends CI_Controller {

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

        $this->thisurl = base_url("index.php/asn");
    }
    
    public function index($search = "all", $start = 0) {
		
        $search = urldecode($search);
        
        $arrPost = $this->input->post();
        if ($arrPost) {
            $search = $arrPost["search"];
        }

        $perpage = 20;
        if ($search == "all") {
            $tempSearch = "";
        } else if (trim($search) == "") {
            $tempSearch = $search;
            $search = "all";
        } else {
            $tempSearch = $search;
        }
        $arrData = $this->tbl_asn_trans->retrieve_test();
        
        $arrData = $this->tbl_asn_trans->retrieve_all_data($perpage, $start);
        //print_r($arrData);

        
        foreach  ($arrData as $key => $arrVal) {
            $arrData[$key]["ta_jabatan"] = $arrVal["taj_nama"];
            $arrData[$key]["ta_pangkat"] = $arrVal["tap_jenis_pangkat"] . " ("
                . $arrVal["tap_golongan"] . "/" . $arrVal["tap_ruang"] . ")";
            $arrData[$key]["url_view"] = $this->thisurl . "/view_data/" . $arrVal["ta_id"];
            $arrData[$key]["url_edit"] = $this->thisurl . "/form/" . $arrVal["ta_id"];
            unset($arrData[$key]["ta_id"]);
        }

        $this->load->library('pagination');

        $config['base_url'] = $this->thisurl."/index/".$search;
        $config['total_rows'] = $this->tbl_asn_trans->count_search($tempSearch);
        $config['per_page'] = $perpage;
        $config['uri_segment'] = 4;
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

        $contentData = array(
            "urlAdd" => $this->thisurl."/form",
            "ctlArrRow" => $arrData,
            "ctlPagination" => $pagination,
            "ctlSearch" => $search,
            "ctlStartItem" => $start,
            "ctlUrlTarget" => $this->thisurl
        );

        $arrData = array(
            "ctlTitle" => "ASN",
            "ctlSubTitle" => "Daftar Aparatur Sipil Negara",

            "ctlSideBar" => $this->lib_defaultView->retrieve_menu("asn"),
            "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
            "ctlContentArea" => $this->load->view("asn/vw_table_asn", $contentData, true),
            "ctlSideBarR" => $this->load->view("master_view/master_sidebar_r", $arrData, true),

            "ctlArrJs" => array(
                base_url("assets/js/controller/arsip_surat.js")
            ),
            "ctlArrCss" => array()
        );
        $this->load->view('master_view/master_index', $arrData);
    }
	
	public function form($id = "") {

        $data = array();

        if ($id) {
            $data = $this->tbl_asn_trans->retrieve_by_id($id);
            if ($data) {
                $status = "edit";
                $data = $data[0];

                $cancelUrl = $this->thisurl . "/view_data/".$id;
            } else {
                show_404();
            }
        } else {
            $status = "new";
            $cancelUrl = $this->thisurl;
        }

        $arrData = $this->tbl_asn_trans->retreive_pangkat();
        $arrPangkat = array();
        foreach($arrData as $key => $arrVal) {
            $arrPangkat[$arrVal["tap_id"]] = $arrVal["tap_jenis_pangkat"] .
                " (" . $arrVal["tap_golongan"] . "/" . $arrVal["tap_ruang"] . ")";
        }
        
        $arrData = $this->tbl_asn_trans->retreive_jabatan();
        $arrJabatan = array();
        foreach($arrData as $key => $arrVal) {
            $arrJabatan[$arrVal["taj_id"]] = $arrVal["taj_nama"];
        }


        $arrForm = array(
            "ctlArrJabatan" => $arrJabatan,
            "ctlArrPangkat" => $arrPangkat,
            "ctlArrConfig" => array("urlData" => $this->thisurl . "/ajx_data"),
            "ctlId" => $id,
            "ctlArrData" => $data,
            "ctlThisUrl" => $this->thisurl,
            "ctlCancelUrl" => $cancelUrl,
            "ctlSubmitUrl" => $this->thisurl . "/submit",
            "ctlUrlTable" => $this->thisurl,
        );

        $arrData = array(
            "ctlTitle" => "ASN",
            "ctlSubTitle" => "Sekretariat BPKAD",

            "ctlSideBar" => $this->lib_defaultView->retrieve_menu("asn"),
            "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
            "ctlContentArea" => $this->load->view("asn/vw_form_asn", $arrForm, true),
            "ctlSideBarR" => $this->lib_defaultView->retrieve_sidebar_r(),
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

    public function view_data($id = "") {

        $data = $this->tbl_arsip_surat->retrieve_by_id($id);

        if (!$data) {
            show_404();
        } else {

            $data = $data[0];

            if ($data["as_file"]) {
                $data["as_file"] = json_decode($data["as_file"]);
            } else {
                $data["as_file"] = array();
            }

            $data["as_url_print"] = $this->thisurl . "/print_data/" . $data["as_id"];
            $data["as_tgl_surat"] = misc_helper::format_idDate($data["as_tgl_surat"]);
            $data["as_tgl_diterima"] = misc_helper::format_idDate($data["as_tgl_diterima"]);
            $data["as_diteruskan"] = json_decode($data["as_diteruskan"]);
            $data["as_ket"] = json_decode($data["as_ket"]);

            $arrData = array(
                "ctlArrData" => $data,
                "ctlUrlEdit" => $this->thisurl . "/form/".$data["as_id"],
                "ctlUrlTable" => $this->thisurl
            );

            $arrData = array(
                "ctlTitle" => "Arsip Surat",
                "ctlSubTitle" => "Sekretariat BPKAD",

                "ctlSideBar" => $this->lib_defaultView->retrieve_menu("surat_masuk"),
                "ctlHeaderBar" => $this->lib_defaultView->retrieve_header(),
                "ctlContentArea" => $this->load->view("arsip/vw_data_detail", $arrData, true),
                "ctlSideBarR" => $this->load->view("master_view/master_sidebar_r", array(), true),
                "ctlArrJs" => array(),
                "ctlArrCss" => array()
            );
            $this->load->view('master_view/master_index', $arrData);
        }
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
    
    private function _upload_file() {
    
        $filepath = APPPATH."../assets/img/sa-scan-file";
        
        $config['upload_path'] = $filepath;
		$config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = date("YmdHisu");
		$config['max_size']	= '5000';
        
        // this library must be init just in here..
		$this->load->library('upload', $config);

        print_r($_FILES);

        $data = array();
        $status = false;
        $arrFileUpload = $_FILES["surat"];
        foreach($arrFileUpload["name"] as $key => $val) {
            $_FILES["surat"] = array(
                "name" => $val,
                "type" => $arrFileUpload["type"][$key],
                "tmp_name" => $arrFileUpload["tmp_name"][$key],
                "error" => $arrFileUpload["error"][$key],
                "size" => $arrFileUpload["size"][$key],
            );
    		if ( ! $this->upload->do_upload("surat")) {
    			$error = array('error' => $this->upload->display_errors());
                print_r($error);
    			$status = false;
    		}
    		else
    		{
    			$data[] = array('upload_data' => $this->upload->data());
                $status = true;
    		}
        }
        if ($status) {
            return $data;
        } else {
            return false;
        }
        
    }


    private function _create_thumbnail($filepath) {
        #360x205
        
        $config['source_image'] = $filepath;
        $config['width'] = 360;
        $config['height'] = 205;
        $config['maintain_ratio'] = true;
        $config['master_dim'] = "width";
        $config['new_image'] = str_replace("sa-scan-file", "sa-scan-file/resize", $filepath);

        $this->image_lib->initialize($config); 

        if ( ! $this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }

        $this->image_lib->clear();
        
        $config['source_image'] = str_replace("sa-scan-file", "sa-scan-file/resize", $filepath);
        $config['new_image'] = str_replace("sa-scan-file", "sa-scan-file/thumb", $filepath);
        $config['width'] = 360;
        $config['height'] = 205;
        $config['maintain_ratio'] = FALSE;
        $config['x_axis'] = 0;
        $config['y_axis'] = 0;

        $this->image_lib->initialize($config); 

        if ( ! $this->image_lib->crop())
        {
            return false; //$this->image_lib->display_errors();
        } else {
            return true;
        }
    }
    
	public function submit() {
        
        $arrPost = $this->input->post();

        if (!$arrPost) {
            show_404();
        }

        $status = true;

        $dataUpload = $this->_upload_file();

        if ($dataUpload) { // new
            $arrFile = array();
            foreach ($dataUpload as $key => $arrVal) {
                $arrFile[] = "/assets/img/sa-scan-file/".$arrVal["upload_data"]["file_name"];
            }
 
            $arrPost["as_file"] = json_encode($arrFile);
        } else if ($arrPost["as_id"] > 0) { // edit
            unset($arrPost["as_file"]);
        } else {
            $status = false;
            $arrError[] = "file tidak diupload";
        }

        if ($status) {
            echo "test";
            $arrPost["as_search_index"] = $this->_exec_search_index($arrPost);
            $return = $this->_set_data($arrPost);

            if ($return) {
                $this->load->model("log_arsip_surat_thumb");
                $arrUpdate = array(
                    "las_status" => 0
                );

                if ($arrPost["as_id"] > 0) {
                    $this->log_arsip_surat_thumb->updatedata($arrUpdate, $arrPost["as_id"]);
                }
            }
        }

        redirect(base_url(), 'refresh');
    }

    private function _exec_search_index($arrVal) {
        $arrText = array(
            "dari" => $arrVal["as_dari"],
            "nomor surat" => $arrVal["as_no_surat"],
            "tanggal surat" => $arrVal["as_tgl_surat"],
            "1tanggal surat" => misc_helper::format_idDate($arrVal["as_tgl_surat"]),
            "tanggal diterima" => $arrVal["as_tgl_diterima"],
            "1tanggal diterima" => misc_helper::format_idDate($arrVal["as_tgl_diterima"]),
            "agenda" => $arrVal["as_no_agenda"],
            "sifat" => $arrVal["as_sifat"],
            "perihal" => $arrVal["as_perihal"],
            "diteruskan" => $arrVal["as_diteruskan"],
            "keterangan" => $arrVal["as_ket"],
            "catatan" => $arrVal["as_catatan"],
        );  

        $jsontext = json_encode($arrText);

        return $jsontext;
    }
    
    public function test() {
        $arrData = $this->tbl_arsip_surat->retrieve_by_limit("", 0, 10);

        foreach($arrData as $key => $arrVal) {
            $arrTemp["as_search_index"] = $this->_exec_search_index($arrVal);

            $status = $this->tbl_arsip_surat->updatedata($arrTemp, $arrVal["as_id"]);
            $arrTemp = array();
        }   
    }
    
}
    