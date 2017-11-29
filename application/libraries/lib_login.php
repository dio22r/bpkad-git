<?php
class lib_login {
    protected $session;
    
    public function __construct($arrConfig = array()) {
        foreach ($arrConfig as $key => $value) {
            $this->$key = $value;
        }
    }
    
    public function set_session_data($userData, $arrAdd = array()) {
        
        $this->session->set_userdata("iduser", $userData["usr_id"]);
		$this->session->set_userdata("username", $userData["usr_username"]);
		$this->session->set_userdata("displayname", $userData["usr_surename"]);
		$this->session->set_userdata("usertype", $userData["usertype"]);
		$this->session->set_userdata("idtype", $userData["usrt_id"]);
		$this->session->set_userdata("arrAdd", $arrAdd);
		
		$this->session->unset_userdata("count_try");
		
    }
    
    public function get_session_data() {
        
        if ($this->check_login()) {
            return array(
                "iduser" => $this->session->userdata("iduser"),
                "username" => $this->session->userdata("username"),
            	"displayname" => $this->session->userdata("displayname"),
                "usertype" => $this->session->userdata("usertype"),
                "idType" => $this->session->userdata("idType"),
                "arrAdd" => $this->session->userdata("arrAdd")
            );
        } else {
            return array();
        }
    }
    
    public function set_cookies($arrCookies) {
        $date = date("Y-m-d H:i:s", strtotime("+ 30 Minutes"));
        
        foreach ($arrCookies as $key => $val) {
            set_cookie($key, $val, $date, "localhost");
        }
    }
    
    public function check_redir() {
        $lastUrl = get_cookie("last_url");
        
        if ($lastUrl) {
            return $lastUrl;
        } else {
            return base_url();
        }
    }
    
    public function check_login() {
        $idUser = $this->session->userdata("iduser");
        if (!$idUser) {
            $arrCookies = array("last_url", current_url());
            $this->set_cookies($arrCookies);
            
            return false;
        } else {
            return true;
        }
    }
    
    public function count_try() {
        
        $count = $this->session->userdata("count_try");
        
        if ($count === false) {
            $count = 1;
        } else {
            $count ++;
        }
        
        $this->session->set_userdata("count_try", $count);
        
        return $count;
    }
    
    public function redir_ifnot_login() {
        $isLogin = $this->check_login();
        
        if (!$isLogin) {
            delete_cookie("last_url");
		    redirect(base_url("index.php/login"), "refresh");
        }
    }
    
    public function redir_if_login() {
        $isLogin = $this->check_login();
        
        if ($isLogin) {
            $lastUrl = get_cookie("last_url");
            if (!$lastUrl) {
                $lastUrl = base_url();
            }
            
		    redirect($lastUrl, "refresh");
        }
    }
}