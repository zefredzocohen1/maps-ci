<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH.'third_party\vendor\autoload.php';

use \Curl\Curl;

class MapsPro extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
//        $data = array();
////        $data['deviceInfo'] = $this->db->from('modem_info')->get()->result();
//        $data['devicesInfo'] = array(
//            array('lat'=>21.029692,'lng'=>105.801643,'title'=>'Nga tu Cau Giay','maps_id'=>1),
//            array('lat'=>21.036732,'lng'=>105.779617,'title'=>'Nga tu Xuan Thuy, Pham Hung','maps_id'=>2),
//            array('lat'=>21.030326,'lng'=>105.787996,'title'=>'Nga tu Duy Tan, Tran Thai Tong','maps_id'=>3)
//        );


        $curl = new Curl();
        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $curl->setOpt(CURLOPT_SSL_VERIFYHOST, FALSE);
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, 0);
        $curl->setOpt(CURLOPT_VERBOSE, 1);
        $curl->setOpt(CURLOPT_TIMEOUT, 4000);
        $curl->post('https://128.199.193.255:8000/api/authenticate', array(
            'username' => 'admin',
            'password' => 'admin'
        ));
        if ($curl->error) {
            echo 1;
            echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage;
        } else {
            echo 2;
            echo 'Response:' . "\n";
            var_dump($curl->response);
        }

        $curl->setHeader('x-access-token', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6ImFkbWluIiwiYWRkcmVzcyI6Ijo6ZmZmZjoxMTMuMTYyLjY1LjE1NCIsImlhdCI6MTQ3NTMzNzA5NiwiZXhwIjoxNDc1NDIzNDk2fQ.Qe5mXnLGXA0DM_eh3qaZqt_dhNefGJgHXSUClzqK4lI');
        $list = $curl->get('https://128.199.193.255:8000/api/device-list');
        echo '<br/><br/>';
        echo '<pre>';
        print_r($list);
        echo '</pre>';
        die;
        $data['temp'] = 'front-end/maps/index';
//        $data['debug'] = 'front-end/block/view_maker';
        $this->load->view('front-end/template/master', $data);
    }

    public function search() {
        echo json_encode(array(1 => 1));
        exit;
    }

}
