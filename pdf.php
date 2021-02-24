<?php

include("./php/fpdf182/fpdf.php");
include_once('CPDF.php');
require "./PHPMailer-master/src/PHPMailer.php";
require "./PHPMailer-master/src/SMTP.php";
require "./PHPMailer-master/src/Exception.php";
$aedif=array("Vivienda Familiar", "Vivienda Adosada", "Vivienda Multifamiliar", "Vivienda Residencial", "Oficinas y Locales", "Comercial", "administrativo", "Estacionamientos", "Pública concurrencia", "Docencia", "Salud", "Industrial");
$nedif=array(5206.38, 12432.12, 11576.7, 20241.45, 16263.76, 14119.76, 22000, 6206.63, 13162.54, 6908.8, 25000, 5269.43);
$nombre= $_POST["nombreC"]; 
$Aproyec=$_POST["acheckbox"];
$pnedif=($_POST["edificacion"]-1);
$edificacion=$aedif[$pnedif]; 
$calle=$_POST["calle"];
$estado=$_POST["estado"];
$ciudad=$_POST["ciudad"];
$cp=$_POST["cp"];
$areapb=$_POST["areaPb"];
$numnv=$_POST["numNiv"];
$areanp=$_POST["areaNp"];
$acces=$_POST["accesibilidad"];
$topo=$_POST["topografia"];
$ubi=$_POST["ubicacion"];
$tel=$_POST["numT"];
$email=$_POST["email"];
$nump=count($Aproyec);
$ResTabulador[]=$nump;
$Importe[]=$nump;
$areaT=$areapb+($areanp*$numnv);
$current = 0;
$ImporteT= 0;
$Stproye='';   
 
   foreach ($Aproyec as $key => $value) {
      if ($current != $nump-1) {
         $Stproye .=$value.", ";
      }
      else
         $Stproye .= $value;
     
     
     switch ($value) {
        case 'Arquitectura':
           $ResTabulador[$current]=TabuladorFac1($areaT,-0.162, 23.41);
           break;
         case "Estructura":
            $ResTabulador[$current]=TabuladorFac1($areaT,-0.163, 4.2727);
            break;
         case "Instalalación hidráulica":
            $ResTabulador[$current]=TabuladorFac1($areaT,-0.15, 3.5992);
            break;
         case 'Instalación sanitaria':
            $ResTabulador[$current]=TabuladorFac1($areaT,-0.152, 5.1894);
            break;
         case 'Instalación eléctrica':
            $ResTabulador[$current]=TabuladorFac1($areaT,-0.164, 4.775);
            break;
        default:
           # code...
           break;
     }
     $current++;
  }
  for ($i=0; $i <$nump ; $i++) { 

     $auxT= $ResTabulador[$i];
     $Importe[$i]=ImporteFac23($nedif[$pnedif],$areaT,$auxT);
     $ImporteT=$ImporteT+ $Importe[$i];
  }


  if ($nump>1){
      $Stproye = "los proyectos ".$Stproye;
   }
   else {
      $Stproye= "el proyecto ".$Stproye;
   }

     




$pdf = new PDF();
$pdf->AddPage();
//Margen iniciando en 0, 0
//$pdf->Image('fondo.jpg', 0,0, 210, 295, 'JPG');
 
//De aqui en adelante se colocan distintos métodos
//para diseñar el formato.
 
//Fecha
$pdf->SetFont('Times','', 12);
$pdf->SetXY(130,40);
$pdf->Cell(15, 8, utf8_decode('FECHA'), 0, 'L');//insertar variable de FECHA
 
