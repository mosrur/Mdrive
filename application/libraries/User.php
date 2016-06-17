<?php

/**
 * User.php
 *
 * @package: CI_RentalAid.
 * @author: Mosrur Chowdhury
 * @link: http://mosrur.com
 */
class User
{
    private $ci;
    private $default_table;


    function __construct(){
        // Assigning CodeIgniter object to $this->CI
        $this->ci =& get_instance();

    }

    /**
     * Check if current user is logged in
     * @return bool
     * */
    public function loggedIn() {
        $logged_in = $this->ci->session->userdata('user_data');
        if($logged_in) {
            return TRUE;
        }
        return FALSE;
    }

    public function getUser($username)
    {
        if($this->loggedIn()){
            $user_data = $this->ci->session->userdata('user_data');
            $this->ci->load->model('user_model', 'um');
            return $this->ci->um->get($user_data['iduser']);
        }

        return FALSE;

    }

    public function Login($username, $password){

        // Select user details
        $user = $this->CI->db
            ->where('username', $username)
            ->where('password', $password)
            ->get($this->default_table);

        // user result check
        if ($user->num_rows() != 1)
        {
            return FALSE;
        }

        // Set the user details
        $user_details = $user->row();

        // Set the userdata for the current user
        if($this->CI->setUser($user_details->username, $user_details->id)){

            return TRUE;
        }


    }

    public function Logout(){

        // Remove userdata
        $this->CI->session->unset_userdata('identifier');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('logged_in');

        // Set logged out userdata
        $this->CI->session->set_userdata(array(
            'logged_out' => $_SERVER['REQUEST_TIME']
        ));

        // Return true
        return TRUE;
    }

    public function setUser($username, $userid, $role = false)
    {
        $user_data = array(
            'username' => $username,
            'userid' => $userid
        );
        if($role) {
            $user_data['role'] = $role;
        }
        $this->CI->session->set_userdata($user_data);
        return TRUE;
    }

    public function isLoggedin(){
        // Return boolean based on session data
        return (bool) $this->CI->session->userdata('username');
    }

    public function checkUserRole(){
        return $this->CI->session->userdata('userrole');
    }
    
    public function isAdmin(){

    }




}