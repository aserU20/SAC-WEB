<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_asistencia_personal extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'codigo_persona' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),

            // lunes
            'lu_fecha' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'lu_entrada' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'lu_salida' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'lu_condicion' => array(
                'type' => 'INT',
                'constraint' => '100',
                'null' => TRUE,
            ),

            // martes
            'ma_fecha' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'ma_entrada' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'ma_salida' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'ma_condicion' => array(
                'type' => 'INT',
                'constraint' => '100',
                'null' => TRUE,
            ),

            // miercoles
            'mi_fecha' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'mi_entrada' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'mi_salida' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'mi_condicion' => array(
                'type' => 'INT',
                'constraint' => '100',
                'null' => TRUE,
            ),

            // jueves
            'ju_fecha' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'ju_entrada' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'ju_salida' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'ju_condicion' => array(
                'type' => 'INT',
                'constraint' => '100',
                'null' => TRUE,
            ),

            // viernes
            'vi_fecha' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'vi_entrada' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'vi_salida' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'vi_condicion' => array(
                'type' => 'INT',
                'constraint' => '100',
                'null' => TRUE,
            ),
    
            // sabado
            'sa_fecha' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'sa_entrada' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'sa_salida' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'sa_condicion' => array(
                'type' => 'INT',
                'constraint' => '100',
                'null' => TRUE,
            ),

            // domingo
            'do_fecha' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'do_entrada' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'do_salida' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'do_condicion' => array(
                'type' => 'INT',
                'constraint' => '100',
                'null' => TRUE,
            ),

            'fecha' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'fin_semana' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('asistencia');
    }

    public function down()
    {
        $this->dbforge->drop_table('asistencia');
    }
}