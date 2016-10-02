<?php

require APPPATH . 'third_party\vendor\autoload.php';

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
        }else return FALSE;
    }

}

if (!function_exists('mGetSession')) {

    function mGetSession($item) {
        $CI = & get_instance();
        $result = FALSE;
        if (!empty($item)) {
            return $CI->session->userdata($item);
        }else return FALSE;
    }

}

if (!function_exists('getAuthenticate')) {

    function getAuthenticate($user, $pass, &$curl, $typeResponve=1,$typeRequest = HTTPS_REQUEST) {
        $CI = & get_instance();
        $result = array();
        if (empty($user) || empty($pass)) {
            return $result;
        }
        $address = $CI->config->item('host_server').':'.$CI->config->item('port_server').mConfig('addr_authenticate');
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
        if($curl->error){
            //ghi log
            writeLog('error: '.$curl->errorCode.': '.$curl->errorMessage);
            return array();
        }elseif(empty ($result)||  get_class($result)!=='stdClass'){
            writeLog('error: dữ liệu trả về ko đúng');
            return array();
        }else{
            return !@empty($result->token)?$result->token:  curl_close($curl)&&array();
        }
        return $result;
    }

}

if (!function_exists('getDeviceConfig')) {

    function getDeviceConfig($token, $name,$curl, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token)||empty($name)) {
            return $result;
        }
        $address =mConfig('host_server').':'.mConfig('port_server').mConfig('addr_device_config').$name;
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
        if($curl->error){
            //ghi log
            return array();
        }
        return $result;
    }

}

if (!function_exists('writeLog')) {

    function writeLog($msg, $type=1) {
        $CI = & get_instance();
        $file = fopen(APPPATH.'..\log\debug.txt', 'w');
        $_message = date('Y:m:d H:i:s');
        $_message.=' '.print_r($msg,true);
        fwrite($file, $_message);
        fclose($file);
    }

}

if (!function_exists('getListDevice')) {

    function getListDevice($token, $curl, $typeResponse=RESPON_JSON, $typeRequest = HTTPS_REQUEST) {
        $result = array();
        if (empty($token)) {
            return $result;
        }
        $address = mConfig('host_server').':'.mConfig('port_server').mConfig('addr_device_list');
        if (empty($curl))
            $curl = new Curl();
        if ($typeRequest === 1) {
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, mConfig('curl_connect_timeout'));
        $curl->setOpt(CURLOPT_VERBOSE, mConfig('curl_verbose'));
        $curl->setOpt(CURLOPT_TIMEOUT, mConfig('curl_timeout'));
        $curl->setHeader('x-access-token', $token);
        $result = $curl->get($address);
        if($curl->error){
            //ghi log
            writeLog('error: '.$curl->errorCode.': '.$curl->errorMessage);
            return array();
        }elseif(empty ($result)){
            writeLog('error: dữ liệu trả về ko đúng');
            return array();
        }else{
            if(!empty($result)&&$typeResponse==RESPON_JSON){
                foreach ($result as $i=>$value){
                    $result[$i] = array(
                        'long'=>$value->modem_long,
                        'lat'=>$value->modem_lat,
                        'name'=>$value->device_name
                    );
                }
                return $result;
            }
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
?>
