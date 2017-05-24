<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  //require_once APPPATH."/third_party/WriteHTML.php";
class pdfController extends CI_Controller {
 
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
    $personalidad = $this->m_pdf->obtenerDatos();
 
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
            $this->pdf->Cell(120,10,'ESTUDIO INICIAL DE PERSONALIDAD',0,0,'C');
            $this->pdf->Ln('13');
            //Fin del titulo del formato
            //Inicio del nombre del presidente
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
            $this->pdf->SetFont('Arial','',11);
            $this->pdf->Cell(30);
            //variable para mostrar acentos
            $intro=utf8_decode('Por este conducto envío a Usted reporte de la valoración psicológica ralizado al interno:');
            $this->pdf->Cell(120,10,$intro,0,0,'C');
            $this->pdf->Ln('10');

    //Alinacion justificadA
    $J='J';
    foreach ($personalidad as $persona) {
      //Inicio del nombre 
      $this->pdf->SetFont('Arial', 'B', 12);
      //nombre apellido acentos
      $nomape=utf8_decode($persona->nombre . " " . $persona->apellido);
      $this->pdf->Cell(180,10,$nomape,0,0,'C');
      $this->pdf->SetFont('Arial', 'B', 12);
      $this->pdf->Ln('20');
      //Fin del nombre 
      
      //Antecedentes Familiares y Personales
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(90,10,'ANTECEDENTES FAMILIARES Y PERSONALES',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      //$this->pdf->SetFillColor(200,200,200);
      $this->pdf->SetLeftMargin(13);
      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(170,5,$persona->antecedentesFamiyPers,0,$J,FALSE);
      $this->pdf->Ln('5');

      //Examen Mental
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(33,10,'EXAMEN MENTAL',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      //$this->pdf->SetFillColor(200,200,200);
      // variable para mostrar acentos 
      $texto=utf8_decode($persona->examenMent);
      $this->pdf->SetFont('Arial', '', 12);
      $this->pdf->MultiCell(180,5,$texto,0,$J,FALSE);
      $this->pdf->Ln('10');

      //Indice de lesión Organica
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(55,10,'INDICE DE LESION ORGANICA',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      //$this->pdf->SetFillColor(200,200,200);
      //$this->aligns=$J

      //$pdf->SetFont('Arial');
      //$pdf->WriteHTML('You can<br><p align="center">center a line</p>and add a horizontal rule:<br><hr>');
      $this->pdf->SetFont('Arial', '', 12);
      $A=isset($this->aligns[100]) ? $this->aligns[100] : 'J';
      $this->pdf->MultiCell(200,5,$persona->indiceLesOrga,0,$A,FALSE);
      $this->pdf->Ln('10');

       //Nivel intelectual
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(38,10,'NIVEL INTELECTUAL',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      //$this->pdf->SetFillColor(200,200,200);
      //$this->aligns=$J

      //$pdf->SetFont('Arial');
      //$pdf->WriteHTML('You can<br><p align="center">center a line</p>and add a horizontal rule:<br><hr>');
      $this->pdf->SetFont('Arial', '', 12);
      $A=isset($this->aligns[100]) ? $this->aligns[100] : 'J';
      $this->pdf->MultiCell(200,5,$persona->nivelIntelec,0,$A,FALSE);
      $this->pdf->Ln('20');

       //Dinamica de personalidad
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(55,10,'DINAMICA DE PERSONALIDAD',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      //$this->pdf->SetFillColor(200,200,200);
      //$this->aligns=$J

      //$pdf->SetFont('Arial');
      //$pdf->WriteHTML('You can<br><p align="center">center a line</p>and add a horizontal rule:<br><hr>');
      $this->pdf->SetFont('Arial', '', 12);
      $A=isset($this->aligns[100]) ? $this->aligns[100] : 'J';
      $this->pdf->MultiCell(200,5,$persona->dinamicaPers,0,$A,FALSE);
      $this->pdf->Ln('10');

       //IMPRESION DIAGNOSTICA
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(48,10,'IMPRESION DIAGNOSTICA',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

      //$this->pdf->SetFillColor(200,200,200);
      //$this->aligns=$J

      //$pdf->SetFont('Arial');
      //$pdf->WriteHTML('You can<br><p align="center">center a line</p>and add a horizontal rule:<br><hr>');
      $this->pdf->SetFont('Arial', '', 12);
      $A=isset($this->aligns[100]) ? $this->aligns[100] : 'J';
      $this->pdf->MultiCell(200,5,$persona->impresionDiagn,0,$A,FALSE);
      $this->pdf->Ln('10');

      //SALUDO
      $this->pdf->SetFont('Arial', '', 12);
      $A=isset($this->aligns[100]) ? $this->aligns[100] : 'J';
      $this->pdf->MultiCell(200,5,'Sin otro asunto particular por el momento, quedo a sus ordenes y reciba un cordial saludo.',0,$A,FALSE);
      $this->pdf->Ln('20');

      //Firma
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(190,10,'Atentamente.',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('5');
      //Fecha
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(190,10,'Colima, Col. a '. $persona->fecha,0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('5');
      //Departamento
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(190,10,'Departamento de Psicologia',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');
      //linea para firma
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(180,10,'_________________________________________________________________________________________',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('5');
      //Psicologo
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(190,10,'PSICOLOGO',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('5');
      //Cordinacion
      $this->pdf->SetFont('Arial', 'B', 10);
      $this->pdf->Cell(190,10,'CORDINACION DEL AREA DE PSICOLOGIA',0,0,'C');
      $this->pdf->Cell(30);
      $this->pdf->Ln('10');

    //}
    


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
     $this->pdf->Output("Estudio_Inicial_de_personalidad_de_" . $persona->nombre . " " . $persona->apellido . ".pdf", 'I');
     ob_end_flush();
    }
  }
}