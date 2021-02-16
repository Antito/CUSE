<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function chequear_usuario($usuario="",$password="") {
		
		$this->db->where("usuario",strtolower(trim($usuario)));
		$this->db->where("password",$password);
		$this->db->limit(1);
		return $this->db->get("usuarios")->row_array(); //row_array() -> devuelve un solo resultado
	}
	
	public function agregar($usuario="",$password="",$rol="") {
		$this->db->set("usuario",$usuario);
		$this->db->set("password",$password);
		$this->db->set("activo",1);
		$this->db->set("rol",$rol);
		$this->db->insert("usuarios");
	}
	
	public function listado() {
		
		return $this->db->get("usuarios")->result_array();	//result_array() ->devuelve multiples resultados
	}
	
	public function borrar($usuario_id="") {
		$this->db->where("usuario_id",$usuario_id);
		$this->db->limit(1);
		$this->db->delete("usuarios");
	}
	
	public function cambiarestado($usuario_id="",$activo="") {
		
		$this->db->set("activo",$activo);
		$this->db->where("usuario_id",$usuario_id);
		$this->db->update("usuarios");
		
		if($this->db->affected_rows())
		{
			return true;
		}else{
			
			return false;
			
		}
		
	}
	
	public function actualizar_login($usuario_id="") {
		
		$this->db->set("ult_login","now()",false);
		
		$this->db->where("usuario_id",$usuario_id);
		
		$this->db->update("usuarios");
	}
}

