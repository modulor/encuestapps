<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends CI_Controller{

	function __construct()
	{

		parent::__construct();
		
		if(!$this->session->userdata('login'))
			redirect(base_url()."login","refresh");

		$this->load->model("Usuarios_model");

	}
	

	public function index()
	{

		$this->mi_perfil();

	}


	// mi perfil: editar datos personales de una cuenta de usuario

	public function mi_perfil()
	{

		if($this->input->post())
			$datos['ok'] = $this->Usuarios_model->editar_perfil($this->input->post());

		$datos['mi_perfil'] = $this->Usuarios_model->mi_perfil();

		$datos['perfil_view'] = $this->Usuarios_model->perfil_view();

		$datos['contenido_view'] = "configuracion/mi_perfil_view";

		$this->load->view('base_view',$datos);

	}


	// cambiar password

	public function cambiar_password()
	{

		if($this->input->post())
			$datos['ok'] = $this->Usuarios_model->cambiar_password($this->input->post());

		$datos['contenido_view'] = "configuracion/cambiar_password_view";

		$this->load->view('base_view',$datos);

	}

}

?>