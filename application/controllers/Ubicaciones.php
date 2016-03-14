<?php

class Ubicaciones extends CI_Controller{

	// devuelve la lista de municipios de un cat_entidades_k (cve_ent)
	
	public function municipios()
	{
		
		if($this->input->post()){

			$this->load->model("Ubicaciones_model");

			$datos['cat_entidades_k'] = $_POST['cat_entidades_k'];

			$datos['municipios'] = $this->Ubicaciones_model->lista_municipios($datos['cat_entidades_k']);

			$this->load->view("ubicaciones/municipios_view",$datos);

		}

	}
	
}

?>