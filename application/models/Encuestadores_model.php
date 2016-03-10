<?php

class Encuestadores_model extends CI_Model{
	

	// nuevo encuestador

	public function nuevo($datos)
	{

		// guardar usuario

		$data_u = array(
			'email' => $datos['email'],
			'password' => sha1(md5($datos['password'])),
			'usuarios_niveles_k' => 20,
			'estatus' => 1
		);

		$insert_u = $this->db->insert('usuarios',$data_u);

		// recuperamos "usuarios_k"

		$usuarios_k = $this->db->insert_id();

		// guardamos en 'datos_encuestadores'

		$data_d = array(
			'nombre' => $datos['nombre'],
			'apellidos' => $datos['apellidos'],
			'celular' => $datos['celular'],
			'direccion' => $datos['direccion'],
			'telefono' => $datos['telefono'],
			'datos_clientes_k' => $datos['datos_clientes_k'],
			'usuarios_k' => $usuarios_k
		);

		$insert_d = $this->db->insert("datos_encuestadores",$data_d);

		return true;

	}


	// lista de encuestadores de un datos_clientes_k

	public function lista($datos_clientes_k)
	{

		return $query = $this->db->select("u.email, u.estatus, de.*")
		->from("usuarios u")
		->join("datos_encuestadores de","de.usuarios_k = u.usuarios_k")
		->where("de.datos_clientes_k",$datos_clientes_k)
		->order_by("u.email")
		->get()
		->result();

	}


	// informacion de un encuestador usando 'usuarios_k'

	public function info($usuarios_k)
	{

		return $query = $this->db->select("u.email, de.*")
		->from("usuarios u")
		->join("datos_encuestadores de","de.usuarios_k = u.usuarios_k")
		->where("u.usuarios_k",$usuarios_k)
		->get()
		->row();

	}


	// cambia el estatus de un encuestador con su 'usuarios_k'

	public function cambiar_estatus($usuarios_k)
	{

		$query = $this->db->query("
			update usuarios set estatus = 1 - estatus
			where usuarios_k = $usuarios_k
		");

	}


	// borra un encuestador

	public function borrar($usuarios_k)
	{

		// borrar en 'datos_encuestadores' y en 'usuarios'

		$tables = array('datos_encuestadores', 'usuarios');	

		$delete = $this->db->where("usuarios_k",$usuarios_k)
		->delete($tables);

		return true;

	}
	
}
	
?>