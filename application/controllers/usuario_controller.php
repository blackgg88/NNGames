<?php
class Usuario_controller extends CI_Controller{

function __construct()
{
parent::__construct();
$this ->load->model('usuario_model'); //cargamos el modelo
}

function login(){
  $data['titulo']='Iniciar Sesion';
  
  $this->load->view('partes/head_views',$data);
  $this->load->view('partes/menu_views');
  $this->load->view('login');
  $this->load->view('partes/footer_views');
}

function registrarUs(){
      $this->form_validation->set_rules('nombre', 'Nombre', 'required');
      $this->form_validation->set_rules('apellido', 'Apellido', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuario.email]');

      $this->form_validation->set_rules('username', 'Usuario', 
                      'trim|required|is_unique[usuario.username]');

      $this->form_validation->set_rules('password', 'Contraseña','required');

      $this->form_validation->set_rules('confirm_password', 'Repetir contraseña', 'required|matches[password]');

      $this->form_validation->set_message('required',
                    '<div class="alert alert-danger">El campo %s es obligatorio</div>');

      $this->form_validation->set_message('matches',
                    '<div class="alert alert-danger">Los contraseña ingresada no coincide</div>');

      $this->form_validation->set_message('is_unique',
                    '<div class="alert alert-danger">El campo %s ya existe</div>');

      $pass = $this->input->post('confirm_password',true);

      $data = array(
        'nombre'=>$this->input->post('nombre',true),
        'apellido'=>$this->input->post('apellido',true),
        'email'=>$this->input->post('email',true),
        'perfil_id'=>'2',
        'username'=>$this->input->post('username',true),
        'password'=>base64_encode($pass)
      );

      if ($this->form_validation->run() == FALSE){
        $data = array('titulo' => 'Error de formulario');
        $this->load->view('partes/head_views', $data);
        $this->load->view('partes/menu_views');
        $this->load->view('registro');
        $this->load->view('partes/footer_views');    
      }else{
        $usuario = $this->usuario_model->add_user($data);

        if ($this->_veri_log()) {
          redirect('usuarios');
        }else{
        redirect('login');
        }
      }
}

function miCuenta(){
    $session_data = $this->session->userdata('logged_in');
    $dat['titulo']='Mi Cuenta';
    $dat['id'] = $session_data['id'];
    $dat['username'] = $session_data['username'];
    $dat['perfil_id'] = $session_data['perfil_id'];
    $dat['nombre'] = $session_data['nombre'];
    $dat['apellido'] = $session_data['apellido'];
    $dat['email'] = $session_data['email'];
    $this->load->view('partes/head_views',$dat);
    $this->load->view('partes/menu_views');
    $this->load->view('panel/usuario/backuser',$dat);
    $this->load->view('partes/footer_views');
}

function edit_pasu(){
    $session_data = $this->session->userdata('logged_in');
    $data['titulo']='Editar contraseña';
    $data['id'] = $session_data['id'];
    $data['username'] = $session_data['username'];
    $data['perfil_id'] = $session_data['perfil_id'];
    $data['nombre'] = $session_data['nombre'];
    $data['apellido'] = $session_data['apellido'];
    $data['email'] = $session_data['email'];
    $this->load->view('partes/head_views',$data);
    $this->load->view('partes/menu_views');
    $this->load->view('panel/usuario/editPass');
    $this->load->view('partes/footer_views');
}

function validPassword(){
    $this->form_validation->set_rules('password', 'Contraseña','callback_check_database');
    $this->form_validation->set_rules('new_password', 'Nueva contraseña','required');
    $this->form_validation->set_rules('confirm_password', 'Confirmacion de contraseña', 'matches[new_password]');

    $this->form_validation->set_message('matches','<div class="alert alert-danger">El campo %s no coincide</div>');

    $session_data = $this->session->userdata('logged_in');
    $id = $session_data['id'];
    $pass = $this->input->post('confirm_password',true);
    $dat = array(
      'password'=>base64_encode($pass)
    );
    if ($this->form_validation->run() == FALSE){

        $data = array('titulo' => 'Error de formulario');
        $session_data = $this->session->userdata('logged_in');
        $data['perfil_id'] = $session_data['perfil_id'];        
        $data['nombre'] = $session_data['nombre'];
        $data['apellido'] = $session_data['apellido'];
        $this->load->view('partes/head_views', $data);
        $this->load->view('partes/menu_views');
        $this->load->view('panel/usuario/editPass',$dat);
        $this->load->view('partes/footer_views');
    }else{
        $this->usuario_model->update_usuario($id, $dat);

        redirect('MiCuenta','refresh');
    }
}

function edit_email(){
    $session_data = $this->session->userdata('logged_in');
    $data['titulo']='Editar email';
    $data['id'] = $session_data['id'];
    $data['username'] = $session_data['username'];
    $data['perfil_id'] = $session_data['perfil_id'];
    $data['nombre'] = $session_data['nombre'];
    $data['apellido'] = $session_data['apellido'];
    $data['email'] = $session_data['email'];
    $this->load->view('partes/head_views',$data);
    $this->load->view('partes/menu_views');
    $this->load->view('panel/usuario/editMail',$data);
    $this->load->view('partes/footer_views');
}

function validEmail(){
    $this->form_validation->set_rules('new_email', 'dirección de correo electrónico','required|trim|valid_email|is_unique[usuario.email]');
    $this->form_validation->set_rules('confirm_email', 'Confirmacion de email', 'matches[new_email]');

    $this->form_validation->set_message('matches','<div class="alert alert-danger">El campo %s no coincide</div>');
    $this->form_validation->set_message('is_unique',
                    '<div class="alert alert-danger">Esta %s ya existe</div>');

    $session_data = $this->session->userdata('logged_in');
    $id = $session_data['id'];
    $emailN = $this->input->post('confirm_email',true);
    $dat = array(
    'email'=>($emailN)
    );
    if ($this->form_validation->run() == FALSE){
      //Muestra la página de registro con el título de error
        $data = array('titulo' => 'Error de formulario');
        $session_data = $this->session->userdata('logged_in');
        $data['perfil_id'] = $session_data['perfil_id'];
        $data['nombre'] = $session_data['nombre'];
        $data['apellido'] = $session_data['apellido'];
        $this->load->view('partes/head_views', $data);
        $this->load->view('partes/menu_views');
        $this->load->view('panel/usuario/editMail',$dat);
        $this->load->view('partes/footer_views');
    } else  //Pasa la validacion
      {
        //Envio array al metodo insert para registro de datos
        //
      $this->usuario_model->update_usuario($id, $dat);
      $result = $this->usuario_model->get_usuario($id);
      if($result != FALSE)
      {  //Si el resultado es correcto lo asigna a la variable session
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array('id' => $row->id,
              'nombre' => $row->nombre,
              'apellido' => $row->apellido,
              'email' => $row->email,
              'perfil_id' => $row->perfil_id,
              'username' => $row->username,
              'password' => $row->password
        );
                  
        $this->session->set_userdata('logged_in', $sess_array);
      }
    }

        //Redirecciono a la pagina de perfil
       redirect('MiCuenta', 'refresh');
    }
  }

  function check_database($password){
      $session_data = $this->session->userdata('logged_in');
      $username = $session_data['username'];
      $result = $this->usuario_model->validarUsuario($username, $password);

        if($result){
        return TRUE;
        }else{
          $this->form_validation->set_message('check_database', '<div class="alert alert-danger">Contraseña incorrecta</div>');
          return false;
        }
    }

  private function _veri_log()
    {
      if ($this->session->userdata('logged_in')) {
        return TRUE;
      } else {
        return FALSE;
      }

    }

    function activos(){
    if($this->_veri_log())
    {
      $session_data = $this->session->userdata('logged_in');
      $dat['titulo'] = 'Usuarios Activos';
      $dat['perfil_id'] = $session_data['perfil_id'];
      $dat['nombre'] = $session_data['nombre'];
      $dat['apellido'] = $session_data['apellido'];     
      $data = array(
        'usuarios' => $this->usuario_model->get_usuarios()
        );
      $this->load->view('partes/head_views',$dat);
      $this->load->view('partes/menu_views');
      $this->load->view('panel/panel');
      $this->load->view('panel/usuario/usuario_views', $data);
      $this->load->view('partes/footer_views');
    }
    else
    {
      redirect('ingreso', 'refresh');
    }
  }

  function remove_usuario(){
    $id = $this->uri->segment(2);
    $data = array(
      'disable'=>'1'
      );
    $this->usuario_model->estado_usuario($id, $data);
    redirect('usuarios', 'refresh');
  }

  public function new_user(){
    $data['titulo']='Agregar Usuario';

    $session_data = $this->session->userdata('logged_in');
    $data['id'] = $session_data['id'];
    $data['perfil_id'] = $session_data['perfil_id'];
    $data['nombre'] = $session_data['nombre'];
    $data['apellido'] = $session_data['apellido'];

    $this->load->view('partes/head_views',$data);
    $this->load->view('partes/menu_views');
    $this->load->view('panel/panel');
    $this->load->view('panel/usuario/agregar_usuario_view');
    $this->load->view('partes/footer_views');
  }

  function modContrasena(){
    $id = $this->uri->segment(2);

    $session_data = $this->session->userdata('logged_in');

    $data['titulo']='Editar contraseña';
    $data['perfil_id'] = $session_data['perfil_id'];
    $data['nombre'] = $session_data['nombre'];
    $data['apellido'] = $session_data['apellido'];

    $result = $this->usuario_model->get_usuario($id);
    if($result != FALSE){
      foreach($result as $row)
      {
        $dat = array('id' => $row->id,
              'nombre' => $row->nombre,
              'apellido' => $row->apellido,
              'email' => $row->email,
              'perfil_id' => $row->perfil_id,
              'username' => $row->username,
              'password' => $row->password);
      }
    }

    $this->load->view('partes/head_views',$data);
    $this->load->view('partes/menu_views');
    $this->load->view('panel/panel');
    $this->load->view('panel/usuario/modPass',$dat);
    $this->load->view('partes/footer_views');
  }

  function validmodPass(){
    $id = $this->uri->segment(2);
    $this->form_validation->set_rules('new_password', 'Nueva contraseña','required');
    $this->form_validation->set_rules('confirm_password', 'Confirmacion de contraseña', 'matches[new_password]');

    $this->form_validation->set_message('matches','<div class="alert alert-danger">El campo %s no coincide</div>');
    $pass = $this->input->post('confirm_password',true);
    $dat = array(
      'password'=>base64_encode($pass),
      'id' => $id
    );
    if ($this->form_validation->run() == FALSE){
      //Muestra la página de registro con el título de error
        $data = array('titulo' => 'Error de formulario');
        $session_data = $this->session->userdata('logged_in');
        $data['perfil_id'] = $session_data['perfil_id'];        
        $data['nombre'] = $session_data['nombre'];
        $data['apellido'] = $session_data['apellido'];

        $result = $this->usuario_model->get_usuario($id);

        if($result != FALSE){
          foreach($result as $row){
            $dat = array('id' => $row->id,
            'nombre' => $row->nombre,
            'apellido' => $row->apellido,
            'email' => $row->email,
            'perfil_id' => $row->perfil_id,
            'username' => $row->username,
            'password' => $row->password);
          }
        }
      $this->load->view('partes/head_views',$data);      
      $this->load->view('partes/menu_views');
      $this->load->view('panel/panel');
      $this->load->view('panel/usuario/modPass',$dat);
      $this->load->view('partes/footer_views');
    } else  //Pasa la validacion
      {
        //Envio array al metodo insert para registro de datos
        $this->usuario_model->update_usuario($id, $dat);

        //Redirecciono a la pagina de perfil
        redirect('usuarios','refresh');
    }
  }

  function modPerfil(){
    $id = $this->uri->segment(2);
    $dat['id'] = $id;

    $session_data = $this->session->userdata('logged_in');

    $data['titulo']='Editar Perfil';
    $data['perfil_id'] = $session_data['perfil_id'];
    $data['nombre'] = $session_data['nombre'];
    $data['apellido'] = $session_data['apellido'];

    $result = $this->usuario_model->get_usuario($id);
    if($result != FALSE){
      foreach($result as $row)
      {
        $dat = array('id' => $row->id,
            'nombre' => $row->nombre,
            'apellido' => $row->apellido,
            'email' => $row->email,
            'perfil_id' => $row->perfil_id,
            'username' => $row->username,
            'password' => $row->password);
      }
    }
    $this->load->view('partes/head_views',$data);
    $this->load->view('partes/menu_views');
    $this->load->view('panel/panel');
    $this->load->view('panel/usuario/modPer',$dat);
    $this->load->view('partes/footer_views');
  }

  function validmodPerf(){
    $id = $this->uri->segment(2);
    $this->form_validation->set_rules('new_perfil', 'Nuevo perfil','required');

    $perfil_id = $this->input->post('new_perfil',true);
    $dat = array(
      'perfil_id'=>$perfil_id,
      'id' => $id
    );
    if ($this->form_validation->run() == FALSE){
      //Muestra la página de registro con el título de error
      //
        $data = array('titulo' => 'Error de formulario');

        $session_data = $this->session->userdata('logged_in');

        $data['perfil_id'] = $session_data['perfil_id'];        
        $data['nombre'] = $session_data['nombre'];
        $data['apellido'] = $session_data['apellido'];

        $result = $this->usuario_model->get_usuario($id);
        if($result != FALSE){
          foreach($result as $row){
            $dat = array('id' => $row->id,
                  'nombre' => $row->nombre,
                  'apellido' => $row->apellido,
                  'email' => $row->email,
                  'perfil_id' => $row->perfil_id,
                  'username' => $row->username,
                  'password' => $row->password);
          }
         }
        $this->load->view('partes/head_views', $data);
        $this->load->view('partes/menu_views');
        $this->load->view('panel/panel');
        $this->load->view('panel/usuario/modPer',$dat);
        $this->load->view('partes/footer_views');
      } else  //Pasa la validacion
      {
        //Envio array al metodo insert para registro de datos
        $this->usuario_model->update_usuario($id, $dat);

        //Redirecciono a la pagina de perfil
        redirect('usuarios','refresh');
    }
  }

  function panelInicio(){
    $data = array('titulo' => 'Panel de control');
    $session_data = $this->session->userdata('logged_in');
    $data['perfil_id'] = $session_data['perfil_id'];        
    $data['nombre'] = $session_data['nombre'];
    $data['apellido'] = $session_data['apellido'];

    $this->load->view('partes/head_views', $data);
    $this->load->view('partes/menu_views');
    $this->load->view('panel/panel');
    $this->load->view('panel/panel_views');
    $this->load->view('partes/footer_views');
  }

  function disabled_usuarios(){     
    if($this->_veri_log())
    {
      $session_data = $this->session->userdata('logged_in');
      $data['titulo'] = 'Usuarios Desactivados';
      $data['perfil_id'] = $session_data['perfil_id'];
      $data['nombre'] = $session_data['nombre'];
      $data['apellido'] = $session_data['apellido'];       
      $dat = array(
        'usuarios' => $this->usuario_model->not_active_usuarios()
        );
      $this->load->view('partes/head_views', $data);
      $this->load->view('partes/menu_views');
      $this->load->view('panel/panel');
      $this->load->view('panel/usuario/usuariosD_views',$dat);
      $this->load->view('partes/footer_views');     
    }else{
      redirect('ingreso', 'refresh');
    }
  }
    //Cambia el estado de un usuario, para que pase a estar activo.
  function active_usuario(){
    $id = $this->uri->segment(2);
    $data = array(
      'disable'=>'0'
      );
    $this->usuario_model->estado_usuario($id, $data);
    redirect('usuarios_desactivados', 'refresh');
  }
  function agregarUs(){
    $this->form_validation->set_rules('nombre', 'Nombre', 'required');
    $this->form_validation->set_rules('apellido', 'Apellido', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuario.email]');

    $this->form_validation->set_rules('username', 'Usuario','trim|required|is_unique[usuario.username]');

    $this->form_validation->set_rules('password', 'Contraseña','required');

    $this->form_validation->set_rules('confirm_password', 'Repetir contraseña', 'required|matches[password]');

    $this->form_validation->set_message('required',
                    '<div class="alert alert-danger">El campo %s es obligatorio</div>');

    $this->form_validation->set_message('matches',
                    '<div class="alert alert-danger">Los contraseña ingresada no coincide</div>');

    $this->form_validation->set_message('is_unique',
                    '<div class="alert alert-danger">El campo %s ya existe</div>');

    $pass = $this->input->post('confirm_password',true);

    $data = array(
      'nombre'=>$this->input->post('nombre',true),
      'apellido'=>$this->input->post('apellido',true),
      'email'=>$this->input->post('email',true),
      'perfil_id'=>'2',
      'username'=>$this->input->post('username',true),
      'password'=>base64_encode($pass)
    );

    if ($this->form_validation->run() == FALSE){
      $data = array('titulo' => 'Error de formulario');
      $this->load->view('partes/head_views',$data);
      $this->load->view('partes/menu_views');
      $this->load->view('panel/panel');
      $this->load->view('panel/usuario/agregar_usuario_view');
      $this->load->view('partes/footer_views');    
    }else{
      $usuario = $this->usuario_model->add_user($data);

      if ($this->_veri_log()) {
        redirect('usuarios');
      }else{
        redirect('login');
      }
    }
  }
}