//Datos
$pdf->SetXY(20, 55);
$pdf->Cell(20, 8, utf8_decode("$nombre"), 0, 'L');//insertar nombre del USUARIO
//*****
$pdf->SetXY(20,61);
$pdf->MultiCell(170,5,utf8_decode("Por  este  conducto,  presentamos  a  su  consideración,  nuestra propuesta  para  la  elaboración de $Stproye de $edificacion en $ciudad Estado de $estado con área techada de $areaT m2.")); //insertar variables de PROYECTOS, EDIFICACION, CIUDAD, MUNICIPIO y AREA TOTAL
//*****
$pdf->SetXY(20, 83);
$pdf->Cell(20, 8, 'OBJETIVO: El objetivo de la presente propuesta: ', 0, 'L');
//***** 
$pdf->SetXY(20, 90);
$pdf->MultiCell(170,5,utf8_decode("Elaborar $Stproye para construcción, basados en la normatividad aplicable en $ciudad del Estado de $estado, supletoriamente el Reglamento para Construcciones del Estado de $estado, y el manual para obras civiles de la C.F.E."));// insertar PROYECTOS, ALCALDIA y ESTADO y ESTADO
//*****
$pdf->SetXY(20, 115);
$pdf->Cell(20, 8, 'Por lo expuesto, presentamos el presupuesto con los siguientes alcances.', 0, 'L');
//*****
$pdf->SetXY(27, 120);
$pdf->Cell(27, 8, utf8_decode('a)   Estructuración conforme a proyecto arquitectónico, sistemas y procedimientos constructivos'), 0, 'L');
$pdf->SetXY(27, 125);
$pdf->Cell(27, 8, utf8_decode('     acordados con el cliente.'), 0, 'L');
$pdf->SetXY(27, 130);
$pdf->Cell(27, 8, utf8_decode('b)     Pre-dimensionamiento de elementos estructurales de cimentación y estructura.'), 0, 'L');
$pdf->SetXY(27, 135);
$pdf->Cell(27, 8, utf8_decode('c)   Análisis estructural para determinar elementos mecánicos a los que serán sometidos los'), 0, 'L');
$pdf->SetXY(27, 140);
$pdf->Cell(27, 8, utf8_decode('       elementos estructurales.'), 0, 'L');
$pdf->SetXY(27, 145);
$pdf->Cell(27, 8, utf8_decode('d)   Diseño de todos y cada uno de los elementos estructurales y de la cimentación'), 0, 'L');
//*****
$pdf->SetXY(20, 155);
$pdf->Cell(20, 8, 'Entregables: ', 0, 'L');
//*****
$pdf->SetXY(27, 160);
$pdf->Cell(27, 8, utf8_decode('a)   Memoria de cálculo.'), 0, 'L');
$pdf->SetXY(27, 165);
$pdf->Cell(27, 8, utf8_decode('b)   Planos en formato 90 x 60 cm.'), 0, 'L');
$pdf->SetXY(27, 170);
$pdf->Cell(27, 8, utf8_decode('c)   Cuantificaciones.'), 0, 'L');
$pdf->SetXY(27, 175);
$pdf->Cell(27, 8, utf8_decode('d)   Catálogo de conceptos y cantidades de obra.'), 0, 'L');
$pdf->SetXY(27, 180);
$pdf->Cell(27, 8, utf8_decode('e)   Mercadeo.'), 0, 'L');
$pdf->SetXY(27, 185);
$pdf->Cell(27, 8, utf8_decode('f)   Integración de Matrices de precios Unitarios.'), 0, 'L');
$pdf->SetXY(27, 190);
$pdf->Cell(27, 8, utf8_decode('e)   Mercadeo.'), 0, 'L');
$pdf->SetXY(27, 195);
$pdf->Cell(27, 8, utf8_decode('f)   Integración de Matrices de precios Unitarios.'), 0, 'L');
$pdf->SetXY(27, 200);
$pdf->Cell(27, 8, utf8_decode('g)   Presupuesto.'), 0, 'L');
$pdf->SetXY(27, 205);
$pdf->Cell(27, 8, utf8_decode('h)   Dos revisiones y ajustes en caso necesario, desde memoria cálculo hasta presupuesto.'), 0, 'L');
//*****
$pdf->SetXY(20, 220);
$pdf->MultiCell(170,5,utf8_decode('El tiempo de ejecución de los trabajos es de 3 semanas a partir de su autorización y pago de anticipo.'));
$pdf->SetXY(20, 235);
$pdf->MultiCell(170,5,utf8_decode('La forma de pago es 50 % de anticipo, 20 % semanal, partir de la segunda semana, conforme al avance y 10 % al finalizar la última revisión.'));
$pdf->SetXY(20, 250);
$pdf->MultiCell(170,5,utf8_decode('Las revisiones, se harán a petición del cliente, y deberán ser solicitadas dentro de los 15 días siguientes a la recepción de los entregables.'));

$pdf->AddPAge();

$pdf->SetXY(20, 45);
$pdf->MultiCell(170,5,utf8_decode('Los depósitos, se deberán de abonar a la siguiente HSBC No. 6419640200 CLABE INTERBANCARIA 021180064196402994 a nombre de MOISÉS BARRIENTOS LOZANO.'));
$posn=60;
for ($i=1; $i <=$nump ; $i++) { 
   $aux=$Importe[($i-1)];
   $paux=$Aproyec[($i-1)];
   $pdf->SetXY(20, $posn);
$pdf->MultiCell(170,5,utf8_decode("El importe del proyecto de $paux es de $ $aux , sin incluir el I. V. A."));//insertar los IMPORTES e IMPORTE TOTAL
$posn= $posn+10;
}
$pdf->SetXY(20, $posn); 
$pdf->MultiCell(170,5,utf8_decode("El importe de la presente propuesta es de $ $ImporteT, sin incluir el I. V. A."));
//****
$pdf->SetXY(95, 180);
$pdf->Cell(27, 8, utf8_decode('Atentamente'), 0, 'C');
$pdf->SetXY(80, 215);
$pdf->Cell(27, 8, utf8_decode('Ing. Moisés Barrientos Lozano.'), 0, 'C');

$doc = $pdf->Output('','S') //Salida al navegador
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'zeuscaste@gmail.com';                     //SMTP username
    $mail->Password   = 'Guapo123.';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('zeuscaste@gmail.com', 'Horizonte BIM');
    $mail->addAddress('zeuscaste@gmail.com');     //Add a recipien

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Cotizacion Horizonte BIM";
    $mail->Body = "<b>Por este medio le hacemos llegar la cotización solicitada de acuerdo a los datos ingresados en nuestro cotizador virtual. </b> <br><b>Gracias por utilizar Cotizador Horizonte BIM.</b></br>";

    // definiendo el adjunto 
    $mail->AddStringAttachment($doc, 'CotizacionBIM.pdf', 'base64');

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
function TabuladorFac1($Area, $exp, $con)
{
   $Tab1 = pow($Area, $exp);
   $TabuladorSub1 = ($con * $Tab1) / 100;
   //$Tabulador1 = bcdiv($TabuladorSub1,'1',4);
   $ResTabulador1 = $TabuladorSub1 * 0.5;
   return $ResTabulador1;
}
function ImporteFac23($edif, $areat, $ResT)
{
   return $edif * $areat * $ResT * 0.7 * 0.9;
}
?>