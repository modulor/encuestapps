<?php 

class Ubicaciones_model extends CI_Model{
	
	public function lista_entidades()
	{		

		return $query = $this->db->order_by("nom_ent")
		->get("cat_entidades")
		->result();

	}


	public function lista_municipios($cat_entidades_k)
	{

		return $query = $this->db->select("cm.*")
		->from("cat_municipios cm")
		->join("cat_entidades ce","ce.cve_ent = cm.cve_ent")
		->where("cat_entidades_k",$cat_entidades_k)
		->get()
		->result();

	}

}

?>