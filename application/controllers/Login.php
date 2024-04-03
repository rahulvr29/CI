<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary libraries and helpers
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session'); // Load session library
        $this->load->model('user_model'); // Load user_model for authentication
    }

    public function index() {
        // If already logged in, redirect to user management page
        if($this->session->userdata('username')) {
            redirect('user');
        }
        // Load login view
        $this->load->view('login');
    }

    public function authenticate() {
      // Form validation rules
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
  
      if ($this->form_validation->run() == FALSE) {
          // If validation fails, reload the login page
          $this->load->view('login');
      } else {
          // Get input data
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          
          // Retrieve hashed password from the database based on the username
          $user = $this->user_model->get_user_by_username($username);
  
          // Print the user data to check
          echo '<pre>';
          print_r($user);
          echo '</pre>';
  
          if ($user) {
              // Hash the input password using the same method as when the password was stored
              $hashed_password = substr(md5($password), 0, 10);
  
              // Compare hashed passwords
              if ($user['password'] === $hashed_password) {
                  // If credentials are correct, set session data and redirect to user management page
                  $this->session->set_userdata('username', $username);
                  redirect('user');
              } else {
                  // If authentication fails, prepare error message
                  $data['error'] = 'Invalid username or password';
                  // Reload login view with error message
                  $this->load->view('login', $data);
              }
              // Print the entered password and hashed password for debugging
        echo 'Entered Password: ' . $password . '<br>';
        echo 'Hashed Password: ' . $hashed_password . '<br>';
          } else {
              // If user does not exist, prepare error message
              $data['error'] = 'Invalid username or password';
              // Reload login view with error message
              $this->load->view('login', $data);
          }
      }
  }
  
  
  

    public function logout() {
        // Destroy session
        $this->session->unset_userdata('username');
        redirect('login');
    }
}
?>
