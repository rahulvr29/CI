<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function get_user_by_username($username) {
        return $this->db->get_where('crud_user', array('username' => $username))->row_array();
    }
    
    public function authenticate($username, $password) {
        // Hash the password to match with the hashed password in the database
        $hashed_password = md5($password);

        $query = $this->db->get_where('crud_user', array('username' => $username, 'password' => $hashed_password));
        
        if ($query->num_rows() == 1) {
            return true; // Authentication successful
        } else {
            return false; // Authentication failed
        }
    }
    

    public function get_users() {
        return $this->db->get('crud_user')->result_array();
    }

    public function insert_user($data) {
        // Hash the password before insertion
        $data['password'] = substr(md5($data['password'], PASSWORD_DEFAULT), 0, 10);
        $this->db->insert('crud_user', $data);
        return $this->db->insert_id();
    }

    public function get_user($id) {
        return $this->db->get_where('crud_user', array('id' => $id))->row_array();
    }

    // 'password' => substr(password_hash($this->input->post('password'), PASSWORD_DEFAULT), 0, 10),

    public function update_user($id, $data) {
        // Hash the password before updating
        if(isset($data['password'])) {
            $data['password'] = substr(md5($data['password'], PASSWORD_DEFAULT), 0, 10);
        }
        $this->db->where('id', $id);
        $this->db->update('crud_user', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        $this->db->delete('crud_user');
    }
}
?>
