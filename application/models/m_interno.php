<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_interno extends CI_Model
{

  function __construct(){
   parent::__construct();
 }
	public function registrarinter($nom = '',$ape= '',$civ = '',$sex='',$nac='',$fec='', $dom='', $ocu='', $esc='', $des=''){
		//comprobando la optencion de datos
		if(($nom && $ape && $civ) !=null){
			//echo $usuario . "" . $clave . "" . $tipouser;
			$nombre=$nom;
			$apellido=$ape;
			$civil=$civ;
			$sexo=$sex;
			$nacimiento=$nac;
			$fecha=$fec;
			$domicilio=$dom;
			$ocupacion=$ocu;
			$escolaridad=$esc;
			$descripcion=$des;
			//obtines el id de la secion para saber el psicologo que dio de alta a un interno.
			$id=$this->session->userdata('id');
			//consulta para llenar la tabla interno con los datos de la vista altainterno.
			$SQL = "INSERT INTO interno(idInterno,nombre,apellido,estadoCiv,sexo,lugNaci,fechaNac,domicilio,ocupacion,escolaridad,descripcion,psicologa_idpsicologa,psicologa_usuario_idUsuario) VALUES (null,'$nombre','$apellido','$civil','$sexo','$nacimiento','$fecha','$domicilio','$ocupacion','$escolaridad','$descripcion','$id','$id');";
			//obtines el id de la secion

			if(($this->db->query($SQL))) {
				return true;
				 //$this->load->view('admin/adminaltainterno');
			}
			return false;
		}
	}
	public function getnominterno($nom,$ape){
		$result=$this->db->query("SELECT *FROM interno WHERE nombre='$nom' AND apellido='$ape'");
		return $result->row();

		//$consulta=$this->db->select("nombre")->from('interno') ->where("nombre LIKE '%$nom%'")->get();
		//$consulta = $this->db->get("interno");
		//return $consulta->result();
	}

	public function getinterno(){
		$result=$this->db->query("SELECT nombre FROM interno");
		return $result->row();
	}		

}