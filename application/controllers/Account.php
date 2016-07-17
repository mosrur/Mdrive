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
        $this->load->model('user_model', 'um');
    }

    /**
     * Manage user account
     */
    public function index() {
        $data['title'] = 'User Account | Mdrive';

        if(!is_logged_in()) {
            redirect('account/signin');
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
        $data['title'] = 'Log in | Mdrive File Sharing';

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'trim|required|md5');

        if($this->input->method(TRUE) == 'POST' && $this->form_validation->run() && !$this->user->login($this->input->post('username'), $this->input->post('password'))) {
            set_alert(
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
    public function signout() {
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

        $current_user = $this->um->get_by_key($key);
        $data['user'] = $current_user;
        $data['key'] = $key;

        if(!$current_user) {
            set_alert(
                'Invalid token provided.',
                'warning'
            );
            redirect(base_url());
            return;
        }

        if($this->user->activate($key, $current_user->iduser)) {
            $this->user->notify($current_user->iduser, 'welcome');
            set_alert(
                'Your account has been activated. Please log in using the form below.',
                'success'
            );
            redirect('account/signin');
            return;
        } else {
            set_alert(
                'Could not activate account. Please contact administrator.',
                'warning'
            );
            redirect(base_url());
            return;
        }

        $this->template->view('account/signin', $data);
    }

    /**
     * Handle the user profile update
     */
    public function profile_update() {
        $data['title'] = 'User profile update | Mdrive';

        $iduser = $this->session->userdata('user_data')['iduser'];

        $data['user'] = $this->um->get($iduser);

        $this->form_validation->set_rules('firstname', 'First name', 'required');
        $this->form_validation->set_rules('lastname', 'Last name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if(!empty($this->input->post('password')) && !empty($this->input->post('passconf'))){
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        }


        if($this->input->method(TRUE) == 'POST' && $this->form_validation->run()) {

            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $signup_email = $this->input->post('email');
            $username = $this->input->post('username');
            if(!empty($this->input->post('password')) && !empty($this->input->post('passconf'))){
                $password = $this->input->post('password');
                $user_profile = $this->user->updateUser($firstname, $lastname, $signup_email, $username, $password);
            } else {
                $user_profile = $this->user->updateUser($iduser, $firstname, $lastname, $signup_email, $username);
            }


            if($user_profile && $user_profile > 0) {
                set_alert(
                    'Profile update was successful. Thank you for being with us.',
                    'success'
                );
                redirect('Account/profile_update');
                return;
            } else {
                set_alert(
                    'Sorry! User profile update was unsuccessful. Please try again or contact administrator.',
                    'danger'
                );
            }
        }
        $this->load->view('profile_update', $data);
    }



}