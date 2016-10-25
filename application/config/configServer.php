<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//adding config items.
$config['host_server'] = 'https://128.199.193.255';
$config['port_server'] = 8000;
$config['addr_authenticate'] = '/api/authenticate';
$config['addr_device_list'] = '/api/device-list';
$config['addr_device_start'] = '/api/start-device?device-name=';
$config['addr_device_stop'] = '/api/stop-device?device-name=';
$config['addr_device_blink'] = '/api/blink-device?device-name=';
$config['addr_device_serial'] = '/api/device-serial?device-name=';
$config['addr_get_device_id'] = '/api/device-id?device-name=';
$config['addr_device_config'] = '/api/device-config?device-name=';
$config['addr_device_config_db'] = '/api/device-config-db?device-name=';
$config['addr_set_device_config'] = '/api/config-device?device-name=';
$config['addr_config_time_device'] = '/api/config-time?device-name=';
$config['addr_config_name_device'] = '/api/config-name?device-name=';
$config['addr_config_device_mode'] = '/api/config-device-mode?device-name=';
$config['addr_set_device_order'] = '/api/config-device-mode?device-name=';
$config['addr_curd_device'] = '/api/device-info';
$config['addr_curd_user'] = '/api/users';
$config['addr_create_user'] = 'api/users';
$config['curl_connect_timeout'] = 5;
$config['curl_verbose'] = 1;
$config['curl_timeout'] = 10;// 4s
$config['CURLOPT_TIMEOUT_MS'] =  2000;
$config['type_flash_data'] = array(
    'success'=>1,
    'danger'=>2,
    'info'=>3,
    'warning'=>4
);

$config['role'] = array(
    'user'=>1,
    'admin'=>2,
);

$config['nameCache'] = array(
    'token'=>'ccToken',
    'listDivice'=>'ccListDivice',
    
);

$config['DeviceInfo'] = array(
    'device_name'=>'nameDev',
    'sim_number'=>'simNumberDev',
    'device_serial'=>'serialDev',
    'device_mainboard'=>'mainboardDev',
    'state'=>'stateDev',
    'description'=>'descriptionDev',
    'register_string'=>'registerStringDev',
    'latitude'=>'latDev',
    'longitude'=>'longDev'
);

