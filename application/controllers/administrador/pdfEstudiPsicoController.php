<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  //require_once APPPATH."/third_party/WriteHTML.php";
class pdfEstudiPsicoController extends CI_Controller {
 
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
    $personalidad = $this->m_pdf->pdfestudipsico();
 
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
            //Inicio del nombre del presidente
            $C='C';
            $J='J';
            $R='R';
            $this->pdf->SetFont('Arial','B',11);
            $this->pdf->Cell(30);
            $this->pdf->Cell(30,10,'LIC. ALEJANDRO GUERRERO GUERRERO',0,0,'C');
            $this->pdf->Ln('5');
            $this->pdf->SetFont('Arial','B',11);
            $this->pdf->Cell(30);
            $this->pdf->Cell(16,10,'DIRECTOR DEL CE.RE.SO. COLIMA',0,0,'C');
            $this->pdf->Ln('5');
            $this->pdf->SetFont('Arial','B',11);
            $this->pdf->Cell(30);
            $this->pdf->Cell(-21,10,'P R E S E N T E',0,0,'C');
            $this->pdf->Ln('10');
            //Fin del nombre del presidente
            //Inicio del titulo del formato
            $this->pdf->SetFont('Arial','B',13);
            $this->pdf->Cell(30);
            $this->pdf->Cell(120,10,utf8_decode('ESTUDIO PSICOLÓGICO'),0,0,'C');
            $this->pdf->Ln('13');
            //Fin del titulo del formato
            $this->pdf->SetFont('Arial','',11);
            //variable para mostrar acentos 
            $this->pdf->SetLeftMargin(13);
            $this->pdf->SetRightMargin(15);
            foreach ($personalidad as $persona) {
              $intro=utf8_decode('Por este conducto envío a Usted reporte de la valoración psicológica ralizado al interno: ' . 'Con fecha ' . $persona->fecha . ' y se anexa sultados de Estambul.');
              $this->pdf->MultiCell(0,5,$intro,0,$C,false);
              $this->pdf->SetFont('Arial','',11);
              $this->pdf->Ln('5');
          
            //variable para mostrar acentos
           
              // $intro=utf8_decode('Con fecha ' . $persona->fecha . ' y se anexa sultados de Estambul.');
              // $this->pdf->MultiCell(170,5,$intro,0,$C,false);
              // $this->pdf->Ln('10');
            //}
                

    //Alinacion justificadA
    
    //foreach ($personalidad as $persona) {
      //Inicio del nombre 
      $this->pdf->SetFont('Arial', 'B', 12);
      //nombre apellido acentos
      $nomape=utf8_decode($persona->nombreInter . " " . $persona->apellidoInter);
      $this->pdf->Cell(175,10,$nomape,0,0,'C');
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->Ln('20');
      //Fin del nombre 
      //Proceso Penal
      $this->pdf->SetLeftMargin(13);
      $this->pdf->SetRightMargin(15);
      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,'Proceso Penal: '.$persona->procesoPen,0,$R,FALSE);
      $this->pdf->Ln('5');
      //breve descripción
      $this->pdf->SetLeftMargin(13);
      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,utf8_decode($persona->descripEstuPsic),0,$J,FALSE);
      $this->pdf->Ln('5');

      //Antecedentes Familiares y Personales
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(82,10,'ANTECEDENTES FAMILIARES Y PERSONALES',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      //$this->pdf->SetFillColor(200,200,200);
      //$this->pdf->SetLeftMargin(13);
      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,utf8_decode($persona->anteceFamyPers),0,$J,FALSE);
      $this->pdf->Ln('5');

      //Examen Mental
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(33,10,'EXAMEN MENTAL:',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      //$this->pdf->SetFillColor(200,200,200);
      // variable para mostrar acentos 
      $texto=utf8_decode($persona->examenMent);
      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,$texto,0,$J,FALSE);
      $this->pdf->Ln('5');

       //Nivel intelectual
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(39,10,'NIVEL INTELECTUAL:',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');
      
      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,utf8_decode($persona->nivelIntel),0,$J,FALSE);
      $this->pdf->Ln('5');

      //Indice de lesión Organica
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(55,10,utf8_decode('INDICE DE LESIÓN ORGÁNICA:'),0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,utf8_decode($persona->indiceLesOrga),0,$J,FALSE);
      $this->pdf->Ln('5');

       //Dinamica de personalidad
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(61,10,utf8_decode('DINÁMICA DE LA PERSONALIDAD:'),0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,utf8_decode($persona->dinamicaPerson),0,$J,FALSE);
      $this->pdf->Ln('5');

       //Factores psicologicos que influyeron 
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(140,10,utf8_decode('FACTORES PSICOLÓGICOS QUE INFLUYERON PARA LA COMISIÓN DEL DELITO:'),0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,utf8_decode($persona->factoresPsicoComDeli),0,$J,FALSE);
      $this->pdf->Ln('5');

       //IMPRESION DIAGNOSTICA
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(48,10,utf8_decode('IMPRESIÓN DIAGNÓSTICA'),0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,utf8_decode($persona->impresionDiag),0,$J,FALSE);
      $this->pdf->Ln('10');

      //Conclusión
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(26,10,utf8_decode('CONCLUSIÓN'),0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,utf8_decode($persona->conclusion),0,$J,FALSE);
      $this->pdf->Ln('10');
      
      //SALUDO
      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(200,5,utf8_decode('Sin otro asunto particular por el momento, quedo a sus órdenes y reciba un cordial saludo.'),0,$J,FALSE);
      $this->pdf->Ln('20');

      //Firma
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(190,10,'ATENTAMENTE.',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('5');
      //Fecha
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(190,10,'COLIMA, COL. A '. $persona->fecha,0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('5');
      //Departamento
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(190,10,utf8_decode('DEPARTAMENTO DE PSICOLOGÍA'),0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('30');
      //linea para firma
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(180,10,'_________________________________________________________________',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('5');
      //Psicologo
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(190,10,'PSIC. ENEDELIA ROJAS PIZANO',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('5');
      //Cordinacion
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(190,10,'COORD. DEPTO DE PSICOLOGIA',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

    //}
    
      ////// Estambul del interno ///////
      //Orientacion de la nueva página  
      $O='P';
      $this->pdf->AddPage($O, 0 ,0);  
      $this->pdf->Ln('4');
      $this->pdf->SetFont('Arial','B',11);
      $this->pdf->MultiCell(0,5,'LIC. ALEJANDRO GUERRERO GUERRERO',0,$J,FALSE);
      $this->pdf->Ln('1');
      $this->pdf->SetFont('Arial','B',11);
      $this->pdf->Cell(0,5,'DIRECTOR DEL CE.RE.SO. COLIMA',0,$J,FALSE);
      $this->pdf->Ln('5');
      $this->pdf->SetFont('Arial','B',11);
      $this->pdf->Cell(0,5,'P R E S E N T E',0,$J,FALSE);
      $this->pdf->Ln('15');

      //Descripción del estampul
       $intro=utf8_decode('Por este medio me dirijo a usted para enviar estudio psicológico de ingreso así como examen psicológico bajo los estándares a que se refiere al capítulo VI del protocolo de Estambul mismo que solicita que se aclare si el procesado '. $persona->nombreInter . " " . $persona->apellidoInter . ' presenta estrés postraumático, agudo, crónico, o retrasado del procesado en antes mención.');
       $this->pdf->SetFont('Arial','',11);
       $this->pdf->MultiCell(0,5,$intro,0,$J,false);
       $this->pdf->Ln('10');
      
      //Version de tortura
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->MultiCell(0,5,utf8_decode('VERSION DE TORTURA'),0,$J,false);
      $this->pdf->Ln('5');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,'"'.utf8_decode($persona->vertur).'"',0,$J,FALSE);
      $this->pdf->Ln('10');

      //Titulo reporte de preguntas
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->MultiCell(0,5,utf8_decode('REPORTE DE PREGUNTAS DEL CAPITULO VI DE ESTAMBUL SIGNOS PSICOLÓGICOS INDICATIVOS DE TORTURA'),0,$J,false);
      $this->pdf->Ln('5');

      //Reporte de preguntas del capitulo VI de estambul
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->MultiCell(0,5,utf8_decode('1. Reexperimentación del trauma'),0,$J,false);
      $this->pdf->Ln('3');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,'    Respuesta:  '.'"'.utf8_decode($persona->reexpertor).'"',0,$J,FALSE);
      $this->pdf->Ln('10');

      //PREGUNTA 2
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->MultiCell(0,5,utf8_decode('2. Invitación emocional'),0,$J,false);
      $this->pdf->Ln('3');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,'    Respuesta:  '. utf8_decode($persona->inviemo),0,$J,FALSE);
      $this->pdf->Ln('10');

      //pregunta 3
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->MultiCell(0,5,utf8_decode('3. Hiperexitación'),0,$J,false);
      $this->pdf->Ln('3');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,'    Respuesta:  '. utf8_decode($persona->hiperex),0,$J,FALSE);
      $this->pdf->Ln('10');

      //pregunta 4
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->MultiCell(0,5,utf8_decode('4. Sintomas de depresión'),0,$J,false);
      $this->pdf->Ln('3');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,'    Respuesta:  '. utf8_decode($persona->sintdepre),0,$J,FALSE);
      $this->pdf->Ln('10');

      //pregunta 5
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->MultiCell(0,5,utf8_decode('4. Disminución de la autoestima y desesperanza en cuanto al futuro'),0,$J,false);
      $this->pdf->Ln('3');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,'    Respuesta:  '. utf8_decode($persona->disaut),0,$J,FALSE);
      $this->pdf->Ln('10');  

      //pregunta 6
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->MultiCell(0,5,utf8_decode('6. Disociación. Despersonalización y comportamiento atípico'),0,$J,false);
      $this->pdf->Ln('3');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,'    Respuesta:  '. utf8_decode($persona->disodesp),0,$J,FALSE);
      $this->pdf->Ln('10');
      //pregunta 7
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->MultiCell(0,5,utf8_decode('7. Quejas psicosomáticas'),0,$J,false);
      $this->pdf->Ln('3');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,'    Respuesta:  '. utf8_decode($persona->quejaspsi),0,$J,FALSE);
      $this->pdf->Ln('10');

      //pregunta 8
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->MultiCell(0,5,utf8_decode('8. Psicosis'),0,$J,false);
      $this->pdf->Ln('3');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,'    Respuesta:  '. utf8_decode($persona->psicosis),0,$J,FALSE);
      $this->pdf->Ln('10');
      //pregunta 9
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->MultiCell(0,5,utf8_decode('9. Deterioro neuropsicológico'),0,$J,false);
      $this->pdf->Ln('3');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,'    Respuesta:  '. utf8_decode($persona->deteneupsi),0,$J,FALSE);
      $this->pdf->Ln('10');
      //Diagnostico
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->MultiCell(0,5,utf8_decode('DIAGNOSTICO'),0,$J,false);
      $this->pdf->Ln('3');

      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(0,5,utf8_decode($persona->diagnostico),0,$J,FALSE);
      $this->pdf->Ln('10');

      //Firma de la psicologa
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->MultiCell(0,5,utf8_decode('COLIMA, COL. A '.$persona->fecha),0,$C,false);
      $this->pdf->Ln('30'); 
      //linea para firma
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(180,10,'_________________________________________________________________',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('5');
      //Psicologo
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(190,10,'PSIC. ENEDELIA ROJAS PIZANO',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('5');
      //Cordinacion
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(190,10,'COORD. DEPTO DE PSICOLOGIA',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');
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
    $nombrepdf=utf8_decode($persona->nombreInter . " " . $persona->apellidoInter);

    $carpeta = 'C:/xampp/htdocs/cereso/Formatos/estudiopsicologico/';
    $this->pdf->Output($carpeta.$nombrepdf.'.pdf','F');
     $this->pdf->Output("Estudio_Psicologico_de_" . $nombrepdf . ".pdf", 'I');
     //$this->pdf->Output("Estudio_Inicial_de_personalidad_de_" . $persona->nombre . " " . $persona->apellido . ".pdf", 'I');
     
     ob_end_flush();
    }
  }
}