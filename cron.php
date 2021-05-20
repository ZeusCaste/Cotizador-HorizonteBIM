<?php

include('config.php');

$sql_fac = "SELECT * FROM cotizaciones";
$result = pg_query($conexion,$sql_fac) or die("Error en select: ".pg_last_error());

setlocale(LC_ALL,"es_MX");
$fecha = date("m/d/Y");

$email = "zeuscaste@gmail.com";

include("./php/fpdf182/fpdf.php");
include_once('CPDF.php');

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
$posn=78;
   
$pdf->SetXY(20, $posn);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(20, 8, "Historial de Cotizaciones", 0, 'L');
$pdf->SetFont('Times', '', 12);
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


$doc = $pdf->Output('','S');



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
    $mail->setFrom('zeuscaste@gmail.com', 'BIM Technology Solutions');
    $mail->addAddress($email);     //Add a recipien

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "BIM Technology Solutions";
    $mail->Body = "<b>Por este medio le hacemos llegar la cotización solicitada de acuerdo a los datos ingresados en nuestro cotizador virtual. </b> <br><b>Gracias por utilizar Cotizador BIM Technology Solutions.</b></br>";

    // definiendo el adjunto 
    $mail->AddStringAttachment($doc, 'Cotiaciones.pdf', 'base64');

    $mail->send();
    $enviado =" ".$email;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



?>