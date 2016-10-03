<?php
require APPPATH . 'third_party\php-cache\vendor\autoload.php';
use phpFastCache\CacheManager;


function load_cache(){
    $CI = &get_instance();
    CacheManager::setup(array(
        "path" => APPPATH.'logs',
    ));
    $fileCache = CacheManager::getInstance('files');
    $CI->config->set_item('fileCache',$fileCache);
}