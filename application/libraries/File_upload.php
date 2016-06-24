<?php

/**
 * File.php
 *
 * @package: Mdrive.
 * @author: Mosrur Chowdhury
 * @link: http://mosrur.com
 */
class File_upload
{
    private $ci;
    private $default_table;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->default_table = 'file';
        

    }

    public function do_upload_file()
    {
        // retrieving userid and checking the file upload path exists.
        $this->ci->config->load('file', TRUE);
        $userid = get_userid();
        $org_upload_path = $this->ci->config->item('upload_path', 'file');
        $new_upload_path = $org_upload_path.'/'.$userid.'/';

        $file_path = time().'_'.$_FILES['userfile']['name'];
        $file_config = $this->ci->config->item('file');
        $file_config['file_name'] = $file_path;
        $file_config['upload_path'] = $new_upload_path;
        $this->ci->config->set_item('file', $file_config);

        $this->ci->load->library('upload', $this->ci->config->item('file'));

        if( ! is_dir($new_upload_path))
        {
            mkdir($new_upload_path, 755);
        }

        if ( ! $this->ci->upload->do_upload('userfile'))
        {
            set_alert($this->ci->upload->display_errors(), 'danger');
        }
        else
        {
            // add file db info
            $title = $this->ci->input->post('title');


            $this->ci->load->model('file_model', 'fm');
            return $this->ci->fm->add(
                array(
                    'iduser'        => $userid,
                    'title'         => $title,
                    'path'          => $userid.'/'.$file_path,
                    'key'           => generate_file_code($title),
                    'permission'    => 'Public',
                    'status'        => 'Active',
                    'created'       => date("Y-m-d H:i:s")
                )
            );

            // set notification message
            set_alert(implode('<br>', $this->ci->upload->data()), 'success');

        }


    }


}