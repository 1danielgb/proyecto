<?php 


class internoController extends CI_Controller
{
    public function index(){
       // return view('administrador.panel');
        $this->load->view('admin/adminpanel');
    }

    public function altainterno(){
        
        $this->load->view('admin/adminaltainterno');
    }

    public function registrar(){
	    // if ($this->session->userdata('id')==1){
	    		//obteniendo los datos del formulario 
	        $nombre =$this->input->post('nombre');
			$apellido =$this->input->post('apellido');
			$civil=$this->input->post('civil');
			$sexo =$this->input->post('sexo');
			$nacimiento=$this->input->post('nacimiento');
			$fechaNa=$this->input->post('fechaNa');
			$domicilio=$this->input->post('domicilio');
			$ocupacion=$this->input->post('ocupacion');
			$escolaridad=$this->input->post('escolaridad');
			$descripcion=$this->input->post('descripcion');

			//echo $id; 
			//echo $usuario . "" . $clave . "" . $id;
			//echo $nombre . "" . $apellido . "" . $civil . "" . $sexo . "" . $nacimiento . "" . $fechaNa . "" . $domicilio . "" . $ocupacion . "" . $escolaridad . "" . $descripcion;
			//cargando el modelo
			$this->load->model('m_interno');
			//Mandando los datos al metodo registrarpract del modelo
			$fila=$this->m_interno->registrarinter($nombre,$apellido,$civil,$sexo,$nacimiento,$fechaNa,$domicilio,$ocupacion,$escolaridad,$descripcion);
			if($fila!=false){
				header("Location:" . base_url() . "AltaIntern");
			}else{
				echo"no puedes dar de alta";
			}

    }
    	
    
    public function registrarIntern(){
    	
    }
}