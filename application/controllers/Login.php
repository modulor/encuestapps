<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index(){

		$datos_sesion = $this->session->all_userdata();

        if (isset($datos_sesion['login']) && $datos_sesion['login'] == TRUE)

            $this->login_redirect($datos_sesion['nivel']);

        if (!isset($_POST['email'])){

            $data['contenido_view'] = "login_view";
            $this->load->view('login_view',$data);

        }                   

        else{

            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'Contrase&ntilde;a', 'required');

            if (($this->form_validation->run() == FALSE)){

                $data['contenido_view'] = "login_view";
                $this->load->view('login_view',$data);

            }               

            else{
                
                $existeemail = $this->Login_model->existeUsuario($_POST['email'], $_POST['password']);

                if ($existeemail){

                    if($existeemail->estatus==0){

                        // cuenta de usuario "inactiva"

                        $data['error'] = "Su cuenta a&uacute;n no ha sido activada";
                        $data['contenido_view'] = "login_view";
                        $this->load->view('login_view', $data);

                    }
                    else{

                        // cuenta de usuario activa

                        $datos_sesion = array(

                            'login' => TRUE,
                            'email' => $_POST['email'],
                            'usuarios_k' => $existeemail->usuarios_k,
                            'nivel' => $existeemail->usuarios_niveles_k

                        );

                        $this->session->set_userdata($datos_sesion);

                        $this->login_redirect($existeemail->usuarios_niveles_k);

                    }
                    
                    
                } 
                else{

                    $data['error'] = "email o password incorrecto";
                    $data['contenido_view'] = "login_view";
                    $this->load->view('login_view', $data);

                }
            }
        }
	}


    // login desde la compra de una solucion
    function login_ajax(){

        if(isset($_POST['login_email'])){

            $existeemail = $this->Login_model->existeUsuario($_POST['login_email'], $_POST['login_password']);

            if ($existeemail){

                // session data

                /*

                $datos_sesion = array(

                    'login' => TRUE,
                    'email' => $_POST['login_email'],
                    'usuarios_k' => $existeemail->usuarios_k,
                    'nivel' => $existeemail->usuarios_niveles_k

                );

                $this->session->set_userdata($datos_sesion);

                */


                // obtener informacion de "datos_clientes"
                
                $this->load->model("usuarios_model");
                
                $info_cliente = $this->usuarios_model->info($existeemail->usuarios_k);

                $data = array(
                    'respuesta' => 'logueado',
                    'email' =>  $_POST['login_email'],
                    'nombre' => $info_cliente->nombre,
                    'apellidos' => $info_cliente->apellidos,
                    'telefono' => $info_cliente->telefono,
                    'calle' => $info_cliente->calle,
                    'num_int' => $info_cliente->num_int,
                    'num_ext' => $info_cliente->num_ext,
                    'colonia' => $info_cliente->colonia,
                    'ciudad' => $info_cliente->ciudad,
                    'codigo_postal' => $info_cliente->codigo_postal,
                    'latitud_mapa' => $info_cliente->latitud_mapa,
                    'longitud_mapa' => $info_cliente->longitud_mapa,
                    'datos_clientes_k' => $info_cliente->datos_cliente_k
                );


                // buscar si tiene servicios recurrentes

                $this->load->model('ordenes_servicio_model');

                $servicio_recurrente = $this->ordenes_servicio_model->servicio_recurrente_cliente($info_cliente->datos_cliente_k,$_POST['servicios_k']);

                $data['tiene_servicio_recurrente'] = 'no';

                if($servicio_recurrente){

                    $data['tiene_servicio_recurrente'] = "si";

                }

                //$data['servicios_k'] = $_POST['servicios_k'];


                // buscar si tiene un cupon con candado

                $this->load->model("cupones_model");

                $cupon_bloqueado = $this->cupones_model->cliente_cupon_bloqueado($info_cliente->datos_cliente_k);

                $data['nombre_cupon'] = $cupon_bloqueado;

                // buscar si tiene un cupon usado

                $cupon_usado = $this->cupones_model->cliente_cupon_usado($info_cliente->datos_cliente_k);

                $data['cupon_usado'] = $cupon_usado;

            }
            else{

                $data = array(
                    'respuesta' => 'no'
                );                

            }

            print json_encode($data);                

        }

    }


	function cerrar_sesion(){

        $this->session->sess_destroy();
        redirect(base_url(),'refresh');

    } 


    function login_redirect($usuarios_niveles_k){

        switch ($usuarios_niveles_k){

            // admin

            case 99:

                $datos_sesion['menu_principal'] = "menu/menu_admin_view";
                $controlador = "inicio";

            break;


            // cliente

            case 50:

                $datos_sesion['menu_principal'] = "menu/menu_cliente_view";
                $controlador = "encuestas/mis_encuestas";

            break;


            // encuestador

            case 20:

                $datos_sesion['menu_principal'] = "menu/menu_encuestador_view";
                $controlador = "encuestas/mis_encuestas";

            break;                            
            
        }

        $this->session->set_userdata($datos_sesion);
        
        redirect(base_url().$controlador, 'refresh'); break;

    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */

?>