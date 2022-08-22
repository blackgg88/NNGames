<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta_controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('consulta_model');
	}

	public function index()
	{
		$data = array(
			'nombre'=>$this->input->post('name',true),
			'email'=>$this->input->post('email',true),
			'asunto'=>$this->input->post('asunto',true),
			'mensaje'=>$this->input->post('mensaje',true)
			);
		$datos_consultas = $this->consulta_model->create_consulta($data);
		redirect('enviado', 'refresh');
	}

	function mostrar(){
		if($this->session->userdata('logged_in'))
		{
			$dat['titulo'] = 'Consultas';
			$session_data = $this->session->userdata('logged_in');
			$dat['nombre'] = $session_data['nombre']; 
			$dat['apellido'] = $session_data['apellido']; 
			$dat['perfil_id'] = $session_data['perfil_id'];  
			$data = array(
				'consultas' => $this->consulta_model->get_consultas()
				);
			$this->load->view('partes/head_views',$dat);
			$this->load->view('partes/menu_views');
			$this->load->view('panel/panel');
			$this->load->view('panel/consultas_views',$data);
			$this->load->view('partes/footer_views');
			}else{
			redirect('login', 'refresh');
		}
	}
	
	function sended_msj(){
		$dat ['titulo'] = 'Contacto';

		$dat['vision'] = 'visible';
		
		$session_data = $this->session->userdata('logged_in');
		$dat['nombre'] = $session_data['nombre']; 
		$dat['apellido'] = $session_data['apellido']; 
		$dat['perfil_id'] = $session_data['perfil_id']; 

		$this->load->view('partes/head_views',$dat);
		$this->load->view('partes/menu_views');
		$this->load->view('contacto');
		$this->load->view('partes/footer_views');
	}

	function leido(){
		$id = $this->uri->segment(2);
		$data = array(
			'leido' => '1'
		);

		$this->consulta_model->estado_consulta($id, $data);
    	redirect('listado_consultas', 'refresh');
	}

	function no_leido(){
		$id = $this->uri->segment(2);

		$data = array(
			'leido' => '0'
		);

		$this->consulta_model->estado_consulta($id, $data);
    	redirect('listado_consultas', 'refresh');
	}
}