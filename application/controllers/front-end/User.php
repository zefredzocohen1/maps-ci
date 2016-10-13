<?php

require APPPATH . 'third_party\php-cache\vendor\autoload.php';
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
        $data = array();
        $userInfo = array(
            'username' => 'tutq',
            'password' => 'tutq'
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
        $listDeviceCache = $fileCache->getItem('listDevice');
        $list = '';
        if (is_null($listDeviceCache->get())) {
            $list = getListDevice(mGetSession('token'));
            $listDeviceCache->set($list)->expiresAfter(EXPIRES_CACHE_LIST_DIVICE);
            $fileCache->save($listDeviceCache);
        } else {
            writeLog('lay list divice tu cache' . print_r($listDeviceCache->get(), TRUE));
            $list = $listDeviceCache->get();
        }
        $data['devicesInfo'] = !empty($list) ? $list : array();
        $data['temp'] = 'front-end/maps/index';
        $this->load->view('front-end/template/master', $data);
    }

    public function login(){
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

}
