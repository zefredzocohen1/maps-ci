<?php

require APPPATH . 'third_party'.DIRECTORY_SEPARATOR.'php-curl'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
require APPPATH . 'third_party'.DIRECTORY_SEPARATOR.'php-cache'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use phpFastCache\CacheManager;
use \Curl\Curl;

if (!function_exists('mConfig')) {

    function mConfig($item) {
        $CI = & get_instance();
        $result = FALSE;
        if (!empty($item)) {
            $result = $CI->config->item($item);
            if (empty($result)) {
                $result = FALSE;
            }
        }
        return $result;
    }

}

if (!function_exists('mSetSession')) {

    function mSetSession($item) {
        $CI = & get_instance();
        if (!empty($item)) {
            return $CI->session->set_userdata($item);
        } else
            return FALSE;
    }

}

if (!function_exists('mGetSession')) {

    function mGetSession($item) {
        $CI = & get_instance();
        $result = FALSE;
        if (!empty($item)) {
            return $CI->session->userdata($item);
        } else
            return FALSE;
    }

}

if (!function_exists('getAuthenticate')) {

    function getAuthenticate($user, $pass, &$curl = '', $typeResponve = 1, $typeRequest = HTTPS_REQUEST) {
        $CI = & get_instance();
        $result = new stdClass();
        if (empty($user) || empty($pass)) {
            return array('success' => false, 'message' => 'error: user or pass');
        }
        $address = $CI->config->item('host_server') . ':' . $CI->config->item('port_server') . mConfig('addr_authenticate');
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === 2) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $result = $curl->post($address, array(
            'username' => $user,
            'password' => $pass
        ));
        if ($curl->error) {
            //ghi log
            $_result = new stdClass();
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            $_result->success = false;
            $_result->message = $curl->errorCode . '-' . $curl->errorMessage;
            return $_result;
        } elseif (empty($result) || get_class($result) !== 'stdClass') {
            $result->success = false;
            $result->message = 'dữ liệu trả về ko đúng';
        } else {
            if(!@empty($result->token)){
                $result->success = true;
                $result->message = $result->token;
            }else{
                $result->success = FALSE;
                $result->message = 'Không tồn tại token';
            }
        }
        return $result;
    }

}

if (!function_exists('getDeviceConfig')) {

    function getDeviceConfig($token, $name, $type=1, $curl = '', $typeRequest = HTTPS_REQUEST) {
        $result = new stdClass();
        if (empty($token) || empty($name)) {
            return array('success' => false, 'message' => 'error: token or device name');
        }
        if($type==1){
            $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_device_config_db') . $name;
        }else{
            $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_device_config') . $name;
        }
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === 2) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $curl->setHeader('x-access-token', $token);
        $result = $curl->get($address);
        if ($curl->error) {
            if($type==2){
                $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_device_config') . $name;
            }else if($type==1){
                $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_device_config_db') . $name;
            }
            $curl->get($address);
            if($curl->error){
                $result = new stdClass();
                $result->success = FALSE;
            $result->message = $curl->errorCode . '-' . $curl->errorMessage;
            return $result;
            }else{
                $result->from = 'api';
                return $result;
            }
        }
        $result->from = $type==1?'db':'api';
        return $result;
    }

}

if (!function_exists('writeLog')) {

    function writeLog($msg, $type = 1) {
        $file = APPPATH . '..'.DIRECTORY_SEPARATOR.'log'.DIRECTORY_SEPARATOR.'debug.txt';
        $_message = date('Y:m:d H:i:s');
        $_message.=' ' . print_r($msg, true) . "\r\n";
        file_put_contents($file, $_message, FILE_APPEND | LOCK_EX);
    }

}

