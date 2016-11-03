<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BaseController extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
        if(!$this->checkLogin()){
            redirect('User/logout');
        }
        
    }
    
    public function index(){
        echo 1;
    }

    public function checkLogin(){
        if(empty($this->session->userdata('username'))||empty($this->session->userdata('password'))||
                empty($this->session->userdata('role'))||empty($this->session->userdata('token'))){
            return false;
        }
        return true;;
    }
    
    public function checkPermisson(){
        
    }

    public function deleteSession(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('role');
    }
}
