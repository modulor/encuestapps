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

	public function crear($campaigns_k = "")
	{

		if($this->session->userdata('nivel')<50)
			redirect(base_url(),"refresh");

		if($this->input->post()):

			// guardamos la encuesta

			$datos['ok'] = $this->Encuestas_model->crear($this->input->post());

			redirect(base_url()."encuestas/mis_encuestas/".$campaigns_k,"refresh");

		else:

			// obtener datos_clientes_k
	 
			$datos['datos_clientes_k'] = $this->Usuarios_model->get_datos_clientes_k($this->session->userdata("usuarios_k"));

			$datos['campaigns_k'] = $campaigns_k;

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


	// agrega respuesta a una pregunta de un cuestionario

	public function agrega_respuesta($indice = "", $num_pregunta = "")
	{

		$datos['indice'] = $indice;

		$datos['num_pregunta'] = $num_pregunta;		

		$this->load->view("encuestas/agrega_respuesta_view",$datos);

	}


	// mis encuestas 

	public function mis_encuestas($campaigns_k = "")
	{		

		$this->load->model("Campaigns_model");

		$datos['campaign'] = $this->Campaigns_model->info_campaign($campaigns_k);

		$datos['encuestas'] = $this->Encuestas_model->mis_encuestas($campaigns_k);

		$datos['contenido_view'] = "encuestas/mis_encuestas_view";

		$this->load->view("base_view",$datos);

	}


	// resultados

	public function resultados($encuestas_k = "")
	{

		if(!$this->Encuestas_model->validar_encuesta($encuestas_k))
			redirect(base_url(),"refresh");					

		$datos['encuesta'] = $this->Encuestas_model->get_encuesta($encuestas_k);

		// obtener fechas

		$datos['fecha_inicio'] = getOnlyDate($datos['encuesta']->fecha_hora_creacion);
		$datos['fecha_fin'] = date("Y-m-d");

		if($this->input->post()){

			// asignar fechas 	

			$datos['fecha_inicio'] = $this->input->post('fecha_inicio');
			$datos['fecha_fin'] = $this->input->post('fecha_fin');

		}

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

			$datos['class_col_preguntas'] = "col-lg-3 col-md-3 col-sm-12";

			$datos['class_col_pie'] = "col-lg-4 col-md-4 col-sm-6";

			$datos['class_col_linea'] = "col-lg-5 col-md-5 col-sm-6";

		}
		else{

			// clases col para los divs

			$datos['class_col_preguntas'] = "col-lg-4 col-offset-2 col-md-4 col-md-offset-2 col-sm-6";

			$datos['class_col_pie'] = "col-lg-4 col-md-4 col-sm-6";

		}
		

		$datos['preguntas'] = $this->Encuestas_model->get_preguntas_encuesta($encuestas_k);

		$datos['contenido_view'] = "encuestas/resultados_view";

		$this->load->view('base_view',$datos);

	}


	//  borrar encuesta

	public function borrar($encuestas_k="")
	{

		$datos['encuesta'] = $this->Encuestas_model->get_encuesta($encuestas_k);

		if($this->input->post())

			$datos['ok'] = $this->Encuestas_model->borrar($encuestas_k);

		$datos['contenido_view'] = "encuestas/borrar_view";

		$this->load->view("base_view",$datos);

	}


	// test borrar

	public function generar_datos()
	{

		$begin = new DateTime( '2016-03-02' );
		$end = new DateTime( '2016-03-04' );

		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);

		$x = 1;

		foreach ( $period as $dt ):
			
			$fecha = $dt->format( "Y-m-d H:i:s\n" );

			print "<p><strong>$x - ".$fecha."</strong></p>";

			$limite = rand(1, 9);

			for($i = 0; $i < $limite; $i++){
				$query = $this->db->query("insert into encuestas_resultados (encuestas_preguntas_opciones_k,fecha_hora_creacion) values (61,'$fecha')");
			}

			/*

			$limite = rand(2, 4);

			for($i = 0; $i < $limite; $i++){
				$query = $this->db->query("insert into encuestas_resultados (encuestas_preguntas_opciones_k,fecha_hora_creacion) values (62,'$fecha')");
			}
				
			$limite = rand(1, 4);

			for($i = 0; $i < $limite; $i++){
				$query = $this->db->query("insert into encuestas_resultados (encuestas_preguntas_opciones_k,fecha_hora_creacion) values (63,'$fecha')");
			}

			$limite = rand(4, 5);

			for($i = 0; $i < $limite; $i++){
				$query = $this->db->query("insert into encuestas_resultados (encuestas_preguntas_opciones_k,fecha_hora_creacion) values (64,'$fecha')");
			}

			*/

			$x++;

		endforeach;

	}

}

?>