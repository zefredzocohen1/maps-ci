<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//adding config items.
$config['host_server'] = 'https://128.199.193.255';
$config['port_server'] = 8000;
$ci = &get_instance();
$config['addr_authenticate'] = '/api/authenticate';
$config['addr_device_list'] = '/api/device-list';
$config['addr_device_start'] = '/api/start-device?device-name=';
$config['addr_device_stop'] = '/api/stop-device?device-name=';
$config['addr_device_blink'] = '/api/blink-device?device-name=';
$config['addr_device_serial'] = '/api/device-serial?device-name=';
$config['addr_device_id'] = '/api/device-id?device-name=';
$config['addr_device_config'] = '/api/device-config?device-name=';
$config['curl_connect_timeout'] = 5;
$config['curl_verbose'] = 1;
$config['curl_timeout'] = 4000;// 4s

