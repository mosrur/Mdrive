<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model to handle user related actions
 * @author: Mosrur Chowdhury
 * @url: http://mosrur.com
 **/
class User_model extends CI_Model {

    private $default_table = 'user';

    public function add($data) {

        if($this->db->insert($this->default_table, $data)){
            return $this->db->insert_id();
        }

        return FALSE;
    }

    public function update($data, $where) {
        if($this->db->update($this->default_table, $data, $where)) {
            return $this->db->affected_rows();
        }
        return FALSE;
    }

    public function get($iduser) {
        $user = $this->db->get_where($this->default_table, array('iduser' => $iduser), 1);
        if(!$user) {
            return FALSE;
        }
        return $user->row();
    }

    public function get_by_email($email) {
        $user = $this->db->get_where($this->default_table, array('email' => $email), 1);
        if(!$user) {
            return FALSE;
        }
        return $user->row();
    }



    public function signin($data) {
        if(!isset($data['status'])) {
            $data['status'] = 'Active';
        }

        $user = $this->db->get_where($this->default_table, $data, 1);
        if(!$user) {
            return FALSE;
        }

        $user_data = $user->row_array();
        if(isset($user_data['password'])) {
            unset($user_data['password']);
        }
        if(isset($user_data['key'])) {
            unset($user_data['key']);
        }

        return $user_data;
    }

}