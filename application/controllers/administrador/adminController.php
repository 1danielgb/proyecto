<?php 


class adminController extends CI_Controller
{
    public function index(){
       // return view('administrador.panel');
        $this->load->view('admin/adminpanel');
    }

    public function panelinterno(){
    	$this->load->view('admin/adminpanelinterno');
    }

    public function altauser(){
        
        $this->load->view('admin/adminaltauser');
    }

    public function registrar(){
	    	if ($this->session->userdata('id')==1){
	    		//obteniendo los datos del formulario 
	        $usuario =$this->input->post('usuario');
			$clave =$this->input->post('clave');
			$apellido=$this->input->post('apellido');
			$correo =$this->input->post('correo');
			$telefono=$this->input->post('telefono');
			//asignando el valor 2 por defecto para el usuario practicante
			$tipouser=2;

			//echo $id; 
			//echo $usuario . "" . $clave . "" . $id;
			//cargando el modelo
			$this->load->model('m_cereso');
			//Mandando los datos al metodo registrarpract del modelo
			$fila=$this->m_cereso->registrarpract($usuario,$clave,$tipouser,$apellido,$correo,$telefono);
			if($fila!=null){
				header("Location:" . base_url() . "AltaPract");
			}else{
				echo"no puedes dar de alta";
			}

    	}
    	
    }
    public function registrarIntern(){
    	
    }
}