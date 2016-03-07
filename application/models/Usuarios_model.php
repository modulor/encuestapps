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

}

?>