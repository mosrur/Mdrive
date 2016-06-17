<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Controller to handle the user accounts
 * @author: Mohboob Chowdhury
 * @url: http://mosrur.com
 **/
class Account extends CI_Controller {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    /**
     * Manage user account
     */
    public function index() {
        $data['title'] = 'User Account | Mdrive';

        if(!is_logged_in()) {
            redirect('user/login');
            return;
        }

    }

    /**
     * Handle the user signup
     */
    public function signup() {
        $data['title'] = 'Sign up | News Portal';

        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');

        if($this->form_validation->run()) {
            $signup_email = $this->input->post('email', TRUE);
            $new_user = $this->user->create($signup_email);
            if($new_user && $new_user > 0) {
                if($this->user->notify($new_user, 'new_signup')) {
                    $this->template->alert(
                        'Thank you for joining us. We have sent you an email with instructions about activating your account. Please make sure to check the spam folder.',
                        'success'
                    );
                } else {
                    $this->template->alert(
                        'Could not send the activation email. Please contact administrator.',
                        'warning'
                    );
                }
                redirect(base_url());
                return;
            } else {
                $this->template->alert(
                    'Sorry! Sign up was unsuccessful. Please try again or contact administrator.',
                    'danger'
                );
            }
        }
        $this->template->view('signup');
    }

    /**
     * Handle user Signin
     */
    public function signin() {
        $data['title'] = 'Log in | News Portal';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');

        if($this->input->method(TRUE) == 'POST' && $this->form_validation->run()) {
            $this->template->alert(
                'Credentials did not match',
                'danger'
            );
        }

        if(!is_logged_in()) {
            $this->load->view('home', $data);
            return;
        }

        redirect('file');
        return;
    }

    /**
     * Log the user out of the system
     */
    public function logout() {
        $this->user->logout();
        redirect(base_url());
    }


}