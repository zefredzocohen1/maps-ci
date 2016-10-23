<?php

require APPPATH . 'third_party'.DIRECTORY_SEPARATOR.'php-cache'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
require APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'base' . DIRECTORY_SEPARATOR . 'BaseController.php';

use phpFastCache\CacheManager;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Device extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $list = getListDevice(mGetSession('token'));
        if(@$list['success']==FALSE){
            $data['listDevice'] = $list;
        }
        $data['temp'] = 'front-end/device/index';
        $data['title'] = 'Đăng nhập';
        $data['plugin'] = array(
            'js'=>array('plugins/metisMenu/jquery.metisMenu.js','plugins/slimscroll/jquery.slimscroll.min.js','plugins/jeditable/jquery.jeditable.js','plugins/dataTables/datatables.min.js','inspinia.js', 'plugins/pace/pace.min.js'),
            'css'=>array('plugins/dataTables/datatables.min.css')
        );
        $this->load->view('front-end/template/master',$data);
    }
    
    public function add(){
        $data = array();
        if($this->input->post()){
            $nameDev = !empty(scGetName($this->input->post('nameDev')))?scGetName($this->input->post('nameDev')):'';
            $serialDev = !empty(scGetSerial($this->input->post('serialDev')))?scGetSerial($this->input->post('serialDev')):'';
            $mainboardDev = !empty(scGetSerial($this->input->post('mainboardDev')))?scGetSerial($this->input->post('mainboardDev')):'';
            $registerStringDev = !empty(scGetName($this->input->post('registerStringDev')))?scGetName($this->input->post('registerStringDev')):'';
            $simNumberDev = !empty(scGetNumber($this->input->post('simNumberDev')))?scGetNumber($this->input->post('simNumberDev')):'';
            $stateDev = !empty(scGetNumber($this->input->post('stateDev')))?scGetNumber($this->input->post('stateDev')):'';
            $longDev = !empty(scGetNumber($this->input->post('longDev')))?scGetNumber($this->input->post('longDev')):'';
            $latDev = !empty(scGetNumber($this->input->post('latDev')))?scGetNumber($this->input->post('latDev')):'';
            $descriptionDev = !empty(scGetName($this->input->post('descriptionDev')))?scGetName($this->input->post('descriptionDev')):'';
            $data = array(
                'name'=>$nameDev,
                'serial'=>$serialDev,
                'mainboard'=> $mainboardDev,
                'register-string'=> $registerStringDev,
                'sim-number'=> $simNumberDev,
                'state'=>  $stateDev,
                'lng'=> $longDev,
                'lat'=> $latDev,
                'description'=> $descriptionDev,
            );
            $result = DeviceInfo(mGetSession('token'), $data, '1');
            if(@$result->success==1){
                $this->session->set_flashdata(array(
                    'type'=>1,
                    'message'=>'Đã thêm thành công thiết bị'
                ));
                redirect(base_url().'Device/index');
            }else{
                $this->session->set_flashdata(array(
                    'type'=>2,
                    'message'=>'Thêm thiết bị thất bại'
                ));
            }
        }
        $data['plugin'] = array(
            'css'=>array('plugins/steps/jquery.steps.css'),
            'js'=>array(
                'inspinia.js',
                'plugins/pace/pace.min.js',
                
                
                'plugins/staps/jquery.steps.min.js',
                'plugins/validate/jquery.validate.min.js')
        );
        $data['temp'] = 'front-end/device/add';
        $this->load->view('front-end/template/master', $data);
    }
    
    public function search() {
        header("Content-Type: application/json", true);
        $fileCache = mConfig('fileCache');
        $data = array();
        $result2 = new stdClass();
        $name = scGetName($this->input->post('name'));
        $listDivice = getListDevice(mGetSession('token'));
        
        $state = -1;
        if(!empty($listDivice)){
            $deviceNameCache = $fileCache->getItem($name);
            foreach ($listDivice as $i=>$device){
               if($device['name']==$name ){
                   $state = $device['state'];
                   break;
               }
            }
            if($state!=-1){
                    $result = getDeviceConfig(mGetSession('token'), $name);
                    if (empty($result) || @$result->success === false) {
                        echo json_encode(array('th'=>1,'success' => true, 'message' => $this->load->view('front-end/block/view_maker', array('data' => $result), TRUE)));
                    } else {
                        $result2->config = $result;
                        echo json_encode(array('th'=>$result2,'success' => true, 'message' => $this->load->view('front-end/block/view_maker', array('data' => $result2), TRUE)));
                    }
            }
//            elseif($state==0){
//                $fileCache->deleteItem($name);
//                echo json_encode(array('success'=>true,'message'=>$this->load->view('front-end/block/view_maker', array('data' => array('test')), TRUE)));
//            }
        }
        exit;
    }
    
    public function saveConfig() {
        $fileCache = mConfig('fileCache');
        $data = $this->input->post('data');
        $value = array_values($data);
        $config = createDeviceConfig();
        $subOtherConfig = createDeviceSubOtherConfig();
        $config->deviceName = $this->input->post('deviceName');
        foreach ($value as $i => $row) {
            if ($row['name'] == 'intersection_name') {
                $config->name = $row['value'];
            } elseif ($row['name'] == 'config_device_stragetiesA') {
                $config->mainConfig->stragetiesA = json_decode($row['value']);
            } elseif ($row['name'] == 'config_device_stragetiesB') {
                $config->mainConfig->stragetiesB = json_decode($row['value']);
            } elseif ($row['name'] == 'config_device_stragetiesC') {
                $config->mainConfig->stragetiesC = json_decode($row['value']);
            } elseif ($row['name'] == 'config_device_stragetiesD') {
                $config->mainConfig->stragetiesD = json_decode($row['value']);
            } elseif (preg_match('/chien\-luoc\-ngay\[([0-8])\]/', $row['name'], $_number)) {
                $subOtherConfig->strageties[$_number[1] - 2] = mConfig('chien-luoc-ngay')[intval($row['value'])];
            } elseif (preg_match('/option1\_\[([0-8])\]/', $row['name'], $_number)) {
                $subOtherConfig->option1[$_number[1]] = intval($row['value']);
            } elseif (preg_match('/option2\_\[([0-8])\]/', $row['name'], $_number)) {
                $subOtherConfig->option2[$_number[1]] = intval($row['value']);
            } elseif ($row['name'] == 'otherStartTime') {
                $time = explode(':', $row['value']);
                $subOtherConfig->hour_on = @ intval($time[0]);
                $subOtherConfig->minute_on = @ intval($time[1]);
            } elseif ($row['name'] == 'otherEndTime') {
                $time = explode(':', $row['value']);
                $subOtherConfig->hour_off = @ intval($time[0]);
                $subOtherConfig->minute_off = @ intval($time[1]);
            } elseif ($row['name'] == 'otherBlinkTime') {
                $time = explode(':', $row['value']);
                $subOtherConfig->hour_blink = @ intval($time[0]);
                $subOtherConfig->minute_blink = @ intval($time[1]);
            } elseif ($row['name'] == 'otherAlpha') {
                $subOtherConfig->so_pha = intval($row['value']);
            }
        }
        $config->otherConfig = $subOtherConfig;
        $result = setConfigDevice(mGetSession('token'), $config->deviceName, json_encode($config));
        if (@$result->success) {
            $tmp = new stdClass();
            $tmp->config = $config;
            $deviceNameCache = $fileCache->getItem($config->deviceName);
            $deviceNameCache->set($tmp)->expiresAfter(EXPIRES_CACHE_DEVICE);
            $fileCache->save($deviceNameCache);
            echo json_encode(array('success'=>true,'message'=>'Thiết bị đã được ghi'));
            exit;
        }
        echo json_encode(array('success'=>false,'message'=>$result));
        exit;
    }
    
    public function startDevice() {
        $deviceName = $this->input->post('deviceName');
        $result = startDevice(mGetSession('token'), $deviceName);
        if (empty($result)) {
            echo json_encode(array(
                'success' => false,
                'message' => 'Lỗi trong việc kết nối đến server'
            ));
        } else {
            echo json_encode($result);
        }
        exit;
    }

    public function stopDevice() {
        $deviceName = $this->input->post('deviceName');
        $result = stopDevice(mGetSession('token'), $deviceName);
        if (empty($result)) {
            echo json_encode(array(
                'success' => false,
                'message' => 'Lỗi trong việc kết nối đến server'
            ));
        } else {
            echo json_encode($result);
        }
        exit;
    }

    public function downloadConfigDevice() {
        if (empty(mGetSession('token'))) {
            echo json_encode(array('success' => false, 'error: token'));
            exit;
        }
        $name = scGetName($this->input->post('deviceName'));
        $result = getDeviceConfig(mGetSession('token'), $name,2);
        if (empty($result)||@$result->success===false) {
            echo json_encode(array('success' => FALSE, 'message' => 'error'));
        } else {
            $data = array();
            $data['stragetiesA'] = $result->mainConfig->stragetiesA;
            $data['stragetiesB'] = $result->mainConfig->stragetiesB;
            $data['stragetiesC'] = $result->mainConfig->stragetiesC;
            $data['stragetiesD'] = $result->mainConfig->stragetiesD;
            $data['otherConfig'] = $result->otherConfig;
            $data['deviceName'] = $result->name;
            echo json_encode(array('success'=>TRUE,'message'=>  $data));
//            echo json_encode(array('success' => true, 'message' => $this->load->view('front-end/block/view_maker', array('data' => $result), TRUE)));
        }
    }

    public function blinkDevice() {
        $deviceName = $this->input->post('deviceName');
        $result = blinkDevice(mGetSession('token'), $deviceName);
        if (empty($result)) {
            echo json_encode(array(
                'success' => false,
                'message' => 'Lỗi trong việc kết nối đến server'
            ));
        } else {
            echo json_encode($result);
        }
        exit;
    }

    public function setTimeDevice() {
        $deviceName = $this->input->post('deviceName');
        $result = setTimeDevice(mGetSession('token'), $deviceName);
        if (empty($result)) {
            echo json_encode(array(
                'success' => false,
                'message' => 'Lỗi trong việc kết nối đến server'
            ));
        } else {
            echo json_encode($result);
        }
        exit;
    }
    
    public function setOrderDevice(){
        $deviceName = !empty(scGetName($this->input->post('deviceName')))?scGetName($this->input->post('deviceName')):'';
        $orderType = !empty(scGetName($this->input->post('orderType')))?  intval(scGetName($this->input->post('orderType'))):-1;
        if(empty($deviceName)||$orderType<0||$orderType>8){
            echo json_encode(array('success'=>FALSE,'message'=>'Lỗi tên thiết bị hoặc trạng thái ưu tiên'));
            exit;
        }
        $result = setOrderDevice(mGetSession('token'), $deviceName, $orderType);
        if (empty($result)) {
            echo  json_encode(array(
                'success' => false,
                'message' => 'Lỗi trong việc kết nối đến server'
            ));
        } else {
            echo json_encode($result);
        }
        exit;
    }
    
    public function delete(){
        $nameDev = !empty(scGetName($this->input->post('deviceName')))?scGetName($this->input->post('deviceName')):'';
        if(!empty($nameDev)){
            $result = DeviceInfo(mGetSession('token'), array('name'=>$nameDev), 2);
            echo json_encode($result);
        }else{
            echo json_encode(array('success'=>false,'message'=>'tên thiết bị đang để trống'));
        }
        exit;
    }

    public function getDeviceInfo(){
        $deviceName = $this->input->post('deviceName');
        $result = DeviceInfo(mGetSession('token'),array('name'=>$deviceName),3);
        if(empty($result->success)||@$result->success==false){
            $result->success = true;
            $result->id='';
            echo json_encode($result);
        }else{
            echo json_encode($result);
        }
        exit;
    }

    public function updateInfo(){
        if($this->input->post()){
            $data = array();
            $data = array(
                'name' => scGetName($this->input->post('nameDev')),
                'serial' => scGetSerial($this->input->post('serialDev')),
                'mainboard' => scGetSerial($this->input->post('mainboardDev')),
                'lat' => scGetNumber($this->input->post('latDev')),
                'lng' => scGetNumber($this->input->post('longDev')),
                'register-string' => scGetSerial($this->input->post('registerStringDev')),
                'sim-number' => scGetSerial($this->input->post('simNumberDev')),
                'state' => scGetNumber($this->input->post('stateDev')),
                'description' => scGetName($this->input->post('descriptionDev')),
            );
            $result = DeviceInfo(mGetSession('token'),$data,4);
            $this->session->set_flashdata(array(
                    'type'=>1,
                    'message'=>'Cập nhật thông tin thiết bị thành công')
            );
        }else{
            $this->session->set_flashdata(array(
                    'type'=>2,
                    'message'=>'Gửi dữ liệu sai')
            );

        }
        redirect(base_url().'Device/index');
    }
}
