<?php
class ModelsCargos extends CI_Model {
    function __construct(){
        $this->load->database();
    }

    public function save($datos)
    {
        // insertar datos
        if(!$this->db->insert('cargos', $datos)){
            return false;
        }
        return true;
        
    }
    public function validate_code($codigo, $nombre)
    {
        $this->db->where('codigo', $codigo);
        $this->db->or_where('nombre_cargo', $nombre);
        $query = $this->db->get('cargos');
        if(!$query->result()){
            return false;
        }else{
            return $query->row_array();
        }
    }
    public function getCargos(){
        $sql = $this->db->order_by('id', 'DESC')->get("cargos");
        return $sql->result();
    }
    public function getCargo($id)
    {
        $cargo = $this->db->get_where('cargos', array('cargos.id' => $id), 1);
        return $cargo->row_array();
    }
    public function updateCargo($id, $data)
    {
        $this->db->where('id', $id);
        if(!$this->db->update('cargos', $data)){
            return false;
        }else{
            return true;
        }
    }
    public function deleteCargo($id)
    {
        $this->db->where('id', $id);
        if(!$this->db->delete('cargos')){
            return false;
        }else{
            return true;
        }
    }
}