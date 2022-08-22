<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venta_controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('venta_model');
	}

	function mostrar()
  {
    if($this->session->userdata('logged_in'))
    {
      $data = array('titulo' => 'Ventas Realizadas');

      $session_data = $this->session->userdata('logged_in');

      $data['perfil_id'] = $session_data['perfil_id'];
      $data['nombre'] = $session_data['nombre'];
      $data['apellido'] = $session_data['apellido'];    	
     if(!$this->venta_model->get_ventas())
     {
      $this->load->view('partes/head_views', $data);
      $this->load->view('partes/menu_views');
      $this->load->view('panel/panel');
      $this->load->view('carrito/error_venta_views');
      $this->load->view('partes/footer_views');
     }else{
      $dat = array(
        'ventas' => $this->venta_model->get_ventas()
        );
      $this->load->view('partes/head_views', $data);
      $this->load->view('partes/menu_views');
      $this->load->view('panel/panel');
      $this->load->view('panel/ventas_views', array_merge($dat, $data));
      $this->load->view('partes/footer_views');
     }
    }else{
      redirect('login', 'refresh');
    }
  }

  function ver_detalle()
  {
    if($this->session->userdata('logged_in'))
    {
      $data = array('titulo' => 'Ventas Realizadas');

      $session_data = $this->session->userdata('logged_in');
      
      $data['perfil_id'] = $session_data['perfil_id'];
      $data['nombre'] = $session_data['nombre'];
      $data['apellido'] = $session_data['apellido'];   
      $dat = array(
        'detalles' => $this->venta_model->get_detalle(),
        'venta' => $this->venta_model->get_venta()
        );
      $this->load->view('partes/head_views', $data);
      $this->load->view('partes/menu_views');
      $this->load->view('panel/panel');
      $this->load->view('panel/detalle_views', array_merge($dat, $data));
      $this->load->view('partes/footer_views');
    }else{
      redirect('login', 'refresh');
    }
  }
}