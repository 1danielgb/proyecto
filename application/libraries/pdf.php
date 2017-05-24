<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {
        public function __construct() {
            parent::__construct();
        }
        // El encabezado del PDF
        public function Header(){
            $this->Image('img/logogobcol.jpg',16,8,50);
            
            //Inicio del banner, parte izquierda            
            $this->SetFont('Arial','B',8);
            $this->Cell(30);
            $this->Cell(250,10,'SECRETARIA DE SEGURIDAD PUBLICA',0,0,'C');
            $this->Ln('5');
            
            $this->SetFont('Arial','B',8);
            $this->Cell(30);
            $this->Cell(232,10,'Direccion General de Prevencion Reinsercion Social',0,0,'C');
            $this->Ln('5');

            $this->SetFont('Arial','B',8);
            $this->Cell(30);
            $this->Cell(253,10,'Centro de Reinsercion Social Colima',0,0,'C');
            $this->Ln('12');
            //Fin del banner, perte izquierda
            
       }
       // El pie del pdf
       public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',8);
           $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
      }
    }
?>