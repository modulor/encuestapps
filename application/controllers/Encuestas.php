<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestas extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login'))
			redirect(base_url()."login","refresh");

		$this->load->model("Encuestas_model");

		$this->load->model("Usuarios_model");

	}
	

	public function index()
	{

		$this->aplicar();		

	}


	// aplicar una encuesta

	public function aplicar($encuestas_k)
	{

		if(!$this->Encuestas_model->validar_encuesta($encuestas_k))
			redirect(base_url(),"refresh");

		if($this->input->post())
			
			$datos['ok'] = $this->Encuestas_model->guardar_resultados($this->input->post());		

		$datos['encuesta'] = $this->Encuestas_model->get_encuesta($encuestas_k);

		$datos['preguntas'] = $this->Encuestas_model->get_preguntas_encuesta($encuestas_k);

		$datos['contenido_view'] = "encuestas/aplicar_view";

		$this->load->view('base_view',$datos);

	}


	// crear encuesta nueva

	public function crear()
	{

		if($this->session->userdata('nivel')<50)
			redirect(base_url(),"refresh");

		if($this->input->post()):

			// guardamos la encuesta

			$datos['ok'] = $this->Encuestas_model->crear($this->input->post());

			redirect(base_url()."encuestas/mis_encuestas","refresh");

		else:

			// obtener datos_clientes_k
	 
			$datos['datos_clientes_k'] = $this->Usuarios_model->get_datos_clientes_k($this->session->userdata("usuarios_k"));

			$datos['contenido_view'] = "encuestas/crear_view";

			$this->load->view("base_view",$datos);

		endif;

	}


	// agrega pregunta a un cuestionario

	public function agrega_pregunta($indice)
	{		

		$datos['indice'] = $indice;

		$this->load->view("encuestas/agrega_pregunta_view",$datos);

	}


	// mis encuestas 

	public function mis_encuestas()
	{

		// obtener datos_clientes_k
 
		$datos_clientes_k = $this->Usuarios_model->get_datos_clientes_k($this->session->userdata("usuarios_k"));

		$datos['encuestas'] = $this->Encuestas_model->mis_encuestas($datos_clientes_k);

		$datos['contenido_view'] = "encuestas/mis_encuestas_view";

		$this->load->view("base_view",$datos);

	}


	// resultados

	public function resultados($encuestas_k = "")
	{

		if(!$this->Encuestas_model->validar_encuesta($encuestas_k))
			redirect(base_url(),"refresh");	

		$datos['encuesta'] = $this->Encuestas_model->get_encuesta($encuestas_k);

		$datos['preguntas'] = $this->Encuestas_model->get_preguntas_encuesta($encuestas_k);

		$datos['contenido_view'] = "encuestas/resultados_view";

		$this->load->view('base_view',$datos);

	}

}

?>