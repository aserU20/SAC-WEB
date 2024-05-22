<?php
class ModelsAlumnos extends CI_Model {
    function __construct(){
        $this->load->database();
    }
    public function save($data){
        $this->db->trans_start();

            $this->db->insert("alumnos", $data);

            $id = $this->db->insert_id();
            
        $this->db->trans_complete();

        // condicional de forma corta
        return !$this->db->trans_status() ? false : true;
    }
    public function getAlumno($codigo){

        $this->db->join('secciones', 'secciones.id = alumnos.seccion_id');
        $this->db->join('representantes', 'representantes.id = alumnos.representante_id');

        $query = $this->db->get_where('alumnos', array('alumnos.codigo_student' => $codigo), 1);

        if(!$query->result()){
            return false;
        }else{
            return $query->row();
        }
    }
    public function return_one($tabla, $campo, $item)
    {

        $query = $this->db->get_where($tabla, array($campo => $item), 1);

        if(!$query->result()){
            return false;
        }else{
            return $query->row();
        }
    }
    public function return_all($tabla, $item)
    {

        $query = $this->db->order_by('nombres_student ASC')->get_where($tabla, $item);

        if(!$query->result()){
            return false;
        }else{
            return $query->result();
        }
    }
    public function validate($nombre, $apellido, $sexo, $edad, $fecha_n)
    {
        $query = $this->db->get_where('alumnos', 
            array(
                'nombres_student'      => $nombre, 
                'apellidos_student'    => $apellido, 
                'sexo_student'         => $sexo, 
                'edad_student'         => $edad, 
                'f_nacimiento_student' => $fecha_n
            ), 
        1);

        if(!$query->result()){
            return false;
        }else{
            return $query->row();
        }
    }
    public function getAlumnos_representante($id){

        $query = $this->db->get_where('alumnos', array('alumnos.representante_id' => $id));

        if(!$query->result()){
            return false;
        }else{
            return $query->result();
        }
    }
    public function getAlumnos(){
        $this->db->join('secciones', 'secciones.id = alumnos.seccion_id');
        $this->db->join('representantes', 'representantes.id = alumnos.representante_id');

        $sql = $this->db->order_by('nombres_student', 'ASC')->get("alumnos");
        return $sql->result();
    }
    public function seccion_alumnos($grado, $seccion)
    {
        $query = $this->db->get_where('alumnos', array('alumnos.grado_student' => $grado, 'alumnos.seccion_id' => $seccion));

        if(!$query->result()){
            return false;
        }else{
            return $query->result();
        }
    }
    public function all_alumnos($grado)
    {
        $query = $this->db->get_where('alumnos', array('alumnos.grado_student' => $grado));

        if(!$query->result()){
            return false;
        }else{
            return $query->result();
        }
    }
    public function update($data)
    {
        $this->db->where('codigo_student', $data['codigo_student']);
        if(!$this->db->update('alumnos', $data)){
            return false;
        }else{
            return true;
        }
    }
    public function delete($codigo, $alumnos, $alumno)
    {
        if($alumnos == false){
            $this->db->where('id', $alumno->representante_id);
            $this->db->delete('representantes');
        }

        $this->db->where('codigo_student', $codigo);
        if(!$this->db->delete('alumnos')){
            return false;
        }else{
            return true;
        }
    }
}