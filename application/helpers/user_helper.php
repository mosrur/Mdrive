<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * File to hold user related helper functions
 * @author: Mosrur Chowdhury
 * @url: http://mosrur.com
 **/

if(!function_exists('is_logged_in')) {

    /**
     * Check if current user is logged in
     * @return bool
     */
    function is_logged_in() {
        $CI =& get_instance();
        return $CI->user->loggedIn();
    }
}

if(!function_exists('generate_validation_code')) {
    function generate_validation_code($email) {
        return strrev(md5(strrev($email) . time() . rand()));
    }
}

if(!function_exists('get_userid')) {
    function get_userid(){
        $ci =& get_instance();
        return $ci->session->userdata('iduser');
    }
}



