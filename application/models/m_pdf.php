<?php
class m_pdf extends CI_Model {
 
    function __construct()
    {
        parent::__construct();
    }
 
    /* Devuelve la lista de alumnos que se encuentran en la tabla tblalumno */
    function obtenerDatos()
    {
      // $SQL2 = "INSERT INTO estudioinicialpersonalidad(idestudiopersonalidad,nombre,apellido,antecedentesFamiyPers,examenMent,indiceLesOrga,nivelIntelec,dinamicaPErs,impresionDiagn,formato_idformato) VALUES (null,'$nombre','$apellido','$antecedentes','$examen','$indice','$nivel','$dinamica','$impresion','$ultimoId');";
      //       $this->db->query($SQL2);

      $this->load->database();
      ///$sql = "select nombre from estudioinicialpersonalidad";
      //$nom=$this->db->get($sql);
      //print_r($nom);
      //die();



      //$ultimoId = $this->db->insert_id();
      
      //$this->db->select('nombre');
      //$this->db->from('estudioinicialpersonalidad');
      //$nombre =$query=$this->db->get();
      //print_r($nombre);
      //die();
      //$this->db->insert_id();
      $this->db->from('estudioinicialpersonalidad');
      $this->db->select_max('idestudiopersonalidad');      
      $id= $this->db->get();
      //$this->db->get($id);
      //convierto el dato 
      $ult= $id->row();
      //sacando el dato de la columna
      $ultimo = $ult->idestudiopersonalidad;
      //echo($ultimo);
      //print_r($id->result());
      //die();
      $this->db->where('idestudiopersonalidad =',$ultimo); 
      //$this->db->select('*');
      //$personalidad =$this->db->get("estudioinicialpersonalidad");
      $personalidad =$this->db->get("estudioinicialpersonalidad");
        //$alumnos = $this->db->get('tblalumno');
      //print_r($personalidad);
      //die();
        return $personalidad->result();
    }

