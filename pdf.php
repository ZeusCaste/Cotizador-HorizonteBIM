<?php

$edificaciones = $_POST["edificaciones"];
$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$calle = $_POST["direccion"];
$estado = $_POST["estado"];
$ciudad = $_POST["ciudad"];
$cp = $_POST["cp"];
$areaPlantaBaja = $_POST["areaPlantaBaja"];
$numeroNiveles = $_POST["numeroNiveles"];
$areaNivel = $_POST["areaNivel"];
$accesibilidad = $_POST["accesibilidad"];
$topografia = $_POST["topografia"];
$ubicacion = $_POST["ubicacion"];
$fecha = $_POST["fecha"];
$areaTotal = $_POST["areaTotal"];
$importesTotales = $_POST["importesTotales"];
$importes = $_POST["importes"];
$tiemposEjecT = $_POST["tiemposEjecT"];
$tiemposEjecSub = $_POST["tiemposEjecSub"];


include("./php/fpdf182/fpdf.php");
include_once('CPDF.php');
$aedif=array("Vivienda Familiar", "Vivienda Adosada", "Vivienda Multifamiliar", "Vivienda Residencial", "Oficinas y Locales", "Comercial", "administrativo", "Estacionamientos", "Pública concurrencia", "Docencia", "Salud", "Industrial");
$nedif=array(5206.38, 12432.12, 11576.7, 20241.45, 16263.76, 14119.76, 22000, 6206.63, 13162.54, 6908.8, 25000, 5269.43);
 
$pdf = new PDF();
$pdf->AddPage();
//Margen iniciando en 0, 0
//$pdf->Image('fondo.jpg', 0,0, 210, 295, 'JPG');
 
//De aqui en adelante se colocan distintos métodos
//para diseñar el formato.
 
//Fecha
$pdf->SetFont('Times','', 12);
$pdf->SetXY(130,40);
$pdf->Cell(15, 8, utf8_decode("$fecha"), 0, 'L');//insertar variable de FECHA
 
//Datos
$pdf->SetXY(20, 55);
$pdf->Cell(20, 8, utf8_decode("$nombre"), 0, 'L');//insertar nombre del USUARIO
//*****
$pdf->SetXY(20,61);
$pdf->MultiCell(170,5,utf8_decode("Por  este  conducto,  presentamos  a  su  consideración,  nuestra propuesta  para  la  elaboración de los siguientes proyectos:")); //insertar variables de PROYECTOS, EDIFICACION, CIUDAD, MUNICIPIO y AREA TOTAL

$posn=78;

foreach($edificaciones as $keyE => $edificacion) {
   $tempEdificacion = $aedif[$edificacion["edificacion"] - 1];
   $numEdificacion = $keyE + 1;
   $proyectos = '';
   foreach($edificacion["proyectos"] as $keyP => $proyecto) {
      if(count($edificacion["proyectos"]) == ($keyP - 1) ){
         $proyectos.= "y ". $proyecto;
      } else {
         $proyectos.= $proyecto.", ";
      }
   }


   if(((($keyE % 2) == 0) && ($keyE != 0))) {
      $pdf->AddPage();
      $posn = 78;
   }

   $pdf->SetXY(20,$posn);
   $pdf->SetFont('Times','B',12);
   $pdf->Cell(20, 8, "Edificacion #$numEdificacion ", 0, 'L');
   $pdf->SetFont('Times','',12);
   $posn = $posn + 10;
   $pdf->SetXY(20,$posn);
   $pdf->MultiCell(170,5,utf8_decode("Propuesta  para  la  elaboración de $proyectos de $tempEdificacion en $ciudad Estado de $estado con área techada de $areaTotal m2."));
   $posn= $posn + 20;
   foreach($edificacion["proyectos"] as $keyP => $proyecto) {
      $pdf->SetXY(20,$posn);
      $auximport = number_format($importes[$keyE][$keyP], 2);
      $pdf->MultiCell(170,5,utf8_decode("El importe del proyecto de $proyecto es de $". $auximport .", sin incluir el I. V. A."));
      $posn= $posn + 10;
   }
   $pdf->SetXY(20,$posn);
   $pdf->SetFont('Times','B',12);
   $auximportT = number_format($importesTotales[$keyE], 2);
   $pdf->MultiCell(170,5,utf8_decode("El importe de la presente propuesta es de $ $auximportT, sin incluir el I. V. A."));
   $pdf->SetFont('Times','',12);
   $posn= $posn + 10;
}

$pdf->AddPAge();

