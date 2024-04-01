<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_users() {
        return $this->db->get('crud_user')->result_array();
    }

    public function insert_user($data) {
        $this->db->insert('crud_user', $data);
        return $this->db->insert_id();
    }

    public function get_user($id) {
        return $this->db->get_where('crud_user', array('id' => $id))->row_array();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('crud_user', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        $this->db->delete('crud_user');
    }
}
?>
