<?php
/**
* 
*/
class Login extends CI_Controller
{
	
	public function index ()
	{
		$this->load->view("/login");
		//echo "hola";

	}
	public function ingresar(){
		$usuario =$this->input->post('usuario');
		$clave =$this->input->post('clave');
		//echo("hola");
		//echo $usuario . "" . $clave;
		//cargando el modelo user 
		$this->load->model('m_cereso');
		//Mandando el email al metodo getUser del modelo
		$fila = $this->m_cereso->getUser($usuario);
		//print_r($fila);
		//die();
		//echo $usuario . "" . $clave;
		//validacion 
		if($fila !=null){
			if($fila->contraseña == $clave){
				//variable de sesion
					$data = array('usuario' => $usuario,
						 'id' =>$fila->idUsuario,
						'login'=>true
					);
					//creando la variable
					$this->session->set_userdata($data);
					//Comprodando que sea el administrador
					if($fila->tipoUsuario == 1){
						//return view('admin.adminpanel');
						//return redirect('admin');
						
						$this->load->view('admin/adminpanel');
						//return;
					}else{
						//panel para practicantes en caso de que no sea el administrador
						$this->load->view('practicante/pracpanel');
					}
					
					//return;
			}else{
				//si no se encotro el email vuelve a inicio
				//echo "sali";
				print_r("No entre");
				die();
				echo '<script type="text/javascript">alert("Datos incorrectos");</script>';
				header("Location:" . base_url());
			}
		}else{
				//si no encontro nada que lo mande a inicio
				//echo "sali";

				echo '<script type="text/javascript">alert("Datos incorrectos");</script>';
				header("Location:" . base_url());
			}

		//variable de sesion
	
		
		//echo $this->session->userdata('email');
	}
	//funcion para cerrar session 
	public function logout($value=''){
		//destruyendo la session
		$this->session->sess_destroy();
		//mandando a la pagina de inicio
		header("Location: " . base_url());
		//redirect('login');
	}
}