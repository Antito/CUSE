<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadisticas_controller extends CI_Controller {

	var $datos = array();
	
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("usuario_id")){
			redirect("login_controller");
			
		}
		$this->datos["usuario_id"]=$this->session->userdata("usuario_id"); //esto para poder setear los valores  
		$this->datos["usuario"]=$this->session->userdata("usuario"); //y mostrar el nombre del user en pantalla
		$this->datos["activo"]=$this->session->userdata("activo");
		$this->datos["rol"]=$this->session->userdata("rol");
	
	}
	
	
	public function index()
	{
		redirect("estadisticas_controller/listado");
	}
	
	public function listado () {
		
		$this->load->model("insumos_model");
		
		$this->datos["insumos"]=$this->insumos_model->listado();
		
		$this->load->view("estadisticas",$this->datos);
	}
	
	public function listadoporfecha() {
		
		$this->load->model("insumos_model");
		
		$this->datos["insumos"]=$this->insumos_model->listadoporfecha($mes);
		
		$this->load->view("estadisticas",$this->datos);
		
	}
}

