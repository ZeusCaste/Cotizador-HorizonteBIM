<?php
class PDF extends FPDF
{
    // Page header
    function Header()
    {
        //Imagen Encabezado
        $this->Image('./encabezado.PNG', 15, 15, 180, 22, 'PNG');
    }

    // Pie de página
    function Footer()
    {   
        $this->Line(20, 273, 190, 273);
        // Posición: a 1,5 cm del final
        $this->SetY(-25);
        // Arial italic 8
        $this->SetFont('Arial','I',9);
        // Número de página
        $this->Cell(0,10,utf8_decode(' CALLE PARQUE DE BOSENCHEVE No. 23, COL. JARDINES DEL ALBA, C.P. 54750, CUAUTITLÁN IZCALLI,'),0,0,'C');
        $this->SetXY(25, 273);
        $this->Cell(0,18,utf8_decode(' ESTADO DE MÉXICO. TEL: 55 4603 1148 y 55 5012 1637, Cel. 55 2259 9724'),0,0,'C');
        $this->SetXY(30, 274);
        $this->Cell(0,26,utf8_decode(' EMAIL: mbarrientosl@yahoo.com.mx'),0,0,'C');
    }
    }
?>