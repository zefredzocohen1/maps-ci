<?php

if (!function_exists('onlyCharacter')) {

    function onlyCharacter($str,$type=1) {
        if($type==1)$str = preg_replace('/[^a-zA-Z0-9. ]/', '', $str);
        if($type==2)$str = preg_replace('/[^0-9 .-]/', '', $str);
        if($type==3)$str = preg_replace('/[^a-zA-Z0-9. \-\#_]/', '', $str);
        return ($str);
    }

}

if (!function_exists('scGetName')) {

    function scGetName($str) {
        $CI = & get_instance();
        $str = onlyCharacter($CI->security->xss_clean(trim($str)));
        return ($str);
    }

}

if (!function_exists('scGetNumber')) {

    function scGetNumber($str) {
        $CI = & get_instance();
        $str = onlyCharacter($CI->security->xss_clean(trim($str)),2);
        return ($str);
    }

}

if (!function_exists('scGetSerial')) {

    function scGetSerial($str) {
        $CI = & get_instance();
        $str = onlyCharacter($CI->security->xss_clean(trim($str)),3);
        return ($str);
    }

}


if (!function_exists('pre')) {

    function pre($str) {
        echo '<pre>';
        print_r($str);
        echo '</pre>';
    }

}

