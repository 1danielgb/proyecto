<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  //require_once APPPATH."/third_party/WriteHTML.php";
class pdfEntrevistaController extends CI_Controller {
 
  public function index()
  {
    
    //print_r("entro");
    //die();
    // Se carga el modelo alumno
    $this->load->model('m_pdf');
    // Se carga la libreria fpdf
    $this->load->library('pdf');
    //echo("HOLA");
    //die();
    // Se obtienen los datos de la base de datos
    $entrevista = $this->m_pdf->pdfentrevista();
    $entrevista2 = $this->m_pdf->pdfentrevista2();
 
    // Creacion del PDF

    /*
     * Se crea un objeto de la clase Pdf, recuerda que la clase Pdf
     * heredó todos las variables y métodos de fpdf
     */
    ob_start();

    $this->pdf = new Pdf();
    //$pdf=new PDF_HTML();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
    //$this->pdf->SetFillColor(200,200,200);

    //Inicio del titulo del formato
            $this->pdf->SetFont('Arial','B',13);
            $this->pdf->Cell(30);
            $this->pdf->Cell(120,10,'ENTREVISTA PSICOLOGIA',0,0,'C');
            $this->pdf->Ln('13');
            //Fin del titulo del formato
            //Inicio del nombre del presidente
                // $this->pdf->SetFont('Arial','B',11);
                // $this->pdf->Cell(30);
                // $this->pdf->Cell(30,10,'LIC. ALEJANDRO GUERRERO GUERRERO',0,0,'C');
                // $this->pdf->Ln('5');
                // $this->pdf->SetFont('Arial','B',11);
                // $this->pdf->Cell(30);
                // $this->pdf->Cell(16,10,'DIRECTOR DEL CE.RE.SO. COLIMA',0,0,'C');
                // $this->pdf->Ln('5');
                // $this->pdf->SetFont('Arial','B',11);
                // $this->pdf->Cell(30);
                // $this->pdf->Cell(-21,10,'P R E S E N T E',0,0,'C');
                // $this->pdf->Ln('10');
                // //Fin del nombre del presidente 
                // $this->pdf->SetFont('Arial','',11);
                // $this->pdf->Cell(30);
                // //variable para mostrar acentos
                // $intro=utf8_decode('Por este conducto envío a Usted reporte de la valoración psicológica ralizado al interno:');
                // $this->pdf->Cell(120,10,$intro,0,0,'C');
                // $this->pdf->Ln('10');

    //Alinacion justificadA
    $J='J';
    foreach ($entrevista as $entrevista) {
      
      //Inicio del la fecha 
      $this->pdf->SetFont('Arial', 'B', 12);
      //fecha
      $nomape=utf8_decode($entrevista->fecha);
      $this->pdf->Cell(180,10,$nomape,0,0,'C');
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->Ln('20');
      //Fin fecha 
      
      //Ficha de Identificacion
       $this->pdf->SetFont('Arial', 'B', 10);
       $this->pdf->Cell(60,10,'1.- FICHA DE IDENTIFICACION',0,0,'C');
       $this->pdf->Cell(30);
       $this->pdf->Ln('7');
      //Inicio con noombre y edad
       $this->pdf->SetLeftMargin(18);
       $this->pdf->SetRightMargin(15);
       $this->pdf->SetFont('Arial', '', 10);
       $this->pdf->MultiCell(0,5,'NOMBRE:  '. utf8_decode($entrevista->nombreint).'                              EDAD:  '. $entrevista->edad,0,$J,false);
       $this->pdf->Ln('1');
       //Fecha de nacimiento y Lugar de nacimiento 
       $this->pdf->SetFont('Arial', '', 10);
       $this->pdf->MultiCell(0,5,'FECHA DE NACIMIENTO:  '. $entrevista->fechanacimi.'                              LUGAR DE NAC.  '. utf8_decode($entrevista->lugarNaci),0,$J,false);
       $this->pdf->Ln('1');
       //Recidencia y Domicilio 
       $this->pdf->SetFont('Arial', '', 10);
       $this->pdf->MultiCell(0,5,'RECIDENCIA:  '. utf8_decode($entrevista->residencia).'                                                            DOMICILIO:  '. utf8_decode($entrevista->domicilio),0,$J,false);
       $this->pdf->Ln('1');
       //Ocupacion and Escolaridad
       $this->pdf->SetFont('Arial', '', 10);
       $this->pdf->MultiCell(0,5,'OCUPACION:  '. utf8_decode($entrevista->ocupacion).'                                                   ESCOLARIDAD:  '. utf8_decode($entrevista->escolaridad),0,$J,false);
       $this->pdf->Ln('1');
       //Estado civil and Delito 
       $this->pdf->SetFont('Arial', '', 10);
       $this->pdf->MultiCell(0,5,'ESTADO CIVIL:  '. utf8_decode($entrevista->estadocivil).'                                                     DELITO:  '.utf8_decode( $entrevista->delitos),0,$J,false);
       $this->pdf->Ln('2');
       //Motivo de la consulta 
       $this->pdf->SetFont('Arial', '', 10);
       $this->pdf->MultiCell(0,5,'MOTIVO DE LA CONSULTA:  '. utf8_decode($entrevista->mtvconsulta),0,$J,false);
       $this->pdf->Cell(30);
       $this->pdf->Ln('5');
      //Datos familiares
       $this->pdf->SetFont('Arial', 'B', 10);
       $this->pdf->Cell(-5);
       $this->pdf->Cell(50,5,'2.- DATOS FAMILIARES.',0,$J,false);
       $this->pdf->Ln('5');
      //Encabezado familia
       $this->pdf->SetFont('Arial', 'B', 10);
       $this->pdf->MultiCell(0,5,'                            NOMBRE'.'                         ESCOLARIDAD'.'                         OCUPACION'.'                       EDAD',0,$J,false);
       $this->pdf->Ln('2');
      //Encabezado filas familia
       $this->pdf->SetFont('Arial', '', 10);
       $this->pdf->MultiCell(0,5,'    PADRE:           '.utf8_decode($entrevista->nomPadre)."                              ".utf8_decode($entrevista->escoPadre)."                                      ".utf8_decode($entrevista->ocupPadre)."                           ".utf8_decode($entrevista->edadPadre),0,$J,false);
       $this->pdf->Ln('2');
       //LINEA MADRE
       $this->pdf->SetFont('Arial', '', 10);
       $this->pdf->MultiCell(0,5,'    MADRE:          '.utf8_decode($entrevista->nomMadre)."                              ".utf8_decode($entrevista->escoMadre)."                                ".utf8_decode($entrevista->ocupMadre)."                        ".utf8_decode($entrevista->edadMadre),0,$J,false);
       $this->pdf->Ln('1');
       //Linea hermanos
       $this->pdf->SetFont('Arial', '', 10);
       $this->pdf->Cell(20,10,'HNOS:',0,0,'C');
       $this->pdf->Cell(30);
       $this->pdf->Ln('0');
        //cargando la base de datos para generar los nombre de los hermanos xD
        $this->load->database();
        //datos de los hermanos del interno la tabla se llama hijo pero es la de hermanos xD 
        $result=$this->db->query("SELECT nombre,escolaridad,ocupacion, edad FROM hijo WHERE interno_idInterno='$entrevista->idInterno'");
        $hermanos=$result->result();
        //$nombre=$hermanos->nombre;
        //echo $nombre;
       // die();
       //foreach para imprimir los datos de los hermanos del interno
        // La variable $x se utiliza para mostrar un número consecutivo
         $x = 1;
         foreach ($hermanos as $hermano) {
          // se imprime el numero actual y despues se incrementa el valor de $x en uno
           //$this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
           // Se imprimen los datos de cada alumno
            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(73,10,' '. utf8_decode($hermano->nombre),0,0,'C');
            $this->pdf->Cell(30);
            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(-48,10,' '. utf8_decode($hermano->escolaridad),0,0,'C');
            $this->pdf->Cell(30);
            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(85,10,' '. utf8_decode($hermano->ocupacion),0,0,'C');
            $this->pdf->Cell(30);
            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(-65,10,' '. utf8_decode($hermano->edad),0,0,'C');
            $this->pdf->Cell(30);
           // $this->pdf->Cell(25,5,$hermano->nombre,'B',0,'L',0);
           // $this->pdf->Cell(25,5,$hermano->escolaridad,'B',0,'L',0);
           // $this->pdf->Cell(25,5,$hermano->ocupacion,'B',0,'L',0);
           // $this->pdf->Cell(25,5,$hermano->edad,'B',0,'L',0);
        //   $this->pdf->Cell(40,5,$persona->examenMent,'B',0,'C',0);
        //   $this->pdf->Cell(25,5,$persona->indiceLesOrga,'B',0,'L',0);
        //   $this->pdf->Cell(25,5,$persona->nivelIntelec,'BR',0,'C',0);
        //   $this->pdf->Cell(25,5,$persona->dinamicaPers,'BR',0,'C',0);
        //     $this->pdf->Cell(25,5,$persona->impresionDiagn,'BR',0,'C',0);
           //Se agrega un salto de linea
           $this->pdf->Ln(5);
         }
       $this->pdf->Ln('10');
       //Antecedentes del interno
       $this->pdf->SetFont('Arial', 'B', 10);
       //$this->pdf->SetLeftMargin(20);
       $this->pdf->Cell(53,10,'3.- ANTECEDENTES DEL INTERNO:',0,0,'C');
       $this->pdf->Cell(30);
       $this->pdf->Ln('8');
       $this->pdf->SetFont('Arial', '', 10);
       $this->pdf->MultiCell(0,5,' '. utf8_decode($entrevista->antInterno),0,$J,FALSE);
       //$this->pdf->Cell(30);
       $this->pdf->Ln('5');
       //Antecedentes del interno
       $this->pdf->SetLeftMargin(18);
       $this->pdf->SetRightMargin(15);
       $this->pdf->SetFont('Arial', 'B', 10);
       $this->pdf->Cell(107,10,'4.- FACTORES QUE INTERVINIERON EN LA COMISON DEL DELITO:',0,0,'C');
       $this->pdf->Ln('8');
       $this->pdf->SetFont('Arial', '', 10);
       $this->pdf->MultiCell(0,5,utf8_decode($entrevista->factInterComDeli),0,$J,false);
       //Escolaridad
       $this->pdf->SetFont('Arial', 'B', 10);
       $this->pdf->Cell(23,10,'5.- ESCOLARIDAD',0,0,'C');
       $this->pdf->Ln('8');
       $this->pdf->SetFont('Arial', '', 10);
       $this->pdf->MultiCell(0,5,' '. utf8_decode($entrevista->escolaridad),0,$J,false);
       $this->pdf->Ln('5');

       //Foreach para la siguiente tabla de actividades :( 
       foreach ($entrevista2 as $entrevista2) {
           //Actividades
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->Cell(22,10,'6.- ACTIVIDADES',0,0,'C');
         $this->pdf->Ln('8');
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,' '. utf8_decode($entrevista2->actividades),0,$J,false);
         $this->pdf->Ln('5');
         //Relaciones Familiares
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->Cell(52,10,'7.- RELACIONES FAMILIARES',0,0,'C');
         $this->pdf->Ln('8');
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->SetLeftMargin(18);
         $this->pdf->SetRightMargin(15);
         $this->pdf->MultiCell(0,5,' '. utf8_decode($entrevista2->relaFami),0,$J,false);
         $this->pdf->Ln('10');

         //$this->pdf->SetLeftMargin(10);
         ////// Estambul del interno ///////
          //Orientacion de la nueva página  
          $O='P';
          $this->pdf->AddPage($O, 0 ,0);  
         //Examen mental

         $this->pdf->SetFont('Arial','B',13);
         $this->pdf->Cell(30);
         $this->pdf->Cell(120,10,'EXAMEN MENTAL',0,0,'C');
         $this->pdf->Ln('13');
         //Relaciones Familiares
         $this->pdf->SetLeftMargin(18);
         $this->pdf->SetRightMargin(15);
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,'I. APARIENCIA Y CONDUCTA',0,$J,false);
         
         //relacion familiar
         $this->pdf->Ln('5');
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.utf8_decode('1)       Relación entre la edad aparente y la edad real.'),0,$J,false);
         
