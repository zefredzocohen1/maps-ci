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
        $fileCache = mConfig('fileCache');
        
        $key = "product_page";
        $CachedString = $fileCache->getItem($key);

        $your_product_data = array('aaaa');

        if (is_null($CachedString->get())) {
            $CachedString->set($your_product_data)->expiresAfter(5);//in seconds, also accepts Datetime
            $fileCache->save($CachedString); // Save the cache item just like you do with doctrine and entities

            echo "FIRST LOAD // WROTE OBJECT TO CACHE // RELOAD THE PAGE AND SEE // ";
            print_r( $CachedString->get());

        } else {
            echo "READ FROM CACHE // ";
            echo $CachedString->get()[0];// Will prints 'First product'
        }
        
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
        echo '<pre>';
        print_r($result);
        echo '</pre>';
        exit;
        if(!empty($result)){
            echo json_encode(array('success'=>true,'message'=>$this->load->view('front-end/block/view_maker',array('data'=>$result),TRUE)));
        }else{
            echo json_encode(array('success'=>true,'message'=>$this->load->view('front-end/block/view_maker',$result,TRUE)));
        }
    }
    
    public function update(){
        
    }

    public function test(){
    $jsonData = '[{
"deviceName": "Dev02",
"name": "* CONG TY PARAGON **",
"otherConfig": {
    "hour_on": 10,
    "hour_off": 10,
    "minute_on": 10,
    "minute_off": 10,
    "hour_blink": 10,
    "minute_blink": 10,
    "so_pha": 4,
    "option1": [1, 2, 3, 4, 5, 6, 7, 8],
    "option2": [1, 2, 3, 4, 5, 6, 7, 8],
    "strageties": ["A", "A", "A", "A", "A", "A", "A"],
    "lang": 1,
    "train_road": [1, 1, 1, 1, 1, 1, 1, 1]
},
"mainConfig": {
    "stragetiesA": [null, {
            "hour_on": 20,
            "hour_off": 20,
            "minute_on": 30,
            "minute_off": 30,
            "freq": 10,
            "gt": 10,
            "tv": 10,
            "tx": [1, 2, 3, 4, 5, 6, 7, 8],
            "tsx": [1, 2, 3, 4, 5, 6, 7, 8],
            "tdbx": [1, 2, 3, 4, 5, 6, 7, 8],
            "tsdbx": [1, 2, 3, 4, 5, 6, 7, 8]
        }, null, null, null, null],
    "stragetiesB": [null, null, null, null, null, null],
    "stragetiesC": [null, null, null, null, null, null],
    "stragetiesD": [null, null, null, null, null, null]
}
}]';
    echo json_decode($jsonData);
}

}
