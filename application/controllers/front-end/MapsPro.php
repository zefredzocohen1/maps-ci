<?php
require APPPATH . 'third_party\php-cache\vendor\autoload.php';
use phpFastCache\CacheManager;
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use \Curl\Curl;

class MapsPro extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $userInfo = array(
            'username'=>'admin',
            'password'=>'admin'
        );
        mSetSession($userInfo);
        $result = getAuthenticate(mGetSession('username'), mGetSession('password'));
        if(!empty($result)){
            mSetSession(array('token'=>$result));
        }
        $list = getListDevice(mGetSession('token'));
        $data['devicesInfo'] = !empty($list)?$list:array();
        $data['temp'] = 'front-end/maps/index';
        $this->load->view('front-end/template/master', $data);
    }

    public function search() {
        header("Content-Type: application/json", true);
        $data = array();
        $name=scGetName($this->input->post('name'));
        $curl = new Curl();
        $result = getDeviceConfig(mGetSession('token'), $name);
        if(!empty($result)){
            echo json_encode(array('success'=>true,'message'=>$this->load->view('front-end/block/view_maker',array('data'=>$result),TRUE)));
        }else{
            echo json_encode(array('success'=>true,'message'=>$this->load->view('front-end/block/view_maker',$result,TRUE)));
        }
    }

}