if (!function_exists('getActiveChienLuoc')) {

    function getActiveChienLuoc($deviceConfig, $chienLuoc, $thoiDiem) {
        $result = array();
        if (empty($chienLuoc) || empty($thoiDiem)) {
            return $result;
        }
        writeLog($chienLuoc . ': ' . $thoiDiem);
        if ($chienLuoc == 'stragetiesA') {
            if (!empty($deviceConfig->config->mainConfig->stragetiesA[$thoiDiem])) {
                $result['active'] = $deviceConfig->config->mainConfig->stragetiesA[$thoiDiem];
            }
        } elseif ($chienLuoc == 'stragetiesB') {
            if (!empty($deviceConfig->config->mainConfig->stragetiesB[$thoiDiem])) {
                $result['active'] = $deviceConfig->config->mainConfig->stragetiesB[$thoiDiem];
            }
        } elseif ($chienLuoc == 'stragetiesC') {
            if (!empty($deviceConfig->config->mainConfig->stragetiesC[$thoiDiem])) {
                $result['active'] = $deviceConfig->config->mainConfig->stragetiesC[$thoiDiem];
            }
        } elseif ($chienLuoc == 'stragetiesD') {
            if (!empty($deviceConfig->config->mainConfig->stragetiesD[$thoiDiem])) {
                $result['active'] = $deviceConfig->config->mainConfig->stragetiesD[$thoiDiem];
            }
        }
        return $result;
    }

}

if (!function_exists('getListDevice')) {

    function getListDevice($token, $type=1, $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token)) {
            return array('success' => false, 'message' => 'error: token');
        }
        $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_device_list');
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === HTTPS_REQUEST) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $curl->setHeader('x-access-token', $token);
        $result = $curl->get($address);
        if ($curl->error) {
            //ghi log
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            return array('success' => false, 'message' => 'error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
        } elseif (empty($result)) {
            writeLog('error: dữ liệu trả về ko đúng');
            return array('success' => false, 'message' => 'dữ liệu trả về ko đúng');
        } else {
            if (!empty($result) && $typeResponse == RESPON_JSON) {
                foreach ($result as $i => $value) {
                    $result[$i] = array(
                        'long'              => round($value->longitude,3),
                        'lat'               => round($value->latitude,3),
                        'name'              => $value->device_name
                    );
                    if($type==1){
                        $result[$i]['sim_number'] = isset($value->sim_number)?$value->sim_number:'';
                        $result[$i]['device_serial'] = isset($value->device_serial)?$value->device_serial:'';
                        $result[$i]['device_mainboard'] = isset($value->device_mainboard)?$value->device_mainboard:'';
                        $result[$i]['mode'] = $value->mode;
                        $result[$i]['state'] = $value->state;
                        $result[$i]['created_time'] = $value->created_time;
                        $result[$i]['register_string'] = $value->register_string;
                    }else{
                        $result[$i]['state'] = @$value->state;
                        $result[$i]['created_time'] = $value->created_time;
                        $result[$i]['label'] = $value->device_name.'-'.$value->device_serial.'-'.$value->device_mainboard;
                        $result[$i]['value'] = $value->device_name;
                    }
                }
                return $result;
            }
        }
        return $result;
    }

}

if (!function_exists('setConfigDevice')) {

    function setConfigDevice($token, $deviceName, $deviceConfig, $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token) || empty($deviceConfig) || empty($deviceName)) {
            return array('success' => false, 'message' => 'error: token or device name or config');
        }
        $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_set_device_config') . $deviceName;
//        return $address;
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === HTTPS_REQUEST) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $curl->setHeader('x-access-token', $token);
        $result = $curl->put($address, array(
            'device-config' => $deviceConfig
        ));
        if ($curl->error) {
            //ghi log
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            return $result;
//            return array('success' => false, 'message' => $curl->errorCode . '-' . $curl->errorMessage);
        } elseif (empty($result)) {
            writeLog('error: dữ liệu trả về ko đúng');
            return array('success' => false, 'message' => 'dữ liệu trả về ko đúng');
        } else {
            return $result;
        }
        return $result;
    }

}

if (!function_exists('getListDevice_')) {

    function getListDevice_($address, $user, $pass, $curl, $type = 1) {
        $CI = & get_instance();
        $result = array();
        if (empty($user) || empty($pass)) {
            return $result;
        }
        if (empty($address)) {
            $address = mConfig('addr_authenticate');
        }
        if (empty($curl))
            $curl = new Curl();
        if ($type === 1) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $result = $curl->post($address, array(
            'username' => $user,
            'password' => $pass
        ));
        return $result;
    }

}

if (!function_exists('createDeviceConfig')) {

    function createDeviceConfig() {
        $result = new stdClass();
        $result->deviceName = '';
        $result->name = '';
        $result->otherConfig = new stdClass();
        $result->otherConfig->lang = 1;
        $result->otherConfig->train_road = array(0,0,0,0,0,0,0,0);
        $result->mainConfig = new stdClass();
        return $result;
    }

}

