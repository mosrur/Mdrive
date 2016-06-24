<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * File_model.php
 *
 * @package: Mdrive.
 * @author: Mosrur Chowdhury
 * @link: http://mosrur.com
 */
class File_model extends CI_Model
{
    private $default_table = "file";

    public function add($data, $where = false){
        if($this->db->insert($this->default_table, $data)){
            return $this->db->insert_id();
        }
    }

    public function update($data, $where){
        if($this->db->update($this->default_table, $data, $where)){
            return $this->db->affected_rows();
        }

    }

    public function get($data, $where){

    }

    public function get_user_files($iduser)
    {
        $user_files = $this->db->get_where($this->default_table, array('iduser' => $iduser));
        if(!$user_files){
            return FALSE;
        }
        return $user_files->result_array();
    }

    public function get_by_key($key) {
        $file = $this->db->get_where($this->default_table, array('key' => $key), 1);
        if(!$file) {
            return FALSE;
        }
        return $file->row();
    }
}