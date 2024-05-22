<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alumnos extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'grado_student' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'seccion_id' => array(
                'type' => 'INT',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'turno' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'nombres_student' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'apellidos_student' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'sexo_student' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'edad_student' => array(
                'type' => 'INT',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'codigo_student' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'f_nacimiento_student' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'representante_id' => array(
                'type' => 'INT',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
                'null' => TRUE,
            ),
            'updated_at' => array(
                'type' => 'TIMESTAMP',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('alumnos');
    }

    public function down()
    {
        $this->dbforge->drop_table('alumnos');
    }
}