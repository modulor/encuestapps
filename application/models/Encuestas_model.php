<?php 

class Encuestas_model extends CI_Model{
	
	public function crear($datos)
	{

		// guardamos en "encuestas"

		$data_encuestas = array(
			'nombre_encuesta' => $datos['nombre_encuesta'],
			'datos_clientes_k' => $datos['datos_clientes_k'],
			'campaigns_k' => $datos['campaigns_k']
		);

		$insert_encuestas = $this->db->insert("encuestas",$data_encuestas);

		// recuperamos "encuestas_k"

		$encuestas_k = $this->db->insert_id();

		// guardamos las preguntas y repuestas ("encuestas_preguntas" y "encuestas_preguntas_opciones")

		for($i = 1; $i<=$datos['num_preguntas']; $i++){

			// guardamos las preguntas

			$data_preguntas = array(
				'pregunta' => $datos['pregunta_'.$i],
				'encuestas_k' => $encuestas_k
			);

			$insert_preguntas = $this->db->insert("encuestas_preguntas",$data_preguntas);

			$encuestas_preguntas_k = $this->db->insert_id();

			// guardamos las opciones de respuesta de la pregunta 

			for($r = 1; $r<=4; $r++){

				$data_opciones = array(
					'opcion' => $datos['respuesta_'.$r.'_p'.$i],
					'encuestas_preguntas_k' => $encuestas_preguntas_k
				);

				$insert_opciones = $this->db->insert("encuestas_preguntas_opciones",$data_opciones);

			}

		}

		return true;

	}


	public function mis_encuestas($campaigns_k)
	{

		return $query = $this->db->where("campaigns_k",$campaigns_k)
		->order_by("fecha_hora_creacion","desc")
		->get("encuestas")
		->result();

	}


	public function validar_encuesta($encuestas_k)
	{

		if(!is_numeric($encuestas_k))
			return false;

		$query = $this->db->select("encuestas_k")
		->where("encuestas_k",$encuestas_k)
		->get("encuestas")
		->num_rows();

		if($query > 0)
			return true;

		return false;

	}


	public function get_encuesta($encuestas_k)
	{

		return $query = $this->db->where("encuestas_k",$encuestas_k)
		->get("encuestas")
		->row();

	}


	public function get_preguntas_encuesta($encuestas_k)
	{

		return $query = $this->db->where("encuestas_k",$encuestas_k)
		->order_by("encuestas_k")
		->get("encuestas_preguntas")
		->result();

	}


	public function get_preguntas_opciones($encuestas_preguntas_k)
	{

		return $query = $this->db->where("encuestas_preguntas_k",$encuestas_preguntas_k)
		->order_by("encuestas_preguntas_opciones_k")
		->get("encuestas_preguntas_opciones")
		->result();

	}


	public function guardar_resultados($datos)
	{

		$preguntas = $this->get_preguntas_encuesta($datos['encuestas_k']);

		foreach($preguntas as $pregunta):

			// guardar en encuestas_resultados

			$data['encuestas_preguntas_opciones_k'] = $datos['encuestas_preguntas_k_'.$pregunta->encuestas_preguntas_k];

			$insert = $this->db->insert("encuestas_resultados",$data);

		endforeach;

		return true;

	}


	public function get_votos_pregunta($encuestas_preguntas_opciones_k, $fecha_inicio, $fecha_fin)
	{

		$this->db->select("encuestas_resultados_k");
		$this->db->from("encuestas_resultados");
		$this->db->where("encuestas_preguntas_opciones_k",$encuestas_preguntas_opciones_k);


		if($fecha_inicio != ""){

			$this->db->where("fecha_hora_creacion >=",$fecha_inicio." 00:00:00");
			$this->db->where("fecha_hora_creacion <=",$fecha_fin." 00:00:00");

		}

		return $query = $this->db->get()
		->num_rows();

		/*return $query = $this->db->select("encuestas_resultados_k")
		->where("encuestas_preguntas_opciones_k",$encuestas_preguntas_opciones_k)
		->get('encuestas_resultados')
		->num_rows();*/

	}


	// borrar encuesta

	public function borrar($encuestas_k)
	{

		// buscar encuestas

		$encuestas = $this->db->select("encuestas_k")
		->where("encuestas_k",$encuestas_k)
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

		$borrar_encuestas = $this->db->where("encuestas_k",$encuestas_k)->delete("encuestas");

		return true;

	}

}

?>