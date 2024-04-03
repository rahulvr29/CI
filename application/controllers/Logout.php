<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary libraries
        $this->load->library('session');
    }

    public function index() {
        // Destroy session data
        $this->session->sess_destroy();

        // Redirect to login page
        redirect('login');
    }
}
?>
