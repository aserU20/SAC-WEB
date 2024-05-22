<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_secciones extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'grado' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'seccion' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'id_docente' => array(
                'type' => 'INT',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'turno' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'capacidad' => array(
                'type' => 'INT',
                'constraint' => '100',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('secciones');
    }

    public function down()
    {
        $this->dbforge->drop_table('secciones');
    }
}