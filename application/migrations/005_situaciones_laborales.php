<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_situaciones_laborales extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'situacion' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('situaciones_laborales');
    }

    public function down()
    {
        $this->dbforge->drop_table('situaciones_laborales');
    }
}