<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{

	function __construct()
	{

		parent::__construct();
		
		if(!$this->session->userdata('login'))
			redirect(base_url()."login","refresh");

		$this->load->model("Usuarios_model");

	}
	

	public function index()
	{



	}


	

}

?>