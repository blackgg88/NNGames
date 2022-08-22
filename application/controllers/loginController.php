<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller{

	function __construct() 
	{
		parent::__construct();
		$this->load->model('usuario_model');	
	}

	function index(){
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password','trim|required|callback__valid_login');
		
		$this->form_validation->set_message('required', 'el campo %s es requerido');
		$this->form_validation->set_message('_valid_login', 'El usuario o contraseña son incorrectos');
		
		$this->form_validation->set_error_delimiters('<ul><li>', '</li></ul>');
		
		if ($this->form_validation->run() == FALSE){
			$data = array('titulo' => 'Error de datos');

			$session_data = $this->session->userdata('logged_in');
  		$data['id'] = $session_data['id'];
  		$data['perfil_id'] = $session_data['perfil_id'];
  		$data['nombre'] = $session_data['nombre'];
  		$data['apellido'] = $session_data['apellido'];
			$this->load->view('partes/head_views',$data);
			$this->load->view('partes/menu_views');
			$this->load->view('login');
			$this->load->view('partes/footer_views');
		}
		else{
			//Pagina que carga despues de loguearse
			//redirect(current_url()); ---> Vuelve a la pagina que estaba antes de loguearse
			redirect(base_url('welcome'));
        }
	}


	function _valid_login($password){
		$username = $this->input->post('username');

		$result = $this->usuario_model->validarUsuario($username, $password);

		if($result){
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array('id' => $row->id,
									'nombre' => $row->nombre,
									'apellido' => $row->apellido,
									'email' => $row->email,
                  'perfil_id' => $row->perfil_id,
                  'username' => $row->username,
                  'password' => $row->password);
									
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else{	
			$this->form_validation->set_message('check_database', '<div class="alert alert-danger">Usuario o Contraseña invalido</div>');
			return false;
		}
	}
    
	public function login(){
		
		$data = array('titulo' => 'Iniciar Sesión');
		
		$session_data = $this->session->userdata('logged_in');
		
		$this->load->view('partes/head_views', $data);
		$this->load->view('partes/menu_views', $data);
		$this->load->view('login');
		$this->load->view('partes/footer_views');
	}	
    
    
    
     function cerrar_sesion(){
			//destruyo la variable de sesión
			$this->session->sess_destroy();
			//direcciono a la página principal
			redirect(base_url('welcome'));		
		}	

}