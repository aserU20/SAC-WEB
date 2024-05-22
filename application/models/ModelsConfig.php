<?php
class ModelsConfig extends CI_Model {
    function __construct(){
        $this->load->database();
    }

    public function getMigration()
    {
        $data = $this->db->get('migrations');

        return $data->row();
    }
}