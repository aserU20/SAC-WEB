<?php
class ModelsUsers extends CI_Model {
    function __construct(){
        $this->load->database();
    }
    public function save($data)
    {
        $this->db->trans_start();

        $this->db->insert("usuarios", $data);

        // obtener el id del registro
        // $id = $this->db->insert_id();
        
        $this->db->trans_complete();

        // condicional de forma corta
        return !$this->db->trans_status() ? false : true;
    }
    public function getUsers(){
        $this->db->join('personal', 'personal.id = usuarios.id_persona');
        // $sql = $this->db->order_by('id', 'DESC')->get("usuarios");
        $sql = $this->db->get("usuarios");
        return  $sql->result();
    }
    public function verificate($cedula)
    {
        $query = $this->db->get_where('personal', array('cedula' => $cedula), 1);
        if (!$query->result()) {
            return false;
        }else{
            return $query->row();
        }
    }
    public function verificate_user($id)
    {
        $query = $this->db->get_where('usuarios', array('id_persona' => $id), 1);
        if (!$query->result()) {
            return false;
        }else{
            return true;
        }
    }
    public function change_status($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('usuarios', $status);
    }
    public function updatePassword($id, $data)
    {
        $this->db->where('id', $id);
        if(!$this->db->update('usuarios', $data)){
            return false;
        }else{
            return true;
        }
    }
    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('usuarios');
    }
}