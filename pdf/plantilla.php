<?php

require './fpdf/fpdf.php';

class PDF extends FPDF
{
    function Header()
    {
      $this->Image('./images/logo.png',10,10,30,30);
      $this->SetFont('Arial','B',16);
      #le dejo acontinuacion un salto de linea para que la imagen no quede
      #pegada con la tabla
      #
      $this->Cell(30);
      $this->Cell(120,40,'Mis Creaciones K',0,0,'C');
      #acontinuacion le doy un salto de linea para que el texto que viene

      $this->Ln(34);
    }

    function Footer()
    {
      $this->SetY(-15);
      $this->SetFont('Arial','I',8);
      $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
      $this->SetAuthor('K.S');
    }
}


?>
