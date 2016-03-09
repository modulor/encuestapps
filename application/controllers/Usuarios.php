<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{

	function __construct()
	{

		parent::__construct();
		
		if(!$this->session->userdata('login'))
			redirect(base_url()."login","refresh");

		$this->load->model("Usuarios_model");

	}
	

	public function index()
	{



	}


	// validar un email cuando cambia en editar perfil

	public function validar_no_existe_email()
	{

		$email = $_POST['email'];
		$email_old = $_POST['email_old'];

		if($this->Usuarios_model->existe_email($email,$email_old))
			$data['respuesta'] = "si";
		else
			$data['respuesta'] = "no";

        print json_encode($data);  

	}


	

}

?>