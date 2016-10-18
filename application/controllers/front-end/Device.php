<?php

require APPPATH . 'third_party'.DIRECTORY_SEPARATOR.'php-cache'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use phpFastCache\CacheManager;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Device extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $this->load->library("form_validation");
        if(!empty(mGetSession('username'))&&!empty(mGetSession('password'))){
            redirect(base_url().'home');
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
    
    public function add(){
        $data = array();
        $data['plugin'] = array(
            'css'=>array('plugins/steps/jquery.steps.css'),
            'js'=>array(
                'inspinia.js',
                'plugins/pace/pace.min.js',
                
                
                'plugins/staps/jquery.steps.min.js',
                'plugins/validate/jquery.validate.min.js')
        );
        $data['temp'] = 'front-end/device/add';
        $this->load->view('front-end/template/master', $data);
    }
}