if (!function_exists('createDeviceMainConfig')) {

    function createDeviceMainConfig() {
        $result = new stdClass();
        $result->hour_off = '';
        $result->minute_on = '';
        $result->minute_off = '';
        $result->freq= '';
        $result->gt= '';
        $result->tv = '3';
        $result->gt= '';
        $result->tv = '3';
        $result->tx= array();
        $result->tsx= array();
        $result->tdbx= array();
        $result->tsdbx= array();
        return $result;
    }

}


if (!function_exists('createDeviceSubOtherConfig')) {

    function createDeviceSubOtherConfig() {
        $result = new stdClass();
        $result->hour_on = '';
        $result->hour_off = '';
        $result->minute_on = '';
        $result->minute_off = '';
        $result->hour_blink = '';
        $result->minute_blink = '';
        $result->so_pha = '';
        $result->option1 = array();
        $result->option2 = array();
        $result->strageties = '';
        $result->lang = 1;
        $result->train_road = array(0,0,0,0,0,0,0,0);
        return $result;
    }

}

if (!function_exists('startDevice')) {

    function startDevice($token, $deviceName, $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token) || empty($deviceName)) {
            return array('success' => false, 'message' => 'error: token or device name');
        }
        $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_device_start') . $deviceName;
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === HTTPS_REQUEST) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $curl->setHeader('x-access-token', $token);
        $result = $curl->put($address, array(
            'device-name' => $deviceName
        ));
        if ($curl->error) {
            //ghi log
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            return array('success' => false, 'message' => 'error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
        } elseif (empty($result)) {
            writeLog('error: dữ liệu trả về ko đúng');
            return array('success' => false, 'message' => 'dữ liệu trả về ko đúng');
        } else {
            return $result;
        }
        return $result;
    }

}

if (!function_exists('stopDevice')) {

    function stopDevice($token, $deviceName, $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token) || empty($deviceName)) {
            return array('success' => false, 'message' => 'error: token or device name');
        }
        $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_device_stop') . $deviceName;
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === HTTPS_REQUEST) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $curl->setHeader('x-access-token', $token);
        $result = $curl->put($address, array(
            'device-name' => $deviceName
        ));
        if ($curl->error) {
            //ghi log
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            return array('success' => false, 'message' => 'error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
        } elseif (empty($result)) {
            writeLog('error: dữ liệu trả về ko đúng');
            return array('success' => false, 'message' => 'dữ liệu trả về ko đúng');
        } else {
            return $result;
        }
        return $result;
    }

}

if (!function_exists('blinkDevice')) {

    function blinkDevice($token, $deviceName, $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token) || empty($deviceName)) {
            return array('success' => false, 'message' => 'error: token or device name');
        }
        $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_device_blink') . $deviceName;
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === HTTPS_REQUEST) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $curl->setHeader('x-access-token', $token);
        $result = $curl->put($address, array(
            'device-name' => $deviceName
        ));
        if ($curl->error) {
            //ghi log
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            return array('success' => false, 'message' => 'error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
        } elseif (empty($result)) {
            writeLog('error: dữ liệu trả về ko đúng');
            return array('success' => false, 'message' => 'dữ liệu trả về ko đúng');
        } else {
            return $result;
        }
        return $result;
    }

}

if (!function_exists('setTimeDevice')) {

    function setTimeDevice($token, $deviceName, $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token) || empty($deviceName)) {
            return array('success' => false, 'message' => 'error: token or device name');
        }
        $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_config_time_device') . $deviceName;
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === HTTPS_REQUEST) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $curl->setHeader('x-access-token', $token);
        $result = $curl->put($address);
        if ($curl->error) {
            //ghi log
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            return array('success' => false, 'message' => 'error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
        } elseif (empty($result)) {
            writeLog('error: dữ liệu trả về ko đúng');
            return array('success' => false, 'message' => 'dữ liệu trả về ko đúng');
        } else {
            return $result;
        }
        return $result;
    }

}

