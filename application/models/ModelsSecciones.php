<?php
class ModelsSecciones extends CI_Model {
    function __construct(){
        $this->load->database();
    }

    public function save($datos)
    {
        // insertar datos
        if(!$this->db->insert('secciones', $datos)){
            return false;
        }
        return true;
        
    }
    public function getSecciones(){
        $sql = $this->db->get("secciones");
        return $sql->result();
    }
    public function verficate($grado)
    {

        $query = $this->db->order_by('seccion ASC')->get_where('secciones', array('grado' => $grado));

        if(!$query->result()){
            return false;
        }else{
            return $query->result();
        }
    }
    public function verficate_letra($grado, $letra)
    {

        $query = $this->db->get_where('secciones', array('grado' => $grado, 'seccion' => $letra), 1);

        if(!$query->result()){
            return false;
        }else{
            return $query->row();
        }
    }
    public function getSeccion($id)
    {
        $query = $this->db->get_where('secciones', array('id' => $id), 1);

        if(!$query->result()){
            return false;
        }else{
            return $query->row();
        }
    }
    public function alumnos_seccion($id, $data)
    {
        $this->db->where('id', $id);
        if(!$this->db->update('alumnos', $data)){
            return false;
        }else{
            return true;
        }
    }
    public function asig_docente($id, $data)
    {
        $this->db->where('id', $id);
        if(!$this->db->update('secciones', $data)){
            return false;
        }else{
            return true;
        }
    }
    public function update($id, $data)
    {
        $datos = array(
            'grado_student' => $data['grado'],
            'turno' => $data['turno'],
        );

        $this->db->where('seccion_id', $id);
        $this->db->update('alumnos', $datos);

        $this->db->where('id', $id);
        if(!$this->db->update('secciones', $data)){
            return false;
        }else{
            return true;
        }
    }
    public function deleteSeccion($id)
    {
        $data = array(
            'seccion_id' => '0'
        ); 
        $this->db->where('seccion_id', $id);
        $this->db->update('alumnos', $data);

        $this->db->where('id', $id);
        if(!$this->db->delete('secciones')){
            return false;
        }else{
            return true;
        }
    }
}