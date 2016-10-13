<?php

require APPPATH . 'third_party\php-curl\vendor\autoload.php';
require APPPATH . 'third_party\php-cache\vendor\autoload.php';

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
            return $result;
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
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            $result->success = false;
            $result->message = $curl->errorCode . '-' . $curl->errorMessage;
            return $result;
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

    function getDeviceConfig($token, $name, $curl = '', $typeRequest = HTTPS_REQUEST) {
        $result = new stdClass();
        if (empty($token) || empty($name)) {
            return $result;
        }
        $address = mConfig('host_server') . ':' . mConfig('port_server') . mConfig('addr_device_config') . $name;
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
            //ghi log
            writeLog('error: ' . $curl->errorCode . ': ' . $curl->errorMessage);
            $result->success = FALSE;
            $result->message = $curl->errorCode . '-' . $curl->errorMessage;
            return $result;
        }
        return $result;
    }

}

if (!function_exists('writeLog')) {

    function writeLog($msg, $type = 1) {
        $file = APPPATH . '..\log\debug.txt';
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

    function getListDevice($token, $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token)) {
            return $result;
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
                        'long' => $value->modem_long,
                        'lat' => $value->modem_lat,
                        'name' => $value->device_name
                    );
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
            return $result;
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

if (!function_exists('startDevice')) {

    function startDevice($token, $deviceName, $curl = '', $typeResponse = RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token) || empty($deviceName)) {
            return $result;
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
            return $result;
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
            return $result;
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
            return $result;
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
?>
