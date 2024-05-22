<?php
class ModelsRepresentantes extends CI_Model {
    function __construct(){
        $this->load->database();
    }
    public function save($data){
        $this->db->trans_start();

            $this->db->insert("representantes", $data);

            $id = $this->db->insert_id();
            
        $this->db->trans_complete();

        // condicional de forma corta
        return !$this->db->trans_status() ? false : $id;
    }
    public function getRepresentante($ci){

        $query = $this->db->get_where('representantes', array('cedula_r' => $ci), 1);

        if(!$query->result()){
            return false;
        }else{
            return $query->row();
        }

    }
    public function getRepresentantes(){

        $sql = $this->db->order_by('nombres_r', 'ASC')->get("representantes");
        return $sql->result();
    }
    public function update($data)
    {
        $this->db->where('cedula_r', $data['cedula_r']);
        if(!$this->db->update('representantes', $data)){
            return false;
        }else{
            return true;
        }
    }
    public function delete($id, $alumnos)
    {
        if($alumnos != false){
            $this->db->where('representante_id', $id);
            $this->db->delete('alumnos');
        }

        $this->db->where('id', $id);

        if(!$this->db->delete('representantes')){
            return false;
        }else{
            return true;
        }
    }
}