<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal_controller extends CI_Controller {

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
		$this->usuario_id = $this->session->userdata("usuario_id");
			
	}
	
	public function index()
	{
		redirect("principal_controller/listado"); //si no esta esto, no anda  (error undenite variable)
	}
	
	public function listado () {
		
		$this->load->model("insumos_model");
		
		$this->datos["insumos"]=$this->insumos_model->listado();
		
		$this->load->model("tipos_model");
		
		$this->datos["tipos"] = $this->tipos_model->listado();
		
		$this->load->view("principal",$this->datos);
	}
	
	public function agregar($tipo=1,$cantidad=0) {
		
		$this->load->model("insumos_model");
		$tipo = $this->input->post("tipo");
		$cantidad = $this->input->post("cantidad");
		$fecha = date('Y-m-d');
		
		$this->insumos_model->agregar($tipo,$cantidad,$fecha,$this->usuario_id);
		redirect("principal_controller"); //al controller
	}
	
	public function borrartodo() {
		
		$this->load->model("insumos_model");
		$this->insumos_model->borrartodo();
		redirect("principal_controller");
	}
	
}
