<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insumos_model extends CI_Model {

	public function listado() {
		
		$this->db->select("insumos.*,tipos.nombre");
		$this->db->join("tipos","insumos.tipo_id=tipos.tipo_id","inner");
		$this->db->order_by("insumo_id","DESC");
		return $this->db->get("insumos")->result_array(); //result_array() -> devuelve multiples resultados
	}
	
	public function agregar($tipo_id=1,$cantidad=0,$fecha="",$usuario_id="") {
		
		$this->db->set("cantidad",$cantidad);
		$this->db->set("fecha",$fecha);
		$this->db->set("usuario_id",$usuario_id);
		$this->db->set("tipo_id",$tipo_id);
		
		$this->db->insert("insumos");
	}
	
	public function listadoporfecha($mes="") {
		
		$this->db->select("insumos.*"); 
		$this->db->where(MONTH($mes));
		$this->db->order_by("fecha","DESC");
		return $this->db->get("insumos")->result_array();
	}
	
	public function borrartodo() {
		
		$this->db->empty_table("insumos");
	}
}