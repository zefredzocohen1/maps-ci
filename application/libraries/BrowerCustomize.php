<?php

class BrowerCustomize {

    var $CI = '';
    var $_brower = '';

    function __construct() {
        $this->CI = & get_instance();
    }

    function upload($upload_path = '', $file_name = '') {

        $data = array();
        if ($_FILES[$file_name] !== NULL) {
            $config = $this->config($upload_path);

            $this->CI->load->library('upload', $config);

            if ($this->CI->upload->do_upload($file_name)) {

                $data['data_upload'] = $this->CI->upload->data();
            } else {

                $data['error_upload'] = $this->CI->upload->display_errors();
            }
        }
        return $data;
    }

    function upload_files($upload_path = '', $file_name = '') {

        $data = array();
        if ($_FILES[$file_name] !== NULL) {

            $config = $this->config($upload_path);
            $file = $_FILES[$file_name];
            $count = count($file['name']);
            for ($i = 0; $i <= $count - 1; $i++) {

                $_FILES['userfile']['name'] = $file['name'][$i];
                $_FILES['userfile']['type'] = $file['type'][$i];
                $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];
                $_FILES['userfile']['error'] = $file['error'][$i];
                $_FILES['userfile']['size'] = $file['size'][$i];

                $this->CI->load->library('upload', $config);
                if ($this->CI->upload->do_upload()) {

                    $dataImage = $this->CI->upload->data();
                    $data[] = $upload_path . '/' . $dataImage['file_name'];
                } else {
                    if ($this->CI->upload->display_errors()) {
                        echo $this->CI->upload->display_errors();
                        return false;
                    }
                }
            }
        }
        return $data;
    }

    function setConfig($upload_path = array()) {

        $config = array();
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '4000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';
        return $config;
    }

    function getConfig() {
        return $this->_brower;
    }

}

?> 
