<?php

require APPPATH . 'third_party\php-cache\vendor\autoload.php';

use phpFastCache\CacheManager;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use \Curl\Curl;

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
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
                    'password' => $pass
                );
                $result = getAuthenticate($user, $pass);
                if (!empty($result) && $result->success) {
                    mSetSession(array('token' => $result->message));
                    mSetSession($userInfo);
                    redirect(base_url().'home');
                }
                else{
                    $this->session->set_flashdata(array(
                        'success'=>false,
                        'message'=>'Mật khẩu hoặc tài khoản không đúng'
                    ));
                }
            }
        }
        $this->load->view('front-end/user/login');
    }

    public function login(){
        if(!empty(mGetSession('username'))&&!empty(mGetSession('password'))){
            redirect('front-end/MapsPro/index');
        }
        if($this->input->post()){
            $user = scGetName($this->input->post('username'));
            $pass = scGetName($this->input->post('password'));
            if(trim($user)!=''&&trim($pass)!=''){
                $result = getAuthenticate($user, $pass);
                if(!empty($result)||@$result->success==false){
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
    
    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        redirect(base_url().'front-end/user/index');
    }

}
