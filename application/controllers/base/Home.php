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
        $list = getListDevice(mGetSession('token'),2);
//        pre($list);
        $data['devicesInfo'] = !empty($list) ? $list : array();
        $data['plugin'] = array(
            'js'=>array('jquery-ui-1.10.4.min.js','plugins/clockpicker/clockpicker.js','plugins/touchspin/jquery.bootstrap-touchspin.min.js'),
            'css'=>array('plugins/jquery-ui/jquery-ui.min.css','plugins/clockpicker/clockpicker.css','plugins/touchspin/jquery.bootstrap-touchspin.min.css','marker-style.css')
        );
        $data['temp'] = 'front-end/maps/index';
        $this->load->view('front-end/template/master', $data);
    }

}