         //respuesta de la relacion de la edad
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'           '. utf8_decode($entrevista2->relacionEdad),0,$J,false);
         
         //vestido apariencia y conducta
         $this->pdf->Ln('2');
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.'2)       Vestido',0,$J,false);
        
         //respuesta de vestido
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'           '. utf8_decode($entrevista2->vestido),0,$J,false);
        
         // I higiene personal 
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.'3)       Higiene personal',0,$J,false);
        
         // I respuesta Higiene 
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'           '. utf8_decode($entrevista2->igienePers),0,$J,false);
        
         // I apariencia total
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.'4)       Apariencia total',0,$J,false);
        
         //I Respuesta apariencia total
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'           '. utf8_decode($entrevista2->apareTotal),0,$J,false);
         
         //I Postura
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.utf8_decode('5)       Postura'),0,$J,false);
         
         // I Respuesta postura
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'           '. utf8_decode($entrevista2->postura),0,$J,false);
         //I Forma de caminar
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.'6)       Forma de caminar',0,$J,false);
         //I Respuesta forma de caminar 
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'           '. utf8_decode($entrevista2->formaCaminar),0,$J,false);
         // I Exprecion facila reflejado
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.utf8_decode('7)       Expresión facial reflejado'),0,$J,false);
         // I Respuesta expresion facial reflejada
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'           '. utf8_decode($entrevista2->expFacialRel),0,$J,false);
         // I Expresiones faciales 
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.'8)       Expresiones faciales',0,$J,false);
         // I Respuesta expreción facial 
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'           '. utf8_decode($entrevista2->expFacial),0,$J,false);
          $this->pdf->Ln('5');
         // III Actitud durante la entrevista
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.'II. ACTITUD DURANTE LA ENTREVISTA',0,$J,false);
         //II Actitud de la entrevista interacion general con el examinador
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.utf8_decode('1)       Interación general con el examinador'),0,$J,false);
         //II respuesta de la interacion general con el examinador
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'           '. utf8_decode($entrevista2->intGenExam),0,$J,false);
         //II Actitud de la entrevista interacion especifica 
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.utf8_decode('2)       Interación específica con el examinador'),0,$J,false);
         //respuesta de interacion especifica con el examinador
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'           '. utf8_decode($entrevista2->intEspExam),0,$J,false);
         $this->pdf->Ln('5');
         // III Actitud durante la entrevista
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.'III. ACTITUD DURANTE LA ENTREVISTA',0,$J,false);
         // III Actividadmotora
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.utf8_decode('1)       La actividad motora es: '),0,$J,false);
         //Respuesta III La actividad motora
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'           '. utf8_decode($entrevista2->actiMotora),0,$J,false);  
         //conducta manifiesta III 
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.utf8_decode('2)       Conducta manifiesta. '),0,$J,false);
         //Respuesta conducta manifiesta III
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'           '. utf8_decode($entrevista2->conducta),0,$J,false);  

         $this->pdf->Ln('5');
         //IV Pensamiento Lenguaje 
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.'IV. PENSAMIENTO LENGUAJE',0,$J,false);
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.utf8_decode('A)       Lenguaje. '),0,$J,false);
         //IV Tono de voz
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.utf8_decode('1)       Tono de voz'),0,$J,false);

         // IV Respuesta Tono de voz
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'            '.utf8_decode($entrevista2->tonoVoz),0,$J,false); 
         // IV Probelmas interpersonales Ocurridos especificamente con:
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''. utf8_decode('2)       Problemas interpersonales ocurridos especificamente con: '),0,$J,false);
         // IV Respuesta problemas interpersonales
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'            '. utf8_decode($entrevista2->probInterPers),0,$J,false);
         //problemas interpersonales
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.'3)       Historia de conductas antisociales',0,$J,false);
         //problemas interpesonales
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'             '.utf8_decode($entrevista2->condAntiSoci),0,$J,false);
         //rconducta antisocial
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''. utf8_decode('4)       Conducta antisocial habitual'),0,$J,false);
         //respuesta conducta antisocial
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'             '.utf8_decode($entrevista2->condAntiSociAbi),0,$J,false);
         //historial de problemas legales 
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''. utf8_decode('5)       Historial de problemas legales'),0,$J,false);
         // respuesta historial de problemas legales
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'         '.utf8_decode($entrevista2 ->histLegal),0,$J,false);
         // Problemas legales habituales
         $this->pdf->SetLeftMargin(18);
         $this->pdf->SetRightMargin(15);
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.utf8_decode('6)        Problemas legales habituales '),0,$J,false);
         //Respuesta Problemas legales habituales
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'         '. utf8_decode($entrevista2->probLegAbit),0,$J,false);
         //Clasificación general de ajustes interpersonal
         $this->pdf->SetLeftMargin(18);
         $this->pdf->SetRightMargin(15);
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->MultiCell(0,5,''.utf8_decode('7)        Clasificación general de ajustes interpersonal'),0,$J,false);
         // Respuesta Clasificación general de ajustes interpersonal
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->MultiCell(0,5,'             '. utf8_decode($entrevista2->clasiGenAjusteInterPerso),0,$J,false);
         $this->pdf->Ln('5');

         //Continuación de la entrevista
         //Autoconcepto
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->Cell(28,10,' '. utf8_decode('9.-  AUTOCONCEPTO: '),0,0,'C');
         $this->pdf->Cell(30);
         $this->pdf->Ln('10');
         //Respuesta de autoconcepto
         $this->pdf->SetFont('Arial', '', 10);
         $this->pdf->SetLeftMargin(18);
         $this->pdf->SetRightMargin(15);
         $this->pdf->MultiCell(0,5,' '. utf8_decode($entrevista2->autoconcepto),0,$J,FALSE);
         $this->pdf->Ln('5');
         //Expectativa a futuro
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->Cell(50,10,' '. utf8_decode('10.-  EXPECTATIVAS A FUTURO '),0,0,'C');
         $this->pdf->Cell(30);
         $this->pdf->Ln('10');
         $this->pdf->SetFont('Arial', '', 10);
         //$this->pdf->SetLeftMargin(20);
         $this->pdf->SetLeftMargin(18);
         $this->pdf->SetRightMargin(15);
         $this->pdf->MultiCell(0,5,' '. utf8_decode($entrevista2->espeFuturo),0,$J,FALSE);
         $this->pdf->Ln('5');
         //Impresion diagnostica
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->Cell(39,10,' '. utf8_decode('11.-  IMPRESIÓN DIAGNOSTICA'),0,0,'C');
         $this->pdf->Cell(30);
         $this->pdf->Ln('10');
         //Respuesta imresión diagnostica
         $this->pdf->SetFont('Arial', '', 10);
         //$this->pdf->SetLeftMargin(20);
         $this->pdf->MultiCell(0,5,' '. utf8_decode($entrevista2->ImpDiagnostico),0,$J,FALSE);
         $this->pdf->Ln('10');
         //Firma del psicologo
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->Cell(248,10,' '. utf8_decode('PSICÓLOGO: __________________________________________'),0,0,'C');
         $this->pdf->Cell(30);
         $this->pdf->Ln('10');
         //Impresion diagnostica
         $this->pdf->SetFont('Arial', 'B', 10);
         $this->pdf->Cell(35,10,' '. utf8_decode('OBSERVACIONES: '),0,0,'C');
         $this->pdf->Cell(30);
         $this->pdf->Ln('10');
         //OBSERVACIONES 
         $this->pdf->SetFont('Arial', '', 10);
         //$this->pdf->SetLeftMargin(20);
         $this->pdf->MultiCell(0,5,' '. utf8_decode($entrevista2->observaciones),0,$J,FALSE);
         $this->pdf->Cell(30);
         $this->pdf->Ln('10');
       }
       
    //   //$this->pdf->SetFillColor(200,200,200);
    //   $this->pdf->SetLeftMargin(13);
    //   $this->pdf->SetFont('Arial', '', 12);
    //   $this->pdf->MultiCell(170,5,$persona->antecedentesFamiyPers,0,$J,FALSE);
    //   $this->pdf->Ln('5');

    //   //Examen Mental
    //   $this->pdf->SetFont('Arial', 'B', 10);
    //   $this->pdf->Cell(33,10,'EXAMEN MENTAL',0,0,'C');
    //   $this->pdf->Cell(30);
    //   $this->pdf->Ln('10');

    //   //$this->pdf->SetFillColor(200,200,200);
    //   // variable para mostrar acentos 
    //   $texto=utf8_decode($persona->examenMent);
    //   $this->pdf->SetFont('Arial', '', 12);
    //   $this->pdf->MultiCell(180,5,$texto,0,$J,FALSE);
    //   $this->pdf->Ln('10');

    //   //Indice de lesión Organica
    //   $this->pdf->SetFont('Arial', 'B', 10);
    //   $this->pdf->Cell(55,10,'INDICE DE LESION ORGANICA',0,0,'C');
    //   $this->pdf->Cell(30);
    //   $this->pdf->Ln('10');

    //   //$this->pdf->SetFillColor(200,200,200);
    //   //$this->aligns=$J

    //   //$pdf->SetFont('Arial');
    //   //$pdf->WriteHTML('You can<br><p align="center">center a line</p>and add a horizontal rule:<br><hr>');
    //   $this->pdf->SetFont('Arial', '', 12);
    //   $A=isset($this->aligns[100]) ? $this->aligns[100] : 'J';
    //   $this->pdf->MultiCell(200,5,$persona->indiceLesOrga,0,$A,FALSE);
    //   $this->pdf->Ln('10');

    //    //Nivel intelectual
    //   $this->pdf->SetFont('Arial', 'B', 10);
    //   $this->pdf->Cell(38,10,'NIVEL INTELECTUAL',0,0,'C');
    //   $this->pdf->Cell(30);
    //   $this->pdf->Ln('10');

    //   //$this->pdf->SetFillColor(200,200,200);
    //   //$this->aligns=$J

    //   //$pdf->SetFont('Arial');
    //   //$pdf->WriteHTML('You can<br><p align="center">center a line</p>and add a horizontal rule:<br><hr>');
    //   $this->pdf->SetFont('Arial', '', 12);
    //   $A=isset($this->aligns[100]) ? $this->aligns[100] : 'J';
    //   $this->pdf->MultiCell(200,5,$persona->nivelIntelec,0,$A,FALSE);
    //   $this->pdf->Ln('20');

    //    //Dinamica de personalidad
    //   $this->pdf->SetFont('Arial', 'B', 10);
    //   $this->pdf->Cell(55,10,'DINAMICA DE PERSONALIDAD',0,0,'C');
    //   $this->pdf->Cell(30);
    //   $this->pdf->Ln('10');

    //   //$this->pdf->SetFillColor(200,200,200);
    //   //$this->aligns=$J

    //   //$pdf->SetFont('Arial');
    //   //$pdf->WriteHTML('You can<br><p align="center">center a line</p>and add a horizontal rule:<br><hr>');
    //   $this->pdf->SetFont('Arial', '', 12);
    //   $A=isset($this->aligns[100]) ? $this->aligns[100] : 'J';
    //   $this->pdf->MultiCell(200,5,$persona->dinamicaPers,0,$A,FALSE);
    //   $this->pdf->Ln('10');

    //    //IMPRESION DIAGNOSTICA
    //   $this->pdf->SetFont('Arial', 'B', 10);
    //   $this->pdf->Cell(48,10,'IMPRESION DIAGNOSTICA',0,0,'C');
    //   $this->pdf->Cell(30);
    //   $this->pdf->Ln('10');

    //   //$this->pdf->SetFillColor(200,200,200);
    //   //$this->aligns=$J

    //   //$pdf->SetFont('Arial');
    //   //$pdf->WriteHTML('You can<br><p align="center">center a line</p>and add a horizontal rule:<br><hr>');
    //   $this->pdf->SetFont('Arial', '', 12);
    //   $A=isset($this->aligns[100]) ? $this->aligns[100] : 'J';
    //   $this->pdf->MultiCell(200,5,$persona->impresionDiagn,0,$A,FALSE);
    //   $this->pdf->Ln('10');

    //   //SALUDO
    //   $this->pdf->SetFont('Arial', '', 12);
    //   $A=isset($this->aligns[100]) ? $this->aligns[100] : 'J';
    //   $this->pdf->MultiCell(200,5,'Sin otro asunto particular por el momento, quedo a sus ordenes y reciba un cordial saludo.',0,$A,FALSE);
    //   $this->pdf->Ln('20');

    //   //Firma
    //   $this->pdf->SetFont('Arial', 'B', 10);
    //   $this->pdf->Cell(190,10,'Atentamente.',0,0,'C');
    //   $this->pdf->Cell(30);
    //   $this->pdf->Ln('5');
    //   //Fecha
    //   $this->pdf->SetFont('Arial', 'B', 10);
    //   $this->pdf->Cell(190,10,'Colima, Col. a '. $persona->fecha,0,0,'C');
    //   $this->pdf->Cell(30);
    //   $this->pdf->Ln('5');
    //   //Departamento
    //   $this->pdf->SetFont('Arial', 'B', 10);
    //   $this->pdf->Cell(190,10,'Departamento de Psicologia',0,0,'C');
    //   $this->pdf->Cell(30);
    //   $this->pdf->Ln('10');
    //   //linea para firma
    //   $this->pdf->SetFont('Arial', 'B', 10);
    //   $this->pdf->Cell(180,10,'_________________________________________________________________________________________',0,0,'C');
    //   $this->pdf->Cell(30);
    //   $this->pdf->Ln('5');
    //   //Psicologo
    //   $this->pdf->SetFont('Arial', 'B', 10);
    //   $this->pdf->Cell(190,10,'PSICOLOGO',0,0,'C');
    //   $this->pdf->Cell(30);
    //   $this->pdf->Ln('5');
    //   //Cordinacion
    //   $this->pdf->SetFont('Arial', 'B', 10);
    //   $this->pdf->Cell(190,10,'CORDINACION DEL AREA DE PSICOLOGIA',0,0,'C');
    //   $this->pdf->Cell(30);
    //   $this->pdf->Ln('10');

    // //}
    


    // /* Se define el titulo, márgenes izquierdo, derecho y
    //  * el color de relleno predeterminado
    //  */
    // $this->pdf->SetTitle("Estudio de personalidad");
    // $this->pdf->SetLeftMargin(15);
    // $this->pdf->SetRightMargin(15);
    // $this->pdf->SetFillColor(200,200,200);
 
    // // Se define el formato de fuente: Arial, negritas, tamaño 9
    // $this->pdf->SetFont('Arial', 'B', 9);
    // /*
    //  * TITULOS DE COLUMNAS
    //  *
    //  * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
    //  */
 
    // $this->pdf->Cell(15,7,'ID','TBL',0,'C','1');
    // $this->pdf->Cell(15,7,'Fecha','TBL',0,'C','1');
    // $this->pdf->Cell(25,7,'Nombre','TB',0,'L','1');
    // $this->pdf->Cell(25,7,'Apellido','TB',0,'L','1');
    // $this->pdf->Cell(25,7,'Antecedentes','TB',0,'L','1');
    // $this->pdf->Cell(40,7,'Examen mental','TB',0,'C','1');
    // $this->pdf->Cell(25,7,'indice de lecciones organicas','TB',0,'L','1');
    // $this->pdf->Cell(25,7,'Nivel intelectual','TBR',0,'C','1');
    // $this->pdf->Cell(25,7,'Dinamica de personalidad','TBR',0,'C','1');
    // $this->pdf->Cell(25,7,'Impresion diagnostica','TBR',0,'C','1');
    // $this->pdf->Ln(7);
    // // La variable $x se utiliza para mostrar un número consecutivo
    // $x = 1;
    // foreach ($personalidad as $persona) {
    //   // se imprime el numero actual y despues se incrementa el valor de $x en uno
    //   $this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
    //   // Se imprimen los datos de cada alumno
    //   $this->pdf->Cell(25,5,$persona->fecha,'B',0,'L',0);
    //   $this->pdf->Cell(25,5,$persona->nombre,'B',0,'L',0);
    //   $this->pdf->Cell(25,5,$persona->apellido,'B',0,'L',0);
    //   $this->pdf->Cell(25,5,$persona->antecedentesFamiyPers,'B',0,'L',0);
    //   $this->pdf->Cell(40,5,$persona->examenMent,'B',0,'C',0);
    //   $this->pdf->Cell(25,5,$persona->indiceLesOrga,'B',0,'L',0);
    //   $this->pdf->Cell(25,5,$persona->nivelIntelec,'BR',0,'C',0);
    //   $this->pdf->Cell(25,5,$persona->dinamicaPers,'BR',0,'C',0);
    //     $this->pdf->Cell(25,5,$persona->impresionDiagn,'BR',0,'C',0);
    //   //Se agrega un salto de linea
    //   $this->pdf->Ln(5);
    // }
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
      $nombrepdf=utf8_decode($entrevista->nombreint);

      $carpeta = 'C:/xampp/htdocs/cereso/Formatos/entrevistapsicologica/';
      $this->pdf->Output($carpeta.$nombrepdf.'.pdf','F');
      $this->pdf->Output("Estudio_Inicial_de_personalidad_de_" . $nombrepdf . ".pdf", 'I');

     //$this->pdf->Output("Estudio_Inicial_de_personalidad_de_" . $entrevista->nombreint . ".pdf", 'I');
     ob_end_flush();
    }
  }
}