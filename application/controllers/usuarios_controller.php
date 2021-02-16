<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_controller extends CI_Controller {

	var $datos = array();
	
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("usuario_id") or $this->session->userdata("rol") != "A"){
			redirect("login");
			
		}
		$this->datos["usuario_id"]=$this->session->userdata("usuario_id");
		$this->datos["usuario"]=$this->session->userdata("usuario");
		$this->datos["rol"]=$this->session->userdata("rol");
		$this->load->model("usuarios_model");
	}
	
	public function index()	
	{
		redirect("usuarios_controller/listado"); //si no no anda. Llama al metodo listado
	}
	
	public function agregar($usuario="",$password="",$rol="") {
		
		$this->load->model("usuarios_model");
		$usuario = $this->input->post("usuario");
		$password = $this->input->post("password");
		$rol = $this->input->post("rol");
		
		$this->usuarios_model->agregar($usuario,$password,$rol);
		redirect("usuarios_controller");
	}
	
	public function listado () {
		
		$this->load->model("usuarios_model");
		$this->datos["usuarios"]=$this->usuarios_model->listado();
		$this->load->view("usuarios",$this->datos);
	}
	
	public function borrar($usuario_id="") {
		
		$this->load->model("usuarios_model");
		$this->usuarios_model->borrar($usuario_id);
		redirect("usuarios_controller");
	}
	
	public function cambiarestado($usuario_id="",$activo="")
	{
		if($usuario_id != "" and in_array($activo,array(1,0))); //Comprueba si un valor existe en un array
		{
			$this->usuarios_model->cambiarestado($usuario_id,$activo);	
			
		}
		
		redirect("usuarios_controller/listado");
	}
	
	public function activar($usuario_id)
	{
		$this->cambiarestado($usuario_id,1);	
	}
	public function desactivar($usuario_id)
	{
		$this->cambiarestado($usuario_id,0);
	}
}

