<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class shop_controller extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('shop_model');
    $this->load->library('cart');
  }

  private function _veri_log(){
    if ($this->session->userdata('logged_in')){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function index(){
    $cat = $this->uri->segment(2);
    
    if ($cat == '1') {
    $data['productos'] = $this->shop_model->get_hombres();
    }else if ($cat == '2') {
      $data['productos'] = $this->shop_model->get_mujeres();
    }else if ($cat == '3') {
       $data['productos'] = $this->shop_model->get_accesorios();
    }else if ($cat == '0'){
    $data['productos'] = $this->shop_model->get_all();      
    }

    $session_data = $this->session->userdata('logged_in');

    $dat['titulo'] = 'Catalogo';
    
    $this->load->view('partes/head_views.php',$dat);
    $this->load->view('partes/menu_views.php');   
    $this->load->view('carrito/shop_view',$data);
    $this->load->view('partes/footer_views');
  }

  function resumen_compra(){
    $session_data = $this->session->userdata('logged_in');

    $dat['titulo'] = 'Compra';
    
    $this->load->view('partes/head_views.php',$dat);
    $this->load->view('partes/menu_views.php');   
    $this->load->view('carrito/resumenCompra');
    $this->load->view('partes/footer_views');
  }

  function carrito(){
    $session_data = $this->session->userdata('logged_in');

    $dat['titulo'] = 'Carrito';
    
    $this->load->view('partes/head_views.php',$dat);
    $this->load->view('partes/menu_views.php');   
    $this->load->view('carrito/carrito_view');
    $this->load->view('partes/footer_views');
  }
  function busqueda(){
    $query=$this->input->post('query',TRUE);
    $data['productos'] = $this->shop_model->buscar_productos(trim($query));
    $session_data = $this->session->userdata('logged_in');
    $dat['titulo'] = 'Catalogo';

    $this->load->view('partes/head_views.php',$dat);
    $this->load->view('partes/menu_views.php');   
    $this->load->view('carrito/shop_view', $data);
    $this->load->view('partes/footer_views');
  }


  function add_cart(){
    if ($this->_veri_log()){
      $insert_data = array(
        'id' => $this->input->post('id'),
        'name' => $this->input->post('name'),
        'price' => $this->input->post('price'),
        'qty' => 1
      );
      $this->cart->insert($insert_data);
      redirect('tienda/0');
    }else{
      redirect('login','refresh');
    }
  }

  function remove($rowid) {
    if ($rowid==="all"){
      $this->cart->destroy();
    }else{
      $data = array(
        'rowid'   => $rowid,
        'qty'     => 0
        );
      $this->cart->update($data);
    }
    redirect('carrito');
  }

  function update_cart(){
    $cart_info =  $_POST['cart'] ;
    foreach( $cart_info as $id => $cart)
    { 
      $rowid = $cart['rowid'];
      $price = $cart['price'];
      $amount = $price * $cart['qty'];
      $qty = $cart['qty'];

      $data = array(
        'rowid'   => $rowid,
        'price'   => $price,
        'amount' =>  $amount,
        'qty'     => $qty
        );

      $this->cart->update($data);
    }
    redirect('shop_controller/carrito');        
  }

  public function save_order(){
    if ($this->session->userdata('logged_in')) {
      $cust_id = $this->session->userdata('logged_in');
      $grand_total=0;
      if ($cart = $this->cart->contents()){
        foreach ($cart as $item){
          $grand_total = $grand_total + $item['subtotal'];
        }
     }
      date_default_timezone_set("America/Argentina/Buenos_Aires");
      $order = array(
        'fecha'       => date('Y-m-d-G-i-s'),
        'usuario_id'  => $cust_id['id'],
        'total'=>$grand_total,
        'direccion'=>$this->input->post('direccion',true),
        'codigo_postal'=>$this->input->post('codPostal',true),
        'ciudad'=>$this->input->post('ciudad',true),
        'provincia'=>$this->input->post('provincia',true),
        );    

      $ord_id = $this->shop_model->insert_order($order);

      if ($cart = $this->cart->contents()){
        foreach ($cart as $item){
          $order_detail = array(
            'venta_id'=>$ord_id,
            'producto_id'=>$item['id'],
            'cantidad'=>$item['qty'],
            'subtotal'=>$item['subtotal']
            ); 
          $cust_id = $this->shop_model->insert_order_detail($order_detail);
          }
        }

        $this->cart->destroy();
        $dat['titulo'] = 'Catalogo';

        $session_data = $this->session->userdata('logged_in');

        $this->load->view('partes/head_views.php',$dat);
        $this->load->view('partes/menu_views.php');
        $this->load->view('carrito/compra_realizada');
        $this->load->view('partes/footer_views');
      }else{
        redirect('login','refresh');
      }
    }

    function validEnvio(){
      $this->form_validation->set_rules('direccion', 'Direccion', 'required');
      $this->form_validation->set_rules('codPostal', 'Codigo Posta', 'required|numeric');
      $this->form_validation->set_rules('ciudad', 'Ciudad/Pueblo', 'required');
      $this->form_validation->set_rules('provincia', 'Provincia', 'required');

      $this->form_validation->set_message('required',
                    '<div class="alert alert-danger">El campo %s es obligatorio</div>');

      $this->form_validation->set_message('numeric',
              '<div class="alert alert-danger">El campo %s debe contener un valor numérico</div>');

      if (!$this->form_validation->run()) {
        $data = array('titulo' => 'Error de formulario');
    
        $session_data = $this->session->userdata('logged_in');
        $data['perfil_id'] = $session_data['perfil_id'];
        $data['nombre'] = $session_data['nombre'];
        $data['apellido'] = $session_data['apellido'];


        $this->load->view('partes/head_views', $data);
        $this->load->view('partes/menu_views');
        $this->load->view('carrito/resumenCompra');
        $this->load->view('partes/footer_views');
      }else{
        $this->save_order();
      }
    }
  }