if (!function_exists('createUser')) {

    function createUser($token, $userInfo = array(), $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token) || empty($userInfo)||empty($userInfo['username'])||empty($userInfo['password'])||empty($userInfo['permisson'])) {
            return array('success' => false, 'message' => 'error: token or info user');
        }
        $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_create_user');
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === HTTPS_REQUEST) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        
        $curl->setOpt(CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        
        $curl->setHeader('x-access-token', $token);
        $result = $curl->post($address,$userInfo);
        if ($curl->error) {
            //ghi log
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            return array('success' => false, 'message' => 'error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
        } elseif (empty($result)) {
            writeLog('error: dữ liệu trả về ko đúng');
            return array('success' => false, 'message' => 'dữ liệu trả về ko đúng');
        } else {
            return $result;
        }
        return $result;
    }

}

if (!function_exists('deleteUser')) {

    function deleteUser($token, $userInfo = array(), $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token) || empty($userInfo)||empty($userInfo['username'])) {
            return array('success' => false, 'message' => 'error: token or info user');
        }
        $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_create_user');
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === HTTPS_REQUEST) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        
        $curl->setOpt(CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        
        $curl->setHeader('x-access-token', $token);
        $result = $curl->delete($address,$userInfo);
        if ($curl->error) {
            //ghi log
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            return array('success' => false, 'message' => 'error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
        } elseif (empty($result)) {
            writeLog('error: dữ liệu trả về ko đúng');
            return array('success' => false, 'message' => 'dữ liệu trả về ko đúng');
        } else {
            return $result;
        }
        return $result;
    }

}

if (!function_exists('setOrderDevice')) {

    function setOrderDevice($token, $name, $mode, $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token)||!is_numeric($mode)||empty($name)) {
            return array('success' => false, 'message' => 'error: token or mode or name');
        }
        $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_set_device_order').$name;
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === HTTPS_REQUEST) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $curl->setHeader('x-access-token', $token);
//        $curl->setHeader('Content-Type','application/x-www-form-urlencoded');
        $result = $curl->put($address,array(
            'run-mode'=>$mode
        ));
        if ($curl->error) {
            //ghi log
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            return array('success' => false, 'message' => 'error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
        } elseif (empty($result)) {
            writeLog('error: dữ liệu trả về ko đúng');
            return array('success' => false, 'message' => 'dữ liệu trả về ko đúng');
        } else {
            return $result;
        }
    }

}

if (!function_exists('DeviceInfo')) {

    function DeviceInfo($token, $data, $type, $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token)||empty($data)||empty($type)) {
            return array('success' => false, 'message' => 'error: token or data or type');
        }
        $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_curd_device');
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === HTTPS_REQUEST) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $curl->setHeader('x-access-token', $token);
        //add
        if($type==1){
            $result = $curl->post($address,$data
        );
            // delete
        }else if($type==2){
            $curl->setOpt(CURLOPT_CUSTOMREQUEST, "DELETE");
            $result = $curl->delete($address,array(
                'device-name'=> $data['name']
            ));
            //get
        }else if($type==3){
            $result = $curl->get($address,array(
                'device-name'=> $data['name']
            ));
        }
        else if($type==4){
            $result = $curl->put($address,$data);
        }
        
        if ($curl->error) {
            //ghi log
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            return array('success' => false, 'message' => 'error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
        } elseif (empty($result)) {
            writeLog('error: dữ liệu trả về ko đúng');
            return array('success' => false, 'message' => 'dữ liệu trả về ko đúng');
        } else {
            return $result;
        }
    }

}

if (!function_exists('UserInfo')) {

    function UserInfo($token, $data, $type, $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token)||empty($data)||empty($type)) {
            return array('success' => false, 'message' => 'error: token or data or type');
        }
        $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_curd_user');
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === HTTPS_REQUEST) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $curl->setHeader('x-access-token', $token);
        //add
        if($type==1){
            $result = $curl->post($address,$data
            );
            // delete
        }else if($type==2){
            $curl->setOpt(CURLOPT_CUSTOMREQUEST, "DELETE");
            $result = $curl->delete($address,array(
                'device-name'=> $data['name']
            ));
            //get info
        }else if($type==3){
            $result = $curl->get($address,array(
                'device-name'=> $data['name']
            ));
        }
        //get list
        else if($type==4){
            $result = $curl->get($address);
        }

        if ($curl->error) {
            //ghi log
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            return array('success' => false, 'message' => 'error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
        } elseif (empty($result)) {
            writeLog('error: dữ liệu trả về ko đúng');
            return array('success' => false, 'message' => 'dữ liệu trả về ko đúng');
        } else {
            return $result;
        }
    }

}
?>
