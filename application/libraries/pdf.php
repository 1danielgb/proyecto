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
            $this->Cell(250,10,utf8_decode('SECRETARíA DE SEGURIDAD PúBLICA'),0,0,'C');
            $this->Ln('5');
            
            $this->SetFont('Arial','B',8);
            $this->Cell(30);
            $this->Cell(232,10,utf8_decode('Dirección General de Prevención Reinserción Social'),0,0,'C');
            $this->Ln('5');

            $this->SetFont('Arial','B',8);
            $this->Cell(30);
            $this->Cell(253,10,utf8_decode('Centro de Reinserción Social Colima'),0,0,'C');
            $this->Ln('12');
            //Fin del banner, perte izquierda
            
       }
       // El pie del pdf
       public function Footer(){
          //PIE
          $J='J';
          $this->Ln('5');
          $this->SetFont('Arial','B',11);
          $this->SetLeftMargin(18);
          $this->SetRightMargin(15);
          $this->MultiCell(0,5,utf8_decode('Año 2017, centenario del la constitución política de los estados unidos mexicanos  y de la constitución política del estado libre y soberano de colima.'),0,$J,false);
          $this->Ln('5');

          $this->SetY(-15);
          $this->SetFont('Arial','I',8);
          $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
      }
    }
?>