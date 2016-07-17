<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * File.php
 *
 * @package: Mdrive.
 * @author: Mosrur Chowdhury
 * @link: http://mosrur.com
 */
class File extends CI_Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('file_model', 'fm');
    }

    /**
    *   index page
     */
    public function index()
    {
        if(!is_logged_in()){
            redirect('account/signin');
            return;
        }

        $data['title'] = "Mdrive | File Sharing";
        $data['userfiles'] = $this->fm->get_user_files(get_userid());

        $this->load->view('file', $data);
    }

    public function file_upload()
    {
        if(!is_logged_in()){
            redirect('account/signin');
            return;
        }

        $data['title'] = "Mdrive | File Sharing";
        $data['userfiles'] = $this->fm->get_user_files(get_userid());

        $this->load->view('file_upload', $data);
    }

    /*
    *   File upload with permission
    */
    public function upload(){
        $data['title'] = "Mdrive | File uploading page";

        // uploading content goes here
        $this->form_validation->set_rules('title', 'Title', 'required');

        if($this->form_validation->run())
        {
            $file_title = $this->input->post('title');

            $this->load->library('file_upload');

            $upload = $this->file_upload->do_upload_file();
        }

        $this->load->view('file');
    }

    public function download($key){
        $data['title'] = "Mdrive | User files";

        $downld_file = $this->fm->get_by_key($key);

        if(!$downld_file){
            set_alert('Invalid download request.','danger');
            redirect(base_url());
            return;
        }
        $this->load->config('file');
        $this->load->helper('download');
        $downld_path = $this->config->item('upload_path').'/'.$downld_file->path;
        $data = file_get_contents($downld_path);
        force_download(str_replace(get_userid().'/','', $downld_file->path), $data , TRUE);

        return;

    }

    public function change_permission($key){
        $data['title'] = "Mdrive | User files";

        $downld_file = $this->fm->get_by_key($key);

        if(!$downld_file){
            set_alert('Invalid download request.','danger');
            redirect(base_url());
            return;
        }

        if($downld_file->permission == 'Private')
        {
            $update = $this->fm->update(
                array(
                    'permission' => 'Public'
                ),
                array(
                    'idfile'     => $downld_file->idfile
                )
            );

            if($update){
                set_alert(
                    'File permission updated successfully.',
                    'success'
                );
            }
        }
        redirect('File');

    }

    public function share($key){
        $data['title'] = "Mdrive | User file share";

        $downld_file = $this->fm->get_by_key($key);

        if(!$downld_file){
            set_alert('Invalid file request.','danger');
            redirect(base_url());
            return;
        }
        $this->load->config('file');
        $this->load->helper('download');
        $downld_path = $this->config->item('upload_path').'/'.$downld_file->path;
        $data = file_get_contents($downld_path);
        force_download(str_replace(get_userid().'/','', $downld_file->path), $data , TRUE);

        return;

    }


}