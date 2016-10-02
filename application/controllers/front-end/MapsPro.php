<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . 'third_party\vendor\autoload.php';

use \Curl\Curl;

class MapsPro extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
//        $data = array();
////        $data['deviceInfo'] = $this->db->from('modem_info')->get()->result();
        $userInfo = array(
            'username'=>'admin',
            'password'=>'admin'
        );
        mSetSession($userInfo);
//        $data['devicesInfo'] = array(
//            array('lat' => 21.029692, 'lng' => 105.801643, 'title' => 'Nga tu Cau Giay', 'maps_id' => 1),
//            array('lat' => 21.036732, 'lng' => 105.779617, 'title' => 'Nga tu Xuan Thuy, Pham Hung', 'maps_id' => 2),
//            array('lat' => 21.030326, 'lng' => 105.787996, 'title' => 'Nga tu Duy Tan, Tran Thai Tong', 'maps_id' => 3)
//        );
        $curl = new Curl();
        $result = getAuthenticate(mGetSession('username'), mGetSession('password'), $curl);
        if(!empty($result)){
            mSetSession(array('token'=>$result));
        }
        $list = getListDevice(mGetSession('token'),$curl);
        $data['devicesInfo'] = !empty($list)?$list:array();
        $data['temp'] = 'front-end/maps/index';
        $this->load->view('front-end/template/master', $data);
    }

    public function search() {
        header("Content-Type: application/json", true);
        $data = array();
        $name=scGetName($this->input->post('name'));
        $curl = new Curl();
        $result = getDeviceConfig(mGetSession('token'), $name, $curl);
        if(!empty($result)){
            echo json_encode(array('success'=>true,'message'=>$this->load->view('front-end/block/view_maker',$result,TRUE)));
        }else{
//            echo json_encode(array('success'=>false,'message'=>'error'));
            echo json_encode(array('success'=>true,'message'=>$this->load->view('front-end/block/view_maker',$result,TRUE)));
        }
    }

}
