
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_User extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'age' => array(
                'type' => 'INT',
                'constraint' => '100',
            ),
            'gender' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('crud_user');
    }

    public function down() {
        $this->dbforge->drop_table('crud_user');
    }
}
?>