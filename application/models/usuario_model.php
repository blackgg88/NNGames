<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Usuario_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

		

  function validarUsuario($username, $password)
  {
    $query = $this->db->get_where('usuario',array('username'=>$username,'password'=>base64_encode($password),'disable'=>0), 1);

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
  }

  function get_usuarios()
    {
        $query = $this->db->get_where("usuario", array('disable' => '0'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }
    }
	function get_usuario($id){

        
        $query = $this->db->get_where('usuario', array('id' => $id),1);
                
        if($query->num_rows() == 1) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

	function add_user($data)
	{
		$this->db->insert('usuario', $data);
  }
	

	function edit_usuario($id)
	{
		$query = $this->db->get_where('usuario', array('id' => $id),1);
                
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
	}

	function delete_usuario($id)
	{			
		$this->db->where('id', $id);
		$query = $this->db->delete('usuario'); 
		return true;	
	}
	
    function estado_usuario($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('usuario', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function update_usuario($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('usuario', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function not_active_usuarios()
    {
        $query = $this->db->get_where("usuario", array('disable' => '1'));
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }
	
} 