<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Producto_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    function get_productos()
    {
        $query = $this->db->get_where('productos', array('disable' => '0'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    public function add_producto($data){
        $this->db->insert('productos', $data);
    }

    function edit_producto($id){

        $query = $this->db->get_where('productos', array('id' => $id),1);
                
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
    }

    function update_producto($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('productos', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function estado_producto($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('productos', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function not_active_productos()
    {
        $query = $this->db->get_where('productos', array('disable'=>'1'));
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }
} 