<?php
class Auth extends CI_Model {
    function __construct(){
        $this->load->database();
    }

    public function login($cedula, $password)
    {
        $user = $this->db->get_where('personal', array('cedula' => $cedula), 1);
        $u = $user->row();
        
        if(!empty($u->id)){
            $id = $u->id;
        }else{
            $id = 0;
        }
        
        $clave = $this->db->get_where('usuarios', array('id_persona' => $id, 'password' => $password), 1);

        if (!$user->result()) {
            return false;

        }else{

            if(!$clave->result()){
                return false;
            }
            
            $data = array(
                'data1' => $clave->row(),
                'data2' => $user->row()
            );
            return $data;
        }
    }
}