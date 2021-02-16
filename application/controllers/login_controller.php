<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	
	public function index()
	{
		$usuario = $this->input->post("usuario");
		$password = $this->input->post("password");
		
		if ($usuario and $password) {
			$this->load->model("usuarios_model");
			if ($u = $this->usuarios_model->chequear_usuario($usuario,$password)){ //$u-> seria un array (guarda lo que retorna el metodo) 
				if ($u["activo"] == 1) {
				
				$this->session->set_userdata("usuario_id",$u["usuario_id"]);
				$this->session->set_userdata("usuario",$u["usuario"]);
				$this->session->set_userdata("activo",$u["activo"]);
				$this->session->set_userdata("rol",$u["rol"]); //si no lo pongo no anda 
					
				$this->usuarios_model->actualizar_login($u["usuario_id"]);
				
				redirect("principal_controller"); //el redirect llama al controlador
					
				}else {
					$this->session->set_flashdata("op","INACTIVO");	
					redirect("login_controller");
				}
			}
			else {
				
			$this->session->set_flashdata("op","INCORRECTO");	
			redirect("login_controller");
			
			}
		}
		
		$this->load->view('login');
	}
}

