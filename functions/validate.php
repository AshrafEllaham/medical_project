<?php

if(!function_exists('check_empty')){
    function check_empty($value){
        return empty($value);
    }
}

if(!function_exists('valid_email')){
    function valid_email($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}

if(!function_exists('check_length')){
    function check_length($value, $length){
        return trim(strlen($value)) >= $length ;
    }
}

?>