//*****
$pdf->SetXY(20, 45);
$pdf->Cell(20, 8, 'OBJETIVO: El objetivo de la presente propuesta: ', 0, 'L');
//***** 
$pdf->SetXY(20, 55);
$pdf->MultiCell(170,5,utf8_decode("Elaborar estos proyectos para construcción, basados en la normatividad aplicable en $ciudad del Estado de $estado, supletoriamente el Reglamento para Construcciones del Estado de $estado, y el manual para obras civiles de la C.F.E."));// insertar PROYECTOS, ALCALDIA y ESTADO y ESTADO
//*****
$pdf->SetXY(20, 75);
$pdf->Cell(20, 8, 'Por lo expuesto, presentamos el presupuesto con los siguientes alcances.', 0, 'L');
//*****
$pdf->SetXY(27, 85);
$pdf->Cell(27, 8, utf8_decode('a)   Estructuración conforme a proyecto arquitectónico, sistemas y procedimientos constructivos'), 0, 'L');
$pdf->SetXY(27, 95);
$pdf->Cell(27, 8, utf8_decode('     acordados con el cliente.'), 0, 'L');
$pdf->SetXY(27, 105);
$pdf->Cell(27, 8, utf8_decode('b)     Pre-dimensionamiento de elementos estructurales de cimentación y estructura.'), 0, 'L');
$pdf->SetXY(27, 115);
$pdf->Cell(27, 8, utf8_decode('c)   Análisis estructural para determinar elementos mecánicos a los que serán sometidos los'), 0, 'L');
$pdf->SetXY(27, 125);
$pdf->Cell(27, 8, utf8_decode('       elementos estructurales.'), 0, 'L');
$pdf->SetXY(27, 135);
$pdf->Cell(27, 8, utf8_decode('d)   Diseño de todos y cada uno de los elementos estructurales y de la cimentación'), 0, 'L');
//*****
$pdf->SetXY(20, 145);
$pdf->Cell(20, 8, 'Entregables: ', 0, 'L');
//*****
$pdf->SetXY(27, 155);
$pdf->Cell(27, 8, utf8_decode('a)   Memoria de cálculo.'), 0, 'L');
$pdf->SetXY(27, 160);
$pdf->Cell(27, 8, utf8_decode('b)   Planos en formato 90 x 60 cm.'), 0, 'L');
$pdf->SetXY(27, 165);
$pdf->Cell(27, 8, utf8_decode('c)   Cuantificaciones.'), 0, 'L');
$pdf->SetXY(27, 170);
$pdf->Cell(27, 8, utf8_decode('d)   Catálogo de conceptos y cantidades de obra.'), 0, 'L');
$pdf->SetXY(27, 175);
$pdf->Cell(27, 8, utf8_decode('e)   Mercadeo.'), 0, 'L');
$pdf->SetXY(27, 180);
$pdf->Cell(27, 8, utf8_decode('f)   Integración de Matrices de precios Unitarios.'), 0, 'L');
$pdf->SetXY(27, 185);
$pdf->Cell(27, 8, utf8_decode('e)   Mercadeo.'), 0, 'L');
$pdf->SetXY(27, 190);
$pdf->Cell(27, 8, utf8_decode('f)   Integración de Matrices de precios Unitarios.'), 0, 'L');
$pdf->SetXY(27, 195);
$pdf->Cell(27, 8, utf8_decode('g)   Presupuesto.'), 0, 'L');
$pdf->SetXY(27, 200);
$pdf->Cell(27, 8, utf8_decode('h)   Dos revisiones y ajustes en caso necesario, desde memoria cálculo hasta presupuesto.'), 0, 'L');
//*****
$pdf->SetXY(20, 220);
$pdf->MultiCell(170,5,utf8_decode("El tiempo de ejecución de los trabajos es de $tiemposEjecT semanas a partir de su autorización y pago de anticipo."));
$pdf->SetXY(20, 230);
$pdf->MultiCell(170,5,utf8_decode('La forma de pago es 50 % de anticipo, 20 % semanal, partir de la segunda semana, conforme al avance y 10 % al finalizar la última revisión.'));
$pdf->SetXY(20, 240);
$pdf->MultiCell(170,5,utf8_decode('Las revisiones, se harán a petición del cliente, y deberán ser solicitadas dentro de los 15 días siguientes a la recepción de los entregables.'));

$pdf->AddPAge();

$pdf->SetXY(20, 45);
$pdf->MultiCell(170,5,utf8_decode('Los depósitos, se deberán de abonar a la siguiente HSBC No. 6419640200 CLAVE INTERBANCARIA 021180064196402994 a nombre de MOISÉS BARRIENTOS LOZANO.'));

//****
$pdf->SetXY(95, 180);
$pdf->Cell(27, 8, utf8_decode('Atentamente'), 0, 'C');
$pdf->SetXY(80, 215);
$pdf->Cell(27, 8, utf8_decode('Ing. Moisés Barrientos Lozano.'), 0, 'C');

$doc = $pdf->Output('','S'); //Salida al navegador
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require "PHPMailer-master/src/Exception.php";

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();       
    $mail->SMTPDebug = 0;                                     //Send using SMTP
    $mail->Host = gethostbyname('smtp.gmail.com');                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pruebasbimcotizador@gmail.com';                     //SMTP username
    $mail->Password   = 'Hola123.';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );                            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('zeuscaste@gmail.com', 'Horizonte BIM');
    $mail->addAddress($email);     //Add a recipien

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Cotizacion Horizonte BIM";
    $mail->Body = "<b>Por este medio le hacemos llegar la cotización solicitada de acuerdo a los datos ingresados en nuestro cotizador virtual. </b> <br><b>Gracias por utilizar Cotizador Horizonte BIM.</b></br>";

    // definiendo el adjunto 
    $mail->AddStringAttachment($doc, 'CotizacionBIM.pdf', 'base64');

    $mail->send();
    $enviado =" ".$email;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>
