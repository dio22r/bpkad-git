<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct() {
    	parent::__construct();

		$this->load->helper("misc");
		
    	$this->load->model("tbl_user");

        $arrConfig = array("session" => $this->session);
        $this->lib_login = new lib_login($arrConfig);
	}

	public function index() {
		$return = $this->_submit();

        $this->lib_login->redir_if_login();
        
		if ($return["status"]) {
			redirect($return["url"], "refresh");
		} else {
			$arrLogin = array(
				"ctlArrReturn" => $return
			);
			$this->load->view("vw_login", $arrLogin);
		}
	}

	protected function _submit() {
		$arrPost = $this->input->post();

		if (!$arrPost || !is_array($arrPost)) {
            $arrPost = $this->input->post();
        }
        
        if (!$arrPost) {
            $arrReturn = array(
    		    "status" => false,
    		    "url" => base_url()
		    );

		    return $arrReturn;
        }
        
        if (!$this->lib_login->check_login()) {
            
            $arrData = $this->tbl_user->select_by_username($arrPost["form-username"]);
            $countTry = $this->lib_login->count_try();
            
            $arrReturn = false;
            if ($arrData
            	&& md5($arrPost["form-password"]) == $arrData[0]["u_password"]
        	) {
                $userData = array(
                	"usr_id" => $arrData[0]["u_id"],
            		"usr_username" => $arrData[0]["u_username"],
            		"usr_surename" => $arrData[0]["u_display_name"],
            		"usertype" => "tipe user",
            		"usrt_id" => $arrData[0]["u_previlage"]
            	);
                
                $this->lib_login->set_session_data($userData);
                $url = $this->lib_login->check_redir();
                
        		$arrReturn = array(
        		    "status" => true,
        		    "url" => $url
    		    );   
            } else {
            	$arrReturn = array(
        		    "status" => false,
        		    "msg" => "Username atau Password Salah",
        		    "url" => ""
    		    );
            }
            
        } else {
            $arrReturn = array(
    		    "status" => true,
    		    "url" => base_url()
		    );
        }
        

        return $arrReturn;
        /*
        $this->output
            ->set_content_type("application/json")
            ->set_output(json_encode($arrReturn));
        
        return $arrReturn;
        */
	}

	public function logout() {
	    $this->session->sess_destroy();
	    delete_cookie("last_url");
		redirect(base_url("index.php/login"), "refresh");
	}
}