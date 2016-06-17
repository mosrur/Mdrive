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