    function pdfentrevista (){
       $this->load->database();
      $this->db->from('entrevistapsico');
      $this->db->select_max('identrevista');
          
      $id= $this->db->get();
      //$this->db->get($id);
      //convierto el dato 
      $ult= $id->row();
      //sacando el dato de la columna
      $ultimo = $ult->identrevista;
      //$idI=$ult->idInterno;
      //echo($idI);
      //print_r($id->result());
      //die();

       $this->db->where('identrevista =',$ultimo); 
       //$this->db->select('idInterno');  
      //$this->db->select('*');
      //$personalidad =$this->db->get("estudioinicialpersonalidad");
      $entrevista =$this->db->get("entrevistapsico");
      $entre=$entrevista->row();
      
        return $entrevista->result();
       
    }
    function pdfentrevista2(){
      $this->load->database();
      $this->db->from('entrevistapsico2');
      $this->db->select_max('identrevista2');
          
      $id= $this->db->get();
      //$this->db->get($id);
      //convierto el dato 
      $ult= $id->row();
      //sacando el dato de la columna
      $ultimo = $ult->identrevista2;
      //$idI=$ult->idInterno;
      //echo($idI);
      //print_r($id->result());
      //die();

       $this->db->where('identrevista2 =',$ultimo); 
       //$this->db->select('idInterno');  
      //$this->db->select('*');
      //$personalidad =$this->db->get("estudioinicialpersonalidad");
      $entrevista2 =$this->db->get("entrevistapsico2");
      $entre=$entrevista2->row();
      
        return $entrevista2->result();
       
    }
    function pdfestudipsico(){
      $this->load->database();
      $this->db->from('estupsicologico');
      $this->db->select_max('idestupsicologico');      
      $id= $this->db->get();
      //$this->db->get($id);
      //convierto el dato 
      $ult= $id->row();
      //sacando el dato de la columna
      $ultimo = $ult->idestupsicologico;
      //echo($ultimo);
      //print_r($id->result());
      //die();
      $this->db->where('idestupsicologico =',$ultimo); 
      //$this->db->select('*');
      //$personalidad =$this->db->get("estudioinicialpersonalidad");
      $personalidad =$this->db->get("estupsicologico");
        //$alumnos = $this->db->get('tblalumno');
      //print_r($personalidad);
      //die();
        return $personalidad->result();
    }
    function pdfestudipsico2(){
      $this->load->database();
      $this->db->from('estupsicologico2');
      $this->db->select_max('idestupsicologico2');      
      $id= $this->db->get();
      //$this->db->get($id);
      //convierto el dato 
      $ult= $id->row();
      //sacando el dato de la columna
      $ultimo = $ult->idestupsicologico2;
      //echo($ultimo);
      //print_r($id->result());
      //die();
      $this->db->where('idestupsicologico2 =',$ultimo); 
      //$this->db->select('*');
      //$personalidad =$this->db->get("estudioinicialpersonalidad");
      $personalidad2 =$this->db->get("estupsicologico2");
        //$alumnos = $this->db->get('tblalumno');
      //print_r($personalidad);
      //die();
        return $personalidad2->result();
    }
    function pdfestubeneficio(){
      $this->load->database();
      $this->db->from('estudiobeneficio');
      $this->db->select_max('idestudiobeneficio');      
      $id= $this->db->get();
      //$this->db->get($id);
      //convierto el dato 
      $ult= $id->row();
      //sacando el dato de la columna
      $ultimo = $ult->idestudiobeneficio;
      //echo($ultimo);
      //print_r($id->result());
      //die();
      $this->db->where('idestudiobeneficio =',$ultimo); 
      //$this->db->select('*');
      //$personalidad =$this->db->get("estudioinicialpersonalidad");
      $personalidad =$this->db->get("estudiobeneficio");
        //$alumnos = $this->db->get('tblalumno');
      //print_r($personalidad);
      //die();
        return $personalidad->result();
    }
    function pdfestubeneficio2(){
      $this->load->database();
      $this->db->from('estudiobeneficio2');
      $this->db->select_max('idestudiobeneficio2');      
      $id= $this->db->get();
      //$this->db->get($id);
      //convierto el dato 
      $ult= $id->row();
      //sacando el dato de la columna
      $ultimo = $ult->idestudiobeneficio2;
      //echo($ultimo);
      //print_r($id->result());
      //die();
      $this->db->where('idestudiobeneficio2 =',$ultimo); 
      //$this->db->select('*');
      //$personalidad =$this->db->get("estudioinicialpersonalidad");
      $personalidad =$this->db->get("estudiobeneficio2");
        //$alumnos = $this->db->get('tblalumno');
      //print_r($personalidad);
      //die();
        return $personalidad->result();
    }

    function pdfformactivity(){
      $this->load->database();
      $this->db->from('actividades');
      $this->db->select_max('idactividades');      
      $id= $this->db->get();
      //$this->db->get($id);
      //convierto el dato 
      $ult= $id->row();
      //sacando el dato de la columna
      $ultimo = $ult->idactividades;
      //echo($ultimo);
      //print_r($id->result());
      //die();
      $this->db->where('idactividades =',$ultimo); 
      //$this->db->select('*');
      //$personalidad =$this->db->get("estudioinicialpersonalidad");
      $personalidad =$this->db->get("actividades");
        //$alumnos = $this->db->get('tblalumno');
      //print_r($personalidad);
      //die();
        return $personalidad->result();
    }
    function pdfestuclinico(){
      $this->load->database();
      $this->db->from('estuclinicocriminologico');
      $this->db->select_max('idcriminologico');      
      $id= $this->db->get();
      //$this->db->get($id);
      //convierto el dato 
      $ult= $id->row();
      //sacando el dato de la columna
      $ultimo = $ult->idcriminologico;
      //echo($ultimo);
      //print_r($id->result());
      //die();
      $this->db->where('idcriminologico =',$ultimo); 
      //$this->db->select('*');
      //$personalidad =$this->db->get("estudioinicialpersonalidad");
      $personalidad =$this->db->get("estuclinicocriminologico");
        //$alumnos = $this->db->get('tblalumno');
      //print_r($personalidad);
      //die();
        return $personalidad->result();
    }
} 
?>