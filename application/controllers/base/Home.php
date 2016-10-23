<?php

require APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'base' . DIRECTORY_SEPARATOR . 'BaseController.php';

use phpFastCache\CacheManager;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if(!$this->checkLogin()){
            redirect('User/login');
        }
        $fileCache = mConfig('fileCache');
        $list = getListDevice(mGetSession('token'));
        $data['devicesInfo'] = !empty($list) ? $list : array();
        $data['plugin'] = array(
            'js'=>array('plugins/clockpicker/clockpicker.js'),
            'css'=>array('plugins/clockpicker/clockpicker.css')
        );
        $data['temp'] = 'front-end/maps/index';
        $this->load->view('front-end/template/master', $data);
    }

}
