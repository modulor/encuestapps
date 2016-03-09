<?php 

class Campaigns_model extends CI_Model{
	
	// nueva campaign 

	public function new_campaign($datos)
	{

		$data = array(
			'campaign' => $datos['campaign'],
			'datos_clientes_k' => $datos['datos_clientes_k']
		);

		$insert = $this->db->insert("campaigns",$data);

		return true;

	}


	// lista de mis campanias

	public function my_campaigns($datos_clientes_k)
	{

		return $query = $this->db->where("datos_clientes_k",$datos_clientes_k)
		->order_by("fecha_hora_creacion","desc")
		->get("campaigns")
		->result();

	}


	// info campaign

	public function info_campaign($campaigns_k)
	{

		return $query = $this->db->where("campaigns_k",$campaigns_k)
		->get("campaigns")
		->row();

	}


	// borrar campania

	public function delete_campaign($campaigns_k)
	{

		// buscar encuestas

		$encuestas = $this->db->select("encuestas_k")
		->where("campaigns_k",$campaigns_k)
		->get("encuestas")
		->result();		

		foreach($encuestas as $encuesta){

			// buscar encuestas_preguntas

			$encuestas_preguntas = $this->db->select("encuestas_preguntas_k")
			->where("encuestas_k",$encuesta->encuestas_k)
			->get("encuestas_preguntas")
			->result();

			foreach($encuestas_preguntas as $encuesta_pregunta){

				// buscar encuestas_preguntas_opciones

				$encuestas_preguntas_opciones = $this->db->select("encuestas_preguntas_opciones_k")
				->where("encuestas_preguntas_k",$encuesta_pregunta->encuestas_preguntas_k)
				->get("encuestas_preguntas_opciones")
				->result();

				foreach($encuestas_preguntas_opciones as $encuesta_pregunta_opcion){

					// borrar encuestas_resultados

					$borrar_encuestas_resultados = $this->db->where("encuestas_preguntas_opciones_k",$encuesta_pregunta_opcion->encuestas_preguntas_opciones_k)
					->delete("encuestas_resultados");

					// borrar encuesta_preguntas_opciones

					$borrar_encuesta_preguntas_opciones = $this->db->where("encuestas_preguntas_opciones_k",$encuesta_pregunta_opcion->encuestas_preguntas_opciones_k)
					->delete("encuestas_preguntas_opciones");					

				}

			}

			// borrar encuesta_preguntas

			$borrar_encuesta_preguntas = $this->db->where("encuestas_k",$encuesta->encuestas_k)->delete("encuestas_preguntas");

		}

		// borrar encuestas

		$borrar_encuestas = $this->db->where("campaigns_k",$campaigns_k)->delete("encuestas");

		// borrar campaigns

		$borrar_campaigns = $this->db->where("campaigns_k",$campaigns_k)->delete("campaigns");

		return true;

	}

}

?>