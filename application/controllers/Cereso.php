<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cereso extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_cereso');
	}

	public function index()
	{

		if($this->validaSesion()==true){
			//echo("Entre a quí");
			//header("Location:" . base_url() . "panel");
			$this->load->view('panel');
			return;
		}
		$this->load->view('login');
	}

	function loguearse(){
		$this->load->view('login');
	}
	function logueo(){
		//print("Entre");
		//echo ("Entre");
		$usuario=$this->input->post('usuario');
		$clave=$this->input->post('clave');
		//$tipouser=$this->input->post('tipouser');
		$res = $this->m_cereso->validaUsuario($usuario,$clave);
		if(! empty($res)){
			$datos = array('usuario'=>$res[0]['nombre'],'nombre'=>$res[0]['nombre'], 'tipouser'=>$res[0]['tipouser'] );
			$this->session->set_userdata($datos);
			//header("Location:" . base_url() . "Cereso");
			redirect('Cereso');
		}
		else{
			echo '<script type="text/javascript">alert("Datos incorrectos");</script>';
			$this->load->view('login');
		}
	}

	function validaSesion(){
		//print_r($_SESSION); die();     Vemos si los datos de sesion estan correctos
		if($this->session->userdata('usuario') == null){
			return false;
		}else{
			return true;
		}
	}

	function cierraSesion(){
		$this->session->sess_destroy();
		header("Location:" . base_url());
		//redirect('cereso');
	}
}
