<?php 

class Usuarios_model extends CI_Model{
	
	public function get_datos_clientes_k($usuarios_k)
	{

		// determinar el usuario

		switch ($this->session->userdata("nivel")) {
			
			// cliente

            case 50:

                $query = $this->db->select("datos_clientes_k")
				->where("usuarios_k",$usuarios_k)
				->get("datos_clientes")
				->row()
				->datos_clientes_k;

            break;


            // encuestador

            case 20:

                $query = $this->db->select("datos_clientes_k")
				->where("usuarios_k",$usuarios_k)
				->get("datos_encuestadores")
				->row()
				->datos_clientes_k;

            break;   

		}

		return $query;

	}


	// mi perfil: informacion personal de la cuenta de usuario

	public function mi_perfil()
	{

		$nivel = $this->session->userdata('nivel');

		$usuarios_k = $this->session->userdata('usuarios_k');

		switch($nivel){
			
			// admin

            case 99:

                

            break;


            // cliente

            case 50:

                $query = $this->db->select('dc.*, u.email',false)
                ->from("usuarios u")
                ->join("datos_clientes dc","dc.usuarios_k = u.usuarios_k")
                ->where("u.usuarios_k",$usuarios_k)
                ->get()
                ->row();

            break;


            // encuestador

            case 20:

                

            break;  

		}

		return $query;

	}


	// editar perfil de un usuario

	public function editar_perfil($datos)
	{


		$nivel = $this->session->userdata('nivel');

		$usuarios_k = $this->session->userdata('usuarios_k');

		switch($nivel){
			
			// admin

            case 99:

                

            break;


            // cliente

            case 50:

            	// actualizar tabla 'usuarios'

            	$data_u['email'] = $datos['email'];

            	$update_u = $this->db->where("usuarios_k",$usuarios_k)
            	->update("usuarios",$data_u);

            	// actualizar tabla "datos_clientes"

            	$data_d = array(
            		'nombre' => $datos['nombre'],
            		'apellidos' => $datos['apellidos'],
            		'telefono' => $datos['telefono'],
            		'empresa' => $datos['empresa'],
            		'direccion' => $datos['direccion'],
            		'celular' => $datos['celular']
            	);

            	$update_d = $this->db->where("usuarios_k",$usuarios_k)
            	->update("datos_clientes",$data_d);


            break;


            // encuestador

            case 20:

                

            break;  

		}

		return true;

	}

}

?>