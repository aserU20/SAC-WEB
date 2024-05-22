<?php
class ModelsAsistencia extends CI_Model {
    function __construct(){
        $this->load->database();
    }

    public function save($data)
    {
        $this->db->trans_start();

            $this->db->insert("asistencia", $data);

            // obtener el id del registro
            $id = $this->db->insert_id();
            
        $this->db->trans_complete();

        // condicional de forma corta
        return !$this->db->trans_status() ? false : true;
    }
    public function update($codigo, $campo, $fecha, $data)
    {
        $this->db->where('codigo_persona', $codigo);
        $this->db->where($campo, $fecha);        
        $this->db->order_by('id', 'DESC');        
        $this->db->limit(1);

        if(!$this->db->update('asistencia', $data)){
            return false;
        }else{
            return true;
        }
    }
    public function justify_update($id, $data)
    {
        $this->db->where('id', $id);
        if(!$this->db->update('asistencia', $data)){
            return false;
        }else{
            return true;
        }
    }
    public function verificar_asistencia($codigo, $campo, $fecha)
    {
        
        $data = $this->db->get_where('asistencia', array('codigo_persona' => $codigo, $campo => $fecha), 1);
        if(!$data->result()){
            return false;
        }
        return $data->row();
    }
    public function asistencia_diaria($filter, $fecha)
    {
        $this->db->join('personal', 'personal.cedula = asistencia.codigo_persona');
        $data = $this->db->get_where('asistencia', array($filter => $fecha));

        if(!$data->result()){
            return false;
        }
        return $data->result();
    }
    public function getAsistencias()
    {
        $this->db->join('personal', 'personal.cedula = asistencia.codigo_persona');
        $this->db->join('cargos', 'cargos.id = personal.id_cargo');

        $data = $this->db->get('asistencia');
        return $data->result();
    }
    public function asistencia_filter($filter, $fecha_i, $fecha_f)
    {
        $this->db->join('cargos', 'cargos.id = personal.id_cargo');
        $this->db->join('asistencia', 'personal.cedula = asistencia.codigo_persona');
        $this->db->where($filter, $fecha_i);
        $this->db->where('fin_semana <=', $fecha_f);
        $this->db->order_by('nombre', 'ASC');
        $data = $this->db->get('personal');
        
        return $data->result();
    }
    public function getPaginate($filter, $fecha_i, $fecha_f, $limit, $offset){
        $this->db->join('cargos', 'cargos.id = personal.id_cargo');
        $this->db->join('asistencia', 'personal.cedula = asistencia.codigo_persona');
        $this->db->where($filter, $fecha_i);
        $this->db->where('fin_semana <=', $fecha_f);
        $this->db->order_by('nombre', 'ASC');
        $data = $this->db->get('personal', $limit, $offset);
        
        return $data->result();
    }
    public function asistencia_select($codigo, $day, $fecha)
    {
        $data = $this->db->get_where('asistencia', array('codigo_persona' => $codigo, $day => $fecha), 1);
        if(!$data->result()){
            return false;
        }
        return $data->row();
    }
    public function getFilter($param1, $param2, $fecha_i, $fecha_f, $ci)
    {
        $this->db->join('personal', 'personal.cedula = asistencia.codigo_persona');
        $this->db->join('cargos', 'cargos.id = personal.id_cargo');
        
        $this->db->where($param1, $fecha_i);
        $this->db->where($param2, $fecha_f); 
        
        if(!empty($ci)){
            $this->db->where('codigo_persona', $ci);
        }
        
        $data = $this->db->get('asistencia');
        if(!$data->result()){
            return false;
        }
        return $data->result();
    }
    public function get_situaciones_laborales()
    {
        $data = $this->db->get('situaciones_laborales');
        return $data->result();
    }
    public function get_Situacion($situacion)
    {
        $data = $this->db->get_where('situaciones_laborales', array('situacion' => $situacion), 1);
        if(!$data->result()){
            return false;
        }
        return true;
    }
    public function save_situacion($data)
    {
        $this->db->trans_start();

            $this->db->insert("situaciones_laborales", $data);

            // obtener el id del registro
            $id = $this->db->insert_id();
        
        $this->db->trans_complete();

        // condicional de forma corta
        return !$this->db->trans_status() ? false : true;
    }
    public function update_situacion($id, $data)
    {
        $this->db->where('id', $id);
        if(!$this->db->update('situaciones_laborales', $data)){
            return false;
        }else{
            return true;
        }
    }
    public function delete_situacion($id)
    {
        $this->db->where('id', $id);
        if(!$this->db->delete('situaciones_laborales')){
            return false;
        }else{
            return true;
        }
    }

}