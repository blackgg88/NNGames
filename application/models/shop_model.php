<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class shop_model extends CI_Model {

  public function get_all()
  {
    $query = $this->db->get_where("productos", array('disable' => '0'));
    return $query->result_array();
  }
  
  public function get_destacado()
  {
    $this->db->select('*');
        $this->db->from('productos');
        $this->db->join('tipos_producto', 'productos.tipo_id = tipos_producto.id');
        $this->db->where('productos.tipo_id',2);
        $query = $this->db->get();
        return $query->result_array();
  }
  
  public function get_hombres(){
    $query = $this->db->get_where("productos", array('categoria_id' => '1'));
    return $query->result_array();
  }

  public function get_mujeres(){
    $query = $this->db->get_where("productos", array('categoria_id' => '2'));
    return $query->result_array();
  }

  public function get_accesorios(){
    $query = $this->db->get_where("productos", array('categoria_id' => '3'));
    return $query->result_array();
  }

  public function compra_cabecera($data){
    $this->db->insert('venta_cabecera', $data);
    $id = $this->db->insert_id();
    return (isset($id)) ? $id : FALSE;
  }

  public function compra_detalle($data){
    $this->db->insert('venta_detalle', $data);
  }

  function buscar_producto($query){
    $this->db->like("nombre", $query);
    $query = $this->db->get("productos");
        
    if($query->num_rows()>0) {
      return $query->result_array();
    } else {
        return FALSE;
    }        
  }

  public function insert_order($data)
  {
    $this->db->insert('venta_cabecera', $data);
    $id = $this->db->insert_id();
    return (isset($id)) ? $id : FALSE;
  }
  
  public function insert_order_detail($data)
  {
    $this->db->insert('venta_detalle', $data);
  }
}