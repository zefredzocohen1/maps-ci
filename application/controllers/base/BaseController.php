<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'third_party'.DIRECTORY_SEPARATOR.'php-cache'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use phpFastCache\CacheManager;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BaseController extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
        if(!$this->checkLogin()){
            redirect('User/login');
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
}
