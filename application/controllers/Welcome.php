<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function _construct() {
		parent::_construct();
    $this->load->model('shop_model');
    $this->load->library('cart');
	}

	public function index(){
    	$this->load->model('shop_model');
    	$dat['productos'] = $this->shop_model->get_destacado();
		$data['titulo'] = 'Inicio';

		$this->load->view('partes/head_views',$data);
		$this->load->view('partes/menu_views');		
		$this->load->view('index',$dat);
		$this->load->view('partes/footer_views');

	}
	public function contacto(){
		$data['titulo'] = 'Contacto';
    	$data['vision'] = 'hidden';

		$this->load->view('partes/head_views',$data);
		$this->load->view('partes/menu_views');
		$this->load->view('contacto');
		$this->load->view('partes/footer_views');
	}
	public function nosotros(){
		$data['titulo']='Nosotros';

		$this->load->view('partes/head_views',$data);
		$this->load->view('partes/menu_views');
		$this->load->view('nosotros');
		$this->load->view('partes/footer_views');
	}
	public function terminos(){
		$data['titulo']='Terminos y condiciones';

		$session_data = $this->session->userdata('logged_in');
		$this->load->view('partes/head_views',$data);
		$this->load->view('partes/menu_views');
		$this->load->view('terminos');
		$this->load->view('partes/footer_views');
	}
		public function comercializacion(){
		$data['titulo']='Comercializacion';

		$session_data = $this->session->userdata('logged_in');

		$this->load->view('partes/head_views',$data);
		$this->load->view('partes/menu_views');
		$this->load->view('comercializacion');
		$this->load->view('partes/footer_views');
	}
		public function registro(){
		$data['titulo']='Crear cuenta';

		$this->load->view('partes/head_views',$data);
		$this->load->view('partes/menu_views');
		$this->load->view('registro');
		$this->load->view('partes/footer_views');
	}
}
