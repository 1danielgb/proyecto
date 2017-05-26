<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_formato extends CI_Model
{

	function __construct(){
		parent::__construct();
	}

	public function postpersonalidad($fecha='',$nom = '',$apell= '',$ante = '',$exam='',$indi='',$nive='',$dina='',$impre='',$fech)
	{
		//comprobando la optencion de datos
		if(($nom && $apell && $ante) !=null){
			$fecha=$fecha;
			$nombre=$nom;
			$apellido=$apell;
			$antecedentes=$ante;
			$examen=$exam;
			$indice=$indi;
			$nivel=$nive;
			$dinamica=$dina;
			$impresion=$impre;
			$fecha=$fech;
			$nomfor= "estudio personalidad de " . $nombre;
			//obtines el id de la secion
			$id=$this->session->userdata('id');
			//consulta para llenar la tabla de formato
			$result1 = $this->db->query("SELECT idUsuario from psicologa JOIN usuario on usuario_idUsuario=idUsuario WHERE idpsicologa='$id'");
			$result2 =$result1->row();			
			$nom2 =$result2->idUsuario;
			/*print_r($nom2);
			//return $result1->result_array();
			return $result1->row();
			// print_r($result1);
			// die();*/
			$SQL1 = "INSERT INTO formato(idformato,nombre,fecha,nota_idreporte,psicologa_idpsicologa,psicologa_usuario_idUsuario,practicante_idpracticante,practicante_usuario_idUsuario) VALUES (null,'$nomfor','$fecha','0','$id','$nom2',null,null);";
			$this->db->query($SQL1);
			// 

			$ultimoId = $this->db->insert_id();

			$SQL2 = "INSERT INTO estudioinicialpersonalidad(idestudiopersonalidad,fecha,nombre,apellido,antecedentesFamiyPers,examenMent,indiceLesOrga,nivelIntelec,dinamicaPErs,impresionDiagn,formato_idformato) VALUES (null,'$fecha','$nombre','$apellido','$antecedentes','$examen','$indice','$nivel','$dinamica','$impresion','$ultimoId');";
			$this->db->query($SQL2);
			return true;


		}
	}

	public function postentrevista($fecha,$nombre,$fechan,$recidencia,$ocupacion,$estadocivil,$delito,$mtvconsulta,$edad,
            $lugnacimiento,$domicilio,$escolaridad,$nombrePa,$escolaridadPa,$ocupacionPa,$edadPa,$nombreMa,$escolaridadMa,$ocupacionMa,
            $edadMa,$antecentes,$factoresIntCons,$escolaridad2,$actividades,$relacFami,$relacion,$vestido,$higiene,$apariencia,$postura,
            $forma,$expresionfare,$expresionesfa,$intGenExam,$interaciones,$actividadmo,$conductama,$tonovoz,$problemasint,$historiacond,$conductaant,
            $historilprole,$problemaslega,$ajustesinte,$autoconcepto,$expectativafu,$impresiondia,$observaciones,$idI){
			
			// echo$fecha,$nombre,$fechan,$recidencia,$ocupacion,$estadocivil,$delito,$mtvconsulta,$edad,
   //          $lugnacimiento,$domicilio,$escolaridad,$nombrePa,$escolaridadPa,$ocupacionPa,$edadPa,$nombreMa,$escolaridadMa,$ocupacionMa,
   //          $edadMa,$antecentes,$factoresIntCons,$escolaridad2,$actividades,$relacFami,$relacion,$vestido,$higiene,$apariencia,$postura,
   //          $forma,$expresionfare,$expresionesfa,$intGenExam,$interaciones,$actividadmo,$conductama,$tonovoz,$problemasint,$historiacond,$conductaant,
   //          $historilprole,$problemaslega,$ajustesinte,$autoconcepto,$expectativafu,$impresiondia,$observaciones;
			// //echo $nombrePa;
			// //echo $historilprole;
			// //echo $impresiondia;
			// //echo $observaciones;
			// die();

		//variable que contiene el nombre del formato y el del interno
			$nomfor= "entrevista psicologica de " . $nombre;

		//obtines el id de la secion
			$id=$this->session->userdata('id');
			//consulta para llenar la tabla de formato
			$result1 = $this->db->query("SELECT idUsuario from psicologa JOIN usuario on usuario_idUsuario=idUsuario WHERE idpsicologa='$id'");
			$result2 =$result1->row();			
			$nom2 =$result2->idUsuario;
			/*print_r($nom2);
			//return $result1->result_array();
			return $result1->row();
			// print_r($result1);
			// die();*/
			$SQL1 = "INSERT INTO formato(idformato,nombre,fecha,nota_idreporte,psicologa_idpsicologa,psicologa_usuario_idUsuario,practicante_idpracticante,practicante_usuario_idUsuario) VALUES (null,'$nomfor','$fecha','0','$id','$nom2',null,null);";
			$this->db->query($SQL1);
			// 

			$ultimoId = $this->db->insert_id();

		//consulta para llenar la base de datos 
			$sql3 =	"INSERT INTO entrevistapsico(identrevista,fecha,nombreint,fechanacimi,residencia,ocupacion,estadocivil,delitos,mtvconsulta,edad,lugarNaci,escolaridad,
												domicilio,nomPadre,escoPadre,ocupPadre,edadPadre,nomMadre,escoMadre,ocupMadre,edadMadre,antInterno,factInterComDeli,escolaridad2,
												actividades,relaFami,relacionEdad,vestido,igienePers,apareTotal,postura,formaCaminar,expFacialRel,expFacial,intGenExam,intEspExam,
												actiMotora,conducta,tonoVoz,probInterPers,condAntiSoci,condAntiSociAbi,histLegal,problegAbit,clasiGenAjusteInterPerso,autoconcepto,
												espeFuturo,ImpDiagnostico,observaciones,formato_idformato,idInterno) 

					 VALUES (null,'$fecha','$nombre','$fechan','$recidencia','$ocupacion','$estadocivil','$delito','$mtvconsulta','$edad',
            '$lugnacimiento','$escolaridad','$domicilio','$nombrePa','$escolaridadPa','$ocupacionPa','$edadPa','$nombreMa','$escolaridadMa','$ocupacionMa',
            '$edadMa','$antecentes','$factoresIntCons','$escolaridad2','$actividades','$relacFami','$relacion','$vestido','$higiene','$apariencia','$postura',
            '$forma','$expresionfare','$expresionesfa','$intGenExam','$interaciones','$actividadmo','$conductama','$tonovoz','$problemasint','$historiacond','$conductaant',
            '$historilprole','$problemaslega','$ajustesinte','$autoconcepto','$expectativafu','$impresiondia','$observaciones','$ultimoId',$idI);";
			$this->db->query($sql3);
			return true;
	  

	}

	public function postestupsicol($fecha,$nombre,$apellido,$procePenal,$antecentes,$descripcion,$examen,$nivelInt,$indiceLe,$dinamicaPer,$factPsico,$impresionDiag,$conclusion,
        						   $vertur,$reexpertor,$inviemo,$hiperex,$sintdepre,$disaut,$disodesp,$quejaspsi,$psicosis,$deteneupsi,$diagnostico){
			$nomfor= "estudio psicológico de " . $nombre;
			//echo $nivelInt;
			//die();
			//obtines el id de la secion
			$id=$this->session->userdata('id');
			//consulta para llenar la tabla de formato
			$result1 = $this->db->query("SELECT idUsuario from psicologa JOIN usuario on usuario_idUsuario=idUsuario WHERE idpsicologa='$id'");
			$result2 =$result1->row();			
			$nom2 =$result2->idUsuario;
			/*print_r($nom2);
			//return $result1->result_array();
			return $result1->row();
			// print_r($result1);
			// die();*/
			$SQL1 = "INSERT INTO formato(idformato,nombre,fecha,nota_idreporte,psicologa_idpsicologa,psicologa_usuario_idUsuario,practicante_idpracticante,practicante_usuario_idUsuario) VALUES (null,'$nomfor','$fecha','0','$id','$nom2',null,null);";
			$this->db->query($SQL1);
			// 

			$ultimoId = $this->db->insert_id();																												
			$SQL2 = "INSERT INTO estupsicologico(idestupsicologico,fecha,nombreInter,apellidoInter,procesoPen,anteceFamyPers,descripEstuPsic,examenMent,nivelIntel,indiceLesOrga,dinamicaPerson,factoresPsicoComDeli,impresionDiag,conclusion,formato_idformato,
        						 vertur,reexpertor,inviemo,hiperex,sintdepre,disaut,disodesp,quejaspsi,psicosis,deteneupsi,diagnostico) 
					VALUES (null,'$fecha','$nombre','$apellido','$procePenal','$antecentes','$descripcion','$examen','$nivelInt','$indiceLe','$dinamicaPer','$factPsico','$impresionDiag','$conclusion','$ultimoId',
        						  '$vertur','$reexpertor','$inviemo','$hiperex','$sintdepre','$disaut','$disodesp','$quejaspsi','$psicosis','$deteneupsi','$diagnostico');";
			$this->db->query($SQL2);
			return true;
	}

	public function postestubenefi($fecha,$nombre,$sobrenom,$edad,$delito,$actitudTom,$examMen,$prueApli,$nivelInt,$indiceLes,$dinaPerso,$impreDiag,$resulTrata,$menFactPsico,$requerimientos,$especifique,$sugerencia){
			$nomfor= "estudio para beneficio de " . $nombre;
			//echo $nivelInt;
			//die();
			//obtines el id de la secion
			$id=$this->session->userdata('id');
			//consulta para llenar la tabla de formato
			$result1 = $this->db->query("SELECT idUsuario from psicologa JOIN usuario on usuario_idUsuario=idUsuario WHERE idpsicologa='$id'");
			$result2 =$result1->row();			
			$nom2 =$result2->idUsuario;
			/*print_r($nom2);
			//return $result1->result_array();
			return $result1->row();
			// print_r($result1);
			// die();*/
			$SQL1 = "INSERT INTO formato(idformato,nombre,fecha,nota_idreporte,psicologa_idpsicologa,psicologa_usuario_idUsuario,practicante_idpracticante,practicante_usuario_idUsuario) VALUES (null,'$nomfor','$fecha','0','$id','$nom2',null,null);";
			$this->db->query($SQL1);
			// 

			$ultimoId = $this->db->insert_id();																												
			$SQL2 = "INSERT INTO estudiobeneficio(idestudiobeneficio,fecha,nombre,sobrenombre,edad,delito,actitudEntrev,examenMen,pruebasApli,nivelInte,indiceLesOrga,dinamicaPerso,impresionDiagn,resultadoTrata,factoresPsicoComiDeli,
        						 requerimientosTrata,especificacion,sugerencia,formato_idformato) 
					VALUES (null,'$fecha','$nombre','$sobrenom','$edad','$delito','$actitudTom','$examMen','$prueApli','$nivelInt','$indiceLes','$dinaPerso','$impreDiag','$resulTrata','$menFactPsico','$requerimientos','$especifique','$sugerencia','$ultimoId');";
			$this->db->query($SQL2);
			return true;
	}

	public function postformactivity($fecha,$nombre,$trataPsico,$psicoIndi,$psicoGrup,$teraFami,$progInsti){
			$nomfor= "estudio de actividades de " . $nombre;
			//echo $nivelInt;
			//die();
			//obtines el id de la secion
			$id=$this->session->userdata('id');
			//consulta para llenar la tabla de formato
			$result1 = $this->db->query("SELECT idUsuario from psicologa JOIN usuario on usuario_idUsuario=idUsuario WHERE idpsicologa='$id'");
			$result2 =$result1->row();			
			$nom2 =$result2->idUsuario;
			/*print_r($nom2);
			//return $result1->result_array();
			return $result1->row();
			// print_r($result1);
			// die();*/
			$SQL1 = "INSERT INTO formato(idformato,nombre,fecha,nota_idreporte,psicologa_idpsicologa,psicologa_usuario_idUsuario,practicante_idpracticante,practicante_usuario_idUsuario) VALUES (null,'$nomfor','$fecha','0','$id','$nom2',null,null);";
			$this->db->query($SQL1);
			// 

			$ultimoId = $this->db->insert_id();																												
			$SQL2 = "INSERT INTO actividades(idactividades,fecha,nombre,tratPsico,psicIndiv,psicoGrup,terapiaFami,progInstiExter,formato_idformato) 
					VALUES (null,'$fecha','$nombre','$trataPsico','$psicoIndi','$psicoGrup','$teraFami','$progInsti','$ultimoId');";
			$this->db->query($SQL2);
			return true;
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
