<?php
class ModelsPersonal extends CI_Model {
    function __construct(){
        $this->load->database();
    }
    public function save($data){
        $this->db->trans_start();

            $this->db->insert("personal", $data);

            // obtener el id del registro
            // $id = $this->db->insert_id();
            
        $this->db->trans_complete();

        // condicional de forma corta
        return !$this->db->trans_status() ? false : true;
    }
    public function getCargos($cargos)
    {
        $this->db->where('categoria', $cargos);
        $this->db->or_where('nombre_cargo', $cargos);
        $query = $this->db->get('cargos');
        return $query->result_object();
    }
    public function verificar_personal($cedula)
    {
        $query = $this->db->get_where('personal', array('personal.cedula' => $cedula), 1);
        if(!$query->result()){
            return false;
        }else{
            return true;
        }
    }
    public function getPersonal($tipo){

        $this->db->join('cargos', 'cargos.id = personal.id_cargo');

        $this->db->where('personal.tipo', $tipo);
        $query = $this->db->get('personal');
        return $query->result();
    }
    public function getPerson($id){

        $this->db->join('cargos', 'cargos.id = personal.id_cargo');
        $query = $this->db->get_where('personal', array('personal.id' => $id), 1);
        return $query->row();
    }
    public function getPersona($cedula)
    {
        $this->db->join('cargos', 'cargos.id = personal.id_cargo');
        $query = $this->db->get_where('personal', array('cedula' => $cedula), 1);

        if(!$query->result()){
            return false;
        }else{
            return $query->row_array();
        }
    }
    public function soloPersona($cedula)
    {
        $query = $this->db->get_where('personal', array('cedula' => $cedula), 1);

        if(!$query->result()){
            return false;
        }else{
            return $query->row();
        }
    }
    public function return_id_persona($cedula){
        $query = $this->db->get_where('personal', array('cedula' => $cedula), 1);

        if(!$query->result()){
            return false;
        }else{
            $data = $query->row_array();
            return $data['id'];
        }
    }
    public function updatePersonal($id, $data)
    {
        $this->db->where('id', $id);
        if(!$this->db->update('personal', $data)){
            return false;
        }else{
            return true;
        }
    }
    public function deletePersona($id, $tipo)
    {
        if($tipo == 'Administrativo'){
            $this->db->where('id_persona', $id);
            $this->db->delete('usuarios');
        }

        $this->db->where('id', $id);
        if(!$this->db->delete('personal')){
            return false;
        }else{
            return true;
        }
    }
    public function getAll()
    {
        $this->db->join('cargos', 'cargos.id = personal.id_cargo');
        // $this->db->join('asistencia', 'asistencia.codigo_persona = personal.cedula');

        $query = $this->db->get('personal');

        if(!$query->result()){
            return false;
        }else{
 
            if(count($query->result()) == 1){
                return $query->row();

            }else{

                return $query->result();
            }
        }
    }
    public function getDocentes($turno, $tipo)
    {
        $this->db->join('cargos', 'cargos.id = personal.id_cargo');
        $query = $this->db->get_where('personal', array('tipo' => $tipo, 'turno' => $turno));

        if(!$query->result()){
            return false;
        }else{
            return $query->result();
        }
    }
}