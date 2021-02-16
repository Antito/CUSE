<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipos_model extends CI_Model {

	public function listado() {
		
		return $this->db->get("tipos")->result_array(); //result_array() -> devuelve multiples resultados
	}
	
}