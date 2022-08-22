<?php
Class Consulta_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    function get_consultas()
    {
        $query = $this->db->get("consultas");
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    public function create_consulta($data){
        $this->db->insert('consultas', $data);
    }

    function estado_consulta($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('consultas', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}