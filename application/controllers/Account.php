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
        $data['title'] = 'Sign up | Mdrive';

        $this->form_validation->set_rules('firstname', 'First name', 'required');
        $this->form_validation->set_rules('lastname', 'Last name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');


        if($this->form_validation->run()) {

            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $signup_email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');


            $new_user = $this->user->setUser($firstname, $lastname, $signup_email, $username, $password);
            if($new_user && $new_user > 0) {
                if($this->user->notify($new_user, 'new_signup')) {

                    set_alert(
                        'Thank you for joining us. We have sent you an email with instructions about activating your account. Please make sure to check the spam folder.',
                        'success'
                    );
                } else {
                    set_alert(
                        'Could not send the activation email. Please contact administrator.',
                        'warning'
                    );
                }
                redirect('Account/signin');
                return;
            } else {
                set_alert(
                    'Sorry! Sign up was unsuccessful. Please try again or contact administrator.',
                    'danger'
                );
            }
        }
        $this->load->view('signup');
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
            $this->load->view('signin', $data);
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

    /**
     * Handles account activation using the key sent via email
     * Lets user set the password for the first time
     * @param $key
     */
    public function activate($key) {
        $data['title'] = 'Activate account | News Portal';
        $this->load->model('user_model', 'um');

        $current_user = $this->um->get_by_key($key);
        $data['user'] = $current_user;
        $data['key'] = $key;

        if(!$current_user) {
            $this->template->alert(
                'Invalid token provided.',
                'warning'
            );
            redirect(base_url());
            return;
        }

        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|md5');
        $this->form_validation->set_rules('conf_password', 'password confirmation', 'trim|required|md5|matches[password]');

        if($this->input->method(TRUE) == 'POST' && ($this->input->post('key') != $key || $this->input->post('iduser') != $current_user->iduser)) {
            $this->template->alert(
                'Form spoofing detected.',
                'warning'
            );
            redirect(base_url());
            return;
        }

        if($this->input->method(TRUE) == 'POST' && $this->form_validation->run()) {
            if($this->user->activate($key, $current_user->iduser, $this->input->post('password'))) {
                $this->user->notify($current_user->iduser, 'welcome');
                $this->template->alert(
                    'Your account has been activated. Please log in using the form below.',
                    'success'
                );
                redirect('account/login');
                return;
            } else {
                $this->template->alert(
                    'Could not activate account. Please contact administrator.',
                    'warning'
                );
                redirect(base_url());
                return;
            }
        }

        $this->template->view('account/set_password', $data);
    }


}