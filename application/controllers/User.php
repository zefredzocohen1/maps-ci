<?php

require APPPATH . 'third_party'.DIRECTORY_SEPARATOR.'php-cache'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
require APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'base' . DIRECTORY_SEPARATOR . 'BaseController.php';

use phpFastCache\CacheManager;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        $data = array();
        $this->load->library("form_validation");
        if(!empty($this->session->userdata('username'))&&!empty($this->session->userdata('password'))&&!empty($this->session->userdata('role'))){
            redirect(base_url().'Home');
        }
        if($this->input->post()){
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]');
            if ($this->form_validation->run()) {
                $user = scGetName($this->input->post('username'));
                $pass = scGetName($this->input->post('password'));
                $userInfo = array(
                    'username' => $user,
                    'password' => $pass,
                );
                $result = getAuthenticate($user, $pass);
                if (!empty($result) && $result->success) {
                    mSetSession(array('token' => $result->message));
                    mSetSession(array('role'  =>$result->role));
                    mSetSession($userInfo);
                    redirect(base_url().'home');
                }
                else{
                    $this->session->set_flashdata(array(
                        'type'=> mConfig('type_flash_data')['danger'],
                        'message'=>'Mật khẩu hoặc tài khoản không đúng'
                    ));
                }
            }
        }
        $data['temp'] = 'front-end/user/login';
        $data['title'] = 'Đăng nhập';
        $data['plugin'] = array(
            'js'=>array('jquery.validate.min.js')
        );
        $this->load->view('front-end/template/user_before/master_user_before',$data);
    }

    public function login(){
        if(!empty($this->session->userdata('username'))&&!empty($this->session->userdata('password'))&&!empty($this->session->userdata('role'))){
            redirect(base_url().'Home/index');
        }
        $data = array();
        if($this->input->post()){
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]');
            if ($this->form_validation->run()) {
                $user = scGetName($this->input->post('username'));
                $pass = scGetName($this->input->post('password'));
                $userInfo = array(
                    'username' => $user,
                    'password' => $pass,
                );
                $result = getAuthenticate($user, $pass);
                if (!empty($result) && $result->success) {
                    mSetSession(array('token' => $result->message));
                    mSetSession(array('role'  =>$result->role));
                    mSetSession($userInfo);
                    redirect(base_url().'Home/index');
                }
                else{
                    $this->session->set_flashdata(array(
                        'type'=> mConfig('type_flash_data')['danger'],
                        'message'=>'Mật khẩu hoặc tài khoản không đúng'
                    ));
                }
            }
        }
        $data['temp'] = 'front-end/user/login';
        $data['title'] = 'Đăng nhập';
        $data['plugin'] = array(
            'js'=>array('jquery.validate.min.js')
        );
        $this->load->view('front-end/template/user_before/master_user_before',$data);
    }
    
    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        redirect(base_url().'user/index');
    }
    
    public function create(){
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
        $data['temp'] = 'front-end/user/create';
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
