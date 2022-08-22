<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Venta_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    function get_ventas()
    {
        $this->db->select('venta_cabecera.id, venta_cabecera.fecha, usuario.nombre, usuario.apellido, venta_cabecera.total');
        $this->db->from('venta_cabecera');
        $this->db->join('usuario', 'venta_cabecera.usuario_id = usuario.id');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    function get_detalle(){
        $id = $this->uri->segment(2);
        $this->db->select('productos.nombre, venta_detalle.cantidad, venta_detalle.subtotal');
        $this->db->from('venta_detalle');
        $this->db->join('venta_cabecera', 'venta_detalle.venta_id = venta_cabecera.id');
        $this->db->join('productos', 'venta_detalle.producto_id = productos.id');
        $this->db->where('venta_detalle.venta_id',$id);
        $query = $this->db->get();
        return $query;
    }

    function get_venta(){
        $id = $this->uri->segment(2);
        $this->db->select('venta_cabecera.id, venta_cabecera.fecha, usuario.nombre, usuario.apellido, venta_cabecera.total, venta_cabecera.direccion, venta_cabecera.ciudad, venta_cabecera.provincia');
        $this->db->from('venta_cabecera');
        $this->db->join('usuario', 'venta_cabecera.usuario_id = usuario.id');
        $this->db->where('venta_cabecera.id', $id);
        $query = $this->db->get();
        return $query;
    }
}