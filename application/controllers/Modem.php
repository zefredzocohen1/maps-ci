<?php

//require APPPATH . 'third_party'.DIRECTORY_SEPARATOR.'php-cache'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
require APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'base' . DIRECTORY_SEPARATOR . 'BaseController.php';

//use phpFastCache\CacheManager;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modem extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $data['temp'] = 'front-end/modem/index';
        $data['title'] = 'Đăng nhập';
        $data['plugin'] = array(
            'js'=>array('jquery.validate.min.js')
        );
        $data['listModem'] = ($this->db->from('modem_info')->get()->result());
        $this->load->view('front-end/template/master',$data);
    }
    
    public function add(){
        $role = mGetSession('role');
        $data = array();
//        if($role != mConfig('role')['admin']){
//            $this->session->set_flashdata(array(
//                        'type'=> mConfig('type_flash_data')['danger'],
//                        'message'=>'Bạn không có quyền tạo user'
//                    ));
//        }
        if($this->input->post()){
            $user = convert_accented_characters(scGetName($this->input->post('username')));
            $pass = scGetName($this->input->post('password'));
            $permisson = scGetName($this->input->post('permison'));
            if(!empty($user)&&!empty($pass)){
                createUser($token,
                    array(
                        'username'=>$user,
                        'password'=>$pass,
                        'permisson'=>$role
                    ));
            }
        }
        $data['temp'] = 'front-end/modem/add';
        $data['title'] = 'Thêm người dùng';
        $data['plugin'] = array(
            'js'=>array('jquery.validate.min.js')
        );
        $data['sidebarActive'] = 'user';
        $data['action'] = $this->router->method;
        $data['roles'] = mConfig('role');
        $this->load->view('front-end/template/master',$data);
    }
}
