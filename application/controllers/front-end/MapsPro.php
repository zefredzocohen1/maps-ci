<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MapsPro extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
//        $data['deviceInfo'] = $this->db->from('modem_info')->get()->result();
        $data['devicesInfo'] = array(
            array('lat'=>21.029692,'lng'=>105.801643,'title'=>'Nga tu Cau Giay'),
            array('lat'=>21.036732,'lng'=>105.779617,'title'=>'Nga tu Xuan Thuy, Pham Hung'),
            array('lat'=>21.030326,'lng'=>105.787996,'title'=>'Nga tu Duy Tan, Tran Thai Tong')
        );
        $data['temp'] = 'front-end/maps/index';
//        $data['debug'] = 'front-end/block/view_maker';
        $this->load->view('front-end/template/master',$data);
    }
    public function search(){
        echo json_encode(array(1=>1));
        exit;
    }

}
