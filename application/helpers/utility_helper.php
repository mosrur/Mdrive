<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * File to hold utility functions used in the application
 * @author: Mosrur Chowdhury
 * @url: http://mosrur.com
 **/

function set_alert($msg, $type = 'info'){
    $ci =& get_instance();
    $alerts = $ci->session->userdata('alerts');
    $alerts[$type][] = $msg;

    $ci->session->set_userdata('alerts', $alerts);

}

function show_alert(){
    $ci =& get_instance();
    $alerts = $ci->session->userdata('alerts');

    foreach($alerts as $type => $msgs){
        echo "<div class='alert alert-$type'>";
            foreach($msgs as $msg){
                echo "<p>".$msg."</p>";
            }
        echo "</div>";
    }

    $ci->session->unset_userdata('alerts');
}

function has_alert(){
    $ci =& get_instance();
    $alerts = $ci->session->userdata('alerts');

    return !empty($alerts);
}