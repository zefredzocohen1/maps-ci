<?php

require APPPATH . 'third_party'.DIRECTORY_SEPARATOR.'php-cache'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use phpFastCache\CacheManager;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MapsPro extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $fileCache = mConfig('fileCache');
        if(empty(mGetSession('username'))||empty(mGetSession('password'))){
            redirect(base_url().'front-end/user/index');
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

    public function search() {
        header("Content-Type: application/json", true);
        $fileCache = mConfig('fileCache');
        $data = array();
        $name = scGetName($this->input->post('name'));
        
        $result = getDeviceConfig(mGetSession('token'), $name);
        echo json_encode($result);
        die;
        
        $deviceNameCache = $fileCache->getItem($name);
        if (is_null($deviceNameCache->get())) {
            $result = getDeviceConfig(mGetSession('token'), $name);
            if (empty($result) || @$result->success === false) {
                echo json_encode(array('success' => FALSE, 'message' => $this->load->view('front-end/block/view_maker', array('data' => $result), TRUE)));
            } else {
                $deviceNameCache->set($result)->expiresAfter(EXPIRES_CACHE_DEVICE);
                $fileCache->save($deviceNameCache);
                echo json_encode(array('success' => true, 'message' => $this->load->view('front-end/block/view_maker', array('data' => $result), TRUE)));
            }
        } else {
            $result=$deviceNameCache->get();
            echo json_encode(array('success' => true, 'message' => $this->load->view('front-end/block/view_maker', array('data' => $result), TRUE)));
        }
        exit;
    }

    public function update() {
        
    }

    public function test() {
//        echo $this->load->view('test/index',null,true);
        $fileCache = mConfig('fileCache');
        $deviceCache = $fileCache->getItem('Dev01');
        if (!empty($deviceCache->get())) {
            pre(($deviceCache->get()));
        }
    }

    public function getMainConfig() {
        $chien_luoc = $this->input->post('chien_luoc');
        $thoi_diem = $this->input->post('thoi_diem');
        $mc_chien_luoc = mConfig('chien-luoc');
        $mc_thoi_diem = mConfig('thoi-diem');
        $name = $this->input->post('name');
        $active_chien_luoc = array();
        $fileCache = mConfig('fileCache');
        $deviceNameCache = $fileCache->getItem($name);
        $deviceConfigActive = array();
        if (is_null($deviceNameCache->get())) {
            $deviceConfig = getDeviceConfig(mGetSession('token'), $name);
            if (!empty($deviceConfig)||@$deviceConfig['success']===FALSE) {
                $deviceNameCache->set($deviceConfig)->expiresAfter(EXPIRES_CACHE_DEVICE);
                $fileCache->save($deviceNameCache);
                $deviceConfigActive = getActiveChienLuoc($deviceConfig, $mc_chien_luoc[$chien_luoc], $mc_thoi_diem[$thoi_diem]);
            }
        } else {
            $deviceConfig = $deviceNameCache->get();
            $deviceConfigActive = getActiveChienLuoc($deviceConfig, $mc_chien_luoc[$chien_luoc], $mc_thoi_diem[$thoi_diem]);
        }
        $deviceConfigView = $this->load->view('front-end/block/view_maker', array('data' => $deviceConfig), TRUE);
        echo json_encode(array('success' => true, 'dataConfig' => $deviceConfigActive));
        exit;
    }

    public function saveConfig() {
        $fileCache = mConfig('fileCache');
        $data = $this->input->post('data');
        $value = array_values($data);
        $config = createDeviceConfig();
        $subOtherConfig = createDeviceSubOtherConfig();
        $config->deviceName = $this->input->post('deviceName');
        foreach ($value as $i => $row) {
            if ($row['name'] == 'intersection_name') {
                $config->name = $row['value'];
            } elseif ($row['name'] == 'config_device_stragetiesA') {
                $config->mainConfig->stragetiesA = json_decode($row['value']);
            } elseif ($row['name'] == 'config_device_stragetiesB') {
                $config->mainConfig->stragetiesB = json_decode($row['value']);
            } elseif ($row['name'] == 'config_device_stragetiesC') {
                $config->mainConfig->stragetiesC = json_decode($row['value']);
            } elseif ($row['name'] == 'config_device_stragetiesD') {
                $config->mainConfig->stragetiesD = json_decode($row['value']);
            } elseif (preg_match('/chien\-luoc\-ngay\[([0-8])\]/', $row['name'], $_number)) {
                $subOtherConfig->strageties[$_number[1] - 2] = mConfig('chien-luoc-ngay')[intval($row['value'])];
            } elseif (preg_match('/option1\_\[([0-8])\]/', $row['name'], $_number)) {
                $subOtherConfig->option1[$_number[1]] = intval($row['value']);
            } elseif (preg_match('/option2\_\[([0-8])\]/', $row['name'], $_number)) {
                $subOtherConfig->option2[$_number[1]] = intval($row['value']);
            } elseif ($row['name'] == 'otherStartTime') {
                $time = explode(':', $row['value']);
                $subOtherConfig->hour_on = @ intval($time[0]);
                $subOtherConfig->minute_on = @ intval($time[1]);
            } elseif ($row['name'] == 'otherEndTime') {
                $time = explode(':', $row['value']);
                $subOtherConfig->hour_off = @ intval($time[0]);
                $subOtherConfig->minute_off = @ intval($time[1]);
            } elseif ($row['name'] == 'otherBlinkTime') {
                $time = explode(':', $row['value']);
                $subOtherConfig->hour_blink = @ intval($time[0]);
                $subOtherConfig->minute_blink = @ intval($time[1]);
            } elseif ($row['name'] == 'otherAlpha') {
                $subOtherConfig->so_pha = intval($row['value']);
            }
        }
        $config->otherConfig = $subOtherConfig;
        $result = setConfigDevice(mGetSession('token'), $config->deviceName, json_encode($config));
        echo json_encode($result);
        exit;
        if ($result->success) {
            $tmp = new stdClass();
            $tmp->config = $config;
            $deviceNameCache = $fileCache->getItem($config->deviceName);
            $deviceNameCache->set($tmp)->expiresAfter(EXPIRES_CACHE_DEVICE);
            $fileCache->save($deviceNameCache);
//            exit;
        }
        echo json_encode(($result));
        exit;
    }

    public function startDevice() {
        $deviceName = $this->input->post('deviceName');
        $result = startDevice(mGetSession('token'), $deviceName);
        if (empty($result)) {
            echo json_encode(array(
                'success' => false,
                'message' => 'Lỗi trong việc kết nối đến server'
            ));
        } else {
            echo json_encode($result);
        }
        exit;
    }

    public function stopDevice() {
        $deviceName = $this->input->post('deviceName');
        $result = stopDevice(mGetSession('token'), $deviceName);
        if (empty($result)) {
            echo json_encode(array(
                'success' => false,
                'message' => 'Lỗi trong việc kết nối đến server'
            ));
        } else {
            echo json_encode($result);
        }
        exit;
    }

    public function downloadConfigDevice() {
        if (empty(mGetSession('token'))) {
            return json_encode(array('success' => false, 'error: token'));
        }
        $fileCache = mConfig('fileCache');
        $name = scGetName($this->input->post('deviceName'));
        $deviceNameCache = $fileCache->getItem($name);
        $result = getDeviceConfig(mGetSession('token'), $name);
        var_dump($result);exit;
        if (empty($result)||@$result->success===false) {
            echo json_encode(array('success' => FALSE, 'message' => 'error'));
        } else {
            $deviceNameCache->set($result)->expiresAfter(EXPIRES_CACHE_DEVICE);
            $fileCache->save($deviceNameCache);
            $data = array();
            $data['stragetiesA'] = $result->config->mainConfig->stragetiesA;
            $data['stragetiesB'] = $result->config->mainConfig->stragetiesB;
            $data['stragetiesC'] = $result->config->mainConfig->stragetiesC;
            $data['stragetiesD'] = $result->config->mainConfig->stragetiesD;
            $data['otherConfig'] = $result->config->otherConfig;
            $data['deviceName'] = $result->config->deviceName;
            echo json_encode(array('success'=>TRUE,'message'=>  $data));
//            echo json_encode(array('success' => true, 'message' => $this->load->view('front-end/block/view_maker', array('data' => $result), TRUE)));
        }
    }

    public function blinkDevice() {
        $deviceName = $this->input->post('deviceName');
        $result = blinkDevice(mGetSession('token'), $deviceName);
        if (empty($result)) {
            echo json_encode(array(
                'success' => false,
                'message' => 'Lỗi trong việc kết nối đến server'
            ));
        } else {
            echo json_encode($result);
        }
        exit;
    }

    public function setTimeDevice() {
        $deviceName = $this->input->post('deviceName');
        $result = setTimeDevice(mGetSession('token'), $deviceName);
        if (empty($result)) {
            echo json_encode(array(
                'success' => false,
                'message' => 'Lỗi trong việc kết nối đến server'
            ));
        } else {
            echo json_encode($result);
        }
        exit;
    }
    
    public function table(){
        $data['temp'] = 'front-end/block/table';
        $this->load->view('front-end/template/master', $data);
    }

}
