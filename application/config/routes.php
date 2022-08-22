<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route["default_controller"] = "welcome";
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route["404_override"] = "errors/page_missing";
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route["translate_uri_dashes"] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. "-" isn"t a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route["default_controller"] = "welcome";
$route["inicio"] = "welcome";
$route["contacto"] = "Welcome/contacto";
$route["nosotros"] = "Welcome/nosotros";
$route["terminos"] = "Welcome/terminos";
$route["comercializacion"] = "Welcome/comercializacion";
$route["MiCuenta"] = "usuario_controller/miCuenta";
$route["registro"] = "welcome/registro";
$route["editar_pass"] = "usuario_controller/edit_pasu";
$route["editar_correo"] = "usuario_controller/edit_email";
$route["login"] = "usuario_controller/login";
$route["tienda/(:num)"] = "shop_controller";
$route["anadirCarrito"] = "shop_controller/add_cart";
$route["checkout"] = "shop_controller/resumen_compra";
$route['validar_compra'] = "shop_controller/validEnvio";
$route['listado_ventas'] = "venta_controller/mostrar";
$route["usuarios"] = "usuario_controller/activos";
$route["productos"] = "producto_controller";
$route["nuevo_usuario"] = "usuario_controller/new_user";
$route["usuarios_desactivados"] = "usuario_controller/disabled_usuarios";
$route["vista_detalle/(:num)"] = "venta_controller/ver_detalle/$1";

$route["productos"] = "producto_controller";
$route["PanelControl"] = "usuario_controller/panelInicio";

$route["leer/(:num)"] = "consulta_controller/leido/$1";
$route["noleer/(:num)"] = "consulta_controller/no_leido/$1";

$route["modContrasena/(:num)"] = "usuario_controller/modContrasena/$1";
$route["modPerfil/(:num)"] = "usuario_controller/modPerfil/$1";
$route["validmodPassword/(:num)"] =  "usuario_controller/validmodPass/$1";
$route["validmodPerfil/(:num)"] =  "usuario_controller/validmodPerf/$1";

$route["carrito"] = "shop_controller/carrito";
$route["verificoPass"] = "usuario_controller/validPassword";
$route["verificoEmail"] = "usuario_controller/validEmail";

$route["eliminar_usuario/(:num)"] = "usuario_controller/remove_usuario/$1";
$route["activar_usuario/(:num)"] = "usuario_controller/active_usuario/$1";
$route["verificoUsuario"] = "loginController";
$route["registrarse"] = "usuario_controller/registrarUs";
$route["logout"] = "loginController/cerrar_sesion";

$route["registro_producto"] = "producto_controller/agrega_producto";
$route["form_inse_p"] = "producto_controller/form_agrega_producto";

$route["remove_producto/(:num)"] = "producto_controller/eliminar_producto/$1";
$route["producto_up/(:num)"] = "producto_controller/modificar_producto/$1";
$route["producto_edit/(:num)"] = "producto_controller/muestra_modificar/$1";
$route["productos_activa/(:num)"] = "producto_controller/activar_producto/$1";
$route["producto_disabled"] = "producto_controller/muestra_eliminados";


$route['consulta'] = "consulta_controller";
$route['enviado'] = "consulta_controller/sended_msj";
$route['listado_consultas'] = "consulta_controller/mostrar";

$route["translate_uri_dashes"] = FALSE;
$route["404_override"] = "";