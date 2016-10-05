<?php
require APPPATH . 'third_party\php-cache\vendor\autoload.php';
require APPPATH . 'third_party\php-cache\vendor\autoload.php';
use phpFastCache\CacheManager;
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use \Curl\Curl;

class MapsPro extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $userInfo = array(
            'username'=>'admin',
            'password'=>'admin'
        );
        mSetSession($userInfo);
        $fileCache = mConfig('fileCache');
        $tokenCache = $fileCache->getItem('token');
        if(is_null($tokenCache->get())){
            $result = getAuthenticate(mGetSession('username'), mGetSession('password'));
            if(!empty($result)){
                mSetSession(array('token'=>$result));
                $tokenCache->set(($result))->expiresAfter(EXPIRES_CACHE_TOKEN);
                $fileCache->save($tokenCache);
            }
        }else{
            writeLog('lay tu trong cache ra token: '.$tokenCache->get());
            if(empty(mGetSession('token'))){
                mSetSession(array('token'=>$tokenCache->get()));
            }
        }
        $listDeviceCache = $fileCache->getItem('listDevice');
        $list = '';
        if(is_null($listDeviceCache->get())){
            $list = getListDevice(mGetSession('token'));
            $listDeviceCache->set($list)->expiresAfter(EXPIRES_CACHE_LIST_DIVICE);
            $fileCache->save($listDeviceCache);
        }else{
            writeLog('lay list divice tu cache'.  print_r($listDeviceCache->get(),TRUE));
            $list = $listDeviceCache->get();
        }
        $data['devicesInfo'] = !empty($list)?$list:array();
        $data['temp'] = 'front-end/maps/index';
        $this->load->view('front-end/template/master', $data);
    }

    public function search() {
        header("Content-Type: application/json", true);
        $fileCache = mConfig('fileCache');
        $data = array();
        $name=scGetName($this->input->post('name'));
        $deviceNameCache = $fileCache->getItem($name);
        if(is_null($deviceNameCache->get())){
            $result = getDeviceConfig(mGetSession('token'), $name);
            if(!empty($result)){   
                echo json_encode(array('success'=>true,'message'=>$this->load->view('front-end/block/view_maker',array('data'=>$result),TRUE)));
            }else{
                echo json_encode(array('success'=>FALSE,'message'=>$this->load->view('front-end/block/view_maker',array('data'=>$result),TRUE)));
            }
            $deviceNameCache->set($result)->expiresAfter(EXPIRES_CACHE_DEVICE);
            $fileCache->save($deviceNameCache);
        }else{
            $result = $deviceNameCache->get();
            echo json_encode(array('success'=>true,'message'=>$this->load->view('front-end/block/view_maker',array('data'=>$result),TRUE)));
        }
        exit;
    }
    
    public function update(){
        
    }

    public function test(){
    $jsonData = '[{
"deviceName": "Dev02",
"name": "* CONG TY PARAGON **",
"otherConfig": {
    "hour_on": 10,
    "hour_off": 10,
    "minute_on": 10,
    "minute_off": 10,
    "hour_blink": 10,
    "minute_blink": 10,
    "so_pha": 4,
    "option1": [1, 2, 3, 4, 5, 6, 7, 8],
    "option2": [1, 2, 3, 4, 5, 6, 7, 8],
    "strageties": ["A", "A", "A", "A", "A", "A", "A"],
    "lang": 1,
    "train_road": [1, 1, 1, 1, 1, 1, 1, 1]
},
"mainConfig": {
    "stragetiesA": [null, {
            "hour_on": 20,
            "hour_off": 20,
            "minute_on": 30,
            "minute_off": 30,
            "freq": 10,
            "gt": 10,
            "tv": 10,
            "tx": [1, 2, 3, 4, 5, 6, 7, 8],
            "tsx": [1, 2, 3, 4, 5, 6, 7, 8],
            "tdbx": [1, 2, 3, 4, 5, 6, 7, 8],
            "tsdbx": [1, 2, 3, 4, 5, 6, 7, 8]
        }, null, null, null, null],
    "stragetiesB": [null, null, null, null, null, null],
    "stragetiesC": [null, null, null, null, null, null],
    "stragetiesD": [null, null, null, null, null, null]
}
}]';
    $fileCache = mConfig('fileCache');
    $deviceCache = $fileCache->getItem('Dev04');
    if(!empty($deviceCache->get())){
//        $deviceConfig = $deviceCache->get();$chienLuoc=mConfig('chien-luoc')[0];
//                pre($deviceConfig->config->mainConfig->stragetiesA);
//        pre($chienLuoc);
//        pre(getActiveChienLuoc($deviceConfig, $chienLuoc, 1));
        pre($deviceCache->get());
    }
}

    public function getMainConfig(){
        $chien_luoc = $this->input->post('chien_luoc');
        $thoi_diem = $this->input->post('thoi_diem');
        $mc_chien_luoc = mConfig('chien-luoc');
        $mc_thoi_diem = mConfig('thoi-diem');
        $name = $this->input->post('name');
        $active_chien_luoc = array();
        $fileCache = mConfig('fileCache');
        $deviceNameCache = $fileCache->getItem($name);
        $deviceConfigActive = array();
        if(is_null($deviceNameCache->get())){
            $deviceConfig = getDeviceConfig(mGetSession('token'), $name);
            if(!empty($deviceConfig)){
                $deviceNameCache->set($deviceConfig)->expiresAfter(EXPIRES_CACHE_DEVICE);
                $fileCache->save($deviceNameCache);
                $deviceConfigActive = getActiveChienLuoc($deviceConfig, $mc_chien_luoc[$chien_luoc], $mc_thoi_diem[$thoi_diem]);
            }
            
        }else{
            $deviceConfig = $deviceNameCache->get();
//            echo json_encode (array($mc_chien_luoc[$chien_luoc], $mc_thoi_diem[$thoi_diem]));
            $deviceConfigActive = getActiveChienLuoc($deviceConfig, $mc_chien_luoc[$chien_luoc], $mc_thoi_diem[$thoi_diem]);
        }
//        exit;
        $deviceConfigView = $this->load->view('front-end/block/view_maker',array('data'=>$deviceConfig),TRUE);
        echo  json_encode(array('success'=>true,'dataConfig'=>$deviceConfigActive));
        exit;
    }

}
