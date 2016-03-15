<?php

class Ubicaciones extends CI_Controller{

	// devuelve la lista de municipios de un cat_entidades_k (cve_ent)
	
	public function municipios($obligatorio = "", $todos = "")
	{
		
		if($this->input->post()){

			$this->load->model("Ubicaciones_model");

			$datos['cat_entidades_k'] = $_POST['cat_entidades_k'];

			// para mostrar * en el formulario e indicar que es "obligatorio"

			$datos['asterisco'] = "";

			$datos['mostrar_label'] = false;

			if($obligatorio!="no"){
				$datos['asterisco'] = "* ";
				$datos['mostrar_label'] = true;
			}
				

			// mostrar la opcion "todos los municipios" cuando se ven los resultados de una encuesta

			$datos['primer_resultado'] = "<option value=''></option>";

			if($todos!="no")
				$datos['primer_resultado'] = "<option value='todos'>Todos los municipios</option>";

			$datos['municipios'] = $this->Ubicaciones_model->lista_municipios($datos['cat_entidades_k']);

			$this->load->view("ubicaciones/municipios_view",$datos);

		}

	}
	
}

?>