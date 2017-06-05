<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  //require_once APPPATH."/third_party/WriteHTML.php";
class pdfEstCliniController extends CI_Controller {
 
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
    $personalidad = $this->m_pdf->pdfestuclinico();
 
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
            //$this->pdf->Ln('3');
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
            $this->pdf->Cell(120,10,utf8_decode('ESTUDIO CLÍNICO-CRIMINOLÓGICO'),0,0,'C');
            $this->pdf->Ln('20');
            //Fin del titulo del formato
            //$this->pdf->SetFont('Arial','',11);
            //variable para mostrar acentos 
            $this->pdf->SetLeftMargin(13);
            $this->pdf->SetRightMargin(15);
            foreach ($personalidad as $persona) {
              //Ubicacion
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('Ubicación '.$persona->ubicacion),0,$R,false);
              $this->pdf->ln('2');
              //mensaje
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('Por este conducto envío a usted reporte de la valoración psicológica realizada al procesado: '),0,$J,false);
              $this->pdf->ln('10');
              //nombre
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->nombreInterno),0,$C,false);
              $this->pdf->ln('10');
              //Descripción
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->descripcionInicial),0,$J,false);
              $this->pdf->ln('10');
              //Antecedentes familiares y personales
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('ANTECEDENTES FAMILIARES Y PERSONALES'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->anteFP),0,$J,false);
              $this->pdf->ln('10');
              // Version del delito
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('VERSION DEL DELITO'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->versiondeldelito),0,$J,false);
              $this->pdf->ln('10');
              // Examen mental
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('EXAMEN MENTAL'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->examenmental),0,$J,false);
              $this->pdf->ln('10');
              // Nivel intelectual
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('PRUEBAS APLICADAS'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->pruebasaplicadas),0,$J,false);
              $this->pdf->ln('10');
              // Indice de lesion organica
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('ÍNDICE DE LESIÓN ORGANICA:'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->indiceLO),0,$J,false);
              $this->pdf->ln('10');
              // Nivel intelectual
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('NIVEL INTELECTUAL'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->Nvlintelectual),0,$J,false);
              $this->pdf->ln('10');
              // Factores psicologicos del delito
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('FACTORES PSICOLÓGICOS QUE INTERVINIERON EN LA COMISIÓN DEL DELITO:'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->factPsicoDelito),0,$J,false);
              $this->pdf->ln('10');
              // DINAMICA DE PERSONALIDAD 
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('DINÁMICA DE PERSONALIDAD'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->dimamicaResp),0,$J,false);
              $this->pdf->ln('10');
              // IMPRESIÓN DIAGNÓSTICA 
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('IMPRESIÓN DIAGNÓSTICA'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->impreDiagnostica),0,$J,false);
              $this->pdf->ln('10');
              
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
              $this->pdf->Ln('10');
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
              $this->pdf->Ln('15');
              
    // /*
    //  * Se manda el pdf al navegador
    //  *
    //  * $this->pdf->Output(nombredelarchivo, destino);
    //  *
    //  * I = Muestra el pdf en el navegador
    //  * D = Envia el pdf para descarga
    //  *
    //  */
    $nombrepdf=utf8_decode($persona->nombreInterno);

    $carpeta = 'C:/xampp/htdocs/cereso/Formatos/estudioclinicocriminologico/';
    $this->pdf->Output($carpeta.$nombrepdf.'.pdf','F');
     $this->pdf->Output("estudio clinico-criminologico de" . $nombrepdf . ".pdf", 'I');
     //$this->pdf->Output("Estudio_Inicial_de_personalidad_de_" . $persona->nombre . " " . $persona->apellido . ".pdf", 'I');
     
     ob_end_flush();
    }
  }
}