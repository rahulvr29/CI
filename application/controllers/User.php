<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('form');
    }

    public function index() {
        $data['users'] = $this->user_model->get_users();
        $this->load->view('user/index', $data);
    }

    public function create() {
        $this->load->view('user/create');
    }

    public function store() {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'age' => $this->input->post('age'),
            'gender' => $this->input->post('gender'),
            'password' => $this->input->post('password'),
        );
        $this->user_model->insert_user($data);
        redirect('user');
    }

    public function edit($id) {
        $data['user'] = $this->user_model->get_user($id);
        $this->load->view('user/edit', $data);
    }

    public function update($id) {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'age' => $this->input->post('age'),
            'gender' => $this->input->post('gender'),
            'password' => $this->input->post('password'),
        );
        $this->user_model->update_user($id, $data);
        redirect('user');
    }

    public function delete($id) {
        $this->user_model->delete_user($id);
        redirect('user');
    }
}
?>