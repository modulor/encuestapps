<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Resultados extends CI_Controller{

	function __construct()
	{
		
		parent::__construct();

		$this->load->model("Encuestas_model");

	}
	

	public function index()
	{

		redirect(base_url(),"refresh");

	}


	// resultados de una encuesta (via email)

	public function encuesta($codigo = "")
	{

		if(!$this->Encuestas_model->validar_codigo_email($codigo))
			redirect(base_url(),"refresh");

		/* */

		$datos['info_codigo'] = $this->Encuestas_model->get_encuesta_codigo($codigo);

		$encuestas_k = $datos['info_codigo']->encuestas_k;

		if(!$this->Encuestas_model->validar_encuesta($encuestas_k))
			redirect(base_url(),"refresh");					

		$datos['encuesta'] = $this->Encuestas_model->get_encuesta($encuestas_k);

		// obtener fechas

		$datos['fecha_inicio'] = $datos['info_codigo']->fecha_inicio;
		$datos['fecha_fin'] = $datos['info_codigo']->fecha_fin;

		// obtener rango de fechas

		$startDate = new DateTime($datos['fecha_inicio']);
		$endDate = new DateTime($datos['fecha_fin']);

		$interval = $startDate->diff($endDate);

		//echo $interval->days." - days<br>";
		//echo (int)(($interval->days) / 7)." - weeks<br><br>";

		$datos['weeks'] = (int)(($interval->days) / 7);

		$datos['grafica_linea_mostrar'] = false;

		// mostrar grafica linea si hay mas de 4 semanas de informacion 

		if($datos['weeks']>=4){

			$datos['grafica_linea_mostrar'] = true;

			$step  = 2;

			switch ($datos['weeks']) {

				case  ($datos['weeks'] >= 23):

					$step = 4;
				    
			  	break;

			  	case  ($datos['weeks'] >= 51):

					$step = 8;
				    
			  	break;
			}

		}

		// si existen datos suficientes para mostrar la grafica en linea

		if($datos['grafica_linea_mostrar']){

			$unit  = 'W';

			$interval = new DateInterval("P{$step}{$unit}");
			$period   = new DatePeriod($startDate, $interval, $endDate);

			// array_fechas: eje en x de la grafica en linea (DD-MM-YY)

			$array_fechas = array();
			$array_fechas_texto = array();

			foreach ($period as $date) {
			    //echo $date->format('Y-m-d'), PHP_EOL;
			    //print "<br>";
			    $array_fechas [] = $date->format('Y-m-d');
			    $array_fechas_texto [] = getFechaNormal($date->format('Y-m-d'),"corto");
			}

			//$array_fechas = ['uno','dos','tres','cuatro','cinco','seis','siete','ocho','nueve','diez','once','doce'];

			$datos['array_fechas'] = $array_fechas;

			$datos['array_fechas_texto'] = $array_fechas_texto;

			// clases col para los divs

			$datos['class_col_preguntas'] = "col-lg-3 col-md-12 col-sm-12";

			$datos['class_col_pie'] = "col-lg-4 col-md-4 col-sm-4";

			$datos['class_col_linea'] = "col-lg-5 col-md-8 col-sm-8";

		}
		else{

			// clases col para los divs

			$datos['class_col_preguntas'] = "col-lg-4 col-offset-2 col-md-4 col-md-offset-2 col-sm-6";

			$datos['class_col_pie'] = "col-lg-4 col-md-4 col-sm-6";

		}		

		$datos['preguntas'] = $this->Encuestas_model->get_preguntas_encuesta($encuestas_k);

		$this->load->view("resultados/graficas_view",$datos);

	}

}

?>