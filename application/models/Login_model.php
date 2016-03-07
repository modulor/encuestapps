<?php

class Login_model extends CI_Model{

	
	function existeUsuario($email, $contrasena) {
        
        $contrasena = sha1(md5($contrasena));        
        $query = $this->db->where('email', $email);
        $query = $this->db->where('password', $contrasena);
        $query = $this->db->get('usuarios');
        return $query->row();

    }

}

?>