<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Producto_controller extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this ->load->model('producto_model');
		}

		private function _veri_log(){
	    	if ($this->session->userdata('logged_in')){
	    		return TRUE;
	    	} else {
	    	return FALSE;
	    	}
    	}

		function index(){
			if($this->_veri_log()){
			$data = array('titulo' => 'Productos Activos');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
      		$data['apellido'] = $session_data['apellido'];


			$dat = array('productos' => $this->producto_model->get_productos() );

			$this->load->view('partes/head_views', $data);
			$this->load->view('partes/menu_views');
			$this->load->view('panel/panel');
			$this->load->view('panel/producto/muestraproductos_view', $dat);
			$this->load->view('partes/footer_views');
			}else{
			redirect('login', 'refresh'); }
		}

		function form_agrega_producto(){
			if($this->_veri_log()){
			$data = array('titulo' => 'Agregar Producto');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
      $data['apellido'] = $session_data['apellido'];

			$this->load->view('partes/head_views', $data);
			$this->load->view('partes/menu_views');
			$this->load->view('panel/panel');
			$this->load->view('panel/producto/agregaproducto_views');
			$this->load->view('partes/footer_views');
			}else{
			redirect('login', 'refresh'); }
		}

		function agrega_producto(){
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
			$this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
			$this->form_validation->set_rules('descripcion', 'Descripción', 'required');
			$this->form_validation->set_rules('filename', 'Imagen', 'callback_image_upload');

			$this->form_validation->set_message('required',
										'<div class="alert alert-danger">El campo %s es obligatorio</div>');

			$this->form_validation->set_message('numeric',
							'<div class="alert alert-danger">El campo %s debe contener un valor numérico</div>');


			if ($this->form_validation->run() == FALSE){
				$data = array('titulo' => 'Error de formulario');


				$this->load->view('partes/head_views', $data);
				$this->load->view('partes/menu_views');
				$this->load->view('panel/panel');
				$this->load->view('panel/producto/agregaproducto_views');
				$this->load->view('partes/footer_views');
			}else{
				$this->subir_imagen();			
			}
		}

		function image_upload(){
			$this->load->library('upload');

			if (!empty($_FILES['filename']['name'])){
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';

				$config['max_size'] = '2048';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';       

				$this->upload->initialize($config);


				if ($this->upload->do_upload('filename')){
					return TRUE;
				}else{
					$imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extención incorrecto o excede el tamaño permitido que es de: 2MB </div>';
					$this->upload->display_errors();
					$this->form_validation->set_message('image_upload',$imageerrors );

				return false;
			}

			}else{
				return false;
			}
	}

		function subir_imagen(){
			$data = $this->upload->data();

				$url ="uploads/".$_FILES['filename']['name'];

				$dat = array(
						'nombre'=>$this->input->post('nombre',true),
						'precio'=>$this->input->post('precio',true),
						'imagen'=>$url,
						'descripcion'=>$this->input->post('descripcion',true),
						'categoria_id'=>$this->input->post('categoria_id',true),
						'disable'=>'0',
						);
				$datos_productos = $this->producto_model->add_producto($dat);
				redirect('productos', 'refresh');
		}

		function muestra_modificar(){
			$id = $this->uri->segment(2);
			$datos_producto = $this->producto_model->edit_producto($id);

			if ($datos_producto != FALSE) {
				foreach ($datos_producto->result() as $row) 
				{
					$nombre = $row->nombre;
					$precio = $row->precio;
					$descripcion = $row->descripcion;
					$imagen = $row->imagen;	
					$categoria_id = $row->categoria_id;
					$tipo_id = $row->tipo_id;
				}

				$dat = array('producto' =>$datos_producto,
					'id'=>$id,
					'nombre'=>$nombre,
					'precio'=>$precio,
					'descripcion'=>$descripcion,
					'imagen'=>$imagen,
					'categoria_id'=>$categoria_id,
					'tipo_id'=>$tipo_id,
				);
			} 
			else 
			{
				return FALSE;
			}
			if($this->_veri_log()){
			$data = array('titulo' => 'Modificar Producto');
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
      $data['apellido'] = $session_data['apellido'];

			$this->load->view('partes/head_views', $data);
			$this->load->view('partes/menu_views');
			$this->load->view('panel/panel');
			$this->load->view('panel/producto/modificaproducto_view', $dat);
			$this->load->view('partes/footer_views');
			}else{
			redirect('login', 'refresh');}
		}

		function modificar_producto(){
			$id = $this->uri->segment(2);
			$current_name=$this->producto_model->edit_producto($id);

			$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
			$this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
			$this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
			$this->form_validation->set_rules('descripcion', 'Descripción', 'required');
			$this->form_validation->set_rules('filename', 'Imagen', 'callback__image_modif');

			$this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio, al intentar modificar estaba vacio</div>');

			$this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico, al intentar modificar estaba vacio</div>'); 
			if ($this->form_validation->run()==FALSE){
				$datos_producto = $this->producto_model->edit_producto($id);
				foreach ($datos_producto->result() as $row){
					$imagen = $row->imagen;
				}
				$dat = array(
						'id'=>$id,
						'nombre'=>$this->input->post('nombre',true),
						'precio'=>$this->input->post('precio',true),
						'descripcion'=>$this->input->post('descripcion',true),
						'categoria_id'=>$this->input->post('categoria',true),
						'imagen'=>$imagen,
						'tipo_id'=>$this->input->post('tipoP',true),
					);
				if($this->_veri_log())
					{
					$data = array('titulo' => 'Error de formulario');
					$session_data = $this->session->userdata('logged_in');
					$data['perfil_id'] = $session_data['perfil_id'];
					$data['nombre'] = $session_data['nombre'];
        			$data['apellido'] = $session_data['apellido'];

      				$this->load->view('partes/head_views', $data);
      				$this->load->view('partes/menu_views');
      				$this->load->view('panel/panel');
     				$this->load->view('panel/producto/modificaproducto_view', $dat);
      				$this->load->view('partes/footer_views');
				}else{
					redirect('login', 'refresh');
				}
			}else{
			$dat = array(
					'nombre'=>$this->input->post('nombre',true),
					'precio'=>$this->input->post('precio',true),
					'descripcion'=>$this->input->post('descripcion',true),
					'categoria_id'=>$this->input->post('categoria_id',true),
					'tipo_id'=>$this->input->post('tipoP',true),

					);

				$this->producto_model->update_producto($id, $dat);
			if (empty($_FILES['filename']['name'])){
				redirect('productos', 'refresh');
			}else{
				$this->_image_modif();		
			}
			}
		}

	function _image_modif(){
			$this->load->library('upload');
			$id = $this->uri->segment(2);
			$dat = array(
				'nombre'=>$this->input->post('nombre',true),
				'precio'=>$this->input->post('precio',true),
				'descripcion'=>$this->input->post('descripcion',true),
				'categoria_id'=>$this->input->post('categoria_id',true),
				);
			if (!empty($_FILES['filename']['name'])){            
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';

				$config['max_size'] = '2048';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';       
				$this->upload->initialize($config);

					if ($this->upload->do_upload('filename')){
						$id = $this->uri->segment(2);
						$data = $this->upload->data();

						$url ="uploads/".$_FILES['filename']['name'];

						$dat['imagen']=$url;

						$this->producto_model->update_producto($id, $dat);
						redirect('productos', 'refresh');
					}else{
						$imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extención incorrecto o excede el tamaño permitido que es de: 2MB </div>';

					$this->form_validation->set_message('_image_modif',$imageerrors );

					return false;
					} 
			}else{
				return true;
			}
		}

	  function eliminar_producto(){
	    $id = $this->uri->segment(2); 
	    $data = array(
	    	'disable'=>'1',
	    	'tipo_id'=>'1'
	    );

	    $this->producto_model->estado_producto($id, $data);
	    redirect('productos', 'refresh');
	  }

	  function activar_producto(){
	    $id = $this->uri->segment(2);
	    $data = array(
	    		'disable'=>'0'
	    );

	    $this->producto_model->estado_producto($id, $data);
	    redirect('productos', 'refresh');
	  }

	  function muestra_eliminados(){    	
	    if($this->_veri_log()){
	    	$data = array('titulo' => 'Productos eliminados');
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
     	 	$data['apellido'] = $session_data['apellido'];
			
			$dat = array(
		      'productos' => $this->producto_model->not_active_productos()
			);

			$this->load->view('partes/head_views', $data);
			$this->load->view('partes/menu_views');
			$this->load->view('panel/panel');
			$this->load->view('panel/producto/muestraeliminados_view', $dat);
			$this->load->view('partes/footer_views');
			}else{
				redirect('login', 'refresh');
			}
		}
	}