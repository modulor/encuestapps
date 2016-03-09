<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Campaigns extends CI_Controller{

	function __construct()
	{
		
		parent::__construct();
		
		if(!$this->session->userdata('login'))
			redirect(base_url()."login","refresh");

		$this->load->model("Campaigns_model");

		$this->load->model("Usuarios_model");

	}
	

	public function index()
	{

		$this->nueva();		

	}


	// crear campaing nueva

	public function new_campaign()
	{

		if($this->session->userdata('nivel')<50)
			redirect(base_url(),"refresh");

		if($this->input->post()):

			// guardamos la encuesta

			$datos['ok'] = $this->Campaigns_model->new_campaign($this->input->post());

			redirect(base_url()."campaigns/my_campaigns","refresh");

		else:

			// obtener datos_clientes_k
	 
			$datos['datos_clientes_k'] = $this->Usuarios_model->get_datos_clientes_k($this->session->userdata("usuarios_k"));

			$datos['contenido_view'] = "campaigns/new_campaign_view";

			$this->load->view("base_view",$datos);

		endif;

	}


	// mostras las campaigns de un cliente

	public function my_campaigns()
	{

		// obtener datos_clientes_k
 
		$datos_clientes_k = $this->Usuarios_model->get_datos_clientes_k($this->session->userdata("usuarios_k"));

		$datos['campaigns'] = $this->Campaigns_model->my_campaigns($datos_clientes_k);

		$datos['contenido_view'] = "campaigns/my_campaigns_view";

		$this->load->view("base_view",$datos);

	}


	// borrar campaign

	public function delete_campaign($campaigns_k="")
	{

		if($this->input->post())

			$datos['ok'] = $this->Campaigns_model->delete_campaign($campaigns_k);

		else{

			$datos['campaign'] = $this->Campaigns_model->info_campaign($campaigns_k);
		}

		$datos['contenido_view'] = "campaigns/delete_campaign_view";

		$this->load->view("base_view",$datos);


	}

}

?>