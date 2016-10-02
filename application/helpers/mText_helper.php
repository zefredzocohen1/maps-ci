<?php

if (!function_exists('onlyCharacter')) {

    function onlyCharacter($str,$type=1) {
        if($type==1)$str = preg_replace('/[^a-zA-Z0-9]/', '', $str);
        return ($str);
    }

}

if (!function_exists('seGetName')) {

    function scGetName($str) {
        $CI = & get_instance();
        $str = onlyCharacter($CI->security->xss_clean(trim($str)));
        return ($str);
    }

}

