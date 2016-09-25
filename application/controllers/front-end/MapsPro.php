<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MapsPro extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $data['temp'] = 'front-end/maps/index';
        $data['test'] = 'aaaa';
        $this->load->view('front-end/template/master',$data);
    }

}
