<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_cereso extends CI_Model
{

  function __construct(){
   parent::__construct();
 }

 function validaUsuario($usuario,$clave){
    $this->db->where('nombre',$usuario);
    $this->db->where('clave',$clave);
    $this->db->where('tipouser',$tipouser);
    $query = $this->db->get('usuario');
    return $query->result_array();
  }
  public function getUser($usuario ='')
	{
		//consulta a la base de datos para obtner los email
		$result = $this->db->query("SELECT * FROM usuario WHERE nombre = '" . $usuario ."' LIMIT 1");
		//cuenta el numero de columnas 
		if($result->num_rows()>0){
			//retorno de las columnas
			return $result->row();
		}else{
			//no encotro filas
			return null;
		}
	}

	public function registrarpract($usu = '',$cla= '',$tip = '',$cor='',$tel='',$ape=''){
		//comprobando la optencion de datos
		if(($usu && $cla && $tip) !=null){
			//echo $usuario . "" . $clave . "" . $tipouser;
			$usuario=$usu;
			$clave=$cla;
			$tipouser=$tip;
			$apellido=$ape;
			$correo=$cor;
			$telefono=$tel;
			$SQL = "INSERT INTO usuario(idUsuario,nombre,clave,tipouser) VALUES (null,'$usuario','$clave','$tipouser');";
			//obtines el id de la secion
			$id=$this->session->userdata('id');

			$SQL2 = "INSERT INTO practicante(idpracticante,nombre,contraseña,apellido,correo,telefono,usuario_idUsuario) VALUES (null,'$usuario','$clave','$apellido','$correo','$telefono','$id');";

			if(($this->db->query($SQL)) && ($this->db->query($SQL2))) {
				return true;
				 $this->load->view('admin/adminaltauser');
			}
			return false;
		}

	}	

}
