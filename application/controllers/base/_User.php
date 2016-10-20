<?php

require APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'base' . DIRECTORY_SEPARATOR . 'BaseController.php';

use phpFastCache\CacheManager;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        echo 1;
        return;
        $data = array();
        $this->load->library("form_validation");
        if (!empty(mGetSession('username')) && !empty(mGetSession('password'))) {
            redirect(base_url() . 'home');
        }
        if ($this->input->post()) {
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
                    mSetSession(array('role' => $result->role));
                    mSetSession($userInfo);
                    redirect(base_url() . 'home');
                } else {
                    $this->session->set_flashdata(array(
                        'type' => mConfig('type_flash_data')['danger'],
                        'message' => 'Mật khẩu hoặc tài khoản không đúng'
                    ));
                }
            }
        }
        $data['temp'] = 'front-end/user/login';
        $data['title'] = 'Đăng nhập';
        $data['plugin'] = array(
            'js' => array('jquery.validate.min.js')
        );
        $this->load->view('front-end/template/user_before/master_user_before', $data);
    }

    public function login() {
        echo 'login';
        return;
        if (!empty(mGetSession('username')) && !empty(mGetSession('password'))) {
            redirect('front-end/MapsPro/index');
        }
        if ($this->input->post()) {
            $user = scGetName($this->input->post('username'));
            $pass = scGetName($this->input->post('password'));
            if (trim($user) != '' && trim($pass) != '') {
                $result = getAuthenticate($user, $pass);
                if (!empty($result) || @$result->success == false) {
                    $userInfo = array(
                        'username' => $user,
                        'password' => $pass
                    );
                    mSetSession($userInfo);

                    $fileCache = mConfig('fileCache');
                    $tokenCache = $fileCache->getItem('token');
                    if (is_null($tokenCache->get())) {
                        $result = getAuthenticate(mGetSession('username'), mGetSession('password'));
                        if (!empty($result) && $result['success']) {
                            mSetSession(array('token' => $result['message']));
                            $tokenCache->set(($result))->expiresAfter(EXPIRES_CACHE_TOKEN);
                            $fileCache->save($tokenCache);
                        }
                    } else {
                        writeLog('lay tu trong cache ra token: ' . print_r($tokenCache->get(), true));
                        if (empty(mGetSession('token'))) {
                            mSetSession(array('token' => $tokenCache->get()));
                        }
                    }
                }
            }
        }
        $this->load->view('front-end/user/login');
    }

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        redirect(base_url() . 'front-end/user/index');
    }

    public function create() {
        $role = mGetSession('role');
        $data = array();
//        if($role != mConfig('role')['admin']){
//            $this->session->set_flashdata(array(
//                        'type'=> mConfig('type_flash_data')['danger'],
//                        'message'=>'Bạn không có quyền tạo user'
//                    ));
//        }
        if ($this->input->post()) {
            $user = convert_accented_characters(scGetName($this->input->post('username')));
            $pass = scGetName($this->input->post('password'));
            $permisson = scGetName($this->input->post('permison'));
            if (!empty($user) && !empty($pass)) {
                createUser($token, array(
                    'username' => $user,
                    'password' => $pass,
                    'permisson' => $role
                ));
            }
        }
        $data['temp'] = 'front-end/user/create';
        $data['title'] = 'Thêm người dùng';
        $data['plugin'] = array(
            'js' => array('jquery.validate.min.js')
        );
        $data['sidebarActive'] = 'user';
        $data['action'] = $this->router->method;
        $data['roles'] = mConfig('role');
        $this->load->view('front-end/template/master', $data);
    }

}
