<?php
class default_view {
    protected $session;
    protected $loadClass;
    protected $baseUrl;
    protected $libLoginClass;

    public function __construct(
		$loadClass = null, $libLoginClass = null, $arrConfig = array()
	) {
    	$this->loadClass = $loadClass;
    	$this->libLoginClass = $libLoginClass;
        foreach ($arrConfig as $key => $value) {
            $this->$key = $value;
        }

        $this->baseUrl = base_url("index.php");
    }
    
    public function retrieve_menu($activeMenu = "") {
    	$baseUrl = $this->baseUrl;
		$arrUserData = $this->libLoginClass->get_session_data();

    	$arrMenu = array(
			"arsip_surat" => array(
				"icon" => "fa-envelope",
			  	"href" => $baseUrl . "/arsip_surat",
			  	"title" => "Arsip Surat",
			  	"class" => "treeview",
			    "sub" => array(
			      	"surat_masuk" => array(
			      		"icon" => "fa-download",
				        "href" => $baseUrl . "/arsip_surat",
				        "title" => "Surat Masuk",
				        "class" => ""
			        ),
			      	"surat_keluar" => array(
		      			"icon" => "fa-upload",
				        "href" => $baseUrl . "/arsip_surat#",
				        "title" => "Surat Keluar",
				        "class" => ""
			        )
		    	)
			),
			"spt_spd" => array(
				"icon" => "fa-link",
				"href" => $baseUrl . "/spt_spd",
			  	"title" => "SPPD",
			  	"class" => ""
	        ),
			"asn" => array(
				"icon" => "fa-user",
				"href" => $baseUrl . "/asn",
			  	"title" => "ASN",
			  	"class" => "treeview",
			    "sub" => array(
			      	"asn" => array(
			      		"icon" => "fa-users",
				        "href" => $baseUrl . "/asn",
				        "title" => "Edit ASN",
				        "class" => ""
			        ),
			      	"jabatan" => array(
			      		"icon" => "fa-gear",
				        "href" => $baseUrl . "/asn_jabatan",
				        "title" => "Edit Jabatan",
				        "class" => ""
			        ),
			      	"pangkat" => array(
		      			"icon" => "fa-angle-double-up",
				        "href" => $baseUrl . "/asn_pangkat",
				        "title" => "Edit Pangkat",
				        "class" => ""
			        )
		    	)
	        )
		);

		foreach($arrMenu as $key => $arrVal) {
			if ($key == $activeMenu) {
				$arrMenu[$key]["class"] .= " active";
			}

			if (isset($arrVal["sub"])) {
				foreach($arrVal["sub"] as $key2 => $arrVal2) {
					if ($key2 == $activeMenu) {
						$arrMenu[$key]["sub"][$key2]["class"] .= " active";
						$arrMenu[$key]["class"] .= " active";
					}
				}
			}
		}

    	$arrData = array(
    		"ctlArrMenu" => $arrMenu,
    		"ctlUsername" => $arrUserData["displayname"]
		);

    	$html = $this->loadClass->view("master_view/master_menu", $arrData, true);
  	    

    	return $html;
    }

    public function retrieve_header() {
    	$baseUrl = $this->baseUrl;
    	$arrUserData = $this->libLoginClass->get_session_data();

    	//print_r($arrUserData);

    	$arrData = array(
    		"ctlUrlLogout" => $baseUrl."/login/logout",
    		"ctlUsername" => $arrUserData["displayname"]
		);
    	$html = $this->loadClass->view("master_view/master_headerbar", $arrData, true);
    	return $html;
    }

    public function retrieve_sidebar_r() {

    	$html = $this->loadClass->view("master_view/master_sidebar_r", array(), true);
    	return $html;
    }

    public function retreieve_headtag($arrCss = array()) {
    	
    }

    public function retreieve_scripttag($arrJs = array()) {
    	
    }
}