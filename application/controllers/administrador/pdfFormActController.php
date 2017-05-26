<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  //require_once APPPATH."/third_party/WriteHTML.php";
class pdfFormActController extends CI_Controller {
 
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
    $personalidad = $this->m_pdf->pdfformactivity();
 
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
            $this->pdf->Cell(120,10,utf8_decode('DEPARTAMENTO DE PSICOLOGÍA'),0,0,'C');
            $this->pdf->Ln('7');
            $this->pdf->SetFont('Arial','',13);
            $this->pdf->Cell(30);
            $this->pdf->Cell(120,10,utf8_decode('FORMATO DE ACTIVIDADES'),0,0,'C');
            
            $this->pdf->Ln('20');
            //Fin del titulo del formato
            //$this->pdf->SetFont('Arial','',11);
            //variable para mostrar acentos 
            $this->pdf->SetLeftMargin(13);
            $this->pdf->SetRightMargin(15);
            foreach ($personalidad as $persona) {
              //Nombre del interno
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('El tratamiento Psicológico dentro del Sistema Penitenciario a personas privadas de su libertad que influye a procesados y procesadas y/o sentenciados y sentenciadas para fines de reahabilitación modificando aquellas conductas antisociales implícitas en el delito imputado mediante la adquisición de nuevas estrategias que benefician a su reinserción social.'),0,$J,false);
              $this->pdf->ln('10');
              //Tratamiento psicologico
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('Tratamiendo psicológico por dependiencia a psico-fármacos:'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->tratPsico),0,$J,false);
              $this->pdf->ln('5');
               //Psicoterapia Individual
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('Psicoterapia Individual'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->psicIndiv),0,$J,false);
              $this->pdf->ln('5');
               //Psicoterapia Grupal
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('Psicoterapia Grupal'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->psicoGrup),0,$J,false);
              $this->pdf->ln('5');
              $nombrepdf=utf8_decode($persona->nombre);
               //Terapia Familiar
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('Terapia Familiar'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->terapiaFami),0,$J,false);
              $this->pdf->ln('5');
               //Programa de Instituciones Externas
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('Programa de Instituciones Externas'),0,$J,false);
              $this->pdf->ln('3');
              $this->pdf->SetFont('Arial', '', 12);
              $this->pdf->MultiCell(0,5,utf8_decode($persona->progInstiExter),0,$J,false);
              $this->pdf->ln('7');
               //Firma
              $this->pdf->SetFont('Arial', 'B', 12);
              $this->pdf->MultiCell(0,5,utf8_decode('Se hace constar que a mi ingreso se me informó los diferentes tratamientos que maneja este departamento de psicología:'),0,$J,false);
              $this->pdf->ln('5');
              $this->pdf->SetFont('Arial', 'B', 10);
              $this->pdf->MultiCell(0,5,'____________________________________________________________',0,$C,false);
              $this->pdf->Ln('2');
              //INTERNO 
              $this->pdf->SetFont('Arial', 'B', 10);
              $this->pdf->MultiCell(0,5,utf8_decode('Nombre y firma de la persona privada de su libertad.'),0,$C,false);
              $this->pdf->Ln('3');
              //Fecha
              $this->pdf->SetFont('Arial', '', 10);
              $this->pdf->MultiCell(0,5,utf8_decode('Colima, Col.; Fecha de elaboración: '.$persona->fecha),0,$R,false);
              $this->pdf->Ln('5');
              //Guardando el PDF
              $nombrepdf=utf8_decode($persona->nombre);
              $carpeta = 'C:/xampp/htdocs/cereso/Formatos/formatodeactividades/';
              $this->pdf->Output($carpeta.$nombrepdf.'.pdf','F');
              $this->pdf->Output("Formato_de_actividades_de_" . $nombrepdf . ".pdf", 'I');
               //$this->pdf->Output("Estudio_Inicial_de_personalidad_de_" . $persona->nombre . " " . $persona->apellido . ".pdf", 'I');
               
               ob_end_flush();
            }
  }
}