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
//        pre($data);exit;
        $data['temp'] = 'front-end/maps/index';
        $this->load->view('front-end/template/master', $data);
    }

}
