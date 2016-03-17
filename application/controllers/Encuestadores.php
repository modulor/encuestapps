<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestadores extends CI_Controller{

	function __construct()
	{

		parent::__construct();
		
		if(!$this->session->userdata('login') || $this->session->userdata("nivel")<50)
			redirect(base_url()."login","refresh");

		$this->load->model("Encuestadores_model");

		$this->load->model("Usuarios_model");

	}
	

	public function index()
	{

		$this->nuevo();

	}


	// nuevo encuestador

	public function nuevo()
	{

		if($this->input->post())
			$datos['ok'] = $this->Encuestadores_model->nuevo($this->input->post());

		$datos['datos_clientes_k'] = $this->Usuarios_model->get_datos_clientes_k($this->session->userdata("usuarios_k"));

		$datos['contenido_view'] = "encuestadores/nuevo_view";

		$this->load->view("base_view",$datos);

	}


	// lista de encuestadores

	public function lista()
	{

		$datos_clientes_k = $this->Usuarios_model->get_datos_clientes_k($this->session->userdata("usuarios_k"));

		$datos['encuestadores'] = $this->Encuestadores_model->lista($datos_clientes_k);

		$datos['contenido_view'] = "encuestadores/lista_view";

		$this->load->view("base_view",$datos);

	}


	// devuelve la info de un encuestador

	public function info($usuarios_k)
	{

		if($this->Usuarios_model->validar($usuarios_k)):

			$this->load->library('typography');

			$datos['encuestador'] = $this->Encuestadores_model->info($usuarios_k);

			$this->load->view("encuestadores/info_view",$datos);

		endif;

	}


	// cambiar el estatus de un encuestador a traves de su 'usuarios_k'

	public function cambiar_estatus($usuarios_k)
	{

		if($this->Usuarios_model->validar($usuarios_k)):

			$cambiar = $this->Encuestadores_model->cambiar_estatus($usuarios_k);

			$this->lista();

		endif;

	}


	// borrar encuestador

	public function borrar($usuarios_k)
	{

		if(!$this->Usuarios_model->validar($usuarios_k))
			redirect(base_url(),"refresh");

		if($this->input->post())
			$datos['ok'] = $this->Encuestadores_model->borrar($usuarios_k);
		else
			$datos['encuestador'] = $this->Encuestadores_model->info($usuarios_k);

		$datos['contenido_view'] = "encuestadores/borrar_view";

		$this->load->view("base_view",$datos);

	}


	// ver las encuestas que ha realizado un encuestador

	public function encuestas($usuarios_k = "")
	{

		if(!$this->Usuarios_model->validar($usuarios_k))
			redirect(base_url(),"refresh");

		$datos['encuestador'] = $this->Encuestadores_model->info($usuarios_k);

		$datos['contenido_view'] = "encuestadores/encuestas_view";

		$this->load->view("base_view",$datos);

	}

}

?>