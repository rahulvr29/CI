<?php
// application/controllers/Auth.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database(); // Load database library
    }

    public function login() {
        // Check if the user is already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('auth/view');
        }

        // Validation rules for the login form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            // If validation fails, load the login view
            $this->load->view('login');
        } else {
            // Check username and password
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Query the database to check if the user exists
            $this->db->where('username', $username);
            $query = $this->db->get('users');
            $user = $query->row();

            if ($user) {
                // Verify password
                if (password_verify($password, $user->password)) {
                    // Set session data
                    $this->session->set_userdata('logged_in', true);
                    redirect('auth/view');
                } else {
                    // If password is incorrect, show error
                    $this->session->set_flashdata('error', 'Invalid password');
                    redirect('auth/login');
                }
            } else {
                // If username is incorrect, show error
                $this->session->set_flashdata('error', 'Invalid username');
                redirect('auth/login');
            }
        }
    }

    public function view() {
        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        // Load the view page
        $this->load->view('view_page');
    }

    public function logout() {
        // Destroy session data
        $this->session->unset_userdata('logged_in');
        redirect('auth/login');
    }

}

















?>